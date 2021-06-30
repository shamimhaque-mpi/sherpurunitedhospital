<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" />
<div class="container-fluid">
    <div class="row">

        <?php echo $confirmation; ?>
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Edit Product </h1>
                </div>
            </div>

            <div class="panel-body">
                <div class="row">

                    <div class="col-md-12">
                        <?php
                        $attr = array('class' =>'form-horizontal');
                        echo form_open_multipart('product/product/editProduct/'.$products[0]->id, $attr);
                        ?>
                      
                        
                <div class="form-group">
                   <label class="col-md-2 control-label">Company </label>
                   <div class="col-md-5">
                        <select name="brand" class="selectpicker form-control" data-show-subtext="true" data-live-search="true">
                            <option value="" selected disabled>Company</option>
                            <?php 
                                if($allBrands != NULL){ 
                                foreach ($allBrands as $key => $value) { ?>
                           	
                                    <option <?php if($products[0]->brand == $value->name){echo "selected";} ?> value="<?php echo $value->name;?>"><?php echo $value->name; ?></option>
                                <?php } } ?>
                        </select>
                   </div>
               </div>
                
                <div class="form-group">
                   <label class="col-md-2 control-label">Category </label>
                   <div class="col-md-5">
                        <select name="category" class="form-control"  data-show-subtext="true" data-live-search="true">
                           <?php if($allcategory != NULL){ foreach ($allcategory as $key => $value) { ?>
                               <option <?php if($products[0]->category == $value->slug){echo "selected";} ?>  value="<?php echo $value->slug; ?>"><?php echo $value->category; ?></option>
                           <?php } } ?>
                        </select>
                   </div>
               </div>


<!-- 

                <div class="form-group">
                    <label class="col-md-2 control-label">Product Name </label>
                    <div class="col-md-5">
                        <input type="text" name="product_name" class="form-control" value="<?php echo $products[0]->name; ?>" required>
                    </div>
                </div> -->

                <div class="form-group">
                    <label class="col-md-2 control-label">Product name</label>
                    <div class="col-md-5">
                        <input type="text" name="product_code" class="form-control" value="<?php echo $products[0]->model; ?>" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">Purchase Price </label>
                    <div class="col-md-5 input-group">
                        <input type="number" name="production_cost" min="0"  class="form-control" step="any" value="<?php echo $products[0]->purchase_price; ?>">
                        <div class="input-group-addon">TK</div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">Sale Price </label>
                    <div class="col-md-5 input-group">
                        <input type="number" name="sale_price" min="0" class="form-control" step="any" value="<?php echo $products[0]->sale_price; ?>">
                        <div class="input-group-addon">TK</div>
                    </div>
                </div>
                

                <div class="form-group">
                    <label class="col-md-2 control-label"> Specification </label>
                    <div class="col-md-5 input-group">
                      <textarea name="specifition"  class="form-control" rows="5" ><?php echo $products[0]->remarks; ?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label"></label>
                    <div class="col-md-5 input-group">
                       <input type="submit"  value="Update" name="update" class="btn btn-primary pull-right">
                    </div>
                </div>

		<?php echo form_close(); ?>
                    </div>
                </div>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>