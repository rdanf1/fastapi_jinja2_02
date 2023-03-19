<html>
 <head>
  <title>1st PHP Page (testing Motor)</title>
 </head>
 <body style="font-size: 8rem;"> <!---->

    <form action="/src/php/page3.php" method="POST">
      <input type="text" id="table_name" name="table_name" placeholder="name" />
      <input type="submit" name="create_table" id="create_table" value="create a table"/>
    </form>
    
   <?php echo"<p>Hello World : $tablename </p>";?>

   <!-- DR - Was a little small from Android 
  <script type="text/stylesheet">
    body { 
      font-size: 24;
    }
  </script>-->

 </body>
</html>