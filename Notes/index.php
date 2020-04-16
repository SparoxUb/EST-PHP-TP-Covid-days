<?php 
    $title="Notes : Acceuil";
    $tab=1;
    require_once('./Components/Header.php');
?>


<div class="container mt-5 h-100 align-content-center align-items-center">

    <div class="row w-100" style="margin-top: 50px;">
        <div class="col-md col-sm-12">
            <h2 class="display-4 text-center">
                Naviguez Les fonctionnalitées demandées par ce menu.
            </h2>
        </div>
    </div>

    <div class="row w-100">
        <div class="mx-auto col-md-6 col-sm col-xs">
            <img src="./Media/curve-arrow.png" class="mx-auto" alt="">
        </div>
    </div>

    <div class="row my-5">
        <div class="col-12 mt-5">
            <h4 class="h4 my-5" style="cursor:pointer;" id="eno"> <span id="sp">►</span> Enoncé </h4>
            <div id="collapseOne" class="collapse hide w-100" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="row w-100">
                    <div class="col-md-6 col-sm-8 mx-auto">
                        <img src="./Media/2.jpeg" class="w-100" alt="ennonce" srcset="">
                    </div>
                </div>
                <div class="row w-100">
                    <div class="col-12">
                        <h2 class="text-center w-100 h2"> <i class="fas fa-plus    "></i> </h2>
                    </div>
                </div>
                <div class="row w-100">
                    <div class="col-12 text-center">
                        <a href="./Media/tp.pdf" target="_blank" class="text-center w-100 font-weight-bold"> <i
                                class="fa fa-arrow-right" aria-hidden="true"></i> TP.pdf <i class="fa fa-arrow-left"
                                aria-hidden="true"></i> </a>
                    </div>
                </div>
            </div>

        </div>
    </div>


</div>


<script>
const eno = document.getElementById('eno');
const collapse = document.getElementById('collapseOne');
const sp = document.getElementById('sp');
eno.onclick = () => {
    if (collapse.classList.contains('hide')) {
        collapse.classList.remove('hide');
        collapse.classList.add('show');
        sp.innerText = "▼";

    } else {
        collapse.classList.remove('show');
        collapse.classList.add('hide');
        sp.innerText = "►";

    }
}
</script>
<?php
    require_once('./Components/Footer.php');
?>