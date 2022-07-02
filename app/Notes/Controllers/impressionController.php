<?php 

$I = $_GET['I'];

require_once('./Models/Etudiant.php');
    require_once('./Models/matiere.php');
    require_once('./Models/note.php');

    $Etudiant = new Etudiant();

    if(empty($I) || !ctype_digit($I) || ! $Etudiant->Find($I)){
        $Found = false;
    }else{

        $Found = true;
        $NoteObj = new Note();
            $notes = $NoteObj->Get_Student_Notes($I);
            $Moyenne = $NoteObj->Calculer_Moyenne($I);
            unset($NoteObj);
            $MatiereOBJ = new Matiere();
            $matieres = $MatiereOBJ->GetAll();
            unset($MatiereOBJ);
        // Get Library Class File 

        require_once('./Libraries/FPDF/fpdf.php');
        
        /// Creating the Pdf file
        $PDF = new FPDF();
        $PDF->AddPage();
        $PDF->SetTitle('Releve de Notes');
        $PDF->SetFont('Arial','B',26);
        $Y = 20;
        $PDF->SetY($Y);
        $PDF->Cell(190,15,utf8_decode('Relevé de Notes'),1,1,'C');
        $PDF->SetFont('Arial','B',15);
        $PDF->SetY($Y=$Y+35);
        $PDF->MultiCell(190,15,utf8_decode('N° : '.$Etudiant->num_etu)."\n\r".utf8_decode('Nom de l\'étudiant : '.$Etudiant->nom_etu),1,'C');
        $PDF->SetFont('Arial','B',13);
        $PDF->SetY($Y=$Y+30);
        $PDF->Cell(36,12,utf8_decode('N° de Matière'),1,0,'C');
        $PDF->Cell(90,12,utf8_decode('Nom de Matière'),1,0,'C');
        $PDF->Cell(30,12,utf8_decode('Coefficient'),1,0,'C');
        $PDF->Cell(34,12,utf8_decode('Note/20'),1,0,'C');


        foreach($matieres as $matiere){

            $PDF->SetY($Y=$Y+12);
            $PDF->Cell(36,12,utf8_decode($matiere->num_mat),1,0,'C');
            $PDF->Cell(90,12,utf8_decode($matiere->nom_mat),1,0,'L');
            $PDF->Cell(30,12,utf8_decode($matiere->coef),1,0,'C');
            $PDF->Cell(34,12,utf8_decode(isset( $notes["'".$matiere->num_mat."'"] )? $notes["'".$matiere->num_mat."'"]:""),1,0,'C');

        }
        $PDF->SetY($Y=$Y+12);
        $PDF->Cell(156,12,utf8_decode('Moyenne :'),1,0,'R');
        $PDF->Cell(34,12,utf8_decode(substr($Moyenne,0,5)),1,0,'C');

        $PDF->SetY($Y=$Y+38);
        $PDF->Cell(190,15,utf8_decode('Fait le : '.date('Y-m-d')),0,0,'R');


/// Width total = 190


$PDF->Output();

}


?>