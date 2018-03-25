<?php

namespace app\index\controller;

use app\common\model\User;
use think\Controller;
use think\Request;

class UserController extends BaseController
{
    public function register(){
        return $this->fetch();
    }
    public function doregister(Request $request){
        $user=new User();
        $captcha=input('captcha');
        //校验验证码的有效性
        if(!captcha_check($captcha,'register')){
            return $this->error('验证码输入错误，请重试！');
        }
        //获取表单数据
        $user->username=$request->param('username');
        $user->password=md5(input('password'));
        //插入到数据库中
        if($user->save()){//注册成功
            return $this->success('注册成功','/index/user/login');
        }else{//注册失败
            return $this->error('注册失败，请重试');

        }
    }
    public function login(){
        return $this->fetch();
    }
    public function dologin(){
        $captcha=input('captcha');
        //校验验证码的有效性
        if(!captcha_check($captcha,'login')){
            return $this->error('验证码输入错误，请重试！');
        }
        //获取表单数据
        $condition=[];
        $condition['username']=input('username');
        $condition['password']=md5(input('password'));
        $user=User::where($condition)->find();
        if($user){
            session('loginedUser',$user->username);
            return $this->success('用户登录成功','/admin/news');
        }else{
            return $this->error('用户名或密码错误');
        }
    }
    public function logout(){
        session('loginedUser',NULL);
        return $this->redirect('/');
    }
    //修改密码；激活邮件功能；登录之后不能再登录
}
