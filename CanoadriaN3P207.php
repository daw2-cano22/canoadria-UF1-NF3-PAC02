<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Page Title</title>

		<style>
			tr {
				height: 80px;
				text-align: center;
			}
			
			tfoot tr:nth-child(2) {
				text-align: right;
				background-color: #f3f4f1;
			}
		</style>
	</head>
	<body>
	<?php
		$db = mysqli_connect('localhost', 'root', 'Alumno_2021') or die ('Unable to connect. Check your connection parameters.');
		mysqli_select_db($db,'moviesite') or die(mysqli_error($db));

		$noRegistros = 2;
		$pagina = 1;

		if($_GET["pagina"]) 
			$pagina = $_GET["pagina"];
		
		$buskr = $_GET['searchs']; //Palabra a buscar
		
		$sSQL = "SELECT * FROM movie WHERE movie_name LIKE '%$buskr%' LIMIT	".($pagina-1)*$noRegistros.",$noRegistros";
		$result = mysqli_query($db,$sSQL) or die(mysqli_error($db));
	?>
		<table>
			<tbody>
			<?php
				while ($row = mysqli_fetch_array($result)) {
					echo '<tr>';
						echo '<td>' . $row["movie_id"]. '<br></td>';
						echo '<td><img alt="Foto" src="img/' . $row["movie_id"] . '.jpg" height="70"></td>';
						echo '<td>' . $row["movie_name"] . '</td>';
						echo '<td>' . $row["movie_year"] . '</td>';
					echo '</tr>';
				}

				$sSQL = "SELECT count(*) FROM movie WHERE movie_name LIKE '%$buskr%'";

				//Cuento el total de registros
				$result = mysqli_query($db,$sSQL);
				$row = mysqli_fetch_array($result);
				$totalRegistros = $row["count(*)"];

				$noPaginas = $totalRegistros/$noRegistros;
			?>
			</tbody>
			
			<tfoot>
				<tr>
					<td colspan="2">
						<?php echo "<strong>Total registros:</strong>" . $totalRegistros; ?>
					</td>
					<td colspan="2">
						<?php echo "<strong>PÁGINA: </strong>" . $pagina; ?>			
					</td>
				</tr>

				<tr>
					<td colspan="4">
						<strong>Página;
						<?php							
							for($i=1; $i<$noPaginas+1; $i++) { 
								if($i == $pagina)
									echo '<span style="color: red;">' . $i . '</span>';
								else
									echo '<a href="?pagina=' . $i . '&searchs=' . $buskr . '" style="color: black;">' . $i . '</a>';
							}
						?>
						</strong>
					</td>
				</tr>
			</tfoot>
		</table>
	</body>
</html>