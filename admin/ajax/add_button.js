$(document).ready(function(){
	$('#insert_form').on('submit', function(event){
		event.preventDefault();
		if($('#item').val() == "")
		{
			alert("Item Name is required!");
		}
		else if($('#item_code').val() == '')
		{
			alert("Item Code is required!");
		}
		else if($('#unit_price').val() == '')
		{
			alert("Unit Price is required!");
		}
		else if($('#additional_stocks').val() == '')
		{
			alert("Additional Stocks is required!");
		}
		else if($('#item_sold').val() == '')
		{
			alert("Item Sold is required!");
		}
		else {
			$.ajax({
				url: "insert.php",
				method: "POST",
				data:$('#insert_form').serialize(),
				success:function(data)
				{
					$('#insert_form')[0].reset();
					$('#add_data_Modal').modal('hide');
					$('#employee_table').html(data);
					alert("Successfully Added!");
					location.href= "list_inventory.php";
				}
			})
		}
	});
})