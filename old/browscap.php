<?php
function php_get_browser($agent = NULL){
    $agent=$agent?$agent:$_SERVER['HTTP_USER_AGENT'];
    $yu=array();
    $q_s=array("#\.#","#\*#","#\?#");
    $q_r=array("\.",".*",".?");
    $brows=parse_ini_file("php_browscap.ini",true);
    foreach($brows as $k=>$t){
      if(fnmatch($k,$agent)){
      $yu['browser_name_pattern']=$k;
      $pat=preg_replace($q_s,$q_r,$k);
      $yu['browser_name_regex']=strtolower("^$pat$");
        foreach($brows as $g=>$r){
          if($t['Parent']==$g){
            foreach($brows as $a=>$b){
              if($r['Parent']==$a){
                $yu=array_merge($yu,$b,$r,$t);
                foreach($yu as $d=>$z){
                  $l=strtolower($d);
                  $hu[$l]=$z;
                }
              }
            }
          }
        }
        break;
      }
    }
    return $hu;
}

?>