<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" />
<div class="container-fluid">
    <div class="row">
	    <?php echo $this->session->flashdata('confirmation');; ?>

        <div class="panel panel-default" ng-controller="productCtrl">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Add New Product</h1>
                </div>
            </div>

            <div class="panel-body" ng-cloak>
                <?php $attr = array('class' => 'form-horizontal');
	            echo form_open_multipart('', $attr); ?>


                <div class="form-group">
                   <label class="col-md-2 control-label">Company <span class="req">*</span></label>
                   <div class="col-md-5">
                        <select name="brand" class="selectpicker form-control" data-show-subtext="true" data-live-search="true"  required>
                           <option value="" selected disabled>Company</option>
                           <?php if($allBrands != NULL){ foreach ($allBrands as $key => $value) { ?>
                               <option value="<?php echo $value->name;?>"><?php echo $value->name; ?></option>
                           <?php } } ?>
                        </select>
                   </div>
               </div>
                <div class="form-group">
                   <label class="col-md-2 control-label">Category <span class="req">*</span></label>
                   <div class="col-md-5">
                        <select name="category" class="selectpicker form-control" ng-model="product" data-show-subtext="true" data-live-search="true"  required>
                           <option value="" selected disabled>Category</option>
                           <?php if($allcategory != NULL){ foreach ($allcategory as $key => $value) { ?>
                               <option value="<?php echo $value->slug; ?>"><?php echo $value->category  ; ?></option>
                           <?php } } ?>
                        </select>
                   </div>
               </div>



<!-- 
                <div class="form-group">
                    <label class="col-md-2 control-label">Product Name <span class="req">*</span></label>
                    <div class="col-md-5">
                        <input type="text" name="product_name" class="form-control" required>
                    </div>
                </div> -->

                <div class="form-group">
                    <label class="col-md-2 control-label">Product name <span class="req">*</span></label>
                    <div class="col-md-5">
                        <input type="text" name="product_code" class="form-control" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">Purchase Price <span class="req">*</span></label>
                    <div class="col-md-5 input-group">
                        <input type="number" name="production_cost" min="0" value="0" class="form-control" step="any" required>
                        <div class="input-group-addon">TK</div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">Sale Price <span class="req">*</span></label>
                    <div class="col-md-5 input-group">
                        <input type="number" name="sale_price" min="0" value="0" class="form-control" step="any" required>
                        <div class="input-group-addon">TK</div>
                    </div>
                </div>

                <!--div class="form-group">
                   <label class="col-md-2 control-label">Unit <span class="req">*</span></label>
                   <div class="col-md-5">
                        <select name="unit" class="form-control" >
                            <?php  //foreach (config_item('unit') as $key => $value) { ?>
                                <option value="<?php //echo $value; ?>"><?php //echo $value; ?></option>
                            <?php //}  ?>
                        </select>
                   </div>
               </div-->

                <div class="form-group">
                    <label class="col-md-2 control-label"> Specification </label>
                    <div class="col-md-5 input-group">
                      <textarea name="specifition"  class="form-control" rows="5" ></textarea>
                    </div>
                </div>



                <div class="col-md-7">
                    <div class="btn-group pull-right">
                        <input type="submit" value="Save" name="product_add" class="btn btn-primary">
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
