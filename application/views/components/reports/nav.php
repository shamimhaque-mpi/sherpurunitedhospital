<div class="container-fluid none" <?php echo $subMenu; ?> style="margin-bottom: 10px;">
    <div class="row">
		<?php if(ck_action("tests","add")){ ?>
    		<a href="<?php echo site_url('reports/test'); ?>" class="btn btn-default" id="add">
    			Add Test Reports
    		</a>
    	<?php } ?>	
		
		<?php if(ck_action("tests","list")){ ?>
    		<a href="<?php echo site_url('reports/test/testList'); ?>" class="btn btn-default" id="list">
    		    All Test Reports
    		</a>
		<?php } ?>	
    </div>
</div>