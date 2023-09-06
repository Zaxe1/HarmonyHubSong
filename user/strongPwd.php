<?php 
function isStrongPassword($password)
{ $strongOrnot=false;
    $digitCount=0;
    $upCount=0;
    $lowCount=0;
    $speCount=0;
    foreach(str_split($password) as $ch)
    {  // echo $ch;
       
        if(is_numeric($ch))
        {$digitCount+=1;}
        else if(ctype_upper($ch))
        {
            $upCount+=1;
        }
        else if(ctype_lower($ch))
        {
            $lowCount+=1;
        }
        else 
            {
                $speCount+=1;
            }
 }// end of foreach
 
if($digitCount>=1 && $upCount>=1 && $lowCount>=1 && $speCount>=1)
{
    $strongOrnot =true;
}

return $strongOrnot;
}// end function

?>