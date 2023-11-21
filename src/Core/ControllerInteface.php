<?php
namespace App\Core;

use App\Model;

interface ControllerInterface{
    public function _construct(ModelInterface $model,ViewInteface $view);
}
