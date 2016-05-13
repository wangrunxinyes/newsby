$(document).ready(function() {
	$(".filter-submit").on("click", function() {
		var search = searching.createNew();
		search.build();
	});

	$(".filter-cancel").on("click", function() {
		var search = searching.createNew();
		search.init();
	});
});

var searching = {

	createNew: function() {

		var search = {};

		search.build = function() {
			var pars = "";
			var json = {};
			var check = false;
			$('input.form-filter').each(function() {

				if ($(this).val() != null && $(this).val() != "" && $(this).val().length > 0) {
					check = true;
					json[$(this).attr("name")] = $(this).val();
				}

			});

			if (check) {
				pars += "&code=" + $("#wrx-table-type").val();
				pars += "&json=" + encodeURIComponent(JSON.stringify(json));
				search.post(pars);
			}
		};

		search.post = function(par) {
			var url = $('#ajax_url').val();
			$.ajax({
				type: "POST",
				url: url,
				data: "type=weixin_ajax_search" + par,
				datatype: "json",

				beforeSend: function() {
					$(".wrx-table-body").html('加载中');
					$('.wrx-next-page').addClass('disabled');
					$('.wrx-prev-page').addClass('disabled');
				},

				success: function(data) {
					var table = table_class.createNew();
					var json = table.jsonHandler(data);
					if (json.code == 0) {
						table.showTable(json, data);
					} else if (json.code == 1) {
						$(".wrx-table-body").html("System Error | 系统错误");
					} else if (json.code == 2) {
						$(".wrx-table-body").html("System Error | 系统错误");
					}
				},

				complete: function(XMLHttpRequest, textStatus) {

				},

				error: function() {
					$(".wrx-table-body").html("System Error | 系统错误");
				}
			});
		}

		search.init = function() {
			$('input.form-filter').each(function() {
				$(this).val("");
			});
			var table = table_class.createNew();
			table.reload("", 1);
		}

		return search;
	}
}