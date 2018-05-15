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
                    </strong></li>
                </ul>
            </div>
        </nav>


        <div class="jumbotron" style="background-image: url(https://images.unsplash.com/photo-1519995451813-39e29e054914?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=5c0478ad15d7b018f8bb59f644f17184&auto=format&fit=crop&w=1650&q=80);" >
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h1>Donate</h1>
                        </br>
                        <p class="donate">
                            If you would like to donate to help contribute to development and costs of operation, below are accepted currency addresses.
                        </p>
                        <p>
                            This site is provided for free by a sole college developer so all contributions are appreciated!
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="card text-black bg-light  w-200" style="margin: 10px;">
               <div class="card-body text-center">
                   <h6 class="card-title"><strong>Neo and Gas</strong></h6>
                   <p class="card-text">ARC5HmFgY8dPAo2ScYW4Dn6cqwJ1tiL7Ks</p>
               </div>
            </div>

            <div class="card text-black bg-light  w-200" style="margin: 10px;">
               <div class="card-body text-center">
                   <h6 class="card-title">Bitcoin</h6>
                   <p class="card-text"><small></small></p>
               </div>
            </div>

            <div class="card text-black bg-light  w-200" style="margin: 10px;">
               <div class="card-body text-center">
                   <h6 class="card-title">Ethereum</h6>
                   <p class="card-text"><small></small></p>
               </div>
            </div>
        </div>

        <footer class="container-fluid bg-success">
            <div class="row">
                <div class="col-sm-4 hidden-xs hidden-sm text-left" style="margin-left: 30px;">
                    <h6><strong>Quick Links</strong></h6>
                    <br>
                    <p><small><a href="about.php">About</a></small></p>
                    <p><small><a href="contact.php">Contact</a></small></p>
                    <p><small><a href="donate.php">Donate</a></small></p>
                </div>


                <div class="col-sm-3 hidden-xs hidden-sm text-left" style="margin-left: 30px;">
                    <h6 class="footer-head"></h6>
                    <br>
                    <small></small>
                </div>

                <div class="col-sm-3 hidden-xs hidden-sm text-left" style="margin-left: 30px;">
                    <h6><strong>API</strong></h6>
                    <br>
                    <small>
                        All data is generated using the
                        <a class="footer-link" href="https://coinmarketcap.com/" target="_blank" rel="nofollow">Coin Market Cap API</a>.
                        This is a non-commercial website provided free of charge with no available api for data retreival.
                    </small>
                </div>

            </div>
        </footer>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS, then FontAwesome -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js" integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ" crossorigin="anonymous"></script>


    </body>
</html>
