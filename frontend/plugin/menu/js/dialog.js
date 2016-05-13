var dialog_class = {

	createNew: function() {

		var dialog = {};
		
		dialog.trigger = null;

		dialog.show = function(title, body, close, trigger) {

			if (!dialog.check()) {
				return;
			}
			
			dialog.trigger = trigger;

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
				part += 'href="#" style="" class="dialog-close-bt dialog-btn closeTip">';
				part += 'Confrim<b class="btn-inner"></b></a>';
			}

			part += '</div></div></div>';

			$(part).insertBefore("#top-bar");

			$(".dialog-close-bt").on("click", function() {
				if ($("#alert_area").length > 0) {
					$("#alert_area").remove();
				}
				if($("#" + dialog.trigger).length > 0){
					$("#" + dialog.trigger).trigger("change");
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
			
			if($("#" + dialog.trigger).length > 0){
				$("#" + dialog.trigger).trigger("change");
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
				part += 'href="#" style="" class="dialog-close-bt dialog-btn closeTip">';
				part += 'Confrim<b class="btn-inner"></b></a>';
				$('.j-button-area').html(part);
				$(".dialog-close-bt").on("click", function() {
					if ($("#alert_area").length > 0) {
						$("#alert_area").remove();
					}
					if($("#" + dialog.trigger).length > 0){
						$("#" + dialog.trigger).trigger("change");
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