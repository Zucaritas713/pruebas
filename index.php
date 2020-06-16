<!DOCTYPE html>
<html>
<head>
	<title>Codigo de barras</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="JsBarcode.all.min.js"></script>
</head>
<body>

	<div class="container">
		<div class="row">
			<h2>Generar codigo de barras con php, mysql y jsbarcode</h2>
			<div class="col-sm-4">
				<form action="php/insertar.php" method="post">
					<label>Nombre</label>
					<input type="text" id="nombre" name="nombre" class="form-control">
					<p></p>
					<button class="btn btn-primary" type="submit">
						Crear y generar nuevo codigo
					</button>
					<hr>
				</form>
			</div>
		</div>
		
<?php 
$conexion=mysqli_connect('localhost','root','1004130454','dbventas');
$sql="SELECT * FROM articulos";
$result=mysqli_query($conexion,$sql);

		//declaramos arreglo para guardar codigos
$arrayCodigos=array();
?>

<div class="row">
	<div class="col-sm-12">
		<table class="table" align="conter">
			<tr>
				<td>Nombre</td>
				<td>Codigo barras</td>
			</tr>
			<?php 
			while($ver=mysqli_fetch_row($result)):
				$arrayCodigos[]=(string)$ver[2]; 
				?>
				<tr>
					<td><?php echo $ver[1] ?></td>
					<td><?php echo $ver[3] ?></td>
					<td>
						<svg id='<?php echo "barcode".$ver[2]; ?>'>
						</td>
					</tr>
				<?php endwhile; ?>
			</table>
		</div>
	</div>



	<script type="text/javascript">

		function arrayjsonbarcode(j){
			json=JSON.parse(j);
			arr=[];
			for (var x in json) {
				arr.push(json[x]);
			}
			return arr;
		}

		jsonvalor='<?php echo json_encode($arrayCodigos) ?>';
		valores=arrayjsonbarcode(jsonvalor);

		for (var i = 0; i < valores.length; i++) {

			JsBarcode("#barcode" + valores[i], valores[i].toString(), {
				format: "codabar",
				lineColor: "#000",
				width: 2,
				height: 30,
				displayValue: true
			});
		}
		
	</script>
	</div>

	<br>
	
</body>
</html>