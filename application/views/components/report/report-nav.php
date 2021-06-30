
<div class="container-fluid none" <?php echo $subMenu; ?> style="margin-bottom: 10px;">
    <div class="row">	
  		<!-- <a href="<?php //echo site_url('report/income'); ?>" class="btn btn-default" id="income">
        Income
      </a> -->

        <?php if(ck_action("report_menu","cost")){ ?>
        <a href="<?php echo site_url('report/cost'); ?>" class="btn btn-default" id="cost">  
            Cost
        </a>
        <?php } ?>
      
        <?php if(ck_action("report_menu","drCom")){ ?>
        <a href="<?php echo site_url('report/drCom'); ?>" class="btn btn-default" id="drCom">       
            Doctor Commission
        </a>
        <?php } ?>
        
        
        <!-- <a href="<?php //echo site_url('report/pcCom'); ?>" class="btn btn-default" id="pcCom">       
        PC Commission
        </a> -->
        
        <!-- <a href="<?php //echo site_url('report/marketer'); ?>" class="btn btn-default" id="marketer">       
        Reference Commission
        </a>
        -->
        
        <?php if(ck_action("report_menu","diagnosis")){ ?>
        <a href="<?php echo site_url('report/diagnosis'); ?>" class="btn btn-default" id="diagnosis">       
            Diagnosis
        </a>
        <?php } ?>
        
        <?php if(ck_action("report_menu","patientReport")){ ?>
        <a href="<?php echo site_url('report/patientReport'); ?>" class="btn btn-default" id="patientReport">       
            Patient Report
        </a>
        <?php } ?>
        
        <?php if(ck_action("report_menu","assets")){ ?>
        <a href="<?php echo site_url('report/assets'); ?>" class="btn btn-default" id="assets">       
            Assets Report
        </a>
        <?php } ?>
        
        <?php if(ck_action("report_menu","assets")){ ?>
        <a href="<?php echo site_url('balance/balance_report'); ?>" class="btn btn-default" id="report">       
            Balance Sheet
        </a>
        <?php } ?>
        
        <?php if(ck_action("report_menu","profit")){ ?>
        <a href="<?php echo site_url('report/profit_report'); ?>" class="btn btn-default" id="profit">       
            Profit Report
        </a>
        <?php } ?>
      
    </div>
</div>