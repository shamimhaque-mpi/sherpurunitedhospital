<style>
    .table_last_left tr th:last-child,
    .table_last_left tr td:last-child {text-align: left !important;}
</style>

<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading none">
                <div class="panal-header-title pull-left">
                    <h1>Assets Report</h1>
                </div>
                <a href="#" class="pull-right none" style="margin-top: 0px; font-size: 14px;" onclick="window.print()">
                    <i class="fa fa-print"></i> 
                    Print
                </a>
            </div>

            <div class="panel-body">
                <!-- Print banner Start Here -->
                <?php  $this->load->view('print'); ?>
                
            	<div class="table-responsive">
                    <table class="table table_last_left table-bordered">
                        <tr>
                            <th colspan="2" class="text-center">Assets Report</th>
                        </tr>
                        <tr>
                            <th>Initial Invest</th>
                            <th><?php echo $initial_invest; ?></th>
                        </tr>
                        <tr>
                            <th>Closing Balance</th>
                            <th><?php echo $closing_amount; ?></th>
                        </tr>
                        <tr>
                            <th>Total</th>
                            <th><?php echo $total; ?></th>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>