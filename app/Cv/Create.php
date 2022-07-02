<?php 
    session_start();

    /// Window Settings
    $title="CV : Création";
    $tab=2;
    require_once('./Components/header.php');


    
    require_once('./Classes/Formulaire.php');
    


    /// Calling controllers 
    if(isset($_POST['EnvoyerEtat'])){
        require('./Controllers/Etat_Controller.php');
    }
    if(isset($_POST['EnvoyerForma'])){
        require('./Controllers/Formation_Controller.php');
    }
    if(isset($_POST['EnvoyerExperience'])){
        require('./Controllers/Experience_Controller.php');
    }
    if(isset($_POST['EnvoyerLois'])){
        require('./Controllers/Loisirs_Controller.php');
    }
    if(isset($_POST['FinalSubmit'])){
        require('./Controllers/Creer_Compte_Controller.php');
    }
    
    if( !isset($_SESSION['etape']) ){

    require_once('./Views/Etat_civile.php');

    }else {

        switch($_SESSION['etape']){

        case 2:
            require_once('./Views/Formation.php');
        break;
        case 3:
            require_once('./Views/Experience.php');
        break;
        case 4:
            require_once('./Views/LoisirsEtInterets.php');
        break;
        case 5:
            require_once('./Views/Creer_Compte.php');
        break;
        case 6:
            require_once('./Views/Finale_View.php');
        break;
        }
    }
    
?>


<?php
    require_once('./Components/footer.php');
?>