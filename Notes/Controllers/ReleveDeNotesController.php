<?php 

    require_once('./Models/Etudiant.php');
    require_once('./Models/matiere.php');
    require_once('./Models/note.php');

    $Etudiant = new Etudiant();
    
    if(isset($_POST['EditReleve'])){

        $Edit = $_POST['Edit'];
        if(empty($Edit)||!ctype_digit($Edit)){
            $EtudErr = 'data';
        }else if( ! $Etudiant->Find($Edit) )
        $EtudErr = 'notFound';
        else{
            $MatiereOBJ = new Matiere();
            $matieres = $MatiereOBJ->GetAll();
            unset($MatiereOBJ);  
            $Marks=[];
            $MarksErrs=[];
            foreach($matieres as $matiere){
                $note = $_POST[''.$matiere->num_mat]==""? "NULL":(double)$_POST[''.$matiere->num_mat];
                if(!empty($_POST[$matiere->num_mat]) && !filter_var($_POST[''.$matiere->num_mat],FILTER_VALIDATE_REGEXP,array("options" => array("regexp"=>"/^[]?[0-9]*\.?[0-9]+$/")))){
                    $MarksErrs[$matiere->num_mat]="X";
                }else{
                    if( $note>20 || $note<0 )
                            $MarksErrs[''.$matiere->num_mat]="X";
                    else
                            $Marks[''.$matiere->num_mat]=$note;
                }
            }
            $note = new Note();
            $res = $note->Edit_student_Marks($Edit,$Marks);
        }
    }

    if(isset($_GET['E'])){
        $E= $_GET['E'];
        if(empty($E)||!ctype_digit($E)){
            $EtudErr = 'data';
        }else if( ! $Etudiant->Find($E) )
        $EtudErr = 'notFound';
        else{
            // Etudiant 
            // Matieres + notes ?
            $NoteObj = new Note();
            $notes = $NoteObj->Get_Student_Notes($E);
            $Moyenne = $NoteObj->Calculer_Moyenne($E);
            unset($NoteObj);
            $MatiereOBJ = new Matiere();
            $matieres = $MatiereOBJ->GetAll();
            unset($MatiereOBJ);
        }
    }
    else if(isset($_GET['M'])){
        $M = $_GET['M'];
        if(empty($M)||!ctype_digit($M)){
            $EtudErr = 'data';
        }else if( ! $Etudiant->Find($M) )
        $EtudErr = 'notFound';
        else{
            $NoteObj = new Note();
            $notes = $NoteObj->Get_Student_Notes($M);
            unset($NoteObj);
            $MatiereOBJ = new Matiere();
            $matieres = $MatiereOBJ->GetAll();
            unset($MatiereOBJ);  
        }
    }

    
    
    $etudiants = $Etudiant->GetAll();


?>