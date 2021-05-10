<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Pie Chart</title>
<script type="text/javascript" src="Chart.js"></script>
</head>

<body onload="location.reload();">
<?php 
include("koneksi.php");
$dimensi=$_GET['dimensi'];
$jml=$_GET['jml'];
$produk = mysqli_query($koneksi,"select * from fakta group by ".$dimensi."");

	if ($jml=='qtyjual'){
	while($row = mysqli_fetch_array($produk)){
	$a[] = $row[''.$dimensi.''];
	
	$query = mysqli_query($koneksi,"select sum(qtyjual) from fakta where ".$dimensi."='".$row[''.$dimensi.'']."' group by ".$dimensi."");
	$row = $query->fetch_array();
	$b[] = $row['sum(qtyjual)'];

}} elseif($jml=='jumlahjual'){
	while($row = mysqli_fetch_array($produk)){
	$a[] = $row[''.$dimensi.''];
	$query = mysqli_query($koneksi,"select sum(jumlahjual) from fakta where ".$dimensi."='".$row[''.$dimensi.'']."' group by ".$dimensi."");
	$row = $query->fetch_array();
	$b[] = $row['sum(jumlahjual)'];
}}

?>
<div style="width: 790px;margin: 0px auto;">
	<canvas id="pieChart"></canvas>
</div>

<script>
		var ctx = document.getElementById('pieChart').getContext('2d');
			window.myPie = new Chart(ctx, config);
		var config = {
			type: 'pie',
			data: {
				datasets: [{
					data:<?php echo json_encode($b); ?>,
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(100, 130, 120, 0.2)',
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(199, 116, 219, 1)',					
					],
					label: 'Presentase Penjualan Barang'
				}],
				labels: <?php echo json_encode($a); ?>},
			options: {
				responsive: true
			}
		};
	</script>

</body>
</html>
