<?php

namespace app\Controllers;
use app\Models\Article as ArticleModel;

class Home extends Controller{

    public function index(){
        $article = new ArticleModel();
        $articles = $article->all();
        return $this->view('index', compact('articles'));
    }

}
