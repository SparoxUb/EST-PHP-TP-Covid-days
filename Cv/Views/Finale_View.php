<?php 
if( isset($saving_errors) && empty($saving_errors) ){

    session_destroy();

?>


<div class="col-10 mx-auto mt-1 mb-5">
    <div class="col-11 mx-auto border border-secondary rounded py-4 py-2  "
        style="margin-top: 100px; margin-bottom: 60px;">

        <div class="alert alert-success w-100 py-3 px-4" role="alert">
            <strong>Success</strong>
            La Création est effectuée avec succès ! vous pouvez maintenant Le Consulter

            <a name="" id="" class="btn btn-primary d-block col-5 mt-5 mb-3 mx-auto py-2 px-3" href="./Consulter.php"
                role="button"> <i class="far fa-eye fa-lg ml-n1 mr-1"></i> Consulter </a>
        </div>

    </div>

</div>

<?php     
}else{
?>

<div class="col-10 mx-auto mt-1 mb-5">
    <div class="col-11 mx-auto border border-secondary rounded py-4 py-2  "
        style="margin-top: 100px; margin-bottom: 60px;">

        <div class="alert alert-danger w-100 py-3 px-4" role="alert">
            <strong>Echoué</strong>
            La Création est échouée ! les erreurs suivants sont servenue réssayez plusTard!

            <ul>
                <?php 
            
            if (isset($saving_errors)&&$saving_errors['user'] )
            echo '
                <li> Erreure lors du création du compte  </li>
            ';

            if (isset($saving_errors)&&$saving_errors['etat'] )
            echo '
                <li> Erreure lors de l\'enregistrement de l\'etat Civile </li>
            ';

            if (isset($saving_errors)&&$saving_errors['formation'] )
            echo '
                <li> Erreure lors de l\'enregistrement du formation  </li>
            ';

            if (isset($saving_errors)&&$saving_errors['Experience'] )
            echo '
                <li> Erreure lors de l\'enregistrement de l\'experience  </li>
            ';
            if (isset($saving_errors)&&$saving_errors['loisir'] )
            echo '
                <li> Erreure lors de l\'enregistrement des loisirs  </li>
            ';

            

            ?>
            </ul>
            <a name="" id="" class="btn btn-primary d-block mx-auto py-2 px-3" href="../" role="button"> <i <i
                    class="fas fa-reply fa-lg "></i> Acceuill </a>
        </div>

    </div>

</div>

<?php     
}
?>