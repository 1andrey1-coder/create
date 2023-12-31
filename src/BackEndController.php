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
    public function __construct($model, $view)
    {

        $this->model =$model;
        $this->view = $view;
    }

    public function EditStat($id)
    {
        $article = $this->model->getArticleByID($id);
        $this->view->showEdit($article);
    }
    public function SaveStat()
    {

    }
    public  function UpdateStat()
    {
        if(isset($_POST['btnOk']))
        { //unset($_POST['btnOk']);
            $arrs = $this->model->getArticles();
            if(isset($_POST['idEdit']))
            {
                $arrs[$_POST['idEdit']]['title'] = $_POST['inputTitle'];
                $arrs[$_POST['idEdit']]['content'] = $_POST['inputContent'];
                //unset($_GET['idEdit']);
            }
            else{
                $id = end($arrs);
                $arr2 = array('id' => ++$id['id'],
                    'title' => $_POST['inputTitle'],
                    'image' => '',
                    'content' => $_POST['inputContent']);
                array_push($arrs, $arr2);
            }
            file_put_contents('asd.json', json_encode($arrs));
        }
        \Ebog\Helper::goUrl('/admin');
    }
    public function DeleteStat($id)
    {
        if (isset($id)) {
            $arr = $this->model->getArticles();
            //dd($arr);
            unset($arr[$id]);
            // dd($arr);
            file_put_contents('asd.json', json_encode($arr));
            h::goUrl('/admin');
        }
    }
    public function auth()
    {
        if (!isset($_POST['btnLogin'])) {
            $this->LoginView();
            exit;
        } else {
            if ($this->checkLogin($_POST['login'], $_POST['password'])) {
                $_SESSION['user'] = 'admin';
                //echo 'Вы залогинелись';
                h::goUrl('/state');
            } else {
                h::goUrl('/state');
            };
        }
    }
    public function ShowAdd()
    {
        $article = array('id' => 0,
            'title' => '',
            'image' => '',
            'content' => '');
        $this->view->showAdd($article);
    }
    public function Save($id)
    {
        //$arrs = $this->model->getArticles();

        $arrs[$_POST['idEdit']]['title'] = $_POST['inputTitle'];
        $arrs[$_POST['idEdit']]['content'] = $_POST['inputContent'];

        file_put_contents('asd.json', json_encode($arrs));
    }

    public function LoginView()
    {
        $this->view->showLoginPanel();
    }
    public function showAdminPanel()
    {
        $article = $this->model->getArticles();
        $this->view->AdminView($article);
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

