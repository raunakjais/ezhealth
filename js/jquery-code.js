// JavaScript Document
$(document).ready(function(){
// Login box
	$(document).ready(function() {
		$('.fancybox').fancybox();
	});

// LOGIN BOX SHOW HIDE
	$('.loginbox').hide();
	$('.loginjscl').click(function(){
		$('.loginjscl').css("background","#FFFFFF");
		$('.loginbox').show('slow');	
		
		$('.newuserjscl').css("background","none");
		$('.newuserbox').hide();
	});
	
	$('.loginboxhide').click(function(){
		$('.loginjscl').css("background","none");
		$('.loginbox').hide('slow');	
		$('.newuserjscl').css("background","none");
		$('.newuserbox').hide();
	});




// NEW USER SHOW HIDE
	$('.newuserbox').hide();
	$('.newuserjscl').click(function(){
		$('.newuserbox').show('slow');
		$('.newuserjscl').css("background","none");
		$('.newuserbox').show('slow');
		
		$('.loginbox').hide();
		$('.loginjscl').css("background","none");
	});
	$('.newuserboxhide').click(function(){
		$('.newuserjscl').css("background","none");
		$('.newuserbox').hide('slow');	
		$('.newuserjscl').css("background","none");
		$('.newuserbox').hide();
	});
	


});

$(document).ready(function(){
	$(".welcomeMenu").hide();
  	$(".welcome").click(function(){
    	$(".welcomeMenu").toggle(500);
  	});
});