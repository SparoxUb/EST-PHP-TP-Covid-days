<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php echo $title ?> </title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <style>
    body,
    html {
        height: 100%;
        margin: 0px;
    }

    body {
        font-family: Source Sans Pro;
    }
    </style>
</head>

<body>

    <!-- Header Banner -->
    <nav class="navbar navbar-expand-sm navbar-dark bg-primary">
        <a class="navbar-brand font-weight-bold mr-2 ml-3" href=".."> <i class="fa fa-arrow-circle-left"
                aria-hidden="true"></i> Problem 1: CV </a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
            aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0 ml-md-3">

                <?php if($tab==1) 
                echo ' <li class="nav-item active"> ';
                else 
                echo ' <li class="nav-item "> ';
                ?>
                <a class="nav-link" href=".">
                    Accueil
                </a>
                </li>

                <?php if($tab==2) 
                echo ' <li class="nav-item active"> ';
                else 
                echo ' <li class="nav-item "> ';
                ?>
                <a class="nav-link" href="./Create.php">
                    Créer un CV
                </a>
                </li>

                <?php if($tab==3) 
                echo ' <li class="nav-item active"> ';
                else 
                echo ' <li class="nav-item "> ';
                ?>
                <a class="nav-link" href="./Consulter.php">
                    Consulter
                    <?php if($tab==3) echo ''; ?></a>

                </a>
                </li>
            </ul>
        </div>
    </nav>