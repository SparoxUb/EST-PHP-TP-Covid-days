<?php 


/// Retreiving Data
$L1= trim( $_POST['L1'] ) ;
$L2= trim( $_POST['L2'] ) ;
$L3= trim( $_POST['L3'] ) ;



##region
/// Validating and cleanning Data

$Validation_Msgs=[];
$Empty_Messages=[]; /// to avoid Formulaire::Afficher_msg() errors 


if(  !filter_var( $L1,FILTER_VALIDATE_REGEXP,
    array("options"=>array('regexp'=>"/^[ a-zA-Z]+(([' ,.-][a-zA-Z ])?[a-zA-Z ]*)*$/i")) ) ){
    $Validation_Messages['L1']=" Le nom saisi est invalide ";
}else if(strlen($L1)>20){
    $Validation_Messages['L1']=" 20caractères au Max ";
}else{
    $L1=filter_var($L1,FILTER_SANITIZE_STRING);
}

if(  !filter_var( $L2,FILTER_VALIDATE_REGEXP,
    array("options"=>array('regexp'=>"/^[ a-zA-Z]+(([' ,.-][a-zA-Z ])?[a-zA-Z ]*)*$/i")) ) ){
    $Validation_Messages['L2']=" Le nom saisi est invalide ";
}else if(strlen($L2)>20){
    $Validation_Messages['L2']=" 20caractères au Max ";
}else{
    $L2=filter_var($L2,FILTER_SANITIZE_STRING);
}

if(  !filter_var( $L3,FILTER_VALIDATE_REGEXP,
    array("options"=>array('regexp'=>"/^[ a-zA-Z]+(([' ,.-][a-zA-Z ])?[a-zA-Z ]*)*$/i")) ) ){
    $Validation_Messages['L3']=" Le nom saisi est invalide ";
}else if(strlen($L3)>20){
    $Validation_Messages['L3']=" 20caractères au Max ";
}else{
    $L3=filter_var($L3,FILTER_SANITIZE_STRING);
}





/// Data Validation END
#region




// # iF not valide return message in view

if( !empty($Validation_Messages) )
{

}

// # if valide create object into session and advance to next step ==> $_Session[etape] = 2
else{

    $Etat= $_SESSION['etat'];
    $Etat->L1 = $L1;
    $Etat->L2 = $L2;
    $Etat->L3 = $L3;

    $_SESSION['etape']=5;
    $_SESSION['etat']=$Etat;
    
}

?>