<?php
$title=$_REQUEST['title'];
$content=$_REQUEST['content'];

include('config.php');
$query="insert into test3_posts(title,content) values('".$title."','".$content."')";
if ($connection->query($query) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $query . "<br>" . $connection->error;
}

?>