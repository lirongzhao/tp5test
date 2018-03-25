<?php

namespace app\index\controller;

use app\common\model\News;
use think\Controller;

class IndexController extends BaseController
{
    public function index(){
        //从模型中读取数据
        $newss=News::all();
        //把数据赋值给视图
        $this->assign('newss',$newss);
        //显示视图
        return $this->fetch();
    }
}
