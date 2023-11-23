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

    public function __construct(FrontEndView $view, $model)
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
        $article = $this->model->getArticleById($id);
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




}

