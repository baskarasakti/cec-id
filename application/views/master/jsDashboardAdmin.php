<!-- jQuery 2.1.4 -->
<script src="<?php echo base_url(); ?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/app.min.js"></script>
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
var dataline = JSON.parse('<?php echo(json_encode($murid_per_level));?>');
var data = [];
var level = [];
for (var i = 0; i < dataline.length; i++) {
      data[i] = parseInt(dataline[i].murid);
      level[i] = dataline[i].levels;
}
console.log(level);
ctx.height = 100;
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: level,
        datasets: [{
            label: "jumlah murid per level",
            data: data,
            backgroundColor: [
                "#FF6384",
                "#36A2EB",
                "#FFCE56",
                "#1abc9c",
                "#2ecc71",
                "#9b59b6",
                "#34495e",
                "#95a5a6",
                "#d35400",
                "#c0392b",
                "#2980b9",
                "#27ae60"
            ],
            borderColor: [
                "#FF6384",
                "#36A2EB",
                "#FFCE56",
                "#1abc9c",
                "#2ecc71",
                "#9b59b6",
                "#34495e",
                "#95a5a6",
                "#d35400",
                "#c0392b",
                "#2980b9",
                "#27ae60"
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive:true,
        maintainAspectRatio:false,
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});

var cts = $("#pieChart");
var data2 = [<?php echo $murid_belumbayar;?>, <?php echo $murid-$murid_belumbayar;?>];
var myChart = new Chart(cts, {
    type: 'pie',
    data: {
        labels: ["Murid Belum Bayar", "Murid Sudah Bayar"],
        datasets: [{
            label: 'operational cost',
            data: data2,
            backgroundColor: [
                "#FF6384",
                "#36A2EB",
                "#FFCE56",
                "#1abc9c",
                "#2ecc71",
                "#9b59b6",
                "#34495e",
                "#95a5a6",
                "#d35400",
                "#c0392b",
                "#2980b9",
                "#27ae60"
            ],
            borderColor: [
                "#FF6384",
                "#36A2EB",
                "#FFCE56",
                "#1abc9c",
                "#2ecc71",
                "#9b59b6",
                "#34495e",
                "#95a5a6",
                "#d35400",
                "#c0392b",
                "#2980b9",
                "#27ae60"
            ],
            borderWidth: 1
        }]
    },
    options :{
        responsive:false,
        maintainAspectRatio:false,
        scales: {
            xAxes: [{
                display: this.scalesdisplay,
                ticks: {
                    beginAtZero:this.beginzero,
                }
            }],
            yAxes: [{
                display: this.scalesdisplay,
                ticks: {
                    beginAtZero:this.beginzero,
                }
            }]
        },
        legend: {
            display: true,
            labels: {
                fontSize: 25
            }
        },
        tooltips: {
            titleFontSize: 25,
            bodyFontSize: 25,
            footerFontSize: 25
        }
    }
});

</script>