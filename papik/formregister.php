<?php
session_start();
include_once 'papik/function.php';
function login()
{

    if (!isset($_POST['btnLogin'])) {
//        echo showForm();
//        echo 'Pipi';
//        include 'register/login.php';
    } else {
        if (checkLogin($_POST['login'], $_POST['password'])) {
            $_SESSION['user'] = 'admin';
//            include 'admin/admin.php';
            echo 'четко а че сюда бросает';
        } else{
            $_SESSION['user'] = 'user';
//            include 'template/frontend/layout.twig';
            echo 'новости а че сюда бросает';
        }

    }



}






function showForm(): string
{
    return $form = '
    <!-- Horizontal Form -->
              <form action=""method="post">
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Login</label>
                  <div class="col-sm-10">
                    <input placeholder="Имя Валеры" name="login" type="text" class="form-control" id="login">
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label for="inputPassword3" class="col-sm-2 col-form-label" >Password</label>
                  <div class="col-sm-10">
                    <input placeholder="Три цифры с карты" name="password" type="password" class="form-control"id="password">
                  </div>
                </div>
               
             
                <div class="text-center">
                  <button type="submit" name="btnLogin" class="btn btn-primary">Вход</button>
                  <button type="reset" class="btn btn-secondary">Перезайти</button>
                </div>
              </form><!-- End Horizontal Form -->
    
    ';



  //  return $form ='
//    <form action=""method="post">
//          <Input type="text" name="login" placeholder="Имя бравлера">
//          <Input type="password" name="password" placeholder="Три цифры с карты">
//          <Input type="submit" name="btnLogin">
//    </form>
  // ';
}
function goUrl(string $url){
    echo '<script type="text/javascript">location="';
    echo $url;
    echo '";</script>';
}






function main()
        {
            if ($_SESSION['$user'] = 'admin') {
                echo '<h1> <a href="php?action=logout">Назад</a><br></h1>';
            }

        }
function logout()
        {
            $_SESSION['user'] = 'user';
        }


?>



