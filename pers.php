<?php
session_start();
$idgreat = $_SESSION['iduser'];
include('config.php');
$sqlchek = "SELECT * from personal_information where user_id = '$idgreat'";
$resultchek = mysqli_query($conn, $sqlchek);
if (mysqli_num_rows($resultchek) === 1) {
    //echo "hjnjnjnjb";
    $rowchk = mysqli_fetch_assoc($resultchek);
    if (isset($_POST['saveprof'])) {
        $allaqb = $_POST['sure_name'];
        $mothern = $_POST['mom-first-name'];
        $secmothern = $_POST['mom-second-name'];
        $themothern = $_POST['mom-third-name'];
        $nationalism = $_POST['nationalism'];
        $religion = $_POST['religion'];
        $gender = $_POST['gender'];
        $place_birth = $_POST['place_birth'];
        $bathday = $_POST['day'] . '-' . $_POST['month'] . '-' . $_POST['year'];
        if ($rowchk['national_card_flag'] == "1") {
            $family_number = $_POST['family_number'];
            $idcardbathday = $_POST['id-cardday'] . '-' . $_POST['id-cardmonth'] . '-' . $_POST['id-cardyear'];
            $civil_card_city = " ";
            $civil_status_ID_record = " ";
            $civil_status_ID_sheet_number = " ";
            $civil_date_card  = " ";
            $nationality_certificate_number = " ";
        } else if ($rowchk['national_card_flag'] == "2") {
            $family_number = " ";
            $idcardbathday = " ";
            $civil_card_city = $_POST['civil_card_city'];
            $civil_status_ID_record = $_POST['civil_status_ID_record'];
            $civil_status_ID_sheet_number = $_POST['civil_status_ID_sheet_number'];
            $civil_date_card  = $_POST['id-day'] . '-' . $_POST['id-month'] . '-' . $_POST['id-year'];
            $nationality_certificate_number = $_POST['nationality_certificate_number'];
        }
        $marital_status = $_POST['marital_status'];

        $sqlupdatemar = "UPDATE personal_information SET
     marital_status='$marital_status'   where user_id='$idgreat'";
        $resupdate = mysqli_query($conn, $sqlupdatemar);
        if (($resupdate)) {
            echo $marital_status;

            if ($marital_status == "متزوج") {
                $have_child = $_POST['have_child'];
                if ($have_child == "نعم") {
                    TODO: //تغيير الحالة حسب عدد الأطفال 
                    $number_child_less18 = $_POST['number_child_less18'];
                    if ($number_child_less18 == '1') {
                        $sqlch = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الأول اقل من 18',0,'',now(),now())";
                        $resch = mysqli_query($conn, $sqlch);
                    } elseif ($number_child_less18 == '2') {
                        $sqlch = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الأول اقل من 18',0,'',now(),now())";
                        $resch = mysqli_query($conn, $sqlch);
                        $sqlch2 = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الثاني اقل من 18',0,'',now(),now())";
                        $resch2 = mysqli_query($conn, $sqlch2);
                    } elseif ($number_child_less18 == '3') {
                        $sqlch = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الأول اقل من 18',0,'',now(),now())";
                        $resch = mysqli_query($conn, $sqlch);
                        $sqlch2 = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الثاني اقل من 18',0,'',now(),now())";
                        $resch2 = mysqli_query($conn, $sqlch2);
                        $sqlch3 = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الثالث اقل من 18',0,'',now(),now())";
                        $resch3 = mysqli_query($conn, $sqlch3);
                    } elseif ($number_child_less18 == '4') {
                        $sqlch = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الأول اقل من 18',0,'',now(),now())";
                        $resch = mysqli_query($conn, $sqlch);
                        $sqlch2 = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الثاني اقل من 18',0,'',now(),now())";
                        $resch2 = mysqli_query($conn, $sqlch2);
                        $sqlch3 = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الثالث اقل من 18',0,'',now(),now())";
                        $resch3 = mysqli_query($conn, $sqlch3);
                        $sqlch4 = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الرابع اقل من 18',0,'',now(),now())";
                        $resch4 = mysqli_query($conn, $sqlch4);
                    }

                    $number_child_more18 = $_POST['number_child_more18'];
                    if ($number_child_more18 == '1') {
                        $sqlch = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الأول اكبر من 18',0,'',now(),now())";
                        $resch = mysqli_query($conn, $sqlch);
                        $child18_first_reason = $_POST['child18_first_reason'];
                        $chid1 = "";
                        $child18_second_reason = '0';
                        $chid2 = "";
                        $child18_third_reason = '0';
                        $chid3 = "";
                        $child18_fourth_reason = '0';
                        $chid4 = "";
                    } elseif ($number_child_more18 == '2') {
                        $sqlch = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الأول اكبر من 18',0,'',now(),now())";
                        $resch = mysqli_query($conn, $sqlch);
                        $sqlch2 = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الثاني اكبر من 18',0,'',now(),now())";
                        $resch2 = mysqli_query($conn, $sqlch2);
                        $child18_first_reason = $_POST['child18_first_reason'];
                        $chid1 = "";
                        $child18_second_reason = $_POST['child18_second_reason'];
                        $chid2 = "";
                        $child18_third_reason = '0';
                        $chid3 = "";
                        $child18_fourth_reason = '0';
                        $chid4 = "";
                    } elseif ($number_child_more18 == '3') {
                        $sqlch = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الأول اكبر من 18',0,'',now(),now())";
                        $resch = mysqli_query($conn, $sqlch);
                        $sqlch2 = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الثاني اكبر من 18',0,'',now(),now())";
                        $resch2 = mysqli_query($conn, $sqlch2);
                        $sqlch3 = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الثالث اكبر من 18',0,'',now(),now())";
                        $resch3 = mysqli_query($conn, $sqlch3);
                        $child18_first_reason = $_POST['child18_first_reason'];
                        $chid1 = "";
                        $child18_second_reason = $_POST['child18_second_reason'];
                        $chid2 = "";
                        $child18_third_reason = $_POST['child18_third_reason'];
                        $chid3 = "";
                        $child18_fourth_reason = '0';
                        $chid4 = "";
                    } elseif ($number_child_more18 == '4') {
                        $sqlch = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الأول اكبر من 18',0,'',now(),now())";
                        $resch = mysqli_query($conn, $sqlch);
                        $sqlch2 = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الثاني اكبر من 18',0,'',now(),now())";
                        $resch2 = mysqli_query($conn, $sqlch2);
                        $sqlch3 = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الثالث اكبر من 18',0,'',now(),now())";
                        $resch3 = mysqli_query($conn, $sqlch3);
                        $sqlch4 = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الرابع اكبر من 18',0,'',now(),now())";
                        $resch4 = mysqli_query($conn, $sqlch4);
                        $child18_first_reason = $_POST['child18_first_reason'];
                        $chid1 = "";
                        $child18_second_reason = $_POST['child18_second_reason'];
                        $chid2 = "";
                        $child18_third_reason = $_POST['child18_third_reason'];
                        $chid3 = "";
                        $child18_fourth_reason = $_POST['child18_fourth_reason'];
                        $chid4 = "";
                    }
                } else {
                    $number_child_less18 = '0';
                    $number_child_more18 = '0';
                    $child18_first_reason = '0';
                    $chid1 = "";
                    $child18_second_reason = '0';
                    $chid2 = "";
                    $child18_third_reason = '0';
                    $chid3 = "";
                    $child18_fourth_reason = '0';
                    $chid4 = "";
                }

                $sqlmar = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','عقد زواج',0,'',now(),now())";
                $resmar = mysqli_query($conn, $sqlmar);
                if ($resmar) {
                    echo ";;;";
                } else {
                    echo mysqli_error($conn);
                }
            } elseif ($marital_status == "مطلق") {
                $have_child = $_POST['have_child'];
                if ($have_child == "نعم") {
                    $number_child_less18 = $_POST['number_child_less18'];
                    //TODO: //تغيير الحالة حسب عدد الأطفال 
                    if ($number_child_less18 == '1') {
                        $sqlch = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الأول اقل  من 18',0,'',now(),now())";
                        $resch = mysqli_query($conn, $sqlch);
                    } elseif ($number_child_less18 == '2') {
                        $sqlch = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الأول اقل  من 18',0,'',now(),now())";
                        $resch = mysqli_query($conn, $sqlch);
                        $sqlch2 = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الثاني اقل  من 18',0,'',now(),now())";
                        $resch2 = mysqli_query($conn, $sqlch2);
                    } elseif ($number_child_less18 == '3') {
                        $sqlch = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الأول اقل  من 18',0,'',now(),now())";
                        $resch = mysqli_query($conn, $sqlch);
                        $sqlch2 = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الثاني اقل  من 18',0,'',now(),now())";
                        $resch2 = mysqli_query($conn, $sqlch2);
                        $sqlch3 = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الثالث اقل  من 18',0,'',now(),now())";
                        $resch3 = mysqli_query($conn, $sqlch3);
                    } elseif ($number_child_less18 == '4') {
                        $sqlch = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الأول اقل  من 18',0,'',now(),now())";
                        $resch = mysqli_query($conn, $sqlch);
                        $sqlch2 = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الثاني اقل  من 18',0,'',now(),now())";
                        $resch2 = mysqli_query($conn, $sqlch2);
                        $sqlch3 = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الثالث اقل  من 18',0,'',now(),now())";
                        $resch3 = mysqli_query($conn, $sqlch3);
                        $sqlch4 = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الرابع اقل  من 18',0,'',now(),now())";
                        $resch4 = mysqli_query($conn, $sqlch4);
                    }
                    $number_child_more18 = $_POST['number_child_more18'];
                    if ($number_child_more18 == '1') {
                        $sqlch = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الأول اكبر من 18',0,'',now(),now())";
                        $resch = mysqli_query($conn, $sqlch);
                        $child18_first_reason = $_POST['child18_first_reason'];
                        $chid1 = "";
                        $child18_second_reason = '0';
                        $chid2 = "";
                        $child18_third_reason = '0';
                        $chid3 = "";
                        $child18_fourth_reason = '0';
                        $chid4 = "";
                    } elseif ($number_child_more18 == '2') {
                        $sqlch = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الأول اكبر من 18',0,'',now(),now())";
                        $resch = mysqli_query($conn, $sqlch);
                        $sqlch2 = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الثاني اكبر من 18',0,'',now(),now())";
                        $resch2 = mysqli_query($conn, $sqlch2);
                        $child18_first_reason = $_POST['child18_first_reason'];
                        $chid1 = "";
                        $child18_second_reason = $_POST['child18_second_reason'];
                        $chid2 = "";
                        $child18_third_reason = '0';
                        $chid3 = "";
                        $child18_fourth_reason = '0';
                        $chid4 = "";
                    } elseif ($number_child_more18 == '3') {
                        $sqlch = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الأول اكبر من 18',0,'',now(),now())";
                        $resch = mysqli_query($conn, $sqlch);
                        $sqlch2 = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الثاني اكبر من 18',0,'',now(),now())";
                        $resch2 = mysqli_query($conn, $sqlch2);
                        $sqlch3 = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الثالث اكبر من 18',0,'',now(),now())";
                        $resch3 = mysqli_query($conn, $sqlch3);
                        $child18_first_reason = $_POST['child18_first_reason'];
                        $chid1 = "";
                        $child18_second_reason = $_POST['child18_second_reason'];
                        $chid2 = "";
                        $child18_third_reason = $_POST['child18_third_reason'];
                        $chid3 = "";
                        $child18_fourth_reason = '0';
                        $chid4 = "";
                    } elseif ($number_child_more18 == '4') {
                        $sqlch = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الأول اكبر من 18',0,'',now(),now())";
                        $resch = mysqli_query($conn, $sqlch);
                        $sqlch2 = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الثاني اكبر من 18',0,'',now(),now())";
                        $resch2 = mysqli_query($conn, $sqlch2);
                        $sqlch3 = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الثالث اكبر من 18',0,'',now(),now())";
                        $resch3 = mysqli_query($conn, $sqlch3);
                        $sqlch4 = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الرابع اكبر من 18',0,'',now(),now())";
                        $resch4 = mysqli_query($conn, $sqlch4);
                        $child18_first_reason = $_POST['child18_first_reason'];
                        $chid1 = "";
                        $child18_second_reason = $_POST['child18_second_reason'];
                        $chid2 = "";
                        $child18_third_reason = $_POST['child18_third_reason'];
                        $chid3 = "";
                        $child18_fourth_reason = $_POST['child18_fourth_reason'];
                        $chid4 = "";
                    }
                } else {
                    $number_child_less18 = '0';
                    $number_child_more18 = '0';
                    $child18_first_reason = '0';
                    $chid1 = "";
                    $child18_second_reason = '0';
                    $chid2 = "";
                    $child18_third_reason = '0';
                    $chid3 = "";
                    $child18_fourth_reason = '0';
                    $chid4 = "";
                }

                $sqlmar = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','حجة طلاق',0,'',now(),now())";
                $resmar = mysqli_query($conn, $sqlmar);
                if ($resmar) {
                    echo ";;;";
                } else {
                    echo mysqli_error($conn);
                }
            } elseif ($marital_status == "اعزب") {
                $have_child = '0';
                $number_child_less18 = '0';
                $number_child_more18 = '0';
                $child18_first_reason = '0';
                $chid1 = "";
                $child18_second_reason = '0';
                $chid2 = "";
                $child18_third_reason = '0';
                $chid3 = "";
                $child18_fourth_reason = '0';
                $chid4 = "";
            }
            if ($marital_status == "ارمل") {

                $have_child = $_POST['have_child'];
                
                if ($have_child == "نعم") {
                    $number_child_less18 = $_POST['number_child_less18'];
                    //TODO: //تغيير الحالة حسب عدد الأطفال 
                    if ($number_child_less18 == '1') {
                        $sqlch = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الأول اقل  من 18',0,'',now(),now())";
                        $resch = mysqli_query($conn, $sqlch);
                    } elseif ($number_child_less18 == '2') {
                        $sqlch = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الأول اقل  من 18',0,'',now(),now())";
                        $resch = mysqli_query($conn, $sqlch);
                        $sqlch2 = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الثاني اقل  من 18',0,'',now(),now())";
                        $resch2 = mysqli_query($conn, $sqlch2);
                    } elseif ($number_child_less18 == '3') {
                        $sqlch = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الأول اقل  من 18',0,'',now(),now())";
                        $resch = mysqli_query($conn, $sqlch);
                        $sqlch2 = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الثاني اقل  من 18',0,'',now(),now())";
                        $resch2 = mysqli_query($conn, $sqlch2);
                        $sqlch3 = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الثالث اقل  من 18',0,'',now(),now())";
                        $resch3 = mysqli_query($conn, $sqlch3);
                    } elseif ($number_child_less18 == '4') {
                        $sqlch = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الأول اقل  من 18',0,'',now(),now())";
                        $resch = mysqli_query($conn, $sqlch);
                        $sqlch2 = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الثاني اقل  من 18',0,'',now(),now())";
                        $resch2 = mysqli_query($conn, $sqlch2);
                        $sqlch3 = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الثالث اقل  من 18',0,'',now(),now())";
                        $resch3 = mysqli_query($conn, $sqlch3);
                        $sqlch4 = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الرابع اقل  من 18',0,'',now(),now())";
                        $resch4 = mysqli_query($conn, $sqlch4);
                    }


                    $number_child_more18 = $_POST['number_child_more18'];
                    if ($number_child_more18 == '1') {
                        $sqlch = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الأول اكبر من 18',0,'',now(),now())";
                        $resch = mysqli_query($conn, $sqlch);
                        $child18_first_reason = $_POST['child18_first_reason'];
                        $chid1 = "";
                        $child18_second_reason = '0';
                        $chid2 = "";
                        $child18_third_reason = '0';
                        $chid3 = "";
                        $child18_fourth_reason = '0';
                        $chid4 = "";
                    } elseif ($number_child_more18 == '2') {
                        $sqlch = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الأول اكبر من 18',0,'',now(),now())";
                        $resch = mysqli_query($conn, $sqlch);
                        $sqlch2 = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الثاني اكبر من 18',0,'',now(),now())";
                        $resch2 = mysqli_query($conn, $sqlch2);
                        $child18_first_reason = $_POST['child18_first_reason'];
                        $chid1 = "";
                        $child18_second_reason = $_POST['child18_second_reason'];
                        $chid2 = "";
                        $child18_third_reason = '0';
                        $chid3 = "";
                        $child18_fourth_reason = '0';
                        $chid4 = "";
                    } elseif ($number_child_more18 == '3') {
                        $sqlch = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الأول اكبر من 18',0,'',now(),now())";
                        $resch = mysqli_query($conn, $sqlch);
                        $sqlch2 = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الثاني اكبر من 18',0,'',now(),now())";
                        $resch2 = mysqli_query($conn, $sqlch2);
                        $sqlch3 = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الثالث اكبر من 18',0,'',now(),now())";
                        $resch3 = mysqli_query($conn, $sqlch3);
                        $child18_first_reason = $_POST['child18_first_reason'];
                        $chid1 = "";
                        $child18_second_reason = $_POST['child18_second_reason'];
                        $chid2 = "";
                        $child18_third_reason = $_POST['child18_third_reason'];
                        $chid3 = "";
                        $child18_fourth_reason = '0';
                        $chid4 = "";
                    } elseif ($number_child_more18 == '4') {
                        $sqlch = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الأول اكبر من 18',0,'',now(),now())";
                        $resch = mysqli_query($conn, $sqlch);
                        $sqlch2 = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الثاني اكبر من 18',0,'',now(),now())";
                        $resch2 = mysqli_query($conn, $sqlch2);
                        $sqlch3 = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الثالث اكبر من 18',0,'',now(),now())";
                        $resch3 = mysqli_query($conn, $sqlch3);
                        $sqlch4 = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الرابع اكبر من 18',0,'',now(),now())";
                        $resch4 = mysqli_query($conn, $sqlch4);
                        $child18_first_reason = $_POST['child18_first_reason'];
                        $chid1 = "";
                        $child18_second_reason = $_POST['child18_second_reason'];
                        $chid2 = "";
                        $child18_third_reason = $_POST['child18_third_reason'];
                        $chid3 = "";
                        $child18_fourth_reason = $_POST['child18_fourth_reason'];
                        $chid4 = "";
                    }
                } else {
                    $number_child_less18 = '0';
                    $number_child_more18 = '0';
                    $child18_first_reason = '0';
                    $chid1 = "";
                    $child18_second_reason = '0';
                    $chid2 = "";
                    $child18_third_reason = '0';
                    $chid3 = "";
                    $child18_fourth_reason = '0';
                    $chid4 = "";
                }

                $sqlmar = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','شهادة وفاة الزوج/ة',0,'',now(),now())";
                $resmar = mysqli_query($conn, $sqlmar);
                if ($resmar) {
                    echo ";;;";
                } else {
                    echo mysqli_error($conn);
                }
            }
            //////////////////////الاعالة//////////////////
            $family_pay = $_POST['family-pay'];
            if ($family_pay == 'نعم') {
                $silat_alqaraba = $_POST['silat_alqaraba'];
                $sqlpay = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','سبب الأعالة',0,'',now(),now())";
                $respay = mysqli_query($conn, $sqlpay);
            } else {
                $silat_alqaraba = '';
            }


            $sqlupdateprof = "UPDATE personal_information SET
            sure_name='$allaqb',
             mother_firstname='$mothern',
            mother_secondname=' $secmothern',
            mother_thirdname=' $themothern',
            gender='$gender',
            personal_information_flag='1',
            nationalism='$nationalism',
            religion='$religion',
            brithday_date='$bathday',
            place_birth='$place_birth',
            family_number='$family_number',
            national_card_date='$idcardbathday',
            civil_card_city='$civil_card_city',
            civil_status_ID_record='$civil_status_ID_record',
            civil_status_ID_sheet_number='$civil_status_ID_sheet_number',
            civil_date_card='$civil_date_card',
            nationality_certificate_number='$nationality_certificate_number',

            have_child='$have_child',
            number_child_less18='$number_child_less18',
            number_child_more18='$number_child_more18',
            child18_first='$chid1',
            child18_first_reason='$child18_first_reason',
            child18_second='$chid2',
            child18_second_reason='$child18_second_reason',
            child18_third='$chid3',
            child18_third_reason='$child18_third_reason',
            child18_fourth='$chid4',
            child18_fourth_reason='$child18_fourth_reason',
            iieala='$family_pay',
            silat_alqaraba='$silat_alqaraba'
             where user_id='$idgreat'";
            $resultupdate = mysqli_query($conn, $sqlupdateprof);
            if (($resultupdate)) {
                # echo $have_child;

                $sqlupdatflg = "UPDATE flag_forms SET personal_info_flag='1' where user_id='$idgreat'";
                $resultupflg = mysqli_query($conn, $sqlupdatflg);
                if ($resultupflg) {
                }
            }
            ///القنوات ////
            $channel = $_POST['channel'];
            if ($channel == "1" || $channel == "5") {
                $upd = "UPDATE submission_channels SET   channel_type='$channel',updated_at=now() where user_id='$idgreat'";
                $r = mysqli_query($conn, $upd);
                header("Location: mainpage.php");
            } else if ($channel == "2" || $channel == "3") {
                $martyr_adjective = $_POST['martyr_adjective'];
                $mart_name = $_POST['martyr_name'];
                $mart_mothname = $_POST['mart_mothname'];
                $rqm_qrar = $_POST['rqm_qrar'];
                $hal_qraba = $_POST['halt_qraba'];
                $upd = "UPDATE submission_channels SET channel_type='$channel' ,martyr_adjective='$martyr_adjective' ,martyr_name='$mart_name',
            martyr_mother_name='$mart_mothname',raqm_alqarar='$rqm_qrar',tawsif_halat_alqaraba='$hal_qraba',updated_at=now() where user_id='$idgreat'";
                $r = mysqli_query($conn, $upd);
                if ($r) {
                    $sqlmar = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','أمر الشهيد',0,'',now(),now())";
                    $resmar = mysqli_query($conn, $sqlmar);
                    if ($resmar) {
                        $_SESSION['ok'] = "ok";
                        header("Location: mainpage.php");
                    }
                }
            } //قناة السجناء ///
            else {
                $martyr_adjective = $_POST['martyr_adjective'];
                $prisoner_name = $_POST['prisoner-name'];
                $prisoner_mother = $_POST['prisoner-mother'];
                $prisoner_qrarnumber = $_POST['rqm_qrar'];
                $prisoner_qraba = $_POST['halt_qraba'];
                $upd = "UPDATE submission_channels SET channel_type='$channel',prisoner_name='$prisoner_name',
                prisoner_mother_name='$prisoner_mother',raqm_alqarar='$prisoner_qrarnumber',tawsif_halat_alqaraba='$prisoner_qraba',updated_at=now() where user_id='$idgreat'";
                $r = mysqli_query($conn, $upd);
                if ($r) {

                    $sqlmar = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','أمر السجين',0,'',now(),now())";
                    $resmar = mysqli_query($conn, $sqlmar);
                    if ($resmar) {
                        $_SESSION['ok'] = "ok";
                        header("Location: mainpage.php");
                    }
                }
            }
        }
    } else{
        echo "noo";
    }
        
}
