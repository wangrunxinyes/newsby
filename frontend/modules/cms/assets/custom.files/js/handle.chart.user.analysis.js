var ChartsFlotcharts = function() {


    return {

        //main function to initiate the module


        init: function() {

            Metronic.addResizeHandler(function() {

                Charts.initPieCharts();

            });



        },



        initCharts: function() {



            if (!jQuery.plot) {

                return;

            }



            var data = [];

            var totalPoints = 250;



            // random data generator for plot charts



            function getRandomData() {

                if (data.length > 0) data = data.slice(1);

                // do a random walk

                while (data.length < totalPoints) {

                    var prev = data.length > 0 ? data[data.length - 1] : 50;

                    var y = prev + Math.random() * 10 - 5;

                    if (y < 0) y = 0;

                    if (y > 100) y = 100;

                    data.push(y);

                }

                // zip the generated y values with the x values

                var res = [];

                for (var i = 0; i < data.length; ++i) {

                    res.push([i, data[i]]);

                }



                return res;

            }




            //bars with controls



            function chart1() {

                if ($('#chart_1').size() != 1) {

                    return;

                }

                var d1 = [];

                for (var i = 0; i <= 10; i += 1)

                    d1.push([i, parseInt(Math.random() * 30)]);



                var d2 = [];

                for (var i = 0; i <= 10; i += 1)

                    d2.push([i, parseInt(Math.random() * 30)]);



                var d3 = [];

                for (var i = 0; i <= 10; i += 1)

                    d3.push([i, parseInt(Math.random() * 30)]);



                var stack = true,

                    bars = true,

                    lines = false,

                    steps = false;



                function plotWithOptions() {

                    $.plot($("#chart_1"),



                        [{

                            label: "微信菜单点击",

                            data: d1,

                            lines: {

                                lineWidth: 1,

                            },

                            shadowSize: 0

                        }, {

                            label: "微信发送信息",

                            data: d2,

                            lines: {

                                lineWidth: 1,

                            },

                            shadowSize: 0

                        }, {

                            label: "网页访问",

                            data: d3,

                            lines: {

                                lineWidth: 1,

                            },

                            shadowSize: 0

                        }]



                        , {

                            series: {

                                stack: stack,

                                lines: {

                                    show: lines,

                                    fill: true,

                                    steps: steps,

                                    lineWidth: 0, // in pixels

                                },

                                bars: {

                                    show: bars,

                                    barWidth: 0.5,

                                    lineWidth: 0, // in pixels

                                    shadowSize: 0,

                                    align: 'center'

                                }

                            },

                            xaxis: {

                                    tickColor: "#eee",

                                    ticks: [
                                    [0, "\u4f60\u597d"],
                                    [1, "\u4f60\u597d"],
                                    [2, "\u4f60\u597d"],
                                    ]

                            },

                            grid: {

                                tickColor: "#eee",

                                borderColor: "#eee",

                                borderWidth: 1

                            }

                        }

                    );

                }
                plotWithOptions();
            }
            chart1();
        },
    };
}();