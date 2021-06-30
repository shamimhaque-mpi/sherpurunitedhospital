<style>
    @media print{
        aside, nav, .none, .panel-heading, .panel-footer{
            display: none !important;
        }
        .panel{
            border: 1px solid transparent;
            left: 0px;
            position: absolute;
            top: 0px;
            width: 100%;
        }
        .hide{
            display: block !important;
        }
        .block-hide{
            display: none;
        }
    }
</style>
<div class="container-fluid block-hide">
    <div class="row">

    <!-- horizontal form -->
    <?php
    $attribute = array(
        'name' => '',
        'class' => 'form-horizontal',
        'id' => ''
    );
    echo form_open('', $attribute);
    ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Text To Speech</h1>
                </div>
            </div>

            <div class="panel-body no-padding">
                <div class="no-title">&nbsp;</div>

                <!-- left side -->
                <div class="col-md-9">                                

                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Text </label>
                        <div class="col-md-7">
                            <textarea name="" id="text" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-7">
                            <div class="btn-group">
                                <a class="btn btn-primary" id="play"><i class="fa fa-play" aria-hidden="true"></i></a>
                                <!--a class="btn btn-success" id="pause"><i class="fa fa-pause" aria-hidden="true"></i></a-->
                            </div>
                        </div>
                    </div>
                        
                </div>

                <!-- left side -->
                <div class="col-md-3">                                

                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Voice</label>
                        <div class="col-md-7">
                            <select name="" id="noise" class="form-control">
                                <option value="US English Male">Male</option>
                                <option value="US English Female">Female</option>
                            </select>
                        </div>
                    </div>                  
                        
                </div>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>

        <?php echo form_close(); ?>
    </div>
</div>
<script src="<?php echo site_url("private/js/responsivevoice.js"); ?>" ></script>
<script>
    $(document).ready(function(){
        
        $("#play").on('click', function() {
            var text=$("#text").val();
            responsiveVoice.setDefaultVoice("US English Female");
            responsiveVoice.speak(text, $("#noise").val(), {pitch: 1,rate: 1});
        });

        $("#pause").on('click', function() {
            responsiveVoice.pause();
        });
    });
</script>