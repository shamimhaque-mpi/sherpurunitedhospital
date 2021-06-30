<div class="container-fluid none" <?php echo $subMenu; ?> style="margin-bottom: 10px;">
    <div class="row">	
		
		<?php if(ck_action("marketer-menu","add")){ ?>
    		<a href="<?php echo site_url('marketer/add'); ?>" class="btn btn-default" id="add">
    			New RF/PC
    		</a>
    	 <?php } ?>	
		
		 <?php if(ck_action("marketer-menu","all")){ ?>
    		<a href="<?php echo site_url('marketer/all'); ?>" class="btn btn-default" id="all">
    			All RF/PC
    		</a>
    	 <?php } ?>	
    	 
    	 <?php if(ck_action("marketer-menu","commission-list")){ ?>
    		<a href="<?php echo site_url('marketer/commission_list'); ?>" class="btn btn-default" id="commission-list">
    			Commission List
    		</a>
    	 <?php } ?>	
		
		 <?php if(ck_action("marketer-menu","marketer_commision_collect")){ ?>
    		<a href="<?php echo site_url('marketer/marketer_commision_collect'); ?>" class="btn btn-default" id="marketer_commision_collect">
    		    Commission Payment
    		</a>
    	 <?php } ?>	
		
		 <?php if(ck_action("marketer-menu","all_payment")){ ?>
    		<a href="<?php echo site_url('marketer/marketer_commision_collect/all'); ?>" class="btn btn-default" id="all_payment">
    		    All Payment
    		</a>
    	 <?php } ?>	

		<!--<a href="<?php // echo site_url('marketer/commission'); ?>" class="btn btn-default" id="commission">-->
		<!--	Commission-->
		<!--</a>-->

		<!--<a href="<?php // echo site_url('marketer/commission/payment'); ?>" class="btn btn-default" id="payment">-->
		<!--	Payment-->
		<!--</a>-->

		<!-- <a href="<?php // echo site_url('marketer/commission/update'); ?>" class="btn btn-default" id="update">
			Update Com.
		</a> -->

		<!--<a href="<?php // echo site_url('marketer/commission/details'); ?>" class="btn btn-default" id="details">-->
		<!--	Com. Details-->
		<!--</a>-->

	</div>
</div>