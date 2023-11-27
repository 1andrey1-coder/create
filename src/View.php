<?php
declare(strict_types=1);

namespace App;


class View
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

    public function ObratnoNews()
    {
        echo $this->twig->render('layout.twig');
    }










}
