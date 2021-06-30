<div class="container-fluid">
    <div class="row">
        <?php
        echo $confirmation;
        $attribute = array(
            'name' => '',
            'class' => 'form-horizontal',
            'id' => ''
        );

        echo form_open_multipart('pc/editPc?id=' . $this->input->get('id'), $attribute);
        ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Edit Profile</h1>
                </div>
            </div>

            <div class="panel-body no-padding">
                <div class="no-title">&nbsp;</div>

                <aside class="col-md-3">
                    <figure class="profile-pic">
                        <?php 
                        $img = ($result[0]->image != null) ? site_url($result[0]->image) : site_url("private/images/default.jpg");
                        ?>
                        <img src="<?php echo $img; ?>" alt="Photo not found!" class="img-responsive" id="profile-pic">
                    </figure>

                    <div class="profile-upload">
                        <label class="btn btn-primary" style="display: block;" for="image"><i class="fa fa-cloud-upload"></i> Upload</label>
                        <input type="file" name="attachFile" id="image" style="display: none;">
                    </div><br/>
                </aside>

                <div class="col-md-9">
                    <!-- pre><?php print_r($result); ?></pre -->

                    <div class="form-group">
                        <label class="col-md-3 control-label">Full Name </label>
                        <div class="col-md-7">
                            <input type="text" name="fullname" class="form-control" value="<?php echo $result[0]->fullName; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Mobile </label>
                        <div class="col-md-7">
                            <input type="number" name="mobile" class="form-control" value="<?php echo $result[0]->mobile; ?>">
                        </div>
                    </div> 

                    <div class="form-group">
                        <label class="col-md-3 control-label">Commission(%)</label>
                        <div class="col-md-7">
                            <input type="number" name="commission" class="form-control" value="<?php echo $result[0]->commission; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Address </label>
                        <div class="col-md-7">
                            <textarea name="address" class="form-control" cols="30" rows="4"><?php echo $result[0]->address; ?></textarea>
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


    <script type="text/javascript">
        $(document).ready(function() {
            var reader  = new FileReader();
            $("#image").change(function(ev) {
                var file = ev.target.files[0];
                if(file) {
                    reader.readAsDataURL(file);
                }

                $(reader).load(function() {
                    var imgURL=reader.result;
                    $("#profile-pic").attr({
                        src: imgURL
                    });
                });
            });
        });
    </script>
</div>

