<style>
    @media print{
        .form-group input.form-control, table.table tr td input.form-control { border: 1px solid transparent; }
        #datetimepicker .input-group-addon { display: none !important; }
        table.table tr td, table.table tr th { padding: 1px 4px !important; }
        .panel-body { padding-bottom: 0 !important;padding-top: 0 !important;} 
        .headline { text-align: center;display:flex;justify-content: center;align-items: center; }
        .form-group { margin-bottom: 0 !important;}
        .headline h4 {
            display: inline;
            background: #333 !important;
            color: #fff !important;
            text-transform: uppercase;
            font-weight: bold;
            padding: 5px 25px;
            border-radius: 15px;
        }
        .subtable, .header_table {margin-bottom: 0 !important;}
        .tablewidth {width:130px !important;}
        .width70 { width: auto !important; }
        .width90 { width: auto !important; }
        .width200 { width: auto !important; }
    }
    .fontsize { font-size: 22px; text-transform: uppercase; padding: 0 !important; }
    .width70 { width: 70px; }
    .width90 { width: 90px; }
    .width200 { width: 200px; }
    
    .tablewidth {width:150px;}
    .mb-3 { margin-bottom: 16px !important; }
    .mb-2 { margin-bottom: 8px !important; }
    .p-0 { padding: 0 !important; }
    .pr-2 { padding-right: 8px !important; }
    .width25 { width:25%; float:left; text-align:center; }
    .width50 { width:20%; float:left; text-align:center; }
    .width75 { width:75%; float:left; text-align:center; }
</style>

<div class="container-fluid">
    <div class="row">

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title">
                    <h1 class="pull-left">Semen Analysis Report</h1>
                    <a href="#" class="pull-right" style="margin-top: 0px; font-size: 14px;" onclick="window.print()">
                        <i class="fa fa-print"></i> Print
                    </a>
                </div>
            </div>
            
            <div class="panel-body">
                <!-- Print banner Start Here -->
                <?php $this->load->view('print');
                echo $this->session->flashdata('confirmation');  ?>
                <form action="<?=site_url('reports/mixed_reports/store')?>" method="post" class="form-horizontal">
                <!-- Table Header Start Here -->
                <table class="table table-bordered header_table">
                    <tr>
                        <th class="width200 ">Lab. No.</th>
                        <td>
                            <input type="text" name="patient[lab_no]" class="none form-control input_data" placeholder="Enter Patient Lab No." value="">
                            <span class="hide text-center"></span>
                        </td>
                        <th class="width90 ">Gender</th>
                        <td class="width200">
                            <input type="text" name="patient[gender]" class="none form-control input_data" placeholder="Enter Gender Age" value="">
                            <span class="hide text-center"></span>
                        </td>
                        <th class="width70 ">Age</th>
                        <td class="width200">
                            <input type="text" name="patient[age]" class="none form-control input_data" placeholder="Enter Patient Age" value="">
                            <span class="hide text-center"></span>
                        </td>
                    </tr>
                    <tr>
                        <th class="">Patient Name</th>
                        <td colspan="3">
                            <input type="text" name="patient[name]" class="none form-control input_data" placeholder="Enter Patient Name" value="">
                            <span class="hide text-center"></span>
                        </td>
                        <th class="">Date</th>
                        <td>
                            <input type="date" name="patient[date]" class="none form-control input_data" placeholder="Date" value="">
                            <span class="hide text-center"></span>
                        </td>
                    </tr>
                    <tr>
                        <th class="">Refd: BY Dr./Prof.</th>
                        <td colspan="5">
                            <input type="text" name="patient[refd_doctor]" class="none form-control input_data" placeholder="Enter Patient Dr/Prof Name" value="">
                            <span class="hide text-center"></span>
                        </td>
                    </tr>
                </table>
                <!-- Table Header End Here -->
                
                <!-- Table Headline Start Here -->
                <div class="headline">
                    <h4 class="hide text-center" style="margin-top: 10px;">Semen Analysis Report</h4>
                </div>
                <!-- Table Headline End Here -->
                
                <!-- Main Table Start Here -->
                <div class="row">
                    <div class="col-xs-6">
                        <table class="table table-bordered">
                            <tr>
                                <td width="40" class="text-center none"><input type="checkbox" class="checked1_all" value="all" ></td>
                                <th colspan="2" class="text-center fontsize">Semen Analysis</th>
                            </tr>
                            <tr>
                                <td class="text-center none"><input type="checkbox" class="chackbox1" value="Sample_Collection" name="test[Collection]" ></td>
                                <th>Sample Collection</th>
                                <td>
                                    <input type="text" class="none form-control input_data" placeholder="" name="result[Collection]" value="">
                                    <span class="hide text-center"></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center none"><input type="checkbox" class="chackbox1" value="Time_of_Ejaculation" name="test[Ejaculation]" ></td>
                                <th>Time of Ejaculation</th>
                                <td>
                                    <input type="text" class="none form-control input_data" placeholder="" name="result[Ejaculation]" value="">
                                    <span class="hide text-center"></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center none"><input type="checkbox" class="chackbox1" value="Time_of_Examination" name="test[Exami]" ></td>
                                <th>Time of Examination</th>
                                <td>
                                    <input type="text" class="none form-control input_data" placeholder="" name="result[Exami]" value="">
                                    <span class="hide text-center"></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center none"><input type="checkbox" class="chackbox1" value="Period_of_Abstinence" name="test[Period]" ></td>
                                <th>Period of Abstinence</th>
                                <td>
                                    <input type="text" class="none form-control input_data" placeholder="" name="result[Period]" value="">
                                    <span class="hide text-center"></span>
                                </td>
                            </tr>
                        </table>
                        
                        <table class="table table-bordered">
                            <tr>
                                <td width="40" class="text-center none"><input type="checkbox" class="checked2_all" value="all" ></td>
                                <th colspan="2" class="text-center fontsize">Chemical Examination</th>
                            </tr>
                            <tr>
                                <td class="text-center none"><input type="checkbox" class="chackbox2" value="Reaction" name="test[Reaction]" ></td>
                                <th>Reaction</th>
                                <td>
                                    <input type="text" class="none form-control input_data" placeholder="" name="result[Reaction]" value="">
                                    <span class="hide text-center"></span>
                                </td>
                            </tr>
                        </table>
                    </div>
                    
                    <div class="col-xs-6">
                        <table class="table table-bordered">
                            <tr>
                                <td width="40" class="text-center none"><input type="checkbox" class="checked3_all" value="all" ></td>
                                <th colspan="2" class="text-center fontsize">Physical Examination</th>
                            </tr>
                            <tr>
                                <td class="text-center none"><input type="checkbox" class="chackbox3" value="Volume" name="test[Volume]" ></td>
                                <th>Volume</th>
                                <td>
                                    <input type="text" class="none form-control input_data" placeholder="" name="result[Volume]" value="">
                                    <span class="hide text-center"></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center none"><input type="checkbox" class="chackbox3" value="Colour" name="test[Colour]" ></td>
                                <th>Colour</th>
                                <td>
                                    <input type="text" class="none form-control input_data" placeholder="" name="result[Colour]" value="">
                                    <span class="hide text-center"></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center none"><input type="checkbox" class="chackbox3" value="Odour" name="test[Odour]" ></td>
                                <th>Odour</th>
                                <td>
                                    <input type="text" class="none form-control input_data" placeholder="" name="result[Odour]" value="">
                                    <span class="hide text-center"></span>
                                </td>
                            </tr>
                        </table>
                        
                        <table class="table table-bordered">
                            <tr>
                                <td width="40" class="text-center none"><input type="checkbox" class="checked4_all" value="all" ></td>
                                <th colspan="2" class="text-center fontsize">Microscopic Examination</th>
                            </tr>
                            <tr>
                                <td class="text-center none"><input type="checkbox" class="chackbox4" value="Sperm_Count" name="test[Sperm]" ></td>
                                <th>Sperm Count</th>
                                <td>
                                    <input type="text" class="none form-control input_data" placeholder="" name="result[Sperm]" value="">
                                    <span class="hide text-center"></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center none"><input type="checkbox" class="chackbox4" value="Pus_Cells" name="test[Pus_Cells]" ></td>
                                <th>Pus Cells</th>
                                <td>
                                    <input type="text" class="none form-control input_data" placeholder="" name="result[Pus_Cells]" value="">
                                    <span class="hide text-center"></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center none"><input type="checkbox" class="chackbox4" value="Epithelial_Cells" name="test[Epithelial]" ></td>
                                <th>Epithelial Cells</th>
                                <td>
                                    <input type="text" class="none form-control input_data" placeholder="" name="result[Epithelial]" value="">
                                    <span class="hide text-center"></span>
                                </td>
                            </tr>
                        </table>
                    </div>
                    
                    
                    <div class="col-xs-12">
                        <table class="table table-bordered">
                            <tr>
                                <th width="250" class="text-center fontsize">Comment</th>
                                <td>
                                    <input type="text" class="none form-control input_data" placeholder="" name="patient[comments]" value="">
                                    <span class="hide text-center"></span>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-xs-12">
                        <div class="btn-group none pull-right">
                            <input type="hidden" name="patient[type]" value="semen">
                            <input type="submit" value="Submit" class="btn btn-success">
                        </div>
                    </div>
                </div>
                <!-- Main Table Start Here -->
                <!-- signature style Start Here -->
                <div class="row">
                    <div class="signature">
                        <div class="col-sm-9 col-xs-8">
                            
                        </div>
                        <div class="col-sm-3 col-xs-4">
                            <h4 style="margin-top: 80px;" class="text-center print-font">
                                ------------------------------ <br>
                                signature
                            </h4>
                        </div>
                    </div>
                </div>
                <!-- signature style End Here -->
                </form>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>

    </div>
</div>
<script>
    window.addEventListener('load', ()=>{
        let input_data = document.querySelectorAll('.input_data');
        (Object.values(input_data)).forEach((x)=>{
            x.addEventListener('input', ()=>{
                (x.nextElementSibling).innerText = x.value;
            });
        });
        
        let checked1_all = document.querySelector('.checked1_all');
        let checked2_all = document.querySelector('.checked2_all');
        let checked3_all = document.querySelector('.checked3_all');
        let checked4_all = document.querySelector('.checked4_all');
        
        let checked1 = Object.values(document.querySelectorAll('.chackbox1'));
        let checked2 = Object.values(document.querySelectorAll('.chackbox2'));
        let checked3 = Object.values(document.querySelectorAll('.chackbox3'));
        let checked4 = Object.values(document.querySelectorAll('.chackbox4'));
        
        checked1_all.addEventListener('click', ()=>{
            (checked1).forEach((x)=>{
                if(checked1_all.checked==true){
                    x.checked = true;
                    x.closest('tr').classList.remove('none');
                    x.closest('.table').classList.remove('none');
                }
                else{
                   x.checked = false; 
                   x.closest('tr').classList.add('none');
                   x.closest('.table').classList.add('none');
                }
            });
        });
        (checked1).forEach((x)=>{
            x.closest('tr').classList.add('none');
            x.closest('.table').classList.add('none');
            x.addEventListener('click', ()=>{
                if(x.checked==true){
                    x.closest('tr').classList.remove('none');
                }
                else{
                    x.closest('tr').classList.add('none');
                }
                
                var table1 = false;
                (checked1).forEach((x)=>{
                    if(x.checked==true){
                        table1 = true;
                    }
                });
                if(table1){
                    x.closest('.table').classList.remove('none');
                }
                else{
                    x.closest('.table').classList.add('none');
                }
            });
        });
        
        
        checked2_all.addEventListener('click', ()=>{
            (checked2).forEach((x)=>{
                if(checked2_all.checked==true){
                    x.checked = true;
                    x.closest('tr').classList.remove('none');
                    x.closest('.table').classList.remove('none');
                }
                else{
                   x.checked = false; 
                   x.closest('tr').classList.add('none');
                   x.closest('.table').classList.add('none');
                }
            });
        });
        (checked2).forEach((x)=>{
            x.closest('tr').classList.add('none');
            x.closest('.table').classList.add('none');
            x.addEventListener('click', ()=>{
                if(x.checked==true){
                    x.closest('tr').classList.remove('none');
                }
                else{
                    x.closest('tr').classList.add('none');
                }
                
                var table2 = false;
                (checked2).forEach((x)=>{
                    if(x.checked==true){
                        table2 = true;
                    }
                });
                if(table2){
                    x.closest('.table').classList.remove('none');
                }
                else{
                    x.closest('.table').classList.add('none');
                }
            });
        });
        
        
        
        checked3_all.addEventListener('click', ()=>{
            (checked3).forEach((x)=>{
                if(checked3_all.checked==true){
                    x.checked = true;
                    x.closest('tr').classList.remove('none');
                    x.closest('.table').classList.remove('none');
                }
                else{
                   x.checked = false; 
                   x.closest('tr').classList.add('none');
                   x.closest('.table').classList.add('none');
                }
            });
        });
        (checked3).forEach((x)=>{
            x.closest('tr').classList.add('none');
            x.closest('.table').classList.add('none');
            x.addEventListener('click', ()=>{
                if(x.checked==true){
                    x.closest('tr').classList.remove('none');
                }
                else{
                    x.closest('tr').classList.add('none');
                }
                
                var table3 = false;
                (checked3).forEach((x)=>{
                    if(x.checked==true){
                        table3 = true;
                    }
                });
                if(table3){
                    x.closest('.table').classList.remove('none');
                }
                else{
                    x.closest('.table').classList.add('none');
                }
            });
        });
        
        checked4_all.addEventListener('click', ()=>{
            (checked4).forEach((x)=>{
                if(checked4_all.checked==true){
                    x.checked = true;
                    x.closest('tr').classList.remove('none');
                    x.closest('.table').classList.remove('none');
                }
                else{
                   x.checked = false; 
                   x.closest('tr').classList.add('none');
                   x.closest('.table').classList.add('none');
                }
            });
        });
        (checked4).forEach((x)=>{
            x.closest('tr').classList.add('none');
            x.closest('.table').classList.add('none');
            
            x.addEventListener('click', ()=>{
                if(x.checked==true){
                    x.closest('tr').classList.remove('none');
                }
                else{
                    x.closest('tr').classList.add('none');
                }
                
                var table4 = false;
                (checked4).forEach((x)=>{
                    if(x.checked==true){
                        table4 = true;
                    }
                });
                if(table4){
                    x.closest('.table').classList.remove('none');
                }
                else{
                    x.closest('.table').classList.add('none');
                }
            });
        });
        
        
        
        
    });
</script>