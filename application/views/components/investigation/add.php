<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" />
<style type="text/css">
    .btn-group { width: 100%!important ; }
    .multiselect { width: 100%!important; }
</style>

<div class="container-fluid" ng-controller="AddNewInvestigationCtrl">
    <div class="row">
        <?php echo $this->session->flashdata('confirmation');; ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>New Investigation</h1>
                </div>
            </div>

            <div class="panel-body">
                <?php 
                $attr = array('class' => 'form-horizontal');
                echo form_open('', $attr);
                ?>                           

                <div class="form-group">
                    <label class="col-md-2 control-label"> Group <span class="req">*</span> </label>

                    <div class="col-md-5">
                        <select 
                        id="item" name="group" ng-model="group_name" ng-change="getAllTestFn()" class="selectpicker form-control" data-show-subtext="true" data-live-search="true">
                            <option value="" selected disabled> -- Select -- </option>
                        <?php foreach ($group_name as $group) { ?>
                            <option value="<?php echo $group->group_name; ?>"><?php echo filter($group->group_name); ?></option>
                        <?php } ?>
                        </select>
                    </div>
                   
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label"> Test <span class="req">*</span> </label>

                    <div class="col-md-5">
                        <select name="test_name" class="form-control" required>
                            <option value="" selected disabled> -- Select -- </option>
                            <option value="{{ test.test_name }}" ng-repeat="test in allTestName">{{ test.test_name | textBeautify}}</option>
                        </select>
                    </div>
                   
                </div>


                <div class="form-group">
                    <label class="col-md-2 control-label">Test Fee </label>
                    <div class="col-md-5">
                        <input type="number" name="test_fee" class="form-control">
                    </div>
                </div>
				
				 <div class="form-group">
                    <label class="col-md-2 control-label">Cost</label>
                    <div class="col-md-5">
                        <input type="number" name="cost" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-md-2 control-label">Room </label>
                    <div class="col-md-5">
                        <input type="text" name="room" class="form-control">
                    </div>
                </div>

                <!--<div class="form-group">-->
                <!--    <label for="" class="col-md-2 control-label">Unit </label>-->
                <!--    <div class="col-md-5">-->
                <!--        <input type="text" name="unit" class="form-control">-->
                <!--    </div>-->
                <!--</div>-->

                <!--<div class="form-group">-->
                <!--    <label for="" class="col-md-2 control-label">Reference Value </label>-->
                <!--    <div class="col-md-5">-->
                <!--        <input type="text" name="reference_value" class="form-control">-->
                <!--    </div>-->
                <!--</div>-->

                <div class="col-md-7">
                    <div class="pull-right">
                        <input class="btn btn-primary" type="submit" name="create" value="Save">
                        <input class="btn btn-danger" type="reset" value="Clear">
                    </div>
                </div>

                <?php echo form_close(); ?>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

<!-- script type="text/javascript">
    $(document).ready(function(){
        $(document).on("change", "#group", function(){
            var group=$(this).val();

            $.ajax({
                type: "POST",
                url: "<?php echo site_url('investigation/add/ajax_test'); ?>",
                data: {group:group}
            }).success(function(response){
                if (response!="Error"){
                    var data = JSON.parse(response);
                    $('select[name="test_name"]').html("");
                    $.each(data,function(index, el) {
                        $('select[name="test_name"]').append(el);
                    });
                } else {
                    console.log(response);
                }
            });
        });
    });
</script -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
