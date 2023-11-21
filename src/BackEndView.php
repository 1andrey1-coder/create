<?php
declare(strict_types=1);

namespace App;


class BackEndView
{

    public $loader;
    public $twig;


    public function __construct()
    {
        $this->loader = new \Twig\Loader\FilesystemLoader('template/frontend');
        $this->twig = new \Twig\Environment($this->loader, []);
    }

    public function showArticleList(array $articles)
    {
        echo $this->twig->render('blog.twig', ['articles' => $articles]);
    }

    public function showSingleArticle($article)
    {
        echo $this->twig->render('single-page.twig', ['article' => $article]);
    }

    public function LoginObrat(array $articles)
    {
        echo $this->twig->render('layout.twig', ['articles' => $articles]);
    }

    public function showLoginPanel()
    {
        echo $this->twig->render('login-panel.twig');
    }

    public function AdminView()
    {
        echo $this->twig->render('admin-panel.twig');

    }


}