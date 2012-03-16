<?php
// ############################################################################
//  FUNCTIONS
// ############################################################################

/**
 * checks or creates the cache dir 
 */
function prepare_cache(){
  return is_writable(CACHE_DIR) || mkdir(CACHE_DIR,0777,true);
}

/**
 * generates a cachefile name for a given url
 */
function get_cachefile_name($url){
  return CACHE_DIR.'/'.sha1($url);
}

/**
 * checks if a cache file exists and is not expired for a given url
 */
function cachefile_exits($url){

  if(! prepare_cache()){
    return false;
  }

  return is_readable(  get_cachefile_name($url) ) && ! cachefile_is_too_old($url);
}

/**
 * returns if the modification time is older than the cache-time
 */
function cachefile_is_too_old($url){
    return ( time() - filemtime( get_cachefile_name($url) )) >= CACHE_TTL;
}

/**
 * checks if a cache file exists for a given url
 */
function cachefile_read($url){

  if(! prepare_cache()){
    return false;
  }

  return file_get_contents( get_cachefile_name($url) );
}

function cachefile_write($url, $content){

  if(! prepare_cache()){
    return false;
  }

  return file_put_contents( get_cachefile_name($url), $content);
}

function logline($message=null){

    static $logfile = "log.txt";

    exec("echo \"".date(DATE_RFC2822)." :".$message."\" >> ".$logfile);
}

// ############################################################################
?>
