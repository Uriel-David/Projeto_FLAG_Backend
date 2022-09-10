<nav class="navbar navbar-expand-md navbar-light bg-none" id="navbar-app">
    <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/about">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/contacts">Contacts</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/register">Register</a>
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
                    <a class="nav-link" href="/logout">Logout</a>
                <?php endif; ?>
            </li>
            <?php if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] != 1) : ?>
                <li class="nav-item">
                    <?php if (isset($_SESSION['stateLogin']) && $_SESSION['stateLogin'] == 'logged') : ?>
                        <a class="nav-link" href="/userPanel">User Panel</a>
                    <?php endif; ?>
                </li>
            <?php endif; ?>
            <?php if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 1) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?=  isset($_SESSION['stateLogin']) && $_SESSION['stateLogin'] == 'logged' ? '/getUsers' : '/login'; ?>">
                        <?=  isset($_SESSION['stateLogin']) && $_SESSION['stateLogin'] == 'logged' ? $_SESSION['username'] : 'Login'; ?>
                    </a>
                </li>
            <?php else : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?=  isset($_SESSION['stateLogin']) && $_SESSION['stateLogin'] == 'logged' ? '/getBoards' : '/login'; ?>">
                        <?=  isset($_SESSION['stateLogin']) && $_SESSION['stateLogin'] == 'logged' ? $_SESSION['username'] : 'Login'; ?>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>