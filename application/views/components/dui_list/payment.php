<style type="text/css">
    .mb15{
        margin-bottom: 15px;
    }
    .cus-table tr td{
        padding: 0 !important;
    }
    .cus-table tr td .form-control{
        border: transparent;
    }
    .table tr th:last-child, .table tr td:last-child {
        text-align: left;
    }
</style>
<div class="container-fluid">
    <div class="row" ng-controller="testDuePaymentCtrl" ng-cloak>

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Due Collection</h1>
                </div>
            </div>

            <div class="panel-body">

                <?php 
                    // fetch diagnosis info
                    $diagnosisInfo  = $this->action->read('diagnosis',array('bill' => $billInfo[0]->id));
                ?>

                <?php $attr = array('class' => 'form-horizontal');
                echo form_open('', $attr); ?>
                <?php $vno =$this->input->get('vno'); ?>

                <input type="hidden" name="voucher_number" value="<?php echo $vno; ?>">

                <div class="row" ng-init="vno='<?php echo $vno; ?>'" ng-model="vno">

                    <div class="col-md-4 mb15">
                        <label>Patient ID : </label> {{ patient_id}}
                    </div>
                    
                    <div class="col-md-4 mb15">
                       <label>Date :</label> {{ date }}
                        
                    </div>

                    <div class="col-md-4 mb15">
                       <label>Delivery Date :</label> {{delivery_date}}
                        
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-4 mb15">
                        <label>Patient Name :</label> {{patient_name}}
                    </div>

                    <div class="col-md-4 mb15">
                        <label>Patient Mobile :</label> {{patient_mobile}}
                    </div>

                    <div class="col-md-4 mb15">
                        <label>Patient Address :</label> {{address}}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb15">
                        <label>Age :</label> {{age}}
                    </div>
                    <div class="col-md-4 mb15">
                        <label>Gender :</label> {{gender}}
                    </div>
                    <div class="col-md-4 mb15">
                        <label>Reference Name :</label> {{reference_name}}
                    </div>
                </div> 

                <hr style="margin-top: 0; border-bottom: 1px solid #ddd;">

                <table class="table cus-table table-bordered">
                    <tr>
                        <th> SL </th>
                        <th> Test Name </th>
                        <th> Test Group </th>
                        <th> Room No</th>
                        <th> Amount (TK)  </th>
                    </tr>

                    <tr ng-repeat="item in testList" ng-cloak>
                        <td style="padding: 4px 8px !important;">{{ $index + 1 }}</td>                       

                        <td>
                            <input name="test_name" class="form-control" ng-value="item.testName | textBeautify | uppercase" readonly>
                            
                             <input type="hidden" name="value_id[]" value="{{item.value_id}}">
                        </td>                 
                        
                        <td>
                            <input type="text" name="test_group[]" class="form-control" ng-value="item.testGroup | textBeautify" readonly>
                        </td>

                        <td>
                            <input type="number" name="room_no[]" class="form-control" step="any" ng-value="item.room" readonly>
                        </td>
                        
                        <td>
                            <input type="number" name="amount[]" class="form-control" step="any" ng-value="item.price" readonly>
                        </td>
                    </tr>
                </table>

                <div class="form-group">
                    <label class="col-md-offset-7 col-md-2 control-label">Subtotal</label>
                    <div class="col-md-3">
                        <input type="number" name="subtotal" ng-value="amount.subtotal" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-offset-7 col-md-2 control-label">Vat ( {{amount.vat}} %)</label>
                    <div class="col-md-3">
                        <input type="number" name="vat_amount" ng-value="amount.vat_amount" class="form-control" step="any" readonly>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-offset-7 col-md-2 control-label">Total </label>
                    <div class="col-md-3">
                        <input type="number" name="total" ng-value="amount.total" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-offset-7 col-md-2 control-label">Less </label>
                    <div class="col-md-3">
                        <input type="number" name="discount"  ng-value="getTotalRemission()" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-offset-7 col-md-2 control-label">Grand Total </label>
                    <div class="col-md-3">
                        <input type="number" name="grand_total" ng-value="amount.grand_total" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-offset-7 col-md-2 control-label">Previous Paid </label>
                    <div class="col-md-3">
                        <input type="number" name="pre_paid" ng-model="amount.oldpaid" class="form-control" readonly>
                        <?php
                            $due_collect = $this->action->read_sum('due_payment','paid',array('voucher_number' => $_GET['vno']));
                            if(!empty($due_collect[0]->paid)){
                                $due_collect = $due_collect[0]->paid;
                            }else{
                                $due_collect = 0;
                            }
                            
                            $due_remission = $this->action->read_sum('due_payment','remission',array('voucher_number' => $_GET['vno']));
                            if(!empty($due_remission[0]->remission)){
                                $remission = $due_remission[0]->remission;
                            }else{
                                $remission = 0;
                            }
                            
                            
                           
                        ?>
                         <input type="hidden"  ng-model="prv_due_paid"  ng-init="prv_due_paid = <?php echo $due_collect; ?>"  >
                         <input type="hidden"  ng-model="prv_remission"  ng-init="prv_remission = <?php echo $remission; ?>"  >
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-offset-7 col-md-2 control-label">Paid </label>
                    <div class="col-md-3">
                        <input type="number" name="paid" ng-model="amount.paid" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-offset-7 col-md-2 control-label">Remission </label>
                    <div class="col-md-3">
                        <input type="number" name="remission" ng-model="amount.remission" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-offset-7 col-md-2 control-label">Due </label>
                    <div class="col-md-3">
                        <input type="number" name="due" ng-value="getTotalDue()" class="form-control" readonly>
                    </div>
                </div>
               
                <div class="row">
                    <div class="col-md-12">
                        <div class="btn-group pull-right">
                            <input class="btn btn-primary" type="submit" name="collection" value="Collect">
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
    // linking between two date
    $('#datetimepicker').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: false
    });
  
</script>

