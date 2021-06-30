<style type="text/css">
    .mb15{
        margin-bottom: 15px;
    }

    .comisstion-padding{
        padding-left: 0px;
    }
</style>


<div class="container-fluid" ng-controller="PatientBasicCtrl">
    <div class="row">
        <?php echo $this->session->flashdata('confirmation'); ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>New Patient</h1>
                </div>
            </div>

            <div class="panel-body">
                <?php 
                $attr = array('class' => 'form-horizontal');
                echo form_open('patient/basicInfo/add', $attr); 
                ?>

                <div class="row">
                    <div class="col-md-offset-1 col-md-5 mb15">
                        <label>Patient ID <span class="req">*</span></label>
                        <input type="text" name="patient_id" value="<?php echo $pid; ?>" class="form-control" tabindex="1" readonly>
                    </div>

                    <div class="col-md-5 mb15">
                        <label>Date  <span class="req">*</span></label>
                        <div class="input-group date" id="datetimepicker">
                            <input type="text" name="date" class="form-control" value="<?php echo date("Y-m-d"); ?>" placeholder="YYYY-MM-DD" tabindex="2">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-offset-1 col-md-5 mb15">
                        <label>Patient Name </label>
                        <input type="text" name="patient_name" class="form-control" placeholder="Patient Name" tabindex="3">
                    </div>

                    <div class="col-md-5 mb15">
                        <label>Gender </label>
                        <div class="checkbox" tabindex="6">
                            <label for="male" style="padding-left: 0;">
                                <input type="radio" checked name="gender" id="male" value="Male"> 
                                Male
                            </label>

                            <label for="female">
                                <input type="radio" name="gender" id="female" value="Female"> 
                                Female
                            </label>
                        </div>
                    </div>                                      
                </div>

                <div class="row">
                    <div class="col-md-offset-1 col-md-5 mb15">
                        <label>Age </label>
                        <input type="text" name="age" class="form-control" placeholder="Age">
                    </div>

                    <div class="col-md-5 mb15">
                        <label for="father" class="radio-inline" style="margin-left: 0;">
                            <input type="radio" name="relation" id="father" value="Father" checked> Father's Name
                        </label>

                        <label for="husband" class="radio-inline">
                          <input type="radio" name="relation" id="husband" value="Husband"> Husband's  
                        </label>

                        <input type="text" name="person" class="form-control"  placeholder="Name" tabindex="5">
                    </div>

                    <div class="col-md-offset-1 col-md-5 mb15">
                        <label>Contact Number </label>
                        <input type="text" name="contact_number" class="form-control" placeholder="Contact Number" tabindex="8">
                    </div>

                    <div class="col-md-5 mb15">               
                       <div>
                           <label>Local Guardian </label>
                           <input type="text" name="local_guardian" class="form-control" placeholder="Local Guardian" tabindex="11">
                       </div>
                    </div>
                </div> 

                <div class="row">
                    <div class="col-md-offset-1 col-md-10 mb15">
                        <label>Address </label>
                        <textarea name="address" placeholder="Address" class="form-control" rows="4" style="height: 108px;" tabindex="9"></textarea>
                    </div>
                </div>
                <hr>

                <div class="row">
                    <div class="col-md-offset-1 col-md-3 mb15">
                        <label>Referred Doctor </label>                       
                        <select 
                            name="referred" 
                            ng-model="person.doctors.id" 
                            ng-change="getPersonDetailsFn('doctors')" 
                            class="selectpicker form-control" data-show-subtext="true" data-live-search="true">

                            <?php foreach ($doctors as $key => $value) { ?>
                            <option value="<?php echo $value->id; ?>"><?php echo $value->fullName; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-md-2 mb15"> 
                        <label>&nbsp;</label>           
                        <input type="hidden" name="person[]" ng-value="person.doctors.name">
                        <div class="input-group">
                           <input type="number" name="amount[referred]" ng-model="person.doctors.commission" placeholder="Commission" min="0" class="form-control" step="any" readonly>
                          <div class="input-group-addon">%</div>
                        </div>
                    </div>

                    <div class="col-md-3 mb15">
                        <label>Reference</label>  

                        <select
                            name="details[marketer]" 
                            ng-model="person.marketer.id" 
                            ng-change="getPersonDetailsFn('marketer')" 
                            class="selectpicker form-control" data-show-subtext="true" data-live-search="true">

                            <?php foreach ($marketers as $key => $value) { ?>
                            <option value="<?php echo $value->id; ?>"><?php echo $value->name; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-md-2 mb15"> 
                        <label>&nbsp;</label>   

                        <input type="hidden" name="person[]" ng-value="person.marketer.name">        
                        <div class="input-group">
                            <input type="number" name="amount[marketer]" ng-model="person.marketer.commission" placeholder="Commission" min="0" step="any" class="form-control" readonly>
                            <div class="input-group-addon">%</div>
                        </div>
                    </div>

                    <!-- <div class="col-md-3 mb15">
                        <label>PC Doctor</label>        

                        <select
                            name="details[pc]" 
                            ng-model="person.pc.id" 
                            ng-change="getPersonDetailsFn('pc')" 
                            class="selectpicker form-control" data-show-subtext="true" data-live-search="true">

                            <?php foreach ($allpc as $key => $value) { ?>
                            <option value="<?php echo $value->id; ?>"><?php echo $value->fullName; ?></option>
                            <?php } ?>
                        </select>
                    </div> -->

                    <!-- <div class="col-md-2 mb15"> 
                        <label>&nbsp;</label>   
                        <input type="hidden" name="person[]" ng-value="person.pc.name">
                        <div class="input-group">
                            <input type="number" name="amount[pc]" ng-model="person.pc.commission" placeholder="Commission" min="0" step="any" class="form-control" readonly>
                            <div class="input-group-addon">%</div>
                        </div>                        
                    </div> -->
                </div>             
              
                <!-- <div class="row">
                    
                </div> -->

                <hr>

                <div class="row">
                    <div class="col-md-12">
                        <div class="btn-group col-md-offset-6">
                            <input class="btn btn-primary" type="submit" name="button" value="Admission" tabindex="16">

                            <input class="btn btn-primary" type="submit" name="button" value="Consultancy" tabindex="17">

                            <input class="btn btn-primary" type="submit" name="button" value="Emergency" tabindex="18">

                            <input class="btn btn-primary" type="submit" name="button" value="Diagnosis" tabindex="19">

                            <input class="btn btn-danger" type="reset" value="Clear" tabindex="20">
                        </div>
                    </div>
                </div>
                
                <?php echo form_close(); ?>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

<script>
     // Dynamic Husband and father Name Start here
    $(document).ready(function(){

       husband_fatherName($('input[name="gender"]').val());

        $('input[name="gender"]').on('click', function(event) {
            
            var val = $(this).val();            
            husband_fatherName(val);
        });


        function husband_fatherName(val){
            if(val.match("Male")){
                $("#husband").hide();
                $('label[for="husband"]').hide();
            }else{
                $("#husband").show();
                $('label[for="husband"]').show();
            }
        }
    });
    // Dynamic Husband and father Name End here

</script>


