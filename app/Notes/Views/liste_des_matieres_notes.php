<div class="container mt-5 h-100 align-content-center align-items-center">

    <?php 
    


    ?>

    <div class="row w-100" style="margin-top: 50px;">
        <div class="col-md col-sm-12">
            <h2 class="display-4 text-center">
                Gestion des notes selon la matière :
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


                <?php 
            
            if( isset($_GET['q']) ){

                echo ' <h3 class="text-center" >  Résultats pour la recherche : \''.$_GET['q'].'\'  </h3> ';

            }
            
            ?>

            </form>

        </div>
    </div>

    <div class="row w-100" style="margin-top: 50px;">
        <div class="col-md col-sm-12">


            <table class="table  table-striped table-bordered table-warning">
                <thead class="thead-dark">
                    <tr class="text-center">
                        <th class=""> Numéro# </th>
                        <th class=""> Nom de matière </th>
                        <th class=""> Enseignant </th>
                        <th class=""> Coefficient </th>
                        <th class=""> Consulter les notes </th>

                    </tr>
                </thead>
                <tbody>
                    <?php 
                    foreach($matieres as $matiere){


                        echo '
                        <tr>
                            <td scope="row" class="text-center">'.$matiere->num_mat.'</td>
                            <td>'.$matiere->nom_mat.'</td>
                            <td> <a href="./Gestion_Des_Enseignants.php?i='.$matiere->_num_ens->id.'"> '.$matiere->_num_ens->nom.' </a> </td>
                            <td class="text-center" >'.$matiere->coef.'</td>
                            <td> 
                                <ul class="row w-100 py-0 my-0">
                                    <li class="col mx-auto text-center" style="list-style: none;">
                                        <a  class="btn btn-warning text-center" href="./Gestion_Des_Notes.php?M='.$matiere->num_mat.'" role="button" title="Modifier"> <i class="far fa-eye fa-lg text-white"></i> </a>
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




</div>