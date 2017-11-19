<?php
namespace app\admin\logic;

use app\admin\model\AdminMenu;
use app\admin\model\Node;

class IndexLogic extends BaseLogic
{

    //获取菜单
    public function getMenu(){
        //获取一级菜单
        $node = new Node();
        $nodeList = $node->where('pid',0)->order('sort','asc')->select();

        //获取二三级菜单
        $adminMenu = new AdminMenu();
        $adminMenuList = $adminMenu->order("`parent_menu_code`,`display_order`")->select();

        //拆分二三级菜单
        $secondMenu = [];
        $thirdMenu = [];
        foreach ($adminMenuList as $k => $av) {
            $value = $av->toArray();
            if ($value['parent_menu_code'] === '0') {
                $secondMenu[$value['pid']][] = $value;
            } else {
                $thirdMenu[$value['pid']][] = $value;
            }
        }
        unset($adminMenuList);

        //合并二三级菜单
        foreach ($secondMenu as &$sv) {
            foreach ($sv as &$pv) {
                $pv['child'] = $thirdMenu[$pv['pid']];
                unset($pv);
            }
            unset($sv);
        }

        //合并全部菜单
        foreach ($nodeList as &$nv) {
            $nv = $nv->toArray();
            $nv['child'] = $secondMenu[$nv['id']];
        }
        unset($secondMenu);

        return $nodeList;
    }
}