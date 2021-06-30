
<style type="text/css">
    .btn-group { width: 100%!important ; }
    .multiselect { width: 100%!important; }
</style>

<div class="container-fluid">
    <div class="row">

        <!-- horizontal form -->
        <?php
        echo $confirmation;
        $attribute = array(
            'name'  => '',
            'class' => 'form-horizontal',
            'id'    => ''
        );
        echo form_open_multipart('', $attribute);
        ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Add New Doctor</h1>
                </div>
            </div>

            <div class="panel-body no-padding">
                <div class="no-title">&nbsp;</div>

                <!-- left side -->
                <aside class="col-md-3">
                    <figure class="profile-pic">
                        <img id="pf_img" src="<?php echo site_url("private/images/default.jpg"); ?>" alt="Photo not found!" class="img-responsive">
                    </figure>

                    <div class="profile-upload">  
                        <label class="btn btn-primary" style="display: block;" for="image"><i class="fa fa-cloud-upload"></i> Upload</label>
                        <input type="file" id="image" name="attachFile"  style="display: none;">
                    </div><br/>
                </aside>

                <div class="col-md-9">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Full Name <span class="req">*</span> </label>
                        <div class="col-md-7">
                            <input type="text" name="fullName" class="form-control" required>
                        </div>
                    </div>


                    <div class="form-group">
                       <label class="col-md-3 control-label"> Designation <span class="req">*</span> </label>

                       <div class="col-md-7">
                            <input type="text" name="designation" class ="form-control" required>
                            <!--select id="item" name="designation" class="selectpicker form-control" data-show-subtext="true" data-live-search="true">
                                <option selected disabled> -- Select -- </option>
                            <?php foreach (config_item('doctor_desigation') as $value) { ?>
                                <option value="<?php echo $value; ?>"><?php echo filter($value); ?></option>
                            <?php } ?>
                            </select-->
                       </div>
                       
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Degree</label>
                        <div class="col-md-7">
                            <input type="text" name="degree" class="form-control" >
                        </div>
                    </div>

                    <div class="form-group">
                       <label class="col-md-3 control-label"> Specialised In  <stong class="text-danger">*</stong> </label>
                    
                       <div class="col-md-7">
                            <input type="text" name="specialised" class="form-control" required>
                            <!--select id="item2" name="specialised" class="selectpicker form-control" data-show-subtext="true" data-live-search="true">
                                <option selected disabled> -- Select -- </option>
                            <?php foreach (config_item('specialised_in') as $value) { ?>
                                <option value="<?php echo $value; ?>"><?php echo filter($value); ?></option>
                            <?php } ?>
                            </select-->
                       </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Hospital Name </label>
                        <div class="col-md-7">
                            <input type="text" name="hospital" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Room No </label>
                        <div class="col-md-7">
                            <input type="number" name="room_no" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Mobile </label>
                        <div class="col-md-7">
                            <input type="number" name="mobile" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Phone</label>
                        <div class="col-md-7">
                            <input type="number" name="phone" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Email </label>
                        <div class="col-md-7">
                            <input type="email" name="email" class="form-control">
                        </div>
                    </div>                                    

                    <div class="form-group">
                        <label class="col-md-3 control-label">Fee ( TK )</label>
                        <div class="col-md-7">
                            <input type="number" name="fee" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Commission (%)</label>
                        <div class="col-md-7">
                            <input type="number" name="commission" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Address </label>
                        <div class="col-md-7">
                            <textarea name="address" class="form-control" cols="30" rows="4" ></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-7">
                            <div class="btn-group pull-right">
                                <input class="btn btn-primary" type="submit" name="add" value="Save">
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




<script type="text/javascript">
    $(document).ready(function() {
        
        var reader  = new FileReader();
        $("#image").change(function(ev) {
            var file=ev.target.files[0];
            if (file) {
                reader.readAsDataURL(file);
            }
            $(reader).load(function() {
                var imgURL=reader.result;
                $("#pf_img").attr({
                    src: imgURL
                });
            });
        });
    });
</script>


 
<script>
        // $(document).ready(function(){
            // $('#item').multiselect({
            //     nonSelectedText: 'Select',
            //     enableFiltering: true,
            //     enableCaseInsensitiveFiltering: true,
            //     buttonWidth:'400px'
            // });
            // $('#item_form').on('submit', function(event){
            //     event.preventDefault();
            //     var form_data = $(this).serialize();
            //     $.ajax({
            //         url:"insert.php",
            //         method:"POST",
            //         data:form_data,
            //         success:function(data)
            //         {
            //             $('#item option:selected').each(function(){
            //             $(this).prop('selected', false);
            //             });
            //             $('#item').multiselect('refresh');
            //             alert(data);
            //         }
            //     });
            // });
        // });


        // $(document).ready(function(){
            // $('#item2').multiselect({
            //     nonSelectedText: 'Select',
            //     enableFiltering: true,
            //     enableCaseInsensitiveFiltering: true,
            //     buttonWidth:'400px'
            // });
            // $('#item2_form').on('submit', function(event){
            //     event.preventDefault();
            //     var form_data = $(this).serialize();
            //     $.ajax({
            //         url:"insert.php",
            //         method:"POST",
            //         data:form_data,
            //         success:function(data)
            //         {
            //             $('#item2 option:selected').each(function(){
            //             $(this).prop('selected', false);
            //             });
            //             $('#item2').multiselect('refresh');
            //             alert(data);
            //         }
            //     });
            // });
        // });
</script>