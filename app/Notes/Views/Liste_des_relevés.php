<div class="row w-50 mx-auto d-block mb-3 mt-5  py-4 px-4">
    <h2 class="h2 text-center"> Relevés de Notes : </h2>
    <hr class="w-50 mx-auto" />
</div>





<?php 

if( isset($EtudErr) ){

    echo '
    <div class="row w-75 mx-auto d-block mt-3 mb-4">
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
    ';
    switch($EtudErr){
        case 'data':
            echo "Données Fournies sont invalides !";
        break;
        case 'notFound':
            echo " Etudiant Introuvable ! ";
        break;
    }
    echo'
</div>
</div>
    ';

}

?>



<div class="row w-100 d-block my-5">
    <table class="table col-9 mx-auto table-hover table-striped ">
        <thead>
            <tr>
                <th> Nom de l'Etudiant </th>
                <th> CNE </th>
                <th class="text-center"> Relevé de notes </th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach($etudiants as $etudiant){

                    echo '
                    <tr>
                        <td scope="row">'. $etudiant->nom_etu .'</td>
                        <td>'. $etudiant->CNE .'</td>
                        <td class="text-center"> 
                        <a name="" id="" class="btn btn-warning py-2 px-3 mx-auto" href="./Releves_de_Notes.php?E='.$etudiant->num_etu.'" role="button"> <i class="fa fa-eye" ></i> </a>
                        </td>
                    </tr>
                    ';
                }
            ?>
        </tbody>
    </table>

</div>