<div class="index_bottom" style="height:100px;">
<div class="index_bottom_erji"><a href="info.php?id=16">法律安全</a> | <a href="info.php?id=17">使用条款</a> | <a href="info.php?id=18">请家教/做家教流程</a> |&nbsp;<a href="about.php">关于我们</a> | <a href="info.php?id=19">加盟我们</a> | <a href="contact.php">联系我们</a></div>
<div class="index_b_b"><?php echo $service_information; ?></div>
</div>
<style type="text/css">
.qqbox a:link {
	color: #000;
	text-decoration: none;
}
.qqbox a:visited {
	color: #000;
	text-decoration: none;
}
.qqbox a:hover {
	color: #f80000;
	text-decoration: underline;
}
.qqbox a:active {
	color: #f80000;
	text-decoration: underline;
}

.qqbox{
	width:230px;
	height:auto;
	overflow:hidden;
	position:absolute;
	right:0px;
	top:100px;
	color:#000000;
	font-size:12px;
	letter-spacing:0px;
}
.qqlv{
	width:33px;
	overflow:hidden;
	position:relative;
	float:right;
	z-index:50px;
}
.qqkf{
	width:220px;
	height:auto;
	overflow:hidden;
	right:0;
	top:0;
	z-index:99px;
	border:6px solid #4dafe4;
	background:#fff;
}
.qqkfbt{
	width:220px;
	height:30px;
	overflow:hidden;
	background:#4dafe4;
	line-height:30px;
	font-weight:bold;
	color:#fff;
	position:relative;
	border:1px solid #4dafe4;
	cursor:pointer;
	text-align:center;
	font-size:16px;
}
.qqkfhm{
	width:200px;
	overflow:hidden;
	line-height:22px;
	
}
.qqkfhm2{
	width:120px;
	height:10px;
	overflow:hidden;
	line-height:22px;
	padding-right:8px;
	position:relative;
	margin:10px 0;
}
.bgdh{
	width:220px;
	padding-left:10px;
}
</style>
<div class="qqbox" id="divQQbox">
<div class="qqlv" id="meumid" onmouseover="show()" ><img src="images/kf.png"></div>
<div class="qqkf" style="display:none;" id="contentid" onmouseout="hideMsgBox(event)" onmouseover="show()"> 
<div class="qqkfbt"  id="qq-1" onfocus="this.blur();">客 服 中 心</div>
<div id="K1">   
<div class="qqkfhm2 bgdh"></div>  
<div class="qqkfhm bgdh">刘老师：<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=3023810971&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:3023810971:51" alt="刘老师" title="刘老师"/></a></a><br/></div> 
<div class="qqkfhm bgdh">张老师：<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=3426768747&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:3426768747:51" alt="张老师" title="张老师"/></a></a></div>
<div class="qqkfhm bgdh">加盟热线：13294157930</div>
<div class="qqkfhm bgdh" style="padding-bottom:10px;"><img src="images/code.jpg" border="0"></div>
    </div>    
<script language="javascript">
function showandhide(h_id,hon_class,hout_class,c_id,totalnumber,activeno) {
    var h_id,hon_id,hout_id,c_id,totalnumber,activeno;
    for (var i=1;i<=totalnumber;i++) {
        document.getElementById(c_id+i).style.display='none';
        document.getElementById(h_id+i).className=hout_class;
    }
    document.getElementById(c_id+activeno).style.display='block';
    document.getElementById(h_id+activeno).className=hon_class;
}
var tips; 
var theTop = 100;
var old = theTop;
function initFloatTips() 
{ 
	tips = document.getElementById('divQQbox');
	moveTips();
}
function moveTips()
{
	 	  var tt=50; 
		  if (window.innerHeight) 
		  {
		pos = window.pageYOffset  
		  }else if (document.documentElement && document.documentElement.scrollTop) {
		pos = document.documentElement.scrollTop  
		  }else if (document.body) {
		    pos = document.body.scrollTop;  
		  }
		  //http:
		  pos=pos-tips.offsetTop+theTop; 
		  pos=tips.offsetTop+pos/10; 
		  if (pos < theTop){
			 pos = theTop;
		  }
		  if (pos != old) { 
			 tips.style.top = pos+"px";
			 tt=10;//alert(tips.style.top);  
		  }
		  old = pos;
		  setTimeout(moveTips,tt);
}
initFloatTips();
	if(typeof(HTMLElement)!="undefined")//给firefox定义contains()方法，ie下不起作用
		{  
		  HTMLElement.prototype.contains=function (obj)  
		  {  
			  while(obj!=null&&typeof(obj.tagName)!="undefind"){//
	   　　 　if(obj==this) return true;  
	   　　　	　obj=obj.parentNode;
	   　　	  }  
			  return false;  
		  }
	}
function show()
{
	document.getElementById("meumid").style.display="none"
	document.getElementById("contentid").style.display="block"
}
	function hideMsgBox(theEvent){
	  if (theEvent){
		var browser=navigator.userAgent;
		if (browser.indexOf("Firefox")>0){//Firefox
		    if (document.getElementById("contentid").contains(theEvent.relatedTarget)) {
				return
			}
		}
		if (browser.indexOf("MSIE")>0 || browser.indexOf("Presto")>=0){
	        if (document.getElementById('contentid').contains(event.toElement)) {
			    return;//结束函式
		    }
		}
	  }
	  document.getElementById("meumid").style.display = "block";
	  document.getElementById("contentid").style.display = "none";
 	}
</script>
<!-- Baidu Button BEGIN -->
<script type="text/javascript" id="bdshare_js" data="type=slide&amp;img=0&amp;pos=left&amp;uid=6543809" ></script>
<script type="text/javascript" id="bdshell_js"></script>
<script type="text/javascript">
var bds_config={"bdTop":43};
document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000);
</script>
<!-- Baidu Button END -->