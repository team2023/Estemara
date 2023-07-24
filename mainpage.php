<?php
include 'config.php';
include 'genid.php';
include 'dgree.php';
  
  $idgreat = $_SESSION['iduser'];
  
  //echo $idgreat;
    $sqlname="SELECT * FROM personal_information WHERE user_id='$idgreat'";
    $resultname = mysqli_query($conn, $sqlname);
    if (mysqli_num_rows($resultname) === 1) {
       
 // echo $idgreat;
    $sqlchkflg="SELECT * FROM flag_forms WHERE user_id='$idgreat'";
    $resultchkflg = mysqli_query($conn, $sqlchkflg);
    $rowname = mysqli_fetch_assoc($resultname); 
    if (mysqli_num_rows($resultchkflg) === 1) {
       
       $rowchkflg = mysqli_fetch_assoc($resultchkflg); 

#if($dgreefinel==0)
#{

 # $sqldgree="UPDATE education_data SET "

#}
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
                 
                      $namepers1 = $rowname['first_name'] .' '.$rowname['second_name'].' '.$rowname['third_name'];  
                     
                      echo $namepers1;
                      ?>
                 
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="logout.php">تسجيل الخروج</a></li>
                 
                </ul>
              </div>
          </div>
      <div class="container my-5">
        
        <div class="title d-flex  justify-content-center">
            <p class="text-danger fs-4 fw-bold">البيانات الشخصية للمتقدم </p>
        </div>
        <div class="title d-flex  justify-content-center">
            <p>اهلا و سهلا بك</p>
        </div>
        <div class="title d-flex  justify-content-center">
            <p>الرجاء الضغط على ازرار التعديل  أدناه لغرض اضافة أو تعديل البيانات الخاصة بك , بعد أكمال ادخال البيانات بنجاح ستظهر فوق رز التعديل عبارة مكتمل  </p>
        </div>
        <div class="row my-5 gy-3">
            <div class="col-md-2 d-flex flex-column my-sm-3">
         <?php
            
      $flgupdate=$rowchkflg['personal_info_flag'];
       if($flgupdate=="0" )
       {
         ?>
        <div class="danger w-50 align-self-center align-items-center ">
                    <div>
                        <p class="text-center align-self-center"><i class="fa-solid fa-x"></i> غير مكتمل </p>
                    </div>
                    
                </div>
                <?php  
       }
       else
       {
       ?>

<div class="success w-50 align-self-center align-items-center ">
                    <div>
                        <p class="text-center align-self-center"><i class="fa-solid fa-check"></i>  مكتمل </p>
                    </div>
                    
                </div>
                <?php 
    }?>
           
                <a href="profile.php" class="btn btn1"><i class="fa-solid fa-pen"></i> تعديل البيانات الشخصية </a>
            </div>



             <!-- code for chek if full input adress-->


             
            <div class="col-md-2 d-flex flex-column gy-sm-3 ">
            <?php
            
            $flgupdateaddrs=$rowchkflg['address_flag'];
             if($flgupdateaddrs=="0" )
             {
               ?>
              <div class="danger w-50 align-self-center align-items-center ">
                          <div>
                              <p class="text-center align-self-center"><i class="fa-solid fa-x"></i> غير مكتمل </p>
                          </div>
                          
                      </div>
                      <?php  
             }
             else
             {
             ?>
      
      <div class="success w-50 align-self-center align-items-center ">
                          <div>
                              <p class="text-center align-self-center"><i class="fa-solid fa-check"></i>  مكتمل </p>
                          </div>
                          
                      </div>
                      <?php 
          }?>




                <a href="address.php" class="btn btn1"><i class="fa-solid fa-pen"></i> تعديل بيانات السكن </a href="">
            </div>


            <div class="col-md-2 d-flex flex-column">
            <?php
            
            $flgupdatework=$rowchkflg['workSkill_flag'];
             if($flgupdatework=="0" )
             {
              ?>
              <div class="danger w-50 align-self-center align-items-center ">
                          <div>
                              <p class="text-center align-self-center"><i class="fa-solid fa-x"></i> غير مكتمل </p>
                          </div>
                          
                      </div>
                      <?php  
             }
             else
             {
             ?>
      
      <div class="success w-50 align-self-center align-items-center ">
                          <div>
                              <p class="text-center align-self-center"><i class="fa-solid fa-check"></i>  مكتمل </p>
                          </div>
                          
                      </div>
                      <?php 
          }?>




                
                <a href="work.php" class="btn btn1"><i class="fa-solid fa-pen"></i> تعديل بيانات المهارة و العمل </a href="">
            </div>
            <div class="col-md-2 d-flex flex-column">
             
            <?php
            
            $flgupdateadue=$rowchkflg['education_data_flag'];
             if($flgupdateadue=="0" )
             {
              ?>
              <div class="danger w-50 align-self-center align-items-center ">
                          <div>
                              <p class="text-center align-self-center"><i class="fa-solid fa-x"></i> غير مكتمل </p>
                          </div>
                          
                      </div>
                      <?php  
             }
             else
             {
             ?>
      
      <div class="success w-50 align-self-center align-items-center ">
                          <div>
                              <p class="text-center align-self-center"><i class="fa-solid fa-check"></i>  مكتمل </p>
                          </div>
                          
                      </div>
                      <?php 
          }?>




                <a href="edutction.php" class="btn btn1"><i class="fa-solid fa-pen"></i> تعديل بيانات الدراسة </a href="">
            </div>
            <div class="col-md-2 d-flex flex-column">
                <div class="optional w-50 align-self-center align-items-center bg-primary">
                    <p class="text-center"><i class="fa-solid fa-exclamation"></i> أختياري  </p>
                </div>
                <a href="optional.php" class="btn btn1"><i class="fa-solid fa-pen"></i> البيانات الأضافية </a href="">
            </div>
            <div class="col-md-2 d-flex flex-column">
            <?php
            
            $flgupdatefile=$rowchkflg['files_flag'];
             if($flgupdatefile=="0" )
             {
               ?>
              <div class="danger w-50 align-self-center align-items-center ">
                          <div>
                              <p class="text-center align-self-center"><i class="fa-solid fa-x"></i> غير مكتمل </p>
                          </div>
                          
                      </div>
                      <?php  
             }
             else
             {
             ?>
      
      <div class="success w-50 align-self-center align-items-center ">
                          <div>
                              <p class="text-center align-self-center"><i class="fa-solid fa-check"></i>  مكتمل </p>
                          </div>
                          
                      </div>
                      <?php 
          }}
           else{
            echo mysqli_error($conn);
          }
          ?>
                <a href="files.php" class="btn btn1"><i class="fa-solid fa-pen"></i> اضافة او تعديل الملفات</a href="">
            </div>
           
            <?php
              $sqlnflagfinl="SELECT * FROM flag_forms WHERE user_id='$idgreat'";
              $resultflagfinl = mysqli_query($conn, $sqlnflagfinl);
              if (mysqli_num_rows($resultflagfinl) === 1) {
               $rowflagfinl = mysqli_fetch_assoc($resultflagfinl); 
                if($rowchkflg['personal_info_flag']=="1" && $rowchkflg['address_flag']=="1" && $rowchkflg['workSkill_flag']=="1" && $rowchkflg['education_data_flag']=="1" && $rowchkflg['files_flag']=="1")
                {
                  
            $sqlupdatflg = "UPDATE flag_forms SET final_flag='1' where user_id='$idgreat'";
            $resultupflg = mysqli_query($conn, $sqlupdatflg);
            if($resultupflg)
            {

              ?>
             
             <div class=" d-flex justify-content-center mb-2">
                    <a href="tahad.php" class="btn btn-danger w-25">ارسال البيانات الى التدقيق</a>
                </div>
       


             <?php
        
                }
              }
                else
                {
?>


<div class="title d-flex  justify-content-center">
            <p>يظهر رابط ارسال البيانات للتدقيق بعد أكمال كافة البيانات المطلوبة </p>
        </div>  
<?php
}}
              }
            ?>
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