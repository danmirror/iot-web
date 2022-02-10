// ================chart===========

var char1;
var char2_id1;
var char2_id2;
var char3;
var char4_id1;
var char4_id2;

// function to update our chart
function ajax_chart() {
    url = "http://localhost/iot-web/api/data.php";
    
    var data = data || {};

    $.getJSON(url, data).done(function(response) {
        char1.data.labels = response.labels;
        char1.data.datasets[0].data = response.data.gas; // or you can iterate for multiple datasets
        char1.update(); // finally update our chart

        char2_id1.data.labels = response.labels;
        char2_id1.data.datasets[0].data = response.data.suhu1; // or you can iterate for multiple datasets
        char2_id1.data.datasets[1].data = response.data.kelembaban1; 
        char2_id1.update(); // finally update our chart

        char2_id2.data.labels = response.labels;
        char2_id2.data.datasets[0].data = response.data.suhu2; // or you can iterate for multiple datasets
        char2_id2.data.datasets[1].data = response.data.kelembaban2; 
        char2_id2.update(); // finally update our chart

        char4_id1.data.datasets[0].data = [response.data.end_suhu1]; // or you can iterate for multiple datasets
        char4_id1.data.datasets[1].data = [response.data.end_kelembaban1];
        char4_id1.update(); // finally update our chart

        char4_id2.data.datasets[0].data = [response.data.end_suhu2]; // or you can iterate for multiple datasets
        char4_id2.data.datasets[1].data = [response.data.end_kelembaban2];
        char4_id2.update(); // finally update our chart
    });
}

function lines(sensor,time,id,name){
    var data_line = 
    {
        labels: time,
        datasets: [{
            type: 'line',
            label: 'gas',
            id: "y-axis-0",
            borderColor: "lightblue",
            data: sensor
        },
        ]
    };
    var options_line = 
    {
        //   responsive: true,
        // maintainAspectRatio: false,
        title: {
            display: true,
            text: name,
            position: 'left'
        },
        legend: {
            align: 'start',
            position: 'top',
        },
        tooltips: {
            mode: 'label'
        },
            
        scales: {
            yAxes: [{
                stacked: true,
                position: "left",
                id: "y-axis-0",
            }],
            xAxes: [{
            }],
        }
    };
    var myChart = new Chart(id, {
        data: data_line,
        options: options_line,
    });
    
    char1 = myChart;

    // ajax_chart();

}


function double_lines(sensor1,sensor2,time,id,name){
    var data_line = 
    {
        labels: time ,
        datasets: [{
            type: 'line',
            label: 'suhu',
            id: "y-axis-0",
            borderColor: "lightblue",
            data: sensor1
        },{
            type: 'line',
            label: 'kelembaban',
            id: "y-axis-0",
            borderColor: "lightgreen",
            data: sensor2
        },
        ]
    };
    var options_line = 
    {
        responsive: true,
        // maintainAspectRatio: false,
        title: {
            display: true,
            text: name,
            position: 'left'
        },
        legend: {
            align: 'start',
            position: 'top',
        },
        tooltips: {
            mode: 'label'
        },
            
        scales: {
            yAxes: [{
                // stacked: true,
                position: "left",
                id: "y-axis-0",
            }],
            xAxes: [{
            }],
        }
    };

    var myChart = new Chart(id, {
        data: data_line,
        options: options_line,
    });
    if(id == "sensor1"){
        char2_id1 = myChart;
    }
    else{
        char2_id2 = myChart;
    }
}

function bars(sensor,id){
    var data_bar= 
    {
        labels: ['end data'],
        datasets: [{
            label: 'End Data',
            data:[sensor],
            backgroundColor: [
            // 'rgba(255, 99, 132, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            // 'rgba(255, 205, 86, 0.2)',
            // 'rgba(75, 192, 192, 0.2)',
            // 'rgba(54, 162, 235, 0.2)',
            // 'rgba(153, 102, 255, 0.2)',
            // 'rgba(201, 203, 207, 0.2)'
            ],
            borderColor: [
            // 'rgb(255, 99, 132)',
            // 'rgb(255, 159, 64)',
            // 'rgb(255, 205, 86)',
            // 'rgb(75, 192, 192)',
            // 'rgb(54, 162, 235)',
            'rgb(153, 102, 255)',
            // 'rgb(201, 203, 207)'
            ],
            borderWidth: 1
        }]
    };




    var options_bar = 
    {
        //   responsive: true,
        // maintainAspectRatio: false,
        title: {
            // display: true,
            text: 'Tipping bucket',
            position: 'left'
        },
        legend: {
            align: 'start',
            position: 'top',
        },
        tooltips: {
            mode: 'label'
        },
            
        scales: {
            yAxes: [{
            stacked: true,
            position: "left",
            id: "y-axis-0",
            }],
            y: {
            // min: 100,
            // max: 200,
            }
        }
    };

    var myChart = new Chart.Bar(id, {
        data: data_bar,
        options: options_bar,
    });
    
    char3 = myChart;
}

function double_bars(sensor1,sensor2,id){
    var data_bar= 
    {
        labels: ['end data'],
        datasets: [{
            label: 'End suhu',
            data:[sensor1],
            backgroundColor: [
            // 'rgba(255, 99, 132, 0.2)',
            // 'rgba(255, 159, 64, 0.2)',
            // 'rgba(255, 205, 86, 0.2)',
            // 'rgba(75, 192, 192, 0.2)',
            // 'rgba(54, 162, 235, 0.2)',
            // 'rgba(153, 102, 255, 0.2)',
            'rgba(201, 203, 207, 0.2)'
            ],
            borderColor: [
            // 'rgb(255, 99, 132)',
            // 'rgb(255, 159, 64)',
            // 'rgb(255, 205, 86)',
            // 'rgb(75, 192, 192)',
            // 'rgb(54, 162, 235)',
            'rgb(153, 102, 255)',
            // 'rgb(201, 203, 207)'
            ],
            borderWidth: 1
        },{
            label: 'End kelembaban',
            data:[sensor2],
            backgroundColor: [
            // 'rgba(255, 99, 132, 0.2)',
            // 'rgba(255, 159, 64, 0.2)',
            'rgba(255, 205, 86, 0.2)',
            // 'rgba(75, 192, 192, 0.2)',
            // 'rgba(54, 162, 235, 0.2)',
            // 'rgba(153, 102, 255, 0.2)',
            // 'rgba(201, 203, 207, 0.2)'
            ],
            borderColor: [
            'rgb(255, 99, 132)',
            // 'rgb(255, 159, 64)',
            // 'rgb(255, 205, 86)',
            // 'rgb(75, 192, 192)',
            // 'rgb(54, 162, 235)',
            // 'rgb(153, 102, 255)',
            // 'rgb(201, 203, 207)'
            ],
            borderWidth: 1
        }]
    };




    var options_bar = 
    {
        //   responsive: true,
        // maintainAspectRatio: false,
        title: {
            // display: true,
            text: 'Tipping bucket',
            position: 'left'
        },
        legend: {
            align: 'start',
            position: 'top',
        },
        tooltips: {
            mode: 'label'
        },
            
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    };

    var myChart = new Chart.Bar(id, {
        data: data_bar,
        options: options_bar,
    });
    if(id == "bar1"){
        char4_id1 = myChart;
    }
    else{
        char4_id2 = myChart;
    }
}

