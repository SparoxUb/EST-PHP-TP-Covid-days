<div class="container mt-5 h-100 align-content-center align-items-center">


    <?php 
    
    if(isset($Inserted)){

        if($Inserted)
        echo '
            <div class="row w-100" >
                <div class="alert alert-success py-4 px-3 mt-2 mb-4 alert-dismissible fade show w-100" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    L\'insertion est effectuée avec<strong> Succès !</strong> <a href="./Gestion_Des_enseignants.php"><i class="fa fa-arrow-right fa-lg" aria-hidden="true"></i> Consulter la liste des enseignants</a> 
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
                    Une <strong> Erreure Servenue </strong>, L\'insertion est échouée!
                </div>
            </div>
            ';
    }
    ?>

    <div class="row w-100" style="margin-top: 50px;">
        <div class="col-md col-sm-12">
            <h2 class="display-4 text-center">
                Créer un Enseignant :
            </h2>
        </div>
    </div>

    <div class="row w-100 my-3">

        <form action="./Nouveau_enseignant.php" class="col-md-10 mx-auto" method="post">

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
                    <a name="" id="" class="btn btn-danger px-4 py-2" href="./Gestion_Des_enseignants.php"
                        role="button">
                        <i class="fa fa-times fa-lg mr-2 aria-hidden=" true"></i> Annuler et retourner </a>
                </div>
                <div class="col ml-auto mr-0">
                    <button type="submit" name="CreateEns" value="qs" id=""
                        class="btn btn-success ml-auto d-block px-4 py-2" btn-lg btn-block">
                        <i class="fas fa-plus fa-lg mr-2"></i> Créer </button>
                </div>
            </div>

        </form>

    </div>

</div>