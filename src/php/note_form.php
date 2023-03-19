<html>
 <head>
  <title>Saisie du message</title>
  <link href="{{ url_for('static', path='/styles.css') }}" rel="stylesheet">
 </head>
 <body style="font-size: 8rem;"> 
 
    <nav class="navbar navbar-expand-sm navbar-light bg-warning" aria-label="Fourth navbar example(Bootstrap 2023)">
      <div class="container-fluid">
        <a class="navbar-brand" href="/src/php/page3.php">
          <u style="text-decoration: overline underline; font-size: 3rem">Retour
        </a>
      </div>
    </nav

    <!--APRES LES TESTS-->
    <form action="/src/php/add_note.php" method="POST">
    <!--<form action="./page3.php" method="POST">-->
      <input type="text" id="Msg" name="Msg" placeholder="Taper le message ici" 
            style="font-size: 3rem;"/>
      <input type="submit" name="validate_Msg" id="validate_Msg" value="Valider"
            style="font-size: 3rem;"/>
    </form>

 </body>
</html>
