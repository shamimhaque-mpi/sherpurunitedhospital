<div class="container-fluid none" <?php echo $subMenu; ?> style="margin-bottom: 10px;">
    <div class="row">
        <?php if(ck_action("alltest_menu","group")){ ?>
		<a href="<?php echo site_url('alltest/group'); ?>" class="btn btn-default" id="group">
			Group
		</a>
		<?php } ?>
		
        <?php if(ck_action("alltest_menu","test")){ ?>
		<a href="<?php echo site_url('alltest/test'); ?>" class="btn btn-default" id="test">
			Test
		</a>
		<?php } ?>
		
		<?php if(ck_action("alltest_menu","parameter")){ ?>
		<a href="<?php echo site_url('alltest/parameter'); ?>" class="btn btn-default" id="parameter">
			Parameter
		</a>
		<?php } ?>


        <?php if(ck_action("alltest_menu","group_mapping")){ ?>
		<a href="<?php echo site_url('alltest/group_mapping'); ?>" class="btn btn-default" id="group_mapping">
			Group Mapping
		</a>
		<?php } ?>

        <?php if(ck_action("alltest_menu","test_mapping")){ ?>
            <a href="<?php echo site_url('alltest/test_mapping'); ?>" class="btn btn-default" id="test_mapping">
                Test Mapping
            </a>
        <?php } ?>


        <?php if(ck_action("alltest_menu","show_mapping")){ ?>
            <a href="<?php echo site_url('alltest/show_mapping'); ?>" class="btn btn-default" id="show_mapping">
                Show Mapping
            </a>
        <?php } ?>

        <?php if(ck_action("alltest_menu", "test_sort")){ ?>
            <a href="<?php echo site_url('alltest/sort/test'); ?>" class="btn btn-default" id="test_sort">
                Test Sort
            </a>
        <?php } ?>

        <?php if(ck_action("alltest_menu", "test_group")){ ?>
            <a href="<?php echo site_url('alltest/sort/group'); ?>" class="btn btn-default" id="test_group">
                Group Sort
            </a>
        <?php } ?>

        <?php if(ck_action("alltest_menu", "parameter_group")){ ?>
            <a href="<?php echo site_url('alltest/sort/parameter'); ?>" class="btn btn-default" id="parameter_group">
                Parameter Sort
            </a>
        <?php } ?>
        
    </div>
</div>