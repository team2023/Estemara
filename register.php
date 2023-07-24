<!-- Code by Brave Coder - https://youtube.com/BraveCoder -->

<?php
session_start();
 if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
include 'config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require  'mail/Exception.php';
require 'mail/PHPMailer.php';
require  'mail/SMTP.php';

/*if (isset($_SESSION['SESSION_EMAIL'])) {
    header("Location: welcome.php");
    die();
}
*/


$msg = "";

if (isset($_POST['submit']) && isset($_POST['csrf_token'])) {
    if ($_POST['csrf_token'] === $_SESSION['csrf_token']) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $fname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $sname = mysqli_real_escape_string($conn, $_POST['secondname']);
    $thname = mysqli_real_escape_string($conn, $_POST['thirdname']);
    $fourname = mysqli_real_escape_string($conn, $_POST['forthname']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $idtypeofcard = mysqli_real_escape_string($conn, $_POST['id-type']);
    $numcardwatne = mysqli_real_escape_string($conn, $_POST['id-number-watne']);
    $numcardjnsi = mysqli_real_escape_string($conn, $_POST['id-number-jens']);
    $spcsh = mysqli_real_escape_string($conn, $_POST['spch']);
    $password = mysqli_real_escape_string($conn, md5($_POST['password1']));
    $confirm_password = mysqli_real_escape_string($conn, md5($_POST['password2']));
    // $code = mysqli_real_escape_string($conn, md5(rand()));
    $code = mt_rand(100000, 999999);

    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tempories WHERE email='{$email}'")) > 0) {
        $msg = "<div class='alert alert-danger'>{$email} - الايميل المدخل مستخدم بالفعل.</div>";
    } else {
        if ($password === $confirm_password) {
            $sql = "INSERT INTO tempories (firstname,secondname,thridname,fourthname,email,email_verified_at,emai_validation_code,email_flag,phone_number,password,specialization,national_card_flag,nationality_card_number,num_jensai,created_at,updated_at)  VALUES ( '$fname', '$sname', '$thname', '$fourname','$email',now(),'$code','0','$phone','$password', '$spcsh','$idtypeofcard','$numcardwatne','$numcardjnsi', now(), now())";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo "<div /*style='display: none;*/'>";
                //Create an instance; passing `true` enables exceptions
                $mail = new PHPMailer(true);

                try {
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->Port = 587;
                    $mail->SMTPAuth = true;
                    $mail->Username = 'mustafa.love131@gmail.com';
                    $mail->Password = 'mzincutxlinzgaba';
                    $mail->SMTPSecure = 'tls';
                    //Recipients
                    $mail->setFrom('mustafa.love131@gmail.com');
                    $mail->addAddress($email);

                    //Content
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = 'no reply';
                    $mail->Body    = '     <b>قم بأدخال الكود لتفعيل حسابك </b>' . $code;

                    $_SESSION['code'] = $code;
                    $_SESSION['SESSION_EMAIL'] = $email;
                    $mail->send();
                    echo 'Message has been sent';
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
                echo "</div>";
                echo '<script >
                window.location.href="verify.php";
                </script>';
                // $msg = "<div class='alert alert-info'>تم ارسال كود التفعيل عبر الايميل الخاص بك رجاءا قم بالتحقق من البريد الخاص بك</div>";
            } else {
                $msg = "<div class='alert alert-danger'>Something wrong went.</div>";
                echo mysqli_error($conn);
            }
        } else {
            $msg = "<div class='alert alert-danger'>تحقق من تطابق كلمة السر وتاكيد كلمة السر</div>";
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
    <title>Document</title>
    <style>
        .error-message {
            color: red;

        }
    </style>
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
        <?php echo $msg; ?>
        <div class="containter my-5">
            <div class="row">
                <div class="col"></div>
                <div class="col-10">
                    <div class="card">
                        <h5 class="card-header text-center">انشاء حساب</h5>
                        <div class="card-body">
                            <form action="" method="POST" class="row g-3">
                                <div class="col-md-6 col-lg-4">
                                    <label for="Email" class="form-label">البريد الالكتروني</label>

                                    <input type="email" class="form-control" id="Email" oninput="validateEmail()" name="email" aria-describedby="" required />
                                    <span id="email-error" class="error-message" style="display: none;">
                                        الرجاء ادخال بريد الكتروني صحيح.</span>

                                </div>
                                <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                                <div class="col-md-6 col-lg-4">
                                    <label for="passowrd" class="form-label">كلمة المرور</label>
                                    <input type="password" name="password1" class="form-control" id="passowrd" minlength="6" oninput="validatePassword()" required />
                                    <span id="passowrd-error" class="error-message" style="display: none;">يرجى إدخال كلمة المرور (6 أحرف على الأقل)</span>

                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <label for="confirem_passowrd" class="form-label">تاكيد كلمة المرور</label>
                                    <input type="password" oninput="validatecPassword()" name="password2" class="form-control" id="confirem_passowrd" minlength="6" required />
                                    <span id="conpassowrd-error" class="error-message" style="display: none;">(كلمة المرور و تأكيد كلمة المرور غير متطابقتين)</span>
                                </div>

                                <div class="col-md-6 col-lg-3">
                                    <label for="validationServerName" class="form-label">الاسم</label>
                                    <input type="text" pattern="^[ء-ي]+(\s[ء-ي]+)*$" title="يرجى إدخال الأحرف العربية فقط" name="firstname" class="form-control" id="Ar_name" oninput="validateArabicInput(this, document.getElementById('Arname_error'))" required />
                                    <span id="Arname_error" class="error-message" style="display: none;"> يرجى إدخال الأحرف العربية فقط و بدون فراغات"</span>
                                </div>
                                <div class="col-md-6 col-lg-3">
                                    <label for="validationServerSecondName" class="form-label">اسم الاب</label>
                                    <input type="text" name="secondname" class="form-control" id="sename" oninput="validateArabicInput(this, document.getElementById('Arsename_error'))" pattern="^[ء-ي]+(\s[ء-ي]+)*$" title="يرجى إدخال الأحرف العربية فقط" required />
                                    <span id="Arsename_error" class="error-message" style="display: none;"> يرجى إدخال الأحرف العربية فقط و بدون فراغات"</span>
                                </div>
                                <div class="col-md-6 col-lg-3">
                                    <label for="validationServerThirdName" class="form-label">اسم الجد</label>
                                    <input type="text" name="thirdname" class="form-control" id="thname" oninput="validateArabicInput(this, document.getElementById('Arthname_error'))" pattern="^[ء-ي]+(\s[ء-ي]+)*$" title="يرجى إدخال الأحرف العربية فقط" required />
                                    <span id="Arthname_error" class="error-message" style="display: none;"> يرجى إدخال الأحرف العربية فقط و بدون فراغات"</span>
                                </div>
                                <div class="col-md-6 col-lg-3">
                                    <label for="validationServerforthName" class="form-label">الاسم الرابع</label>
                                    <input type="text" name="forthname" class="form-control" id="fname" oninput="validateArabicInput(this, document.getElementById('Arfname_error'))" pattern="^[ء-ي]+(\s[ء-ي]+)*$" title="يرجى إدخال الأحرف العربية فقط" required />
                                    <span id="Arfname_error" class="error-message" style="display: none;"> يرجى إدخال الأحرف العربية فقط و بدون فراغات"</span>
                                </div>

                                <div class="col-md-6 col-lg-4">
                                    <label for="validationServer03" class="form-label">رقم الهاتف</label>
                                    <input type="tel" pattern="[0-9]{11,}" name="phone" class="form-control" id="validationServer03" aria-describedby="validationServer03Feedback"    required/>
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        الرجاء ادخال رقم هاتف صحيح.
                                    </div>
                                </div>
                                <?php
                                $sql = "SELECT * FROM specialization_list ";
                                $res = mysqli_query($conn, $sql);
                                ?>
                                <div class="col-md-6 col-lg-4">
                                    <label for="validationServer04" class="form-label">الاختصاص</label>
                                    <select class="form-select" id="validationServer04" name="spch" aria-describedby="validationServer04Feedback" required>
                                        <option selected disabled value="">اختر اختصاص</option>
                                        <?php
                                        while ($row = mysqli_fetch_assoc($res)) {
                                        ?>
                                            <option value="<?php echo $row['s_id']; ?>"><?php echo $row['name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <label for="id-type" class="form-label">هل تمتلك بطاقة وطنية ؟<span class="redStar">*</span></label>
                                    <select class="form-select" aria-label="Default select example" id="id-type" name="id-type" required>
                                        <option disabled selected>اختر</option>
                                        <option value="1">نعم</option>
                                        <option value="2">لا</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4 div2 d-none">
                                    <label for="id-number" class="form-label">رقم البطاقة الوطنية<span class="redStar">*</span></label>
                                    <input type="number" class="form-control" id="id-number" name="id-number-watne" />
                                </div>
                                <div class="col-12 col-md-6 col-lg-6 col-xl-4 div4 d-none">
                                    <label for="id-no-number" class="form-label">رقم هوية الاحوال المدنية<span class="redStar">*</span></label>
                                    <input type="number" class="form-control" id="id-no-number" name="id-number-jens" />
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary" name="submit" type="Submit">تاكيد</button>
                                </div>
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
        </div>
    </footer>
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
        const selectOption = document.getElementById("id-type");
        let div2 = document.querySelector(".div2");
        let div4 = document.querySelector(".div4");

        function handleOptionChange() {
            let selectedOption = selectOption.value;
            if (selectedOption === "1") {
                div2.classList.remove("d-none");
                div2.setAttribute('reqiured', '');
                div4.classList.add("d-none");
                div4.removeAttribute('reqiured', '');
            } else if (selectedOption === "2") {
                div2.classList.add("d-none");
                div2.removeAttribute('reqiured', '');
                div4.classList.remove("d-none");
                div4.setAttribute('reqiured', '');
            }
        }
        selectOption.addEventListener("change", handleOptionChange);
    </script>
    <script src="assets/js/validate.js"></script>
</body>

</html>