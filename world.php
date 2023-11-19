<?php
header("Access-Control-Allow-Origin: *");

$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';
$country = $_GET['country'];
$lookup = $_GET['lookup'];

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$citystmt = $conn->query("SELECT c.country_code, c.name as city, c.district, c.population, cs.code, cs.name, cs.continent, cs.independence_year, cs.head_of_state FROM countries cs JOIN cities c ON code=country_code  WHERE cs.name LIKE '%$country%'");
$countrystmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
$cityresults = $citystmt->fetchAll(PDO::FETCH_ASSOC);
$countryresults = $countrystmt->fetchAll(PDO::FETCH_ASSOC);

?>

  <?php if($lookup== 'cities'):?>
    <table>
      <head>
        <th>Name</th>
        <th>District</th>
        <th>Population</th>
      </head>
      <?php foreach ($cityresults as $row): ?>
        <tr>
          <td><?= $row["city"] ?></td>
          <td><?= $row["district"] ?></td>
          <td><?= $row["population"] ?> </td>
        </tr>
      <?php endforeach; ?>
    </table>

  <?php else: ?>

    <table>
      <head>
        <th>Name</th>
        <th>Continent</th>
        <th>Independence</th>
        <th>Head of State</th>
      </head>
      <?php foreach ($countryresults as $row): ?>
        <tr>
          <td><?= $row["name"] ?></td>
          <td><?= $row["continent"] ?></td>
          <td><?= $row["independence_year"] ?> </td>
          <td><?= $row["head_of_state"] ?></td>
        </tr>
      <?php endforeach; ?>
    </table>
  <?php endif; ?>