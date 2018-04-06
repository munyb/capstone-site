<?php
class DatabaseAdaptor {
  // The instance variable used in every one of the functions in class DatbaseAdaptor
  private $DB;

  // Make a connection to an existing data based named 'first' that has table customer
  public function __construct() {
    $db = 'mysql:dbname=neo_site_data; charset=utf8; host=127.0.0.1';
    $user = 'root';
    $password = '';

    try {
      $this->DB = new PDO ( $db, $user, $password );
      $this->DB->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    } catch ( PDOException $e ) {
    echo ('Error establishing Connection');
      exit ();
    }
  }

  //---------------------- COIN_DATA TABLE FUNCTIONS ------------------------>
  public function checkCOIN($id) {
    $stmt = $this->DB->prepare( "SELECT id FROM coin_data WHERE id = '$id'");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function addCOIN($id, $name, $symbol, $grank, $price_usd, $price_btc, $market_cap_usd, $available_supply, $total_supply, $max_supply, $percent_change_1h,
                          $percent_change_24h, $percent_change_7d) {
    $stmt = $this->DB->prepare( "INSERT INTO coin_data (id, name, symbol, grank, price_usd, price_btc, market_cap_usd, available_supply, total_supply, max_supply, percent_change_1h, percent_change_24h, percent_change_7d) VALUES ('$id', '$name', '$symbol', '$grank', '$price_usd', '$price_btc', '$market_cap_usd', '$available_supply', '$total_supply', '$max_supply', '$percent_change_1h', '$percent_change_24h', '$percent_change_7d') ");
    $stmt->execute();
  }

  public function updateCOIN($id, $grank, $price_usd, $price_btc, $market_cap_usd, $available_supply, $total_supply, $max_supply, $percent_change_1h,
      $percent_change_24h, $percent_change_7d) {
    $stmt = $this->DB->prepare( "UPDATE coin_data SET grank = $grank, price_usd = $price_usd, price_btc = $price_btc, market_cap_usd = $market_cap_usd, available_supply = $available_supply, total_supply = $total_supply, max_supply = $max_supply, percent_change_1h = $percent_change_1h, percent_change_24h = $percent_change_24h, percent_change_7d = $percent_change_7d WHERE id = '$id' ");
    $stmt->execute();
  }

  public function updateGRANK($coin, $value) {
    $stmt = $this->DB->prepare( "UPDATE coin_data SET grank = $value WHERE id = '$coin' ");
    $stmt->execute();
  }

  public function updatePRICE_USD($coin, $value) {
    $stmt = $this->DB->prepare( "UPDATE coin_data SET price_usd = $value WHERE id = '$coin' ");
    $stmt->execute();
  }

  public function updatePRICE_BTC($coin, $value) {
    $stmt = $this->DB->prepare( "UPDATE coin_data SET price_btc = $value WHERE id = '$coin' ");
    $stmt->execute();
  }

  public function updateMARKET_CAP_USD($coin, $value) {
    $stmt = $this->DB->prepare( "UPDATE coin_data SET market_cap_usd = $value WHERE id = '$coin' ");
    $stmt->execute();
  }

  public function updateAVAILABLE_SUPPLY($coin, $value) {
    $stmt = $this->DB->prepare( "UPDATE coin_data SET available_supply  = $value WHERE id = '$coin' ");
    $stmt->execute();
  }

  public function updateTOTAL_SUPPLY($coin, $value) {
    $stmt = $this->DB->prepare( "UPDATE coin_data SET total_supply = $value WHERE id = '$coin' ");
    $stmt->execute();
  }

  public function updateMAX_SUPPLY($coin, $value) {
    $stmt = $this->DB->prepare( "UPDATE coin_data SET max_supply = $value WHERE id = '$coin' ");
    $stmt->execute();
  }

  public function updatePERCENT_CHANGE_HR($coin, $value) {
    $stmt = $this->DB->prepare( "UPDATE coin_data SET percent_change_1hr = $value WHERE id = '$coin' ");
    $stmt->execute();
  }

  public function updatePERCENT_CHANGE_DAY($coin, $value) {
    $stmt = $this->DB->prepare( "UPDATE coin_data SET percent_change_24hr = $value WHERE id = '$coin' ");
    $stmt->execute();
  }

  public function updatePERCENT_CHANGE_WEEK($coin, $value) {
    $stmt = $this->DB->prepare( "UPDATE coin_data SET percent_change_7d = $value WHERE id = '$coin' ");
    $stmt->execute();
  }

   public function updateTOTAL_MARKETCAP($total_marketcap) {
    $stmt = $this->DB->prepare( "UPDATE market_info SET total_marketcap = $total_marketcap WHERE id = 1");
    $stmt->execute();
  }

  public function updateNEO_DOMINANCE($neo_dominance) {
    $stmt = $this->DB->prepare( "UPDATE market_info SET neo_dominance = $neo_dominance WHERE id = 1");
    $stmt->execute();
  }

  public function sortbyMARKETCAP() {
    $stmt = $this->DB->prepare( "SELECT * FROM coin_data ORDER BY CAST(grank as unsigned) ASC");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
  //----------------------------------------------------------------------------------------------------->


  //--------------------------------------- GET DATA FROM TABLE ----------------------------------------->
  public function getCOIN_INFO($id) {
    $stmt = $this->DB->prepare( "SELECT * FROM coin_data WHERE id = '$id' ");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getCOIN_SOCIAL($id) {
    $stmt = $this->DB->prepare( "SELECT * FROM page_info WHERE id = '$id' ");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getINFO($coin, $column) {
    $stmt = $this->DB->prepare( "SELECT '$column' FROM coin_data WHERE id = '$coin' ");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getMARKET_INFO() {
    $stmt = $this->DB->prepare( "SELECT * FROM market_info");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }


  //------------------------------- PAGE_INFO TABLE FUNCTIONS ------------------------------------>
  public function addCOIN_PAGE_INFO($id, $name, $website, $twitter, $reddit, $telegram, $discord) {
    $stmt = $this->DB->prepare( "INSERT INTO page_info (id, name, website, twitter, reddit, telegram, discord) VALUES ('$id', '$name', '$twitter', '$reddit', '$telegram', '$discord')");
    $stmt->execute();
  }




 } // End class DatabaseAdaptor

 ?>
