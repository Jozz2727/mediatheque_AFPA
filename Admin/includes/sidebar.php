  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=URL_ADMIN?>"> <!-- href="index.html" -->

    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Mediathèque Admin <sup>2</sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="<?=URL_ADMIN?>">    <!-- index.php" -->

        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Modules
</div>

<!-- Nav Item - Pages Collapse Menu  Catégories-->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#livres"
        aria-expanded="true" aria-controls="livres">
        <i class="fas fa-book-open"></i>
        <span>Livres</span>
    </a>
    <div id="livres" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Gestion des livres :</h6>
            <a class="collapse-item" href="<?= URL_ADMIN?>livres/index.php">Liste des livres</a>
            <a class="collapse-item" href="<?= URL_ADMIN?>livres/add.php">Ajouter un livre</a>
        </div>
    </div>
</li>

<!-- Nav Item - Pages Collapse Menu  Usagers-->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#usagers"
        aria-expanded="true" aria-controls="usagers">
        <i class="fas fa-book-open"></i>
        <span>Usagers</span>
    </a>
    <div id="usagers" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Gestion des usagers :</h6>
            <a class="collapse-item" href="<?= URL_ADMIN?>usager/index.php">Liste des usagers</a>
            <a class="collapse-item" href="<?= URL_ADMIN?>usager/add.php">Ajouter un usager</a>
        </div>
    </div>
</li>

<!-- Nav Item - Pages Collapse Menu  Location-->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#location"
        aria-expanded="true" aria-controls="location">
        <i class="fas fa-book-open"></i>
        <span>Location</span>
    </a>
    <div id="location" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Gestion des locations :</h6>
            <a class="collapse-item" href="<?= URL_ADMIN?>location/index.php">Liste des locations</a>
            <a class="collapse-item" href="<?= URL_ADMIN?>location/add.php">Ajouter un location</a>
        </div>
    </div>
</li>

<!-- Nav Item - Pages Collapse Menu  Location-->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#categorie"
        aria-expanded="true" aria-controls="categorie">
        <i class="fas fa-book-open"></i>
        <span>Catégories</span>
    </a>
    <div id="categorie" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Gestion des catégories :</h6>
            <a class="collapse-item" href="<?= URL_ADMIN?>categorie/index.php">Liste des categories</a>
            <a class="collapse-item" href="<?= URL_ADMIN?>categorie/add.php">Ajouter un categorie</a>
        </div>
    </div>
</li>

<!-- Nav Item - Pages Collapse Menu  Auteurs-->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#auteurs"
        aria-expanded="true" aria-controls="auteurs">
        <i class="fas fa-book-open"></i>
        <span>Auteurs</span>
    </a>
    <div id="auteurs" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Gestion des auteurs :</h6>
            <a class="collapse-item" href="<?= URL_ADMIN?>Auteurs/index.php">Liste des auteurs</a>
            <a class="collapse-item" href="<?= URL_ADMIN?>Auteurs/add.php">Ajouter un auteur</a>
        </div>
    </div>
</li>

<!-- Nav Item - Pages Collapse Menu  Editeurs-->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#editeurs"
        aria-expanded="true" aria-controls="editeurs">
        <i class="fas fa-book-open"></i>
        <span>Editeurs</span>
    </a>
    <div id="editeurs" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Gestion des éditeurs :</h6>
            <a class="collapse-item" href="<?= URL_ADMIN?>editeurs/index.php">Liste des editeurs</a>
            <a class="collapse-item" href="<?= URL_ADMIN?>editeurs/add.php">Ajouter un editeurs</a>
        </div>
    </div>
</li>





<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Utilities</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Utilities:</h6>
            <a class="collapse-item" href="utilities-color.html">Colors</a>
            <a class="collapse-item" href="utilities-border.html">Borders</a>
            <a class="collapse-item" href="utilities-animation.html">Animations</a>
            <a class="collapse-item" href="utilities-other.html">Other</a>
        </div>
    </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Gérér les auteurs
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
        aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-folder"></i>
        <span>Auteurs</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Login Screens:</h6>
            <a class="collapse-item" href="<?=URL_ADMIN?>Auteurs/add.php">Ajouter un auteur</a>
            <a class="collapse-item" href="register.html">Modifier un livre</a>
            <a class="collapse-item" href="forgot-password.html">Mot de passe oublié ?</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Other Pages:</h6>
            <a class="collapse-item" href="404.html">404 Page</a>
            <a class="collapse-item" href="blank.html">Blank Page</a>
        </div>
    </div>
</li>

<!-- Nav Item - Charts -->
<li class="nav-item">
    <a class="nav-link" href="charts.html">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Charts</span></a>
</li>

<!-- Nav Item - Tables -->
<li class="nav-item">
    <a class="nav-link" href="tables.html">
        <i class="fas fa-fw fa-table"></i>
        <span>Tables</span></a>
</li>

<li class="nav-item">
    <a class="nav-link" href="http://localhost/client.php">
        <i class="fas fa-fw fa-table"></i>
        <span>Tables</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

<!-- Sidebar Message -->
<div class="sidebar-card d-none d-lg-flex">
    <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
    <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
    <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
</div>

</ul>
<!-- End of Sidebar -->