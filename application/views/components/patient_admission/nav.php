<div class="container-fluid none" <?php echo $subMenu; ?> style="margin-bottom: 10px;">
    <div class="row">
		<a href="<?php echo site_url('patient_admission/patient_admission/admit_type'); ?>" class="btn btn-default" id="admit_type">
			Admit Type
		</a>

		<a href="<?php echo site_url('patient_admission/patient_admission'); ?>" class="btn btn-default" id="admission">
			Patient Admission
		</a>

		<a href="<?php echo site_url('patient_admission/patient_admission/all_admission'); ?>" class="btn btn-default" id="all_admission">
			All Admission
		</a>

		<a href="<?php echo site_url('patient_admission/due_collection/all'); ?>" class="btn btn-default" id="all_collection">
			All Collection
		</a>
    </div>
</div>
