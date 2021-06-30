<style type="text/css">
    .mb15{
        margin-bottom: 15px;
    }
    .bedbox{
        padding: 15px 0  0 15px;
        border: 1px solid #ddd;
    }
    .bedbox ul{
        list-style-type: none;
        overflow: auto;
        width: 100%;
    }
    .bedbox ul li{
        border-radius: 15px;
        border: 1px solid #ddd;
        box-shadow: 0 1px 2px #ddd;
        float: left;
        margin: 0 15px 15px 0;       
        display: inline-block;
    }
    .bedbox ul li label{
        display: block;
        margin-bottom: 0;
        line-height: 35px;
        padding: 0 10px;
        position: relative;
        color: #fff;
    }
    .bedbox ul li label input[type="checkbox"]{
        position: absolute;
        top: 0;
        left: 0;
        opacity: 0;
        width: 100%;
        height: 100%;
        margin-top: 0;
        cursor: pointer;
    }
    .show{display: block !important;}
</style>
<div class="container-fluid">
    <div class="row">

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Edit</h1>
                </div>
            </div>

            <div class="panel-body">

                <?php $attr = array('class' => 'form-horizontal');
                echo form_open('patient/add/update/'.$info[0]->id, $attr); ?>

                <div class="row">
                    <div class="col-md-offset-1 col-md-5 mb15">
                        <label>Patient ID </label>
                        <input type="text" name="patient_id" value="<?php echo $info[0]->patient_id; ?>" class="form-control" value="" readonly>
                    </div>

                    <div class="col-md-5 mb15">
                        <label>Date & Time </label>
                        <div class="input-group date" id="datetimepicker">
                        <input type="text" name="date" class="form-control" value="<?php echo $info[0]->date; ?>">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-offset-1 col-md-5 mb15">
                        <label>Patient Name </label>
                        <input type="text" name="patient_name" class="form-control" value="<?php echo $info[0]->name; ?>">
                    </div>

                     <div class="col-md-2">
                        <label>Gender </label>
                        <div class="checkbox">
                            <label for="male" style="padding-left: 0;">
                                <input type="radio" checked name="gender" id="male" value="Male" <?php if($info[0]->gender=="Male"){ echo "checked"; } ?> > 
                                Male
                            </label>

                            <label for="female">
                                <input type="radio" name="gender" id="female" value="Female" <?php if($info[0]->gender=="Female"){ echo "checked"; } ?>> 
                                Female
                            </label>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label>Age </label>
                        <input type="text" name="age" class="form-control" value="<?php echo $info[0]->age; ?>">
                    </div>                    
                </div>

                <div class="row">
                    <div class="col-md-offset-1 col-md-5 mb15">
                        <?php $f_h_data=json_decode($info[0]->father_husband,true); ?>
                        <label><input type="radio" name="person" <?php if($f_h_data["person"]=="Husband"){echo "checked";} ?> value="Husband" id="husband">  <label for="husband">Husband <i>or</i></label> <input type="radio" <?php if($f_h_data["person"]=="Father"){echo "checked";} ?> name="person" value="Father" id="father"> <label for="father">Fathers</label> Name </label> 
                        <input type="text" name="person_name" class="form-control" value="<?php echo $f_h_data["name"]; ?>">
                    </div>

                    <div class="col-md-5 mb15">
                        <label>Contact Number </label>
                        <input type="text" name="contact_number" class="form-control" value="<?php echo $info[0]->mobile; ?>">
                    </div>
                </div> 


                <div class="row">
                    <div class="col-md-offset-1 col-md-5 mb15">
                        <label>Address </label>
                        <textarea name="address" class="form-control" rows="4" style="height: 108px;"><?php echo $info[0]->address; ?></textarea>
                    </div>

                    <div class="col-md-5 mb15">
                       <div class="mb15">
                           <label>Admit / Emergency </label>
                           <select name="status" class="form-control">
                                <option value="" disabled>-- Choose Your Option --</option>
                                <option <?php if($info[0]->status=="Admit"){ echo "selected"; } ?> value="Admit">Admit</option>
                                <option <?php if($info[0]->status=="Emergency"){ echo "selected"; } ?> value="Emergency">Emergency</option>
                            </select>
                       </div>

                       <div>
                           <label>Local Guardian </label>
                           <input type="text" name="local_guardian" class="form-control" value="<?php echo $info[0]->guardian; ?>">
                       </div>
                    </div>
                </div>               

                 <!-- Cabin - Ward -->
                <div class="row">
                    <div class="col-md-offset-1 col-md-5 mb15">
                        <label>Cabin / Ward</label>
                        <select name="cabin_or_ward" class="form-control"  tabindex="12">
                            <option value="" disabled>&nbsp;</option>
                            <option <?php if($info[0]->cabin_ward == "Cabin") { echo "selected"; }?> value="Cabin">Cabin</option>
                            <option <?php if($info[0]->cabin_ward == "Ward") { echo "selected"; }?> value="Ward">Ward</option>
                        </select>
                    </div>
                    
                     <div id="ward_id"  class="col-md-5 mb15 <?php if($info[0]->cabin_ward == 'Ward') { echo 'show';}else{ echo 'hide'; }?>">
                        <label>Ward No </label>
                        <select  name="ward_no" class="form-control"  tabindex="14">                            
                            <?php foreach ($ward as $key => $value) {?>
                                <option <?php if($value->ward_no == $info[0]->ward_no){echo "selected";} ?> value="<?php echo $value->ward_no; ?>"><?php echo "Ward-".$value->ward_no; ?></option>
                            <?php } ?>
                        </select>
                    </div>                    
                </div> 
               

                <div id="ward_bed_id" class="row <?php if($info[0]->cabin_ward == 'Ward') { echo 'show';}else{ echo 'hide'; }?>">
                    <div class="col-md-offset-1 col-md-10 mb15">
                        <label>Bed No</label>
                        <div class="bedbox">
                            <ul id="bed_li_id">
                                <?php foreach ($allWards as $key => $value) {?>
                                      <li id="bed_li_<?php echo $value->bed_no; ?>" 
                                           style="<?php if($value->status=="Available") {?> background:green; <?php }else{ ?> background:#787878; <?php } ?>">
                                             <label for="bedcheck">
                                                <i class="fa fa-bed"></i>
                                                   Bed-<?php echo $value->bed_no; ?>
                                                   <input id="bedcheck" class="bed_<?php echo $value->bed_no; ?>" <?php if($value->status=="Available") {?>  <?php }else{ ?> disabled checked="checked" <?php } ?> type="checkbox" name="bed[]" value="<?php echo $value->bed_no; ?>" >
                                             </label>
                                        </li>
                                <?php } ?>
                            </ul>
                        </div>                        
                    </div>
                </div>        

               
                <div id="cabin_id" class="row <?php if($info[0]->cabin_ward == 'Cabin') { echo 'show'; }else{ echo 'hide'; }?>" >
                     <div id="cabin_id" class="col-md-offset-1 col-md-10 mb15">
                        <label>Cabin No</label>
                        <div class="bedbox">
                            <ul id="cabin_li_id">
                                <?php foreach ($cabin as $key => $value) {?>
                                      <li id="cabin_li_<?php echo $value->cabin_no; ?>" 
                                           style="<?php if($value->status=="Available") {?> background:green; <?php }else{ ?> background:#787878; <?php } ?>">
                                             <label for="bedcheck">
                                                <i class="fa fa-bed"></i>
                                                   Cabin-<?php echo $value->cabin_no; ?>
                                                   <input id="bedcheck" class="cabin_<?php echo $value->cabin_no; ?>" <?php if($value->status=="Available") {?>  <?php }else{ ?> disabled checked="checked" <?php } ?> type="checkbox" name="cabin[]" value="<?php echo $value->cabin_no; ?>" >
                                             </label>
                                        </li>
                                <?php } ?>
                            </ul>
                        </div>                        
                    </div>
                </div>                
                <!-- Cabin - Ward -->


              
                <div class="row">
                    <div class="col-md-offset-1 col-md-5 mb15">
                        <label>Consultant Doctor</label>
                        <input list="doctor_list" name="consultant_doctor" value="<?php echo $info[0]->consultant_doctor; ?>" class="form-control" tabindex="13">
                        <datalist id="doctor_list">
                         <?php foreach ($doctors as $key => $value) { ?>
                             <option value="<?php echo $value->fullName; ?>">
                         <?php } ?>
                        </datalist>
                    </div>

                    <div class="col-md-5 mb15">
                        <label>Patient Type </label>
                        <select name="patient_type" class="form-control" id="type_select" tabindex="16" required>
                            <option value="">-- Choose Your Option --</option>
                            <option <?php if($info[0]->patient_type == "Direct"){echo "selected"; } ?> value="Direct">Direct </option>
                            <option <?php if($info[0]->patient_type == "Referred"){echo "selected"; } ?> value="Referred">Referred </option>
                        </select>
                    </div>

                </div>
                

                <div class="row">
                    <div class="col-md-1">&nbsp;</div>
                    <div class="col-md-5 mb15" id="refered_by">
                        <label>Referred Doctor <span class="req">*</span></label>                       
                        <input list="doctor_list" name="referred_by" value="<?php echo $info[0]->reffered_by; ?>" class="form-control" tabindex="17">
                        <datalist id="doctor_list">
                         <?php foreach ($doctors as $key => $value) { ?>
                             <option <?php if($info[0]->reffered_by == $value->fullName){echo 'selected';} ?> value="<?php echo $value->fullName; ?>">
                         <?php } ?>
                        </datalist>
                    </div>

                    <div class="col-md-5 mb15" id="refered_by">
                        <label>Type</label>                       
                        <select name="type" class="form-control">
                            <option value="" ></option>
                            <option <?php if($info[0]->type == "normal") {echo "selected";} ?> value="normal">Normal</option>
                            <option <?php if($info[0]->type == "contact") {echo "selected";} ?> value="contact">Contact</option>
                        </select>
                    </div>
                </div> 

                <div class="row">
                    <div class="col-md-offset-1 col-md-5 mb15">
                        <label>PC Doctor</label>                       
                        <input list="pc_list" name="pc" value="<?php echo $info[0]->pc; ?>" class="form-control" tabindex="18">
                        <datalist id="pc_list">
                        <?php foreach ($allpc as $key => $value) { ?>
                            <option value="<?php echo $value->fullName; ?>">
                        <?php } ?>
                        </datalist>
                    </div>

                    <div class="col-md-5 mb15">
                        <label>Reference</label>                       
                        <input list="marketer_list" name="marketer" value="<?php echo $info[0]->marketer; ?>" class="form-control" tabindex="18">
                        <datalist id="marketer_list">
                        <?php foreach ($marketers as $key => $value) { ?>
                            <option value="<?php echo $value->name; ?>">
                        <?php } ?>
                        </datalist>
                    </div>
                </div> 

                <div class="row">
                    <!-- <div class="col-md-offset-1 col-md-5 mb15">
                        <label>Admission Fee</label>                       
                        <input type="text" name="admission_fee" class="form-control" tabindex="19" value="<?php echo $info[0]->fee; ?>">
                    </div> -->

                    <div class="col-md-5 mb15">
                        <label>Wadr/Cabin rent</label>                       
                        <input type="text" name="wadr_or_cabin_rent" class="form-control" tabindex="20" value="<?php echo $info[0]->rent; ?>">
                    </div>
                </div> 
               
                <div class="row">
                    <div class="col-md-11">
                        <div class="btn-group pull-right">
                            <input class="btn btn-primary" type="submit" name="upadte" value="Update">
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

        //husband_fatherName($('input[name="gender"]').val());

        $('input[name="gender"]').on('change', function(event) {
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
    // linking between two date
    $('#datetimepicker').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: false
    });

    //cabin or ward show hide
    $(document).ready(function(){     

        $('select[name="cabin_or_ward"]').on("change",function(){
            var type= $(this).val();
            if(type=="Cabin"){ 

                $('div#cabin_id').removeClass("hide");
                $('div#ward_id').addClass("hide");
                $('#ward_bed_id').addClass('hide');

                var data =[];
                var cond = {};
                $.ajax({
                    type : "POST",
                    url : '<?php echo site_url("ajax/retrieveBy/cabin");?>',
                    data : 'condition=' + JSON.stringify(cond)
                }).done(function(response){

                    var obj =$.parseJSON(response);                    
                    $.each(obj ,function(i,el){  
                        if(el.status == "Available"){
                           data.push('<li id="cabin_li_'+el.cabin_no+'" style="background:green;"><label for="bedcheck"><i class="fa fa-bed"></i> Cabin-'+ el.cabin_no+'<input id="bedcheck" class="cabin_'+ el.cabin_no+'" type="checkbox" name="cabin[]" value="'+ el.cabin_no+'" ></label></li>'); 
                        }else{
                          data.push('<li id="cabin_li_'+el.cabin_no+'" style="background:#787878;"><label for="bedcheck"><i class="fa fa-bed"></i> Cabin-'+ el.cabin_no+'<input id="bedcheck" class="cabin_'+ el.cabin_no+'" type="checkbox" disabled name="cabin[]" value="'+ el.cabin_no+'" ></label></li>');
                        }
                                             
                      });

                    $('ul#cabin_li_id').html(data);
                    console.log(obj);
                });

            }else{                
                $('div#cabin_id').addClass("hide");
                $('div#ward_id').removeClass("hide");
                $('#ward_bed_id').addClass('hide');

                var data =[];

                var where = {column : "ward_no"};

                $.ajax({
                    type : "POST",
                    url : '<?php echo site_url("ajax/retrieve_Distinct/wards");?>',
                    data : "condition=" + JSON.stringify(where)
                }).done(function(response){

                    var obj =$.parseJSON(response);
                    data.push("<option value='' disabled selected>&nbsp;</option>");
                    $.each(obj ,function(i,el){                       
                        data.push("<option value="+ el.ward_no+">Ward-"+ el.ward_no +"</option>");
                    });

                    $('select[name="ward_no"]').html(data);
                    console.log(obj);
                });              
                
            }
        });

        //show hide bed when select ward no
        $(document.body).on("change","select[name='ward_no']",function(){

            $('div#cabin_id').addClass("hide");
            $('div#ward_id').removeClass("hide");
            $('#ward_bed_id').removeClass('hide');

           var data =[];

            var where = {'ward_no' : $(this).val()};

            $.ajax({
                type : "POST",
                url : '<?php echo site_url("ajax/retrieveBy/wards");?>',
                data : "condition=" + JSON.stringify(where)
            }).done(function(response){
                var obj =$.parseJSON(response);
               
                $.each(obj ,function(i,el){  
                    if(el.status == "Available"){
                       data.push('<li id="bed_li_'+el.bed_no+'" style="background:green;"><label for="bedcheck"><i class="fa fa-bed"></i> Bed-'+ el.bed_no+'<input id="bedcheck" class="bed_'+ el.bed_no+'" type="checkbox" name="bed[]" value="'+ el.bed_no+'" ></label></li>'); 
                    }else{
                      data.push('<li id="bed_li_'+el.bed_no+'" style="background:#787878;"><label for="bedcheck"><i class="fa fa-bed"></i> Bed-'+ el.bed_no+'<input id="bedcheck" class="bed_'+ el.bed_no+'" type="checkbox" name="bed[]" disabled value="'+ el.bed_no+'" ></label></li>');
                    }
                 });

               $('ul#bed_li_id').html(data);
              console.log(obj);
           });             
        });

        //check if cabin checked or not
         $(document.body).on("click",'input[name="cabin[]"]',function(){          
            var ckbox = $('.cabin_'+ $(this).val());
            if(ckbox.is(':checked')){
                $("li#cabin_li_"+ $(this).val()).css('background','#787878');
            }else{
               $("li#cabin_li_"+ $(this).val()).css('background','green');
            }        
         });

         //check if bed checked or not
        $(document.body).on("click",'input[name="bed[]"]',function(){          
            var ckbox = $('.bed_'+ $(this).val());
            if(ckbox.is(':checked')){
                $("li#bed_li_"+ $(this).val()).css('background','#787878');
            }else{
               $("li#bed_li_"+ $(this).val()).css('background','green');
            }        
         });      

    });

    //Patient type condition
    $(document).ready(function(){
        $('#type_select').on('change',function(){
         var value = $(this).val();
         if(value=="Referred"){
            $('#refered_by').removeClass('hide');
         }else{
            $('#refered_by').addClass('hide');
         }
         console.log(value);
      });        
    });
  
</script>

