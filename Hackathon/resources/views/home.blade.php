@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- Insert List Here --}}


<?php
use App\Services\KategorieDAO;

//$kategorieDAO = new KategorieDAO();
$kategorieArray = $kategorieDAO->getTreeByEventId('');
$katIdAnzeige = "-1";

?>
            <table>
                        <?php
                        if (sizeof($kategorieArray) < 1) {
                            echo"<tr><td>";
                            ?>
                            <a href='kategorieHinzufuegen.php?par=neuInHierarchie&beforeId=0&eventId=<?php echo $email ?? ''; ?>&insertLevel=0'>
                                <img src='../../img/neu.png'>Neue Hauptkategorie
                                <span class="glyphicon glyphicon-plus-sign"></span></a>
                            <?php
                            echo"</td></tr>";
                        } else {
                            for ($i = 0; $i < sizeof($kategorieArray); $i++) {
                                $neu = 0;
                                echo"<tr><td>";
                                $katVO = $kategorieArray[$i];
                                for ($j = 0; $j < ($katVO->getLevel() - 1); $j++) {
                                    ?>
                                    <img src='../../img/leer.png'><img src='../../img/leer.png'><img src='../../img/leer.png'><img src='../../img/leer.png'>
                                    <?php
                                }
                                if ($katVO->getEndNode() === 1) {
                                    ?>
                                    <img src='../../img/leer.png'><img src='../../img/leer.png'><img src='../../img/leer.png'><img src='../../img/plus.png'>
                                    <?php
                                    $neu = 1;
                                } else {
                                    ?>
                                    <img src='../../img/leer.png'><img src='../../img/leer.png'><img src='../../img/leer.png'><img src='../../img/minus.png'>
                                    <?php
                                }
//                                echo $katVO->getName() . " (" . $katVO->getId() . ")";
                                if ($katVO->getId() == $katIdAnzeige ?? '' ?? '') {
//                                    echo '<span class="label label-danger">'.$katVO->getName().'</span>';
                                    echo '<span style="background-color: #00ff00;">' . $katVO->getName() . '</span>';
                                } else {
                                    echo $katVO->getName();
                                }
                                ?>
                                &nbsp;&nbsp;
                                <a href='kategorieAendern.php?id=<?php echo $katVO->getId(); ?>&eventId=<?php echo $email ?? ''; ?>'>
                                    <span class="glyphicon glyphicon-edit"></span></a>
                                <a href="" onClick="confirmDelete('<?php echo $katVO->getId(); ?>', '<?php echo $email ?? ''; ?>');
                                                return false;" id="a<?php echo $katVO->getId(); ?>">
                                    <span class="glyphicon glyphicon-remove"></span></a>
                                <a href='kategorieHinzufuegen.php?par=neuInHierarchie&beforeId=<?php echo $katVO->getId(); ?>&eventId=<?php echo $email ?? ''; ?>&insertLevel=<?php echo ($katVO->getLevel() + 1); ?>'>
                                    <span class="glyphicon glyphicon-plus-sign"></span></a>&nbsp;&nbsp;
                                <a href='kategorieInfoAendern.php?id=<?php echo $katVO->getId(); ?>&eventId=<?php echo $email ?? ''; ?>'>
                                    <span class="glyphicon glyphicon-info-sign"></span></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                <?php
                                if ($katVO->getInfo() != NULL) {
                                    echo "(" . substr($katVO->getInfo(), 0, 40) . " ... )";
                                }
                                if ($i === (sizeof($kategorieArray) - 1)) {
                                    echo"<tr><td>";
                                    ?>
                                    <a href='kategorieHinzufuegen.php?par=neuInHierarchie&beforeId=0&eventId=<?php echo $email ?? ''; ?>&insertLevel=0'>
                                        <img src='../../img/neu.png'>Neue Hauptkategorie
                                        <span class="glyphicon glyphicon-plus-sign"></span></a>
                                        <?php
                                        echo"</tr></td>";
                                    }
                                    echo"</td></tr>";
                                    ?>
                                    <?php
                                }
                            }
                            ?>
                    </table>


        </div>
    </div>
</div>
@endsection
