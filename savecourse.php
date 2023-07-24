<?php
include_once('config.php');
//اضافة دورة
if (isset($_POST['savecourse'])) {
    if (!empty($_POST['online_flag'])) {
        $online_flag = '1';
    } else {
        $online_flag = '0';
    }
    $flag="1";
    $user_id = $_POST['user_id'];
    $coname = $_POST['co_name'];
    $courser = $_POST['courser'];
    $co_place = $_POST['co_place'];
    $co_duration = $_POST['co_duration'];
    $co_compdate = $_POST['co_compdate'];
    $sql = "INSERT INTO additional_info_courses (user_id,course_flag,course_name,course_training_center,course_online_check
    ,course_place,course_days,course_date,created_at,updated_at,deleted_at) values 
('$user_id','$flag','$coname',
'$courser','$online_flag', '$co_place' ,'$co_duration','$co_compdate',now(),now(),now() )";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        $dec='وثيقة دورة'.$coname;
      $s="INSERT into deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at)
        VALUES ('$user_id','$dec',0,'',now(),now())";
        $r=mysqli_query($conn,$s);
        if ($r){
        echo '<script> 
        window.location.href="optional.php";</script>';
    }} else {
        echo "noo" .mysqli_error($conn);
       /* echo '<script> alert(" حدث خطأ , يرجى اعادة المحاولة ")
              window.location.href="optional.php";</script>';*/
    }
}
if(isset($_POST['delcourse'])){
    $id = $_POST['id'];
    $user_id=$_POST['user_id'];
    $denam=$_POST['name'];
    $dec='وثيقة دورة'.$denam;
    $sql="DELETE FROM additional_info_courses  where id='$id' ";
    $resu=mysqli_query($conn,$sql);
    if($resu){
        $dl="DELETE FROM deco  where user_id='$user_id' and type_dec='$dec'";
        $resdel=mysqli_query($conn,$dl);
        if($resdel){
        echo '<script> 
        window.location.href="optional.php";</script>';
    }
else 
echo mysqli_error($conn);}
}
//تعديل دورة 
if (isset($_POST['updcourse'])) {
    if (!empty($_POST['online_flag'])) {
        $online_flag = '1';
    } else {
        $online_flag = '0';
    }
    $id = $_POST['id'];
    $user_id = $_POST['user_id'];
    $coname = $_POST['co_name'];
    $old_name=$_POST['old_name'];
    $courser = $_POST['courser'];
    $co_place = $_POST['co_place'];
    $co_duration = $_POST['co_duration'];
    $co_compdate = $_POST['co_compdate'];
    $dec='وثيقة دورة'.$coname;
    $sql = " UPDATE additional_info_courses set user_id = '$user_id' ,course_name='$coname',course_training_center='$courser' ,
course_online_check='$online_flag',
course_place='$co_place',course_days='$co_duration',course_date= '$co_compdate' ,updated_at=now() where id='$id'";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        $decold='وثيقة دورة'.$old_name;
        $upd="UPDATE deco SET type_dec='$dec' , updated_at=now() where user_id='$user_id' and type_dec='$decold' ";
        $upres=mysqli_query($conn,$upd);
        if($upres){
            echo $old_name."  " .$user_id; 
        /*echo '<script> 
        window.location.href="optional.php";</script>';*/
    }
    else{
        echo "noo";
    }
    } else {
        echo '<script> alert(" حدث خطأ , يرجى اعادة المحاولة ")
        window.location.href="optional.php";</script>';
    }
}

//اضافة كتاب
if (isset($_POST['addbook'])) {
    $user_id = $_POST['user_id'];
    $book_title = $_POST['book_title'];
    $publisher = $_POST['publisher'];
    $day = $_POST['day'];
    $month = $_POST['month'];
    $year = $_POST['year'];
    $date = $year . '-' . $month . '-' . $day;
    $sql = "INSERT INTO additional_info_books (user_id,published_book_name,published_book_publisher,
 published_book_date,created_at,updated_at,deleted_at) values 
 ('$user_id','$book_title',
 '$publisher','$date', now() ,now(),now() )";

    $res = mysqli_query($conn, $sql);
    if ($res) {
      $s="INSERT into deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at)
      VALUES ('$user_id','تأييد جهة نشر الكتاب',0,'',now(),now())";
      $r=mysqli_query($conn,$s);
      if ($r){
      echo '<script> 
      window.location.href="optional.php";</script>';
    }} else {
        echo '<script> alert(" حدث خطأ , يرجى اعادة المحاولة ")
              window.location.href="optional.php";</script>';
    }
}
/////////جذف كتاب /////////
if(isset($_POST['delbook'])){
    $id = $_POST['id'];
    $user_id=$_POST['user_id'];
    $sql="DELETE FROM additional_info_books  where id='$id' ";
    $resu=mysqli_query($conn,$sql);
    if($resu){
        $dl="DELETE FROM deco  where user_id='$user_id' and type_dec='تأييد جهة نشر الكتاب'";
        $resdel=mysqli_query($conn,$dl);
        if($resdel)
        echo '<script> 
        window.location.href="optional.php";</script>';
    }
}
//تعديل كتاب
if (isset($_POST['updbook'])) {
    $id = $_POST['bid'];
    $user_id = $_POST['user_id'];
    $book_title = $_POST['book_title'];
    $publisher = $_POST['publisher'];
    $day = $_POST['day'];
    $month = $_POST['month'];
    $year = $_POST['year'];
    $date = $year . '-' . $month . '-' . $day;

    $sql = "UPDATE additional_info_books set published_book_name='$book_title',published_book_publisher='$publisher',
 published_book_date='$date',updated_at= now() where id='$id'";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        echo '<script> 
        window.location.href="optional.php";</script>';
    } else {
        echo '<script> alert(" حدث خطأ , يرجى اعادة المحاولة ")
              window.location.href="optional.php";</script>';
    }
}

//اضافة بحث
if (isset($_POST['addsearch'])) {
    $user_id = $_POST['user_id'];
    $search_title = $_POST['search_title'];
    $publisher = $_POST['search_pub'];
    $day = $_POST['se-day'];
    $month = $_POST['se-month'];
    $year = $_POST['se-year'];
    $date = $year . '-' . $month . '-' . $day;
    $sql = "INSERT INTO additional_info_research (user_id,published_research_name,published_research_publisher,
 published_research_date,created_at,updated_at,deleted_at) values 
 ('$user_id','$search_title',
 '$publisher','$date', now() ,now(),now() )";

    $res = mysqli_query($conn, $sql);
    if ($res) {
      $s="INSERT into deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at)
      VALUES ('$user_id','تأييد جهة نشر البحث',0,'',now(),now())";
      $r=mysqli_query($conn,$s);
      if ($r){
      echo '<script> 
      window.location.href="optional.php";</script>';
    }} else {
        echo '<script> alert(" حدث خطأ , يرجى اعادة المحاولة ")
              window.location.href="optional.php";</script>';
    }
}
//حذف بحث 
if(isset($_POST['delsearch'])){
    $id = $_POST['id'];
    $user_id=$_POST['user_id'];
    $sql="DELETE FROM additional_info_research  where id='$id' ";
    $resu=mysqli_query($conn,$sql);
    if($resu){
        $dl="DELETE FROM deco  where user_id='$user_id' and type_dec='تأييد جهة نشر البحث'";
        $resdel=mysqli_query($conn,$dl);
        if($resdel)
        echo '<script> 
        window.location.href="optional.php";</script>';
    }
}

//تعديل بحث
if (isset($_POST['updsearch'])) {
    $id = $_POST['sid'];
    $user_id = $_POST['user_id'];
    $search_title = $_POST['search_title'];
    $publisher = $_POST['search_pub'];
    $day = $_POST['se-day'];
    $month = $_POST['se-month'];
    $year = $_POST['se-year'];
    $date = $year . '-' . $month . '-' . $day;

    $sql = "UPDATE additional_info_research set published_research_name='$search_title',published_research_publisher='$publisher',
 published_research_date='$date',updated_at= now() where id='$id'";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        echo '<script> 
        window.location.href="optional.php";</script>';
    } else {
        echo '<script> alert(" حدث خطأ , يرجى اعادة المحاولة ")
        window.location.href="optional.php";</script>';
    }
}

//اضافة نقابة
if (isset($_POST['addnaqaba'])) {
    $user_id = $_POST['user_id'];
    $flag = '1';
    $naqabaa = $_POST['naqabaa'];
    $day = $_POST['id-nday'];
    $month = $_POST['id-nmonth'];
    $year = $_POST['id-nyear'];
    $date = $year . '-' . $month . '-' . $day;
    $dec="هوية". $naqabaa;
    $sql = "INSERT INTO additional_info_alniqabat (user_id,alniqabat_flag,alniqabat_name,alniqabat_date,created_at,updated_at,deleted_at) values 
 ('$user_id','$flag','$naqabaa','$date', now() ,now(),now() )";

    $res = mysqli_query($conn, $sql);
    if ($res) {
      $s="INSERT into deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at)
      VALUES ('$user_id','$dec',0,'',now(),now())";
      $r=mysqli_query($conn,$s);
      if ($r){
      echo '<script> 
      window.location.href="optional.php";</script>';
      }
    } else {
        echo '<script> alert(" حدث خطأ , يرجى اعادة المحاولة ")
        window.location.href="optional.php";</script>';
    }
}
//حذف نقابة 
if(isset($_POST['delnaq'])){
    $id = $_POST['id'];
    $user_id=$_POST['user_id'];
    $delnaq=$_POST['name'];
    $dec="هوية".$delnaq;
    $sql="DELETE FROM additional_info_alniqabat  where id='$id' ";
    $resu=mysqli_query($conn,$sql);
    if($resu){
        $dl="DELETE FROM deco  where user_id='$user_id' and type_dec='$dec'";
        $resdel=mysqli_query($conn,$dl);
        if($resdel)
        echo '<script> 
        window.location.href="optional.php";</script>';
    }
}
//تعديل  نقابة
if (isset($_POST['updnaqaba'])) {
    $id=$_POST['nid'];
    $user_id = $_POST['user_id'];
    $flag = '1';
    $naqabaa = $_POST['naqabaa'];
    $old_name=$_POST['oldname'];
    $day = $_POST['id-nday'];
    $month = $_POST['id-nmonth'];
    $year = $_POST['id-nyear'];
    $date = $year . '-' . $month . '-' . $day;
    $dec="هوية".$naqabaa;
    $sql = "UPDATE additional_info_alniqabat SET user_id= '$user_id',alniqabat_flag='$flag' ,alniqabat_name='$naqabaa',alniqabat_date='$date' ,updated_at=now() 
   where id='$id'  ";

    $res = mysqli_query($conn, $sql);
    if ($res) {
        $decold='هوية'.$old_name;
        $upd="UPDATE deco SET type_dec='$dec' , updated_at=now() where user_id='$user_id' and type_dec='$decold' ";
        $upres=mysqli_query($conn,$upd);
        if($upres){
        echo '<script> 
        window.location.href="optional.php";</script>';}
    } else {
        echo '<script> alert(" حدث خطأ , يرجى اعادة المحاولة ")
        window.location.href="optional.php";</script>';
    }
}
