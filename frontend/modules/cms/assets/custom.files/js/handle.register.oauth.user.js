$(function() {
	if ($('#code').length > 0) {
		$('#line1').text($('#code').val());
		var helper = register.createNew($('#code').val(), $('#url').val());
		helper.send();
	} else {
		$('#line1').text("发生错误, 5秒后返回主页");
	}
});


var register = {
	createNew: function(code, url) {
		var reg = {};
		reg.code = code;
		reg.url = url;

		reg.send = function() {
			$.ajax({

				type: "post",

				url: reg.url,

				data: "code=" + reg.code,

				beforeSend: function(XMLHttpRequest) {

					//ShowLoading();
				},
				success: function(data, textStatus) {

					alert(data);

				},

				complete: function(XMLHttpRequest, textStatus) {

					//HideLoading();
				},
				error: function() {

					//请求出错处理
				}
			});
		}

		return reg; 
	}
}