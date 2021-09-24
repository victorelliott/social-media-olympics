<html>
<head>
    <title>Social Media Olympics</title>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="socialMediaOlympics.css"/>
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <?php
        $str = "";
        $str .= "<div id='names' style='display: none'>".$_POST["names"]."</div>";
        $str .= "<div id='counts' style='display: none'>".$_POST["counts"]."</div>";
        echo $str;
    ?>
    <script src="util.js"></script>
    <script>
        function Account(name, count)
        {
            this.name = name;
            this.count = count;
        }
        
        // Display the information of two random accounts on the page.
        function displayAccounts(accounts, numAccounts)
        {
            var i1 = getNumInRange(0, numAccounts - 1);
            var i2 = getNumInRange(0, numAccounts - 1);
            while (i1 == i2)
            {
                i2 = getNumInRange(0, numAccounts - 1);
            }

            a1 = accounts[i1];
            a2 = accounts[i2];
            document.getElementById("left_name").innerHTML = a1.name;
            document.getElementById("left_count").innerHTML = delimit(a1.count);
            document.getElementById("right_name").innerHTML = a2.name;
            document.getElementById("right_count").innerHTML = delimit(a2.count);
        }
        
        // Check if the answer is correct.
        function compare(answer, other, accounts, noClick)
        {
            noClick.noclick = true;
            var answerCount = parseCount(document.getElementById(answer).innerHTML);
            var otherCount = parseCount(document.getElementById(other).innerHTML);
            var answerStyle = document.getElementById(answer).style;
            var otherStyle = document.getElementById(other).style;
            var red = "#e64949";
            var green = "#47c938";
            var black = "#000000";
            
            answerStyle.display = "block";
            otherStyle.display = "block";
            if (answerCount < otherCount)
            {
                answerStyle.color = red;
                otherStyle.color = green;
                setTimeout(function()
                {
                    noClick.noclick = false;
                    answerStyle.display = "none";
                    otherStyle.display = "none";
                    answerStyle.color = black;
                    otherStyle.color = black;
                    document.getElementById("score_form").submit();
                }, 3000);
            }
            else 
            {
                increaseScore();
                answerStyle.color = green;
                otherStyle.color = red;
                setTimeout(function()
                {
                    noClick.noclick = false;
                    answerStyle.display = "none";
                    otherStyle.display = "none";
                    answerStyle.color = black;
                    otherStyle.color = black;
                    displayAccounts(accounts, accounts.length);
                }, 3000);
            }
        }
        
        // Assumes HTML is formatted as such: "# [SCORE]".
        function increaseScore()
        {
            score = parseInt(document.getElementById("score").innerHTML);
            document.getElementById("score").innerHTML = ++score;
            document.getElementById("hidden_score").value = score;
            $(".scoreCircle").fadeOut(100).fadeIn(100).fadeOut(100).fadeIn(100);
        }

        window.onload = function()
        {
            var accounts = [];
            var names = document.getElementById("names").innerHTML.split(",");
            var counts = document.getElementById("counts").innerHTML.split(",");
            for (var i = 0; i < names.length; i++)
            {
                accounts.push(new Account(names[i], parseInt(counts[i])));
            }
            displayAccounts(accounts, accounts.length);
            
            var noClick = new NoClick();
            document.getElementById("left").onclick = function()
            {
                if (!noClick.noclick)
                {
                    compare("left_count", "right_count", accounts, noClick);
                }
            }
            document.getElementById("right").onclick = function()
            {
                if (!noClick.noclick)
                {
                    compare("right_count", "left_count", accounts, noClick);
                }
            }
        }
    </script>
</head>
<body>
    <a href="index.html">
        <p>
            <img src="icon.png" height=70px>
            <!-- should fix color and background checkered-ness -->
            <h1> Social Media Olympics </h1>
        </p>
    </a>
    <div class="blue2">
        <div class="question">
            <?php
                echo "<div>".$_POST["desc"]."</div>";
            ?>
            <div class="scoreCircle">
              <br> Score:
              <div id="score">0</div>
            </div>
        </div>
        <div class="left" id="left">
            <div id="left_name">&nbsp</div>
            <div id="left_count" style="display: none">&nbsp</div>
        </div>
        <div class="right" id="right">
            <div id="right_name">&nbsp</div>
            <div id="right_count" style="display: none">&nbsp</div>
        </div>
    </div>
    <form method="get" action="endPage.php" id="score_form">
        <input type="hidden" id="hidden_score" name="hidden_score" value="0">
    </form>
</body>
</html>
