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
		if (preg_match("/^[a-zA-ZäöüÄÖÜß]+$/i",$currentChar)){
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

function isFrameless(){
	return ! empty($_GET['frameless']);
}


function isPlain(){
	return ! empty($_GET['plain']);
}

// NEWS HANDLING
//find all news files, sort them descending and limit to config-value
function findNewsFiles($newerThan = null){

	if(empty($newerThan) || ! is_int( (int) $newerThan)){
		$newerThan = getLastvisitId();
	}

	global $CONFIG;

	if(! $handle = opendir($CONFIG['newsPath'])){
		return;
	};

	$newsFiles = array();

	while( $listfile = readdir($handle)){

		if($listfile == "." || $listfile == ".."){
			continue;
		}

		$id = (int) substr($listfile, 0, 4);
		if(preg_match('/'.$CONFIG['newsFilePattern'].'/i',$listfile) && $newerThan < $id  ){
			$newsFiles[$id] = $CONFIG['newsPath'].'/'.$listfile;
		}
	}

	$newsFiles = array_slice(array_reverse($newsFiles,true), 0, $CONFIG['newsMaxItems'],true);
	
	return $newsFiles;
}

//read the id of the last visit, if any
function getLastvisitId(){
	return empty($_GET['lastvisit']) ? 0 : (int) $_GET['lastvisit'];
}

//handles the redirection etc. before any content has been put out
function handlePreDispatching($page=null){

	if(empty($page)){
		return;
	}
	
	if(isPlain()){
      the_page($page);    
      exit;
  	}
	

  	switch ($page) {
  		case "news":

  			$newsFiles = findNewsFiles();
  			$ids = array_keys($newsFiles);
  			$newestId = ( empty($ids[0])) ? 0 : $ids[0];

  			if( ! empty($_GET['newest']) ){
  				//it seems we already redirected
  				return;
  			}else if( $newestId <= getLastvisitId() ){
  				//we have no new content
  				header("HTTP/1.1 304 Not Modified");
  				exit;
  			}

  			$redirect_url  = $_SERVER['REQUEST_URI'];
  			$redirect_url .= ( strpos($redirect_url,"?")) ? "&" : "?";
			$redirect_url .= "newest=".$newestId;

  			// 303 See Other
			header("Location: ".$redirect_url,TRUE,303);
			exit;

  			break;
  		default:
  			break;
  	}

}


?>