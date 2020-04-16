<div class="container mt-5 h-100 align-content-center align-items-center">

    <?php 
    
    if(isset($Updated)){

        if($Updated)
        echo '
            <div class="row w-100" >
                <div class="alert alert-success py-4 px-3 mt-2 mb-4 alert-dismissible fade show w-100" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    La modification est effectuée avec<strong> Succès !</strong>
                </div>
            </div>
            ';
        else
        echo '
            <div class="row w-100">
                <div class="alert alert-danger py-4 px-3 mt-2 mb-4 alert-dismissible fade show w-100" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    Une <strong> Erreure Servenue </strong>, La modification est échouée!
                </div>
            </div>
            ';
    }

    if(isset($Deleted)){

        if($Deleted)
        echo '
            <div class="row w-100" >
                <div class="alert alert-success py-4 px-3 mt-2 mb-4 alert-dismissible fade show w-100" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <strong> Bien supprimé !</strong>
                </div>
            </div>
            ';
        else
        echo '
            <div class="row w-100">
                <div class="alert alert-danger py-4 px-3 mt-2 mb-4 alert-dismissible fade show w-100" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    Une <strong> Erreure Servenue </strong>, La supprission est échouée!
                </div>
            </div>
            ';
    }


    ?>

    <div class="row w-100" style="margin-top: 50px;">
        <div class="col-md col-sm-12">
            <h2 class="display-4 text-center">
                La liste des Etudiants :
            </h2>
        </div>
    </div>


    <div class="row w-100" style="margin-top: 50px;">
        <div class="col-md col-sm-12">


            <table class="table  table-striped table-bordered table-warning">
                <thead class="thead-dark">
                    <tr>
                        <th class="">Numéro#</th>
                        <th class="">Nom</th>
                        <th class="">CNE</th>
                        <th class="">Date de naissance</th>
                        <th class="">Sexe</th>
                        <th class="">Actions</th>

                    </tr>
                </thead>
                <tbody>
                    <?php 
                    foreach($Etudiants as $Etudiant){


                        echo '
                        <tr>
                            <td scope="row">'.$Etudiant->num_etu.'</td>
                            <td>'.$Etudiant->nom_etu.'</td>
                            <td>'.$Etudiant->CNE.'</td>
                            <td>'.$Etudiant->date_naiss.'</td>
                            <td>'.$Etudiant->sexe.'</td>
                            <td> 
                                <ul class="row w-100 py-0 my-0">
                                    <li class="col" style="list-style: none;">
                                        <a  class="btn btn-success" href="./Gestion_Des_Etudiants.php?Modify='.$Etudiant->num_etu.'" on role="button" title="Modifier"> <i class="far fa-edit fa-lg text-white"></i> </a>
                                    </li>
                                    <li class="col" style="list-style: none;">
                                        <a  class="btn btn-danger deleting" numEtude="'.$Etudiant->num_etu.'" role="button" title="Supprimer"> <i class="far fa-trash-alt fa-lg text-white"></i> </a>
                                    </li>
                                </ul>
                            </td>
                        </tr>  
                        ';

                    }
                    
                    
                    ?>


                </tbody>
            </table>


        </div>
    </div>


    <div class="row w-100" style="margin-top: 100px;">
        <div class="col-md col-sm-12  text-center ">
            <a name="" id="" class="btn btn-info text-center py-2 px-4 " href="./Nouveau_Etudiant.php" role="button"> <i
                    class="fa fa-plus-circle fa-lg mr-1 ml-n1" aria-hidden="true"></i> Ajouter un Etudiant </a>
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
        form.action = './Gestion_Des_Etudiants.php';
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