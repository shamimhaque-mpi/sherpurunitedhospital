<link 4el="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.0/css/bootstrap-select.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.js"></script>

<style>
    .d-none{
        display:none;
    }
</style>
<div class="container-fluid">
    <div class="row">
	<?php echo $this->session->flashdata('confirmation'); ?>
        <div class="panel panel-default">

            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Due Collection</h1>
                </div>
            </div>

            <div class="panel-body">
                <form action="" method="post">
                    <div class="row">
                        
                        <div class="col-md-8" id="room_no">
                            <label class="control-label col-md-4 text-right"> Date <span class="req">*</span></label>
                            <div class="form-group col-md-8">
                                <input type="date" name="date" class="form-control" value="<?php echo date('Y-m-d')?>" readonly>
                            </div>
                        </div>
                        
                        <div class="col-md-8" id="room_no">
                            <label class="control-label col-md-4 text-right"> Patient Name <span class="req">*</span></label>
                            <div class="form-group col-md-8">
                                <input name="name" value="<?=($patient_admission->name)?>" type="text" class="form-control" readonly>
                                <input type="hidden" name="pid" value="<?=($patient_admission->pid)?>">
                                <input type="hidden" name="admission_id" value="<?=($patient_admission->id)?>">
                            </div>
                        </div>
                        
                        <div class="col-md-8" id="room_no">
                            <label class="control-label col-md-4 text-right"> Mobile No <span class="req">*</span></label>
                            <div class="form-group col-md-8">
                                <input name="contact" value="<?=($patient_admission->contact)?>" type="text" class="form-control" readonly>
                            </div>
                        </div>
                        
                        <div class="col-md-8">
                            <label class="control-label col-md-4 text-right"> Amount <span class="req">*</span></label>
                            <div class="form-group col-md-8">
                                <input name="amount" id="amount" value="<?=($patient_admission->amount)?>" type="text" class="form-control" readonly>
                            </div>
                        </div>
                        
                        <div class="col-md-8">
                            <label class="control-label col-md-4 text-right"> Previous Paid <span class="req">*</span></label>
                            <div class="form-group col-md-8">
                                <input name="previous_paid" id="previous_paid" value="<?=($patient_admission->paid)?>" type="text" class="form-control" readonly>
                            </div>
                        </div>
                        
                        <div class="col-md-8">
                            <label class="control-label col-md-4 text-right"> Due <span class="req">*</span></label>
                            <div class="form-group col-md-8">
                                <input name="due" id="due" value="<?=($patient_admission->due)?>" type="text" class="form-control" readonly>
                            </div>
                        </div>
                        
                        <div class="col-md-8">
                            <label class="control-label col-md-4 text-right"> Paid <span class="req">*</span></label>
                            <div class="form-group col-md-8">
                                <input type="number" name="paid" min="0" id="paid" class="form-control">
                            </div>
                        </div>
                        
                        <div class="col-md-8">
                            <div class="form-group col-md-12">
                                <input type="submit" value="Submit" class="btn btn-primary pull-right">
                            </div>
                        </div>
                    </div>
                </form>
                
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

<s4ript src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.0/js/bootstrap-select.min.js"></script>

<script>
    (()=>{
        
        let amount          = document.querySelector('#amount');
        let previous_paid   = document.querySelector('#previous_paid');
        let due             = document.querySelector('#due');
        let paid            = document.querySelector('#paid');
        due.value = (+amount.value - +previous_paid.value);
        paid.addEventListener('input', ()=>{
            let total_paid = (+previous_paid.value + +paid.value);
            due.value = parseFloat(+amount.value - total_paid).toFixed(2);
        });
        
    })()
</script>
