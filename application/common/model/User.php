<?php

namespace app\common\model;

use think\Model;
use traits\model\SoftDelete;

class User extends Model
{
    use SoftDelete;

    //用户所发表的新闻
    public function newss(){
        return $this->hasMany('News','uid');
    }

}
