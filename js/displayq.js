$(document).ready(function() {
	
$(function() {
$("#dialog").dialog({
autoOpen: false
});
$("#sell").on("click", function() {
$("#dialog").dialog("open");
});
});

history.pushState(null, null, document.URL);
window.addEventListener('popstate', function () {
    history.pushState(null, null, document.URL);
});


// Validating Form Fields.....
$("button#sellf").click(function() {
var price = $("#price").val();
var level=$("#level").val();
var cp=$("#cp").val();
var qid=$("#qid").val();
var x = cp-price;
if ( price === '') {
alert("Please enter a price to sell");
} 
else if (x<0) {
alert("Sale price cannot be greater than cost price");
}
else if (price<0) {
alert("invalid sale price");
}
else {

  $.ajax({
   type: "POST",
   url: "addmarket.php",
data: {
	     qid:qid,
		 price:price
},
   success: function market(html){  
if(html==1)   
	{
  alert("successfully placed in market");
window.location="home.php";
}
else if(html==2)   {
alert("failed to add to market");
}
else if(html==3)   {
alert("this question cannot be sold");
}
else {
alert("error");
}
   }
  });
return false;
}
});

$("button#submitans").click(function() {
var ans = $('input[name=ans]:checked').val();
var qid=$("#qid").val();
if (!ans) {
alert("Please select an option");
} 

else {
	
var x=confirm("Are You sure that you want to submit?");
  if(x==true)
  {
  $.ajax({
   type: "POST",
   url: "submitans.php",
data: {
	     qid:qid,
		 ans:ans
},
   success: function solve(html){  
if(html==1)   
	{
  alert("correct answer");
 window.location="home.php";
}
else if(html==2)   {
alert("wrong answer");
window.location="home.php";
}
else if(html==3)   {
alert("question already solved");
}
else {
alert("error");
}
   }
  });
return false;
}
}
});

});