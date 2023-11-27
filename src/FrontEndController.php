<?php
declare(strict_types=1);

namespace App;

use App\Model;
use App\FrontEndView;
use App\Helper as h;


class FrontEndController
{
    private Model $model;
    private FrontEndView $view;

    public function __construct(FrontEndView $view, $model)
    {
        $this->model = $model;
        $this->view = $view;
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






}

