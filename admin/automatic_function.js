    function sum() {
          var txtFirstValue = document.getElementById('as_mon').value;
          var txtSecondValue = document.getElementById('as_tue').value;
          var txtThirdValue = document.getElementById('as_wed').value;
          var txtFourthValue = document.getElementById('as_thurs').value;
          var txtFifthValue = document.getElementById('as_fri').value;
          var txtSixthValue = document.getElementById('as_sat').value;
          var txtSeventhValue = document.getElementById('as_sun').value;
          var result = parseInt(txtFirstValue) + parseInt(txtSecondValue) + parseInt(txtThirdValue) + parseInt(txtFourthValue) + parseInt(txtFifthValue) + parseInt(txtSixthValue) + parseInt(txtSeventhValue);
          if (!isNaN(result)) {
             document.getElementById('addstocks_total').value = result;
          }
    }
      function updateDue() {

        var total = parseInt(document.getElementById("beg_inv").value);
        var val2 = parseInt(document.getElementById("addstocks_total").value);

        // to make sure that they are numbers
        if (!total) { total = 0; }
        if (!val2) { val2 = 0; }

        var ansD = document.getElementById("end_stocks");
        ansD.value = total - val2;
    }
    function add() {
          var txtFirstValue = document.getElementById('additionalStocks').value;
          var txtSecondValue = document.getElementById('additionalStocks2').value;
          var txtThirdValue = document.getElementById('additionalStocks3').value;
          var txtFourthValue = document.getElementById('additionalStocks4').value;
          var txtFifthValue = document.getElementById('additionalStocks5').value;
          var txtSixthValue = document.getElementById('additionalStocks6').value;
          var txtSeventhValue = document.getElementById('additionalStocks7').value;
          var result = parseInt(txtFirstValue) + parseInt(txtSecondValue) + parseInt(txtThirdValue) + parseInt(txtFourthValue) + parseInt(txtFifthValue) + parseInt(txtSixthValue) + parseInt(txtSeventhValue);
          if (!isNaN(result)) {
             document.getElementById('itemSold').value = result;
          }
    }
      function updateTot() {

        var total = parseInt(document.getElementById("beginningStocks").value);
        var val2 = parseInt(document.getElementById("itemSold").value);

        // to make sure that they are numbers
        if (!total) { total = 0; }
        if (!val2) { val2 = 0; }

        var ansD = document.getElementById("endingStocks");
        ansD.value = total - val2;
    }