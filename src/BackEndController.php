<?php
declare(strict_types=1);

namespace App;

use App\Model;
use App\BackEndView;
use App\Helper as h;


class BackEndController
{

    private \App\Model $model;
    private \App\BackEndView $view;
    public function __construct()
    {

        $this->model = new \App\Model();
        $this->view = new  \App\BackEndView();
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

    public function showAdminPanel()
    {
        $this->view->AdminView();
    }



    public function Login()
    {

        if (!isset($_POST['btnLogin'])) {

            echo $this->showLoginPanel();

        } else {
            if ($this->checkLogin($_POST['login'], $_POST['password'])) {
                $_SESSION['user'] = 'admin';
                $this->showAdminPanel();
//                echo $this->twig->render('admin-panel');

            } else {
                $_SESSION['user'] = 'user';
                $this->view->showArticleList($this->model->getArticles()) ;

//                echo $this->twig->render('layout.twig');
            }
        }
    }
    public function checkLogin(string $login, string $password): bool
    {
        if ($login == 'admin' and $password == '1') {

            return true;

        } else if ($login == 'user' and $password=='2') {
            return false;
        }
    }






}

