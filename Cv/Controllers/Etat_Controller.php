<?php 


/// Retreiving Data
$nom= trim( $_POST['nom'] ) ;
$prenom = trim( $_POST['prenom'] );
$Sex = ($_POST['Gender']=="M"?"homme":"femme");
$email= trim($_POST['email']);
$age = $_POST['age'];
$Tel = trim($_POST['Tel']);
$pic = $_FILES['pic'];
$addr = trim($_POST['adresse']);



##region
/// Validating and cleanning Data

$Champs_Vides=[];
$Validation_Msgs=[];


if( empty($nom) ){
    $Empty_Messages["nom"]=" Saisissez votre nom! ";
}
if( !filter_var( $nom,FILTER_VALIDATE_REGEXP,
    array("options"=>array('regexp'=>"/^[ a-zA-Z]+(([ -][a-zA-Z ])?[a-zA-Z ]*)*$/i")) ) ){
    $Validation_Messages['nom']=" Nom invalide ";
}else{
    $nom=filter_var($nom,FILTER_SANITIZE_STRING);
}


if( empty($prenom) ){
    $Empty_Messages["prenom"]=" Saisissez votre prenom! ";
}
if( !filter_var( $prenom,FILTER_VALIDATE_REGEXP,
    array("options"=>array('regexp'=>"/^[ a-zA-Z]+(([ -][a-zA-Z ])?[a-zA-Z ]*)*$/i")) ) ){
    $Validation_Messages['prenom']=" Prenom invalide ";
}else{
    $prenom=filter_var($prenom,FILTER_SANITIZE_STRING);
}

# sex  doesn't need any validation

if( empty($email) ){
    $Empty_Messages["email"]="Saisissez votre email ! ";
}
if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    $Validation_Messages['email']=" Adresse Email invalide ";
}


if(empty($age)){
    $Empty_Messages["age"]="Saisissez votre age ! ";
}
if( !ctype_digit($age) || $age<15 || $age >60 )
    $Validation_Messages['age']=" L'age saisi est invalide ";



if(empty($Tel))
    $Empty_Messages["Tel"]="Saisissez votre numero de Telephone! ";
if(!ctype_digit($Tel))
    $Validation_Messages['Tel']=" Num de Tel est invalide des chiffires seulement";
else 
    if(strlen($Tel)>13 || strlen($Tel)<10)
        $Validation_Messages['Tel']=" Num de Tel est invalide 10 chiffres";


if( isset($pic)&& !empty($pic['tmp_name']) ){
    $current_path =  $pic['tmp_name'];
    $mime=mime_content_type($current_path);
    if( substr_count($mime,'image')==0 )
        $Validation_Messages['pic']="Fichier Choisi est invalide !";
    else{
        $tmp = explode('.',$pic['name']);
        $imgExt = array_pop($tmp);
        if( empty($Empty_Messages)  && empty($Validation_Messages) )
            {
            move_uploaded_file($current_path,"./img/".$nom.$prenom.'.'.$imgExt);
            $pic = $nom.$prenom.'.'.$imgExt;
            }   
    }
}else{
    $pic = "default.png";
}

if(empty($addr)){
    $Empty_Messages["addr"]=" Entrez votre adresse ! ";
}
$addr = filter_var($addr,FILTER_SANITIZE_STRING);

/// Data Validation END
#region




// # iF not valide return message in view

if( !empty($Validation_Messages) || !empty($Empty_Messages) )
{

}

// # if valide create object into session and advance to next step ==> $_Session[etape] = 2
else{

    $Etat= (object) [];
    $Etat->nom = $nom;
    $Etat->prenom = $prenom;
    $Etat->addr = $addr;
    $Etat->Sex = $Sex;
    $Etat->Tel = $Tel;
    $Etat->age = $age;
    $Etat->pic = $pic;
    $Etat->email = $email;

    $_SESSION['etape']=2;
    $_SESSION['etat']=$Etat;
    
}

?>