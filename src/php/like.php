<?php
if(isset($_POST['like']) && $_POST['like'] == true)
{
    $likeFile = 'like.txt';
    /* check if the like file exists*/
    if(file_exists($likeFile)) {
        /* read the only the first file of the file as we don't intend to have more */
        $file = fopen($likeFile, 'r');
        $like = fgets($file);
        fclose($file);
        if($like) {
            /* if we get the line split the string "likes=number" and get the existing count */
            
            /* - DR- explode var to store explode() result and avoid notice :
            Notice: Only variables should be passed by reference 
            in /home/rdanbdd/www/like.php on line..."                          */
            $explode=explode('=', $like);
            /* to trigger the notice described above... 
            $likeCount = end(explode('=', $like));                             */
            $likeCount = end($explode);
            
            $likeCount++; /* increment the count by one */
            file_put_contents($likeFile, 'likes=' . $likeCount); /* write the new count the same file and save it */
            echo $likeCount; /* return the like count to the ajax request */
        }
    } else {
    /* if file does not exist create it for the first time with count 1 */
        file_put_contents($likeFile, 'likes=1');
        echo '1';
    }
} else {
    return 'Something Wrong!';
}