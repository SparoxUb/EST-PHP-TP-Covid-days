<?php 



    require_once('./Models/matiere.php');
    require_once('./Models/Etudiant.php');
    require_once('./Models/note.php');
    $matiere = new Matiere();
    $enseignant = new Enseignant();


        if( isset($_POST['SaveMarks']) ){
            $notesInvalides=[];
            $M = $_POST['M'];
            if( empty($M) || (!ctype_digit($M)))
                    $matiereError='data';
                else
                if( !$matiere->Find($M) )
                    $matiereError = 'notfound';
                else{
                $Etudiant = new Etudiant();
                $etudiants = $Etudiant->GetAll();
                    $Notes_and_studentsIDS=[];
                    ## Valider les notes saisies
                    foreach( $etudiants as $etudiant ){

                        $note = $_POST[''.$etudiant->num_etu]==""? "NULL":(double)$_POST[''.$etudiant->num_etu];
                        if( !empty($_POST[''.$etudiant->num_etu]) && !filter_var($_POST[''.$etudiant->num_etu],FILTER_VALIDATE_REGEXP,array("options" => array("regexp"=>"/^[]?[0-9]*\.?[0-9]+$/")))  )
                            $notesInvalides[''.$etudiant->num_etu]="note invalide";
                        else{
                            if( $note>20 || $note<0 )
                            $notesInvalides[''.$etudiant->num_etu]="note invalide";
                            else
                            $Notes_and_studentsIDS[''.$etudiant->num_etu]=$note;
                        }
                    }
                    $note = new Note();
                    $res = $note->Set_Matiere_Notes($M, $Notes_and_studentsIDS);
                }
        }

    
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