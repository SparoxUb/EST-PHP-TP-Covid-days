<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Tp</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <style>
    body {
        font-family: Source Sans Pro;
    }
    </style>
</head>

<body>

    <div class="container">

        <div class="row my-5">
            <div class="col-sm-12 col-lg">
                <h2 class="display-2 text-center mx-auto mt-5">
                    <u>
                        Le Tp à Rendre :
                    </u>
                </h2>
            </div>
        </div>

        <div class="row my-5 w-100">

            <div class="col-sm-12 col-lg mt-4">
                <a name="" id="" class="btn btn-primary py-4 px-4 w-100" href="./CV/" role="button">
                    <span class="h3 font-weight-bold">
                        Problème 1:
                    </span>
                    <span class="d-block h4 font-weight-light">
                        Génération des Cv en utilisant les fichiers
                    </span>
                </a>
            </div>

            <div class="col-sm-12 col-lg mt-4 ">
                <a name="" id="" class="btn btn-danger py-4 px-4 w-100" href="./Notes/" role="button">
                    <span class="h3 font-weight-bold">
                        Problème 2:
                    </span>
                    <span class="d-block h4 font-weight-light">
                        La Gestion des Notes
                    </span>
                </a>
            </div>

        </div>

        <div class="row my-5 w-100">

            <div class="col-sm-12 col-lg">
                <h2 class="h2 d-block mx-auto mt-5" style="font-family: Source Sans Pro; font-weight: lighter;">
                    Réalisé Par :
                </h2>

                <div class="ml-5">
                    <h4 class="d-block mx-auto mt-4" style="cursor:pointer;" id="me">
                        MAGHDAOUI Ayoub
                    </h4>

                    <h6 class="d-block mx-auto mt-1">
                        Génie Informatique, Ecole Supérieure de Technologie
                    </h6>

                    <h6 class="d-block mx-auto mt-n1">
                        AGADIR
                    </h6>

                </div>

            </div>


            <div class="col-sm-12 col-lg">

                <h4 class="d-block mx-auto mt-5">
                    Module de programmation Web Avancé & PHP
                </h4>

                <h4 class="d-block mx-auto mt-4">
                    Encadré Par: M. AMROUCH Mustafa
                </h4>

            </div>

        </div>

    </div>
    <script>
    const me = document.getElementById('me');
    let nop = true;
    me.onclick = () => {
        if (nop)
            window.open("https://github.com/SparoxUb", "_blank");
        else
            window.open("https://www.linkedin.com/in/ayoub-maghdaoui", "_blank");
        nop = !nop;
    }
    </script>
    <script src="./js/FontAwesomeAll.min.js"></script>
    <script src="./js/jquery-3.4.1.slim.min.js"></script>
    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
</body>

</html>