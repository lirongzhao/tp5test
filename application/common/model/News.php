<?php

namespace app\common\model;

use think\Model;

use traits\model\SoftDelete;

class News extends Model
{
    //
    protected $table='news';//可以不加，默认是类名
    //引入软删除机制
   use SoftDelete;
    public function user()
    {
        return $this->belongsTo('User','uid');
    }

}
