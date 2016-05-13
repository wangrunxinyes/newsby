$(function() {
	$("#getcode_math").on("click", function() {
		$(this).attr("src", $(this).attr("data") + Math.random());
	});

	$("input,textarea").jqBootstrapValidation({
		preventSubmit: true,
		submitError: function($form, event, errors) {
			// additional error messages or events
		},
		submitSuccess: function($form, event) {
			event.preventDefault(); // prevent default submit behaviour
			// get values from FORM
			var handler = ResultHandler.createNew($("#submitBt").attr("datatype"));
			var url = $("#submitBt").attr("data");
			$.ajax({
				type: "GET",
				url: url,
				data: handler.createData(),
				dateType: "json",
				beforeSend: function() {},
				success: function(data) {
					console.log(data.toString());
					handler.check(JSON.parse(data));
				},
				complete: function(XMLHttpRequest, textStatus) {
					console.log(XMLHttpRequest.status.toString());
				},
				error: function(XMLHttpRequest, textStatus, errorThrown) {
					handler.error(XMLHttpRequest, textStatus, errorThrown);
				}
			});
		},
		filter: function() {
			return $(this).is(":visible");
		},
	});

	$("a[data-toggle=\"tab\"]").click(function(e) {
		e.preventDefault();
		$(this).tab("show");
	});
});


/*When clicking on Full hide fail/success boxes */
$('#name').focus(function() {
	$('#success').html('');
});

var ResultHandler = {
	createNew: function(attrName) {
		var handler = {};
		handler.api = attrName;
		handler.check = function(data) {
			if (data.code == 1 || data.code == "1") {
				handler.show("Submit success.", true);
			} else {
				handler.show("Submit fail, error code: " + data.code + ", msg: " + data.msg, false);
			}
		}
		handler.fail = function() {
			$("#post-result-pannel").html();
		}
		handler.error = function(XMLHttpRequest, textStatus, errorThrown) {
			handler.show("Submit fail, please try again later, status: " + XMLHttpRequest.status + ", textStatus: " + textStatus + ".", false);
		}
		handler.show = function(msg, empty) {
			var result = "<br><label class='date-time'>[" + Date().toString() + "]</label><br>" + msg + "<br>";
			var dialog = dialog_class.createNew();
			$("#getcode_math").attr("src", $("#getcode_math").attr("data") + Math.random());
			$("#captcha").val("");
			dialog.show("Server Message", result, true, "submit-form-api-" + handler.api, empty);
		}
		handler.createData = function() {
			var postData = {};
			$(document).find(".submit-form-api-" + handler.api).each(function() {
				postData[$(this).attr("name")] = $(this).val();
			});
			var submitData = {};
			submitData['data'] = postData;
			submitData['api'] = handler.api;
			return "json=" + encodeURIComponent(JSON.stringify(submitData));
		}
		return handler;
	}
}