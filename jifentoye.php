<?php
session_start();
include 'inc/config.php';
include("checkuser.php");
$duihuan_jifen=$_POST['jifen'];
$classData = $bw->selectOnly('*' ,'bw_member', 'id = '.$_SESSION["userid"]);
$jifenData = $bw->selectOnly('*' ,'bw_jifenconfig');
$total_jifen=$classData['total_jifen'];

$yue_jifen=($total_jifen-$duihuan_jifen);
$money=$classData['Money'];
$bili=$jifenData['bili'];
$yue_money=($duihuan_jifen/$bili);

$total_money=$money+$yue_money;

$jyid=$_SESSION['userid'];
if($duihuan_jifen>$total_jifen){
	$bw->msg("不可超出积分范围","jftoye.php");
    exit();	
}
if($duihuan_jifen<=0){
	$bw->msg("积分不可小于0","jftoye.php");
    exit();	
}


$lang="武汉";
$reg_jifen=0;
$login_jifen=0;
$jifen=0;
$success_jifen=0;
$vip_jifen=0;
$sql = "update bw_member set total_jifen=$yue_jifen,Money=$total_money,reg_jifen=$reg_jifen,login_jifen=$login_jifen,jifen=$jifen,success_jifen=$success_jifen,vip_jifen=$vip_jifen where id=$jyid";

if($bw->query($sql))
{
$bw->msg("恭喜兑换成功","jftoye.php");
 exit();
}else{
$bw->msg('兑换失败!',"jftoye.php");
 exit();
}
?>