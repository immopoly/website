<?php

//checks if a page setting is given and if it's valid
function validateStartParams(){

	//validating the parameters
	if( !isset($_GET) ||
		!isset($_GET['page'])
	){
		$page="home";	
	}else{
		$page=validatePageCall($_GET['page']);
	}

	return $page;
}

// checks if a called page is valid
function validatePageCall($page){
	
	if(
		empty($page)
	){
		$page="home";
	}	

	if(substr($page, 0,10) == "frameless-"){
		$page = substr($page,10);
	}else if(substr($page, 0,6) == "plain-"){
		$page = substr($page,6);
	}	

	if( is_readable(the_filename($page))){
		return $page;
	}else if(is_readable(the_filename("home"))){
		return "home";
	}else{
		die("Error: Undefined call and no standard content available.");
	}
}

//includes the given page into this position
function the_page($page){
	$page=validatePageCall($page);
	include(the_filename($page));
}

//returns the filename of the page
function the_filename($page){
	global $CONFIG;		
	return  $CONFIG["contentPath"].'/'.$page.$CONFIG['pagefileSuffix'];
}

/*
 * HELPER FUNCTIONS
 */

// makes all first chars of separate words in a string to upper case  
function makeUppercase($string){
	$resultString="";
	
	foreach(splitString($string) as $str){
		
		if($str == "") continue;
		
		$resultString.=upperFirstChar($str);	
	}
	
	return $resultString;
}

//splits a string to an array of words and symbols
function splitString($string){
	
	$words=array();
	$newWord="";
	
	for ($i=0;$i<strlen($string);$i++){
		$currentChar=$string[$i];
		if (preg_match("/^[a-zA-ZהצüִײÜß]+$/i",$currentChar)){
			$newWord .= $currentChar;
		}else{
			if($newWord != ""){
				$words[]=$newWord;
			}
			$words[]=$currentChar;
			
			$newWord="";
		}
	}
	
	if($newWord != ""){
		$words[]=$newWord;
	}

	return $words;
}

// returns the given string with the first char in upper case if its a word
function upperFirstChar($string){
	$first=substr($string,0,1);
	if(strlen($string)>1){
		$rest=substr($string,1);
	}else{
		$rest="";
	}
	
	return strtoupper($first).$rest;
}

//checks if a var is a positive integer (for ids etc)
function isPositiveInt($number){
	
	return (preg_match("/^[0-9]+/" ,$number) == 1);
}

/**
 * formats a given timestamp with the German long form
 * @param timestamp
 * @param showTime (bool) - also display the time?
 * @return formated date string like 'Samstag, 2. Januar 2007' 
 */
function getGermanDate($timestamp,$showTime=false) {

		$wochentag = date("l",$timestamp);
		switch ($wochentag) {
			case "Monday":
				$wochentag = "Montag";
				break;
			case "Tuesday":
				$wochentag = "Dienstag";
				break;
			case "Wednesday":
				$wochentag = "Mittwoch";
				break;
			case "Thursday":
				$wochentag = "Donnerstag";
				break;
			case "Friday":
				$wochentag = "Freitag";
				break;
			case "Saturday":
				$wochentag = "Samstag";
				break;
			case "Sunday":
				$wochentag = "Sonntag";
				break;
	}

	$monate= array("error","Januar", "Februar", "Mֳ₪rz", "April", "Mai", "Juni", "Juli", "August", "September", "Oktober", "November", "Dezember");
	$monatszahl=date("n",$timestamp);
	$monatheute = $monate[$monatszahl];
	
	$datum = $wochentag . ", " . date("j",$timestamp) . ". " . $monatheute . " " . date("Y",$timestamp);
	$time = date("( H:i )",$timestamp); 
	
	if($showTime){
		return $datum." ".$time;
	}else{
		return $datum;			
	}
	
}

function isFrameless(){
	return ! empty($_GET['frameless']);
}


function isPlain(){
	return ! empty($_GET['plain']);
}


?>