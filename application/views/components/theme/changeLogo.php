<div class="container-fluid">
    <div class="row">
        <?php 
        	echo $this->session->flashdata('confirmation'); 
        	echo $confirmation; 
            $logo=json_decode($theme_data[0]->logo,true);
            $menu_icon=json_decode($theme_data[0]->menu_icon,true);

	        $footer_info=json_decode($theme_data[0]->footer,true);
	        $header_info=json_decode($theme_data[0]->header,true);
	        $social_icon=json_decode($theme_data[0]->social_icon,true);
        ?>
        <!-- ================================================================================ -->
        <!-- =============================Change Logo start here============================= -->
        <!-- ================================================================================ -->
        <div class="panel panel-default">

            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Change Logo</h1>
                </div>
            </div>

            <div class="panel-body">
            
	        	<div class="row">
	        		<div class="col-xs-12">
	        			<div class="col-md-4">
			        		<figure>
			        			<img src="<?php echo site_url($logo['logo']); ?>" alt="Image not found!" style="width: 150px; height: 150px; display: block; margin: 0 auto;">
			        			<figcaption></figcaption>
			        		</figure>
			        	</div>


			        	<div class="col-md-6">

	        		<?php
		        		$attr=array(
							"class"=>"form-horizontal"
		        		);
		        		echo form_open_multipart('', $attr);
	        		?>
	        					<input type="hidden" value="<?php echo $logo['faveicon']; ?>" name="faveicon" />
	        					<input type="hidden" value="<?php echo $logo['logo']; ?>" name="old_logo" />
	        					<input type="hidden" value="<?php echo $theme_data[0]->id; ?>" name="theme_id" />
			            		<div class="form-group">
								    <label class=" control-label" style="line-height: 4;">Logo</label>
								    <input id="input-test" type="file" name="attachFile" class="form-control file" data-show-preview="false" data-show-upload="false" required data-show-remove="false">
								</div>
			                   
			        <?php
                        $value= 'Save';
                        $name="submit_logo";
                        $class="btn-primary";

                        if (count($theme_data)>0) {
                            $value= 'Update';
                            $name="update_logo";
                            $class="btn-success";
                        }
                    ?>
                    <div class="row">
	                    <div class="btn-group pull-right">
	                        <input type="submit" value="<?php echo $value; ?>" name="<?php echo $name; ?>" class="btn <?php echo $class; ?>">
	                    </div>
                    </div>
                <?php echo form_close(); ?>
			        	</div>
	        		</div>
	        	</div>
	                  
	        </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
        <!-- ================================================================================ -->
        <!-- =============================Change Logo start here============================= -->
        <!-- ================================================================================ -->

        <!-- ================================================================================ -->
        <!-- ===========================Change Faveicon start here=========================== -->
        <!-- ================================================================================ -->

        <div class="panel panel-default">

            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Change Faveicon</h1>
                </div>
            </div>

            <div class="panel-body">
            
	        	<div class="row">
	        		<div class="col-xs-12">
	        			<div class="col-md-4">
			        		<figure>
			        			<img src="<?php echo site_url($logo['faveicon']); ?>" alt="Image not found!" style="width: 150px; height: 150px; display: block; margin: 0 auto;">
			        			<figcaption></figcaption>
			        		</figure>
			        	</div>


			        	<div class="col-md-6">

	        		<?php
		        		$attr=array(
							"class"=>"form-horizontal"
		        		);
		        		echo form_open_multipart('', $attr);
	        		?>
	        					<input type="hidden" value="<?php echo $logo['logo']; ?>" name="logo" />
	        					<input type="hidden" value="<?php echo $logo['faveicon']; ?>" name="old_faveicon" />
	        					<input type="hidden" value="<?php echo $theme_data[0]->id; ?>" name="theme_id" />
			            		<div class="form-group">
								    <label class=" control-label" style="line-height: 4;">Faveicon</label>
								    <input id="input-test" type="file" name="attachFile" class="form-control file" data-show-preview="false" data-show-upload="false" required data-show-remove="false">
								</div>
			                   
			        <?php
                        $value='Save';
                        $name="submit_fevicon";
                        $class="btn-primary";

                        if (count($theme_data)>0) {
                            $value='Update';
                            $name="update_fevicon";
                            $class="btn-success";
                        }
                    ?>
                    <div class="row">
	                    <div class="btn-group pull-right">
	                        <input type="submit" value="<?php echo $value; ?>" name="<?php echo $name; ?>" class="btn <?php echo $class; ?>">
	                    </div>
                    </div>
                <?php echo form_close(); ?>
			        	</div>
	        		</div>
	        	</div>
	                  
	        </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
        <!-- ================================================================================ -->
        <!-- ===========================Change Faveicon end here============================= -->
        <!-- ================================================================================ -->

		



    </div>
</div>