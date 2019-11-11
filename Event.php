<!doctype html>
<html lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="event.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="bootstrap/bootstrap-4.3.1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <title>Événements - BDE</title>
</head>

<body id="Ebody">

<header>
    <nav class="navbar navbar-expand-md bg-dark">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="main.php">Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Events.php">Events</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Autres services
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">BDE</a>
                        <a class="dropdown-item" href="#">Clubs</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Boutique</a>
                        <a class="dropdown-item" href="#">Galerie</a>
                    </div>
                    <div class="nav-item-end">
                <li>
                    <a class="nav-link" href="#">Sign in</a>
                </li>
                <li>
                    <a class="nav-link" href="inscription.php">Sign Up</a>
                </li>
        </div>

        </ul>
        <!-- <form class="form-inline my-2 my-lg-0">
           <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
           <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
         </form>
     -->


        </div>

    </nav>
</header>

<main>
    <!-- MAIN (Center website) -->
    <div class="main">

        <h1>ÉVÉNEMENT DU BDE DU CESI - ROUEN</h1>


        <div class="content last">
            <img class="imageEvt2" src="Image\event.jpg" alt="Event Image" style="width:100%">
            <h1 class="titreEvt2">Gros événement !</h1>
            <p class="descrition">hasagi hasagi hasagi hasagi hasagi hasagi hasagi hasagi hasagi hasagi hasagi hasagi hasagi hasagi hasagi hasagi hasagi hasagi hasagi hasagi hasagi hasagi hasagi hasagi hasagi hasagi hasagi hasagi hasagi hasagi hasagi hasagi hasagi hasagi hasagi hasagi hasagi hasagi</p>
            <p class="date">Date de l'événement</p>
            <button type="button" class="btn btn-warning">S'inscrire</button>
        </div>

        <!-- END MAIN -->
    </div>
</main>

<?php
include_once("footer.php");
?>




</body>
</html>
