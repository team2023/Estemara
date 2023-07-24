<?php
include 'config.php';
include 'genid.php';
include 'dgree.php';


if (!isset($_SESSION['SESSION_EMAIL'])) {
  header("Location: index.php");
  die();
}
$idgreat = $_SESSION['iduser'];
#echo $idgreat;
$sqlname = "SELECT * FROM personal_information WHERE user_id='$idgreat'";
$resultname = mysqli_query($conn, $sqlname);
if (mysqli_num_rows($resultname) === 1) {

  $sqlchkflg = "SELECT * FROM flag_forms WHERE user_id='$idgreat'";
  $resultchkflg = mysqli_query($conn, $sqlchkflg);
}


$sqlview = "SELECT users.id as usid,users.genid, personal_information.*,education_data.*,additional_info_courses.*,
    additional_info_alniqabat.* ,work_skills.* from users LEFT OUTER JOIN personal_information
    ON users.id=personal_information.user_id
    LEFT OUTER JOIN education_data ON
    users.id=education_data.user_id 
    LEFT OUTER JOIN additional_info_courses
    ON users.id=additional_info_courses.user_id
    LEFT OUTER JOIN additional_info_alniqabat
    ON users.id=additional_info_alniqabat.user_id
     LEFT OUTER JOIN work_skills ON
users.id=work_skills.user_id
WHERE  users.id ='$idgreat'";
$resview = mysqli_query($conn, $sqlview);
if (mysqli_num_rows($resview) === 1) {
}
$rowview = mysqli_fetch_assoc($resview);



if (isset($_POST['send'])) {
  #  echo"f";
  $tahad = $_POST['finel'];
  $genid = gen($idgreat);

  if ($tahad == "نعم") {
    $sqlupdatefinle = "UPDATE users SET tahad='$tahad' ,done0='1',genid='$genid' where id='$idgreat'";
    $resupdatefinle = mysqli_query($conn, $sqlupdatefinle);
    if ($resupdatefinle) {
      #   echo"dd";
      $sqladut = "SELECT * from modikk where gen_id='$genid'";
      $resadut = mysqli_query($conn, $sqladut);
      if (mysqli_num_rows($resadut) === 0) {
        #  echo"yes";
        $favarg = $rowview['fave'];
        $avarge = $rowview['average'];
        $yearg = $rowview['graduation_year'];
        $numchikd = gettotal($idgreat);
        $ifwork = $rowview['volunteer_work'];
        $dorat = Dorat($idgreat);
        $naqiba = Naqaba($idgreat);
        $marystat = $rowview['marital_status'];
        $alaila = $rowview['iieala'];
        $oldwork = old_work($idgreat);
        $curwork = curr_work($idgreat);
        $adeb = adabeaa($idgreat);


        if ($marystat == "اعزب") {
          $xmary = "0";
        } else {
          $xmary = "1";
        }


        $sqlinsertaudt = "INSERT INTO modikk(
         user_id,
         gen_id,
         checker_id,
         informition_id,
         f_avarage,
         avaragee,
         year_g,
         ifmaryy,
         num_of_child,
         alaila,
         work_or_not,
         old_work,
         cur_work,
         dorat,
         naqbat,
         adebba) VALUES   (
           '$idgreat',
           '$genid',
           '',
           '',
           '$favarg',
           '$avarge',
           '$yearg',
           '$xmary',
           '$numchikd',
           '$alaila',
           '$ifwork',
           '$oldwork',
           '$curwork',
           '$dorat',
           '$naqiba',
           '$adeb')";

        $resinsertadut = mysqli_query($conn, $sqlinsertaudt);

        if ($resinsertadut) {

          $sqldqid = "SELECT * from daqeqid where gen_id='$genid'";
          $resdqid = mysqli_query($conn, $sqldqid);
          if (mysqli_num_rows($resadut) === 0) {
            $id = $idgreat + 50;
            $newid = "1000" . strval($id);
            $fineltdqeqcode = $newid . mt_rand(100000, 999999);
            $tdqeqid = $fineltdqeqcode;
            $indqid = "INSERT INTO daqeqid (user_id, gen_id, tdqeq_id) VALUES ('$idgreat','$genid', '$tdqeqid')";

            $instdid = mysqli_query($conn, $indqid);
       
            if ($instdid) {
              $sqls = "SELECT users.id as usid, users.genid as ginid, personal_information.*, education_data.*, specialization_list.*, submission_channels.* ,channels.*
              FROM users
              LEFT OUTER JOIN personal_information ON users.id = personal_information.user_id
              LEFT OUTER JOIN education_data ON users.id = education_data.user_id
              LEFT OUTER JOIN submission_channels ON users.id = submission_channels.user_id
              LEFT OUTER JOIN specialization_list ON users.specialization = specialization_list.s_id
              LEFT OUTER JOIN channels ON channels.ch_id = submission_channels.channel_type
              WHERE users.id = '$idgreat'";
          
                    $resviews = mysqli_query($conn, $sqls);
                    if (mysqli_num_rows($resviews) > 0) {
                      $rowviews = mysqli_fetch_assoc($resviews);
                      $ginid = $rowviews['ginid'];
                      $degree = $rowviews['degreebeforetadqee'];
                      $cert = $rowviews['academic_achievement'];
                      $spech = $rowviews['name'];
                      $chann = $rowviews['ch_name'];
                      $gov = $rowviews['governorate'];
                      $s = "INSERT INTO befor_tadqeq (user_id, ginid,tadqeq_id, degree_befor, certif, spech, channel, gov,au_flag) 
               VALUES ('$idgreat','$ginid','$tdqeqid', '$degree', '$cert', '$spech', '$chann', '$gov','0')";
          
                      $ress = mysqli_query($conn, $s);
                if ($ress) {
                  $_SESSION['ok'] = "ok";
                  header("Location: finel.php");
                }
              }
            } else {
              echo mysqli_error($conn);
            }
          }
        } else
          echo "1حدث    الاستعلام: " . $conn->error;
      } else
        echo "no";
    }
  } else {
    echo '<script>alert("لا يمكن اتمام عملية تقديم بدون تاكيد التعهد")</script>';
  }
}





?>


<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.rtl.min.css" />
  <link rel="stylesheet" href="assets/vendor/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="assets/css/shettlogin.css" />
  <link rel="stylesheet" href="assets/css/styles.css" />
  <title>Document</title>
  <style>
    .btn-secondary {
      background: #6c757d;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <div class="navbar-nav ml-auto">
        <a class="navbar-brand mx-0 mx-sm-2" href="#">
          <img src="assets/images/fpsc.png" alt="Logo" width="80" height="74"
            class="d-inline-block align-text-top my-1 brand-1" />
          <img src="assets/images/MIN.png" alt="Logo" width="200" height="78"
            class="d-inline-block align-text-top brand-2" />
        </a>
      </div>
      <div class="d-sm-flex d-hidden-sm mb-4 navbar-nav text-nav">
        <div class="container">
          <div class="row nav-text-up fs-1-sm">
            <span class="create-user">استمارة التقديم</span>
          </div>
          <div class="row">
            <span class="nav-text-down w-100 text-center">للوظائف العامة لسنة 2023</span>
          </div>
        </div>
      </div>
    </div>
  </nav>
  <main>
    <div class="nav head w-100 d-flex px-2 ">
      <div class="info ms-3">
        <p>معلوماتي</p>
      </div>
      <div class="dropdown">
        <a class="btn  btn-secondary dropdown-toggle h-100" href="#" role="a href=""" data-bs-toggle="dropdown"
          aria-expanded="false">
          <i class="fa fa-user"></i>
          <?php
          $rowname = mysqli_fetch_assoc($resultname);
          if (mysqli_num_rows($resultchkflg) === 1) {
            $rowchkflg = mysqli_fetch_assoc($resultchkflg);
            $namepers1 = $rowname['first_name'] . ' ' . $rowname['second_name'] . ' ' . $rowname['third_name'];

            echo $namepers1;
          }
          ?>

        </a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="logout.php">تسجيل الخروج</a></li>

        </ul>
      </div>
    </div>
    <div class="container my-5">

      <div class="title d-flex  justify-content-center">
        <p class="text-danger fs-4 fw-bold">تعهد</p>
      </div>
      <div class="title d-flex  justify-content-center">
        <p>اني المتقدم للتعين اتعهد بصحة المعلومات التي ذكرتها ضمن استمارة التقديم على التعين واتحمل كافة
          التبعات القانوينة
          في حالة <br>
          عدم صحة المعلومات الواردة في الاستمارة من قبل المتقدم للتعين وترتب على هذه المعلومات تعينه في احدى
          المؤسسات الحكومية <br>سيتم اتخاذ كافة الاجراءات القانونية استنادا لاحكام المادة (48) من قانون اصول
          المحاكمات الجزائية رقم (23) لسنة 1971.</p>
      </div>




      <div class="title d-flex  justify-content-center">
        <h5>
          <p style="font-weight: bold fon;">متاكد من صحة المعلومات و الوثائق التي ارفقتها واتحمل كافة
            المسؤولية القانونية *</p>
          </h1>
      </div>

      <form action="" method="POST">
        <div class="title d-flex  justify-content-center">
          <div class="col-md-6 col-12 d-flex flex-column mb-2">

            <select class="form-select" aria-label="Default select example" name="finel" id="" required>
              <option selected disabled value=""> اختر من فضلك</option>
              <option value="نعم">نعم</option>
              <option value="لا">لا</option>

            </select>
          </div>

        </div>

        <div class=" d-flex justify-content-center mb-2">
          <button name="send" type="submit" class="btn btn-danger w-25">ارسال البيانات الى التدقيق</button>
        </div>
        <div class=" d-flex justify-content-center mb-2">
          <a href="mainpage.php" class="btn btn-danger w-25" style="background:red;border:none;">الرجوع الى
            الصفحة الرئيسية</a>
        </div>
      </form>


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
              <a href="http://www.cbi.iq/">
                <img alt="Brand" src="assets/images/tamk.png" style="width: 300px" /></a>
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
  <script src="assets/vendor/fontawesome/js/all.min.js"></script>
</body>

</html>

<?php




?>