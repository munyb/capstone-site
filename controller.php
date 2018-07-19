<?php
	include "model.php";

	$theDBA = new DatabaseAdaptor();

 	$table_html = ''; // VARIABLE HOLDING ALL OF THE HTML CODE FOR TABLE
	$coins = $theDBA->sortbyMARKETCAP();  // ALL COINS' DATA SORTED BY MARKETCAP IN ASCENDING ORDER
	for($i = 0; $i < count($coins); $i++) {
		// ------------- JSON ARRAY EXAMPLE -------------->
		//{
	    //   "id": "thekey",
	    //    "name": "THEKEY",
	    //    "symbol": "TKY",
	    //    "rank": "1199",
	    //    "price_usd": "0.0355738",
	    //    "price_btc": "0.00000359",
	    //    "24h_volume_usd": "3053080.0",
	    //    "market_cap_usd": null,
	    //    "available_supply": null,
	    //    "total_supply": "10000000000.0",
	    //    "max_supply": null,
	    //    "percent_change_1h": "3.12",
	    //    "percent_change_24h": "-4.88",
	    //    "percent_change_7d": "11.83",
	    //    "last_updated": "1518769460"
	    //}
	    // ----------------------------------------------->
	    // -------- ASSIGN JSON VALUES TO VARIABLES ------>
	    $nep5rank = $i + 1;
		$id = $coins[$i]['id'];
    	$name = $coins[$i]['name'];
		$symbol = $coins[$i]['symbol'];
		$grank = $coins[$i]['grank'];
		$price_usd = $coins[$i]['price_usd'];
		$price_btc = $coins[$i]['price_btc'];
		$market_cap_usd = $coins[$i]['market_cap_usd'];
		$available_supply = $coins[$i]['available_supply'];
		$total_supply = $coins[$i]['total_supply'];
		$max_supply = $coins[$i]['max_supply'];
		$percent_change_1h = $coins[$i]['percent_change_1h'];
		$percent_change_24h = $coins[$i]['percent_change_24h'];
		$percent_change_7d = $coins[$i]['percent_change_7d'];

		// -------- SET COLOR OF COIN PRICE CHANGE PERCENTAGES IN TABLE --------->
        $hr_color = 'text-success';
        $day_color = 'text-success';
        $week_color = 'text-success';
        if (strpos($percent_change_1h, '-') !== false) {
          $hr_color = 'text-danger';
        }
        if (strpos($percent_change_24h, '-') !== false) {
          $day_color = 'text-danger';
        }
        if (strpos($percent_change_7d, '-') !== false) {
          $week_color = 'text-danger';
        }

        // --------------- CHANGE VALUES UNDER .1 TO 5 DECIMALS ------------------>
        if($price_usd < .1) {
          $price_usd = number_format($price_usd, 5);
        } else {
          $price_usd = number_format($price_usd, 2);
        }

        $table_html .=
          '<tr>' .
	          '<td id="rank">' . $nep5rank . '</td>' .
		      '<td id="global">' . $grank . '</td>' .
		      '<td id="name"> <img src="images/' .  $id . '.png" width="25"> <a href="coinpage.php?coin=' . $id . '">' . $name . '</a></td>' .
		      '<td id="symbol">' . $symbol . '</td>' .
		      '<td id="price_usd">' . "$". $price_usd . '</td>' .
	          '<td id="supply">' . number_format($available_supply, 0) . '</td>' .
              '<td id="marketcap">' . "$".number_format($market_cap_usd) . '</td>' .
		      '<td id="1hr_change" class="' . $hr_color . '">' . floatval($percent_change_1h) . '%</td>' .
	          '<td id="day_change" class="' . $day_color . '">' . floatval($percent_change_24h) . '%</td>' .
	          '<td id="7day_change" class="' . $week_color . '">' . floatval($percent_change_7d) . '%</td>' .
       	  '</tr>';


    }


	if(isset($_GET['action']) && $_GET['action'] == 'loadTable') {
	    echo($table_html);
    }

	//------------- LOAD COINPAGE.PHP CONTENT --------------------------------->
	if(isset($_GET['coin'])) {

		$info = $theDBA->getCOIN_INFO($_GET['coin']);  // ALL COINS' DATA SORTED BY MARKETCAP IN ASCENDING ORDER
        //print_r($info);
		$id = $info[0]['id'];
        $name = $info[0]['name'];
        $symbol = $info[0]['symbol'];
        $grank = $info[0]['grank'];
        $maxSupply = $info[0]['max_supply'];
        $priceUSD = $info[0]['price_usd'];
        $priceBTC = $info[0]['price_btc'];
        $marketcap = $info[0]['market_cap_usd'];
        $availableSupply = $info[0]['available_supply'];
        $totalSupply = $info[0]['total_supply'];
        $percentChange1h = $info[0]['percent_change_1h'];
        $percentChange24h = $info[0]['percent_change_24h'];
        $percentChange7d = $info[0]['percent_change_7d'];

		$yesterdayPrice = 0;

		// ---------- YESTERDAY'S PRICE ------------------->
		if ($percentChange24h >= 0) {
			$yesterdayPrice = $priceUSD - ($priceUSD * ($percentChange24h / 100));
		}
		else {
			$yesterdayPrice = $priceUSD + ($priceUSD * (-$percentChange24h / 100));
		}
		if($yesterdayPrice < .1) {
			$yesterdayPrice = number_format($yesterdayPrice, 5);
		} else {
			$yesterdayPrice = number_format($yesterdayPrice, 2);
		}


        // --------------- CHANGE PRICE VALUES UNDER .1(10 cents) TO 5 DECIMALS ------------------>
        if($priceUSD < .1) {
          $priceUSD = number_format($priceUSD, 5);
        } else {
          $priceUSD = number_format($priceUSD, 2);
        }

		// -------- SET COLOR OF COIN PRICE CHANGE PERCENTAGES IN TABLE --------->
        $hrColor = 'text-success';
        $dayColor = 'text-success';
        $weekColor = 'text-success';
		$icon1h = 'fas fa-long-arrow-alt-up';
		$icon24h = 'fas fa-long-arrow-alt-up';
		$icon7d = 'fas fa-long-arrow-alt-up';

        if (strpos($percentChange1h, '-') !== false) {
          $hrColor = 'text-danger';
		  $icon1h = 'fas fa-long-arrow-alt-down';
        }
        if (strpos($percentChange24h, '-') !== false) {
          $dayColor = 'text-danger';
		  $icon24h = 'fas fa-long-arrow-alt-down';
        }
        if (strpos($percentChange7d, '-') !== false) {
          $weekColor = 'text-danger';
		  $icon7d = 'fas fa-long-arrow-alt-down';
        }

		$getSocial = $theDBA->getCOIN_SOCIAL($id);
		// ------------------- ARRAY EXAMPLE -------------->
		// Array ( [0] =>
		// 	Array (
		// 		[id] => neo
		// 		[name] => NEO
		// 		[website] => neo.org
		// 		[twitter] => twitter.com/neo_blockchain
		// 		[reddit] => https://www.reddit.com/r/NEO/
		// 		[telegram] =>
		//		[discord] =>
		// 	)
		// )
		// ------------------------------------------------->
		$social = array(
					'chrome' => $getSocial[0]['website'],
					'twitter' => $getSocial[0]['twitter'],
					'reddit' => $getSocial[0]['reddit'],
					'telegram' => $getSocial[0]['telegram'],
					'discord' => $getSocial[0]['discord'],
				);

		$html = '<div class="jumbotron text-center jumbotron-condensed jumbotron-fluid text-black" style="padding-bottom: 3%; width:auto; margin:0; background-color: #ffffff;">
                     <div class="container text-center">
					 	 <div class="row justify-content-center d-flex h-100">
                     	 	 <div class="col-sm-4 text-right my-auto" style="margin: 0;">
							 	 <img src="images/' .  $id . '.png" width="200px">
							 </div>
					 	 	 <div class="col-md-8 text-left my-auto" style="margin:0;">
							 	<p class="display-3">' . $name . ' / ' . $symbol . '</p>
							 	 <h5>'
								 	. $name .' is currently valued at <strong>$' . $priceUSD . '</strong>.
									 <p>Yesterday it was <strong>$' . $yesterdayPrice . '</strong>, change of <a class="' . $dayColor . '">
									' . $percentChange24h . '%. </a></p>
								 </h5>
					 	 	 </div>
					 	 </div>
					 <div class="container text-center" style="margin-top: 30px;">
					 	<h3>Connect with '. $symbol .'</h3>';
		//<h3>Price: $' . $priceUSD . '<span style="color:' . $hrColor . '">  (<i class="' . $icon1h . '"></i>' . $percentChange1h .')</h3>

		// ADD LINK AND IMAGE OF EACH SOCIAL MEDIA
		foreach($social as $key => $value) {
			$link = $social[$key];
			$icon = $key;
			if($value != NULL) {
				$html .= '<a href="'. $link . '" style="text-decoration: none; ">
							<i class="fab fa-' . $icon . ' fa-3x"></i>
						  </a> ';
			}
		}

        $html.=      	'</div>
                	</div>
				</div>
				<br>

				<div class="container-fluid" style="background-color: #eaecef; padding: 5%;">
					 <div class="row align-items-stretch justify-content-center">

						 	 <div class="card text-black bg-light  w-100" style="max-width: 18rem; margin-right:25px;">
						 		 <div class="card-body text-center">
						 			 	 <h6 class="card-title">Current Price</h5>
										 	<p class="card-text"><small>The active average value.</small></p>
									 	 <h4><p class="card-text">$' . $priceUSD . '</p></h4>
							  	 </div>
							 </div>

						 	 <div class="card text-black bg-light  w-100" style="max-width: 18rem; margin-right:25px;">
						 		<div class="card-body text-center">
					 			 	<h6 class="card-title">1 Hour Change</h6>
									<p class="card-text"><small>Price change over the last hour.</small></p>
								 	<p class="card-text">
									 	<h4><span class="' . $hrColor . '">  <i class="' . $icon1h . '"></i> ' . $percentChange1h .'%</span></h4>
									</p>
							  	</div>
							 </div>

						 	 <div class="card text-black bg-light w-100" style="max-width: 18rem; margin-right:25px;">
						 		 <div class="card-body text-center">
									<h6 class="card-title">24 Hour Change</h6>
									<p class="card-text"><small>Price change over the last 24 hours.</small></p>
									<p class="card-text">
										<h4><span class="' . $dayColor . '">  <i class="' . $icon24h . '"></i> ' . $percentChange24h .'%</span></h4>
									</p>
							  	 </div>
							 </div>

						 	<div class="card text-black bg-light w-100" style="max-width: 18rem; margin-right:25px;">
								<div class="card-body text-center">
									<h6 class="card-title">24 Hour Change</h6>
									<p class="card-text"><small>Price change over the last 24 hours.</small></p>
									<p class="card-text">
										<h4><span class="' . $weekColor . '">  <i class="' . $icon7d . '"></i> ' . $percentChange7d .'%</span></h4>
									</p>
								</div>
							</div>


					 </div>
				</div>
				';

		echo $html;

	}

    if(isset($_POST['submit'])) {
        $name = $_POST['name'];
        $mailFrom = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        $mailTo = "brandon@chasingneo.website";
        $headers = "From: " . $mailFrom;
        $txt = "You have recieved an email from "  . $name . ".\n\n" . $message;


        mail($mailTo, $subject, $txt, $headers);
        header('Location: contact-sent.php');
    }


?>
