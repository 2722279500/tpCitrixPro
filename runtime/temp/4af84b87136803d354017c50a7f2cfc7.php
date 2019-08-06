<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:77:"D:\phpStudy\PHPTutorial\WWW\layuicms/application/forum\view\common\login.html";i:1564015888;s:78:"D:\phpStudy\PHPTutorial\WWW\layuicms/application/forum\view\public\header.html";i:1563953032;s:75:"D:\phpStudy\PHPTutorial\WWW\layuicms/application/forum\view\public\top.html";i:1563949552;s:78:"D:\phpStudy\PHPTutorial\WWW\layuicms/application/forum\view\public\footer.html";i:1563953800;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    
	<meta charset="utf-8">
    <title><?php if(!(empty($getSeoTitle) || ($getSeoTitle instanceof \think\Collection && $getSeoTitle->isEmpty()))): ?><?php echo $getSeoTitle; endif; if(!(empty($getConfig['title']) || ($getConfig['title'] instanceof \think\Collection && $getConfig['title']->isEmpty()))): ?><?php echo $getConfig['title']['value']; endif; ?></title>
    <meta name="keywords" content="<?php if(!(empty($getConfig['keywords']) || ($getConfig['keywords'] instanceof \think\Collection && $getConfig['keywords']->isEmpty()))): ?><?php echo $getConfig['keywords']['value']; endif; ?>">
    <meta name="description" content="<?php if(!(empty($getConfig['description']) || ($getConfig['description'] instanceof \think\Collection && $getConfig['description']->isEmpty()))): ?><?php echo $getConfig['description']['value']; endif; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="__LAY__/css/layui.css">
    <link rel="stylesheet" href="__CSS__/global.css">
</head>
<body>
<div class="fly-header layui-bg-black">
        <div class="layui-container">
        <a class="fly-logo" href="/">
            <img src="__IMG__/logo.png" alt="layui">
        </a>
        <ul class="layui-nav fly-nav-user">
            <!-- 未登入的状态 -->
            <li class="layui-nav-item">
                <a class="iconfont icon-touxiang layui-hide-xs" href="<?php echo url('forum/common/login'); ?>"></a>
            </li>
            <li class="layui-nav-item">
                <a href="<?php echo url('forum/common/login'); ?>">登入</a>
            </li>
            <li class="layui-nav-item">
                <a href="<?php echo url('forum/common/register'); ?>">注册</a>
            </li>
            <li class="layui-nav-item layui-hide-xs">
                <a href="javascript:;" onclick="layer.alert('QQ登入待开发', {icon:3, shade: 0.1, time:0})" title="QQ登入" class="iconfont icon-qq"></a>
            </li>
            <li class="layui-nav-item layui-hide-xs">
                <a href="javascript:;" onclick="layer.alert('微博登入待开发', {icon:3, shade: 0.1, time:0})" title="微博登入" class="iconfont icon-weibo"></a>
            </li>
        </ul>
    </div>
</div>
<div class="layui-container fly-marginTop">
    <div class="fly-panel fly-panel-user" pad20>
        <div class="layui-tab layui-tab-brief" lay-filter="user">
            <ul class="layui-tab-title">
                <li class="layui-this">登入</li>
                <li><a href="<?php echo url('forum/common/register'); ?>">注册</a></li>
            </ul>
            <div class="layui-form layui-tab-content" id="LAY_ucm" style="padding: 20px 0;">
                <div class="layui-tab-item layui-show">
                    <div class="layui-form layui-form-pane">
                    <form id="form_array">
                        <div class="layui-form-item">
                            <label for="L_email" class="layui-form-label">邮箱</label>
                            <div class="layui-input-inline">
                                <input type="text" id="L_email" name="userEmail" required lay-verify="required|email" autocomplete="off" class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label for="L_pass" class="layui-form-label">密码</label>
                            <div class="layui-input-inline">
                                <input type="password" id="L_pass" name="userPass" required lay-verify="required" autocomplete="off" class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <div class="layui-inline" style="margin-right: 0px;">
                                <label class="layui-form-label">验证码</label>
                                <div class="layui-input-inline" style="margin-right: 0px;">
                                    <input type="text" placeholder="请输入验证码" autocomplete="off" id="L_code" name="userVerifyCode" class="layui-input" required lay-verify="required">
                                </div>
                            </div>
                            <div class="layui-inline">
                                <div class="layui-input-inline">
                                    <img src="<?php echo captcha_src(); ?>" alt="captcha" onclick="this.src='<?php echo captcha_src(); ?>?seed='+Math.random()" width="116" height="36" id="captcha" />
                                </div>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <button class="layui-btn layui-block" lay-filter="login" lay-submit>立即登录</button>
                            <span style="padding-left:20px;">
                                <a href="<?php echo url('forum/common/forget'); ?>">忘记密码？</a>
                            </span>
                        </div>
                        <div class="layui-form-item fly-form-app">
                            <span>或者使用社交账号登入</span>
                            <a href="javascript:;" onclick="layer.alert('QQ登入待开发', {icon:3, shade: 0.1, time:0})" class="iconfont icon-qq" title="QQ登入"></a>
                            <a href="javascript:;" onclick="layer.alert('微博登入待开发', {icon:3, shade: 0.1, time:0})" class="iconfont icon-weibo" title="微博登入"></a>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="fly-footer">
    	<p>
        <a href="http://pro.tpcitrix.com/forum/index/index.html" target="_blank">tpCitrixPro1.0社区</a> 2019 &copy; 
        <a href="http://tpcitrix.com/" target="_blank">tpcitrix.com 出品</a>
    </p>
</div>
<script src="__JQ__/jquery.js"></script>
<script type="text/javascript" src="__LAY__/layui.js"></script>
<script type="text/javascript">
layui.use(['form'], function()
{
    var form     = layui.form;
    //登录按钮
    form.on("submit(login)",function(data){
        $.ajax({
            url:"<?php echo url('forum/common/loginPublish'); ?>",
            data:$('#form_array').serialize(),
            type:'post',
            async: false,
            dataType : 'json',
            success:function(res) 
            {
                if(res.code == 1)
                {
                    layer.msg(res.msg,{offset: '50px',anim: 1});
                    setTimeout(function(){
                        location.href = res.url;
                    },1500)
                }else
                {
                    layer.alert(res.msg,{icon:2} ,function(index)
                    {
                        layer.close(index);
                        var ts = Date.parse(new Date())/1000;
                        var img = document.getElementById('captcha');
                        img.src = "/captcha?id="+ts;
                    });
                }
            },
            error:function()
            {
                layer.alert("Systematic anomaly！",{icon:2});
            }
        });
        return false;
    })
});
</script>
</body>
</html>