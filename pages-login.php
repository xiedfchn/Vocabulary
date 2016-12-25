<!DOCTYPE html>
<html lang="en" class="body-full-height">
    <head>        
        <!-- META SECTION -->
        <title>Vocabulary - A massive way to memerise words</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="css/theme-default.css"/>
        <!-- EOF CSS INCLUDE -->                                    
    </head>
    <body>
        
        <div class="login-container">
        
            <div class="login-box animated fadeInDown">
                <div class="login-logo"></div>
                <div class="login-body">
                    <div class="login-title"><strong>Welcome</strong>, Please login</div>
                    <form action="checklogin.php" class="form-horizontal" method="post">
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" id="username" class="form-control" placeholder="Username"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" id="password" class="form-control" placeholder="Password"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <button type="submit" id="submit" class="btn btn-info btn-block">Log In</button>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" id="register" class="btn  btn-block">Sign Up</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 btn-link">
                            <span id="message"></span>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="login-footer">
                    <div class="pull-left">
                        &copy; 2017 Vocabulary
                    </div>
                    <div class="pull-right">
                        Author: <a href="#">Dongfeng Xie</a>
                    </div>
                </div>
            </div>
            
        </div>
        
    <!--jQuery-->
    <script src="js/plugins/jquery/jquery.min.js"></script>
    <!--AJAX sing up&login-->
    <script src="js/login.js"></script>
    </body>
</html>






