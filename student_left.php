<?php include("checkstudent.php"); ?>
<img src="images/yhgrzx.jpg" width="166" height="23" id="daohang">
<ul>
<li><a href="###">欢迎页面</a></li>
</ul>
<ul id="nei">
<li <?php
if(substr($_SERVER['PHP_SELF'],-13,-4)=="user_main")
{
?>id="zhong"<?php
}
?> >&#8226;<a href="student_main.php">欢迎页面</a></li>
</ul>
<div class="qinc"></div>
<ul>
<li><a href="###">资料管理</a></li>
</ul>
<ul id="nei">
<li <?php
if(substr($_SERVER['PHP_SELF'],-13,-4)=="student_jlyl")
{
?>id="zhong"<?php
}
?>>&#8226;<a href="student_jlyl.php">简历预览</a></li>
<li <?php
if(substr($_SERVER['PHP_SELF'],-14,-4)=="student_jlmod")
{
?>id="zhong"<?php
}
?>>&#8226;<a href="student_jlmod.php">修改简历</a></li>
</ul>
<div class="qinc"></div>
<ul>
<li><a href="###">订单管理</a></li>
</ul>
<ul id="nei">
<li <?php
if(substr($_SERVER['PHP_SELF'],-13,-4)=="student_yyjy.php")
{
?>id="zhong"<?php
}
?>>&#8226;<a href="student_yyjy.php">学员预约教员列表</a></li>
<li <?php
if(substr($_SERVER['PHP_SELF'],-13,-4)=="user_sjgl")
{
?>id="zhong"<?php
}
?>>&#8226;<a href="student_yyxy.php">教员预约学员列表</a></li>
</ul>
<div class="qinc"></div>
<ul>
<li><a href="###">功能设置</a></li>
</ul>
<ul id="nei">
<li <?php
if(substr($_SERVER['PHP_SELF'],-13,-4)=="user_mmxg")
{
?>id="zhong"<?php
}
?>>&#8226;<a href="student_mmxg.php">修改密码</a></li>
<li <?php
if(substr($_SERVER['PHP_SELF'],-12,-4)=="user_out")
{
?>id="zhong"<?php
}
?>>&#8226;<a href="student_out.php">注销登录</a></li>
</ul>
<div class="qinc" style="height:50px;"></div>