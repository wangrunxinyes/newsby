$(function() {
	$(".submit").on(
			"click",
			function() {
				var url = $("#ajax_submit_url").attr("data");
				var handler = ResultHandler.createNew();
				var submitdata = handler.createData();
				if(submitdata == "false"){
					alert("Name can't be null.");
					return;
				}
				$.ajax({
					type : "GET",
					url : url,
					data : submitdata,
					beforeSend : function() {
					},
					success : function(data) {
						console.log(data.toString());
					},
					complete : function(XMLHttpRequest, textStatus) {
						console.log(XMLHttpRequest.toString()
								+ textStatus.toString());
					},
					error : function(XMLHttpRequest, textStatus, errorThrown) {
						console.log("error, " + XMLHttpRequest.toString()
								+ textStatus.toString());
					}
				});
			})

	var ResultHandler = {
		createNew : function() {
			var handler = {};
			handler.check = function(data) {
				if (data.code == 1 || data.code == "1") {
					handler.show("Submit success.");
				} else {
					handler.show("Submit fail, error code: " + data.code
							+ ", msg: " + data.msg);
				}

			}
			handler.fail = function() {
				$("#post-result-pannel").html();
			}
			handler.error = function(XMLHttpRequest, textStatus, errorThrown) {
				handler.show("Submit fail, please try again later, status: "
						+ XMLHttpRequest.status + ", textStatus: " + textStatus
						+ ".");
			}
			handler.show = function(msg) {
				var result = "<br><label class='date-time'>["
						+ Date().toString() + "]</label><br>" + msg + "<br>";
				$("#post-result-pannel").html(
						result + $("#post-result-pannel").html());
			}
			handler.createData = function() {
				var postData = "submit=true";
				$(document).find(".tour-attr").each(function() {
					if ($(this).val() != "" && $(this).val() != null) {
						if (postData != "") {
							postData += "&";
						}
						postData += $(this).attr("data") + "=" + $(this).val();

					} else {
						return "false";
					}
				});

				$(document).find(".package-item").each(
						function() {
							if ($("#check_" + $(this).attr("data")).is(
									':checked')) {
								if ($(this).val() != ""
										&& $(this).val() != null) {
									if (postData != "") {
										postData += "&";
									}
									postData += $(this).attr("data") + "="
											+ $(this).val();
								}
							}
						});
				return postData;
			}
			return handler;
		}
	}
});