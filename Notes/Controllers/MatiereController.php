<?php 



    require_once('./Models/matiere.php');
    $matiere = new Matiere();
    $enseignant = new Enseignant();


    if(isset($_GET['Modify'])&&(!empty($_GET['Modify']))&&(ctype_digit($_GET['Modify']))){
    
    $found = false;
    if($matiere->Find($_GET['Modify']))
    $found=true;

    }else{
    
    if(isset($_POST['modifyMat']) || isset($_POST['CreateMat']) ){  //// pour l'insertion set la modification en meme temps


        /// sanitize and validate
        $nom_mat = trim($_POST['nom_mat']);
        $coef = trim($_POST['coef']);
        $_num_ens  = trim( $_POST['_num_ens']);


        $Empty_Messages=[];
        $Validation_Messages=[];

        if( empty($nom_mat) ){
            $Empty_Messages["nom_mat"]=" Saisissez Le nom de la matière ";
        }
        if( !filter_var( $nom_mat,FILTER_VALIDATE_REGEXP,
            array("options"=>array('regexp'=>"/^[ a-zA-Z0-9éàèç]+(([ -.,éàèç][a-zA-Z0-9 ])?[a-zA-Z0-99éàèç ]*)*$/i")) ) || strlen($nom_mat)<2  ){
            $Validation_Messages['nom_mat']=" Nom saisi est invalide ";
        }else{
            $nom_mat=filter_var($nom_mat,FILTER_SANITIZE_STRING);
        }



        if( empty($coef) ){
            $Empty_Messages["coef"]=" Saisissez Le Coefficient de la matière ";
        }
        if( !ctype_digit($coef) || ( (int) $coef )<1 || ( (int)$coef )>15 ){
            $Validation_Messages['coef']=" Coefficient saisi est invalide ";
        }

        $tmp = new Enseignant();
        if( empty($_num_ens ) ){
            $Empty_Messages["_num_ens"]=" Choisissez l'Enseignant  ";
        }
        if( !ctype_digit($_num_ens) || !$tmp->Find($_num_ens) ){
            $Validation_Messages['_num_ens']=" Choix invalide ";
        }else{
            $_num_ens =filter_var($_num_ens ,FILTER_SANITIZE_STRING);
        }
        unset($tmp);
        


        if( empty($Empty_Messages) && empty($Validation_Messages) ){


            $Updated = false;
            $Inserted = false;


            if(isset($_POST['CreateMat'])){ /// / /// insertion
                $matiere->nom_mat = $nom_mat;
                $matiere->coef = $coef;
                $matiere->_num_ens  = $_num_ens ;
                if( $matiere->Insert() ){
                unset($matiere);
                $Inserted=true;
                                            }
            }
            else
            if( $matiere->Find($_POST['num_ens']) ){  /// Edit

                $matiere->nom_mat = $nom_mat;
                $matiere->coef = $coef;
                $matiere->num_matr = $num_matr;
                $matiere->_num_ens  = $_num_ens ;
                if( ! $matiere->Check_num_matr_for_Update() )
                    $Validation_Messages['num_matr']="Numéro de Matricule est déja enregistré pour un autre matiere ";
                else
                if( $matiere->Update() ){
                    $matieres = $matiere->GetAll();
                    unset($matiere);
                    $Updated=true;
                }
            }


            
        }else{
            $matiere->nom_mat = $nom_mat;
            $matiere->coef = $coef;
            $matiere->_num_ens  = $_num_ens ;
        }
    }else{


        if(isset($_GET['i'])||isset($_GET['q'])){

            if(isset($_GET['i'])){
                $ProfId = $_GET['i'];
                if(empty($ProfId)|| !ctype_digit($ProfId)){
                    $Fiche_error=true;
                }else{
                    $Fiche_matiere= new matiere();
                    if( !$Fiche_matiere->Find($ProfId) )
                    $Fiche_error=true;               
                }
            }else{
                $studnum_matr = $_GET['q'];
                if(empty($studnum_matr)|| !ctype_alnum($studnum_matr)){
                    $Fiche_error=true;               
                }else{
                    $Fiche_matiere= new matiere();
                    if( !$Fiche_matiere->Find_By_num_matr($studnum_matr) )
                    $Fiche_error=true; 
                }
            }


        }else{

            if(isset($_POST['ToDelete'])){

                $toDelete = $_POST['ToDelete'];
                if( !empty($toDelete)&&ctype_digit($toDelete) ){

                    if ( $matiere->Find($toDelete) ){
                        if( $matiere->Delete() )
                            $Deleted = true;
                        else    
                            $Deleted = false;
                    }
                }
                
            }

            $matieres = $matiere->GetAll();
            $profs  = $enseignant->Get_names_ids();
            unset($enseignant);
            unset($matiere);
            }
        }
    }


?>