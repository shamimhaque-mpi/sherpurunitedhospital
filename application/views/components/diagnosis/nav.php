<div class="container-fluid none" <?php echo $subMenu; ?> style="margin-bottom: 10px;">
    <div class="row">
        <?php if(ck_action("diagnosis-menu","add")){ ?>
		<a href="<?php echo site_url('diagnosis/addNewPatientDiagnosis'); ?>" class="btn btn-default" id="add">
			New Diagnosis
		</a>
		<?php } ?>
		
        <?php if(ck_action("diagnosis-menu","all")){ ?>
		<a href="<?php echo site_url('diagnosis/allPatientDiagnosis'); ?>" class="btn btn-default" id="all">
			All Diagnosis
		</a>
		<?php } ?>
		
		<?php if(ck_action("diagnosis-menu","due_list")){ ?>
		<a href="<?php echo site_url('due_list/due_list'); ?>" class="btn btn-default" id="com">
			Due Report
		</a>
		<?php } ?>
		
		
		
        <?php if(ck_action("diagnosis-menu","com")){ ?>
		<a href="<?php echo site_url('diagnosis/referral_commission'); ?>" class="btn btn-default" id="com">
			Referral Comm
		</a>
		<?php } ?>


        <?php if(ck_action("diagnosis-menu","group_wise")){ ?>
		<a href="<?php echo site_url('diagnosis/group_wise_diagnosis'); ?>" class="btn btn-default" id="group_wise">
			Group Wise Diagnosis
		</a>
		<?php } ?>
		
		
		<!-- <a href="<?php // echo site_url('diagnosis/report'); ?>" class="btn btn-default" id="report">
			Report
		</a> -->

    </div>
</div>