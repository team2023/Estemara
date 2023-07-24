<?php
session_start();
include('config.php');
$idgreat = $_SESSION['iduser'];

$sqlchek = "SELECT * from personal_information where user_id = '$idgreat'";
$resultchek = mysqli_query($conn, $sqlchek);
if (mysqli_num_rows($resultchek) === 1) {
    //echo "hjnjnjnjb";
    $rowchk = mysqli_fetch_assoc($resultchek);
    if (isset($_POST['upprof'])) {
        $allaqb = $_POST['sure_name'];
        $mothern = $_POST['mom-first-name'];
        $secmothern = $_POST['mom-second-name'];
        $themothern = $_POST['mom-third-name'];
        $nationalism = $_POST['nationalism'];
        $religion = $_POST['religion'];
        $gender = $_POST['gender'];
        $place_birth = $_POST['place_birth'];
        $bathday = $_POST['day'] . '-' . $_POST['month'] . '-' . $_POST['year'];
        $marital_status = $_POST['marital_status'];
        echo $marital_status;
        if ($marital_status == "اعزب") {
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
            ///التحقق من حجة الطلاق 
            $chm2 = "SELECT * from deco where user_id='$idgreat' and type_dec='حجة طلاق'";
            $rsm2 = mysqli_query($conn, $chm2);

            if (mysqli_num_rows($rsm2) > 0) {
                $sqlmar2 = "DELETE FROM deco  where user_id='$idgreat' and type_dec='حجة طلاق'";
                $resmar2 = mysqli_query($conn, $sqlmar2);
                if ($resmar2) {
                    echo ";;;";
                } else {
                    echo mysqli_error($conn);
                }
            }
            ////التحقق من شهادة الوفاة //
            $chm3 = "SELECT * from deco where user_id='$idgreat' and type_dec='شهادة وفاة الزوج/ة'";
            $rsm3 = mysqli_query($conn, $chm3);

            if (mysqli_num_rows($rsm3) > 0) {
                $sqlmar3 = "DELETE FROM deco  where user_id='$idgreat' and type_dec='شهادة وفاة الزوج/ة'";
                $resmar3 = mysqli_query($conn, $sqlmar3);
                if ($resmar3) {
                    echo ";;;";
                } else {
                    echo mysqli_error($conn);
                }
            }
            ///التحقق من غقد الزواج  
            $chm2 = "SELECT * from deco where user_id='$idgreat' and type_dec='عقد زواج'";
            $rsm2 = mysqli_query($conn, $chm2);

            if (mysqli_num_rows($rsm2) > 0) {
                $sqlmar2 = "DELETE FROM deco  where user_id='$idgreat' and type_dec='عقد زواج'";
                $resmar2 = mysqli_query($conn, $sqlmar2);
                if ($resmar2) {
                    echo ";;;";
                } else {
                    echo mysqli_error($conn);
                }
            }
            ///التحقق من الأطفال الأقل من 18
            $ch1 = "SELECT * from deco where user_id='$idgreat' and type_dec='هوية الطفل الأول اقل من 18' ";
            $rs1 = mysqli_query($conn, $ch1);
            if (mysqli_num_rows($rs1) > 0) {
                $sqlc = "DELETE FROM deco  where user_id='$idgreat' and type_dec='هوية الطفل الأول اقل من 18' ";
                $resc = mysqli_query($conn, $sqlc);
            }
            $ch2 = "SELECT * from deco where user_id='$idgreat' and type_dec='هوية الطفل الثاني اقل من 18'         ";
            $rs2 = mysqli_query($conn, $ch2);
            if (mysqli_num_rows($rs2) > 0) {
                $sqlc2 = "DELETE FROM deco  where user_id='$idgreat' and type_dec='هوية الطفل الثاني اقل من 18' ";
                $resc2 = mysqli_query($conn, $sqlc2);
            }
            $ch3 = "SELECT * from deco where user_id='$idgreat' and type_dec='هوية الطفل الثالث اقل من 18'         ";
            $rs3 = mysqli_query($conn, $ch3);
            if (mysqli_num_rows($rs3) > 0) {
                $sqlc3 = "DELETE FROM deco  where user_id='$idgreat' and type_dec='هوية الطفل الثالث اقل من 18' ";
                $resc3 = mysqli_query($conn, $sqlc3);
            }
            $ch4 = "SELECT * from deco where user_id='$idgreat' and type_dec='هوية الطفل الرابع اقل من 18'         ";
            $rs4 = mysqli_query($conn, $ch4);
            if (mysqli_num_rows($rs4) > 0) {
                $sqlc4 = "DELETE FROM deco  where user_id='$idgreat' and type_dec='هوية الطفل الرابع اقل من 18' ";
                $resc4 = mysqli_query($conn, $sqlc4);
            }
            ///التحقق من الأطفال الاكبر من 18
            $chm1 = "SELECT * from deco where user_id='$idgreat' and type_dec='هوية الطفل الأول اكبر من 18' ";
            $rsm1 = mysqli_query($conn, $chm1);
            if (mysqli_num_rows($rsm1) > 0) {
                $sqlcm = "DELETE FROM deco  where user_id='$idgreat' and type_dec='هوية الطفل الأول اكبر من 18' ";
                $rescm = mysqli_query($conn, $sqlcm);
            }
            $chm2 = "SELECT * from deco where user_id='$idgreat' and type_dec='هوية الطفل الثاني اكبر من 18'         ";
            $rsm2 = mysqli_query($conn, $chm2);
            if (mysqli_num_rows($rsm2) > 0) {
                $sqlcm2 = "DELETE FROM deco  where user_id='$idgreat' and type_dec='هوية الطفل الثاني اكبر من 18' ";
                $rescm2 = mysqli_query($conn, $sqlcm2);
            }
            $chm3 = "SELECT * from deco where user_id='$idgreat' and type_dec='هوية الطفل الثالث اكبر من 18'         ";
            $rsm3 = mysqli_query($conn, $chm3);
            if (mysqli_num_rows($rsm3) > 0) {
                $sqlcm3 = "DELETE FROM deco  where user_id='$idgreat' and type_dec='هوية الطفل الثالث اكبر من 18' ";
                $rescm3 = mysqli_query($conn, $sqlcm3);
            }
            $chm4 = "SELECT * from deco where user_id='$idgreat' and type_dec='هوية الطفل الرابع اكبر من 18'         ";
            $rsm4 = mysqli_query($conn, $chm4);
            if (mysqli_num_rows($rsm4) > 0) {
                $sqlcm4 = "DELETE FROM deco  where user_id='$idgreat' and type_dec='هوية الطفل الرابع اكبر من 18' ";
                $resm4 = mysqli_query($conn, $sqlcm4);
            }
        }
        ///الحالة الاجتماعية متزوج 
        elseif ($marital_status == "متزوج") {
            $have_child = $_POST['have_child'];
            if ($have_child == "نعم") {
                $number_child_less18 = $_POST['number_child_less18'];
                if ($number_child_less18 == '1') {
                    $ch = "SELECT * from deco where user_id='$idgreat' and type_dec='هوية الطفل الأول اقل من 18'         ";
                    $rs = mysqli_query($conn, $ch);

                    if (mysqli_num_rows($rs) == 0) {
                        $sqlch = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الأول اقل من 18',0,'',now(),now())";
                        $resch = mysqli_query($conn, $sqlch);
                        if ($resch) {
                            echo ";;;";
                        } else {
                            echo "no1" . mysqli_error($conn);
                        }
                    }
                } elseif ($number_child_less18 == '2') {
                    $ch1 = "SELECT * from deco where user_id='$idgreat' and type_dec='هوية الطفل الأول اقل من 18'         ";
                    $rs1 = mysqli_query($conn, $ch1);

                    if (mysqli_num_rows($rs1) == 0) {
                        $sqlch = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الأول اقل من 18',0,'',now(),now())";
                        $resch = mysqli_query($conn, $sqlch);
                        if ($resch) {
                            echo ";;;";
                        } else {
                            echo "no1" . mysqli_error($conn);
                        }
                    }
                    $ch2 = "SELECT * from deco where user_id='$idgreat' and type_dec='هوية الطفل الثاني اقل من 18'         ";
                    $rs2 = mysqli_query($conn, $ch2);

                    if (mysqli_num_rows($rs2) == 0) {
                        $sqlch2 = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الثاني اقل من 18',0,'',now(),now())";
                        $resch2 = mysqli_query($conn, $sqlch2);
                        if ($resch2) {
                            echo ";;;";
                        } else {
                            echo "no1" . mysqli_error($conn);
                        }
                    }
                } elseif ($number_child_less18 == '3') {
                    $ch = "SELECT * from deco where user_id='$idgreat' and type_dec='هوية الطفل الأول اقل من 18'         ";
                    $rs = mysqli_query($conn, $ch);

                    if (mysqli_num_rows($rs) == 0) {
                        $sqlch = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الأول اقل من 18',0,'',now(),now())";
                        $resch = mysqli_query($conn, $sqlch);
                        if ($resch) {
                            echo ";;;";
                        } else {
                            echo "no1" . mysqli_error($conn);
                        }
                    }
                    $ch2 = "SELECT * from deco where user_id='$idgreat' and type_dec='هوية الطفل الثاني اقل من 18'         ";
                    $rs2 = mysqli_query($conn, $ch2);

                    if (mysqli_num_rows($rs2) == 0) {
                        $sqlch2 = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الثاني اقل من 18',0,'',now(),now())";
                        $resch2 = mysqli_query($conn, $sqlch2);
                        if ($resch2) {
                            echo ";;;";
                        } else {
                            echo "no1" . mysqli_error($conn);
                        }
                    }
                    $ch3 = "SELECT * from deco where user_id='$idgreat' and type_dec='هوية الطفل الثالث اقل من 18'         ";
                    $rs3 = mysqli_query($conn, $ch3);

                    if (mysqli_num_rows($rs3) == 0) {
                        $sqlch3 = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الثالث اقل من 18',0,'',now(),now())";
                        $resch3 = mysqli_query($conn, $sqlch3);
                        if ($resch3) {
                            echo ";;;";
                        } else {
                            echo "no1" . mysqli_error($conn);
                        }
                    }
                } elseif ($number_child_less18 == '4') {
                    $ch = "SELECT * from deco where user_id='$idgreat' and type_dec='هوية الطفل الأول اقل من 18'         ";
                    $rs = mysqli_query($conn, $ch);

                    if (mysqli_num_rows($rs) == 0) {
                        $sqlch = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الأول اقل من 18',0,'',now(),now())";
                        $resch = mysqli_query($conn, $sqlch);
                        if ($resch) {
                            echo ";;;";
                        } else {
                            echo "no1" . mysqli_error($conn);
                        }
                    }
                    $ch2 = "SELECT * from deco where user_id='$idgreat' and type_dec='هوية الطفل الثاني اقل من 18'         ";
                    $rs2 = mysqli_query($conn, $ch2);

                    if (mysqli_num_rows($rs2) == 0) {
                        $sqlch2 = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الثاني اقل من 18',0,'',now(),now())";
                        $resch2 = mysqli_query($conn, $sqlch2);
                        if ($resch2) {
                            echo ";;;";
                        } else {
                            echo "no1" . mysqli_error($conn);
                        }
                    }
                    $ch3 = "SELECT * from deco where user_id='$idgreat' and type_dec='هوية الطفل الثالث اقل من 18'         ";
                    $rs3 = mysqli_query($conn, $ch3);

                    if (mysqli_num_rows($rs3) == 0) {
                        $sqlch3 = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الثالث اقل من 18',0,'',now(),now())";
                        $resch3 = mysqli_query($conn, $sqlch3);
                        if ($resch3) {
                            echo ";;;";
                        } else {
                            echo "no1" . mysqli_error($conn);
                        }
                    }
                    $ch4 = "SELECT * from deco where user_id='$idgreat' and type_dec='هوية الطفل الرابع اقل من 18'  ";
                    $rs4 = mysqli_query($conn, $ch4);

                    if (mysqli_num_rows($rs4) == 0) {
                        $sqlch4 = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الرابع اقل من 18',0,'',now(),now())";
                        $resch4 = mysqli_query($conn, $sqlch4);
                        if ($resch4) {
                            echo ";;;";
                        } else {
                            echo "no1" . mysqli_error($conn);
                        }
                    }
                }
                $number_child_more18 = $_POST['number_child_more18'];
                if ($number_child_more18 == "0") {
                    $child18_first_reason = '0';
                    $chid1 = "";
                    $child18_second_reason = '0';
                    $chid2 = "";
                    $child18_third_reason = '0';
                    $chid3 = "";
                    $child18_fourth_reason = '0';
                    $chid4 = "";
                } else if ($number_child_more18 == "1") {
                    $child18_first_reason = $_POST['child18_first_reason'];
                    $chid1 = "";
                    $child18_second_reason = '0';
                    $chid2 = "";
                    $child18_third_reason = '0';
                    $chid3 = "";
                    $child18_fourth_reason = '0';
                    $chid4 = "";
                    $ch = "SELECT * from deco where user_id='$idgreat' and type_dec='هوية الطفل الأول اكبر من 18'";
                    $rs = mysqli_query($conn, $ch);

                    if (mysqli_num_rows($rs) == 0) {
                        $sqlch = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الأول اكبر من 18',0,'',now(),now())";
                        $resch = mysqli_query($conn, $sqlch);
                        if ($resch) {
                            echo ";;;";
                        } else {
                            echo "no1" . mysqli_error($conn);
                        }
                    }
                } else if ($number_child_more18 == "2") {
                    $child18_first_reason = $_POST['child18_first_reason'];
                    $chid1 = "";
                    $child18_second_reason = $_POST['child18_second_reason'];
                    $chid2 = "";
                    $child18_third_reason = '0';
                    $chid3 = "";
                    $child18_fourth_reason = '0';
                    $chid4 = "";
                    $ch = "SELECT * from deco where user_id='$idgreat' and type_dec='هوية الطفل الأول اكبر من 18'";
                    $rs = mysqli_query($conn, $ch);
                    if (mysqli_num_rows($rs) == 0) {
                        $sqlch = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) VALUES 
                    ('$idgreat','هوية الطفل الأول اكبر من 18',0,'',now(),now())";
                        $resch = mysqli_query($conn, $sqlch);
                        if ($resch) {
                        }
                    }
                    $ch1 = "SELECT * from deco where user_id='$idgreat' and type_dec='هوية الطفل الثاني اكبر من 18'        ";
                    $rs1 = mysqli_query($conn, $ch1);

                    if (mysqli_num_rows($rs1) == 0) {
                        $sqlch2 = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الأول اكبر من 18',0,'',now(),now())";
                        $resch2 = mysqli_query($conn, $sqlch2);
                        if ($resch2) {
                            echo ";;;";
                        } else {
                            echo "no2" . mysqli_error($conn);
                        }
                    }
                } else if ($number_child_more18 == "3") {
                    $child18_first_reason = $_POST['child18_first_reason'];
                    $chid1 = "";
                    $child18_second_reason = $_POST['child18_second_reason'];
                    $chid2 = "";
                    $child18_third_reason = $_POST['child18_third_reason'];
                    $chid3 = "";
                    $child18_fourth_reason = '0';
                    $chid4 = "";
                    $ch = "SELECT * from deco where user_id='$idgreat' and type_dec='هوية الطفل الأول اكبر من 18'";
                    $rs = mysqli_query($conn, $ch);
                    if (mysqli_num_rows($rs) == 0) {
                        $sqlch = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الأول اكبر من 18',0,'',now(),now())";
                        $resch = mysqli_query($conn, $sqlch);
                        if ($resch) {
                        } else {
                            echo "no13" . mysqli_error($conn);
                        }
                    }
                    $ch1 = "SELECT * from deco where user_id='$idgreat' and type_dec='هوية الطفل الثاني اكبر من 18'";
                    $rs1 = mysqli_query($conn, $ch1);
                    if (mysqli_num_rows($rs1) == 0) {
                        $sqlch2 = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at)  value ('$idgreat','هوية الطفل الثاني اكبر من 18',0,'',now(),now())";
                        $resch2 = mysqli_query($conn, $sqlch2);
                        if ($resch2) {
                        } else {
                            echo "no23" . mysqli_error($conn);
                        }
                    }
                    $ch2 = "SELECT * from deco where user_id='$idgreat' and type_dec='هوية الطفل الثالث اكبر من 18'";
                    $rs2 = mysqli_query($conn, $ch2);
                    if (mysqli_num_rows($rs2) == 0) {
                        $sqlch3 = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الثالث اكبر من 18',0,'',now(),now())";
                        $resch3 = mysqli_query($conn, $sqlch3);
                        if ($resch3) {
                            echo ";;;";
                        } else {
                            echo "no3" . mysqli_error($conn);
                        }
                    }
                } else if ($number_child_more18 == "4") {
                    $child18_first_reason = $_POST['child18_first_reason'];
                    $chid1 = "";
                    $child18_second_reason = $_POST['child18_second_reason'];
                    $chid2 = "";
                    $child18_third_reason = $_POST['child18_third_reason'];
                    $chid3 = "";
                    $child18_fourth_reason = $_POST['child18_fourth_reason'];
                    $chid4 = "";
                    $ch = "SELECT * from deco where user_id='$idgreat' and type_dec='هوية الطفل الأول اكبر من 18'";
                    $rs = mysqli_query($conn, $ch);
                    if (mysqli_num_rows($rs) == 0) {
                        $sqlch = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الأول اكبر من 18',0,'',now(),now())";
                        $resch = mysqli_query($conn, $sqlch);
                        if ($resch) {
                        }
                    }
                    $ch3 = "SELECT * from deco where user_id='$idgreat' and type_dec='هوية الطفل الثاني اكبر من 18'";
                    $rs3 = mysqli_query($conn, $ch3);
                    if (mysqli_num_rows($rs3) == 0) {
                        $sqlch2 = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الثاني اكبر من 18',0,'',now(),now())";
                        $resch2 = mysqli_query($conn, $sqlch2);
                        if ($resch2) {
                        }
                    }
                    $ch1 = "SELECT * from deco where user_id='$idgreat' and type_dec='هوية الطفل الثالث اكبر من 18'";
                    $rs1 = mysqli_query($conn, $ch1);
                    if (mysqli_num_rows($rs1) == 0) {
                        $sqlch3 = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الثالث اكبر من 18',0,'',now(),now())";
                        $resch3 = mysqli_query($conn, $sqlch3);
                        if ($resch3) {
                        }
                    }
                    $ch2 = "SELECT * from deco where user_id='$idgreat' and type_dec='هوية الطفل الرابع اكبر من 18'";
                    $rs2 = mysqli_query($conn, $ch2);
                    if (mysqli_num_rows($rs2) == 0) {
                        $sqlch4 = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الرابع اكبر من 18',0,'',now(),now())";
                        $resch4 = mysqli_query($conn, $sqlch4);
                        if ($resch4) {
                            echo ";;;";
                        }
                    }
                }
            } else {
                $number_child_less18 = '0';
                $number_child_more18 = '0';
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
            $ch = "SELECT * from deco where user_id='$idgreat' and type_dec='عقد زواج'";
            $rs = mysqli_query($conn, $ch);

            if (mysqli_num_rows($rs) == 0) {
                $sqlmar = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','عقد زواج',0,'',now(),now())";
                $resmar = mysqli_query($conn, $sqlmar);
                if ($resmar) {
                    echo ";;;";
                } else {
                    echo mysqli_error($conn);
                }
            }
            ///التحقق من حجة الطلاق 
            $chm2 = "SELECT * from deco where user_id='$idgreat' and type_dec='حجة طلاق'";
            $rsm2 = mysqli_query($conn, $chm2);

            if (mysqli_num_rows($rsm2) > 0) {
                $sqlmar2 = "DELETE FROM deco  where user_id='$idgreat' and type_dec='حجة طلاق'";
                $resmar2 = mysqli_query($conn, $sqlmar2);
                if ($resmar2) {
                    echo ";;;";
                } else {
                    echo mysqli_error($conn);
                }
            }
            ////التحقق من شهادة الوفاة //
            $chm3 = "SELECT * from deco where user_id='$idgreat' and type_dec='شهادة وفاة الزوج/ة'";
            $rsm3 = mysqli_query($conn, $chm3);

            if (mysqli_num_rows($rsm3) == 1) {
                $sqlmar3 = "DELETE FROM deco  where user_id='$idgreat' and type_dec='شهادة وفاة الزوج/ة'";
                $resmar3 = mysqli_query($conn, $sqlmar3);
                if ($resmar3) {
                    echo ";;;";
                } else {
                    echo mysqli_error($conn);
                }
            }
        }
        ////////////////////اذا كانت الحالة الزوجية مطلق ////////
        elseif ($marital_status == "مطلق") {
            $have_child = $_POST['have_child'];
            if ($have_child == "نعم") {
                $number_child_less18 = $_POST['number_child_less18'];
                if ($number_child_less18 == '1') {
                    $ch = "SELECT * from deco where user_id='$idgreat' and type_dec='هوية الطفل الأول اقل من 18'         ";
                    $rs = mysqli_query($conn, $ch);

                    if (mysqli_num_rows($rs) == 0) {
                        $sqlch = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الأول اقل من 18',0,'',now(),now())";
                        $resch = mysqli_query($conn, $sqlch);
                        if ($resch) {
                            echo ";;;";
                        } else {
                            echo "no1" . mysqli_error($conn);
                        }
                    }
                } elseif ($number_child_less18 == '2') {
                    $ch1 = "SELECT * from deco where user_id='$idgreat' and type_dec='هوية الطفل الأول اقل من 18'         ";
                    $rs1 = mysqli_query($conn, $ch1);

                    if (mysqli_num_rows($rs1) == 0) {
                        $sqlch = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الأول اقل من 18',0,'',now(),now())";
                        $resch = mysqli_query($conn, $sqlch);
                        if ($resch) {
                            echo ";;;";
                        } else {
                            echo "no1" . mysqli_error($conn);
                        }
                    }
                    $ch2 = "SELECT * from deco where user_id='$idgreat' and type_dec='هوية الطفل الثاني اقل من 18'         ";
                    $rs2 = mysqli_query($conn, $ch2);

                    if (mysqli_num_rows($rs2) == 0) {
                        $sqlch2 = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الثاني اقل من 18',0,'',now(),now())";
                        $resch2 = mysqli_query($conn, $sqlch2);
                        if ($resch2) {
                            echo ";;;";
                        } else {
                            echo "no1" . mysqli_error($conn);
                        }
                    }
                } elseif ($number_child_less18 == '3') {
                    $ch = "SELECT * from deco where user_id='$idgreat' and type_dec='هوية الطفل الأول اقل من 18'         ";
                    $rs = mysqli_query($conn, $ch);

                    if (mysqli_num_rows($rs) == 0) {
                        $sqlch = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الأول اقل من 18',0,'',now(),now())";
                        $resch = mysqli_query($conn, $sqlch);
                        if ($resch) {
                            echo ";;;";
                        } else {
                            echo "no1" . mysqli_error($conn);
                        }
                    }
                    $ch2 = "SELECT * from deco where user_id='$idgreat' and type_dec='هوية الطفل الثاني اقل من 18'         ";
                    $rs2 = mysqli_query($conn, $ch2);

                    if (mysqli_num_rows($rs2) == 0) {
                        $sqlch2 = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الثاني اقل من 18',0,'',now(),now())";
                        $resch2 = mysqli_query($conn, $sqlch2);
                        if ($resch2) {
                            echo ";;;";
                        } else {
                            echo "no1" . mysqli_error($conn);
                        }
                    }
                    $ch3 = "SELECT * from deco where user_id='$idgreat' and type_dec='هوية الطفل الثالث اقل من 18'         ";
                    $rs3 = mysqli_query($conn, $ch3);

                    if (mysqli_num_rows($rs3) == 0) {
                        $sqlch3 = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الثالث اقل من 18',0,'',now(),now())";
                        $resch3 = mysqli_query($conn, $sqlch3);
                        if ($resch3) {
                            echo ";;;";
                        } else {
                            echo "no1" . mysqli_error($conn);
                        }
                    }
                } elseif ($number_child_less18 == '4') {
                    $ch = "SELECT * from deco where user_id='$idgreat' and type_dec='هوية الطفل الأول اقل من 18'         ";
                    $rs = mysqli_query($conn, $ch);

                    if (mysqli_num_rows($rs) == 0) {
                        $sqlch = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الأول اقل من 18',0,'',now(),now())";
                        $resch = mysqli_query($conn, $sqlch);
                        if ($resch) {
                            echo ";;;";
                        } else {
                            echo "no1" . mysqli_error($conn);
                        }
                    }
                    $ch2 = "SELECT * from deco where user_id='$idgreat' and type_dec='هوية الطفل الثاني اقل من 18'         ";
                    $rs2 = mysqli_query($conn, $ch2);

                    if (mysqli_num_rows($rs2) == 0) {
                        $sqlch2 = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الثاني اقل من 18',0,'',now(),now())";
                        $resch2 = mysqli_query($conn, $sqlch2);
                        if ($resch2) {
                            echo ";;;";
                        } else {
                            echo "no1" . mysqli_error($conn);
                        }
                    }
                    $ch3 = "SELECT * from deco where user_id='$idgreat' and type_dec='هوية الطفل الثالث اقل من 18'         ";
                    $rs3 = mysqli_query($conn, $ch3);

                    if (mysqli_num_rows($rs3) == 0) {
                        $sqlch3 = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الثالث اقل من 18',0,'',now(),now())";
                        $resch3 = mysqli_query($conn, $sqlch3);
                        if ($resch3) {
                            echo ";;;";
                        } else {
                            echo "no1" . mysqli_error($conn);
                        }
                    }
                    $ch4 = "SELECT * from deco where user_id='$idgreat' and type_dec='هوية الطفل الرابع اقل من 18'  ";
                    $rs4 = mysqli_query($conn, $ch4);

                    if (mysqli_num_rows($rs4) == 0) {
                        $sqlch4 = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الرابع اقل من 18',0,'',now(),now())";
                        $resch4 = mysqli_query($conn, $sqlch4);
                        if ($resch4) {
                            echo ";;;";
                        } else {
                            echo "no1" . mysqli_error($conn);
                        }
                    }
                }
                $number_child_more18 = $_POST['number_child_more18'];
                if ($number_child_more18 == "0") {
                    $child18_first_reason = '0';
                    $chid1 = "";
                    $child18_second_reason = '0';
                    $chid2 = "";
                    $child18_third_reason = '0';
                    $chid3 = "";
                    $child18_fourth_reason = '0';
                    $chid4 = "";
                } else if ($number_child_more18 == "1") {
                    $child18_first_reason = $_POST['child18_first_reason'];
                    $chid1 = "";
                    $child18_second_reason = '0';
                    $chid2 = "";
                    $child18_third_reason = '0';
                    $chid3 = "";
                    $child18_fourth_reason = '0';
                    $chid4 = "";
                    $ch = "SELECT * from deco where user_id='$idgreat' and type_dec='هوية الطفل الأول اكبر من 18'         ";
                    $rs = mysqli_query($conn, $ch);

                    if (mysqli_num_rows($rs) == 0) {
                        $sqlch = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الأول اكبر من 18',0,'',now(),now())";
                        $resch = mysqli_query($conn, $sqlch);
                        if ($resch) {
                            echo ";;;";
                        } else {
                            echo "no1" . mysqli_error($conn);
                        }
                    }
                } else if ($number_child_more18 == "2") {
                    $child18_first_reason = $_POST['child18_first_reason'];
                    $chid1 = "";
                    $child18_second_reason = $_POST['child18_second_reason'];
                    $chid2 = "";
                    $child18_third_reason = '0';
                    $chid3 = "";
                    $child18_fourth_reason = '0';
                    $chid4 = "";
                    $ch = "SELECT * from deco where user_id='$idgreat' and type_dec='هوية الطفل الأول اكبر من 18'";
                    $rs = mysqli_query($conn, $ch);
                    if (mysqli_num_rows($rs) == 0) {
                        $sqlch = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) VALUES 
            ('$idgreat','هوية الطفل الأول اكبر من 18',0,'',now(),now())";
                        $resch = mysqli_query($conn, $sqlch);
                        if ($resch) {
                        }
                    }
                    $ch1 = "SELECT * from deco where user_id='$idgreat' and type_dec='هوية الطفل الثاني اكبر من 18'        ";
                    $rs1 = mysqli_query($conn, $ch1);

                    if (mysqli_num_rows($rs1) == 0) {
                        $sqlch2 = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الثاني اكبر من 18',0,'',now(),now())";
                        $resch2 = mysqli_query($conn, $sqlch2);
                        if ($resch2) {
                            echo ";;;";
                        } else {
                            echo "no2" . mysqli_error($conn);
                        }
                    }
                } else if ($number_child_more18 == "3") {
                    $child18_first_reason = $_POST['child18_first_reason'];
                    $chid1 = "";
                    $child18_second_reason = $_POST['child18_second_reason'];
                    $chid2 = "";
                    $child18_third_reason = $_POST['child18_third_reason'];
                    $chid3 = "";
                    $child18_fourth_reason = '0';
                    $chid4 = "";
                    $ch = "SELECT * from deco where user_id='$idgreat' and type_dec='هوية الطفل الأول اكبر من 18'";
                    $rs = mysqli_query($conn, $ch);
                    if (mysqli_num_rows($rs) == 0) {
                        $sqlch = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الأول اكبر من 18',0,'',now(),now())";
                        $resch = mysqli_query($conn, $sqlch);
                        if ($resch) {
                        } else {
                            echo "no13" . mysqli_error($conn);
                        }
                    }
                    $ch1 = "SELECT * from deco where user_id='$idgreat' and type_dec='هوية الطفل الثاني اكبر من 18'";
                    $rs1 = mysqli_query($conn, $ch1);
                    if (mysqli_num_rows($rs1) == 0) {
                        $sqlch2 = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at)  value ('$idgreat','هوية الطفل الثاني اكبر من 18',0,'',now(),now())";
                        $resch2 = mysqli_query($conn, $sqlch2);
                        if ($resch2) {
                        } else {
                            echo "no23" . mysqli_error($conn);
                        }
                    }
                    $ch2 = "SELECT * from deco where user_id='$idgreat' and type_dec='هوية الطفل الثالث اكبر من 18'";
                    $rs2 = mysqli_query($conn, $ch2);
                    if (mysqli_num_rows($rs2) == 0) {
                        $sqlch3 = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الثالث اكبر من 18',0,'',now(),now())";
                        $resch3 = mysqli_query($conn, $sqlch3);
                        if ($resch3) {
                            echo ";;;";
                        } else {
                            echo "no3" . mysqli_error($conn);
                        }
                    }
                } else if ($number_child_more18 == "4") {
                    $child18_first_reason = $_POST['child18_first_reason'];
                    $chid1 = "";
                    $child18_second_reason = $_POST['child18_second_reason'];
                    $chid2 = "";
                    $child18_third_reason = $_POST['child18_third_reason'];
                    $chid3 = "";
                    $child18_fourth_reason = $_POST['child18_fourth_reason'];
                    $chid4 = "";
                    $ch = "SELECT * from deco where user_id='$idgreat' and type_dec='هوية الطفل الأول اكبر من 18'";
                    $rs = mysqli_query($conn, $ch);
                    if (mysqli_num_rows($rs) == 0) {
                        $sqlch = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الأول اكبر من 18',0,'',now(),now())";
                        $resch = mysqli_query($conn, $sqlch);
                        if ($resch) {
                        }
                    }
                    $ch3 = "SELECT * from deco where user_id='$idgreat' and type_dec='هوية الطفل الثاني اكبر من 18'";
                    $rs3 = mysqli_query($conn, $ch3);
                    if (mysqli_num_rows($rs3) == 0) {
                        $sqlch2 = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الثاني اكبر من 18',0,'',now(),now())";
                        $resch2 = mysqli_query($conn, $sqlch2);
                        if ($resch2) {
                        }
                    }
                    $ch1 = "SELECT * from deco where user_id='$idgreat' and type_dec='هوية الطفل الثالث اكبر من 18'";
                    $rs1 = mysqli_query($conn, $ch1);
                    if (mysqli_num_rows($rs1) == 0) {
                        $sqlch3 = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الثالث اكبر من 18',0,'',now(),now())";
                        $resch3 = mysqli_query($conn, $sqlch3);
                        if ($resch3) {
                        }
                    }
                    $ch2 = "SELECT * from deco where user_id='$idgreat' and type_dec='هوية الطفل الرابع اكبر من 18'";
                    $rs2 = mysqli_query($conn, $ch2);
                    if (mysqli_num_rows($rs2) == 0) {
                        $sqlch4 = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الرابع اكبر من 18',0,'',now(),now())";
                        $resch4 = mysqli_query($conn, $sqlch4);
                        if ($resch4) {
                            echo ";;;";
                        }
                    }
                }
            } else {
                $number_child_less18 = '0';
                $number_child_more18 = '0';
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
            $ch = "SELECT * from deco where user_id='$idgreat' and type_dec='حجة طلاق'";
            $rs = mysqli_query($conn, $ch);

            if (mysqli_num_rows($rs) == 0) {
                $sqlmar = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','حجة طلاق',0,'',now(),now())";
                $resmar = mysqli_query($conn, $sqlmar);
                if ($resmar) {
                    echo ";;;";
                } else {
                    echo mysqli_error($conn);
                }
            }
            ///التحقق من غقد الزواج  
            $chm2 = "SELECT * from deco where user_id='$idgreat' and type_dec='عقد زواج'";
            $rsm2 = mysqli_query($conn, $chm2);

            if (mysqli_num_rows($rsm2) > 0) {
                $sqlmar2 = "DELETE FROM deco  where user_id='$idgreat' and type_dec='عقد زواج'";
                $resmar2 = mysqli_query($conn, $sqlmar2);
                if ($resmar2) {
                    echo ";;;";
                } else {
                    echo mysqli_error($conn);
                }
            }
            ////التحقق من شهادة الوفاة //
            $chm3 = "SELECT * from deco where user_id='$idgreat' and type_dec='شهادة وفاة الزوج/ة'";
            $rsm3 = mysqli_query($conn, $chm3);

            if (mysqli_num_rows($rsm3) == 1) {
                $sqlmar3 = "DELETE FROM deco  where user_id='$idgreat' and type_dec='شهادة وفاة الزوج/ة'";
                $resmar3 = mysqli_query($conn, $sqlmar3);
                if ($resmar3) {
                    echo ";;;";
                } else {
                    echo mysqli_error($conn);
                }
            }
        }
        ///الحالة الاجتماعية أرمل //////////////
        elseif ($marital_status == "ارمل") {
            $have_child = $_POST['have_child'];
            if ($have_child == "نعم") {
                $number_child_less18 = $_POST['number_child_less18'];
                if ($number_child_less18 == '1') {
                    $ch = "SELECT * from deco where user_id='$idgreat' and type_dec='هوية الطفل الأول اقل من 18'         ";
                    $rs = mysqli_query($conn, $ch);

                    if (mysqli_num_rows($rs) == 0) {
                        $sqlch = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الأول اقل من 18',0,'',now(),now())";
                        $resch = mysqli_query($conn, $sqlch);
                        if ($resch) {
                            echo ";;;";
                        } else {
                            echo "no1" . mysqli_error($conn);
                        }
                    }
                } elseif ($number_child_less18 == '2') {
                    $ch = "SELECT * from deco where user_id='$idgreat' and type_dec='هوية الطفل الأول اقل من 18'         ";
                    $rs = mysqli_query($conn, $ch);

                    if (mysqli_num_rows($rs) == 0) {
                        $sqlch = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الأول اقل من 18',0,'',now(),now())";
                        $resch = mysqli_query($conn, $sqlch);
                        if ($resch) {
                            echo ";;;";
                        } else {
                            echo "no1" . mysqli_error($conn);
                        }
                    }
                    $ch2 = "SELECT * from deco where user_id='$idgreat' and type_dec='هوية الطفل الثاني اقل من 18'         ";
                    $rs2 = mysqli_query($conn, $ch2);

                    if (mysqli_num_rows($rs2) == 0) {
                        $sqlch2 = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الثاني اقل من 18',0,'',now(),now())";
                        $resch2 = mysqli_query($conn, $sqlch2);
                        if ($resch2) {
                            echo ";;;";
                        } else {
                            echo "no1" . mysqli_error($conn);
                        }
                    }
                } elseif ($number_child_less18 == '3') {
                    $ch = "SELECT * from deco where user_id='$idgreat' and type_dec='هوية الطفل الأول اقل من 18'         ";
                    $rs = mysqli_query($conn, $ch);

                    if (mysqli_num_rows($rs) == 0) {
                        $sqlch = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الأول اقل من 18',0,'',now(),now())";
                        $resch = mysqli_query($conn, $sqlch);
                        if ($resch) {
                            echo ";;;";
                        } else {
                            echo "no1" . mysqli_error($conn);
                        }
                    }
                    $ch2 = "SELECT * from deco where user_id='$idgreat' and type_dec='هوية الطفل الثاني اقل من 18'         ";
                    $rs2 = mysqli_query($conn, $ch2);

                    if (mysqli_num_rows($rs2) == 0) {
                        $sqlch2 = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الثاني اقل من 18',0,'',now(),now())";
                        $resch2 = mysqli_query($conn, $sqlch2);
                        if ($resch2) {
                            echo ";;;";
                        } else {
                            echo "no1" . mysqli_error($conn);
                        }
                    }
                    $ch3 = "SELECT * from deco where user_id='$idgreat' and type_dec='هوية الطفل الثالث اقل من 18'         ";
                    $rs3 = mysqli_query($conn, $ch3);

                    if (mysqli_num_rows($rs3) == 0) {
                        $sqlch3 = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الثالث اقل من 18',0,'',now(),now())";
                        $resch3 = mysqli_query($conn, $sqlch3);
                        if ($resch3) {
                            echo ";;;";
                        } else {
                            echo "no1" . mysqli_error($conn);
                        }
                    }
                } elseif ($number_child_less18 == '4') {
                    $ch = "SELECT * from deco where user_id='$idgreat' and type_dec='هوية الطفل الأول اقل من 18'        ";
                    $rs = mysqli_query($conn, $ch);

                    if (mysqli_num_rows($rs) == 0) {
                        $sqlch = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الأول اقل من 18',0,'',now(),now())";
                        $resch = mysqli_query($conn, $sqlch);
                        if ($resch) {
                            echo ";;;";
                        } else {
                            echo "no1" . mysqli_error($conn);
                        }
                    }
                    $ch2 = "SELECT * from deco where user_id='$idgreat' and type_dec='هوية الطفل الثاني اقل من 18'         ";
                    $rs2 = mysqli_query($conn, $ch2);

                    if (mysqli_num_rows($rs2) == 0) {
                        $sqlch2 = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الثاني اقل من 18',0,'',now(),now())";
                        $resch2 = mysqli_query($conn, $sqlch2);
                        if ($resch2) {
                            echo ";;;";
                        } else {
                            echo "no1" . mysqli_error($conn);
                        }
                    }
                    $ch3 = "SELECT * from deco where user_id='$idgreat' and type_dec='هوية الطفل الثالث اقل من 18'         ";
                    $rs3 = mysqli_query($conn, $ch3);

                    if (mysqli_num_rows($rs3) == 0) {
                        $sqlch3 = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الثالث اقل من 18',0,'',now(),now())";
                        $resch3 = mysqli_query($conn, $sqlch3);
                        if ($resch3) {
                            echo ";;;";
                        } else {
                            echo "no1" . mysqli_error($conn);
                        }
                    }
                    $ch4 = "SELECT * from deco where user_id='$idgreat' and type_dec='هوية الطفل الرابع اقل من 18'  ";
                    $rs4 = mysqli_query($conn, $ch4);

                    if (mysqli_num_rows($rs4) == 0) {
                        $sqlch4 = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الرابع اقل من 18',0,'',now(),now())";
                        $resch4 = mysqli_query($conn, $sqlch4);
                        if ($resch4) {
                            echo ";;;";
                        } else {
                            echo "no1" . mysqli_error($conn);
                        }
                    }
                }
                $number_child_more18 = $_POST['number_child_more18'];
                if ($number_child_more18 == "0") {
                    $child18_first_reason = '0';
                    $chid1 = "";
                    $child18_second_reason = '0';
                    $chid2 = "";
                    $child18_third_reason = '0';
                    $chid3 = "";
                    $child18_fourth_reason = '0';
                    $chid4 = "";
                } else if ($number_child_more18 == "1") {
                    $child18_first_reason = $_POST['child18_first_reason'];
                    $chid1 = "";
                    $child18_second_reason = '0';
                    $chid2 = "";
                    $child18_third_reason = '0';
                    $chid3 = "";
                    $child18_fourth_reason = '0';
                    $chid4 = "";
                    $ch = "SELECT * from deco where user_id='$idgreat' and type_dec='هوية الطفل الأول اكبر من 18'         ";
                    $rs = mysqli_query($conn, $ch);

                    if (mysqli_num_rows($rs) == 0) {
                        $sqlch = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الأول اكبر من 18',0,'',now(),now())";
                        $resch = mysqli_query($conn, $sqlch);
                        if ($resch) {
                            echo ";;;";
                        } else {
                            echo "no1" . mysqli_error($conn);
                        }
                    }
                } else if ($number_child_more18 == "2") {
                    $child18_first_reason = $_POST['child18_first_reason'];
                    $chid1 = "";
                    $child18_second_reason = $_POST['child18_second_reason'];
                    $chid2 = "";
                    $child18_third_reason = '0';
                    $chid3 = "";
                    $child18_fourth_reason = '0';
                    $chid4 = "";
                    $ch = "SELECT * from deco where user_id='$idgreat' and type_dec='هوية الطفل الأول اكبر من 18'";
                    $rs = mysqli_query($conn, $ch);
                    if (mysqli_num_rows($rs) == 0) {
                        $sqlch = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) VALUES 
            ('$idgreat','هوية الطفل الأول اكبر من 18',0,'',now(),now())";
                        $resch = mysqli_query($conn, $sqlch);
                        if ($resch) {
                        }
                    }
                    $ch1 = "SELECT * from deco where user_id='$idgreat' and type_dec='هوية الطفل الثاني اكبر من 18'         ";
                    $rs1 = mysqli_query($conn, $ch1);

                    if (mysqli_num_rows($rs1) == 0) {
                        $sqlch2 = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الثاني اكبر من 18',0,'',now(),now())";
                        $resch2 = mysqli_query($conn, $sqlch2);
                        if ($resch2) {
                            echo ";;;";
                        } else {
                            echo "no2" . mysqli_error($conn);
                        }
                    }
                } else if ($number_child_more18 == "3") {
                    $child18_first_reason = $_POST['child18_first_reason'];
                    $chid1 = "";
                    $child18_second_reason = $_POST['child18_second_reason'];
                    $chid2 = "";
                    $child18_third_reason = $_POST['child18_third_reason'];
                    $chid3 = "";
                    $child18_fourth_reason = '0';
                    $chid4 = "";
                    $ch = "SELECT * from deco where user_id='$idgreat' and type_dec='هوية الطفل الأول اكبر من 18'";
                    $rs = mysqli_query($conn, $ch);
                    if (mysqli_num_rows($rs) == 0) {
                        $sqlch = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الأول اكبر من 18',0,'',now(),now())";
                        $resch = mysqli_query($conn, $sqlch);
                        if ($resch) {
                        } else {
                            echo "no13" . mysqli_error($conn);
                        }
                    }
                    $ch1 = "SELECT * from deco where user_id='$idgreat' and type_dec='هوية الطفل الثاني اكبر من 18'";
                    $rs1 = mysqli_query($conn, $ch1);
                    if (mysqli_num_rows($rs1) == 0) {
                        $sqlch2 = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at)  value ('$idgreat','هوية الطفل الثاني اكبر من 18',0,'',now(),now())";
                        $resch2 = mysqli_query($conn, $sqlch2);
                        if ($resch2) {
                        } else {
                            echo "no23" . mysqli_error($conn);
                        }
                    }
                    $ch2 = "SELECT * from deco where user_id='$idgreat' and type_dec='هوية الطفل الثالث اكبر من 18'";
                    $rs2 = mysqli_query($conn, $ch2);
                    if (mysqli_num_rows($rs2) == 0) {
                        $sqlch3 = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الثالث اكبر من 18',0,'',now(),now())";
                        $resch3 = mysqli_query($conn, $sqlch3);
                        if ($resch3) {
                            echo ";;;";
                        } else {
                            echo "no3" . mysqli_error($conn);
                        }
                    }
                } else if ($number_child_more18 == "4") {
                    $child18_first_reason = $_POST['child18_first_reason'];
                    $chid1 = "";
                    $child18_second_reason = $_POST['child18_second_reason'];
                    $chid2 = "";
                    $child18_third_reason = $_POST['child18_third_reason'];
                    $chid3 = "";
                    $child18_fourth_reason = $_POST['child18_fourth_reason'];
                    $chid4 = "";
                    $ch = "SELECT * from deco where user_id='$idgreat' and type_dec='هوية الطفل الأول اكبر من 18'";
                    $rs = mysqli_query($conn, $ch);
                    if (mysqli_num_rows($rs) == 0) {
                        $sqlch = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الأول اكبر من 18',0,'',now(),now())";
                        $resch = mysqli_query($conn, $sqlch);
                        if ($resch) {
                        }
                    }
                    $ch3 = "SELECT * from deco where user_id='$idgreat' and type_dec='هوية الطفل الثاني اكبر من 18'";
                    $rs3 = mysqli_query($conn, $ch3);
                    if (mysqli_num_rows($rs3) == 0) {
                        $sqlch2 = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الثاني اكبر من 18',0,'',now(),now())";
                        $resch2 = mysqli_query($conn, $sqlch2);
                        if ($resch2) {
                        }
                    }
                    $ch1 = "SELECT * from deco where user_id='$idgreat' and type_dec='هوية الطفل الثالث اكبر من 18'";
                    $rs1 = mysqli_query($conn, $ch1);
                    if (mysqli_num_rows($rs1) == 0) {
                        $sqlch3 = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الثالث اكبر من 18',0,'',now(),now())";
                        $resch3 = mysqli_query($conn, $sqlch3);
                        if ($resch3) {
                        }
                    }
                    $ch2 = "SELECT * from deco where user_id='$idgreat' and type_dec='هوية الطفل الرابع اكبر من 18'";
                    $rs2 = mysqli_query($conn, $ch2);
                    if (mysqli_num_rows($rs2) == 0) {
                        $sqlch4 = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','هوية الطفل الرابع اكبر من 18',0,'',now(),now())";
                        $resch4 = mysqli_query($conn, $sqlch4);
                        if ($resch4) {
                            echo ";;;";
                        }
                    }
                }
            } else {
                $number_child_less18 = '0';
                $number_child_more18 = '0';
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
            $ch = "SELECT * from deco where user_id='$idgreat' and type_dec='شهادة وفاة الزوج/ة'";
            $rs = mysqli_query($conn, $ch);

            if (mysqli_num_rows($rs) == 0) {
                $sqlmar = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','شهادة وفاة الزوج/ة',0,'',now(),now())";
                $resmar = mysqli_query($conn, $sqlmar);
                if ($resmar) {
                    echo ";;;";
                } else {
                    echo mysqli_error($conn);
                }
            }
            ///التحقق من حجة الطلاق 
            $chm2 = "SELECT * from deco where user_id='$idgreat' and type_dec='حجة طلاق'";
            $rsm2 = mysqli_query($conn, $chm2);

            if (mysqli_num_rows($rsm2) == 1) {
                $sqlmar2 = "DELETE FROM deco  where user_id='$idgreat' and type_dec='حجة طلاق'";
                $resmar2 = mysqli_query($conn, $sqlmar2);
                if ($resmar2) {
                    echo ";;;";
                } else {
                    echo mysqli_error($conn);
                }
            }
            ////التحقق من عقد الزواج  //
            $chm3 = "SELECT * from deco where user_id='$idgreat' and type_dec='عقد زواج' ";
            $rsm3 = mysqli_query($conn, $chm3);

            if (mysqli_num_rows($rsm3) == 1) {
                $sqlmar3 = "DELETE FROM deco  where user_id='$idgreat' and type_dec='عقد زواج'";
                $resmar3 = mysqli_query($conn, $sqlmar3);
                if ($resmar3) {
                    echo ";;;";
                } else {
                    echo mysqli_error($conn);
                }
            }
        }
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







            # $number_child_less18 = $_POST['number_child_less18'];
            #$number_child_more18 = $_POST['number_child_more18'];
            #$child18_first_reason = $_POST['child18_first_reason'];
            #$child18_second_reason = $_POST['child18_second_reason'];
            #$child18_third_reason = $_POST['child18_third_reason'];
            #$child18_fourth_reason = $_POST['child18_fourth_reason'];


        }
        $family_pay = $_POST['family-pay'];
        if ($family_pay == 'نعم') {
            $silat_alqaraba = $_POST['silat_alqaraba'];
            $sqlpay = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','سبب الأعالة',0,'',now(),now())";
            $respay = mysqli_query($conn, $sqlpay);
        } else {
            $silat_alqaraba = '';
            $chpay = "SELECT * from deco where user_id='$idgreat' and type_dec='سبب الأعالة'";
            $rsapay = mysqli_query($conn, $chpay);
            if (mysqli_num_rows($rsapay) > 0) {
                echo "okk";
                $sqlapay = "DELETE FROM deco  where user_id='$idgreat' and type_dec='سبب الأعالة'";
                $resapay = mysqli_query($conn, $sqlapay);
                if ($resapay) {
                    echo "ok";
                } else {
                    echo "ok" . mysqli_error($conn);
                }
            }
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
marital_status='$marital_status',
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
            echo $have_child;
            # $_SESSION['ok'] = "ok";
            #  header("Location: mainpage.php");
        } else
            echo "noo" . mysqli_error($conn);




        ////////////////القنوات ////////////////////
        ############################################
        $channel = $_POST['channel'];
        echo $channel;
        if ($channel == "1" || $channel == "5") {
            $upd = "UPDATE submission_channels SET   channel_type='$channel',updated_at=now() where user_id='$idgreat'";
            $r = mysqli_query($conn, $upd);
            if ($r) {
                echo "add";
                $cha = "SELECT * from deco where user_id='$idgreat' and type_dec='أمر السجين'";
                $rscha = mysqli_query($conn, $cha);
                if (mysqli_num_rows($rscha) === 1) {
                    echo "okk";
                    $sqlcmar = "DELETE FROM deco  where user_id='$idgreat' and type_dec='أمر السجين' ";
                    $rescmar = mysqli_query($conn, $sqlcmar);
                    if ($rescmar) {
                        echo "ok" . mysqli_error($conn);
                    } else {
                        echo "no سحسن" . mysqli_error($conn);
                    }
                } else {
                    echo mysqli_error($conn);
                }
                $chan = "SELECT * from deco where user_id='$idgreat' and type_dec='أمر الشهيد'";
                $rschan = mysqli_query($conn, $chan);
                if (mysqli_num_rows($rschan) == 1) {
                    $sqlchmar = "DELETE FROM deco  where user_id='$idgreat' and type_dec='أمر الشهيد'";
                    $reschmar = mysqli_query($conn, $sqlchmar);
                    if ($reschmar) {
                        $_SESSION['ok'] = "ok";
                    }
                }
                header("Location: mainpage.php");
            } else
                echo "noo" . mysqli_error($conn);
        } else if ($channel == "2" || $channel == "3") {
            $martyr_adjective = $_POST['martyr_adjective'];
            $mart_name = $_POST['martyr_name'];
            $mart_mothname = $_POST['mart_mothname'];
            $rqm_qrar = $_POST['rqm_qrar'];
            $hal_qraba = $_POST['halt_qraba'];
            $upd = "UPDATE submission_channels SET channel_type='$channel' ,martyr_adjective='$martyr_adjective' ,martyr_name='$mart_name',
            martyr_mother_name='$mart_mothname',prisoner_name=NULL,
                prisoner_mother_name=NULL,raqm_alqarar='$rqm_qrar',tawsif_halat_alqaraba='$hal_qraba',updated_at=now() where user_id='$idgreat'";
            $r = mysqli_query($conn, $upd);
            if ($r) {
                echo "add";
                $cha = "SELECT * from deco where user_id='$idgreat' and type_dec='أمر السجين'";
                $rscha = mysqli_query($conn, $cha);
                if (mysqli_num_rows($rscha) === 1) {
                    echo "okk";
                    $sqlcmar = "DELETE FROM deco  where user_id='$idgreat' and type_dec='أمر السجين' ";
                    $rescmar = mysqli_query($conn, $sqlcmar);
                    if ($rescmar) {
                        echo "ok" . mysqli_error($conn);
                    } else {
                        echo "no سحسن" . mysqli_error($conn);
                    }
                } else {
                    echo mysqli_error($conn);
                }
                $chan = "SELECT * from deco where user_id='$idgreat' and type_dec='أمر الشهيد'";
                $rschan = mysqli_query($conn, $chan);
                if (mysqli_num_rows($rschan) == 0) {
                    $sqlchmar = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','أمر الشهيد',0,'',now(),now())";
                    $reschmar = mysqli_query($conn, $sqlchmar);
                    if ($reschmar) {
                        $_SESSION['ok'] = "ok";
                    }
                }
                header("Location: mainpage.php");
            }
        } //قناة السجناء ///
        else {

            $prisoner_name = $_POST['prisoner-name'];
            $prisoner_mother = $_POST['prisoner-mother'];
            $prisoner_qrarnumber = $_POST['rqm_qrar'];
            $prisoner_qraba = $_POST['halt_qraba'];
            $upd = "UPDATE submission_channels SET channel_type='$channel',martyr_adjective= NULL,martyr_name=NULL,
            martyr_mother_name=NULL,prisoner_name='$prisoner_name',
                prisoner_mother_name='$prisoner_mother',raqm_alqarar='$prisoner_qrarnumber',tawsif_halat_alqaraba='$prisoner_qraba',updated_at=now() where user_id='$idgreat'";
            $r = mysqli_query($conn, $upd);
            if ($r) {
                echo "add";
                $cha2 = "SELECT * from deco where user_id='$idgreat' and type_dec='أمر الشهيد'";
                $rsa2 = mysqli_query($conn, $cha2);
                if (mysqli_num_rows($rsa2) === 1) {
                    echo "okk";
                    $sqlamar = "DELETE FROM deco  where user_id='$idgreat' and type_dec='أمر الشهيد'";
                    $resamar = mysqli_query($conn, $sqlamar);
                    if ($resamar) {
                        echo "ok";
                    } else {
                        echo "ok" . mysqli_error($conn);
                    }
                } else {
                    echo "no شه" . mysqli_error($conn);
                }
                $chaa = "SELECT * from deco where user_id='$idgreat' and type_dec='أمر السجين'";
                $rsaa = mysqli_query($conn, $chaa);
                if (mysqli_num_rows($rsaa) == 0) {
                    $sqlaamar = "INSERT INTO deco (user_id,type_dec,add_info_id,dec_file,created_at,updated_at) value ('$idgreat','أمر السجين',0,'',now(),now())";
                    $resaamar = mysqli_query($conn, $sqlaamar);
                    if ($resaamar) {
                        $_SESSION['ok'] = "ok";
                    }
                }
                header("Location: mainpage.php");
            }
        }
    }
}
