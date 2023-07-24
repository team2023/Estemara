<?php








function gettotal($id)

{
    include 'config.php';

    $sqlchld = "SELECT *from personal_information where user_id='$id'";
    $reschld = mysqli_query($conn, $sqlchld);
    if (mysqli_num_rows($reschld) === 1) {
        $rowchld = mysqli_fetch_assoc($reschld);
        $numlesschild = (int)$rowchld['number_child_less18'];
        $nummorechild = (int)$rowchld['number_child_more18'];
        $sum = $numlesschild + $nummorechild;

        if ($sum > 4) {

            $totalchild = 4;
        } else
            $totalchild = $sum;
    } else {
        $totalchild = 0;
    }


    return $totalchild;
}

function chekmarry($id)
{
    include 'config.php';

    $sqlchld = "SELECT *from personal_information where user_id='$id'";
    $reschld = mysqli_query($conn, $sqlchld);
    if (mysqli_num_rows($reschld) === 1) {
        $rowchld = mysqli_fetch_assoc($reschld);
        $marry = $rowchld['marital_status'];
        if (($marry != "اعزب")) {

            $finlmarry = 5;
        } else
            $finlmarry = 0;
    } else {
        $finlmarry = 0;
    }

    return $finlmarry;
}

function year($id)
{
    include 'config.php';

    $sqlyear = "SELECT *from education_data where user_id='$id'";
    $resyear = mysqli_query($conn, $sqlyear);
    if (mysqli_num_rows($resyear) === 1) {
        $rowyear = mysqli_fetch_assoc($resyear);
        $year = (int)$rowyear['graduation_year'];
        $finelyear = 2022 - $year;

        if ($finelyear > 12)
            $fyear = 12.5;
        else
            $fyear = $finelyear;
    } else {
        $fyear = 0;
    }
    return $fyear;
}


function avarage($id)

{
    include 'config.php';

    $sqlavrg = "SELECT *from education_data where user_id='$id'";
    $resavrg = mysqli_query($conn, $sqlavrg);
    if (mysqli_num_rows($resavrg) === 1) {
        $rowsvrg = mysqli_fetch_assoc($resavrg);
        $avarg = (int)$rowsvrg['average'];
        $avargff = (int)$rowsvrg['fave'];
        $finelavarg = (((($avarg / $avargff) * 100) + $avarg / 2)) / 10;
    } else
        $finelavarg = 0;
    return $finelavarg;
}

function workif($id)
{

    include 'config.php';

    $sqlwork = "SELECT *from work_skills where user_id='$id'";
    $reswork = mysqli_query($conn, $sqlwork);
    if (mysqli_num_rows($reswork) === 1) {
        $rowswork = mysqli_fetch_assoc($reswork);
        $work = $rowswork['volunteer_work'];
        if ($work == "نعم") {
            $workfinel = 3;
        } else {
            $workfinel = 0;
        }
    } else
        $workfinel = 0;


    return $workfinel;
}

function Dorat($id)
{
    include 'config.php';

    $sqlourse = "SELECT *from additional_info_courses where user_id='$id'";
    $resourse = mysqli_query($conn, $sqlourse);
    if (mysqli_num_rows($resourse) > 0) {
        $rowscourse = mysqli_fetch_assoc($resourse);
        $course = $rowscourse['course_flag'];
        if ($course >= 1) {
            $coursfinel = 1;
        } else $coursfinel = 0;
    } else {
        $coursfinel = 0;
    }
    return $coursfinel;
}

function Naqaba($id)
{
    include 'config.php';

    $sqln = "SELECT *from additional_info_alniqabat where user_id='$id'";
    $resn = mysqli_query($conn, $sqln);
    if (mysqli_num_rows($resn) > 0) {
        $rowsn = mysqli_fetch_assoc($resn);
        $niqaba = $rowsn['alniqabat_flag'];
        if ($niqaba >= 1) {
            $niqabafinel = 1;
        } else {
            $niqabafinel = 0;
        }
    } else
        $niqabafinel = 0;

    return $niqabafinel;
}
function eaalaa($id)
{
    include 'config.php';

    $sqln = "SELECT *from personal_information where user_id='$id'";
    $resn = mysqli_query($conn, $sqln);
    if (mysqli_num_rows($resn) === 1) {
        $rowsn = mysqli_fetch_assoc($resn);
        $iieala = $rowsn['iieala'];
        if ($iieala == 'نعم') {
            $iiealafinel = 2;
        } else {
            $iiealafinel = 0;
        }
    } else
        $iiealafinel = 0;

    return $iiealafinel;
}

function old_work($id)
{
    include 'config.php';

    $sqln = "SELECT *from work_skills where user_id='$id'";
    $resn = mysqli_query($conn, $sqln);
    if (mysqli_num_rows($resn) === 1) {
        $rowsn = mysqli_fetch_assoc($resn);
        $old_work = $rowsn['old_work'];
        if ($old_work == 'نعم') {
            $sdate = $rowsn['old_sdate'];
            $stdate = (explode("-", $sdate));
            $sye = $stdate[0];
            $edate = $rowsn['old_edate'];
            $etdate = (explode("-", $edate));
            $eye = $etdate[0];
            $tot = $eye - $sye;
            if ($tot < 10)
                $old_workfinel = $tot;
            else $old_workfinel = 10;
        } else {
            $old_workfinel = 0;
        }
    } else
        $old_workfinel = 0;

    return $old_workfinel;
}


function curr_work($id)
{
    include 'config.php';

    $sqln = "SELECT *from work_skills where user_id='$id'";
    $resn = mysqli_query($conn, $sqln);
    if (mysqli_num_rows($resn) === 1) {
        $rowsn = mysqli_fetch_assoc($resn);
        $curr_work = $rowsn['curr_work'];
        if ($curr_work == 'نعم') {

            $eye = 2023;
            $edate = $rowsn['curr_sdate'];
            $etdate = (explode("-", $edate));
            $sye = $etdate[0];
            $tot = $eye - $sye;
            if ($tot < 10)
                $curr_workfinel = $tot;
            else
                $curr_workfinel = 10;
        } else {
            $curr_workfinel = 0;
        }
    } else
        $curr_workfinel = 0;

    return $curr_workfinel;
}

function adabeaa($id)
{
    include 'config.php';

    $sqln = "SELECT *from additional_info_books where user_id='$id'";
    $resn = mysqli_query($conn, $sqln);
    if (mysqli_num_rows($resn) === 1) {
        $rowsn = mysqli_fetch_assoc($resn);
        $adab = $rowsn['published_book_flag'];
        if ($adab == '1') {

            $adabfinel = 1.5;
        } else {
            $adabfinel = 0;
        }
    } else
       {
        $sqln = "SELECT *from additional_info_research where user_id='$id'";
    $resn = mysqli_query($conn, $sqln);
    if (mysqli_num_rows($resn) === 1) {
        $rowsn = mysqli_fetch_assoc($resn);
        $adab = $rowsn['published_research_flag'];
        if ($adab == '1') {

            $adabfinel = 1.5;
        } else {
            $adabfinel = 0;
        }
       }
       $adabfinel = 0;
    }
    return $adabfinel;
}
