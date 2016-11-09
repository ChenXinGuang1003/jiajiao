<?php
	require '../inc/shell.php';
	require '../inc/config.php';
	//selectOnly($param,$tbname,$where,$order)
	$configData = $bw->selectOnly('*', 'bw_jifenconfig', 'id = 1', '');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>网站基本配置</title>
<link rel="stylesheet" type="text/css" href="css/css.css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="editor/xheditor-zh-cn.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
	  $('#information').xheditor({tools:'Blocktag,Fontface,FontSize,Bold,Italic,Underline,Strikethrough,FontColor,BackColor,|,Align,List,Outdent,Indent,|,Link,Unlink,Img,|,Source',skin:'o2007silver',upBtnText:"上传",html5Upload:"true",upMultiple:"99",upLinkUrl:"{editorRoot}uploadTxt.php",upLinkExt:"zip,rar,txt,pdf",upImgUrl:"{editorRoot}uploadImg.php",upImgExt:"jpg,jpeg,gif,png"});
	});
</script>
</head>

<body>
<?php
	//update
	$action = $_GET['action'];
	if(!empty($action) && $action == 'update')
	{
//		foreach ($_POST as $key => $value) { 
//   echo $key . "=>".$value."<br>";
// 
//} 
//exit;
// $xinz="update `bw_jifenconfig` set reg=".$_POST["reg"].",login=".$_POST["login"].",rz=".$_POST["rz"].",pthy=".$_POST["pthy"].",yxhy=".$_POST["yxhy"].",exhy=".$_POST["exhy"].",sxhy=".$_POST["sxhy"].",sixhy=".$_POST["sixhy"].",wxhy=".$_POST["wxhy"].",success_order=".$_POST["success_order"].",mark=".$_POST["mark"]."' where id=1";
//die($xinz);
    

$sql = "UPDATE bw_jifenconfig SET bili=".$_POST["bili"].",reg=".$_POST["reg"].",login=".$_POST["login"].",rz=".$_POST["rz"].",pthy=".$_POST["pthy"].",yxhy=".$_POST["yxhy"].",exhy=".$_POST["exhy"].",sxhy=".$_POST["sxhy"].",sixhy=".$_POST["sixhy"].",wxhy=".$_POST["wxhy"].",success_order=".$_POST["success_order"].",mark='".$_POST["mark"]. "' WHERE id=1";
      // var_dump($bw->query($sql));
      // return;
      // var_dump($sql);
      // return;
        if($bw->query($sql)){
          echo "<script>alert('更新成功!'); history.go(-1); </script>"; 
        } else {
          echo "<script>alert('更新失败!'); history.go(-1); </script>"; 
        }

    // $bw->query($xinz);
			
	}
?>
<form name="webConfigFrom" action="?action=update" enctype="multipart/form-data" method="post">
<table width="1062" height="317" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="415" align="right">积分兑换比例：</td>
    <td width="10">&nbsp;</td>
    <td width="641"><input type="text" name="bili" id="bili" value="<?php echo $configData['bili']; ?>" style="height:25px; line-height:25px; width:80px;" /></td>
  </tr>
  <tr>
    <td width="415" align="right">注册积分(注册一次)：</td>
    <td width="10">&nbsp;</td>
    <td width="641"><input type="text" name="reg" id="reg" value="<?php echo $configData['reg']; ?>" style="height:25px; line-height:25px; width:80px;" /></td>
  </tr>
<tr>
    <td width="415" align="right">登录积分(登录一次)：</td>
    <td width="10">&nbsp;</td>
    <td width="641"><input type="text" name="login" id="login" value="<?php echo $configData['login']; ?>" style="height:25px; line-height:25px; width:80px;" /></td>
  </tr>
  <tr>
    <td width="415" align="right">认证积分：</td>
    <td width="10">&nbsp;</td>
    <td width="641"><input type="text" name="rz" id="rz" value="<?php echo $configData['rz']; ?>" style="height:25px; line-height:25px; width:80px;" /></td>
  </tr>
  <tr>
    <td width="415" align="right">普通会员等级积分：</td>
    <td width="10">&nbsp;</td>
    <td width="641"><input type="text" name="pthy" id="pthy" value="<?php echo $configData['pthy']; ?>" style="height:25px; line-height:25px; width:80px;" /></td>
  </tr>
  <tr>
    <td width="415" align="right">一星级会员等级积分：</td>
    <td width="10">&nbsp;</td>
    <td width="641"><input type="text" name="yxhy" id="yxhy" value="<?php echo $configData['yxhy']; ?>" style="height:25px; line-height:25px; width:80px;" /></td>
  </tr>
  <tr>
    <td width="415" align="right">二星级会员等级积分：</td>
    <td width="10">&nbsp;</td>
    <td width="641"><input type="text" name="exhy" id="exhy" value="<?php echo $configData['exhy']; ?>" style="height:25px; line-height:25px; width:80px;" /></td>
  </tr>
  <tr>
    <td width="415" align="right">三星级会员等级积分：</td>
    <td width="10">&nbsp;</td>
    <td width="641"><input type="text" name="sxhy" id="sxhy" value="<?php echo $configData['sxhy']; ?>" style="height:25px; line-height:25px; width:80px;" /></td>
  </tr>
  <tr>
    <td width="415" align="right">四星级会员等级积分：</td>
    <td width="10">&nbsp;</td>
    <td width="641"><input type="text" name="sixhy" id="sixhy" value="<?php echo $configData['sixhy']; ?>" style="height:25px; line-height:25px; width:80px;" /></td>
  </tr>
  <tr>
    <td width="415" align="right">五星级会员等级积分：</td>
    <td width="10">&nbsp;</td>
    <td width="641"><input type="text" name="wxhy" id="wxhy" value="<?php echo $configData['wxhy']; ?>" style="height:25px; line-height:25px; width:80px;" /></td>
  </tr>
  <tr>
    <td width="415" align="right">已安排订单（成功安排一次订单）：</td>
    <td width="10">&nbsp;</td>
    <td width="641"><input type="text" name="success_order" id="success_order" value="<?php echo $configData['success_order']; ?>" style="height:25px; line-height:25px; width:80px;" /></td>
  </tr>

  <tr>
    <td align="right">积分说明:</td>
    <td>&nbsp;</td>
    <td><textarea name="mark" cols="50" rows="15"  class="xheditor {skin:'default',tools:'full'}" id="mark"><?php echo $configData['mark']; ?></textarea></td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" class="subBtn" value=" 提 交 " /></td>
  </tr>
</table>
</form>
</body>
</html>