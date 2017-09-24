<?php

$quotes_json = file_get_contents('quotes.json');
$quotes = json_decode($quotes_json,true)["quotes"];

$characters = array();
$characters[] = "All";

foreach($quotes as $quote){
  if(!in_array($quote["character"], $characters)) {
    $characters[] = $quote["character"];
  }
}

//filter by character if needed
$character_filter = $_GET["character"];
if($character_filter != "All" && $character_filter != "") {
  foreach ($quotes as $index => $quote) {
    if($quote["character"] != $character_filter) {
      unset($quotes[$index]);
    }
  }
}

$text_filter = $_GET["textFilter"];
if($text_filter != ""){
  foreach($quotes as $index => $quote) {
    if(strpos($quote["quote"], $text_filter) === false) {
      unset($quotes[$index]);
    }
  }
}

$show_count = false;
if($_GET["showCount"]) {
  $show_count = true;
}

$result_count = count($quotes);
