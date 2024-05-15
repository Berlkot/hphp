<?php
//frontcontroller
    //автозагрузка классов
    spl_autoload_register(function (string $className){
        require('../'.str_replace('\\', '/', $className).'.php');
    });
    //маршрутизатор
    $pageFound = false;
    $url = $_GET['route'] ?? "";
    $routes = require('../src/routes.php');
    //сравниваем часть массива из routes.php с url
    foreach($routes as $pattern => $controllerAndAction){
        preg_match($pattern, $url, $matches);
        if (!empty($matches)){
            $pageFound = true;
            //вырезаем полное совпадение по маске оно нам не нужно 
            unset($matches[0]);
            //создаем объект контроллера 
            $controller = new $controllerAndAction[0];
            //создаем переменную действия
            $action = $controllerAndAction[1];
            $controller->$action(...$matches);
        }
    }
    if (!$pageFound) echo 'Страница не найдена';
    // $user = new src\Models\Users\User('ivan');
    // $article = new src\Models\Articles\Article('title', 'text', $user);
    // var_dump($article); 

    // if (isset($_GET['name']) && !empty($_GET['name'])){
    //     $controller->sayHello($_GET['name']);
    // }else $controller->main();

    // echo '<br>'.$_GET['route'];