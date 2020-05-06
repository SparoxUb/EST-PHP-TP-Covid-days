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
<div class="row w-100 d-block my-5">

    <form action="./Gestion_Des_Notes.php" class="w-75 mx-auto my-3" method=" post">
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
                            class="form-control col-11 d-inline" name="'.$etudiant->num_etu.'-'.$matiere->num_mat.'" value="'. $note .'" maxlength="5" minlength="1" id="" aria-describedby="helpId" placeholder="" />
                            /20</div> 
                        </td>
                    </tr>
                    ';
                }
            ?>
            </tbody>
        </table>
        <div class="row d-block w-100 mt-4 mb-3 text-center">
            <button type="submit" name="SaveMarks" id="" class="btn btn-success py-2 px-3 d-block mx-auto"> <i
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