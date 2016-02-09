

$(function(){
	$('table').tablesorter({
		    widthFixed : true,
			widgets        : ['zebra','stickyHeaders'],	
			usNumberFormat : false,
			sortReset      : true,
			sortRestart    : true,
			widgetOptions: {
	     		
	     		stickyHeaders_attachTo: '.report_header'
	     }
	});


});
