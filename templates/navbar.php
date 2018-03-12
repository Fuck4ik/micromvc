<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="/"><?= PROJECT_NAME ?></a>
        </div>
        <ul class="nav navbar-nav">
            <?php foreach (Navbar::$menu as $route => $nav) { ?>
                <?php if ($route == Navbar::$active) { ?>
                    <li class="active"><a href="#"><?= $nav['title'] ?></a></li>
                <?php } else {  ?>
                    <li><a href="?act=<?= $route ?>"><?= $nav['title'] ?></a></li>
                <?php } ?>
            <?php } ?>
        </ul>
    </div>
</nav>