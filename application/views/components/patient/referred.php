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
        .block-hide{
            display: none;
        }
    }
</style>

<div class="container-fluid">
    <div class="row">
    <?php echo $this->session->flashdata('confirmation'); ?>
        <div class="panel panel-default">
            <div class="panel-heading none">
                <div class="panal-header-title pull-left">
                    <h1>All Referred Patient </h1>
                </div>
                <a href="#" class="pull-right none" style="margin-top: 0px; font-size: 14px;" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
            </div>

            <div class="panel-body">
                <!-- Print banner -->
                <img class="img-responsive hide print-banner" src="<?php echo site_url('private/images/banner.jpg'); ?>">
                <span class="hide print-time"><?php echo filter($this->data['name']) . ' | ' . date('Y, F j  h:i a'); ?></span>

                <table class="table table-bordered" ng-cloak>
                    <tr>
                        <th class="text-center">Sl</th>
                        <th>Date</th>
                        <th>Patient ID</th>
                        <th>Name</th>
                        <th>Contact Address</th>
                        <th class="none">Action</th>
                    </tr>
                    <?php if($commisionInfo){ 
                        $counter = 0;
                        foreach ($commisionInfo as $key => $value) {
                            if (is_numeric($value->person_id)) {
                                $patient = $this->action->read('patients',array('id' => $value->person_id));
                                if($patient !=null){
                                     $counter++;
                    ?>
                    <!-- <pre><?php print_r( $patient); ?></pre>  -->
                    <tr>
                        <td style="width: 40px;"><?php echo  $counter; ?></td>
                        <td><?php echo $patient[0]->date; ?></td>
                        <td><?php echo $patient[0]->pid; ?></td>
                        <td><?php echo $patient[0]->name; ?></td>
                        <td><?php echo $patient[0]->address; ?></td>
                        <td class="none" style="width: 160px;">
                            <a title="View" class="btn btn-primary" href="<?php echo site_url('patient/basicInfo/view/'.$patient[0]->pid); ?>" ><i class="fa fa-eye" aria-hidden="true"></i></a>
                            <a title="Edit" class="btn btn-warning" href="#" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <a title="Delete" class="btn btn-danger" onclick="return confirm('Are you sure want to Delete this Patient?');" href="<?php echo site_url('patient/admission/delete/'.$patient[0]->pid);?>" ><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    <?php }}}}?>
                </table>
                <dir-pagination-controls max-size="perPage" direction-links="true" boundary-links="true" class="none"></dir-pagination-controls>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>


