<?php
session_start();
$_SESSION['iduser']='7';
$idgreat = $_SESSION['iduser'];
include 'config.php';
//  print_r($_POST);

// code for chak if user have full deta or not
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
        <div class="container my-5">
            <div class="row">
                <div class="col"></div>
                <div class="col-10">
                    <div class="card">
                        <div class="card-header text-center">البيانات الشخصية</div>
                        <div class="card-body">
                            <?php
$sqlchek = "SELECT * from personal_information where user_id = '$idgreat'";
$resultchek = mysqli_query($conn, $sqlchek);
if (mysqli_num_rows($resultchek) === 1) {
     
    $rowchk = mysqli_fetch_assoc($resultchek);
    $flgupdate=$rowchk['personal_information_flag'];
    if ($flgupdate==0)
    {
  
        if (isset($_POST['saveprof'])) {






            $allaqb = $_POST['sure_name'];
            $mothern = $_POST['mom-first-name'];
            $secmothern = $_POST['mom-second-name'];
            $themothern = $_POST['mom-third-name'];
            $nationalism = $_POST['nationalism'];
            $religion = $_POST['religion'];
            $gender = $_POST['gender'];
            $place_birth = $_POST['place_birth'];
            $family_number = $_POST['family_number'];
            $idcardbathday = $_POST['id-cardday'] . '-' .$_POST['id-cardmonth'] .'-'.$_POST['id-cardyear'];
            $civil_card_city = $_POST['civil_card_city'];
            $civil_status_ID_record = $_POST['civil_status_ID_record'];
            $civil_status_ID_sheet_number = $_POST['civil_status_ID_sheet_number'];
            $civil_date_card  = $_POST['id-day'] . '-' .$_POST['id-month'] .'-'.$_POST['id-year'];
            $nationality_certificate_number = $_POST['nationality_certificate_number'];
            $marital_status = $_POST['marital_status'];
            $have_child = $_POST['have_child'];
            $number_child_less18 = $_POST['number_child_less18'];
            $number_child_more18 = $_POST['number_child_more18'];
            $child18_first_reason = $_POST['child18_first_reason'];
            $child18_second_reason = $_POST['child18_second_reason'];
            $child18_third_reason = $_POST['child18_third_reason'];
            $child18_fourth_reason = $_POST['child18_fourth_reason'];
            
           
            $bathday = $_POST['day'] . '-' .$_POST['month'] .'-'.$_POST['year'];
          
           
            $sqlupdateprof = "UPDATE personal_information SET
            sure_name='$allaqb',
             mother_firstname='$mothern',
            mother_secondname=' $secmothern',
            mother_thirdname=' $themothern',
            gender='$gender',
            personal_information_flag='1'
            nationalism='$nationalism,
            religion='$religion,
            
            place_birth='$place_birth,
            family_number='$family_number,
            national_card_date='$idcardbathday,
            civil_card_city='$civil_card_city,
            civil_status_ID_record='$civil_status_ID_record,
            civil_status_ID_sheet_number='$civil_status_ID_sheet_number',
            civil_date_card='$civil_date_card,
            nationality_certificate_number='$nationality_certificate_number',
            marital_status='$marital_status'
             where user_id='$idgreat'";
            $resultupdate = mysqli_query($conn, $sqlupdateprof);
            if (($resultupdate)) {
        
                $_SESSION['ok']="ok";
                header("Location: mainpage.php");
                
            } else
                echo "noo";
        } 
        
        
        $sql = "SELECT * FROM personal_information WHERE user_id='$idgreat'";
        $result = mysqli_query($conn, $sql);
        
            
        ?>
                            <?php if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            ?>
                            <form class="row g-3" method="POST" action="">
                                <!-- user full name -->
                                <div class="col-12 col-sm-6 col-md-3">
                                    <label for="first-name" class="form-label">الاسم<span
                                            class="redStar">*</span></label>
                                    <input type="text" class="form-control" id="first-name" name="first-name"
                                        placeholder="<?php echo $row['first_name']; ?>" />

                                </div>
                                <div class="col-12 col-sm-6 col-md-3">
                                    <label for="second-name" class="form-label">اسم الاب<span
                                            class="redStar">*</span></label>
                                    <input type="text" class="form-control" id="second-name" name="second-name"
                                        placeholder="<?php echo $row['second_name']; ?>" readonly />
                                </div>
                                <div class="col-12 col-sm-6 col-md-3">
                                    <label for="third-name" class="form-label">اسم الجد<span
                                            class="redStar">*</span></label>
                                    <input type="text" class="form-control" id="third-name" name="third-name"
                                        placeholder="<?php echo $row['third_name']; ?>" readonly />

                                </div>
                                <div class="col-12 col-sm-6 col-md-3">
                                    <label for="forth-name" class="form-label"> الاسم الرابع<span
                                            class="redStar">*</span></label>
                                    <input type="text" class="form-control" id="forth-name" name="forth-name"
                                        placeholder="<?php echo $row['fourth_name']; ?>" readonly />
                                </div>
                                <div class="col-12 col-sm-6 col-md-3">
                                    <label for="fourth-name" class="form-label">اللقب<span
                                            class="redStar">*</span></label>
                                    <input type="text" class="form-control" id="fourth-name" name="sure_name"  pattern="[ء-ي\s]+"
                    title="يرجى إدخال الأحرف العربية فقط" required />
                                </div>

                                <!-- user full mother name -->
                                <div class="col-12 col-sm-6 col-md-3">
                                    <label for="mom-first-name" class="form-label">اسم الام<span
                                            class="redStar">*</span></label>
                                    <input type="text" class="form-control" id="mom-first-name" name="mom-first-name"  pattern="[ء-ي\s]+"
                    title="يرجى إدخال الأحرف العربية فقط" reqiured />
                                </div>
                                <div class="col-12 col-sm-6 col-md-3">
                                    <label for="mom-second-name" class="form-label">اسم اب الام<span
                                            class="redStar">*</span></label>
                                    <input type="text" class="form-control" id="mom-second-name"
                                        name="mom-second-name"  pattern="[ء-ي\s]+"
                    title="يرجى إدخال الأحرف العربية فقط" required />
                                </div>
                                <div class="col-md-3">
                                    <label for="mom-third-name" class="form-label">اسم جد الام<span
                                            class="redStar">*</span></label>
                                    <input type="text" class="form-control" id="mom-third-name" name="mom-third-name"  pattern="[ء-ي\s]+"
                    title="يرجى إدخال الأحرف العربية فقط" required />
                                </div>

                                <!-- personal information -->

                                <div class="col-md-3">
                                    <label for="nationality" class="form-label">الجنسية<span
                                            class="redStar">*</span></label>
                                    <input type="text" class="form-control" id="nationality" name="nationality"
                                        placeholder="العراقية" readonly />
                                </div>
                                <div class="col-md-3">
                                    <label for="nationalism" class="form-label">القومية<span
                                            class="redStar">*</span></label>
                                    <select class="form-select" aria-label="Default select example" name="nationalism"
                                        id="nationalism" reqiured>
                                        <option disabled selected>اختر</option>
                                        <option value="عربي">عربي</option>
                                        <option value="اجنبي">كردي</option>
                                        <option value="تركماني">تركماني</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="religion" class="form-label">الديانة<span
                                            class="redStar">*</span></label>
                                    <select class="form-select" aria-label="Default select example" name="religion"
                                        id="religion" reqiured>
                                        <option disabled selected>اختر</option>
                                        <option value="مسلم">مسلم</option>
                                        <option value="مسيحي">مسيحي</option>
                                        <option value="يزيدي">يزيدي</option>
                                        <option value="يهودي">يهودي</option>
                                        <option value="اخرى">اخرى</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="sex" class="form-label">الجنس<span class="redStar">*</span></label>
                                    <select class="form-select" aria-label="Default select example" name="gender"
                                        id="sex">
                                        <option disabled selected>اختر</option>
                                        <option value="ذكر">ذكر</option>
                                        <option value="انثى">انثى</option>
                                    </select>
                                </div>

                                <div class="col-12 col-lg-6">
                                    <label class="form-label">تاريخ الميلاد<span class="redStar">*</span></label>
                                    <div class="row">
                                        <div class="col-12 col-sm-4">
                                            <select id="day" name="day" class="form-select">
                                                <option value="">
                                                    اليوم<span class="redStar">*</span>
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-sm-4 my-2 my-sm-0">
                                            <select id="month" name="month" class="form-select" reqiured>
                                                <option value="">
                                                    الشهر<span class="redStar">*</span>
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <select id="year" name="year" class="form-select" reqiured>
                                                <option value="">
                                                    السنة<span class="redStar">*</span>
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6 col-lg-3">
                                    <label for="birth-place" class="form-label">محل الولادة<span
                                            class="redStar">*</span></label>
                                    <input type="text" class="form-control" id="birth-place" name="place_birth"  pattern="[ء-ي\s]+"
                    title="يرجى إدخال الأحرف العربية فقط"  required/>
                                </div>

                                <div class="col-6 col-lg-3">
                                    <label for="phone-number" class="form-label">رقم الهاتف<span
                                            class="redStar">*</span></label>
                                    <input type="number" class="form-control" id="phone-number" name="phone-number"
                                        placeholder="<?php echo $row['phone_number'];
         ?>" readonly />
                                </div>




                                <!-- if he pick yes -->
                                <?php
                                 if($row['national_card_flag']=="1")
                                 {

?>

                                <div class="col-12 col-md-6 col-lg-3 div2 ">
                                    <label for="id-number" class="form-label">رقم البطاقة الوطنية<span
                                            class="redStar">*</span></label>
                                    <input type="number" class="form-control" id="id-number" placeholder="<?php echo $row['nationality_card_number']; ?>"  />
                                </div>
                                <div class="col-12 col-md-6 col-lg-3 div1 ">
                                    <label for="fam-number" class="form-label">الرقم العائلي<span
                                            class="redStar">*</span></label>
                                    <input type="number" class="form-control" id="fam-number" name="family_number" required/>
                                </div>
                                <div class="col-12 col-lg-6 col-xl-4 div9 ">
                                    <label class="form-label">تاريخ إصدار البطاقة الوطنية<span
                                            class="redStar">*</span></label>
                                    <div class="row">
                                        <div class="col-12 col-sm-4">
                                            <select id="id-cardday" name="id-cardday" class="form-select" reqiured>
                                                <option value="">اليوم</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-sm-4 my-2 my-sm-0">
                                            <select id="id-cardmonth" name="id-cardmonth" class="form-select">
                                                <option value="">الشهر</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <select id="id-cardyear" name="id-cardyear" class="form-select" required>
                                                <option value="">السنة</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
<?php
                            }
                            else if ($row['national_card_flag']=="2")
                            {
?>
                                <!-- if he pick no -->
                                <div class="col-12"></div>
                                <div class="col-12 col-md-6 col-xl-4 div3 ">
                                    <label for="id-province1" class="form-label">المحافظة التي صدرت منها هوية الاحوال
                                        المدنية<span class="redStar">*</span></label>
                                    <select class="form-select" aria-label="Default select example" id="id-province1"
                                        name="civil_card_city">
                                        <option disabled selected>اختر</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6 col-xl-4 div4 ">
                                    <label for="id-no-number" class="form-label">رقم هوية الاحوال المدنية<span
                                            class="redStar">*</span></label>
                                    <input type="number" class="form-control" id="id-no-number" name="id-number" />
                                </div>

                                <div class="ol-12 col-md-6 col-xl-4 div5 ">
                                    <label for="id-history-number" class="form-label">رقم سجل هوية الاحوال المدنية<span
                                            class="redStar">*</span></label>
                                    <input type="number" class="form-control" id="id-history-number"
                                        name="civil_status_ID_record" required/>
                                </div>
                                <div class="ol-12 col-md-6 col-xl-4 div6 ">
                                    <label for="id-newspaper-number" class="form-label">رقم صحيفة هوية الاحوال
                                        المدنية<span class="redStar">*</span></label>
                                    <input type="number" class="form-control" id="id-newspaper-number"
                                        name="civil_status_ID_sheet_number" required/>
                                </div>
                                <div class="col-12 col-lg-6 col-xl-4 div7 ">
                                    <label class="form-label">تاريخ إصدار هوية الاحوال المدنية<span
                                            class="redStar">*</span></label>
                                    <div class="row">
                                        <div class="col-12 col-sm-4">
                                            <select id="id-day" name="id-day" class="form-select" reqiured>
                                                <option value="">اليوم</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-sm-4 my-2 my-sm-0">
                                            <select id="id-month" name="id-month" class="form-select" required>
                                                <option value="">الشهر</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <select id="id-year" name="id-year" class="form-select" required>
                                                <option value="">السنة</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 col-xl-4 div8 ">
                                    <label for="id-certificate-number" class="form-label">رقم شهادة الجنسية<span
                                            class="redStar">*</span></label>
                                    <input type="number" class="form-control" id="id-certificate-number"
                                        name="nationality_certificate_number" required/>
                                </div>

                                <?php

                            }
?>
                                <div class="col-12 col-md-6 col-lg-6 col-xl-5">
                                    <label for="martial-status" class="form-label">الحالة الاجتماعية<span
                                            class="redStar">*</span></label>
                                    <select class="form-select" aria-label="Default select example"
                                        name="marital_status" id="marr-type" reqiured>
                                        <option disabled selected>اختر</option>
                                        <option value="0">متزوج</option>
                                        <option value="1">ارمل</option>
                                        <option value="2">مطلق</option>
                                        <option value="3">اعزب</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6 col-xl-5 d-none child">
                                    <label for="child" class="form-label"> هل لديك اطفال؟<span
                                            class="redStar">*</span></label>
                                    <select class="form-select" aria-label="Default select example" id="child" name="">
                                        <option disabled selected>اختر</option>
                                        <option value="0">نعم</option>
                                        <option value="1">لا</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6 col-xl-5 down18 d-none">
                                    <label for="down18" class="form-label">عدد الأطفال اللذين اعمارهم اقل من 18 عام<span
                                            class="redStar">*</span></label>
                                    <select class="form-select" aria-label="Default select example" name="" id="down18">
                                        <option disabled selected>اختر</option>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>

                                    </select>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6 col-xl-5 up18 d-none">
                                    <label for="up18" class="form-label">عدد الأطفال اللذين اعمارهم اكبر من 18 عام<span
                                            class="redStar">*</span></label>
                                    <select class="form-select" aria-label="Default select example"
                                        name="martial-status" id="up18">
                                        <option disabled selected>اختر</option>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>


                                    </select>
                                </div>
                                <!-------------اسباب اعالة الاطفال الاكبر من 18 ----------------->
                                <!----##################################################################################################------>
                                <div class="col-12 col-md-3 col-lg-3 col-xl-5 ch1 d-none">
                                    <label for="" class="form-label">سبب اعالة الابن الاول فوق سن 18<span
                                            class="redStar">*</span></label>
                                    <select class="form-select" aria-label="Default select example" name="" id="">
                                        <option disabled selected>اختر</option>
                                        <option value="0">اسباب صحية </option>
                                        <option value="1">اسباب دراسية</option>
                                        <option value="2">بنت غير متزوجة</option>
                                    </select>

                                </div>
                                <div class="col-12 col-md-3 col-lg-3 col-xl-5 ch2 d-none">
                                    <label for="up18" class="form-label">سبب اعالة الابن الثاني فوق سن 18<span
                                            class="redStar">*</span></label>
                                    <select class="form-select" aria-label="Default select example" name="" id="">
                                        <option disabled selected>اختر</option>
                                        <option value="0">اسباب صحية </option>
                                        <option value="1">اسباب دراسية</option>
                                        <option value="2">بنت غير متزوجة</option>
                                    </select>

                                </div>
                                <div class="col-12 col-md-3 col-lg-3 col-xl-5 ch3 d-none">
                                    <label for="up18" class="form-label">سبب اعالة الابن الثالث فوق سن 18<span
                                            class="redStar">*</span></label>
                                    <select class="form-select" aria-label="Default select example" name="" id="">
                                        <option disabled selected>اختر</option>
                                        <option value="0">اسباب صحية </option>
                                        <option value="1">اسباب دراسية</option>
                                        <option value="2">بنت غير متزوجة</option>
                                    </select>


                                </div>
                                <div class="col-12 col-md-3 col-lg-3 col-xl-5 ch4 d-none">
                                    <label for="up18" class="form-label">سبب اعالة الابن الرابع فوق سن 18<span
                                            class="redStar">*</span></label>
                                    <select class="form-select" aria-label="Default select example" name="" id="">
                                        <option disabled selected>اختر</option>
                                        <option value="0">اسباب صحية </option>
                                        <option value="1">اسباب دراسية</option>
                                        <option value="2">بنت غير متزوجة</option>
                                    </select>

                                </div>

                                <div class="col-12 col-md-6 col-lg-6 col-xl-5">
                                    <label for="family-pay" class="form-label">هل انت معيل لاحد افراد العائلة<span
                                            class="redStar">*</span></label>
                                    <select class="form-select" aria-label="Default select example" id="family-pay"
                                        name="family-pay" required>
                                        <option disabled selected>اختر</option>
                                        <option value="yes">نعم</option>
                                        <option value="no">لا</option>
                                    </select>
                                </div>
                                <!---------------------------صلة القرابة -------------------------------->
                                <div class="col-6 col-lg-3 relative d-none">
                                    <label for="birth-place" class="form-label"> صلة القرابة<span
                                            class="redStar">*</span></label>
                                    <input type="text" class="form-control" id="" name=""  />
                                </div>
                                <!--------------------------------////// القنوات ///////////----------------------------->
                                <div class="col-12 col-lg-6 col-xl-4">
                                    <label for="channel" class="form-label">قناة التقديم<span
                                            class="redStar">*</span></label>
                                    <select class="form-select" aria-label="Default select example" id="channel"
                                        name="channel" required>
                                        <option disabled selected>اختر</option>
                                        <option value="0">القناة العامة</option>
                                        <option value="1">قناة الشهداء</option>
                                        <option value="2"> قناة ضحايا الارهاب و العمليات العسكرية</option>
                                        <option value="3">قناة السجناء السياسين</option>
                                        <option value="4">قناة الناجيات الايزيديات</option>
                                    </select>
                                </div>
                                <!------------------------------------قناة الشهداء ------------------------------------------------>
                                <div class="col-12 col-lg-6 col-xl-4 Martyrs d-none ">
                                    <label for="Martyrs" class="form-label">صفة الشهيد <span
                                            class="redStar">*</span></label>
                                    <select class="form-select" aria-label="Default select example" id="Martyrs"
                                        name="Martyrs">
                                        <option disabled selected>اختر</option>
                                        <option value="0">ضحايا الارهاب </option>
                                        <option value="1">شهداء النظام البائد </option>
                                    </select>
                                </div>

                                <div class="col-6 col-lg-3 Martyrs-name d-none">
                                    <label for="Martyrs-name" class="form-label"> اسم الشهيد الرباعي<span
                                            class="redStar">*</span></label>
                                    <input type="text" class="form-control" id="Martyrs-name" name="Martyrs-name"  pattern="[ء-ي\s]+"
                    title="يرجى إدخال الأحرف العربية فقط" />
                                </div>
                                <div class="col-6 col-lg-3 Martyrs-mother d-none">
                                    <label for="Martyrs-mother" class="form-label"> اسم ام الشهيد الثلاثي<span
                                            class="redStar">*</span></label>
                                    <input type="text" class="form-control" id="Martyrs-mother" name=""  pattern="[ء-ي\s]+"
                    title="يرجى إدخال الأحرف العربية فقط" />
                                </div>
                                <div class="col-6 col-lg-3 Martyrs-qrarnumber d-none">
                                    <label for="Martyrs-qrarnumber" class="form-label"> رقم القرار<span
                                            class="redStar">*</span></label>
                                    <input type="number" class="form-control" id="Martyrs-qrarnumber" name="" />
                                </div>
                                <div class="col-12 col-lg-6 col-xl-4 Martyrs-qraba d-none">
                                    <label for="Martyrs-qraba" class="form-label">توصيف حالة القرابة<span
                                            class="redStar">*</span></label>
                                    <select class="form-select" aria-label="Default select example" id="Martyrs-qraba"
                                        name="channel" required>
                                        <option disabled selected>اختر</option>
                                        <option value="0">الزوج</option>
                                        <option value="1">الزوجة </option>
                                        <option value="2">الأب </option>
                                        <option value="3">الأم </option>
                                        <option value="4">الأخت</option>
                                        <option value="5">الأخ </option>
                                        <option value="6">الأبن </option>
                                        <option value="7">الأبنة </option>
                                        <option value="8">الأخ غير الشقيق</option>
                                        <option value="9">اولاد الابن </option>
                                        <option value="10">اولاد الابنة </option>
                                    </select>
                                </div>
                                <!------------------------------------قناة السجناء السياسين  ------------------->


                                <div class="col-6 col-lg-4 prisoner-name d-none">
                                    <label for="prisoner-name" class="form-label"> اسم السجين الرباعي<span
                                            class="redStar">*</span></label>
                                    <input type="text" class="form-control" id="prisoner-name" name="prisoner-name"  pattern="[ء-ي\s]+"
                    title="يرجى إدخال الأحرف العربية فقط" />
                                </div>
                                <div class="col-6 col-lg-4 prisoner-mother d-none">
                                    <label for="prisoner-mother" class="form-label"> اسم ام السجين الثلاثي<span
                                            class="redStar">*</span></label>
                                    <input type="text" class="form-control" id="prisoner-mother" name=""  pattern="[ء-ي\s]+"
                    title="يرجى إدخال الأحرف العربية فقط"/>
                                </div>
                                <div class="col-6 col-lg-3 prisoner-qrarnumber d-none">
                                    <label for="prisoner-qrarnumber" class="form-label"> رقم القرار<span
                                            class="redStar">*</span></label>
                                    <input type="number" class="form-control" id="prisoner-qrarnumber" name="" />
                                </div>
                                <div class="col-12 col-lg-6 col-xl-4 prisoner-qraba d-none">
                                    <label for="prisoner-qraba" class="form-label">توصيف حالة القرابة<span
                                            class="redStar">*</span></label>
                                    <select class="form-select" aria-label="Default select example" id="prisoner-qraba"
                                        name="" required>
                                        <option disabled selected>اختر</option>
                                        <option value="0">انا سجين سياسي</option>
                                        <option value="1">انا ابن سجين سياسي </option>
                                        <option value="2">انا بنت سجين سياسي </option>
                                        <option value="3">انا زوج سجين سياسي </option>
                                        <option value="4">الأخت</option>
                                        <option value="5">الأخ </option>
                                        <option value="6">الأبن </option>
                                        <option value="7">الأبنة </option>
                                        <option value="8">الأخ غير الشقيق</option>
                                        <option value="9">اولاد الابن </option>
                                        <option value="10">اولاد الابنة </option>
                                    </select>
                                </div>
                                <!--------------------------------------------------------------------------->
                                <div class="col-12">
                                    <input type="submit" name="saveprof" value="تاكيد" class="btn btn-primary" />
                                </div>
                            </form>



                            <?php
                            }

    }


// here code for if usere is done update and back to upadte


    else
    {

        if (isset($_POST['saveprof'])) {

            $mothern = $_POST['mom-first-name'];
            $secmothern = $_POST['mom-second-name'];
            $themothern = $_POST['mom-third-name'];
            $allaqb = $_POST['sure_name'];
            $gender = $_POST['gender'];
            $nationalism = $_POST['nationalism'];
            $religion = $_POST['religion'];
            $bathday = $_POST['day'] . '-' .$_POST['month'] .'-'.$_POST['year'];
            $sqlupdateprof = "UPDATE personal_information SET mother_firstname='$mothern'
            ,mother_secondname=' $secmothern',sure_name='$allaqb',mother_thirdname=' $themothern',gender=' $gender',flgupdate='1' where user_id='$idgreat'";
            $resultupdate = mysqli_query($conn, $sqlupdateprof);
            if (($resultupdate)) {
        
                $_SESSION['ok']="ok";
                header("Location: mainpage.php");
                
            } else
                echo "noo";
        } 
        
        
        $sqlm = "SELECT * FROM personal_information WHERE user_id='$idgreat'";
        $resultm = mysqli_query($conn, $sqlm);
        
            
        ?>

                            <?php
                                            
                                            if (mysqli_num_rows($resultm)) {
                                            
                                                $rowm = mysqli_fetch_assoc($resultm);

                                                ?>
                            <form class="row g-3" method="POST" action="">
                                <!-- user full name -->
                                <div class="col-12 col-sm-6 col-md-3">



                                    <label for="first-name" class="form-label">الاسم<span
                                            class="redStar">*</span></label>

                                    <input type="text" class="form-control" id="first-name" name="first-name"
                                        placeholder="<?php echo $rowm['first_name']; ?>" readonly />

                                </div>
                                <div class="col-12 col-sm-6 col-md-3">
                                    <label for="second-name" class="form-label">اسم الاب<span
                                            class="redStar">*</span></label>
                                    <input type="text" class="form-control" id="second-name" name="second-name"
                                        placeholder="<?php echo $rowm['second_name']; ?>" readonly />
                                </div>
                                <div class="col-12 col-sm-6 col-md-3">
                                    <label for="third-name" class="form-label">اسم الجد<span
                                            class="redStar">*</span></label>
                                    <input type="text" class="form-control" id="third-name" name="third-name"
                                        placeholder="<?php echo $rowm['third_name']; ?>" readonly />

                                </div>
                                <div class="col-12 col-sm-6 col-md-3">
                                    <label for="fourth-name" class="form-label">اللقب<span
                                            class="redStar">*</span></label>
                                    <input type="text" class="form-control" id="fourth-name" name="fourth-name"
                                        value="<?php echo $rowm['sure_name']; ?>"  pattern="[ء-ي\s]+"
                    title="يرجى إدخال الأحرف العربية فقط"  />
                                </div>

                                <!-- user full mother name -->
                                <div class="col-12 col-sm-6 col-md-4">
                                    <label for="mom-first-name" class="form-label">اسم الام<span
                                            class="redStar">*</span></label>
                                    <input type="text" class="form-control" id="mom-first-name" name="mom-first-name"
                                        value="<?php echo $rowm['mother_firstname']; ?>"  pattern="[ء-ي\s]+"
                    title="يرجى إدخال الأحرف العربية فقط"  />
                                </div>
                                <div class="col-12 col-sm-6 col-md-4">
                                    <label for="mom-second-name" class="form-label">اسم اب الام<span
                                            class="redStar">*</span></label>
                                    <input type="text" class="form-control" id="mom-second-name" name="mom-second-name"
                                        value="<?php echo $rowm['mother_secondname']; ?>"   pattern="[ء-ي\s]+"
                    title="يرجى إدخال الأحرف العربية فقط"/>
                                </div>
                                <div class="col-md-4">
                                    <label for="mom-third-name" class="form-label">اسم جد الام<span
                                            class="redStar">*</span></label>
                                    <input type="text" class="form-control" id="mom-third-name" name="mom-third-name"
                                        value="<?php echo $rowm['mother_thirdname']; ?>"  pattern="[ء-ي\s]+"
                    title="يرجى إدخال الأحرف العربية فقط" />
                                </div>

                                <!-- personal information -->

                                <div class="col-md-3">
                                    <label for="nationality" class="form-label">الجنسية<span
                                            class="redStar">*</span></label>
                                    <input type="text" class="form-control" id="nationality" name="nationality"
                                        placeholder="العراقية" readonly />
                                </div>
                                <div class="col-md-3">
                                    <label for="nationalism" class="form-label">القومية<span
                                            class="redStar">*</span></label>
                                    <select class="form-select" aria-label="Default select example" name="nationalism"
                                        value="" id="nationalism">
                                        <option value="<?php echo $rowm['nationalism']; ?>">
                                            <?php echo $rowm['nationalism']; ?></option>
                                        <option value="عربي">عربي</option>
                                        <option value="اجنبي">كردي</option>
                                        <option value="تركماني">تركماني</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="religion" class="form-label">الديانة<span
                                            class="redStar">*</span></label>
                                    <select class="form-select" aria-label="Default select example" name="religion"
                                        value="<?php echo $rowm['religion']; ?>" id="religion">
                                        <option disabled selected>اختر</option>
                                        <option value="مسلم">مسلم</option>
                                        <option value="مسيحي">مسيحي</option>
                                        <option value="يزيدي">يزيدي</option>
                                        <option value="يهودي">يهودي</option>
                                        <option value="اخرى">اخرى</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="sex" class="form-label">الجنس<span class="redStar">*</span></label>
                                    <select class="form-select" aria-label="Default select example" name="gender"
                                        value="" id="sex">
                                        <option disabled selected><?php echo $rowm['gender']; ?></option>
                                        <option value="ذكر">ذكر</option>
                                        <option value="انثى">انثى</option>
                                    </select>
                                </div>


                                <div class="col-12 col-lg-6">
                                    <label class="form-label">تاريخ الميلاد<span class="redStar">*</span></label>
                                    <div class="row">
                                        <div class="col-12 col-sm-4">
                                            <select id="day" name="day" class="form-select">
                                                <option value="">
                                                    اليوم<span class="redStar">*</span>
                                                </option>
                                            </select>
                                        </div>

                                        <div class="col-12 col-sm-4 my-2 my-sm-0">
                                            <select id="month" name="month" class="form-select">
                                                <option value="">
                                                    الشهر<span class="redStar">*</span>
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <select id="year" name="year" class="form-select">
                                                <option value="">
                                                    السنة<span class="redStar">*</span>
                                                </option>
                                            </select>
                                        </div>


                                    </div>
                                </div>

                                <div class="col-6 col-lg-3">
                                    <label for="birth-place" class="form-label">محل الولادة<span
                                            class="redStar">*</span></label>
                                    <input type="text" class="form-control" id="birth-place" name="birth-place"
                                        value="<?php echo $rowm['place_birth']; ?>" />
                                </div>

                                <div class="col-6 col-lg-3">
                                    <label for="phone-number" class="form-label">رقم الهاتف<span
                                            class="redStar">*</span></label>
                                    <input type="number" class="form-control" id="phone-number" name="phone-number"
                                        placeholder="<?php echo $rowm['phone_number'];?>" readonly />
                                </div>
                                <?php
                                      $numflg= $rowm['national_card_flag'];
                                      echo $numflg;
                                         if( $numflg==="1")
                                         {
                                            echo $numflg;
                                       ?>

                                <!-- if he pick yes -->
                                <div class="col-12 col-md-6 col-lg-4 div1 ">
                                    <label for="id-province1" class="form-label">المحافظة التي صدرت منها البطاقة
                                        الوطنية<span class="redStar">*</span></label>
                                    <select class="form-select" aria-label="Default select example" id="id-province1"
                                        name="id-province1">
                                        <option disabled selected>اختر</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4 div2 ">
                                    <label for="id-number" class="form-label">رقم البطاقة الوطنية<span
                                            class="redStar">*</span></label>
                                    <input type="number" class="form-control" id="id-number" name="id-number"
                                        value="<?php echo $rowm['nationality_card_number']; ?>" />
                                </div>

                                <?php
                                         }
                                         else if ($rowm['national_card_flag']=="2")
                                         {
                                        ?>
                                <!-- if he pick no -->
                                <div class="col-12"></div>
                                <div class="col-12 col-md-6 col-xl-4 div3 d-none">
                                    <label for="id-province2" class="form-label">المحافظة التي صدرت منها هوية الاحوال
                                        المدنية<span class="redStar">*</span></label>
                                    <select class="form-select" aria-label="Default select example" id="id-province2"
                                        name="id-province2">
                                        <option disabled selected>اختر</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6 col-xl-4 div4 d-none">
                                    <label for="id-no-number" class="form-label">رقم هوية الاحوال المدنية<span
                                            class="redStar">*</span></label>
                                    <input type="number" class="form-control" id="id-no-number" name="id-number" />
                                </div>

                                <div class="ol-12 col-md-6 col-xl-4 div5 d-none">
                                    <label for="id-history-number" class="form-label">رقم سجل هوية الاحوال المدنية<span
                                            class="redStar">*</span></label>
                                    <input type="number" class="form-control" id="id-history-number"
                                        name="id-history-number" />
                                </div>
                                <div class="ol-12 col-md-6 col-xl-4 div6 d-none">
                                    <label for="id-newspaper-number" class="form-label">رقم صحيفة هوية الاحوال
                                        المدنية<span class="redStar">*</span></label>
                                    <input type="number" class="form-control" id="id-newspaper-number"
                                        name="id-newspaper-number" />
                                </div>
                                <div class="col-12 col-lg-6 col-xl-4 div7 d-none">
                                    <label class="form-label">تاريخ إصدار هوية الاحوال المدنية<span
                                            class="redStar">*</span></label>
                                    <div class="row">
                                        <div class="col-12 col-sm-4">
                                            <select id="id-day" name="id-day" class="form-select">
                                                <option value="">اليوم</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-sm-4 my-2 my-sm-0">
                                            <select id="id-month" name="id-month" class="form-select">
                                                <option value="">الشهر</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <select id="id-year" name="id-year" class="form-select">
                                                <option value="">السنة</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 col-xl-4 div8 d-none">
                                    <label for="id-certificate-number" class="form-label">رقم شهادة الجنسية<span
                                            class="redStar">*</span></label>
                                    <input type="number" class="form-control" id="id-certificate-number"
                                        name="id-certificate-number" />
                                </div>

                                <?php
                                         }
                                        ?>
                                <div class="col-12 col-md-6 col-lg-6 col-xl-5">
                                    <label for="martial-status" class="form-label">الحالة الاجتماعية<span
                                            class="redStar">*</span></label>
                                    <select class="form-select" aria-label="Default select example"
                                        name="martial-status" id="marr-type" reqiured>
                                        <option disabled selected>اختر</option>
                                        <option value="0">متزوج</option>
                                        <option value="1">ارمل</option>
                                        <option value="2">مطلق</option>
                                        <option value="3">اعزب</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6 col-xl-5 d-none child">
                                    <label for="child" class="form-label"> هل لديك اطفال؟<span
                                            class="redStar">*</span></label>
                                    <select class="form-select" aria-label="Default select example" id="child" name="">
                                        <option disabled selected>اختر</option>
                                        <option value="0">نعم</option>
                                        <option value="1">لا</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6 col-xl-5 down18 d-none">
                                    <label for="down18" class="form-label">عدد الأطفال اللذين اعمارهم اقل من 18 عام<span
                                            class="redStar">*</span></label>
                                    <select class="form-select" aria-label="Default select example" name="" id="down18">
                                        <option disabled selected>اختر</option>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>

                                    </select>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6 col-xl-5 up18 d-none">
                                    <label for="up18" class="form-label">عدد الأطفال اللذين اعمارهم اكبر من 18 عام<span
                                            class="redStar">*</span></label>
                                    <select class="form-select" aria-label="Default select example"
                                        name="martial-status" id="up18">
                                        <option disabled selected>اختر</option>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>


                                    </select>
                                </div>
                                <!-------------اسباب اعالة الاطفال الاكبر من 18 ----------------->
                                <!----##################################################################################################------>
                                <div class="col-12 col-md-3 col-lg-3 col-xl-5 ch1 d-none">
                                    <label for="" class="form-label">سبب اعالة الابن الاول فوق سن 18<span
                                            class="redStar">*</span></label>
                                    <select class="form-select" aria-label="Default select example" name="" id="">
                                        <option disabled selected>اختر</option>
                                        <option value="0">اسباب صحية </option>
                                        <option value="1">اسباب دراسية</option>
                                        <option value="2">بنت غير متزوجة</option>
                                    </select>

                                </div>
                                <div class="col-12 col-md-3 col-lg-3 col-xl-5 ch2 d-none">
                                    <label for="up18" class="form-label">سبب اعالة الابن الثاني فوق سن 18<span
                                            class="redStar">*</span></label>
                                    <select class="form-select" aria-label="Default select example" name="" id="">
                                        <option disabled selected>اختر</option>
                                        <option value="0">اسباب صحية </option>
                                        <option value="1">اسباب دراسية</option>
                                        <option value="2">بنت غير متزوجة</option>
                                    </select>

                                </div>
                                <div class="col-12 col-md-3 col-lg-3 col-xl-5 ch3 d-none">
                                    <label for="up18" class="form-label">سبب اعالة الابن الثالث فوق سن 18<span
                                            class="redStar">*</span></label>
                                    <select class="form-select" aria-label="Default select example" name="" id="">
                                        <option disabled selected>اختر</option>
                                        <option value="0">اسباب صحية </option>
                                        <option value="1">اسباب دراسية</option>
                                        <option value="2">بنت غير متزوجة</option>
                                    </select>


                                </div>
                                <div class="col-12 col-md-3 col-lg-3 col-xl-5 ch4 d-none">
                                    <label for="up18" class="form-label">سبب اعالة الابن الرابع فوق سن 18<span
                                            class="redStar">*</span></label>
                                    <select class="form-select" aria-label="Default select example" name="" id="">
                                        <option disabled selected>اختر</option>
                                        <option value="0">اسباب صحية </option>
                                        <option value="1">اسباب دراسية</option>
                                        <option value="2">بنت غير متزوجة</option>
                                    </select>

                                </div>

                                <div class="col-12 col-md-6 col-lg-6 col-xl-5">
                                    <label for="family-pay" class="form-label">هل انت معيل لاحد افراد العائلة<span
                                            class="redStar">*</span></label>
                                    <select class="form-select" aria-label="Default select example" id="family-pay"
                                        name="family-pay" >
                                        <option disabled selected>اختر</option>
                                        <option value="yes">نعم</option>
                                        <option value="no">لا</option>
                                    </select>
                                </div>
                                <!---------------------------صلة القرابة -------------------------------->
                                <div class="col-6 col-lg-3 relative d-none">
                                    <label for="birth-place" class="form-label"> صلة القرابة<span
                                            class="redStar">*</span></label>
                                    <input type="text" class="form-control" id="" name=""  />
                                </div>
                                <!--------------------------------////// القنوات ///////////----------------------------->
                                <div class="col-12 col-lg-6 col-xl-4">
                                    <label for="channel" class="form-label">قناة التقديم<span
                                            class="redStar">*</span></label>
                                    <select class="form-select" aria-label="Default select example" id="channel"
                                        name="channel" required>
                                        <option disabled selected>اختر</option>
                                        <option value="0">القناة العامة</option>
                                        <option value="1">قناة الشهداء</option>
                                        <option value="2"> قناة ضحايا الارهاب و العمليات العسكرية</option>
                                        <option value="3">قناة السجناء السياسين</option>
                                        <option value="4">قناة الناجيات الايزيديات</option>
                                    </select>
                                </div>
                                <!------------------------------------قناة الشهداء ------------------------------------------------>
                                <div class="col-12 col-lg-6 col-xl-4 Martyrs d-none ">
                                    <label for="Martyrs" class="form-label">صفة الشهيد <span
                                            class="redStar">*</span></label>
                                    <select class="form-select" aria-label="Default select example" id="Martyrs"
                                        name="Martyrs">
                                        <option disabled selected>اختر</option>
                                        <option value="0">ضحايا الارهاب </option>
                                        <option value="1">شهداء النظام البائد </option>
                                    </select>
                                </div>

                                <div class="col-6 col-lg-3 Martyrs-name d-none">
                                    <label for="Martyrs-name" class="form-label"> اسم الشهيد الرباعي<span
                                            class="redStar">*</span></label>
                                    <input type="text" class="form-control" id="Martyrs-name" name="Martyrs-name" />
                                </div>
                                <div class="col-6 col-lg-3 Martyrs-mother d-none">
                                    <label for="Martyrs-mother" class="form-label"> اسم ام الشهيد الثلاثي<span
                                            class="redStar">*</span></label>
                                    <input type="text" class="form-control" id="Martyrs-mother" name="" />
                                </div>
                                <div class="col-6 col-lg-3 Martyrs-qrarnumber d-none">
                                    <label for="Martyrs-qrarnumber" class="form-label"> رقم القرار<span
                                            class="redStar">*</span></label>
                                    <input type="number" class="form-control" id="Martyrs-qrarnumber" name="" />
                                </div>
                                <div class="col-12 col-lg-6 col-xl-4 Martyrs-qraba d-none">
                                    <label for="Martyrs-qraba" class="form-label">توصيف حالة القرابة<span
                                            class="redStar">*</span></label>
                                    <select class="form-select" aria-label="Default select example" id="Martyrs-qraba"
                                        name="channel" required>
                                        <option disabled selected>اختر</option>
                                        <option value="0">الزوج</option>
                                        <option value="1">الزوجة </option>
                                        <option value="2">الأب </option>
                                        <option value="3">الأم </option>
                                        <option value="4">الأخت</option>
                                        <option value="5">الأخ </option>
                                        <option value="6">الأبن </option>
                                        <option value="7">الأبنة </option>
                                        <option value="8">الأخ غير الشقيق</option>
                                        <option value="9">اولاد الابن </option>
                                        <option value="10">اولاد الابنة </option>
                                    </select>
                                </div>
                                <!------------------------------------قناة السجناء السياسين  ------------------->


                                <div class="col-6 col-lg-4 prisoner-name d-none">
                                    <label for="prisoner-name" class="form-label"> اسم السجين الرباعي<span
                                            class="redStar">*</span></label>
                                    <input type="text" class="form-control" id="prisoner-name" name="prisoner-name" />
                                </div>
                                <div class="col-6 col-lg-4 prisoner-mother d-none">
                                    <label for="prisoner-mother" class="form-label"> اسم ام السجين الثلاثي<span
                                            class="redStar">*</span></label>
                                    <input type="text" class="form-control" id="prisoner-mother" name="" />
                                </div>
                                <div class="col-6 col-lg-3 prisoner-qrarnumber d-none">
                                    <label for="prisoner-qrarnumber" class="form-label"> رقم القرار<span
                                            class="redStar">*</span></label>
                                    <input type="number" class="form-control" id="prisoner-qrarnumber" name="" />
                                </div>
                                <div class="col-12 col-lg-6 col-xl-4 prisoner-qraba d-none">
                                    <label for="prisoner-qraba" class="form-label">توصيف حالة القرابة<span
                                            class="redStar">*</span></label>
                                    <select class="form-select" aria-label="Default select example" id="prisoner-qraba"
                                        name="" required>
                                        <option disabled selected>اختر</option>
                                        <option value="0">انا سجين سياسي</option>
                                        <option value="1">انا ابن سجين سياسي </option>
                                        <option value="2">انا بنت سجين سياسي </option>
                                        <option value="3">انا زوج سجين سياسي </option>
                                        <option value="4">الأخت</option>
                                        <option value="5">الأخ </option>
                                        <option value="6">الأبن </option>
                                        <option value="7">الأبنة </option>
                                        <option value="8">الأخ غير الشقيق</option>
                                        <option value="9">اولاد الابن </option>
                                        <option value="10">اولاد الابنة </option>
                                    </select>
                                </div>
                                <!--------------------------------------------------------------------------->
                                <div class="col-12">
                                    <input type="submit" value="تاكيد" class="btn btn-primary" />
                                </div>
                            </form>
                            <?php
              
                                        }
              ?>



                            <?php

        
    }



    }


?>
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
    <script src="assets/js/scipt.js"></script>
</body>

</html>