	 
$('td').click(function(){
		  $('tr').removeClass('mycolor').children('td');  
	$(this).closest('tr').addClass('mycolor').children('td:first').text();
     
});
  