<div class="container-fluid">
    <div class="row">
        <?php echo $confirmation; ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Add New RF/PC</h1>
                </div>
            </div>

            <div class="panel-body">
                <?php 
                $attr = array('class' => 'form-horizontal');
                echo form_open_multipart('', $attr);
                ?>

                <div class="row">
                    <!-- left side -->
                    <aside class="col-md-3">   
                        <figure class="profile-pic">
                            <img id="pf_img" src="<?php echo site_url("private/images/default.jpg"); ?>" alt="Photo not found!" class="img-responsive">
                        </figure>

                        <div class="profile-upload">
                            <label class="btn btn-primary" style="display: block;" for="image"><i class="fa fa-cloud-upload"></i> Upload</label>
                            <input type="file" name="attachFile" id="image" style="display: none;">
                        </div><br/>
                    </aside>

                    <div class="col-md-9">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Full Name </label>
                            <div class="col-md-7">
                                <input type="text" name="name" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Mobile </label>
                            <div class="col-md-7">
                                <input type="text" name="mobile" class="form-control">
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="col-md-3 control-label">Commission(%)</label>
                            <div class="col-md-7">
                                <input type="number" name="commission" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Address </label>
                            <div class="col-md-7">
                                <textarea name="address" class="form-control" cols="30" rows="4"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-7">
                                <div class="btn-group pull-right">
                                    <input class="btn btn-primary" type="submit" name="market_add" value="Save">
                                    <input class="btn btn-danger" type="reset" value="Clear">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>

    </div>
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
                $("#pf_img").attr({
                    src: imgURL
                });
            });
        });
    });
</script>