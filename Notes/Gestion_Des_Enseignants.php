<?php 
    $title="Notes : liste des Enseignants";
    $tab=3;
    require_once('./Components/Header.php');


    require_once('./Controllers/EnseignantController.php');

    if( isset($found) || ( (isset($Validation_Messages) && !empty($Validation_Messages)) || (isset($Empty_Messages) && !empty($Empty_Messages) )  ) ){

        require_once('./Views/Modifier_un_prof.php');

    }else{

        if(isset($_GET['i'])||isset($_GET['q']))
            require_once('./Views/Fiche_prof.php');
        else
            require_once('./Views/list_des_enseignants.php');
    }



    require_once('./Components/Footer.php');
?>