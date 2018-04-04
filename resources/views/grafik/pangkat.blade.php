var ctx = document.getElementById("pangkat");
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
                'rgba(205, 199, 232, 0.5)',
                'rgba(154, 172, 205, 0.5)',
                'rgba(55, 216, 186, 0.5)',
                'rgba(175, 162, 142, 0.5)',
                'rgba(253, 202, 255, 0.5)',
                'rgba(255, 59, 164, 0.5)',
                'rgba(75, 92, 192, 0.5)',
                'rgba(123, 176, 55, 0.5)',
                'rgba(255, 19, 164, 0.5)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(205, 199, 232, 1)',
                'rgba(154, 172, 205, 1)',
                'rgba(55, 216, 186, 1)',
                'rgba(175, 162, 142, 1)',
                'rgba(253, 202, 255, 1)',
                'rgba(255, 59, 164, 1)',
                'rgba(75, 92, 192, 1)',
                'rgba(123, 176, 55, 1)',
                'rgba(255, 19, 164, 1)'
            ],
            borderWidth: 1
        }]
    }
});