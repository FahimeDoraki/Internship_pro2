<?php

namespace app\Controllers;

use app\Models\Article as ArticleModel;


class Article extends Controller{

    public function create(){
        $article = new ArticleModel();
        $articles = $article->all();
        return $this->view('article.create', compact('articles'));
    }

    public function store(){ 
        if(isset($_POST["submit"])) {
        $target_dir = "/public/Images/";
        $target_file =  $_SERVER['DOCUMENT_ROOT'] . $target_dir . basename($_FILES["image"]["name"]);
        $supported_image = array(
            'webp',
            'jpg',
            'jpeg',
            'png',
            'avif'
        );
        if(in_array(pathinfo($_FILES["image"]["name"],PATHINFO_EXTENSION), $supported_image)){
            if($_FILES["image"]["size"] < 10485760 ){
                if(!file_exists($target_file)){
                    move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
                }
                $Data=[
                    'title'=>$_POST['title'],
                    'text'=>$_POST['text'],
                    'image'=>$_FILES['image']['name']
                ];
                $article = new ArticleModel();
                $article->insert($Data);
                session_unset();
                return $this->redirect('/');
            }else{
                $_SESSION["error"] = "حجم عکس بزرگتر از حد مجاز است";
                      return $this->back();
            }
           
        }else{
            $_SESSION["error"] = "فرمت فایل مجاز نمیباشد";
                  return $this->back();
        }

       
        }
     
    }


    public function show($id){
        $articles = new ArticleModel();
        $article = $articles->find($id);
        return $this->view('article.show', compact('article'));

    }

    public function destroy($id){ 
        $article = new ArticleModel();
        $article->delete($id);
        return $this->redirect('/');
    }

}