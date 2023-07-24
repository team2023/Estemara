<?php


function gen($id)


{
   
    include 'config.php';
    $sql="SELECT education_data.department_in , personal_information.governorate,users.id from
    users INNER JOIN personal_information on personal_information.user_id=users.id INNER JOIN
     education_data on personal_information.user_id=education_data.user_id where users.id='$id' ";


     $result=mysqli_query($conn,$sql);
     if (mysqli_num_rows($result) === 1) 
     {
       
        $rowchk = mysqli_fetch_assoc($result);
        $depart= $rowchk ['department_in'];
        $townid=$rowchk ['governorate'];
        $id=$rowchk ['id'];
if($depart=="")
{
    $depart="1000";
}

if(($townid=="بغداد"))
$townid="01";
else if($townid=="نينوى")
$townid="02";
else if($townid=="البصرة")
$townid="03";
else if($townid=="السليمانية")
$townid="04";
else if($townid=="ذي قار")
$townid="05";
else if($townid=="بابل")
$townid="06";
else if($townid=="أربيل")
$townid="07";
else if($townid=="الأنبار")
$townid="08";
else if($townid=="ديالى")
$townid="09";
else if($townid=="كركوك")
$townid="10";
else if($townid=="صلاح الدين")
$townid="11";
else if($townid=="النجف")
$townid="12";
else if($townid=="واسط")
$townid="13";
else if($townid=="كربلاء")
$townid="14";
else if($townid=="القادسية")
$townid="15";
else if($townid=="دهوك")
$townid="16";
else if($townid=="ميسان")
$townid="17";
else if($townid=="المثنى")
$townid="18";

       $genid=$depart . $townid .'1000000'. $id;
   



}
else{
    $genid='0';
}

return $genid;
}
?>