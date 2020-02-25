<?Php $this->f3 = \Base::instance(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $pageTitle; ?> | Webber 101</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="<?php echo $SCHEME.'://'.$HOST.$BASE.'/'; ?>" />
    <link rel="icon" href="/img/logos/favicon.png">

    <!--Import Materialize CSS-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="/css/materialize/1.0.0/materialize.css">

    <!-- Import google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Squada+One&display=swap" rel="stylesheet">

    <link type="text/css" rel="stylesheet" href="/css/custom.css" />

</head>

<body>
    <header>
            <nav class="hide-on-med-and-up">
                <div class="nav-wrapper">
                    <a href="#!" class="brand-logo">Logo</a>
                    <a href="#" data-target="mobile-nav" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                </div>
            </nav>
            <ul class="sidenav" id="mobile-nav">
                <li><a href="/homepage"><i class="material-icons">home</i>Homepage</a></li>
                <li><a href="/us"><i class="material-icons">home</i>Us</a></li>
                <li><a href="/trips"><i class="material-icons">plane</i>Our trips</a></li>
            </ul>
    </header>
    <main>
        <?php echo $this->render(Base::instance()->get('content')); ?>
    </main>
    <footer>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <script type="text/javascript" src="/js/main.js"></script>
    </footer>
</body>

</html>