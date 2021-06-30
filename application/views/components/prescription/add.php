<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" rel="stylesheet" />
<style type="text/css">
.danger{
  background: #c9302c;
  color: #fff;
}
</style>
<div class="container-fluid" ng-controller="addPrescriptionCtrl">
    <div class="row">
        <?php echo $confirmation; ?>
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                  <h1>Add Prescription</h1>
                </div>
            </div>
            <div class="panel-body">
            <!-- horizontal form -->
            <?php $attr=array("class"=>"form-horizontal"); echo form_open_multipart('', $attr); ?>
            
                <div class="form-group">
                    <label class="col-md-2 control-label">ID<span class="req">*</span></label>
                    <div class="col-md-5">
                        <input type="text" name="prescription_id" value="<?php //echo generateUniqueId("prescription",4); ?>" class="form-control"  readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Date<span class="req">*</span></label>
                    <div class="input-group date col-md-5" id="datetimepicker1">
                        <input type="text" name="date" value="<?php echo date('Y-m-d'); ?>" class="form-control" >
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Symptoms</label>
                    <div class="col-md-5">
                        <textarea name="symptoms" class="form-control" rows="5"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Diagnosis</label>
                    <div class="col-md-5">
                        <textarea name="diagnosis" class="form-control" rows="5"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Select Patient <span class="req">*</span></label>
                    <div class="col-md-5">
                        <select name="patient_name" class="form-control selectpicker" data-live-search="true" required>
                            <option value="" selected disabled>Select Patient</option>
                            <?php foreach ($allPatient as $row) {?>
                            <option value="<?php echo $row->name; ?>"><?php echo ucwords($row->name." | ".$row->mobile); ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-2 control-label">Medicine<span class="req">*</span></label>
                </div>
                
                <div class="form-group">
                    <div style="padding-bottom: 10px;" ng-repeat="row in allMedicine"> <!-- ng-repeat="row in allMedicine" -->
                        <div class="col-md-2" style="padding-right: 5px;">
                            <input list="tablet" name="medicine_type[]" placeholder="Type" class="form-control">
                            <datalist id="tablet">
                                <?php foreach (config_item('type') as $row) {?>
                                <option value="<?php echo $row; ?>">
                                <?php } ?>
                            </datalist>
                        </div>
                        
                        <div class="col-md-2" style="padding-right: 5px;">
                            <input list="medicine" name="medicine[]" placeholder="Medicine" class="form-control">
                            <datalist id="medicine">
                                <?php foreach ($allMedicine as $row) {?>
                                <option value="<?php echo $row->product_name; ?>">
                                <?php } ?>
                            </datalist>
                        </div>
                        
                        <div class="col-md-2" style="padding-right: 5px;">
                            <input list="duration" name="duration[]" placeholder="Duration" class="form-control">
                            <datalist id="duration">
                                <?php foreach (config_item('duration') as $row) {?>
                                <option value="<?php echo $row; ?>">
                                <?php } ?>
                            </datalist>
                        </div>
                        
                        <div class="col-md-2" style="padding-right: 5px;">
                            <input list="rules" name="rules[]" placeholder="Rules" class="form-control">
                            <datalist id="rules">
                                <?php foreach (config_item('rules') as $row) {?>
                                <option value="<?php echo $row; ?>">
                                <?php } ?>
                            </datalist>
                        </div>
                        
                        <div class="col-md-2" style="padding-right: 5px;">
                            <input list="note" name="medicine_note[]" placeholder="Note" class="form-control" ng-keyup="addRowMedicineByTabFn($event, 'medicine')">
                            <datalist id="note">
                                <?php foreach (config_item('notes') as $row) {?>
                                <option value="<?php echo $row; ?>">
                                <?php } ?>
                            </datalist>
                        </div>
                        <div class="col-md-2">
                            <div class="btn-group">
                                <a style="margin-right: 5px;" ng-show="$index != 0" ng-click="removeRowMedicineFn($index);" class="fcbtn btn danger btn-outline btn-1d remove"><i class="fa fa-times"></i></a>
                                <a ng-click="addRowMedicineByClickFn('medicine');" class="fcbtn btn btn-info btn-outline btn-1d"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
                <div ng-repeat="row in allTest> <!-- ng-repeat="row in allTest" -->
                    <div class="form-group">
                        <label class="col-md-2 control-label">Test</label>
                        <div class="col-md-2" style="padding-right: 5px;">
                            <input list="test" name="test[]" placeholder="Test" class="form-control">
                            <datalist id="test">
                                <?php foreach ($allTest as $row) {?>
                                <option value="<?php echo $row->test_name; ?>"><?php echo ucwords($row->test_name); ?></option>
                                <?php } ?>
                            </datalist>
                        </div>
                        <div class="col-md-2" style="padding-left: 5px;">
                            <input type="text" class="form-control" name="test_note[]" placeholder="Note" ng-keyup="addRowMedicineByTabFn($event, 'test')">
                        </div>
                        
                        <div class="col-md-3">
                            <div class="btn-group"> <!-- style="position: absolute; left: 100%; margin-top: -44px;" -->
                                <a style="margin-right: 5px;" ng-show="$index != 0" ng-click="removeRowTestFn($index);" class="fcbtn btn danger btn-outline btn-1d remove"><i class="fa fa-times"></i></a>
                                <a ng-click="addRowMedicineByClickFn('test');"  class="fcbtn btn btn-info btn-outline btn-1d"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
              <!-- ========== Test End =========== -->
        
                <div class="col-md-7" style="margin-top: 15px;">
                    <div class="btn-group pull-right">
                        <input type="submit" name="add_prescription" value="Save" class="btn btn-primary">
                        <input style="margin-left: 10px;" type="reset" name="reset" value="Reset" class="btn btn-danger">
                    </div>
                </div>
              
                <?php echo form_close(); ?>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>
<script type="text/javascript">

//================ Add Medicine ================
$(document).ready(function(){
//Add Element Start here
$(document).on("click","#add",function(){
  var elem = $("#draft").html();
  $("#med_container").append(elem);
});
//Add Element End here
//Remove Element Start here
$(document).on('click','.remove', function(event) {
  event.preventDefault();
  $(this).parents(".element").remove();
});
//Remove Element End here
});
//=============== Add Test ====================
$(document).ready(function(){
  //Add Element Start here
  $(document).on("click","#test_add",function(){
    var elem = $("#test_draft").html();
    $("#test_container").append(elem);
  });
  //Add Element End here
  //Remove Element Start here
  $(document).on('click','.test_remove', function(event) {
    event.preventDefault();
    $(this).parents(".test_element").remove();
  });
  //Remove Element End here
});
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
<script>
  $(function() {
    $('.selectpicker').selectpicker();
  });
</script>