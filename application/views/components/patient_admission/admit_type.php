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
                    <h1>Admit Type</h1>
                </div>
            </div>

            <div class="panel-body">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-8">
                            <label class="control-label col-md-4 text-right"> Type <span class="req">*</span></label>
                            <div class="form-group col-md-8">
                                <select name="type" class="form-control select2" id="type">
                                    <option value="seat" <?=(isset($edit) ? ($edit->type=='seat'?'selected':'') : '')?> >Seat</option>
                                    <option value="cabin" <?=(isset($edit) ? ($edit->type=='cabin'?'selected':'') : '')?> >Cabin</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-8" id="room_no">
                            <label class="control-label col-md-4 text-right"> Room No <span class="req">*</span></label>
                            <div class="form-group col-md-8">
                                <input name="room_no" value="<?=(isset($edit) ? $edit->room_no : '')?>" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-8 d-none" id="cabin_no">
                            <label class="control-label col-md-4 text-right"> Cabin No <span class="req">*</span></label>
                            <div class="form-group col-md-8">
                                <input name="cabin_no" value="<?=(isset($edit) ? $edit->cabin_no : '')?>" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-8" id="seat_no">
                            <label class="control-label col-md-4 text-right"> Seat No <span class="req">*</span></label>
                            <div class="form-group col-md-8">
                                <input name="seat_no" value="<?=(isset($edit) ? $edit->seat_no : '')?>" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <label class="control-label col-md-4 text-right"> Price <span class="req">*</span></label>
                            <div class="form-group col-md-8">
                                <input name="price" value="<?=(isset($edit) ? $edit->price : '')?>" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group col-md-12">
                                <input type="submit" value="<?=(isset($edit) ? "Update":"Save")?>" class="btn btn-primary pull-right">
                            </div>
                        </div>
                    </div>
                </form>
                <?php if(!isset($edit)){ ?>
                <hr style="">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <caption><h4>All Admit Type</h4></caption>
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Type</th>
                                <th>Room No</th>
                                <th>Cabin No</th>
                                <th>Seat No</th>
                                <th>Price</th>
                                <th width="100">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($admit_types) foreach($admit_types as $key=>$value){ ?>
                            <tr>
                                <td><?=++$key?></td>
                                <td><?=ucfirst($value->type)?></td>
                                <td><?=$value->room_no?></td>
                                <td><?=$value->cabin_no?></td>
                                <td><?=$value->seat_no?></td>
                                <td><?=$value->price?></td>
                                <td>
                                    <div class="btn-group">
                                        <a href="<?php echo site_url('patient_admission/patient_admission/admit_edit/'.$value->id)?>" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                                        <a onclick="return confirm('Are You Sure Delete This Data??')" href="<?php echo site_url('patient_admission/patient_admission/admit_delete/'.$value->id)?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
                <?php } ?>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

<s4ript src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.0/js/bootstrap-select.min.js"></script>
<script>
    window.addEventListener('load', ()=>{
        let type = document.querySelector('#type');
        let cabin_no = document.querySelector('#cabin_no');
        let seat_no = document.querySelector('#seat_no');
        let room_no = document.querySelector('#room_no');
        if(type.value=='seat'){
            room_no.classList.remove('d-none');
            seat_no.classList.remove('d-none');
            cabin_no.classList.add('d-none');
        }else{
            room_no.classList.add('d-none');
            seat_no.classList.add('d-none');
            cabin_no.classList.remove('d-none');
        }
        type.addEventListener('change', ()=>{
            if(type.value=='seat'){
                seat_no.classList.remove('d-none');
                room_no.classList.remove('d-none');
                cabin_no.classList.add('d-none');
            }else{
                room_no.classList.add('d-none');
                seat_no.classList.add('d-none');
                cabin_no.classList.remove('d-none');
            }
        });
    });
</script>