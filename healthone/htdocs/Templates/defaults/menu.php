<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/home">
            Sportcenter
        </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#myNavbar" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>


        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="/home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/categories">Sportapparaat</a>
                </li>
                <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
                    include_once (TEMPLATE_ROOT . '/admin/defaults/menuItems.php');
                } ?>
                <?php if(isset($_SESSION['logIn']) == false): ?>
                <li class="nav-item">
                    <a class="nav-link"  href="/registreren">Registreren</a>
                </li>
                <?php endif; ?>
                <li class="nav-item">
                    <a class="nav-link" href="/contact">Contact</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <?php if(isset($_SESSION['logIn'])): ?>
                <li class="nav-item">
                    <a class="nav-link" href="/logOut">uitloggen</a>
                </li>
                <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link" href="/logIn">inloggen</a>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>