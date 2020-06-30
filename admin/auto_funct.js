    //this function is for the bap, auto add the 3 fields Beg. Tot and Pull out
    function bap() {
          var txtFirstValue = document.getElementById('beg_inv').value;
          var txtSecondValue = document.getElementById('tot_stocks').value;
          var result = parseInt(txtFirstValue) + parseInt(txtSecondValue);
          if (!isNaN(result)) {
             document.getElementById('tot_bap').value = result;
          }
    }
    //this function is for auto add in monday to sunday
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
    //this function is for upddate button, that will auto add from monday to sunday
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

    //this is for totap bap and total item sold that less together
    function doCalc() 
    { 
    document.getElementById('end_stocks').value=parseFloat(document.getElementById('tot_bap').value)-parseFloat(document.getElementById('addstocks_total').value)-parseFloat(document.getElementById('pull_out').value) 
    }

    //----FOR UPDATE BUTTON FUNCTION--------

      //this function is for the bap, auto add the 3 fields Beg. Tot and Pull out (UPDATE BUTTON)
    function up() {
          var txtFirstValue = document.getElementById('beginningStocks').value;
          var txtThirdValue = document.getElementById('addStocks').value;
          var result = parseInt(txtFirstValue) + parseInt(txtThirdValue);
          if (!isNaN(result)) {
             document.getElementById('totalBap').value = result;
          }
    }

    //this is for total bap and total item sold that less together for (UPDATE BUTTON)
    function doCalculate() 
    { 
    document.getElementById('endingStocks').value=parseFloat(document.getElementById('totalBap').value)-parseFloat(document.getElementById('itemSold').value)-parseFloat(document.getElementById('pullOut').value) 
    }