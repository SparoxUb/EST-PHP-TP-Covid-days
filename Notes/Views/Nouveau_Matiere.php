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
                    L\'insertion est effectuée avec<strong> Succès !</strong> <a href="./Gestion_Des_Matieres.php"><i class="fa fa-arrow-right fa-lg" aria-hidden="true"></i> Consulter la liste des Matieres</a> 
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
                Créer une nouvelle Matière :
            </h2>
        </div>
    </div>

    <div class="row w-100 my-3">

        <form action="./Nouveau_matiere.php" class="col-md-10 mx-auto" method="post">

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
                        echo '
                        <option value="'.$prof->num_ens.'">'.$prof->nom_ens.'</option>
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
                    <a name="" id="" class="btn btn-danger px-4 py-2" href="./Gestion_Des_Matieres.php" role="button">
                        <i class="fa fa-times fa-lg mr-2 aria-hidden=" true"></i> Annuler et retourner </a>
                </div>
                <div class="col ml-auto mr-0">
                    <button type="submit" name="CreateMat" value="qs" id=""
                        class="btn btn-success ml-auto d-block px-4 py-2" btn-lg btn-block">
                        <i class="fas fa-plus fa-lg mr-2"></i> Créer </button>
                </div>
            </div>

        </form>

    </div>

</div>