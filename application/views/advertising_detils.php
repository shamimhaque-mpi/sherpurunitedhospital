</div>

   </div>
</section>
<!-- Header section ende -->
<!-- Main content start -->
<section class="container"> 
   <div class="row">
      <aside class="col-md-2">
         <div class="row">
            <div class="small-add"> 
               <h3>Advertising</h3>

               <?php if($allLeftAds != null){ ?>
               <div class="add-area"> 
                  <?php foreach($allLeftAds as $key => $row){ ?>
                  <a href="<?php echo $row->target_url; ?>" target="_blank">
                     <img src="<?php echo site_url($row->banner_url); ?>">
                  </a>
                  <?php } ?>
               </div>
               <?php } ?>

               <div class="singlae-add"> 
               <hr>
               <i class="fa fa-shopping-bag" aria-hidden="true"></i> &nbsp; <a href="#" title=""> Buy ads here</a>
               </div>
            </div>
         </div>
       
      </aside>
<div class="col-md-8">
   <div class="row wrapper">
      <h2 class="color">
         <p class="right-title"><i class="fa fa-clock-o fa-2x" aria-hidden="true"></i> &nbsp; 0 days</p>
         
      </h2>
      <!-- main content area -->
      <div class="content-area">

         <!-- ads details title start -->
         <div class="ad-details-title clearfix">
            <div class="clearfix"> 
               <div class="col-sm-8 col-xs-10 row">
                  <a href="#">
                     <img src="<?php echo site_url($result[0]->path); ?>">
                     <h3><?php echo $result[0]->title; ?></h3>
                     <h4><?php echo $result[0]->url; ?></h4>
                  </a>
               </div>

               <div class="col-sm-4 col-xs-2 row clearfix">
                  <h4 class="check"><?php echo $result[0]->status; ?></h4>
               </div>
            </div>

            <!-- ads info table start-->
            <table class="table ads-info-table">
               <tr>
                  <td>Plans</td>
                  <td><?php echo $result[0]->plans; ?></td>
               </tr>

               <tr>
                  <td>Discussions </td>
                  <td><a href="#"><?php echo $result[0]->discussions; ?></a></td>
               </tr>
               <tr>
                  <td>Hosting provider</td>
                  <td><a href="#"><?php echo $result[0]->hosting_provoder; ?></a></td>
               </tr>
               <tr>
                  <td>IP</td>
                  <td><a href="#"><?php echo $result[0]->ip; ?></a></td>
               </tr>
               <tr>
                  <td>Registrar</td>
                  <td><a href="#"><?php echo $result[0]->domain_registrar; ?></a></td>
               </tr>
               <tr>
                  <td>NS</td>
                  <td style="border-bottom: none;">
                     <a href="#"><?php echo $result[0]->ns; ?></a>
                  </td>
               </tr>
            </table>
            <!-- ads info table end -->
         </div>
         <!-- ads details title end -->

         <img src="<?php echo site_url('public/img/ads/4393.gif'); ?>" alt="">
      </div>
      <!-- main content area end-->
     
      <div class="footer-add">
         <img src="<?php echo site_url('public/img/ads/4469.gif'); ?>" alt="">
      </div>
     <!-- footer add end-->
     
      <!-- footer item list end -->
   </div>
   <!-- footer add -->
   <div class="footer-add footer-wrapper">
      <img src="<?php echo site_url('public/img/ads/4477.gif'); ?>" alt="">
   </div>
   <!-- footer add end-->
</div> 
<aside class="col-md-2">
         <div class="row">
           <div class="small-add"> 
               <h3>Advertising</h3>

               <?php if($allRightAds != null){ ?>
               <div class="add-area"> 
                  <?php foreach($allRightAds as $key => $row){ ?>
                  <a href="<?php echo $row->target_url; ?>" target="_blank">
                     <img src="<?php echo site_url($row->banner_url); ?>">
                  </a>
                  <?php } ?>
               </div>
               <?php } ?>
               
               <div class="singlae-add like-area"> 
                  <hr>
                  <img src="<?php echo site_url('public/img/ads/likeus.png'); ?>" alt="">
                  
                  <!-- like Count -->
                  <div class="like-count"> 
                     <a class="btn btn-primary"><i class="fa fa-thumbs-up" aria-hidden="true"></i></a>
                     <a class="btn btn-primary bg"><span>120k</span></i></a>
                  </div>
                  <!-- like Count End -->

               </div>

            </div>
         </div>
      </aside>
   </div>
</section>
<!-- Main content end -->