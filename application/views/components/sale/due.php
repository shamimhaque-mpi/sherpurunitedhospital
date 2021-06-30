<style>
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
    <div class="row">
    
    <?php echo $this->session->flashdata('confirmation');; ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title ">
                    <h1 class="pull-left">Due List</h1>
                    <a class="btn btn-primery pull-right" style="font-size: 14px; margin-top: 0;" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
                </div>
            </div>

            <div class="panel-body">
                <?php
                    $attr = array("class" => "form-horizontal");
                    echo form_open("",$attr);
                ?>

                    <!-- Print Banner -->
                    <img class="img-responsive hide print-banner" src="<?php echo site_url('private/images/banner.jpg'); ?>">
                    

                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input id="search" type="search" class="form-control" placeholder="Search Here...">
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if($allDue != null){ ?>
                    <table id="table" class="table table-bordered table2">
                        <tr>
                            <th style="width: 70px;"><label><input type="checkbox" checked id="check_all"> SL</label></th>
                            <th>Date</th>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Voucher number</th>                        
                            <th>Amount</th>
                            <th>Payment</th>
                            <th>Due</th>
                             <th>Discount</th>
                            <th class="none" style="width: 280px">Action</th>
                        </tr>
                        
                        <?php 
                            $total_1 = 0;
                            $total_2 = 0;
                            $total_3 = 0;
                            $total_4 = 0;
                            foreach($allDue as $key => $row){ 
                        ?>
                        <tr class="tb_row">
                            <td><label><input type="checkbox" name="mobiles[]" value="<?php echo $row->mobile; ?>" checked> <?php echo ($key + 1); ?></label></td>
                            <td><?php echo $row->date; ?></td>
                            <td><?php echo $row->name; ?></td>
                            <td><?php echo $row->mobile; ?></td>
                            <td><?php echo $row->voucher_number; ?></td>                        
                            <td><?php echo $row->grand_total; ?></td>
                            <td><?php echo $row->paid; ?></td>
                            <td><?php echo $row->due; ?></td>
                            <td><?php echo $row->remission; ?></td>
                            <td class="none">
                                <a href="<?php echo site_url('sale/due/due_payment_view?vno=' . $row->voucher_number); ?>" class="btn btn-primary btn-xs">View Site</a>
                                <a href="<?php echo site_url('sale/due/due_payment?vno=' . $row->voucher_number); ?>" class="btn btn-primary btn-xs">Payment</a>
                                <a href="<?php echo site_url('sale/due/send_custom_sms?mob=' . $row->mobile); ?>" class="btn btn-success btn-xs">Sms Send</a>
                            </td>
                        </tr>

                        <?php 
                            $total_1 += $row->grand_total; 
                            $total_2 += $row->paid; 
                            $total_3 += $row->due; 
                            $total_4 += $row->remission; 
                        } ?>

                    <tr>
                        <td colspan="5" class="text-right"><strong>Grand Total
</strong></td>
                        <td colspan="1"><strong><?php echo $total_1; ?> TK</strong></td>
                        <td colspan="1"><strong><?php echo $total_2; ?> TK</strong></td>
                        <td colspan="1"><strong><?php echo $total_3; ?> TK</strong></td>
                        <td colspan="2"><strong><?php echo $total_4; ?> TK</strong></td>
                    </tr>
                    </table>
                    <?php } ?>

                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-offset-2 col-md-7">
                                <div class="form-group">
                                    <textarea name="message" rows="4" placeholder="Message..." class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="btn-group">
                                    <input type="submit" name="send" class="btn btn-success" style="margin-top: 28px;" value="Send">
                                </div>
                            </div>
                        </div>
                    </div>
                <?php echo form_close(); ?>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

<script type="text/javascript">
//Check All Start here
    $('#check_all').on('change',  function(event) {
        if($(this).is(":checked")==true){
            $('input[name="mobiles[]"]').prop("checked",true);
        }else{
            $('input[name="mobiles[]"]').prop("checked",false);
        }
    });
//Check All End here

//Search All Start here
  var $rows = $('#table .tb_row');
  $('#search').keyup(function(){    
    //var val = '^(?=.*\\b' + $.trim($(this).val()).split(/\s+/).join('\\b)(?=.*\\b') + ').*$',
    var val = $(this).val(),
      reg = RegExp(val, 'i'),
      text;

      //console.log(reg);
    
    $rows.show().filter(function() {
      text = $(this).text().replace(/\s+/g, ' ')
      //console.log(text);
      return !reg.test(text);
    }).hide();
  });
//Search All end here
</script>