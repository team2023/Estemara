<?php

function gettotalfrominput($chl,$chm)

{
    include 'config.php';

    
        $numlesschild=(int)$chl;
        $nummorechild=(int)$chm;
        $sumn=$numlesschild + $nummorechild;

        if($sumn>4)
{

    $totalchild=4;
}
else
$totalchild=$sumn;

   


return $totalchild;

}

function gettotalf($gn)

{
    include 'config.php';

    $sqlchld="SELECT *from modikk where gen_id='$gn'";
    $reschld=mysqli_query($conn,$sqlchld);
    if(mysqli_num_rows($reschld) === 1) {
        $rowchld = mysqli_fetch_assoc($reschld);
        $numchild=(int)$rowchld['num_of_child'];
        $sum=$numchild ;

        if($sum>=4)
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

/*function chekmarryf($id)
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
}*/




function yearf($gn)
{
    include 'config.php';

    $sqlyear="SELECT *from modikk where gen_id='$gn'";
    $resyear=mysqli_query($conn,$sqlyear);
    if(mysqli_num_rows($resyear) === 1) {
        $rowyear = mysqli_fetch_assoc($resyear);
        $year=(int)$rowyear['year_g'];
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


function avaragef($gn)

{
    include 'config.php';

    $sqlavrg="SELECT *from modikk where gen_id='$gn'";
    $resavrg=mysqli_query($conn,$sqlavrg);
    if(mysqli_num_rows($resavrg) === 1) {
        $rowsvrg = mysqli_fetch_assoc($resavrg);
        $avarg=(int)$rowsvrg['avaragee'];
        $f_avarg=(int)$rowsvrg['f_avarage'];
   $finelavarg=(((($avarg/$f_avarg)*100)+$avarg/2))/10;
   

}
else
$finelavarg=0;
return $finelavarg;


}

function workiff($gn)
{

    include 'config.php';

    $sqlwork="SELECT *from modikk where gen_id='$gn'";
    $reswork=mysqli_query($conn,$sqlwork);
    if(mysqli_num_rows($reswork) === 1) {
        $rowswork = mysqli_fetch_assoc($reswork);
        $work=$rowswork['work_or_not'];
        if($work=="1")
        {
$workfinel=3;
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

function workoldf($gn)
{

    include 'config.php';

    $sqlworkold="SELECT *from modikk where gen_id='$gn'";
    $resworkold=mysqli_query($conn,$sqlworkold);
    if(mysqli_num_rows($resworkold) === 1) {
        $rowsworkold = mysqli_fetch_assoc($resworkold);
        $workold=(int)$rowsworkold['old_work'];
        if($workold!=0)
        {
$workfinelold=$workold;
        }
        else
        {
            $workfinelold=0;
        }
    }
    else
    $workfinelold=0;


return $workfinelold;
}

function workcurf($gn)
{

    include 'config.php';

    $sqlworkcur="SELECT *from modikk where gen_id='$gn'";
    $resworkcur=mysqli_query($conn,$sqlworkcur);
    if(mysqli_num_rows($resworkcur) === 1) {
        $rowsworkcur = mysqli_fetch_assoc($resworkcur);
        $workcur=(int)$rowsworkcur['cur_work'];
        if($workcur!=0)
        {
$workfinelcur=$workcur;
        }
        else
        {
            $workfinelcur=0;
        }
    }
    else
    $workfinelcur=0;


return $workfinelcur;
}







function Doratf($gn)
{
    include 'config.php';

    $sqlourse="SELECT *from modikk where gen_id='$gn'";
    $resourse=mysqli_query($conn,$sqlourse);
    if(mysqli_num_rows($resourse) === 1) {
        $rowscourse = mysqli_fetch_assoc($resourse);
        $course=(int)$rowscourse['dorat'];
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

function Naqabaf($gn)
{
    include 'config.php';

    $sqln="SELECT *from modikk where gen_id='$gn'";
    $resn=mysqli_query($conn,$sqln);
    if(mysqli_num_rows($resn) === 1) {
        $rowsn = mysqli_fetch_assoc($resn);
        $niqaba=(int)$rowsn['naqbat'];
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

function chekmarryff($gn)
{
    
    include 'config.php';
    $sqlmary="SELECT *from modikk where gen_id='$gn'";
    $resmary=mysqli_query($conn,$sqlmary);
    if(mysqli_num_rows($resmary) === 1) {
        $rowmry = mysqli_fetch_assoc($resmary);
       $marry=$rowmry['ifmaryy'];
       if(($marry=="0") )
       {

        $finlmarry=0;
       }
       else
       $finlmarry=5;

}
else
{
    $finlmarry=0;

}

return $finlmarry;
}

function alaila($gn)
{
    
    include 'config.php';
    $sqlalaa="SELECT *from modikk where gen_id='$gn'";
    $resalala=mysqli_query($conn,$sqlalaa);
    if(mysqli_num_rows($resalala) === 1) {
        $rowala = mysqli_fetch_assoc($resalala);
       $alaila=$rowala['alaila'];
       if(($alaila=="لا") )
       {

        $alaila=0;
       }
       else
       $alaila=2;

}
else
{
    $alaila=0;

}

return $alaila;
}

function adbee($gn)
{
    
    include 'config.php';
    $sqladeb="SELECT *from modikk where gen_id='$gn'";
    $resadeb=mysqli_query($conn,$sqladeb);
    if(mysqli_num_rows($resadeb) === 1) {
        $rowadb = mysqli_fetch_assoc($resadeb);
       $adeb=$rowadb['adebba'];
       if(($adeb=="0") )
       {

        $adeb=0;
       }
       else
       $adeb=1.5;

}
else
{
    $adeb=0;

}

return $adeb;
}

    ?> 