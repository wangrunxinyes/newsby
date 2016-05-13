
var WeixinMessageHelper = function () {

    var handleUserMessage = function() {

$('.weixin-check-user').unbind("click");
            $('.weixin-check-user').click(function(){
            	var obj = $(this);
            		$("#weixin_content_history").html("加载中...");
            	$(document).find('a[user-chosen=yes]').attr("user-chosen", "no");
            	obj.attr("user-chosen", "yes");
            	var url = $("#ajax_url").val();
                        var type = obj.attr("type");
                        var data = obj.attr("data");
                        var img = obj.find("img").attr("src");

$.ajax({

           type:"POST",

           url:url,

           data:"type=" + type + "&data=" + data + "&img=" + img,

           datatype: "json",

           beforeSend:function(){
           },

           success:function(data){
           	$("#weixin_content_history").html(data);
           	UIReplyDialogApi.init();
           	 Metronic.init(); // init metronic core componets
           },

           complete: function(XMLHttpRequest, textStatus){
           	bootbox.hideAll();
           },

           error: function(){

           }

      });

    });

        }




    return {

        //main function to initiate the module
        init: function () {
            handleUserMessage();
        }
    };

}();




var WeixinMessageRefreshHelper = function () {

    var handleRefreshMessage = function() {
            		$("#weixin_content_history").html("加载中...");
            	
            	var url = $("#ajax_url").val();
                        var type = 'weixin_load_message';
                        var data = $(".weixin-refresh").attr("data");
                        var img =$(".weixin-refresh").attr("img");

$.ajax({

           type:"POST",

           url:url,

           data:"type=" + type + "&data=" + data + "&img=" + img,

           datatype: "json",

           beforeSend:function(){
           },

           success:function(data){
           	$("#weixin_content_history").html(data);
           	UIReplyDialogApi.init();
           	 Metronic.init(); // init metronic core componets
           },

           complete: function(XMLHttpRequest, textStatus){
           	bootbox.hideAll();
           },

           error: function(){

           }

      });

        }




    return {

        //main function to initiate the module
        init: function () {
            handleRefreshMessage();
        }
    };

}();