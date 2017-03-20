<?php

function connectDatabase($host, $database, $user, $pass){
  try {
    //connects to the database
    $dbh = new PDO('mysql:host=' . $host . ';dbname=' . $database, $user, $pass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  // the above turn on errors so we can see what goes wrong

    return $dbh;

  } catch (PDOException $e) {
    print ('Error' . $e-> getMessage() . '<br>');
    // $e'->' is the arrow symbol meaning get something out of the following. In this case, get something out of the getMessage() function.
    die();
  }
}

function getProjects($dbh) {
    $sth = $dbh->prepare("SELECT * FROM projects");
    $sth->execute();
    $result = $sth->fetchAll();
    return $result;
}

function createProject($dbh, $title, $image_url, $content, $link){
  try {
     // the above turn on errors so we can see what goes wrong
    $sth = $dbh->prepare("INSERT INTO projects (title, image_url, content, link, created_at, updated_at)
    VALUES (:title, :image_url, :content, :link, NOW(), NOW())");
    //Bind the "$name" to the SQL statement.
    $sth->bindParam(':title', $title, PDO::PARAM_STR);
    //Bind the "$email" to the SQL statement.
    $sth->bindParam(':image_url', $image_url, PDO::PARAM_STR);
    //Bind the "$feedback" to the SQL statement.
    $sth->bindParam(':content', $content, PDO::PARAM_STR);
    $sth->bindParam(':link', $link, PDO::PARAM_STR);
    //Execute the statement
    $success = $sth->execute();

    return $success;

// The below will display an error if there is one. Without the below code it is harder to troubleshoot.
  } catch (PDOException $e) {
    print ('Error' . $e-> getMessage() . '<br>');
    // $e'->' is the arrow symbol meaning get something out of the following. In this case, get something out of the getMessage() function.
    die();
  }
}

