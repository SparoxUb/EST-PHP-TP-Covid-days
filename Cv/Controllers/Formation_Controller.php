<?php 


/// Retreiving Data
$annee= (int) trim( $_POST['annee'] ) ;
$nomE = trim( $_POST['nomE'] );
$dip= trim($_POST['dip']);
$desc = trim($_POST['desc']);



##region
/// Validating and cleanning Data

$Champs_Vides=[];
$Validation_Msgs=[];


if( empty($annee) ){
    $Empty_Messages["annee"]=" Saisissez L'année! ";
}
if( !ctype_digit($annee) || $annee<2006 || $annee >2020 ){
    $Validation_Messages['annee']=" année Saisie est invalide ";
}



if( empty($nomE) ){
    $Empty_Messages["nomE"]=" Saisissez Le nom de l'étalissement! ";
}
if( !filter_var( $nomE,FILTER_VALIDATE_REGEXP,
    array("options"=>array('regexp'=>"/^[ a-zA-Z]+(([' ,.-][a-zA-Z ])?[a-zA-Z ]*)*$/i")) ) ){
    $Validation_Messages['nomE']=" Nom invalide ";
}else if(strlen($nomE)>15){
    $Validation_Messages['nomE']=" 15caractères au Max ";
}else{
    $nomE=filter_var($nomE,FILTER_SANITIZE_STRING);
}


if( empty($dip) ){
    $Empty_Messages["dip"]=" Saisissez Le titre du Diplome! ";
}
if(  !filter_var( $dip,FILTER_VALIDATE_REGEXP,
    array("options"=>array('regexp'=>"/^[ a-zA-Z]+(([' ,.-][a-zA-Z ])?[a-zA-Z ]*)*$/i")) ) ){
    $Validation_Messages['dip']=" Titre de Dip invalide ";
}else if(strlen($dip)>20){
    $Validation_Messages['dip']=" 20caractères au Max ";
}else{
    $dip=filter_var($dip,FILTER_SANITIZE_STRING);
}


if( strlen($desc)>0 && !filter_var( $desc,FILTER_VALIDATE_REGEXP,
    array("options"=>array('regexp'=>"/^[ a-zA-Z]+(([' ,.-][a-zA-Z ])?[a-zA-Z ]*)*$/i")) ) ){
    $Validation_Messages['desc']=" Caractères non alloués sont utilisés ";
}else{
    $desc=filter_var($desc,FILTER_SANITIZE_STRING);
}

/// Data Validation END
#region




// # iF not valide return message in view

if( !empty($Validation_Messages) || !empty($Empty_Messages) )
{

}

// # if valide create object into session and advance to next step ==> $_Session[etape] = 2
else{

    $Etat= $_SESSION['etat'];
    $Etat->annee = $annee;
    $Etat->nomE = $nomE;
    $Etat->dip = $dip;
    $Etat->desc = $desc;

    $_SESSION['etape']=3;
    $_SESSION['etat']=$Etat;
    
}

?>