<?php
session_start();
date_default_timezone_set("PRC");
include("checkstudent.php");//验证预约者是否登录
include 'inc/config.php';
//print_r($_SESSION);
$xyid=$_SESSION['student_id'];
$jyid=$_POST['jyid'];
$ddzt=1;//订单状态，1试教，2订单成功，3订单失败
$yylx=2;//1教员预约学员，2学员预约教员
$subtime=date("Y-m-d H:i:s",time());//预约提交时间
$ifdd=2;//1不是订单，2是订单
$lang="武汉";
$data=array(
'xyid'=>$xyid,
'jyid'=>$jyid,
'ddzt'=>$ddzt,
'yylx'=>$yylx,
'subtime'=>$subtime,
'ifdd'=>$ifdd,
'addtime'=>$subtime,
'lang'=>$lang
);
if($bw->insert('bw_order', $data))
{
$bw->msg("恭喜你预约成功","student_yyjy.php");
 exit();
}else{
$bw->msg('预约失败!',"student_yyjy.php");
 exit();
}




















?>