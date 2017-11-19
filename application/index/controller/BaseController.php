<?php
namespace app\index\controller;

class BaseController
{

    protected function returnJsonError($msg)
    {
        return json([
            'code' => 2,
            'msg'  => $msg,
            'data' => null
        ]);
    }

    protected function returnJsonSuccess($msg = '操作成功')
    {
        return json([
            'code' => 1,
            'msg'  => $msg,
            'data' => null
        ]);
    }

    protected function returnJsonData($data)
    {
        return json([
            'code' => 1,
            'msg'  => '操作成功',
            'data' => $data
        ]);
    }

}