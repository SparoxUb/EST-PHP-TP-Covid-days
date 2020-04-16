<?php 
if( (isset($found) && $found) || ( (isset($Validation_Messages) && !empty($Validation_Messages)) || (isset($Empty_Messages) && !empty($Empty_Messages) )  ) ){
?>

<div class="container mt-5 h-100 align-content-center align-items-center">

    <div class="row w-100" style="margin-top: 50px;">
        <div class="col-md col-sm-12">
            <h2 class="display-4 text-center">
                Modifier un Etudiant :
            </h2>
        </div>
    </div>

    <div class="row w-100 my-3">

        <form action="./Gestion_Des_Etudiants.php" class="col-md-10 mx-auto" method="post">

            <div class="form-group">
                <label for="nom">Nom de l'etudiant</label>
                <input type="text" name="nom_etu" id="nom_etu" maxlength="50" minlength="4" class="form-control"
                    value="<?php echo $etudiant->nom_etu ?>" aria-describedby="helpId">
            </div>
            <?php 
            
            ## Afficher les erreurs Signalés par le controlleur de l'etudiant
                
            if(isset($Empty_Messages)&&!empty($Empty_Messages['nom_etu'])){
                echo '
                <div class="alert alert-danger mt-n3 alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    '.$Empty_Messages['nom_etu'].'
                </div>
                ';
            }else if(isset($Validation_Messages)&&!empty($Validation_Messages['nom_etu'])){
                echo '
                <div class="alert alert-danger mt-n3 alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    '.$Validation_Messages['nom_etu'].'
                </div>
                ';
            }

            ?>


            <input type="hidden" name="num_etu" value="<?php echo $etudiant->num_etu; ?>">

            <div class="form-group">
                <label for="CNE">CNE</label>
                <input type="text" name="CNE" id="CNE" maxlength="12" minlength="10" class="form-control"
                    value="<?php echo $etudiant->CNE ?>" aria-describedby="helpId">
            </div>
            <?php 
            
            ## Afficher les erreurs Signalés par le controlleur de l'etudiant
                
            if(isset($Empty_Messages)&&!empty($Empty_Messages['CNE'])){
                echo '
                <div class="alert alert-danger mt-n3 alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    '.$Empty_Messages['CNE'].'
                </div>
                ';
            }else if(isset($Validation_Messages)&&!empty($Validation_Messages['CNE'])){
                echo '
                <div class="alert alert-danger mt-n3 alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    '.$Validation_Messages['CNE'].'
                </div>
                ';
            }

            ?>

            <div class="form-group">
                <label for="date_naiss">Date de naissance</label>
                <input type="date" name="date_naiss" id="date_naiss" class="form-control"
                    value="<?php echo $etudiant->date_naiss ?>" aria-describedby="helpId">
            </div>
            <?php 
            
            ## Afficher les erreurs Signalés par le controlleur de l'etudiant
                
             if(isset($Empty_Messages)&&!empty($Empty_Messages['date_naiss'])){
                echo '
                <div class="alert alert-danger mt-n3 alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    '.$Empty_Messages['date_naiss'].'
                </div>
                ';
            }

            ?>



            <div class="form-group w-100">
                <label for="Sex">Sexe</label>
                <ul class=" w-100 d-flex align-content-center align-items-center">
                    <li style="list-style: none;" class="col-md-3 col-sm col-xs-12">
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio"
                                    <?php if($etudiant->sexe=="homme") echo "checked"; ?> name="sexe" id=""
                                    value="homme">
                                homme
                            </label>
                        </div>
                    </li>
                    <li style="list-style: none;" class="col-md-3 col-sm col-xs-12">
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="sexe"
                                    <?php if($etudiant->sexe!="homme") echo "checked"; ?> id="" value="femme">
                                femme
                            </label>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="row mt-5 mb-3 w-100 ">
                <div class="col">
                    <a name="" id="" class="btn btn-danger" href="./Gestion_Des_Etudiants.php" role="button"> <i
                            class="fa fa-times fa-lg mr-2 aria-hidden=" true"></i> Annuler et retourner </a>
                </div>
                <div class="col ml-auto mr-0">
                    <button type="submit" name="modifyStudent" id="" class="btn btn-success ml-auto d-block" btn-lg
                        btn-block">
                        <i class="fas fa-save fa-lg mr-2"></i> Sauvegarder </button>
                </div>
            </div>

        </form>

    </div>

</div>


<?php }else{
    
    // si l'etudiant avec l'id est introuvable
    ?>

<div class="container mt-5 h-100 align-content-center align-items-center">


    <div class="alert alert-warning col-md-10 mx-auto py-4 px-3 my-4" role="alert">
        <h4 class="alert-heading"> Etudiant Introuvable ! </h4>
        <p> L'etudiant que vous cherchez est introuvable ! </p>
        <p class="mb-0 mt-4 text-center"> <a href="./Gestion_Des_Etudiants.php"> <i
                    class="fa fa-arrow-left fa-lg mr-1 ml-n1" aria-hidden="true"></i> Retourner </a> </p>
    </div>




</div>


<?php } ?>