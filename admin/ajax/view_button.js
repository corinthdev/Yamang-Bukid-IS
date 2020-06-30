      $(document).ready(function(){
          $('.view_data').click(function(){
            var employee_id = $(this).attr("id");

            $.ajax({
              url: "view.php",
              method: "post",
              data: {id:employee_id},
              success:function(data){
                $('#employee_detail').html(data);  
                $('#dataModal').modal("show");
              }
            });
          });
      });