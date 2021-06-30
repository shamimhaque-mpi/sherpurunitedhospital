<!DOCTYPE HTML>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title></title>
        <link rel="icon" href="" type="image/png">

        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">
        <link href="<?php echo site_url('private/css/login.min.css'); ?>" rel="stylesheet">
        
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

	    <style>
	        .form-head h3 {margin: 0px !important;line-height: 2.7;}
    		.form-group {position: relative;}
    		.form-group #show {
    			position: absolute;
    			top: 47%;
    			right: 3px;
    			border: none;
    			background: transparent
    		}
	        .form-group #show i {color: #1976D2;opacity: 0.6;font-size: 18px;}
            .sms_control_panel {
                background: #fff;
                overflow: hidden;
                padding: 10px;
                position: fixed;
                width: 482px;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
            }
            .form-head{
                text-align: center;
            }
            hr{
                padding:0px;
                margin:0px;
                margin-bottom:10px;
            }
	    </style>
    </head>

    <body style="background: url(<?php echo site_url('public/programmer.jpg'); ?>);background-repeat: no-repeat;background-size: cover;">

        <section class="container">
            <div class="sms_control_panel">
                <form method="post" action="<?php echo site_url('smsControl/login');?>" class="login-form">
                    <div class="form-head">
                        <h3>SMS Control Panel</h3>
                        <hr>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Usernames</label>
                            <input type="text" class="form-control" name="username" placeholder="Username" required>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label">Password</label>
                            <input type="password" id="pass" name="password" placeholder="Password" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                            <input type="submit" name="submit_login" class="btn" style="float:right; margin-bottom:15px;" value="Login">
                        </div> 
                    </div>
                </form>
            </div>
        </section>
        

    </body>
</html>