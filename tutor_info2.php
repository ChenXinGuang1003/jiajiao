<?php session_start();
if(!empty($_GET["lang"])){
setcookie("cookie_lang",base64_decode(iconv("gb2312","utf-8",$_GET["lang"])), time()+2592000);
echo "<script language='javascript'>	window.location.href='index.php';  </script>";
}
if($_COOKIE["cookie_lang"]=="")
{
setcookie("cookie_lang","武汉站", time()+2592000);
echo "<script language='javascript'>	window.location.href='index.php';  </script>";
}
include("inc/config.php");
	if($_SESSION["jiesou"]!=1)
	{
		echo "<script>location.href='tutor.php'</script>";
		exit;
		}
	if($bw->selectOnly('username' ,'bw_member', "username = '".$_POST["username"]."'"))
	{
		$bw->msg("会员号已经存在");
		echo "<script>history.back();</script>";
		exit;
		}
$diaoquData = $bw->selectOnly('*', 'bw_config', "lang='".$_COOKIE["cookie_lang"]."'", '');
 ?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<!-- saved from url=(0054)#?WT.mc_id=c03-BDPP-101&WT.srch=1 -->
<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<title><?php echo $service_title; ?></title>
<meta name="keywords" content="<?php echo $service_keyword.'-'.$service_title; ?>" />
<meta name="description" content="<?php echo $service_description.'-'.$service_title; ?>" />
<META http-equiv=content-type content="text/html; charset=utf-8">
<LINK href="css/style.css" type=text/css rel=stylesheet>
<link rel="shortcut icon" href="favicon.ico" />
<link rel="Bookmark" href="favicon.ico"><script language="javascript">
function yanz()
{
	if(document.getElementById("truename").value=="")
	{	
	document.getElementById("truename").focus();
	alert("请输入您的姓名");
	return false;
	}
	if(document.getElementById("truename").value.length<2)
	{	
	document.getElementById("truename").focus();
	alert("请正确的输入您的姓名");
	return false;
	}		
	if(document.getElementById("truename").value.length>6)
	{	
	document.getElementById("truename").focus();
	alert("请正确的输入您的姓名");
	return false;
	}	
	if(document.getElementById("sex").value=="")
	{	
	document.getElementById("sex").focus();
	alert("请选择您的性别");
	return false;
	}	
	if(document.getElementById("birthday").value=="")
	{	
	document.getElementById("birthday").focus();
	alert("请选择您的出生年份");
	return false;
	}
	if(document.getElementById("birthday").value=="")
	{	
	document.getElementById("birthday").focus();
	alert("请选择您的出生年份");
	return false;
	}
	if(document.getElementById("xueli").value=="")
	{	
	document.getElementById("xueli").focus();
	alert("请选择您的目前学历");
	return false;
	}
	if(document.getElementById("csd").value=="")
	{	
	document.getElementById("csd").focus();
	alert("请选择您的出生地省份");
	return false;
	}
	if(document.getElementById("mqsf").value=="")
	{	
	document.getElementById("mqsf").focus();
	alert("请选择您的目前身份");
	return false;
	}
	if(document.getElementById("quyu").value=="")
	{	
	document.getElementById("quyu").focus();
	alert("请选择您的所在区域");
	return false;
	}
	if(document.getElementById("guojia").value=="")
	{	
	document.getElementById("guojia").focus();
	alert("请填写您留学的国家或国籍");
	return false;
	}
	if(document.getElementById("zhuanye").value=="")
	{	
	document.getElementById("zhuanye").focus();
	alert("请填写您的专业");
	return false;
	}
	if(document.getElementById("idcode").value=="")
	{	
	document.getElementById("idcode").focus();
	alert("请填写您的身份证或者护照");
	return false;
	}
	if(document.getElementById("xuexiao").value=="")
	{	
	document.getElementById("xuexiao").focus();
	alert("请填写您毕业或者就读的学校");
	return false;
	}
	if(document.getElementById("telphone").value=="")
	{	
	document.getElementById("telphone").focus();
	alert("请输入您的联系电话，方便我们与您取得联系");
	return false;
	}
	if(document.getElementById("address").value=="")
	{	
	document.getElementById("address").focus();
	alert("请输入您的地址");
	return false;
	}
	return true;
} 
</script>
</HEAD>
<BODY>
<?php include("top.php");?>
<!-- header end-->
<div id="all_main_all">
     <div id="allmain_all_benner"><img src="images/zjj_benner.jpg" width="960" height="68" border="0"></div>
	 <div id="all_main_all_box">
	      <div id="all_main_all_box_left">
		       <div id="all_main_all_box_left_top"><b style="font-size:16px; color:#fe5009;">做家教</b>&nbsp;&nbsp;&nbsp;当前位置：做家教</div>
			   <div id="all_main_all_box_left_mid">
			        <div id="tutor_box">
				      <div id="title" style="width:670px; height:36px; padding:1px;">
					       <div style="width:635px; height:36px; background:#f4f4f4; padding-left:35px;"> <strong>新教员注册第二步: </strong><font color="#fe5d08">2</font>填写详细个人信息</div>
					  </div>
					  <div id="tutor_box_center" style="width:668px; padding:1px; border:1px #f4f4f4 solid;">
					    <form action="tutor_infoto.php" method="post">
						<div style="width:668px; height:auto; margin:0 auto;  background:#f4f4f4;">
						<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td height="50" colspan="6">&nbsp;</td>
                          </tr>
                          <tr>
                            <td width="120" height="35" align="right">真实姓名：</td>
                            <td colspan="5"><label>
                              <input name="truename" type="text" class="tutor_input" id="truename">
                              <span style="color:#F00">*请与证件上的姓名相符合，否则将不能通过认证</span>
                            </label></td>
                          </tr>
                          <tr>
                            <td height="35" align="right">性&nbsp;&nbsp;&nbsp;别：</td>
                            <td><label>
                              <select name="sex" id="sex">
                                <option>--请选择--</option>
                                <option value="1">男</option>
                                <option value="2">女</option>
                              </select>
                            </label><span style="color:#F00">&nbsp;*</span></td>
                            <td align="right">出生年份：</td>
                            <td><select name="birthday" id="birthday">
                              <option>--请选择--</option>
                              <?php
							  $nian1="20".date("y");
							  $xiao=$nian1-70;
							//  echo $nian1;
                             for($nian=$xiao;$nian<$nian1;$nian++)
							  {
							  ?>
                              <option><?php echo $nian;?></option>
                              <?php
                              }
							  ?>
                            </select><span style="color:#F00">&nbsp;*</span></td>
                            <td align="right">目前学历：</td>
                            <td><select name="xueli" id="xueli">
                              <option>--请选择--</option>
                             <?php
$dir=$diaoquData["xueli"];
$split_dir = split ('[,.-]', $dir); //返回一个Array,你可以用for读出来
for($i=0;$i<count($split_dir);$i++)

{  ?>
              <option value="<?php echo $split_dir[$i];?>"><?php echo $split_dir[$i];?></option>
              <?php
}
			  ?>
                            </select><span style="color:#F00">&nbsp;*</span></td>
                          </tr>
                          <tr>
                            <td height="35" align="right">出生地省份：</td>
                            <td><select name="csd" id="csd">
                              <option>--请选择--</option>
                              <option value="北京">北京</option>
                                <option value="天津">天津</option>
                                <option value="厦门">厦门</option>
                                <option value="重庆">重庆</option>
                                <option value="安徽">安徽</option>
                                <option value="江苏">江苏</option>
                                <option value="浙江">浙江</option>
                                <option value="福建">福建</option>
                                <option value="甘肃">甘肃</option>
                                <option value="广东">广东</option>
                                <option value="广西">广西</option>
                                <option value="贵州">贵州</option>
                                <option value="海南">海南</option>
                                <option value="河北">河北</option>
                                <option value="河南">河南</option>
                                <option value="黑龙江">黑龙江</option>
                                <option value="湖北">湖北</option>
                                <option value="湖南">湖南</option>
                                <option value="吉林">吉林</option>
                                <option value="江西">江西</option>
                                <option value="辽宁">辽宁</option>
                                <option value="内蒙">内蒙</option>
                                <option value="宁厦">宁厦</option>
                                <option value="青海">青海</option>
                                <option value="山东">山东</option>
                                <option value="山西">山西</option>
                                <option value="陕西">陕西</option>
                                <option value="四川">四川</option>
                                <option value="西藏">西藏</option>
                                <option value="香港">香港</option>
                                <option value="新疆">新疆</option>
                            </select><span style="color:#F00">&nbsp;*</span></td>
                            <td align="right">目前身份：</td>
                            <td><select name="mqsf" id="mqsf">
                              <option>----请选择----</option>
                      <?php
$dir=$diaoquData["shenfen"];
$split_dir = split ('[,.-]', $dir); //返回一个Array,你可以用for读出来
for($i=0;$i<count($split_dir);$i++)

{  ?>
              <option value="<?php echo $split_dir[$i];?>"><?php echo $split_dir[$i];?></option>
              <?php
}
			  ?>
                            </select><span style="color:#F00">&nbsp;*</span></td>
                            <td align="right">区&nbsp;&nbsp; 域：</td>
                            <td><select name="quyu" id="quyu">
                             <option>--请选择--</option>   <?php
$dir=$diaoquData["quyu"];
$split_dir = split ('[,.-]', $dir); //返回一个Array,你可以用for读出来
for($i=0;$i<count($split_dir);$i++)

{  ?>
              <option value="<?php echo $split_dir[$i];?>"><?php echo $split_dir[$i];?></option>
              <?php
}
			  ?>
                            </select>
                            <span style="color:#F00">&nbsp;*</span></td>
                          </tr>
                          <tr>
                            <td height="35" align="right">国籍 / 留学国家：</td>
                            <td height="25" colspan="5">
							 <select name="guojia" id="guojia" onChange="editable(this);">

    <option value="中国">中国</option>
	<option value="美国">美国</option>
	<option value="日本">日本</option>
		
    <option value="">其它国家</option>

    </select>

<script language="javascript">

function editable(select1){

   if(select1.value == ""){

      var newvalue = prompt("其它国家","其他");

      if(newvalue){

         addSelected(select1,newvalue,newvalue);

      }

   }

}

function addSelected(fld1,value1,text1){

    if (document.all)    {

            var Opt = fld1.document.createElement("OPTION");

            Opt.text = text1;

            Opt.value = value1;

            fld1.options.add(Opt);

            Opt.selected = true;

    }else{

            var Opt = new Option(text1,value1,false,false);

            Opt.selected = true;

            fld1.options[fld1.options.length] = Opt;

    }

}

</script>
							
							
							
							
                            <span style="color:#F00">&nbsp;*</span></td>
                          </tr>
                          <tr>
                            <td height="35" align="right">专&nbsp;&nbsp;&nbsp;业：</td>
                            <td height="25" colspan="5">
							 <select name="zhuanye" id="zhuanye" onChange="editable(this);">

    <option value="经济学类">经济学类(包括金融学、国际经济与贸易、会计学、经济学等)</option>
	<option value="体育学">体育学(包括运动训练、竞技体育、体育健身与保安等)</option>
	<option value="外国语言文学类">外国语言文学类(包括英语、德语、法语、日语、商务英语等)</option>
	<option value="中国语言文学类">中国语言文学类(对外汉语、中国文学、公共关系与文秘等)</option>    
	<option value="艺术类">艺术类(包括音乐学、绘画、表演、摄影、影视广告、形象设计等)</option>
	<option value="中医学类">中医学类 (包括中医学、中医骨伤科学、中西医结合等)</option>
	<option value="药学类">药学类(包括药学、中药学、药品营销等)</option>
	<option value="管理科学与工程类">管理科学与工程类(包括信息管理与信息系统、工程管理等)</option>
	<option value="工商管理类">工商管理类(包括工商管理、旅游管理、金融管理、会计学等)</option>    
	<option value="公共管理类">公共管理类(包括行政管理、海关管理、公共事业管理等)</option>
	<option value="新闻传播学类">新闻传播学类(包括新闻学、编辑出版学、军事新闻等)</option>
	<option value="农林经济管理类">农林经济管理类(包括农林经济管理、农村区域发展等)</option>
	<option value="教育学类">教育学类(包括特殊教育学、教育学、学前教育等)</option>    
	<option value="图书档案学类">图书档案学类(包括图书馆学、档案学等)</option>
	<option value="哲学类">哲学类(包括哲学、伦理学等)</option>
	<option value="法学类">法学类(包括经济法、律师事务、律师与法律服务等)</option>
	<option value="政治学">政治学(包括国际政治、外交学、国际关系等)</option>
	<option value="教学类">教学类(教育科技学、舞蹈表演与教育、儿童教育等)</option>    
	<option value="历史学类">历史学类(世界历史、考古学、历史与文化旅游等)</option>
	<option value="实用技术类">实用技术类(包括计算机网络工程与管理、建筑装饰设计与工程等)</option>
	<option value="公安学类">公安学类(包括侦查学、刑事侦察、经济犯罪侦察等)</option>
	<option value="数学类">数学类(包括信息与计算科学、信息科学、医学信息学等)</option>    
	<option value="物理学类">物理学类(包括应用物理学、声学、物理学教育等)</option>
	<option value="地质学类">地质学类(包括地质学等)</option>
	<option value="生物科学类">生物科学类(包括生物科学、生物技术、微生物应用技术等)</option>
	<option value="力学类">力学类(包括理论与应用力学)</option>    
	<option value="电子信息科学类">电子信息科学类(包括电子信息科学与技术光电技术应用等)</option>
	<option value="材料科学学类">材料科学学类(包括材料物理、材料化学)</option>
	<option value="环境科学类">环境科学类(包括环境科学、生态学)</option>
	<option value="心理学类">心理学类(包括心理学、应用心理学、心理咨询)</option>    
	<option value="统计学类">统计学类(包括统计科学、电算化会计与统计、统计与会计等)</option>
	<option value="材料类">材料类(包括冶金工程、化学装潢材料及应用、宝石学等)</option>
	<option value="机械类">机械类(包括工业设计、化工设备与机械、飞机及发动机维修等)</option>
	<option value="电气信息类">电气信息类(包括自动化、计算机软件、移动通信等)</option>    
	<option value="土建类">土建类(包括建筑学、城市规划、土木工程等)</option>
	<option value="水利类">水利类(水利水电工程、水电站动力设备等)</option>
	<option value="测绘类">测绘类(测绘工程、测量工程、环境治理工程等)</option>
	<option value="环境与安全类">环境与安全类(环境工程、室内环境控制工程、安全技术等)</option>
	<option value="化工与制药类">化工与制药类(制药工程、化学工程、精细化工等)</option>
	<option value="交通运输类">交通运输类(交通工程、飞行技术、铁道运输等)</option>
	<option value="农业工程类">农业工程类(包括农业机械化及其自动化、农业电气化与自动化等)</option>    
	<option value="口腔医学类">口腔医学类(包括口腔医学、口腔修复工艺学等)</option>
	<option value="护理学类">护理学类(包括护理学、高级护理、中西药结合护理等)</option>
	
    <option value="">其它专业</option>

    </select>

<script language="javascript">

function editable(select1){

   if(select1.value == ""){

      var newvalue = prompt("其它专业","其他");

      if(newvalue){

         addSelected(select1,newvalue,newvalue);

      }

   }

}

function addSelected(fld1,value1,text1){

    if (document.all)    {

            var Opt = fld1.document.createElement("OPTION");

            Opt.text = text1;

            Opt.value = value1;

            fld1.options.add(Opt);

            Opt.selected = true;

    }else{

            var Opt = new Option(text1,value1,false,false);

            Opt.selected = true;

            fld1.options[fld1.options.length] = Opt;

    }

}

</script>
							
							
							
							
							
							<span style="color:#F00">&nbsp;*必须是中文</span></td>
                          </tr>
                          <tr>
                            <td height="35" align="right">身份证 / 护照：</td>
                            <td height="25" colspan="5"><input name="idcode" type="text" class="tutor_input" id="idcode"><span style="color:#F00">&nbsp;*(此项将严格保密，不对外公开)</span>
                           </td>
                          </tr>
                          <tr>
                            <td height="35" align="right">毕业 / 就读高校：</td>
                            <td height="25" colspan="5"><input name="xuexiao" type="text" class="tutor_inputs" id="xuexiao"><span style="color:#F00">&nbsp;*</span></td>
                          </tr>
                          <tr>
                            <td height="35" align="right">联系电话：</td>
                            <td height="25" colspan="5"><input name="telphone" type="text" class="tutor_input" id="telphone"><span style="color:#F00">&nbsp;*本站可以在第一时间通知您相关合适的家教信息</span>
                            </td>
                          </tr>
                          <tr>
                            <td height="35" align="right">Q&nbsp;&nbsp;&nbsp;&nbsp;Q：</td>
                            <td height="25" colspan="5"><input name="qq" type="text" class="tutor_input" id="qq">
                              <input type="hidden" name="username" id="username" value="<?php echo $_POST["username"];?>">
                              <input type="hidden" name="password" id="password" value="<?php echo $_POST["password"];?>">
                              <input type="hidden" name="email" id="email" value="<?php echo $_POST["email"];?>">
                            <input type="hidden" name="levels" id="levels" value="<?php echo $_POST["levels"];?>"></td>
                          </tr>
                          <tr>
                            <td height="35" align="right"> <label>地&nbsp;&nbsp;&nbsp;址：</label></td>
                            <td colspan="5"><label>
                              <input name="address" type="text" class="tutor_inputs" id="address">
                            </label><span style="color:#F00">&nbsp;*</span></td>
                          </tr>
                          <tr>
                            <td height="100" colspan="6" align="center"><label>
                              <input type="image" name="Submit" src="images/zjj_07.jpg">
                            </label>&nbsp;
                              <label>
                              <input type="image" name="Submit2" src="images/zjj_06.jpg">
                            </label></td>
                          </tr>
                        </table>
						</div>
						</form>
					  </div>
				    </div>
			   </div>
		  </div>
	   <div id="all_main_all_box_right">
	        <div class="tutor_right_pic"><img src="images/zjj_01.jpg"></div>
			<div class="tutor_right_pic"><img src="images/zjj_02.jpg"></div>
			<div class="tutor_right_pic"><img src="images/zjj_03.jpg"></div>
			<div class="tutor_right_pic"><img src="images/zjj_04.jpg"></div>
	   </div>
	 </div>
</div>
<!-- main end-->
<?php include("bottom.php");?>
<!-- footer end-->
</BODY>
</HTML>
