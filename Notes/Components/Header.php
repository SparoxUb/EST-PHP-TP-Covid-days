<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> <?php echo $title ?> </title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/simple-sidebar.css" rel="stylesheet">

    <script src="../js/jquery-3.4.1.slim.min.js"></script>
</head>

<body>

    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="bg-light border-right" id="sidebar-wrapper">
            <div class="sidebar-heading text-break"> <a class="navbar-brand text-break font-weight-bold mr-2 ml-3"
                    href=".."> <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Problem 2: <br> Gestion des
                    Notes
                </a> </div>
            <div class="list-group list-group-flush">
                <a href="."
                    class="list-group-item list-group-item-action <?php echo ($tab==1? "bg-active":"bg-light") ?> ">Acceuil</a>
                <a href="./Gestion_Des_Etudiants.php"
                    class="list-group-item list-group-item-action <?php echo ($tab==2? "bg-active":"bg-light") ?>">
                    Gestion des Etudiants </a>
                <a href="./Gestion_Des_Enseignants.php"
                    class="list-group-item list-group-item-action <?php echo ($tab==3? "bg-active":"bg-light") ?>">
                    Gestion des Enseignants </a>
                <a href="./Gestion_Des_Matieres.php"
                    class="list-group-item list-group-item-action <?php echo ($tab==4? "bg-active":"bg-light") ?>">
                    Gestion des Matières
                </a>
                <a href="#"
                    class="list-group-item list-group-item-action <?php echo ($tab==5? "bg-active":"bg-light") ?>">Profile</a>
                <a href="#"
                    class="list-group-item list-group-item-action <?php echo ($tab==6? "bg-active":"bg-light") ?>">Status</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->
        <!-- Page Content -->
        <div id="page-content-wrapper">

            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <button class="btn btn-primary" id="menu-toggle"> <span> <i class="fa fa-arrow-left" id="CollapseIconId"
                            aria-hidden="true"></i> </span> Basculer le Menu</button>

                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>


            </nav>

            <div class="container-fluid">