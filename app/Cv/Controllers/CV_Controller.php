<?php 


if( empty($id) ){
    session_destroy();
    header('location:./Consulter.php');
}

//require_once('./Models/user.php');
require_once('./Models/EtatCivile.php');
require_once('./Models/Formation.php');
require_once('./Models/Experience.php');
require_once('./Models/Loisir.php');



$tmp = new EtatCivile('','','','','','','','','');
$Etat = $tmp->Find($id);
unset ($tmp);

$tmp = new Formation(' ',' ',' ',' ',' ');
$Formation = $tmp->Find($id);
unset ($tmp);


$tmp = new Experience('','','','','');
$Experience = $tmp->Find($id);
unset ($tmp);


$tmp = new Loisir('','','','');
$Loisir = $tmp->Find($id);
unset ($tmp);





?>