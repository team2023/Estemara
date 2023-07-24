<?php

include 'config.php';
$idch=$_SESSION['idusere'];

if(isset($idch))

{
$sqlusertdq = "SELECT users.genid ,users.auflg,personal_information.governorate,personal_information.degreebeforetadqee,personal_information.degreeaftertadqee ,modikk.*,checker.*,daqeqid.* from users LEFT OUTER JOIN personal_information on users.id=personal_information.user_id LEFT OUTER JOIN modikk on users.id=modikk.user_id LEFT OUTER JOIN checker on checker.checkid=modikk.checker_id
LEFT OUTER JOIN daqeqid on users.id=daqeqid.user_id
where genid !='' AND auflg=0 AND checker_id!=0";
$resusertdq = mysqli_query($conn, $sqlusertdq);

if ($resusertdq->num_rows > 0) {
}
$all = "SELECT COUNT(ginid) FROM befor_tadqeq where au_flag='0'";
$resall = mysqli_query($conn, $all);
if(mysqli_num_rows($resall) > 0){
    $rall = mysqli_fetch_assoc($resall);
    $getall = $rall['COUNT(ginid)'];
}



// اظهار عدد قيد التدقيق

$sqlusertdqc = "SELECT COUNT(genid), users.genid ,users.auflg,personal_information.governorate,personal_information.degreebeforetadqee,personal_information.degreeaftertadqee ,modikk.*,checker.*,daqeqid.* from users LEFT OUTER JOIN personal_information on users.id=personal_information.user_id LEFT OUTER JOIN modikk on users.id=modikk.user_id LEFT OUTER JOIN checker on checker.checkid=modikk.checker_id
LEFT OUTER JOIN daqeqid on users.id=daqeqid.user_id
where genid !='' AND auflg=0 AND checker_id!=0";
$resusertdqc = mysqli_query($conn, $sqlusertdqc);

if ($resusertdqc->num_rows >= 0) {
    $rowv = mysqli_fetch_assoc($resusertdqc);
    $getcount = $rowv['COUNT(genid)'];
}


// انتهىى






//في حالة الاستمارة مقبولة

$sqlusertdq2 = "SELECT   users.*,modikk.*,tadqee1.*,personal_information.* ,informationform.*,checker.*,daqeqid.* FROM users LEFT OUTER JOIN modikk ON
users.id=modikk.user_id
LEFT OUTER JOIN tadqee1 ON
users.id=tadqee1.user_id
LEFT OUTER JOIN personal_information
ON users.id=personal_information.user_id
LEFT OUTER JOIN informationform
ON users.id=informationform.user_id
LEFT OUTER JOIN checker on checker.checkid=modikk.checker_id
LEFT OUTER JOIN daqeqid on users.id=daqeqid.user_id
where users.genid !='' AND auflg=1 AND Accept='مقبولة' ";
$resusertdq2 = mysqli_query($conn, $sqlusertdq2);

if ($resusertdq2->num_rows > 0) {
}

//ايجاد عدد المقبولة

$sqlusertdq2c = "SELECT   users.*,COUNT(users.genid),modikk.*,tadqee1.*,personal_information.* ,informationform.* FROM users LEFT OUTER JOIN modikk ON
users.id=modikk.user_id
LEFT OUTER JOIN tadqee1 ON
users.id=tadqee1.user_id
LEFT OUTER JOIN personal_information
ON users.id=personal_information.user_id
LEFT OUTER JOIN informationform
ON users.id=informationform.user_id where users.genid !='' AND auflg=1 AND Accept='مقبولة' ";
$resusertdq2c = mysqli_query($conn, $sqlusertdq2c);

if ($resusertdq2c->num_rows > 0) {
    $rowv2 = mysqli_fetch_assoc($resusertdq2c);
    $getcount2 = $rowv2['COUNT(users.genid)'];
}
//مرفوضة
$sqlusertdq3 = "SELECT users.*,COUNT(users.genid),modikk.*,tadqee1.*,personal_information.* ,informationform.*,checker.*,daqeqid.* FROM users LEFT OUTER JOIN modikk ON
    users.id=modikk.user_id
    LEFT OUTER JOIN tadqee1 ON
    users.id=tadqee1.user_id
    LEFT OUTER JOIN personal_information
    ON users.id=personal_information.user_id
    LEFT OUTER JOIN informationform
    ON users.id=informationform.user_id
    LEFT OUTER JOIN checker on checker.checkid=modikk.checker_id
LEFT OUTER JOIN daqeqid on users.id=daqeqid.user_id
where users.genid !='' AND auflg=1 AND Accept='مرفوضة'";
$resusertdq3 = mysqli_query($conn, $sqlusertdq3);

if ($resusertdq3->num_rows > 0) {
}


// ايجاد عدد المرفوضة


$sqlusertdq3c = "SELECT users.*,COUNT(users.genid),modikk.*,tadqee1.*,personal_information.* ,informationform.* FROM users LEFT OUTER JOIN modikk ON
    users.id=modikk.user_id
    LEFT OUTER JOIN tadqee1 ON
    users.id=tadqee1.user_id
    LEFT OUTER JOIN personal_information
    ON users.id=personal_information.user_id
    LEFT OUTER JOIN informationform
    ON users.id=informationform.user_id where users.genid !='' AND auflg=1 AND Accept='مرفوضة'";
$resusertdq3c = mysqli_query($conn, $sqlusertdq3);

if ($resusertdq3c->num_rows > 0) {
    $rowv3 = mysqli_fetch_assoc($resusertdq3c);
    $getcount3 = $rowv3['COUNT(users.genid)'];
}




//ايجاد
/*$sqlgt="SELECT COUNT(genid)from users where auflg='0'";
$resget=mysqli_query($conn,$sqlgt);
if(mysqli_num_rows($resget) === 1)
{
    $rowv = mysqli_fetch_assoc($resget);
    $getcount=$rowv['COUNT(genid)'];

}*/
 if(isset($_POST['tuzea']))

    {
     $s=$_POST['dataa'];
     $chker=$_POST['checker'];
     $gensol = explode(",", $s);
     
      $gncount = count($gensol);
       
       
       for($i=0;$i<$gncount;$i++)
       {
           
            $sqlmdqq11="UPDATE modikk set checker_id='$chker' where gen_id='$gensol[$i]'";
      $resmdqq11=mysqli_query($conn,$sqlmdqq11);
      if($resmdqq11)
      {
        
        
              $sqlbf="UPDATE befor_tadqeq set au_flag='1' where ginid='$gensol[$i]'";
      $resbf=mysqli_query($conn,$sqlbf);
      if($resbf)
      {
        
        
        
      } 
        
        
        
      }
       }
       
    }


}
else
{
    
      echo '<script >
                window.location.href="login.php";
                </script>';
    
}

?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.rtl.min.css" />
    <!--<link rel="stylesheet" href="assets/css/datatable.min.css">-->
    <link rel="stylesheet" href="assets/css/shettlogin.css" />
    <link rel="stylesheet" href="assets/css/styles.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <title>نظام التدقيق</title>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <div class="navbar-nav ml-auto">
                <a class="navbar-brand mx-0 mx-sm-2" href="#">
                    <img src="assets/images/fpsc.png" alt="Logo" width="80" height="74" class="d-inline-block align-text-top my-1 brand-1" />
                    <img src="assets/images/MIN.png" alt="Logo" width="200" height="78" class="d-inline-block align-text-top brand-2" />
                </a>
            </div>
            <div class="d-sm-flex d-hidden-sm navbar-nav text-nav">
                <div class="container">
                    <div class="row d-flex align-items-center  ">
                        <h2 class="fw-bold">لجنة التدقيق</h2>
                    </div>

                </div>
            </div>
        </div>
    </nav>

    <main>
        <div class="nav head w-100 d-flex px-2 py-1 align-items-center">
            <div class="w-25 d-flex align-items-center ">
                <div class="info ms-3 align-items-center">
                    <p class="m-0 p-0">الرئيسيية</p>
                </div>
                <div class="info ms-3 align-items-center d-flex">
                    <p class="m-0 p-0">المصادقة</p>
                </div>
            </div>


            <div class="dropdown">
                <a class="btn  btn-secondary dropdown-toggle h-100" href="#" role="a href=""" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-user"></i>
                    حوراء عبد الكريم جاسم
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="logout.php">تسجيل الخروج</a></li>

                </ul>
            </div>
        </div>

        <div class="container-fluid my-3 mx-0">
            <div class="row px-1">
                <div class="col-2 border border-2 pt-1">
                    <div class="row ">

                        <div class="col-md-12 col-12 d-flex flex-column mb-2">
                            <label for="work-gov" class="form-label fw-bold">الشهادة</label>
                            <select class="form-select" aria-label="Default select example" id="certif" name="certif">
                                <option value="" selected disabled>اختر من فضلك</option>
                                <option>دكتوراه</option>
                                <option>ماجستير</option>
                                <option>دبلوم عالي</option>
                                <option>بكالوريوس</option>
                                <option>دبلوم</option>

                            </select>
                        </div>
                        <?php
                        $sql = "SELECT * FROM specialization_list ";
                        $res = mysqli_query($conn, $sql);
                        ?>
                        <div class="col-md-6 col-lg-12">
                            <label for="validationServer04" class="form-label">الاختصاص</label>
                            <select class="form-select" id="spech" name="spech" aria-describedby="validationServer04Feedback">
                                <option value="" selected disabled>اختر من فضلك</option>
                                <?php
                                while ($row = mysqli_fetch_assoc($res)) {
                                ?>
                                    <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-12 col-12 d-flex flex-column mb-2">
                            <label for="work-gov" class="form-label fw-bold">القناة</label>
                            <select class="form-select" aria-label="Default select example" id="channel" name="channel">
                                <option value="" selected disabled>اختر من فضلك</option>
                                <?php
                                $ch = "SELECT * FROM channels ";
                                $rech = mysqli_query($conn, $ch);
                                while ($rowchannel = mysqli_fetch_assoc($rech)) {
                                ?>
                                    <option value="<?php echo $rowchannel['ch_name']; ?>">
                                        <?php echo $rowchannel['ch_name']; ?></option>

                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-12 col-12 d-flex flex-column mb-2">
                            <label for="work-gov" class="form-label fw-bold">المحافظة</label>
                            <select class="form-select" aria-label="Default select example" id="gov" name="gov">
                                <option value="" selected disabled>اختر من فضلك</option> <?php
                                                                                            $ch = "SELECT * FROM governerate ";
                                                                                            $rech = mysqli_query($conn, $ch);
                                                                                            while ($rowchannel = mysqli_fetch_assoc($rech)) {
                                                                                            ?>

                                    <option value="<?php echo $rowchannel['gov_name']; ?>">
                                        <?php echo $rowchannel['gov_name']; ?></option>

                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-12 col-12 d-flex justify-content-center mb-2">
                            <input type="button" name="" id="updateButton" class="btn btn-primary w-100" value="بحث" />
                        </div>
                        <!-- <div class="col-md-12 col-12 d-flex flex-column mb-2">
                                <label for="work-gov" class="form-label fw-bold">حالة اللجنة الاولى</label>
                                <select class="form-select" aria-label="Default select example" id="work-gov" name="" required>

                                    <option value="0">مقبولة</option>
                                    <option value="1">مرفوضة</option>
                                </select>
                            </div>
                            
                             <div class="col-md-12 col-12 d-flex flex-column mb-2">
                            <label for="work-gov" class="form-label fw-bold">حالة اللجنة الثانية</label>
                            <select class="form-select" aria-label="Default select example" id="work-gov" name=""
                                required>
                                <option disabled selected>اختر</option>
                                <option value="0">ghh</option>
                                <option value="1"> لا</option>
                            </select>
                        </div>
                        <div class="col-md-12 col-12 d-flex flex-column mb-2">
                            <label for="work-gov" class="form-label fw-bold">حالة العائد - اللجنة الاولى</label>
                            <select class="form-select" aria-label="Default select example" id="work-gov" name=""
                                required>
                                <option disabled selected>اختر</option>
                                <option value="0">ghh</option>
                                <option value="1"> لا</option>
                            </select>
                        </div>
                        <div class="col-md-12 col-12 d-flex flex-column mb-2">
                            <label for="work-gov" class="form-label fw-bold">حالة العائد - اللجنة الثانية</label>
                            <select class="form-select" aria-label="Default select example" id="work-gov" name=""
                                required>
                                <option disabled selected>اختر</option>
                                <option value="0">ghh</option>
                                <option value="1"> لا</option>
                            </select>
                        </div>-->

                    </div>
                </div>
                <!-------------------------------TABS------------------------------------------------------------------>
                <div class="col-10">

                    <ul class="nav nav-tabs" id="myTabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active " id="tab1" data-bs-toggle="tab" href="#content1" role="tab" aria-controls="content1" aria-selected="true"> الكل (<?php echo  $getall ?>) </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  " id="tab2" data-bs-toggle="tab" href="#content2" role="tab" aria-controls="content2" aria-selected="true"> قيد التدقيق (<?php echo  $getcount ?>) </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " id="tab3" data-bs-toggle="tab" href="#content3" role="tab" aria-controls="content3" aria-selected="false">مقبولة (<?php echo  $getcount2 ?>)</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " id="tab4" data-bs-toggle="tab" href="#content4" role="tab" aria-controls="content4" aria-selected="false">مرفوضة (<?php echo  $getcount3 ?>)</a>
                        </li>
                    </ul>

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade w-100 m-0 p-0 active show  mt-2" id="content1" role="tabpanel" aria-labelledby="tab1">
                            <button type="button" class="btn btn-primary mb-2" id="myButton" data-bs-toggle="modal" data-bs-target="#Modal" disabled>
                                توزيع</button>
                            <table class="table table1 border-2 table-responsive text-center w-100" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="form-check">
                                                <input type="checkbox" id="headerCheckbox" onchange="handleCheckboxChange()" />
                                            </div>
                                        </th>
                                        <th class="">رقم الأستمارة</th>
                                        <th>رقم الأستمارة</th>
                                        <th>الدرجة التفاضلية من 65% </th>
                                        <th>الشهادة</th>
                                        <th>الأختصاص</th>
                                        <th>القناة</th>
                                        <th>المحافظة</th>

                                    </tr>
                                </thead>
                                <tbody>
                                  
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade w-100 m-0 p-0   mt-2" id="content2" role="tabpanel" aria-labelledby="tab2">
                            <table class="table table1 border-2 table-responsive text-center w-100">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="form-check">
                                                <input type="checkbox" id="" />
                                            </div>
                                        </th>
                                        <th>رقم الأستمارة</th>
                                        <th>المحافظة</th>
                                        >
                                        <th>الدرجة التفاضلية من 65% </th>
                                    
                                        <th>اسم المدقق</th>
                                    </tr>
                                </thead>

                                <tbody> <?php

                                        while ($row = $resusertdq->fetch_assoc()) {



                                        ?>
                                        <tr>

                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" class="" />

                                                </div>
                                            </td>


                                            <td><?php echo $row['tdqeq_id'] ?></td>
                                            <td><?php echo $row['governorate'] ?></td>
                                            <td><?php echo $row['degreebeforetadqee'] ?></td>
                                            
                                               <td><?php echo $row['checkername'] ?></td>

                                        </tr> <?php } ?>
                                </tbody>

                            </table>

                        </div>
                        <div class="tab-pane fade w-100 m-0 p-0   mt-2" id="content3" role="tabpanel" aria-labelledby="tab3">
                            <div class="container-fluid ">
                                <table class="table table1 border-2 table-responsive text-center w-100">

                                    <thead>
                                        <tr>
                                            <th>
                                                <div class="form-check">
                                                    <input type="checkbox" id="" />
                                                </div>
                                            </th>
                                            <th>رقم الأستمارة</th>
                                             <th>اسم المدقق </th>
                                            <th>المحافظة</th>
                                            <th>الدرجة التفاضلية من 65% </th>
                                            <th>الدرجة التفاضلية بعد التقييم </th>
                                            <th>حالة اللجنة الاولى / السبب / الملاحظات</th>
                                        </tr>
                                    </thead>

                                    <tbody> <?php

                                            while ($row2 = $resusertdq2->fetch_assoc()) {
                                            ?>
                                            <tr>

                                                <td>
                                                    <div class="form-check ">
                                                        <input type="checkbox" class="" />

                                                    </div>
                                                </td>
                                                <td><?php echo $row2['tdqeq_id'] ?></td>
                                                 <td><?php echo $row2['checkername'] ?></td>
                                                <td><?php echo $row2['governorate'] ?></td>
                                                <td><?php echo $row2['degreebeforetadqee'] ?></td>
                                                <td><?php echo $row2['degreeaftercheck'] ?></td>
                                                <td><?php echo $row2['Accept'] . "/" . $row2['reson'] . "/" . $row2['notechker'] ?></td>
                                            </tr> <?php } ?>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade mt-2" id="content4" role="tabpanel" aria-labelledby="tab4">
                            <div class="container-fluid">
                                <table class="table table1 border-2 table-responsive text-center w-100">
                                    <thead>
                                        <tr>
                                            <th>
                                                <div class="form-check">
                                                    <input type="checkbox" id="" />
                                                </div>
                                            </th>
                                            <th>رقم الأستمارة</th>
                                             <th>اسم المدقق</th> </th>
                                            <th>المحافظة</th>
                                            <th>الدرجة التفاضلية من 65% </th>
                                            <th>الدرجة التفاضلية بعد التقييم </th>
                                            <th>حالة اللجنة الاولى / السبب / الملاحظات</th>
                                        </tr>
                                    </thead>

                                    <tbody><?php

                                            while ($row3 = $resusertdq3->fetch_assoc()) {



                                            ?>
                                            <tr>

                                                <td>
                                                    <div class="form-check">
                                                        <input type="checkbox" class="" />

                                                    </div>
                                                </td>


                                                   <td><?php echo $row3['tdqeq_id'] ?></td>
                                                 <td><?php echo $row3['checkername'] ?></td>
                                                <td><?php echo $row3['governorate'] ?></td>
                                                <td><?php echo $row3['degreebeforetadqee'] ?></td>
                                                <td><?php echo $row3['degreeaftercheck'] ?></td>
                                                <td><?php echo $row3['Accept'] . "/" . $row3['reson'] . "/" . $row3['notechker'] ?></td>

                                            </tr><?php } ?>
                                    </tbody>

                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">المدققين</h1>
                            <button type="button" id="modal" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="" method="post">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="up18" class="form-label">اختر اسم المدقق<span class="redStar">*</span></label>
                                        <select class="form-select" aria-label="Default select example" name="checker" id="" required>
                                            <option disabled selected value="">اختر</option>
                                            <?php
                                            $ch = "SELECT * FROM checker where  ";
                                            $rech = mysqli_query($conn, $ch);
                                            while ($rowchannel = mysqli_fetch_assoc($rech)) {
                                            ?>
                                                <option value="<?php echo $rowchannel['checkid']; ?>">
                                                    <?php echo $rowchannel['checkername']; ?></option>
                                            <?php } ?>
                                        </select>
                                        
                                        <input type="hidden" id="selected-data" name="dataa" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
                                <button type="submit" class="btn btn-primary" name="tuzea">توزيع</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </main>

    <footer>
        <div class="footer-dark">
            <footer>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-md-3 item" style="float: right !important; text-align: center">
                            <a href="https://fpsc.gov.iq/">
                                <img alt="Brand" src="assets/images/fpsc.png" style="width: 100px" /> </a><br />

                        </div>

                        <div class="col-sm-6 col-md-2 item" style="float: right !important">
                            <h3>اعرف المزيد</h3>
                            <ul>
                                <li>
                                    <a href="https://fpsc.gov.iq/">الموقع الرسمي للمجلس</a>
                                </li>
                                <li>
                                    <a href="https://support.fpsc.gov.iq/">الدعم الفني لانظمة المجلس</a>
                                </li>
                                <li>
                                    <a href="https://www.facebook.com/FederalPublicServiceCouncil.iq">صفحة المجلس على
                                        الفيسبوك</a>
                                </li>
                                <li>
                                    <a href="https://support.fpsc.gov.iq/kb/index.php">الاسئلة الاكثر شيوعا</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-7 item text" style="float: right !important">
                            <h3>اهداف مجلس الخدمة العامة الاتحادي&nbsp;</h3>
                            <p>
                                ١- رفع مستوى الوظيفة العامة وتنمية وتطوير الخدمة العامة وإتاحة
                                الفرص المتساوية وضمان مبدأ المساواة للمؤهلين لإشغالها.
                                <br />٢- تخطيط شؤون الوظيفة العامة والرقابة والإشراف عليها.
                                <br />
                                ٣- تطوير الجهاز الإداري ، ورفع مستوى الهيكل الوظيفي للدولة
                                وتطوير كفاءة موظفي الخدمة العامة وتوفير الرعاية الاجتماعية
                                الملائمة لهم بالتنسيق مع الجهات المختصة.
                            </p>
                        </div>
                    </div>
                    <p class="copyright">مجلس الخدمة العامة الاتحادي&nbsp; © 2023</p>
                </div>
            </footer>
        </div>
    </footer>


    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>


    <script>
        $(document).ready(function() {
            $('.table').DataTable({
                language: {
                    "url": "//cdn.datatables.net/plug-ins/1.11.3/i18n/ar.json",

                    search: "",
                },

            });

        });
    </script>
    <script>
    function handleCheckboxChange() {
        var button = document.getElementById("myButton");
        var selectAll = document.getElementById('headerCheckbox');
        var selectRows = document.querySelectorAll('.rowCheckbox');
        var allChecked = true;
        selectRows.forEach((check) => {
            if (!check.checked) {
                allChecked = false;
            }
        });

        selectAll.checked = allChecked;
        button.disabled = !allChecked;
    
        selectRows.forEach(item=>{
        item.addEventListener('change', ()=>{
            if(item.checked){
                button.disabled = false;
            }else{
                button.disabled = true;
            }
        });
    });

    selectAll.onchange = () => {
        selectRows.forEach((row) => {
            row.checked = selectAll.checked;
            if (selectAll.checked) {
                button.disabled = false;
            } else {
                button.disabled = true;
            }
        });
    };
    }
</script>


    <script>
        $(document).ready(function() {
            // Function to update the table with selected options
       
            function updateTable() {
             
                var certif = $("#certif").val();
                var spech = $("#spech").val();
                var channel = $("#channel").val();
                var gov = $("#gov").val();
                var postData = {};
                if (certif !== '') {
                    postData.certif = certif;
                }
                if (spech !== '') {
                    postData.spech = spech;
                }
                if (channel !== '') {
                    postData.channel = channel;
                }
                if (gov !== '') {
                    postData.gov = gov;
                }
                // Make an Ajax request to the PHP script
                $.ajax({
    type: "POST",
    url: "update_table.php",
    data: postData,
    dataType: "json",
    success: function(data) {
        // Destroy the existing DataTable
        $("#dataTable").DataTable().destroy();

        // Update the table content with the received data
        var table = $("#dataTable").DataTable({
            data: data,
            columns: [
                {
                    data: null,
                    render: function(data, type, row) {
                        return '<input type="checkbox" class="rowCheckbox" data-genid="' + data.ginid + '">';
                    }
                },
                { data: "ginid" },
                { data: "tadqeq_id" },
                { data: "degree_befor" },
                { data: "certif" },
                { data: "spech" },
                { data: "channel" },
                { data: "gov" }
            ],
            columnDefs: [
        {
            targets: 1, // Column index for "ginid" column (zero-based index)
            visible: false
        }
    ]
        });

        // إضافة حدث onchange للصناديق المنشأة بواسطة Ajax
        $(".rowCheckbox").on("change", handleCheckboxChange);
        var model_ele = document.getElementById('Modal');
        
        model_ele.addEventListener('show.bs.modal', function(event) {
            const selectedDataField = document.getElementById("selected-data");
        var selectRows = document.querySelectorAll('.rowCheckbox');
            // Update the modal content with the data
           var array_of_genids = [];
    //var test = document.getElementById('test');
    selectRows.forEach(item => {
        if (item.checked) {
            array_of_genids.push(item.dataset.genid);
        }
                console.log(array_of_genids);
                //test.innerHTML = array_of_genids
                selectedDataField.value=array_of_genids;
                console.log(selectedDataField.value);
            });
        });
    },
    error: function(xhr, status, error) {
        alert("Error occurred while updating the table: " + error);
    }
});
            }

            // Attach the click event to the button
            $("#updateButton").click(function() {
                updateTable();
            });

            
    
        // open model myButton
      
    });
    </script>
</body>

</html>