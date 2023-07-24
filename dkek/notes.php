<?php

function notes($gn)

{
    include 'config.php';

    $sqll="SELECT *from tadqee1 where gen_id='$gn'";
    $res=mysqli_query($conn,$sqll);
    if(mysqli_num_rows($res) === 1 
    
    
    
    
    
    )
    {

        $row = mysqli_fetch_assoc($res);
if($row['card']=="")
{
    //اعرض ملاحظات الجنسية
    $nots= $row['jensinote'] ."-" .$row['shahaduh_aljinsiuh_note']."-" .$row['sakennote'] .
    "-".$row['documentnote'] ."-".$row['notemaryy'] .
    "-".$row['statuscardabove18'] ."-".$row['notetraning'].
    "-".$row['notealnaqabat']."-".$row['noteadditionalwork'];


    
}
else
//اعرض ملاحظات الموحدة
{
    $nots= $row['statusnote'] ." - " .$row['sakennote'] .
    " - ".$row['documentnote'] ." - ".$row['notemaryy'] .
    " - ".$row['statuscardabove18'] ." - ".$row['notetraning'].
    " - ".$row['notealnaqabat']." - ".$row['noteadditionalwork'];
}

return $nots;
      
    }



}





?>