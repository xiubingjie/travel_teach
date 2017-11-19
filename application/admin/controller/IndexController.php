<?php
namespace app\admin\controller;

use app\admin\logic\IndexLogic;

class IndexController extends BaseController
{

    /**
     * 主页
     */
    public function index(IndexLogic $logic)
    {
        $menuList = $logic->getMenu();

        return view('index/index', [
            'menu' => $menuList
        ]);
    }

    public function content()
    {
        return '欢迎登陆';
    }

}