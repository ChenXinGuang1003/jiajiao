<style>
body{ background:url(bg.jpg) no-repeat center center; padding:100px 200px;;}
form{width:650px;  margin:100px auto;}
form p{ color:#5c2900;}
</style>

<?php
error_reporting(7);
@set_time_limit(0);
$_dbhost='localhost';
$_dbuser='';
$_dbpw='';
$_dbname='';
$_Charset='utf8';


foreach($_POST as $_key=>$_value){
	!ereg("^\_",$_key) && $$_key=$_POST[$_key];
}
foreach($_GET as $_key=>$_value){
	!ereg("^\_",$_key) && $$_key=$_GET[$_key];
}



if(!$job&&!$page){
print <<<EOT

<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<form name="form1" method="post" action="?a">
���ݿ�����: 
    <input type="text" name="dbhost" value="$_dbhost"><span style="color:#910000; padding-left:10px;;">����һ��Ϊ:localhost��������鿴�������������Ϣ</span><br/>
���ݿ��ʺ�: 
    <input type="text" name="dbuser" value="$_dbuser"><br/>
���ݿ�����: 
    <input type="text" name="dbpw" value="$_dbpw"><br/>
���ݿ���:&nbsp;&nbsp;
    <input type="text" name="dbname" value="$_dbname"><br/>
    ���ݿ����: 
    <input type="text" name="Charset" value="$_Charset"><br/>
    <input type="submit" name="Submit" value="��ʼ�����" style="width:200px;height: 50px; margin:0 auto;">
    <input type="hidden" name="job" value="1">
</form>


EOT;
exit;
}

if($page>0){
	list($dbhost,$dbuser,$dbpw,$dbname,$Charset)=explode("\t",$_COOKIE[mysqlconfig]);
}

if(!@mysql_connect($dbhost, $dbuser, $dbpw)) {
	die('MYSQL �������ݿ�ʧ��,��ȷ�����ݿ��û���,����������ȷ<br/><br/><A HREF="#" onclick="history.back(-1)">�������</A><br/><br/>�����������룺http://��������/databack/index.php');
}
if(!@mysql_select_db($dbname)){
	die("MYSQL ���ӳɹ�,����ǰʹ�õ����ݿ� {$dbname} ������<br/><br/><A HREF=\"#\" onclick=\"history.back(-1)\">�������</A><br/><br/>�����������룺http://��������/databack/index.php");
}

$mysqlV=mysql_get_server_info();

if($mysqlV>'4.1'){
	mysql_query("SET NAMES '$Charset'");
}

if( mysql_get_server_info() > '5.0' ){
	mysql_query("SET sql_mode=''");
}

if(!$page){
	setcookie("mysqlconfig","$dbhost\t$dbuser\t$dbpw\t$dbname\t$Charset");
}

$page=intval($page);
if(is_file("$page.sql")){
	insert_file("$page.sql");
	$page++;
	echo "���ڵ����{$page}��,���Ժ�...<META HTTP-EQUIV=REFRESH CONTENT='0;URL=?page=$page'>";
	exit;
}else{
	echo "���ݵ������<br/><br/>�뵽��վ��Ŀ¼�µ�inc�ļ�����޸�config.php�����������Ϣ<br/><br/><br/><br/>/***************************/<br/><br/>������ǴӾɿռ�ת�����ݵ��¿ռ�,��Ѿɿռ��Ŀ¼�µ�ȫ���ļ��Ƶ��¿ռ��Ӧ�ĸ�Ŀ¼��.<br/><br/><br/>��config.php������.��Ϊ�µ����ݿ�������ɵ�һ�㲻��ͬ,��������Ҫ�ֹ����ú��¿ռ������ļ�config.php<br/><br/>/***************************/<br/><br/>";
}

function insert_file($file,$replace=''){
	global $Charset;
	$readfiles=read_file($file);
	if($replace){
		$readfiles=str_replace('$timestamp',"$timestamp",$readfiles);
	}
	$detail=explode("\n",$readfiles);
	$count=count($detail);
	for($j=0;$j<$count;$j++){
		$ck=substr($detail[$j],0,4);
		if( ereg("#",$ck)||ereg("--",$ck) ){
			continue;
		}
		$array[]=$detail[$j];
	}
	$read=implode("\n",$array); 
	$sql=str_replace("\r",'',$read);
	$detail=explode(";\n",$sql);
	$count=count($detail);
	for($i=0;$i<$count;$i++){
		$sql=str_replace("\r",'',$detail[$i]);
		$sql=str_replace("\n",'',$sql);
		$sql=trim($sql);
		if($sql){
			if(eregi("CREATE TABLE",$sql)){
				$mysqlV=mysql_get_server_info();
				$sql=preg_replace("/DEFAULT CHARSET=([a-z0-9]+)/is","",$sql);
				$sql=preg_replace("/TYPE=MyISAM/is","ENGINE=MyISAM",$sql);
				if($mysqlV>'4.1'){
					$sql=str_replace("ENGINE=MyISAM"," ENGINE=MyISAM DEFAULT CHARSET=$Charset ",$sql);
				}
			}
			
			$query=mysql_query($sql);
			if (!$query) die("���ݿ����:$sql");
			$check++;
		}	
	}
	return $check;
}
function read_file($filename,$method="rb"){
	if($handle=@fopen($filename,$method)){
		@flock($handle,LOCK_SH);
		$filedata=@fread($handle,@filesize($filename));
		@fclose($handle);
	}
	return $filedata;
}