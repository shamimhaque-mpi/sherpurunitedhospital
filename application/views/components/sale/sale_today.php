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

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title ">
                    <h1 class="pull-left">Today Sale</h1>
                    <a class="btn btn-primery pull-right" style="font-size: 14px; margin-top: 0;" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
                </div>
            </div>

            <div class="panel-body">
                <!-- Print Banner -->
                <img class="img-responsive hide print-banner" src="<?php echo site_url('private/images/banner.jpg'); ?>">
                
                <h4 class="text-center hide" style="margin-top: -10px;">Today Sale</h4>
                
                <table class="table table-bordered table2">
                    <tr>
                        <th style="width: 60px;">SL</th>
                        <th>Voucher No</th>
                        <th>Customer's name</th>
                        <th>Mobile</th>                        
                        <th>TK</th>
                    </tr>
                    
                    <?php $total = 0; foreach($sales as $key => $row){ ?>
                    <tr>
                        <td> <?php echo ($key + 1); ?> </td>
                        <td> <?php echo $row->voucher_number; ?> </td>
                        <td> <?php echo $row->name; ?> </td>
                        <td> <?php echo $row->mobile; ?> </td>                        
                        <td> <?php echo $row->grand_total; $total += $row->grand_total; ?> </td> 
                    </tr>
                    <?php } ?>
                    
                    <tr>
                        <td colspan="3"></td>
                        <td style="text-align:right;"> <b>Total</b> </td>                        
                        <td> <b><?php printf("%.2f", $total); ?> Tk<b> </td> 
                    </tr>
                </table>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>

    </div>
</div>