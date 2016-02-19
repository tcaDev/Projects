var startFixedColumns = 3;
$(function(){
	$('table').tablesorter({
		    widthFixed : true,
			widgets        : ['zebra', 'columns','scroller'],	
			usNumberFormat : false,
			sortReset      : true,
			sortRestart    : true,
			widgetOptions: {
	      // jQuery selector or object to attach sticky header to
	      scroller_height : 440,
	      // scroll tbody to top after sorting
	      scroller_upAfterSort: true,
	      // pop table header into view while scrolling up the page
	      scroller_jumpToHeader: true,
	      // In tablesorter v2.19.0 the scroll bar width is auto-detected
	       // set number of columns to fix
	      scroller_fixedColumns : startFixedColumns,
	      // add a fixed column overlay for styling
	      scroller_addFixedOverlay : false,
	      // add hover highlighting to the fixed column (disable if it causes slowing)
	      scroller_rowHighlight : 'hover',

	      // bar width is now calculated; set a value to override
	      scroller_barWidth : null
	     }
	});
});


