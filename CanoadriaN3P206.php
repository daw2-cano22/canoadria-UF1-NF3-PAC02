<?php
$db = mysqli_connect('localhost', 'root', 'Alumno_2021') or die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db,'moviesite') or die(mysqli_error($db));

$query = 'SELECT m.movie_name, p.people_fullname, pf.people_fullname FROM movie m LEFT JOIN people p ON m.movie_leadactor = p.people_id LEFT JOIN people pf ON m.movie_director = pf.people_id WHERE m.movie_leadactor = p.people_id and m.movie_director = pf.people_id ORDER BY movie_leadactor';
$result = mysqli_query($db, $query) or die(mysqli_error($db));

echo '<table border="1">';
while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    foreach ($row as $value) {
        echo '<td>' . $value . '</td>';
    }
    echo '</tr>';
}
echo '</table>';


?>
