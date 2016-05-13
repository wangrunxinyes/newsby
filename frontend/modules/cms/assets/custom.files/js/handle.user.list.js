jQuery(document).ready(function($){
  $('.wrx-refresh-this-view').hide();
	$('.wrx-reload-all-user').on('click', function(){
		bootbox.confirm("将与微信服务器同步所有用户数据，可能耗时较长，建议1-2天更新一次，您确定要重载用户数据吗?", function(result) {
			if(result)
			{
				Reload.init();
			}
		});
	});
});


var Reload = function () {

	var handle = function() {

		url = $('#ajax_url').val();

      $.ajax({

           type:"POST",

           url:url,

           data:"type=weixin_reload_all_fans",

           datatype: "json",

           beforeSend:function(){
           	bootbox.alert("操作已提交, 请稍后刷新列表。");
            $("#reload_info").html("重载中，请稍后刷新列表...");
            $('.wrx-reload-all-user').hide();
            $('.wrx-refresh-this-view').show();
            $('.wrx-refresh-this-view').on('click', function(){
              location.reload();
            });
           },

           success:function(data){
           },

           complete: function(XMLHttpRequest, textStatus){

           },

           error: function(){

           },

      });

	}


	var jsonHandler = function(json){

    var data = null;

    try

    {

        data = eval('('+ json +')');

    }

    catch (e)

    {

        data = new Array();

        data["result_type"] = "js";

    }

    return data;

}
	
         return {

        //main function to initiate the module
        init: function () {
            handle();
        }
    };
}();