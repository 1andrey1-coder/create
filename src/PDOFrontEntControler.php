<?php


namespace App;

use App\Helper as h;

class PDOFrontEntControler
{
    private App\ModelPDO $pdomodel;
    public  function __construct($pdomodel)
    {
        $this->pdomodel = $pdomodel;
    }
    public  function Pdoi()
    {
        echo h::dd($this->pdomodel->getArticles());

    }
    public function PdoOne($id)
    {
        echo $this->pdomodel->getArticlesByID($id);
    }
}
