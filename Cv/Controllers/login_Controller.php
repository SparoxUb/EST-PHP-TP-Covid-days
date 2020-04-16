<?php 


/// Retreiving Data
$Pseudo= trim( $_POST['Pseudo'] ) ;
$pwd= $_POST['pwd'];

@session_start();

##region
/// Validating and cleanning Data

$Validation_Msgs=[];
$Empty_Messages=[]; 


if( empty($Pseudo) ){
    $Empty_Messages["Pseudo"]=" Saisissez votre nom! ";
}
if( !filter_var( $Pseudo,FILTER_VALIDATE_REGEXP,
    array("options"=>array('regexp'=>"/^[1-9a-zA-Z]+(([a-zA-Z1-9])?[a-zA-Z1-9]*)*$/i")) ) ){
    $Validation_Messages['Pseudo']="  Caractères non valides ";
}else{
    $Pseudo=filter_var($Pseudo,FILTER_SANITIZE_STRING);
}


if( empty($pwd) ){
    $Empty_Messages["pwd"]=" Saisissez votre mot de passe! ";
}
if( strlen($pwd)<3 ){
    $Validation_Messages['pwd']=" 3 caractères au Min ";
}




/// Data Validation END
#region




// # ##

if( !empty($Validation_Messages) )
{

}

// # ##
else{

    $pwd = str_replace(':','@',$pwd);
    require_once('./Models/user.php');

    $user = new User($Pseudo,$pwd);
    if( ! $user->login() ){
        $Validation_Messages['Pseudo']="  Mot de passe ou Pseudo erroné !  ";;
    }else{
        $_SESSION['id']= $user->id;
        unset($user);

    }


    unset($user);
    
}

?>