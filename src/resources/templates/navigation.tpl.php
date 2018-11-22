<nav class="navbar fixed-top navbar-expand-lg bg-primary">
    <div class="container">
        <a class="navbar-brand" href="#">LOGO</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item <?php if ($CURRENT_PAGE == "Index") {?>active<?php }?>">
                    <a class="nav-link" href="index.php">Listar</a>
                </li>
                <li class="nav-item <?php if ($CURRENT_PAGE == "Registar") {?>active<?php }?>">
                    <a class="nav-link" href="registar.php">Registar</a>
                </li>
            </ul>
        </div>
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="material-icons">face</i>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <span class="dropdown-item"
                        onclick="document.getElementById('logout-form').submit();">Sair
                    </span>
                    <form id="logout-form" style="display:none" action="logout.php" method="post">
                        <input type="hidden" name="logout-submit"> 
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>