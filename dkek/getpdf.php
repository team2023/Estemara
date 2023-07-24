<?php

function getpdf($id,$type)
{
    include 'config.php';
    $sql="SELECT * from deco where user_id='$id' AND type_dec='$type'";
    $result=mysqli_query($conn,$sql);
    if (mysqli_num_rows($result) === 1)
    {
        $rowpdf = mysqli_fetch_assoc($result); 

    $path=$rowpdf['dec_file'];

    }
    else
    $path="no";


    return $path;
    


}

?>