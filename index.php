<?php
// include '';
$fileName = 'names-short-list.txt';

$lineNumber = 0;

// load up the array
$FH = fopen("$fileName", "r");
$nextName = fgets($FH);

while(!feof($FH)) {
  if($lineNumber % 2 == 0) {
    $fullName[] = trim(substr($nextName, 0, strpos($nextName, " --00")));
  }

$lineNumber++;

$nextName = fgets($FH);
}






// get all first names
foreach($fullNames as $fullName) {
  $startHere = strpos($fullName, ",") + 1;
  $firstNames[] = trim(substr($fullname, $startHere));
}

// get all last names
foreach($fullNames as $fullName) {
  $stopHere = strpos($fullName, ",");
  $lastNames[] = substr($fullName, 0, $stopHere);
}

// get valid names 
for($i = 0; $i < sizeof($fullNames); $i++) {
  // jam the first and last name together without a comma, then rest for alpha-only characters
  if(ctype_alpha($lastNames[$i].$firstNames[$i])) {
    $validFirstNames[$i] = $firstNames[$i];
    $validLastNames[$i] = $lastNames[$i];
    $validFullNames[$i] = $validLastNames[$i] . "," . $validFirstNames[$i];
  }
}

// Display results 

echo '<h1>Names - Results</h1>';
echo "<p>There are " . sizeof($fullNames) . " total names</p>";
echo '<ul style="list-style-type:none">';
  foreach($fullNames as $fullName) {
    echo "<li>$fullName</li>";
  }
echo "</ul>";

echo '<h2>All Valid Names</h2>';
echo "<p>There are " . sizeof($validFullNames) . " valid names</p>";
echo '<ul style="list-style-type:none">';
  foreach($validFullNames as $validFullname) {
    echo "<li>$validFullname</li>";
  }
echo "</ul>";

echo '<h2>Unique Names</h2>';
$uniqueValidNames = (array_unique($validFullNames));
echo ("<p>There are " . sizeof($uniqueValidNames) . "Unique names</p>");
echo '<ul style="list-style-type:none">';
  foreach($uniqueValidNames as $uniqueValidNames) {
    echo "<li>$uniqueValidNames</li>";
  }


?>