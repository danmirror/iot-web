// ================chart===========


function lines(sensor,time,id,name){
    var data_line = 
    {
        labels: time ,
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

    Chart.Line(id, {
        data: data_line,
        options: options_line,
    });
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

    Chart.Line(id, {
        data: data_line,
        options: options_line,
    });
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

    Chart.Bar(id, {
        data: data_bar,
        options: options_bar,
    });
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

    Chart.Bar(id, {
        data: data_bar,
        options: options_bar,
    });
}

