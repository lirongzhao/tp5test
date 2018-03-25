<?php

namespace app\admin\controller;

use app\common\model\News;
use app\common\model\User;
use think\Controller;
use think\Request;


class NewsController extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    //数据添加或修改时所使用的字段名称
    protected $fields=['name','desc','content','uid'];
    public function index()
    {
        //获取分页数据  注意命名空间
        $rows=News::paginate(8);
        //
        $this->assign('rows',$rows);
        return $this->fetch();
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        $this->assign('users',User::all());
        return $this->fetch();
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        $news =new News();
        foreach ($this->fields as $f){
            $news->$f=input($f);
        }
        //等价于上面的foreach循环
//        $news->name=input('name');
//        $news->desc=input('desc');
//        $news->content=input('content');
//        $news->uid=input('uid');
        //插入到数据库中
        if($news->save()){
            return $this->success('数据插入成功','/admin/news');
        }else{
            return $this->error('数据插入失败');
        }
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        $this->assign('users',User::all());
        $this->assign('row',News::get($id));
        return $this->fetch();
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        $news =News::get($id);
        foreach ($this->fields as $f){
            $news->$f=input($f);
        }
        //等价于上面的foreach循环
//        $news->name=input('name');
//        $news->desc=input('desc');
//        $news->content=input('content');
//        $news->uid=input('uid');
        //更新到数据库中
        if($news->save()){
            return $this->success('数据更新成功','/admin/news');
        }else{
            return $this->error('数据更新失败');
        }
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        echo 'delete-',$id;
        $news=News::get($id);
        if($news->delete()){
            return "ok";
        }else{
            return "error";
        }
    }
}
