<?php 


/// Retreiving Data
$duree= trim( $_POST['duree'] ) ;
$debut = trim( $_POST['debut'] );
$entreName= trim($_POST['entreName']);
$Edesc = trim($_POST['Edesc']);



##region
/// Validating and cleanning Data

$Champs_Vides=[];
$Validation_Msgs=[];


if( empty($duree) ){
    $Empty_Messages["duree"]=" Saisissez La durée! ";
}
if( !ctype_digit($duree)){
    $Validation_Messages['duree']=" Données incorrectes ";
}else if($duree<1 || $duree >10 ){
    $Validation_Messages['duree']=" durée Saisie est invalide ";
}



if( empty($entreName) ){
    $Empty_Messages["entreName"]=" Saisissez Le nom de l'entreprise ";
}
if(  !filter_var( $entreName,FILTER_VALIDATE_REGEXP,
    array("options"=>array('regexp'=>"/^[ a-zA-Z]+(([' ,.-][a-zA-Z ])?[a-zA-Z ]*)*$/i")) ) ){
    $Validation_Messages['entreName']=" Le nom saisi est invalide ";
}else if(strlen($entreName)>20){
    $Validation_Messages['entreName']=" 20caractères au Max ";
}else{
    $entreName=filter_var($entreName,FILTER_SANITIZE_STRING);
}


if( strlen($Edesc)>0 && !filter_var( $Edesc,FILTER_VALIDATE_REGEXP,
    array("options"=>array('regexp'=>"/^[ a-zA-Z]+(([' ,.-][a-zA-Z ])?[a-zA-Z ]*)*$/i")) ) ){
    $Validation_Messages['Edesc']=" Caractères non alloués sont utilisés ";
}else{
    $Edesc=filter_var($Edesc,FILTER_SANITIZE_STRING);
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
    $Etat->duree = $duree;
    $Etat->debut = $debut;
    $Etat->entreName = $entreName;
    $Etat->Edesc = $Edesc;

    $_SESSION['etape']=4;
    $_SESSION['etat']=$Etat;
    
}

?>