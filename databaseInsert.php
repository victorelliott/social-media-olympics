<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
//establish connection info
        $server = "sql313.epizy.com";
        $userid = "epiz_28479705	";
        $pw = "0yHoBFbbaGTyLM";
        $db= "epiz_28479705_leaderboard	";

        // Create connection
        $conn = mysqli_connect($server, $userid, $pw, $db );

    if(isset($_POST['submit'])){
        
        if(!empty($_POST['username']) && !empty($_POST['score'])){
            
            
            $username = $_POST['username'];
            
            $score = $_POST['score'];
            
            $query = "insert into form(username,score) values('$username' , '$score')";
            
            $run = mysqli_query($conn,$query) or die(mysqli_error());
            
            if($run){
                echo "Form submitted successfully!"
            }
            else {
                echo "Form not submitted"
            }
        }
        
        else {
            echo "Pleae fill out both fields"
        }
        
    }
?>

        