<div class="container-fluid none" <?php echo $subMenu; ?> style="margin-bottom: 10px;">
    <div class="row">	
		<a href="<?php echo site_url('closing/closing'); ?>" class="btn btn-default" id="add-new">
			Daily
		</a>
		<a href="<?php echo site_url('closing/closing/report'); ?>" class="btn btn-default" id="report">
			Report
		</a>
		<?php if ($opening<1) { ?>
		<a href="<?php echo site_url('closing/closing/opening'); ?>" class="btn btn-default" id="opening">
			Opening
		</a>
		<?php } ?>

		
    </div>
</div>