<?php
include ('config.php');
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
    <div class="container mt-2">
      <div class="d-flex justify-content-center p-3">
        <h3 class="fw-bold">تعديل بيانات  الدراسة </h3>
      </div>
      <form action="" class="mt-3">
        <div class="row my-1 mt-4 gy-3">
          <div class="col-md-6 col-12 d-flex flex-column mb-2">
            <label for="" class="form-label fw-bold">التحصيل الدراسي </label>
            <select class="form-select" aria-label="Default select example" id="edu">
              <option selected>أختر من فضلك ..</option>
              <option value="1" >دكتوراه</option>
              <option value="2">ماجستير</option>
              <option value="3">دبلوم عالي</option>
              <option value="4">بكالوريوس</option>
              <option value="5">دبلوم</option>
            </select>
          </div>
          <div class="col-md-6 col-12 d-flex flex-column mb-2">
            <label for="" class="form-label fw-bold">مكان الدراسة</label>
            <select class="form-select" aria-label="Default select example" id="edu-type" name="edu-type" required>
              <option disabled selected>اختر</option>
              <option value="in"> داخل العراق</option>
              <option value="out">خارج العراق</option>

            </select>
          </div>
          <!-------------------في حالة الدراسة خارج العراق ------------------------------------>
          <div class="col-md-6 col-12 d-flex flex-column mb-2 d-none  div1">
            <label for="" class="form-label fw-bold">نوع الأبتعاث</label>
            <select class="form-select" aria-label="Default select example">
              <option selected>نفقة خاصة</option>
              <option value="1">عامة</option>

            </select>
          </div>
          <div class="col-md-6 col-12 d-flex flex-column mb-2 d-none div2">
            <label for="" class="form-label fw-bold">بلد التخرج </label>
            <select class="form-select" aria-label="Default select example">
              <option selected>الأردن</option>
              <option value="1">سوريا</option>
            </select>
          </div>
          <div class="col-md-4 col-12 d-flex flex-column mb-2 d-none div3">
            <label for="" class="form-label fw-bold">الجامعة</label>
            <input
                    type="text"
                    class="form-control"
                    id="exampleInputEmail1"
                    aria-describedby="emailHelp"
                  />
          </div>
          <div class="col-md-4 col-12 d-flex flex-column d-none mb-2 div4">
            <label for="" class="form-label fw-bold">الكلية</label>
            <input
            type="text"
            class="form-control"
            id="exampleInputEmail1"
            aria-describedby="emailHelp"
          />
          </div>
          <div class="col-md-4 col-12 d-flex flex-column d-none mb-2 div5">
            <label for="" class="form-label fw-bold">القسم</label>
            <input
                    type="text"
                    class="form-control"
                    id="exampleInputEmail1"
                    aria-describedby="emailHelp"
                  />
          </div>

          <!---------- في حالة الدراسة داخل العراق ----------------------->
          <?php
                                        $sql = "SELECT * FROM universities ";
                                        $res = mysqli_query($conn, $sql);


                                        ?>
          <div class="col-md-4 col-12 d-flex flex-column mb-2 div11">
            <label for="" class="form-label fw-bold">الجامعة</label>
            <select class="form-select" aria-label="Default select example" id="university" name="id-province1"
              required>
              <option value="0"> اختر</option>

<?php
    while ($row = mysqli_fetch_assoc($res)) {
        ?>
<option value="<?php echo $row['id']; ?>"> <?php echo $row['university_name']; ?>
</option>
<?php } ?>
            </select>
          </div>
          <div class="col-md-4 col-12 d-flex flex-column mb-2 div22">
            <label for="" class="form-label fw-bold">الكلية</label>
            <select class="form-select" aria-label="Default select example" id="collage">
            <option value=""> </option>
            </select>
          </div>
          <div class="col-md-4 col-12 d-flex flex-column mb-2 div33">
            <label for="" class="form-label fw-bold">القسم</label>
            <select class="form-select" aria-label="Default select example" id="dep">
              
            </select>
          </div>
          <div class="col-md-6 col-12 d-flex flex-column mb-2">
            <label for="" class="form-label fw-bold">سنة التخرج </label>
            <input type="month" class="form-control" min="1900-11" max="2099-11" step="1" value="2016" />
          </div>
          <div class="col-md-6 col-12 d-flex flex-column mb-2 grade d-none">
            <label for="grade" class="form-label fw-bold">التقدير</label>
            <select class="form-select" aria-label="Default select example" name="grade" id="grade">
              <option value="1"> ممتاز</option>
              <option value="2">جيد جدا</option>
              <option value="3">جيد </option>
              <option value="4">متوسط</option>
            </select>
          </div>
          <!---------------------في حالة بكالوريوس و الدبلوم ----------------->
          <div class="col-md-6 col-12 d-flex flex-column mb-2 d-none ave">
            <label for="ave" class="form-label fw-bold">المعدل</label>
            <input
                    type="number"
                    class="form-control"
                    id="ave"
                    aria-describedby="emailHelp"
                  />
          </div>
        </div>


        <div class="row my-2 mb-2">
          <div class="col-md-3 col-12">
            <button type="button" class="btn " style="background: rgb(3, 6, 56); color:white;">حفظ </button>
            <a href="page.html" type="button" class="btn btn-secondary">رجوع الى القائمة </a>
          </div>
        </div>
    </div>
    </form>
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script>
    const selectOption = document.getElementById("edu-type");
    let div1 = document.querySelector(".div1");
    let div2 = document.querySelector(".div2");
    let div3 = document.querySelector(".div3");
    let div4 = document.querySelector(".div4");
    let div5 = document.querySelector(".div5");
    let div11 = document.querySelector(".div11");
    let div22 = document.querySelector(".div22");
    let div33 = document.querySelector(".div33");
    
    function handleOptionChange() {
      let selectedOption = selectOption.value;

      // Toggle "d-none" class based on selected option
      if (selectedOption === "out") {
        div1.classList.remove("d-none");
        div2.classList.remove("d-none");
        div3.classList.remove("d-none");
        div4.classList.remove("d-none");
        div5.classList.remove("d-none");
        div11.classList.add("d-none");
        div22.classList.add("d-none");
        div33.classList.add("d-none");

      } else if (selectedOption === "in") {
        div1.classList.add("d-none");
        div2.classList.add("d-none");
        div3.classList.add("d-none");
        div4.classList.add("d-none");
        div5.classList.add("d-none");
        div11.classList.remove("d-none");
        div22.classList.remove("d-none");
        div33.classList.remove("d-none");
        

      }
    }

    selectOption.addEventListener("change", handleOptionChange);

///////////////////تغيير المعدل او التقدير حسب الدراسة //////////////////

    const selecteduOption = document.getElementById("edu");
let ave = document.querySelector('.ave');
let grade = document.querySelector('.grade');
// Function to show/hide gov divs based on the selected option
function handleOptionChangeedu() {
  let selectedOption = selecteduOption.value;

  // Toggle "d-none" class based on selected option
  if (selectedOption === "4" || selectedOption === "5" ) {
    ave.classList.remove("d-none");
    ave.setAttribute('reqiured','');
    grade.classList.add("d-none");
    grade.removeAttribute('reqiured','');
    
  } else {
    ave.classList.add("d-none");
    ave.removeAttribute('reqiured','');
    grade.classList.remove("d-none");
    grade.setAttribute('reqiured','');
    
  }
}

// Add event listener for the change event of select element
selecteduOption.addEventListener("change", handleOptionChangeedu);

  </script>
  <script>
    $(document).ready(function() {
        $('#university').on('change', function() {
            var uniID = $(this).val();
            if (uniID) {
                $.ajax({
                    type: 'POST',
                    url: 'ajax.php',
                    data: 'uniID=' + uniID,
                    success: function(html) {

                        $('#collage').html(html);
                        $('#dep').html('<option value="">  أختر الكلية اولا</option>');
                    }
                });
            } else {

                $('#collage').html('<option value="">Select state first</option>');
            }
        });
        $('#collage').on('change', function() {
            var colId = $(this).val();
            if (colId) {
                $.ajax({
                    type: 'POST',
                    url: 'ajax.php',
                    data: 'colId=' + colId,
                    success: function(html) {

                        $('#dep').html(html);
                    }
                });
            } else {

                $('#dep').html('<option value="">Select state first</option>');
            }
        });
    });

    </script>
</body>

</html>