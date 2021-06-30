<div class="container-fluid none" <?php echo $subMenu; ?> style="margin-bottom: 10px;">
    <div class="row">
	
    		<?php if(ck_action("ultra_test","add_ultra")){ ?>
        		<a href="<?php echo site_url('reports/ultra_report'); ?>" class="btn btn-default" id="add_ultra">
        			New Ultra
        		</a>
            <?php } ?>
    		
    		<?php if(ck_action("ultra_test","all_ultra")){ ?>
        		<a href="<?php echo site_url('reports/ultra_report/all'); ?>" class="btn btn-default" id="all_ultra">
        			All Ultra
        		</a>
        	<?php } ?>	
    </div>
</div>