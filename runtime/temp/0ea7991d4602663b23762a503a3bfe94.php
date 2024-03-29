<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"D:\phpStudy\PHPTutorial\WWW\mianshi/application/admin\view\admin\index.html";i:1565072745;}*/ ?>
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
    <blockquote class="layui-elem-quote">
        <button type="button" class="layui-btn" onclick="publish(this)" data-url="<?php echo url('admin/admin/publish'); ?>">新增</button>
    </blockquote> 
    <div class="layui-form">
        <table class="layui-table">
            <colgroup>
                <col width="50">
                <col width="165">
                <col >
                <col width="120">
                <col width="120">
                <col width="120">
                <col width="165">
                <col width="165">
                <col width="165">
            </colgroup>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>昵称</th>
                    <th>账号</th>
                    <th>角色</th>
                    <th>登录次数</th>
                    <th>登录ip</th>
                    <th>注册时间</th>
                    <th>登录时间</th>
                    <th>操作</th>
                </tr> 
            </thead>
            <tbody>
                <?php if(is_array($dataList) || $dataList instanceof \think\Collection): $i = 0; $__LIST__ = $dataList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td><?php echo $vo['id']; ?></td>
                    <td><?php echo $vo['nickname']; ?></td>
                    <td><?php echo $vo['username']; ?></td>
                    <td><?php echo citrixGetAdminName($vo['admin_cate_id']); ?></td>
                    <td><?php echo $vo['login_num']; ?></td>
                    <td><?php echo $vo['login_ip']; ?></td>
                    <td><?php echo date("Y-m-d H:i:s",$vo['create_time']); ?></td>
                    <td><?php echo date("Y-m-d H:i:s",$vo['login_time']); ?></td>
                    <td>
                        <button type="button" class="layui-btn layui-btn-xs" onclick="publish(this)" data-url="<?php echo url('admin/admin/publish',['id'=>$vo['id']]); ?>">编辑</button>
                        <button type="button" class="layui-btn layui-btn-xs layui-btn-danger infoDelete" data-id="<?php echo $vo['id']; ?>">删除</button>
                    </td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
    </div>
    <script src="__JQ__/jquery.js"></script>
    <script type="text/javascript" src="__LAY__/layui.js"></script>
    <script type="text/javascript">
        layui.use(['form'], function()
        {
            var form     = layui.form;
             //删除
            $(document).on("click",".infoDelete",function()
            {
                var id = $(this).attr("data-id");
                layer.confirm('您确定要删除吗？', 
                {
                  btn: ['确定','取消']
                }, function(){
                    $.ajax({
                        url:"<?php echo url('admin/admin/infoDelete'); ?>",
                        data:{"id":id},
                        type:'post',
                        async: false,
                        dataType : 'json',
                        success:function(res) 
                        {
                            if(res.code == 1)
                            {
                                layer.alert(res.msg,{icon:1});
                                setTimeout(function(){
                                    location.href = location.href;
                                },1500)
                            }else
                            {
                                layer.alert(res.msg,{icon:2});
                            }
                        },
                        error:function()
                        {
                            layer.alert("Systematic anomaly！",{icon:2});
                        }
                    });
                });
            });
        });
        /**
         * [publish 新增/编辑]
         * @param  {[type]} e [description]
         * @return {[type]}   [description]
         */
        function publish(e)
        {
            layer.open({
                type: 2,
                title: '新增/编辑',
                shadeClose: true,
                shade: 0.8,
                area: ['90%', '90%'],
                content: $(e).attr("data-url"),
                end:function()
                { 
                    location.href = location.href;
                }
            });
        }
    </script>
</body>
</html>