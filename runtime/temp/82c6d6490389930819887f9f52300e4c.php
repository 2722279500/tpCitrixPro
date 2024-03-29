<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:87:"D:\phpStudy\PHPTutorial\WWW\mianshi/application/admin\view\permission_cate\publish.html";i:1565074819;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>layui</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="__FONT__/css/font-awesome.min.css" media="all"/>
    <link rel="stylesheet" href="__LAY__/css/layui.css" media="all" />
    <link rel="stylesheet" href="__CSS__/public.css" media="all" />
</head>
<body class="childrenBody">
    <form class="layui-form layui-form-pane" id="form_array">
        <div class="layui-form-item">
            <label class="layui-form-label">模块名称</label>
            <div class="layui-input-block">
                <input type="text" name="name" autocomplete="off" placeholder="请输入模块名称" class="layui-input" lay-verify="required" <?php if(!(empty($getInfo['name']) || ($getInfo['name'] instanceof \think\Collection && $getInfo['name']->isEmpty()))): ?> value="<?php echo $getInfo['name']; ?>"<?php endif; ?>>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">模块别名</label>
            <div class="layui-input-block">
                <input type="text" name="alias" autocomplete="off" placeholder="请输入模块别名,全英文" class="layui-input" lay-verify="required" <?php if(!(empty($getInfo['alias']) || ($getInfo['alias'] instanceof \think\Collection && $getInfo['alias']->isEmpty()))): ?> value="<?php echo $getInfo['alias']; ?>"<?php endif; ?>>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">图标</label>
            <div class="layui-input-block">
                <input type="text" name="icon" autocomplete="off" placeholder="请输入图标代码" class="layui-input" lay-verify="required" <?php if(!(empty($getInfo['icon']) || ($getInfo['icon'] instanceof \think\Collection && $getInfo['icon']->isEmpty()))): ?> value="<?php echo htmlentities($getInfo['icon']); ?>"<?php endif; ?>>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">模块排序</label>
            <div class="layui-input-block">
                <input type="text" name="sort" autocomplete="off" placeholder="请输入模块排序1-100之间" class="layui-input" lay-verify="required" <?php if(!(empty($getInfo['sort']) || ($getInfo['sort'] instanceof \think\Collection && $getInfo['sort']->isEmpty()))): ?> value="<?php echo $getInfo['sort']; ?>"<?php endif; ?>>
            </div>
        </div>
        <?php if(!(empty($getInfo) || ($getInfo instanceof \think\Collection && $getInfo->isEmpty()))): ?>
        <input type="hidden" name="id" value="<?php echo $getInfo['id']; ?>">
        <?php endif; ?>
        <div class="layui-form-item">
            <button class="layui-btn" lay-submit lay-filter="form_submit">提交</button>
        </div>
    </form>
    <script src="__JQ__/jquery.js"></script>
    <script type="text/javascript" src="__LAY__/layui.js"></script>
    <script type="text/javascript">
         layui.use(['form'], function()
        {
            var form     = layui.form;
            //iframe句柄
            var layerIframe = parent.layer.getFrameIndex(window.name);
            //登录按钮
            form.on("submit(form_submit)",function(data){
                $.ajax({
                    url:"<?php echo url('admin/permissionCate/publish'); ?>",
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
                                parent.layer.close(layerIframe);
                            },1500)
                        }else
                        {
                            layer.msg(res.msg);
                        }
                    },
                    error:function()
                    {
                        layer.alert("Systematic anomaly！",{icon:2});
                    }
                });
                return false;
            });
        });
    </script>
</body>
</html>