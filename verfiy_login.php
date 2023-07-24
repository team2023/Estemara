<?php
include ('config.php');
$m=$_SESSION['SESSION_EMAIL'];
//echo $m;
if(isset($_POST['submit'])){
    $code=$_POST['code'];
    $sql="SELECT * from tempories WHERE email='$m'";
    $res=mysqli_query($conn,$sql);
    if(mysqli_num_rows($res) == 1)
    {
       // echo $_SESSION['SESSION_EMAIL'];
        $row=mysqli_fetch_assoc($res);
        if( $code=$row['emai_validation_code']){
              
              $mm=$row['id'];
               $_SESSION['iduser']=$row['id'];
               if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tempories WHERE id='$mm'")) >= 0) {
                $sqlgetinfo="SELECT * FROM tempories WHERE id='$mm'";
                $res=mysqli_query($conn, $sqlgetinfo);
                if (mysqli_num_rows($res) === 1) {
                    //echo"0";
               
                   $rowusere = mysqli_fetch_assoc($res);
                   $name=$rowusere['firstname'] . ' '.$rowusere['secondname'].' '.$rowusere['thridname'].' '.$rowusere['fourthname'];
                   $email=$rowusere['email'];
                   $emailflag="1";
                   $pass=$rowusere['password'];
                   $specialization=$rowusere['specialization'];
                   $national_card_flag=$rowusere['national_card_flag'];
                   $nationality_card_number=$rowusere['nationality_card_number'];
                   $number_jensi=$rowusere['num_jensai'];
                
                $query = mysqli_query($conn, "UPDATE tempories SET emai_validation_code='',email_flag='1',updated_at=now() WHERE id='$mm'");
                if ($query) {
                  //echo "1.1y";
                $sqluser = "INSERT INTO users(name,email,email_flag,password,specialization,national_card_flag,nationality_card_number,num_jensai,tahad,genid,done0,done1,remember_token,created_at,updated_at,deleted_at)  VALUES ('$name','$email','$emailflag','$pass',' $specialization','$national_card_flag', '$nationality_card_number','$number_jensi','','','0','0','',now(),now(),now())";
                 $resuser=mysqli_query($conn, $sqluser);
                 if($resuser)
                 {
                  $_SESSION['code']="1";
                echo'<script >
            window.location.href="index.php";
            </script>';}
            else{

            }
        }}}}
       else{
        echo "الكود غير مطابق";
       }

    }
    else
    echo "no select";
        
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
        <div class="containter my-5">
            <div class="row">
                <div class="col"></div>
                <div class="col-10">
                    <div class="card">
                        <h5 class="card-header text-center">تفعيل الحساب  </h5>
                        <div class="card-body">
                            <form action="" method="POST" class="row g-3">
                                <div class="col-md-6 col-lg-4">
                                    <label for="validationServerEmail" class="form-label">ادخل رمز التفعيل </label>
                                    <div class="input-group has-validation">
                                        <input type="number" class="form-control" id="validationServerEmail" name="code"
                                            aria-describedby="inputGroupPrepend3 validationServerEmailFeedback"
                                            required />
                                        
                                    </div>
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
   

</body>

</html>