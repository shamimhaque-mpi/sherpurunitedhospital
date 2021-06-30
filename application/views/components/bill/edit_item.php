<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title">
                    <h1 class="pull-left">Edit Items</h1>
                </div>
            </div>
            <div class="panel-body">
                <form action="" method="POST" class="form-horizontal print_none" >
                    <div class="row">
                        <div class="col-md-8 col-md-offset-1">
                            <div class="row">
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="name">Name</label>
                                    <div class="col-md-10">
                                        <input type="text" name="name" value="<?=($item->name)?>" id="name" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="price">Price</label>
                                    <div class="col-md-10">
                                        <input type="text" name="price" value="<?=($item->price)?>" id="price" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="status">Status</label>
                                    <div class="col-md-10">
                                        <select name="status" id="status" class="form-control">
                                            <option value="available" <?php echo ($item->status== 'available' ? 'selected' : '')?>>Available</option>
                                            <option value="inavailable" <?php echo ($item->status== 'inavailable' ? 'selected' : '')?>>Inavailable</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="text-right">
                                    <input type="submit" value="Save" class="btn btn-primary">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>