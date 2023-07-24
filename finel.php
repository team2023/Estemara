<?php
include 'config.php';
include 'genid.php';
include 'dgree.php';

    /*if (!isset($_SESSION['SESSION_EMAIL'])) {
        header("Location: index.php");
        die();
    }*/
    $idgreat= $_SESSION['iduser'];

    $sqlname="SELECT * FROM personal_information WHERE user_id='$idgreat'";
    $resultname = mysqli_query($conn, $sqlname);
    if (mysqli_num_rows($resultname) === 1) {
    
    }
    $sqlgen="SELECT * FROM users WHERE id='$idgreat'";
    $resultgen = mysqli_query($conn, $sqlgen);
    if (mysqli_num_rows($resultgen) === 1) {
    
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
      .btn-secondary{
        background: #6c757d;
      }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <div class="navbar-nav ml-auto">
          <a class="navbar-brand mx-0 mx-sm-2" href="#">
            <img
              src="assets/images/fpsc.png"
              alt="Logo"
              width="80"
              height="74"
              class="d-inline-block align-text-top my-1 brand-1"
            />
            <img
              src="assets/images/MIN.png"
              alt="Logo"
              width="200"
              height="78"
              class="d-inline-block align-text-top brand-2"
            />
          </a>
        </div>
        <div class="d-sm-flex d-hidden-sm mb-4 navbar-nav text-nav">
          <div class="container">
            <div class="row nav-text-up fs-1-sm">
              <span class="create-user">استمارة التقديم</span>
            </div>
            <div class="row">
              <span class="nav-text-down w-100 text-center"
                >للوظائف العامة لسنة 2023</span
              >
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
                <a class="btn  btn-secondary dropdown-toggle h-100" href="#" role="a href=""" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fa fa-user"></i>
                  <?php 
                  $rowname = mysqli_fetch_assoc($resultname); 
                  
                      $namepers1 = $rowname['first_name'] .' '.$rowname['second_name'].' '.$rowname['third_name'];  
                     
                      echo $namepers1;
                
                      ?>
                      
                                  <?php
            if($rowname['degreebeforetadqee']=='')
            {
$dgreefinel=gettotal($idgreat) + chekmarry($idgreat) + year($idgreat) + avarage($idgreat) + workif($idgreat) + Dorat($idgreat) + Naqaba($idgreat) + eaalaa($idgreat) + curr_work($idgreat) + old_work($idgreat) + adabeaa($idgreat);
if($dgreefinel !=0)
{
  $sql="UPDATE personal_information SET degreebeforetadqee='$dgreefinel' where user_id='$idgreat'";  
  $res=mysqli_query($conn,$sql);
  if($res)
  {
    $_SESSION['ginid']=$ginid;
    
    
  }
    
}

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
            <p class="text-danger fs-2 fw-bold">البيانات الشخصية للمتقدم</p>
        </div>
        <div class="title d-flex  justify-content-center">
            <p class="fs-8 fw-bold">اهلا وسهلا بك</p>
        </div>
        <?php 
        echo gettotal($idgreat)."-" .chekmarry($idgreat)."-" .year($idgreat)."-" . avarage($idgreat)."-" . workif($idgreat) ."-". Dorat($idgreat)."-" . Naqaba($idgreat)."-" . eaalaa($idgreat). "-". curr_work($idgreat)."-" . old_work($idgreat)."-" .adabeaa($idgreat);
        ?>
        <div class="title d-flex  justify-content-center">
            <p class="text-danger fs-4 fw-bold">رقم استمارة التوظيف الخاص بك هو</p>
        </div>
        <div class="title d-flex  justify-content-center">
            <?php

$rowgen = mysqli_fetch_assoc($resultgen);

$gennid=$rowgen['genid'];
$_SESSION['ginid']=$gennid;

?>

<h3><p style="font-weight: bold;"><?php echo $gennid; ?></p></h3>
        </div>

        <div class="title d-flex  justify-content-center">
            <p class="text-danger fs-4 fw-bold">الدرجة التفاضلية الخاصة بك (قبل التدقيق البشري ) هي </p>
        </div>
        <div class="title d-flex  justify-content-center">
            <?php
 $dgreefinel=gettotal($idgreat) + chekmarry($idgreat) + year($idgreat) + avarage($idgreat) + workif($idgreat) + Dorat($idgreat) + Naqaba($idgreat)+ eaalaa($idgreat) + curr_work($idgreat) + old_work($idgreat)+ adabeaa($idgreat);


?>

<h3><p style="font-weight: bold;"><?php echo $dgreefinel; ?></p></h3>
        </div>

        <div class=" d-flex justify-content-center mb-2" >
                    <a href="https://alummm23.000webhostapp.com/phppdf/pdfto.php".<?php echo $gennid; ?> class="btn btn-danger w-25">تحميل نسخة مطبوعة</a>
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
<script src="assets/vendor/fontawesome/js/all.min.js"></script>
</body>
</html>

