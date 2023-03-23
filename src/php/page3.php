<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Page Tests</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ url_for('static', path='/styles.css') }}" rel="stylesheet">
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
    />
  </head>
  <body id="body-p3">

    <?php
    /* THESE ARE TOTALLY IGNORED... So Dev can't <ignore> PHP errors pops 
       IN MIDDLE OF HTML page !!! ( I no longer like PHP !!! :P )
       => TODO : Perfect coding OR Try Catch */
    error_reporting(E_ALL & ~E_NOTICE); /* should avoid notices */
    ini_set("log_errors", 1);
    ini_set("display_errors", 0);
    ini_set("error_log", "/src/php/php-error.log");
    ini_set("error_reporting", E_ALL & ~E_NOTICE);

    /* after going to form in /php/index.php */ 
    /*if (isset($table_name) && ($table_name === true))*/
    /*if (@$table_name === true) { }*/
    $table_name = $_POST['Msg'];
    if (isset($Msg)) {
      echo "<p style='font-size: 2rem;'>$Msg</p>";
    }

    /* include 'like.php';*/
    
    $likeFile = 'like.txt';
    /* check if the like file exists*/
    if(file_exists($likeFile)) {
        /* read the only the first file of the file as we don't intend to have more */
        $file = fopen($likeFile, 'r');
        $like = fgets($file);
        fclose($file);
        if($like) {
            /* if we get the line split the string "likes=number" and get the existing count */
            /* explode var to store explode() result and avoid notice :
            Notice: Only variables should be passed by reference 
                               in /home/rdanbdd/www/page3.php on line 30"*/
            $explode=explode('=', $like);
            $likeCount = end($explode);
        }
    } else {
        $likeCount = 0;
    }
    
    
    ?>

    <nav class="navbar navbar-expand-sm navbar-light bg-warning" aria-label="Fourth navbar example(Bootstrap 2023)">
      <div class="container-fluid">
        <a class="navbar-brand" href="/src/index.html">
          <u style="text-decoration: overline underline">D</u>aniel'
          <u style="text-decoration: overline underline">S</u>
        </a>
        <a href="/src/php/note_form.php" aria-current="Saisie Msg">
           <u style="text-decoration: overline underline">S</u>aisie Message
        </a>
        <button 
          class="navbar-toggler collapsed" 
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarsExample04"
          aria-controls="navbarsExample04"
          aria-expanded="false"
          aria-label="Toggle navigation">
          <!--<span class="navbar-toggler-icon"></span>-->
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
            <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
          </svg>

        </button>
  
        <div class="navbar-collapse collapse" id="navbarsExample04" style="">
          <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <li class="nav-item">
             <a href="/src/php/msgFile.html" aria-current="Messages">Messages</a>
            </li>
            <li class="nav-item dropdown">
              <a style="align-items: center" class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Autres</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Une Action du sous-menu</a></li>
                <li><a class="dropdown-item" href="/src/php/class/TestClass.php">Action 2</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
            </li>
          </ul>
          <form role="search">
            <input class="form-control" type="search" placeholder="Tapez une recherche ICI (form-ctrl)" aria-label="Search">
          </form>
        </div>
      </div>
    </nav>
    <nav aria-label="breadcrumb">
      <!-- Déclaration du composant -->
      <ol class="breadcrumb">
        <!-- Item du fil d'ariane -->
       <li class="breadcrumb-item"><a href="/src/index.html">Accueil</a></li>
       <li class="breadcrumb-item"><a href="/src/page2.html">Page Zous</a></li>
       <li class="breadcrumb-item"><a href="/src/page3-B-Cards.html">Test B-Cards</a></li>     
       <li class="breadcrumb-item active">Interactions</li>     
      </ol>
   </nav>
    <main>
    
      <button style="background: Tomato;" id="bt_likes" type="button" href="javascript:void(0)" onclick="like()">
        Click me ( Likes :  <span id="count"><?php echo $likeCount ?></span> )
      </button>

      <div class="container">
        <div class="row align-items-start col-12">
          <div class="col-2 justify-center">
            <p>
              col-2<br />
              ......<br />
            </p>
          </div>
          <div class="col-10">
            <h4 class="col-6">&nbsp;&nbsp;&nbsp;____ ___ ____</h4>
            <h3 id="col0" class="col-8">Page pour les tests...</h3>
            <h4 class="col-6">&nbsp;&nbsp;&nbsp;____ ___ ____</h4>
            <p class="col col-3 justify-right">
              ..................................<br />
              .....................<br />
              ..........<br />
              .........<br />
              ............<br />
              col-6<br />
              ........<br />
              ...........<br />
              ................<br />
              .................<br />
            </p>
          </div>
        </div>
      </div>
    </main>
    <script type="module" src="{{ url_for('static', path='script.js') }}"></script>
    <script type="text/javascript" src="{{ url_for('static', path='php.js') }}"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
      integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
      integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD"
      crossorigin="anonymous"
    ></script>
     </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  </body>
</html>
