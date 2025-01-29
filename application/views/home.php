<div class="right_col" role="main">
       
  <div class="top_tiles">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
      <div class="small-box" style="padding: 5px 0; background-color: #0b545d; background-image: linear-gradient(#1caabb, #0b545d); color: white">
        <div class="inner">
          <h3><?php echo $total_patient." Pasien";?></h3>

          <p><b>Total Pasien</b></p>
        </div>
        <div class="icon">
          <i class="fa fa-users" style="color: white"></i>
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
      <div class="small-box" style="padding: 5px 0; background-color: #173a16; background-image: linear-gradient(#8f9e8f, #173a16); color: white">
        <div class="inner">
          <h3><?php echo $total_patient_today." Pasien";?></h3>

          <p><b>Total Pasien Hari Ini</b></p>
        </div>
        <div class="icon">
          <i class="fa fa-frown-o" style="color: white"></i>
        </div>
      </div>
    </div>
  </div>
  
  <div class="clearfix"></div>

  <div class="row">
    <div class="col-md-12 col-sm-12 ">
      <div class="x_panel">
        <div class="x_title">
          <h2 align="center">10 Grafik Penyakit Terbanyak</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <canvas id='myChart'></canvas>
        </div>
    </div>
  </div>

</div>

<script src="<?php echo base_url() ?>assets/js/Chart.js" type="text/javascript"></script>
<script>
  // Ambil data dari PHP ke dalam format JavaScript
  var labelsarr = <?php echo json_encode(array_column($top_diseases, 'ICD10Name')); ?>;
  var dataarr = <?php echo json_encode(array_column($top_diseases, 'total')); ?>;

  // Array warna untuk setiap bar (bisa diubah dengan warna yang diinginkan)
  var backgroundColors = [
    "green", "red", "blue", "orange", "purple", "cyan", "yellow", "pink", "brown", "grey"
  ];

  var ctx = document.getElementById("myChart");
  var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: labelsarr, // Labels berdasarkan nama penyakit
      datasets: [{
        label: 'Jumlah Pasien',
        backgroundColor: backgroundColors, // Menggunakan array warna untuk setiap bar
        borderColor: "black", // Warna border
        data: dataarr, // Data jumlah pasien berdasarkan penyakit
        fill: false,
      }]
    },
    options: {
      tooltips: {
        callbacks: {
          label: function(t, d) {
            var xLabel = d.datasets[t.datasetIndex].label;
            var yLabel = t.yLabel >= 1000 ? t.yLabel.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") : t.yLabel;
            return xLabel + ': ' + yLabel;
          }
        }
      },
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true,
            callback: function(value, index, values) {
              if (parseInt(value) >= 1000) {
                return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
              } else {
                return value;
              }
            }
          }
        }]
      }
    }
  });
</script>
