        $(".togglec").hide();
    	
    	$(".togglet").click(function(){
    	
    	   $(this).toggleClass("toggleta").next(".togglec").slideToggle("normal");
    	   return true;
        
    	});

$( "#select-menu" ).change(function() {
	var url = $(this).val();
	window.location.href = url;
});    	

function addSpecificationItem() {
	console.log('addSpecificationItem');
    var markup = '<tr> \
                <td> \
                    <div class="form-group"> \
                        <input type="text" class="form-control" name="specification_field[]"  value=""> \
                        \
                    </div> \
                </td> \
                <td> \
                    <span onclick="addSpecificationItem()" class="glyphicon glyphicon-plus"></span> \
                </td> \
            </tr>'; 
    $("#specification-table tbody").append(markup);  
    console.log('end');
}

function addDetailItem() {
	console.log('addDetailItem');

	var markup1 = '<tr>';
    markup1 += '<td>';
    markup1 += '<div class="form-group">';
    markup1 += '<input type="text" class="form-control" name="detail_field[]"  value="">';
    markup1 += '</div>';
    markup1 += '</td>';
    markup1 += '<td>';
    markup1 += '<div class="form-group">';
    markup1 += '<input type="text" class="form-control" name="detail_value[]"  value="">';
    markup1 += '</div>';                  
    markup1 += '</td>';
    markup1 += '<td>';
    markup1 += '<span onclick="addDetailItem()" class="glyphicon glyphicon-plus"></span>';
    markup1 += '</td>';                   
    markup1 += '</tr>'; 
    $("#detail-table tbody").append(markup1);  
    console.log('addDetailItem end');
}