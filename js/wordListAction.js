// Load vocabularies
$(function() {
	$.list = [];

    $("#dictVoice")[0].addEventListener("error",function () {
        console.log("加载失败！");
    },false);

    $(document).on('click','.word', function(){
        $(this).addClass('active').siblings().removeClass('active');
        console.log($(this).index(".word"))
        var data =JSON.stringify([$(this).index(".word"), $(this).offset().top])
        localStorage.setItem('index', data);
        console.log(localStorage.getItem('index'))
        var audio = $("#dictVoice");
        var url = "//fanyi.baidu.com/gettts?lan=uk&text=" + $(this).text() +"&source=web"
        // url = "//sp0.baidu.com/-rM1hT4a2gU2pMbgoY3K/gettts?lan=uk&text=" + $(this).text() + "&spd=2&source=alading"
        
        audio[0].src = url;

        audio[0].play();
    });



    $("#disorder").click(function(){
        $.addWordIntoPage(randomOrder($.list));
    })
    $('#ordered').click(function (argument) {
        $.addWordIntoPage($.list);
        var data = JSON.parse(localStorage.getItem('index'));
        $(".word").eq(data[0]).addClass("active");
        $(".word.active")[0].scrollIntoView();
    })

    $(document).on('dblclick','.word', function(){
        lookIntoDic();
    })
    $(document).on('keydown', function(e){
        if(e.which == 114)
            lookIntoDic();


        if(e.which == 113){
        	
        	var word = $('.word.active').text();
        	console.log(word)
        	$.ajax({
        		type:"POST",
        		url: "insertWord.php",
        		data: "myword="+word,
        		success: function(html){
        			 if(html=='true') {
        			 	noty({text: word + 'is added.', layout: 'topCenter', type: 'success',timeout: 1500})
        			  }
        			  else {
        				noty({text: word + 'existed already.', layout: 'topCenter', type: 'information',timeout: 1500})
        			  }
        		},
        		beforeSend:function()
                {
                  $("#message").html("<p class='text-center'><img src='img/ajax-loader.gif'></p>")
                }
        	})
        	
        }
        if(e.which == 39) {
            $('.word.active').next('.word').click();
        }
        if(e.which == 37) {
            $('.word.active').prev('.word').click();
        }
        if(e.which == 17) {
            $('.word.active').click();
        }
    })
    function lookIntoDic() {
        var wordFrag = $('.word.active').text().replace(/\s/g, "-");
        console.log(wordFrag);
        // window.open("https://www.collinsdictionary.com/dictionary/english/" + wordFrag); 
        window.open("http://www.ldoceonline.com/dictionary/" + wordFrag);

    }

    $.addWordIntoPage = function(wordList){
        console.log(wordList.length);
        $(".collection").empty();
        for(var i = 0; i < wordList.length; i++) {
            $(".collection").append($("<span class='word'>").text(wordList[i]));
        }
    }

    function randomOrder(wordList){
        var temp2 = [];
        var num = [];

        for(var i = 0; i < wordList.length; i ++) {
            var currentNum = Math.floor(Math.random() * wordList.length);
            if($.inArray(currentNum, num) < 0) {
                num.push(currentNum);
            } else {
                i--;
            }
        }
        for(var i = 0; i < wordList.length; i++) {
            temp2[i] = wordList[num[i]];
        }
        return temp2;
    }
});