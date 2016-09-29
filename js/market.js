$(document).ready(function(){

$("button#buy").click(function(){
var qid = $("#qid").val()
var uid=$("#uid").val();
var bal=$("#bal").val();
if(qid)
{
  var x=confirm("Are You sure that you want to purchase?");
  if(x==true)
  {
	 $.ajax({
   type: "POST",
   url: "buymarket.php",
data: {
	     uid:uid,
		 qid:qid,
		 bal:bal
},
   success: function(html){  
if(html==1)    {
//$("#add_err").html("right username or password");
  alert("successfully purchased");
window.location="home.php";
}
else if(html==2)   {
alert("insufficient balance");
}
else if(html==3)   {
alert("you cannot purchase your own question");
}
else if(html==4)   {
alert("Too slow. Someone already purchased it");
}
else {
alert("error");
window.location="market.php";
}
   }
  });
return false; 
  }
}
});

});

