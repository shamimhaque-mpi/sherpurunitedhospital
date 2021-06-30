<div class="container-fluid none" <?php echo $subMenu; ?> style="margin-bottom: 10px;">
    <div class="row">	
		 <?php if(ck_action("consultancy-menu","add")){ ?>
    		<a href="<?php echo site_url('consultancy/newConsultancy'); ?>" class="btn btn-default" id="add">
    			New Consultancy
    		</a>
    	<?php } ?>	
		
		 <?php if(ck_action("consultancy-menu","all")){ ?>
    		<a href="<?php echo site_url('consultancy/allConsultancy'); ?>" class="btn btn-default" id="all">
    			All Consultancy
    		</a>
    	<?php } ?>		

         <?php if(ck_action("consultancy-menu","report")){ ?>
    		<a href="<?php echo site_url('consultancy/report'); ?>" class="btn btn-default" id="report">
    			Report
    		</a>
    	<?php } ?>		

    </div>
</div>