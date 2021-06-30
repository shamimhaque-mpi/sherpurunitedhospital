<div class="col-md-8">
   <div class="row wrapper">
      <h2 class="color"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> &nbsp; Latest Problem / SCAM</h2>
         <img src="<?php echo site_url('public/img/ads/4393.gif'); ?>" alt="" style="width: 100%; height: 90px;">
   
             <?php if($latest_scam != NULL){ ?>
             <!--pre><?php print_r($latest_scam);?></pre-->
             <div class="added"> 
               <table class="table table-hover table-responsive">
                  <?php 
                    $nowtime=strtotime(date('Y-m-d H:i:s'));
                    foreach ($latest_scam as $key => $value) { 
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
