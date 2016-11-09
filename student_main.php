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
include("checkstudent.php"); 
$classData = $bw->selectOnly('*' ,'bw_qjj', 'id = '.$_SESSION["student_id"]);
//$classData = $bw->selectOnly('*' ,'bw_qjj', 'id = 108');

?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<title><?php echo $service_title; ?></title>
<meta name="keywords" content="<?php echo $service_keyword.'-'.$service_title; ?>" />
<meta name="description" content="<?php echo $service_description.'-'.$service_title; ?>" />
<META http-equiv=content-type content="text/html; charset=utf-8">
<LINK href="css/style.css" type=text/css rel=stylesheet>
<link rel="shortcut icon" href="favicon.ico" />
<link rel="Bookmark" href="favicon.ico">
<style>
#hyym tr td{padding:5px;}
</style>
<script type="text/JavaScript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
<script type="text/javascript">
	$(document).ready(function(){
		var thisPage = $("#page_SEL");
		thisPage.change(function(){
		location.href="student_main.php?page="+thisPage.val()+"&id="+<?php echo $_SESSION["userid"]; ?>;
		});//end page_SEL 		
	});
</script>
</HEAD>
<BODY>
<?php include("top.php");?>
<!-- header end-->
 
<div class="user_c">
<div class="user_left">
<?php include("student_left.php");?>
</div>
<div class="user_right">
     <div id="xcrz_tltle">欢迎页面</div>
     <div id="xcrz_nr">
	 <table id="hyym" width="90%" border="0" align="center" cellspacing="1" bgcolor="#CCCCCC">
  <tr>
    <td width="30%" height="25" bgcolor="#FFFFFF">尊敬的学员：<?php echo $classData['name'];?></td>
    <td width="30%" bgcolor="#FFFFFF">您的学员编号：<?php echo $classData['id'];?></td>
    <td width="30%" bgcolor="#FFFFFF">学员类型：
	<?php echo  $classData['xylx'];?>	</td>
  </tr>
  <tr>
    <td height="25" bgcolor="#FFFFFF">您的简历被浏览：<?php echo $classData['hits'];?>次</td>
    <td bgcolor="#FFFFFF">已登录：<?php echo $classData['dlcs'];?>次</td>
    <td bgcolor="#FFFFFF">最近登录时间：<?php echo $classData['zjtime'];?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">求教学科:<?php echo $classData['qjkm'];?></td>
    <td bgcolor="#FFFFFF">简历显示情况？：
      <?php 
	if($classData['isshow']==2)
	{
	echo "<span style='color:green'>已发布</span>";
	}
	else{
	echo "<span style='color:red'>未发布</span>";
	}?></td>
	<td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  
  <tr>
    <td height="25" colspan="3" bgcolor="#FFFFFF">
	<br>
	常见注意事项：</td>
    </tr>
  <tr>
    <td height="25" colspan="3" bgcolor="#FFFFFF">
	<?php
			$classData = $bw->selectOnly('content,title' ,'bw_base', 'id = 21');
            echo $classData['content'];
	 ?>	 </td>
    </tr>
	
  
	<tr>
	  <td height="25" colspan="3" bgcolor="#FFFFFF"><div class="user_right">
	    <div id="div2">
          <table width="100%" id="sj" border="0" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
            <tr>
              <td height="29" colspan="6" align="left" bgcolor="#FFFFFF" class="tdbg"><span class="sjgl_memu2">已预约教员订单：</span></td>
              </tr>
            <tr>
              <td width="19%" height="29" align="center" bgcolor="#FFFFFF" class="tdbg">订单时间</td>
              <td width="12%" align="center" bgcolor="#FFFFFF" class="tdbg">教员姓名</td>
              <td width="11%" align="center" bgcolor="#FFFFFF" class="tdbg">求教科目</td>
              <td width="13%" align="center" bgcolor="#FFFFFF" class="tdbg">课时费</td>
              <td width="14%" align="center" bgcolor="#FFFFFF" class="tdbg">信息费</td>
              <td width="13%" align="center" bgcolor="#FFFFFF" class="tdbg">试教状态</td>
              </tr>
            <?php
  //查询
  //selectPage($param,$tbname,$where,$order,$limit)
  //requestPage($tbname,$limit) : array('totalRow'=>$totalRow,'totalPage'=>$totalPage,'page'=>$page,'pagePrev'=>$pagePrev,'pageNext'=>$pageNext);
  $pageSize = PAGESIZE;
  $tbName   = "bw_order";
  
  //$where1    = 'jyid='.$_SESSION["student_id"];
  $where1="yylx=2 and xyid='".$_SESSION["student_id"]."'";
  $where= '';
  //搜索
  if(!empty($_GET['action']) && $_GET['action'] == 'search')
  {
	  if(!empty($_POST['keyword']) && !empty($_POST['leixing']))
	  {
		if($_POST['leixing']=="username")
		{
		$where = " and mid in ( select id from bw_member where username LIKE '%".$_POST['keyword']."%')";
		}
		if($_POST['leixing']=="jflog")
		{
		$where = " and jflog LIKE '%".$_POST['keyword']."%'";
		}
		$_SESSION['wherejflist'] = $where;
	  }
  }
 // die($_SESSION['wherejflist']);
  $list = $bw->selectPage("*",$tbName,$where1.$_SESSION['wherejflist'],"`id` DESC",$pageSize);
  $pageArray = $bw->requestPage($tbName,$where1.$_SESSION['wherejflist'],$pageSize);
  $sum = count($list);
  for($i = 0; $i<$sum; $i++)
  {
  $userData = $bw->selectOnly('name,qjkm,bcs,xxf', 'bw_qjj', "id = ".$list[$i]['xyid']);
  $jyData = $bw->selectOnly('truename', 'bw_member', "id = ".$list[$i]['jyid']);
?>
            <tr>
              <td height="30" align="center" bgcolor="#FFFFFF"><?php echo $list[$i]['addtime']; ?></td>
              <td align="center" bgcolor="#FFFFFF"><?php echo $jyData['truename'];?></td>
              <td align="center" bgcolor="#FFFFFF"><?php echo $userData['qjkm']; ?></td>
              <td align="center" bgcolor="#FFFFFF"><?php echo $userData['bcs']; ?>元/小时</td>
              <td align="center" bgcolor="#FFFFFF"><?php echo $userData['xxf']; ?></td>
              <td align="center" bgcolor="#FFFFFF"><?php  switch ($list[$i]['ddzt'])
		{
		case 1: echo "试教中";break;
		case 2: echo "订单成功";break;
		case 3: echo "订单失败";break;
		}?></td>
              </tr>
            <?php
	}//end loop
?>
            <tr>
              <td height="30" colspan="6" align="center" bgcolor="#f7f7f7" style="line-height:20px;">共:<?php echo $pageArray['totalRow']; ?>&nbsp;条信息&nbsp;当前:<span><?php echo $pageArray['page']; ?></span>/<?php echo $pageArray['totalPage']; ?>页&nbsp;&nbsp;&nbsp;&nbsp; <a href="?page=1">第一页</a>&nbsp;&nbsp; <a href="?page=<?php echo $pageArray['pagePrev']; ?>">上一页</a>&nbsp;&nbsp; <a href="?page=<?php echo $pageArray['pageNext']; ?>">下一页</a>&nbsp;&nbsp; <a href="?page=<?php echo $pageArray['totalPage']; ?>">尾页</a>&nbsp;&nbsp;
                跳到
                <select name="select" id="select"  onChange="MM_jumpMenu('parent',this,0)">
                              <option value="">---</option>
                              <?php
						  for($goPage = 1; $goPage <= $pageArray['totalPage']; $goPage++)
						  {
						?>
                              <option value="?page=<?php echo $goPage; ?>"><?php echo $goPage; ?></option>
                              <?php
						 }
						?>
                          </select></td>
            </tr>
          </table>
	      </div>
	    </div></td>
	  </tr>
	
	<tr>
	  <td height="25" colspan="3" bgcolor="#FFFFFF">
	  <div class="user_right">
	  <div id="div2">
	  <table width="100%" id="sj" border="0" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
        <tr>
          <td height="29" colspan="6" align="left" bgcolor="#FFFFFF" class="tdbg"><span class="sjgl_memu2">教员预约订单：</span></td>
          </tr>
        <tr>
          <td width="19%" height="29" align="center" bgcolor="#FFFFFF" class="tdbg">订单时间</td>
          <td width="12%" align="center" bgcolor="#FFFFFF" class="tdbg">教员姓名</td>
          <td width="11%" align="center" bgcolor="#FFFFFF" class="tdbg">求教科目</td>
          <td width="13%" align="center" bgcolor="#FFFFFF" class="tdbg">课时费</td>
          <td width="14%" align="center" bgcolor="#FFFFFF" class="tdbg">信息费</td>
          <td width="13%" align="center" bgcolor="#FFFFFF" class="tdbg">试教状态</td>
		  </tr>
		<?php
  //查询
  //selectPage($param,$tbname,$where,$order,$limit)
  //requestPage($tbname,$limit) : array('totalRow'=>$totalRow,'totalPage'=>$totalPage,'page'=>$page,'pagePrev'=>$pagePrev,'pageNext'=>$pageNext);
  $pageSize = PAGESIZE;
  $tbName   = "bw_order";
  
  //$where1    = 'jyid='.$_SESSION["student_id"];
  $where1="yylx=1 and xyid='".$_SESSION["student_id"]."'";
  $where= '';
  //搜索
  if(!empty($_GET['action']) && $_GET['action'] == 'search')
  {
	  if(!empty($_POST['keyword']) && !empty($_POST['leixing']))
	  {
		if($_POST['leixing']=="username")
		{
		$where = " and mid in ( select id from bw_member where username LIKE '%".$_POST['keyword']."%')";
		}
		if($_POST['leixing']=="jflog")
		{
		$where = " and jflog LIKE '%".$_POST['keyword']."%'";
		}
		$_SESSION['wherejflist'] = $where;
	  }
  }
 // die($_SESSION['wherejflist']);
  $list = $bw->selectPage("*",$tbName,$where1.$_SESSION['wherejflist'],"`id` DESC",$pageSize);
  $pageArray = $bw->requestPage($tbName,$where1.$_SESSION['wherejflist'],$pageSize);
  $sum = count($list);
  for($i = 0; $i<$sum; $i++)
  {
  $userData = $bw->selectOnly('name,qjkm,bcs,xxf', 'bw_qjj', "id = ".$list[$i]['xyid']);
  $jyData = $bw->selectOnly('truename', 'bw_member', "id = ".$list[$i]['jyid']);
?>
        <tr>
          <td height="30" align="center" bgcolor="#FFFFFF"><?php echo $list[$i]['addtime']; ?></td>
          <td align="center" bgcolor="#FFFFFF"><?php echo $jyData['truename'];?></td>
          <td align="center" bgcolor="#FFFFFF"><?php echo $userData['qjkm']; ?></td>
          <td align="center" bgcolor="#FFFFFF"><?php echo $userData['bcs']; ?>元/小时</td>
          <td align="center" bgcolor="#FFFFFF"><?php echo $userData['xxf']; ?></td>
          <td align="center" bgcolor="#FFFFFF"><?php  switch ($list[$i]['ddzt'])
		{
		case 1: echo "试教中";break;
		case 2: echo "订单成功";break;
		case 3: echo "订单失败";break;
		}?></td>
		</tr>
		<?php
	}//end loop
?>
        <tr>
          <td height="30" colspan="6" align="center" bgcolor="#f7f7f7" style="line-height:20px;">共:<?php echo $pageArray['totalRow']; ?>&nbsp;条信息&nbsp;当前:<span><?php echo $pageArray['page']; ?></span>/<?php echo $pageArray['totalPage']; ?>页&nbsp;&nbsp;&nbsp;&nbsp; <a href="?page=1">第一页</a>&nbsp;&nbsp; <a href="?page=<?php echo $pageArray['pagePrev']; ?>">上一页</a>&nbsp;&nbsp; <a href="?page=<?php echo $pageArray['pageNext']; ?>">下一页</a>&nbsp;&nbsp; <a href="?page=<?php echo $pageArray['totalPage']; ?>">尾页</a>&nbsp;&nbsp;
				跳到
                  <select name="page_SEL" id="page_SEL"  onChange="MM_jumpMenu('parent',this,0)">
                    <option value="">---</option>
                    <?php
						  for($goPage = 1; $goPage <= $pageArray['totalPage']; $goPage++)
						  {
						?>
                    <option value="?page=<?php echo $goPage; ?>"><?php echo $goPage; ?></option>
                    <?php
						 }
						?>
                  </select></td>
        </tr>
      </table>
	</div>
  </div>	  </td>
	  </tr>
	<tr>
    <td height="25" colspan="3" bgcolor="#FFFFFF"><br></td>
    </tr>
  <tr>
    <td height="25" colspan="3" bgcolor="#FFFFFF">&nbsp;</td>
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
