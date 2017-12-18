<html>
<head>
<?php include("config.php");?>
<link href="style.css" rel="stylesheet" type="text/css"></link>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<body>
<div id="grid">
<h1>POST DATA</h1>
<input type="button" name="Add" value="ADD" class="add" />
  <table class="data-table">
    <form>
  <input type="text" name="search" placeholder="Search Here.." id="search" class="search">
</form>
    <thead>
      <tr>
        <th><?php echo strtoupper('id');?></th>
        <th><?php echo strtoupper('title');?></th>
        <th><?php echo strtoupper('content');?></th>
      </tr>
    </thead>
    <tbody class="gridData" id="gridData">
    <?php
   $query=$connection->query("select * from test3_posts");
    while ($row = mysqli_fetch_array($query))
    {
      echo '<tr>
          <td class="pid" style="width:50px;">'.ucwords($row['id']).'</td>
          <td class="ptitle"  style="width:100px;">'.ucwords($row['title']).'</td>
          <td class="pcontent"  style="width:500px;">'.$row['content'].'</td>
        </tr>';
    }
    ?>
    </tbody>
  </table>
</div>
<div id="register" class="animate form" style="display: none">
      <form  action="mysuperscript.php" autocomplete="on"> 
        <h1>Add Your Post Data</h1> 
        <table>
        <tr>
        <td> 
          <label for="Title" class="title" >Title*</label>
          </td>
          <td>
          <input id="title" name="title" required="required" type="text" placeholder="Enter The Tilte" />
        </td>
        </tr>
        <tr>
        <td> 
          <label for="Content" class="content"  >Content*</label>
          </td>
          <td>
           <input type="textarea" name="content" id="content" cols="30" rows="5">
        </td>
        </tr>
        <tr><td>
       
          <input type="button" value="SUBMIT" class="submit"/> 
        </td>
        </tr>
        
      </form>
    </div>

</html>




<script type="text/javascript">
jQuery(document).ready(function(){
    jQuery(".add").click(function(){
      jQuery("#grid").hide(1000);
      jQuery("#register").show(1000);
    });
    jQuery(".submit").click(function(){
      var post={};
      post.title=jQuery("#title").val();
      post.content=jQuery("#content").val();
      data = $(this).serialize() +$.param(post);
      $.ajax({
        type:'POST',
        url:'addform.php',
        data:data,
        success:function(response){
        window.location.reload('#grid');  
       }
     })
 });

     jQuery("#search").keyup(function(e){
         $.ajax({
                     type: 'POST',
                     url: 'response.php',
                     data: 'search_name='+$(this).val(),
                     success: function(data){
                      var jsonParse=$.parseJSON(data);
                      var  json_data =""; 
                      for(var i in jsonParse){
                          json_data+='<tr><td style="width:50px">'+jsonParse[i].id+'</td>'+
                            '<td style="width:100px">'+jsonParse[i].title+'</td>'+
                            '<td style="width:500px">'+jsonParse[i].content+'</td></tr>';
                        }
                       json_data+="";
                    jQuery('#gridData').empty().append(json_data);

                    
                 }
             });

    });
});
</script>