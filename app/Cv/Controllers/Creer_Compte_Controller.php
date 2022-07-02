<?php 

require_once('./Models/user.php');
require_once('./Models/EtatCivile.php');
require_once('./Models/Formation.php');
require_once('./Models/Experience.php');
require_once('./Models/Loisir.php');

/// Retreiving Data
$PSeudo= trim( $_POST['PSeudo'] ) ;
$pwd1 = trim( $_POST['pwd1'] );
$pwd2 = trim( $_POST['pwd2'] );


##region
/// Validating and cleanning Data

$Champs_Vides=[];
$Validation_Msgs=[];


if( empty($PSeudo) ){
    $Empty_Messages["PSeudo"]=" Saisissez votre nom! ";
}
if( !filter_var( $PSeudo,FILTER_VALIDATE_REGEXP,
    array("options"=>array('regexp'=>"/^[1-9a-zA-Z]+(([a-zA-Z1-9])?[a-zA-Z1-9]*)*$/i")) ) ){
    $Validation_Messages['PSeudo']="  Caractères non valides ";
}else{
    $PSeudo=filter_var($PSeudo,FILTER_SANITIZE_STRING);
}


if( empty($pwd1) ){
    $Empty_Messages["pwd1"]=" Saisissez votre mpot de passe! ";
}
if( strlen($pwd1)<3 ){
    $Validation_Messages['pwd1']=" 3 caractères au Min ";
}


if( empty($pwd2) ){
    $Empty_Messages["pwd2"]=" Confirmez votre mot de passe! ";
}
if( $pwd1 != $pwd2){
    $Validation_Messages['pwd2']=" La confirmation est erronée ! ";
}else{
    $pwd1=str_replace(':','@',$pwd1);
}

/// Data Validation END
#region




// # iF not valide return message in view

if( !empty($Validation_Messages) || !empty($Empty_Messages) )
{
}

// # if valide we'll inseert rows into data files  
else{

    # Check for existing Pseudo
    $user = new User($PSeudo,$pwd1);
    $Enregistrement = true;

    if($user->check_Pseudo())
        $Validation_Messages['PSeudo']="  PSeudo est Déja enregistré ! ";
    else{
    
    
    $saving_errors=[];


    $data = $_SESSION['etat'];
    if( ! $user->Insert() ) /// insert into Users.txt
        $saving_errors["user"]=true;


    $Etat_civi = new EtatCivile($user->id, $data->nom,$data->prenom,$data->addr,$data->Sex,$data->Tel,$data->age,$data->pic,$data->email);
    if( !$Etat_civi->Insert() )
        $saving_errors["etat"]=true;
    unset($Etat_civi); /// free file using 
    
    
    $Formation = new Formation($user->id,$data->annee,$data->nomE,$data->dip,$data->desc);
    if( !$Formation->Insert() )
        $saving_errors["formation"]=true;
    unset($Formation);

    $Experience = new Experience($user->id,$data->duree,$data->debut,$data->entreName,$data->Edesc);
    if( !$Experience->Insert() )
        $saving_errors["Experience"]=true;
    unset($Experience);
    
    $Loisir = new Loisir($user->id,$data->L1,$data->L2,$data->L3);
    if( !$Loisir->Insert() )
        $saving_errors["loisir"]=true;
    unset($Loisir);

    unset($user);

    $_SESSION['etape']=6;

    
    }
}

?>