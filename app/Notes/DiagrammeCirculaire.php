<?php 

    require_once('./Models/matiere.php');
    require_once('./Models/Etudiant.php');
    require_once('./Models/note.php');

    $Moyenne_De_Reussite = 12.00;


    $note = new Note();
    $etudiant = new Etudiant();

    $Moyennes = ['null'=>0,'re'=>0,'ec'=>0];
    $arc = ['null'=>0,'re'=>0,'ec'=>0];
    $Etudiants = $etudiant->GetAll();
    $nbrEtudiants=0;

    /// Calculer les déférent types participant au diagramme 
    foreach($Etudiants as $Etudiant){
        $moyenne_tmp = $note->Calculer_Moyenne($Etudiant->num_etu);
        if( $moyenne_tmp=="" || $moyenne_tmp==null|| $moyenne_tmp==" " ){
            $Moyennes['null']++;
        }else{
            $moyenne_tmp = doubleval($moyenne_tmp);
            if($moyenne_tmp>$Moyenne_De_Reussite)
                $Moyennes['re']++;
            else
                $Moyennes['ec']++;
        }
        $nbrEtudiants++;
    }


    /// calcule des angles 
    $arc = array();
    foreach($Moyennes as $libelle => $nbr)
    {
        $arc[$libelle]=$nbr*360/$nbrEtudiants;	
    }
    
    $image = imagecreatetruecolor(800,500);
    $style=IMG_ARC_PIE;
    // allocation de couleurs
    $white    = imagecolorallocate($image, 0xFF, 0xFF, 0xFF);
    $gray     = imagecolorallocate($image, 0xC0, 0xC0, 0xC0);
    $darkgray = imagecolorallocate($image, 0x90, 0x90, 0x90);
    $navy     = imagecolorallocate($image, 0x00, 0x00, 0x80);
    $darknavy = imagecolorallocate($image, 0x00, 0x00, 0x50);
    $red      = imagecolorallocate($image, 0xFF, 0x00, 0x00);
    $darkred  = imagecolorallocate($image, 0x90, 0x00, 0x00);
    $colors= [ 'null'=> $gray, 're'=>$red, 'ec'=>$navy ];
    $darkcolors= [ 'null'=>$darkgray, 're'=>$darkred, 'ec'=>$darknavy ];
    

    
    $ligne=imagecolorallocate($image, 220, 220, 220);
    $fond=imagecolorallocate($image, 250, 250, 250);
    $noir=imagecolorallocate($image, 0, 0, 0);
    imagefilledrectangle($image,0 , 0, 800, 500, $fond);

    $start=0;
    // make the 3D effect
    for ($i = 60; $i > 50; $i--)
    {
        foreach( $Moyennes as $libelle => $nbr)
        {   
            if($arc[$libelle])
            imagefilledarc($image, 400, $i*4, 500, 250, $start, $start+$arc[$libelle],$darkcolors[$libelle], $style);
            $start=$start+$arc[$libelle];
        }
    }

    foreach( $Moyennes as $libelle => $nbr)
	{ 
        if($arc[$libelle])

    imagefilledarc($image, 400, 200, 500, 250, $start, $start+$arc[$libelle], $colors[$libelle], $style);
    $start=$start+$arc[$libelle];
    }
    

    $j=0;
    $debut=0;
$pasX=50;
$pasY=380;
foreach ($Moyennes as $libelle=>$quantite)
{
  $valeur=$quantite/$nbrEtudiants*360;
   $fin=$debut+$valeur;
   $debut=$fin;
   if(($j % 5)==4)
    {
        $pasX+=150;
        $pasY=270;
    }
    imagefilledrectangle($image,$pasX+380 , $pasY, $pasX+440, $pasY+14, $colors[$libelle]);

    switch($libelle){
        case 'null':
            $tmp = "Etudiants ont des notes manquantes";
        break;
        case 'ec' :
            $tmp = "Etudiants qui n'ont pas réussi";
        break;
        case 're' :
            $tmp = "Etudiants qui ont  réussi";
        break;
    }
    imagestring($image, 26, $pasX,$pasY , utf8_decode($tmp).': '.$quantite, $colors[$libelle]);
    $pasY+=30;
    $j++;
}


    header('Content-type: image/png');
imagepng($image);
imagedestroy($image);


?>