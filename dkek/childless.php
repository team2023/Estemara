<?php
$more = $rowview['number_child_more18'];
if ($more == "1") {

?>


    <hr class="border border-5 border-black">
    <h2> معلومات الاطفال الذي اكبر من 18 سنة </h2>
    <div class="row">
        <div class="col-6">
            <h2> </h2>
            <div class="d-flex justify-content-around">
                <p>

                    معلومات الطفل الاول الذي اكبر من 18 سنة

                </p>

                <p>

            </div>

            <hr>
            <div class="row">
                <div class="col-12">
                    <label for=""> الحالة </label>
                    <br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="ch10" checked name="less" value="0" onclick="disableInput('ch1note')">
                        <label class="form-check-label" for="">صحيح </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" name="less" id="ch11" type="radio" value="1" onclick="enableInput('ch1note')">
                        <label class="form-check-label" for="">غير صحيح</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label"> اختر ملاحظة :</label>
                        <select class="form-select" id="ch1note" name="lessnot" aria-describedby="validationServer04Feedback">
                            <option value="">.. </option>
                            <option>...</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div style="text-align:center">
                <?php
                $id1 = $rowview['usid'];
                $name1 = "تأييد جهة نشر الكتاب";
                $pdfnamepth = getpdf($id1, $name1);
                ?>
                <iframe src="../assets/files/<?php echo $pdfnamepth; ?>" width="500" height="500"></iframe>
            </div>
        </div>
    </div>

<?php

} else if ($more == "2") {
?>
    <hr class="border border-5 border-black">
    <h2> معلومات الاطفال الذي اكبر من 18 سنة </h2>
    <div class="row">
        <div class="col-6">
            <h2> </h2>
            <div class="d-flex justify-content-around">
                <p>

                    معلومات الطفل الاول الذي اكبر من 18 سنة

                </p>

                <p>

            </div>


            <hr>
            <div class="row">
                <div class="col-12">
                    <label for=""> الحالة </label>
                    <br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="ch10" checked name="ch1less" value="0" onclick="disableInput('ch1note')">
                        <label class="form-check-label" for="">صحيح </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" name="ch1less" id="ch11" type="radio" value="1" onclick="enableInput('ch1note')">
                        <label class="form-check-label" for="">غير صحيح</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label"> اختر ملاحظة :</label>
                        <select class="form-select" id="ch1note" aria-describedby="validationServer04Feedback">
                            <option value="">.. </option>
                            <option>...</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div style="text-align:center">
                <?php $id1 = $rowview['usid'];
                $name1 = "تأييد جهة نشر الكتاب";
                $pdfnamepth = getpdf($id1, $name1);          ?> <iframe src="../assets/files/<?php echo $pdfnamepth; ?>" width="500" height="500"></iframe>
            </div>
        </div>
    </div>
    <hr class="border border-5 border-black">
    <h2> معلومات الاطفال الذي اكبر من 18 سنة </h2>
    <div class="row">
        <div class="col-6">
            <h2> </h2>
            <div class="d-flex justify-content-around">
                <p>

                    معلومات الطفل الثاني الذي اكبر من 18 سنة

                </p>

                <p>

            </div>


            <hr>
            <div class="row">
                <div class="col-12">
                    <label for=""> الحالة </label>
                    <br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="ch20" checked name="ch1less" value="0" onclick="disableInput('ch2note')">
                        <label class="form-check-label" for="">صحيح </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" name="ch1less" id="ch21" type="radio" value="1" onclick="enableInput('ch2note')">
                        <label class="form-check-label" for="">غير صحيح</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label"> اختر ملاحظة :</label>
                        <select class="form-select" id="ch2note" aria-describedby="validationServer04Feedback">
                            <option value="">.. </option>
                            <option>...</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div style="text-align:center">
                <?php $id1 = $rowview['usid'];
                $name1 = "تأييد جهة نشر الكتاب";
                $pdfnamepth = getpdf($id1, $name1);          ?> <iframe src="../assets/files/<?php echo $pdfnamepth; ?>" width="500" height="500"></iframe>
            </div>
        </div>
    </div>








<?php
} else if ($more == "3") {
?>
    <hr class="border border-5 border-black">
    <h2> معلومات الاطفال الذي اكبر من 18 سنة </h2>
    <div class="row">
        <div class="col-6">
            <h2> </h2>
            <div class="d-flex justify-content-around">
                <p>
                    معلومات الطفل الاول الذي اكبر من 18 سنة
                </p>
            </div>
            <hr>
            <div class="row">
                <div class="col-12">
                    <label for=""> الحالة </label>
                    <br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="ch10" checked name="ch1less" value="0" onclick="disableInput('ch1note')">
                        <label class="form-check-label" for="">صحيح </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" name="ch1less" id="ch11" type="radio" value="1" onclick="enableInput('ch1note')">
                        <label class="form-check-label" for="">غير صحيح</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label"> اختر ملاحظة :</label>
                        <select class="form-select" id="ch1note" aria-describedby="validationServer04Feedback">
                            <option value="">.. </option>
                            <option>...</option>
                        </select>
                    </div>
                </div>
            </div>
            </div>
            <div class="col-6">
                <div style="text-align:center">
                    <?php $id1 = $rowview['usid'];
                    $name1 = "تأييد جهة نشر الكتاب";
                    $pdfnamepth = getpdf($id1, $name1);          ?> <iframe src="../assets/files/<?php echo $pdfnamepth; ?>" width="500" height="500"></iframe>
                </div>
            </div>
    </div>
        <hr class="border border-5 border-black">
        <h2> معلومات الاطفال الذي اكبر من 18 سنة </h2>
        <div class="row">
            <div class="col-6">
                <h2> </h2>
                <div class="d-flex justify-content-around">
                    <p>

                        معلومات الطفل الثاني الذي اكبر من 18 سنة

                    </p>

                    <p>

                </div>


                <hr>
                <div class="row">
                    <div class="col-12">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="ch20" checked name="" value="0" onclick="disableInput('ch2note')">
                            <label class="form-check-label" for="">صحيح </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="ch1less" id="ch21" type="radio" value="1" onclick="enableInput('ch2note')">
                            <label class="form-check-label" for="">غير صحيح</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label"> اختر ملاحظة :</label>
                            <select class="form-select" id="ch2note" aria-describedby="validationServer04Feedback">
                                <option value="">.. </option>
                                <option>...</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div style="text-align:center">
                    <?php $id1 = $rowview['usid'];
                    $name1 = "تأييد جهة نشر الكتاب";
                    $pdfnamepth = getpdf($id1, $name1);          ?> <iframe src="../assets/files/<?php echo $pdfnamepth; ?>" width="500" height="500"></iframe>
                </div>
            </div>
        </div>
        <hr class="border border-5 border-black">
        <h2> معلومات الاطفال الذي اكبر من 18 سنة </h2>
        <div class="row">
            <div class="col-6">
                <h2> </h2>
                <div class="d-flex justify-content-around">
                    <p>

                        معلومات الطفل الثالث الذي اكبر من 18 سنة

                    </p>

                    <p>

                </div>


                <hr>
                <div class="row">
                    <div class="col-12">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="ch30" checked name="ch1less" value="0" onclick="disableInput('ch3note')">
                            <label class="form-check-label" for="">صحيح </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="ch1less" id="ch31" type="radio" value="1" onclick="enableInput('ch3note')">
                            <label class="form-check-label" for="">غير صحيح</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label"> اختر ملاحظة :</label>
                            <select class="form-select" id="ch3note" aria-describedby="validationServer04Feedback">
                                <option value="">.. </option>
                                <option>...</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        
        <div class="col-6">
            <div style="text-align:center">
                <?php $id1 = $rowview['usid'];
                $name1 = "تأييد جهة نشر الكتاب";
                $pdfnamepth = getpdf($id1, $name1);          ?> <iframe src="../assets/files/<?php echo $pdfnamepth; ?>" width="500" height="500"></iframe>
            </div>
        </div>
    </div>


<?php

} else if ($more == "4") {
?>
    <hr class="border border-5 border-black">
    <hr class="border border-5 border-black">
    <h2> معلومات الاطفال الذي اكبر من 18 سنة </h2>
    <div class="row">
        <div class="col-6">
            <h2> </h2>
            <div class="d-flex justify-content-around">
                <p>

                    معلومات الطفل الاول الذي اكبر من 18 سنة

                </p>

                <p>

            </div>


            <hr>
            <div class="row">
                <div class="col-12">
                    <label for=""> الحالة </label>
                    <br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="ch10" checked name="ch1less" value="0" onclick="disableInput('ch1note')">
                        <label class="form-check-label" for="">صحيح </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" name="ch1less" id="ch11" type="radio" value="1" onclick="enableInput('ch1note')">
                        <label class="form-check-label" for="">غير صحيح</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label"> اختر ملاحظة :</label>
                        <select class="form-select" id="ch1note" aria-describedby="validationServer04Feedback">
                            <option value="">.. </option>
                            <option>...</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div style="text-align:center">
                    <?php $id1 = $rowview['usid'];
                    $name1 = "تأييد جهة نشر الكتاب";
                    $pdfnamepth = getpdf($id1, $name1);          ?> <iframe src="../assets/files/<?php echo $pdfnamepth; ?>" width="500" height="500"></iframe>
                </div>
            </div>
        </div>
        <hr class="border border-5 border-black">
        <h2> معلومات الاطفال الذي اكبر من 18 سنة </h2>
        <div class="row">
            <div class="col-6">
                <h2> </h2>
                <div class="d-flex justify-content-around">
                    <p>

                        معلومات الطفل الثاني الذي اكبر من 18 سنة

                    </p>

                    <p>

                </div>


                <hr>
                <div class="row">
                    <div class="col-12">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="ch20" name="ch11less" value="0" onclick="disableInput('ch2note')" checked>
                            <label class="form-check-label" for="">صحيح </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="ch11less" id="ch21" type="radio" value="1" onclick="enableInput('ch2note')">
                            <label class="form-check-label" for="">غير صحيح</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label"> اختر ملاحظة :</label>
                            <select class="form-select" id="ch2note" aria-describedby="validationServer04Feedback">
                                <option value="">.. </option>
                                <option>...</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div style="text-align:center">
                    <?php $id1 = $rowview['usid'];
                    $name1 = "تأييد جهة نشر الكتاب";
                    $pdfnamepth = getpdf($id1, $name1);          ?> <iframe src="../assets/files/<?php echo $pdfnamepth; ?>" width="500" height="500"></iframe>
                </div>
            </div>
        </div>
        <hr class="border border-5 border-black">
        <h2> معلومات الاطفال الذي اكبر من 18 سنة </h2>
        <div class="row">
            <div class="col-6">
                <h2> </h2>
                <div class="d-flex justify-content-around">
                    <p>

                        معلومات الطفل الثالث الذي اكبر من 18 سنة

                    </p>

                    <p>

                </div>


                <hr>
                <div class="row">
                    <div class="col-12">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="ch30" checked name="ch1less" value="0" onclick="disableInput('ch3note')">
                            <label class="form-check-label" for="">صحيح </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="ch1less" id="ch31" type="radio" value="1" onclick="enableInput('ch3note')">
                            <label class="form-check-label" for="">غير صحيح</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label"> اختر ملاحظة :</label>
                            <select class="form-select" id="ch3note" aria-describedby="validationServer04Feedback">
                                <option value="">.. </option>
                                <option>...</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div style="text-align:center">
                <?php $id1 = $rowview['usid'];
                $name1 = "تأييد جهة نشر الكتاب";
                $pdfnamepth = getpdf($id1, $name1);          ?> <iframe src="../assets/files/<?php echo $pdfnamepth; ?>" width="500" height="500"></iframe>
            </div>
        </div>
    </div>

    <hr class="border border-5 border-black">
    <h2> معلومات الاطفال الذي اكبر من 18 سنة </h2>
    <div class="row">
        <div class="col-6">
            <h2> </h2>
            <div class="d-flex justify-content-around">
                <p>

                    معلومات الطفل الرابع الذي اكبر من 18 سنة

                </p>

                <p>

            </div>


            <hr>
            <div class="row">
                <div class="col-12">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="ch40" checked name="ch1less" value="0" onclick="disableInput('ch1note')">
                        <label class="form-check-label" for="">صحيح </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" name="ch1less" id="ch41" type="radio" value="1" onclick="enableInput('ch1note')">
                        <label class="form-check-label" for="">غير صحيح</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label"> اختر ملاحظة :</label>
                        <select class="form-select" id="ch4note" aria-describedby="validationServer04Feedback">
                            <option value="">.. </option>
                            <option>...</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div style="text-align:center">
                <?php $id1 = $rowview['usid'];
                $name1 = "تأييد جهة نشر الكتاب";
                $pdfnamepth = getpdf($id1, $name1);          ?> <iframe src="../assets/files/<?php echo $pdfnamepth; ?>" width="500" height="500"></iframe>
            </div>
        </div>
    </div>

<?php

}
?>