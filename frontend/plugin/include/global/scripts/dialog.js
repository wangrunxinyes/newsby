var dialog_class = {

	createNew: function() {

		var dialog = {};

		dialog.show = function(title, body, close, attributes, empty) {

			if (!dialog.check()) {
				return;
			}

			var part = '<div id="alert_area" class=" panel-game-msg_layer_cover"';
			part += 'style="height: 100%">';
			part += '<div class="j-ui-miniwindow pop w-9" style="color:black; z-index: 700;';
			part += ' position: fixed; left: 10%; top: 20%; display: block;">';
			part += '<div class="hd">';
			if (close) {
				part += '<i class="close closeBtn dialog-close-bt"></i>';
			}
			part += '<span class="pop-title">';
			part += title;
			part += '</span></div><div class="bd"><div class="bd text-center">';
			part += '<div class="pop-detail" id="dialog_message_detials">';
			part += body;
			part += '</div></div><br><div class="bd j-button-area text-center">';
			if (close) {
				part += '<a id="dialog_message_button" ';
				part += 'style="" class="dialog-close-bt dialog-btn closeTip">';
				part += 'Confirm<b class="btn-inner"></b></a>';
			}

			part += '</div></div></div>';

			$(part).insertBefore("#top-bar");

			$(".dialog-close-bt").on("click", function() {
				if ($("#alert_area").length > 0) {
					$("#alert_area").remove();
					if (attributes != "" && empty) {
						$(document).find("." + attributes).each(function() {
							$(this).val("");
						});
					}
				}
			});

		}

		dialog.check = function() {
			if ($("#alert_area").length > 0) {
				return false;
			} else {
				return true;
			}
		}

		dialog.dismiss = function() {
			if ($("#alert_area").length > 0) {
				$("#alert_area").remove();
			}
		}

		dialog.change = function(title, body, close) {
			if ($(".pop-title").length > 0) {
				$(".pop-title").html(title);
			}

			if ($("#dialog_message_detials").length > 0) {
				$("#dialog_message_detials").html(body);
			}

			if ($(".dialog-close-bt").length <= 0 && close) {
				$('<i class="close closeBtn dialog-close-bt"></i>').insertBefore(".pop-title");
				var part = '<a id="dialog_message_button" ';
				part += 'style="" class="dialog-close-bt dialog-btn closeTip">';
				part += 'Confirm<b class="btn-inner"></b></a>';
				$('.j-button-area').html(part);
				$(".dialog-close-bt").on("click", function() {
					if ($("#alert_area").length > 0) {
						$("#alert_area").remove();
					}
				});
			} else if ($(".dialog-close-bt").length > 0 && !close) {
				$(document).find(".dialog-close-bt").each(function() {
					$(this).remove();
				});
			}
		}

		return dialog;
	}
}