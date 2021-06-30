<div class="container-fluid">
    <div class="row">
        <?php 
        echo $this->session->flashdata('confirmation');
        $footer_info=json_decode($theme_data[0]->footer,true);
        $header_info=json_decode($theme_data[0]->header,true);
        $social_icon=json_decode($theme_data[0]->social_icon,true);
        $signature=json_decode($theme_data[0]->signature,true);
        ?>
        <!--===================================================================================================-->
        <!--===============================Header Information Section Start here===============================-->
        <!--===================================================================================================-->
        <div class="panel panel-default">

            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Basic Settings</h1>
                </div>
            </div>

            <div class="panel-body">
                 <?php
                    $attr=array(
                        "class"=>"form-horizontal"
                    );
                    echo form_open('theme/themeSetting/theme_tools', $attr);
                 ?>

                    <input type="hidden" name="theme_id" value="<?php echo custom_fetch($theme_data,'id')?>">
                    <div class="form-group">
                        <label class=" col-md-4 control-label">Site Name</label>
                        <div class="col-md-6">
                            <div class="row">
                            <input type="text" value="<?php echo $header_info['site_name']; ?>" name="site_name" class="form-control">
                        </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class=" col-md-4 control-label">Address</label>
                        <div class="col-md-6">
                            <div class="row">
                            <input type="text" value="<?php echo $header_info['place_name']; ?>" name="place_name" class="form-control">
                        </div>
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <label class=" col-md-4 control-label">Mobile</label>
                        <div class="col-md-6">
                            <div class="row">
                            <input type="text" value="<?php echo $header_info['addr_moblile']; ?>" name="addr_moblile" class="form-control" value="yes">
                        </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-6">
                            <label style="display: block;text-align: left;margin-left: -15px !important;"><input type="checkbox" name="is_banner" <?php echo ($header_info['is_banner']=="yes" ? 'checked':'' )?>> Is Banner ?</label>
                        </div>
                    </div>
                    
                    <?php
                        $value='Save';
                        $name="submit_header";
                        $class="btn-primary";

                        if (count($theme_data)>0) {
                            $value='Update';
                            $name="update_header";
                            $class="btn-success";
                        }
                    ?>
                    
                    <div class="col-md-10" style="margin-left: 25px;">
                        <div class="btn-group pull-right">
                            <input type="submit" value="<?php echo $value; ?>" name="<?php echo $name; ?>" class="btn <?php echo $class; ?>">
                        </div>
                    </div>
                <?php echo form_close(); ?>
                      
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>

        <div class="panel panel-default">

            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Vat Setting</h1>
                </div>
            </div>

            <div class="panel-body">
                 <?php
                    $attr=array(
                        "class"=>"form-horizontal"
                    );
                    echo form_open('vat/vat/', $attr);
                 ?>

                    <input type="hidden" name="vat_id" value="<?php echo '1'; ?>">

                    <div class="form-group">
                        <label class=" col-md-4 control-label">Vat (%) </label>
                        <div class="col-md-6">
                            <div class="row">
                            <input type="text" value="<?php echo $vatInfo[0]->percentage;  ?>" name="percentage" class="form-control">
                        </div>
                        </div>
                    </div>
                    
                    <?php
                        $value='Save';
                        $name="submit_vat";
                        $class="btn-primary";

                        if (count($vatInfo)>0) {
                           // echo count($vatInfo);
                            $value='Update';
                            $name="update_vat";
                            $class="btn-success";
                        }
                    ?>
                    
                   <div class="col-md-10" style="margin-left: 25px;">
                        <div class="btn-group pull-right">
                            <input type="submit" value="<?php echo $value; ?>" name="<?php echo $name; ?>" class="btn <?php echo $class; ?>">
                        </div>
                   </div>
                <?php echo form_close(); ?>     
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>

        <div class="panel panel-default">
            <?php 
                 $getInfo =$this->action->read('remark'); 
            ?>
            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Remark of Diagnosis</h1>
                </div>
            </div>

            <div class="panel-body">
                 <?php
                    $attr=array(
                        "class"=>"form-horizontal"
                    );
                    echo form_open('vat/vat/remark/', $attr);
                 ?>

                    <input type="hidden" name="remark_id" value="<?php echo (isset($getInfo[0]->id) ? $getInfo[0]->id : ''); ?>">

                    <div class="form-group">
                        <label class=" col-md-4 control-label">Remark </label>
                        <div class="col-md-6">
                            <div class="row">
                                <input name="remark" class="form-control" value="<?php echo (isset($getInfo[0]->remark) ? $getInfo[0]->remark : ''); ?>">
                            </div>
                        </div>
                    </div>
                    
                    <?php
                        $value='Save';
                        $name="submit";
                        $class="btn-primary";

                        if (count($getInfo)>0) {
                            $value='Update';
                            $name="update";
                            $class="btn-success";
                        }
                    ?>
                    
                   <div class="col-md-10" style="margin-left: 25px;">
                        <div class="btn-group pull-right">
                            <input type="submit" value="<?php echo $value; ?>" name="<?php echo $name; ?>" class="btn <?php echo $class; ?>">
                        </div>
                   </div>
                <?php echo form_close(); ?>
                      
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
        
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Signature Area</h1>
                </div>
            </div>

            <div class="panel-body">
                <form action="" method="post" accept-charset="utf-8" class="form-horizontal">
                    <div class="form-group">
                        <label class=" col-md-4 control-label">Name </label>
                        <div class="col-md-6">
                            <div class="row">
                                <input name="name" class="form-control" value="<?=(isset($signature['name']) ? $signature['name'] : '')?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class=" col-md-4 control-label">Designation </label>
                        <div class="col-md-6">
                            <div class="row">
                                <input name="designation" class="form-control" value="<?=(isset($signature['designation']) ? $signature['designation'] : '')?>">
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-10" style="margin-left: 25px;">
                        <div class="btn-group pull-right">
                            <input type="submit" value="Save" name="signature" class="btn btn-primary">
                        </div>
                    </div>
                </form>                      
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>

    </div>
</div>