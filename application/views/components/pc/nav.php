<div class="container-fluid none" <?php echo $subMenu; ?> style="margin-bottom: 10px;">
    <div class="row">	
		<a href="<?php echo site_url('pc/addNewPc'); ?>" class="btn btn-default" id="add">
			New PC
		</a>

		<a href="<?php echo site_url('pc/allPc'); ?>" class="btn btn-default" id="all">
			All PC
		</a>

		<a href="<?php echo site_url('pc/cont/commission'); ?>" class="btn btn-default" id="commission">
			Commission
		</a>

		<a href="<?php echo site_url('pc/cont/payment'); ?>" class="btn btn-default" id="payment">
			Payment
		</a>

		<a href="<?php echo site_url('pc/cont/details'); ?>" class="btn btn-default" id="details">
			Com. Details
		</a>
	</div>
</div>