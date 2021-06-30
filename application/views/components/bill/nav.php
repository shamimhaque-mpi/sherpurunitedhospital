<div class="container-fluid none" <?php echo $subMenu; ?> style="margin-bottom: 10px;">
    <div class="row">
        <?php if(ck_action("bill_menu", "add-bill")){ ?>
		<a href="<?php echo site_url('bill/bill/add_bill'); ?>" class="btn btn-default" id="add-bill">
			Add Bill
		</a>
		<?php } ?>
		
        <?php if(ck_action("bill_menu", "all")){ ?>
		<a href="<?php echo site_url('bill/bill'); ?>" class="btn btn-default" id="all">
			All Bill
		</a>
		<?php } ?>
		
        <?php if(ck_action("bill_menu", "add-item")){ ?>
		<a href="<?php echo site_url('bill/items/add'); ?>" class="btn btn-default" id="add-items">
			Add Items
		</a>
		<?php } ?>
		
        <?php if(ck_action("bill_menu", "bill-item")){ ?>
		<a href="<?php echo site_url('bill/items'); ?>" class="btn btn-default" id="all-items">
			All Items
		</a>
		<?php } ?>
    </div>
</div>