<?php
$db = mysqli_connect('localhost', 'root', 'Alumno_2021') or die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db,'moviesite') or die(mysqli_error($db));
$query = 'ALTER TABLE movie ADD CONSTRAINT fk_people_leadactor_id FOREIGN KEY (movie_leadactor) REFERENCES people(people_id)';
$result = mysqli_query($db, $query) or die(mysqli_error($db));
?>
