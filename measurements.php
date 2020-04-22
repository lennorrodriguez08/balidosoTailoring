<?php 
    // ##
    // ## This line automatically includes the header and the sidebar then populates between pages
    require 'views/header.php';
    require 'views/sidebar.php';
    require 'includes/handler.php';

?>


    <div class="measurements-container">
        <div class="measurements-content">
            <p class="title-measurements">Measurement Form</p>
                <div class="form-container">
                    <!-- ============== SEARCH NAME ================== -->
                   
                        <!-- ============== CLOSING FULL NAME & NOTE ================== -->
                <!-- ============== MAIN FORM CONTAINER ================== -->
                <form action="includes/process.php" autocomplete="off" method="post">
                    <!-- ============== COAT FORM CONTAINER ================== -->
                    <div class="my-container">
                        <div class="search-name">
                            <label for="">Search Name</label>
                            
                                <input type="text" name="search" id="search">
                                <input type="button" name="submit" id="searchBtn" value="Search" class="search-value" style="background: green; border: 0; color: #fff; padding: 3px; font-size: 16px; border-radius: 3px;">
                            
                            <div id="show-list">
                                
                            </div>
                        </div>
                        <!-- ============== CLOSING SEARCH NAME ================== -->
                        <!-- ============== FULL NAME & NOTE ================== -->
                       <div class="info-wrapper">
                            <!-- <label for="">Full Name</label><br/>
                            <input type="text" name="full-name"><br/> -->
                            <label for="" style="display: inline-block; margin-bottom: 7px;">Note</label><br/>
                            <textarea name="note" id="note" cols="30" rows="10"></textarea>
                            <div>
                                <button class="save-btn-measurement" name="save" style="border-radius: 3px;">Update</button>
                            </div>
                            <div>
                                <a href='' target="_blank" class="print-btn-measurement" name="print-measurement" style="background: #058ED9; border-radius: 3px;"><i class="fas fa-print"></i>&nbsp;&nbsp;Print</a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Start type div -->
                    <div id="type" style="display: flex;">
                    <div class="form-flex-1" id="coat">
                    <p class="title-coat">Coat</p>
                    <label for="">Shoulder</label><br/>
                    <input type="text" name="coat-shoulder" class="text-width"><br/>
                    <label for="">Length</label><br/>
                    <input type="text" name="coat-length" class="text-width"><br/>
                    <label for="">Arm Length</label><br/>
                    <input type="text" name="coat-arm-length-left" class="arm-input">
                    <input type="text" name="coat-arm-length-middle" class="arm-input margin-left-5px">
                    <input type="text" name="coat-arm-length-right" class="arm-input margin-left-5px">
                    <p class="title-body">Body</p>
                    <label for="" class="margin-left-20px">Chest</label><br/>
                    <input type="text" name="coat-body-chest" class="text-width margin-left-20px"><br/>
                    <label for="" class="margin-left-20px">Waist</label><br/>
                    <input type="text" name="coat-body-waist" class="text-width margin-left-20px"><br/>
                    <label for="" class="margin-left-20px">Hips</label><br/>
                    <input type="text" name="coat-body-hips" class="text-width margin-left-20px"><br/>
                    <label for="" class="title-arm-hole">Arm Hole</label><br/>
                    <input type="text" name="coat-body-arm-hole" class="text-width"><br/>
                    <label for="">Down</label><br/>
                    <input type="text" name="coat-body-down" class="text-width"><br/>
                    <label for="">Front</label><br/>
                    <input type="text" name="coat-body-front" class="text-width"><br/>
                    <label for="">Back</label><br/>
                    <input type="text" name="coat-body-back" class="text-width"><br/>
                    </div>
                    <!-- ============== CLOSING COAT FORM CONTAINER ================== -->
                    <!-- ============== BARONG FORM CONTAINER ================== -->
                    <div class="form-flex-1">
                    <p class="title-coat">Barong</p>
                    <label for="">Shoulder</label><br/>
                    <input type="text" name="barong-shoulder" class="text-width"><br/>
                    <label for="">Length</label><br/>
                    <input type="text" name="barong-length" class="text-width"><br/>
                    <label for="">Arm Length</label><br/>
                    <span>LS:&nbsp;</span><input type="text" name="barong-ls-left" class="arm-input">/<input type="text" name="barong-ls-right" class="arm-input margin-left-5px">
                    <br/>
                    <span>SS:&nbsp;</span><input type="text" name="barong-ss-left" class="arm-input">/<input type="text" name="barong-ss-right" class="arm-input margin-left-5px"><br/>
                    <p class="title-body">Body</p>
                    <label for="" class="margin-left-20px">Chest</label><br/>
                    <input type="text" name="barong-body-chest" class="text-width margin-left-20px"><br/>
                    <label for="" class="margin-left-20px">Waist</label><br/>
                    <input type="text" name="barong-body-waist" class="text-width margin-left-20px"><br/>
                    <label for="" class="margin-left-20px">Hips</label><br/>
                    <input type="text" name="barong-body-hips" class="text-width margin-left-20px"><br/>
                    <label for="" class="title-arm-hole">Arm Hole</label><br/>
                    <input type="text" name="barong-arm-hole" class="text-width"><br/>
                    <label for="">Neck</label><br/>
                    <input type="text" name="barong-neck" class="text-width"><br/>
                    <label for="">Slit</label><br/>
                    <input type="text" name="barong-slit" class="text-width">
                    </div>
                    <!-- ============== CLOSING BARONG FORM CONTAINER ================== -->
                    <!-- ============== PANTS FORM CONTAINER ================== -->
                    <div class="form-flex-1">
                    <p class="title-coat">Pants</p>
                    <label for="">Waist Line</label><br/>
                    <input type="text" name="pants-waist-line" class="text-width"><br/>
                    <label for="">Hips</label><br/>
                    <input type="text" name="pants-hips" class="text-width"><br/>
                    <label for="">Arm Hole</label><br/>
                    <input type="text" name="pants-arm-hole" class="text-width"><br/>
                    <label for="">Length</label><br/>
                    <input type="text" name="pants-length" class="text-width"><br/>
                    <label for="">Crotch</label><br/>
                    <input type="text" name="pants-crotch" class="text-width"><br/>
                    <label for="" class="title-legs">Legs</label><br/>
                    <input type="text" name="pants-legs" class="text-width"><br/>
                    <label for="">Knee</label><br/>
                    <input type="text" name="pants-knee" class="text-width"><br/>
                    <label for="">Bottom</label><br/>
                    <input type="text" name="pants-bottom" class="text-width"><br/>
                    
                    <input type="radio" name="pleats" value="false" class="text-width">
                    <label for="" class="pleats">No Pleats</label><br/>
                    <input type="radio" name="pleats" value="true" class="text-width" >
                    <label for="">With Pleats</label><br/>
                    </div>
                    <!-- ============== CLOSING PANTS FORM CONTAINER ================== -->
                    </div>
                    <!-- End type div -->


                    <!-- <div class="btns" class="overflow: hidden;">
                    <button class="save-btn spacer" name="save" style="background: indigo;">Save</button>
                    <button class="delete-btn spacer" name="update" style="background: green">Update</button>
                    <button class="clear-btn spacer" name="clear">Clear</button><br/> -->
                    <!-- <button class="update-btn spacer" name="delete">Delete</button> -->
                <!-- </div> -->
                </form>
                <!-- ============== CLOSING MAIN FORM CONTAINER ================== -->
                <!-- ============== OUTSIDE BUTTONS ================== -->
                
                <!-- ============== CLOSING OUTSIDE BUTTONS ================== -->
            </div>
        </div>
    </div>

    
    <?php
        // ##
        // ## This line automatically includes the footer then populate between pages
        require 'views/footer.php';
    ?>
