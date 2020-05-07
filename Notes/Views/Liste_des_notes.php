<?php 


if(isset($matiereError)){

switch($matiereError){

    case 'data':
        echo '
        <div class="alert alert-warning py-3 px-2" role="alert">
            <strong>Erreur !</strong> Données Fournies sont invalides !
        </div>
        <div class="row w-100 my-4">
        <div class="col mx-auto text-center my-3">
        <button type="button" name="" id="Goback" class="btn btn-info" > <i class="fa fa-arrow-left" ></i> Retourner </button>
        </div>
        </div>
        ';
    break;
    case 'notfound':
        echo '
        <div class="alert alert-warning py-3 px-2" role="alert">
            <strong>Erreur !</strong> Matiere introuvable !
        </div>
        <div class="row w-100 my-4">
        <div class="col mx-auto text-center my-3">
        <button type="button" name="" id="Goback" class="btn btn-info" > <i class="fa fa-arrow-left" ></i> Retourner </button>
        </div>
        </div>
        ';
    break;
}
}else{
?>

<div class="row w-50 mx-auto d-block mb-3 mt-5 border border-secondary py-4 px-4">
    <h3 class="h3 "> <span class="font-weight-bold text-left">Matière :</span> <span
            class="text-center ml-4"><?php echo $matiere->nom_mat; ?></span></h3>
    <h4 class="h4 text-left mt-2"> <span class="font-weight-bold text-left">Enseignant :</span> <span
            class="text-center ml-4"> <?php echo $enseignant->nom_ens; ?> </span></h4>
</div>
<div class="row d-block mt-5 w-75 mx-auto text-left">
    <a name="" id="" class="btn btn-warning px-4 py-2" href="./Gestion_Des_Notes.php" role="button"> <i
            class="fa fa-arrow-left"></i> Liste des Matières </a>
</div>

<?php 

if( isset($res) ){
    if($res===true){
    echo'
    <div class="alert alert-success alert-dismissible fade show px-3 py-4 w-75 mx-auto mt-4 mb-n3" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        Modifications sont bien faites ! ';
        if(!empty($notesInvalides)){
            echo ' Les champs Erronés ne sont pas touchés !';
        }
        echo'
    </div>
    ';}
    else
    echo'
    <div class="alert alert-warning alert-dismissible fade show px-3 py-4 w-75 mx-auto mt-4 mb-n3" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
    Modification est échouée !
</div>
    ';
}

?>

<div class="row w-100 d-block my-5">
    <form action="./Gestion_Des_Notes.php?M=<?php echo $_GET['M'] ?>" class="w-75 mx-auto my-3" method="post">
        <input type="hidden" name="M" value="<?php echo $_GET['M'] ?>" />
        <table class="table col-12 table-hover table-striped ">
            <thead>
                <tr>
                    <th> Nom de l'Etudiant </th>
                    <th> CNE </th>
                    <th> NOTE </th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach($etudiants as $etudiant){

                    $note = isset($notes["'".$etudiant->num_etu."'"])? $notes["'".$etudiant->num_etu."'"] : "";
                    echo '
                    <tr>
                        <td scope="row">'. $etudiant->nom_etu .'</td>
                        <td>'. $etudiant->CNE .'</td>
                        <td> <div class="form-group d-inline">
                          <input type="text"
                            class="form-control col-11 d-inline';
                            if(isset($notesInvalides[''.$etudiant->num_etu]))
                                echo ' btn-outline-danger ';
                            echo '" name="'.$etudiant->num_etu.'" value="'. $note .'" maxlength="5" minlength="1" id="" aria-describedby="helpId" placeholder="" />
                            /20</div> 
                        </td>
                    </tr>
                    ';
                }
            ?>
            </tbody>
        </table>
        <div class="row d-block w-100 mt-4 mb-3 text-center">
            <button type="submit" name="SaveMarks" value="X" id="" class="btn btn-success py-2 px-3 d-block mx-auto"> <i
                    class="fas fa-save    "></i> Sauvegarder </button>
        </div>
    </form>

</div>


<?php
}
?>

<script>
$("#Goback").on('click', () => window.history.back());
</script>