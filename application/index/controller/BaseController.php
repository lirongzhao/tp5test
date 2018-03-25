<?php

namespace app\index\controller;

use app\common\model\Menu;
use think\Controller;
use think\View;

class BaseController extends Controller
{
    public function _initialize()
    {
        //初始化方法
       View::share('menus',Menu::all());
    }
}
