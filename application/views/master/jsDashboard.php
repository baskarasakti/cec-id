<!-- jQuery 2.1.4 -->
<script src="<?php echo base_url(); ?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/highcharts/highcharts.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/highcharts/theme1.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/highcharts/modules/data.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/highcharts/modules/drilldown.js"></script>
<!--script src="<?php echo base_url(); ?>assets/js/chart1.js"></script>
<script src="<?php echo base_url(); ?>assets/js/chart2.js"></script>
<script src="<?php echo base_url(); ?>assets/js/chart3.js"></script-->
<script type="text/javascript">
        var ctx = $("#barChart");
        var dataline = JSON.parse('<?php echo(json_encode($operational_cost));?>');
        var data = [];
        var periode = [];
        for (var i = 0; i < dataline.length; i++) {
          data[i] = parseInt(dataline[i].jumlah);
          periode[i] = dataline[i].periode;
        }
        console.log(data);
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: periode,
                datasets: [{
                    label: 'operational cost',
                    data: data,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });

        </script>