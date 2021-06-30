<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" rel="stylesheet" />
<style type="text/css">
    .danger{background: #c9302c; color: #fff;}
    .no-right-padding {padding-right: 0;}
    @media screen and (max-width: 768px){
        .no-right-padding {padding-left: 0;margin: 5px 0;}
        .mg-top {margin: 5px 0;}
    }
</style>
<div class="container-fluid" ng-controller="editPrescriptionCtrl">
    <div class="row">
        <?php echo $confirmation; ?>
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Prescription Details</h1>
                </div>
            </div>
            <div class="panel-body">
                <!-- horizontal form -->
                <?php $attr=array("class"=>"form-horizontal"); echo form_open('', $attr); ?>
                <div class="form-group">
                    <label class="col-md-2 control-label">ID</label>
                    <div class="col-md-5">
                        <input type="text" name="prescription_id" value="<?php echo $result[0]->prescription_id; ?>" class="form-control"  readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Date</label>
                    <div class="input-group date col-md-5" id="datetimepicker1">
                        <input type="text" name="date" value="<?php echo $result[0]->date; ?>" class="form-control" >
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Symptoms</label>
                    <div class="col-md-5">
                        <textarea name="symptoms" class="form-control" rows="5"><?php echo $result[0]->symptoms; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Diagnosis</label>
                    <div class="col-md-5">
                        <textarea name="diagnosis" class="form-control" rows="5"><?php echo $result[0]->diagnosis; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Select Patient </label>
                    <div class="col-md-5">
                        <select name="patient_name" class="form-control selectpicker" data-live-search="true" >
                            <?php foreach ($allPatient as $row) {?>
                            <option value="<?php echo $row->name; ?>" <?php if($row->name==$result[0]->patient_name) echo "selected"; ?> ><?php echo ucwords($row->name." | ".$row->mobile); ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <!-- ========== Medicine Add Start ========== -->
                <div class="form-group">
                    <label class="col-md-2 control-label" ng-init='id=<?php echo $result[0]->id; ?>'> Medicine </label>
                </div>
                <div class="form-group">
                    <div ng-repeat="row in allMedicine.medicine" style="overflow:auto; margin-bottom: 15px !important;"> <!-- ng-repeat="row in allMedicine.medicine" -->
                        <div class="col-md-2" style="padding-right: 5px;">
                            <input list="tablet" name="medicine_type[]" ng-model="row.medicine_type" placeholder="Type" class="form-control">
                            <datalist id="tablet">
                            <?php foreach (config_item('type') as $row) {?>
                            <option value="<?php echo $row; ?>">
                                <?php } ?>
                                </datalist>
                        </div>
                        <div class="col-md-2">
                            <input list="medicine" ng-model="row.medicine" name="medicine[]" placeholder="Medicine" class="form-control">
                            <datalist id="medicine">
                                <?php foreach ($allMedicine as $row) {?>
                                <option value="<?php echo $row->product_name; ?>">
                                <?php } ?>
                            </datalist>
                        </div>
                        <div class="col-md-2" style="padding-right: 5px;">
                            <input list="duration" name="duration[]" ng-model="row.duration" placeholder="Duration" class="form-control">
                            <datalist id="duration">
                                <?php foreach (config_item('duration') as $row) {?>
                                <option value="<?php echo $row; ?>">
                                <?php } ?>
                            </datalist>
                        </div>
                        <div class="col-md-2" style="padding-right: 5px;">
                            <input list="rules" name="rules[]" placeholder="Rules" ng-model="row.rules" class="form-control">
                            <datalist id="rules">
                                <?php foreach (config_item('rules') as $row) {?>
                                <option value="<?php echo $row; ?>">
                                <?php } ?>
                            </datalist>
                        </div>
                        <div class="col-md-2" style="padding-right: 5px;">
                            <input list="note" name="medicine_note[]" ng-model="row.note" placeholder="Note" class="form-control" ng-keyup="addRowMedicineByTabFn($event, 'medicine')">
                            <datalist id="note">
                                <?php foreach (config_item('notes') as $row) {?>
                                <option value="<?php echo $row; ?>">
                                <?php } ?>
                            </datalist>
                        </div>
                        <div class="col-md-2">
                            <div class="btn-group">
                                <a style="margin-right: 5px;" ng-click="removeRow($index, 'medicine');" class="btn danger" ng-class="{'disabled': allMedicine.medicineLen == 1}"><i class="fa fa-times"></i></a>
                                <a ng-click="addRowMedicineByClickFn('medicine');" class="btn btn-info"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============= Medicine Add End =================== -->
                                    
                <!-- ============== Test Add Start ================== -->
                <div ng-repeat="row in allMedicine.test" style="margin: 5px 0;"> <!-- ng-repeat="row in allMedicine.test" -->
                    <div class="form-group">
                        <label class="col-md-2 control-label">Test</label>
                        <div class="col-md-3">
                            <input ng-model="row.test" name="test[]" placeholder="select Test" class="form-control">
                        </div>
                        
                        <div class="col-md-3">
                            <inpu type="text" ng-model="row.note" class="form-control" name="test_note[]" placeholder="Note" ng-keyup="addRowMedicineByTabFn($event, 'test')">
                        </div>
                        
                        <div class="col-md-2">
                            <div class="btn-group">
                                <a style="margin-right: 5px;" ng-click="removeRow($index, 'test');" class="btn danger" ng-class="{'disabled': allMedicine.testLen == 1}"><i class="fa fa-times"></i></a>
                                <a  ng-click="addRowMedicineByClickFn('test');" class="fcbtn btn btn-info"><i class="fa fa-plus"></i></a>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <!-- ========== Test End =========== -->
                
                <div class="col-md-7">
                    <div class="btn-group pull-right" style="margin-top: 15px;">
                        <input type="submit" name="update" value="Update" class="btn btn-success">
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
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
<script>
    $(function() {
        $('.selectpicker').selectpicker();
    });
</script>