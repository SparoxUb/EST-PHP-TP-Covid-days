<?php 
if( (isset($found) && $found) || ( (isset($Validation_Messages) && !empty($Validation_Messages)) || (isset($Empty_Messages) && !empty($Empty_Messages) )  ) ){
?>

<div class="container mt-5 h-100 align-content-center align-items-center">

    <div class="row w-100" style="margin-top: 50px;">
        <div class="col-md col-sm-12">
            <h2 class="display-4 text-center">
                Modifier un Enseignant :
            </h2>
        </div>
    </div>

    <div class="row w-100 my-3">

        <form action="./Gestion_Des_enseignants.php" class="col-md-10 mx-auto" method="post">

            <input type="hidden" name="num_ens" value="<?php echo $enseignant->num_ens; ?>">

            <div class="form-group">
                <label for="nom_ens">Nom de l'enseignant</label>
                <input type="text" name="nom_ens"
                    value="<?php if(isset($enseignant->nom_ens))echo $enseignant->nom_ens ?>" id="nom_ens"
                    maxlength="60" minlength="4" class="form-control" aria-describedby="helpId">
            </div>
            <?php 
            
            ## Afficher les erreurs Signalés par le controlleur de l'enseignant
                
            if(isset($Empty_Messages)&&!empty($Empty_Messages['nom_ens'])){
                echo '
                <div class="alert alert-danger mt-n3 alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    '.$Empty_Messages['nom_ens'].'
                </div>
                ';
            }else if(isset($Validation_Messages)&&!empty($Validation_Messages['nom_ens'])){
                echo '
                <div class="alert alert-danger mt-n3 alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    '.$Validation_Messages['nom_ens'].'
                </div>
                ';
            }

            ?>


            <div class="form-group">
                <label for="num_matr">Numéro de Matricule: </label>
                <input type="text" name="num_matr" id="num_matr"
                    value="<?php if(isset($enseignant->num_matr))echo $enseignant->num_matr ?>" maxlength="15"
                    minlength="10" class="form-control" aria-describedby="helpId">
            </div>
            <?php 
            
            ## Afficher les erreurs Signalés par le controlleur de l'enseignant
                
            if(isset($Empty_Messages)&&!empty($Empty_Messages['num_matr'])){
                echo '
                <div class="alert alert-danger mt-n3 alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    '.$Empty_Messages['num_matr'].'
                </div>
                ';
            }else if(isset($Validation_Messages)&&!empty($Validation_Messages['num_matr'])){
                echo '
                <div class="alert alert-danger mt-n3 alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    '.$Validation_Messages['num_matr'].'
                </div>
                ';
            }

            ?>

            <div class="form-group">
                <label for="grade"> Grade : </label>
                <input type="text" name="grade" id="grade"
                    value="<?php if(isset($enseignant->grade))echo $enseignant->grade ?>" maxlength="15"
                    class="form-control" aria-describedby="helpId">
            </div>
            <?php 
            
            ## Afficher les erreurs Signalés par le controlleur de l'enseignant
                
            if(isset($Empty_Messages)&&!empty($Empty_Messages['grade'])){
                echo '
                <div class="alert alert-danger mt-n3 alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    '.$Empty_Messages['grade'].'
                </div>
                ';
            }else if(isset($Validation_Messages)&&!empty($Validation_Messages['grade'])){
                echo '
                <div class="alert alert-danger mt-n3 alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    '.$Validation_Messages['grade'].'
                </div>
                ';
            }

            ?>



            <div class="form-group">
                <label for="anciennete"> Ancienneté : </label>
                <input type="text" name="anciennete" id="anciennete"
                    value="<?php if(isset($enseignant->anciennete))echo $enseignant->anciennete ?>" maxlength="30"
                    minlength="2" class="form-control" aria-describedby="helpId">
            </div>
            <?php 
            
            ## Afficher les erreurs Signalés par le controlleur de l'enseignant
                
            if(isset($Empty_Messages)&&!empty($Empty_Messages['anciennete'])){
                echo '
                <div class="alert alert-danger mt-n3 alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    '.$Empty_Messages['anciennete'].'
                </div>
                ';
            }else if(isset($Validation_Messages)&&!empty($Validation_Messages['anciennete'])){
                echo '
                <div class="alert alert-danger mt-n3 alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    '.$Validation_Messages['anciennete'].'
                </div>
                ';
            }

            ?>


            <div class="row mt-5 mb-3 w-100 ">
                <div class="col">
                    <a name="" id="" class="btn btn-danger" href="./Gestion_Des_Enseignants.php" role="button"> <i
                            class="fa fa-times fa-lg mr-2 aria-hidden=" true"></i> Annuler et retourner </a>
                </div>
                <div class="col ml-auto mr-0">
                    <button type="submit" name="modifyENS" id="" class="btn btn-success ml-auto d-block">
                        <i class="fas fa-save fa-lg mr-2"></i> Sauvegarder </button>
                </div>
            </div>


        </form>

    </div>

</div>


<?php }else{
    
    // si l'enseignant avec l'id est introuvable
    ?>

<div class="container mt-5 h-100 align-content-center align-items-center">


    <div class="alert alert-warning col-md-10 mx-auto py-4 px-3 my-4" role="alert">
        <h4 class="alert-heading"> enseignant Introuvable ! </h4>
        <p> L'enseignant que vous cherchez est introuvable ! </p>
        <p class="mb-0 mt-4 text-center"> <a href="./Gestion_Des_enseignants.php"> <i
                    class="fa fa-arrow-left fa-lg mr-1 ml-n1" aria-hidden="true"></i> Retourner </a> </p>
    </div>




</div>


<?php } ?>