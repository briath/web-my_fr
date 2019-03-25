<?php $this->setSiteTitle('ProPUBG - Home') ?>

<?php $this->start('head'); ?>
<?php $this->end(); ?>


<?php $this->start('body'); ?>
<header id="" class="card-header" role="banner">
    <div class="container">
        <h1 class="text-center red">Welcome to the league of Maxim</h1>
    </div>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="/web/index.php/register/login">Pro
                <img src="../../../web/docs/pictures/ProPUBG.png" width="35" height="35" class="d-inline-block align-top" alt="">
            </a>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="/web/index.php/main/index">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/web/index.php/main/index">Guides</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/web/index.php/main/index">Educational videos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/web/index.php/main/index">Graphs damage</a>
                    </li>
                </ul>
            </div>

            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </nav>
    </div>
</header>
<?php $this->end(); ?>
