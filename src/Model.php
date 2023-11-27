<?php
declare(strict_types=1);
namespace App
{
    class Model
    {

        public function getArticles(): array
        {
            return json_decode(file_get_contents(filename: 'art.json'), associative: true);
        }
        public function getArticleById(string $id): array
        {
            $articleList = $this->getArticles();
            $currentArticle = [];
            if(array_key_exists($id, $articleList)){
                $currentArticle = $articleList[$id] ;
            }
            return $currentArticle;
        }



    }
}


