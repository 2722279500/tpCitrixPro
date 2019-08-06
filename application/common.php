<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
/**
 * [p description]
 * @param  [type] $a [description]
 * @return [type]    [description]
 */
function p($a)
{
	if(!is_string($a) && !empty($a))
	{
		echo "<pre>";
		print_r($a);
		echo "</pre>";
	}
	elseif(!is_string($a) && empty($a))
	{
		echo "<pre>";
		var_dump($a);
		echo "</pre>";
	}else
	{
		echo $a;
	}
}
/**
 * [citrixPassword 密码加密方式]
 * @param  [type] $password      [密码]
 * @param  string $password_code [密码额外加密字符]
 * @return [type]                [description]
 */
function citrixPassword($password, $password_code='lshi4AsSUrUOwWVtpCitrixPro')
{
    return md5(md5($password) . md5($password_code));
}
/**
 * [citrixGetTokenParam 根据盐值生成token]
 * @param  [type] $ip [description]
 * @return [type]     [description]
 */
function citrixGetTokenParam($ip,$key='lshi4AsSUrUOwWVtpCitrixPro')
{
    $hash = md5($ip.$key);
    return base64_encode($hash);
}
/**
 * [citrixGetMenuCateName 获取权限模块id]
 * @param  [type] $menu_cate_id [description]
 * @return [type]               [description]
 */
function citrixGetMenuCateName($menu_cate_id)
{
	return \think\Db::name("menu_cate")->where(['id'=>$menu_cate_id])->value('name');
}
/**
 * [citrixMenuList 爷爷，儿子，孙子]
 * @param  [type] $menu [description]
 * @return [type]       [description]
 */
function citrixMenuList($menu)
{
    $menus = array();
    //先找出顶级菜单
    foreach ($menu as $k => $val) 
    {
        if($val['pid'] == 0) 
        {
            $menus[$k] = $val;
        }
    }
    //通过顶级菜单找到下属的子菜单
    foreach ($menus as $k => $val) 
    {
        foreach ($menu as $key => $value) 
        {
            if($value['pid'] == $val['id']) 
            {
                $menus[$k]['list'][] = $value;
            }
        }
    }
    //三级菜单
    foreach ($menus as $k => $val) 
    {
        if(isset($val['list'])) 
        {
            foreach ($val['list'] as $ks => $vals) 
            {
                foreach ($menu as $key => $value) 
                {
                    if($value['pid'] == $vals['id']) 
                    {
                        $menus[$k]['list'][$ks]['list'][] = $value;
                    }
                }
            }
        }
    }
    return $menus;
}
/**
 * [citrixGetAdminName 获取角色]
 * @param  [type] $admin_cate_id [description]
 * @return [type]                [description]
 */
function citrixGetAdminName($admin_cate_id)
{
    return \think\Db::name("admin_cate")->where(['id'=>$admin_cate_id])->value('name');
}
/**
 * [citrixJumpUrl 跳转错误页]
 * @param  [type]  $msg  [操作介绍]
 * @param  [type]  $url  [跳转url]
 * @param  integer $icon [description]
 * @return [type]        [description]
 */
function citrixJumpUrl($msg,$url,$icon = 2)
{
    //pc 版本
    exit('<html>
        <meta charset="utf-8"/>
        <script src="/public/jquery/jquery.js"></script>
        <script src="/public/layui/layui.js"></script>
        <head>
        <script type="text/javascript">
            layui.use(["layer", "form"], function() 
            {
                var layer = layui.layer;
                layer.confirm("'.$msg.'", {
                    btn: ["确定"], 
                    icon: '.$icon.',
                    end: function () 
                    {
                        window.location.href="'.$url.'"; 
                    }
                }, function(){
                    window.location.href="'.$url.'"; 
                });
            });
        </script>
        </head>
    </html>');
}
/**
 * 过滤非utf-8
 * @param unknown $string
 * @return Ambigous <mixed, unknown>|unknown
 */
function citrixFilter($ostr){
    preg_match_all('/[\x{FF00}-\x{FFEF}|\x{0000}-\x{00ff}|\x{4e00}-\x{9fff}]+/u', $ostr, $matches);
    $str = join('', $matches[0]);
    if($str==''){   //含有特殊字符需要逐個處理
        $returnstr = '';
        $i = 0;
        $str_length = strlen($ostr);
        while ($i<=$str_length){
            $temp_str = substr($ostr, $i, 1);
            $ascnum = Ord($temp_str);
            if ($ascnum>=224){
                $returnstr = $returnstr.substr($ostr, $i, 3);
                $i = $i + 3;
            }elseif ($ascnum>=192){
                $returnstr = $returnstr.substr($ostr, $i, 2);
                $i = $i + 2;
            }elseif ($ascnum>=65 && $ascnum<=90){
                $returnstr = $returnstr.substr($ostr, $i, 1);
                $i = $i + 1;
            }elseif ($ascnum>=128 && $ascnum<=191){ // 特殊字符
                $i = $i + 1;
            }else{
                $returnstr = $returnstr.substr($ostr, $i, 1);
                $i = $i + 1;
            }
        }
        $str = $returnstr;
        preg_match_all('/[\x{FF00}-\x{FFEF}|\x{0000}-\x{00ff}|\x{4e00}-\x{9fff}]+/u', $str, $matches);
        $str = join('', $matches[0]);
    }
    return $str;
}