<?php 
if( (isset($found) && $found) || ( (isset($Validation_Messages) && !empty($Validation_Messages)) || (isset($Empty_Messages) && !empty($Empty_Messages) )  ) ){
?>

<div class="container mt-5 h-100 align-content-center align-items-center">

    <div class="row w-100" style="margin-top: 50px;">
        <div class="col-md col-sm-12">
            <h2 class="display-4 text-center">
                Modifier une Matière :
            </h2>
        </div>
    </div>

    <div class="row w-100 my-3">

        <form action="./Gestion_Des_Matieres.php" class="col-md-10 mx-auto" method="post">

            <input type="hidden" name="num_mat" value="<?php echo $matiere->num_mat; ?>">

            <div class="form-group">
                <label for="nom_mat">Nom de Matiere: </label>
                <input type="text" name="nom_mat" value="<?php if(isset($matiere->nom_mat))echo $matiere->nom_mat ?>"
                    id="nom_mat" maxlength="50" minlength="2" class="form-control" aria-describedby="helpId">
            </div>
            <?php 
            
            ## Afficher les erreurs Signalés par le controlleur de l'enseignant
                
            if(isset($Empty_Messages)&&!empty($Empty_Messages['nom_mat'])){
                echo '
                <div class="alert alert-danger mt-n3 alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    '.$Empty_Messages['nom_mat'].'
                </div>
                ';
            }else if(isset($Validation_Messages)&&!empty($Validation_Messages['nom_mat'])){
                echo '
                <div class="alert alert-danger mt-n3 alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    '.$Validation_Messages['nom_mat'].'
                </div>
                ';
            }

            ?>


            <div class="form-group">
                <label for="coef">Coefficient: </label>
                <input type="number" name="coef" id="coef" value="<?php if(isset($matiere->coef))echo $matiere->coef ?>"
                    min="1" max="15" class="form-control" aria-describedby="helpId">
            </div>
            <?php 
            
            ## Afficher les erreurs Signalés par le controlleur de l'enseignant
                
            if(isset($Empty_Messages)&&!empty($Empty_Messages['coef'])){
                echo '
                <div class="alert alert-danger mt-n3 alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    '.$Empty_Messages['coef'].'
                </div>
                ';
            }else if(isset($Validation_Messages)&&!empty($Validation_Messages['coef'])){
                echo '
                <div class="alert alert-danger mt-n3 alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    '.$Validation_Messages['coef'].'
                </div>
                ';
            }

            ?>

            <div class="form-group">
                <label for="prof"> Enseignant : </label>

                <select class="custom-select" name="_num_ens" id="_num_ens">
                    <?php 
                    foreach( $profs as $prof){
                        
                        if($prof->num_ens==$matiere->_num_ens)
                        echo '
                        <option selected value="'.$prof->num_ens.'"  >'.$prof->nom_ens.'</option>
                        ';
                        else
                        echo '
                        <option value="'.$prof->num_ens.'"  >'.$prof->nom_ens.'</option>
                        ';
                    }
                    ?>
                </select>
            </div>
            <?php 
            
            ## Afficher les erreurs Signalés par le controlleur de l'enseignant
                
            if(isset($Empty_Messages)&&!empty($Empty_Messages['_num_ens'])){
                echo '
                <div class="alert alert-danger mt-n3 alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    '.$Empty_Messages['_num_ens'].'
                </div>
                ';
            }else if(isset($Validation_Messages)&&!empty($Validation_Messages['_num_ens'])){
                echo '
                <div class="alert alert-danger mt-n3 alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    '.$Validation_Messages['_num_ens'].'
                </div>
                ';
            }

            ?>


            <div class="row mt-5 mb-3 w-100 ">
                <div class="col">
                    <a name="" id="" class="btn btn-danger" href="./Gestion_Des_matieres.php" role="button"> <i
                            class="fa fa-times fa-lg mr-2 aria-hidden=" true"></i> Annuler et retourner </a>
                </div>
                <div class="col ml-auto mr-0">
                    <button type="submit" name="modifyMat" id="" class="btn btn-success ml-auto d-block">
                        <i class="fas fa-save fa-lg mr-2"></i> Sauvegarder </button>
                </div>
            </div>


        </form>

    </div>

</div>


<?php }else{
    
    // si l'matiere avec l'id est introuvable
    ?>

<div class="container mt-5 h-100 align-content-center align-items-center">


    <div class="alert alert-warning col-md-10 mx-auto py-4 px-3 my-4" role="alert">
        <h4 class="alert-heading"> Matiere Introuvable ! </h4>
        <p> La Matière que vous cherchez est introuvable ! </p>
        <p class="mb-0 mt-4 text-center"> <a href="./Gestion_Des_matieres.php"> <i
                    class="fa fa-arrow-left fa-lg mr-1 ml-n1" aria-hidden="true"></i> Retourner </a> </p>
    </div>




</div>


<?php } ?>