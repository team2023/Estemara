<?php
include('config.php');

if (!isset($_SESSION['SESSION_EMAIL'])) {
    header("Location: index.php");
    die();
}
$idgreat = $_SESSION['iduser'];
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/css/shettlogin.css" />
    <link rel="stylesheet" href="assets/css/styles.css" />
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.rtl.min.css" />
    <link rel="stylesheet" href="assets/vendor/fontawesome/css/all.css">
    <title>Document</title>
    <style>
        .card-header {
            background-color: lightgray;
            color: black;
            font-weight: bold;
        }

        .card {
            border: 1px solid lightgray;
        }
    </style>
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
                <h3 class="fw-bold">المعلومات الأضافية</h3>
            </div>

            <div class="row my-1 mt-4 gy-3">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <p>الدورات</p>
                        </div>
                        <div class="card-body">
                            <?php
                            $sql = "SELECT * from additional_info_courses where user_id = '$idgreat'";
                            $res = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($res) < 5 && mysqli_num_rows($res) > 0) {
                            ?>
                                <p>الدورات التدريبية
                                    <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#add">اضافة</button>
                                </p>
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>

                                            </th>
                                            <th scope="col">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="selectAll" />
                                                </div>
                                            </th>
                                            <th class="d-none"></th>
                                            <th scope="col">أسم الدورة</th>
                                            <th scope="col">الجهة المدربة </th>
                                            <th scope="col">اون لاين</th>
                                            <th scope="col" class="d-none"></th>
                                            <th scope="col">مكان الدورة </th>
                                            <th scope="col">مدة الدورة بالايام</th>
                                            <th scope="col"> تاريخ التخرج من الدورة </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row = mysqli_fetch_assoc($res)) {
                                        ?>
                                            <tr>
                                                <td>
                                                    <button type="button" class="btn delete "> <i class="fa fa-trash btn-danger"></i></button>
                                                </td>
                                                <td scope="row">
                                                    <!-- <div class="form-check">
                                                        <input class="form-check-input rowCheckboxc" type="checkbox" value="" id="" />
                                                    </div>-->
                                                    <button type="button" class="btn update"> <i class="fa fa-pen"></i></button>
                                                </td>
                                                <td class="d-none"><?php echo $row['id']; ?></td>
                                                <td><?php echo $row['course_name']; ?></td>
                                                <td><?php echo $row['course_training_center']; ?></td>
                                                <td>
                                                    <?php if ($row['course_online_check'] === "0") { ?>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" disabled />
                                                        </div>
                                                    <?php } else {
                                                    ?>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked disabled />
                                                        </div>
                                                    <?php
                                                    }
                                                    ?>
                                                </td>
                                                <td class="d-none"><?php echo $row['course_online_check']; ?></td>
                                                <td><?php echo $row['course_place']; ?></td>
                                                <td><?php echo $row['course_days']; ?></td>
                                                <td><?php echo $row['course_date']; ?></td>

                                            </tr>
                                        <?php
                                        } ?>
                                    </tbody>
                                </table>
                            <?php
                            } elseif (mysqli_num_rows($res) >= 5) {
                            ?>
                                <p>الدورات التدريبية

                                </p>

                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>

                                            </th>
                                            <th scope="col">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="selectAll" />
                                                </div>
                                            </th>
                                            <th class="d-none"></th>
                                            <th scope="col">أسم الدورة</th>
                                            <th scope="col">الجهة المدربة </th>
                                            <th scope="col">اون لاين</th>
                                            <th scope="col" class="d-none"></th>
                                            <th scope="col">مكان الدورة </th>
                                            <th scope="col">مدة الدورة بالايام</th>
                                            <th scope="col"> تاريخ التخرج من الدورة </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row = mysqli_fetch_assoc($res)) {
                                        ?>
                                            <tr>
                                                <td>
                                                    <button type="button" class="btn delete "> <i class="fa fa-trash btn-danger"></i></button>
                                                </td>
                                                <td scope="row">
                                                    <!-- <div class="form-check">
                                                        <input class="form-check-input rowCheckboxc" type="checkbox" value="" id="" />
                                                    </div>-->
                                                    <button type="button" class="btn update"> <i class="fa fa-pen"></i></button>
                                                </td>
                                                <td class="d-none"><?php echo $row['id']; ?></td>
                                                <td><?php echo $row['course_name']; ?></td>
                                                <td><?php echo $row['course_training_center']; ?></td>
                                                <td>
                                                    <?php if ($row['course_online_check'] === "0") { ?>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" disabled />
                                                        </div>
                                                    <?php } else {
                                                    ?>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked disabled />
                                                        </div>
                                                    <?php
                                                    }
                                                    ?>
                                                </td>
                                                <td class="d-none"><?php echo $row['course_online_check']; ?></td>
                                                <td><?php echo $row['course_place']; ?></td>
                                                <td><?php echo $row['course_days']; ?></td>
                                                <td><?php echo $row['course_date']; ?></td>

                                            </tr>
                                        <?php
                                        } ?>
                                    </tbody>
                                </table>

                            <?php
                            } else {
                            ?>
                                <p>الدورات التدريبية
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add">أضافة</button>
                                </p>
                                <div class="w-100 bg-warning p-2 text-white rounded-2">
                                    <p>لا توجد بيانات حتى الان</p>
                                </div>
                            <?php
                            }
                            ?>
                            <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">الدورات </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="savecourse.php" method="post">
                                            <div class="modal-body">

                                                <div class="row">
                                                    <div class="col-12 col-sm-6 col-md-10 mb-2 ">
                                                        <label for="" class="form-label"> اسم الدورة <span class="redStar">*</span></label>
                                                        <input type="text" class="form-control" id="" name="co_name" />
                                                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['iduser']; ?>">
                                                    </div>

                                                </div>
                                                <div class="col-12 col-sm-6 col-md-10 mb-2 ">
                                                    <label for="" class="form-label"> الجهة المدربة <span class="redStar">*</span></label>
                                                    <input type="text" class="form-control" id="" name="courser" />
                                                </div>
                                                <div class="col-12 col-sm-6 col-md-10 mb-2 ">
                                                    <label for="" class="form-label">اون لاين</label>
                                                    <br>
                                                    <input type="checkbox" name="online_flag" id="" value="1">
                                                </div>
                                                <div class="col-12 col-sm-6 col-md-10 mb-2 ">
                                                    <label for="" class="form-label"> مكان الدورة<span class="redStar">*</span></label>
                                                    <input type="text" class="form-control" id="" name="co_place" />
                                                </div>
                                                <div class="col-12 col-sm-6 col-md-10 mb-2 ">
                                                    <label for="" class="form-label">مدة الدورة بالايام<span class="redStar">*</span></label>
                                                    <input type="number" class="form-control" id="" name="co_duration" />
                                                </div>
                                                <div class="col-12 col-sm-6 col-md-10 mb-2 ">
                                                    <label for="" class="form-label"> تاريخ التخرج من الدورة<span class="redStar">*</span></label>
                                                    <input type="date" class="form-control" id="" name="co_compdate" />
                                                </div>
                                            </div>


                                            <div class="modal-footer">
                                                <button type="submit" class="btn " style="background: rgb(3, 6, 56); color:white;" name="savecourse">
                                                    حفظ</button>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="remove" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">حذف الدورة</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="savecourse.php" method="post">
                                            <div class="modal-body">
                                                <p>هل انت متأكد ؟</p>
                                                <input type="hidden" name="id" id="delid" value="">
                                                <input type="hidden" name="name" id="delname" value="">
                                                <input type="hidden" name="user_id" value="<?php echo $_SESSION['iduser']; ?>">
                                            </div>


                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-danger " name="delcourse">
                                                    نعم</button>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="updatemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">الدورات </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="savecourse.php" method="post">
                                            <div class="modal-body">

                                                <div class="row">
                                                    <div class="col-1 col-sm-6 col-md-10 mb-2 ">
                                                        <label for="" class="form-label"> اسم الدورة <span class="redStar">*</span></label>
                                                        <input type="text" class="form-control" id="co_name" name="co_name" />
                                                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['iduser']; ?>">
                                                        <input type="hidden" name="old_name" id="old_name" value="">
                                                        <input type="hidden" name="id" id="id" value="">
                                                    </div>
                                                    <div class="col-1 col-sm-6 col-md-10 mb-2 ">
                                                        <label for="" class="form-label"> الجهة المدربة <span class="redStar">*</span></label>
                                                        <input type="text" class="form-control" id="courser" name="courser" />
                                                    </div>
                                                    <div class="col-1 col-sm-6 col-md-10 mb-2 ">
                                                        <label for="" class="form-label">اون لاين</label>
                                                        <br>
                                                        <input type="checkbox" name="online_flag" id="online_flag" value="1">
                                                    </div>
                                                    <div class="col-1 col-sm-6 col-md-10 mb-2 ">
                                                        <label for="" class="form-label"> مكان الدورة<span class="redStar">*</span></label>
                                                        <input type="text" class="form-control" id="co_place" value="" name="co_place" />
                                                    </div>
                                                    <div class="col-1 col-sm-6 col-md-10 mb-2 ">
                                                        <label for="" class="form-label">مدة الدورة بالايام<span class="redStar">*</span></label>
                                                        <input type="number" class="form-control" id="co_duration" name="co_duration" />
                                                    </div>
                                                    <div class="col-1 col-sm-6 col-md-10 mb-2 ">
                                                        <label for="" class="form-label"> تاريخ التخرج من الدورة<span class="redStar">*</span></label>
                                                        <input type="date" class="form-control" id="co_compdate" name="co_compdate" />
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn " style="background: rgb(3, 6, 56); color:white;" name="updcourse">
                                                    حفظ</button>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-----------------------الكتب المنشورة-------------------->
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <p>الكتب المنشورة</p>
                        </div>
                        <div class="card-body">
                            <?php
                            $sql = "SELECT * from additional_info_books where user_id = '$idgreat'";
                            $res = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($res)) {


                            ?>
                                <p>الكتب المنشورة
                                </p>

                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>

                                            </th>
                                            <th scope="col">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="selectAllb" />
                                                </div>
                                            </th>
                                            <th class="d-none"></th>
                                            <th scope="col"> عنوان الكتاب</th>
                                            <th scope="col">الناشر </th>
                                            <th scope="col"> تاريخ النشر </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row = mysqli_fetch_assoc($res)) {
                                        ?>
                                            <tr>
                                                <td>
                                                    <button type="button" class="btn deleteb "> <i class="fa fa-trash btn-danger"></i></button>
                                                </td>
                                                <td scope="row">
                                                    <!-- <div class="form-check">
                                                        <input class="form-check-input rowCheckboxc" type="checkbox" value="" id="" />
                                                    </div>-->
                                                    <button type="button" class="btn updatebook"> <i class="fa fa-pen"></i></button>
                                                </td>
                                                <td class="d-none"><?php echo $row['id']; ?></td>
                                                <td><?php echo $row['published_book_name']; ?></td>
                                                <td><?php echo $row['published_book_publisher']; ?></td>
                                                <td><?php echo $row['published_book_date']; ?></td>


                                            </tr>
                                        <?php
                                        } ?>
                                    </tbody>
                                </table>
                            <?php
                            } else {
                            ?>
                                <p>الكتب المنشورة
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addbook">أضافة</button>
                                </p>
                                <div class="w-100 bg-warning p-2 text-white rounded-2">
                                    <p>لا توجد بيانات حتى الان</p>
                                </div>
                            <?php
                            }
                            ?>
                            <div class="modal fade" id="addbook" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">الكتب المنشورة </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="savecourse.php" method="post">
                                            <div class="modal-body">

                                                <div class="row">
                                                    <div class="col-12 col-sm-6 col-md-10 mb-2 ">
                                                        <label for="" class="form-label"> عنوان الكناب <span class="redStar">*</span></label>
                                                        <input type="text" class="form-control" id="" name="book_title" />
                                                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['iduser']; ?>">
                                                    </div>
                                                    <div class="col-12 col-sm-6 col-md-10 mb-2 ">
                                                        <label for="" class="form-label"> الناشر <span class="redStar">*</span></label>
                                                        <input type="text" class="form-control" id="" name="publisher" />

                                                    </div>
                                                    <div class="col-12 col-lg-10 col-xl-10  ">
                                                        <label class="form-label">تاريخ النشر <span class="redStar">*</span></label>
                                                        <div class="row">
                                                            <div class="col-12 col-sm-4">
                                                                <select id="id-day" name="day" class="form-select">
                                                                    <option value="">اليوم</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-12 col-sm-4 my-2 my-sm-0">
                                                                <select id="id-month" name="month" class="form-select">
                                                                    <option value="">الشهر</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-12 col-sm-4">
                                                                <select id="id-year" name="year" class="form-select">
                                                                    <option value="">السنة</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn " style="background: rgb(3, 6, 56); color:white;" name="addbook"> حفظ</button>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="removeb" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">الدورات </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="savecourse.php" method="post">
                                            <div class="modal-body">
                                                <p>هل انت متأكد ؟</p>
                                                <input type="hidden" name="id" id="delbid" value="">
                                                <input type="hidden" name="user_id" value="<?php echo $_SESSION['iduser']; ?>">
                                            </div>


                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-danger " name="delbook">
                                                    نعم</button>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="upbook" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">الكتب المنشورة </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="savecourse.php" method="post">
                                            <div class="modal-body">

                                                <div class="row">
                                                    <div class="col-12 col-sm-6 col-md-10 mb-2 ">
                                                        <label for="" class="form-label"> عنوان الكتاب <span class="redStar">*</span></label>
                                                        <input type="text" class="form-control" id="title" name="book_title" />
                                                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['iduser']; ?>">
                                                        <input type="hidden" name="bid" id="bid" value="">
                                                    </div>
                                                    <div class="col-12 col-sm-6 col-md-10 mb-2 ">
                                                        <label for="" class="form-label"> الناشر <span class="redStar">*</span></label>
                                                        <input type="text" class="form-control" id="publisher" name="publisher" />
                                                    </div>
                                                    <div class="col-12 col-lg-10 col-xl-10  ">
                                                        <label class="form-label">تاريخ النشر <span class="redStar">*</span></label>
                                                        <div class="row">
                                                            <div class="col-12 col-sm-4">
                                                                <select id="id-upday" name="day" class="form-select">
                                                                    <option value="">اليوم</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-12 col-sm-4 my-2 my-sm-0">
                                                                <select id="id-upmonth" name="month" class="form-select">
                                                                    <option value="">الشهر</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-12 col-sm-4">
                                                                <select id="id-upyear" name="year" class="form-select">
                                                                    <option value="">السنة</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn " style="background: rgb(3, 6, 56); color:white;" name="updbook"> حفظ</button>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-----------------------البحوث المنشورة-------------------->
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <p>البحوث المنشورة</p>
                        </div>
                        <div class="card-body"> <?php
                                                $sql = "SELECT * from additional_info_research where user_id = '$idgreat'";
                                                $res = mysqli_query($conn, $sql);
                                                if (mysqli_num_rows($res)) {


                                                ?>
                                <p>البحوث المنشورة
                                </p>

                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>

                                            </th>
                                            <th scope="col">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="selectAlls" />
                                                </div>
                                            </th>
                                            <th class="d-none"></th>
                                            <th scope="col"> عنوان البحث</th>
                                            <th scope="col">الناشر </th>
                                            <th scope="col"> تاريخ النشر </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                                    while ($row = mysqli_fetch_assoc($res)) {
                                        ?>
                                            <tr>
                                                <td>
                                                    <button type="button" class="btn deletes "> <i class="fa fa-trash btn-danger"></i></button>
                                                </td>
                                                <td scope="row">
                                                    <!-- <div class="form-check">
                                                        <input class="form-check-input rowCheckboxc" type="checkbox" value="" id="" />
                                                    </div>-->
                                                    <button type="button" class="btn updatesearch"> <i class="fa fa-pen"></i></button>
                                                </td>
                                                <td class="d-none"><?php echo $row['id']; ?></td>
                                                <td><?php echo $row['published_research_name']; ?></td>
                                                <td><?php echo $row['published_research_publisher']; ?></td>
                                                <td><?php echo $row['published_research_date']; ?></td>


                                            </tr>
                                        <?php
                                                    } ?>
                                    </tbody>
                                </table>
                            <?php
                                                } else {
                            ?>
                                <p>البحوث المنشورة
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal2">أضافة</button>
                                </p>
                                <div class="w-100 bg-warning p-2 text-white rounded-2">
                                    <p>لا توجد بيانات حتى الان</p>
                                </div>
                            <?php
                                                }
                            ?>
                            <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">البحوث المنشورة </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="savecourse.php" method="post">
                                            <div class="modal-body">

                                                <div class="row">
                                                    <div class="col-12 col-sm-6 col-md-10 mb-2 ">
                                                        <label for="" class="form-label"> عنوان البحث <span class="redStar">*</span></label>
                                                        <input type="text" class="form-control" id="" name="search_title" />
                                                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['iduser']; ?>">
                                                    </div>
                                                    <div class="col-12 col-sm-6 col-md-10 mb-2 ">
                                                        <label for="" class="form-label"> الناشر <span class="redStar">*</span></label>
                                                        <input type="text" class="form-control" id="" name="search_pub" />
                                                    </div>
                                                    <div class="col-12 col-lg-10 col-xl-10  ">
                                                        <label class="form-label">تاريخ النشر <span class="redStar">*</span></label>
                                                        <div class="row">
                                                            <div class="col-12 col-sm-4">
                                                                <select id="se-day" name="se-day" class="form-select">
                                                                    <option value="">اليوم</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-12 col-sm-4 my-2 my-sm-0">
                                                                <select id="se-month" name="se-month" class="form-select">
                                                                    <option value="">الشهر</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-12 col-sm-4">
                                                                <select id="se-year" name="se-year" class="form-select">
                                                                    <option value="">السنة</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn " style="background: rgb(3, 6, 56); color:white;" name="addsearch"> حفظ</button>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="removes" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">الدورات </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="savecourse.php" method="post">
                                            <div class="modal-body">
                                                <p>هل انت متأكد ؟</p>
                                                <input type="hidden" name="id" id="delsid" value="">
                                                <input type="hidden" name="user_id" value="<?php echo $_SESSION['iduser']; ?>">
                                            </div>


                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-danger " name="delsearch">
                                                    نعم</button>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="up_search" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">البحوث المنشورة </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="savecourse.php" method="post">
                                            <div class="modal-body">

                                                <div class="row">
                                                    <div class="col-12 col-sm-6 col-md-10 mb-2 ">
                                                        <label for="" class="form-label"> عنوان البحث <span class="redStar">*</span></label>
                                                        <input type="text" class="form-control" id="search_title" name="search_title" />
                                                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['iduser']; ?>">
                                                        <input type="hidden" name="sid" id="sid" value="">
                                                    </div>
                                                    <div class="col-12 col-sm-6 col-md-10 mb-2 ">
                                                        <label for="" class="form-label"> الناشر <span class="redStar">*</span></label>
                                                        <input type="text" class="form-control" id="search_pub" name="search_pub" />
                                                    </div>
                                                    <div class="col-12 col-lg-10 col-xl-10  ">
                                                        <label class="form-label">تاريخ النشر <span class="redStar">*</span></label>
                                                        <div class="row">
                                                            <div class="col-12 col-sm-4">
                                                                <select id="se-upday" name="se-day" class="form-select">
                                                                    <option value="">اليوم</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-12 col-sm-4 my-2 my-sm-0">
                                                                <select id="se-upmonth" name="se-month" class="form-select">
                                                                    <option value="">الشهر</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-12 col-sm-4">
                                                                <select id="se-upyear" name="se-year" class="form-select">
                                                                    <option value="">السنة</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn " style="background: rgb(3, 6, 56); color:white;" name="updsearch"> حفظ</button>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!----------------------- النقابات-------------------->
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <p> النقابات</p>
                        </div>
                        <div class="card-body"><?php
                                                $sql = "SELECT * from additional_info_alniqabat where user_id = '$idgreat'";
                                                $res = mysqli_query($conn, $sql);
                                                if (mysqli_num_rows($res) < 3 && mysqli_num_rows($res) >0) {
                                                ?>
                                <p> عضوية النقابات
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal3">أضافة</button>
                                </p>
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>

                                            </th>
                                            <th scope="col">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="selectAlln" />
                                                </div>
                                            </th>
                                            <th class="d-none"></th>
                                            <th scope="col"> النقابة </th>
                                            <th scope="col"> تاريخ الانتساب </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                                    while ($row = mysqli_fetch_assoc($res)) {
                                        ?>
                                            <tr>
                                                <td>
                                                    <button type="button" class="btn deletenaq "> <i class="fa fa-trash btn-danger"></i></button>
                                                </td>
                                                <td scope="row">
                                                    <!-- <div class="form-check">
                                                        <input class="form-check-input rowCheckboxc" type="checkbox" value="" id="" />
                                                    </div>-->
                                                    <button type="button" class="btn updatenaq"> <i class="fa fa-pen"></i></button>
                                                </td>
                                                <td class="d-none"><?php echo $row['id']; ?></td>
                                                <td><?php echo $row['alniqabat_name']; ?></td>

                                                <td><?php echo $row['alniqabat_date']; ?></td>


                                            </tr>
                                        <?php
                                                    } ?>
                                    </tbody>
                                </table>
                            <?php
                                                } elseif (mysqli_num_rows($res) >= 3) {
                            ?>
                                <p> عضوية النقابات
                                </p>
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>

                                            </th>
                                            <th scope="col">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="selectAlln" />
                                                </div>
                                            </th>
                                            <th class="d-none"></th>
                                            <th scope="col"> النقابة </th>
                                            <th scope="col"> تاريخ الانتساب </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                                    while ($row = mysqli_fetch_assoc($res)) {
                                        ?>
                                            <tr>
                                                <td>
                                                    <button type="button" class="btn deletenaq "> <i class="fa fa-trash btn-danger"></i></button>
                                                </td>
                                                <td scope="row">
                                                    <!-- <div class="form-check">
                                                            <input class="form-check-input rowCheckboxc" type="checkbox" value="" id="" />
                                                        </div>-->
                                                    <button type="button" class="btn updatenaq"> <i class="fa fa-pen"></i></button>
                                                </td>
                                                <td class="d-none"><?php echo $row['id']; ?></td>
                                                <td><?php echo $row['alniqabat_name']; ?></td>

                                                <td><?php echo $row['alniqabat_date']; ?></td>


                                            </tr>
                                        <?php
                                                    } ?>
                                    </tbody>
                                </table>
                            <?php } else {
                            ?>
                                <p> عضوية النقابات
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal3">أضافة</button>
                                </p>
                                <div class="w-100 bg-warning p-2 text-white rounded-2">
                                    <p>لا توجد بيانات حتى الان</p>
                                </div>
                            <?php
                                                }
                            ?>
                            <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">عضوية النقابات </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="savecourse.php" method="post">
                                            <div class="modal-body">

                                                <div class="row">
                                                    <div class="col-12 col-md-10 col-lg-10 col-xl-10  ">
                                                        <label for="naqabaa" class="form-label">النقابة<span class="redStar">*</span></label>
                                                        <select class="form-select" aria-label="Default select example" name="naqabaa">
                                                            <option disabled selected>اختر</option>
                                                            <option value="نقابة المهن الصحية">نقابة المهن الصحية</option>
                                                            <option value="نقابة الكيميائين">نقابة الكيميائين</option>
                                                            <option value="نقابة المهندسين">نقابة المهندسين</option>
                                                            <option value="اخرى">اخرى</option>
                                                        </select>
                                                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['iduser']; ?>">
                                                    </div>
                                                    <div class="col-12 col-lg-10 col-xl-10 mt-3 ">
                                                        <label class="form-label">تاريخ الانتساب <span class="redStar">*</span></label>
                                                        <div class="row">
                                                            <div class="col-12 col-sm-4">
                                                                <select id="id-nday" name="id-nday" class="form-select">
                                                                    <option value="">اليوم</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-12 col-sm-4 my-2 my-sm-0">
                                                                <select id="id-nmonth" name="id-nmonth" class="form-select">
                                                                    <option value="">الشهر</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-12 col-sm-4">
                                                                <select id="id-nyear" name="id-nyear" class="form-select">
                                                                    <option value="">السنة</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn " style="background: rgb(3, 6, 56); color:white;" name="addnaqaba"> حفظ</button>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="removenaq" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">الدورات </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="savecourse.php" method="post">
                                            <div class="modal-body">
                                                <p>هل انت متأكد ؟</p>
                                                <input type="hidden" name="id" id="delnaqid" value="">
                                                <input type="hidden" name="user_id" value="<?php echo $_SESSION['iduser']; ?>">
                                                <input type="hidden" name="name" id="delnaqnam" value="">
                                            </div>


                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-danger " name="delnaq">
                                                    نعم</button>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="up_naqaba" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">عضوية النقابات </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="savecourse.php" method="post">
                                            <div class="modal-body">

                                                <div class="row">
                                                    <div class="col-12 col-md-10 col-lg-10 col-xl-10  ">
                                                        <label for="naqabaa" class="form-label">النقابة<span class="redStar">*</span></label>
                                                        <select class="form-select" aria-label="Default select example" name="naqabaa" id="naqabaa">
                                                            <option disabled selected>اختر</option>
                                                            <option value="نقابة المهن الصحية">نقابة المهن الصحية</option>
                                                            <option value="نقابة الكيميائين">نقابة الكيميائين</option>
                                                            <option value="نقابة المهندسين">نقابة المهندسين</option>
                                                               <option value="نقابة اخرى">نقابة اخرى</option>
                                                        </select>
                                                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['iduser']; ?>">
                                                        <input type="hidden" name="nid" id="nid" value="">
                                                        <input type="hidden" name="oldname" id="oldname" value="">
                                                    </div>
                                                    <div class="col-12 col-lg-10 col-xl-10 mt-3 ">
                                                        <label class="form-label">تاريخ الانتساب <span class="redStar">*</span></label>
                                                        <div class="row">
                                                            <div class="col-12 col-sm-4">
                                                                <select id="idday" name="id-nday" class="form-select">
                                                                    <option value="">اليوم</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-12 col-sm-4 my-2 my-sm-0">
                                                                <select id="idn-nmonth" name="id-nmonth" class="form-select">
                                                                    <option value="">الشهر</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-12 col-sm-4">
                                                                <select id="idn-nyear" name="id-nyear" class="form-select">
                                                                    <option value="">السنة</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn " style="background: rgb(3, 6, 56); color:white;" name="updnaqaba"> حفظ</button>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <a href="mainpage.php" type="button" class="btn btn-secondary">رجوع الى القائمة </a>
                </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {

            $('.update').on('click', function() {

                $('#updatemodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);
                $('#id').val(data[2]);
                $('#co_name').val(data[3]);
                $('#old_name').val(data[3]);
                $('#courser').val(data[4]);
                $('#co_place').val(data[7]);
                $('#co_duration').val(data[8]);
                $('#co_compdate').val(data[9]);
                if (data[6] == '1')
                    $('#online_flag').prop("checked", true);
                else
                    $('#online_flag').prop("checked", false);



            });
            $('.delete').on('click', function() {

                $('#remove').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();
                console.log(data);
                $('#delid').val(data[2]);
                $('#delname').val(data[3]);

            });
            $('.deleteb').on('click', function() {

                $('#removeb').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();
                console.log(data);
                $('#delbid').val(data[2]);

            });
            $('.deletes').on('click', function() {

                $('#removes').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();
                console.log(data);
                $('#delsid').val(data[2]);

            });
            $('.deletenaq').on('click', function() {

                $('#removenaq').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();
                console.log(data);
                $('#delnaqid').val(data[2]);
                $('#delnaqnam').val(data[3]);

            });
            $('.updatebook').on('click', function() {

                $('#upbook').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);
                $('#bid').val(data[2]);
                $('#title').val(data[3]);
                $('#publisher').val(data[4]);

                var dateComponents = data[5].split("-");

                var day = parseInt(dateComponents[2], 10);
                var month = dateComponents[1];
                var year = dateComponents[0];
                $('#id-upday').val(day);
                $('#id-upmonth').val(month);
                $('#id-upyear').val(year);
                console.log("Day: " + day);
                console.log("Month: " + month);
                console.log("Year: " + year);

            });

            $('.updatesearch').on('click', function() {

                $('#up_search').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);
                $('#sid').val(data[2]);
                $('#search_title').val(data[3]);
                $('#search_pub').val(data[4]);

                var dateComponents = data[5].split("-");

                var day = parseInt(dateComponents[2], 10);
                var month = dateComponents[1];
                var year = dateComponents[0];
                $('#se-upday').val(day);
                $('#se-upmonth').val(month);
                $('#se-upyear').val(year);
                console.log("Day: " + day);
                console.log("Month: " + month);
                console.log("Year: " + year);

            });
            $('.updatenaq').on('click', function() {

                $('#up_naqaba').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);
                $('#nid').val(data[2]);
                $('#naqabaa').val(data[3]);
                $('#oldname').val(data[3]);


                var dateComponents = data[4].split("-");

                var day = parseInt(dateComponents[2], 10);
                var month = dateComponents[1];
                var year = dateComponents[0];
                $('#idday').val(day);
                $('#idn-nmonth').val(month);
                $('#idn-nyear').val(year);
                console.log("Day: " + day);
                console.log("Month: " + month);
                console.log("Year: " + year);

            });
        });
    </script>
    <script>
        function populateDaySelect(elementId) {
            const daySelect = document.getElementById(elementId);

            for (let day = 1; day <= 31; day++) {
                let option = document.createElement("option");
                option.value = day;
                option.text = day;
                daySelect.appendChild(option);
            }
        }

        populateDaySelect("id-day");
        populateDaySelect("id-nday");
        populateDaySelect("idday");
        populateDaySelect("se-day");
        populateDaySelect("id-upday");
        populateDaySelect("se-upday");

        // Generate options for months
        function populateMonthSelect(elementId, months) {
            const monthSelect = document.getElementById(elementId);

            months.forEach(function(month) {
                let option = document.createElement("option");
                option.value = month.value;
                option.text = month.name;
                monthSelect.appendChild(option);
            });
        }

        // Define the months array
        const months = [{
                value: '01',
                name: "يناير"
            },
            {
                value: '02',
                name: "فبراير"
            },
            {
                value: '03',
                name: "مارس"
            },
            {
                value: '04',
                name: "أبريل"
            },
            {
                value: '05',
                name: "مايو"
            },
            {
                value: '06',
                name: "يونيو"
            },
            {
                value: '07',
                name: "يوليو"
            },
            {
                value: '08',
                name: "أغسطس"
            },
            {
                value: '09',
                name: "سبتمبر"
            },
            {
                value: '10',
                name: "أكتوبر"
            },
            {
                value: '11',
                name: "نوفمبر"
            },
            {
                value: '12',
                name: "ديسمبر"
            },
        ];

        populateMonthSelect("id-month", months);
        populateMonthSelect("id-nmonth", months);
        populateMonthSelect("idn-nmonth", months);
        populateMonthSelect("se-month", months);
        populateMonthSelect("id-upmonth", months);
        populateMonthSelect("se-upmonth", months);




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
        populateYearSelect("id-year", currentYear - 100, currentYear);
        populateYearSelect("id-nyear", currentYear - 100, currentYear);
        populateYearSelect("idn-nyear", currentYear - 100, currentYear);
        populateYearSelect("se-year", currentYear - 100, currentYear);
        populateYearSelect("id-upyear", currentYear - 100, currentYear);
        populateYearSelect("se-upyear", currentYear - 100, currentYear);
    </script>

    <script>
        /* var selectAllCheckbox = document.getElementById('selectAllb');
        var rowCheckboxes = document.querySelectorAll('.rowCheckboxb');

        function updateSelectAllCheckbox() {
            var allChecked = true;
            var anyChecked = false;

            rowCheckboxes.forEach(function(checkbox) {
                if (checkbox.checked) {
                    anyChecked = true;
                } else {
                    allChecked = false;
                }
            });

            selectAllCheckbox.checked = allChecked;
            selectAllCheckbox.indeterminate = anyChecked && !allChecked;
        }

        selectAllCheckbox.addEventListener('change', function() {
            var isChecked = selectAllCheckbox.checked;

            rowCheckboxes.forEach(function(checkbox) {
                checkbox.checked = isChecked;
            });
        });

        rowCheckboxes.forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                updateSelectAllCheckbox();
            });
        });

        updateSelectAllCheckbox();*/
    </script>
</body>

</html>