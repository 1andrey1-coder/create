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

    public function showEdit($id)
    {
        
    }



    public function showArticleList(array $articles)
    {
        echo $this->twig->render('blog.twig', ['articles' => $articles]);
    }

    public function showAdd()
    {
        echo $this->twig->render('page-add-state.twig');
    }
    public function showLoginPanel()
    {
        echo $this->twig->render('login-panel.twig');
    }
    public function AdminView($article)
    {
        echo $this->twig->render('admin-content.twig', ['articles' => $article]);

    }


}
