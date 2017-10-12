

$(document).ready(function(){
	$(".myTable td").click(function() {     
	    var column_num = parseInt( $(this).index() ) + 1;
	    var row_num = parseInt( $(this).parent().index() ) + 1;  
	    alert("Row_num =" + row_num + "  ,  Rolumn_num ="+ column_num);
	    $("#result").html( "Row_num =" + row_num + "  ,  Rolumn_num ="+ column_num );  
	    
	});
});

$( function() {
  $('td').click( function() {
    $(this).toggleClass("red-cell");
  } );
});

function createTable()
{
    var num_rows = 5;//document.getElementById('rows').value;
    var num_cols = 4;//document.getElementById('cols').value;
    var theader = '<table class="myTable" border="1" style="border-collapse: collapse;" cellpadding="8">\n';
    var tbody = '';
    var val = '';

    for( var i=0; i<num_rows;i++)
    {
        tbody += '<tr>';
        for( var j=0; j<num_cols;j++)
        {
            tbody += '<td id='+i+'-'+j+'>';
            tbody += 'Cell ' + i + ',' + j;
            tbody += '</td>'
        }
        tbody += '</tr>\n';
    }
    var tfooter = '</table>';
    document.getElementById('wrapper').innerHTML = theader + tbody + tfooter;
    //document.getElementById('res').innerHTML = val;
}