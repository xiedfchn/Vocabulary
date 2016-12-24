<?php
  session_start();
?>
<?php
if (!isset ($_SESSION['username'])) 
{ 
    echo '<script language=javascript>window.location.href="pages-login.php"</script>'; 
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>Vocabulary - A massive way to memerise words.</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="css/theme-default.css"/>
        <!-- EOF CSS INCLUDE -->

        <!-- MY CSS -->
        <link rel="stylesheet" type="text/css" href="css/voculary.css"/>
        <!-- END MY CSS -->    
    </head>
    <body class="page-container-boxed">
        <!-- START PAGE CONTAINER -->
        <div class="page-container page-navigation-toggled">
            
            <?php require "sideBar.php"; ?>
            
            <!-- PAGE CONTENT -->
            <div class="page-content wordList">
                <!-- END NAV -->
                <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                    <!-- TOGGLE NAVIGATION -->
                    <li class="xn-icon-button">
                        <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                    </li>
                    <!-- END TOGGLE NAVIGATION -->
                    <!-- SIGN OUT -->
                    <li class="xn-icon-button pull-right">
                        <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>                        
                    </li> 
                    <!-- END SIGN OUT -->
                    <!-- DISORDER VOCABULARY -->
                    <li class="xn-icon-button pull-right">
                        <a href="#" class="mb-control" id="ordered"><span class="fa fa-sort-alpha-asc"></span></a>                        
                    </li> 
                    <!-- END DISORDER VOCABULARY -->
                    <!-- DISORDER VOCABULARY -->
                    <li class="xn-icon-button pull-right">
                        <a href="#" class="mb-control" id="disorder"><span class="fa fa-random"></span></a>                        
                    </li> 
                    <!-- END DISORDER VOCABULARY -->
                </ul>
                <!-- END NAV -->
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                             <div class="collection"></div>
                        </div>
                    </div>
                </div>
                <!-- END PAGE CONTENT WRAPPER -->
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->
        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to log out?</p>                    
                        <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="logout.php" class="btn btn-success btn-lg">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->

        <!-- START PRELOADS -->
        <audio id="audio-alert" src="audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="audio/fail.mp3" preload="auto"></audio>
        <!-- END PRELOADS -->       

        <audio id="dictVoice"></audio>           
        
    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script>        
        <!-- END PLUGINS -->

        <!-- START THIS PAGE PLUGINS-->        
        <script type='text/javascript' src='js/plugins/icheck/icheck.min.js'></script>        
        <script type="text/javascript" src="js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        <script type="text/javascript" src="js/plugins/scrolltotop/scrolltopcontrol.js"></script>
             

        <script type='text/javascript' src='js/plugins/noty/jquery.noty.js'></script>
        <script type='text/javascript' src='js/plugins/noty/layouts/topCenter.js'></script>
        <script type='text/javascript' src='js/plugins/noty/layouts/topLeft.js'></script>
        <script type='text/javascript' src='js/plugins/noty/layouts/topRight.js'></script>            
        
        <script type='text/javascript' src='js/plugins/noty/themes/default.js'></script>
        
        <script type='text/javascript' src='js/fastclick.js'></script>
        <!-- END THIS PAGE PLUGINS-->        

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="js/settings.js"></script>
        
        <script type="text/javascript" src="js/plugins.js"></script>        
        <script type="text/javascript" src="js/actions.js"></script>
        <!-- END TEMPLATE -->
        <!-- MY CODE -->

        <script type="text/javascript" src="js/wordListAction.js"></script>
        <script type="text/javascript">
		window.addEventListener( "load", function() {
		    FastClick.attach( document.body );
		}, false );
        $(function(){
            // load longman3000 words.
            LoadVocabularies().done(function(){
                $.addWordIntoPage($.list);
            })
            function LoadVocabularies() {
                var a = $.ajax({
                        type: "GET",
                        url:'./vocabularies/longman3000.txt',
                        success: generateWordList,
                        error: function(e){ 
                            console.log("data error:",e); 
                            return false; 
                    }, 
                })
                return $.when(a);
            }

            function generateWordList(result) { 
                var wordList = result;
                wordList = wordList.split("\n");
                $.list = [];
                for(var i = 0; i < wordList.length; i++) {
                    var currentWord = wordList[i];
                    if($.inArray(currentWord, $.list) < 0) {
                        $.list.push(currentWord);
                    } 
                }

                return $.list;
            }
        });
            
        </script>
        <!-- END MY CODE -->
    <!-- END SCRIPTS -->         
    </body>
</html>






