<?php  session_start();
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
$classData = $bw->selectOnly('*' ,'bw_qjj', 'id = '.$_SESSION["student_id"]);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<TITLE>武汉上门家教网</TITLE>
<META http-equiv=content-type content="text/html; charset=utf-8">
<META content="" name=description>
<META content="" name=keywords>
<LINK href="css/style.css" type=text/css rel=stylesheet>
<link rel="shortcut icon" href="favicon.ico" />
<link rel="Bookmark" href="favicon.ico">
<script language=Javascript>      
      var proMaxWidth = 170;   
      var proMaxHeight = 180;   
 
    function proDownImage(ImgD){    
      var image=new Image();    
       image.src=ImgD.src;    
        if(image.width>0 && image.height>0){    
         var rate = (proMaxWidth/image.width < proMaxHeight/image.height) ? proMaxWidth/image.width:proMaxHeight/image.height;    
        if(rate <= 1){    
           ImgD.width = image.width*rate;    
           ImgD.height =image.height*rate;    
        } else {    
           ImgD.width = image.width;    
            ImgD.height =image.height;    
        }    
        }    
     }   
</script>
</HEAD>
<BODY>
<?php
if($_GET["act"]=="mod")
{
		if(!empty($_FILES['tupic']['name']))
		{
			$fileName = $bw->upload('huiyuan/',204800,'tupic');
			if($fileName)
			{
				$_POST['tupic'] = $fileName;
			}
		}else{
			unset($_POST['tupic']);
			}
	//die($_POST['tupic']);
			
		if(!empty($_POST["kskqy"]))
		{
		foreach ($_POST["kskqy"] as &$value) {
    	$abc = $abc.$value.",";
			}
			$_POST["kskqy"]=$abc;
		}
		$_POST["kjskm"]=str_replace(",,",",",$_POST["kjskm"]);
		$_POST["kjskm"]=str_replace("，",",",$_POST["kjskm"]);
		if(substr($_POST["kjskm"],0,1)==",")
		{
		$_POST["kjskm"]=substr($_POST["kjskm"],1);
		}
		if(substr($_POST["kjskm"],-1)==",")
		{
		$_POST["kjskm"]=substr($_POST["kjskm"],0,-1);
		}
		//die($_POST["kjskm"]);
		if(!empty($_POST["kfdfs"]))
		{
		foreach ($_POST["kfdfs"] as &$value) {
    	$abcd = $abcd.$value.",";
			}
			$_POST["kfdfs"]=$abcd;
		}
    //检测教员是否改动性别
	$jcData = $bw->selectOnly('sex', 'bw_qjj', 'id='.$_SESSION["student_id"].'', '');
	if($_POST['sex']!=$jcData["sex"]){
	$sql1 = "update bw_qjj set jiance='".$_POST['sex'].'时间：'.date("y-m-d H:i:s")."' where id=".$_SESSION["student_id"]."";
	//die($sql1);
	$bw->query($sql1);
	}
		$sql3 = "update bw_qjj set tel='".$_POST['tel']."',bcs='".$_POST['bcs']."',qjkm='".$_POST['qjkm']."',xynj='".$_POST['xynj']."',xyzk='".$_POST['xyzk']."',gqlx='".$_POST['gqlx']."',skap='".$_POST['skap']."',szqy='".$_POST['szqy']."',adds='".$_POST['adds']."',jysex='".$_POST['jysex']."',zgyq='".$_POST['zgyq']."' where id=".$_SESSION["student_id"]."";;
		
		//print_r($sql3);exit();
		//if($bw->update('bw_qjj', $_POST, 'id = '.$_SESSION["student_id"]))
			if($bw->query($sql3))
		{
			$bw->msg('更新成功!', 'student_jlmod.php');
		}else{
			$bw->msg('更新失败!', 'student_jlmod.php', true);
		}
	
}
?>
<?php include("top.php");?>
<!-- header end-->
<div class="user_c">
<div class="user_left">
<?php include("student_left.php");?>
</div>
<div class="user_right">
     <div id="xcrz_tltle">简历修改</div>
     <div id="xcrz_nr">
       <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
     <form action="?act=mod" method="post" enctype="multipart/form-data">
         <tr>
           <td width="16%" height="40" align="right" bgcolor="#f9f9f9"><b>学员编号：</b></td>
           <td width="16%" align="left" bgcolor="#FFFFFF"><?php echo $classData['id'];?></td>
           <td width="11%" align="right" bgcolor="#f9f9f9"><b>姓名：</b></td>
           <td width="23%" align="left" bgcolor="#FFFFFF"><?php echo $classData['name'];?></td>
           <td width="13%" align="right" bgcolor="#f9f9f9"><b>电话：</b></td>
           <td width="21%" align="left" bgcolor="#FFFFFF">
           <input name="tel" type="text" id="tel" value="<?php echo $classData['tel'];?>"  /></td>
         </tr>
         <tr>
           <td height="40" align="right" bgcolor="#f9f9f9"><b>性别：</b></td>
           <td align="left" bgcolor="#FFFFFF"><?php
		    if($classData['sex']==1)
			  {
			  echo "男";
			  }else{
			  echo "女";
			  }
		  ?></td>
           <td align="right" bgcolor="#f9f9f9"><b>报酬：</b></td>
           <td align="left" bgcolor="#FFFFFF"><input type="text" name="bcs" value="<?php echo $classData['bcs'];?>"></td>
           <td align="right" bgcolor="#f9f9f9"><strong>学科要求</strong></td>
           <td align="left" bgcolor="#FFFFFF"><input type="text" name="qjkm" value="<?php echo $classData['qjkm'];?>"></td>
         </tr>
         <tr>
           <td height="40" align="right" bgcolor="#f9f9f9"><b>学员年级：</b></td>
           <td align="left" bgcolor="#FFFFFF"><input type="text" name="xynj" value="<?php echo $classData['xynj'];?>"></td>
           <td align="right" bgcolor="#f9f9f9"><b>学员状况：</b></td>
           <td align="left" bgcolor="#FFFFFF"><input type="text" name="xyzk" value="<?php echo $classData['xyzk'];?>"></td>
                    <td height="40" align="right" bgcolor="#f9f9f9"><b>公汽路线：</b></td>
           <td align="left" bgcolor="#FFFFFF">
		   <input type="text" name="gqlx" value="<?php echo $classData['gqlx'];?>">
	       </td>
		 </tr>
         <tr>
           <td height="40" align="right" bgcolor="#f9f9f9"><b>授课安排：</b></td>
           <td align="left" bgcolor="#FFFFFF"><input type="text" name="skap" value="<?php echo $classData['skap'];?>">
           </td>
           <td align="right" bgcolor="#f9f9f9"><b>区域：</b></td>
           <td align="left" bgcolor="#FFFFFF"><input type="text" name="szqy" value="<?php echo $classData['szqy'];?>"></td>
           <td align="right" bgcolor="#f9f9f9"><b>地址：</b></td>
           <td align="left" bgcolor="#FFFFFF"><input type="text" name="adds" value="<?php echo $classData['adds'];?>"></td>
         </tr>

         <tr>
           <td height="40" align="center" bgcolor="#f9f9f9"><b>教员性别：</b></td>
           <td bgcolor="#FFFFFF"><input name="jysex" type="text" id="jysex" value="<?php echo $classData['jysex'];?>"></td>
           <td align="right" colspan="3"  bgcolor="#FFFFFF"><strong><b>教员资格要求</b>：</strong></td>
           <td bgcolor="#FFFFFF"><input name="zgyq" type="text"  id="address" value="<?php echo $classData['zgyq'];?>" /></td>
       </tr>
         <tr>
           <td height="40" colspan="6" align="center" bgcolor="#FFFFFF"><p>&nbsp;</p>
           <p>
             <input type="submit" id="button3" value="提   交" style="width:120px; height:30px; font-size:14px; border:1px solid #CCC; background:#FFF;" />
             &nbsp; 
             &nbsp; 
             &nbsp; 
             <input type="reset" id="button4" value="重    置" style="width:120px; height:30px; font-size:14px; border:1px solid #CCC; background:#FFF;"/>
           </p>
		  
		   </td>
         </tr></form>
       </table>
    </div>
</div>
</div>
<script language="JavaScript"><!--
function moveOption(e1, e2){
		 a=1;
     try{
         var e = e1.options[e1.selectedIndex];
		  for (i=0;i<e2.length;i++) {
			if(e2.options[i].value==e.value)
			{
				a=2
				}  
		  }
		  if (a==1&&e.value.length!=0)
		  {
			// alert(e.value.length)
         e2.options.add(new Option(e.text, e.value));
		  }
     }    catch(e){}
}
     function sc(e1)
	 {
         var e = e1.options[e1.selectedIndex];
		 e1.options.remove(e1.selectedIndex);
		 }	 
		 function inputs(a,b){
    var aa,bb;
    aa=document.getElementById(a);
     document.getElementById(b).value="";
    for (i=0;i<aa.length;i++) {
	 bb=document.getElementById(b).value+",";	
     document.getElementById(b).value=bb+aa.options[i].value;
     //alert(aa.options[i].value);
    }
   }
//--></script>
<!-- main end-->
<?php include("bottom.php");?>
<!-- footer end-->
</BODY>
</HTML>
