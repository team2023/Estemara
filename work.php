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
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css'>

  <style>
    .filter-option-inner-inner {
      text-align: start;
    }
  </style>
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
        <h3 class="fw-bold">العمل و المهارة </h3>
      </div>
      <?php

      $sqlwork = "SELECT * FROM work_skills   WHERE user_id='$idgreat'";
      $resultwork = mysqli_query($conn, $sqlwork);
      if (mysqli_num_rows($resultwork) === 1) {
        if (isset($_POST['btrwork'])) {
          $volunteer_work = $_POST['volunteer_work'];
          $government_place_work = $_POST['government_place_work'];
          $duration_work = $_POST['duration_work'];
          $computer_use = $_POST['computer_use'];
          $other_language = $_POST['other_language'] ??  null;
          //$other_language = $_POST['$other_language'] 
          if (empty($other_language)) {
            $language = $other_language;
          } else {
            $language = implode("-", $other_language);
          }
          $old_work = $_POST['old_work'];
          if ($old_work == 'نعم') {
            $sector = $_POST['sector'];
            if ($sector == 'عام') {
              $otype = $_POST['otype'];
              $ocertif = $_POST['ocertif'];
              $oplace = $_POST['oplace'];
              $sday = $_POST['sday'];
              $smonth = $_POST['smonth'];
              $syear = $_POST['syear'];
              $ostartdate = $syear . '-' . $smonth . '-' . $sday;
              $eday = $_POST['eday'];
              $emonth = $_POST['emonth'];
              $eyear = $_POST['eyear'];
              $oenddate = $eyear . '-' . $emonth . '-' . $eday;
              $oresion = $_POST['oresion'];
            } elseif ($sector == 'خاص') {
              $oplace = $_POST['oplace'];
              $sday = $_POST['sday'];
              $smonth = $_POST['smonth'];
              $syear = $_POST['syear'];
              $ostartdate = $syear . '-' . $smonth . '-' . $sday;
              $eday = $_POST['eday'];
              $emonth = $_POST['emonth'];
              $eyear = $_POST['eyear'];
              $oenddate = $eyear . '-' . $emonth . '-' . $eday;
              $oresion = $_POST['oresion'];
              $otype = '';
              $ocertif = '';
            }
          } elseif ($old_work == 'كلا') {
            $sector = '';
            $otype = '';
            $ocertif = '';
            $oplace = '';
            $ostartdate = '0000-00-00';
            $oenddate = '0000-00-00';
            $oresion = '';
          }
          $curr_work = $_POST['curr_work'];
          if ($curr_work == 'نعم') {
            $csector = $_POST['csector'];
            if ($csector == 'عام') {
              $ctype = $_POST['ctype'];
              $ccertif = $_POST['ccertif'];
              $cplace = $_POST['cplace'];
              $day = $_POST['day'];
              $month = $_POST['month'];
              $year = $_POST['year'];
              $cstartdate = $year . '-' . $month . '-' . $day;
            } elseif ($csector == 'خاص') {
              $cplace = $_POST['cplace'];
              $day = $_POST['day'];
              $month = $_POST['month'];
              $year = $_POST['year'];
              $cstartdate = $year . '-' . $month . '-' . $day;

              $ctype = '';
              $ccertif = '';
            }
          } elseif ($curr_work == 'كلا') {
            $csector = '';
            $ctype = '';
            $ccertif = '';
            $cplace = '';
            $cstartdate = '0000-00-00';
          }

          $sqlupdateprof = "UPDATE work_skills SET  
          old_work='$old_work',
          old_sector='$sector',
          old_type='$otype',
          old_certif='$ocertif',
          old_place= '$oplace',
          old_sdate= '$ostartdate',
          old_edate= '$oenddate',
          old_resion='$oresion',
          curr_work='$curr_work',
          curr_sector= '$csector',
          curr_type='$ctype',
          curr_certif='$ccertif',
          curr_place='$cplace',
          curr_sdate='$cstartdate',
    volunteer_work='$volunteer_work',
    government_place_work='$government_place_work',
    duration_work='$duration_work',
    computer_use='$computer_use',
    other_language='$language',
    updated_at=now()
     where user_id='$idgreat'";
          $resultupdate = mysqli_query($conn, $sqlupdateprof);

          if (($resultupdate)) {

            $sqlupdatflg = "UPDATE flag_forms SET workSkill_flag='1' where user_id='$idgreat'";
            $resultupflg = mysqli_query($conn, $sqlupdatflg);
            if ($resultupflg) {

              if ($volunteer_work == 'نعم') {
                $ch = "SELECT * from deco where user_id='$idgreat' and type_dec='أمر العمل'         ";
                $rs = mysqli_query($conn, $ch);

                if (mysqli_fetch_assoc($rs) == 0) {
                  $s = "INSERT into deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at)
        VALUES ('$idgreat','أمر العمل',0,'',now(),now())";
                  $r = mysqli_query($conn, $s);
                  if ($r) {
                    $_SESSION['ok'] = "ok";
                    #header("Location: mainpage.php");
                  }
                } else {

                  echo "nooo"  . mysqli_error($conn);
                }
              } else {
                $ch = "SELECT * from deco where user_id='$idgreat' and type_dec='أمر العمل' ";
                $rs = mysqli_query($conn, $ch);
                if ($rs) {
                  $s = "DELETE FROM deco where user_id='$idgreat' and type_dec='أمر العمل' ";
                  $r = mysqli_query($conn, $s);
                  if ($r) {
                    $_SESSION['ok'] = "ok";
                    #header("Location: mainpage.php");
                  } else {
                    echo "nooo11" . mysqli_error($conn);
                  }
                } else {
                  echo "nooo" . mysqli_error($conn);
                }
              }
              if ($old_work == 'نعم') {
                $so = "INSERT into deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at)
        VALUES ('$idgreat','أمر العمل السابق',0,'',now(),now())";
                $ro = mysqli_query($conn, $so);
                if ($ro) {
                  $_SESSION['ok'] = "ok";
                  #header("Location: mainpage.php");
                } else {
                  echo "nooo";
                }
              } else {

                $cho = "SELECT * from deco where user_id='$idgreat' and type_dec='أمر العمل السابق' ";
                $rso = mysqli_query($conn, $cho);
                if ($rso) {
                  $so = "DELETE FROM deco where user_id='$idgreat' and type_dec='أمر العمل السابق' ";
                  $ro = mysqli_query($conn, $so);
                  if ($ro) {
                    $_SESSION['ok'] = "ok";
                    #header("Location: mainpage.php");
                  } else {
                    echo "nooo11" . mysqli_error($conn);
                  }
                } else {
                  echo "nooo" . mysqli_error($conn);
                }
              }
              if ($curr_work == 'نعم') {
                $sc = "INSERT into deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at)
        VALUES ('$idgreat','أمر العمل الحالي',0,'',now(),now())";
                $rc = mysqli_query($conn, $sc);
                if ($rc) {
                  $_SESSION['ok'] = "ok";
                  #header("Location: mainpage.php");
                } else {
                  echo "nooo";
                }
              } else {

                $chc = "SELECT * from deco where user_id='$idgreat' and type_dec='أمر العمل الحالي' ";
                $rsc = mysqli_query($conn, $chc);
                if ($rsc) {
                  $sc = "DELETE FROM deco where user_id='$idgreat' and type_dec='أمر العمل الحالي' ";
                  $rc = mysqli_query($conn, $sc);
                  if ($rc) {
                    $_SESSION['ok'] = "ok";
                    #header("Location: mainpage.php");
                  } else {
                    echo "nooo11" . mysqli_error($conn);
                  }
                } else {
                  echo "nooo" . mysqli_error($conn);
                }
              }
            }
            header("Location: mainpage.php");
          }
        }
        $rowwork = mysqli_fetch_assoc($resultwork);

      ?>





        <form action="" method="POST" class="mt-3">
          <div class="row my-1 mt-4 gy-3">
            <div class="col-md-12 col-12 d-flex flex-column mb-2">
              <label for="old_work" class="form-label fw-bold"> هل لديك عمل سابق ؟
              </label>
              <select class="form-select" aria-label="Default select example" id="old_work" name="old_work" required>
                <option value="<?php echo $rowwork['old_work']; ?>"><?php echo $rowwork['old_work']; ?>
                </option>
                <option value="نعم">نعم</option>
                <option value="كلا"> كلا</option>
              </select>
            </div>
            <?php
            $old = $rowwork['old_work'];
            if ($old == "نعم") {


            ?>
              <div class="col-md-4 col-12 mb-2 sector">
                <label for="sector" class="form-label fw-bold"> القطاع
                </label>
                <select class="form-select" aria-label="Default select example" id="sector" name="sector">
                  <option value="<?php echo $rowwork['old_sector']; ?>"><?php echo $rowwork['old_sector']; ?>
                  </option>
                  <option value="عام">عام</option>
                  <option value="خاص"> خاص</option>
                </select>
              </div>
              <?php
              $osec = $rowwork['old_sector'];

              if ($osec == "عام") {
              ?>
                <div class="col-md-4 col-12 mb-2  otype">
                  <label for="otype" class="form-label fw-bold"> نوع التعيين
                  </label>
                  <select class="form-select" aria-label="Default select example" id="otype" name="otype">
                    <option value="<?php echo $rowwork['old_type']; ?>"><?php echo $rowwork['old_type']; ?></option>
                    <option value="عقد">عقد</option>
                    <option value="ملاك"> ملاك</option>
                  </select>
                </div>
                <div class="col-md-4 col-12 mb-2 ocertif">
                  <label for="ocertif" class="form-label fw-bold"> الشهادة المعتمدة في التعيين
                  </label>
                  <select class="form-select" aria-label="Default select example" id="ocertif" name="ocertif">
                    <option value="<?php echo $rowwork['old_certif']; ?>"><?php echo $rowwork['old_certif']; ?></option>
                    <option value="بكالوريوس">بكالوريوس</option>
                    <option value="دبلوم"> دبلوم</option>
                  </select>
                </div>
                <div class="col-md-4 col-12 mb-2  oplace">
                  <label for="oplace" class="form-label fw-bold">اسم مكان العمل </label>
                  <input type="text" class="form-control" id="oplace" aria-describedby="emailHelp" name="oplace" value="<?php echo $rowwork['old_place']; ?>" />
                </div>
                <?php $sdate = $rowwork['old_sdate'];
                $stdate = (explode("-", $sdate));
                ?>
                <div class="col-md-4 col-12 mb-2  ostartdate">
                  <label class="form-label fw-bold">تاريخ المباشرة<span class="redStar">*</span></label>
                  <div class="row">
                    <div class="col-4 col-sm-4">
                      <select id="sday" name="sday" class="form-select">
                        <option value="<?php echo $stdate[2]; ?>"><?php echo $stdate[2]; ?>

                        </option>
                      </select>
                    </div>
                    <div class="col-4 col-sm-4 ">
                      <select id="smonth" name="smonth" class="form-select">
                        <option value="<?php echo $stdate[1]; ?>"><?php echo $stdate[1]; ?>

                        </option>
                      </select>
                    </div>
                    <div class="col-4 col-sm-4">
                      <select id="syear" name="syear" class="form-select">
                        <option value="<?php echo $stdate[0]; ?>"><?php echo $stdate[0]; ?>

                        </option>
                      </select>
                    </div>
                  </div>
                </div>
                <?php
                $edate = $rowwork['old_edate'];
                $etdate = (explode("-", $edate));
                ?>
                <div class="col-md-4 col-12 mb-2  oenddate">
                  <label class="form-label fw-bold">تاريخ الترك<span class="redStar">*</span></label>
                  <div class="row">
                    <div class="col-4 col-sm-4">
                      <select id="eday" name="eday" class="form-select">
                        <option value="<?php echo $etdate[2]; ?>"><?php echo $etdate[2]; ?>

                        </option>

                      </select>
                    </div>
                    <div class="col-4 col-sm-4 ">
                      <select id="emonth" name="emonth" class="form-select">
                        <option value="<?php echo $etdate[1]; ?>"><?php echo $etdate[1]; ?>

                        </option>

                      </select>
                    </div>
                    <div class="col-4 col-sm-4">
                      <select id="eyear" name="eyear" class="form-select">
                        <option value="<?php echo $etdate[0]; ?>"><?php echo $etdate[0]; ?>

                        </option>
                        <option value="">
                          السنة<span class="redStar">*</span>
                        </option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-4 mb-2  oresion">
                  <label for="oresion" class="form-label fw-bold">سبب الترك</label>
                  <input type="text" class="form-control" id="oresion" name="oresion" aria-describedby="emailHelp" value="<?php echo $rowwork['old_resion']; ?>" />
                </div>
              <?php } elseif ($osec == "خاص") {
              ?>
                <div class="col-md-4 col-12 mb-2 d-none otype">
                  <label for="otype" class="form-label fw-bold"> نوع التعيين
                  </label>
                  <select class="form-select" aria-label="Default select example" id="otype" name="otype">
                    <option value="<?php echo $rowwork['old_type']; ?>"><?php echo $rowwork['old_type']; ?></option>
                    <option value="عقد">عقد</option>
                    <option value="ملاك"> ملاك</option>
                  </select>
                </div>
                <div class="col-md-4 col-12 mb-2 d-none ocertif">
                  <label for="ocertif" class="form-label fw-bold"> الشهادة المعتمدة في التعيين
                  </label>
                  <select class="form-select" aria-label="Default select example" id="ocertif" name="ocertif">
                    <option value="<?php echo $rowwork['old_certif']; ?>"><?php echo $rowwork['old_certif']; ?></option>
                    <option value="بكالوريوس">بكالوريوس</option>
                    <option value="دبلوم"> دبلوم</option>
                  </select>
                </div>
                <div class="col-md-4 col-12 mb-2  oplace">
                  <label for="oplace" class="form-label fw-bold">اسم مكان العمل </label>
                  <input type="text" class="form-control" id="oplace" aria-describedby="emailHelp" name="oplace" value="<?php echo $rowwork['old_place']; ?>" />
                </div>
                <?php $sdate = $rowwork['old_sdate'];
                $stdate = (explode("-", $sdate));
                ?>
                <div class="col-md-4 col-12 mb-2  ostartdate">
                  <label class="form-label fw-bold">تاريخ المباشرة<span class="redStar">*</span></label>
                  <div class="row">
                    <div class="col-4 col-sm-4">
                      <select id="sday" name="sday" class="form-select">
                        <option value="<?php echo $stdate[2]; ?>"><?php echo $stdate[2]; ?>

                        </option>
                      </select>
                    </div>
                    <div class="col-4 col-sm-4 ">
                      <select id="smonth" name="smonth" class="form-select">
                        <option value="<?php echo $stdate[1]; ?>"><?php echo $stdate[1]; ?>

                        </option>
                      </select>
                    </div>
                    <div class="col-4 col-sm-4">
                      <select id="syear" name="syear" class="form-select">
                        <option value="<?php echo $stdate[0]; ?>"><?php echo $stdate[0]; ?>

                        </option>
                      </select>
                    </div>
                  </div>
                </div>
                <?php
                $edate = $rowwork['old_edate'];
                $etdate = (explode("-", $edate));
                ?>
                <div class="col-md-4 col-12 mb-2  oenddate">
                  <label class="form-label fw-bold">تاريخ الترك<span class="redStar">*</span></label>
                  <div class="row">
                    <div class="col-4 col-sm-4">
                      <select id="eday" name="eday" class="form-select">
                        <option value="<?php echo $etdate[2]; ?>"><?php echo $etdate[2]; ?>

                        </option>

                      </select>
                    </div>
                    <div class="col-4 col-sm-4 ">
                      <select id="emonth" name="emonth" class="form-select">
                        <option value="<?php echo $etdate[1]; ?>"><?php echo $etdate[1]; ?>

                        </option>

                      </select>
                    </div>
                    <div class="col-4 col-sm-4">
                      <select id="eyear" name="eyear" class="form-select">
                        <option value="<?php echo $etdate[0]; ?>"><?php echo $etdate[0]; ?>

                        </option>
                        <option value="">
                          السنة<span class="redStar">*</span>
                        </option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-4 mb-2  oresion">
                  <label for="oresion" class="form-label fw-bold">سبب الترك</label>
                  <input type="text" class="form-control" id="oresion" name="oresion" aria-describedby="emailHelp" value="<?php echo $rowwork['old_resion']; ?>" />
                </div>


              <?php
              }
            } else {

              ?>

              <!--في حالة الاجابة بنعم -->
              <div class="col-md-4 col-12 mb-2 sector d-none">
                <label for="sector" class="form-label fw-bold"> القطاع
                </label>
                <select class="form-select" aria-label="Default select example" id="sector" name="sector">
                  <option disabled selected>اختر</option>
                  <option value="عام">عام</option>
                  <option value="خاص"> خاص</option>
                </select>
              </div>
              <div class="col-md-4 col-12 mb-2 d-none otype">
                <label for="otype" class="form-label fw-bold"> نوع التعيين
                </label>
                <select class="form-select" aria-label="Default select example" id="otype" name="otype">
                  <option disabled selected>اختر</option>
                  <option value="عقد">عقد</option>
                  <option value="ملاك"> ملاك</option>
                </select>
              </div>
              <div class="col-md-4 col-12 mb-2 d-none ocertif">
                <label for="ocertif" class="form-label fw-bold"> الشهادة المعتمدة في التعيين
                </label>
                <select class="form-select" aria-label="Default select example" id="ocertif" name="ocertif">
                  <option disabled selected>اختر</option>
                  <option value="بكالوريوس">بكالوريوس</option>
                  <option value="دبلوم"> دبلوم</option>
                </select>
              </div>
              <div class="col-md-4 col-12 mb-2 d-none oplace">
                <label for="oplace" class="form-label fw-bold">اسم مكان العمل </label>
                <input type="text" class="form-control" id="oplace" aria-describedby="emailHelp" name="oplace" />
              </div>
              <div class="col-md-4 col-12 mb-2 d-none ostartdate">
                <label class="form-label fw-bold">تاريخ المباشرة<span class="redStar">*</span></label>
                <div class="row">
                  <div class="col-4 col-sm-4">
                    <select id="sday" name="sday" class="form-select">
                      <option value="">
                        اليوم<span class="redStar">*</span>
                      </option>
                    </select>
                  </div>
                  <div class="col-4 col-sm-4 ">
                    <select id="smonth" name="smonth" class="form-select">
                      <option value="">
                        الشهر<span class="redStar">*</span>
                      </option>
                    </select>
                  </div>
                  <div class="col-4 col-sm-4">
                    <select id="syear" name="syear" class="form-select">
                      <option value="">
                        السنة<span class="redStar">*</span>
                      </option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-12 mb-2 d-none oenddate">
                <label class="form-label fw-bold">تاريخ الترك<span class="redStar">*</span></label>
                <div class="row">
                  <div class="col-4 col-sm-4">
                    <select id="eday" name="eday" class="form-select">
                      <option value="">
                        اليوم<span class="redStar">*</span>
                      </option>
                    </select>
                  </div>
                  <div class="col-4 col-sm-4 ">
                    <select id="emonth" name="emonth" class="form-select">
                      <option value="">
                        الشهر<span class="redStar">*</span>
                      </option>
                    </select>
                  </div>
                  <div class="col-4 col-sm-4">
                    <select id="eyear" name="eyear" class="form-select">
                      <option value="">
                        السنة<span class="redStar">*</span>
                      </option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-4 mb-2 d-none oresion">
                <label for="oresion" class="form-label fw-bold">سبب الترك</label>
                <input type="text" class="form-control" id="oresion" name="oresion" aria-describedby="emailHelp" />
              </div>
            <?php } ?>
            <div class="col-md-12 col-12 d-flex flex-column mb-2">
              <label for="old_work" class="form-label fw-bold"> هل لديك عمل حالي ؟
              </label>
              <select class="form-select" aria-label="Default select example" id="curr_work" name="curr_work">
                <option value="<?php echo $rowwork['curr_work']; ?>"><?php echo $rowwork['curr_work']; ?>
                </option>
                <option value="نعم">نعم</option>
                <option value="كلا"> كلا</option>
              </select>
            </div>
            <?php
            $curr = $rowwork['curr_work'];
            if ($curr == "نعم") {


            ?>
              <div class="col-md-4 col-12 mb-2 csector">
                <label for="sector" class="form-label fw-bold"> القطاع
                </label>
                <select class="form-select" aria-label="Default select example" id="csector" name="csector">
                  <option value="<?php echo $rowwork['curr_sector']; ?>"><?php echo $rowwork['curr_sector']; ?>
                  </option>
                  <option value="عام">عام</option>
                  <option value="خاص"> خاص</option>
                </select>
              </div>
              <?php
              $csec = $rowwork['curr_sector'];

              if ($csec == "عام") {
              ?>
                <div class="col-md-4 col-12 mb-2  ctype">
                  <label for="otype" class="form-label fw-bold"> نوع التعيين
                  </label>
                  <select class="form-select" aria-label="Default select example" id="ctype" name="ctype">
                    <option value="<?php echo $rowwork['curr_type']; ?>"><?php echo $rowwork['curr_type']; ?></option>
                    <option value="عقد">عقد</option>
                    <option value="ملاك"> ملاك</option>
                  </select>
                </div>
                <div class="col-md-4 col-12 mb-2 ccertif">
                  <label for="ocertif" class="form-label fw-bold"> الشهادة المعتمدة في التعيين
                  </label>
                  <select class="form-select" aria-label="Default select example" id="ccertif" name="ccertif">
                    <option value="<?php echo $rowwork['curr_certif']; ?>"><?php echo $rowwork['curr_certif']; ?></option>
                    <option value="بكالوريوس">بكالوريوس</option>
                    <option value="دبلوم"> دبلوم</option>
                  </select>
                </div>
                <div class="col-md-4 col-12 mb-2  cplace">
                  <label for="oplace" class="form-label fw-bold">اسم مكان العمل </label>
                  <input type="text" class="form-control" id="cplace" aria-describedby="emailHelp" name="cplace" value="<?php echo $rowwork['curr_place']; ?>" />
                </div>
                <?php $csdate = $rowwork['curr_sdate'];
                $cstdate = (explode("-", $csdate));
                ?>
                <div class="col-md-4 col-12 mb-2  cstartdate">
                  <label class="form-label fw-bold">تاريخ المباشرة<span class="redStar">*</span></label>
                  <div class="row">
                    <div class="col-4 col-sm-4">
                      <select id="day" name="day" class="form-select">
                        <option value="<?php echo $cstdate[2]; ?>"><?php echo $cstdate[2]; ?>

                        </option>
                      </select>
                    </div>
                    <div class="col-4 col-sm-4 ">
                      <select id="month" name="month" class="form-select">
                        <option value="<?php echo $cstdate[1]; ?>"><?php echo $cstdate[1]; ?>

                        </option>
                      </select>
                    </div>
                    <div class="col-4 col-sm-4">
                      <select id="year" name="year" class="form-select">
                        <option value="<?php echo $cstdate[0]; ?>"><?php echo $cstdate[0]; ?>

                        </option>
                      </select>
                    </div>
                  </div>
                </div>

              <?php } elseif ($csec == "خاص") {
              ?>
                <div class="col-md-4 col-12 mb-2 d-none ctype">
                  <label for="otype" class="form-label fw-bold"> نوع التعيين
                  </label>
                  <select class="form-select" aria-label="Default select example" id="ctype" name="ctype">
                    <option value="<?php echo $rowwork['curr_type']; ?>"><?php echo $rowwork['curr_type']; ?></option>
                    <option value="عقد">عقد</option>
                    <option value="ملاك"> ملاك</option>
                  </select>
                </div>
                <div class="col-md-4 col-12 mb-2 d-none ccertif">
                  <label for="ocertif" class="form-label fw-bold"> الشهادة المعتمدة في التعيين
                  </label>
                  <select class="form-select" aria-label="Default select example" id="ccertif" name="ccertif">
                    <option value="<?php echo $rowwork['curr_certif']; ?>"><?php echo $rowwork['curr_certif']; ?></option>
                    <option value="بكالوريوس">بكالوريوس</option>
                    <option value="دبلوم"> دبلوم</option>
                  </select>
                </div>
                <div class="col-md-4 col-12 mb-2  cplace">
                  <label for="oplace" class="form-label fw-bold">اسم مكان العمل </label>
                  <input type="text" class="form-control" id="cplace" aria-describedby="emailHelp" name="cplace" value="<?php echo $rowwork['curr_place']; ?>" />
                </div>
                <?php $csdate = $rowwork['curr_sdate'];
                $cstdate = (explode("-", $csdate));
                ?>
                <div class="col-md-4 col-12 mb-2  cstartdate">
                  <label class="form-label fw-bold">تاريخ المباشرة<span class="redStar">*</span></label>
                  <div class="row">
                    <div class="col-4 col-sm-4">
                      <select id="day" name="day" class="form-select">
                        <option value="<?php echo $cstdate[2]; ?>"><?php echo $cstdate[2]; ?>

                        </option>
                      </select>
                    </div>
                    <div class="col-4 col-sm-4 ">
                      <select id="month" name="month" class="form-select">
                        <option value="<?php echo $cstdate[1]; ?>"><?php echo $cstdate[1]; ?>

                        </option>
                      </select>
                    </div>
                    <div class="col-4 col-sm-4">
                      <select id="year" name="year" class="form-select">
                        <option value="<?php echo $cstdate[0]; ?>"><?php echo $cstdate[0]; ?>

                        </option>
                      </select>
                    </div>
                  </div>
                </div>


              <?php
              }
            } else {
              ?>

              <!--//في حالة الاجابة بنعم -->
              <div class="col-md-4 col-12 mb-2 d-none csector">
                <label for="csector" class="form-label fw-bold"> القطاع
                </label>
                <select class="form-select" aria-label="Default select example" id="csector" name="csector">
                  <option disabled selected>اختر</option>
                  <option value="عام">عام</option>
                  <option value="خاص"> خاص</option>
                </select>
              </div>
              <div class="col-md-4 col-12 mb-2 d-none ctype">
                <label for="ctype" class="form-label fw-bold"> نوع التعيين
                </label>
                <select class="form-select" aria-label="Default select example" id="ctype" name="ctype">
                  <option disabled selected>اختر</option>
                  <option value="عقد">عقد</option>
                  <option value="ملاك"> ملاك</option>
                </select>
              </div>
              <div class="col-md-4 col-12 mb-2 d-none ccertif">
                <label for="ccertif" class="form-label fw-bold"> الشهادة المعتمدة في التعيين
                </label>
                <select class="form-select" aria-label="Default select example" id="ccertif" name="ccertif">
                  <option disabled selected>اختر</option>
                  <option value="بكالوريوس">بكالوريوس</option>
                  <option value="دبلوم"> دبلوم</option>
                </select>
              </div>
              <div class="col-md-4 col-12 mb-2 d-none cplace">
                <label for="cplace" class="form-label fw-bold">اسم مكان العمل </label>
                <input type="text" class="form-control" name="cplace" id="cplace" aria-describedby="emailHelp" />
              </div>
              <div class="col-md-4 col-12 mb-2 d-none cstartdate">
                <label class="form-label fw-bold">تاريخ المباشرة<span class="redStar">*</span></label>
                <div class="row">
                  <div class="col-4 col-sm-4">
                    <select id="day" name="day" class="form-select">
                      <option value="">
                        اليوم<span class="redStar">*</span>
                      </option>
                    </select>
                  </div>
                  <div class="col-4 col-sm-4 ">
                    <select id="month" name="month" class="form-select">
                      <option value="">
                        الشهر<span class="redStar">*</span>
                      </option>
                    </select>
                  </div>
                  <div class="col-4 col-sm-4">
                    <select id="year" name="year" class="form-select">
                      <option value="">
                        السنة<span class="redStar">*</span>
                      </option>
                    </select>
                  </div>
                </div>
              </div>
            <?php

            } ?>
            <!---------------------------------------------------------------------------------------------->
            <div class="col-md-12 col-12 d-flex flex-column mb-2">
              <label for="work-gov" class="form-label fw-bold">هل قمت بالعمل التطوعي في مجال اختصاصك مع جهة
                حكومية
                موثقة؟</label>
              <?php
              $chek = $rowwork['volunteer_work'];
              if ($chek == "نعم") {
              ?>
                <select class="form-select" aria-label="Default select example" id="work-gov" name="volunteer_work" required>
                  <option value="<?php echo $rowwork['volunteer_work']; ?>">
                    <?php echo $rowwork['volunteer_work']; ?></option>
                  <option value="كلا">كلا</option>


                </select>
            </div>
            <div class="col-12 col-sm-6 col-md-6 gov ">
              <label for="gov" class="form-label">اسم الجهة الحكومية<span class="redStar">*</span></label>
              <input type="text" class="form-control" id="gov" value="<?php echo $rowwork['government_place_work']; ?>" name="government_place_work" pattern="[ء-ي\s]+" title="يرجى إدخال الأحرف العربية فقط" />
            </div>
            <div class="col-12 col-sm-6 col-md-6 per-month ">
              <label for="per-month" class="form-label">مدة العمل بالشهور<span class="redStar">*</span></label>
              <input type="number" class="form-control" placeholder="<?php echo $rowwork['duration_work']; ?>" value="<?php echo $rowwork['duration_work']; ?>" id="per-month" name="duration_work" />
            </div>
          <?php
              } else {
          ?>

            <select class="form-select" aria-label="Default select example" id="work-gov" name="volunteer_work" required>
              <option value="<?php echo $rowwork['volunteer_work']; ?>">
                <?php echo $rowwork['volunteer_work']; ?></option>
              <option value="نعم">نعم</option>


            </select>
          </div>
          <div class="col-12 col-sm-6 col-md-6 gov d-none">
            <label for="gov" class="form-label">اسم الجهة الحكومية<span class="redStar">*</span></label>
            <input type="text" class="form-control" id="gov" value=" " name="government_place_work" pattern="[ء-ي\s]+" title="يرجى إدخال الأحرف العربية فقط" />
          </div>
          <div class="col-12 col-sm-6 col-md-6 per-month d-none">
            <label for="per-month" class="form-label">مدة العمل بالشهور<span class="redStar">*</span></label>
            <input type="number" class="form-control" value=" " id="per-month" name="duration_work" />
          </div>

        <?php
              }
        ?>
        <div class="col-md-12 col-12 d-flex flex-column mb-2">
          <label for="" class="form-label fw-bold">القدرة على استخدام الحاسوب </label>
          <select class="form-select" aria-label="Default select example" value="<?php echo $rowwork['computer_use']; ?>" name="computer_use" required>
            <option value="<?php echo $rowwork['computer_use']; ?>"><?php echo $rowwork['computer_use']; ?>
            </option>
            <option value="لا اجيد استخدامه">لا اجيد استخدامه</option>
            <option value="اجيد استخدامه نوعا ما">اجيد استخدامه نوعا ما</option>
            <option value="اجيد استخدامه">اجيد استخدامه</option>
            <option value="اجيد البرمجة و تقنية المعلومات">اجيد البرمجة و تقنية المعلومات</option>
          </select>
        </div>
        <?php
        $sql = "SELECT * from languages ";
        $res = mysqli_query($conn, $sql);
        if (mysqli_num_rows($res)) {


        ?>
          <div class="col-md-12 col-12 d-flex flex-column mb-2">
            <label for="" class="form-label fw-bold">هل تجيد لغات غير العربية ؟ </label>
            <select class=" form-select selectpicker w-100 text-center rtl" multiple aria-label="Default select example" data-live-search="true" value="<?php echo $rowwork['other_language']; ?>" name="other_language[]" multiple>
              <option selected><?php echo $rowwork['other_language']; ?></option>
              <?php
              while ($row = mysqli_fetch_assoc($res)) {
              ?>
                <option value="<?php echo $row['lang_name']; ?>"><?php echo $row['lang_name']; ?></option>
            <?php }
            } ?>
            </select>
            </select>
          </div>
    </div>
    <div class="row my-2 mb-2">
      <div class="col-md-3 col-12">
        <button type="submit" class="btn " name="btrwork" style="background: rgb(3, 6, 56); color:white;">حفظ
        </button>
        <a href="mainpage.php" type="button" class="btn btn-secondary">رجوع الى القائمة </a>
      </div>
    </div>

    </form>
    </div>
  </main>

<?php

      } else {
        if (isset($_POST['btrwork'])) {
          $volunteer_work = $_POST['volunteer_work'];
          $government_place_work = $_POST['government_place_work'];
          $duration_work = $_POST['duration_work'];
          $computer_use = $_POST['computer_use'];
          $other_language = $_POST['other_language'] ??  null;
          //$other_language = $_POST['$other_language'] 
          if (empty($other_language)) {
            $language = $other_language;
          } else {
            $language = implode("-", $other_language);
          }
          $old_work = $_POST['old_work'];
          if ($old_work == 'نعم') {
            $sector = $_POST['sector'];
            if ($sector == 'عام') {
              $otype = $_POST['otype'];
              $ocertif = $_POST['ocertif'];
              $oplace = $_POST['oplace'];
              $sday = $_POST['sday'];
              $smonth = $_POST['smonth'];
              $syear = $_POST['syear'];
              $ostartdate = $syear . '-' . $smonth . '-' . $sday;
              $eday = $_POST['eday'];
              $emonth = $_POST['emonth'];
              $eyear = $_POST['eyear'];
              $oenddate = $eyear . '-' . $emonth . '-' . $eday;
              $oresion = $_POST['oresion'];
            } elseif ($sector == 'خاص') {
              $otype = '';
              $ocertif = '';
              $oplace = $_POST['oplace'];
              $sday = $_POST['sday'];
              $smonth = $_POST['smonth'];
              $syear = $_POST['syear'];
              $ostartdate = $syear . '-' . $smonth . '-' . $sday;
              $eday = $_POST['eday'];
              $emonth = $_POST['emonth'];
              $eyear = $_POST['eyear'];
              $oenddate = $eyear . '-' . $emonth . '-' . $eday;
              $oresion = $_POST['oresion'];
              $otype = '';
              $ocertif = '';
            }
          } elseif ($old_work == 'كلا') {
            $sector = '';
            $otype = '';
            $ocertif = '';
            $oplace = '';
            $ostartdate = '0000-00-00';
            $oenddate = '0000-00-00';
            $oresion = '';
          }
          $curr_work = $_POST['curr_work'];
          if ($curr_work == 'نعم') {
            $csector = $_POST['csector'];
            if ($csector == 'عام') {
              $ctype = $_POST['ctype'];
              $ccertif = $_POST['ccertif'];
              $cplace = $_POST['cplace'];
              $day = $_POST['day'];
              $month = $_POST['month'];
              $year = $_POST['year'];
              $cstartdate = $year . '-' . $month . '-' . $day;
            } elseif ($csector == 'خاص') {
              $cplace = $_POST['cplace'];
              $day = $_POST['day'];
              $month = $_POST['month'];
              $year = $_POST['year'];
              $cstartdate = $year . '-' . $month . '-' . $day;

              $ctype = '';
              $ccertif = '';
            }
          } elseif ($curr_work == 'كلا') {
            $csector = '';
            $ctype = '';
            $ccertif = '';
            $cplace = '';
            $cstartdate = '0000-00-00';
          }
          $sqlwork = "INSERT INTO work_skills (user_id,old_work,old_sector,old_type,old_certif,old_place,old_sdate,old_edate,old_resion,
          curr_work,curr_sector,curr_type,curr_certif,curr_place,curr_sdate,volunteer_work,government_place_work,duration_work,computer_use,other_language,created_at,updated_at,deleted_at) 
           VALUES ('$idgreat',
           '$old_work',
           '$sector',
           '$otype',
           '$ocertif',
           '$oplace',
           '$ostartdate',
           '$oenddate',
           '$oresion',
           '$curr_work',
           '$csector',
           '$ctype',
           '$ccertif',
           '$cplace',
           '$cstartdate',
           '$volunteer_work', '$government_place_work', '$duration_work', ' $computer_use', '$language',now(),now(),now())";
          $reswork = mysqli_query($conn, $sqlwork);
          if ($reswork) {

            $sqlupdatflg = "UPDATE flag_forms SET workSkill_flag='1' where user_id='$idgreat'";
            $resultupflg = mysqli_query($conn, $sqlupdatflg);
            if ($resultupflg) {
              if ($volunteer_work == 'نعم') {
                $s = "INSERT into deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at)
        VALUES ('$idgreat','أمر العمل',0,'',now(),now())";
                $r = mysqli_query($conn, $s);
                if ($r) {
                  $_SESSION['ok'] = "ok";
                  #header("Location: mainpage.php");
                } else {
                  echo "nooo";
                }
              }
            }
            if ($old_work == 'نعم') {
              $s = "INSERT into deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at)
      VALUES ('$idgreat','أمر العمل السابق',0,'',now(),now())";
              $r = mysqli_query($conn, $s);
              if ($r) {
                $_SESSION['ok'] = "ok";
                #header("Location: mainpage.php");
              } else {
                echo "nooo";
              }
            }
            if ($curr_work == 'نعم') {
              $s = "INSERT into deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at)
      VALUES ('$idgreat','أمر العمل الحالي',0,'',now(),now())";
              $r = mysqli_query($conn, $s);
              if ($r) {
                $_SESSION['ok'] = "ok";
                #header("Location: mainpage.php");
              } else {
                echo "nooo";
              }
            }
            header("Location: mainpage.php");
          } else {
            echo "not add" . mysqli_error($conn);
          }
        }
?>
  <form action="" method="POST" class="mt-3">
    <div class="row my-1 mt-4 gy-3">
      <div class="col-md-12 col-12 d-flex flex-column mb-2">
        <label for="old_work" class="form-label fw-bold"> هل لديك عمل سابق ؟
        </label>
        <select class="form-select" aria-label="Default select example" id="old_work" name="old_work" required>
          <option disabled selected value="">اختر</option>
          <option value="نعم">نعم</option>
          <option value="كلا"> كلا</option>
        </select>
      </div>
      <!--في حالة الاجابة بنعم -->
      <div class="col-md-4 col-12 mb-2 sector d-none">
        <label for="sector" class="form-label fw-bold"> القطاع
        </label>
        <select class="form-select" aria-label="Default select example" id="sector" name="sector">
          <option disabled selected>اختر</option>
          <option value="عام">عام</option>
          <option value="خاص"> خاص</option>
        </select>
      </div>
      <div class="col-md-4 col-12 mb-2 d-none otype">
        <label for="otype" class="form-label fw-bold"> نوع التعيين
        </label>
        <select class="form-select" aria-label="Default select example" id="otype" name="otype">
          <option disabled selected>اختر</option>
          <option value="عقد">عقد</option>
          <option value="ملاك"> ملاك</option>
        </select>
      </div>
      <div class="col-md-4 col-12 mb-2 d-none ocertif">
        <label for="ocertif" class="form-label fw-bold"> الشهادة المعتمدة في التعيين
        </label>
        <select class="form-select" aria-label="Default select example" id="ocertif" name="ocertif">
          <option disabled selected>اختر</option>
          <option value="بكالوريوس">بكالوريوس</option>
          <option value="دبلوم"> دبلوم</option>
        </select>
      </div>
      <div class="col-md-4 col-12 mb-2 d-none oplace">
        <label for="oplace" class="form-label fw-bold">اسم مكان العمل </label>
        <input type="text" class="form-control" id="oplace" aria-describedby="emailHelp" name="oplace" />
      </div>
      <div class="col-md-4 col-12 mb-2 d-none ostartdate">
        <label class="form-label fw-bold">تاريخ المباشرة<span class="redStar">*</span></label>
        <div class="row">
          <div class="col-4 col-sm-4">
            <select id="sday" name="sday" class="form-select">
              <option value="">
                اليوم<span class="redStar">*</span>
              </option>
            </select>
          </div>
          <div class="col-4 col-sm-4 ">
            <select id="smonth" name="smonth" class="form-select">
              <option value="">
                الشهر<span class="redStar">*</span>
              </option>
            </select>
          </div>
          <div class="col-4 col-sm-4">
            <select id="syear" name="syear" class="form-select">
              <option value="">
                السنة<span class="redStar">*</span>
              </option>
            </select>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-12 mb-2 d-none oenddate">
        <label class="form-label fw-bold">تاريخ الترك<span class="redStar">*</span></label>
        <div class="row">
          <div class="col-4 col-sm-4">
            <select id="eday" name="eday" class="form-select">
              <option value="">
                اليوم<span class="redStar">*</span>
              </option>
            </select>
          </div>
          <div class="col-4 col-sm-4 ">
            <select id="emonth" name="emonth" class="form-select">
              <option value="">
                الشهر<span class="redStar">*</span>
              </option>
            </select>
          </div>
          <div class="col-4 col-sm-4">
            <select id="eyear" name="eyear" class="form-select">
              <option value="">
                السنة<span class="redStar">*</span>
              </option>
            </select>
          </div>
        </div>
      </div>
      <div class="col-4 mb-2 d-none oresion">
        <label for="oresion" class="form-label fw-bold">سبب الترك</label>
        <input type="text" class="form-control" id="oresion" name="oresion" aria-describedby="emailHelp" />
      </div>

      <div class="col-md-12 col-12 d-flex flex-column mb-2">
        <label for="curr_work" class="form-label fw-bold"> هل لديك عمل حالي ؟
        </label>
        <select class="form-select" aria-label="Default select example" id="curr_work" name="curr_work" required>
          <option disabled selected value="">اختر</option>
          <option value="نعم">نعم</option>
          <option value="كلا"> كلا</option>
        </select>
      </div>
      <!--//في حالة الاجابة بنعم -->
      <div class="col-md-4 col-12 mb-2 d-none csector">
        <label for="csector" class="form-label fw-bold"> القطاع
        </label>
        <select class="form-select" aria-label="Default select example" id="csector" name="csector">
          <option disabled selected>اختر</option>
          <option value="عام">عام</option>
          <option value="خاص"> خاص</option>
        </select>
      </div>
      <div class="col-md-4 col-12 mb-2 d-none ctype">
        <label for="ctype" class="form-label fw-bold"> نوع التعيين
        </label>
        <select class="form-select" aria-label="Default select example" id="ctype" name="ctype">
          <option disabled selected>اختر</option>
          <option value="عقد">عقد</option>
          <option value="ملاك"> ملاك</option>
        </select>
      </div>
      <div class="col-md-4 col-12 mb-2 d-none ccertif">
        <label for="ccertif" class="form-label fw-bold"> الشهادة المعتمدة في التعيين
        </label>
        <select class="form-select" aria-label="Default select example" id="ccertif" name="ccertif">
          <option disabled selected>اختر</option>
          <option value="بكالوريوس">بكالوريوس</option>
          <option value="دبلوم"> دبلوم</option>
        </select>
      </div>
      <div class="col-md-4 col-12 mb-2 d-none cplace">
        <label for="cplace" class="form-label fw-bold">اسم مكان العمل </label>
        <input type="text" class="form-control" name="cplace" id="cplace" aria-describedby="emailHelp" />
      </div>
      <div class="col-md-4 col-12 mb-2 d-none cstartdate">
        <label class="form-label fw-bold">تاريخ المباشرة<span class="redStar">*</span></label>
        <div class="row">
          <div class="col-4 col-sm-4">
            <select id="day" name="day" class="form-select">
              <option value="">
                اليوم<span class="redStar">*</span>
              </option>
            </select>
          </div>
          <div class="col-4 col-sm-4 ">
            <select id="month" name="month" class="form-select">
              <option value="">
                الشهر<span class="redStar">*</span>
              </option>
            </select>
          </div>
          <div class="col-4 col-sm-4">
            <select id="year" name="year" class="form-select">
              <option value="">
                السنة<span class="redStar">*</span>
              </option>
            </select>
          </div>
        </div>
      </div>

      <!--------------------------------------------------->
      <div class="col-md-12 col-12 d-flex flex-column mb-2">
        <label for="work-gov" class="form-label fw-bold">هل قمت بالعمل التطوعي في مجال اختصاصك مع جهة حكومية
          موثقة؟</label>
        <select class="form-select" aria-label="Default select example" id="work-gov" name="volunteer_work" required>
          <option disabled selected value="">اختر</option>
          <option value="نعم">نعم</option>
          <option value="كلا"> كلا</option>
        </select>
      </div>
      <div class="col-12 col-sm-6 col-md-6 gov d-none">
        <label for="gov" class="form-label">اسم الجهة الحكومية<span class="redStar">*</span></label>
        <input type="text" class="form-control" id="gov" name="government_place_work" pattern="[ء-ي\s]+" title="يرجى إدخال الأحرف العربية فقط" />
      </div>
      <div class="col-12 col-sm-6 col-md-6 per-month d-none">
        <label for="per-month" class="form-label">مدة العمل بالشهور<span class="redStar">*</span></label>
        <input type="number" class="form-control" id="per-month" name="duration_work" />
      </div>
      <div class="col-md-12 col-12 d-flex flex-column mb-2">
        <label for="" class="form-label fw-bold">القدرة على استخدام الحاسوب </label>
        <select class="form-select" aria-label="Default select example" name="computer_use" required>
          <option selected disabled value="">أختر من فضلك ..</option>
          <option value="لا اجيد استخدامه">لا اجيد استخدامه</option>
          <option value="اجيد استخدامه نوعا ما">اجيد استخدامه نوعا ما</option>
          <option value="اجيد استخدامه">اجيد استخدامه</option>
          <option value="اجيد البرمجة و تقنية المعلومات">اجيد البرمجة و تقنية المعلومات</option>
        </select>
      </div>
      <?php
        $sql = "SELECT * from languages ";
        $res = mysqli_query($conn, $sql);
        if (mysqli_num_rows($res)) {


      ?>
        <div class="col-md-12 col-12 d-flex flex-column mb-2">
          <label for="" class="form-label fw-bold">هل تجيد لغات غير العربية ؟ </label>
          <select class=" form-select selectpicker w-100 text-center rtl" multiple aria-label="Default select example" data-live-search="true" placeholder="أختر من فضلك" name="other_language[]" multiple>
            <?php
            while ($row = mysqli_fetch_assoc($res)) {
            ?>
              <option value="<?php echo $row['lang_name']; ?>"><?php echo $row['lang_name']; ?></option>
          <?php }
          } ?>
          </select>
        </div>
    </div>
    <div class="row my-2 mb-2">
      <div class="col-md-3 col-12">
        <button type="submit" class="btn " name="btrwork" style="background: rgb(3, 6, 56); color:white;">حفظ
        </button>
        <a href="mainpage.php" type="button" class="btn btn-secondary">رجوع الى القائمة </a>
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
<script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>
<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js'>
</script>
<!--<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>-->
<script src="assets/js/work.js"></script>

</body>

</html>