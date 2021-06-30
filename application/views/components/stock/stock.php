<style>
    @media print{
        aside, nav, .none, .panel-heading, .panel-footer{display: none !important;}
        .panel{border: 1px solid transparent;left: 0px;position: absolute;top: 0px;width: 100%;}
        .hide{display: block !important;}
    }
    .wid-100{width: 100px;}
    #loading{text-align: center;}
    #loading img{display: inline-block;}
</style>

<div class="container-fluid" ng-controller="showStockCtl" ng-cloak>
    <div class="row">
        <div class="panel panel-default" id="data">
            <div class="panel-heading">
                <div class="panal-header-title">
                    <h1 class=" pull-left">Stock</h1>
                    <a class="btn btn-primery pull-right" style="font-size: 14px; margin-top: 0;" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
                </div>
            </div>

            <div class="panel-body">

                <!-- Print banner -->
                <!--img class="img-responsive print-banner hide" src="<?php //echo site_url('public/img/banner.png'); ?>"-->

                <h4 class="hide text-center" style="margin-top: 0px;">Stock Product</h4>
                 <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th style="width: 40px;">SL</th>
                            <th>Name</th>
                            <th>Company</th>
                            <th>Quantity</th>
                            <th>Sale Price</th>
                            <th>Total</th>
                        </tr>
                            
                        <?php 
                            $total = $amount = 0;
                            foreach ($stockInfo as $key => $value) {
                            $amount = ($value->sale_price * $value->quantity);
                            $total += $amount;
                        ?>
                        <tr>
                            <td><?php echo $key+1; ?></td>
                            <td><?php echo $value->name; ?></td>
                            <td><?php echo $value->brand; ?></td>
                            <td><?php echo $value->quantity; ?></td>
                            <td><?php echo $value->sale_price; ?></td>
                            <td><?php echo $amount; ?></td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <th colspan="5" style="text-align: right;">Total:</th>
                            <th><?php echo $total; ?> Tk</th>
                        </tr>
                    </table>
                    
                </div>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>
