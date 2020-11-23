<div class="navbar navbar-default" role="navigation">
    <div class="navbar-inner">
        <button type="button" class="navbar-toggle pull-left animated flip">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index-2.html"> <img alt="Charisma Logo" src="img/logo20.png" class="hidden-xs" />
        <span>Mania</span></a>

        <div class="btn-group pull-right">
            <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"> <?php echo $_SESSION['username']; ?></span>
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <li><a href="profile.php">Profile</a></li>
                <li class="divider"></li>
                <li><a href="../includes/logout.php">Logout</a></li>
            </ul>
        </div>

        <ul class="collapse navbar-collapse nav navbar-nav top-menu">
            <li><a href="../index.php"><i class="glyphicon glyphicon-globe"></i> Visit Site</a></li>
            <li><a href="">Users Online : <span class="usersonline"><?php users_online(); ?></span></a></li>
        </ul>
    </div>
</div>

