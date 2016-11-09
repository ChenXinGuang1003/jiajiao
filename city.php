<?php
$lang=$_GET['city'];;
if(isset($_COOKIE['cookie_lang'])){
	setcookie("cookie_lang", "", time()-3600);
	unset($_COOKIE['cookie_lang']);//销毁
	setcookie("cookie_lang",$lang, time()+3600);
	header('location:index.php');
    }else{
    setcookie("cookie_lang",$lang, time()+3600);	
	header('location:index.php');
	} 
?>