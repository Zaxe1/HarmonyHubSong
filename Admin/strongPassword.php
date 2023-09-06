<?php
    function isStrongPassword($password)
    {
        $strongOrnot = false;
        $digitCount = 0;
        $capCount = 0;
        $lowCount = 0;
        $specialCount = 0;
        foreach(str_split($password) as $ch)
        {
            if(is_numeric($ch))
            {
                $digitCount += 1;
            }
            else if(ctype_upper($ch))
            {
                $capCount += 1;
            }
            else if(ctype_lower($ch))
            {
                $lowCount += 1;
            }
            else
            {
                $specialCount += 1;
            }
        }
   

    if($digitCount >= 1 && $capCount >= 1 && $lowCount >= 1 && $specialCount >= 1)
    {
        $strongOrnot = true;
        echo "It is strong password.";
    }
    return $strongOrnot;
    //isStrongPassword("s3cret321!");
 }#End of the funciton
?>