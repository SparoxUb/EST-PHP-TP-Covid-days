<?php 
    $title="Notes : liste des étudiants";
    $tab=2;
    require_once('./Components/Header.php');


    require_once('./Controllers/EtudiantController.php');

    if( isset($found) || ( (isset($Validation_Messages) && !empty($Validation_Messages)) || (isset($Empty_Messages) && !empty($Empty_Messages) )  ) ){

        require_once('./Views/Modifier_un_etudiant.php');

    }else
        require_once('./Views/liste_des_etudiants.php');




    require_once('./Components/Footer.php');
?>