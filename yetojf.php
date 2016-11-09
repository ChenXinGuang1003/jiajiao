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

include 'inc/config.php';
	
$jifenData = $bw->selectOnly('*' ,'bw_jifenconfig');
$bili=$jifenData['bili'];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<!-- saved from url=(0054)#?WT.mc_id=c03-BDPP-101&WT.srch=1 -->
<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<TITLE>武汉上门家教网</TITLE>
<META http-equiv=content-type content="text/html; charset=utf-8">
<META content="" name=description>
<META content="" name=keywords>
<META content=1 name=SmartView_Page>
<META content="本页版权归武汉上门家教网所有。all rights reserved" name=copyright>
<LINK href="css/style.css" type=text/css rel=stylesheet>
<link rel="shortcut icon" href="favicon.ico" />
<link rel="Bookmark" href="favicon.ico"><META content="MSHTML 6.00.2900.6082" name=GENERATOR>
</HEAD>
<BODY>
<?php include("top.php");?>
<!-- header end-->
<div class="user_c">
<div class="user_left">
<?php include("user_left.php");?>
</div>
<div class="user_right">
    <div id="xcrz_nr">
      <table width="748" border="0" bgcolor="#C9C9C9" cellspacing="1" cellpadding="0">
      <form action="yuetojifen.php" method="post">      
	  <tr>
          <td width="746" height="30" align="left" valign="middle" bgcolor="#F1F1F1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 账户余额</td>
        </tr>
        <tr>
          <td bgcolor="#FFFFFF"><table width="746" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="503" height="50" align="left" valign="middle">&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                <font style="font-size:16px; font-weight:bold"><?
$classData = $bw->selectOnly('money' ,'bw_member', 'id = '.$_SESSION["userid"]);
echo $classData['money'];
?></font>&nbsp; 元 兑换积分比例是1:<?php echo $bili; ?>
			  
			   </td>
			   <td><input type="text" name="money" placeholder="输入相应的余额"></td>
              <td width="243" align="center" valign="middle"><input type="submit" value="提交兑换"></td>
            </tr>
			</form>
          </table></td>
        </tr>
      </table>
    </div>
</div>
</div>
<!-- main end-->
<?php include("bottom.php");?>
<!-- footer end-->
</BODY>
</HTML>
