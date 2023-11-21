<?php
declare(strict_types = 1);
function getArticles(): array
{
    return  json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'].'/art.json'), true);
}
function dd($some)
{
    echo '<pre>';
    print_r($some);
    echo '</pre>';
}



function getArticlesId(): string
{
    $arr = getArticles();
    $str ='';
        foreach ($arr as $item) {
            $str .= '<li> <a href="content.php?id=' . $item['id'] . '">  ' . $item['title'] . '</a></li>';
        }
    return $str;

}

function getArticleById(int $id): array
{
    $articleList = getArticles();
    $currentArticle = [];
    if(array_key_exists($id, $articleList)){
        $currentArticle = $articleList[$id] ;
    }
        return $currentArticle;
}

function getArticleContent(): string
{


    if(isset($_GET['id']))
    {
        $id = (int) $_GET['id'];
        $pupa = getArticleById($id);
    }else{
        $pupa = '';
    }

       if(empty($pupa)){
           $content = '<h2> Статьи для просмотра </h2>';

       }else{
           $content ='<img src="';$content .= $pupa['image'];$content .= '"><div class="body"><h5 class="card-title">';$content .=  $pupa['title'];
           $content .=  '</h5><br class="card-text">'. $pupa['content']. '</br></div></div>';


       }
       return $content;

}




