<?php

include('config.php');
$query = filter_var($_REQUEST['search_name'],FILTER_SANITIZE_STRING);

$result=$connection->query("select * from test3_posts where title LIKE '%".$query."%' or content LIKE'%".$query."%'");
	foreach($result as $results)
   	{
       $data[]= array('id'=>$results['id'],'title'=>ucwords($results['title']),'content'=>$results['content']);
       
    }
    
    print json_encode($data);


 ?>
