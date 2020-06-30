
    $(".remove").click(function(){
        var id = $(this).parents("tr").attr("id");


        if(confirm('Are you sure you want to delete this products?'))
        {
            $.ajax({
               url: 'delete2.php',
               type: 'GET',
               data: {id: id},
               error: function() {
                  alert('Something is wrong');
               },
               success: function(data) {
                    $("#"+id).remove();
                    alert("Products deleted successfully!");  
               }
            });
        }
    });