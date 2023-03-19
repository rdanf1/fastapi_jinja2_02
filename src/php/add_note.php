<meta http-equiv="refresh" content="2;/src/php/msgFile.html">

<!--
<main>
    <nav class="navbar navbar-expand-sm navbar-light bg-warning" aria-label="Fourth navbar example(Bootstrap 2023)">
      <div class="container-fluid">
        <a class="navbar-brand" href="/src/index.html">
          <u style="text-decoration: underline">R</u>etour &nbsp;&nbsp;&nbsp;
        </a>
        <a href="/src/php/note_form.php" aria-current="php index file">
           <u style="text-decoration: underline">S</u>aisie Nouveau Message &nbsp;&nbsp;&nbsp;
        </a>
        <a href="/src/php/msgFile.html" aria-current="php index file">
           <u style="text-decoration: underline">Liste </u>Messages
        </a>
      </div>
    </nav
</main>
-->
<?php
  /*
  if (isset($Msg)) {
    echo "<p style='font-size: 2rem;'>$Msg<br></p>";
  } */

  if(isset($_POST['Msg']) && $_POST['Msg'] == true) {
    
    $Msg = $_POST['Msg'];

    $msgFile = 'msgFile.html';
    /* check if the like file exists*/
    if(file_exists($msgFile)) {
        /* read only the first line of the file as we don't intend to have more */
        $file = fopen($msgFile, 'a');
        $data = "<p style='font-size: 3rem;'> $Msg<br></p>";
        file_put_contents($msgFile, $data . "\n", FILE_APPEND);
        
        /* log */
        echo "<p style='font-size: 3rem;'>Message ajouté : <br><br>$Msg</p>";

        fclose($file);
    } else {
    /* if file does not exist create it for the first time with count 1 */
        file_put_contents($msgFile, "<head><meta charset='utf-8'></head>" . "\n");
        file_put_contents($msgFile, "<p style='font-size: 3rem; background: MediumSeaGreen'" . " class='bg-warning'" . "> Liste des Messages <br></p>" . "\n", FILE_APPEND);
        file_put_contents($msgFile, "<a href='/src/index.html'>Retour</a>" . "\n", FILE_APPEND);
        $data = "<p style='font-size: 3rem;'> $Msg<br></p>";
        file_put_contents($msgFile, $data . "\n", FILE_APPEND);
        /* log */
        echo "<p style='font-size: 3rem;'>Message ajouté : <br><br>$Msg</p>";
    }
} else {
    return 'Something Wrong!';
}

