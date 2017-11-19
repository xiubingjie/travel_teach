<?php
namespace app\admin\model;

class AdminMenu extends Base
{
    // 定义全局的查询范围
    protected function base($query)
    {
        $query->where('isdisplay', 1);
    }




}