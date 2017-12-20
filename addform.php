<?php
$title=filter_var($_REQUEST['title'],FILTER_SANITIZE_STRING);
$content=filter_var($_REQUEST['content'],FILTER_SANITIZE_STRING);

include('config.php');
$query="insert into test3_posts(title,content) values('".$title."','".$content."')";
if ($connection->query($query) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $query . "<br>" . $connection->error;
}

?>