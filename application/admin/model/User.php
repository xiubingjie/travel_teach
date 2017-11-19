<?php
namespace app\admin\model;

class User extends Base
{

    // 定义时间戳字段名
    protected $createTime = 'create_date';
    protected $updateTime = 'update_date';

    // 开启自动写入时间戳字段
    protected $autoWriteTimestamp = true;

    // 定义全局的查询范围
    protected function base($query)
    {
        $query->where('del_flag', 0);
    }


    //修改表名称
    protected $table = 'sys_user';

    /**
     * 用户登录验证
     * @param $data
     *
     * @return array|false|\PDOStatement|string|\think\Model
     */
    public function verifyUser($data)
    {
        //用户名验证
        $info = $this->where('login_name', $data['user_name'])
            ->find();
        if (empty($info)) {
            return $this->setError('用户不存在');
        }
        //密码验证
        $password = md5(md5($data['password']));
        if ($info->password != $password) {
            return $this->setError('用户密码不对');
        }

        unset($info->password);
        return $info->toArray();
    }
}