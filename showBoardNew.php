<html >
<head>
<meta charset="UTF-8">
<title> Leaderboard </title>
<h1> Leaderboard </h1>
</head>
<body>
    
<table> 
    <tr>
        <th>Username</th>
        <th>Score</th>
    </tr>
    <?php

        //establish connection info
        $server = "sql313.epizy.com";
        $userid = "epiz_28479705";
        $pw = "0yHoBFbbaGTyLM";
        $db= "epiz_28479705_leaderboard";

        // Create connection
        $conn = new mysqli($server, $userid, $pw );

        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        //echo "Connected successfully" . "<br>";

        //select the database
        $conn->select_db($db);

        //run a query
        $sql = "SELECT id, Username, Score FROM leaderboard ORDER by id DESC";
        // echo "<br />The query is: " . $sql ."<br />";
        $result = $conn->query($sql);
        

        if ($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
               echo "<tr><td>" . $row["Username"] . "</td><td>" . $row["Score"] . "</td></tr>";
            }
        }
        else 
            echo "no results";
            
        $conn->close();
    
?>
    
</table>

      

</body>
</html>