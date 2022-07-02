<?php 
    
    if(isset($Fiche_error)){

        if($Fiche_error)
        echo '
        
            <div class="container mt-5 h-100 align-content-center align-items-center">

                <div class="row w-100 mt-5" >
                    <div class="alert alert-warning py-4 px-3 mt-2 mb-4 alert-dismissible fade show w-100" role="alert">
                        
                        L\'enseignant recherché est <strong> Introuvable !</strong>
                        
                    </div>
                </div>

                <div class="row w-100 mt-4 mb-5" >

                    <a href="./Gestion_Des_Enseignants.php" class="text-center h4  "> <i class="fa fa-arrow-left fa-lg" aria-hidden="true"></i> Retourner à la liste </a>

                </div>


            </div>
            ';
    }else{

    


    ?>
<div class="container mt-5 h-100 align-content-center align-items-center">



    <div class="row w-100" style="margin-top: 50px;">
        <div class="col-md col-sm-12">
            <h2 class="display-4 text-center">
                Fiche d'Enseignant :
            </h2>
        </div>
    </div>


    <div class="row w-100" style="margin-top: 50px;">
        <div class="col-md col-sm-12">
            <h3 class="text-left font-weight-bold mb-3 ">
                Numero :
                <div class="text-center font-weight-light d-inline-block w-75 ">
                    <?php echo $Fiche_enseignant->num_ens; ?>
                </div>
            </h3>
        </div>
    </div>

    <div class="row w-100" style="margin-top: 50px;">
        <div class="col-md col-sm-12">
            <h3 class="text-left font-weight-bold mb-3 ">
                Nom :
                <div class="text-center font-weight-light d-inline-block w-75 ">
                    <?php echo $Fiche_enseignant->nom_ens; ?>
                </div>
            </h3>
        </div>
    </div>


    <div class="row w-100" style="margin-top: 50px;">
        <div class="col-md col-sm-12">
            <h3 class="text-left font-weight-bold mb-3 ">
                Numéro de Matricule :
                <div class="text-center font-weight-light d-inline-block w-50 ">
                    <?php echo $Fiche_enseignant->num_matr; ?>
                </div>
            </h3>
        </div>
    </div>

    <div class="row w-100" style="margin-top: 50px;">
        <div class="col-md col-sm-12">
            <h3 class="text-left font-weight-bold mb-3 ">
                Anciennté :
                <div class="text-center font-weight-light d-inline-block w-75 ">
                    <?php echo $Fiche_enseignant->anciennete; ?>
                </div>
            </h3>
        </div>
    </div>

    <div class="row w-100" style="margin-top: 50px;">
        <div class="col-md col-sm-12">
            <h3 class="text-left font-weight-bold mb-3 ">
                Grade :
                <div class="text-center font-weight-light d-inline-block w-75 ">
                    <?php echo $Fiche_enseignant->grade; ?>
                </div>
            </h3>
        </div>
    </div>


    <div class="row w-100" style="margin-top: 100px;">
        <div class="col-md col-sm-12  text-center ">
            <a name="" id="" class="btn btn-success text-center py-2 px-4 "
                <?php echo 'href="./Gestion_Des_Enseignants.php?Modify='.$Fiche_enseignant->num_ens.'"'; ?>
                role="button">
                <i class="far fa-edit fa-lg mr-1 ml-n1" aria-hidden="true"></i> Modifier </a>
        </div>
        <div class="col-md col-sm-12  text-center ">
            <a name="" id="" class="btn btn-danger text-center py-2 px-4 deleting"
                numEtude="<?php echo $Fiche_enseignant->num_ens; ?>" href="./Nouveau_Etudiant.php" role="button">
                <i class="far fa-trash-alt fa-lg mr-1 ml-n1" aria-hidden="true"></i> Supprimer </a>
        </div>
    </div>


</div>
<script>
$('.deleting').on('click', function(e) {
    e.preventDefault();
    const is = confirm('Etes-vous sure de supprimer cet Etudiant ?');

    const id_to_delete = e.target.getAttribute('numEtude');

    if (is) {
        var form = document.createElement('form');
        form.action = './Gestion_Des_Enseignants.php';
        form.method = 'POST';
        var input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'ToDelete';
        input.value = id_to_delete;
        form.appendChild(input);
        document.body.appendChild(form);

        form.submit();
    }
});
</script>

<?php } ?>