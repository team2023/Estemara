<?php
include 'config.php';
include 'getpdf.php';
include 'dgree.php';
include 'chekerdgree.php';
include 'notes.php';
$gn=$_GET['gn'];
$gnid=trim($gn);

$m1="UPDATE tadqee1 set card='' ,statuscard='0',statusnote='*' where gen_id='$gnid'";
$m2="UPDATE tadqee1 set saken='' ,statussaken='0',sakennote=' ' where gen_id='$gnid'";
$m3="UPDATE tadqee1 set jensi='' ,statusjensi='0' ,jensinote='*' where gen_id='$gnid'";
$m4="UPDATE tadqee1 set document='' ,statusdocument='0',documentnote=' ' where gen_id='$gnid' ";
$m5="UPDATE tadqee1 set traning=' ' ,statustraning='0',notetraning=' ' where gen_id='$gnid'";
$m6="UPDATE tadqee1 set maryy='' ,statesmaryy='0',notemaryy=' ' where gen_id='$gnid'";


$m10="UPDATE tadqee1 set num_of_child='' ,statuscardabove18=' ' where gen_id='$gnid'";
$m11="UPDATE tadqee1 set additionalwork='' ,statusadditionalwork='0',noteadditionalwork=' ' where gen_id='$gnid'";
$m12="UPDATE tadqee1 set alniqabat='' ,ststusalniqabat='0',notealnaqabat=' ' where gen_id='$gnid'";
$m13="UPDATE tadqee1 set alaila='' ,alailastate='0',alailanote=' ' where gen_id='$gnid'";
$m14="UPDATE tadqee1 set workold='' ,workoldstate='0',workoldnote=' ' where gen_id='$gnid'";
$m15="UPDATE tadqee1 set workcur='' ,workcurstate='0',workcurnote=' ' where gen_id='$gnid'";
$m16="UPDATE tadqee1 set reserch='' ,reserchstate='0',reserchnote=' ' where gen_id='$gnid'";
$m17="UPDATE tadqee1 set book='' ,bookstate='0',booknote=' ' where gen_id='$gnid'";
$m18="UPDATE tadqee1 set chanel='' ,chanelstate='0',chanelnote=' ' where gen_id='$gnid'";

//  معرفات الحالة والملاحظة





// انتهى


$sqlview="SELECT users.id as usid,users.genid,users.specialization, personal_information.*,education_data.*,additional_info_courses.*,
additional_info_alniqabat.* ,work_skills.* ,additional_info_research.*,additional_info_books.* ,submission_channels.* from users LEFT OUTER JOIN personal_information
ON users.id=personal_information.user_id
LEFT OUTER JOIN education_data ON
users.id=education_data.user_id 
LEFT OUTER JOIN additional_info_courses
ON users.id=additional_info_courses.user_id
LEFT OUTER JOIN additional_info_alniqabat
ON users.id=additional_info_alniqabat.user_id
LEFT OUTER JOIN work_skills
ON users.id=work_skills.user_id
LEFT OUTER JOIN additional_info_research
ON users.id=additional_info_research.user_id
LEFT OUTER JOIN additional_info_books
ON users.id=additional_info_books.user_id 
LEFT OUTER JOIN submission_channels
ON users.id=submission_channels.user_id WHERE genid='$gnid'";
$resview=mysqli_query($conn,$sqlview);
if(mysqli_num_rows($resview) === 1)
{
   
    $rowview = mysqli_fetch_assoc($resview);
$idd=$rowview['usid'];
$dgreebef=$rowview['degreebeforetadqee'];
    if(isset($_POST['send']))

    {
       
        
        $stat2=$_POST['option'];
        $note2=$_POST['sknnotr'];
        
        $stat3=$_POST['ed'];
        $note3=$_POST['ednote'];
      
        $stat4=$_POST['stats'];
        $note4=$_POST['statsnot'];
        


        //خاص بالتحديث على التعليم

        $upyear=$_POST['upyear'];
        $upavrg=$_POST['upavg'];
        $upfirstavg=$_POST['upfavg'];


        $workkk=$rowview['volunteer_work'];
 $workdgre="0";
        if($workkk=="نعم")

    {
        $stat8=$_POST['work'];
        $note8=$_POST['worknot'];
        
       
        if($stat8=="غير صحيح")
        {
            $workdgre="0";
        }
        else
           {
            $workdgre="1";

           }
    }
else 
{

}
        
if($rowview['have_child']=="نعم")
{
        $chl18=$_POST['ch'];
        $chm18=$_POST['ch2'];
  
}
else
{
    $chl18="0";
        $chm18="0";
    
}


        
           $sumchld=gettotalfrominput($chl18,$chm18);
           
           
           
           
           //دورات

//خاص بالدورات
if($rowview['course_flag']==1)
{
   $stat9=$_POST['dor'];
   $note9=$_POST['dornot'];
   
   if($stat9=="صحيح")
   {
       $cx="1";
   }
   else
   {
       $cx="0";
   }
   
   
    $sqlmdqq1="UPDATE modikk set dorat='$cx' where gen_id='$gnid'";
      $resmdqq1=mysqli_query($conn,$sqlmdqq1);
      if($resmdqq1)
      {
        
      }
   
}


if($rowview['alniqabat_flag']==1)
{
   $stat10=$_POST['nqp'];
    $note10=$_POST['nqpnot'];
   
   if($stat10=="صحيح")
   {
       $cn="1";
   }
   else
   {
       $cn="0";
   }
   
   
    $sqlmdqq2="UPDATE modikk set naqbat='$cn' where gen_id='$gnid'";
      $resmdqq2=mysqli_query($conn,$sqlmdqq2);
      if($resmdqq2)
      {
        
      }
   
}

 $newselect=$_POST['newselect'];

                if($newselect=="اعزب")
                {
                   $upmary="0";
                }
                else
                {
                  $upmary="1";  
                }
                
// الاعالة
if($rowview['iieala']=="نعم")
{
    $stat101=$_POST['alala'];
    $note101=$_POST['alalanot'];
if($stat101=="صحيح")
{
    $sqlmdqq3="UPDATE modikk set alaila='نعم' where gen_id='$gnid'";
      $resmdqq3=mysqli_query($conn,$sqlmdqq3);
      if($resmdqq3)
      {
        
      }  
}
else
{
    
    $sqlmdqq3="UPDATE modikk set alaila='لا' where gen_id='$gnid'";
      $resmdqq3=mysqli_query($conn,$sqlmdqq3);
      if($resmdqq3)
      {
        
      }    
}

}
// العمل السابق

if($rowview['old_work']=="نعم")
{
      $stat102=$_POST['workold'];
    $note102=$_POST['workoldnot'];
    if($stat102=="صحيح")
{
     
}
else
{
 $sqlmdqq4="UPDATE modikk set old_work='0' where gen_id='$gnid'";
      $resmdqq4=mysqli_query($conn,$sqlmdqq4);
      if($resmdqq4)
      {
        
      }  
    
}
    
}


// العمل الحالي

if($rowview['curr_work']=="نعم")
{
      $stat103=$_POST['workcur'];

    if($stat103=="صحيح")
{
     
}
else
{
 $sqlmdqq5="UPDATE modikk set cur_work='0' where gen_id='$gnid'";
      $resmdqq5=mysqli_query($conn,$sqlmdqq5);
      if($resmdqq5)
      {
        
      }  
    
}
    
}



// الاعمال الادبية 

if($rowview['published_research_flag']==1)
{
     $stat104=$_POST['resesrch'];

//حالة وجود كتب وبحوث
  if($rowview['published_book_flag']==1)
  {
       $stat105=$_POST['book'];
    if(($stat105=="غير صحيح")&&($stat104=="غير صحيح"))  
    {
       $sqlmdqq99="UPDATE modikk set adebba='0' where gen_id='$gnid'";
      $resmdqq99=mysqli_query($conn,$sqlmdqq99);
      if($resmdqq99)
      {
        
      }     
    }
    
    
    
    else if(($stat105=="غير صحيح")&&($stat104=="صحيح"))
    {
       $sqlmdqq99="UPDATE modikk set adebba='1.5' where gen_id='$gnid'";
      $resmdqq99=mysqli_query($conn,$sqlmdqq99);
      if($resmdqq99)
      {
        
      }    
        
    }
    
    
    
    
     else if(($stat105=="صحيح")&&($stat104=="غير صحيح"))
    {
       $sqlmdqq99="UPDATE modikk set adebba='1.5' where gen_id='$gnid'";
      $resmdqq99=mysqli_query($conn,$sqlmdqq99);
      if($resmdqq99)
      {
        
      }    
        
    }
    
      else 
    {
       $sqlmdqq99="UPDATE modikk set adebba='1.5' where gen_id='$gnid'";
      $resmdqq99=mysqli_query($conn,$sqlmdqq99);
      if($resmdqq99)
      {
        
      }    
        
    }
    
    
    
    
  }
  //في حالة فقط بحوث
  else
  
{
    
   if(($stat104=="غير صحيح"))
 {
    $sqlmdqq6="UPDATE modikk set adebba='0' where gen_id='$gnid'";
      $resmdqq6=mysqli_query($conn,$sqlmdqq6);
      if($resmdqq6)
      {
        
      }   
 }
 else
 {
     $sqlmdqq6="UPDATE modikk set adebba='1.5' where gen_id='$gnid'";
      $resmdqq6=mysqli_query($conn,$sqlmdqq6);
      if($resmdqq6)
      {
        
      }    
     
     
 }  
    
    
}







   }
     
     
//////////////////////////////////////////////
//الحالة الثانية الكتب
     
     if($rowview['published_book_flag']==1)
{
     $stat105=$_POST['book'];
     if($rowview['published_research_flag']==1)
  {
       $stat104=$_POST['resesrch'];
    if(($stat105=="غير صحيح")&&($stat104=="غير صحيح"))  
    {
       $sqlmdqq98="UPDATE modikk set adebba='0' where gen_id='$gnid'";
          $resmdqq98=mysqli_query($conn,$sqlmdqq98);
      if($resmdqq98)
      {
        
      }     
    }
    
    
    
    else if(($stat105=="غير صحيح")&&($stat104=="صحيح"))
    {
       $sqlmdqq98="UPDATE modikk set adebba='1.5' where gen_id='$gnid'";
        $resmdqq98=mysqli_query($conn,$sqlmdqq98);
      if($resmdqq98)
      {
        
      }    
        
    }
    
    
    
    
     else if(($stat105=="صحيح")&&($stat104=="غير صحيح"))
    {
       $sqlmdqq98="UPDATE modikk set adebba='1.5' where gen_id='$gnid'";
     $resmdqq98=mysqli_query($conn,$sqlmdqq98);
      if($resmdqq98)
      {
        
      }    
        
    }
    
      else 
    {
       $sqlmdqq98="UPDATE modikk set adebba='1.5' where gen_id='$gnid'";
      $resmdqq98=mysqli_query($conn,$sqlmdqq98);
      if($resmdqq98)
      {
        
      }    
        
    }
    
    
    
    
  }
  else
  
  {
    
       if(($stat105=="غير صحيح"))
 {
    $sqlmdqq98="UPDATE modikk set adebba='0' where gen_id='$gnid'";
      $resmdqq98=mysqli_query($conn,$sqlmdqq98);
      if($resmdqq98)
      {
        
      }   
 }
 else
 {
     $sqlmdqq98="UPDATE modikk set adebba='1.5' where gen_id='$gnid'";
      $resmdqq98=mysqli_query($conn,$sqlmdqq98);
      if($resmdqq98)
      {
        
      }    
     
       
      
      
      
      
      
      
  }


   }
     
     
     
     
}    




      $sqlmdqq="UPDATE modikk set year_g='$upyear' ,avaragee='$upavrg' , f_avarage='$upfirstavg' ,work_or_not='$workdgre' , num_of_child='$sumchld',ifmaryy='$upmary' where gen_id='$gnid'";
      $resmdqq=mysqli_query($conn,$sqlmdqq);
      if($resmdqq)
      {
        
      }
        else
        echo "1حدث    الاستعلام: " . $conn->error;
     
        
        
        
    $sqlchker1="SELECT *from tadqee1 where gen_id='$gnid'";
    $reschker1=mysqli_query($conn,$sqlchker1);
    
    if(mysqli_num_rows($reschker1) === 0)
    {
        
       
        
        
        $sqlrestadqee1=" INSERT INTO tadqee1(gen_id,user_id,checker1_id,saken,statussaken,sakennote,document,statusdocument, documentnote,card,statuscard,statusnote,jensi,statusjensi,jensinote,shahaduh_aljinsiuh,status_shahaduh_aljinsiuh,shahaduh_aljinsiuh_note,maryy,statesmaryy,notemaryy,num_of_child,statuscardabove18,traning,statustraning,notetraning,alniqabat,ststusalniqabat,notealnaqabat, additionalwork,statusadditionalwork,noteadditionalwork,alaila,alailastate,alailanote,workold,workoldstate,workoldnote,workcur,workcurstate,workcurnote,reserch,reserchstate,reserchnote,book,bookstate,booknote,chanel,chanelstate,chanelnote,created_at,updated_at) VALUES(
            '$gnid',
            '$idd',
            '1',
            '0',
            '0',
            '0',
            '0',
            '0',
            '0',
            '0',
            '0',
            '0',
            '0',
            '0',
            '0',
            '0',
            '0',
            '0',
            '0',
            '0',
            '0',
            '0',
            '0',
            '0',
            '0',
            '0',
            '0',
            '0',
            '0',
            '0',
            '0',
            '0',
            '0',
            '0',
            '0',
            '0',
            '0',
            '0',
            '0',
            '0',
            '0',
            '0',
            '0',
            '0',
            '0',
            '0',
            '0',
            '0',
            '0',
            '0',
            now(),
            now())";
            $ressqlrestadqee1=mysqli_query($conn,$sqlrestadqee1);
            if($ressqlrestadqee1)
            {
                //في حالة هوية موحدة 
             if($rowview['national_card_flag']=="1")
             {
                $stat1=$_POST['card'];
                $note1=$_POST['cardname'];
           
              $m1="UPDATE tadqee1 set card='الهوية الموحدة' ,statuscard='$stat1',statusnote='$note1' where gen_id='$gnid'";
             
             }

             // في حالة  وجود جنسية 
             else if($rowview['national_card_flag']=="2")
{
    $stat7=$_POST['jnsi'];
    $note7=$_POST['jnsinot'];
    $stat71=$_POST['shahada'];
    $note71=$_POST['shahadanot'];
  

    $m3="UPDATE tadqee1 set jensi='هوية الاحوال' ,statusjensi='$stat7'
    ,jensinote='$note7' ,shahaduh_aljinsiuh='شهادة جنسية',status_shahaduh_aljinsiuh='$stat71',shahaduh_aljinsiuh_note='$note71' where gen_id='$gnid'";
 
}
//انتهى 


// خاص بالسكن 
              $m2="UPDATE tadqee1 set saken='السكن' ,statussaken='$stat2',sakennote='$note2' where gen_id='$gnid'";

//خاص بالتعليم
              $m4="UPDATE tadqee1 set document='وثيقة التخرج' ,statusdocument='$stat3',documentnote='$note3' where gen_id='$gnid'";

//خاص بالعمل
if($rowview['volunteer_work']=="نعم")
{
  
    $m5="UPDATE tadqee1 set traning='تايد العمل' ,statustraning='$stat8',notetraning='$note8' where gen_id='$gnid'";
}

       
//خاص بالحالة الاجتماعية
if($rowview['marital_status']=="1")
{
$m6="UPDATE tadqee1 set maryy='عقد الزواج' ,statesmaryy='$stat4',notemaryy='$note4' where gen_id='$gnid'";
}


//خاص بعدد الاطفال اقل من 18
if($rowview['have_child']=="نعم")
{
    $chl18=$_POST['ch'];
    $chm18=$_POST['ch2'];
    $f2=$rowview['number_child_more18'] ;  
    $f1=$rowview['number_child_less18'] ;  
    if($chl18 !=$f1 || $chm18 !=$f2)
    {
        $m10="UPDATE tadqee1 set num_of_child='عدد الاطفال' ,statuscardabove18='عدد الاطفال غير صحيح' where gen_id='$gnid'";
}
}





//خاص بالدورات
if($rowview['course_flag']==1)
{
   $stat9=$_POST['dor'];
   $note9=$_POST['dornot'];
   
   
    $m11="UPDATE tadqee1 set additionalwork='الدورات' ,statusadditionalwork='$stat9',noteadditionalwork='$note9' where gen_id='$gnid'";

}


// خاص بالنقابات

if($rowview['alniqabat_flag']==1)
{
   $stat10=$_POST['nqp'];
    $note10=$_POST['nqpnot'];
 
    $m12="UPDATE tadqee1 set alniqabat='النقابات' ,ststusalniqabat='$stat10',notealnaqabat='$note10' where gen_id='$gnid' ";

}

// خاص بالاعالة
if($rowview['iieala']=="نعم")
{
    $stat101=$_POST['alala'];
    $note101=$_POST['alalanot'];
    
    
    $m13="UPDATE tadqee1 set alaila='الاعالة' ,alailastate='$stat101',alailanote='$note101' where gen_id='$gnid' ";
    
}

if($rowview['old_work']=="نعم")
{
      $stat102=$_POST['workold'];
    $note102=$_POST['workoldnot'];
    
        $m14="UPDATE tadqee1 set workold='العمل السابق' ,workoldstate='$stat102',workoldnote='$note102' where gen_id='$gnid'";
}
if($rowview['curr_work']=="نعم")
{
      $stat103=$_POST['workcur'];
    $note103=$_POST['workcurnot'];
    
        $m15="UPDATE tadqee1 set workold='العمل الحالي' ,workoldstate='$stat103',workoldnote='$note103' where gen_id='$gnid'";
}

if($rowview['published_research_flag']==1)
{
      $stat104=$_POST['resesrch'];
    $note104=$_POST['resesrchnot'];
    
        $m16="UPDATE tadqee1 set reserch='البحوث المنشورة' ,reserchstate='$stat104',reserchnote='$note104' where gen_id='$gnid'";
}
if($rowview['published_research_flag']==1)
{
      $stat105=$_POST['book'];
    $note105=$_POST['booknot'];
    
        $m17="UPDATE tadqee1 set reserch='الكتب المنشورة' ,reserchstate='$stat105',reserchnote='$note105' where gen_id='$gnid'";
}

//حالة القنوات
if($rowview['channel_type']==1)
{
      $stat106=$_POST['chanel'];
    $note106=$_POST['chanelnot'];
    
        $m18="UPDATE tadqee1 set chanel='القناة العامة' ,chanelstate='$stat106',chanelnote='$note106' where gen_id='$gnid'";
}
elseif($rowview['channel_type']==2)
{
      $stat106=$_POST['chanel'];
    $note106=$_POST['chanelnot'];
    
        $m18="UPDATE tadqee1 set chanel='قناة الشهداء' ,chanelstate='$stat106',chanelnote='$note106' where gen_id='$gnid'";
}
elseif($rowview['channel_type']==3)
{
      $stat106=$_POST['chanel'];
    $note106=$_POST['chanelnot'];
    
        $m18="UPDATE tadqee1 set chanel='قناة ضحايا الارهاب و العمليات العسكرية' ,chanelstate='$stat106',chanelnote='$note106' where gen_id='$gnid'";
}


elseif($rowview['channel_type']==4)
{
      $stat106=$_POST['chanel'];
    $note106=$_POST['chanelnot'];
    
        $m18="UPDATE tadqee1 set chanel='قناة السجناء السياسين' ,chanelstate='$stat106',chanelnote='$note106' where gen_id='$gnid'";
}

elseif($rowview['channel_type']==5)
{
      $stat106=$_POST['chanel'];
    $note106=$_POST['chanelnot'];
    
        $m18="UPDATE tadqee1 set chanel='قناة الناجيات الايزيديات' ,chanelstate='$stat106',chanelnote='$note106' where gen_id='$gnid'";
}







                // الاستعلامات المطلوبة
                $sql = "$m1;$m2;$m3;$m4;$m5;$m6;$m10;$m11;$m12;$m13;$m14;$m15;$m16;$m17";
                if ($conn->multi_query($sql)) {


                    do {
                        if ($result = $conn->store_result()) {
                            while ($row = $result->fetch_assoc()) {
                                // قم بتنفيذ الإجراءات المطلوبة على النتائج هنا
                                // يمكنك استخدام المصفوفة $row للوصول إلى البيانات










                            }
                            
                            $result->free();
                        }
                    } while ($conn->next_result());
                } else 
                {
                  
                    echo "حدث خطأ أثناء تنفيذ الاستعلام: " . $conn->error;
                
                
                    #echo "<script>alert('$dgreeafter');</script>";
                        



                }
                
                // إغلاق الاتصال بقاعدة البيانات
               

                $newselect=$_POST['newselect'];

                if($newselect=="اعزب")
                {
                    $dgreeafter=gettotalf($gnid)+avaragef($gnid)+yearf($gnid)+workiff($gnid)+Doratf($gnid)+Naqabaf($gnid)+chekmarryff($gnid)+alaila($gnid)+workoldf($gnid)+workcurf($gnid)+adbee($gnid);
    $note=notes($gnid);
                }
                else
                {
                $dgreeafter=gettotalf($gnid)+avaragef($gnid)+yearf($gnid)+workiff($gnid)+Doratf($gnid)+Naqabaf($gnid)+chekmarryff($gnid)+alaila($gnid)+workoldf($gnid)+workcurf($gnid)+adbee($gnid);
    $note=notes($gnid);
    echo alaila($gnid);
                }
                
                
                echo "vv ".gettotalf($gnid) ."/" .avaragef($gnid)."/ ".yearf($gnid)."/ ".workiff($gnid)."/ ".Doratf($gnid)
                ."/ ".Naqabaf($gnid)."/ ".chekmarryff($gnid)."/ ".alaila($gnid)."/ ".workoldf($gnid)."/ "
                .workcurf($gnid)."/ ".adbee($gnid)." nn";

    //جمع الدرجات والملاحظات واضافة في الداتا
    

    //استعلام حالة الاستمارة مقبولة او لا

    $ifaccept=$_POST['ifacsept'];
    $finelselect=$_POST['finelselvt'];
    if($ifaccept=="1")
    $x="مقبولة";
    elseif($ifaccept=="0")
    $x="مرفوضة";


   

    //انتهى
    if($dgreeafter!=0)
    {
       echo"0";
          $sqlinform="SELECT *from informationform where genid='$gnid'";
          $resinform=mysqli_query($conn,$sqlinform);
          if(mysqli_num_rows($resinform) === 0)
          {
            echo"1";
            $sqlinsertinform="INSERT INTO informationform(user_id,genid,chekerid,degreebeforecheck,degreeaftercheck,examdegree, totaldegree,reson,notechker,Accept,create_at,update_at) VALUES (
            '$idd',
            '$gnid',
            '0',
            '$dgreebef',
            '$dgreeafter',
            '0',
            '0',
            '$finelselect',
            '$note',
            '$x',
            now(),
            now())";
            $resinsrtform=mysqli_query($conn,$sqlinsertinform);
            if($resinsrtform)
            {
                $m88="UPDATE users set auflg='1' where genid='$gnid'";
                $res=mysqli_query($conn,$m88);
                if($res)
                {
                  
            #    header('Location:auditindex.php');
                }
                
                
            }
          }


    }

                    
            
              #  echo "<script>alert('555555');</script>";
             
            }
        
    }
    
     echo "2حدث    الاستعلام: " . $conn->error;
   
    }
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.rtl.min.css" />
    <!--<link rel="stylesheet" href="assets/css/datatable.min.css">-->
    <link rel="stylesheet" href="assets/css/shettlogin.css" />
    <link rel="stylesheet" href="assets/css/styles.css" />
    <title>صفحة التدقيق</title>
    <style>
        p {
            font-size: 20px;
            font-weight: 300;
        }
    </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary  fixed-top">
     
        <div class="container-fluid ">
            <ul class="navbar-nav  mb-2 mb-lg-0 w-100 d-block">
                <div class="d-flex justify-content-around align-items-center">
                    <div>
                        <li class="nav-item mx-2">
                        <?php  

$namepers1 = $rowview['first_name'] .' '.$rowview['second_name'].' '.$rowview['third_name'];  

?>
         <h4>                   الأسم :<?php echo $namepers1 ?> </h4>
                        </li>
                    </div>
                    <div>
                        <li class="nav-item mx-2">
                        <h4>          رقم الأستمارة : <?php echo $rowview['genid'] ?> </h4>
                        </li>
                    </div>
                    <div>
                        <li class="nav-item mx-2 ">
                            <?php 
                            $id_s=$rowview['specialization'];
                            $sqlspsh="SELECT * from specialization_list where s_id='$id_s'";
                            $resspsh=mysqli_query($conn,$sqlspsh);
                            if(mysqli_num_rows($resspsh) === 1)
                            {
                             $rowm = mysqli_fetch_assoc($resspsh); 
                            $spsh= $rowm['name'];
                            }
                            
                            
                            ?>
                        <h4>       العنوان الوظيفي    : <?php echo $spsh ;?> </h4>
                        </li>
                    </div>
                    <div>
                        <li class="ml-auto">
                            <a class="navbar-brand" href="#">
                                <?php
                                  $id1=$rowview['usid'];
                         $image="image";
                                 $imagenamepth = getimage($id1, $image);

        ?>

                         
                                <img src="../assets/files/<?php echo $imagenamepth; ?>" alt="Logo" width="90" height="90" aria-placeholder=""
                                    class="d-inline-block align-text-top">

                            </a>
                        </li>
                    </div>
                </div>


            </ul>
        </div>
    </nav>  
<form method="POST" action="">
    <div class="container-fluid mt-5 pt-5">
        
       <?php
           if($rowview['national_card_flag']=="1")
           {
           include('card.php');
           
        ?>



        <?php
        
        }
           elseif($rowview['national_card_flag']=="2")
           {
            include('jnsi.php');
            include('shadaj.php');

           }
           
       ?>
        <hr class="border border-5 border-black">
        <div class="row pt-2">
            <div class="col-6">
                <h2> معلومات السكن </h2>
                <div class="d-flex justify-content-around">
                    <p>
                    <?php 
$nameskn1= $rowview['housing_id_number'] ;  
?>
   رقم بطاقة السكن :   <?php echo $nameskn1 ;?>
                       
                    </p>
                    <p>
                    <?php 
$nameskn2 = $rowview['information_Office'] ;  
?>
مكتب معلومات :   <?php echo $nameskn2 ;?>
                      
                    </p>
                </div>
                <div class="d-flex justify-content-around">
                    <p>
                    <?php 
$nameskn3 = $rowview['governorate'] ;  
?>
   المحافظة  :   <?php echo $nameskn3 ;?>
                       
                    </p>
                    <p>
                    <?php 
$nameskn4 = $rowview['region'] ;  
?>
 القضاء   :   <?php echo $nameskn4 ;?>
                        
                    </p>
                    <p>
                    <?php 
$nameskn5 = $rowview['neighborhood'] ;  
?>
 الحي   :   <?php echo $nameskn5 ;?>
                    
                    </p>

                </div>
                <div class="d-flex ">
                    <p>
                    <?php 
$nameskn5 = $rowview['address1'] ;  
?>
 اقرب نقطة دالة   :   <?php echo $nameskn5 ;?>
                  
                    </p>


                </div>
                <hr>
                <div class="row">
                    <div class="col-12">
                        <label for=""> الحالة  </label>
                        <br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="inlineRadio1"  name="option" value="صحيح" onclick="disableInput('note1')" checked>
                            <label class="form-check-label" for="inlineRadio1">صحيح </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="option" id="inlineRadio2" type="radio" value="غير صحيح" onclick="enableInput('note1')">
                            <label class="form-check-label" for="inlineRadio2" >غير صحيح</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label"> اختر ملاحظة :</label>
                            <select
                      class="form-select"
                      id="note1"
                      name="sknnotr"
                      aria-describedby="validationServer04Feedback"
                      
                    >
                      <option  value="">.. </option>
                      <option>رقم بطافة السكن غير صحيح</option>
                    </select>
                        </div>
                    </div>
             
                </div>
            </div>
            <div class="col-6">
                <div style="text-align:center">
                <?php
                 $id1=$rowview['usid'];
                $name1="SAKAN";
              $pdfnamepth= getpdf($id1,$name1);
        
                ?>
                     <iframe src="../assets/files/<?php echo $pdfnamepth; ?>" width="500" height="500"></iframe> 
                </div>
            </div>
        </div>
        <hr class="border border-5 border-black">
        <div class="row">
            <div class="col-6">
                <h2> معلومات الدراسة </h2>
                <div class="d-flex justify-content-around">
                    <p>
                    <?php 
$nameed1 = $rowview['academic_achievement'] ;  
?>
   التحصيل الدراسي  :   <?php echo $nameed1 ;?>
                    </p>
                    <p>
                    <?php 
$nameeed2 = $rowview['place_study_flag'] ;  
if($nameeed2=="0")
$ined="داخل العراق";
else
$ined="خارج العراق";
?>
   مكان الدراسة  :   <?php echo $ined ;?>
                    </p>
                </div>
                <div class="d-flex justify-content-around">
         <?php 
if($nameeed2=="0")
{
include('edct.php');
}
else
{
    include('edctout.php');
}
         ?>

                </div>
                <hr>
                <div class="row">
                    <div class="col-12">
                        <label for=""> الحالة  </label>
                        <br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="inlineRadio1" name="ed" value="صحيح" onclick="disableInput('edunote')" checked>
                            <label class="form-check-label" for="inlineRadio1">صحيح </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="ed" id="inlineRadio2" type="radio" value="غير صحيح"  onclick="enableInput('edunote')">
                            <label class="form-check-label" for="inlineRadio2" >غير صحيح</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label"> اختر ملاحظة :</label>
                            <select
                      class="form-select"
                      id="edunote"
                      name="ednote"
                      aria-describedby="validationServer04Feedback"
                      
                    >
                      <option  value="">.. </option>
                      <option>معدل الطالب الاول</option>
                    </select>
                        </div>
                    </div>
                 
                </div>
                

            </div>
            <div class="col-6">
               <div style="text-align:center">
                <?php
                 $id1=$rowview['usid'];
                $name1="document";
              $pdfnamepth= getpdf($id1,$name1);
        
                ?>
                    < <iframe src="../assets/files/<?php echo $pdfnamepth; ?>" width="500" height="500"></iframe> 
                </div>
            </div>
        </div>

        <hr class="border border-5 border-black">
<?php 

if($rowview['volunteer_work']=="نعم")
include('work.php');
?>


<?php 
if($rowview['old_work']=="نعم")
include('workold.php');
?>

<?php 
if($rowview['curr_work']=="نعم")
include('workcur.php');
?>




<hr class="border border-5 border-black">
<?php
if($rowview['iieala']=="نعم")
{
    include('alaila.php');   
}
?>




        <hr class="border border-5 border-black">
 

<div class="row">
            <div class="col-6">
                <h2> معلومات الحالة الأجتماعية </h2>
                <div class="d-flex flex-column">
                    <p>
                    <?php 
$namemary1 = $rowview['marital_status'] ;  
?>
   الحالة الأجتماعية   :   <?php echo $namemary1 ;?>
              
                    </p>
                    <select class="form-select w-25" aria-label="Default select example" name="newselect">
                        <option value"<?php echo $namemary1; ?>"><?php echo $namemary1; ?></option>
                        <option value="اعزب">اعزب</option>
                        <option value="متزوج">متزوج</option>
                        <option value="مطلق">مطلق</option>
                        <option value="ارمل">ارمل</option>
                    </select>
                    <p class="px-2">
                    <?php 
$namemary = $rowview['have_child'] ;  
?>
  هل لديه اطفال :   <?php echo $namemary ;?>
                
                    </p>

                    
                    <?php 
$namemary2 = $rowview['number_child_less18'] ;  
?>
<div class="d-flex flex-column">
    <p>
        <input type="checkbox" name="" id="cd18" onchange="handleCheckboxChange('cd18','notd18')">
      عدد الاطفال الاصغر من  18 سنة :   <?php echo $namemary2 ;?>
                
                    </p>
                    <input type="number" class="w-25" name="ch" value="<?php echo $namemary2 ;?>" id="notd18"  >
</div>
<div class="d-flex flex-column">
                    <p>
                    <?php 
$namemary3 = $rowview['number_child_more18'] ;  
?>
<input type="checkbox" name="" id="cu18" onchange="handleCheckboxChange('cu18','notu18')">
 عدد الاطفال الاكبر من  18 سنة :   <?php echo $namemary3 ;?>
                     
                     </p>
                     <input type="number" class="w-25" name="ch2" value="<?php echo $namemary3 ;?>" id="notu18" >
</div>
                </div>
            
               
                <hr>
                <div class="row">
                    <div class="col-12">
                        <label for=""> الحالة  </label>
                        <br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="inlineRadio1" checked name="stats" value="صحيح" onchange="toggleInput(this)">
                            <label class="form-check-label" for="inlineRadio1">صحيح </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="stats" id="inlineRadio2" type="radio" value="غير صحيح" onchange="toggleInput(this)">
                            <label class="form-check-label" for="inlineRadio2" >غير صحيح</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label"> أكتب ملاحظة :</label>
                            <textarea class="form-control" id="statsnot" name="statsnot" rows="2" ></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div style="text-align:center">
                    <?php
                    
                      $name1 = "عقد زواج";
                      $name1_2="حجة طلاق";
                      $name1_3="شهادة وفاة الزوج/ة";
                      $id1 = $rowview['usid'];
                    $sqltypedeco="SELECT * from deco where user_id='99' AND ( type_dec ='$name1' OR type_dec ='$name1_2' OR type_dec='$name1_3') ";
                    $restypedeco=mysqli_query($conn, $sqltypedeco);
                    
                     if ( $restypedeco) 
                     {
                           $rowchk = mysqli_fetch_assoc($restypedeco);
                     }
                    
        
        $maryif=$rowchk['type_dec'];
        if($maryif==$name1)
        $mfi =$name1;
        else if($maryif==$name1_2)
        $mfi =$name1_2;
       else if($maryif==$name1_3)
       $mfi =$name1_3;
       else
       $mfi=" ";
        $pdfnamepth = getpdf($id1, $mfi);

        ?>

         <iframe src="../assets/files/<?php echo $pdfnamepth; ?>" width="500" height="500"></iframe>
                </div>
            </div>
        </div>
        <?php
$havchild = $rowview['have_child'] ;  

if($havchild=="نعم")
{
    include('childless.php');
    include('childmore.php');
?>
    




   <?php
}
if($rowview['course_flag']==1)
{

    $sqlcouse="SELECT COUNT(course_flag) FROM additional_info_courses where user_id='$id1'";
    $rescours=mysqli_query($conn,$sqlcouse);
    if(mysqli_num_rows($rescours) === 1)
    {
        $rowcouse = mysqli_fetch_assoc($rescours);
        $countc=$rowcouse['COUNT(course_flag)'];
        
    }
    include('curse.php');
}
if($rowview['alniqabat_flag']==1)
{
    $sqlniqbat="SELECT COUNT(alniqabat_flag) FROM additional_info_alniqabat where user_id='$id1'";
    $resniqbat=mysqli_query($conn,$sqlniqbat);
    if(mysqli_num_rows($resniqbat) === 1)
    {
        $rowniqbat= mysqli_fetch_assoc($resniqbat);
        $countn=$rowniqbat['COUNT(alniqabat_flag)'];

    }
 include('naqipa.php');

}
?>
<hr class="border border-5 border-black">
<?php

if($rowview['published_research_flag']==1)
include('research.php');

if($rowview['published_book_flag']==1)
include('book.php');

?>
<hr class="border border-5 border-black">
<?php
include('chanel.php');
?>







<?php
        
        $mary = $rowview['marital_status'] ;  
        
        ?>
  <hr class="border border-5 border-black">
  <div class="row mb-5">
    <div class="col-12">
    <label for=""> حالة الأستمارة   </label>
                        <br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id=""  name="ifacsept" value="1"  onclick="disableInput('estnote')" checked>
                            <label class="form-check-label" for="">مقبولة </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="ifacsept" id="" type="radio" value="0" onclick="enableInput('estnote')">
                            <label class="form-check-label" for="" >مرفوضة</label>
                        </div>
    </div>
    <div class="col-12">
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label"> أكتب ملاحظة :</label>
                            <select class="form-select w-25" aria-label="Default select example" name="finelselvt">
                        <option value=" " selected>اختر</option>
                        <option value="بسبب نقص بالمستمسك">بسبب نقص بالمستمسك</option>
                        <option value="المرفقات خطا">المرفقات خطا</option>
                        <option value="غير مشمول بالتقديم">غير مشمول بالتقديم</option>
                        
                    </select>
                        </div>
                    </div>
    <div class="col-12 d-flex justify-content-start">
        <button type="submit" name="send" class="btn btn-primary my-2 w-25">اكمال التدقيق </button>
    </div>
    </div>
        </form>
        <script>
    function enableInput(elementId) {
      var input = document.getElementById(elementId);
      input.disabled = false;
    }

    function disableInput(elementId) {
      var input = document.getElementById(elementId);
      console.log(input);
      input.disabled = true;
    }
  </script>  
  <script>
    function handleCheckboxChange(check,input) {
      var checkbox = document.getElementById(check);
      var input = document.getElementById(input);
      
      if (checkbox.checked) {
        input.classList.add("d-none"); // Add the class
      } else {
        input.remove("d-none"); // Remove the class
      }
    }
  </script> 
</body>

</html>

<?php
}
?>