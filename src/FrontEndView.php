<?php

namespace App;

class FrontEndView

{
    public $twig;
    public $loader;

    public function __construct($twig)
    {
        $this->twig = $twig;
    }

    public function showArticleList(array $articles)
    {
        echo $this->twig->render('blog.twig', ['articles' => $articles]);
    }
    public function showSingleArticle($article)
    {
        echo $this->twig->render('single-page.twig', ['article' => $article]);
    }

    public function ObratnoNews()
    {
        echo $this->twig->render('layout.twig');
    }

    public function showLoginPanel()
    {
        echo $this->twig->render('login-panel.twig');
    }

    public function showAdminPanel()
    {
        echo $this->twig->render('admin-panel.twig');
    }



    public function Error()
    {
        echo $this->twig->render('Error.twig', []);
    }


}