<?
/**
* DIRTY HACKING IS DIRTY
*/

error_reporting(E_ALL);

define('COUNTER_URL',"http://immopoly.appspot.com/user/counter");

//how long after a cache will be renewed
define("CACHE_TTL",900);//15 mins
define("CACHE_DIR",'.cache');
require_once("inc/cache.inc.php");

function getCounterInfo() {
    // {"Counter":{"badgeOneOfTheFirst":441,"date":1331821613933,"exposesRented":238,"user":667}}
     
    $ch = curl_init(COUNTER_URL);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
    $output = curl_exec($ch);

    if(curl_errno($ch)){
        return null;
    }else{
        cachefile_write(COUNTER_URL,$output);
    }

    curl_close($ch);

    return json_decode($output,true);
}

function getNumberOfPlayers(){

    if(cachefile_exits(COUNTER_URL) && ! cachefile_is_too_old(COUNTER_URL) ){
        $counter = json_decode(cachefile_read(COUNTER_URL));
    }else{
        $counter = getCounterInfo();
    }

    $result = "???";

    if(is_object($counter)){
        $result = $counter->Counter->badgeOneOfTheFirst;
    }else if(is_array($counter)){
        $result = $counter["Counter"]["badgeOneOfTheFirst"];
    }

    if(empty($result) || ! is_int($result) ){
        return "?.???";
    }
    return number_format($result,0,",",".");
}
function getNumberOfFreeSeats() {
    $seats = 2000;
    // as we want to know how many seats availible
    $playerz = getNumberOfPlayers();
    if(is_int($playerz)){
      return $seats-$playerz;
    }
    return $playerz;
}

?>

<pre>
<? echo getNumberOfFreeSeats(); ?>
</pre>
