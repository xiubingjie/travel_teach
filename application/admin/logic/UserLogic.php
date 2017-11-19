<?php
namespace app\admin\logic;

use app\admin\model\User;

class UserLogic extends BaseLogic
{

    /**
     * 登录
     * @param $data
     */
    public function login($data)
    {
        //登录验证
        $user = new User();
        $info = $user->verifyUser($data);
        if ($user->hasError()) {
            return $this->setError($user->getError());
        }

        //存储登录信息
        $info['mid'] = $info['id'];
        $info['user_role'] = $info['travel_role'];
        session('userDetail',$info);
    }

}