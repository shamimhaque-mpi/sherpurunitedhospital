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
         <?php if($info != NULL){ ?>
           <div class="panel-body no-padding">
                <!-- Print banner -->
                <img class="img-responsive hide print-banner" src="<?php echo site_url('private/images/banner.jpg'); ?>">

                <div class="no-title">&nbsp;</div>

                <div class="agreement">
                    <h3 class="text-center">অস্ত্রোপচারের সম্মতিপত্র</h3>
                    <div class="panel-body">
                        <p style="text-align: justify;">
                            <span>মেডিকেল রেকর্ড নং.........................</span><br />
                            রোগীর নাম  <i><?php echo $info[0]->name; ?></i>  পিতা/স্বামীর নামঃ  <i><?php echo $info[0]->father_husband; ?></i>
অভিভাবকের নামঃ <i><?php echo $info[0]->guardian; ?></i> <?php if($info[0]->cabin_no != NULL){?>কেবিনঃ <?php echo $info[0]->cabin_no; ?> <?php }else{ ?>ওয়ার্ডঃ <?php echo $info[0]->ward_no; ?> <?php } ?>   
মোবাইল নং  <i><?php echo $info[0]->mobile; ?></i>  রোগীর সাথে সম্পর্কঃ <i><?php echo "Relation" ?></i> , রোগী আমি নিজে/ আমার আত্বীয় ।  চিকিৎসা সম্বন্ধীয় সকল জটিলতা আমাকে অবগত করা হয়েছে ।  উপরোক্ত রোগীকে অবশ/অজ্ঞান করে অস্ত্রোপচার সম্পন্ন করার জন্য আমি অনুমতি প্রদান করছি । যদি অজ্ঞানজনিত বা অস্ত্রোপচারের প্রক্রিয়ার মধ্যে কোন নতুন পরিস্থিতি, জটিলতা ও উপর্সগ  দেখাদেয় তবে সে ক্ষেত্রে বাস্তব অবস্থার পরিপ্রেক্ষিতে প্রয়োজনীয় সিদ্ধান্ত ও ব্যবস্থা গ্রহনের জন্য আমি কর্তব্যরত চিকিৎসকের উপর আস্থা রাখি । ইহাতে কোন অসুবিধা হলে চিকিৎসক/ক্লিনিক কতৃপক্ষ দ্বায়ী থাকবেনা । <br />
<br />
আমি এই মর্মে নিশ্চয়তা  দিচ্ছি যে, আমি অস্ত্রোপচার সংক্রান্ত উক্ত সম্মতিপত্র পুরোপুরি পরেছি এবং প্রয়োজনীয় বিষয়গুলো যথাযথভাবে আমাকে ব্যাখ্যা করা হয়েছে এবং আমি বিশ্বাস করি ভাগ্যের ভাল-মন্দ মহান সৃষ্টিকর্তার হাতে । তাই আমি আমার রোগীকে সৃষ্টিকর্তার উপর আস্থা রেখে অবশ/অজ্ঞান করে অস্ত্রোপচারের জন্য চিকিৎসককে অনুমতি প্রদান করলাম। <br />
<br />
সম্মতিপত্রে উল্লেখিত শর্তাবলি আমি ভাল ভাবে পড়িয়া সেচ্ছায় ও স্বজ্ঞানে স্বক্ষীগনের সমানে স্বাক্ষর করিলাম ।
                        </p>
                        <div class="col-xs-4">
                            <div class="text-center signature">
                                <p style="text-align: left;margin-left: 55px;">
                                   স্বাক্ষীর স্বক্ষরঃ....................
                                </p>
                                <p style="text-align: left;margin-left: 55px;">
                                    ১ । স্বাক্ষর....................
                                </p>
                                <p style="text-align: left;margin-left: 55px;">
                                   ২ । স্বাক্ষর....................
                                </p>
                                <p style="text-align: left;margin-left: 55px;">
                                   তারিখ....................
                                </p>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="text-center signature">
                                <p>অভিভাবকের  স্বক্ষরঃ.............................</p>
                                <p>রোগীর সাথে সম্পর্ক  <i><?php echo "Relation" ?></i></p>
                                <p>রোগীর স্বাক্ষর.............................</p>
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




