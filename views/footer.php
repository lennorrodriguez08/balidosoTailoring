<!-- ChartJS script: BEGIN -->
<script>
        let ctx = document.getElementById('no_transaction').getContext('2d');
        var ctx_2 = document.getElementById('gross_chart').getContext('2d');

        let dataTransNo = JSON.parse('<?= addslashes(json_encode($row)) ?>');
        let dataGrossSale = JSON.parse('<?= addslashes(json_encode($row_gross_sale)) ?>');
        let dataGrossDue = JSON.parse('<?= addslashes(json_encode($row_gross_due)) ?>');

        let myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                datasets: [{
                    label: 'No. Of Transactions',
                    data: [
                        dataTransNo[0], 
                        dataTransNo[1], 
                        dataTransNo[2], 
                        dataTransNo[3], 
                        dataTransNo[4], 
                        dataTransNo[5], 
                        dataTransNo[6], 
                        dataTransNo[7], 
                        dataTransNo[8], 
                        dataTransNo[9], 
                        dataTransNo[10], 
                        dataTransNo[11], 
                        dataTransNo[12]
                        ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                    ],
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });



        let gross_chart = new Chart(ctx_2, {
            type: 'bar',
			data: {
				labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            datasets: [{
				label: 'Gross Sale',
				backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                    ],
				borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 99, 132)',
                    'rgb(255, 99, 132)',
                    'rgb(255, 99, 132)',
                    'rgb(255, 99, 132)',
                    'rgb(255, 99, 132)',
                    'rgb(255, 99, 132)',
                    'rgb(255, 99, 132)',
                    'rgb(255, 99, 132)',
                    'rgb(255, 99, 132)',
                    'rgb(255, 99, 132)',
                    'rgb(255, 99, 132)'
                ],
				borderWidth: 2,
				data: [
					dataGrossSale[0], 
                    dataGrossSale[1], 
                    dataGrossSale[2], 
                    dataGrossSale[3], 
                    dataGrossSale[4], 
                    dataGrossSale[5], 
                    dataGrossSale[6], 
                    dataGrossSale[7], 
                    dataGrossSale[8], 
                    dataGrossSale[9], 
                    dataGrossSale[10], 
                    dataGrossSale[11], 
                    dataGrossSale[12]
				]
			}, {
				label: 'Gross Due',
				backgroundColor: [
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                    ],
				borderColor: [
                    'rgb(54, 162, 235)',
                    'rgb(54, 162, 235)',
                    'rgb(54, 162, 235)',
                    'rgb(54, 162, 235)',
                    'rgb(54, 162, 235)',
                    'rgb(54, 162, 235)',
                    'rgb(54, 162, 235)',
                    'rgb(54, 162, 235)',
                    'rgb(54, 162, 235)',
                    'rgb(54, 162, 235)',
                    'rgb(54, 162, 235)',
                    'rgb(54, 162, 235)'
                ],
				borderWidth: 2,
				data: [
					dataGrossDue[0], 
                    dataGrossDue[1], 
                    dataGrossDue[2], 
                    dataGrossDue[3], 
                    dataGrossDue[4], 
                    dataGrossDue[5], 
                    dataGrossDue[6], 
                    dataGrossDue[7], 
                    dataGrossDue[8], 
                    dataGrossDue[9], 
                    dataGrossDue[10], 
                    dataGrossDue[11], 
                    dataGrossDue[12]
				]
			}]
			},
        });
    </script>
<!-- ChartJS script: END -->
  
  <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
  <script src="js/measurement.js"></script>
  <script src="js/disable.js"></script>
  <!-- <script src="js/form-validation.js"></script> -->

  
</body>
</html>