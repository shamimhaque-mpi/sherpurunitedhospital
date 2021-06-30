<div class="container-fluid none" <?php echo $subMenu; ?> style="margin-bottom: 10px;">
    <div class="row">
        
        <?php if(ck_action("investigation-menu","group")){ ?>
    	<a href="<?php echo site_url('investigation/addInvestigation/group'); ?>" class="btn btn-default" id="group">
			Add Group
		</a>
		<?php } ?>
		
        <?php if(ck_action("investigation-menu","test")){ ?>
		<a href="<?php echo site_url('investigation/addInvestigation/test'); ?>" class="btn btn-default" id="test">
			Test
		</a>
		<?php } ?>
		
        <?php if(ck_action("investigation-menu","addMenu")){ ?>
		<a href="<?php echo site_url('investigation/addInvestigation'); ?>" class="btn btn-default" id="addMenu">
			New Investigation
		</a>
		<?php } ?>
		
        <?php if(ck_action("investigation-menu","all")){ ?>
		<a href="<?php echo site_url('investigation/allInvestigation'); ?>" class="btn btn-default" id="all">
			All Investigation 
		</a>
		<?php } ?>

    </div>
</div>