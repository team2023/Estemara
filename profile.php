<?php
session_start();
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
                <div class="col-10">
                    <div class="card">
                        <div class="card-header text-center">البيانات الشخصية</div>
                        <div class="card-body">
                            <?php
                            $sqlchek = "SELECT * from personal_information where user_id = '$idgreat'";
                            $resultchek = mysqli_query($conn, $sqlchek);
                            if (mysqli_num_rows($resultchek) === 1) {
                                //echo "hjnjnjnjb";
                                $rowchk = mysqli_fetch_assoc($resultchek);
                                $flgupdate = $rowchk['personal_information_flag'];
                                if ($flgupdate == 0) {
                                    $sql = "SELECT * FROM personal_information WHERE user_id='$idgreat'";
                                    $result = mysqli_query($conn, $sql);


                                    if (mysqli_num_rows($result) === 1) {
                                        $row = mysqli_fetch_assoc($result);
                            ?>
                                        <form class="row g-3" method="POST" action="pers.php">
                                            <!-- user full name -->
                                            <div class="col-12 col-sm-6 col-md-3">
                                                <label for="first-name" class="form-label">الاسم<span class="redStar">*</span></label>
                                                <input type="text" class="form-control" id="first-name" name="first-name" placeholder="<?php echo $row['first_name']; ?>" readonly />

                                            </div>
                                            <div class="col-12 col-sm-6 col-md-3">
                                                <label for="second-name" class="form-label">اسم الاب<span class="redStar">*</span></label>
                                                <input type="text" class="form-control" id="second-name" name="second-name" placeholder="<?php echo $row['second_name']; ?>" readonly />
                                            </div>
                                            <div class="col-12 col-sm-6 col-md-3">
                                                <label for="third-name" class="form-label">اسم الجد<span class="redStar">*</span></label>
                                                <input type="text" class="form-control" id="third-name" name="third-name" placeholder="<?php echo $row['third_name']; ?>" readonly />

                                            </div>
                                            <div class="col-12 col-sm-6 col-md-3">
                                                <label for="forth-name" class="form-label"> الاسم الرابع<span class="redStar">*</span></label>
                                                <input type="text" class="form-control" id="forth-name" name="forth-name" placeholder="<?php echo $row['fourth_name']; ?>" readonly />
                                            </div>
                                            <div class="col-12 col-sm-6 col-md-3">
                                                <label for="fourth-name" class="form-label">اللقب<span class="redStar">*</span></label>
                                                <input type="text" class="form-control" id="fourth-name" name="sure_name" pattern="[ء-ي\s]+" title="يرجى إدخال الأحرف العربية فقط" required />
                                            </div>

                                            <!-- user full mother name -->
                                            <div class="col-12 col-sm-6 col-md-3">
                                                <label for="mom-first-name" class="form-label">اسم الام<span class="redStar">*</span></label>
                                                <input type="text" class="form-control" id="mom-first-name" name="mom-first-name" pattern="[ء-ي\s]+" title="يرجى إدخال الأحرف العربية فقط" required />
                                            </div>
                                            <div class="col-12 col-sm-6 col-md-3">
                                                <label for="mom-second-name" class="form-label">اسم اب الام<span class="redStar">*</span></label>
                                                <input type="text" class="form-control" id="mom-second-name" name="mom-second-name" pattern="[ء-ي\s]+" title="يرجى إدخال الأحرف العربية فقط" required />
                                            </div>
                                            <div class="col-md-3">
                                                <label for="mom-third-name" class="form-label">اسم جد الام<span class="redStar">*</span></label>
                                                <input type="text" class="form-control" id="mom-third-name" name="mom-third-name" pattern="[ء-ي\s]+" title="يرجى إدخال الأحرف العربية فقط" required />
                                            </div>

                                            <!-- personal information -->

                                            <div class="col-md-3">
                                                <label for="nationality" class="form-label">الجنسية<span class="redStar">*</span></label>
                                                <input type="text" class="form-control" id="nationality" name="nationality" placeholder="العراقية" readonly />
                                            </div>
                                            <div class="col-md-3">
                                                <label for="nationalism" class="form-label">القومية<span class="redStar">*</span></label>
                                                <select class="form-select" aria-label="Default select example" name="nationalism" id="nationalism" required>
                                                    <option disabled selected value="">اختر</option>
                                                    <?php
                                                    $ch = "SELECT * FROM ethnicity ";
                                                    $rech = mysqli_query($conn, $ch);
                                                    while ($rowchannel = mysqli_fetch_assoc($rech)) {
                                                    ?>
                                                        <option value="<?php echo $rowchannel['name']; ?>">
                                                            <?php echo $rowchannel['name']; ?></option>

                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="religion" class="form-label">الديانة<span class="redStar">*</span></label>
                                                <select class="form-select" aria-label="Default select example" name="religion" id="religion" required>
                                                    <option disabled selected value="">اختر</option>
                                                    <?php
                                                    $ch = "SELECT * FROM religon ";
                                                    $rech = mysqli_query($conn, $ch);
                                                    while ($rowchannel = mysqli_fetch_assoc($rech)) {
                                                    ?>
                                                        <option value="<?php echo $rowchannel['name']; ?>">
                                                            <?php echo $rowchannel['name']; ?></option>

                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="sex" class="form-label">الجنس<span class="redStar">*</span></label>
                                                <select class="form-select" aria-label="Default select example" name="gender" id="sex" required>
                                                    <option disabled selected>اختر</option>
                                                    <option value="ذكر">ذكر</option>
                                                    <option value="انثى">انثى</option>
                                                </select>
                                            </div>

                                            <div class="col-12 col-lg-6">
                                                <label class="form-label">تاريخ الميلاد<span class="redStar">*</span></label>
                                                <div class="row">
                                                    <div class="col-12 col-sm-4">
                                                        <select id="day" name="day" class="form-select" required>
                                                            <option value="">
                                                                اليوم<span class="redStar">*</span>
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="col-12 col-sm-4 my-2 my-sm-0">
                                                        <select id="month" name="month" class="form-select" required>
                                                            <option value="">
                                                                الشهر<span class="redStar">*</span>
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="col-12 col-sm-4">
                                                        <select id="year" name="year" class="form-select" required>
                                                            <option value="">
                                                                السنة<span class="redStar">*</span>
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6 col-lg-3">
                                                <label for="birth-place" class="form-label">محل الولادة<span class="redStar">*</span></label>
                                                <input type="text" class="form-control" id="birth-place" name="place_birth" pattern="[ء-ي\s]+" title="يرجى إدخال الأحرف العربية فقط" required />
                                            </div>

                                            <div class="col-6 col-lg-3">
                                                <label for="phone-number" class="form-label">رقم الهاتف<span class="redStar">*</span></label>
                                                <input type="number" class="form-control" id="phone-number" name="phone-number" placeholder="<?php echo $row['phone_number'];
                                                                                                                                                ?>" readonly />
                                            </div>
                                            <!-- if he pick yes -->
                                            <?php
                                            if ($row['national_card_flag'] == "1") {

                                            ?>

                                                <div class="col-12 col-md-6 col-lg-3 div2 ">
                                                    <label for="id-number" class="form-label">رقم البطاقة الوطنية<span class="redStar">*</span></label>
                                                    <input type="number" class="form-control" id="id-number" placeholder="<?php echo $row['nationality_card_number']; ?>" readonly />
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-3 div1 ">
                                                    <label for="fam-number" class="form-label">الرقم العائلي<span class="redStar">*</span></label>
                                                    <input type="text" class="form-control" id="fam-number" name="family_number" required />
                                                </div>
                                                <div class="col-12 col-lg-6 col-xl-4 div9 ">
                                                    <label class="form-label">تاريخ إصدار البطاقة الوطنية<span class="redStar">*</span></label>
                                                    <div class="row">
                                                        <div class="col-12 col-sm-4">
                                                            <select id="id-cardday" name="id-cardday" class="form-select" required>
                                                                <option value="">اليوم</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-12 col-sm-4 my-2 my-sm-0">
                                                            <select id="id-cardmonth" name="id-cardmonth" class="form-select" required>
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
                                            } else if ($row['national_card_flag'] == "2") {
                                            ?>
                                                <!-- if he pick no -->
                                                <div class="col-12"></div>
                                                <div class="col-12 col-md-6 col-xl-4 div3 ">
                                                    <label for="id-province1" class="form-label">المحافظة التي صدرت منها هوية الاحوال
                                                        المدنية<span class="redStar">*</span></label>
                                                    <select class="form-select" aria-label="Default select example" id="id-province1" name="civil_card_city" required>
                                                        <option disabled selected>اختر</option>
                                                    </select>
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-6 col-xl-4 div4 ">
                                                    <label for="id-no-number" class="form-label">رقم هوية الاحوال المدنية<span class="redStar">*</span></label>
                                                    <input type="number" class="form-control" id="id-no-number" name="id-number" value="<?php echo $row['civil_card_number']; ?>" readonly />
                                                </div>

                                                <div class="ol-12 col-md-6 col-xl-4 div5 ">
                                                    <label for="id-history-number" class="form-label">رقم سجل هوية الاحوال المدنية<span class="redStar">*</span></label>
                                                    <input type="number" class="form-control" value="" id="id-history-number" name="civil_status_ID_record" required />
                                                </div>
                                                <div class="ol-12 col-md-6 col-xl-4 div6 ">
                                                    <label for="id-newspaper-number" class="form-label">رقم صحيفة هوية الاحوال
                                                        المدنية<span class="redStar">*</span></label>
                                                    <input type="number" class="form-control" id="id-newspaper-number" value="" name="civil_status_ID_sheet_number" required />
                                                </div>
                                                <div class="col-12 col-lg-6 col-xl-4 div7 ">
                                                    <label class="form-label">تاريخ إصدار هوية الاحوال المدنية<span class="redStar">*</span></label>
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
                                                    <label for="id-certificate-number" class="form-label">رقم شهادة الجنسية<span class="redStar">*</span></label>
                                                    <input type="number" class="form-control" id="id-certificate-number" name="nationality_certificate_number" required />
                                                </div>

                                            <?php
                                            }
                                            ?>
                                            <div class="col-12 col-md-6 col-lg-6 col-xl-5">
                                                <label for="martial-status" class="form-label">الحالة الاجتماعية<span class="redStar">*</span></label>
                                                <select class="form-select" aria-label="Default select example" name="marital_status" id="marr-type" required >
                                                    <option disabled selected value="">اختر</option>
                                                    <option value="متزوج">متزوج</option>
                                                    <option value="ارمل">ارمل</option>
                                                    <option value="مطلق">مطلق</option>
                                                    <option value="اعزب">اعزب</option>
                                                </select>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-6 col-xl-5 d-none child">
                                                <label for="child" class="form-label"> هل لديك اطفال؟<span class="redStar">*</span></label>
                                                <select class="form-select" aria-label="Default select example" id="child" name="have_child">
                                                    <option disabled selected>اختر</option>
                                                    <option value="نعم">نعم</option>
                                                    <option value="كلا">كلا</option>
                                                </select>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-6 col-xl-5 down18 d-none">
                                                <label for="down18" class="form-label">عدد الأطفال اللذين اعمارهم اقل من 18 عام<span class="redStar">*</span></label>
                                                <select class="form-select" aria-label="Default select example" name="number_child_less18" id="down18">
                                                    <option disabled selected>اختر</option>
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                </select>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-6 col-xl-5 up18 d-none">
                                                <label for="up18" class="form-label">عدد الأطفال اللذين اعمارهم اكبر من 18 عام<span class="redStar">*</span></label>
                                                <select class="form-select" aria-label="Default select example" name="number_child_more18" id="up18">
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
                                                <label for="" class="form-label">سبب اعالة الابن الاول فوق سن 18<span class="redStar">*</span></label>
                                                <select class="form-select" aria-label="Default select example" name="child18_first_reason" id="">
                                                    <option disabled selected>اختر</option>
                                                    <option value="اسباب صحية">اسباب صحية</option>
                                                    <option value="اسباب دراسية">اسباب دراسية</option>
                                                    <option value="بنت غير متزوجة">بنت غير متزوجة</option>
                                                </select>

                                            </div>
                                            <div class="col-12 col-md-3 col-lg-3 col-xl-5 ch2 d-none">
                                                <label for="up18" class="form-label">سبب اعالة الابن الثاني فوق سن 18<span class="redStar">*</span></label>
                                                <select class="form-select" aria-label="Default select example" name="child18_second_reason" id="">
                                                    <option disabled selected>اختر</option>
                                                    <option value="اسباب صحية">اسباب صحية</option>
                                                    <option value="اسباب دراسية">اسباب دراسية</option>
                                                    <option value="بنت غير متزوجة">بنت غير متزوجة</option>
                                                </select>

                                            </div>
                                            <div class="col-12 col-md-3 col-lg-3 col-xl-5 ch3 d-none">
                                                <label for="up18" class="form-label">سبب اعالة الابن الثالث فوق سن 18<span class="redStar">*</span></label>
                                                <select class="form-select" aria-label="Default select example" name="child18_third_reason" id="">
                                                    <option disabled selected>اختر</option>
                                                    <option value="اسباب صحية">اسباب صحية</option>
                                                    <option value="اسباب دراسية">اسباب دراسية</option>
                                                    <option value="بنت غير متزوجة">بنت غير متزوجة</option>
                                                </select>


                                            </div>
                                            <div class="col-12 col-md-3 col-lg-3 col-xl-5 ch4 d-none">
                                                <label for="up18" class="form-label">سبب اعالة الابن الرابع فوق سن 18<span class="redStar">*</span></label>
                                                <select class="form-select" aria-label="Default select example" name="child18_fourth_reason" id="">
                                                    <option disabled selected>اختر</option>
                                                    <option value="اسباب صحية">اسباب صحية</option>
                                                    <option value="اسباب دراسية">اسباب دراسية</option>
                                                    <option value="بنت غير متزوجة">بنت غير متزوجة</option>
                                                </select>

                                            </div>

                                            <div class="col-12 col-md-6 col-lg-6 col-xl-5">
                                                <label for="family-pay" class="form-label">هل انت معيل لاحد افراد العائلة<span class="redStar">*</span></label>
                                                <select class="form-select" aria-label="Default select example" id="family-pay" name="family-pay" required>
                                                    <option disabled selected value="">اختر</option>
                                                    <option value="نعم">نعم</option>
                                                    <option value="كلا">كلا</option>
                                                </select>
                                            </div>
                                            <!---------------------------صلة القرابة -------------------------------->
                                            <div class="col-6 col-lg-3 relative d-none">
                                                <label for="birth-place" class="form-label"> صلة القرابة<span class="redStar">*</span></label>
                                                <input type="text" class="form-control" id="" name="silat_alqaraba" />
                                            </div>
                                            <!--------------------------------////// القنوات ///////////----------------------------->
                                            <div class="col-12 col-lg-6 col-xl-4">
                                                <label for="channel" class="form-label">قناة التقديم<span class="redStar">*</span></label>
                                                <select class="form-select" aria-label="Default select example" id="channel" name="channel" required>
                                                    <option disabled selected>اختر</option>
                                                    <?php
                                                    $ch = "SELECT * FROM channels ";
                                                    $rech = mysqli_query($conn, $ch);
                                                    while ($rowchannel = mysqli_fetch_assoc($rech)) {
                                                    ?>
                                                        <option value="<?php echo $rowchannel['ch_id']; ?>">
                                                            <?php echo $rowchannel['ch_name']; ?></option>

                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <!------------------------------------قناة الشهداء ------------------------------------------------>
                                            <div class="col-12 col-lg-6 col-xl-4 Martyrs d-none ">
                                                <label for="Martyrs" class="form-label">صفة الشهيد <span class="redStar">*</span></label>
                                                <select class="form-select" aria-label="Default select example" id="Martyrs" name="martyr_adjective">
                                                    <option disabled selected>اختر</option>
                                                    <option value="ضحايا الارهاب">ضحايا الارهاب </option>
                                                    <option value="شهداء النظام البائد">شهداء النظام البائد </option>
                                                </select>
                                            </div>

                                            <div class="col-6 col-lg-3 Martyrs-name d-none">
                                                <label for="Martyrs-name" class="form-label"> اسم الشهيد الرباعي<span class="redStar">*</span></label>
                                                <input type="text" class="form-control" id="Martyrs-name" name="martyr_name" pattern="[ء-ي\s]+" title="يرجى إدخال الأحرف العربية فقط" />
                                            </div>
                                            <div class="col-6 col-lg-3 Martyrs-mother d-none">
                                                <label for="Martyrs-mother" class="form-label"> اسم ام الشهيد الثلاثي<span class="redStar">*</span></label>
                                                <input type="text" class="form-control" id="Martyrs-mother" name="mart_mothname" pattern="[ء-ي\s]+" title="يرجى إدخال الأحرف العربية فقط" />
                                            </div>
                                            <div class="col-6 col-lg-3 Martyrs-qrarnumber d-none">
                                                <label for="Martyrs-qrarnumber" class="form-label"> رقم القرار<span class="redStar">*</span></label>
                                                <input type="number" class="form-control" id="Martyrs-qrarnumber" name="rqm_qrar" />
                                            </div>
                                            <div class="col-12 col-lg-6 col-xl-4 Martyrs-qraba d-none">
                                                <label for="Martyrs-qraba" class="form-label">توصيف حالة القرابة<span class="redStar">*</span></label>
                                                <select class="form-select" aria-label="Default select example" id="Martyrs-qraba" name="halt_qraba">
                                                    <option disabled selected>اختر</option>
                                                    <option value="الزوج">الزوج</option>
                                                    <option value="الزوجة">الزوجة </option>
                                                    <option value="الأب">الأب </option>
                                                    <option value="الأم">الأم </option>
                                                    <option value="الأخت">الأخت</option>
                                                    <option value="الأخ">الأخ </option>
                                                    <option value="الأبن">الأبن </option>
                                                    <option value="الأبنة">الأبنة </option>
                                                    <option value="الأخ غير الشقيق">الأخ غير الشقيق</option>
                                                    <option value="اولاد الابن">اولاد الابن </option>
                                                    <option value="اولاد الابنة">اولاد الابنة </option>
                                                </select>
                                            </div>
                                            <!------------------------------------قناة السجناء السياسين  ------------------->


                                            <div class="col-6 col-lg-4 prisoner-name d-none">
                                                <label for="prisoner-name" class="form-label"> اسم السجين الرباعي<span class="redStar">*</span></label>
                                                <input type="text" class="form-control" id="prisoner-name" name="prisoner-name" pattern="[ء-ي\s]+" title="يرجى إدخال الأحرف العربية فقط" />
                                            </div>
                                            <div class="col-6 col-lg-4 prisoner-mother d-none">
                                                <label for="prisoner-mother" class="form-label"> اسم ام السجين الثلاثي<span class="redStar">*</span></label>
                                                <input type="text" class="form-control" id="prisoner-mother" name="prisoner-mother" pattern="[ء-ي\s]+" title="يرجى إدخال الأحرف العربية فقط" />
                                            </div>
                                            <div class="col-6 col-lg-3 prisoner-qrarnumber d-none">
                                                <label for="prisoner-qrarnumber" class="form-label"> رقم القرار<span class="redStar">*</span></label>
                                                <input type="number" class="form-control" id="prisoner-qrarnumber" name="rqm_qrar" />
                                            </div>
                                            <div class="col-12 col-lg-6 col-xl-4 prisoner-qraba d-none">
                                                <label for="prisoner-qraba" class="form-label">توصيف حالة القرابة<span class="redStar">*</span></label>
                                                <select class="form-select" aria-label="Default select example" id="prisoner-qraba" name="halt_qraba">
                                                    <option disabled selected>اختر</option>
                                                    <option value="انا سجين سياسي">انا سجين سياسي</option>
                                                    <option value="انا ابن سجين سياسي">انا ابن سجين سياسي </option>
                                                    <option value="انا بنت سجين سياسي">انا بنت سجين سياسي </option>
                                                    <option value="انا زوج سجين سياسي">انا زوج سجين سياسي </option>
                                                    <option value="الأخت">الأخت</option>
                                                    <option value="الأخ">الأخ </option>
                                                    <option value="الأبن">الأبن </option>
                                                    <option value="الأبنة">الأبنة </option>
                                                    <option value="الأخ غير الشقيق">الأخ غير الشقيق</option>
                                                    <option value="اولاد الابن">اولاد الابن </option>
                                                    <option value="اولاد الابنة">اولاد الابنة </option>
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


                                else if ($flgupdate == 1) {
                                    $sqlm = "SELECT * FROM personal_information WHERE user_id='$idgreat'";
                                    $resultm = mysqli_query($conn, $sqlm);
                                    if (mysqli_num_rows($resultm)) {
                                        $rowm = mysqli_fetch_assoc($resultm);

                                    ?>
                                        <form class="row g-3" method="POST" action="uppers.php">
                                            <!-- user full name -->
                                            <div class="col-12 col-sm-6 col-md-3">
                                                <label for="first-name" class="form-label">الاسم<span class="redStar">*</span></label>
                                                <input type="text" class="form-control" id="first-name" name="first-name" placeholder="<?php echo $rowm['first_name']; ?>" readonly />

                                            </div>
                                            <div class="col-12 col-sm-6 col-md-3">
                                                <label for="second-name" class="form-label">اسم الاب<span class="redStar">*</span></label>
                                                <input type="text" class="form-control" id="second-name" name="second-name" placeholder="<?php echo $rowm['second_name']; ?>" readonly />
                                            </div>
                                            <div class="col-12 col-sm-6 col-md-3">
                                                <label for="third-name" class="form-label">اسم الجد<span class="redStar">*</span></label>
                                                <input type="text" class="form-control" id="third-name" name="third-name" placeholder="<?php echo $rowm['third_name']; ?>" readonly />

                                            </div>
                                            <div class="col-12 col-sm-6 col-md-3">
                                                <label for="forth-name" class="form-label"> الاسم الرابع<span class="redStar">*</span></label>
                                                <input type="text" class="form-control" id="forth-name" name="forth-name" placeholder="<?php echo $rowm['fourth_name']; ?>" readonly />
                                            </div>
                                            <div class="col-12 col-sm-6 col-md-3">
                                                <label for="fourth-name" class="form-label">اللقب<span class="redStar">*</span></label>
                                                <input type="text" class="form-control" id="fourth-name" value="<?php echo $rowm['sure_name']; ?>" name="sure_name" pattern="[ء-ي\s]+" title="يرجى إدخال الأحرف العربية فقط" required />
                                            </div>

                                            <!-- user full mother name -->
                                            <div class="col-12 col-sm-6 col-md-3">
                                                <label for="mom-first-name" class="form-label">اسم الام<span class="redStar">*</span></label>
                                                <input type="text" class="form-control" id="mom-first-name" value="<?php echo $rowm['mother_firstname']; ?>" name="mom-first-name" pattern="[ء-ي\s]+" title="يرجى إدخال الأحرف العربية فقط" reqiured />
                                            </div>
                                            <div class="col-12 col-sm-6 col-md-3">
                                                <label for="mom-second-name" class="form-label">اسم اب الام<span class="redStar">*</span></label>
                                                <input type="text" class="form-control" value="<?php echo $rowm['mother_secondname']; ?>" id="mom-second-name" name="mom-second-name" pattern="[ء-ي\s]+" title="يرجى إدخال الأحرف العربية فقط" required />
                                            </div>
                                            <div class="col-md-3">
                                                <label for="mom-third-name" class="form-label">اسم جد الام<span class="redStar">*</span></label>
                                                <input type="text" class="form-control" id="mom-third-name" value="<?php echo $rowm['mother_thirdname']; ?>" name="mom-third-name" pattern="[ء-ي\s]+" title="يرجى إدخال الأحرف العربية فقط" required />
                                            </div>

                                            <!-- personal information -->

                                            <div class="col-md-3">
                                                <label for="nationality" class="form-label">الجنسية<span class="redStar">*</span></label>
                                                <input type="text" class="form-control" id="nationality" name="nationality" placeholder="العراقية" readonly />
                                            </div>
                                            <div class="col-md-3">
                                                <label for="nationalism" class="form-label">القومية<span class="redStar">*</span></label>
                                                <select class="form-select" aria-label="Default select example" value="<?php echo $rowm['nationalism']; ?>" name="nationalism" id="nationalism" reqiured>
                                                    <option value="<?php echo $rowm['nationalism']; ?>">
                                                        <?php echo $rowm['nationalism']; ?></option>
                                                    <option value="عربي">عربي</option>
                                                    <option value="اجنبي">كردي</option>
                                                    <option value="تركماني">تركماني</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="religion" class="form-label">الديانة<span class="redStar">*</span></label>
                                                <select class="form-select" aria-label="Default select example" value="<?php echo $rowm['religion']; ?>" name="religion" id="religion" reqiured>
                                                    <option value="<?php echo $rowm['religion']; ?>">
                                                        <?php echo $rowm['religion']; ?></option>
                                                    <option value="مسلم">مسلم</option>
                                                    <option value="مسيحي">مسيحي</option>
                                                    <option value="يزيدي">يزيدي</option>
                                                    <option value="يهودي">يهودي</option>
                                                    <option value="اخرى">اخرى</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="sex" class="form-label">الجنس<span class="redStar">*</span></label>
                                                <select class="form-select" aria-label="Default select example" value="<?php echo $rowm['gender']; ?>" name="gender" id="sex">
                                                    <option value="<?php echo $rowm['gender']; ?>"><?php echo $rowm['gender']; ?>
                                                    </option>
                                                    <option value="ذكر">ذكر</option>
                                                    <option value="انثى">انثى</option>
                                                </select>
                                            </div>
                                            <?php
                                            $str = $rowm['brithday_date'];
                                            $dateper = (explode("-", $str));
                                            ?>
                                            <div class="col-12 col-lg-6">
                                                <label class="form-label">تاريخ الميلاد<span class="redStar">*</span></label>
                                                <div class="row">
                                                    <div class="col-12 col-sm-4">
                                                        <select id="day" name="day" class="form-select">
                                                            <option value="<?php echo $dateper[0] ?>">
                                                                <?php echo $dateper[0] ?>
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="col-12 col-sm-4 my-2 my-sm-0">
                                                        <select id="month" name="month" class="form-select" reqiured>
                                                            <option value="<?php echo $dateper[1] ?>">
                                                                <?php echo $dateper[1] ?>
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="col-12 col-sm-4">
                                                        <select id="year" name="year" class="form-select" reqiured>
                                                            <option value="<?php echo $dateper[2] ?>">
                                                                <?php echo $dateper[2] ?>
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6 col-lg-3">
                                                <label for="birth-place" class="form-label">محل الولادة<span class="redStar">*</span></label>
                                                <input type="text" class="form-control" id="birth-place" value="<?php echo $rowm['place_birth']; ?>" name="place_birth" pattern="[ء-ي\s]+" title="يرجى إدخال الأحرف العربية فقط" required />
                                            </div>

                                            <div class="col-6 col-lg-3">
                                                <label for="phone-number" class="form-label">رقم الهاتف<span class="redStar">*</span></label>
                                                <input type="number" class="form-control" id="phone-number" name="phone-number" placeholder="<?php echo $rowm['phone_number'];
                                                                                                                                                ?>" readonly />
                                            </div>



                                            <!-- if he pick yes -->
                                            <?php
                                            if ($rowm['national_card_flag'] == "1") {

                                            ?>

                                                <div class="col-12 col-md-6 col-lg-3 div2 ">
                                                    <label for="id-number" class="form-label">رقم البطاقة الوطنية<span class="redStar">*</span></label>
                                                    <input type="number" class="form-control" id="id-number" placeholder="<?php echo $rowm['nationality_card_number']; ?>" readonly />
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-3 div1 ">
                                                    <label for="fam-number" class="form-label">الرقم العائلي<span class="redStar">*</span></label>
                                                    <input type="text" class="form-control" id="fam-number" value="<?php echo $rowm['family_number']; ?>" name="family_number" required />
                                                </div>
                                                <?php
                                                $str2 = $rowm['national_card_date'];;
                                                $carddate = (explode("-", $str2));
                                                ?>
                                                <div class="col-12 col-lg-6 col-xl-4 div9 ">
                                                    <label class="form-label">تاريخ إصدار البطاقة الوطنية<span class="redStar">*</span></label>
                                                    <div class="row">
                                                        <div class="col-12 col-sm-4">
                                                            <select id="id-cardday" name="id-cardday" class="form-select" reqiured>

                                                                <option value="<?php echo $carddate[0]; ?>"><?php echo $carddate[0]; ?>
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="col-12 col-sm-4 my-2 my-sm-0">
                                                            <select id="id-cardmonth" name="id-cardmonth" class="form-select">
                                                                <option value="<?php echo $carddate[1]; ?>"><?php echo $carddate[1]; ?>
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="col-12 col-sm-4">
                                                            <select id="id-cardyear" name="id-cardyear" class="form-select" required>
                                                                <option value="<?php echo $carddate[2]; ?>"><?php echo $carddate[2]; ?>
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                            } else if ($rowm['national_card_flag'] == "2") {
                                            ?>
                                                <!-- if he pick no -->
                                                <div class="col-12"></div>
                                                <div class="col-12 col-md-6 col-xl-4 div3 ">
                                                    <label for="id-province1" class="form-label">المحافظة التي صدرت منها هوية الاحوال
                                                        المدنية<span class="redStar">*</span></label>
                                                    <select class="form-select" aria-label="Default select example" id="id-province1" name="civil_card_city">
                                                        <option value="<?php echo $rowm['civil_card_city']; ?>"><?php echo $rowm['civil_card_city']; ?></option>
                                                    </select>
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-6 col-xl-4 div4 ">
                                                    <label for="id-no-number" class="form-label">رقم هوية الاحوال المدنية<span class="redStar">*</span></label>
                                                    <input type="number" class="form-control" placeholder="<?php echo $rowm['civil_card_number']; ?>" id="id-no-number" name="id-number" />
                                                </div>

                                                <div class="ol-12 col-md-6 col-xl-4 div5 ">
                                                    <label for="id-history-number" class="form-label">رقم سجل هوية الاحوال المدنية<span class="redStar">*</span></label>
                                                    <input type="number" class="form-control" value="<?php echo $rowm['civil_status_ID_record']; ?>" id="id-history-number" name="civil_status_ID_record" required />
                                                </div>
                                                <div class="ol-12 col-md-6 col-xl-4 div6 ">
                                                    <label for="id-newspaper-number" class="form-label">رقم صحيفة هوية الاحوال
                                                        المدنية<span class="redStar">*</span></label>
                                                    <input type="number" class="form-control" value="<?php echo $rowm['civil_status_ID_sheet_number']; ?>" id="id-newspaper-number" name="civil_status_ID_sheet_number" required />
                                                </div>
                                                <?php
                                                $str3 = $rowm['civil_date_card'];
                                                $jansi = (explode("-", $str3));
                                                ?>
                                                <div class="col-12 col-lg-6 col-xl-4 div7 ">
                                                    <label class="form-label">تاريخ إصدار هوية الاحوال المدنية<span class="redStar">*</span></label>
                                                    <div class="row">
                                                        <div class="col-12 col-sm-4">
                                                            <select id="id-day" name="id-day" class="form-select" reqiured>
                                                                <option value="<?php echo $jansi[0]; ?>"><?php echo $jansi[0]; ?>
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="col-12 col-sm-4 my-2 my-sm-0">
                                                            <select id="id-month" name="id-month" class="form-select" required>
                                                                <option value="<?php echo $jansi[1]; ?>"><?php echo $jansi[1]; ?>
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="col-12 col-sm-4">
                                                            <select id="id-year" name="id-year" class="form-select" required>
                                                                <option value="<?php echo $jansi[2]; ?>"><?php echo $jansi[2]; ?>
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-6 col-xl-4 div8 ">
                                                    <label for="id-certificate-number" class="form-label">رقم شهادة الجنسية<span class="redStar">*</span></label>
                                                    <input type="number" class="form-control" value="<?php echo $rowm['nationality_certificate_number']; ?>" id="id-certificate-number" name="nationality_certificate_number" required />
                                                </div>
                                            <?php
                                            }
                                            ?>
                                            <div class="col-12 col-md-6 col-lg-6 col-xl-5">
                                                <label for="martial-status" class="form-label">الحالة الاجتماعية<span class="redStar">*</span></label>
                                                <select class="form-select" aria-label="Default select example" name="marital_status" id="marr-type" value="<?php echo $rowm['marital_status']; ?>" reqiured>
                                                    <option value="<?php echo $rowm['marital_status']; ?>">
                                                        <?php echo $rowm['marital_status']; ?></option>
                                                    <option value="متزوج">متزوج</option>
                                                    <option value="ارمل">ارمل</option>
                                                    <option value="مطلق">مطلق</option>
                                                    <option value="اعزب">اعزب</option>
                                                </select>
                                            </div>
                                            <?php
                                            if (($rowm['marital_status'] == "اعزب")) {
                                            ?>
                                                <div class="col-12 col-md-6 col-lg-6 col-xl-5 d-none child">
                                                    <label for="child" class="form-label"> هل لديك اطفال؟<span class="redStar">*</span></label>
                                                    <select class="form-select" aria-label="Default select example" id="child" value="<?php echo $rowm['have_child']; ?>" name="have_child">
                                                        <option disabled selected>اختر</option>
                                                        <option value="نعم">نعم</option>
                                                        <option value="كلا">كلا</option>
                                                    </select>
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-6 col-xl-5 down18 d-none">
                                                    <label for="down18" class="form-label">عدد الأطفال اللذين اعمارهم اقل من 18 عام<span class="redStar">*</span></label>
                                                    <select class="form-select" aria-label="Default select example" name="number_child_less18" id="down18">
                                                        <option disabled selected>اختر</option>
                                                        <option value="0">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>

                                                    </select>
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-6 col-xl-5 up18 d-none">
                                                    <label for="up18" class="form-label">عدد الأطفال اللذين اعمارهم اكبر من 18 عام<span class="redStar">*</span></label>
                                                    <select class="form-select" aria-label="Default select example" name="number_child_more18" id="up18">
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
                                                    <label for="" class="form-label">سبب اعالة الابن الاول فوق سن 18<span class="redStar">*</span></label>
                                                    <select class="form-select" aria-label="Default select example" name="" id="">
                                                        <option disabled selected>اختر</option>
                                                        <option value="اسباب صحية">اسباب صحية</option>
                                                        <option value="اسباب دراسية">اسباب دراسية</option>
                                                        <option value="بنت غير متزوجة">بنت غير متزوجة</option>
                                                    </select>

                                                </div>
                                                <div class="col-12 col-md-3 col-lg-3 col-xl-5 ch2 d-none">
                                                    <label for="up18" class="form-label">سبب اعالة الابن الثاني فوق سن 18<span class="redStar">*</span></label>
                                                    <select class="form-select" aria-label="Default select example" name="" id="">
                                                        <option disabled selected>اختر</option>
                                                        <option value="اسباب صحية">اسباب صحية</option>
                                                        <option value="اسباب دراسية">اسباب دراسية</option>
                                                        <option value="بنت غير متزوجة">بنت غير متزوجة</option>
                                                    </select>

                                                </div>
                                                <div class="col-12 col-md-3 col-lg-3 col-xl-5 ch3 d-none">
                                                    <label for="up18" class="form-label">سبب اعالة الابن الثالث فوق سن 18<span class="redStar">*</span></label>
                                                    <select class="form-select" aria-label="Default select example" name="" id="">
                                                        <option disabled selected>اختر</option>
                                                        <option value="اسباب صحية">اسباب صحية</option>
                                                        <option value="اسباب دراسية">اسباب دراسية</option>
                                                        <option value="بنت غير متزوجة">بنت غير متزوجة</option>
                                                    </select>


                                                </div>
                                                <div class="col-12 col-md-3 col-lg-3 col-xl-5 ch4 d-none">
                                                    <label for="up18" class="form-label">سبب اعالة الابن الرابع فوق سن 18<span class="redStar">*</span></label>
                                                    <select class="form-select" aria-label="Default select example" name="" id="">
                                                        <option disabled selected>اختر</option>
                                                        <option value="اسباب صحية">اسباب صحية</option>
                                                        <option value="اسباب دراسية">اسباب دراسية</option>
                                                        <option value="بنت غير متزوجة">بنت غير متزوجة</option>
                                                    </select>

                                                </div>

                                            <?php
                                            } else {
                                            ?>
                                                <div class="col-12 col-md-6 col-lg-6 col-xl-5  child">
                                                    <label for="child" class="form-label"> هل لديك اطفال؟<span class="redStar">*</span></label>
                                                    <select class="form-select" aria-label="Default select example" id="child" value="<?php echo $rowm['have_child']; ?>" name="have_child">
                                                        <option value="<?php echo $rowm['have_child']; ?>">
                                                            <?php echo $rowm['have_child']; ?></option>
                                                        <option value="نعم">نعم</option>
                                                        <option value="كلا">كلا</option>
                                                    </select>
                                                </div>

                                                <?php
                                                if ($rowm['have_child'] == "نعم") {
                                                ?>
                                                    <div class="col-12 col-md-6 col-lg-6 col-xl-5 down18 ">
                                                        <label for="down18" class="form-label">عدد الأطفال اللذين اعمارهم اقل من 18 عام<span class="redStar">*</span></label>
                                                        <select class="form-select" aria-label="Default select example" value="<?php echo $rowm['number_child_less18']; ?>" name="number_child_less18" id="down18">
                                                            <option value="<?php echo $rowm['number_child_less18']; ?>">
                                                                <?php echo $rowm['number_child_less18']; ?></option>
                                                            <option value="0">0</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>

                                                        </select>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-6 col-xl-5 up18 ">
                                                        <label for="up18" class="form-label">عدد الأطفال اللذين اعمارهم اكبر من 18 عام<span class="redStar">*</span></label>
                                                        <select class="form-select" value="<?php echo $rowm['number_child_more18']; ?>" aria-label="Default select example" name="number_child_more18" id="up18">
                                                            <option value="<?php echo $rowm['number_child_more18']; ?>">
                                                                <?php echo $rowm['number_child_more18']; ?></option>
                                                            <option value="0">0</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                        </select>
                                                    </div>
                                                    <?php
                                                    if ($rowm['number_child_more18'] == "1") {
                                                        $chid1 = "1";
                                                        $chid2 = " ";
                                                        $chid3 = " ";
                                                        $chid4 = " ";
                                                    ?>
                                                        <!-------------اسباب اعالة الاطفال الاكبر من 18 ----------------->
                                                        <!----##################################################################################################------>
                                                        <div class="col-12 col-md-3 col-lg-3 col-xl-5 ch1 ">
                                                            <label for="" class="form-label">سبب اعالة الابن الاول فوق سن 18<span class="redStar">*</span></label>
                                                            <select class="form-select" aria-label="Default select example" value="<?php echo $rowm['child18_first_reason']; ?>" name="child18_first_reason" id="">
                                                                <option value="<?php echo $rowm['child18_first_reason']; ?>">
                                                                    <?php echo $rowm['child18_first_reason']; ?></option>
                                                                <option value="اسباب صحية">اسباب صحية</option>
                                                                <option value="اسباب دراسية">اسباب دراسية</option>
                                                                <option value="بنت غير متزوجة">بنت غير متزوجة</option>
                                                            </select>

                                                        </div>
                                                        <div class="col-12 col-md-3 col-lg-3 col-xl-5 ch2 d-none">
                                                            <label for="up18" class="form-label">سبب اعالة الابن الثاني فوق سن 18<span class="redStar">*</span></label>
                                                            <select class="form-select" aria-label="Default select example" name="child18_second_reason" id="">
                                                                <option disabled selected>اختر</option>
                                                                <option value="اسباب صحية">اسباب صحية</option>
                                                                <option value="اسباب دراسية">اسباب دراسية</option>
                                                                <option value="بنت غير متزوجة">بنت غير متزوجة</option>
                                                            </select>

                                                        </div>
                                                        <div class="col-12 col-md-3 col-lg-3 col-xl-5 ch3 d-none">
                                                            <label for="up18" class="form-label">سبب اعالة الابن الثالث فوق سن 18<span class="redStar">*</span></label>
                                                            <select class="form-select" aria-label="Default select example" name="child18_third_reason" id="">
                                                                <option disabled selected>اختر</option>
                                                                <option value="اسباب صحية">اسباب صحية</option>
                                                                <option value="اسباب دراسية">اسباب دراسية</option>
                                                                <option value="بنت غير متزوجة">بنت غير متزوجة</option>
                                                            </select>


                                                        </div>
                                                        <div class="col-12 col-md-3 col-lg-3 col-xl-5 ch4 d-none">
                                                            <label for="up18" class="form-label">سبب اعالة الابن الرابع فوق سن 18<span class="redStar">*</span></label>
                                                            <select class="form-select" aria-label="Default select example" name="child18_fourth_reason" id="">
                                                                <option disabled selected>اختر</option>
                                                                <option value="اسباب صحية">اسباب صحية</option>
                                                                <option value="اسباب دراسية">اسباب دراسية</option>
                                                                <option value="بنت غير متزوجة">بنت غير متزوجة</option>
                                                            </select>

                                                        </div>

                                                    <?php
                                                    } elseif ($rowm['number_child_more18'] == "2") {
                                                        $chid1 = "1";
                                                        $chid2 = "1";
                                                        $chid3 = " ";
                                                        $chid4 = " ";
                                                    ?>
                                                        <div class="col-12 col-md-3 col-lg-3 col-xl-5 ch1 ">
                                                            <label for="" class="form-label">سبب اعالة الابن الاول فوق سن 18<span class="redStar">*</span></label>
                                                            <select class="form-select" aria-label="Default select example" value="<?php echo $rowm['child18_first_reason']; ?>" name="child18_first_reason" id="">
                                                                <option value="<?php echo $rowm['child18_first_reason']; ?>">
                                                                    <?php echo $rowm['child18_first_reason']; ?></option>
                                                                <option value="اسباب صحية">اسباب صحية</option>
                                                                <option value="اسباب دراسية">اسباب دراسية</option>
                                                                <option value="بنت غير متزوجة">بنت غير متزوجة</option>
                                                            </select>

                                                        </div>
                                                        <div class="col-12 col-md-3 col-lg-3 col-xl-5 ch2 ">
                                                            <label for="up18" class="form-label">سبب اعالة الابن الثاني فوق سن 18<span class="redStar">*</span></label>
                                                            <select class="form-select" aria-label="Default select example" value="<?php echo $rowm['child18_second_reason']; ?>" name="child18_second_reason" id="">
                                                                <option value="<?php echo $rowm['child18_second_reason']; ?>">
                                                                    <?php echo $rowm['child18_second_reason']; ?></option>
                                                                <option value="اسباب صحية">اسباب صحية</option>
                                                                <option value="اسباب دراسية">اسباب دراسية</option>
                                                                <option value="بنت غير متزوجة">بنت غير متزوجة</option>
                                                            </select>

                                                        </div>
                                                        <div class="col-12 col-md-3 col-lg-3 col-xl-5 ch3 d-none">
                                                            <label for="up18" class="form-label">سبب اعالة الابن الثالث فوق سن 18<span class="redStar">*</span></label>
                                                            <select class="form-select" aria-label="Default select example" name="child18_third_reason" id="">
                                                                <option disabled selected>اختر</option>
                                                                <option value="اسباب صحية">اسباب صحية</option>
                                                                <option value="اسباب دراسية">اسباب دراسية</option>
                                                                <option value="بنت غير متزوجة">بنت غير متزوجة</option>
                                                            </select>


                                                        </div>
                                                        <div class="col-12 col-md-3 col-lg-3 col-xl-5 ch4 d-none">
                                                            <label for="up18" class="form-label">سبب اعالة الابن الرابع فوق سن 18<span class="redStar">*</span></label>
                                                            <select class="form-select" aria-label="Default select example" name="child18_fourth_reason" id="">
                                                                <option disabled selected>اختر</option>
                                                                <option value="اسباب صحية">اسباب صحية</option>
                                                                <option value="اسباب دراسية">اسباب دراسية</option>
                                                                <option value="بنت غير متزوجة">بنت غير متزوجة</option>
                                                            </select>

                                                        </div>

                                                    <?php
                                                    } elseif ($rowm['number_child_more18'] == "3") {
                                                        $chid1 = "1";
                                                        $chid2 = "1";
                                                        $chid3 = "1";
                                                        $chid4 = " ";
                                                    ?>
                                                        <div class="col-12 col-md-3 col-lg-3 col-xl-5 ch1 ">
                                                            <label for="" class="form-label">سبب اعالة الابن الاول فوق سن 18<span class="redStar">*</span></label>
                                                            <select class="form-select" aria-label="Default select example" value="<?php echo $rowm['child18_first_reason']; ?>" name="child18_first_reason" id="">
                                                                <option value="<?php echo $rowm['child18_first_reason']; ?>">
                                                                    <?php echo $rowm['child18_first_reason']; ?></option>
                                                                <option value="اسباب صحية">اسباب صحية</option>
                                                                <option value="اسباب دراسية">اسباب دراسية</option>
                                                                <option value="بنت غير متزوجة">بنت غير متزوجة</option>
                                                            </select>

                                                        </div>
                                                        <div class="col-12 col-md-3 col-lg-3 col-xl-5 ch2 ">
                                                            <label for="up18" class="form-label">سبب اعالة الابن الثاني فوق سن 18<span class="redStar">*</span></label>
                                                            <select class="form-select" aria-label="Default select example" value="<?php echo $rowm['child18_second_reason']; ?>" name="child18_second_reason" id="">
                                                                <option value="<?php echo $rowm['child18_second_reason']; ?>">
                                                                    <?php echo $rowm['child18_second_reason']; ?></option>
                                                                <option value="اسباب صحية">اسباب صحية</option>
                                                                <option value="اسباب دراسية">اسباب دراسية</option>
                                                                <option value="بنت غير متزوجة">بنت غير متزوجة</option>
                                                            </select>

                                                        </div>
                                                        <div class="col-12 col-md-3 col-lg-3 col-xl-5 ch3 ">
                                                            <label for="up18" class="form-label">سبب اعالة الابن الثالث فوق سن 18<span class="redStar">*</span></label>
                                                            <select class="form-select" aria-label="Default select example" value="<?php echo $rowm['child18_third_reason']; ?>" name="child18_third_reason" id="">
                                                                <option value="<?php echo $rowm['child18_third_reason']; ?>">
                                                                    <?php echo $rowm['child18_third_reason']; ?></option>
                                                                <option value="اسباب صحية">اسباب صحية</option>
                                                                <option value="اسباب دراسية">اسباب دراسية</option>
                                                                <option value="بنت غير متزوجة">بنت غير متزوجة</option>
                                                            </select>


                                                        </div>
                                                        <div class="col-12 col-md-3 col-lg-3 col-xl-5 ch4 d-none">
                                                            <label for="up18" class="form-label">سبب اعالة الابن الرابع فوق سن 18<span class="redStar">*</span></label>
                                                            <select class="form-select" aria-label="Default select example" name="child18_fourth_reason" id="">
                                                                <option disabled selected>اختر</option>
                                                                <option value="اسباب صحية">اسباب صحية</option>
                                                                <option value="اسباب دراسية">اسباب دراسية</option>
                                                                <option value="بنت غير متزوجة">بنت غير متزوجة</option>
                                                            </select>

                                                        </div>

                                                    <?php
                                                    } elseif ($rowm['number_child_more18'] == "4") {
                                                        $chid1 = "1";
                                                        $chid2 = "1";
                                                        $chid3 = "1";
                                                        $chid4 = "1";
                                                    ?>
                                                        <div class="col-12 col-md-3 col-lg-3 col-xl-5 ch1 ">
                                                            <label for="" class="form-label">سبب اعالة الابن الاول فوق سن 18<span class="redStar">*</span></label>
                                                            <select class="form-select" aria-label="Default select example" value="<?php echo $rowm['child18_first_reason']; ?>" name="child18_first_reason" id="">
                                                                <option value="<?php echo $rowm['child18_first_reason']; ?>">
                                                                    <?php echo $rowm['child18_first_reason']; ?></option>
                                                                <option value="اسباب صحية">اسباب صحية</option>
                                                                <option value="اسباب دراسية">اسباب دراسية</option>
                                                                <option value="بنت غير متزوجة">بنت غير متزوجة</option>
                                                            </select>

                                                        </div>
                                                        <div class="col-12 col-md-3 col-lg-3 col-xl-5 ch2 ">
                                                            <label for="up18" class="form-label">سبب اعالة الابن الثاني فوق سن 18<span class="redStar">*</span></label>
                                                            <select class="form-select" aria-label="Default select example" value="<?php echo $rowm['child18_second_reason']; ?>" name="child18_second_reason" id="">
                                                                <option value="<?php echo $rowm['child18_second_reason']; ?>">
                                                                    <?php echo $rowm['child18_second_reason']; ?></option>
                                                                <option value="اسباب صحية">اسباب صحية</option>
                                                                <option value="اسباب دراسية">اسباب دراسية</option>
                                                                <option value="بنت غير متزوجة">بنت غير متزوجة</option>
                                                            </select>

                                                        </div>
                                                        <div class="col-12 col-md-3 col-lg-3 col-xl-5 ch3 ">
                                                            <label for="up18" class="form-label">سبب اعالة الابن الثالث فوق سن 18<span class="redStar">*</span></label>
                                                            <select class="form-select" aria-label="Default select example" value="<?php echo $rowm['child18_third_reason']; ?>" name="child18_third_reason" id="">
                                                                <option value="<?php echo $rowm['child18_third_reason']; ?>">
                                                                    <?php echo $rowm['child18_third_reason']; ?></option>
                                                                <option value="اسباب صحية">اسباب صحية</option>
                                                                <option value="اسباب دراسية">اسباب دراسية</option>
                                                                <option value="بنت غير متزوجة">بنت غير متزوجة</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-12 col-md-3 col-lg-3 col-xl-5 ch4 ">
                                                            <label for="up18" class="form-label">سبب اعالة الابن الرابع فوق سن 18<span class="redStar">*</span></label>
                                                            <select class="form-select" aria-label="Default select example" value="<?php echo $rowm['child18_fourth_reason']; ?>" name="child18_fourth_reason" id="">
                                                                <option value="<?php echo $rowm['child18_fourth_reason']; ?>">
                                                                    <?php echo $rowm['child18_fourth_reason']; ?></option>
                                                                <option value="اسباب صحية">اسباب صحية</option>
                                                                <option value="اسباب دراسية">اسباب دراسية</option>
                                                                <option value="بنت غير متزوجة">بنت غير متزوجة</option>
                                                            </select>

                                                        </div>


                                                    <?php
                                                    }
                                                    ?>


                                                    <!--<div class="col-12 col-md-6 col-lg-6 col-xl-5">
                                    <label for="family-pay" class="form-label">هل انت معيل لاحد افراد العائلة<span
                                            class="redStar">*</span></label>
                                    <select class="form-select" aria-label="Default select example" id="family-pay"
                                        name="family-pay" required>
                                        <option disabled selected>اختر</option>
                                        <option value="yes">نعم</option>
                                        <option value="no">لا</option>
                                    </select>
                                </div>-->
                                                    <!---------------------------صلة القرابة -------------------------------->
                                                    <!--<div class="col-6 col-lg-3 relative d-none">
                                    <label for="birth-place" class="form-label"> صلة القرابة<span
                                            class="redStar">*</span></label>
                                    <input type="text" class="form-control" id="" name="" />
                                </div>-->
                                                <?php
                                                } elseif ($rowm['have_child'] == "كلا") {
                                                ?>

                                                    <div class="col-12 col-md-6 col-lg-6 col-xl-5 down18 d-none ">
                                                        <label for="down18" class="form-label">عدد الأطفال اللذين اعمارهم اقل من 18 عام<span class="redStar">*</span></label>
                                                        <select class="form-select" aria-label="Default select example" name="number_child_less18" id="down18">
                                                            <option disabled selected>اختر</option>
                                                            <option value="0">0</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>

                                                        </select>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-6 col-xl-5 up18 d-none">
                                                        <label for="up18" class="form-label">عدد الأطفال اللذين اعمارهم اكبر من 18 عام<span class="redStar">*</span></label>
                                                        <select class="form-select" aria-label="Default select example" name="number_child_more18" id="up18">
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
                                                        <label for="" class="form-label">سبب اعالة الابن الاول فوق سن 18<span class="redStar">*</span></label>
                                                        <select class="form-select" aria-label="Default select example" name="child18_first_reason" id="">
                                                            <option disabled selected>اختر</option>
                                                            <option value="اسباب صحية">اسباب صحية</option>
                                                            <option value="اسباب دراسية">اسباب دراسية</option>
                                                            <option value="بنت غير متزوجة">بنت غير متزوجة</option>
                                                        </select>

                                                    </div>
                                                    <div class="col-12 col-md-3 col-lg-3 col-xl-5 ch2 d-none">
                                                        <label for="up18" class="form-label">سبب اعالة الابن الثاني فوق سن 18<span class="redStar">*</span></label>
                                                        <select class="form-select" aria-label="Default select example" name="child18_second_reason" id="">
                                                            <option disabled selected>اختر</option>
                                                            <option value="اسباب صحية">اسباب صحية</option>
                                                            <option value="اسباب دراسية">اسباب دراسية</option>
                                                            <option value="بنت غير متزوجة">بنت غير متزوجة</option>
                                                        </select>

                                                    </div>
                                                    <div class="col-12 col-md-3 col-lg-3 col-xl-5 ch3 d-none">
                                                        <label for="up18" class="form-label">سبب اعالة الابن الثالث فوق سن 18<span class="redStar">*</span></label>
                                                        <select class="form-select" aria-label="Default select example" name="child18_third_reason" id="">
                                                            <option disabled selected>اختر</option>
                                                            <option value="اسباب صحية">اسباب صحية</option>
                                                            <option value="اسباب دراسية">اسباب دراسية</option>
                                                            <option value="بنت غير متزوجة">بنت غير متزوجة</option>
                                                        </select>


                                                    </div>
                                                    <div class="col-12 col-md-3 col-lg-3 col-xl-5 ch4 d-none">
                                                        <label for="up18" class="form-label">سبب اعالة الابن الرابع فوق سن 18<span class="redStar">*</span></label>
                                                        <select class="form-select" aria-label="Default select example" name="child18_fourth_reason" id="">
                                                            <option disabled selected>اختر</option>
                                                            <option value="اسباب صحية">اسباب صحية</option>
                                                            <option value="اسباب دراسية">اسباب دراسية</option>
                                                            <option value="بنت غير متزوجة">بنت غير متزوجة</option>
                                                        </select>

                                                    </div>







                                                <?php
                                                }
                                            }
                                            if ($rowm['iieala'] == 'نعم') {
                                                ?>

                                                <div class="col-12 col-md-6 col-lg-6 col-xl-5 ">
                                                    <label for="family-pay" class="form-label">هل انت معيل لاحد افراد العائلة<span class="redStar">*</span></label>
                                                    <select class="form-select" aria-label="Default select example" id="family-pay" name="family-pay" required>
                                                        <option value=" <?php echo $rowm['iieala']; ?>"> <?php echo $rowm['iieala']; ?></option>
                                                        <option value="نعم">نعم</option>
                                                        <option value="كلا">كلا</option>
                                                    </select>
                                                </div>
                                                <!---------------------------صلة القرابة -------------------------------->
                                                <div class="col-6 col-lg-3 relative ">
                                                    <label for="birth-place" class="form-label"> صلة القرابة<span class="redStar">*</span></label>
                                                    <input type="text" class="form-control" id="" name="silat_alqaraba" value="<?php echo $rowm['silat_alqaraba']; ?>" />
                                                </div>

                                            <?php   } elseif ($rowm['iieala'] == 'كلا') {  ?>
                                                <div class="col-12 col-md-6 col-lg-6 col-xl-5 ">
                                                    <label for="family-pay" class="form-label">هل انت معيل لاحد افراد العائلة<span class="redStar">*</span></label>
                                                    <select class="form-select" aria-label="Default select example" id="family-pay" name="family-pay" required>
                                                        <option value="<?php echo $rowm['iieala']; ?>"> <?php echo $rowm['iieala']; ?></option>
                                                        <option value="نعم">نعم</option>
                                                        <option value="كلا">كلا</option>
                                                    </select>
                                                </div>
                                                <!---------------------------صلة القرابة -------------------------------->
                                                <div class="col-6 col-lg-3 relative d-none ">
                                                    <label for="birth-place" class="form-label"> صلة القرابة<span class="redStar">*</span></label>
                                                    <input type="text" class="form-control" id="" name="silat_alqaraba" value="<?php echo $rowm['silat_alqaraba']; ?>" />
                                                </div>

                                            <?php
                                            }


                                            $s = "SELECT * FROM  submission_channels
                       inner join channels on submission_channels.channel_type=channels.ch_id 
                       where  submission_channels.user_id='$idgreat' ";
                                            $r = mysqli_query($conn, $s);
                                            if (mysqli_num_rows($r) === 1) {

                                                $rch = mysqli_fetch_assoc($r);

                                            ?>



                                                <!--------------------------------////// القنوات ///////////----------------------------->
                                                <div class="col-12 col-lg-6 col-xl-4">
                                                    <label for="channel" class="form-label">قناة التقديم<span class="redStar">*</span></label>
                                                    <select class="form-select" aria-label="Default select example" id="channel" name="channel" required>
                                                        <option value="<?php echo $rch['ch_id']; ?>"><?php echo $rch['ch_name']; ?>
                                                        </option>
                                                        <?php
                                                        $ch = "SELECT * FROM channels ";
                                                        $rech = mysqli_query($conn, $ch);
                                                        while ($rowchannel = mysqli_fetch_assoc($rech)) {
                                                        ?>
                                                            <option value="<?php echo $rowchannel['ch_id']; ?>">
                                                                <?php echo $rowchannel['ch_name']; ?></option>

                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <?php
                                                if ($rch['ch_id'] == "2" || $rch['ch_id'] == "3") {


                                                ?>
                                                    <!------------------------------------قناة الشهداء ------------------------------------------------>
                                                    <div class="col-12 col-lg-6 col-xl-4 Martyrs  ">
                                                        <label for="Martyrs" class="form-label">صفة الشهيد <span class="redStar">*</span></label>
                                                        <select class="form-select" aria-label="Default select example" id="Martyrs" name="martyr_adjective">
                                                            <option value="<?php echo $rch['martyr_adjective'] ?>">
                                                                <?php echo $rch['martyr_adjective'] ?></option>
                                                            <option value="ضحايا الارهاب">ضحايا الارهاب </option>
                                                            <option value="شهداء النظام البائد">شهداء النظام البائد </option>
                                                        </select>
                                                    </div>

                                                    <div class="col-6 col-lg-3 Martyrs-name ">
                                                        <label for="Martyrs-name" class="form-label"> اسم الشهيد الرباعي<span class="redStar">*</span></label>
                                                        <input type="text" class="form-control" id="Martyrs-name" value="<?php echo $rch['martyr_name']; ?>" placeholder="<?php echo $rch['martyr_name']; ?> " name="martyr_name" pattern="[ء-ي\s]+" title="يرجى إدخال الأحرف العربية فقط" />
                                                    </div>
                                                    <div class="col-6 col-lg-3 Martyrs-mother ">
                                                        <label for="Martyrs-mother" class="form-label"> اسم ام الشهيد الثلاثي<span class="redStar">*</span></label>
                                                        <input type="text" class="form-control" id="Martyrs-mother" name="mart_mothname" value="<?php echo $rch['martyr_mother_name']; ?>" placeholder="<?php echo $rch['martyr_mother_name']; ?> " pattern="[ء-ي\s]+" title="يرجى إدخال الأحرف العربية فقط" />
                                                    </div>
                                                    <div class="col-6 col-lg-3 Martyrs-qrarnumber ">
                                                        <label for="Martyrs-qrarnumber" class="form-label"> رقم القرار<span class="redStar">*</span></label>
                                                        <input type="number" class="form-control" id="Martyrs-qrarnumber" name="rqm_qrar" value="<?php echo $rch['raqm_alqarar']; ?>" placeholder="<?php echo $rch['raqm_alqarar']; ?> " />
                                                    </div>
                                                    <div class="col-12 col-lg-6 col-xl-4 Martyrs-qraba ">
                                                        <label for="Martyrs-qraba" class="form-label">توصيف حالة القرابة<span class="redStar">*</span></label>
                                                        <select class="form-select" aria-label="Default select example" id="Martyrs-qraba" name="halt_qraba" required>
                                                            <option value="<?php echo $rch['tawsif_halat_alqaraba']; ?>">
                                                                <?php echo $rch['tawsif_halat_alqaraba']; ?></option>
                                                            <option value="الزوج">الزوج</option>
                                                            <option value="الزوجة">الزوجة </option>
                                                            <option value="الأب">الأب </option>
                                                            <option value="الأم">الأم </option>
                                                            <option value="الأخت">الأخت</option>
                                                            <option value="الأخ">الأخ </option>
                                                            <option value="الأبن">الأبن </option>
                                                            <option value="الأبنة">الأبنة </option>
                                                            <option value="الأخ غير الشقيق">الأخ غير الشقيق</option>
                                                            <option value="اولاد الابن">اولاد الابن </option>
                                                            <option value="اولاد الابنة">اولاد الابنة </option>
                                                        </select>
                                                    </div>
                                                    <div class="col-6 col-lg-4 prisoner-name d-none">
                                                        <label for="prisoner-name" class="form-label"> اسم السجين الرباعي<span class="redStar">*</span></label>
                                                        <input type="text" class="form-control" id="prisoner-name" name="prisoner-name" pattern="[ء-ي\s]+" title="يرجى إدخال الأحرف العربية فقط" />
                                                    </div>
                                                    <div class="col-6 col-lg-4 prisoner-mother d-none">
                                                        <label for="prisoner-mother" class="form-label"> اسم ام السجين الثلاثي<span class="redStar">*</span></label>
                                                        <input type="text" class="form-control" id="prisoner-mother" name="prisoner-mother" pattern="[ء-ي\s]+" title="يرجى إدخال الأحرف العربية فقط" />
                                                    </div>
                                                    <div class="col-6 col-lg-3 prisoner-qrarnumber d-none">
                                                        <label for="prisoner-qrarnumber" class="form-label"> رقم القرار<span class="redStar">*</span></label>
                                                        <input type="number" class="form-control" id="prisoner-qrarnumber" name="rqm_qrar" />
                                                    </div>
                                                    <div class="col-12 col-lg-6 col-xl-4 prisoner-qraba d-none">
                                                        <label for="prisoner-qraba" class="form-label">توصيف حالة القرابة<span class="redStar">*</span></label>
                                                        <select class="form-select" aria-label="Default select example" id="prisoner-qraba" name="halt_qraba">
                                                            <option value="<?php echo $rch['tawsif_halat_alqaraba']; ?>">
                                                                <?php echo $rch['tawsif_halat_alqaraba']; ?></option>
                                                            <option value="انا سجين سياسي">انا سجين سياسي</option>
                                                            <option value="انا ابن سجين سياسي">انا ابن سجين سياسي </option>
                                                            <option value="انا بنت سجين سياسي">انا بنت سجين سياسي </option>
                                                            <option value="انا زوج سجين سياسي">انا زوج سجين سياسي </option>
                                                            <option value="الأخت">الأخت</option>
                                                            <option value="الأخ">الأخ </option>
                                                            <option value="الأبن">الأبن </option>
                                                            <option value="الأبنة">الأبنة </option>
                                                            <option value="الأخ غير الشقيق">الأخ غير الشقيق</option>
                                                            <option value="اولاد الابن">اولاد الابن </option>
                                                            <option value="اولاد الابنة">اولاد الابنة </option>
                                                        </select>
                                                    </div>
                                                <?php } else if ($rch['ch_id'] == "4") {


                                                ?>
                                                    <!------------------------------------قناة السجناء السياسين  ------------------->


                                                    <div class="col-6 col-lg-4 prisoner-name ">
                                                        <label for="prisoner-name" class="form-label"> اسم السجين الرباعي<span class="redStar">*</span></label>
                                                        <input type="text" class="form-control" id="prisoner-name" value="<?php echo $rch['prisoner_name']; ?>" placeholder="<?php echo $rch['prisoner_name']; ?> " name="prisoner-name" pattern="[ء-ي\s]+" title="يرجى إدخال الأحرف العربية فقط" />
                                                    </div>
                                                    <div class="col-6 col-lg-4 prisoner-mother ">
                                                        <label for="prisoner-mother" class="form-label"> اسم ام السجين الثلاثي<span class="redStar">*</span></label>
                                                        <input type="text" class="form-control" id="prisoner-mother" value="<?php echo $rch['prisoner_mother_name']; ?>" placeholder="<?php echo $rch['prisoner_mother_name']; ?> " name="prisoner-mother" pattern="[ء-ي\s]+" title="يرجى إدخال الأحرف العربية فقط" />
                                                    </div>
                                                    <div class="col-6 col-lg-3 prisoner-qrarnumber ">
                                                        <label for="prisoner-qrarnumber" class="form-label"> رقم القرار<span class="redStar">*</span></label>
                                                        <input type="number" class="form-control" id="prisoner-qrarnumber" value="<?php echo $rch['raqm_alqarar']; ?>" placeholder="<?php echo $rch['raqm_alqarar']; ?> " name="rqm_qrar" />
                                                    </div>
                                                    <div class="col-12 col-lg-6 col-xl-4 prisoner-qraba ">
                                                        <label for="prisoner-qraba" class="form-label">توصيف حالة القرابة<span class="redStar">*</span></label>
                                                        <select class="form-select" aria-label="Default select example" id="prisoner-qraba" name="halt_qraba" required>
                                                            <option value="<?php echo $rch['tawsif_halat_alqaraba']; ?>">
                                                                <?php echo $rch['tawsif_halat_alqaraba']; ?></option>
                                                            <option value="انا سجين سياسي">انا سجين سياسي</option>
                                                            <option value="انا ابن سجين سياسي">انا ابن سجين سياسي </option>
                                                            <option value="انا بنت سجين سياسي">انا بنت سجين سياسي </option>
                                                            <option value="انا زوج سجين سياسي">انا زوج سجين سياسي </option>
                                                            <option value="الأخت">الأخت</option>
                                                            <option value="الأخ">الأخ </option>
                                                            <option value="الأبن">الأبن </option>
                                                            <option value="الأبنة">الأبنة </option>
                                                            <option value="الأخ غير الشقيق">الأخ غير الشقيق</option>
                                                            <option value="اولاد الابن">اولاد الابن </option>
                                                            <option value="اولاد الابنة">اولاد الابنة </option>
                                                        </select>
                                                    </div>
                                                    <!----------قناة الشهداء ----->
                                                    <div class="col-12 col-lg-6 col-xl-4 Martyrs d-none ">
                                                        <label for="Martyrs" class="form-label">صفة الشهيد <span class="redStar">*</span></label>
                                                        <select class="form-select" aria-label="Default select example" id="Martyrs" name="martyr_adjective">
                                                            <option disabled selected>اختر</option>
                                                            <option value="ضحايا الارهاب">ضحايا الارهاب </option>
                                                            <option value="شهداء النظام البائد">شهداء النظام البائد </option>
                                                        </select>
                                                    </div>

                                                    <div class="col-6 col-lg-3 Martyrs-name d-none">
                                                        <label for="Martyrs-name" class="form-label"> اسم الشهيد الرباعي<span class="redStar">*</span></label>
                                                        <input type="text" class="form-control" id="Martyrs-name" name="martyr_name" pattern="[ء-ي\s]+" title="يرجى إدخال الأحرف العربية فقط" />
                                                    </div>
                                                    <div class="col-6 col-lg-3 Martyrs-mother d-none">
                                                        <label for="Martyrs-mother" class="form-label"> اسم ام الشهيد الثلاثي<span class="redStar">*</span></label>
                                                        <input type="text" class="form-control" id="Martyrs-mother" name="mart_mothname" pattern="[ء-ي\s]+" title="يرجى إدخال الأحرف العربية فقط" />
                                                    </div>
                                                    <div class="col-6 col-lg-3 Martyrs-qrarnumber d-none">
                                                        <label for="Martyrs-qrarnumber" class="form-label"> رقم القرار<span class="redStar">*</span></label>
                                                        <input type="number" class="form-control" id="Martyrs-qrarnumber" name="rqm_qrar" />
                                                    </div>
                                                    <div class="col-12 col-lg-6 col-xl-4 Martyrs-qraba d-none">
                                                        <label for="Martyrs-qraba" class="form-label">توصيف حالة القرابة<span class="redStar">*</span></label>
                                                        <select class="form-select" aria-label="Default select example" id="Martyrs-qraba" name="halt_qraba">
                                                            <option disabled selected>اختر</option>
                                                            <option value="الزوج">الزوج</option>
                                                            <option value="الزوجة">الزوجة </option>
                                                            <option value="الأب">الأب </option>
                                                            <option value="الأم">الأم </option>
                                                            <option value="الأخت">الأخت</option>
                                                            <option value="الأخ">الأخ </option>
                                                            <option value="الأبن">الأبن </option>
                                                            <option value="الأبنة">الأبنة </option>
                                                            <option value="الأخ غير الشقيق">الأخ غير الشقيق</option>
                                                            <option value="اولاد الابن">اولاد الابن </option>
                                                            <option value="اولاد الابنة">اولاد الابنة </option>
                                                        </select>
                                                    </div>
                                                <?php
                                                }
                                                ?>

                                            <?php
                                            }
                                            ?>
                                            <!--------------------------------------------------------------------------->
                                            <div class="col-12">
                                                <input type="submit" name="upprof" value="تاكيد" class="btn btn-primary" />
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
    <?php
    $sql = "SELECT * FROM personal_information WHERE user_id='$idgreat'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if ($row['national_card_flag'] == "1") {
    ?>
            <script src="assets/js/scipt.js"></script>
        <?php
        } else {
        ?>
            <script src="assets/js/js.js"></script>
    <?php
        }
    }
    ?>
</body>

</html>