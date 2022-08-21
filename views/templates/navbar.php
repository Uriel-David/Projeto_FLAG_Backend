<nav class="navbar navbar-expand-md navbar-light bg-none" id="navbar-app">
    <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/views/about.php">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/views/register.php">Register</a>
            </li>
        </ul>
    </div>
    <div class="mx-auto order-0">
        <a class="navbar-brand" href="/">Kanban Flow</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="navbar-collapse collapse w-100 order-3 dual-collapse">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a id="button-dark-mode" class="nav-link" href="#">
                    Dark Mode
                </a>
            </li>          
            <li class="nav-item">
                <?php if (isset($_SESSION['stateLogin']) && $_SESSION['stateLogin'] == 'logged') : ?>
                    <a class="nav-link" href="/../routes/web.php/logout">Logout</a>
                <?php endif; ?>
            </li>
            <li class="nav-item">
                <?php if (isset($_SESSION['stateLogin']) && $_SESSION['stateLogin'] == 'logged') : ?>    
                    <a class="nav-link" href="<?=  isset($_SESSION['stateLogin']) && $_SESSION['stateLogin'] == 'logged' ? '/routes/web.php/login' : '/views/login.php'; ?>">
                        <?=  isset($_SESSION['stateLogin']) && $_SESSION['stateLogin'] == 'logged' ? $_SESSION['username'] : 'Login'; ?>
                    </a>
                <?php else : ?>
                    <a class="nav-link" href="<?=  isset($_SESSION['stateLogin']) && $_SESSION['stateLogin'] == 'logged' ? '/routes/web.php/getBoards' : '/views/login.php'; ?>">
                        <?=  isset($_SESSION['stateLogin']) && $_SESSION['stateLogin'] == 'logged' ? $_SESSION['username'] : 'Login'; ?>
                    </a>
                <?php endif; ?>
        </ul>
    </div>
</nav>