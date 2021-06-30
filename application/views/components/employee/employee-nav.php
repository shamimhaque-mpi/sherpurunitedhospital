
<div class="container-fluid none" <?php echo $subMenu; ?> style="margin-bottom: 10px;">
    <div class="row">
		<a href="<?php echo site_url('employee/employee'); ?>" class="btn btn-default" id="add-new">
			Add Employee
		</a>
		
		<a href="<?php echo site_url('employee/employee/show_employee'); ?>" class="btn btn-default" id="all">
			All Employee
		</a>

		<a href="<?php echo site_url('employee/designation'); ?>" class="btn btn-default" id="designation">
			Designation
		</a>
    </div>
</div>