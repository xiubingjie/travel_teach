<?php
namespace app\admin\model;

use think\Model;

class Base extends Model
{
    public function hasError()
    {
        return !empty($this->error);
    }

    public function setError($msg)
    {
        return $this->error = $msg;
    }

}