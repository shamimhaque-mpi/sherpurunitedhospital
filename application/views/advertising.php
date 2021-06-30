</div>
</div>
</section>
<!-- Header section ende -->
<!-- Main content start -->
<section class="container" ng-controller="AdvertisingCtrl">
   <div class="row">

       <!-- left aside start -->
       <aside class="col-md-2">

         <div class="row">
            <div class="small-add clearfix">
               <h3>Advertising</h3>
               <div class="add-area clearfix">
                  <?php
                  if($allLeftAds != null){
                    foreach ($allLeftAds as $key => $row) {
                      $addClass = "available";                       

                      if($row->status == 'Pending' || $row->status == 'Active'){
                        $addClass = "not-available";                          
                      }
                  ?>
                  <a class="aside-ad <?php echo $addClass; ?>"
                    title="<?php echo $row->ads_id; ?>"
                    data-position="<?php echo $row->ads_position; ?>"
                    data-size="<?php echo $row->size; ?>"
                    data-price="<?php echo $row->price; ?>"
                    data-id="<?php echo $row->ads_id; ?>"
                    data-status="<?php echo $row->status; ?>"
                    ng-click="adsFormFn($event)">

                    $<?php echo $row->price; ?>/week <br>
                    <?php if($row->expire > date('Y-m-d')){
                      $date = new DateTime($row->expire); 
                      echo 'Expire ' . $date->format('M, j');
                    } else { echo "Static"; }                           
                    ?>
                  </a>
                 <?php }} ?>
               </div>


               <div class="divided">&nbsp;</div>
               <div class="singlae-add">
                   <hr><i class="fa fa-shopping-bag" aria-hidden="true"></i> &nbsp;
                   <a href="#" title=""> Buy ads here</a>
               </div>
            </div>
         </div>
      </aside>
      <!-- left aside end -->




<!-- advertising -->
<div class="col-md-8">
   <div class="row wrapper">
      <h2 class="color">
         <i class="fa fa-briefcase" aria-hidden="true"></i>
          &nbsp; Advertising
      </h2>

      <!-- Top banner -->
      <div class="advertising-banner">
         <p class="text-center">Not available. Expires Dec, 27</p>
      </div>
      <!-- Top banner end-->

      <!-- advertising Conent start -->
        <div class="advertising-content">
          <div class="ad-wrapper" ng-if="instruction">
            <h3 style="text-align: center;">
              Please select the desired green place for your banner.
            </h3>
          </div>

            <div class="ad-wrapper" ng-if="status=='Blank'">
               <h3 class="text-center">{{ position }} {{ size }} static banner</h3>
               <?php echo $confirmation; ?>
               <div class="adselling-info">
                  <p>We accept Perfect Money only. <br>
                     We can deny showing advertisements to fraudulent programs, phishing sites, as well as sites promoting violence and child pornography. <br>
                     All payments for the advertising are non-refundable. <br><br>

                     We may add our reflink to the URL. <br><br>

                     Maximum banner size: 200 kb
                  </p>

                  <?php $attr = array("class"=>"form-area form-horizontal"); ?>
                  <?php echo form_open_multipart("", $attr); ?>                  
                      <div class="form-group">
                        <label class="control-label col-sm-4 col-xs-12" for="period">Period: </label>
                        <div class="col-sm-6 col-xs-8">
                          <select required name="duration" ng-model="duration">
                              <option value="1">1 Week</option>
                              <option value="2">2 Weeks</option>
                              <option value="3">3 Weeks</option>
                              <option value="4">4 Week</option>
                          </select>
                        </div>

                        <div class="col-sm-2 col-xs-4">
                          <span><i class="fa fa-check sucess" aria-hidden="true"></i></span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-sm-4 col-xs-12" for="period">For {{ duration * 7 }} days: </label>
                        <div class="col-sm-6 col-xs-8">
                          <input type="text" name="price" ng-value="caculatePriceFn(duration, price)" readonly />
                        </div>
                        <div class="col-sm-2 col-xs-4">
                          <span><i class="fa fa-check sucess" aria-hidden="true"></i></span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-sm-4 col-xs-12" for="period">{{ size }} banner: </label>
                        <div class="col-sm-6 col-xs-8">
                          <input type="file" name="banner" id="" required />
                        </div>
                        <div class="col-sm-2 col-xs-4">
                          <span><i class="fa fa-times" aria-hidden="true"></i></span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-sm-4 col-xs-12" for="period">Target URL: </label>
                        <div class="col-sm-6 col-xs-8">
                          <input type="text" name="http" id="" required placeholder="htpp://" />
                        </div>
                        <div class="col-sm-2 col-xs-4">
                          <span><i class="fa fa-times" aria-hidden="true"></i></span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-sm-4 col-xs-12" for="period">Email: </label>
                        <div class="col-sm-6 col-xs-8">
                          <input type="email" name="email" id="" required placeholder="email" />
                        </div>
                        <div class="col-sm-2 col-xs-4">
                          <span><i class="fa fa-times" aria-hidden="true"></i></span>
                        </div>
                      </div>


                      <div>
                        <div class="form-group">
                          <strong>N.B.</strong>
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-sm-4 col-xs-12" for="period">Name: </label>
                          <div class="col-sm-6 col-xs-8">
                            <input type="text" name="name" required placeholder="Enter Name" />
                          </div> 
                        </div>

                        <div class="form-group">
                          <label class="control-label col-sm-4 col-xs-12" for="period">Id: </label>
                          <div class="col-sm-6 col-xs-8">
                            <input type="text" name="id" required placeholder="ID" />
                          </div> 
                        </div>

                        <div class="form-group">
                          <label class="control-label col-sm-4 col-xs-12" for="period">Screenshot</label>
                          <div class="col-sm-6 col-xs-8">
                            <input type="file" name="screenshot" id="" required />

                            <input type="hidden" name="position" ng-value="position" />
                            <input type="hidden" name="ads_id" ng-value="id" />
                          </div>
                        </div>

                        <div class="text-center" style="margin: 60px 10px 0px auto;"> 
                          <input type="submit" name="submit" value="Save" class="btn btn-info sub-btn">
                        </div>
                      </div>        
                    <?php echo form_close(); ?>
               </div>
            </div>

            <div class="ad-wrapper">
              <!-- See previous advertising statistic start -->
              <div class="previous-advertising-link">
                <a href="<?php echo site_url('home/last_expired_banners'); ?>">
                  See previous advertising statistic
                </a>
              </div>
              <!-- See previous advertising statistic start end-->

            </div>
              <!-- width problem -->
              <div class="adver-ad-banner">
                <a href="#" title="">
                  <h3>$55/week</h3>
                  <p>Available slots: 8/10</p>
                </a>
              </div>
        </div>
      <!-- advertising Conent end -->

   </div>

    <div class="adver-ad-banner footer-wrapper adver-width">
      <a href="#" title="">
        <h3>$55/week</h3>
        <p>Available slots: 8/10</p>
      </a>
    </div>
</div>





    <!-- right aside start -->
    <aside class="col-md-2">
         <div class="row">
           <div class="small-add clearfix">
               <h3>Advertising</h3>

               <div class="add-area">
                   <?php
                   if($allRightAds != null){
                      foreach ($allRightAds as $key => $row) {
                        $addClass = "available";                         

                        if($row->status == 'Pending' || $row->status == 'Active'){
                          $addClass = "not-available";
                        }
                   ?>
                   <a class="aside-ad <?php echo $addClass; ?>"
                    title="<?php echo $row->ads_id; ?>"
                    data-position="<?php echo $row->ads_position; ?>"
                    data-size="<?php echo $row->size; ?>"
                    data-price="<?php echo $row->price; ?>"
                    data-id="<?php echo $row->ads_id; ?>"
                    data-status="<?php echo $row->status; ?>"
                    ng-click="adsFormFn($event)">

                    $<?php echo $row->price; ?>/week <br>
                    <?php if($row->expire > date('Y-m-d')){
                      $date = new DateTime($row->expire); 
                      echo 'Expire ' . $date->format('M, j');
                    } else { echo "Static"; }                           
                    ?>
                  </a>
                  <?php }} ?>


               <div class="divided">&nbsp;</div>
               <div class="singlae-add like-area">
                  <hr><img src="<?php echo site_url('public/img/ads/likeus.png'); ?>" alt="">
                  <!-- like Count -->
                  <div class="like-count">
                     <a class="btn btn-primary"><i class="fa fa-thumbs-up" aria-hidden="true"></i></a>
                     <a class="btn btn-primary bg"><span>120k</span></a>
                  </div>
                  <!-- like Count End -->
               </div>
            </div>
         </div>
      </aside>
      <!-- right aside end -->


   </div>
</section>
<!-- Main content end -->