<style>
    .view_list {
        border-left: 1px solid #ccc;
        border-top: 1px solid #ccc;
        flex-wrap: wrap;
        display: flex;
        width: 100%;
    }
    .view_list li {
        white-space: nowrap;
        padding-right: 25px;
        min-width: 33.3333%;
        border: 1px solid #ccc;
        padding: 6px 10px;
        border-top: none;
        border-left: none;
    }
    .view_list li strong {
        display: inline-block;
        min-width: 100px;
    }
</style>

<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title">
                    <h1 class="pull-left">All Items</h1>
                    <a href="" class="pull-right" style="margin-top: 0px; font-size: 14px;" onclick="window.print()">
                        <i class="fa fa-print"></i> Print
                    </a>
                </div>
            </div>
            <div class="panel-body">
                <!-- print banner here -->
                <?php  $this->load->view('print'); ?>
                <div class="header_table">
                    <table class="table table-bordered">
                        <tr>
                            <td>Patient Name</td>
                            <th style="text-align:left!important"><?=($bill->name)?></th>
                            
                            <td>Voucher</td>
                            <th style="text-align:left!important"><?=($bill->voucher)?></th>
                        </tr>
                        <tr>
                            <td>Age</td>
                            <th style="text-align:left!important"><?=($bill->age)?></th>
                            
                            <td>Patient ID</td>
                            <th style="text-align:left!important"><?=($bill->patient_id)?></th>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <th style="text-align:left!important"><?=($bill->gender)?></th>
                            
                            <td>Date</td>
                            <th style="text-align:left!important"><?=($bill->date)?></th>
                        </tr>
                        <tr>  
                            <td>Contact</td>
                            <th style="text-align:left!important"><?=($bill->contact)?></th>
                            <td>Bill By</td>
                            <th style="text-align:left!important"><?=($bill->bill_by)?></th>
                        </tr>
                        <tr> 
                            <td>Address</td>
                            <th colspan="3" style="text-align:left!important"><?=($bill->address)?></th>
                        </tr>
                    </table>
                </div>
                
                <table class="table table-bordered">
                        <tr>
                            <th width="40">SL</th>
                            <th>Items</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th style="text-align:left">Total</th>
                        </tr>
                        <?php 
                            $total_price = $total_qty = $total = 0;
                            if($items) foreach($items as $key=>$value):
                                $total_price += $value->price;
                                $total_qty   += $value->quantity;
                                $total       += $value->total;
                        ?>
                        <tr>
                            <td><?=(++$key)?></td>
                            <td><?=($value->name)?></td>
                            <td><?=round($value->price)?></td>
                            <td><?=round($value->quantity)?></td>
                            <td style="text-align:left"><?=round($value->total)?></td>
                        </tr>
                        <?php endforeach;?>
                        <tr>
                            <th colspan="2" style="text-align:right">Total</th>
                            <th><?=($total_price)?>TK</th>
                            <th><?=($total_qty)?></th>
                            <th style="text-align:left"><?=($total)?>TK</th>
                        </tr>
                    </table>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

<style>
    @media print {
        .header_table {
            border: 1px solid #000 !important;
            margin-bottom: 20px;
            padding: 8px 1px;
        }
        .header_table .table {margin: 0;}
        .header_table .table-bordered>tbody>tr>td, 
        .header_table .table-bordered>tbody>tr>th, 
        .header_table .table-bordered>tfoot>tr>td, 
        .header_table .table-bordered>tfoot>tr>th, 
        .header_table .table-bordered>thead>tr>td, 
        .header_table .table-bordered>thead>tr>th {
            border: 1px solid #fff !important;
            padding: 0 8px;
        }
    }
</style>