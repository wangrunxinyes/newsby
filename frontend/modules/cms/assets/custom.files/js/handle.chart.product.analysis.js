var ChartsAmcharts = function() {

	var initChartSample6 = function() {

		var chart = AmCharts.makeChart("chart_6", {
			"type": "pie",
			"theme": "light",
			"fontFamily": 'Open Sans',
			"color": '#888',

			"dataProvider": wrx_chart_data,

			"valueField": "litres",

			"titleField": "country",

		});

		$('#chart_6').closest('.portlet').find('.fullscreen').click(function() {
			chart.invalidateSize();
		});
	}

	var initChartSample1 = function() {

		var chart = AmCharts.makeChart("chart_1", {
			"type": "pie",
			"theme": "light",
			"fontFamily": 'Open Sans',
			"color": '#888',

			"dataProvider": wrx_chart_data_type,

			"valueField": "litres",

			"titleField": "country",

		});

		$('#chart_1').closest('.portlet').find('.fullscreen').click(function() {
			chart.invalidateSize();
		});
	}
	return {

		//main function to initiate the module
		init: function() {
			initChartSample1();
			initChartSample6();
		}
	};
}();