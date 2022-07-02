<div class="col-10 mx-auto mb-5" style="margin-top: 80px;">

    <div class="row w-100">

        <div class="col-sm-12 col-md">
            <img src="./img/<?php echo $Etat->pic; ?>" class="w-100" />
        </div>

        <div class="col-sm-12 col-md">
            <div class="col-11 ml-1 mt-3">
                <h3 class="h3 display-3"> <?php echo strtoupper($Etat->nom).' '.ucfirst($Etat->prenom); ?> </h3>
                <h3 class="h1 mt-2"> <?php echo strtoupper($Etat->age).', '.ucfirst($Etat->Sex); ?> </h3>
                <h3 class="h2 mt-2"> <?php echo strtoupper($Etat->Tel).' / '.ucfirst($Etat->email); ?> </h3>
                <h3 class="h2 mt-3">
                    <span class="font-weight-bold"> Address : </span>
                    <?php echo strtoupper($Etat->addr); unset($Etat); ?>
                </h3>
            </div>
            <div class="col-12 mt-5">
                <h3 class="h3 display-4 font-weight-bold"> Formation : </h3>
                <li class="ml-2 h3"> <?php echo $Formation->annee.':  '.$Formation->dip.' à '.$Formation->nomE; ?> </li>
                <p class="ml-4 text-muted"> <?php echo $Formation->desc; unset($Formation); ?> </p>
            </div>
            <div class="col-12 mt-5">
                <h3 class="h3 display-4 font-weight-bold"> Expérience : </h3>
                <li class="ml-2 h3">
                    <?php echo substr($Experience->debut,0,7).' :  '.$Experience->Edesc.' de '.$Experience->duree.' mois à '.$Experience->entreName; unset($Experience);?>
                </li>
            </div>
            <div class="col-12 mt-5">
                <h3 class="h3 display-4 font-weight-bold"> Loisirs et Intérets : </h3>
                <li class="ml-2 h3">
                    <?php echo $Loisir->L1; ?>
                </li>
                <li class="ml-2 h3">
                    <?php echo $Loisir->L2; ?>
                </li>
                <li class="ml-2 h3">
                    <?php echo $Loisir->L3; ?>
                </li>
                <?php unset($Loisir); ?>
            </div>
        </div>

    </div>

    <div class="row my-5">
        <div class="col">
            <a name="" id="" class="btn btn-danger d-block py-2 px-3" href="./Logout.php" role="button"> <i
                    class="fas fa-arrow-left    "></i> Déconnexion
            </a>
        </div>
    </div>


</div>