<?php
namespace app\admin\controller;

use think\Session;
use traits\controller\Jump;

class BaseController
{
    use Jump;

    public function __construct()
    {
        $this->verifyUser();
    }

    protected function verifyUser()
    {
        if (!Session::has('userDetail')) {
            $this->redirect('user/login');
        }
    }
}