<?php
namespace App\Services;

use App\Conversation;

class KategorieDAO {

    var $nodeList = array();
    var $parent;
    var $neuesArray = array();
    var $initArray=array();

    // function __construct() {
    //     $this->parent = new KategorieVO();
    //     $this->parent->setIdNameParentId(0, "", 0);
    // }

    function __construct($conversations=[]) {
        $this->parent = new KategorieVO();
        $this->parent->setIdNameParentId(0, "", 0);
        $this->initArray=$conversations;
        // dd($conversations);
    }



    public function getByEventId($idEventPar) {

        //Here:

        $conversations = Conversation::orderBy('conversation_id')->orderBy('id')->get();

    }

    public function getNodeById($parentPar, $idPar) {
        $success = null;
        if ($idPar > 0) {
            $list = $parentPar->getChildren();
//            echo"<br>list size:" . sizeof($list);
            for ($i = 0; $i < sizeof($list); $i++) {
                $child = $list[$i];
                if ($child->getId() == $idPar) {
                    $success = $child;
                } else {
//                    if (!empty($child->getChildren())) {
                    if (sizeof($child->getChildren()) > 0) {
                        $test = $this->getNodeById($child, $idPar);
                        if ($test !== null) {
                            $success = $test;
                        }
                    }
                }
            }
        } else {
            $success = $parentPar;
        }
        return $success;
    }

    public function getNodeByIdOnly($idPar) {
        return $this->getNodeById($this->parent, $idPar);
    }

    public function isNodeEmptyByIdEventId($idPar, $eventId) {
        $this->connect();
        $this->nodeList = $this->getByEventId($eventId);
        $this->neuesArray = [];
        $this->populateParentFromSortedByParentIdList();
        $node = $this->getNodeByIdOnly($idPar);
        $returnValue = 1;
        if (sizeof($node->getChildren()) > 0) {
            $returnValue = 0;
        }
        return $returnValue;
    }

    public function insertNode($node) {
        if (!empty($this->parent->getChildren())) {
//            echo "<br>node at insert getbyId:".$node->getId();
            $obj = $this->getNodeById($this->parent, $node->getParentId());
            $obj->addChild($node);
//            echo "<br>obj getbyId:".$obj->getText();
        } else {
//            echo "<br>node at insert parent:".$node->getId();
            $this->parent->addChild($node);
        }
    }

    public function populateParentFromSortedByParentIdList() {
//        echo"<br>size for populate: " . sizeof($this->nodeList);
        for ($i = 0; $i < sizeof($this->nodeList); $i++) {
            $node = $this->nodeList[$i];
//            echo "<br>Text: ".$node->getText();
            $this->insertNode($node);
        }
    }

    public function traverse($parentPar, $level) {
        $list = $parentPar->getChildren();
        $level++;
        for ($i = 0; $i < sizeof($list); $i++) {
            $child = $list[$i];
            $child->setLevel($level);
            $child->setEndNode(1);
            array_push($this->neuesArray, $child);
            if (sizeof($child->getChildren()) > 0) {
                $child->setEndNode(0);
                $this->traverse($child, $level);
            }
        }
    }
    
    public function traverseHans($parentPar, $level) {
        $list = $parentPar->getChildren();
//        echo"<br>parent list size:" . sizeof($list);
//        return;
        $level++;
        for ($i = 0; $i < sizeof($list); $i++) {
            $child = $list[$i];
            $child->setLevel($level);
            echo "<br>";
            for ($j = 0; $j < $level; $j++) {
                echo "&nbsp;&nbsp;&nbsp;&nbsp;";
            }
//            echo "<br>".$child->getText()."<br>size of child->getChildren():". sizeof($child->getChildren());
            echo $child->getName();
            if (sizeof($child->getChildren()) > 0) {
                $this->traverseHans($child, $level);
            }
        }
    }

    function populateListSortedByParentId() {
        $this->connect();
        $this->nodeList = $this->getByIdEvent(1);
    }

    public function getTreeByEventId() {
        for($i=0; $i<sizeof($this->initArray);$i++){
            $obj=$this->initArray[$i];
            $kategorieVO=new KategorieVO();
            $kategorieVO->setId($obj->id);
            $kategorieVO->setName($obj->sentence);
            // echo $kategorieVO->getName();
            // exit();
            $kategorieVO->setParentId($obj->conversation_id);
            array_push($this->nodeList,$kategorieVO);
        }
    //    $this->nodeList = $this->initArray;
        // dd($this->nodeList);
        $this->neuesArray = [];
        $this->populateParentFromSortedByParentIdList();
        $this->traverse($this->parent, 0);
        // dd($this->neuesArray);
        return $this->neuesArray;
    }

}
