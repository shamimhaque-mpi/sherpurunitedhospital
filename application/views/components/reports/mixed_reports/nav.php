<div class="container-fluid none" <?php echo $subMenu; ?> style="margin-bottom: 10px;">
    <div class="row">
		<?php if(ck_action("mixed","saber")){ ?>
    		<a href="<?php echo site_url('reports/mixed_reports'); ?>" class="btn btn-default" id="saber">
    			Serological
    		</a>
    	<?php } ?>
    	
		<?php if(ck_action("mixed","biochemical")){ ?>
    		<a href="<?php echo site_url('reports/mixed_reports/biochemical'); ?>" class="btn btn-default" id="biochemical">
    			Biochemical
    		</a>
    	<?php } ?>
    	
		<?php if(ck_action("mixed","cbc")){ ?>
    		<a href="<?php echo site_url('reports/mixed_reports/cbc'); ?>" class="btn btn-default" id="cbc">
    			CBC
    		</a>
    	<?php } ?>
    	
		<?php if(ck_action("mixed","semen")){ ?>
    		<a href="<?php echo site_url('reports/mixed_reports/semen'); ?>" class="btn btn-default" id="semen">
    			Semen
    		</a>
    	<?php } ?>
    	
		<?php if(ck_action("mixed","urine")){ ?>
    		<a href="<?php echo site_url('reports/mixed_reports/urine'); ?>" class="btn btn-default" id="urine">
    			Urine
    		</a>
    	<?php } ?>
    	
		<?php if(ck_action("mixed","all")){ ?>
    		<a href="<?php echo site_url('reports/mixed_reports/all'); ?>" class="btn btn-default" id="all">
    			All Report
    		</a>
    	<?php } ?>
    </div>
</div>