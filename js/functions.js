$(window).load(function() {
    
   	$(".comments").attr("name", "comments");
   
   	//////////////////
	// Fancybox 2.0 //
	//////////////////
	
	// Allen a mit img Klasse .fancybox hinzufügen
	$(".post-content a").has("img").addClass("fancybox");
	
	// ID jedes Posts auslesen und in die darin enthaltenen .fancybox a speichern
	$('.post').each(function() { 
		postID = $(this).attr("id");
  		$(this).find(".fancybox").attr("rel", postID);
		
		// Jedes Bild rauslesen und dem übergeordneten a den Title übergeben
		$(this).find(".fancybox img").each(function() {
			$(this).parent().attr("title", $(this).attr("title"));	
		});
	});
		
	// Erstelle klasse und rel Element von Titelbildern entfernen (auf blog seite)
	$(".blog .thumbnail, .archive .thumbnail, .search-results .thumbnail").removeClass("fancybox");
	$(".content a[target=_blank]").removeClass("fancybox");
	$(".blog .thumbnail, .archive .thumbnail").removeAttr("rel");
	
	// Titel des img Tags auslesen
	imgTitle = $(this).find("img").attr("title");
	
	$(".fancybox").fancybox({
		// Titel des img Tags einsetzen
		title : imgTitle,
		padding : 0
	});
	
	// Alle Links mit der Klasse "video" dürfen kein rel Attribut haben
	$("a.video").removeAttr("rel");
	
	// Bei allen Videos (klasse Video) die Arrows entfernen, Fancybox ausführen
	$("a.video").fancybox({
		arrows : false,
		padding: 0
	});
	
	// open sidebar
	$(".open-sidebar").click(function(){
		$("#sidebar").animate({
			marginTop: "0"
			}, 500 );
		$(this).hide();
		$(".close-sidebar").show();
	});
	
	// close sidebar
	$(".close-sidebar").click(function(){
		$("#sidebar").animate({
			marginTop: "-431px"
			}, 500 );
		$(this).hide();
		$(".open-sidebar").show();
	});
	
	// was es sonst noch gibt
	$(".postBox li").hover(
  	  function () {
		$(this).find('.title').animate ({
			left: "0"
		}, 200 );
	  },
	  function () {
		$(this).find('.title').animate ({
			left: "-290px"
		}, 200 );
	  }
	);
	
	// projects
	$(".projects li").hover(
  	  function () {
		$(this).find('.title').animate ({
			left: "0"
		}, 200 );
	  },
	  function () {
		$(this).find('.title').animate ({
			left: "-350px"
		}, 200 );
	  }
	);
	
	// jquery to top
	$().UItoTop({ easingType: 'easeOutQuart' });     
});