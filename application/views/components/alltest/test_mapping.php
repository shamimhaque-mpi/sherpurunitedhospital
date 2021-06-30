<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" />
<style>
    .hr {border-bottom:1px solid #ddd;}
    .testbox {
        width: 100%;
        max-height: 67vh;
        height: 100%;
        min-height: 36vh;
        border: 1px solid #ddd;
        overflow-x: hidden;
        overflow-y: auto;
        padding: 5px;
    }
    .box {
        width: 100%;
        position: relative;
        line-height: 30px;
        border: 1px solid #ddd;
        padding-left: 11%;
        cursor: pointer;
        transition: all 0.3s ease-in-out;
        box-sizing: border-box;
    }
    .box .checkbox {
        width: 10%;
        height: 105%;
        border: 1px solid #ddd;
        position: absolute;
        top: -11px;
        left: -1px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .box .checkbox input {
        margin: 0 !important;
    }
    .box.color {
        background: rgba(56, 142, 60, 0.4);
        color: #222;
        font-weight: bold;
    }
    .header {
        background: #ddd;
        width: 100%;
    }
    .header h3 {
        line-height: 40px;
        padding-left: 15px;
        margin: 0 0 5px 0;
    }
    .btn-group {margin-top:15px;}
    .d_flex_b {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .d_flex_b input {
        height: 30px;
        border: 1px solid #ababab;
        margin-right: 7px;
        border-radius: 4px;
        outline: none;
        padding: 5px;
    }
    .d-none {
        display: none;
    }
</style>
<div class="container-fluid">
    <div class="row">
	<?php echo $this->session->flashdata('confirmation'); ?>
        <form action="" method="POST">
            <div class="panel panel-default">
                <div class="panel-heading panal-header">
                    <div class="panal-header-title pull-left">
                        <h1>Test Mapping</h1>
                    </div>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-6 search-area">
                            <div class="header d_flex_b">
                                <h3>All Test <small>(Select Test)</small></h3>
                                <input type="search" class="search" placeholder="Search Your Content...">
                            </div>
                            <div class="testbox">
                                <?php
                                    $test = $this->action->readGroupBy('test', 'id', ['trash'=>0], 'position', 'ASC');
                                    foreach($test as $key=>$test){ ?>
                                    <label class="box">
                                        <span class="checkbox">
                                            <input class="checkit alltest" type="radio" name="test_id" value="<?=($test->id)?>">
                                        </span>
                                        <span class="finding"><?=($test->test_name)?></span>
                                    </label>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="col-sm-6 search-area">
                            <div class="header d_flex_b">
                                <h3>All Parameter <small>(Select Parameter)</small></h3>
                                <input type="search" class="search2" placeholder="Search Your Content...">
                            </div>
                            <div class="testbox">
                            <?php  $parameters = $this->action->readGroupBy('parameter', 'id', ['trash'=>0], 'position', 'ASC');
                            foreach($parameters as $key=>$parameter){ ?>
                                <label class="box">
                                    <span class="checkbox">
                                        <input class="checkit" type="checkbox" name="parameter_id[]" value="<?=($parameter->id)?>">
                                    </span>
                                    <span class="finding"><?=($parameter->parameter_name)?></span>
                                </label>
                            <?php } ?>
                            </div> 
                        </div>
                        <div class="col-sm-12">
                            <div class="btn-group pull-right">
                                <input type="submit" value="Save" class="btn btn-success">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">&nbsp;</div>
            </div>
        </form>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>

<script type="text/javascript" src="<?=site_url('public/js/mapping.js')?>"></script>
<script>
    var mapping = new Mapping();
    mapping.testMapping("<?=(site_url('alltest/test_mapping/getTestMapping'))?>");
    mapping.search('.search', '.search-area', '.finding', '.box');
    mapping.search('.search2', '.search-area', '.finding', '.box');
</script>