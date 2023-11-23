<?php
namespace App;
class FrontEndView

{
    public $twig;

    public function __construct($twig)
    {
        $this->twig = $twig;
    }

    public function showSingleArticle($article)
    {
        echo $this->twig->render('single-page.twig', ['article' => $article]);
    }

    public function Error()
    {
        echo $this->twig->render('Error.twig', []);
    }


}