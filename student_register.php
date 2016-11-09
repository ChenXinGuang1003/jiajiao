<?php
include("inc/config.php");
include("mail.php");
$configData = $bw->selectOnly('*', 'bw_config');
$mima=$_POST["password"];
$_POST["password"]=md5($_POST["password"]);
if($bw->insert('bw_qjj', $_POST))
{
		
		$smtpserver = "smtp.163.com";    //你选择的SMTP服务器
		$smtpserverport =25;    //SMTP服务器端口
		$smtpusermail = "zxa421127@163.com";    //SMTP服务器的用户邮箱
		$smtpemailto = $_POST["email"];    //收件箱
		$smtpuser = "zxa421127@163.com";    //SMTP服务器的用户帐号
		$smtppass = "axz13294157930";    //SMTP服务器的用户密码
		$MailBody="姓名：";//邮件内容(如你提交的表单姓名为Name)
		$mailsubject=@iconv("UTF-8", "gb2312", "欢迎注册武汉才殊家教网");//如果你页面为UTF-8，这里还要转码一下
		$mailbody = "尊敬的会员,欢迎您注册武汉才殊家教网(<a href='http://www.caishujy.com' target='_blank'>http://www.caishujy.com</a>)<br>请妥善保留这封电子邮件. 您的帐号资料如下<br><br>登陆帐号:&nbsp;<span style='color:#ff0000'>".$_POST["name"]."</span><br>注册密码:&nbsp;<span style='color:#ff0000'>".$mima."</span><br><br>请妥善保管.";    //邮件内容
		$mailtype = "HTML";    //邮件格式（HTML/TXT）,TXT为文本邮件
		$smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);//true表示使用身份验证,否则不使用身份验证.
		$smtp->debug = false; //是否显示发送的调试信息 TRUE发送 FALSE不发送
		$smtp->sendmail($smtpemailto, $smtpusermail, $mailsubject, $mailbody, $mailtype);
		$bw->msg('您已注册成功，请注意查收您的邮件!', '/');


	
}else{
	$bw->msg('注册失败!', '/');	
}

?>