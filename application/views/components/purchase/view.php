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
    .wid-100{
        width: 100px;
    }
</style>

<div class="container-fluid">
    <div class="row">
        <?php echo $confirmation; ?>
        <div class="panel panel-default ">

            <div class="panel-heading none">
                <div class="panal-header-title">
                    <h1 class="pull-left">Details</h1>
                    <a class="btn btn-primery pull-right" style="font-size: 14px; margin-top: 0;" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
                </div>
            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="view-profile">
                        <div class="col-xs-2">
                            <figure class="pull-left">
                            
                            </figure>
                        </div>

                        <div class="col-xs-8">
                            <div class="institute">
                               <img class="img-responsive hide print-banner" src="<?php echo site_url('private/images/banner.jpg'); ?>">
                               
                            
                            </div>
                        </div>
                       
                    </div>
                </div>

                <hr style="border-bottom: 2px solid #ccc; margin: 5px 0 10px;">
                <!-- <h4 class="hide text-center" style="margin-top: -10px;">সকল প্রোডাক্ট</h4> -->

                <label>Date : <?php echo $info[0]->date; ?></label> <br>
                <label>Voucher number : <?php echo $info[0]->voucher_no; ?></label> <br>
                <table class="table table-bordered">
                    <tr>
                        <th>SL</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Discount</th>
                        <th>Total</th>
                    </tr>

                    <?php foreach($info as $key => $val){ ?>
                    <tr>
                        <td style="width: 50px;"><?php echo ($key + 1); ?></td>
                        <td><?php echo $val->product_name; ?></td>
                        <td class="wid-100"><?php echo $val->purchase_price; ?></td>
                        <td class="wid-100"><?php echo $val->quantity; ?></td>
                        <td class="wid-100"><?php echo $val->discount; ?></td>
                        <td class="wid-100"><?php echo $val->subtotal; ?></td>
                    </tr>
                    <?php } ?>
                </table>

                <div class="text-right">
                    <label>Total : <span style="width: 80px;display: inline-block;"><?php echo $info[0]->total; ?></span>  </label> <br>
                    <label>Total Discount : <span style="width: 80px;display: inline-block;"><?php echo $info[0]->total_discount; ?></span>  </label> <br>
                    <label>Grand Total : <span style="width: 80px;display: inline-block;"><?php echo $info[0]->grand_total; ?></span>  </label> <br>
                    <label>Payable : <span style="width: 80px;display: inline-block;"><?php echo $info[0]->paid; ?></span>  </label> <br>
                    <label>Due : <span style="width: 80px;display: inline-block;"><?php echo $info[0]->due; ?></span>  </label>
                </div>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>