<div class="container-fluid none" <?php echo $subMenu; ?> style="margin-bottom: 10px;">
    <div class="row">
        <?php if(ck_action("doctor-menu","add")){ ?>
    		<a href="<?php echo site_url('doctor/addNewDoctor'); ?>" class="btn btn-default" id="add">
    			New Doctor
    		</a>
        <?php } ?>

        <?php if(ck_action("doctor-menu","all")){ ?>
		<a href="<?php echo site_url('doctor/allDoctors'); ?>" class="btn btn-default" id="all">
			All Doctors
		</a>
        <?php } ?>
        
         <?php if(ck_action("doctor-menu","payment")){ ?>
            <a href="<?php echo site_url('doctor/payment'); ?>" class="btn btn-default" id="payment">
    			Payment
    		</a>
    	<?php } ?>	
		
		 <?php if(ck_action("doctor-menu","payment_all")){ ?>
    		<a href="<?php echo site_url('doctor/payment/all'); ?>" class="btn btn-default" id="payment_all">
    			All Payment
    		</a>
    	<?php } ?>	
		
		
		 <?php if(ck_action("doctor-menu","alt_doctor_payment")){ ?>
    		<a href="<?php echo site_url('doctor/alt_doctor'); ?>" class="btn btn-default" id="alt_doctor_payment">
    		    Ultra Doctor Payment
    		</a>
    	<?php } ?>	
		
		 <?php if(ck_action("doctor-menu","altra_doctor_all_payment")){ ?>
    		<a href="<?php echo site_url('doctor/alt_doctor/all'); ?>" class="btn btn-default" id="altra_doctor_all_payment">
    			All Ultra Doctor Payment
    		</a>
    	<?php } ?>	

        <?php /* if(ck_action("doctor-menu","commission")){ ?>
		<a href="<?php echo site_url('doctor/commission'); ?>" class="btn btn-default" id="commission">
			Commission
		</a>
		<?php }*/ ?>
		
        <?php /* if(ck_action("doctor-menu","payment")){ ?>
		<a href="<?php echo site_url('doctor/commissionPayment'); ?>" class="btn btn-default" id="payment">
			Payment
		</a>
		<?php } */ ?>

		<!--a href="<?php // echo site_url('doctor/updateCommission'); ?>" class="btn btn-default" id="update">
			Update Com.
		</a-->

        <?php /* if(ck_action("doctor-menu","details")){ ?>
		<a href="<?php echo site_url('doctor/commissionDetails'); ?>" class="btn btn-default" id="details">
			Com. Details
		</a>
        <?php }*/ ?>
        
        

    </div>
</div>