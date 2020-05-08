<div class="row w-75 mx-auto mt-5 mb-1 text-center">
    <a name="" id="" class="btn btn-info py-2 px-4" href="./Releves_de_Notes.php" role="button"> <i
            class="fa fa-arrow-left"></i> Retourner </a>
</div>

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
                        <td class="text-center">'. ( isset( $notes["'".$matiere->num_mat."'"] )? $notes["'".$matiere->num_mat."'"]:"" ) .'</td>
                    </tr>
                    ';
                }
                ?>

                <tr>
                    <td class="text-right font-weight-bold" colspan="3"> Moyenne : </td>
                    <td class="text-center"> <?php echo $Moyenne; ?> </td>
                </tr>

            </tbody>
        </table>
    </div>
</div>

<div class="w-75 mx-auto row  mt-4 mb-5 py-3">
    <div class="col text-left">
        <a name="" id="" class="btn btn-info py-3 px-4" href="./Releves_de_Notes.php?M=<?php echo $Etudiant->num_etu ?>"
            role="button"> <i class="fa fa-cog fa-lg"></i> Modifier
            Une note </a>
    </div>
    <div class="col text-right">
        <a name="" id="" class="btn btn-primary py-3 px-4" href="#" role="button"><i class="fas fa-print fa-lg"></i>
            Imprimer le Relevé </a>
    </div>
</div>

<script>
$('#EtudiantSelect').change(function(e) {
    var form = document.createElement("form");
    var element1 = document.createElement("input");
    form.method = "GET";
    form.action = "./Releves_de_Notes.php";
    element1.value = e.target.value;
    element1.name = "E";
    form.appendChild(element1);
    document.body.appendChild(form);
    form.submit();
});
</script>