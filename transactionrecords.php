<?php 
    // ##
    // ## This line will automatically include the header and the sidebar then populates between pages
    require 'views/header.php';

?>

   <div id="transaction-container" class="new-container">
      <div>
         <p>Transaction Records</p>
      </div>

      <div class="tab" id="tab">
         <button class="tablinks" onclick="tabEvent(event, 'Active')" id="defaultOpen" style="">Active transactions</button>
         <button class="tablinks" onclick="tabEvent(event, 'Completed')" style="">Completed transactions</button>
      </div>

      <div id="Active" class="tabcontent">
         <!-- Sort section -->
         <div class="sort-section" style="background: #ffffff; padding: 20px 15px;">
            <form action="includes/process.php" method="post">
               <div>
                  <div>
                     <span style="font-weight: bold;">SEARCH BY</span> 
                     <div style="margin-left: 15px; display: inline-block;">
                        Name: 
                        <input type="text" name="nameSortField" id="nameSortField">
                     </div>

                     <div style="margin-left: 15px; display: inline-block;">
                        Transaction no: </a><input type="text" name="TransIdSortField" id="TransIdSortField" style="width: 100px;">
                     </div>
                     
                     <div style="margin-left: 15px; display: inline-block;">
                        <div style="display: inherit;">
                           Date From
                           <input type="date" name="sort_date_from" id="sort_date_from" class="trans-date">
                        </div>

                        <div style="margin-left: 10px; display: inherit;">
                           To
                           <input type="date" name="sort_date_to" id="sort_date_to" class="trans-date">
                        </div>
                     </div>
                     
                     <div style="margin-left: 15px; display: inline-block;">
                        Status
                        <select name="sort_status" id="sort_status" style="width: 150px; height: 25px;">
                           <option value="">Select Option</option>
                           <option value="released">Released</option>
                           <option value="delivered">Delivered</option>
                        </select>
                     </div>

                     <div style="margin-left: 20px; display: inline-block;">
                        <input name="clearValue" id="clearValue" type="button" value="Refresh">
                     </div>
                  </div>
               </div>
               
            </form>
            <!-- Sort Section End -->
         </div>
         
         <!-- Main Table Start -->
         <form action="includes/process.php" method="GET">
            <table id="table" cellspacing="0" cellpadding="0" style="border-collapse: collapse">
               <thead>
                  <tr>
                     <th class="fixed-size">Trans No.</th>
                     <th class="fixed-size">Due Date</th>
                     <th class="fixed-size fixed-fname">Full Name</th>
                     <th class="fixed-size-1 fixed-items">Items</th>
                     <th class="fixed-size-1 fixed-items final-fixed">Qty</th>
                     <th class="fixed-size">Description</th>
                     <th class="fixed-size">Total Price</th>
                     <th class="fixed-size">Received</th>
                     <th class="fixed-size">Balance</th>
                     <th class="fixed-size fixed-size-1 fixed-status">Action Status</th>
                     <th class="fixed-size fixed-size-1 fixed-note">Put Items Updates Here</th>
                  </tr>
               </thead>
               <tbody id="tableBody">
               </tbody>
         </table>
         </form>
         <!-- Main table End -->

         <!-- Modal -->
         <div id="modalTable">
            <div id="modalDiv">
            </div>
         </div>


         <div class="records-btns" style="width: auto; height: 35px; bottom: 0px;">
            <a href="home.php" style="background: green;">Go to homepage</a>
         </div>
      </div>





      <div id="Completed" class="tabcontent">
         <!-- Sort section -->
         <div class="sort-section" style="background: #ffffff; padding: 20px 15px;">
            <form action="includes/process.php" method="post">
               <div>
                  <div>
                  <span style="font-weight: bold;">SEARCH BY</span> 
                     <div style="margin-left: 15px; display: inline-block;">
                        Name: 
                        <input type="text" name="nameSortField_c" id="nameSortField_c">
                     </div>

                     <div style="margin-left: 15px; display: inline-block;">
                        Transaction no: </a><input type="text" name="TransIdSortField_c" id="TransIdSortField_c" style="width: 100px;">
                     </div>
                     
                     <div style="margin-left: 15px; display: inline-block;">
                        <div style="display: inherit;">
                           Date From
                           <input type="date" name="sort_date_from_c" id="sort_date_from_c" class="trans-date">
                        </div>

                        <div style="margin-left: 10px; display: inherit;">
                           To
                           <input type="date" name="sort_date_to_c" id="sort_date_to_c" class="trans-date">
                        </div>
                     </div>

                     <div style="margin-left: 20px; display: inline-block;">
                        <input name="clearValue_c" id="clearValue_c" type="button" value="Refresh" style="width: auto; padding: 4px 20px; border: none; background: #8b0b13; color: #fff; outline: none;">
                     </div>
                  </div>
               </div>
               
            </form>
         </div>
         <!-- Main Table Start -->
         <form action="includes/process.php" method="GET">
            <table id="table" cellspacing="0" cellpadding="0" style="border-collapse: collapse">
               <thead>
                  <tr>
                     <th class="fixed-size">Trans No.</th>
                     <th class="fixed-size">Due Date</th>
                     <th class="fixed-size fixed-fname">Full Name</th>
                     <th class="fixed-size-1 fixed-items">Items</th>
                     <th class="fixed-size-1 fixed-items final-fixed">Qty</th>
                     <th class="fixed-size">Description</th>
                     <th class="fixed-size">Total Price</th>
                     <th class="fixed-size">Received</th>
                     <th class="fixed-size">Balance</th>
                     <th class="fixed-size fixed-size-1 fixed-status">Action Status</th>
                     <th class="fixed-size fixed-size-1 fixed-note">Put Items Updates Here</th>
                  </tr>
               </thead>
               <tbody id="tableBody_c">
               </tbody>
            </table>
         </form>
         <!-- Main Table End -->

         <!-- this is gonna be the modal -->
         <div id="modalTable_c">
            <div id="modalDiv_c">
            </div>
         </div>

         <div class="records-btns" style="width: auto; height: 35px; bottom: 0px;">
            <a href="home.php" style="background: green;">Go to homepage</a>
         </div>

         

      </div>
   </div>

   <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
  <script src="js/transactionrecord.js"></script>

  <script>
      function tabEvent(evt, tabName) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
         tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
         tablinks[i].className = tablinks[i].className.replace(" active", "");
      }
      document.getElementById(tabName).style.display = "block";
      evt.currentTarget.className += " active";
      }

      // Get the element with id="defaultOpen" and click on it
      document.getElementById("defaultOpen").click();
   </script>
</body>
</html>