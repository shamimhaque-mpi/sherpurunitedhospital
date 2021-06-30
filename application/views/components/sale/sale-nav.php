<div class="container-fluid none" <?php echo $subMenu; ?> style="margin-bottom: 10px;">
    <div class="row">	
		<a href="<?php echo site_url('sale/sale'); ?>" class="btn btn-default" id="add-new">
			Add Sale
		</a>	
		
		<a href="<?php echo site_url('sale/saleToday'); ?>" class="btn btn-default" id="today">
			Today Sales
		</a>	
	
		<a href="<?php echo site_url('sale/searchSale'); ?>" class="btn btn-default" id="all">
			All Sales
		</a>

		<a href="<?php echo site_url('sale/due'); ?>" class="btn btn-default" id="due">
			 Due List
		</a>
    </div>
</div>