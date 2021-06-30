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

    <?php echo $this->session->flashdata('confirmation'); ?>

        <div class="panel panel-default none">
            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>All Sales</h1>
                </div>
            </div>

            <div class="panel-body">

                <?php
                $attr = array("class" => "form-horizontal");
                echo form_open("", $attr);
                ?>

                <div class="form-group">
                    <label class="col-md-2 control-label">Voucher number </label>
                    <div class="col-md-4">
                        <input type="text" name="search[voucher_number]" class="form-control" >
                    </div>
                </div>


 <!--                <div class="form-group">
                   <label class="col-md-2 control-label">Company</label>
                   <div class="col-md-4">
                        <select name="search[brand]" class="selectpicker form-control" data-show-subtext="true" data-live-search="true">
                           <option value="" selected disabled>Company</option>
                           <?php if($allBrands != NULL){ foreach ($allBrands as $key => $value) { ?>
                               <option value="<?php echo $value->name;?>"><?php echo $value->name; ?></option>
                           <?php } } ?>
                        </select>
                   </div>
               </div> -->

                <div class="form-group">
                    <label class="col-md-2 control-label">From </label>
                    <div class="input-group date col-md-4" id="datetimepickerFrom">
                        <input type="text" name="date[from]" class="form-control" placeholder="YYYY-MM-DD">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">To </label>
                    <div class="input-group date col-md-4" id="datetimepickerTo">
                        <input type="text" name="date[to]" class="form-control" placeholder="YYYY-MM-DD">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
                   
                <div class="col-md-6">
                    <div class="btn-group pull-right">
                        <input type="submit" name="show" value="Show" class="btn btn-primary">
                    </div>
                </div>
                    
                <?php echo form_close(); ?>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>


        <?php if($result != null){ ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title ">
                    <h1 class="pull-left">Result</h1>
                    <a class="btn btn-primery pull-right" style="font-size: 14px; margin-top: 0;" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
                </div>
            </div>

            <div class="panel-body">
                <!-- Print Banner -->
                <img class="img-responsive hide print-banner" src="<?php echo site_url('private/images/banner.jpg'); ?>">
                
                <h4 class="text-center hide" style="margin-top: -10px;">All Sales</h4>
                
                <table class="table table-bordered table2">
                    <tr>
                        <th style="width: 50px;">SL</th>
                        <th>Date</th>
                        <th>Voucher number</th>
                        <th>Custommer Name</th>
                        <th>Mobile</th>
                        <th>Price</th>    
                        <th>Paid</th>   
                        <th>Due</th>                   
                        <th class="none">Action</th>
                    </tr>
                    
                    <?php 
                       $totalGrandTotal = $totalPaid = $totalDue = 0.00;
                       $counter = 0; 
                      foreach($result as $key => $row){ if($row->grand_total > 0) { $counter++; 
                    ?>
                    <tr>
                        <td> <?php echo $counter; ?> </td>
                        <td> <?php echo $row->date; ?> </td>
                        <td> <?php echo $row->voucher_number; ?> </td>
                        <td> <?php echo $row->name; ?> </td>
                        <td> <?php echo $row->mobile; ?> </td>
                        <td> <?php echo $row->grand_total; $totalGrandTotal += $row->grand_total; ?> </td>  
                        <td> <?php echo $row->paid; $totalPaid += $row->paid; ?> </td>
                        <td> <?php echo $row->due;  $totalDue += $row->due; ?> </td>                      
                        <td class="none" style="width: 70px;">
                            <div class="dropdown pull-right">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-cog"></i>
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right ulbordertop">
                                    <li></li>
                                    <li>
                                        <a href="<?php echo site_url('sale/viewSale?vno='.$row->voucher_number); ?>"> View </a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <?php } } ?>
                    <tr>
                      <th class="text-right" colspan="5">Total</th>
                      <th><?php printf("%.2f", $totalGrandTotal); ?></th>
                      <th><?php printf("%.2f", $totalPaid); ?></th>
                      <th colspan="2"><?php printf("%.2f", $totalDue); ?></th>
                    </tr>
                </table>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
        <?php } ?>



    </div>
</div>




<script>
    // linking between two date
    $('#datetimepickerFrom').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: false
    });

    $('#datetimepickerTo').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: false
    });

    $("#datetimepickerSMSFrom").on("dp.change", function (e) {
        $('#datetimepickerSMSTo').data("DateTimePicker").minDate(e.date);
    });

    $("#datetimepickerSMSTo").on("dp.change", function (e) {
        $('#datetimepickerSMSFrom').data("DateTimePicker").maxDate(e.date);
    });








//show All Stock Product Ctrl
app.controller('showAllSalesProductCtrl', function($scope,$http,$log){

    $scope.allStockProducts=[];
    $scope.reverse = false;

    var where={
        table: 'sale',
        cond: {
            status : 'sale'
        }
    };
//console.log(where);
//
    $scope.getTotalSold = function(cat,sub_cat,product){
       
    }


    $http({
        method:'POST',
        url:url+'readJoinData',
        data:where
    }).success(function(response){
        angular.forEach(response,function(value, key){
            value['sl']=key+1;
            value['getTotal']           = (parseInt(value.quantity) * parseFloat(value.sell_price));
            value['getPurchaseTotal']   = (parseInt(value.quantity) * parseFloat(value.purchase_price)).toFixed(2);
            $scope.allStockProducts.push(value);

            //Getting Sold Quantity Start here
            var w={
                from: 'sale',
                column: 'quantity',
                cond: {category:value.category,subcategory:value.subcategory,product:value.product_name}
            };

            $http({
                method:'POST',
                url:url+'read_sum',
                data:w
            }).success(function(info){
                value['sold'] = info[0].quantity;
            });
            //Getting Sold Quantity End here
            //
        });

      $log.log($scope.allStockProducts);

      //Pre Loader
       $("#loading").fadeOut("fast",function(){
       $("#data").fadeIn('slow');
      });

    });



});













</script>