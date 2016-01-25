///////////////////////
//  Filter FUNC
//////////////////////

		(function(document) {
			'use strict';

			var LightTableFilter = (function(Arr) {

				var _input;
		    var _select;

				function _onInputEvent(e) {
					_input = e.target;
					var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
					Arr.forEach.call(tables, function(table) {
						Arr.forEach.call(table.tBodies, function(tbody) {
							Arr.forEach.call(tbody.rows, _filter);
						});
					});
				}
		    
				function _onSelectEvent(e) {
					_select = e.target;
					var tables = document.getElementsByClassName(_select.getAttribute('data-table'));
					Arr.forEach.call(tables, function(table) {
						Arr.forEach.call(table.tBodies, function(tbody) {
							Arr.forEach.call(tbody.rows, _filterSelect);
						});
					});
				}

				function _filter(row) {
		      
					var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
					row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';

				}
		    
				function _filterSelect(row) {
		     
					var text_select = row.textContent.toLowerCase(), val_select = _select.options[_select.selectedIndex].value.toLowerCase();
					row.style.display = text_select.indexOf(val_select) === -1 ? 'none' : 'table-row';

				}

				return {
					init: function() {
						var inputs = document.getElementsByClassName('light-table-filter');
						var selects = document.getElementsByClassName('select-table-filter');
						Arr.forEach.call(inputs, function(input) {
							input.oninput = _onInputEvent;
						});
						Arr.forEach.call(selects, function(select) {
		        		 select.onchange  = _onSelectEvent;
						});
					}
				};
			})(Array.prototype);

			document.addEventListener('readystatechange', function() {
				if (document.readyState === 'complete') {
					LightTableFilter.init();
				}
			});

		})(document);

///////////////////////
//  PRINT FUNC
//////////////////////

    function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data) 
    {
        var mywindow = window.open('', 'FILPORT REPORT DOCUMENT', 'height=400,width=600');
        mywindow.document.write('<html><head><title>Filport</title><br> <hr>');
       	//mywindow.document.write('<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">');
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
    //    mywindow.document.write('<footer style="text-align=right;"> CONFIDENTIAL | PROPRIETARY</footer>');
        mywindow.document.write('</body></html>');
        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10
        mywindow.print();
        mywindow.close();
        return true;
    }

