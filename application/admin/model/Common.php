<?php
// +----------------------------------------------------------------------
// | tpCitrix [ WE ONLY DO WHAT IS NECESSARY ]
// +----------------------------------------------------------------------
// | Copyright (c) 2019 http://tpCitrix.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: tpCitrix < 2722279500@qq.com >
// +----------------------------------------------------------------------

namespace app\admin\model;
use \think\Db;
use \think\Model;
use \think\Session;
class Common extends Model
{
    /**
     * [loginPublish 登录表单]
     * @return [type] [description]
     */
	public function loginPublish()
    {
    	$post = Request()->post();
        //验证  唯一规则： 表名，字段名，排除主键值，主键名
        $validate = new \think\Validate([
            ['userName', 'require|email', '账号不能为空|账号格式不符'],
            ['password', 'require', '密码不能为空'],
            ['verifyCode','require|captcha','验证码不能为空|验证码不正确'],
        ]);
        //验证部分数据合法性
        if (!$validate->check($post)) 
        {
            exit(json_encode(['code'=>0,'msg'=>'提交失败：' . $validate->getError()]));
        }
        if($info = Db::name("admin")->where(['username'=>$post['userName'],'password'=>citrixPassword($post['password'])])->find())
        {
            $data['login_num'] = $info['login_num']+1;
            $data['login_time'] = time();
            $data['login_ip'] = Request()->ip();
            $data['login_token'] = citrixGetTokenParam(implode(explode('.',$data['login_ip'])));
            if(true == Db::name("admin")->where(['username'=>$post['userName'],'password'=>citrixPassword($post['password'])])->update($data))
            {
                Session::set("_Admin",['id'=>$info['id'],'login_token'=>$data['login_token']]);
                exit(json_encode(['code'=>1,'msg'=>'操作成功','url'=>url('/admin/index/index')]));
            }
            exit(json_encode(['code'=>0,'msg'=>'提交失败：网络异常']));
        }
        exit(json_encode(['code'=>0,'msg'=>'提交失败：账号或密码错误']));
    }
}