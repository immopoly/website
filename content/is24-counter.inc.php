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

<style type="text/css">
     body, pre {
          margin: 0;
          padding: 0;
          border: 0;
          outline: 0;
          font-size: 100%;
          vertical-align: baseline;
          
          background-color: transparent;
     }
     body {
          width: 75px;
     }
     pre {
          font: 1.75em/1 Tahoma, Geneva, Kalimati, sans-serif;
          color: #444;
     }

</style>
<pre>
<? echo getNumberOfPlayers(); ?>
</pre>
