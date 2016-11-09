<?php  session_start();
if(!empty($_GET["lang"])){
$mylang=$_GET["lang"];

$mylangdecode=base64_decode(str_replace(" ","+",$mylang));
//die(base64_decode(iconv("gb2312","utf-8",$_GET["lang"])));
setcookie("cookie_lang",$mylangdecode, time()+2592000);
echo "<script language='javascript'>	window.location.href='index.php';  </script>";
}
if($_COOKIE["cookie_lang"]=="")
{
setcookie("cookie_lang","武汉站", time()+2592000);
echo "<script language='javascript'>	window.location.href='index.php';  </script>";
}
include 'inc/config.php';
$diaoquData = $bw->selectOnly('*', 'bw_config', ' lang="'.$_COOKIE["cookie_lang"].'" ', '');
//die($Lang);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<title><?php echo $service_title; ?></title>
<meta name="keywords" content="<?php echo $service_keyword.'-'.$service_title; ?>" />
<meta name="description" content="<?php echo $service_description.'-'.$service_title; ?>" />
<META http-equiv=content-type content="text/html; charset=utf-8">
<LINK href="css/style.css" type=text/css rel=stylesheet>
<link rel="shortcut icon" href="favicon.ico" />
<link rel="Bookmark" href="favicon.ico">
<!--[if lte IE 6]>
<script src="js/DD_belatedPNG_0.0.8a.js" type="text/javascript"></script>
    <script type="text/javascript">
        DD_belatedPNG.fix('div, ul, img, li, input , a');
    </script>
<![endif]--> 
<script language="javascript" src="js/time.js"></script>
<script>
function souqi(id)
{
	document.getElementById("jiaoyuan").style.display='none'
	document.getElementById("xueyuan").style.display='none'
	document.getElementById("ss").style.display='none'
	document.getElementById("cc").style.display='none'
	document.getElementById(id).style.display=''
	}
</script>
<script src="js/jquery-1.4a2.min.js" type="text/javascript"></script>
<script src="js/jquery.KinSlideshow-1.1.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){
	$("#KinSlideshow").KinSlideshow({
			moveStyle:"right",
			titleBar:{titleBar_height:30,titleBar_bgColor:"#FF6600",titleBar_alpha:0.5},
			titleFont:{TitleFont_size:12,TitleFont_color:"#FFFFFF",TitleFont_weight:"normal"},
			btn:{btn_bgColor:"#FFFFFF",btn_bgHoverColor:"#FF6600",btn_fontColor:"#000000",btn_fontHoverColor:"#FFFFFF",btn_borderColor:"#cccccc",btn_borderHoverColor:"#FF6600",btn_borderWidth:1}
	});
})
</script>
<style type="text/css">
h1.title{ font-family:"微软雅黑",Verdana; font-weight:normal}
.code{ height:auto; padding:20px; border:1px solid #9EC9FE; background:#ECF3FD;}
.code pre{ font-family:"Courier New";font-size:14px;}
.info{ font-size:12px; color:#666666; font-family:Verdana; margin:20px 0 50px 0;}
.info p{ margin:0; padding:0; line-height:22px; text-indent:40px;}
h2.title{ margin:0; padding:0; margin-top:50px; font-size:18px; font-family:"微软雅黑",Verdana;}
h3.title{ font-size:16px; font-family:"微软雅黑",Verdana;}
.importInfo{ font-family:Verdana; font-size:14px;}
.style2 {color: #666}


.index_c_l_dl{width:270px; height:240px; padding-top:6px; float:left;background:url(../static/img/login.png) no-repeat 0 0;}

.index_dl_an #zuce{
    margin-left: 45px;
    margin-right: 30px;
}

.m-tab{
    width: 270px;
    height: 38px;
    background: #EAB7BB;
    padding: -3px;
    line-height: 38px;
}
.m-tab ul li{
text-align:center;
display:inline;
font-size: 16px;
font-family: "Microsoft YaHei";
font-weight: normal;
margin-top:10px;
cursor:pointer;
padding: 15px;
}
.m-tab ul{
text-align: center;
}
.webred{color:red;}

</style>
</head>

<body>
<?php include("top.php"); ?>

<!--轮播图开始-->
	<div class="index_c_banner">
	<div id="KinSlideshow" style="visibility:hidden;">
	<?php
		//selectMany($param,$tbname,$where,$order,$limit)
		$classList = $bw->selectMany("id,title,pic,url","bw_ad","isshow=1","`id` ASC");
		$menu_sum = count($classList);
		for($i = 0; $i<$menu_sum; $i++)
		{
	?>
		<a href="<?php echo $classList[$i]['url'];?>"><img src="<?php echo $classList[$i]['pic'];?>" alt="<?php echo $classList[$i]['title'];?>" width="970" height="400" /></a>
	<?php 
		}
	?>
	</div>
</div>
<!--轮播图结束-->	

<div class="index_c">

<!--通知开始-->
<div class="index_gg">
	<marquee direction="left" scrollamount="2" scrolldelay="5">
	<?php
	$classData = $bw->selectOnly('content' ,'bw_article', 'classId = 3','id desc','1');
	echo phphtml($classData['content']);
	?>
	</marquee>
</div>
<!--通知开始-->

<div class="login">

<div class="login-tab">
   <div class="m-tab">
   <ul><li>教员登录</li>|<li>学生登录</li></ul>
   </div>
   <div class="login_tab">
		<div class="index_c_l_dl teacher_login">
			<form action="?act=dl" method="post" name="teacher_login" id="jsdl">
			<div class="index_dl_lie"><input name="username" type="text" id="username" value="请在此处输入您的账号" onfocus="if(value=='请在此处输入您的账号') {value=''}" onblur="if (value=='') {value='请在此处输入您的账号'}"/></div>
			<div class="index_dl_lie"><input name="password" type="password" id="password" value="请输入您的密码请输入您的密码请输入您的密码请输入您的密码" onfocus="if(value=='请输入您的密码请输入您的密码请输入您的密码请输入您的密码') {value=''}" onblur="if (value=='') {value='请输入您的密码请输入您的密码请输入您的密码请输入您的密码'}"/></div>
			<div class="index_dl_lie"><img  src="Code.php?act=captcha&amp;1726738183" width="60" height="36" alt="CAPTCHA" border="1" onClick= "this.src=&quot;Code.php?act=captcha&amp;&quot;+Math.random()" style="cursor: pointer; display:block; float:right; margin:0px; margin:4px 30px 0 0;" title="看不清，点击更换另一个验证码" /><input id="yzm" name="yzm" type="text" value="请输入验证码" onfocus="if(value=='请输入验证码') {value=''}" onblur="if (value=='') {value='请输入验证码'}"/></div>
			<div class="index_dl_an"><a href="user_getpwd.php" target="_blank">忘记密码？</a><a href="#" onClick="return document.teacher_login.submit();" id="zuce"><span>教员登陆</span></a><a id="dl" href="tutor.php" ><span>注册</span></a></div>
			</form>
		</div>
	   <div class="index_c_l_dl student_login" style="display:none;">
			<form action="?act=student_login" method="post" name="student_login" id="jsdl">
			<div class="index_dl_lie"><input name="username" type="text" id="username" value="请在此处输入您的账号" onfocus="if(value=='请在此处输入您的账号') {value=''}" onblur="if (value=='') {value='请在此处输入您的账号'}"/></div>
			<div class="index_dl_lie"><input name="password" type="password" id="password" value="请输入您的密码请输入您的密码请输入您的密码请输入您的密码" onfocus="if(value=='请输入您的密码请输入您的密码请输入您的密码请输入您的密码') {value=''}" onblur="if (value=='') {value='请输入您的密码请输入您的密码请输入您的密码请输入您的密码'}"/></div>
			<div class="index_dl_lie"><img  src="Code.php?act=captcha&amp;1726738183" width="60" height="36" alt="CAPTCHA" border="1" onClick= "this.src=&quot;Code.php?act=captcha&amp;&quot;+Math.random()" style="cursor: pointer; display:block; float:right; margin:0px; margin:4px 30px 0 0;" title="看不清，点击更换另一个验证码" /><input id="yzm" name="yzm" type="text" value="请输入验证码" onfocus="if(value=='请输入验证码') {value=''}" onblur="if (value=='') {value='请输入验证码'}"/></div>
			<div class="index_dl_an"><a href="student_getpwd.php" target="_blank">忘记密码？</a><a href="#" onClick="return document.student_login.submit();" id="zuce"><span>学生登陆</span></a><a id="dl" href="tutor_stureg.php" ><span>注册</span></a></div>
			</form>
		</div>
	</div>
	</div>
<?php
if (!empty($_SESSION["hyusername"]))
{
echo "<script>$('.login-tab').hide();</script>";
?>
<table width="30%" border="0" align="center" cellpadding="0" cellspacing="0" style="float:left;">
  <tr>
    <td height="92" align="center" valign="middle">欢迎教员<span style="color:#F00;"><?php echo $_SESSION["hyusername"];?></span>您的登录</td>
  </tr>
  <tr>
    <td height="21" align="center" valign="middle"><a href="user_main.php" target="_blank">进入教员中心</a></td>
  </tr>
  <tr>
    <td height="50" align="center" valign="middle"><a href="user_out.php">注销登录</a></td>
  </tr>
</table>

	<?php
}else if(!empty($_SESSION["studentname"])){
echo "<script>$('.login-tab').hide();</script>";
?>
<table width="30%" border="0" align="center" cellpadding="0" cellspacing="0" style="float:left;">
  <tr>
    <td height="92" align="center" valign="middle">欢迎学员<span style="color:#F00;"><?php echo $_SESSION["studentname"];?></span>您的登录</td>
  </tr>
  <tr>
    <td height="21" align="center" valign="middle"><a href="student_main.php" target="_blank">进入学员中心</a></td>
  </tr>
  <tr>
    <td height="50" align="center" valign="middle"><a href="student_out.php">注销登录</a></td>
  </tr>
</table>

<?php
}
?>







	<script>
(function(){
$('.index_c_l_dl:gt(0)').hide();
        var dj=$('.m-tab ul li');
        dj.eq(0).addClass('webred');
        dj.each(function(i){
            $(this).click(function(){
                $(this).addClass('webred').siblings().removeClass('webred');
                $('.index_c_l_dl').eq(i).show().siblings().hide();
            })
        });
		
})();
</script>
	
	<div class="index_sousuo">
        <div class="index_ss_nr">
    <a href="###" class="bg" id="syjy" onMouseMove="setDivBG('syjy');souqi('jiaoyuan')">所有教员</a>
    <a href="###" id="zyjs" onMouseMove="setDivBG('zyjs');souqi('ss')">专业教师</a>
    <a href="###" id="zyjsuo" onMouseMove="setDivBG('zyjsuo');souqi('cc')">专才检索</a>
    <a href="###" id="syxy" onMouseMove="setDivBG('syxy');souqi('xueyuan')">所有学员</a>
    </div>
        <div class="qinc"></div>
        <div style="margin-top:8px;">
     <form name="form11" method="post" action="teachers.php?action=search_all">
      <table width="600" border="0" id="jiaoyuan"  align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="200" height="40">编&nbsp; 号：
            <input type="text" class="zhjs_input" name="bh" id="bh" /></td>
          <td width="200">科 目：
            <input type="text" class="zhjs_input" name="km" id="km" /></td>
          <td width="200">性 别：
          <select name="sex" id="sex">
                    <option selected="selected" value="">--请选择--</option>
                    <option value="1">男</option>
                    <option value="2">女</option>
           </select>  
          </td>
        </tr>
        <tr>
          <td height="40">区&nbsp; 域：
            <select name="qy" id="qy">
                      <option selected="selected" value="">--请选择--</option>
                              <?php
                    $dir=$diaoquData["quyu"];
                    $split_dir = split ('[,.-]', $dir); //返回一个Array,你可以用for读出来
                    for($i=0;$i<count($split_dir);$i++)
                    
                    {  ?>
                              <option value="<?php echo $split_dir[$i];?>" ><?php echo $split_dir[$i];?></option>
                                  <?php
                    }
                                  ?>
                    </select>
          </td>
          <td>类 型：
          <select name="lx" id="lx">
                    <option selected="selected" value="">选择类型</option>
                    <option value="1">大学生</option>
                    <option value="2">职业教师</option>
                    <option value="3">留学、海归</option>
                    <option value="4">其他</option>
            </select>  
          </td>
          <td><input type="image" value="" src="images/index_zh_ss.jpg"></td>
        </tr>
        </table>
        </form>
     <form name="form12" method="post" action="teachers.php?action=search_zyjs">
      <table width="600" border="0" id="ss"  align="center" cellpadding="0" cellspacing="0" style="display:none;">
        <tr>
          <td width="200" height="40">编&nbsp; 号：
            <input type="text" class="zhjs_input" name="bh" id="bh" /></td>
          <td width="200">科 目：
            <input type="text" class="zhjs_input" name="km" id="km" /></td>
          <td width="200">性 别：
          <select name="sex" id="sex">
                    <option selected="selected" value="">--请选择--</option>
                    <option value="1">男</option>
                    <option value="2">女</option>
           </select>  
          </td>
        </tr>
        <tr>
          <td height="40">区&nbsp; 域：
            <select name="qy" id="qy">
                      <option selected="selected" value="">--请选择--</option>
                              <?php
                    $dir=$diaoquData["quyu"];
                    $split_dir = split ('[,.-]', $dir); //返回一个Array,你可以用for读出来
                    for($i=0;$i<count($split_dir);$i++)
                    
                    {  ?>
                              <option value="<?php echo $split_dir[$i];?>" ><?php echo $split_dir[$i];?></option>
                                  <?php
                    }
                                  ?>
                    </select>
          </td>
          <td>类 型：
          <select name="lx" id="lx">
                    <option value="2">职业教师</option>
            </select>  
          </td>
          <td><input type="image" value="" src="images/index_zh_ss.jpg"></td>
        </tr>
        </table>
        </form>
     <form name="form13" method="post" action="yszc.php?action=search_zcjs">
      <table width="600" border="0" id="cc"  align="center" cellpadding="0" cellspacing="0" style="display:none;">
        <tr>
          <td width="200" height="40">编&nbsp; 号：
            <input type="text" class="zhjs_input" name="bh" id="bh" /></td>
          <td width="200">科 目：
            <input type="text" class="zhjs_input" name="km" id="km" /></td>
          <td width="200">性 别：
          <select name="sex" id="sex">
                    <option selected="selected" value="">--请选择--</option>
                    <option value="1">男</option>
                    <option value="2">女</option>
           </select>  
          </td>
        </tr>
        <tr>
          <td height="40">区&nbsp; 域：
            <select name="qy" id="qy">
                      <option selected="selected" value="">--请选择--</option>
                              <?php
                    $dir=$diaoquData["quyu"];
                    $split_dir = split ('[,.-]', $dir); //返回一个Array,你可以用for读出来
                    for($i=0;$i<count($split_dir);$i++)
                    
                    {  ?>
                              <option value="<?php echo $split_dir[$i];?>" ><?php echo $split_dir[$i];?></option>
                                  <?php
                    }
                                  ?>
                    </select>
          </td>
          <td>类 型：
          <select name="lx" id="lx">
                    <option selected="selected" value="">选择类型</option>
                    <option value="1">大学生</option>
                    <option value="2">职业教师</option>
                    <option value="3">留学、海归</option>
                    <option value="4">其他</option>
            </select>  
          </td>
          <td><input type="image" value="" src="images/index_zh_ss.jpg"></td>
        </tr>
        </table>
        </form>
     <form name="form14" method="post" action="students.php?action=search">
      <table width="600" border="0" style="display:none;" id="xueyuan" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="200" height="40">订单编号：
            <input type="text" class="zhjs_input" name="ddbh" id="ddbh" /></td>
          <td width="200">科 目：
            <input type="text" class="zhjs_input" name="qjkm" id="qjkm" /></td>
          <td width="200">年 级：
            <select name="xynj" id="xynj">
              <option  value="">--请选择--</option>
                 <?php
                $dir=$diaoquData["nianji"];
                $split_dir = split ('[,.-]', $dir); //返回一个Array,你可以用for读出来
                for($i=0;$i<count($split_dir);$i++)
                
                {  ?>
                          <option value="<?php echo $split_dir[$i];?>" ><?php echo $split_dir[$i];?></option>
                              <?php
                }
                              ?>
            </select></td>
        </tr>
        <tr>
          <td height="40">区&nbsp; 域：
             <select name="szqy" id="szqy">
              <option  value="">--请选择--</option>
                 <?php
                $dir=$diaoquData["quyu"];
                $split_dir = split ('[,.-]', $dir); //返回一个Array,你可以用for读出来
                for($i=0;$i<count($split_dir);$i++)
                
                {  ?>
                          <option value="<?php echo $split_dir[$i];?>" ><?php echo $split_dir[$i];?></option>
                              <?php
                }
                              ?>
            </select>
            </td>
          <td>类 型：
            <select name="xylx" id="xylx">
                    <option selected="selected" value="">选择类型</option>
                    <option value="零基础">零基础</option>
                    <option value="补差型">补差型</option>
                    <option value="提高型">提高型</option>
                    <option value="拔尖型">拔尖型</option>
           </select></td>
          <td><input type="image" value="" src="images/index_zh_ss.jpg"></td>
        </tr>
      </table>
      </form>
    </div>
	</div>
    
    <ul class="index_qzjj">
        <ul class="incex_zxgg" id="jy1">
<?php
	//selectMany($param,$tbname,$where,$order,$limit)
	$classList = $bw->selectMany("id,title","bw_article","classId=2","`id` desc","6");
	//var_dump($classList);
	//exit;
	$menu_sum = count($classList);
	for($i = 0; $i<$menu_sum; $i++)
	{
?>
<li><span>·</span><a href="articleshow.php?id=<?php echo $classList[$i]['id'];?>" title="<?php echo $classList[$i]['title'];?>" target="_blank"><?php echo chgtitle($classList[$i]['title'],12);?></a></li>
<?php
  }//end loop
?>
</ul>
		<ul class="incex_zxggs">
<?php
	//selectMany($param,$tbname,$where,$order,$limit)
	$classList = $bw->selectMany("id,title","bw_article","classId=1","`id` desc","9");
	//var_dump($classList);
	//exit;
	$menu_sum = count($classList);
	for($i = 0; $i<$menu_sum; $i++)
	{
?>
<li><span>·</span><a href="articleshow.php?id=<?php echo $classList[$i]['id'];?>" title="<?php echo $classList[$i]['title'];?>" target="_blank"><?php echo chgtitle($classList[$i]['title'],12);?></a></li>
<?php
  }//end loop
?>
</ul>
	</ul>

<div class="qinc"></div>
</div>

<div><a href="qjj.php" target="_blank"><img src="images/ad_01.jpg" /></a></div>



<!--教员库开始-->
  <div class="qinc" style="height:88px; margin-top:25px;"><img src="images/jyk_title.jpg" /></div>
<div class="index_c_jyk">
	<div class="index_jyk_bt">
      <a href="###" class="xuanz" onMouseMove="setjyBG('mxjy','jyk1')" id="mxjy" style="background:#749a2d;">明星教员<br/><span>Star-Teacher</span></a>
      <a href="###" id="zyjs1" onMouseMove="setjyBG('zyjs1','jyk2')" style="background:#029ac1;">专业教师<br/><span>Prof-Teacher</span></a>
      <a href="###" id="dxs"  onMouseMove="setjyBG('dxs','jyk3')" style="background:#eba424;">大学生<br/><span>Coll-Student</span></a>
      <a href="###" id="yszc" onMouseMove="setjyBG('yszc','jyk4')" style="background:#3caa61;">艺术专才<br/><span>Art-Teacher</span></a>
      <a href="teachers.php?act=k" target="_blank" style="background:#eb244d; line-height:40px;">查看更多</a>
   </div>
</div>
  <div class="index_jyk_c" style="height:250px;_height:252px;">
  <table width="820" border="0" align="center" cellpadding="0" cellspacing="0" id="jyk1">
<tr class="tdboder">
    <td width="13%" height="25" align="center" valign="middle"  style=" font-size:16px;">教员</td>
    <td width="9%" height="25" align="center" valign="middle"  style=" font-size:16px;">性别</td>
    <td width="20%" height="25" align="center" valign="middle"  style=" font-size:16px;">可教授科目</td>
    <td width="20%" height="25" align="center" valign="middle"  style=" font-size:16px;">毕业学校</td>
    <td width="30%" height="25" align="center" valign="middle"  style=" font-size:16px;">注册时间</td>
  </tr><?php
		//selectMany($param,$tbname,$where,$order,$limit)
		$classList = $bw->selectMany("*","bw_member","iftj=2 and iffb=2 and ifxj>=3 and ifxj<6 and lang='".$_COOKIE["cookie_lang"]."'","`id` DESC","11");
		//var_dump($classList);
		//exit;
		$menu_sum = count($classList);
		for($i = 0; $i<$menu_sum; $i++)
		{
  ?>
  <tr>
    <td width="13%" height="25" align="center" valign="middle">
	<a href="teachershow.php?id=<?php echo $classList[$i]['id'];?>" target="_blank" style="color:#FE5A05"><?php echo chgtitles($classList[$i]['truename'],1);?>教员</a></td>
    <td width="9%" align="center" valign="middle">
	<a href="teachershow.php?id=<?php echo $classList[$i]['id'];?>" target="_blank"><?php if($classList[$i]['sex']==2){echo "女";}else{echo "男";} ?></a></td>
    <td width="35%" align="left"><a href="teachershow.php?id=<?php echo $classList[$i]['id'];?>" title="<?php echo $classList[$i]['kjskm'];?>" target="_blank">
	<?php echo chgtitle(phphtml($classList[$i]['kjskm']),12); ?></a></td>
    <td width="28%" align="left">
	<a href="teachershow.php?id=<?php echo $classList[$i]['id'];?>" target="_blank"><?php echo $classList[$i]['xuexiao'];?></a></td>
    <td width="15%" align="center">[<?php echo date("Y-m-d",strtotime($classList[$i]['reg_time']));;?>]</td>
  </tr>
  <?php
  }
  ?>
</table>
<table width="820" border="0" align="center" cellpadding="0" cellspacing="0" id="jyk2"  style="display:none">
<tr class="tdboder">
    <td width="13%" height="25" align="center" valign="middle"  style=" font-size:16px;">教员</td>
    <td width="9%" height="25" align="center" valign="middle"  style=" font-size:16px;">性别</td>
    <td width="20%" height="25" align="center" valign="middle"  style=" font-size:16px;">可教授科目</td>
    <td width="20%" height="25" align="center" valign="middle"  style=" font-size:16px;">毕业学校</td>
    <td width="30%" height="25" align="center" valign="middle"  style=" font-size:16px;">注册时间</td>
  </tr><?php
		//selectMany($param,$tbname,$where,$order,$limit)
		$classList = $bw->selectMany("*","bw_member","iftj=2 and iffb=2 and levels=2 and lang='".$_COOKIE["cookie_lang"]."'","`id` DESC","9");
		//var_dump($classList);
		//exit;
		$menu_sum = count($classList);
		for($i = 0; $i<$menu_sum; $i++)
		{
  ?>
  <tr>
    <td width="13%" height="25" align="center" valign="middle">
	<a href="teachershow.php?id=<?php echo $classList[$i]['id'];?>" target="_blank" style="color:#FE5A05"><?php echo chgtitles($classList[$i]['truename'],1);?>教员</a></td>
    <td width="9%" align="center" valign="middle">
	<a href="teachershow.php?id=<?php echo $classList[$i]['id'];?>" target="_blank"><?php if($classList[$i]['sex']==2){echo "女";}else{echo "男";} ?></a></td>
    <td width="35%" align="left"><a href="teachershow.php?id=<?php echo $classList[$i]['id'];?>" title="<?php echo $classList[$i]['kjskm'];?>" target="_blank">
	<?php echo chgtitle(phphtml($classList[$i]['kjskm']),12); ?></a></td>
    <td width="28%" align="left">
	<a href="teachershow.php?id=<?php echo $classList[$i]['id'];?>" target="_blank"><?php echo $classList[$i]['xuexiao'];?></a></td>
    <td width="15%" align="center">[<?php echo date("Y-m-d",strtotime($classList[$i]['reg_time']));;?>]</td>
  </tr>
  <?php
  }
  ?>
</table>
<table width="820" border="0" align="center" cellpadding="0" cellspacing="0" id="jyk3"  style="display:none">
<tr class="tdboder">
    <td width="13%" height="25" align="center" valign="middle"  style=" font-size:16px;">教员</td>
    <td width="9%" height="25" align="center" valign="middle"  style=" font-size:16px;">性别</td>
    <td width="20%" height="25" align="center" valign="middle"  style=" font-size:16px;">可教授科目</td>
    <td width="20%" height="25" align="center" valign="middle"  style=" font-size:16px;">毕业学校</td>
    <td width="30%" height="25" align="center" valign="middle"  style=" font-size:16px;">注册时间</td>
  </tr><?php
		//selectMany($param,$tbname,$where,$order,$limit)
		$classList = $bw->selectMany("*","bw_member","iftj=2 and iffb=2 and levels=1 and lang='".$_COOKIE["cookie_lang"]."'","`id` DESC","9");
		//var_dump($classList);
		//exit;
		$menu_sum = count($classList);
		for($i = 0; $i<$menu_sum; $i++)
		{
  ?>
  <tr>
    <td width="13%" height="25" align="center" valign="middle">
	<a href="teachershow.php?id=<?php echo $classList[$i]['id'];?>" target="_blank" style="color:#FE5A05"><?php echo chgtitles($classList[$i]['truename'],1);?>教员</a></td>
    <td width="9%" align="center" valign="middle">
	<a href="teachershow.php?id=<?php echo $classList[$i]['id'];?>" target="_blank"><?php if($classList[$i]['sex']==2){echo "女";}else{echo "男";} ?></a></td>
    <td width="35%" align="left"><a href="teachershow.php?id=<?php echo $classList[$i]['id'];?>" title="<?php echo $classList[$i]['kjskm'];?>" target="_blank">
	<?php echo chgtitle(phphtml($classList[$i]['kjskm']),12); ?></a></td>
    <td width="28%" align="left">
	<a href="teachershow.php?id=<?php echo $classList[$i]['id'];?>" target="_blank"><?php echo $classList[$i]['xuexiao'];?></a></td>
    <td width="15%" align="center">[<?php echo date("Y-m-d",strtotime($classList[$i]['reg_time']));;?>]</td>
  </tr>
  <?php
  }
  ?>
</table>
<table width="820" border="0" align="center" cellpadding="0" cellspacing="0" id="jyk4" style="display:none">
<tr class="tdboder">
    <td width="13%" height="25" align="center" valign="middle"  style=" font-size:16px;">教员</td>
    <td width="9%" height="25" align="center" valign="middle"  style=" font-size:16px;">性别</td>
    <td width="20%" height="25" align="center" valign="middle"  style=" font-size:16px;">可教授科目</td>
    <td width="20%" height="25" align="center" valign="middle"  style=" font-size:16px;">毕业学校</td>
    <td width="30%" height="25" align="center" valign="middle"  style=" font-size:16px;">注册时间</td>
  </tr><?php
		//selectMany($param,$tbname,$where,$order,$limit)
		$classList = $bw->selectMany("*","bw_member","iftj=2 and iffb=2 and (sklx<>'普通' or ifzc=2) and lang='".$_COOKIE["cookie_lang"]."'","`id` DESC","10");
		//var_dump($classList);
		//exit;
		$menu_sum = count($classList);
		for($i = 0; $i<$menu_sum; $i++)
		{
  ?>
  <tr>
    <td width="13%" height="25" align="center" valign="middle">
	<a href="teachershow.php?id=<?php echo $classList[$i]['id'];?>" target="_blank" style="color:#FE5A05"><?php echo chgtitles($classList[$i]['truename'],1);?>教员</a></td>
    <td width="9%" align="center" valign="middle">
	<a href="teachershow.php?id=<?php echo $classList[$i]['id'];?>" target="_blank"><?php if($classList[$i]['sex']==2){echo "女";}else{echo "男";} ?></a></td>
    <td width="35%" align="left"><a href="teachershow.php?id=<?php echo $classList[$i]['id'];?>" title="<?php echo $classList[$i]['kjskm'];?>" target="_blank">
	<?php echo chgtitle(phphtml($classList[$i]['kjskm']),12); ?></a></td>
    <td width="28%" align="left">
	<a href="teachershow.php?id=<?php echo $classList[$i]['id'];?>" target="_blank"><?php echo $classList[$i]['xuexiao'];?></a></td>
    <td width="15%" align="center">[<?php echo date("Y-m-d",strtotime($classList[$i]['reg_time']));;?>]</td>
  </tr>
  <?php
  }
  ?></table>
  </div>
<!--教员库结束-->  

<!--学员库开始-->
  <div class="qinc" style="height:88px; margin-top:25px;"><img src="images/xyk_title.jpg" /></div>
	<div class="index_xyk">
  <table width="960"  height="113"  border="0" align="center" cellpadding="0" cellspacing="0">
  <tr class="tdboder">
      <td width="12%" height="50" align="center" valign="top">学员</td>
      <td width="10%" align="center" valign="top">
	  性别</td>
      <td width="10%" align="center" valign="top">
	  年级</td>
      <td width="19%" align="center" valign="top" style="padding-left:15px;">
	  辅导科目</td>
      <td width="15%" align="center" valign="top" >地区</td>
	  <td width="15%" align="center" valign="top">学费</td>
	  <td width="15%" align="center" valign="top">注册时间</td>
    </tr><?php
		//selectMany($param,$tbname,$where,$order,$limit)
		$classList = $bw->selectMany("id,name,qjkm,xynj,szqy,addtime,xysex,bcs","bw_qjj","sftj=1 and isshow=2 and lang='".$_COOKIE["cookie_lang"]."'","addtime DESC","8");
		//var_dump($classList);
		//exit;
		$menu_sum = count($classList);
		for($i = 0; $i<$menu_sum; $i++)
		{
  ?>
    <tr class="boder_b">
      <td width="12%" height="24" align="center" valign="top">
	  <a href="studentshow.php?id=<?php echo $classList[$i]['id'];?>" target="_blank" style="color:#FE5A05"><?php echo chgtitles($classList[$i]['name'],1);?>同学</a></td>
      <td width="10%" align="center" valign="top">
	  <a href="studentshow.php?id=<?php echo $classList[$i]['id'];?>" target="_blank"><?php echo $classList[$i]['xysex'];?></a></td>
      <td width="10%" align="center" valign="top">
	  <a href="studentshow.php?id=<?php echo $classList[$i]['id'];?>" target="_blank"><?php echo $classList[$i]['xynj'];?></a></td>
      <td width="19%" align="center" valign="top" style="padding-left:15px;">
	  <a href="studentshow.php?id=<?php echo $classList[$i]['id'];?>" title="<?php echo $classList[$i]['qjkm'];?>" target="_blank">
	  <?php echo chgtitle(phphtml($classList[$i]['qjkm']),6); ?></a></td>
      <td width="15%" align="center" valign="top" style="color:#E95504;">
	  <a href="studentshow.php?id=<?php echo $classList[$i]['id'];?>" target="_blank"><?php echo $classList[$i]['szqy'];?></a></td>
	  <td width="15%" align="center" valign="top" style="color:#E95504;">
	  <a href="studentshow.php?id=<?php echo $classList[$i]['id'];?>" target="_blank"><?php echo $classList[$i]['bcs'];?>元/小时</a></td>
	  <td width="15%" align="center" valign="top">[<?php echo date("Y-m-d",strtotime($classList[$i]['addtime']));;?>]</td>
    </tr>
    <?php
  }
	?>
  </table>
</div>
<!--学员库结束-->

<div style=" width:960px; margin:0 auto; "><a href="qjj.php" target="_blank"><img src="images/ad2.jpg" /></a></div>



<!--分类开始-->
<div class="index_fl">

  <div class="index_xkfl_nr xk">
	<table width="320"  border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td  height="22" align="center" valign="middle"><a href="teachers.php?seachkey=语文" target="_blank">语文</a></td>
	<td  height="22" align="center" valign="middle"><a href="teachers.php?seachkey=数学" target="_blank">数学</a></td>
	<td  height="22" align="center" valign="middle"><a href="teachers.php?seachkey=英语" target="_blank">英语</a></td>
	<td  height="22" align="center" valign="middle"><a href="teachers.php?seachkey=物理" target="_blank">物理</a></td>
  </tr>
  <tr>
    <td  height="22" align="center" valign="middle"><a href="teachers.php?seachkey=化学" target="_blank">化学</a></td>
	<td  height="22" align="center" valign="middle"><a href="teachers.php?seachkey=政治" target="_blank">政治</a></td>
	<td  height="22" align="center" valign="middle"><a href="teachers.php?seachkey=历史" target="_blank">历史</a></td>
	<td  height="22" align="center" valign="middle"><a href="teachers.php?seachkey=地理" target="_blank">地理</a></td>
  </tr>
  <tr>
	<td  height="22" align="center" valign="middle"><a href="teachers.php?seachkey=生物" target="_blank">生物</a></td>
	<td  height="22" align="center" valign="middle"><a href="teachers.php?seachkey=美术" target="_blank">美术</a></td>
	<td  height="22" align="center" valign="middle"><a href="teachers.php?seachkey=音乐" target="_blank">音乐</a></td>
	<td  height="22" align="center" valign="middle"><a href="teachers.php?seachkey=舞蹈" target="_blank">舞蹈</a></td>
  </tr>
  <tr>

    <td  height="22" align="center" valign="middle"><a href="teachers.php?seachkey=法语" target="_blank">法语</a></td>
	<td  height="22" align="center" valign="middle"><a href="teachers.php?seachkey=德语" target="_blank">德语</a></td>
	<td height="22" align="center" valign="middle" ><a href="teachers.php?seachkey=日语" target="_blank">日语</a></td>
	<td height="22"  align="center" valign="middle"><a href="teachers.php?seachkey=托福" target="_blank">托福</a></td>
         
    </td>
  </tr>
  <tr>

				<td  height="22" align="center" valign="middle"><a href="teachers.php?seachkey=GRR" target="_blank">GRR</a></td>
				<td  height="22" align="center" valign="middle"><a href="teachers.php?seachkey=英语四级" target="_blank">英语四级</a></td>
		
    </td>
  </tr>
</table>
  </div>
  
  <div class="index_xkfl_nr cy">
	<table width="320"  border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="48" height="22" align="center" valign="middle"><a href="yszc.php?seachkey=声乐" target="_blank">声乐</a></td>
	<td width="48" height="22" align="center" valign="middle"><a href="yszc.php?seachkey=钢琴" target="_blank">钢琴</a></td>
	<td width="48" height="22" align="center" valign="middle"><a href="yszc.php?seachkey=电子琴" target="_blank">电子琴</a></td>
	<td width="48" height="22" align="center" valign="middle"><a href="yszc.php?seachkey=小提琴" target="_blank">小提琴</a></td>
  </tr>
  <tr>
    <td width="48" height="22" align="center" valign="middle"><a href="yszc.php?seachkey=古筝" target="_blank">古筝</a></td>
	<td width="48" height="22" align="center" valign="middle"><a href="yszc.php?seachkey=二胡" target="_blank">二胡</a></td>
	<td width="48" height="22" align="center" valign="middle"><a href="yszc.php?seachkey=手风琴" target="_blank">手风琴</a></td>
	<td width="48" height="22" align="center" valign="middle"><a href="yszc.php?seachkey=大提琴" target="_blank">大提琴</a></td>
  </tr>
  <tr>
    <td width="48" height="22" align="center" valign="middle"><a href="yszc.php?seachkey=吉他" target="_blank">吉他</a></td>
	<td width="48" height="22" align="center" valign="middle"><a href="yszc.php?seachkey=琵琶" target="_blank">琵琶</a></td>
	<td width="48" height="22" align="center" valign="middle"><a href="yszc.php?seachkey=单簧管" target="_blank">单簧管</a></td>
	<td width="48" height="22" align="center" valign="middle"><a href="yszc.php?seachkey=双簧管" target="_blank">双簧管</a></td>
  </tr>
  <tr>
    <td width="48" height="22" align="center" valign="middle"><a href="yszc.php?seachkey=长笛" target="_blank">长笛</a></td>
	<td width="48" height="22" align="center" valign="middle"><a href="yszc.php?seachkey=古琴" target="_blank">古琴</a></td>
	<td width="48" height="22" align="center" valign="middle"><a href="yszc.php?seachkey=萨克斯" target="_blank">萨克斯</a></td>
	<td width="48" height="22" align="center" valign="middle"><a href="yszc.php?seachkey=打击乐" target="_blank">打击乐</a></td>
  </tr>
  <tr>
    <td width="48" height="22" align="center" valign="middle"><a href="yszc.php?seachkey=小号" target="_blank">小号</a></td>
	<td width="48" height="22" align="center" valign="middle"><a href="yszc.php?seachkey=大号" target="_blank">大号</a></td>
	<td width="48" height="22" align="center" valign="middle"><a href="yszc.php?seachkey=笛子" target="_blank">笛子</a></td>
	<td width="48" height="22" align="center" valign="middle"><a href="yszc.php?seachkey=长箫" target="_blank">长箫</a></td>
  </tr>
</table>
	</div>
    
	<div class="index_xkfl_nr fdb">
	<ul>
<?php
	//selectMany($param,$tbname,$where,$order,$limit)
	$classList = $bw->selectMany("id,title","bw_article","classId=12","`id` desc","10");
	//var_dump($classList);
	//exit;
	$menu_sum = count($classList);
	for($i = 0; $i<$menu_sum; $i++)
	{
?>
<li><a href="fudaobanshow.php?id=<?php echo $classList[$i]['id'];?>" title="<?php echo $classList[$i]['title'];?>" target="_blank"><?php echo chgtitle($classList[$i]['title'],12);?></a></li>
<?php
  }//end loop
?>
</ul>
	</div>
    
</div>
<!--分类结束-->
  </div>


<!--资讯开始-->
<div class="index_zixun">

	<!--公告开始-->
	<div class="index_jyk_c">
    	<div class="index_jyk_t">《最新公告》</div>
        <div><img src="images/news.jpg" /></div>
        <ul>
    <?php
        //selectMany($param,$tbname,$where,$order,$limit)
        $classList = $bw->selectMany("id,title","bw_article","classId=3","`id` desc","5");
        //var_dump($classList);
        //exit;
        $menu_sum = count($classList);
        for($i = 0; $i<$menu_sum; $i++)
        {
    ?>
    <li><span>·</span><a href="articleshow.php?id=<?php echo $classList[$i]['id'];?>" title="<?php echo $classList[$i]['title'];?>"target="_blank"><?php echo chgtitle($classList[$i]['title'],12);?></a></li>
    <?php
      }//end loop
    ?>
    </ul>
	</div>
	<!--公告开始-->

    <div class="index_jyk_c">
		<div class="index_jyk_t">《常见问题》</div>
        <div><img src="images/qinggan.jpg" /></div>
		<ul>
<?php
	//selectMany($param,$tbname,$where,$order,$limit)
	$classList = $bw->selectMany("id,title","bw_article","classId=11","`id` desc","5");
	//var_dump($classList);
	//exit;
	$menu_sum = count($classList);
	for($i = 0; $i<$menu_sum; $i++)
	{
?>
<li><span>·</span><a href="articleshow.php?id=<?php echo $classList[$i]['id'];?>" title="<?php echo $classList[$i]['title'];?>" target="_blank"><?php echo chgtitle($classList[$i]['title'],12);?></a></li>
<?php
  }//end loop
?>
</ul>
    </div>


    <div class="index_jyk_c">
                <div class="index_jyk_t">《家长加油站》</div>
                <div><img src="images/jiazhangjiayouzhan.jpg" /></div>

      <ul>
        <?php
		//selectMany($param,$tbname,$where,$order,$limit)
		$classList = $bw->selectMany("id,title,subTime","bw_article","classId=10","`id` desc","5");
		//var_dump($classList);
		//exit;
		$menu_sum = count($classList);
		for($i = 0; $i<$menu_sum; $i++)
		{
	   ?>
        <li><span>·</span>
		  <a href="articleshow.php?id=<?php echo $classList[$i]['id'];?>" title="<?php echo $classList[$i]['title'];?>" target="_blank"><?php echo chgtitle($classList[$i]['title'],12);?></a></li>
        <?php
	    }
	    ?>
      </ul>
      <div class="qinc"></div>
    </div>
    
    
   	<div class="index_jyk_c">
              <div class="index_jyk_t">《中考资讯》</div>
              <div><img src="images/zixun.jpg" /></div>

		<ul>
         <?php
		//selectMany($param,$tbname,$where,$order,$limit)
		$classList = $bw->selectMany("id,title,subTime","bw_article","classId=9","`id` desc","5");
		//var_dump($classList);
		//exit;
		$menu_sum = count($classList);
		for($i = 0; $i<$menu_sum; $i++)
		{
	   ?>
          <li><span>·</span>
		  <a href="articleshow.php?id=<?php echo $classList[$i]['id'];?>" title="<?php echo $classList[$i]['title'];?>" target="_blank"><?php echo chgtitle($classList[$i]['title'],12);?></a></li>
        <?php
	}
	  ?>
      </ul>
      <div class="qinc"></div>
    </div>

    <div class="index_jyk_c">
        <div class="index_jyk_t">《学习宝典》</div>
        <div><img src="images/xuexibaodian.jpg" /></div>
		<ul>
        <?php
		//selectMany($param,$tbname,$where,$order,$limit)
		$classList = $bw->selectMany("id,title,subTime","bw_article","classId=7","`id` desc","5");
		//var_dump($classList);
		//exit;
		$menu_sum = count($classList);
		for($i = 0; $i<$menu_sum; $i++)
		{
	   ?>
        <li><span>·</span>
		  <a href="articleshow.php?id=<?php echo $classList[$i]['id'];?>" title="<?php echo $classList[$i]['title'];?>" target="_blank"><?php echo chgtitle($classList[$i]['title'],12);?></a></li>
        <?php
	    }
	    ?>
      </ul>
      <div class="qinc"></div>
    </div>
      
    	<div class="index_jyk_c">
              <div class="index_jyk_t">《学习资料》</div>
              <div><img src="images/xuexiziliao.jpg" /></div>

		<ul>
        <?php
		//selectMany($param,$tbname,$where,$order,$limit)
		$classList = $bw->selectMany("id,title,subTime","bw_article","classId=5","`id` desc","5");
		//var_dump($classList);
		//exit;
		$menu_sum = count($classList);
		for($i = 0; $i<$menu_sum; $i++)
		{
	   ?>
        <li><span>·</span>
		  <a href="articleshow.php?id=<?php echo $classList[$i]['id'];?>" title="<?php echo $classList[$i]['title'];?>" target="_blank"><?php echo chgtitle($classList[$i]['title'],12);?></a></li>
        <?php
	    }
	    ?>
      </ul>
      <div class="qinc"></div>
    </div>

    	<div class="index_jyk_c">
              <div class="index_jyk_t">《高考资讯》</div>
<div><img src="images/gaokaozixun.jpg" /></div>
		<ul>
         <?php
		//selectMany($param,$tbname,$where,$order,$limit)
		$classList = $bw->selectMany("id,title,subTime","bw_article","classId=5","`id` desc","5");
		//var_dump($classList);
		//exit;
		$menu_sum = count($classList);
		for($i = 0; $i<$menu_sum; $i++)
		{
	   ?>
        <li><span>·</span>
		  <a href="articleshow.php?id=<?php echo $classList[$i]['id'];?>" title="<?php echo $classList[$i]['title'];?>" target="_blank"><?php echo chgtitle($classList[$i]['title'],11);?></a></li>
        <?php
	    }
	    ?>
      </ul>
      <div class="qinc"></div>
    </div>
  

      	<div class="index_jyk_c">
              <div class="index_jyk_t">《英语学习》</div>
<div><img src="images/yingyuxuexi.jpg" /></div>
		<ul>
         <?php
		//selectMany($param,$tbname,$where,$order,$limit)
		$classList = $bw->selectMany("id,title,subTime","bw_article","classId=5","`id` desc","5");
		//var_dump($classList);
		//exit;
		$menu_sum = count($classList);
		for($i = 0; $i<$menu_sum; $i++)
		{
	   ?>
        <li><span>·</span>
		  <a href="articleshow.php?id=<?php echo $classList[$i]['id'];?>" title="<?php echo $classList[$i]['title'];?>" target="_blank"><?php echo chgtitle($classList[$i]['title'],10);?></a></li>
        <?php
	    }
	    ?>
      </ul>
      <div class="qinc"></div>
    </div>
      
</div>
<!--资讯结束-->


<!--友情链接开始-->
<div class="index_yqlj">
<?php
    //selectMany($param,$tbname,$where,$order,$limit)
    $linkeData = $bw->selectMany("id, url, title,pic", 'bw_friendlink', "isshow = 1 AND type = 2", "`id` DESC", '5');
    $linksum = count($linkeData);
    for($linki = 0; $linki<$linksum; $linki++)
    {
?>
<a href="<?php echo $linkeData[$linki]['url']; ?>" title="<?php echo $linkeData[$linki]['title']; ?>" target="_blank"><img src="<?php if(!empty($linkeData[$linki]['pic'])){?><?php echo $linkeData[$linki]['pic']; ?><?php }else{?>images/lianjie_logo.jpg<?php }?>" width="173" height="58" style="border:1px #CCC solid;"></a>
<?php
    }//end loop
?>
</div>
<!--友情链接结束-->


<?php include("bottom.php"); ?>
</body>
</html>