let data = new Array();
let isClicked = false;
        $(document).ready(function () {

            $("#search").keyup(function () { 
                var searchText = $(this).val();

                if (searchText != '') {
                    $.ajax({
                        method: "POST",
                        url: "includes/auto_complete.php",
                        data: {query:searchText},
                        dataType: "text",
                        success: function (response) {
                            $("#show-list").html(response);
                        },
                        arrayVal: data
                    });
                }
                else {
                    $("#show-list").html('');
                }
            });

            $(document).on('click', '#show-list p', function () {
                isClicked = true;
                $("#search").val($(this).text());
                $("#show-list").html('');
            });

            

            // This line search all records from the customer table
            $("#searchBtn").click(function (e) { 
                var value = $("#search").val();
                
                if (isClicked == true && value != "No record") {
                    if (!value == "") {
                        // for populating measurements data
                        $.ajax({
                            method: "POST",
                            url: "includes/show.php",
                            data: {query:value},
                            dataType: "text",
                            success: function (response) {
                                $("#type").html(response);
                            },
                        });

                        // for populating data to print button get request link
                        $.ajax({
                            type: "POST",
                            url: "includes/process.php",
                            data: {getVal:true, fullname:value},
                            dataType: "text",
                            success: function (response) {
                                $(".print-btn-measurement").attr("href", response);
                            }
                        });

                        // for populating notes data of selected client
                        $.ajax({
                            type: "POST",
                            url: "includes/process.php",
                            data: {noteVal:true, fullname:value},
                            dataType: "text",
                            success: function (response) {
                                $("#note").val(response);
                            }
                        });

                    }
                } else {
                    alert("No record found");
                }
                isClicked = false;

            });
        });