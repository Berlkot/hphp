<?php

namespace src\Controllers;
use src\Views\View;
use src\Models\Articles\Article;

class ArticleController{
    public $view;
    public function __construct(){
        $this->view = new View(__DIR__.'/../../templates/');
    }

    public function index(){
       $articles = Article::findAll();
        $this->view->renderHTML('/articles/index',['articles'=>$articles]);
    }

    public function show(int $id){
        $article = Article::getById($id);
        
        if ($article === null) {
            $this->view->renderHTML('errors/error',[],404);
            return;
        }

        $this->view->renderHTML('articles/show',['article'=>$article]);
    }

    public function create(){
        $this->view->renderHTML('/articles/create');
    }

    public function store(){
        $article = new Article;
        $article -> setTitle($_POST['inputTitle']);
        $article -> setText($_POST['inputText']);
        $article -> setAuthorId($_POST['inputAuthorId']);
        $article -> save();
        header('Location: /Project/www/articles');
    }
    public function edit(int $id){
        $article = Article::getById($id);
        $this->view->renderHTML('articles/edit', ['article'=>$article]);
    }
    public function update(int $id){
        $article = Article::getById($id);
        $article -> setTitle($_POST['inputTitle']);
        $article -> setText($_POST['inputText']);
        $article -> setAuthorId($_POST['inputAuthorId']);
        $article -> save();
        header('Location: /Project/www/article/'.$article->getId());
    }
    public function delete(int $id){
        $article = Article::getById($id);
        $article -> delete();
        header('Location: /Project/www/articles');
    }
}
