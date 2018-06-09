
<!DOCTYPE html>
<html lang="en">
<head>
    <title>News-site</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="stylesheet" type="text/css" href="/css/styleNav.css">
    <link rel="stylesheet" type="text/css" href="/css/carusel.css">
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">


</head>
<div id="wrap" style="background-color: <?=Session::get('background_main')?>">
    
    <div style="display: none;">
        <div class="box-modal" id="boxUserFirstInfo">
            <div class="box-modal_close arcticmodal-close">закрыть</div>
            <h1>Подписаться?</h1>
            <form>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" placeholder="Email">
                </div>
                <button class="arcticmodal-close btn btn-default">Подписаться</button>
            </form>
        </div>
    </div>

    <div id="header">
        <nav class="navbar-expand-md navbar-dark bg-dark fixed-top">
            <div class="collapse navbar-collapse navbar-brand" id="navbarSupportedContent">
                <ul class="navbar-nav mr-4">
                    <li class="nav-item">
                        <input class="form-control mr-sm-2" type="text" id="searchHeader" placeholder="Search" aria-label="Search" onkeyup="autocomplet()">
                        <ul id="list_id"></ul>

                    </li>

                    <?php if(Session::get('login') != null) { ?>
                        <li><a href="/cabinet/index/" id="showLogin"> <i class="fa fa-user"></i><?php Session::showLogin()?> </a></li>
                        <li><a href="/user/exit/"><i class="fa fa-unlock"></i> Выход</a></li>
                    <?php } else { ?>
                        <li><a href="/user/login/"> <i class="fa fa-lock"></i> LogIn</a></li>
                    <?php } ?>

                </ul>
            </div>
        </nav>

        <div class="container" id="secondNav">
            <ul class="navbar cf">
                <li><a href="/">Домой</a></li>
                <li><a href="/category/">Категории</a>
                    <ul class="ulColor">
                        <li>
                            <a href="/category/analytic">Аналитика</a>
                        </li>
                        <li><a href="">Список</a>
                                <ul>
                                    <?php $categories = Category::getCategoriesList() ?>
                                    <?php foreach ($categories as $categoryNav): ?>
                                    <li><a href="/category/<?=$categoryNav['id']?>"><?=$categoryNav['title']?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                        </li>
                   </ul>

                </li>
            </ul>
        </div>
    </div>

    <div id="main" class = "clearfix">