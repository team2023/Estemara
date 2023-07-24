<?php
session_start();

$idgreat = $_SESSION['iduser'];
#echo $idgreat;
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
        <div class="container mt-2">
            <div class="d-flex justify-content-center p-3">
                <h3 class="fw-bold">تعديل بيانات الدراسة </h3>
            </div>


            <?php
            $sqledu = "SELECT * FROM education_data WHERE user_id='$idgreat'";
            $resultedu = mysqli_query($conn, $sqledu);
            if (mysqli_num_rows($resultedu) === 1) {
                if (isset($_POST['btnedu'])) {
                    $academic_achievement = $_POST['academic_achievement'];
                    $place_study_flag = $_POST['place_study_flag'];
                    $scholarship_type = $_POST['scholarship_type'];
                    $country_graduation = $_POST['country_graduation'];
                    $university_out = $_POST['university_out'];
                    $college_out = $_POST['college_out'];
                    $department_out = $_POST['department_out'];
                    $university_in = $_POST['university_in'];
                    $college_in = $_POST['college_in'];
                    $department_in = $_POST['department_in'];
                    $graduation_year = $_POST['graduation_year'];
                    $estimation = $_POST['estimation1'];
                    $average = $_POST['average1'];
                    $fave = $_POST['fave'];

                    if ($place_study_flag == "1" && ($academic_achievement == "بكالوريوس" || $academic_achievement == "دبلوم")) {

                        $sqlupdateedu = "UPDATE education_data SET
         academic_achievement='$academic_achievement',
         place_study_flag=' $place_study_flag',
         scholarship_type='$scholarship_type',
         country_graduation='$country_graduation',
         university_out='$university_out' ,
        college_out='$college_out',
        department_out='$department_out',
        university_in=' ',
        college_in=' ',
        department_in=' ',
        graduation_year='$graduation_year',
        estimation=' ',
        average='$average',
        fave='$fave',
        updated_at=now()
         where user_id='$idgreat'";
                        $resultupdateedu = mysqli_query($conn, $sqlupdateedu);

                        if (($resultupdateedu)) {

                            $sqlupdatflg = "UPDATE flag_forms SET education_data_flag='1' where user_id='$idgreat'";
                            $resultupflg = mysqli_query($conn, $sqlupdatflg);
                            if ($resultupflg) {

                                $_SESSION['ok'] = "ok";
                                header("Location: mainpage.php");
                            }
                        }
                    } else if ($place_study_flag == "1" && ($academic_achievement != "بكالوريوس" || $academic_achievement != "دبلوم")) {
                        $sqlupdateedu = "UPDATE education_data SET
    academic_achievement='$academic_achievement',
    place_study_flag=' $place_study_flag',
    scholarship_type='$scholarship_type',
    country_graduation='$country_graduation',
    university_out='$university_out' ,
   college_out='$college_out',
   department_out='$department_out',
   university_in=' ',
   college_in=' ',
   department_in=' ',
   graduation_year='$graduation_year',
   estimation='$estimation',
   average=' ',
   fave=' ',
   updated_at=now()
    where user_id='$idgreat'";
                        $resultupdateedu = mysqli_query($conn, $sqlupdateedu);

                        if (($resultupdateedu)) {

                            $sqlupdatflg = "UPDATE flag_forms SET education_data_flag='1' where user_id='$idgreat'";
                            $resultupflg = mysqli_query($conn, $sqlupdatflg);
                            if ($resultupflg) {

                                $_SESSION['ok'] = "ok";
                                header("Location: mainpage.php");
                            }
                        }
                    } else if ($place_study_flag == "0" && ($academic_achievement == "بكالوريوس" || $academic_achievement == "دبلوم")) {
                        $sqlupdateedu = "UPDATE education_data SET
        academic_achievement='$academic_achievement',
        place_study_flag=' $place_study_flag',
        scholarship_type=' ',
        country_graduation=' ',
        university_out=' ' ,
       college_out=' ',
       department_out=' ',
       university_in='$university_in',
       college_in='$college_in',
       department_in='$department_in',
       graduation_year='$graduation_year',
       estimation=' ',
       average='$average',
       fave='$fave',
       updated_at=now()
        where user_id='$idgreat'";
                        $resultupdateedu = mysqli_query($conn, $sqlupdateedu);

                        if (($resultupdateedu)) {

                            $sqlupdatflg = "UPDATE flag_forms SET education_data_flag='1' where user_id='$idgreat'";
                            $resultupflg = mysqli_query($conn, $sqlupdatflg);
                            if ($resultupflg) {

                                $_SESSION['ok'] = "ok";
                                header("Location: mainpage.php");
                            }
                        }
                    } else if ($place_study_flag == "0" && ($academic_achievement != "بكالوريوس" || $academic_achievement != "دبلوم")) {
                        $sqlupdateedu = "UPDATE education_data SET
        academic_achievement='$academic_achievement',
        place_study_flag=' $place_study_flag',
        scholarship_type=' ',
        country_graduation=' ',
        university_out=' ' ,
       college_out=' ',
       department_out=' ',
       university_in='$university_in',
       college_in='$college_in',
       department_in='$department_in',
       graduation_year='$graduation_year',
       estimation='$estimation',
       average=' ',
       fave=' ',
       updated_at=now()
        where user_id='$idgreat'";
                        $resultupdateedu = mysqli_query($conn, $sqlupdateedu);

                        if (($resultupdateedu)) {

                            $sqlupdatflg = "UPDATE flag_forms SET education_data_flag='1' where user_id='$idgreat'";
                            $resultupflg = mysqli_query($conn, $sqlupdatflg);
                            if ($resultupflg) {

                                $_SESSION['ok'] = "ok";
                                header("Location: mainpage.php");
                            }
                        }
                    }
                }
                $rowedu = mysqli_fetch_assoc($resultedu);

            ?>
                <form action="" method="POST" class="mt-3">
                    <div class="row my-1 mt-4 gy-3">
                        <div class="col-md-6 col-12 d-flex flex-column mb-2">
                            <label for="" class="form-label fw-bold">التحصيل الدراسي </label>
                            <select class="form-select" aria-label="Default select example" name="academic_achievement" required id="edu">
                                <option value="<?php echo $rowedu['academic_achievement']; ?>">
                                    <?php echo $rowedu['academic_achievement']; ?></option>
                                <option value="دكتوراه">دكتوراه</option>
                                <option value="ماجستير">ماجستير</option>
                                <option value="دبلوم عالي">دبلوم عالي</option>
                                <option value="بكالوريوس">بكالوريوس</option>
                                <option value="دبلوم">دبلوم</option>
                            </select>
                        </div>
                        <?php
                                if ($rowedu['place_study_flag'] == "0")
                                    $flg = "داخل العراق";
                                else if ($rowedu['place_study_flag'] == "1")
                                    $flg = "خارج العراق";
                                    
                                ?>
                                
                        <div class="col-md-6 col-12 d-flex flex-column mb-2">
                            <label for="" class="form-label fw-bold">مكان الدراسة</label>
                            <select class="form-select" aria-label="Default select example" id="edu-type" name="place_study_flag" required>
                               
                                <option value=" <?php echo $rowedu['place_study_flag']; ?>">
                                    <?php echo $flg ?></option>
                                <option value="0">داخل العراق</option>
                                <option value="1">خارج العراق</option>

                            </select>
                        </div>
                        <?php
                        if ($rowedu['place_study_flag'] == "1") {

                        ?>
                            <!-------------------في حالة الدراسة خارج العراق ------------------------------------>
                            <div class="col-md-6 col-12 d-flex flex-column mb-2   div1">
                                <label for="" class="form-label fw-bold">نوع الأبتعاث</label>
                                <select class="form-select" aria-label="Default select example" name="scholarship_type">
                                    <option value="<?php echo $rowedu['scholarship_type']; ?>">
                                        <?php echo $rowedu['scholarship_type']; ?></option>
                                    <option value="نفقة عامة">نفقة عامة</option>
                                    <option value="نفقة خاصة">نفقة خاصة</option>

                                </select>
                            </div>
                            <div class="col-md-6 col-12 d-flex flex-column mb-2  div2">
                                <label for="" class="form-label fw-bold">بلد التخرج </label>
                                <input class="form-select" aria-label="Default select example" name="country_graduation" value="<?php echo $rowedu['country_graduation']; ?>">

                                </input>
                            </div>
                            <div class="col-md-4 col-12 d-flex flex-column mb-2  div3">
                                <label for="" class="form-label fw-bold">الجامعة</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="university_out" value="<?php echo $rowedu['university_out']; ?>" aria-describedby="emailHelp" />
                            </div>
                            <div class="col-md-4 col-12 d-flex flex-column  mb-2 div4">
                                <label for="" class="form-label fw-bold">الكلية</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="college_out" value="<?php echo $rowedu['college_out']; ?>" aria-describedby="emailHelp" />
                            </div>
                            <div class="col-md-4 col-12 d-flex flex-column  mb-2 div5">
                                <label for="" class="form-label fw-bold">القسم</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="department_out" value="<?php echo $rowedu['department_out']; ?>" aria-describedby="emailHelp" />
                            </div>

                            <?php
                            $sql = "SELECT * FROM universities ";
                            $res = mysqli_query($conn, $sql);


                            ?>
                            <div class="col-md-4 col-12 d-flex flex-column mb-2 div11 d-none">
                                <label for="" class="form-label fw-bold">الجامعة</label>
                                <select class="form-select" aria-label="Default select example" value=" " id="university" name="university_in" required>
                                    <option value="0"> اختر</option>

                                    <?php
                                    while ($row = mysqli_fetch_assoc($res)) {
                                    ?>
                                        <option value="<?php echo $row['id']; ?>"> <?php echo $row['university_name']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-4 col-12 d-flex flex-column mb-2 div22 d-none">
                                <label for="" class="form-label fw-bold">الكلية</label>
                                <select class="form-select" aria-label="Default select example" value=" " name="college_in" id="collage" reqiured>
                                    <option value=""> </option>
                                </select>
                            </div>
                            <div class="col-md-4 col-12 d-flex flex-column mb-2 div33 d-none">
                                <label for="" class="form-label fw-bold">القسم</label>
                                <select class="form-select" aria-label="Default select example" value=" " name="department_in" id="dep">

                                </select>
                            </div>






                        <?php
                        } else if ($rowedu['place_study_flag'] == "0") {
                            $unv = $rowedu['university_in'];
                            $colg = $rowedu['college_in'];
                            $dep = $rowedu['department_in'];
                        ?>
                            <!---------- في حالة الدراسة داخل العراق ----------------------->
                            <?php
                            $sqlgetunv = "SELECT universities.university_name,universities.id as u_id , colleges.college_name,colleges.id as cid, departments.department_name
                            ,departments.id as did
 from universities INNER JOIN colleges on universities.id=colleges.university_id INNER JOIN departments
  on colleges.id=departments.collage_id where universities.id='$unv' AND colleges.id='$colg' AND departments.id='$dep'";

                            $resgetunv = mysqli_query($conn, $sqlgetunv);
                            if (mysqli_num_rows($resgetunv) === 1) {
                                $rowunv = mysqli_fetch_assoc($resgetunv);
                            ?>
                                <div class="col-md-6 col-12 d-flex flex-column mb-2   div1 d-none">
                                    <label for="" class="form-label fw-bold">نوع الأبتعاث</label>
                                    <select class="form-select" aria-label="Default select example" value=" " name="scholarship_type">
                                        <option value=" ">
                                            <?php echo $rowedu['scholarship_type']; ?></option>
                                        <option value="نفقة عامة">نفقة عامة</option>
                                        <option value="نفقة خاصة">نفقة خاصة</option>

                                    </select>
                                </div>
                                <div class="col-md-6 col-12 d-flex flex-column mb-2  div2 d-none">
                                    <label for="" class="form-label fw-bold">بلد التخرج </label>
                                    <input class="form-select" aria-label="Default select example" name="country_graduation" value=" " />
                                </div>
                                <div class="col-md-4 col-12 d-flex flex-column mb-2  div3 d-none">
                                    <label for="" class="form-label fw-bold">الجامعة</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="university_out" value=" " aria-describedby="emailHelp" />
                                </div>
                                <div class="col-md-4 col-12 d-flex flex-column  mb-2 div4 d-none">
                                    <label for="" class="form-label fw-bold">الكلية</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="college_out" value=" " aria-describedby="emailHelp" />
                                </div>
                                <div class="col-md-4 col-12 d-flex flex-column  mb-2 div5 d-none">
                                    <label for="" class="form-label fw-bold">القسم</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="department_out" value=" " aria-describedby="emailHelp" />
                                </div>
                                <?php
                                $sql = "SELECT * FROM universities ";
                                $res = mysqli_query($conn, $sql);
                                ?>
                                <div class="col-md-4 col-12 d-flex flex-column mb-2 div11">
                                    <label for="" class="form-label fw-bold">الجامعة</label>
                                    <select class="form-select" aria-label="Default select example" id="university" name="university_in" required>
                                      
                                            <option value="<?php echo $rowunv['u_id']; ?>"> <?php echo $rowunv['university_name']; ?>
                                            </option>
                                            <?php
                                        while ($row = mysqli_fetch_assoc($res)) {

                                            $unv = $rowedu['university_in']
                                        ?>
                                        <option value="<?php echo $row['id']; ?>"> <?php echo $row['university_name']; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="col-md-4 col-12 d-flex flex-column mb-2 div22">
                                    <label for="" class="form-label fw-bold">الكلية</label>
                                    <select class="form-select" aria-label="Default select example"  name="college_in" id="collage">
                                        <option value="<?php echo $rowunv['cid']; ?>" >
                                            <?php echo $rowunv['college_name']; ?></option>
                                    </select>
                                </div>
                                <div class="col-md-4 col-12 d-flex flex-column mb-2 div33">
                                    <label for="" class="form-label fw-bold">القسم</label>
                                    <select class="form-select" aria-label="Default select example" name="department_in" id="dep">
                                        <option value="<?php echo $rowunv['did']; ?>">
                                            <?php echo $rowunv['department_name']; ?></option>

                                    </select>
                                </div>

                        <?php
                            }
                        }
                        ?>
                        <div class="col-md-6 col-12 d-flex flex-column mb-2">
                            <label for="year" class="form-label fw-bold">سنة التخرج </label>
                            <select id="year" name="graduation_year" value="<?php echo $rowedu['graduation_year']; ?>" class="form-select">
                                <option value="<?php echo $rowedu['graduation_year']; ?>">
                                    <?php echo $rowedu['graduation_year']; ?></option>
                            </select>
                        </div>
                        <?php
                        if ($rowedu['academic_achievement'] === "بكالوريوس" || $rowedu['academic_achievement'] === "دبلوم") {

                        ?>

                            <!---------------------في حالة بكالوريوس و الدبلوم ----------------->
                            <div class="col-md-3 col-12 d-flex flex-column mb-2  ave">
                                <label for="ave" class="form-label fw-bold">المعدل</label>
                                <input type="number" class="form-control" id="ave" name="average1" value="<?php echo $rowedu['average']; ?>" step="0.01" min="0" max="100" pattern="\d{1,2}(\.\d{0,2})?" title="يرجى إدخال رقمين مع مرتبتين بعد الفاصلة" />
                            </div>
                            <div class="col-md-3 col-12 d-flex flex-column mb-2  first_ave">
                                <label for="fave" class="form-label fw-bold">معدل الطالب الاول </label>
                                <input type="number" class="form-control" id="fave" name="fave" value="<?php echo $rowedu['fave']; ?>" step="0.01" min="0" max="100" pattern="\d{1,2}(\.\d{0,2})?" title="يرجى إدخال رقمين مع مرتبتين بعد الفاصلة" />
                            </div>
                            <div class="col-md-6 col-12 d-flex flex-column mb-2 grade d-none">
                                <label for="grade" class="form-label fw-bold">التقدير</label>
                                <select class="form-select" aria-label="Default select example" name="estimation1" value=" " id="grade">
                                    <option value=" ">
                                    </option>
                                    <option value="امتياز">امتياز</option>
                                    <option value="جيد جدا">جيد جدا</option>
                                    <option value="جيد">جيد </option>
                                    <option value="متوسط">متوسط</option>
                                    <option value="مقبول">مقبول</option>
                                </select>
                            </div>
                    </div>
                <?php
                        } else {
                ?>

                    <div class="col-md-3 col-12 d-flex flex-column mb-2 d-none ave">
                        <label for="ave" class="form-label fw-bold">المعدل</label>
                        <input type="number" class="form-control" id="ave" name="average1" value=" " step="0.01" min="0" max="100" pattern="\d{1,2}(\.\d{0,2})?" title="يرجى إدخال رقمين مع مرتبتين بعد الفاصلة" />
                    </div>
                    <div class="col-md-3 col-12 d-flex flex-column mb-2 d-none first_ave">
                        <label for="fave" class="form-label fw-bold">معدل الطالب الاول </label>
                        <input type="number" class="form-control" id="fave" name="fave" step="0.01" min="0" max="100" pattern="\d{1,2}(\.\d{0,2})?" title="يرجى إدخال رقمين مع مرتبتين بعد الفاصلة" />
                    </div>

                    <div class="col-md-6 col-12 d-flex flex-column mb-2 grade ">
                        <label for="grade" class="form-label fw-bold">التقدير</label>
                        <select class="form-select" aria-label="Default select example" value="<?php echo $rowedu['estimation']; ?>" name="estimation1" id="grade">
                            <option value="<?php echo $rowedu['estimation']; ?>"><?php echo $rowedu['estimation']; ?>
                            </option>
                            <option value="امتياز">امتياز</option>
                            <option value="جيد جدا">جيد جدا</option>
                            <option value="جيد">جيد </option>
                            <option value="متوسط">متوسط</option>
                            <option value="مقبول">مقبول</option>
                        </select>
                    </div>
        </div>
    <?php
                        }
    ?>

    <div class="row my-2 mb-2">
        <div class="col-md-3 col-12">
            <button type="submit" class="btn " name="btnedu" style="background: rgb(3, 6, 56); color:white;">حفظ
            </button>
            <a href="mainpage.php" type="button" class="btn btn-secondary">رجوع الى القائمة </a>
        </div>
    </div>
    </div>
    </form>
    </div>
    </main>

<?php

            } else {

                if (isset($_POST['btnedu'])) {
                    $academic_achievement = $_POST['academic_achievement'];
                    $place_study_flag = $_POST['place_study_flag'];
                    $scholarship_type = $_POST['scholarship_type'];
                    $country_graduation = $_POST['country_graduation'];
                    $university_out = $_POST['university_out'];
                    $college_out = $_POST['college_out'];
                    $department_out = $_POST['department_out'];
                    $university_in = $_POST['university_in'];
                    $college_in = $_POST['college_in'];
                    $department_in = $_POST['department_in'];
                    $graduation_year = $_POST['graduation_year'];
                    $estimation = $_POST['estimation'];
                    $average = $_POST['average'];
                    $fave = $_POST['fave'];




                    $sqledu = "INSERT INTO education_data (user_id,academic_achievement,place_study_flag,scholarship_type,country_graduation,university_out,college_out,department_out,university_in,college_in,department_in,graduation_year,estimation,average,fave,created_at,updated_at,deleted_at)  VALUES ('$idgreat','$academic_achievement', 
 '$place_study_flag', '$scholarship_type', '$country_graduation', '$university_out'
 ,'$college_out','$department_out','$university_in','$college_in','$department_in','$graduation_year','$estimation','$average','$fave'
 ,now(),now(),now())";
                    $resedu = mysqli_query($conn, $sqledu);
                    if ($resedu) {
                        $sqlupdatflg = "UPDATE flag_forms SET education_data_flag='1' where user_id='$idgreat'";
                        $resultupflg = mysqli_query($conn, $sqlupdatflg);
                        if ($resultupflg) {

                            $_SESSION['ok'] = "ok";
                            header("Location: mainpage.php");
                        }
                    } else {
                        echo mysqli_error($conn);
                    }
                }



?>

    <form action="" method="POST" class="mt-3">
        <div class="row my-1 mt-4 gy-3">
            <div class="col-md-6 col-12 d-flex flex-column mb-2">
                <label for="" class="form-label fw-bold">التحصيل الدراسي </label>
                <select class="form-select" name="academic_achievement" aria-label="Default select example" id="edu" reqiured>
                    <option selected>أختر من فضلك ..</option>
                    <option value="دكتوراه">دكتوراه</option>
                    <option value="ماجستير">ماجستير</option>
                    <option value="دبلوم عالي">دبلوم عالي</option>
                    <option value="بكالوريوس">بكالوريوس</option>
                    <option value="دبلوم">دبلوم</option>
                </select>
            </div>
            <div class="col-md-6 col-12 d-flex flex-column mb-2">
                <label for="" class="form-label fw-bold">مكان الدراسة</label>
                <select class="form-select" aria-label="Default select example" id="edu-type" name="place_study_flag" required>
                    <option disabled selected>اختر</option>
                    <option value="0"> داخل العراق</option>
                    <option value="1">خارج العراق</option>

                </select>
            </div>

            <!-------------------في حالة الدراسة خارج العراق ------------------------------------>
            <div class="col-md-6 col-12 d-flex flex-column mb-2 d-none  div1">
                <label for="" class="form-label fw-bold">نوع الأبتعاث</label>
                <select class="form-select" name="scholarship_type" aria-label="Default select example">
                    <option value=" ">اختر</option>
                    <option value="نفقة خاصة">نفقة خاصة</option>
                    <option value="نفقة عامة">نفقة عامة</option>

                </select>
            </div>
            <div class="col-md-6 col-12 d-flex flex-column mb-2 d-none div2">
                <label for="" class="form-label fw-bold">بلد التخرج </label>
                <input class="form-select" name="country_graduation" aria-label="Default select example">

                </input>
            </div>
            <div class="col-md-4 col-12 d-flex flex-column mb-2 d-none div3">
                <label for="" class="form-label fw-bold">الجامعة</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="university_out" aria-describedby="emailHelp" />
            </div>
            <div class="col-md-4 col-12 d-flex flex-column d-none mb-2 div4">
                <label for="" class="form-label fw-bold">الكلية</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="college_out" aria-describedby="emailHelp" />
            </div>
            <div class="col-md-4 col-12 d-flex flex-column d-none mb-2 div5">
                <label for="" class="form-label fw-bold">القسم</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="department_out" aria-describedby="emailHelp" />
            </div>

            <!---------- في حالة الدراسة داخل العراق ----------------------->



            <?php
                $sql = "SELECT * FROM universities ";
                $res = mysqli_query($conn, $sql);


            ?>
            <div class="col-md-4 col-12 d-flex flex-column mb-2 div11">
                <label for="" class="form-label fw-bold">الجامعة</label>
                <select class="form-select" aria-label="Default select example" id="university" name="university_in" required>
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
                <select class="form-select" aria-label="Default select example" name="college_in" id="collage">
                    <option value=""> </option>
                </select>
            </div>
            <div class="col-md-4 col-12 d-flex flex-column mb-2 div33">
                <label for="" class="form-label fw-bold">القسم</label>
                <select class="form-select" aria-label="Default select example" name="department_in" id="dep">
                </select>
            </div>



            <div class="col-md-6 col-12 d-flex flex-column mb-2">
                <label for="year" class="form-label fw-bold">سنة التخرج </label>
                <select id="year" name="graduation_year" class="form-select" required>
                    <option value="">السنة</option>
                </select>
            </div>
            <div class="col-md-6 col-12 d-flex flex-column mb-2 grade d-none">
                <label for="grade" class="form-label fw-bold">التقدير</label>
                <select class="form-select" aria-label="Default select example" required name="estimation" id="grade">
                    <option value="امتياز">امتياز</option>
                    <option value="جيد جدا">جيد جدا</option>
                    <option value="جيد">جيد </option>
                    <option value="متوسط">متوسط</option>
                    <option value="مقبول">مقبول</option>
                </select>
            </div>
            <!---------------------في حالة بكالوريوس و الدبلوم ----------------->
            <div class="col-md-3 col-12 d-flex flex-column mb-2 d-none ave">
                <label for="ave" class="form-label fw-bold">المعدل</label>
                <input type="number" class="form-control" id="ave" name="average" step="0.01" min="0" max="100" pattern="\d{1,2}(\.\d{0,2})?" title="يرجى إدخال رقمين مع مرتبتين بعد الفاصلة" />
            </div>
            <div class="col-md-3 col-12 d-flex flex-column mb-2 d-none first_ave">
                <label for="fave" class="form-label fw-bold">معدل الطالب الاول </label>
                <input type="number" class="form-control" id="fave" name="fave" step="0.01" min="0" max="100" pattern="\d{1,2}(\.\d{0,2})?" title="يرجى إدخال رقمين مع مرتبتين بعد الفاصلة" />
            </div>
        </div>


        <div class="row my-2 mb-2">
            <div class="col-md-3 col-12">
                <button type="submit" class="btn " name="btnedu" style="background: rgb(3, 6, 56); color:white;">حفظ
                </button>
                <a href="mainpage.php" type="button" class="btn btn-secondary">رجوع الى القائمة </a>
            </div>
        </div>
        </div>
    </form>
    </div>
    </main>

<?php
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
        if (selectedOption === "1") {
            div1.classList.remove("d-none");
            div2.classList.remove("d-none");
            div3.classList.remove("d-none");
            div4.classList.remove("d-none");
            div5.classList.remove("d-none");
            div11.classList.add("d-none");
            div22.classList.add("d-none");
            div33.classList.add("d-none");

        } else if (selectedOption === "0") {
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
    // Generate options for years
    function populateYearSelect(elementId, startYear, endYear) {
        const yearSelect = document.getElementById(elementId);


        for (let year = endYear; year >= startYear; year--) {
            let option = document.createElement("option");
            option.value = year;
            option.text = year;
            yearSelect.appendChild(option);
        }
    }


    let currentYear = new Date().getFullYear();
    populateYearSelect("year", currentYear - 100, currentYear);
    ///////////////////تغيير المعدل او التقدير حسب الدراسة //////////////////

    const selecteduOption = document.getElementById("edu");
    let ave = document.querySelector('.ave');
    let fave = document.querySelector('.first_ave');
    let grade = document.querySelector('.grade');
    // Function to show/hide gov divs based on the selected option
    function handleOptionChangeedu() {
        let selectedOption = selecteduOption.value;

        // Toggle "d-none" class based on selected option
        if (selectedOption === "بكالوريوس" || selectedOption === "دبلوم") {
            ave.classList.remove("d-none");
            ave.setAttribute('reqiured', '');
            fave.classList.remove("d-none");
            fave.setAttribute('reqiured', '');
            grade.classList.add("d-none");
            grade.removeAttribute('reqiured', '');

        } else {
            ave.classList.add("d-none");
            ave.removeAttribute('reqiured', '');
            fave.classList.add("d-none");
            fave.removeAttribute('reqiured', '');
            grade.classList.remove("d-none");
            grade.setAttribute('reqiured', '');

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