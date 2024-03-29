// Custom functions
$(document).ready(function(){
	
	
    $('.login_link').click(function(event){
        $(this).toggleClass('active').prev().slideToggle();
        event.preventDefault();
    });
    
    // Tabs hide script    
    var tabContainers = $('div.tabs > div');
    tabContainers.hide().filter(':first').show();
    $('div.tabs ul.tabNavigation a').click(function () {
        tabContainers.hide();
        tabContainers.filter(this.hash).show();
        $('div.tabs ul.tabNavigation a').removeClass('selected');
        $(this).addClass('selected');
        return false;
    }).filter(':first').click();
        
	// Fancybox options script	
    $("a.gallery_pic").fancybox({	
        openEffect:'elastic',
        "padding" : 2, // Content padding.
        "frameWidth" : 700,	 // Window width, px (425px - default).
        "frameHeight" : 600, // Window height, px (355px - default).
        "overlayShow" : true, // If "true" - dimming page under pop-up window(default - "true"). The color is defined in jquery.fancybox.css - div # fancy_overlay
        "overlayOpacity" : 0.8,	 // Dimming opacity (default - 0.3).
        "hideOnContentClick" :false, // If "true" - closes the window by clicking on any point (except the navigation controls). Defaul - "true".		
        "centerOnScroll" : false // If "true" - box is centered on the screen when the user scrolls the page.
    });
       
});
