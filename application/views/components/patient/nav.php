<div class="container-fluid none" <?php echo $subMenu; ?> style="margin-bottom: 10px;">
    <div class="row">	
		<a href="<?php echo site_url('patient/basicInfo'); ?>" class="btn btn-default" id="basic-info">
			Basic Info
		</a>
		
		<a href="<?php echo site_url('patient/payment'); ?>" class="btn btn-default" id="payment">
			Payment
		</a>

		<a href="<?php echo site_url('patient/basicInfo/all'); ?>" class="btn btn-default" id="all">
			All Patient 
		</a>
		<a href="<?php echo site_url('patient/basicInfo/dueAll'); ?>" class="btn btn-default" id="dueAll">
			All Due Patient 
		</a>
		<a href="<?php echo site_url('patient/basicInfo/referredAll'); ?>" class="btn btn-default" id="referredAll">
			All Reference Doctor Patient 
		</a>
		
		<a href="<?php echo site_url('patient/release'); ?>" class="btn btn-default" id="release">
			Release
		</a>
		<a href="<?php echo site_url('patient/report'); ?>" class="btn btn-default" id="report">
			Report
		</a>

    </div>
</div>