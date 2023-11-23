<?php


namespace App;

use Ebog\Helper as h;

class PDOFrontEntControler
{
    private \Ebog\ModelPDO $pdomodel;
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
