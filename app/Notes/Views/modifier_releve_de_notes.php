<?php 

if(!empty($EtudErr)){

    
echo '
<div class="alert alert-danger py-5 px-3 my-5 w-100" role="alert">
    ';

    

switch($EtudErr){

    case 'data':
        echo "Données fournies sont incorrectes";
    break;
    case 'notFound':
        echo "Etudiant Introuvable";
    break;


}


}
else{

 

    if(isset($res)){
        if(!empty($MarksErrs)){
            echo '
                <div class="alert alert-success w-75 mx-auto py-3 px-2 alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    Bien modifié ! Les champs invalides ne sont pas touchés !
                </div>
            ';
        }else{
            echo '
            <div class="alert alert-success w-75 mx-auto py-3 px-2 alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                Bien modifié ! 
            </div>
        ';
        }
    }

?>

<div class="row w-75 d-block mx-auto my-5">
    <div class="form-group">
        <label for="">Etudiant : </label>
        <select class="form-control" name="Etudiant" id="EtudiantSelect">
            <?php 
            foreach($etudiants as $etudiant){
                if($Etudiant->num_etu==$etudiant->num_etu)
                echo '
                <option value="'.$etudiant->num_etu.'" selected>'.$etudiant->nom_etu.'</option>
                ';
                else
                echo '
                <option value="'.$etudiant->num_etu.'" >'.$etudiant->nom_etu.'</option>
                ';
            }
            ?>
        </select>
    </div>
</div>

<div class="row d-block w-75 mx-auto mt-5 mb-0 border border-secondary py-3 px-2">

    <h2 class="h2 text-center font-weight-bold"> Relevé de Notes de : </h2>
    <h3 class="h4 mt-3 mb-1 text-center"> <a href="./Gestion_Des_Etudiants.php?i=<?php echo $Etudiant->num_etu; ?>">
            <?php echo $Etudiant->nom_etu; ?> </a> <span class="ml-4"> N° <?php echo $Etudiant->num_etu; ?> </span>
    </h3>

</div>


<form action="./Releves_de_Notes.php?M=<?php echo $Etudiant->num_etu; ?>" method="post">
    <input type="hidden" name="Edit" value="<?php echo $M ?>">
    <div class="row d-block w-75 mx-auto mt-0 mb-5 border border-secondary ">
        <div class="col-12 p-0 m-0">
            <table class="table col-12 table-striped table-bordered border-secondary text-center p-0 mx-0 mt-0 mb-5 ">
                <thead class="bg-info">
                    <tr>
                        <th>N° Matière</th>
                        <th>Nom de Matière</th>
                        <th>Coef</th>
                        <th>Note/20</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                
                foreach($matieres as $matiere){
                    echo '
                    <tr>
                        <td scope="row" class="text-center">'.$matiere->num_mat.'</td>
                        <td >'.$matiere->nom_mat.'</td>
                        <td class="text-center">'.$matiere->coef.'</td>
                        <td class="text-center"> 
                        <div class="form-group">
                          <input type="text"
                            class="form-control ';
                            if(isset($MarksErrs[$matiere->num_mat])) echo ' border-danger ';
                            echo '" name="'.$matiere->num_mat.'" id="" aria-describedby="helpId" placeholder="" value="'. ( isset( $notes["'".$matiere->num_mat."'"] )? $notes["'".$matiere->num_mat."'"]:"" ) .'"/>
                        </div>
                        </td>
                    </tr>
                    ';
                }
                ?>



                </tbody>
            </table>
        </div>
    </div>
    <div class="w-75 mx-auto row  mt-4 mb-5 py-3">
        <div class="col text-left">
            <a name="" id="" class="btn btn-danger py-3 px-4"
                href="./Releves_de_Notes.php?E=<?php echo $Etudiant->num_etu ?>" role="button">

                <?php if(isset($res)) echo " <i class='fa fa-arrow-left'></i> Retourner  "; else  echo '<i class="fa fa-times fa-lg"></i> Annuler' ; ?>

            </a>
        </div>
        <div class="col text-right">
            <button name="EditReleve" type="submit" class="btn btn-primary py-3 px-4">
                <i class="fas fa-save fa-lg "></i>
                Sauvegarder </button>
        </div>
    </div>
</form>


<script>
$('#EtudiantSelect').change(function(e) {
    var form = document.createElement("form");
    var element1 = document.createElement("input");
    form.method = "GET";
    form.action = "./Releves_de_Notes.php";
    element1.value = e.target.value;
    element1.name = "M";
    form.appendChild(element1);
    document.body.appendChild(form);
    form.submit();
});
</script>
<?php } ?>