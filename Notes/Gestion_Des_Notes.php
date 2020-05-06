<?php 
    $title="Notes : Gestion des Notes";
    $tab=5;
    require_once('./Components/Header.php');


    require_once('./Controllers/NoteController.php');

   
    if(isset($_GET['M'])){
        require_once('./Views/Liste_des_notes.php');
    }else{
        require_once('./Views/liste_des_matieres_notes.php');
    }


    require_once('./Components/Footer.php');
?>