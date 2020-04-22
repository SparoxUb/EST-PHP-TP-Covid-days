<?php 



    require_once('./Models/enseignant.php');
    $enseignant = new Enseignant();


    if(isset($_GET['Modify'])&&(!empty($_GET['Modify']))&&(ctype_digit($_GET['Modify']))){
    
    $found = false;
    if($enseignant->Find($_GET['Modify']))
    $found=true;

    }else{
    
    if(isset($_POST['modifyENS']) || isset($_POST['CreateEns']) ){


        /// sanitize and validate
        $nom_ens = trim($_POST['nom_ens']);
        $num_matr = trim(strtoupper($_POST['num_matr']));
        $grade = trim($_POST['grade']);
        $anciennete = trim( $_POST['anciennete']);


        $Empty_Messages=[];
        $Validation_Messages=[];

        if( empty($nom_ens) ){
            $Empty_Messages["nom_ens"]=" Saisissez Le nom de l'enseignant ";
        }
        if( !filter_var( $nom_ens,FILTER_VALIDATE_REGEXP,
            array("options"=>array('regexp'=>"/^[ a-zA-Z]+(([ -][a-zA-Z ])?[a-zA-Z ]*)*$/i")) ) || strlen($nom_ens)<3  ){
            $Validation_Messages['nom_ens']=" Nom saisi est invalide ";
        }else{
            $nom_ens=filter_var($nom_ens,FILTER_SANITIZE_STRING);
        }

        if( empty($num_matr) ){
            $Empty_Messages["num_matr"]=" Saisissez Le Numéro de Matricule unique de l'enseignant ";
        }
        if( !filter_var( $num_matr,FILTER_VALIDATE_REGEXP,
            array("options"=>array('regexp'=>"/^[a-zA-Z]+(([0-9])?[0-9]*)*$/i")) ) || strlen($num_matr)<2 ){
            $Validation_Messages['num_matr']="  Le Numéro de Matricule saisi est invalide ";
        }else{
            $num_matr=filter_var($num_matr,FILTER_SANITIZE_STRING);
        }


        if( empty($grade) ){
            $Empty_Messages["grade"]=" Saisissez Le Grade de l'enseignant ";
        }
        if( !filter_var( $grade,FILTER_VALIDATE_REGEXP,
            array("options"=>array('regexp'=>"/^[ a-zA-Z0-9]+(([ -][a-zA-Z0-9 ])?[a-zA-Z0-9 ]*)*$/i") )) || strlen($grade)<1 ){
            $Validation_Messages['grade']=" Grade saisi est invalide ";
        }else{
            $grade=filter_var($grade,FILTER_SANITIZE_STRING);
        }


        if( empty($anciennete) ){
            $Empty_Messages["anciennete"]=" Saisissez L'ancienneté de l'enseignant ";
        }
        if( !filter_var( $anciennete,FILTER_VALIDATE_REGEXP,
            array("options"=>array('regexp'=>"/^[ a-zA-Z0-9]+(([ -][a-zA-Z0-9 ])?[a-zA-Z0-9 ]*)*$/i")) ) || strlen($anciennete)<2 ){
            $Validation_Messages['anciennete']=" Caractères  invalides ";
        }else{
            $anciennete=filter_var($anciennete,FILTER_SANITIZE_STRING);
        }
       


        if( empty($Empty_Messages) && empty($Validation_Messages) ){


            $Updated = false;
            $Inserted = false;


            if(isset($_POST['CreateEns'])){ /// / /// insertion
                $enseignant->nom_ens = $nom_ens;
                $enseignant->grade = $grade;
                $enseignant->num_matr = $num_matr;
                $enseignant->anciennete = $anciennete;
                if( $enseignant->Insert() ){
                unset($enseignant);
                $Inserted=true;
                                            }
            }
            else
            if( $enseignant->Find($_POST['num_ens']) ){  /// Edit

                $enseignant->nom_ens = $nom_ens;
                $enseignant->grade = $grade;
                $enseignant->num_matr = $num_matr;
                $enseignant->anciennete = $anciennete;
                if( ! $enseignant->Check_num_matr_for_Update() )
                    $Validation_Messages['num_matr']="Numéro de Matricule est déja enregistré pour un autre Enseignant ";
                else
                if( $enseignant->Update() ){
                    $Enseignants = $enseignant->GetAll();
                    unset($enseignant);
                    $Updated=true;
                }
            }


            
        }else{
            $enseignant->nom_ens = $nom_ens;
            $enseignant->grade = $grade;
            $enseignant->num_matr = $num_matr;
            $enseignant->anciennete = $anciennete;
        }
    }else{


        if(isset($_GET['i'])||isset($_GET['q'])){

            if(isset($_GET['i'])){
                $ProfId = $_GET['i'];
                if(empty($ProfId)|| !ctype_digit($ProfId)){
                    $Fiche_error=true;
                }else{
                    $Fiche_enseignant= new enseignant();
                    if( !$Fiche_enseignant->Find($ProfId) )
                    $Fiche_error=true;               
                }
            }else{
                $studnum_matr = $_GET['q'];
                if(empty($studnum_matr)|| !ctype_alnum($studnum_matr)){
                    $Fiche_error=true;               
                }else{
                    $Fiche_enseignant= new enseignant();
                    if( !$Fiche_enseignant->Find_By_num_matr($studnum_matr) )
                    $Fiche_error=true; 
                }
            }


        }else{

            if(isset($_POST['ToDelete'])){

                $toDelete = $_POST['ToDelete'];
                if( !empty($toDelete)&&ctype_digit($toDelete) ){

                    if ( $enseignant->Find($toDelete) ){
                        if( $enseignant->Delete() )
                            $Deleted = true;
                        else    
                            $Deleted = false;
                    }
                }
                
            }

            $Enseignants = $enseignant->GetAll();
            unset($enseignant);
            }
        }
    }

?>