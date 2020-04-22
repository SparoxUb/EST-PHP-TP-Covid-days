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
                La liste des Matières :
            </h2>
        </div>
    </div>

    <div class="row w-100 mt-4">
        <div class="col-md col-sm-12">
            <form action="./Gestion_Des_Matieres.php" class="row w-75 mx-auto" method="GET">

                <div class="form-group col-md-8 col-sm-12">
                    <label for=""></label>
                    <input type="text" class="form-control" name="q" id="" aria-describedby="helpId"
                        placeholder=" nom de matière " />
                </div>
                <div class="mt-4 col-md-3 col-sm-12 ">
                    <button type="submit" class="btn btn-dark btn-outline-light"> <i class="fas fa-search fa-lg"></i>
                        Chercher </button>
                </div>


            </form>
        </div>
    </div>

    <div class="row w-100" style="margin-top: 50px;">
        <div class="col-md col-sm-12">


            <table class="table  table-striped table-bordered table-warning">
                <thead class="thead-dark">
                    <tr class="text-center">
                        <th class=""> Numéro# </th>
                        <th class=""> Enseignant </th>
                        <th class=""> Nom de matière </th>
                        <th class=""> Coefficient </th>
                        <th class=""> Actions </th>

                    </tr>
                </thead>
                <tbody>
                    <?php 
                    foreach($matieres as $matiere){


                        echo '
                        <tr>
                            <td scope="row" class="text-center">'.$matiere->num_mat.'</td>
                            <td> <a href="./Gestion_Des_Enseignants.php?i='.$matiere->_num_ens->id.'"> '.$matiere->_num_ens->nom.' </a> </td>
                            <td>'.$matiere->nom_mat.'</td>
                            <td class="text-center" >'.$matiere->coef.'</td>
                            <td> 
                                <ul class="row w-100 py-0 my-0">
                                    <li class="col" style="list-style: none;">
                                        <a  class="btn btn-success" href="./Gestion_Des_matieres.php?Modify='.$matiere->num_mat.'" role="button" title="Modifier"> <i class="far fa-edit fa-lg text-white"></i> </a>
                                    </li>
                                    <li class="col" style="list-style: none;">
                                        <a  class="btn btn-danger deleting" todelete="'.$matiere->num_mat.'" role="button" title="Supprimer"> <i class="far fa-trash-alt fa-lg text-white"></i> </a>
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
            <a name="" id="" class="btn btn-info text-center py-2 px-4 " href="./Nouveau_matiere.php" role="button">
                <i class="fa fa-plus-circle fa-lg mr-1 ml-n1" aria-hidden="true"></i> Ajouter une Matière </a>
        </div>
    </div>


</div>
<script>
$('.deleting').on('click', function(e) {
    e.preventDefault();
    const is = confirm('Etes-vous sure de supprimer cet matiere ?');


    if (is) {
        var form = document.createElement('form');
        form.action = './Gestion_Des_Matieres.php';
        form.method = 'POST';
        var input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'ToDelete';
        input.value = e.target.getAttribute('todelete');
        form.appendChild(input);
        document.body.appendChild(form);

        form.submit();
    }
});
</script>