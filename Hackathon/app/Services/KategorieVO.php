<?php
namespace App\Services;

class KategorieVO {

    var $id;
    var $name;
    var $parentId;
    var $eventId;
    var $endNode;
    var $level;
    var $children = array();
    var $idKontaktperson;
    var $nameKontaktperson;
    var $info;
    var $clonedFromId;

    public function addChild($child) {
        if (empty($this->children)) {
            $this->children = array();
        }
        array_push($this->children, $child);
    }

    public function setIdNameParentId($id2, $name2, $parentId2) {
        $this->id = $id2;
        $this->name = $name2;
        $this->parentId = $parentId2;
        $this->children = array();
    }

    function getClonedFromId() {
        return $this->clonedFromId;
    }

    function setClonedFromId($clonedFromId) {
        $this->clonedFromId = $clonedFromId;
    }

    function getIdKontaktperson() {
        return $this->idKontaktperson;
    }

    function getNameKontaktperson() {
        return $this->nameKontaktperson;
    }

    function setNameKontaktperson($nameKontaktperson) {
        $this->nameKontaktperson = $nameKontaktperson;
    }

    function setIdKontaktperson($idKontaktperson) {
        $this->idKontaktperson = $idKontaktperson;
    }

    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getParentId() {
        return $this->parentId;
    }

    function getEventId() {
        return $this->eventId;
    }

    function getEndNode() {
        return $this->endNode;
    }

    function getLevel() {
        return $this->level;
    }

    function getChildren() {
        return $this->children;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setParentId($parentId) {
        $this->parentId = $parentId;
    }

    function setEventId($eventId) {
        $this->eventId = $eventId;
    }

    function setEndNode($endNode) {
        $this->endNode = $endNode;
    }

    function setLevel($level) {
        $this->level = $level;
    }

    function setChildren($children) {
        $this->children = $children;
    }

    function getInfo() {
        return $this->info;
    }

    function setInfo($info) {
        $this->info = $info;
    }

}
