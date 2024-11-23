<?php

$url = 'https://data.gov.bh/api/explore/v2.1/catalog/datasets/01-statistics-of-students-nationalities_updated/records?where=colleges%20like%20%22IT%22%20AND%20the_programs%20like%20%22bachelor%22&limit=100';
$response = file_get_contents($url);
$result = json_decode($response, true);
$result = $result['results'];

?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
  <title>IT Students Data</title>
</head>

<body class="container" style="text-align: center;">
  <header>
    <h1>Statistics on College of IT Students Nationalities</h1>
  </header>
  <main class="overflow-auto">
    <table>
      <thead data-theme="light">
        <tr>
          <th>Year</th>
          <th>Semester</th>
          <th>The Programs</th>
          <th>Nationality</th>
          <th>College</th>
          <th>No. Of Students</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($result as $data) : ?>
          <tr>
            <td><?= $data['year'] ?></td>
            <td><?= $data['semester'] ?></td>
            <td><?= $data['the_programs'] ?></td>
            <td><?= $data['nationality'] ?></td>
            <td><?= $data['colleges'] ?></td>
            <td><?= $data['number_of_students'] ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </main>

  <footer>
    <p>Done by <a href="https://github.com/S-Y-A-N/">S-Y-A-N</a> | <a href="https://github.com/S-Y-A-N/uob-student-nationalities">Source Code</a></p>
  </footer>
</body>

</html>