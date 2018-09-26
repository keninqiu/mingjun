        $(".togglec").hide();
    	
    	$(".togglet").click(function(){
    	
    	   $(this).toggleClass("toggleta").next(".togglec").slideToggle("normal");
    	   return true;
        
    	});

$( "#select-menu" ).change(function() {
	var url = $(this).val();
	window.location.href = url;
});    	