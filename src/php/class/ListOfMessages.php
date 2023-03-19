<?php

class ListOfMessages
{
    // properties:            // NB: Later with user management empty msg list created with account
                              // NB2 : The anonymous msg list can't be deleted ( modifications by admin )
    private $nb_msg = 0;      /// = $this->nbMsg(); in construct OK ! ///  // No Empty List created (but when all messages are deleted...)
    private $owner = 'Anon';  // Actually as a beginning : 1 single list callled Anon-MessageList
    private $name = 'Anon-MessageList';         // <owner> . '-MessageList'  (+ Increment if one to many - TODO...)
    private $ficName = 'Anon-MessageList.txt';  // <owner> . '-MessageList' . '.txt'
    private $htmName = 'Anon-MessageList.html'; // <owner> . '-MessageList' . '.html'
    
    // expose private attributes ( nb_messages below ... )
    public function Owner() {
        
        return $this->owner;
    }

    public function Name() {

        return $this->name;
    }

    // construct
    public function __construct( $Msg = NULL, $Owner = 'Anon' ) {
 
        $this->owner = $Owner ;
        // Calculated properties
        $this->name = $Owner . '-MessageList';
        $this->ficName = $this->name . '.txt';
        $this->htpName = $this->name . '.html';
        
        // what we use
        $fic = $this->ficName;
        $nb = $this->nb_msg;
 
        /// echo 'In Consruct' . '<br>';
        /// echo $Msg . '<br>';

        // Implements :
        // A> Fic management - data persistence ( create / append + $Msg )
        //   1. File creation or open 'a' append mode

        $data = "$Msg\n";

        if(file_exists($fic)) {

          // nb_msg re-computed ! (not 0)
          $nb = $this->nbMsg();

        /* read only the first line of the file as we don't intend to have more */
          $file = fopen($fic, 'a');
          file_put_contents($fic, $data, FILE_APPEND);
          fclose($file);
          
          $nb = $nb + '1';
          
        } else {
        /* if file does not exist create it */
          file_put_contents($fic, $data);     
          
          $nb = $nb + '1';   
        }
        // Keep it
        $this->nb_msg = $nb;
        /// echo 'In Consruct, nb_msg = ' . "$nb" . '<br>';
    }

    // Add Msg (not NULL)
    public function addMsg( $Msg, $Owner = 'Anon' )  {
        
        /// echo 'In addMsg' . '<br>';
        /// echo $Msg . '<br>';

        $this->__construct( $Msg, $Owner );
        
    }  

    // Number of Messages ( Each line in fic is a message )
    public function nbMsg ( $Owner = 'Anon' ) {
    
        // Local
        $nb_msg = 0;

        // what we use
        $name = $Owner . '-MessageList';
        $fic = $name . '.txt';
        
        /// echo 'In nbMsg func' . '<br>';

        if(file_exists($fic)) {

            foreach(file("$fic") as $line) {  

                $nb_msg++;
            }
        } else {

            echo 'NOTICE : This user has no Message List' . '<br>';
            $nb_msg = -1;
        }

      return $nb_msg;
    }

     // Only Owner of the List can delete Msg (TODO : User Mgmnt & Policy)
     // Delete Msg numbers given as parameters
    public function delMsg(string $Owner, $MsgNbr) {

        // Local
        $no_msg = 0;    
        $arrayOfMsg = [];
        $i = 0;
        
        // what we use
        $name = "$Owner" . '-MessageList';
        $fic = "$name" . '.txt';
        $fic_tmp = "$name" . '.txt.tmp';

        /// echo 'In delMsg func' . '<br>';
        /// echo '$fic value : ' . "$fic" . '<br>';

        if(file_exists($fic)) {
            // Create array of messages from list
            //                 without suppressed messages 
            foreach(file("$fic") as $line) {  

                $no_msg++;
                if (! in_array($no_msg, $MsgNbr)) {

                    array_push($arrayOfMsg, $line);
                    $i++;
                } /*else {
                    echo 'IN MSG TO DEL' . '<br>';
                } */

            }

            // If all Msg have been deleted (create empty fic_tmp)
            touch($fic_tmp);
            // Write array of messages in temporary file
            foreach($arrayOfMsg as $line) {
                file_put_contents("$fic_tmp", $line, FILE_APPEND);
            }
            // Apply modifications
            rename("$fic_tmp","$fic");
            // All ok
            return 0;
          
        } else {

            echo 'NOTICE : This user has no Message List' . '<br>';
            // Error
            return -1;
        }



    }

    // List (Store fic of Msg contents in Array)
    public function listMsgs ( $Owner = 'Anon' ) {
        
        // Local
        $name = $Owner . '-MessageList';
        $arrayOfMsg = [];
        $i = 0;

        // what we use
        $fic = $name . '.txt';
        
        ///echo 'In List func' . '<br>';
        // Implements :
        //   3. Return an array of the fic of Msg lines (1 line = 1 Msg) 
       if(file_exists($fic)) {

            foreach(file("$fic") as $line) {  

                $arrayOfMsg[$i] = $line;
                $i++;
            }
        } else {

            echo 'NOTICE : This user has no Message List' . '<br>';
        }

      return $arrayOfMsg;
    }

    // View function
    public function display () {

        // what we use
        $fic = $this->ficName;
        $htm = $this->htpName;

        echo 'In displayList func' . '<br>';
        // Implements :
        // B> Create HTML View (an HTML file) - if not already exists 
        //   1. Header of a List of Messages (fixed .head file ?)
        //   CODE HERE
        //   2. Encapsulate Fic line (only text) in HTML/CSS line
        //   CODE HERE
        //   3. Add footer of List of Message Page (fixed .foot file ?)
        //   CODE HERE
 
    }

    // Remove all Messages
    public function remove () {
        // what we use
        $fic = $this->ficName;
        $htm = $this->htpName;

        echo 'removing ' . $this->name . '<br>';
        // Implements : deletion of Fic and view (html file) of the list 
    }
  
}

?>
<!--
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


// what we use
        $fic = $this->ficName;
        $nb = $this->nbMsg;

        echo 'In addMsg' . '<br>';
        echo $Msg . '<br>';

        $nb = $nb + '1';
        // Implements :
        // A> Fic management - data persistence ( create / append + $Msg )
        //   1. File creation or open 'a' append mode
        //   CODE HERE
        //   2. $Msg added in file $ficname
        //   CODE HERE
        //   3. Return an array of the file lines (1 line = 1 Msg)
        //   CODE HERE
        if(file_exists($fic)) {

        /* read only the first line of the file as we don't intend to have more */
          $file = fopen($fic, 'a');
          $data = "$Msg\n";
          file_put_contents($fic, $data . "\n", FILE_APPEND);
          fclose($file);
          
          $nb = $nb + '1';
          echo 'In Consruct : $nb value is ' . $nb . '<br>';
        } else {
        /* if file does not exist create it */
          file_put_contents($fic, "$Msg\n");        
        }
        // Keep it
        $this->nbMsg = $nb;


-->
