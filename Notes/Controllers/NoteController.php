<?php 



    require_once('./Models/matiere.php');
    require_once('./Models/Etudiant.php');
    require_once('./Models/note.php');
    $matiere = new Matiere();
    $enseignant = new Enseignant();



    
        if( isset($_GET['M']) ){

            $M = $_GET['M'];
                if( empty($M) || (!ctype_digit($M)))
                    $matiereError='data';
                else
                if( !$matiere->Find($M) )
                    $matiereError = 'notfound';
            else{
                $enseignant->Find($matiere->_num_ens);
                $Etudiant = new Etudiant();
                $etudiants = $Etudiant->GetAll();
                $note = new Note();
                $notes = $note->Get_Matieres_Notes($M);

                unset($Etudiant);
                unset($note);
            }

        }else{


        if(isset($_GET['q'])){

                $keyword = $_GET['q'];
                if(empty($keyword)|| !ctype_alnum($keyword)){
                    $Fiche_error=true; 
                    $matieres=[];              
                }else{
                    $matieres = $matiere->search($keyword);
                    if( !$matieres )
                    $Fiche_error=true; 
                }
        }

            $matieres = $matiere->GetAll();
            $profs  = $enseignant->Get_names_ids();
            unset($enseignant);
            unset($matiere);
        }
    


?>