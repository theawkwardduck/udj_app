<?php

/*** CREATE A LOG FILE ***/
$logfile = '../../logs/songs.log';
error_log("start\n", 3, $logfile);

$searchText = $_GET["searchText"];
// $escapedSearchText = sqlite_escape_string($searchText);
$escapedSearchText = $searchText;

error_log("search text: $searchText\n", 3, $logfile);
error_log("escaped search text: $escapedSearchText\n", 3, $logfile);

/*** OPEN THE DATABASE ***/
try {
  // Create or open the database
  $database = new SQLite3('../../databases/request.sqlite');
  error_log("database created\n", 3, $logfile);
} catch(Exception $e) {
  error_log("error: $e\n", 3, $logfile);
  error_log("error: $error\n", 3, $logfile);
  die ($error);
}

/*** READ DATA FROM DATABASE ***/
$songArray = array();

/*** SEARCH THE SONGS DATABASE ***/
$query = $database->query("SELECT * FROM Songs WHERE (so_artist LIKE '%$searchText%') OR (so_title LIKE '%$searchText%') OR (so_album LIKE '%$searchText%')");

while($row = $query->fetchArray()) {
  error_log("Song id: " . $row['so_id'] . "\n", 3, $logfile);
  error_log("Song artist: " . $row['so_artist'] . "\n", 3, $logfile);
  error_log("Song title: " . $row['so_title'] . "\n", 3, $logfile);
  error_log("Song album: " . $row['so_album'] . "\n", 3, $logfile);
  error_log("Song votes: " . $row['so_votes'] . "\n", 3, $logfile);
  array_push($songArray, $row);
}

echo json_encode($songArray);

?>