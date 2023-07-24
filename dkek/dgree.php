<?php

function gettotal($id)

{
    include 'config.php';

    $sqlchld="SELECT *from personal_information where user_id='$id'";
    $reschld=mysqli_query($conn,$sqlchld);
    if(mysqli_num_rows($reschld) === 1) {
        $rowchld = mysqli_fetch_assoc($reschld);
        $numlesschild=(int)$rowchld['number_child_less18'];
        $nummorechild=(int)$rowchld['number_child_more18'];
        $sum=$numlesschild + $nummorechild;

        if($sum>4)
{

    $totalchild=4;
}
else
$totalchild=$sum;

    }
    else
    {
        $totalchild=0;

    }


return $totalchild;

}

function chekmarry($id)
{
    include 'config.php';

    $sqlchld="SELECT *from personal_information where user_id='$id'";
    $reschld=mysqli_query($conn,$sqlchld);
    if(mysqli_num_rows($reschld) === 1) {
        $rowchld = mysqli_fetch_assoc($reschld);
       $marry=$rowchld['marital_status'];
       if(($marry!="اعزب") )
       {

        $finlmarry=5;
       }
       else
       $finlmarry=0;

}
else
{
    $finlmarry=0;

}

return $finlmarry;
}

function year($id)
{
    include 'config.php';

    $sqlyear="SELECT *from education_data where user_id='$id'";
    $resyear=mysqli_query($conn,$sqlyear);
    if(mysqli_num_rows($resyear) === 1) {
        $rowyear = mysqli_fetch_assoc($resyear);
        $year=(int)$rowyear['graduation_year'];
   $finelyear=2022-$year;

   if($finelyear>12)
   $fyear=12.5;
   else
   $fyear=$finelyear;

}
else
{
    $fyear=0;
}
return $fyear;


}


function avarage($id)

{
    include 'config.php';

    $sqlavrg="SELECT *from education_data where user_id='$id'";
    $resavrg=mysqli_query($conn,$sqlavrg);
    if(mysqli_num_rows($resavrg) === 1) {
        $rowsvrg = mysqli_fetch_assoc($resavrg);
        $avarg=(int)$rowsvrg['average'];
   $finelavarg=(((($avarg/95)*100)+$avarg/2))/10;
   

}
else
$finelavarg=0;
return $finelavarg;


}

function workif($id)
{

    include 'config.php';

    $sqlwork="SELECT *from work_skills where user_id='$id'";
    $reswork=mysqli_query($conn,$sqlwork);
    if(mysqli_num_rows($reswork) === 1) {
        $rowswork = mysqli_fetch_assoc($reswork);
        $work=$rowswork['volunteer_work'];
        if($work=="نعم")
        {
$workfinel=10;
        }
        else
        {
            $workfinel=0;
        }
    }
    else
    $workfinel=0;


return $workfinel;
}

function Dorat($id)
{
    include 'config.php';

    $sqlourse="SELECT *from additional_info_courses where user_id='$id'";
    $resourse=mysqli_query($conn,$sqlourse);
    if(mysqli_num_rows($resourse) === 1) {
        $rowscourse = mysqli_fetch_assoc($resourse);
        $course=$rowscourse['course_flag'];
        if($course>=1)
        {
$coursfinel=1;
        }
        else $coursfinel=0;
    }
   
else
{
    $coursfinel=0;
}
return $coursfinel;
}

function Naqaba($id)
{
    include 'config.php';

    $sqln="SELECT *from additional_info_alniqabat where user_id='$id'";
    $resn=mysqli_query($conn,$sqln);
    if(mysqli_num_rows($resn) === 1) {
        $rowsn = mysqli_fetch_assoc($resn);
        $niqaba=$rowsn['alniqabat_flag'];
        if($niqaba>=1)
        {
$niqabafinel=1;
        }
        else
        {
            $niqabafinel=0;
        }
       
       
    }
    else
    $niqabafinel=0;
    
    return $niqabafinel;

}



function num_Dorat($id)
{
    include 'config.php';

    $sqlourse="SELECT  COUNT(user_id) from additional_info_courses where user_id='$id'";
    $resourse=mysqli_query($conn,$sqlourse);
    if(mysqli_num_rows($resourse) === 1) {
        $rowscourse = mysqli_fetch_assoc($resourse);
        $course=$rowscourse['COUNT(user_id)'];
    
}
return $course;
}


function num_Naqaba($id)
{
    include 'config.php';

    $sqln="SELECT COUNT(user_id) from additional_info_alniqabat where user_id='$id'";
    $resn=mysqli_query($conn,$sqln);
    if(mysqli_num_rows($resn) === 1) {
        $rowsn = mysqli_fetch_assoc($resn);
        $niqaba=$rowsn['COUNT(user_id)'];
    
    
    return $niqaba;

}
}
    ?>