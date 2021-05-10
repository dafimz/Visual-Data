<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<script type="text/javascript" src="jquery-3.5.1.min.js"></script>
<script>
    function refreshpage(){
        location.reload();
        }
    
    function displayResult(){ 
    var dimensi=document.getElementById("dimensi").value;
    var jml=document.getElementById("Measurement").value;
    if (document.getElementById('value').value=='sum') {
     
    $.ajax({
                    type: 'GET',
                    url: "dashboard_1.php",
                    data: {dimensi:dimensi,jml:jml},
                    success: function(data) {
                        $('#grafik').html(data);
                   }
                   });//ajax untuk menampilkan grafik
                                 }//pilihan jika ingin melihat Sum
                   
    else if (document.getElementById('value').value=='avg') {
    $.ajax({
                    type: 'GET',
                    url: "dashboard.php",
                    data: {dimensi:dimensi,jml:jml},
                    success: function(data) {
                        $('#grafik').html(data);
                   }
                   });//ajax untuk menampilkan grafik			   
                   }//pilihan jika ingin melihat AVG
    
    }
    </script>
</head>

<body style="background-color: GhostWhite">
    <?php 
        include('resources.php');
        include("koneksi.php");
    ?>

<div class="container-fluid">
    <div class="jumbotron">
    <h1>Aplikasi Analisis Data PT Nujum</h1>
    <h4>Analisis Data Anda Dengan Aplikasi Ini</h4>
    </div>
    <div class="row">
        <div class="col-md-4" style="text-align:center">
        <h1>Analisis Data Berdasarkan</h1>
    
        <div class="form-group">
            <label class="text-capitalize" style="font-family: 'Segoe UI'; font-size:18px">Dimensi yang ingin anda analisa</label>
    <select class="form-control" id="dimensi" onload="refreshpage();">
        <option value="id_produk">Dimensi Produk</option>
        <option value="id_cabang">Dimensi cabang</option>
        <option value="id_periode">Dimensi periode</option>
    </select></div>
    <div class="form-group">
            <label class="text-capitalize" style="font-family: 'Segoe UI'; font-size:18px">Measurement Apa yang ingin anda ukur</label>
    <select class="form-control" id="Measurement" onload="refreshpage();">
        <option value="qtyjual">Qty Penjualan</option>
        <option value="jumlahjual">Amount Penjualan</option>
    </select></div>
    <div class="form-group">
            <label class="text-capitalize" style="font-family: 'Segoe UI'; font-size:18px">Besaran yang ingin anda gunakan</label>
    <select class="form-control" id="value" onload="refreshpage();">
        <option value="sum">Sum</option>
        <option value="avg">Average</option>
    </select></div>
    <button class="btn btn-primary"id="visual" onclick="displayResult();" style="width:100%">Visualisasi</button>    
</div>
    <div class="col-md-8">
        <h1 style="text-align:center">Hasil Grafik</h1>
        <div id="grafik"></div>
        </div>
</div>
</div>
</body>
</html>
