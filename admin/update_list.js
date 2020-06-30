$(document).ready(function(){
  $(document).on('click','a[data-role=update]',function(){
      var id = $(this).data('id');
      var items = $('#'+id).children('td[data-target=items]').text();
      var itemCode = $('#'+id).children('td[data-target=itemCode]').text();
      var beginningStocks = $('#'+id).children('td[data-target=beginningStocks]').text();
      var addStocks = $('#'+id).children('td[data-target=addStocks]').text();
      var endingStocks = $('#'+id).children('td[data-target=endingStocks]').text();
      var additionalStocks = $('#'+id).children('td[data-target=additionalStocks]').text();
      var additionalStocks2 = $('#'+id).children('td[data-target=additionalStocks2]').text();
      var additionalStocks3 = $('#'+id).children('td[data-target=additionalStocks3]').text();
      var additionalStocks4 = $('#'+id).children('td[data-target=additionalStocks4]').text();
      var additionalStocks5 = $('#'+id).children('td[data-target=additionalStocks5]').text();
      var additionalStocks6 = $('#'+id).children('td[data-target=additionalStocks6]').text();
      var additionalStocks7 = $('#'+id).children('td[data-target=additionalStocks7]').text();
      var pullOut = $('#'+id).children('td[data-target=pullOut]').text();
      var itemSold = $('#'+id).children('td[data-target=itemSold]').text();
      var totalBap = $('#'+id).children('td[data-target=totalBap]').text();

      $('#items').val(items);
      $('#itemCode').val(itemCode);
      $('#beginningStocks').val(beginningStocks);
      $('#addStocks').val(addStocks);
      $('#endingStocks').val(endingStocks);
      $('#additionalStocks').val(additionalStocks);
      $('#additionalStocks2').val(additionalStocks2);
      $('#additionalStocks3').val(additionalStocks3);
      $('#additionalStocks4').val(additionalStocks4);
      $('#additionalStocks5').val(additionalStocks5);
      $('#additionalStocks6').val(additionalStocks6);
      $('#additionalStocks7').val(additionalStocks7);
      $('#pullOut').val(pullOut);
      $('#totalBap').val(totalBap);
      $('#itemSold').val(itemSold);
      $('#productsId').val(id);
      $('#myModal').modal('toggle');
  });

  //creating event to get data from fields

  $('#save').click(function(){
      var id = $('#productsId').val();
      var items = $('#items').val();
      var itemCode = $('#itemCode').val();
      var beginningStocks = $('#beginningStocks').val();
      var addStocks = $('#addStocks').val();
      var endingStocks = $('#endingStocks').val();
      var additionalStocks = $('#additionalStocks').val();
      var additionalStocks2 = $('#additionalStocks2').val();
      var additionalStocks3 = $('#additionalStocks3').val();
      var additionalStocks4 = $('#additionalStocks4').val();
      var additionalStocks5 = $('#additionalStocks5').val();
      var additionalStocks6 = $('#additionalStocks6').val();
      var additionalStocks7 = $('#additionalStocks7').val();
      var pullOut = $('#pullOut').val();
      var totalBap = $('#totalBap').val();
      var itemSold = $('#itemSold').val();

      $.ajax({
          url     : 'connection.php',
          method  : 'post',
          data    : {items : items, itemCode : itemCode, beginningStocks : beginningStocks, addStocks : addStocks, endingStocks : endingStocks, 
            additionalStocks : additionalStocks,additionalStocks2 : additionalStocks2 , additionalStocks3 : additionalStocks3, 
            additionalStocks4 : additionalStocks4 , additionalStocks5 : additionalStocks5 , additionalStocks6 : additionalStocks6, 
            additionalStocks7 : additionalStocks7, pullOut : pullOut, itemSold : itemSold, totalBap : totalBap, id : id},
          success : function(data){
                        alert("Successfully Edited!");
                        location.href= "list_inventory.php";
                    }
      });
  });
})