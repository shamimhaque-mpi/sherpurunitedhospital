            <div class="container-fluid">
                <div class="row">

                <!-- horizontal form -->
                <?php
                echo $confirmation;
                $attribute = array(
                    'name' => '',
                    'class' => 'form-horizontal',
                    'id' => ''
                );
                echo form_open_multipart('', $attribute);
                ?>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="panal-header-title pull-left">
                                <h1>Create An Account</h1>
                            </div>
                        </div>

                        <div class="panel-body no-padding">

                        
                        <div class="no-title">&nbsp;</div>

                            <!-- left side -->
                            <aside class="col-md-3">
                                <!--div class="border-top">&nbsp;</div-->
                                
                                
                                <figure class="profile-pic">
                                    <img src="<?php echo site_url("private/images/pic-male.png"); ?>" alt="Photo not found!" class="img-responsive">
                                </figure>

                                <div class="profile-upload">    
                                    
                                    <label class="btn btn-primary" style="display: block;" for="image"><i class="fa fa-cloud-upload"></i> Upload</label>
                                    <input type="file" name="image" id="image" style="display: none;">
                                </div> <br/>

                                <!--table class="table table-status">
                                    <tbody>
                                        <tr>
                                            <td style="width: 60%">Status</td>
                                            <td><span class="status">Active</span></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 60%">User Rating</td>
                                            <td>
                                                <i class="fa fa-star co-yellow"></i>
                                                <i class="fa fa-star co-yellow"></i>
                                                <i class="fa fa-star co-yellow"></i>
                                                <i class="fa fa-star co-yellow"></i>
                                                <i class="fa fa-star co-yellow"></i>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 60%">Member Since</td>
                                            <td>June 07, 2016 </td>
                                        </tr>
                                    </tbody>
                                </table-->
                            </aside>


                            <div class="col-md-9">

                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label">Full Name</label>
                                    <div class="col-md-7">
                                        <input class="form-control" type="text" name="f_name" placeholder="full name">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label">Mobile/ Phone</label>
                                    <div class="col-md-7">
                                        <input type="text" name="mobile" class="form-control" placeholder="mobile phone">
                                    </div>
                                </div>
                            
                            
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label">Email</label>
                                    <div class="col-md-7">
                                        <input type="email" name="email" class="form-control" placeholder="email@yourcompany.com">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label">Username</label>
                                    <div class="col-md-7">
                                        <input type="text" name="username" class="form-control" placeholder="username">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label">Password</label>
                                    <div class="col-md-7">
                                        <input class="form-control" type="password" name="password" placeholder="password">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label">Confirm Password</label>
                                    <div class="col-md-7">
                                        <input class="form-control" type="password" name="confirmPassword" placeholder="confirm password">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label">Privilege</label>
                                    <div class="col-md-7">
                                        <select name="privilege" class="form-control">
                                            <option value="">-- Choose Your Option --</option>
                                            <option value="super">Super</option>
                                            <option value="admin">Admin</option>
                                            <option value="user">User</option>
                                        </select>
                                    </div>
                                </div>
                                    
                                <div class="form-group">
                                    <label class="col-md-3 control-label"></label>
                                    <div class="col-md-7">
                                        <div class="btn-group pull-right">
                                            <input class="btn btn-primary" type="submit" name="createProfileBtn" value="Save">
                                            <input class="btn btn-danger" type="reset" value="Clear">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel-footer">&nbsp;</div>
                    </div>

                    <?php echo form_close(); ?>
                </div>
            </div>

