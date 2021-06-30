<div class="col-md-8">
   <div class="row wrapper">
      <h2 class="color"><i class="fa fa-plane" aria-hidden="true"></i> &nbsp; Fast Raising</h2>
         <img src="<?php echo site_url('public/img/ads/4393.gif'); ?>" alt="" style="width: 100%; height: 90px;">
      <!-- main content area -->
      <div class="content-area"> 
         <!-- ads fast Raising menu start -->
         <ul class="footer-item list-inline">
            <li><a  id="link1" href="" title="">Last 24 hours</a></li>
            <li><a  id="link2" href="" title="">Last 3 days</a></li>
            <li><a  id="link3" href="" title="">Last week</a></li>
         </ul>
         <!-- ads fast Raising menu end -->

      </div>
      <!-- main content area end-->
      <div id="all">     
         <?php if($fast_raising != NULL){ ?>
             <!--pre><?php print_r($fast_raising);?></pre-->
             <div class="added"> 
               <table class="table table-hover table-responsive">
                  <?php 
                    $nowtime=strtotime(date('Y-m-d H:i:s'));
                    foreach ($fast_raising as $key => $value) { 
                       $postedtime=strtotime($value->created_at); 
                       $diff = $nowtime - $postedtime;
                       $hours = intval($diff / 3600);
                     ?>
                      <tr ng-class="{'marked': checkMarkedFn(<?php echo $value->id; ?>)}">
                           <td class="img-heigt" onclick="go_to('<?php echo site_url('home/advertising_detils?id='.$value->id); ?>')">
                              <span><i class="fa fa-heart" aria-hidden="true"></i></span>
                              <img src="<?php echo site_url($value->path); ?>" alt="Logo not found!">
                           </td>

                           <td onclick="go_to('<?php echo site_url('home/advertising_detils?id='.$value->id); ?>')">
                              <p><?php echo $value->title; ?></p>
                              <p><?php echo $value->url; ?></p>
                           </td>

                           <td onclick="go_to('<?php echo site_url('home/advertising_detils?id='.$value->id); ?>')"><?php echo ucwords($value->discussions); ?></td>

                           <td onclick="go_to('<?php echo site_url('home/advertising_detils?id='.$value->id); ?>')"><?php echo $hours; ?>&nbsp;hour(s)</td>

                           <td style="color: #0E9C50;" onclick="go_to('<?php echo site_url('home/advertising_detils?id='.$value->id); ?>')"><?php echo $value->status; ?></td>
                           <td class="marked-list">
                              (1)
                              <span id="click-marked" ng-click="addFavoriteFn(<?php echo $value->id; ?>)">
                                {{ conditionalTextFn(<?php echo $value->id; ?>) }}
                              </span> 
                         </td>
                     </tr>              
                  <?php } ?>          
               </table>
             </div>
            <?php } ?>
         </div>


         <div id="last24" class="hide">        
         <?php if($fast_raising != NULL){ ?>
             <!--pre><?php print_r($fast_raising);?></pre-->
             <div class="added"> 
               <table class="table table-hover table-responsive">
                  <?php 
                    $nowtime=strtotime(date('Y-m-d H:i:s'));
                    foreach ($fast_raising as $key => $value) { 
                       $postedtime=strtotime($value->created_at); 
                       $diff = $nowtime - $postedtime;
                       $hours = intval($diff / 3600);
                       if($hours <= 24){ ?>                    
                        <tr ng-class="{'marked': checkMarkedFn(<?php echo $value->id; ?>)}">
                           <td class="img-heigt" onclick="go_to('<?php echo site_url('home/advertising_detils?id='.$value->id); ?>')">
                              <span><i class="fa fa-heart" aria-hidden="true"></i></span>
                              <img src="<?php echo site_url($value->path); ?>" alt="Logo not found!">
                           </td>

                           <td onclick="go_to('<?php echo site_url('home/advertising_detils?id='.$value->id); ?>')">
                              <p><?php echo $value->title; ?></p>
                              <p><?php echo $value->url; ?></p>
                           </td>

                           <td onclick="go_to('<?php echo site_url('home/advertising_detils?id='.$value->id); ?>')"><?php echo ucwords($value->discussions); ?></td>

                           <td onclick="go_to('<?php echo site_url('home/advertising_detils?id='.$value->id); ?>')"><?php echo $hours; ?>&nbsp;hour(s)</td>

                           <td style="color: #0E9C50;" onclick="go_to('<?php echo site_url('home/advertising_detils?id='.$value->id); ?>')"><?php echo $value->status; ?></td>
                           <td class="marked-list">
                              (1)
                              <span id="click-marked" ng-click="addFavoriteFn(<?php echo $value->id; ?>)">
                                {{ conditionalTextFn(<?php echo $value->id; ?>) }}
                              </span> 
                         </td>
                     </tr>              
                  <?php } } ?>          
               </table>
             </div>
            <?php } ?>
         </div>

         <div id="3days" class="hide">         
         <?php if($fast_raising != NULL){ ?>
             <!--pre><?php print_r($fast_raising);?></pre-->
             <div class="added"> 
               <table class="table table-hover table-responsive">
                  <?php 
                    $nowtime=strtotime(date('Y-m-d H:i:s'));
                    foreach ($fast_raising as $key => $value) { 
                       $postedtime=strtotime($value->created_at); 
                       $diff = $nowtime - $postedtime;
                       $hours = $diff / 3600;
                       $days = intval($hours/24);
                       if($days <= 3){ 
                  ?>
                  <tr ng-class="{'marked': checkMarkedFn(<?php echo $value->id; ?>)}">
                     <td class="img-heigt" onclick="go_to('<?php echo site_url('home/advertising_detils?id='.$value->id); ?>')">
                        <span><i class="fa fa-heart" aria-hidden="true"></i></span>
                        <img src="<?php echo site_url($value->path); ?>" alt="Logo not found!">
                     </td>

                           <td onclick="go_to('<?php echo site_url('home/advertising_detils?id='.$value->id); ?>')">
                              <p><?php echo $value->title; ?></p>
                              <p><?php echo $value->url; ?></p>
                           </td>

                           <td onclick="go_to('<?php echo site_url('home/advertising_detils?id='.$value->id); ?>')"><?php echo ucwords($value->discussions); ?></td>

                           <td onclick="go_to('<?php echo site_url('home/advertising_detils?id='.$value->id); ?>')"><?php echo intval($hours); ?>&nbsp;hour(s)</td>

                           <td style="color: #0E9C50;" onclick="go_to('<?php echo site_url('home/advertising_detils?id='.$value->id); ?>')"><?php echo $value->status; ?></td>
                           <td class="marked-list">
                              (1)
                              <span id="click-marked" ng-click="addFavoriteFn(<?php echo $value->id; ?>)">
                                {{ conditionalTextFn(<?php echo $value->id; ?>) }}
                              </span> 
                         </td>
                     </tr>              
                  <?php } } ?>          
               </table>
             </div>
            <?php } ?>
         </div>

         <div id="lastweek" class="hide">         
         <?php if($fast_raising != NULL){ ?>
             <!--pre><?php print_r($fast_raising);?></pre-->
             <div class="added"> 
               <table class="table table-hover table-responsive">
                  <?php 
                    $nowtime=strtotime(date('Y-m-d H:i:s'));
                    foreach ($fast_raising as $key => $value) { 
                       $postedtime=strtotime($value->created_at); 
                       $diff = $nowtime - $postedtime;
                       $hours = $diff / 3600;
                       $days = intval($hours/24);
                       if($days >= 7 && $days <= 14){ 
                     ?>
                      <tr ng-class="{'marked': checkMarkedFn(<?php echo $value->id; ?>)}">
                           <td class="img-heigt" onclick="go_to('<?php echo site_url('home/advertising_detils?id='.$value->id); ?>')">
                              <span><i class="fa fa-heart" aria-hidden="true"></i></span>
                              <img src="<?php echo site_url($value->path); ?>" alt="Logo not found!">
                           </td>

                           <td onclick="go_to('<?php echo site_url('home/advertising_detils?id='.$value->id); ?>')">
                              <p><?php echo $value->title; ?></p>
                              <p><?php echo $value->url; ?></p>
                           </td>

                           <td onclick="go_to('<?php echo site_url('home/advertising_detils?id='.$value->id); ?>')"><?php echo ucwords($value->discussions); ?></td>

                           <td onclick="go_to('<?php echo site_url('home/advertising_detils?id='.$value->id); ?>')"><?php echo intval($hours); ?>&nbsp;hour(s)</td>

                           <td style="color: #0E9C50;" onclick="go_to('<?php echo site_url('home/advertising_detils?id='.$value->id); ?>')"><?php echo $value->status; ?></td>
                           <td class="marked-list">
                              (1)
                              <span id="click-marked" ng-click="addFavoriteFn(<?php echo $value->id; ?>)">
                                {{ conditionalTextFn(<?php echo $value->id; ?>) }}
                              </span> 
                         </td>
                     </tr>              
                  <?php } } ?>          
               </table>
             </div>
            <?php } ?>
         </div>


         <!-- footer add -->
         <div class="footer-add">
            <img src="<?php echo site_url('public/img/ads/4469.gif'); ?>" alt="">
         </div>
     <!-- footer add end-->
   </div>
      <!-- added end -->

      <!-- footer add -->
   <div class="footer-add footer-wrapper">
      <img src="<?php echo site_url('public/img/ads/4477.gif'); ?>" alt="">
   </div>
   <!-- footer add end-->
</div> 

<!-- last 24 ,3days last week dynamically showw js script start-->
<script src="<?php echo site_url('public/js/jquery-1.12.3.min.js');?>"></script>
<script>
   $(document).ready(function(){     
      $('#link1').on('click',function(){         
         $('div#all').addClass('hide');
         $('div#last24').removeClass('hide');
         $('div#3days').addClass('hide');
         $('div#lastweek').addClass('hide');

         $(this).addClass('active');
         $('#link2').removeClass('active');
         $('#link3').removeClass('active');
      }); 

      $('#link2').on('click',function(){         
         $('div#all').addClass('hide');
         $('div#last24').addClass('hide');
         $('div#3days').removeClass('hide');
         $('div#lastweek').addClass('hide');

         $(this).addClass('active');
         $('#link1').removeClass('active');
         $('#link3').removeClass('active');
      }); 

      $('#link3').on('click',function(){         
         $('div#all').addClass('hide');
         $('div#last24').addClass('hide');
         $('div#3days').addClass('hide');
         $('div#lastweek').removeClass('hide');

         $(this).addClass('active');
         $('#link1').removeClass('active');
         $('#link2').removeClass('active');
      });                
   });
</script>
<!-- last 24 ,3days last week dynamically showw js script start-->