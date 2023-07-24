<?php
session_start();

$idgreat = $_SESSION['iduser'];
include 'config.php';
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
        <div class="container mt-2">
            <div class="d-flex justify-content-center p-3">
                <h3 class="fw-bold">تعديل بيانات السكن </h3>
            </div>
            <?php
$sqladdress="SELECT * FROM personal_information WHERE user_id='$idgreat'";
$resultaddress = mysqli_query($conn, $sqladdress);
if(mysqli_num_rows($resultaddress) === 1) {


  



  $rowadds = mysqli_fetch_assoc($resultaddress);
  $flgadds=$rowadds['address_flag'];
if($flgadds==0)
{
  if (isset($_POST['saveaddress'])) {
    $idnumbsakan = $_POST['idnumbsakan'];
    $officeinfo = $_POST['officeinfo'];
    $town = $_POST['town'];
    $regionqatha = $_POST['regionqatha'];
    $neighborhood = $_POST['neighborhood'];
    $address = $_POST['address'];
  
  
    $sqlupdateprof = "UPDATE personal_information SET housing_id_number='$idnumbsakan'
    ,information_Office=' $officeinfo',governorate='$town',region=' $regionqatha',neighborhood=' $neighborhood' ,address1='$address',address_flag='1' where user_id='$idgreat'";
    $resultupdate = mysqli_query($conn, $sqlupdateprof);
    if (($resultupdate)) {
  
      $sqlupdatflg = "UPDATE flag_forms SET address_flag='1' where user_id='$idgreat'";
      $resultupflg = mysqli_query($conn, $sqlupdatflg);
      if($resultupflg)
{

  $_SESSION['ok']="ok";
  header("Location: mainpage.php");
}

        
    }
    
    
  
  
  }
  
  
  ?>
              <form action="" method="POST" class="mt-3">
              <div class="row my-1 mt-4">
                  <div class="col-md-4 col-12 d-flex flex-column mb-2">
                      <label for="" class="form-label fw-bold">رقم بطاقة السكن </label>
                      <input
                      type="number"
                      class="form-control"
                      id="exampleInputEmail1"
                      name="idnumbsakan"
                      aria-describedby="emailHelp"
                      required
                      
                      
                    />
                  </div>
                  <div class="col-md-4 col-12 d-flex flex-column mb-2">
                      <label for="" class="form-label fw-bold">مكتب معلومات بطاقة السكن </label>
                      <input
                      type="text"
                      class="form-control"
                      id="exampleInputEmail1"
                      name="officeinfo"
                      aria-describedby="emailHelp"
                      required
                    />
                  </div>
              </div>
              <?php
                                $sql = "SELECT * FROM governerate ";
                                $res = mysqli_query($conn, $sql);
                                ?>
              <div class="row my-1">
                  <div class="col-md-4 col-12 d-flex flex-column mb-2">
                      <label for="id-province1" class="form-label fw-bold">المحافظة</label>
                      <select
                        class="form-select"
                        aria-label="Default select example"
                        id="gov"
                        name="town"
                        required
                      >
                      <?php
                                        while ($row = mysqli_fetch_assoc($res)) {
                                        ?>
                                            <option value="<?php echo $row['govid']; ?>"><?php echo $row['gov_name']; ?></option>
                                        <?php } ?>
                      </select>
                  </div>
                  <div class="col-md-4 col-12 d-flex flex-column mb-2">
                      <label for="" class="form-label fw-bold">القضاء</label>
                     
                    <select class="form-select" aria-label="Default select example" name="regionqatha" id="qath">
                    <option value=""> </option>
                </select>
                  </div>
                  <div class="col-md-4 col-12 d-flex flex-column mb-2">
                      <label for="" class="form-label fw-bold">الحي </label>
                     
                    <select class="form-select" aria-label="Default select example" name="neighborhood" id="nighb">
                </select>
                  </div>
              </div>
              <div class="row my-1">
                 
                  <div class="col-md-2  col-6 mb-2">
                      <label for="" class="form-label fw-bold">العنوان (مع اقرب نقطة دالة )</label>
                      
                  </div>
                  <div class="col-12 col-md-10 d-flex flex-column mb-2">
                      
                      <input
                      type="text"
                      class="form-control"
                      id="exampleInputEmail1"
                      name="address"
                      aria-describedby="emailHelp"
                      required
                    />
                  </div>
                
              </div>
              <div class="row my-1 mb-2">
                <div class="col-md-3 col-12">
                  <button type="submit" class="btn " name="saveaddress" style="background: rgb(3, 6, 56); color:white;">حفظ </button>
                  <a href="mainpage.php" type="button" class="btn btn-secondary" >رجوع الى القائمة </a>
                </div>
              </div>
              </div>
              </form>
  
          </div>
  </main>
 <?php


}

else
{

  if (isset($_POST['saveaddress'])) {

    $idnumbsakan = $_POST['idnumbsakan'];
    $officeinfo = $_POST['officeinfo'];
    $town = $_POST['town'];
    $regionqatha = $_POST['regionqatha'];
    $neighborhood = $_POST['neighborhood'];
    $address = $_POST['address'];
  
    $sqlupdateprof = "UPDATE personal_information SET housing_id_number='$idnumbsakan'
    ,information_Office=' $officeinfo',governorate='$town',region=' $regionqatha',neighborhood=' $neighborhood' ,address1='$address',address_flag='1' where user_id='$idgreat'";
    $resultupdate = mysqli_query($conn, $sqlupdateprof);
    if (($resultupdate)) {
      $sqlupdatflg = "UPDATE flag_forms SET address_flag='1' where user_id='$idgreat'";
      $resultupflg = mysqli_query($conn, $sqlupdatflg);
      if($resultupflg)
{

  $_SESSION['ok']="ok";
  header("Location: mainpage.php");
}
    }
    
    
  
  
  }





?>

  <form action="" method="POST" class="mt-3">
  <div class="row my-1 mt-4">
      <div class="col-md-4 col-12 d-flex flex-column mb-2">
          <label for="" class="form-label fw-bold">رقم بطاقة السكن </label>
          <input
          type="number"
          class="form-control"
          id="exampleInputEmail1"
          value="<?php echo $rowadds['housing_id_number']; ?>"
          name="idnumbsakan"
          aria-describedby="emailHelp"
        />
      </div>
      <div class="col-md-4 col-12 d-flex flex-column mb-2">
          <label for="" class="form-label fw-bold">مكتب معلومات بطاقة السكن </label>
          <input
          type="text"
          class="form-control"
          id="exampleInputEmail1"
          name="officeinfo"
          value="<?php echo $rowadds['information_Office']; ?>"
          aria-describedby="emailHelp"
          required
        />
      </div>
  </div>
  <?php
                                $sql = "SELECT * FROM governerate ";
                                $res = mysqli_query($conn, $sql);
                                ?>
  <div class="row my-1">
      <div class="col-md-4 col-12 d-flex flex-column mb-2">
          <label for="id-province1" class="form-label fw-bold">المحافظة</label>
          <select
            class="form-select"
            aria-label="Default select example"
            id="govid"
            value=""
            name="town"
            required
          >
         
            <option value="<?php echo $rowadds['governorate']; ?>">  <?php echo $rowadds['governorate']; ?>  </option>
            <?php
                                        while ($row = mysqli_fetch_assoc($res)) {
                                        ?>
            <option value="<?php echo $row['govid']; ?>"><?php echo $row['gov_name']; ?></option>
                                        <?php } ?>
          </select>
      </div>
      <div class="col-md-4 col-12 d-flex flex-column mb-2">
          <label for="" class="form-label fw-bold">القضاء</label>
          <input
          type="text"
          class="form-control"
          id="exampleInputEmail1"
          name="regionqatha"
          value="<?php echo $rowadds['region']; ?>"
          aria-describedby="emailHelp"
          required
        />
      </div>
      <div class="col-md-4 col-12 d-flex flex-column mb-2">
          <label for="" class="form-label fw-bold">الحي </label>
          <input
          type="text"
          class="form-control"
          id="exampleInputEmail1"
          name="neighborhood"
          value="<?php echo $rowadds['neighborhood']; ?>"
          aria-describedby="emailHelp"
          required
        />
      </div>
  </div>
  <div class="row my-1">
     
      <div class="col-md-2  col-6 mb-2">
          <label for="" class="form-label fw-bold">العنوان (مع اقرب نقطة دالة )</label>
          
      </div>
      <div class="col-12 col-md-10 d-flex flex-column mb-2">
          
          <input
          type="text"
          class="form-control"
          id="exampleInputEmail1"
          name="address"
          value="<?php echo $rowadds['address1']; ?>"
          aria-describedby="emailHelp"
          required
        />
      </div>
    
  </div>
  <div class="row my-1 mb-2">
    <div class="col-md-3 col-12">
      <button type="submit" class="btn " name="saveaddress" style="background: rgb(3, 6, 56); color:white;">حفظ </button>
      <a href="mainpage.php" type="button" class="btn btn-secondary" >رجوع الى القائمة </a>
    </div>
  </div>
  </div>
  </form>

</div>
</main>


<?php


}





}


?>

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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
        $('#gov').on('change', function() {
            var govid = $(this).val();
            if (govid) {
                $.ajax({
                    type: 'POST',
                    url: 'ajax.php',
                    data: 'govid=' + govid,
                    success: function(html) {

                        $('#qath').html(html);
                        $('#nighb').html('<option value="">  أختر القضاء اولا</option>');
                    }
                });
            } else {

                $('#qath').html('<option value="">Select state first</option>');
            }
        });
        $('#qath').on('change', function() {
            var qid = $(this).val();
            if (qid) {
                $.ajax({
                    type: 'POST',
                    url: 'ajax.php',
                    data: 'qid=' + qid,
                    success: function(html) {

                        $('#nighb').html(html);
                    }
                });
            } else {

                $('#nighb').html('<option value="">Select state first</option>');
            }
        });
    });
</script>
  </body>
  </html>


