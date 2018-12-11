<?php
/**
 * Created by PhpStorm.
 * CustomerModel: Administrator
 * Date: 2018/11/14
 * Time: 14:09
 */
namespace app\admin\controller;

use app\admin\model\NodeModel;

class Node extends Base
{
    // 节点列表
    public function index()
    {
        if(request()->isAjax()){
            $node = new NodeModel();
            $nodes = $node->getNodeList();
            $nodes = getTree(objToArray($nodes), false);
            return json(msg(1, $nodes, 'ok'));
        }

        return $this->fetch();
    }

    // 添加节点
    public function nodeAdd()
    {
        $param = input('post.');

        $node = new NodeModel();
        $flag = $node->insertNode($param);
        $this->removRoleCache();
        return json(msg($flag['code'], $flag['data'], $flag['msg']));
    }

    // 编辑节点
    public function nodeEdit()
    {
        $param = input('post.');

        $node = new NodeModel();
        $flag = $node->editNode($param);
        $this->removRoleCache();
        return json(msg($flag['code'], $flag['data'], $flag['msg']));
    }

    // 删除节点
    public function nodeDel()
    {
        $id = input('param.id');

        $role = new NodeModel();
        $flag = $role->delNode($id);
        $this->removRoleCache();
        return json(msg($flag['code'], $flag['data'], $flag['msg']));
    }
}
