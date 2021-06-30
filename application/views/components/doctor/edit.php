<div class="container-fluid">
    <div class="row">

        <?php
        echo $this->session->flashdata('confirmation');
        $attribute = array(
            'name'  => '',
            'class' => 'form-horizontal',
            'id'    => ''
        );

        echo form_open_multipart('doctor/editDoctor?id=' . $this->input->get('id'), $attribute);
        ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Edit Profile</h1>
                </div>
            </div>

            <div class="panel-body no-padding">
                <div class="no-title">&nbsp;</div>

                <!-- left side -->
                <aside class="col-md-3">
                    <figure class="profile-pic">
                        <img id="pf_img" src="<?php echo site_url($biography[0]->image); ?>" alt="Photo not found!" class="img-responsive">
                        <input type="hidden" name="oldImage" value="<?php echo  $biography[0]->image;?>">
                    </figure>

                    <div class="profile-upload">  
                        <label class="btn btn-primary" style="display: block;" for="image"><i class="fa fa-cloud-upload"></i> Upload</label>
                        <input type="file" id="image" name="attachFile" style="display: none;">
                    </div><br/>
                </aside>

                <div class="col-md-9">    
                    <!-- pre><?php print_r($biography); ?></pre -->

                    <div class="form-group">
                        <label class="col-md-3 control-label">Full Name <stong class="text-danger">*</stong> </label>
                        <div class="col-md-7">
                            <input type="text" name="fullName" value="<?php echo $biography[0]->fullName; ?>" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Designation <stong class="text-danger">*</stong> </label>
                        <div class="col-md-7">
                            <select name="designation" class="form-control" required>
                                <option value="Asst_Professor" <?php if($biography[0]->designation == 'Asst_Professor'){ echo "selected"; } ?>>Asst Professor</option>
                                <option value="Professor" <?php if($biography[0]->designation == 'Professor'){ echo "selected"; } ?>>Professor</option>
                                <option value="Principal" <?php if($biography[0]->designation == 'Principal'){ echo "selected"; } ?>>Principal</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Degree</label>
                        <div class="col-md-7">
                            <input type="text" name="degree" class="form-control" value="<?php echo $biography[0]->degree; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Specialised In <stong class="text-danger">*</stong></label>
                        <div class="col-md-7">
                            <input type="text" name="specialised" class="form-control" value="<?php echo $biography[0]->specialised; ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Hospital Name</label>
                        <div class="col-md-7">
                            <input type="text" name="hospital" class="form-control" value="<?php echo $biography[0]->hospital; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Room No</label>
                        <div class="col-md-7">
                            <input type="text" name="room_no" class="form-control" value="<?php echo $biography[0]->room_no; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Mobile</label>
                        <div class="col-md-7">
                            <input type="number" name="mobile" class="form-control" value="<?php echo $biography[0]->mobile; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Phone</label>
                        <div class="col-md-7">
                            <input type="number" name="phone" class="form-control" value="<?php echo $biography[0]->phone; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Email </label>
                        <div class="col-md-7">
                            <input type="email" name="email" class="form-control" value="<?php echo $biography[0]->email; ?>">
                        </div>
                    </div>                                    

                    <div class="form-group">
                        <label class="col-md-3 control-label">Fee(TK)</label>
                        <div class="col-md-7">
                            <input type="number" name="fee" class="form-control" value="<?php echo $biography[0]->fee; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Commission(%)</label>
                        <div class="col-md-7">
                            <input type="number" name="commission" class="form-control" value="<?php echo $biography[0]->commission; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Address</label>
                        <div class="col-md-7">
                            <textarea name="address" class="form-control" cols="30" rows="4"><?php echo $biography[0]->address; ?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-7">
                            <div class="btn-group pull-right">
                                <input class="btn btn-primary" type="submit" name="change" value="Update">

                                <input class="btn btn-danger" type="reset" value="Clear">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>

        <?php echo form_close(); ?>
    </div>
</div>

