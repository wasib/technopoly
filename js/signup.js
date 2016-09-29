$(document).ready(function(){
$("#uname").css('display', 'none', 'important');
$("button#signup-button").click(function(){
  userid=$("#userid").val();
  user=$("#user").val();
  pass=$("#pass").val();
  pass1=$("#pass1").val();
  $.ajax({
   type: "POST",
   url: "register.php",
data: {
	     userid:userid,
		 user:user,
		 pass:pass,
		 pass1:pass1
},
   success: function(html){  
if(html==1)    {
//$("#add_err").html("right username or password");
  alert("successfully registered");
window.location="login.php";
}
else if(html==2)   {
$("#uname").css('display', 'inline', 'important');
$("input").css({'border': '1px solid rgba(255,0,0,0.4)','background-color': 'rgba(255,0, 0, 0.2)'});
$("#uname").html("Userid already exists");
}
else if(html==3)   {
$("#uname").css('display', 'inline', 'important');
$("input").css({'border': '1px solid rgba(255,0,0,0.4)','background-color': 'rgba(255,0, 0, 0.2)'});
$("#uname").html("passwords do not match");
}
else if(html==4)   {
$("#uname").css('display', 'inline', 'important');
$("input").css({'border': '1px solid rgba(255,0,0,0.4)','background-color': 'rgba(255,0, 0, 0.2)'});
$("#uname").html("username already exists");
}
else {
$("#uname").css('display', 'inline', 'important');
$("input").css({'border': '1px solid rgba(255,0,0,0.4)','background-color': 'rgba(255,0, 0, 0.2)'});
$("#uname").html("Please fill all the fields");
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

$("button#login").click(function(){
window.location="login.php";
});

});

