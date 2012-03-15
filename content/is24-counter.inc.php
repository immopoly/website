<?
/**
* DIRTY HACKING IS DIRTY
*/

function getCounterInfo() {
    // {"Counter":{"badgeOneOfTheFirst":441,"date":1331821613933,"exposesRented":238,"user":667}}
    $url = "http://immopoly.appspot.com/user/counter"; 
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
    $output = curl_exec($ch);
    curl_close($ch);

    return json_decode($output,true);
}

function getNumberOfPlayers(){
  $counter = getCounterInfo();	
  return $counter["Counter"]["badgeOneOfTheFirst"];
}
?>

<pre>
<? echo getNumberOfPlayers(); ?>
</pre>
