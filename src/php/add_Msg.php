<!-- We don't stay on this Page - 2s - Time to display if Msg was added successfully or not -->
<meta http-equiv="refresh" content="2;/src/php/msgFile.html">

<?php

  //
  // Same as add_note using ListOfMessages Class
  //

  // Only 1 Owner => 1 Msg List - "Adm-ListOfMsg"
  //    (User Accounts / Login => TODO Later)
  $Owner = 'Anon';   // that's already defined : default owner in constructor 
                    
  if(isset($_POST['Msg']) && $_POST['Msg'] == true) {
    // The Message was validated by user in "note_form.php" 
    
    $Msg = $_POST['Msg'];
   
    // We're almost finished here ! 
    $MsgList = new ListOfMessages ($Msg, $Owner);

    // This is it : View of the created or updated list of Msg is available. 
    $MsgList->Display()

  } else {
    return 'Something Wrong!';



