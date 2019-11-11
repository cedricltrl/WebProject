<nav class="navbar navbar-expand-md bg-dark">
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto align-items-center">
    <li class="nav-item">
      <?php
      $currentPage = $_SERVER['PHP_SELF'];
      ?>
        <a class="nav-img" href="https://www.cesi.fr"><img src="Image/Cesi_Logo.jpg" width="125" height="60"></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" <?php if($currentPage == "/main.php") {echo "active";} ?> href="main.php">Home<span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" <?php if($currentPage == "/event.php") {echo "active";} ?> href="#">Events</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Autres services
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" <?php if($currentPage == "/bde.php") {echo "active";} ?> href="#">BDE</a>
          <a class="dropdown-item" <?php if($currentPage == "/clubs.php") {echo "active";} ?> href="#">Clubs</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" <?php if($currentPage == "/shop.php") {echo "active";} ?> href="#">Boutique</a>
          <a class="dropdown-item" <?php if($currentPage == "/galerie.php") {echo "active";} ?>href="#">Galerie</a>
        </div>
    </ul>
<div class="nav-item-end my-2 my-lg-0">
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
            
                <li>
                <a class="nav-link" href="connexion.php">Log in</a>
                  </li>
                  <li>
                  <a class="nav-link" href="register.php">Register</a>
                  </li>
        </div>
    </ul>
    </div>
  </div>
  
</nav>

