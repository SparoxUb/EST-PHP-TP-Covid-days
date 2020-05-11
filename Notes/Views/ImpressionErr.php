<?php
$title="Notes : Relevés de Notes";
$tab=6;
require_once('./Components/Header.php');
?>

<div class="row w-75 mx-auto mt-5 mb-1 text-center">
    <a name="" id="" class="btn btn-info py-2 px-4" href="./Releves_de_Notes.php" role="button"> <i
            class="fa fa-arrow-left"></i> Retourner </a>
</div>

<div class="row w-100 mx-auto mt-5 mb-1 text-center">
    <div class="alert alert-danger py-4 px-3 d-block mx-auto" role="alert">
        Vous essayez d'imprimer le relevé de notes d'un Etudiant <strong>Introuvable !</strong>
    </div>
</div>

<?php 

require_once('./Components/Footer.php');  
?>