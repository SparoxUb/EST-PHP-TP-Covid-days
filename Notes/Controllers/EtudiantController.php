<?php 



    require_once('./Models/Etudiant.php');
    $etudiant = new Etudiant();


    if(isset($_GET['Modify'])&&(!empty($_GET['Modify']))&&(ctype_digit($_GET['Modify']))){
    
    $found = false;
    if($etudiant->Find($_GET['Modify']))
    $found=true;

    }else{
    
    if(isset($_POST['modifyStudent']) || isset($_POST['CreateStudent']) ){


        /// sanitize and validate
        $nom_etu = trim($_POST['nom_etu']);
        $CNE = trim(strtoupper($_POST['CNE']));
        $date_naiss = trim($_POST['date_naiss']);
        $sexe = ( $_POST['sexe']=="homme"?"homme":"femme" );


        $Empty_Messages=[];
        $Validation_Messages=[];

        if( empty($nom_etu) ){
            $Empty_Messages["nom_etu"]=" Saisissez Le nom de l'etudiant ";
        }
        if( !filter_var( $nom_etu,FILTER_VALIDATE_REGEXP,
            array("options"=>array('regexp'=>"/^[ a-zA-Z]+(([ -][a-zA-Z ])?[a-zA-Z ]*)*$/i")) ) || strlen($nom_etu)<3 ){
            $Validation_Messages['nom_etu']=" Nom saisi est invalide ";
        }else{
            $nom_etu=filter_var($nom_etu,FILTER_SANITIZE_STRING);
        }

        if( empty($CNE) ){
            $Empty_Messages["CNE"]=" Saisissez Le CNE de l'etudiant ";
        }
        if( !filter_var( $CNE,FILTER_VALIDATE_REGEXP,
            array("options"=>array('regexp'=>"/^[a-zA-Z]+(([0-9])?[0-9]*)*$/i")) ) || strlen($CNE)<10 ){
            $Validation_Messages['CNE']=" CNE saisi est invalide ";
        }else{
            $CNE=filter_var($CNE,FILTER_SANITIZE_STRING);
        }

        if( empty($date_naiss) ){
            $Empty_Messages["date_naiss"]=" Saisissez La date de naissance de l'etudiant ";
        }

        if( empty($Empty_Messages) && empty($Validation_Messages) ){


            $Updated = false;
            $Inserted = false;


            if(isset($_POST['CreateStudent'])){ /// / /// insertion
                $etudiant->nom_etu = $nom_etu;
                $etudiant->date_naiss = $date_naiss;
                $etudiant->CNE = $CNE;
                $etudiant->sexe = $sexe;
                if( $etudiant->Insert() ){
                unset($etudiant);
                $Inserted=true;
            }
            }
            else
            if( $etudiant->Find($_POST['num_etu']) ){

                $etudiant->nom_etu = $nom_etu;
                $etudiant->date_naiss = $date_naiss;
                $etudiant->CNE = $CNE;
                $etudiant->sexe = $sexe;
                if( ! $etudiant->Check_CNE_for_Update() )
                    $Validation_Messages['CNE']="CNE déja enregistré pour un autre étudiant ";
                else
                if( $etudiant->Update() ){
                    $Etudiants = $etudiant->GetAll();
                    unset($etudiant);
                    $Updated=true;
                }
            }


            
        }else{
            $etudiant->nom_etu = $nom_etu;
            $etudiant->date_naiss = $date_naiss;
            $etudiant->CNE = $CNE;
            $etudiant->sexe = $sexe;
        }
    }else{


        if(isset($_GET['i'])||isset($_GET['q'])){

            if(isset($_GET['i'])){
                $studId = $_GET['i'];
                if(empty($studId)|| !ctype_digit($studId)){
                    $Fiche_error=true;
                }else{
                    $Fiche_etudiant= new Etudiant();
                    if( !$Fiche_etudiant->Find($studId) )
                    $Fiche_error=true;               
                }
            }else{
                $studCNE = $_GET['q'];
                if(empty($studCNE)|| !ctype_alnum($studCNE)){
                    $Fiche_error=true;               
                }else{
                    $Fiche_etudiant= new Etudiant();
                    if( !$Fiche_etudiant->Find_By_CNE($studCNE) )
                    $Fiche_error=true; 
                }
            }


        }else{

            if(isset($_POST['ToDelete'])){

                $toDelete = $_POST['ToDelete'];
                if(!empty($toDelete)&&ctype_digit($toDelete) ){

                    if ( $etudiant->Find($toDelete) ){
                        if( $etudiant->Delete() )
                            $Deleted = true;
                        else    
                            $Deleted = false;
                    }
                }
                
            }

            $Etudiants = $etudiant->GetAll();
            unset($etudiant);
            }
        }
    }

?>