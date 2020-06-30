
    $(".remove").click(function(){
        var id = $(this).parents("tr").attr("id");


        if(confirm('Are you sure you want to delete this account?'))
        {
            $.ajax({
               url: 'delete_account.php',
               type: 'GET',
               data: {id: id},
               error: function() {
                  alert('Something is wrong');
               },
               success: function(data) {
                    $("#"+id).remove();
                    alert("Account deleted successfully!");  
               }
            });
        }
    });