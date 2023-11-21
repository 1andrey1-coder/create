<?php
declare(strict_types=1);

namespace App;

use App\Model;
use App\View;
use App\Helper as h;


class FrontEndController
{

    private \App\Model $model;
    private \App\View $view;

    public function __construct()
    {
        $this->model = new \App\Model();
        $this->view = new  \App\View();
    }

    public function articleList()
    {
        $articles = $this->model->getArticles();
        $this->view->showArticleList($articles);
    }

    public function contentArticle($id)
    {
        $article = $this->model->getArticleById((int)$id);
        $this->view->showSingleArticle($article);
    }

    public function LoginView()
    {
        $this->view->showLoginPanel();
    }

    public function AdminView()
    {
        $this->view->showAdminPanel();
    }

//    public function Login()
//    {
//        if (!isset($_POST['btnLogin'])) {
//            echo $this->twig->render('login-panel');
////        echo 'Pipi';
////        include 'register/login.php';
//        } else {
//            if (checkLogin($_POST['login'], $_POST['password'])) {
//                $_SESSION['user'] = 'admin';
////                include 'admin/admin.php';
////                echo 'четко';
//            } else {
//                $_SESSION['user'] = 'user';
////            include 'template/frontend/layout.twig';
////            echo 'новости';
//            }
//        }
//    }

//    public function Login()
//    {
//        $this->view->Obratno();
//    }


}

