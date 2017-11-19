<?php
namespace app\admin\controller;

use app\admin\logic\UserLogic;
use app\index\controller\BaseController;
use think\Request;

class UserController extends BaseController
{

    /**
     * 登录
     * @param Request   $request
     * @param UserLogic $logic
     *
     * @return \think\response\Json|\think\response\View
     */
    public function login(Request $request,UserLogic $logic)
    {
        if ($request->isPost()) {
            $logic->login($request->post());
            if ($logic->hasError()) {
                return $this->returnJsonError($logic->getError());
            }
            return $this->returnJsonSuccess();
        } else {
            return view('user/login');
        }
    }

}