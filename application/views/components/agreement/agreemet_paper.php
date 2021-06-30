<style>
.agrement-pic{
    height: 300px;
}
.agreement h3{
    text-decoration: underline;
}
.panel-body p{
    width: 100%; 
    max-width: 900px;
    margin: 0 auto;
    line-height: 2;

}
.signature{
    margin-top:  50px;
}
.signature p{
    text-align: left;
    margin-left: 55px;
}
.over{
    overflow: hidden;
}
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
        .agreement h3{
            margin-top: 0px;
        }
    }
</style>

<div class="container-fluid over">
    <div class="row">     

        <div class="panel panel-default">
           <div class="panel-heading">
                <div class="panal-header-title">
                    <div class="pull-left">
                        <h1>Agreement</h1>
                    </div>                                

                    <a href="#" class="pull-right" style="font-size: 14px;" onclick="window.print()"><i class="fa fa-print"></i> Print</a>
                </div>
            </div>
            <?php if($info !=null) { ?>
           <div class="panel-body no-padding">
                <!-- Print banner -->
                <img class="img-responsive hide print-banner" src="<?php echo site_url('private/images/banner.jpg'); ?>">

                <div class="no-title">&nbsp;</div>

                <div class="agreement">
                    <h3 class="text-center">অঙ্গীকার পত্র</h3>
                    <div class="panel-body">
                        <p style="text-align: justify;">
                            আমি <i><?php echo $info[0]->name; ?></i> ,  পিতা/স্বামীঃ <i><?php echo $info[0]->father_husband;?></i> মাতাঃ <i><?php echo "Mother Name";?></i> গ্রামঃ <i><?php echo "Village Name";?></i> পোস্টঃ <i><?php echo "Post office Name";?></i> উপজেলাঃ <i><?php echo "Upazilla Name";?></i>  জেলাঃ <i><?php echo "Zilla Name";?></i>    
এই মর্মে অঙ্গীকার করিতেছি যে , আমার রোগীর অবস্থা আশাংকাজনক, এমতাবস্থা অপারেশন করানো জরুরী। তাই সার্বিক অবস্থা বিবেচনায় রেখে আমি রোগীর অস্ত্র পচারের জন্যে সম্মতি প্রদান করলাম এবং এবং অপারেশন সংক্রান্ত কোন জটিলতা কিংবা কোন সমস্যার   সৃষ্টি  হলে সে কারনে হাসপাতাল   কর্তৃপক্ষ
 ও ডাক্তার সাহেবকে  কোন অবস্থায় দায়ী করিব না । অত্র অংগীকার পত্রে সেচ্ছায় স্বজ্ঞানে স্বাক্ষর করলাম ।

                        </p>
                        <div class="col-xs-4">
                            <div class="text-center signature">
                                <p>....................</p>
                                <p style="text-align: left;margin-left: 55px;">
                                   রোগীর স্বাক্ষর
                                </p>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="text-center signature">
                                <p>.............................</p>
                                <p>
                                    অভিভাবকের স্বাক্ষর
                                </p>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="text-center signature">
                                <p>............................</p>
                                <p>
                                    ম্যানেজারের  স্বাক্ষর
                                </p>
                            </div>
                        </div>
                    </div>
                </div>                
            <div class="panel-footer">&nbsp;</div>
          </div>
        <?php } ?>      
    </div>
</div>




