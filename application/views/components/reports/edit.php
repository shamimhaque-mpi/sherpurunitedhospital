<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" />
<style>
@media print{
    aside, nav, .none, .panel-heading, .panel-footer{display: none !important;}
    .panel{border: 1px solid transparent;left: 0px;position: absolute;top: 0px;width: 100%;}
    .hide{display: block !important;}
    .block-hide{display: none;}
    
}
.mb-3 {margin-bottom: 16px !important;}
.mb-2 {margin-bottom: 8px !important;}
.p-0 {padding: 0 !important;}
.pr-2 {padding-right: 8px !important;}
.input-group-btn {width: 24% !important; z-index: 9;}
.custom_padding {padding: 0 9px !important;}
.content-fixed-nav {
    z-index: 9;
}
.hide {display: none;}
.header-table tr th {width: 220px;}
/*.header-table tr, .header-table tr th, .header-table tr td {border: 1px solid transparent !important;}*/
.header-table tr, .header-table tr th, .header-table tr td {padding: 5px !important;}
.table caption {font-weight: 600;color: #111;}
</style>

<div class="container-fluid block-hide">
    <div class="row">
        
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title">
                    <h1>Edit Report</h1>
                </div>
            </div>
            
            <div class="panel-body">
                <div class="no-title">&nbsp;</div>
                
                <?php if($all_test) { ?>
                    <form action="<?php echo site_url('reports/test/patient_info_update/'.$patient_info[0]->pid)?>" method="POST">
                        <div class="row">
                            <div class="col-md-offset-2 col-md-8">
                                <table class="table table-bordered header-table">
                                    <tr>
                                        <th>ID </th>
                                        <td>
                                            <?php echo $patient_info[0]->pid; ?>
                                            <input type="hidden" name="pid" value="<?php echo $patient_info[0]->pid; ?>"> 
                                        </td>
                                        <th>Date </th>
                                        <td><?php echo $patient_info[0]->date; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Name </th>
                                        <td><?php echo $patient_info[0]->name; ?></td>
                                        <th>Print Date </th>
                                        <td><?php echo date("Y-m-d G.i:s<br>", time()); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Age </th>
                                        <td><?php echo $patient_info[0]->age; ?></td>
                                        <th>Delivery Date</th>
                                        <td colspan="3"><?php echo date("Y-m-d G.i:s<br>", time()); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Gender </th>
                                        <td colspan="3"><?php echo $patient_info[0]->gender; ?>e</td>
                                    </tr>
                                    <tr>
                                        <th>Address </th>
                                        <td colspan="3"><?php echo $patient_info[0]->address; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Contact no. </th>
                                        <td colspan="3"><?php echo $patient_info[0]->contact; ?></td>
                                    </tr>
                                </table>
                                <?php 
                                foreach($all_test as $key=> $row){ ?>
                                <div class="table_demo">
                                    <table class="table table-bordered">
                                        <caption><h3><?=filter($row['test_name'])?></h3></caption>
                                        <tr>
                                            <th>SL</th>
                                            <th>PARAMETER</th>
                                            <th>STANDARD</th>
                                            <th>VALUE</th>
                                            <th>UNIT</th>
                                        </tr>
                                        <?php
                                            $comments = '';
                                            if(!empty($row['parameters'])){
                                            foreach($row['parameters'] as $p_key => $p_row){
                                            
                                        ?>
                                            <tr>
                                                <td><?php echo $p_key+1; ?></td>
                                                <td><?php echo filter($p_row->parameter_name); ?></td>
                                                <td><?=($p_row->ref_value)?></td>
                                                <td>
                                                    <input type="text" name="result[]" value="<?=$p_row->value?>" class="form-control" placeholder="Enter Value">
                                                    <input type="hidden" name="parameter_id[]" value="<?=$p_row->id;?>">
                                                    <input type="hidden" name="test_id[]" value="<?=$row['test_id'];?>">
                                                </td>
                                                <td>
                                                    <?=($p_row->unit) ?>
                                                </td>
                                            </tr>
                                        <?php }} ?>
                                    </table>
                                </div>
                                <?php } ?>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-5">
                                    <div class="row">
                                        <label for="" class="col-md-2 control-label text-right">Comments</label>
                                        <div class="col-md-8"> 
                                            <textarea class="form-control" name="remarks" id="summernote"><?=(get_name('patient_histories', 'description', ['pid' => $all_test[0]['pid']]))?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-10"><input type="submit" class="btn btn-primary pull-right"></div>
                        </div>
                    </form>
                <?php } ?>
                
                
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>

    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>

<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<style>
    .note-dropdown-menu{z-index: 8;}
    .panel-heading, .panel-footer{overflow: initial;}
</style>
<script>
    $(document).ready(function() {

        $('#summernote').summernote({
            placeholder: 'Type your comments........',
            height: 150,
        });
    });
</script>