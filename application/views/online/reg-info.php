<div class="col-md-9">
    <div class="row">
        <div class="single">

        <h3>Online Registration</h3>
            <?php
            $today_date = strtotime(date('Y-m-d'));
            $start_date = strtotime('2015-09-20');
            $end_date = strtotime('2016-12-20');

            if ($today_date >= $start_date && $today_date <= $end_date) {
            ?>
            
            <!--
            <img class="img-responsive" src="<?php echo site_url('public/upload/rules/ins.PNG'); ?>">
            <img class="img-responsive" src="<?php echo site_url('public/upload/rules/Captdddure.PNG'); ?>">
            -->
            
            <br/>
            <p><b>বিকাশ সম্পর্কিত তথ্যাদি</b></p>
            <p>১. বিকাশে নতুন একাউন্ট তৈরি সম্পর্কিত তথ্যের জন্য  <a href="http://www.bkash.com/bn/support/frequently-asked-questions" target="_blank">এখানে ক্লিক করুন</a> ।</p>
            <p>২. বিকাশ এজেন্টের কাছ থেকে টাকা পাঠাতে হলে আপনার কোন ব্যক্তিগত বিকাশ একাউন্ট থাকার প্রয়োজন নেই। </p>
            <p>৩. নিজের মোবাইলের বিকাশ একাউন্ট থেকে টাকা পাঠানো সংক্রান্ত তথ্যের জন্য <a href="http://www.bkash.com/bn/products-services/send-money" target="_blank">এখানে ক্লিক করুন</a> ।</p>
            <!--p><a href="<?php echo site_url('public/upload/rules/instruction.pdf'); ?>" download><b><i class="fa fa-download"></i> Download Instruction</b></a></p--><br/>


            <p class="course_P">
                <a href="<?php echo site_url('online/regForm'); ?>" class="btn-class">Registration</a>
                <a href="<?php echo site_url('online/regUploadPhoto'); ?>" class="btn-class">Upload Photo</a>
                <a href="<?php echo site_url('online/regInfoRecover'); ?>" class="btn-class">Recover Info</a>
            </p>

            <?php } else { ?>
                
            <div class="pannel-custom pannel-custom-new res-margin-right-5" style="margin-top:0 !important;">
                <ul>
                    <li style="margin-top: 10px !important;"><h3> Date is Over !</h3></li>
                </ul>
            </div>

            <?php } ?>
        </div>
    </div>
</div>

