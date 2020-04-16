<?php 
session_start();

if(isset($_SESSION['etape'])){

    if( $_SESSION['etape']<=2 )
        unset($_SESSION['etape']);

    if( $_SESSION['etape']>2 )
        $_SESSION['etape']-=1;
    
}
header('location:./Create.php');

?>