<?php

//echo "The score for " . $username . " is " . $score . "!"


        //establish connection info
        $server = "sql313.epizy.com";
        $userid = "epiz_28479705";
        $pw = "0yHoBFbbaGTyLM";
        $db= "epiz_28479705_leaderboard";

        // Create connection
        $conn = mysqli_connect($server, $userid, $pw );

        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        //echo "Connected successfully" . "<br>";

        //select the database
        $conn->select_db($db);
    
        if(isset($_POST['submit'])){
        
            if(!empty($_POST['username']) && ($_POST['score']) >= 0){


                $username = $_POST['username'];

                $score = $_POST['score'];

                $query = "INSERT INTO `leaderboard`(`Username`, `Score`) VALUES ('$username','$score')";

                $run = mysqli_query($conn,$query) or die(mysqli_error());

                if($run){
                    echo "Form submitted successfully!";
                }
                else {
                    echo "Form not submitted";
                }
            }

            else {
                echo "Please fill out both fields";
            }
        
        }            
    $conn->close();
    
?>





<html >
<head>
<meta charset="UTF-8">
<title> Leaderboard </title>
<h1>Add Score to Leaderboard</h1>
</head>
<body>
    
<form action="leaderForm.php" method="POST">
    <p>
        <label>Enter Username:</label>
        <input type="text" name="username" placeholder = "Username">
    </p>
    <p>
        <label>Enter Score:</label>
        <input type="text" name="score" placeholder = "Score">
    </p>
    <button type="submit" name="submit" >Submit</button>
</form>
    
    <script>
        function newGame(){
           window.location.href = "http://jdcomp20.42web.io/gamePage.html";
        }
    
    </script>
    
</body>
    
</html>


     
