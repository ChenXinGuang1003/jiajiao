<?php 

session_start();
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
</HEAD>
<BODY>
<?php?>
<?php include("top.php");?>
<!-- header end-->
<div id="all_main_all">
<form id="form1" name="form1" method="post" action="student_register.php">
<input type="hidden" name="name" value="<?php echo $_POST['username']?>">
<input type="hidden" name="password" value="<?php echo $_POST['password']?>">
<input type="hidden" name="email" value="<?php echo $_POST['email']?>">
  <table width="90%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
    <tr style="display:none;" bgcolor="#FFFFFF">
    <td align="center">性别修改检测:</td>
    <td colspan="7" align="left">&nbsp;对年级的修改：<?php echo $classData['jiance'];?>&nbsp;&nbsp;对区域的修改：<?php echo $classData['jiance2'];?></td>
  </tr>

    <tr>
      <td align="center" bgcolor="#f9f9f9"><strong>性别：</strong></td>
      <td bgcolor="#FFFFFF"><select name="xysex">
        <option value="">--请选择--</option>
        <option value="男">男</option>
        <option value="女">女</option>
      </select></td>
      <td align="right" bgcolor="#F9F9F9"><strong>联系电话：</strong></td>
      <td bgcolor="#FFFFFF"><input name="tel" type="text" id="tel" value=""/></td>
       <td colspan="3" align="right" bgcolor="#F9F9F9"><strong>报酬：</strong></td>
       <td bgcolor="#FFFFFF"><input name="bcs" type="text" id="bcs" value=""/></td>
    
	</tr>
    <tr>
      <td height="30" align="center" bgcolor="#f9f9f9"><strong>学员年级：</strong></td>
      <td bgcolor="#FFFFFF"><select name="xynj" id="xynj">
        <option value="" <?php if(empty($classData['xynj'])){echo 'selected="selected"';} ?>>--请选择--</option>
        <?php
				$dir=$diaoquData["nianji"];
				$split_dir = split ('[,.-]', $dir); //返回一个Array,你可以用for读出来
				for($i=0;$i<count($split_dir);$i++)

				{  ?>
						<option value="<?php echo $split_dir[$i];?>" <?php 
							  if($classData['xynj']==$split_dir[$i])
							  {
								  echo 'selected="selected"';
								  }
							  ?> ><?php echo $split_dir[$i];?></option>
						<?php
				}
			  ?>
      </select></td>
      <td align="center" bgcolor="#f9f9f9"><strong>求教科目：</strong></td>
      <td bgcolor="#FFFFFF"><input name="qjkm" type="text" id="qjkm" value=""/></td>
      <td align="center" bgcolor="#f9f9f9"><strong>学员类型：</strong></td>
      <td bgcolor="#FFFFFF">
		  <select name="xylx">
			<option  value="">--请选择--</option>
			<option  value="零基础">零基础</option>
			<option  value="补差型">补差型</option>
			<option  value="提高型">提高型</option>
			<option  value="拔尖型">拔尖型</option>
		  </select>
	  </td>
      <td align="right" bgcolor="#F9F9F9"><strong>所在区域：</strong></td>
      <td bgcolor="#FFFFFF">
	  <select name="szqy" id="szqy">
        <option value="" <?php if(empty($classData['szqy'])){echo 'selected="selected"';} ?>>--请选择--</option>
        <?php
		$dir=$diaoquData["quyu"];
		$split_dir = split ('[,.-]', $dir); //返回一个Array,你可以用for读出来
		for($i=0;$i<count($split_dir);$i++)

		{  ?>
				<option value="<?php echo $split_dir[$i];?>" <?php 
					  if($classData['szqy']==$split_dir[$i])
					  {
						  echo 'selected="selected"';
						  }
					  ?> ><?php echo $split_dir[$i];?></option>
				<?php
		}
					 
		?>
      </select>
	 </td>
    </tr>


    <tr>
      <td height="30" align="center" bgcolor="#f9f9f9"><strong>详细地址：</strong></td>
      <td colspan="7" bgcolor="#FFFFFF"><input name="adds" type="text" id="adds" value="" style="width:100%"/></td>
    </tr>
    <tr>
      <td height="30" align="center" bgcolor="#f9f9f9"><b>学员状况：</b></td>
      <td colspan="7" bgcolor="#FFFFFF">
	  <textarea name="xyzk" style="width:100%" rows="5" id="xyzk"></textarea>
	  </td>
    </tr>
    <tr>
      <td height="30" align="center" bgcolor="#f9f9f9"><b>授课安排：</b></td>
      <td colspan="7" bgcolor="#FFFFFF">
	  <textarea name="skap" style="width:100%" rows="5" id="skap"></textarea>
	  </td>
    </tr>
    <tr>
      <td height="30" colspan="8" align="left" bgcolor="#f9f9f9" >      &nbsp;&nbsp;&nbsp;<span class="STYLE1"><strong>学员状况：</strong>请尽量详细填写学员所在的年级，学员各科的学习情况以及薄弱的学科，以便本中心安排最符合学员本人情况的老师<br />
&nbsp;&nbsp;&nbsp;<strong>授课安排：</strong>请填写你需要教员辅导的时间</span></td>
    </tr>
    <tr>
      <td height="30" align="center" bgcolor="#f9f9f9"><b>公汽路线：</b></td>
      <td colspan="7" bgcolor="#FFFFFF">
	  <input name="gqlx" type="text" id="gqlx" style="width:100%" value=""/>
	  </td>
    </tr>
    <tr>
      <td height="30" align="center" bgcolor="#f9f9f9"><b style="color:#ff621a">教员要求：</b></td>
      <td colspan="7" bgcolor="#FFFFFF">&nbsp;
	  <input name="memo" type="text" id="memo" value=""/>
	  </td>
    </tr>
    <tr>
      <td height="30" align="center" bgcolor="#f9f9f9"><b>性别要求：</b></td>
      <td bgcolor="#FFFFFF">
	 <select name="jysex">
		<option  value="不限">--不限--</option>
		<option  value="男">男</option>
		<option  value="女">女</option>
	 </select>	  </td>
      <td align="right" bgcolor="#F9F9F9"><b>资格要求：</b></td>
      <td colspan="5" bgcolor="#FFFFFF"><select name="zgyq" id="zgyq">
        <option value="">选择类型</option>
        <option value="1">大学生</option>
        <option value="2">职业教师</option>
        <option value="3">留学、海归</option>
        <option value="5">明星在职教师</option>
        <option value="6">明星大学生</option>
        <option value="4">其他</option>
      </select></td>
    </tr>
    <tr>
      <td height="30" align="center" bgcolor="#f9f9f9"><b>其他要求：</b></td>
      <td colspan="7" bgcolor="#FFFFFF"><label>
        <textarea name="qtyq" style="width:100%" rows="5" id="qtyq"></textarea>
      </label></td>
    </tr>
	<tr>
      <td height="30" colspan="8" align="center" bgcolor="#f9f9f9"><label>
        <input type="submit"  value="提交" />&nbsp;&nbsp;
        <input type="reset" name="Submit2" value="重置" />
      </label></td>
    </tr>
  </table>
</form>
</div>


<!-- main end-->
<?php include("bottom.php");?>
<!-- footer end-->
</BODY>
</HTML>
