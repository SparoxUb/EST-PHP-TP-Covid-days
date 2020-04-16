<?php 
    $title="CV : Acceuil";
    $tab=1;
    require_once('./Components/header.php');
?>


<div class="container mt-5 h-100 align-content-center align-items-center">

    <div class="row " style="margin-top: 200px;">

        <div class="col-md col-sm-12">
            <a name="create" id="create" class="w-100 btn btn-success py-4 px-4 display-4" href="./Create.php"
                role="button">
                <i class="fas fa-plus fa-lg ml-n1 mr-1"></i>
                Créer un nouveau CV
            </a>
        </div>

        <div class="col-md col-sm-12">
            <a name="create" id="create" class="w-100 btn btn-warning py-4 px-4 display-4" href="./Consulter.php"
                role="button">
                <i class="far fa-eye fa-lg ml-n1 mr-1"></i>
                Consulter les cv
            </a>
        </div>
    </div>

    <div class="row my-5">
        <div class="col-12 mt-5">
            <h4 class="h4 mt-5" style="cursor:pointer;" id="eno"> <span id="sp">►</span> Enoncé </h4>
            <div id="collapseOne" class="collapse hide w-100" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="col-md-6 col-sm-8 mx-auto">
                    <img src="./img/ennonce.jpeg" class="w-100" alt="ennonce" srcset="">
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
    require_once('./Components/footer.php');
?>