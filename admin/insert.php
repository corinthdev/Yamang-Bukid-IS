<?php
	//action.php
	if(isset($_POST["insert"]))
	{
		$connect = mysqli_connect("localhost", "root", "", "yamangbukiddb");
		if($_POST["insert"] == "fetch")
		{	
			$output .= '<label class = "text-success">Data Inserted</label>';
			$query = "SELECT picProducts FROM products ORDER BY id DESC";
			$result = mysqli_query($connect, $query);
			$output .= '

				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr class="alert alert-info">
                      <th>Items</th>
                      <th>Unit Price</th>
                      <th>Additional Stocks</th>
                      <th>Item Sold</th>
                      <th>Total Amount</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr class="alert alert-info">
                      <th>Items</th>
                      <th>Unit Price</th>
                      <th>Additional Stocks</th>
                      <th>Item Sold</th>
                      <th>Total Amount</th>
                    </tr>
                  </tfoot>
			';
			while($row = mysqli_fetch_array($result))
			{
				$output .= '
					<tr>
						<td>'.$row["id"].'</td>
						<td> <img src="data:image/jpeg;base64,'.base64_encode($row['picProducts']).'" height="60" width="75" class="img-thumbnail"/></td>
					</tr>
				';
			}
			$output .='</table>';
			echo $output;
		}
	}
	if ($_POST["insert"] == "insert") 
	{
		$file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));

		$query = "INSERT INTO products(picProducts) VALUES ('$file')";

		if(mysqli_query($connect, $query))
		{
			echo 'Image Insert into Database';
		}
	}	
	
?>