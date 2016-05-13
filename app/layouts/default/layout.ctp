<html lang="en">
<head>
    <title><?=$pageTitle?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/main.css">
</head>
<body>
    <nav class="navbar navbar-inverse marg-bot">
        <div class="container">
            <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar2">&#9776;</button>
            <a class="hidden-sm-up menu" href="/">EMILVOOO</a>
            <div class="collapse navbar-toggleable-xs" id="exCollapsingNavbar2">
                <a class="navbar-brand hidden-xs-down" href="/"><b>EMILVOOO</b></a>
                <ul class="nav navbar-nav">
                    <li class="nav-item"><a href="/">Home</a></li>
                    <li class="nav-item"><a href="/news/overview">Nieuws</a></li>
                    <li class="nav-item"><a href="/gallery/overview">Gallery</a></li>
                    <li class="nav-item"><a href="/admin">Admin</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <?php echo $this->content; ?>
</body>
</html>
