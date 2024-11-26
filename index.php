<?php

// URL of the dataset from the API
$url = 'https://data.gov.bh/api/explore/v2.1/catalog/datasets/01-statistics-of-students-nationalities_updated/records?where=colleges%20like%20%22IT%22%20AND%20the_programs%20like%20%22bachelor%22&limit=100';

// Fetch the data as a json string, and check for error
$response = file_get_contents($url);
if ($respone === false) exit('Error fetching data from API');

// Convert the json into an associative array, and check for error
$result = json_decode($response, true);
if ($result === null) exit('Error converting JSON to array');

// The data we need is in the 'results' key, so we save it as the result (data) to be used
$result = $result['results'];

?>


<!-- HTML to present the fetched data -->
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
        <!-- Loop over all the data to show them as HTML table rows -->
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