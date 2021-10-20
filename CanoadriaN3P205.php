<?php
$db = mysqli_connect('localhost', 'root', 'Alumno_2021') or die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db,'moviesite') or die(mysqli_error($db));

$query = 'insert into movie (movie_id, movie_name, movie_type, movie_year, movie_leadactor, movie_director) VALUES (4, "Star Wars", 1, 1977, 0, 0)';
$result = mysqli_query($db, $query) or die(mysqli_error($db));
$query = 'insert into movie (movie_id, movie_name, movie_type, movie_year, movie_leadactor, movie_director) VALUES (5, "American Graffit", 1, 1973, 0, 0)';
$result = mysqli_query($db, $query) or die(mysqli_error($db));
$query = 'insert into movie (movie_id, movie_name, movie_type, movie_year, movie_leadactor, movie_director) VALUES (6, "THX 1138", 1, 1966, 0, 0)';
$result = mysqli_query($db, $query) or die(mysqli_error($db));
?>
