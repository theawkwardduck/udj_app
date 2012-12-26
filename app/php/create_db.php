<?php

/*** CREATE A LOG FILE ***/
$logfile = '../../logs/create_database.log';
error_log("start\n", 3, $logfile);

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


/*** CREATE THE Djs TABLE ***/
$query = 'CREATE TABLE Djs ' .
         '(id INTEGER, name TEXT, email TEXT, PRIMARY KEY (id))';

if (!$database->exec($query)) {
  error_log("error: $error\n", 3, $logfile);
  die($error);
}

/*** ADD DATA TO THE TABLE ***/ 
$query = 
  'INSERT INTO Djs (id, name, email) ' .
  'VALUES (0, "DJ RanMan", "djranman@gmail.com"); ' .

  'INSERT INTO Djs (id, name, email) ' .
  'VALUES (1, "DJ Jazzy Jeff", "jazzyjeff@gmail.com"); ' .

  'INSERT INTO Djs (id, name, email) ' .
  'VALUES (2, "Skrillex", "skrillex@gmail.com"); ' .

  'INSERT INTO Djs (id, name, email) ' .
  'VALUES (3, "SleeperCell", "sleepercell@gmail.com"); ' .

  'INSERT INTO Djs (id, name, email) ' .
  'VALUES (4, "DeadMau5", "deadmau5@gmail.com"); ';

if (!$database->exec($query)) {
  error_log("error: $error\n", 3, $logfile);
  die($error);
}


/*** CREATE THE Songs TABLE ***/
$query = 'CREATE TABLE Songs ' .
         '(id INTEGER, artist TEXT, title TEXT, album TEXT, votes INTEGER, PRIMARY KEY (id))';

if (!$database->exec($query)) {
  error_log("error: $error\n", 3, $logfile);
  die($error);
}

/*** ADD DATA TO THE TABLE ***/ 
$query = 
  'INSERT INTO Songs (id, artist, title, album) ' .
  'VALUES (0, "Janelle Monae", "Many Moons", "Metropolis: The Chase Suite"); ' .

  'INSERT INTO Songs (id, artist, title, album) ' .
  'VALUES (1, "Fun.", "Some Nights", "Some Nights"); ' .

  'INSERT INTO Songs (id, artist, title, album) ' .
  'VALUES (2, "Fun.", "We Are Young", "Some Nights"); ' .

  'INSERT INTO Songs (id, artist, title, album) ' .
  'VALUES (3, "MIKA", "Love Today", "Life in Cartoon Motion"); ' .

  'INSERT INTO Songs (id, artist, title, album) ' .
  'VALUES (4, "Jessie J", "Domino", "Who You Are"); ';
  
if (!$database->exec($query)) {
  error_log("error: $error\n", 3, $logfile);
  die($error);
}


/*** CREATE THE Queue TABLE ***/
// The queue is intended to be temporary storage. There should be a different queue for each DJ
$query = 'CREATE TABLE Queue ' .
         '(id INTEGER, artist TEXT, title TEXT, album TEXT, votes INTEGER, PRIMARY KEY (id))';

if (!$database->exec($query)) {
  error_log("error: $error\n", 3, $logfile);
  die($error);
}

?>