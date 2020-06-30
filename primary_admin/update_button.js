
      $(document).ready(function(){
          $(document).on('click','a[data-role=update]',function(){
              var id = $(this).data('id');
              var adminName = $('#'+id).children('td[data-target=adminName]').text();
              var userName = $('#'+id).children('td[data-target=userName]').text();
              var passWord = $('#'+id).children('td[data-target=passWord]').text();
              var confirmPassword = $('#'+id).children('td[data-target=confirmPassword]').text();
              var branchCode = $('#'+id).children('td[data-target=branchCode]').text();
              var branchName = $('#'+id).children('td[data-target=branchName]').text();
              var branchLocation = $('#'+id).children('td[data-target=branchLocation]').text();

              $('#adminName').val(adminName);
              $('#userName').val(userName);
              $('#passWord').val(passWord);
              $('#confirmPassword').val(confirmPassword);
              $('#branchCode').val(branchCode);
              $('#branchName').val(branchName);
              $('#branchLocation').val(branchLocation);
              $('#userId').val(id);
              $('#myModal').modal('toggle');
          });

          //creating event to get data from fields

          $('#save').click(function(){
              var id = $('#userId').val();
              var adminName = $('#adminName').val();
              var userName = $('#userName').val();
              var passWord = $('#passWord').val();
              var confirmPassword = $('#confirmPassword').val();
              var branchCode = $('#branchCode').val();
              var branchName = $('#branchName').val();
              var branchLocation = $('#branchLocation').val();

              $.ajax({
                  url     : 'connection.php',
                  method  : 'post',
                  data    : {ybAdminname : adminName, ybUsername : userName, ybPassword : passWord, ybConfirmpassword : confirmPassword, ybBranchcode : branchCode, ybBranchname : branchName, ybBranchlocation : branchLocation, id : id},
                  success : function(data){
                                alert("Successfully Edited!");
                                location.href= "view_account_list.php";
                            }
              });
          });
      })