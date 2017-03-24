<?php

//der fortschrift sollte neu geschrieben werden. aktuell wird der richtig platzierte marker mit dem nächsten standord überprüft. dadurch wird immer false returned obwohl js true ausgibt.

function deg2rad1($deg){
    return $deg*(pi()/180);
}

function LatLonInKm($lat1,$lon1,$lat2,$lon2){
    $R=6371;
    $dLat=deg2rad1($lat2-$lat1);
    $dLon = deg2rad1($lon2-$lon1); 
    $a = sin($dLat/2) * sin($dLat/2) +cos(deg2rad1($lat1)) * cos(deg2rad1($lat2)) * sin($dLon/2) * sin($dLon/2); 
   $c = 2 * atan2(sqrt($a), sqrt(1-$a)); 
  $d = $R * $c; // Distance in km
  return $d;
}

$file= $_GET['file'];
$stepnumber=$_GET['hintnumber'];
$latc=$_GET['lat'];
$lngc=$_GET['lng'];
$count=0;
$hint='';
$lat='';
$lng='';
$res='false';
$gesamt=0;


$handle = fopen($file, "r");
if ($handle) {
    while (($line = fgetss($handle)) !== false) {
        // process the line read.
        if($stepnumber==0 && $count==0){
            //get gesamt count
            $gesamt=$line;
            $gesamt=str_replace("\r","",$gesamt);
            $gesamt=str_replace("\n","",$gesamt);
        }
        if($stepnumber==0 && $count==1){
            
            //return first hint only
           $hint=$line;
            $hint=str_replace("\r","",$hint);
            $hint=str_replace("\n","",$hint);
            $lat=fgets($handle);
            $lat=str_replace("\r","",$lat);
            $lat=str_replace("\n","",$lat);
            $lng=fgets($handle);
            $lng=str_replace("\r","",$lng);
            $lng=str_replace("\n","",$lng);
            break;
        }else{
            if($count==1+(($stepnumber-1)*3)){
                
                //return hint
                $hint=$line;
                $hint=str_replace("\r","",$hint);
                $hint=str_replace("\n","",$hint);
                $lat=fgets($handle);
                $lat=str_replace("\r","",$lat);
                $lat=str_replace("\n","",$lat);
                $lng=fgets($handle);
                $lng=str_replace("\r","",$lng);
                $lng=str_replace("\n","",$lng);
                //echo LatLonInKm($latc,$lngc,$lat,$lng);
                if(LatLonInKm($latc,$lngc,$lat,$lng) <=50){
                    $res='true';
                }
                break;
            }
        
        }
        $count++;
    }
if($stepnumber==0){
    $row_array['count']=$gesamt;
    $row_array['hint']=$hint;
    $row_array['lat']=0;
    $row_array['lng']=0;
    $row_array['res']=false;
}else{
$row_array['hint']=$hint;
$row_array['lat']=$lat;
$row_array['lng']=$lng;
$row_array['res']=$res;
}
    
if($res=='false'){
    $row_array['lat']=0;
    $row_array['lng']=0;
}
    
echo json_encode($row_array);
    fclose($handle);
} else {
    echo 'No File found';
} 






?>