<?php 
    $title="Notes : Relevés de Notes";
    $tab=6;
    require_once('./Components/Header.php');


    require_once('./Controllers/ReleveDeNotesController.php');

    if(isset($M)){
        require_once('./Views/modifier_releve_de_notes.php');
    }else if( isset($matieres) ){
        require_once('./Views/Releve_de_notes.php');
    }else {
        require_once('./Views/Liste_des_relevés.php');
    }
    
    require_once('./Components/Footer.php');
?>