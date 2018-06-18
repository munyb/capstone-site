<!DOCTYPE html>
<html lang = "en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="refresh" content="300" >

        <title>NEP-5</title>

        <!-- Google Fonts -->
        <!-- <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'> -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="style.css" type = "text/css" rel = "stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>

    <body onload="loadCoin('<?php echo($str) ?>')">

        <nav class="navbar">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">
                        <img src="images/chasing-neo.png" width="125px" href="home.php"></img>
                    </a>
                </div>
                <ul class="nav navbar-nav">
                    <li>NEP-5 Marketcap:
                        <strong>
                            <?php
                            include "model.php";
                            $theDBA = new DatabaseAdaptor();
                            $result = $theDBA->getMARKET_INFO();
                            echo "$" . number_format($result[0]['total_marketcap'])
                            ?>
                        </strong>

                        | NEO Dominance:
                        <strong>
                            <?php
                            echo $result[0]['neo_dominance'] . '%';
                            ?>
                        </strong>
                    </li>
                </ul>
            </div>
        </nav>
        

        <div class="donate-description text-center">
            <h1>Donate</h1>
            </br>
            <p>
                If you would like to donate to help contribute to development and costs of operation, below are accepted currency addresses. <br/>
                This site is provided for free by a sole college developer so all contributions are appreciated!
            </p>

        </div>

        
        <div class="addresses">
           <div class="address text-center">
               <h6>Neo and Gas</h6>
               <p class="neo-add"><small>ARC5HmFgY8dPAo2ScYW4Dn6cqwJ1tiL7Ks</small></p>
           </div>
        
           <div class="address text-center">
               <h6>Bitcoin</h6>
               <p class="btc-add"><small>14xbk5z6MXTMQsF3ctm7Eg62LBW4TWpwtp</small></p>
           </div>
        
           <div class="address text-center">
               <h6 >Ethereum</h6>
               <p class="eth-add"><small>0xef845a89759133473a7118a3faaf313d2a4e6eaf</small></p>
           </div>
        </div>
            

        <div class="footer text-center bg-info">
            <div class="footer-links">
                <a class="item" href="/about.html">About</a>
                <a class="item" href="/donate.php">Donate</a>
                <a class="item" href="/contact.php">Contact</a>
            </div>

            <div class="copy text-center">
                Designed and developed by <a class="item" href="https://brandonbynum.com">Brandon Bynum</a> <i class="far fa-copyright fa-1x"></i> 2018
            </div>
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS, then FontAwesome -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js" integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ" crossorigin="anonymous"></script>


    </body>
</html>
