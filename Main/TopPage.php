
<?
session_start();
$referer=$_SERVER['HTTP_REFERER'];
if(!eregi("server", $referer))
{
?> <script>window.location="http://localhost/";</script> <?
exit;
}
//var_dump($_SESSION);


if($_SESSION['admin_id']!=null){
	echo "안녕";	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><head>
<title>MangJu HomePage</title>
</head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <body oncontextmenu='return false' ondragstart='return false' onselectstart='return false'>
   <?
 
   echo "<link rel=stylesheet href='/css/manucss.css' type='text/css'> ";
   echo " <script src='/js/jquery.js'></script>";
   ?>

<script language=JavaScript>
<!--
setInterval("x()",1);
function x(){window.status='.'}
        function        KeyEventHandle()
        {
                if( 
                ( event.ctrlKey == true && ( event.keyCode == 78 || event.keyCode == 82 ) ) ||
        ( event.keyCode >= 112 && event.keyCode <= 123 ))
                {
                        event.keyCode                = 0;
                        event.cancelBubble        = true;
                        event.returnValue        = false; 
                }
        }
        document.onkeydown=KeyEventHandle;
        document.onkeyup=KeyEventHandle;
-->
</script>
 
<SCRIPT LANGUAGE="JavaScript"> 


function click() {if ((event.button==2) || (event.button==2)) { }}document.onmousedown=click// -->

function Frameset(page) {
	
	if(page == "1"){
		page1 ="/Index.php";
		framecode = "<frameset rows='1*'>" 
+ "<frame name='main' src='" + page1 + "'>" 
+ "</frameset>"; 

document.write(framecode); 
document.close(); 
	}else	if(page == "2"){
		page1 ="/Who Am I/WAMPage.php";
		framecode = "<frameset rows='1*'>" 
+ "<frame name='main' src='" + page1 + "'>" 
+ "</frameset>"; 

document.write(framecode); 
document.close(); 
	}else	if(page == "3"){
		page1 ="/Who Am I/PoFolpage.php";
		framecode = "<frameset rows='1*'>" 
+ "<frame name='main' src='" + page1 +"'>" 
+ "</frameset>"; 

document.write(framecode); 
document.close(); 
	}else if(page == "4"){
		page1 ="/Who Am I/ThisPage.php";
		framecode = "<frameset rows='1*'>" 
+ "<frame name='main' src='" + page1 + "'>" 
+ "</frameset>"; 

document.write(framecode); 
document.close(); 
	}else if(page = "5"){
		page1 ="/user/loginpage.php";
		framecode = "<frameset rows='1*'>" 
+ "<frame name='main' src='" + page1 + "'>" 
+ "</frameset>"; 

document.write(framecode); 
document.close(); 
	}

} 






jQuery.fn.center = function () {
    this.css("position","absolute");
    this.css("top", Math.max(0, (($(window).height() - $(this).outerHeight()) / 2) + $(window).scrollTop()) + "px");
    this.css("left", Math.max(0, (($(window).width() - $(this).outerWidth()) / 2) + $(window).scrollLeft()) + "px");
    return this;
}

 
showPopup = function() {
$("#popLayer").show();
$("#popLayer").center();
} 
 $(function()
		{
			$("#hidePopup").click(function(){
				$("#popLayer").hide();
			});
            $('#getResult').click( function() {
                $.ajax({
                    url:'/user/LoginOkPage.php',
                    dataType:'json',
                    type:'POST',
                    data:{'id':$('#id').val(),'pw':$('#pw').val()},
                    success:function(result){
                        if(result['result']==true){
                         alert("Success LogIn.\n" + "Hello. Admin");		
						 $(location).attr('href','/server');
						
                        } else if(result['result']=='idno'){
							 alert("Check ID.");
						} else if(result['result']=='pwno'){
							alert("Check PassWord.");	
						}
                    }
                });
            })
		});





</script>  
    <div id='cssmenu' align="center">

  <ul>
   <li ><a href='javascript:;' onclick='javascript:Frameset("1")'><span>Home</span></a></li>
   <li><a href='javascript:;' onclick='javascript:Frameset("2")'><span>Who Am I</span></a></li>
   <li><a href='javascript:;' onclick='javascript:Frameset("3")'><span>PortFolio</span></a></li>
   <li><a href='javascript:;' onclick='javascript:Frameset("4")'><span>This HomePage</span></a></li>
  <li class='last'>
  <? if($_SESSION['admin_id']==null){ ?>
   <a href="javascript:;" onClick="javascript:showPopup()"><span>Login</span></a>
    <? }else { ?>
   <a href='/user/logoutpage.php'><span>Logout</span></a>
   <? } ?></li>
</ul>
</div>
<div id="popLayer" style="display:none;">
 
<div align="center">
 <table >
  <tr>
   <td width="800">
  
<img src="/Photo/user/id_log.jpg">
   			<input type="text" id="id" name="id" ime-mode:'disabled' text-transform: 'lowercase' >
   			</td>
   			
   			
				</tr><tr><td>
   
<img src="/Photo/user/pass_log.jpg">
			<input type="password" id="pw"name="pw" > <label id="passlabel" /></td>
				</tr> 
  <tr>
   <td align="center">
  
     <input type="button" id="getResult" name="getResult" value="로그인"/>
     <input type="button" id="hidePopup" name="hidePopup" value="취소"/> 
   </td>
  </tr>
 </table>
 
</div> </div>
    </body> 
</html>
