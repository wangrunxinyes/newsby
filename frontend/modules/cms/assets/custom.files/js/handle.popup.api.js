var UIReplyDialogApi = function () {

	var handleFresh = function(){
		 $('.weixin-refresh').unbind("click");
		 $('.weixin-refresh').click(function(){
		 	if($(document).find('a[user-chosen=yes]').length>0)
		 	{
		 		$(this).attr('data', $(document).find('a[user-chosen=yes]').attr('data'));
		 		$(this).attr('img', $(document).find('a[user-chosen=yes]').find("img").attr("src"));
		 	}
		 	WeixinMessageRefreshHelper.init();
		 	MessageReload.init();
		 });
	}

    var handleDialogs = function() {
    	$('.wrx-reply').unbind("click");
            $('.wrx-reply').click(function(){
            	var obj = $(this);
                bootbox.prompt("回复用户" + obj.attr("user"), function(result) {
                    if (result === null || result == null || result == "") {
                    	 bootbox.alert("不执行任何操作");
                    } else {
                        var url = $("#ajax_url").val();
                        var type = $("#reply_type").val();
                        var id = obj.attr("data");
                       

      $.ajax({

           type:"POST",

           url:url,

           data:"type=" + type + "&data=" + id + "&reply=" + result,

           datatype: "json",

           beforeSend:function(){

           },

           success:function(data){
           	bootbox.alert(data);
           	$('#weixin_message_details_'+ id).remove();
           	 MessageReload.init();
           },

           complete: function(XMLHttpRequest, textStatus){

           },

           error: function(){

           }

      });

                    }
                });
            });
    }


    var handleMarkDialogs = function() {
    	$('.wrx-mark').unbind("click");
    	$('.wrx-mark').click(function(){
    		var obj = $(this);
                        var url = $("#ajax_url").val();
                        var type = $("#reply_type").val();
                        var id = obj.attr("data");
                       

      $.ajax({

           type:"POST",

           url:url,

           data:"type=" + type + "&data=" + id + "&reply=WRX_WEIXIN_READ",

           datatype: "json",

           beforeSend:function(){

           },

           success:function(data){
           	bootbox.alert(data);
           	$('#weixin_message_details_'+ id).remove();
           	 MessageReload.init();
           },

           complete: function(XMLHttpRequest, textStatus){

           },

           error: function(){

           }

      });

                  
                });
    }


    return {

        //main function to initiate the module
        init: function () {
            handleDialogs();
            handleFresh();
            handleMarkDialogs();
        }
    };

}();


var MessageReload = function () {

	var handleMsg = function() {
		var obj = $(document).find('a[user-chosen=yes]');
        	 var url = $("#ajax_url").val();
             var type = 'weixin_check_unread_message';
                      

      $.ajax({

           type:"POST",

           url:url,

           data:"type=" + type,

           datatype: "json",

           beforeSend:function(){

           },

           success:function(data){
           	$('#weixin_user_list').html(data);
           	 Metronic.init(); 
           	 WeixinMessageHelper.init();
           },

           complete: function(XMLHttpRequest, textStatus){

           },

           error: function(){

           },

      });



	}
	
         return {

        //main function to initiate the module
        init: function () {
            handleMsg();
        }
    };
}();