<?php
include 'config.php';
//session_start();
if (!isset($_SESSION['csrf_token'])) {
  $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
//  echo $_SESSION['SESSION_EMAIL'];
//echo $mm;

$msg = "";
//$m=1;
//echo  $_SESSION['code'];
if (isset($_SESSION['code'])) {
  $id = $_SESSION['iduser'];
}
if (isset($_SESSION['code'])) {

  //echo "3";
  $msg = "<div class='alert alert-success'>تم تفعيل حسابك بنجاح يمكنك تسجيل دخول الان</div>";
}
if (isset($_POST['login']) && isset($_POST['csrf_token'])) {
  if ($_POST['csrf_token'] === $_SESSION['csrf_token']) {
    function verify_hcaptcha($response_token)
    {
      $secret_key = '0xb55C5858Bb80743f31A83FA18da5ec9d8555fEf6';
      $verify_url = 'https://hcaptcha.com/siteverify';

      $data = array(
        'secret' => $secret_key,
        'response' => $response_token
      );
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $verify_url);
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $response = curl_exec($ch);
      curl_close($ch);
      $result = json_decode($response, true);
      if ($result['success']) {
        // تم التحقق بنجاح، قم باتخاذ الإجراء المطلوب
        return true;
      } else {
        // فشل التحقق، يجب رفض الاستجابة
        return false;
      }
    }
    // استقبال الاستجابة المرسلة من النموذج
    $response_token = $_POST['h-captcha-response'];
    // التحقق باستخدام hCaptcha
    if (verify_hcaptcha($response_token)) {
      // الاستجابة صحيحة، قم باتخاذ الإجراء المطلوب
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $password = mysqli_real_escape_string($conn, md5($_POST['password']));
      $sql = "SELECT * FROM tempories WHERE email='{$email}' AND password ='{$password}'";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) === 1) {
        echo "1";
        $row = mysqli_fetch_assoc($result);
        $sqlget = "SELECT * FROM users WHERE email='{$email}' ";
        $resultget = mysqli_query($conn, $sqlget);
        if (mysqli_num_rows($resultget) === 1) {
          echo "2";
          $rowget = mysqli_fetch_assoc($resultget);
          $id = $rowget['id'];
          $_SESSION['iduser'] = $id;
    
          $sqlgetglag = "SELECT * from flag_forms where user_id='$id'";
          $resgetflag = mysqli_query($conn, $sqlgetglag);
          if (mysqli_num_rows($resgetflag) === 0) {
            echo "ok";
            $sqlflaginsert = "INSERT into flag_forms (user_id,personal_info_flag,address_flag
                ,workSkill_flag,education_data_flag,other_information_flag,files_flag,final_flag,created_at,
                updated_at,deleted_at) VALUES  ('$id','0','0','0','0','0','0','0',now(),now(),now())";
            $resflag = mysqli_query($conn, $sqlflaginsert);
            if ($resflag) {
             
            } else {
              echo "cant ins flag" . mysqli_error($conn);
            }
            $sqlfilechek = "SELECT * from users where email='{$email}'";
            $resfilechek = mysqli_query($conn, $sqlfilechek);
            if (mysqli_num_rows($resfilechek) === 1) {
              $rowfile = mysqli_fetch_assoc($resfilechek);
              if ($rowfile['national_card_flag'] == "1") {
                $sqldocinsert = "INSERT into deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) VALUES 
                           ('$id','SAKAN','0','',now(),now())";
                $resdoc = mysqli_query($conn, $sqldocinsert);
                if ($resdoc) {
                  $sqldocinsert2 = "INSERT into deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at)
                             VALUES ('$id','image','0','',now(),now())";
                  $resdoc2 = mysqli_query($conn, $sqldocinsert2);
                  if ($resdoc2) {
                    $sqldocinsert3 = "INSERT into deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at)
                              VALUES ('$id','document','0','',now(),now())";
                    $resdoc3 = mysqli_query($conn, $sqldocinsert3);
                    if ($resdoc3) {
                      $sqldocinsert4 = "INSERT into deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at)
                               VALUES ('$id','card','0','',now(),now())";
                      $resdoc4 = mysqli_query($conn, $sqldocinsert4);
                      if ($resdoc4) {
                      }
                    }
                  }
                }
              } else if ($rowfile['national_card_flag'] == "2") {
                $sqldocinsert = "INSERT into deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at)
                             VALUES ('$id','SAKAN','0','',now(),now())";
                $resdoc = mysqli_query($conn, $sqldocinsert);
                if ($resdoc) {
                  $sqldocinsert2 = "INSERT into deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at)
                               VALUES ('$id','image','0','',now(),now())";
                  $resdoc2 = mysqli_query($conn, $sqldocinsert2);
                  if ($resdoc2) {
                    $sqldocinsert3 = "INSERT into deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at)
                                VALUES ('$id','document','0','',now(),now())";
                    $resdoc3 = mysqli_query($conn, $sqldocinsert3);
                    if ($resdoc3) {
                      $sqldocinsert4 = "INSERT into deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at)
                                 VALUES ('$id','JINSEA','0','',now(),now())";
                      $resdoc4 = mysqli_query($conn, $sqldocinsert4);
                      if ($resdoc4) {
                        $sqldocinsert5 = "INSERT into deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at)
                                   VALUES ('$id','SHAHADA','0','',now(),now())";
                        $resdoc5 = mysqli_query($conn, $sqldocinsert5);
                        if ($resdoc5) {
                        }
                      }
                    }
                  }
                }
              }
            }
          } else {
            echo "noo";
          }
          if (empty($row['emai_validation_code'])) {
            $sql77 = "SELECT * FROM personal_information WHERE email='{$email}'";
            $result77 = mysqli_query($conn, $sql77);
            if (mysqli_num_rows($result77) === 0) {
              echo "yes";
              $fname = $row['firstname'];
              $sname = $row['secondname'];
              $thname = $row['secondname'];
              $fourthname = $row['fourthname'];
              $national_card_flag = $row['national_card_flag'];
              $nationality_card_number = $row['nationality_card_number'];
              $number_jensi = $row['num_jensai'];
              $phone = $row['phone_number'];
              $iraqi = "العراقية";
              $sql2 = "INSERT INTO personal_information (user_id,email,first_name,second_name,third_name,fourth_name,sure_name,mother_firstname,mother_secondname,mother_thirdname,phone_number,nationality,nationalism,religion,gender,brithday_date,place_birth,national_card_flag,nationality_card_number,family_number,national_card_date,civil_card_city,civil_card_number,civil_status_ID_record,
              civil_status_ID_sheet_number,civil_date_card,nationality_certificate_number,marital_status,have_child,number_child_less18,number_child_more18,child18_first,child18_first_reason,child18_second,child18_second_reason,child18_third,
              child18_third_reason,child18_fourth,child18_fourth_reason,total_numchild,family_breadwinner_flag,personal_information_flag,housing_id_number,information_Office,governorate,region,neighborhood,address1,address_flag,exam_degree,degreebeforetadqee,average,degreeaftertadqee,finaldegree,remember_token,iieala,silat_alqaraba,created_at,updated_at,deleted_at
                    )  VALUES ('$id','$email', '$fname', '$sname', '$thname','$fourthname',
                    '','','','', '$phone','$iraqi','','','','','','$national_card_flag', '$nationality_card_number',
                    '','','','$number_jensi','','','','','','','0','0','','','','','','','','','0','0','0','','','','','','','0','0.00','','0.00','0.00','0.00','',NULL,NULL,now(),now(),now())";
              $result2 = mysqli_query($conn, $sql2);
    
              if ($result2) {
                $selper="SELECT * from personal_information where user_id='$id'";
                $re = mysqli_query($conn, $selper);
    
      if (mysqli_num_rows($re) === 1) {
        $rowch = mysqli_fetch_assoc($re);
        $p_id=$rowch['id'];
                $inschannel="INSERT INTO submission_channels (user_id,personalInfo_id,channel_type,martyr_adjective,
              martyr_name,martyr_mother_name,prisoner_name,prisoner_mother_name,raqm_alqarar,tawsif_halat_alqaraba
              ,created_at,updated_at) values ('$id','$p_id','1','','','','','','','',now(),now())";
              $reschannel=mysqli_query($conn,$inschannel);
                $_SESSION['SESSION_EMAIL'] = $email;
                echo '<script >
                    window.location.href="mainpage.php";
                    </script>';
                //header("Location: mainpage.php");
              } }else {
                echo mysqli_error($conn);
              }
            } else {
    
              if ($rowget['done0'] == "0") {
                $_SESSION['SESSION_EMAIL'] = $email;
                echo '<script >
               window.location.href="mainpage.php";
               </script>';
                // header("Location: mainpage.php");
              } else {
                $_SESSION['SESSION_EMAIL'] = $email;
                echo '<script >
                 window.location.href="finel.php";
                 </script>';
                // header("Location: finel.php");
              }
            }
          } else {
            $msg = "<div class='alert alert-info'>يجب تفعيل الحساب اولا عن طريق رابط في البريد الالكتروني</div>";
          }
        } else {
          $msg = "<div class='alert alert-danger'>الايميل او الباسورد غير صحيح</div>";
        }
      }
    }
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
  <link rel="stylesheet" href="assets/css/shettlogin.css" />
  <link rel="stylesheet" href="assets/css/styles.css" />
  <script src="https://hcaptcha.com/1/api.js" async defer></script>
  <title>Document</title>
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
    <div class="container my-5">
      <div class="row">
        <div class="col"></div>
        <div class="col-12 col-sm-10 col-md-8 col-lg-6">
          <div class="card">
            <div class="card-header text-center">الدخول الى النظام</div>
            <div class="card-body">
              <div class="bg-success-subtle">
                <p class="card-text bg-success-subtle p-2 text-center">
                  اهلا وسهلا بك في نظام التعيينات, قم بإنشاء حساب جديد
                  <br>
                  <?php echo $msg; ?>
                </p>

                <a class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover new-user my-2 d-inline-block" href="register.php">
                  انشاء حساب
                </a>
              </div>

              <form method="POST" action="">
                <div class="mb-3">
                  <label for="InputEmail1" class="form-label">البريد الالكتروني</label>
                  <input type="email" name="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp" required />
                </div>
                <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                <div class="mb-3">
                  <label for="InputPassword1" class="form-label">كلمة المرور</label>
                  <input type="password" name="password" class="form-control" id="InputPassword1" required />
                </div>
                <div class="mb-3 form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1" />
                  <label class="form-check-label" for="exampleCheck1">تذكرني</label>
                </div>
                <div class="mx-2 d-flex justify-content-center">
                  <div class="h-captcha" data-sitekey="cc8c8d94-0c67-4c4c-bf73-6f427eb59d55"></div>
                </div>

                <button name="login" type="submit" class="btn btn-primary py-2 px-3">
                  تسجيل الدخول
                </button>
              </form>
            </div>
          </div>
        </div>
        <div class="col"></div>
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
                  <a href="https://www.facebook.com/FederalPublicServiceCouncil.iq">صفحة المجلس على الفيسبوك</a>
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
</body>

</html>