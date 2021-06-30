<script src="<?php echo site_url('private/js/ngscript/patient_admission.js')?>"></script>
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="panal-header-title pull-left">
            <h1>Patient Admission</h1>
        </div>
    </div>

    <div class="panel-body" ng-controller="patientAdmissionCrl">
        <form action="" method="post">
            <div class="row">
                
                <div class="col-md-4">
                    <label class="form-label">Date</label>
                    <div class="form-group input-group date" id="datetimepicker1">
                        <input type="text" name="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" placeholder="YYYY-MM-DD">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <label class="form-label">Mobile No</label>
                    <div class="form-group">
                        <input type="text" class="form-control" ng-model="contact" ng-change="patientFn(contact)">
                    </div>
                </div>
                
                <!--patient Information-->
                <div class="col-md-4">
                    <label class="form-label">Name <span class="req">*</span></label>
                    <div class="form-group">
                        <input type="text" name="name" ng-value="patient_info.name" class="form-control" placeholder="Name" required>
                        <input type="hidden" name="pid" ng-value="patient_info.pid">
                    </div>
                </div>
                    
                <div class="col-md-4">
                    <label class="form-label">Age <span class="req">*</span></label>
                    <div class="form-group">
                        <input type="text" ng-value="patient_info.age" name="age" class="form-control" placeholder="Age" required>
                    </div>
                </div>
                    
                <div class="col-md-4">
                    <label class="form-label">Gender</label>
                    <div class="form-group">
                        <select name="gender" ng-model="patient_info.gender" class="form-control">
                            <option>Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                </div>
                    
                <div class="col-md-4">
                    <label class="form-label">Contact Number</label>
                    <div class="form-group">
                        <input type="text" ng-value="patient_info.contact" name="contact" class="form-control" placeholder="Contact Number">
                    </div>
                </div>
                
                <div class="col-md-4">
                    <label class="form-label">Admit Type</label>
                    <div class="form-group">
                        <select name="admit_type" ng-model="admit_type" ng-init="admit_type='cabin'" ng-change="admitTypeFn(admit_type)" class="form-control">
                            <option value="cabin">Cabin</option>
                            <option value="seat">Seat</option>
                        </select>
                    </div>
                </div>
                    
                <div class="col-md-4" ng-show="isSeat">
                    <label class="form-label">Room No</label>
                    <div class="form-group">
                        <select name="room_no" ng-model="room_no" class="form-control" data-show-subtext="true" data-live-search="true">
                            <option value=""></option>
                            <option ng-repeat="item in room_numbers">{{item.room_no}}</option>
                        </select>
                    </div>
                </div>
                    
                <div class="col-md-4" ng-show="isSeat">
                    <label class="form-label">Seat No</label>
                    <div class="form-group">
                        <select name="seat_no" ng-model="seat_no" class="form-control" data-show-subtext="true" data-live-search="true">
                            <option value=""></option>
                            <option ng-repeat="item in seat_numbers" ng-value="item.seat_no">{{item.seat_no}}</option>
                        </select>
                    </div>
                </div>
                    
                <div class="col-md-4" ng-show="isCabin">
                    <label class="form-label">Cabin No</label>
                    <div class="form-group">
                        <select name="cabin_no" ng-model="cabin_no" ng-change="cabinNumberFn(cabin_no)" class="form-control" data-show-subtext="true" data-live-search="true">
                            <option value=""></option>
                            <option ng-repeat="item in cabin_numbers" ng-value="item.cabin_no">{{item.cabin_no}}</option>
                        </select>
                    </div>
                </div>
                    
                <div class="col-md-4">
                    <label class="form-label">Pair</label>
                    <div class="form-group">
                        <input type="text" name="pair" ng-value="price"  class="form-control" placeholder="Per day" readonly>
                    </div>
                </div>
                    
                <div class="col-md-4">
                    <label class="form-label">Day's</label>
                    <div class="form-group">
                        <input type="number" ng-model="days" ng-change="dayCalcuFn(days)" name="days" value="1" min="1" class="form-control" placeholder="Day's">
                    </div>
                </div>
                
                <div class="col-md-4">
                    <label class="form-label">Amount</label>
                    <div class="form-group">
                        <input type="text" ng-model="amount" name="amount" value="0" min="0" class="form-control" readonly>
                    </div>
                </div>
                    
               <div class="col-md-4">
                    <label class="form-label">Paid</label>
                    <div class="form-group">
                        <input type="number" name="paid" ng-change="paidControlFn(paid)" ng-model="paid"  class="form-control">
                    </div>
                </div>
                    
                <div class="col-md-4">
                    <label class="form-label">Due</label>
                    <div class="form-group">
                        <input type="number" name="due" ng-model="due"  class="form-control" readonly>
                    </div>
                </div>
                
                <div class="col-md-12">
                    <label class="form-label">Address</label>
                    <div class="form-group">
                        <textarea class="form-control" rows="4" name="address">{{patient_info.address}}</textarea>
                    </div>
                </div>
                
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Submit">
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="panel-footer">&nbsp;</div>
</div>