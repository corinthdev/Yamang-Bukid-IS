
      function add() {
      var x = parseInt(document.getElementById("unit_price").value);
      var y = parseInt(document.getElementById("item_sold").value)
      document.getElementById("total_amount").value = x * y;
    }