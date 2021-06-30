<style>
.agrement-pic{
    height: 300px;
}
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
    }
</style>

<div class="container-fluid">
    <div class="row" ng-controller="agreementCtrl">

        <!-- horizontal form -->
        <?php
        //echo $confirmation;
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
                    <h1>Agreement</h1>
                </div>
            </div>

            <div class="panel-body no-padding">
                <div class="no-title">&nbsp;</div>

                    <div class="form-group">
                        <label class="col-md-2 control-label pull-left">
                            Patient ID  
                        </label>

                        <div class="col-md-4 clearfix">
                            <input type="text" name="patient_id" ng-model="patient_id" class="form-control" >
                        </div>
                    </div>
                    <hr>
            </div>

           <div class="panel-body no-padding">
                <div class="no-title">&nbsp;</div>

                <!-- left side -->
                <aside class="col-md-4" ng-cloak>
                    <figure class="profile-pic">
                        <a href="<?php echo site_url('agreement/agreement/agreemet_paper?pid={{patient_id}}'); ?>">
                            <img class="agrement-pic" id="pf_img" src="<?php echo site_url("private/images/agg_paper.png"); ?>" alt="Photo not found!" class="img-responsive">
                        </a>
                    </figure>
                    <div class="profile-upload">  
                        <label class="btn btn-primary" style="display: block;" for="image">অঙ্গীকার পত্র</label>
                       
                    </div><br/>
                </aside>

                <div class="col-md-4">
                    <figure class="profile-pic">
                        <a href="<?php echo site_url('agreement/agreement/agreemet_paperb?pid={{patient_id}}') ?> ">
                            <img class="agrement-pic" id="pf_img" src="<?php echo site_url("private/images/agg_paperb.png"); ?>" alt="Photo not found!" class="img-responsive">
                        </a>
                    </figure>
                    <div class="profile-upload">  
                        <label class="btn btn-primary" style="display: block;" for="image"> অঙ্গীকার নামা</label>
                       
                    </div>
                </div>              
            </div>

        <?php echo form_close(); ?>
    </div>
</div>




