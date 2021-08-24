  <?php

function admin_url()
{
    return base_url() . "/admin/";
}

function image_url()
{
    return base_url();
}

function webservices_url()
{
    return base_url();
}


function explodeCheckbox($checkboxs,$value,$sperator=',')
{
 /***
  * This for Dynamic Checkboxs checked 
  * contributed by Sainath Deekond 
  * All Rights Resereved Sainath Deekonda @2019
  */

  /** this explodeCheckbox returns true / false 
   * pass third parameter for custom seperator
   * By Defalut it will be ',' seperator 
   * Dont pass anything if its is same
   * 
   */
    
    $newArray =  explode($sperator,$checkboxs);

    // Checks if the variable converted successfully if not throws Exception 
    if(is_array($newArray)){
        if (in_array($value, $newArray)) {
        return true;
        } else {
        return false;
        }
    }
    else{
     throw new Exception("The given string is Inappropriate to String to Array Conversion!");
     return false;
    }
}


function explodeNormal($value,$sperator=',')
{
 /***
  * This for Dynamic Checkboxs checked 
  * contributed by Sainath Deekond 
  * All Rights Resereved Sainath Deekonda @2019
  */

  /** this explodeCheckbox returns true / false 
   * pass third parameter for custom seperator
   * By Defalut it will be ',' seperator 
   * Dont pass anything if its is same
   * 
   */
    
    $newArray =  explode($sperator,$value);

    // Checks if the variable converted successfully if not throws Exception 
    if(is_array($newArray)){
        return $newArray;
    }
    else{
     throw new Exception("The given string is Inappropriate to String to Array Conversion!");
     return false;
    }
}





function impoldeCheckbox($checkboxs,$sperator=',')
{
 /***
  * This for Dynamic Checkboxs checked 
  * contributed by Sainath Deekond 
  * All Rights Resereved Sainath Deekonda @2019
  */

  /** this impoldeCheckbox returns true / false 
   * pass third parameter for custom seperator
   * By Defalut it will be ',' seperator 
   * Dont pass anything if its is same
   * 
   */

    // Checks if the variable converted successfully if not throws Exception 
    if(is_array($checkboxs)){
        $checkboxs =  implode($sperator,$checkboxs);
        return $checkboxs;
    }
    else{
     throw new Exception("The given Array is Inappropriate to String  Conversion!");
     return false;
    }
}









function images_encode($image)
{
    //$path = $image;
    //$type = pathinfo($path,PATHINFO_EXTENSION);
    //$data1 = file_get_contents($path);
    //return 'data:image/'. $type .';base64,' . base64_encode($data1);
    return $image;
}

function projectId($projectId)
{
    $fromattedId = 'PROJ' . str_pad($projectId, 4, '0', STR_PAD_LEFT);
    return $fromattedId;

}
function taskId($taskId)
{
    $fromattedId = 'TASK' . str_pad($taskId, 4, '0', STR_PAD_LEFT);
    return $fromattedId;

}
function requirementId($taskId)
{
    $fromattedId = 'REQ' . str_pad($taskId, 4, '0', STR_PAD_LEFT);
    return $fromattedId;

}
function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ/*-@#$%^&*()!';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


 function isFileExits($image,$type=null)
{
    if(is_file(FCPATH.$image)) {
        
        return base_url().$image;
    }else{
        if($type=='project'){
            return base_url().'assets/images/no-image-availbale.jpg';
        }
        return base_url().'assets/images/no-image.png';
    }
}
 

function checkiIfFileExits($file)
{
    if(is_file(FCPATH.$file)) {
        
        return base_url().$file;
    }
    return null;
}

function checkiIfFileExitsAndUnlink($file)
{
    if(is_file(FCPATH.$file)) {
        
        unlink($file);
        return true;
        
    }
    return false;
}



function explodeImages($images_str,$sperator=',')
{

 /***
  * This for Dynamic Images string Conversion 
  * contributed by Sainath Deekonda 
  * All Rights Resereved Sainath Deekonda @2019
  */

  /** this explodeImages returns Imaage Array 
   * pass third parameter for custom seperator
   * By Defalut it will be ',' seperator 
   * Dont pass anything if its is same
   * 
   */

    $images_str = rtrim($images_str, ',');
    $newArray =  explode($sperator,$images_str);

    // Checks if the variable converted successfully if not throws Exception 
    if(is_array($newArray)){
        return $newArray;
    }
    else{
     throw new Exception("The given string is Inappropriate to String to Array Conversion!");
     return false;
    }
}


 function numberToCurrency($num)
{
    if(setlocale(LC_MONETARY, 'en_IN'))
      return money_format('%.0n', $num);
    else {
      $explrestunits = "" ;
      if(strlen($num)>3){
          $lastthree = substr($num, strlen($num)-3, strlen($num));
          $restunits = substr($num, 0, strlen($num)-3); // extracts the last three digits
          $restunits = (strlen($restunits)%2 == 1)?"0".$restunits:$restunits; // explodes the remaining digits in 2's formats, adds a zero in the beginning to maintain the 2's grouping.
          $expunit = str_split($restunits, 2);
          for($i=0; $i<sizeof($expunit); $i++){
              // creates each of the 2's group and adds a comma to the end
              if($i==0)
              {
                  $explrestunits .= (int)$expunit[$i].","; // if is first value , convert into integer
              }else{
                  $explrestunits .= $expunit[$i].",";
              }
          }
          $thecash = $explrestunits.$lastthree;
      } else {
          $thecash = $num;
      }
      return '₹ ' . $thecash;
    }


}

//  function dd($var)
//     {
//         var_dump($var);
//         die();
//     }

function d($data){
    if(is_null($data)){
        $str = "<i>NULL</i>";
    }elseif($data == ""){
        $str = "<i>Empty</i>";
    }elseif(is_array($data)){
        if(count($data) == 0){
            $str = "<i>Empty array.</i>";
        }else{
            $str = "<table style=\"border-bottom:0px solid #000;\" cellpadding=\"0\" cellspacing=\"0\">";
            foreach ($data as $key => $value) {
                $str .= "<tr><td style=\"background-color:#008B8B; color:#FFF;border:1px solid #000;\">" . $key . "</td><td style=\"border:1px solid #000;\">" . d($value) . "</td></tr>";
            }
            $str .= "</table>";
        }
    }elseif(is_resource($data)){
        while($arr = mysql_fetch_array($data)){
            $data_array[] = $arr;
        }
        $str = d($data_array);
    }elseif(is_object($data)){
        $str = d(get_object_vars($data));
    }elseif(is_bool($data)){
        $str = "<i>" . ($data ? "True" : "False") . "</i>";
    }else{
        $str = $data;
        $str = preg_replace("/\n/", "<br>\n", $str);
    }
    return $str;
    }
    
    function dnl($data){
        echo d($data) . "<br>\n";
    }
    
    function dd($data){
        echo dnl($data);
        exit;
    }
    
    function ddt($message = ""){
        echo "[" . date("Y/m/d H:i:s") . "]" . $message . "<br>\n";
    }


    function numberToWordCurrency($number){
        $number = 190908100.25;
        $no = round($number);
        $point = round($number - $no, 2) * 100;
        $hundred = null;
        $digits_1 = strlen($no);
        $i = 0;
        $str = array();
        $words = array('0' => '', '1' => 'one', '2' => 'two',
        '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
        '7' => 'seven', '8' => 'eight', '9' => 'nine',
        '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
        '13' => 'thirteen', '14' => 'fourteen',
        '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
        '18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
        '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
        '60' => 'sixty', '70' => 'seventy',
        '80' => 'eighty', '90' => 'ninety');
        $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
        while ($i < $digits_1) {
            $divider = ($i == 2) ? 10 : 100;
            $number = floor($no % $divider);
            $no = floor($no / $divider);
            $i += ($divider == 10) ? 1 : 2;
            if ($number) {
            $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
            $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
            $str [] = ($number < 21) ? $words[$number] .
                " " . $digits[$counter] . $plural . " " . $hundred
                :
                $words[floor($number / 10) * 10]
                . " " . $words[$number % 10] . " "
                . $digits[$counter] . $plural . " " . $hundred;
            } else $str[] = null;
        }
        $str = array_reverse($str);
        $result = implode('', $str);
        $points = ($point) ?
        "." . $words[$point / 10] . " " . 
                $words[$point = $point % 10] : '';
        return $result . "Rupees  " . $points . " Paise";

        
    }


function remove_duplicate_char($str) 
{
   // $str = '1,2,2,3';
//add one space between all characters.
   // $formatted = implode('', str_split($str));
   //return $formatted;
    //conver string into array's elements 
    $a = explode(",",$str); 


    $a = array_unique($a);

    return implode(',', $a);
    

    // $j = strtolower($a[0]); 
    // $k="";

    //     for ($i=1;$i<=count($a);$i++) 
    //     { 
    //         if(strtolower($j)!=strtolower($a[$i]))
    //         {
    //         $k .= $j.",";
    //         } 
    //         $j = $a[$i]; 
    //     }

    //     return $k; 
}

function filename_filter($filename){
    return preg_replace('/\s+/', '_', str_replace(' ', '_', $filename));
}


function capacity_cal($weekends_count=8,$holiday_count=1){
    $total_holidays= $weekends_count+$holiday_count ;
     $total_days_month = cal_days_in_month(CAL_GREGORIAN,1,2020);
     $total_working_days = $total_days_month - $total_holidays;

     return $total_working_days*8;

}



      
      
    