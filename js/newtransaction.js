$(document).ready(function () {
   
   function resetItemSubmit()
   {
      var id = $("#transaction-number").val();

      $.ajax({
         type: "POST",
         url: "includes/delete.php",
         data: {resetItemSubmit:id},
         success: function (response) {
            
         }
      });
   }

   resetItemSubmit();

   function calculatePrice()
   {
      var id = $("#transaction-number").val();

      $.ajax({
         type: "POST",
         url: "includes/process.php",
         data: {calculatePrice:id},
         dataType: "text",
         success: function (response) {
            $("#price-label").val(response);
         }
      });
   }
   
   $("#submit-item").click(function (e) {
      e.preventDefault();
      var tid = $("#transaction-number").val();
      var fn = $('input[name="full-name"]').val();
      var cn = $('input[name="contact-no"]').val();
      var loc = $('input[name="local"]').val();
      var dte = $('input[name="date"]').val();
      var itm = $('.dropdown-items').val(); // change to select
      var qty = $('input[name="quantity"]').val();
      var prs = $('input[name="prescriptions"]').val();
      var prc = $('input[name="price"]').val();
      
      if (fn == "" || cn == "" || loc == "" || dte == "" || itm == "" || qty == "" || prs == "" || prc == "") 
      {
         alert("Please fill all fields");
      }
      else
      {
         $.ajax({
            type: "POST",
            url: "includes/process.php",
            data: {
               tid:tid,
               itm:itm,
               qty:qty,
               prs:prs,
               prc:prc,
            },
            dataType: "text",
            success: function (response) {4
               $("#item-list").html(response);
               calculatePrice();
            }
            
         });
         
      }
   });


    $(document).on('click', '.delete_btn', function () {
      if (confirm("Are you sure you want to delete?"))
      {
        var tid = $("#transaction-number").val();
        var id = $(this).data("id1");
        
        $.ajax({
          type: "post",
          url:  "includes/delete.php",
          data: {dataId:id, tid:tid},
          dataType: "text",
          success: function (response) {
            $("#item-list").html(response);
            calculatePrice();
          }
        });
      }
    });


   $("#amtReceive").keyup(function (e) { 
      var price = $("#price-label").val();
      var receive = $(this).val();

      $("#total-balance").val(price - receive);
      
   });


   $("#newCustomerForm").on('submit', function() {
      if (confirm('Save new transaction?')) {
         return alert("Transaction saved successfully");
      }
  });

});
