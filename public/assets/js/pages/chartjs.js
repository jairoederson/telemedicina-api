$(function () {

    //start line chart
    var lineChartData = {
        labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Setiembre", "Octubre", "Noviembre", "Diciembre"],
        datasets: [
            {
                fill:true,
                tension:0,
                pointBackgroundColor:"rgba(65,139,202,0.5)",
                pointBorderColor:"#fff",
                borderJoinStyle: 'miter',
                pointBorderWidth:"1",
                label:"Ingresos (miles)",
                data : [5,3,2,4,6,2,6,8,2,1,3,4],
                backgroundColor:"rgba(254,132,0,0.5)"
            },
            {
                fill:true,
                tension:0,
                pointBackgroundColor:"rgba(95,179,15,0.5)",
                pointBorderColor:"#fff",
                borderJoinStyle: 'miter',
                pointBorderWidth:"1",
                pointStrokeColor: "#fff",
                label:"Egresos (miles)",
                data : [25,15,10,20,30,10,30,40,10,5,15,20],
                backgroundColor:"rgba(95,179,15,0.5)"
            },

        ]

    };

    function draw() {

        var selector = '#line-chart';

        $(selector).attr('width', $(selector).parent().width());
        var myLine = new Chart($(selector), {
            type: 'line',
            data: lineChartData,
            options: {
                title: {
                    display: false,
                    text: 'Line Chart'
                }
            }
        });
    }

    draw();
    //endline chart
    
    
    //inicio 2
    var lineChartDataS = {
        labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Setiembre", "Octubre", "Noviembre", "Diciembre"],
        datasets: [
            {
                fill:true,
                tension:0,
                pointBackgroundColor:"rgba(65,139,202,0.5)",
                pointBorderColor:"#fff",
                borderJoinStyle: 'miter',
                pointBorderWidth:"1",
                label:"Utilidad (miles)",
                data : [5,3,2,4,6,2,6,8,2,1,3,4],
                backgroundColor:"rgba(254,132,0,0.5)"
            }

        ]

    };

    function drawS() {

        var selector = '#line-chart2';

        $(selector).attr('width', $(selector).parent().width());
        var myLine = new Chart($(selector), {
            type: 'line',
            data: lineChartDataS,
            options: {
                title: {
                    display: false,
                    text: 'Line Chart'
                }
            }
        });
    }

    drawS();
    //fin 2

    //start finanzas ingresos-egresos
    var finanzaChartData = {
        labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Setiembre", "Octubre", "Noviembre", "Diciembre"],
        datasets: [
            {
                fill:true,
                tension:0,
                pointBackgroundColor:"rgba(65,139,202,0.5)",
                pointBorderColor:"#fff",
                borderJoinStyle: 'miter',
                pointBorderWidth:"1",
                label:"Pagos",
                data : [50000,98500,56800,75400,65000,85000,80000,68400,85200,75800,95400,80000],
                backgroundColor:"rgba(238,238,239,0.5)"
            },
            {
                fill:true,
                tension:0,
                pointBackgroundColor:"rgba(95,179,15,0.3)",
                pointBorderColor:"#fff",
                borderJoinStyle: 'miter',
                pointBorderWidth:"1",
                pointStrokeColor: "#fff",
                label:"Liquidaciones",
                data : [32000,68400,35000,54100,46500,65400,68700,39700,25700,68100,48800,41400],
                backgroundColor:"rgba(254,132,0,0.4)"
            },
            {
                fill:true,
                tension:0,
                pointBackgroundColor:"rgba(95,179,15,0.5)",
                pointBorderColor:"#fff",
                borderJoinStyle: 'miter',
                pointBorderWidth:"1",
                pointStrokeColor: "#fff",
                label:"Saldos",
                data : [18000,30100,21800,21300,19500,19600,11300,2500,7700,16600,38600,25400],
                backgroundColor:"rgba(95,179,15,1)"
            }
        ]
    };

    function drawfinanza() {

        var selector = '#finanza-chart';

        $(selector).attr('width', $(selector).parent().width());
        var myLine = new Chart($("#finanza-chart"), {
            type: 'line',
            data: finanzaChartData,
            options: {
                title: {
                    display: false,
                    text: 'Finanza Chart'
                }
            }
        });
    }

    drawfinanza();
    //endline finanzas ingresos - egresos

    //start bar chart
    var barChartData = {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [
            {
                label:"data1",
                backgroundColor: "#f89a14",
                hoverBackgroundColor: "#f89a14",
                data : [65,59,90,81,56,55,40,30,50,20,80,99]

            },
            {
                label:"data2",
                backgroundColor: "#418bca",
                hoverBackgroundColor: "#418bca",
                data: [30, 20, 100, 10, 80, 27, 50, 30, 60, 40, 80, 66, 90]
            }
        ]

    };

    function draw1() {

        var selector = '#bar-chart';

        $(selector).attr('width', $(selector).parent().width());
        var myBar = new Chart($("#bar-chart"), {
            type: 'bar',
            data: barChartData
        });
    }

    draw1();


    //end bar chart

    //start radar chart
    var radarChartData = {
        labels: ["Resfrio Común", "Faringitis", "Bronquitis", "Neumonía", "Tuberculosis", "Cardiovasculares", "Diabetes", "Cáncer"],
        datasets: [

            {
                backgroundColor: "rgba(248,154,20,0.5)",
                hoverBackgroundColor: "rgba(248,154,20,0.5)",
                pointBackgroundColor: "rgba(248,154,20,0.5)",
                pointHoverBackgroundColor: "#fff",
                data: [160, 120, 110, 100, 135, 160, 145, 56],
                label: 'En pacientes'
            },
            {
                backgroundColor: "rgba(1,188,140,0.5)",
                hoverBackgroundColor: "rgba(1,188,140,0.5)",
                pointBackgroundColor: "rgba(1,188,140,0.5)",
                pointHoverBackgroundColor: "#fff",
                data: [28, 48, 40, 19, 96, 27, 100, 69],
                label: 'En análisis'
            }
        ]

    };

    function draw2() {

        var selector = '#radar-chart';

        $(selector).attr('width', $(selector).parent().width());
        var myRadar = new Chart($("#radar-chart"),
            {
                type: 'radar',
                data: radarChartData
            });
    }

    draw2();

    //end  radar chart

    //start polar area chart


    var chartData = {
        datasets: [{
            data: [
                15,
                18,
                10,
                8,
                16,
                20

            ],
            backgroundColor: [
                "#01BC8C",
                "#F89A14",
                "#418BCA",
                "#EF6F6C",
                "#A9B6BC",
                "#67C5DF"
            ],
            label: 'My dataset' // for legend
        }],
        labels: [
            "data1",
            "data2",
            "data3",
            "data4",
            "data5",
            "data6"
        ]
    };


    function draw3() {

        var selector = '#polar-area-chart';

        $(selector).attr('width', $(selector).parent().width());
        var myPolarArea = new Chart($("#polar-area-chart"), {
            data: chartData,
            type: 'polarArea'
        });
    }

    draw3();

    //end polar area chart

    //start pie chart
    var pieData = {
        labels: [
            "Blue",
            "Green",
            "Orange"
        ],
        datasets: [
            {
                data: [300, 50, 100],
                backgroundColor: [
                    "#418BCA",
                    "#01BC8C",
                    "#F89A14"
                ],
                hoverBackgroundColor: [
                    "#418BCA",
                    "#01BC8C",
                    "#F89A14"
                ]
            }]
    };

    function draw4() {

        var selector = '#pie-chart';

        $(selector).attr('width', $(selector).parent().width());
        var myPie = new Chart($("#pie-chart"), {
            type: 'pie',
            data: pieData
        });
    }

    draw4();

    //end pie chart

    //start doughnut chart
    var doughnutData = {

        labels: [
            "Orange",
            "Green",
            "Blue"
        ],
        datasets: [
            {
                data: [300, 50, 100],
                backgroundColor: [
                    "#F89A14",
                    "#01BC8C",
                    "#67c5df"
                ],
                hoverBackgroundColor: [
                    "#F89A14",
                    "#01BC8C",
                    "#67c5df"
                ]
            }]

    };

    function draw5() {

        var selector = '#doughnut-chart';

        $(selector).attr('width', $(selector).parent().width());
        var myDoughnut = new Chart($("#doughnut-chart"),
            {
                type: 'doughnut',
                data: doughnutData
            });
    }

    draw5();


    //end doughnut chart





var d1_ = [["0:00 a 2:00", 100],["2:00 a 4:00", 80],["4:00 a 6:00", 66],["6:00 a 8:00", 48],["8:00 a 10:00", 68],
    ["10:00 a 12:00", 48],["12:00 a 14:00",66],["14:00 a 16:00", 80],["16:00 a 18:00", 64],["18:00 a 20:00", 48],
    ["20:00 a 22:00",64],["22:00 a 24:00",100]];
$.plot("#bar-chart_", [{
    data: d1_,
    label: "Project",
    color: "#F89A14"
}], {
    series: {
        bars: {
            align: "center",
            lineWidth: 0,
            show: !0,
            barWidth: .6,
            fill: .9
        }
    },
    grid: {
        borderColor: "#ddd",
        borderWidth: 1,
        hoverable: !0
    },
    tooltip: true,
    tooltipOpts: {
        content: '%s: %y'
    },

    xaxis: {
        tickColor: "#ddd",
        mode: "categories"
    },
    yaxis: {
        tickColor: "#ddd"
    },
    shadowSize: 0
});

});


