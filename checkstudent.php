<?php 
if(empty($_SESSION["studentname"])||empty($_SESSION["studentpassword"])||empty($_SESSION["student_id"]))
{
  $bw->msg("请登录后正确使用","index.php");
}
?>