$(function() {

    $("#home_form").click(function(e) {

        e.preventDefault();

        if (e.target.parentElement.id == "delete_value") {
            
            let delete_value = $(e.target.parentElement).data("no");

            if (confirm("Are you sure you want to delete?")) {

                $.ajax({

                    url: "./includes/delete_due_date.php",
                    type: "POST",
                    data: {delete_due_date:delete_value},
                    dataType: "text",
                    success: function() {
                        alert("Item Deleted");
                        loadDueDate();
                    }

                });

            }

        }

    });

    function loadDueDate() {

        $.ajax({

            url: "./includes/delete_due_date.php",
            type: "POST",
            success: function (allDates) {
                $("#due_date_tbody").html(allDates);
            }

        });

    }

    loadDueDate();

});