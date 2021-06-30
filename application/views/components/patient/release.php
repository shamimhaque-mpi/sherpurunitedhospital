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
        .table-responsive{
            display: block !important;
            overflow: initial;
        }
    }
   .ptient-release{
        padding: 50px 90px 50px 90px;
    }
    .ptient-info{
        margin: 50px 0px;
        line-height: 1.8;
    }
    .ptient-info span{
        font-weight: 700;
        border-bottom: 1px dotted #111;
    }
    h3{
        margin-top: 48px;
    }
</style>


<div class="container-fluid">
    <div class="row">
    <?php echo $this->session->flashdata('confirmation'); ?>

    <!-- horizontal form -->
    <?php
    $attribute = array(
        'name' => '',
        'class' => 'form-horizontal',
        'id' => ''
    );
    echo form_open_multipart('', $attribute);
    ?>

        <div class="panel panel-default none">
            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Release</h1>
                </div>
            </div>

            <div class="panel-body no-padding">
            <!-- Print banner -->
                <img class="img-responsive hide print-banner" src="<?php echo site_url('private/images/banner.jpg'); ?>">

                <div class="no-title">&nbsp;</div>

                <!-- left side -->
                <div class="col-md-9"> 

                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Patient ID <span class="req">*</span></label>
                            <div class="col-md-7">
                                <input 
                                type="text" 
                                name="search[pid]" 
                                class="form-control" 
                                placeholder="Patient ID" 
                                required>
                            </div>
                        </div>                               
                    
                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-7">
                                <div class="btn-group pull-right">
                                    <input class="btn btn-primary" type="submit" name="show" value="Show">
                                    <input class="btn btn-danger" type="reset" value="Clear">
                                </div>
                            </div>
                        </div>
                </div>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>

        <?php echo form_close(); ?>


        <?php 
            if ($patient != null){ 
        ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Patient Information</h1>
                </div>
                <a href="#" class="pull-right none" style="margin-top: 0px; font-size: 14px;" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
            </div>

            <div class="panel-body">
                <!-- Print banner -->
                <img class="img-responsive hide print-banner" src="<?php echo site_url('private/images/banner.jpg'); ?>">
                <span class="hide print-time"><?php echo $this->data['name'] . ' | ' . date('Y, F j H:i a'); ?></span>

                <!-- <pre><?php //echo print_r($patient); ?></pre> -->
               

                <div class="ptient-release">
                    <p><strong>খুলনা লাইফ কেয়ার হসপিটাল </strong>.................................................................</p>
                    <h3 class="text-center"><strong>রোগীর ছাড় পত্র </strong></h3>
                    

                    <p class="text-justify ptient-info">
                        এই মর্মে প্রত্যয়ন করা যাচ্ছে যে, জনাব/বেগম <span><?php echo $patient[0]->name; ?></span> 

                        <?php 
                        $g = config_item("gurdian");
                        $gname = json_decode($patient[0]->guardian, true); 
                        $keys = array_keys($gname);

                        foreach ($patient as $key => $row) {
                            $where = array("pid" => $row->pid);
                            $admissionsInfo = $this->action->read("admissions", $where);
                        }

                        ?>
                        <span style="border: 0;"><?php echo $g[$keys[0]] . " ";  ?></span>
                        <span><?php echo $gname[$keys[0]]; ?></span>
                        ঠিকানা <span><?php echo $patient[0]->address; ?></span>
                        অত্র হস্পিটালের <span>Vibage </span>
                        বিভাগে <span><?php echo $admissionsInfo[0]->seat; ?> </span> নং ওয়ার্ডে <span> <?php echo $admissionsInfo[0]->seat; ?></span>
                        শয্যা/কেবিনে <span><?php echo $patient[0]->date; ?></span> হইতে <span><?php echo date("Y-m-d"); ?></span>
                        তারিখ পর্যন্ত চিকিৎসাধীন ছিলেন । 
                        <br>
                        তিনি ............................................................................................................................................................................................................................................ .......................................................................................................................................................................................... 
                        ভুগিতেছিলেন।
                    </p>

                    <div class="col-md-6">
                        <p>তারিখঃ ......................................</p>
                    </div>
                    <div class="col-md-6 text-right">
                        <p>স্বাক্ষরঃ .........................................</p>
                        <p>পদবীঃ ........................................</p>
                        <p>রেজি নম্বরঃ .....................................</p>
                    </div>

                    <div class="col-md-12 none">
                        <div class="row">
                                    
                                    <!-- horizontal form -->
                            <?php
                            $attribute = array(
                                'name' => '',
                                'class' => 'form-horizontal',
                                'id' => ''
                            );
                            echo form_open_multipart('', $attribute);
                            ?>
                                <hr class="none">

                                <div class="col-md-offset-6 col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-4 control-label"></label>
                                        <div class="col-md-8">
                                            <div class="btn-group pull-right">
                                                <input class="btn btn-primary" type="submit" name="release" value="Release">
                                            </div>
                                        </div>
                                    </div>
                                </div>                               
 
                        </div>

                    <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
        <?php } ?>

    </div>
</div>




