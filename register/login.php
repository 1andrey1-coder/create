<?php
declare(strict_types = 1);
//error_reporting(E_ALL);
//ini_set('display_errors', 'on');
//
//
//?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Forms / Layouts - NiceAdmin Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">


    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <link href="/admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/admin/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/admin/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/admin/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="/admin/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="/admin/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="/admin/vendor/simple-datatables/style.css" rel="stylesheet">

    <link href="/admin/css/style.css" rel="stylesheet">

</head>

<body>
<main id="main" class="main">


<section class="section">
    <div class="row">
        <div class="col-lg-6">

<div class="card">
    <div class="card-body" >
        <h5 class="card-title">Регистрация</h5>

        <!-- Horizontal Form -->
        <form action="/papik/formregister.php" method="POST" class="osnova">
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Login</label>
                <div class="col-sm-10">
                    <input placeholder="Имя Валеры"  name="login" type="text" class="form-control" id="login">
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Pass</label>
                <div class="col-sm-10">
                    <input placeholder="Фак это не то" name="password" type="password" class="form-control" id="password">

                </div>
            </div>

            <div class="text-center">
                <button type="submit" href="template/frontend/layout.twig" name="btnLogin"class="btn btn-primary">Войти</button>
                <button type="reset" class="btn btn-secondary">Перезайти</button>
            </div>
        </form>

    </div>
</div>
        </div>
    </div>
</section>
</main>
</body>

</html>