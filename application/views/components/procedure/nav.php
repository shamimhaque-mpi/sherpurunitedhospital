<div class="container-fluid none" <?php echo $subMenu; ?> style="margin-bottom: 10px;">
    <div class="row">	
		
		<?php if(ck_action("procedure","add")){ ?>
    		<a href="<?php echo site_url('procedure/procedure'); ?>" class="btn btn-default" id="add">
    			Add Parameter
    		</a>
    	<?php } ?>	
		
		<?php if(ck_action("procedure","list")){ ?>
    		<a href="<?php echo site_url('procedure/procedure/procedureList'); ?>" class="btn btn-default" id="list">
    		    All Parameter
    		</a>
    	<?php } ?>	
    </div>
</div>