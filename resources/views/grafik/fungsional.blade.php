var ctx = document.getElementById("fungsional");
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [<?php echo $categories; ?>],
        datasets: [{
            label: 'Jumlah',
            data: {{json_encode($data)}},
            backgroundColor: [
                'rgba(255, 99, 132, 0.5)',
                'rgba(54, 162, 235, 0.5)',
                'rgba(255, 206, 86, 0.5)',
                'rgba(75, 192, 192, 0.5)',
                'rgba(153, 102, 255, 0.5)',
                'rgba(255, 159, 64, 0.5)',
                'rgba(175, 182, 162, 0.5)',
                'rgba(143, 152, 255, 0.5)',
                'rgba(255, 189, 164, 0.5)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(175, 182, 162, 1)',
                'rgba(143, 152, 255, 1)',
                'rgba(255, 189, 164, 1)'
            ],
            borderWidth: 1
        }]
    }
});