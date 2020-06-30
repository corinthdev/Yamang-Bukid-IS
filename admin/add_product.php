<?php
    session_start();
    $errors = array();
    $conn = new mysqli('localhost', 'root', '', 'yamangbukiddb');

    if($conn->connect_errno){
      echo $db->connect_error;
    }

  //if the add button is clicked
  if (isset($_POST['insert'])) {
    $item = $_POST['item'];
    $iCode = $_POST['item_code'];
    $uBeginning = $_POST['beginning_stocks'];
    $Stocks = $_POST['tot_stocks'];
    $uEnding = $_POST['ending_stocks'];
    $addStocks = $_POST['additional_stocks'];
    $addStocks2 = $_POST['additional_stocks2'];
    $addStocks3 = $_POST['additional_stocks3'];
    $addStocks4 = $_POST['additional_stocks4'];
    $addStocks5 = $_POST['additional_stocks5'];
    $addStocks6 = $_POST['additional_stocks6'];
    $addStocks7 = $_POST['additional_stocks7'];
    $pullOut = $_POST['pull_out'];
    $totBap = $_POST['tot_bap'];
    $iSold = $_POST['item_sold'];
    $bName = $_POST['branchname'];
    // Get image name
      $image = $_FILES['image']['name'];

      // image file directory
      $target = "img_products/".basename($image);
    //ensure that from fields are filled properly
    if (empty($item)) {
      array_push($errors, "All field is a must!");
    }

    //if there are no errors
    if (count($errors) == 0) {
      $sql = "INSERT INTO products (items, itemCode, beginningStocks, addStocks,endingStocks, additionalStocks,additionalStocks2,additionalStocks3,additionalStocks4,additionalStocks5,additionalStocks6,additionalStocks7,pullOut, itemSold, totalBap, picProducts, branchName) 
      VALUES ('$item', '$iCode', '$uBeginning', '$Stocks','$uEnding', '$addStocks','$addStocks2','$addStocks3','$addStocks4','$addStocks5','$addStocks6','$addStocks7','$pullOut', '$iSold', '$totBap', '$image','$bName')";
      mysqli_query($conn, $sql);
      header('refresh:1;location: list_inventory.php'); //redirect to page
    }
    else
    {
        echo "<script type='text/javascript'>alert('All fields are empty!')</script>";
    }
    mysqli_close($conn);
  }
?>