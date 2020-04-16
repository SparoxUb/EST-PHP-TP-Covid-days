<?php 

    /// Window Settings
    $title="CV : Consultation";
    $tab=3;
    require_once('./Components/header.php');



    session_start();
    // if session is on go to current cv view else show login space to create session

    if( isset($_POST['login'])){
        require_once('./Controllers/login_Controller.php');
    }

    if(!isset($_SESSION['id'])){
    require_once('./Classes/Formulaire.php');
    require('./Views/login.php');
    }else{
        $id = $_SESSION['id'];
        // Cv view 
        require_once('./Controllers/CV_Controller.php'); /// this one will retreive data from files 
        require('./Views/CV_View.php'); /// and this one is goind to show retreived data 

    }


    require_once('./Components/footer.php');
?>