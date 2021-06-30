<div class="col-md-8" ng-controller="MarkedCtrl">
   <div class="row wrapper">
      <h2 class="color"><i class="fa fa-shopping-basket" aria-hidden="true"></i> &nbsp; Marked</h2>
      <img src="<?php echo site_url('public/img/ads/4393.gif'); ?>" alt="" style="width: 100%; height: 90px;">
      <!-- main content area -->
      <div class="content-area"> 
         <h4 class="text-center">You didn't mark any HYIP.</h4 class="text-center">
      </div>
      <!-- main content area end-->

      <!-- added -->
      <div class="added">
         <table class="table table-hover table-responsive" id="info">
            <tr ng-repeat="item in resultset" ng-class="{'marked': checkMarkedFn(item.id)}">
               <td class="img-heigt" ng-click="go_to(item.id)">
                  <span><i class="fa fa-heart" aria-hidden="true"></i></span>
                  <img ng-src="<?php echo site_url(); ?>{{ item.path }}" alt="Logo not found!">
               </td>

               <td ng-click="go_to(item.id)">
                  <p>{{ item.title }}</p>
                  <p>{{ item.url }}</p>
               </td>

               <td ng-click="go_to(item.id)">{{ item.discussions }}</td>

               <td ng-click="go_to(item.id)">{{ item.created_at | inHours }} &nbsp; hour(s)</td>

               <td style="color: #0E9C50;" ng-click="go_to(item.id)">{{ item.status }}</td>

               <td class="marked-list">
                  (1) 
                  <span id="click-marked" ng-click="addFavoriteFn(item.id)">
                    {{ conditionalTextFn(item.id) }}
                  </span>  
               </td>
            </tr>
         </table>
      </div>
      <!-- added end -->
      
      <!-- footer add -->
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
