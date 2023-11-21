<?php

declare(strict_types = 1);
error_reporting(E_ALL);
ini_set('display_errors', 'on');
$path = $_SERVER['DOCUMENT_ROOT'];

dd($_SESSION);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<div class="fulln">
    <?php
    echo getArticlesId();
    ?>
</div>

</body>
</html>