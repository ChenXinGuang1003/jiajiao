<?php
session_start();
include 'inc/config.php';
include("checkuser.php");
$duihuan_money=$_POST['money'];

$classData = $bw->selectOnly('Money,jifen,total_jifen' ,'bw_member', 'id = '.$_SESSION["userid"]);
$jifenData = $bw->selectOnly('*' ,'bw_jifenconfig');
$yue_money=$classData['Money']-$duihuan_money;
if($duihuan_money>$classData['Money']){
	$bw->msg("金额超出余额范围","yetojf.php");
    exit();	
}
if($duihuan_money<=0){
	$bw->msg("金额不可小于0","yetojf.php");
    exit();	
}
$bili=$jifenData['bili'];
$jifen=($duihuan_money*$bili);

$jyid=$_SESSION['userid'];
$lang="武汉";
$yue_jifen=($classData['jifen']+$jifen);


$total_jifen=($jifen+$classData['total_jifen']);

$sql = "update bw_member set total_jifen=$total_jifen,jifen=$yue_jifen,Money=$yue_money where id=$jyid";

if($bw->query($sql))
{
$bw->msg("恭喜兑换成功","yetojf.php");
 exit();
}else{
$bw->msg('兑换失败!',"yetojf.php");
 exit();
}
?>