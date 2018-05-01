<!DOCTYPE html>
<html lang = "en">
	<head>
		<meta http-equiv="refresh" content="60" >

	</head>
	<?php
		include 'model.php';
		// LIST OF EACH COIN'S ID AS SHOWN ON COINMARKETCAP.COM'S API
		$coin_ids = array('neo', 'gas', 'deepbrain-chain', 'qlink', 'trinity-network-credit', 'red-pulse', 'zeepin', 'thekey', 'alphacat', 'ontology');


		// LIST OF EACH COIN'S DATA POINT GIVEN FROM COINMARKETCAP.COM'S API
		$data_points = array('id', 'name', 'symbol', 'grank', 'price_usd', 'price_btc', 'market_cap_usd', 'available_supply', 'max_supply', 'percent_change_hr',
			'percent_change_day', 'percent_change_week');


		$theDBA = new DatabaseAdaptor();
		$api_url = 'https://api.coinmarketcap.com/v1/ticker/?limit=0';
		$json_info = json_decode(file_get_contents($api_url));    // JSON ARRAY WITH EVERY DATA POINT FOR ALL COINS ON COINMARKETCAP.COM

		// -------- JSON ARRAY EXAMPLE ------------>
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
	    // ---------------------------------------->

		$total_marketcap = 0;
		$neo = '';

		// THIS LOOP WILL UPDATE THE neo_site_data DATABASE WITH COINMARKETCAP.COM API INFORMATION OF COINS WHOSE ID'S ARE IN THE $coin_ids ARRAY AND SORT BY MARKETCAP
		for($i = 0; $i < count($coin_ids); $i++) {
			$id = $coin_ids[$i];
	    	for($c = 0; $c < count($json_info); $c++) {    // FIND CURRENT COIN'S DATA POINTS
	    		if($json_info[$c]->id == $id) {

	    			$name = $json_info[$c]->name;
	    			$symbol = $json_info[$c]->symbol;
	    			$grank = $json_info[$c]->rank;
					$price_usd = $json_info[$c]->price_usd;
					$price_btc = $json_info[$c]->price_btc;
					$market_cap_usd = $json_info[$c]->market_cap_usd;
					$available_supply = $json_info[$c]->available_supply;
					$total_supply = $json_info[$c]->total_supply;
					$max_supply = $json_info[$c]->max_supply;
					$percent_change_1h = $json_info[$c]->percent_change_1h;
					$percent_change_24h = $json_info[$c]->percent_change_24h;
					$percent_change_7d = $json_info[$c]->percent_change_7d;

					// GET NEO MARKET CAP AND ADD TOTAL MARKETCAP TO LATER CALCULATE NEO DOMINANCE
					$total_marketcap += $market_cap_usd;
					if ($id == 'neo') {
						$neo = $json_info[$c]->market_cap_usd;
					}


					if($price_usd == NULL) {
						$price_usd = 0;
					}
					if($price_btc == NULL) {
						$price_btc = 0;
					}
					if($market_cap_usd == NULL) {
						$market_cap_usd = 0;
					}
					if($available_supply == NULL) {
						$available_supply = 0;
					}
					if($total_supply == NULL) {
						$total_supply = 0;
					}
					if($max_supply == NULL) {
						$max_supply = 0;
					}
					if($percent_change_1h == NULL) {
						$percent_change_1h = 0;
					}
					if($percent_change_24h == NULL) {
						$percent_change_24h = 0;
					}
					if($percent_change_7d == NULL) {
						$percent_change_7d = 0;
					}


	    			if($theDBA->checkCOIN($id) != NULL) {    // IF COIN EXISTS IN DATABASE, UPDATE EACH OF THE COIN'S DATA POINTS

	    				$theDBA->updateCOIN($id, $grank, $price_usd, $price_btc, $market_cap_usd, $available_supply, $total_supply, $max_supply, $percent_change_1h,
	    					$percent_change_24h, $percent_change_7d);




					} else {    // OTHERWISE ADD COIN TO THE DATABASE AND THEN UPDATE EACH OF THE COIN'S DATA POINTS

						$theDBA->addCOIN($id, $name, $symbol, $grank, $price_usd, $price_btc, $market_cap_usd, $available_supply, $total_supply, $max_supply, $percent_change_1h, $percent_change_24h, $percent_change_7d);
					}

	    		}
	    	}

		}

		//-----------------UPDATE MARKET_INFO TABLE--------------------->
		$neo_dominance = (floatval($neo) / $total_marketcap) * 100;
		$theDBA->updateTOTAL_MARKETCAP($total_marketcap);
		$theDBA->updateNEO_DOMINANCE($neo_dominance);

	?>
</html>
