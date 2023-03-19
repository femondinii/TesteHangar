<!DOCTYPE html>
<html>
<head>
	<title>Calcular média da turma</title>
</head>
<body>
	<form method="POST">
		<label>Nota 1:</label>
		<input type="number" name="nota1" required>
		<br>
		<label>Nota 2:</label>
		<input type="number" name="nota2" required>
		<br>
		<label>Nota 3:</label>
		<input type="number" name="nota3" required>
		<br>
		<label>Nota 4:</label>
		<input type="number" name="nota4" required>
		<br>
		<button type="submit">Calcular média</button>
	</form>

	<?php
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			$nota1 = $_POST['nota1'];
			$nota2 = $_POST['nota2'];
			$nota3 = $_POST['nota3'];
			$nota4 = $_POST['nota4'];

			$notas = array($nota1, $nota2, $nota3, $nota4);

			$media = array_sum($notas) / count($notas);

			if ($media < 5) {
				echo "A média da turma é $media e todos foram reprovados.";
			} elseif ($media < 7) {
				echo "A média da turma é $media e alguns alunos ficaram de exame.";
			} else {
				echo "A média da turma é $media e todos foram aprovados.";
			}
		}
	?>
</body>
</html>
