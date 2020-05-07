<?php 

    require_once('./Models/Etudiant.php');
    require_once('./Models/matiere.php');
    require_once('./Models/note.php');

    $Etudiant = new Etudiant();
    

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
    
    $etudiants = $Etudiant->GetAll();


?>