$(document).ready(function(){
$("#uname").css('display', 'none', 'important');
$("button#login-button").click(function(){
  user=$("#user").val();
  pass=$("#pass").val();
  $.ajax({
   type: "POST",
   url: "connectivity.php",
data: {
	     user:user,
		 pass:pass
},
   success: function(html){  
if(html==1)    {
//$("#add_err").html("right username or password");
window.location="home.php";
}
else if(html==2)   {
$("#uname").css('display', 'inline', 'important');
$("input").css({'border': '1px solid rgba(255,0,0,0.4)','background-color': 'rgba(255,0, 0, 0.2)'});
$("#uname").html("Wrong username or password");
}
else {
$("#uname").css('display', 'inline', 'important');
$("input").css({'border': '1px solid rgba(255,0,0,0.4)','background-color': 'rgba(255,0, 0, 0.2)'});
$("#uname").html("Please fill all the fields");
alert(html);
}
   },
   beforeSend:function()
   {
$("#uname").css('display', 'inline', 'important');
$("#uname").html(" Loading...")
   }
  });
return false;
});

$("button#register").click(function(){
window.location="signup.php";
});
});

