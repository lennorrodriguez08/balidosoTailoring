$(document).ready(function () {

    function loadTable(tblData, tblName)
    {
        $.ajax({
            type: "POST",
            url: "includes/process.php",
            data: tblData,
            dataType: "text",
            success: function (response) {
                $(tblName).html(response);
            }
        });
    }

    loadTable("populateTable", "#tableBody");
    loadTable("populateTable_c", "#tableBody_c");




    // Codes for "edit" modal 
    // ##
    // ##
    var ids = "";
    var isClickedbtn = false;
    var dataIdTransaction_no = "";
    var status = "";



    $(document).on('blur','textarea[name="customerNotes"]', function () {
      var valueOfNotes = $(this).val();
      var dataIdofNotes = $(this).data("notes");

      $.ajax({
        type: "POST",
        url: "includes/process.php",
        data: {saveNoteValue:valueOfNotes, dataIdofNotes:dataIdofNotes},
        dataType: "text",
        success: function (response) {

        }
      });
    });



    // Edit button event
    $(document).on("click",".editModal", function () {
        ids = $(this).data("id2");
        $.ajax({
          type: "POST",
          url: "includes/process.php",
          data: {dataId:ids},
          dataType: "text",
          success: function (response) {
            $("#modalDiv").html(response);
            // alert(response);
          }
        });
        $("#modalTable").show();
    });

    // Edit button event
    $(document).on("click",".editModal", function () {
        ids = $(this).data("id2");
        $.ajax({
          type: "POST",
          url: "includes/process.php",
          data: {dataId:ids},
          dataType: "text",
          success: function (response) {
            $("#modalDiv_c").html(response);
            // alert(response);
          }
        });
        $("#modalTable_c").show();
    });


    // addition, minus, delete modal event
    $(document).on('click','.btnAction', function () {
      var id = $(this).data("id3");
      var prc = $("#prc").val();
      var id2 = ids;
      var buttonType = "";
      isClickedbtn = true;

      
      if ($(this).hasClass("addQty"))
      {
        buttonType = "add";
      }
      else if ($(this).hasClass("minusQty"))
      {
        buttonType = "minus";
      }
      else if ($(this).hasClass("deleteItem"))
      {
        if(confirm("Are you sure you want to delete this item?"))
        {
          buttonType = "deleteItem";
        }
        else
        {
          return false;
        }
      }

        $.ajax({
          type: "POST",
          url: "includes/process.php",
          data: {buttonType:buttonType, id3: id, id2:id2, prc:prc},
          dataType: "text",
          success: function (response) {
            $("#modalDiv").html(response);
          }
        });
    });

    // Codes for realtime edit price for each item
    $(document).on("blur",".prc", function () {
      var dataId = $(this).data("id3");
      var inputAmount = $(this).val();
      var trans_no = ids;

      $.ajax({
        type: "POST",
        url: "includes/process.php",
        data: {editPrice:"true", dataId:dataId, inputAmount: inputAmount, trans_no:trans_no},
        dataType: "text",
        success: function (response) {
          
        }
      });
    });


    // Codes for saving the changes on modal form transactionrecords
    $(document).on('click','.saveTransactionRecord', function () {
        var prc = $(".prc").val();
        var id = $(this).data("id5");
        var amountReceive = $("#edit_amount_receive").val();

        $.confirm({
          type: 'blue',
          animation: 'scale',
          closeAnimation: 'scale',
          boxWidth: '500px',
          useBootstrap: false,
          title: 'Save changes',
          content: 'Do you wish to save your changes?',
          buttons: {
              Save: function () {
                $.ajax({
                  type: "POST",
                  url: "includes/process.php",
                  data: {saveTransactionRecord:"true", prc:prc, id:id, amtReceive:amountReceive},
                  dataType: "text",
                  success: function (response) {
                  }
                });
                window.location.replace("./transactionrecords.php");
                

              },
              Cancel: function () {
                // return false
              }
          }
        });
    });

    // onload reset modal event
    function onLoadResetModal()
    {
        $.ajax({
            type: "POST",
            url: "includes/process.php",
            data: {cancelTransactionRecord:"true", },
            dataType: "text",
            success: function (response) {
            }
        });
    }
    onLoadResetModal();

    // Codes for canceling the changes on modal form transactionrecords
    $(document).on('click','.cancelTransactionRecord', function () {
      $.confirm({
        type: 'blue',
        animation: 'scale',
        closeAnimation: 'scale',
        boxWidth: '500px',
        useBootstrap: false,
        title: 'Cancel?',
        content: 'Do you wish to cancel your changes?',
        buttons: {
            confirm: function () {
              window.location.replace("./transactionrecords.php");
            },
            cancel: function () {
              // return false
            }
        }
      });
    });


    // Sort data function active task
    function sortData() {
      var userInputName = $("#nameSortField").val();
      var userInputTransNo = $("#TransIdSortField").val();
      var userInputDateFrom = $("#sort_date_from").val();
      var userInputDateTo = $("#sort_date_to").val();
      var userInputStatus = $("#sort_status").val();
      
      $.ajax({
        type: "POST",
        url: "includes/process.php",
        data: {sortData:"sortData", sortName:userInputName,sortTransNo:userInputTransNo, sortDateFrom:userInputDateFrom, sortDateTo:userInputDateTo, sortStatus:userInputStatus},
        dataType: "text",
        success: function (response) {
          $("#tableBody").html(response);
        }
      });
    }

    // Sort data function completed task
    function sortData_c() {
      var userInputName = $("#nameSortField_c").val();
      var userInputTransNo = $("#TransIdSortField_c").val();
      var userInputDateFrom = $("#sort_date_from_c").val();
      var userInputDateTo = $("#sort_date_to_c").val();
      
      $.ajax({
        type: "POST",
        url: "includes/process.php",
        data: {sortData_c:"sortData_c", sortName:userInputName,sortTransNo:userInputTransNo, sortDateFrom:userInputDateFrom, sortDateTo:userInputDateTo},
        dataType: "text",
        success: function (response) {
          $("#tableBody_c").html(response);
        }
      });
    }


    // Codes for sorting the data from name
    $("#nameSortField").keyup(function (e) { 
      sortData();
    });
    $("#nameSortField_c").keyup(function (e) { 
      sortData_c();
    });


    // Codes for sorting the data from transaction_no
    $("#TransIdSortField").keyup(function (e) { 
      sortData();
    });
    $("#TransIdSortField_c").keyup(function (e) { 
      sortData_c();
    });

    // Codes for sorting from date
    $("#sort_date_from").on("change", function () {
      sortData();
    });
    $("#sort_date_from_c").on("change", function () {
      sortData_c();
    });

    // Codes for sorting to date
    $("#sort_date_to").on("change", function () {
      sortData();
    });
    $("#sort_date_to_c").on("change", function () {
      sortData_c();
    });

    // Codes for soting status
    $("#sort_status").on("change", function () {
      sortData();
    });
    $("#sort_status_c").on("change", function () {
      sortData_c();
    });


    // Function for status update
    function statusConfirmBox(a, b, c)
    {
      var dataId = a;
      var status = b;
      var btnColor = c;

      if (btnColor == "rgb(0, 128, 0)")
      {
        var isConfirmed = confirm("Mark this transaction as un"+status+"?")
        if (isConfirmed)
        {
          $.ajax({
            type: "POST",
            url: "includes/process.php",
            data: {statusQry:"false", dataId:dataId, status:status},
            dataType: "text",
            success: function (response) {
            }
          });

          return "unmarked";
        }
        else 
        {
          return "marked";
        }
      }

      else {
        var isConfirmed = confirm("Mark this transaction as "+status+"?")
        if (isConfirmed)
        {
          $.ajax({
            type: "POST",
            url: "includes/process.php",
            data: {statusQry:"true", dataId:dataId, status:status},
            dataType: "text",
            success: function (response) {
            }
          });
  
          return "marked";
        }
        else 
        {
          return "unmarked";
        }
      }
    }

    // Codes for released status update
    $(document).on("click", ".released", function () {
      var dataId = $(this).data("id2");
      status = $(this).attr("class");
      var btnColor = $(this).css("background-color");

      var isConfirmed = statusConfirmBox(dataId, status, btnColor);
      if (isConfirmed == "marked")
      {
        $(this).css("background", "green");
      }
      else if (isConfirmed == "unmarked")
      {
        $(this).css("background", "#333");
      }
    });


    // Codes for delivered status update
    $(document).on("click", ".delivered", function () {
      var dataId = $(this).data("id2");
      status = $(this).attr("class");
      var btnColor = $(this).css("background-color");

      var isConfirmed = statusConfirmBox(dataId, status, btnColor);
      if (isConfirmed == "marked")
      {
        $(this).css("background", "green");
      }
      else if (isConfirmed == "unmarked")
      {
        $(this).css("background", "#333");
      }
    });

    // Clear input value on sort fields active task
    $(document).on("click","#clearValue", function () {
      $("#nameSortField").val("");
      $("#TransIdSortField").val("");
      $("#sort_date_from").val("");
      $("#sort_date_to").val("");
      $("#sort_status").val("");
      loadTable("populateTable", "#tableBody");
    });

    // Clear input value on sort fields completed task
    $(document).on("click","#clearValue_c", function () {
      $("#nameSortField_c").val("");
      $("#TransIdSortField_c").val("");
      $("#sort_date_from_c").val("");
      $("#sort_date_to_c").val("");
      loadTable("populateTable_c", "#tableBody_c");
    });


});




