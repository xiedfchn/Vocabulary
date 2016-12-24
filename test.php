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
        <title>Vocabulary - A massive way to memerise words</title>            
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
        <style type="text/css">
            #x-wordTest .testIcon  {
                padding: 15px 10px;
                text-align: center;
                height: 50px;
                width: 50px;
                display: inline-block;
                font-size: 18px;
                color: #1caf9a;
            }
            #x-wordTest .answerBlock {
                opacity: 0;
            }
            #x-wordTest .infoBlock {
                opacity: 0;
            }
            #x-wordTest #spelling {
                border: 0px;
                font-size: 24px;
                display: block;
                width: 100%;
                background: transparent;
                border-bottom: 1px solid #333;
                border-radius: 0px;
                margin: 60px auto 0px auto;
                text-align: center;
                outline: none;
            }
            #x-wordTest #spelling.wrong {
                color: red;
                border-color: red;
            }

            #x-wordTest #spelling.right {
                color: green;
            }
            #x-wordTest #answer {
                color: green;
                text-align: center;
                font-size: 24px;
            }
            #x-wordTest .answerBlock {
                margin: 15px auto;
            }
            #x-wordTest .control-label {
                color: #999;
            }
        </style>
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
                </ul>
                <!-- END NAV -->
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap" id='x-wordTest'>
                    <div class="row">
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-xs-6">
                                    <a href="#" id="pronouncing" class="testIcon" ><span class="fa fa-volume-up"></span></a>
                                    <a href="#" id='addWord' class="testIcon" ><span class="fa fa-star-o"></span></a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                     <input id="spelling" autocapitalize="off" type="text">
                                </div>
                            </div>
                            <div class="row answerBlock">
                                <label class="col-md-3 control-label">Correct answer: </label>
                                <div class="col-md-6" id="answer"></div>
                            </div>
                            <div class="row infoBlock">
                                <div class="col-md-6">
                                    <button id ="details" class="btn btn-info btn-block btn-lg">Details</button>
                                </div>
                                <div class="col-md-6">
                                    <button id="nextQuestion" class="btn btn-default btn-block btn-lg">Next</button>  
                                </div>  
                            </div>
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

        <script type='text/javascript' src='js/plugins/noty/jquery.noty.js'></script>
        <script type='text/javascript' src='js/plugins/noty/layouts/topCenter.js'></script>
        <script type='text/javascript' src='js/plugins/noty/layouts/topLeft.js'></script>
        <script type='text/javascript' src='js/plugins/noty/layouts/topRight.js'></script>            
        
        <script type='text/javascript' src='js/plugins/noty/themes/default.js'></script>
        <!-- END THIS PAGE PLUGINS-->        

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="js/settings.js"></script>
        
        <script type="text/javascript" src="js/plugins.js"></script>        
        <script type="text/javascript" src="js/actions.js"></script>
        <!-- END TEMPLATE -->
        <!-- MY CODE -->

        <script type="text/javascript" src="js/wordTestAction.js"></script>
        <script type="text/javascript">
        $(function(){

            // 
            var listName = "longman3000"
            var i = 0 ;
            var audio = $("#dictVoice");
            // load longman3000 words.
            LoadVocabularies().done(function(){
                $.ajax({
                    type:"POST",
                    url: "getTestState.php",
                    data: "wordList=" + listName,
                    success: function(state){
                        state = JSON.parse(state);
                        i = state.position - 0;
                        $("#answer").text($.list[i]);  
                    }
                })
            })


            $("#spelling").on("keydown", function(event){
                if(event.which == 13){  
                    event.stopPropagation();
                    if($(this).val() == $.list[i]) {
                        $(this).addClass("right");
                    } else {
                        $(this).addClass("wrong");
                        $('.answerBlock').css("opacity", "1");
                    }
                    $(this).blur();
                    $('.infoBlock').css("opacity", "1");
                }

            })
            $('#nextQuestion').click(function(){
                next();
            });
            $('#details').click(function(){
                getDetails();
            });
            $('#pronouncing').click(function(){
                play();
            });
            $('#addWord').click(function(){
                addIntoFavorites();
            });
            $(document).on('keydown', function(event){
                if(event.which == 13){  
                    next();
                }
                if(event.which == 17){
                    play();
                }
                if(event.which == 113){
                    addIntoFavorites();
                }
                if(event.which == 114){ 
                    getDetails();
                }
            })
            function getDetails(){
                var wordFrag = $.list[i].replace(/\s/g, "-");
                window.open("https://www.collinsdictionary.com/dictionary/english/" + wordFrag);

            }

            function addIntoFavorites(word){
                word = word || $('#answer').text();
                $.ajax({
                    type:"POST",
                    url: "insertWord.php",
                    data: "myword="+word,
                    success: function(html){
                         if(html=='true') {
                            noty({text: word + ' is added.', layout: 'topCenter', type: 'success',timeout: 1500})
                          }
                          else {
                            noty({text: word + ' existed already.', layout: 'topCenter', type: 'information',timeout: 1500})
                          }
                    }
                })   
            }
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
                    var currentWord = $.trim(wordList[i]);
                    if($.inArray(currentWord, $.list) < 0) {
                        $.list.push(currentWord);
                    } 
                }
                return $.list;
            }
            function play() {
                var url = "http://fanyi.baidu.com/gettts?lan=uk&text=" + $.list[i] +"&source=web"
                audio[0].src = url;
                audio[0].play();
            }
            function next(){
                i++;
                play();
                $("#answer").text($.list[i]);  
                $(".infoBlock").css("opacity", "0")
                $(".answerBlock").css("opacity", "0")
                $("#spelling").removeClass().val("").focus();


                $.ajax({
                    type:"POST",
                    url: "saveTestState.php",
                    data: "wordList=" + listName + "&position=" + i,
                    success: function(html){  
                        console.log(html)
                    }
                })
            }
        });
            
        </script>
        <!-- END MY CODE -->
    <!-- END SCRIPTS -->         
    </body>
</html>






