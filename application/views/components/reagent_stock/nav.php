
<div class="container-fluid none" <?php echo $subMenu; ?> style="margin-bottom: 10px;">
    <div class="row">	
        <?php if(ck_action("reagent_stock_menu","add-new")){ ?>
		<a href="<?php echo site_url('reagent_stock/reagent'); ?>" class="btn btn-default" id="add-new">
			Add Stock
		</a>
		<?php } ?>
		
		<?php if(ck_action("reagent_stock_menu","outstock")){ ?>
		<a href="<?php echo site_url('reagent_stock/reagent/outstock'); ?>" class="btn btn-default" id="outstock">
			Outstock
		</a>
		<?php } ?>
		
		<?php if(ck_action("reagent_stock_menu","all")){ ?>
		<a href="<?php echo site_url('reagent_stock/reagent/show'); ?>" class="btn btn-default" id="all">
			All Stock
	 	</a>
	 	<?php } ?>
    </div>
</div>