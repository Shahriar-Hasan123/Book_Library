<?php
   $index=$_GET["index"];
   $data=json_decode(file_get_contents("books.json"),true);
   unset($data[$index]);
   $data = json_encode($data, JSON_PRETTY_PRINT);
   file_put_contents("books.json", $data);
   header("location:index.php");
?>
