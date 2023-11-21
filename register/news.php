<?php

declare(strict_types = 1);
error_reporting(E_ALL);
ini_set('display_errors', 'on');
$path = $_SERVER['DOCUMENT_ROOT'];

dd($_SESSION);

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Хреновые статьи</title>
    <link rel="stylesheet" href="StyleIndex.css">

</head>
<body>
<header>
    <H1>Статьи</H1>
</header>

<div class="sleva" href="переход к статье" >
    <?php
        echo getArticleContent( );
    ?>
</div>

<!--<div class="sprava" >-->
<!--    --><?php
//        echo getArticlesId();
//    ?>
<!--</div>-->

</body>
</html>
