<?php 

require_once('./Models/note.php');
$note = new Note();
$data= $note->Get_All_Matieres_Moyennes();

$hauteur = 800;
$largeur = (count($data)*80+10>800)? count($data)*80+10:800; ///dynamique
$hauteur_diag=450;
$img = imagecreatetruecolor($largeur, $hauteur );

$black = imagecolorallocate($img, 0, 0, 0);
$white = imagecolorallocate($img, 255, 255, 255);
$red = imagecolorallocate($img, 255, 153, 153);

imagefill($img, 0, 0, $white);


// get max value =
$max = 0;
foreach($data as $el)
    if($el>$max)
    $max=$el;

$pixels_per_oneDeg = ( $hauteur_diag - 50 )/($max);
$start_X = 30;
$start_Y = $hauteur_diag;
$espace_entre_barres = 30;
$largeur_du_barre = 50;

// Draw x-axis
imageline($img, 10, $start_Y, $largeur-10, $start_Y, $black);

// Draw y-axis
imageline($img, 10, $start_Y, 10, 10, $black);
 
foreach($data as $libel =>  $value){

    imagefilledrectangle($img, $start_X, $start_Y, $start_X+$largeur_du_barre, $start_Y-($value*$pixels_per_oneDeg), $red);
    imagerectangle($img, $start_X, $start_Y, $start_X+$largeur_du_barre, $start_Y-($value*$pixels_per_oneDeg), $black);
    imagestring($img,14,$start_X+8,$start_Y-($value*$pixels_per_oneDeg)-30,substr($value,0,5),$black);

    
    // pixel-width of label
    $txtsz = imagefontwidth(12) * strlen($libel);
    // pixel-height of label
    $txtht = imagefontheight(12);


    $labelimage = imagecreate($txtsz, $txtsz);
    $whiteo = imagecolorallocate($labelimage, 255, 255, 255);
    $blacko = imagecolorallocate($labelimage, 0, 0, 0);

    imagestring($labelimage, 10, 0, $txtsz/2 - $txtht/2, utf8_decode($libel) , $blacko);
    $labelimage1 = imagerotate($labelimage, 270, $whiteo);

    // copy the temp image back to the real image
    imagecopy($img, $labelimage1, $start_X+18, $start_Y +6, $txtsz/2 - $txtht/2, 0, $txtht, $txtsz);


    // destroy temp images, clear memory
    imagedestroy($labelimage);
    imagedestroy($labelimage1);

    
    $start_X +=$espace_entre_barres + $largeur_du_barre;

}


header('Content-Type: image/png');
imagepng($img);

?>