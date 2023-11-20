<?php

$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

// Check if the 'country' parameter is set in the GET request
if (isset($_GET['country'])) {
  $country = $_GET['country'];
  $lookup = $_GET['lookup'];

  if ($lookup === 'cities') {
    $stmt = $conn->prepare("
    SELECT c.name AS city_name, c.district, c.population, co.name AS country_name
    FROM cities c
    INNER JOIN countries co ON c.country_id = co.id
    WHERE countries.name LIKE :country
  ");
  } else {
    $stmt = $conn->prepare("SELECT * FROM countries WHERE name LIKE :country");
  }

  $stmt->bindValue(':country', '%' . $country . '%', PDO::PARAM_STR);
} else {
  $stmt = $conn->query("SELECT * FROM countries");
}

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
var_dump($results);
?>

<table>
  <thead>
    <tr>
      <th>City Name</th>
      <th>District</th>
      <th>Population</th>
      <th>Country</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($results as $row) : ?>
      <tr>
        <td><?= $row['city_name'] ?></td>
        <td><?= $row['district'] ?></td>
        <td><?= $row['population'] ?></td>
        <td><?= $row['country_name'] ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>