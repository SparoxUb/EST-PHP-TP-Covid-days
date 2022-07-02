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
                    L\'insertion est effectuée avec<strong> Succès !</strong> <a href="./Gestion_Des_Etudiants.php"><i class="fa fa-arrow-right fa-lg" aria-hidden="true"></i> Consulter la liste des etudiants</a> 
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
                Créer un Etudiant :
            </h2>
        </div>
    </div>

    <div class="row w-100 my-3">

        <form action="./Nouveau_Etudiant.php" class="col-md-10 mx-auto" method="post">

            <div class="form-group">
                <label for="nom">Nom de l'etudiant</label>
                <input type="text" name="nom_etu" value="<?php if(isset($etudiant->nom_etu))echo $etudiant->nom_etu ?>"
                    id="nom_etu" maxlength="50" minlength="4" class="form-control" aria-describedby="helpId">
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


            <div class="form-group">
                <label for="CNE">CNE</label>
                <input type="text" name="CNE" id="CNE" value="<?php if(isset($etudiant->CNE))echo $etudiant->CNE ?>"
                    maxlength="12" minlength="10" class="form-control" aria-describedby="helpId">
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
                <input type="date" name="date_naiss" id="date_naiss"
                    value="<?php if(isset($etudiant->date_naiss))echo $etudiant->date_naiss ?>" class="form-control"
                    aria-describedby="helpId">
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
                                <input class="form-check-input" type="radio" name="sexe" id="" value="homme">
                                homme
                            </label>
                        </div>
                    </li>
                    <li style="list-style: none;" class="col-md-3 col-sm col-xs-12">
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="sexe" checked id="" value="femme">
                                femme
                            </label>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="row mt-5 mb-3 w-100 ">
                <div class="col">
                    <a name="" id="" class="btn btn-danger px-4 py-2" href="./Gestion_Des_Etudiants.php" role="button">
                        <i class="fa fa-times fa-lg mr-2 aria-hidden=" true"></i> Annuler et retourner </a>
                </div>
                <div class="col ml-auto mr-0">
                    <button type="submit" name="CreateStudent" value="qs" id=""
                        class="btn btn-success ml-auto d-block px-4 py-2" btn-lg btn-block">
                        <i class="fas fa-plus fa-lg mr-2"></i> Créer </button>
                </div>
            </div>

        </form>

    </div>

</div>