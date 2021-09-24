<html>
<head>
    <title> Social Media Olympics </title>
    <link rel="stylesheet" href="socialMediaOlympics.css"/>
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
</head>
<body>

  <a href="index.html">
    <p >
      <img src="icon.png" height=70px>
      <h1> Social Media Olympics </h1>
    </p>
  </a>


    <?php
        $score = $_GET["hidden_score"];
        echo "<div class='endScore'> You lost! That's too bad! <br>
        Your score: ".$score."</h1>";
    ?>

    <p class="blue" id="blue3">
      <a href="index.html">
          <button class="mainMenu">Main <br> Menu</button>
      </a>
    </p>

    <p class="blue" id="leaderboard">
      <a href="showBoardNew.php">
          <button class="mainMenu">See <br> Leaderboards</button>
      </a>
    </p>

</body>
</html>
