<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo 'EMILVOOO || '.$pageName; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/main.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
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
                    <li class="nav-item"><a href="/news/index">News</a></li>
                    <li class="nav-item"><a href="/gallery/index">Gallery</a></li>
                    <li class="nav-item"><a href="/contact/index">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <h4 class="panel-title-heading"><?php echo $pageName; ?></h4>
        <?php echo $this->content; ?>
    </div>
    <script rel="script" src="/js/core.js"></script>
</body>
</html>
