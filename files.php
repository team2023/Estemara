<?php
session_start();
include('config.php');
$idgreat = $_SESSION['iduser'];


// <<<<<<<<<اختبار حالة كل مستمسك اذا رفع او لا>>>>>>>>>>>>>>>>>>>>>
$querydec = "SELECT * FROM deco WHERE user_id= '$idgreat'   ";
$resultdec = mysqli_query($conn, $querydec);
if ($resultdec->num_rows > 0) {
    $flag1 = "0";

    while ($row = $resultdec->fetch_assoc()) {
        $document = $row['dec_file'];
        if ($document != "") {
            $flag1 = "1";
        } else {
            $flag1 = "0";
            break;
        }
    }

    if ($flag1 == "1") {

        $sqlupdatflg = "UPDATE flag_forms SET files_flag='1' where user_id='$idgreat'";
        $resultupflg = mysqli_query($conn, $sqlupdatflg);
        if ($resultupflg) {
        }
    } else {
        $sqlupdatflg = "UPDATE flag_forms SET files_flag='0' where user_id='$idgreat'";
        $resultupflg = mysqli_query($conn, $sqlupdatflg);
        if ($resultupflg) {
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.rtl.min.css" />
    <link rel="stylesheet" href="assets/css/shettlogin.css" />
    <link rel="stylesheet" href="assets/css/styles.css" />
    <title>Document</title>
    <style>
        .btn-danger {
            background: #dc3545;
            border-color: #dc3545;
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


        <?php
        $query = "SELECT * FROM deco WHERE user_id= '$idgreat'   ";
        $result = $conn->query($query);
        ?>
        <div class="container mt-2">
            <div class="row">
                <div class="col"></div>
                <div class="col-10 my-2">
                    <table class="table table-striped table-hover" id="uploadTable">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col" class="d-none"></th>
                                <th scope="col" class="d-none"></th>
                                <th scope="col">نوع المستند</th>
                                <th scope="col">ملف المستند</th>
                                <th scope="col">صادر من</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                            ?>
                                    <tr>

                                        <th scope="row">
                                            <button type="button" class="btn btn-primary add" id="uploadBtn1">
                                                <div class="d-flex align-items-center">
                                                    <i class="fa-solid fa-download"></i>
                                                    <span class="mx-2">ارفاق او تعديل الملفات</span>
                                                </div>
                                            </button>




                                        </th>
                                        <td scope="col" class="d-none"><?php echo $row['id']; ?></td>
                                        <td scope="col" class="d-none"><?php echo $row['user_id']; ?></td>
                                        <td><?php echo $row['type_dec']; ?> </td>
                                        <?php
                                        if ($row['dec_file'] === "") {
                                        ?>
                                            <td> <?php echo "لم يتم تحميل الملف بعد"; ?></td>
                                        <?php } else {
                                        ?>
                                            <td><a href="assets/files/<?php echo $row['dec_file']; ?>"><?php echo $row['dec_file']; ?> </a></td>
                                        <?php
                                        }
                                        ?>
                                        <td></td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="col">

                </div>
                <div class=" d-flex justify-content-center mb-2">
                    <a href="mainpage.php" class="btn btn-danger w-25"> الرجوع الى القائمة الرئيسية</a>
                </div>

            </div>
        </div>
        <div class="modal fade" id="1stRow" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="1stRowLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">

                <div class="modal-content">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="1stRowLabel">
                                اضافة مستند

                            </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col"></div>
                                    <div class="col-10">
                                        <div class="col-12 my-2">نوع المستند</div>
                                        <div class="col-12 my-2"><span id="doc_type"></span></div>
                                        <div class="col-12 my-2">ملف المستند</div>
                                        <div class="col-12 my-2">
                                            <input class="form-control" type="file" name="docfile" required />
                                        </div>
                                        <small class="form-text text-muted" id="hint">

                                        </small>
                                        <input type="hidden" name="fid" id="id" value="">
                                        <input type="hidden" name="userid" id="userid" value="">
                                        <input type="hidden" name="doctype" id="doctype" value="">
                                        <div class="col-12 my-2">
                                            <div class="row my-3">
                                                <div class="col">اسم الملف</div>
                                                <div class="col-8">
                                                    <span id="fileName1"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success" name="addfile">
                                حفظ
                            </button>
                            <button type="button" class="btn btn-secondary btn-back" data-bs-dismiss="modal">
                                إلغاء
                            </button>
                        </div>
                    </form>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {

            $('.add').on('click', function() {

                $('#1stRow').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);
                $uploaded_file = document.getElementsByName("docfile")[0];
                let v = data[2].trim();
                if (v === "image") {
                    console.log("ok");
                    $uploaded_file.setAttribute("accept", ".jpeg ,.jpg");
                    $('#hint').html("الملفات المسموحة هي jpeg ,jpg");


                } else {
                    console.log("no");
                    $uploaded_file.setAttribute("accept", ".pdf");
                    $('#hint').html("الملفات المسموحة هي pdf");

                }
                $('#doc_type').text(v);
                $('#doctype').val(v);
                console.log(v);
                $('#id').val(data[0]);
                $('#userid').val(data[1]);


            });
        });
    </script>
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/fontawesome/js/all.min.js"></script>
    <script src="assets/js/uploadScript.js"></script>

</body>

</html>



<?php

if (isset($_POST['addfile'])) {

    /*
    $user_id=$_POST['userid'];
    $type_doc=$_POST['doctype'];
    $targetDir = "assets/files/";
    $filename=basename($_FILES["docfile"]["name"]);
    #$fileName ="user-".$user_id."-".$type_doc.".";
    $targetFilePath = $targetDir . $filename;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
      $FileName ="user-".$user_id."-".$type_doc.".".$fileType;
    $allowTypes = array('pdf');
    $id = $_POST['fid'];
    $targetPath = $targetDir . $FileName;



//-----------------------------------------------------


    if (in_array($fileType, $allowTypes)) {
      // Upload file to server
      if (move_uploaded_file($_FILES["docfile"]["tmp_name"], $targetFilePath)) {
        $newFilePath = $targetDir. "new_" . $FileName;
        rename($targetPath, $newFilePath);
     
            $sql ="UPDATE deco SET dec_file ='$FileName' WHERE  id='$id'" ;
            if (mysqli_query($conn, $sql)) {
              echo " تمت الاضافة بنجاح" .$FileName ."  fhgcbhjg " .$id;
              echo '<script> 
        window.location.href="files.php";</script>';
            } else {
              echo '<script> alert(" حدث خطأ , يرجى اعادة المحاولة ")
              window.location.href="files.php";</script>';
            }
          
      } else {
        echo '<script> alert("1 حدث خطأ , يرجى اعادة المحاولة ")
        window.location.href="files.php";</script>';
      }

  }
  else{
    echo "error" .mysqli_error($conn);
  }*/

    $user_id = $_POST['userid'];
    $type_doc = $_POST['doctype'];
    $targetDirectory = "assets/files/"; // Specify the directory where you want to upload the file
    $originalFileName = $_FILES["docfile"]["name"]; // Get the original file name
    $extension = pathinfo($originalFileName, PATHINFO_EXTENSION); // Get the file extension
    $newFileName = "user-" . $user_id . "-" . $type_doc . '.' . $extension; // Generate a unique file name
    $id = $_POST['fid'];
    $allowTypes = array('pdf');
    $allowimageTypes = array('jpg', 'jpeg');
    $targetPath = $targetDirectory . $newFileName; // Construct the target path
    $file_size = $_FILES['docfile']['size'] / (1024 * 1024); //حجم الملف 
    if ($file_size < 1) {
        if (trim($type_doc) == 'image') {
            if (in_array($extension, $allowimageTypes)) {
                if (move_uploaded_file($_FILES["docfile"]["tmp_name"], $targetPath)) {
                    // File has been uploaded, you can perform further operations here
                    // Rename the file on the server
                    $newFilePath = $targetDirectory  . $newFileName;
                    rename($targetPath, $newFilePath);
                    $sql = "UPDATE deco SET dec_file ='$newFileName' WHERE  id='$id'";
                    if (mysqli_query($conn, $sql)) {
                        echo " تمت الاضافة بنجاح" . $newFileName . "  fhgcbhjg " . $id;
                        echo '<script> 
                         window.location.href="files.php";</script>';
                    } else {
                        echo '<script> alert(" حدث خطأ , يرجى اعادة المحاولة ")
                          window.location.href="files.php";</script>';
                    }
                }
                
            } else {
                echo '<script> alert(" حدث خطأ , يرجى اختيار صيغة jpg,jpeg للصورة الشخصية  ")
                   window.location.href="files.php";</script>';
            }
        } else {

            if (in_array($extension, $allowTypes)) {
                if (move_uploaded_file($_FILES["docfile"]["tmp_name"], $targetPath)) {
                    // File has been uploaded, you can perform further operations here
                    // Rename the file on the server
                    $newFilePath = $targetDirectory  . $newFileName;
                    rename($targetPath, $newFilePath);
                    $sql = "UPDATE deco SET dec_file ='$newFileName' WHERE  id='$id'";
                    if (mysqli_query($conn, $sql)) {
                        echo " تمت الاضافة بنجاح" . $newFileName . "  fhgcbhjg " . $id;
                        echo '<script>window.location.href="files.php";</script>';
                    } else {
                        echo '<script> alert(" حدث خطأ , يرجى اعادة المحاولة ")
                           window.location.href="files.php";</script>';
                    }
                }
            } else {
                echo '<script> alert(" حدث خطأ , يرجى اختيار صيغة pdf للملفات ")
                 window.location.href="files.php";</script>';
            }
        }
    } else {
        echo '<script>alert("حجم الملف يجب ان يكون اقل من 1MB")</script>';
    }
}
?>