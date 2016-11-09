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
$classData = $bw->selectOnly('*' ,'bw_member', 'id = '.$_SESSION["userid"]);
$username = $classData['username'];

$list = $bw->selectMany('*' ,'jifen_reason', 'username = "'.$username.'"');

?>
<table>
    <thead>
        <tr>
            <th>积分</th>
            <th>原因</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($list as $a):?>
        <tr>
            <td><?php echo $a['jifen']?></td>
            <td><?php echo $a['reason']?></td>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>
