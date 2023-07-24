<?php
//ob_start();
session_start();
// Database Connection
$conn = mysqli_connect("localhost", "id21015512_alummm", "Lifebook123@", "id21015512_alummm23");
if (!$conn) {
    echo "Connection Failed";
}


?>

<html>
<head>
    <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
            crossorigin="anonymous"
    />

    <link rel="stylesheet" href="header.css" />

    <style>
        table {
            width: 110%;
            font-family: sans-serif;
            font-size: 15px;
            /*border: 7mm solid aqua;*/
            border-collapse: collapse;
        }
        table.table2 {
            border: 2mm solid aqua;
            border-collapse: collapse;
        }
        table.layout {
            border: 0mm solid black;
            border-collapse: collapse;
        }
        td.layout {
            text-align: center;
            border: 0mm solid black;
        }
        td {
            padding: 1.5mm;
            /*border: 2mm solid blue;*/
            vertical-align: middle;
        }


        .hedr {
            /*width: 22cm;*/
            height: 60px;
            /*padding: 10px;*/
            /*border: 5px solid gray;*/
            /*margin: 10px;*/
            font-size: 16px;
            border-radius: 40px;
            margin-left: 40px;
            background-color: #061a2c;


        }
        table.fixed { table-layout:fixed; }
        table.fixed td { overflow: hidden; }



        .content-table {
            border-collapse: collapse;
            margin: 5px 0;
            font-size: 0.9em;
            min-width: 400px;
            border-radius: 5px 5px 0 0;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }

        .content-table thead tr {
            background-color: #061a2c;
            color: #ffffff;
            text-align: left;
            font-weight: bold;
        }

        .content-table th {
            color: white;
            padding: 12px 15px;
        }

        .content-table td {
            padding: 12px 15px;
        }
        .content-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .content-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .content-table tbody tr:last-of-type {
            border-bottom: 2px solid #061a2c;
        }

        .content-table tbody tr.active-row {
            font-weight: bold;
            color: #061a2c;
        }



        .boxed {
            /*font-family: verdana;*/
            font-size: 15px;
            color: white;
            text-align: center;
            /*text-shadow: 3px 4px grey;*/
            border: 1px solid #061a2c;
            background-color: #061a2c;
            width: 200px;
            /*border: 25px solid green;*/
            border-radius: 20px;
            padding: 10px;
            margin: 10px;
            margin-left: 230px;
        }


        #divider {
            border-top: 3px solid;
            border-color: #63A700;
            width: 100%;
            background-color: inherit;
        }


    </style>
</head>
<body>
<?php
// $userid = $_SESSION['iduser']

    $userid = $_SESSION['iduser'];
$select = "SELECT users.id,users.specialization,users.genid,personal_information.*,education_data.*, work_skills.* 
            from users LEFT OUTER JOIN personal_information ON users.id=personal_information.user_id 
            LEFT OUTER JOIN education_data ON users.id=education_data.user_id  
            LEFT OUTER JOIN work_skills ON users.id=work_skills.user_id WHERE users.id= '".$userid."'";


$result = $conn->query($select);
$data = array();
while($row = $result->fetch_object()){
//    print_r($row);
    ?>




    <div class="hedr">
        <table >
        <tbody>
        <tr class="" >
            <td class="title" colspan="2">
                <p class="title">
                    <span class="top">استمارة التقديم للتعيين</span><br>
                    <span class="down">على الوظائف العامة في العراق لسنة 2023</span>
                </p>
            </td>

            <td style="width: 170px" colspan="4"></td>
            <td>
<!--                <img-->
<!--                        class="logoText align-self-center"-->
<!--                        src="fpscLogo2.png"-->
<!--                        alt=""-->
<!--                />-->
            </td>
            <td>
<!--                <img class="logo" src="fpsc.png" alt="" />-->

            </td>
        </tr>
        </tbody>
    </table>

    </div>




    <br>

    <div>
        <?php
        $selectSpec = "SELECT * from specialization_list WHERE id = '".$row->specialization."' ";
        $resultSpec = $conn->query($selectSpec);
        while($rowSpec = $resultSpec->fetch_object()){
        //    print_r($row);
        ?>

            <div class="boxed">
                <center>
                    <?php echo $rowSpec->name; ?>
                </center>
            </div>


        <?php
        }
        ?>

    </div>

    <br>
<!--    المعلومات الشخصية-->
<div style="text-align: center">
    <p>
        المعلومات الشخصية
    </p>
</div>

<table class="" style="border: 2px solid black;margin-left: 40px;  " dir="rtl">

    <tr>
        <td>الاسم:
            <?php echo $row->first_name ?>
        </td>
        <td>أسم الاب:
            <?php echo $row->second_name ?>
        </td>
        <td>أسم الجد:
            <?php echo $row->third_name ?>
        </td>
        <td>أسم أب الجد:
            <?php echo $row->fourth_name ?>
        </td>
    </tr>


    <tr style="height:40px">
        <td>
            اللقب:
            <?php echo $row->sure_name ?>
        </td>
        <td>أسم الأم:
            <?php echo $row->mother_firstname ?>
        </td>
        <td>أسم أب الأم:
            <?php echo $row->mother_secondname ?>
        </td>
        <td>أسم جد الأم:
            <?php echo $row->mother_thirdname ?>
        </td>

    </tr>

    <tr style="height:40px">
        <td>الجنس:
            <?php echo $row->gender ?>
        </td>
        <td>محل الولادة:
            <?php echo $row->place_birth ?>
        </td>
        <td>تأريخ الولادة:
            <?php echo $row->brithday_date ?>
        </td>
        <td>رقم الهاتف:
            <?php echo $row->phone_number  ?>
        </td>
    </tr>

    <tr style="height:40px">
        <td>الجنسية:
            <?php echo $row->nationality ?>
        </td>
        <td>القومية:
            <?php echo $row->nationalism ?>
        </td>
        <td>الديانة:
            <?php echo $row->religion ?>
        </td>
        <td></td>
    </tr>

    <?php
    if ($row->national_card_flag==1){

    ?>
        <tr style="height:40px">
            <td>رقم البطاقة الموحدة:
                <?php echo $row->nationality_card_number ?>
            </td>
            <td>الرقم العائلي:
                <?php echo $row->family_number ?>
            </td>
            <td>تأريخ اصدار البطاقة:
                <?php echo $row->national_card_date ?>
            </td>
            <td></td>
    </tr>
        <?php
    }

    else {
      ?>
        <tr style="height:40px">
            <td>رقم هوية الاحوال المدنية:
                <?php echo $row->civil_card_number ?>
            </td>
            <td>رقم السجل:
                <?php echo $row->civil_status_ID_record ?>
            </td>
            <td>رقم الصحيفة:
                <?php echo $row->civil_status_ID_sheet_number ?>
            </td>

        </tr>
        <tr style="height:40px">
            <td>تاريخ الاصدار:
                <?php echo $row->civil_date_card ?>
            </td>
            <td>جهة الاصدار:
                <?php echo $row->civil_card_city ?>
            </td>
            <td>رقم شهادة الجنسية
            <?php echo $row->nationality_certificate_number ?>
            </td>
            <td></td>
        </tr>

        <?php
    }

    ?>

    <tr style="height:40px">
        <td>الحالة الاجتماعية:
            <?php echo $row->marital_status ?>
        </td>
        <td>عدد الاطفال تحت الـ 18:
            <?php echo $row->number_child_less18 ?>
        </td>
        <td>عدد الاطفال فوق الـ 18:
            <?php echo $row->number_child_more18 ?>
        </td>

    </tr>

    <tr style="height:40px">
        <td colspan="3">هل انت معيل لاحد افراد العائلة غير الاولاد قانونا؟
            <?php echo $row->iieala ?>
        </td>

    </tr>

<!--    <tr style="height:40px">-->
<!--        <td colspan="3">هل انت من ذوي الاحتياجات الخاصة:؟-->
<!--            --><?php //echo $row->sure_name ?>
<!--        </td>-->
<!---->
<!--    </tr>-->
    <?php
    $selectChannel= "SELECT * from submission_channels LEFT OUTER JOIN channels ON channels.ch_id=submission_channels.channel_type WHERE user_id = '".$row->user_id."' ";
    $resultChannel = $conn->query($selectChannel);
    while($rowChannel= $resultChannel->fetch_object()){
    //    print_r($row);
    ?>
        <tr style="height:40px">
            <td colspan="3">قناة التقديم:
                <?php echo $rowChannel->ch_name ?>
            </td>

        </tr>
    <?php
            }

    ?>




</table>



<br>
<!--    المعلومات السكن-->
<div style="text-align: center">
    <p>
        معلومات السكن
    </p>
</div>
<table class="fixed" style="border: 2px solid black;  margin-left: 40px; " dir="rtl">
    <tr>
        <td colspan="2">رقم بطاقة السكن:
            <?php echo $row->housing_id_number ?>
        </td>
        <td>مكتب المعلومات:
            <?php echo $row->information_Office ?>
        </td>

    </tr>

    <tr style="height:40px">
        <td colspan="2">المحافظة:
            <?php echo $row->governorate ?>
        </td>
        <td colspan="2">القضاء:
            <?php echo $row->region ?>
        </td>
        <td>الناحية:
            <?php echo $row->neighborhood ?>
        </td>

    </tr>

    <tr style="height:40px">
        <td colspan="4">العنوان مع اقرب نقطة دالة:
            <?php echo $row->address1 ?>
        </td>
    </tr>



</table>


<!--    <pagebreak />-->
<br>
<!--    المعلومات العمل والمهارة-->
<div style="text-align: center">
    <p>
        معلومات العمل والمهارة
    </p>
</div>
<table class="fixed" style="border: 2px solid black;  margin-left: 40px;" dir="rtl">
    <tr>
        <td colspan="2">هل عملت سابقا:
            <?php echo $row->volunteer_work ?>
        </td>
        <?php 
        ?>
        <td>مكان العمل:
            <?php echo $row->government_place_work ?>
        </td>
        <td>مدة العمل:
            <?php echo $row->duration_work ?>
        </td>

    </tr>

    <tr style="height:40px">
        <td colspan="2">أستخدام الحاسوب:
            <?php echo $row->computer_use ?>
        </td>
        <td colspan="2">اللغات:
            <?php echo $row->other_language ?>
        </td>


    </tr>

</table>



    <br>
    <!--    المعلومات الدراسية-->
    <div style="text-align: center">
        <p>
            المعلومات الدراسية
        </p>
    </div>
    <table class="fixed" style="border: 2px solid black;  margin-left: 40px;" dir="rtl">
        <tr>
            <td colspan="2">التحصيل الدراسي:
                <?php echo $row->academic_achievement ?>
            </td>
            <?php 
            if ($row->place_study_flag==1){

                ?>
            
            <td> هل درست خارج العراق:
                <?php echo "نعم" ?>
            </td>
<?php }
else { ?>
<td> هل درست خارج العراق:
                <?php echo "كلا";?>
            </td>
            <?php

}
?>

        </tr>


        <?php
        if ($row->place_study_flag==1){

            ?>
            <tr style="height:40px">
                <td>نوع البعثة:
                    <?php echo $row->scholarship_type ?>
                </td>
                <td>بلد الدراسة:
                    <?php echo $row->country_graduation ?>
                </td>
            </tr>
            <tr style="height:40px">


                <td>الجامعة:
                    <?php echo $row->university_out?>
                </td>
                <td>الكلية:
                    <?php echo $row->college_out ?>
                </td>
                <td> القسم:
                    <?php echo $row->department_out ?>
                </td>
            </tr>
            <?php
        }

        else {
            ?>
            <tr style="height:40px">
                <?php
                $selectUniv = "SELECT * from universities WHERE id= '".$row->university_in."' ";
                $resultUniv = $conn->query($selectUniv);
                while($rowUniv = $resultUniv->fetch_object()){
                //    print_r($row);
                ?>
                <td colspan="2">الجامعة:
                    <?php echo $rowUniv->university_name;
                    }?>
                </td>

                <?php
                $selectColg = "SELECT * from colleges WHERE id= '".$row->college_in."' ";
                $resultColg  = $conn->query($selectColg);
                while($rowColg = $resultColg->fetch_object()){
                //    print_r($row);
                ?>
                <td colspan="2">الكلية:
                    <?php echo $rowColg->college_name;
                    }?>
                </td>

                <?php
                $selectDeprt = "SELECT * from departments WHERE id= '".$row->department_in."' ";
                $resultDeprt  = $conn->query($selectDeprt);
                while($rowDeprt = $resultDeprt->fetch_object()){
                //    print_r($row);
                ?>
                <td>القسم:
                    <?php echo $rowDeprt->department_name;
                    }?>
                </td>
            </tr>
            <?php
        }

        ?>

        <tr style="height:40px">
            <td colspan="2"> سنة التخرج:
                <?php echo $row->graduation_year ?>
            </td>
            <td colspan="2">المعدل:
            <?php echo $row->average ?>
        </td>

            <td colspan="2">معدل الطالب الاول :
                <?php echo $row->fave ?>
            </td>
        </tr>

    </table>



    <pagebreak />

    <div class="hedr">
        <table >
            <tbody>
            <tr class="" >
                <td class="title" colspan="2">
                    <p class="title">
                        <span class="top">استمارة التقديم للتعيين</span><br>
                        <span class="down">على الوظائف العامة في العراق لسنة 2023</span>
                    </p>
                </td>

                <td style="width: 170px" colspan="4"></td>
                <td>
                    <!--                <img-->
                    <!--                        class="logoText align-self-center"-->
                    <!--                        src="fpscLogo2.png"-->
                    <!--                        alt=""-->
                    <!--                />-->
                </td>
                <td>
                    <!--                <img class="logo" src="fpsc.png" alt="" />-->

                </td>
            </tr>
            </tbody>
        </table>

    </div>


    <br>




    <!--    الدورات -->
    <div style="text-align: center">
        <p>
            المعلومات الاضافية - الدورات
        </p>
    </div>
    <table class="content-table fixed" style="border: 2px solid black;" dir="rtl">
        <thead>
        <tr style="color: white">
            <th>اسم الدورة</th>
            <th>مركز التدريب</th>
            <th>مكان الدورة</th>
            <th>عدد ايام الدورة</th>
            <th>مدة الدورة</th>
            <th>هل الدورة أونلاين</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $selectCousre = "SELECT * from additional_info_courses WHERE user_id = '".$row->user_id."' ";
        $resultCousre = $conn->query($selectCousre);
        if ($resultCousre->num_rows > 0)
        {
            while($rowCousre = $resultCousre->fetch_object()){
        //    print_r($row);
            ?>
            <tr>
            <td><?php echo $rowCousre->course_name ?></td>
            <td><?php echo $rowCousre->course_training_center ?></td>
            <td><?php echo $rowCousre->course_place ?></td>
            <td><?php echo $rowCousre->course_days ?></td>
            <td><?php echo $rowCousre->course_date ?></td>
            <td>
                <?php
                if ( $rowCousre->course_online_check == 0)
                    {
                        echo "كلا";
                    }
                else {
                    echo "نعم";
                }
                ?>
            </td>

        </tr>
            <?php
            }
        }
        else {
        ?>
        <tr>
            <td>لا توجد دورات</td>
        </tr>
        <?php
        }
        ?>

        </tbody>
    </table>




    <br>
    <!--    الكتب -->
    <div style="text-align: center">
        <p>
            المعلومات الاضافية - الكتب المنشورة
        </p>
    </div>
    <table class="content-table fixed" style="border: 2px solid black;" dir="rtl">
        <thead>
        <tr>
            <th>اسم الكتاب المنشور</th>
            <th>مركز النشر</th>
            <th>تأريخ النشر</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $selectBooks = "SELECT * from additional_info_books WHERE user_id = '".$row->user_id."' ";
        $resultBooks = $conn->query($selectBooks);
        if ($resultBooks->num_rows > 0)
        {
            while($rowBooks = $resultBooks->fetch_object()){
                //    print_r($row);
                ?>
                <tr>
                    <td><?php echo $rowBooks->published_book_name ?></td>
                    <td><?php echo $rowBooks->published_book_publisher ?></td>
                    <td><?php echo $rowBooks->published_book_date ?></td>
                </tr>
                <?php
            }
        }
        else {
            ?>
            <tr>
                <td>لا توجد كتب منشورة</td>
            </tr>
            <?php
        }
        ?>

        </tbody>
    </table>



<!--    ///////////////////////////////////////////////////////////////-->
    <br>
    <!--     البحوث-->
    <div style="text-align: center">
        <p>
            المعلومات الاضافية - البحوث المنشورة

        </p>
    </div>
    <table class="content-table fixed" style="border: 2px solid black;" dir="rtl">
        <thead>
        <tr>
            <th>اسم البحث المنشور</th>
            <th>مركز النشر</th>
            <th>تأريخ النشر</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $selectResearch= "SELECT * from additional_info_research WHERE user_id = '".$row->user_id."' ";
        $resultResearch = $conn->query($selectResearch);
        if ($resultResearch->num_rows > 0)
        {
            while($rowResearch = $resultResearch->fetch_object()){
                //    print_r($row);
                ?>
                <tr>
                    <td><?php echo $rowResearch->published_research_name ?></td>
                    <td><?php echo $rowResearch->published_research_publisher ?></td>
                    <td><?php echo $rowResearch->published_research_date ?></td>
                </tr>
                <?php
            }
        }
        else {
            ?>
            <tr>
                <td>لا توجد بحوث منشورة</td>
            </tr>
            <?php
        }
        ?>

        </tbody>
    </table>


<!--    ///////////////////////////////////////////////////////-->
    <br>
    <!--    النقابات -->
    <div style="text-align: center">
        <p>
            المعلومات الاضافية - النقابات
        </p>
    </div>
    <table class="content-table fixed" style="border: 2px solid black;" dir="rtl">
        <thead>
        <tr>
            <th>اسم النقابة</th>
            <th>تأريخ الانضمام الى النقابة</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $selectNiq= "SELECT * from additional_info_alniqabat WHERE user_id = '".$row->user_id."' ";
        $resultNiq = $conn->query($selectNiq);
        if ($resultNiq->num_rows > 0)
        {
            while($rowNiq = $resultNiq->fetch_object()){
                //    print_r($row);
                ?>
                <tr>
                    <td><?php echo $rowNiq->alniqabat_name ?></td>
                    <td><?php echo $rowNiq->alniqabat_date ?></td>
                </tr>
                <?php
            }
        }
        else {
            ?>
            <tr>
                <td>لا ينتمي لاي نقابة</td>
            </tr>
            <?php
        }
        ?>

        </tbody>
    </table>



    <?php
}
?>


</body>
</html>
