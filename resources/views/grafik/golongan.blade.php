var ctx = document.getElementById("golongan");
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
                'rgba(253, 97, 131, 0.5)',
                'rgba(74, 182, 255, 0.5)',
                'rgba(225, 236, 116, 0.5)',
                'rgba(175, 292, 102, 0.5)',
                'rgba(53, 202, 205, 0.5)',
                'rgba(55, 19, 164, 0.5)',
                'rgba(75, 272, 202, 0.5)',
                'rgba(153, 232, 85, 0.5)',
                'rgba(155, 109, 64, 0.5)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(253, 97, 131, 1)',
                'rgba(74, 182, 255, 1)',
                'rgba(225, 236, 116, 1)',
                'rgba(175, 292, 102, 1)',
                'rgba(53, 202, 205, 1)',
                'rgba(55, 19, 164, 1)',
                'rgba(75, 272, 202, 1)',
                'rgba(153, 232, 85, 1)',
                'rgba(155, 109, 64, 1)'
            ],
            borderWidth: 1
        }]
    }
});