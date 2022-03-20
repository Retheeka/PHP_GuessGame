<?php
    session_start();
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>PHP</title>
    <link rel="stylesheet" href="Secret.css" />
    <style>
        .over{
            margin:10px 25px;
            padding:10px 20px;
            background-color: rgba(184, 63, 63, 0.603);
            color:white;
            text-align:center;
        }
        .congrats{
            margin:10px 25px;
            padding:10px 20px;
            background-color: rgba(79, 168, 86, 0.575);
            color:white;
            text-align:center;
        }
    </style>
</head>
<body>
    
    <div class="game">
        <h1>GUESS GAME</h1>
        <h4>+ denotes the number is at exact position and also present in secret number<br>
            - denotes the number are in secret number but in different position<br>
            ' ' denotes the number is not present in secret number</h4>
        <?php  
            if(isset($_GET['over'])){
                $msg="Oopss!! Your chance is over!!!!";
                echo '<div class="over">'.$msg.'</div>';
                //echo $_SESSION['c'];
            }
            if(isset($_GET['congrats'])){
                $msg="Congratulations!<br>You won the game...";
                echo '<div class="congrats">'.$msg.'</div>';
                //echo $_SESSION['c'];
            }
        ?>
        <form method="post" action="Secret.php">
            <input type="password" placeholder="Player 1: Secret number" id="number" name="secret" value="<?php if(isset($_GET['reveal'])){echo $_SESSION['secret'];} ?>">
            <input type="text" placeholder="Player 2: Enter your guess" id="guess" name="number">
            <input type="submit" value="Check!!!" name="submit">
        </form>
        <input type="text" placeholder="Secret reveal" id="Secret" name="reveal" value="<?php if(isset($_GET['over'])||isset($_GET['congrats'])){echo $_SESSION['reveal'];} ?>">
        <h1><?php if(isset($_GET['reveal'])){echo $_SESSION['op'];} ?></h1>
    </div>

</body>
</html>
