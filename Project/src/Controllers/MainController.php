<?php
namespace src\Controllers;
use src\Views\View;

class MainController{
    public $view;
    public function __construct(){
        $this->view = new View(__DIR__.'/../../templates/');
    }
    public function main(){
        $articles = [
            ['title'=>'new article title','text'=>'new text'],
            ['title'=>'old article title','text'=>'old text']
        ];
        $this->view->renderHtml('main/main', ['articles'=>$articles]);
    }

    public function sayHello(string $name){
        global $pageTitle;
        $pageTitle = "Страница приветствия";
        $this->view->renderHtml('main/hello', ['name'=>$name,'pageTitle'=>$pageTitle]);
    }

    public function sayBye(string $name){
        global $pageTitle;
        $pageTitle = "Страница прощания";
        $this->view->renderHtml('main/bye', ['name'=>$name,'pageTitle'=>$pageTitle]);
    }
}