<div class="row pt-2">
    <div class="col-6">
        <h2> معلومات العمل والمهارة </h2>
        <div class="d-flex justify-content-around">
            <p>
                <?php
                $namework1 = $rowview['government_place_work'];
                ?>
                جهة العمل : <?php echo $namework1; ?>

            </p>
            <p>
                <?php
                $namework2 = $rowview['duration_work'];
                ?>
                عدد شهور العمل : <?php echo $namework2; ?>
            </p>
        </div>


    

    <hr>
    <div class="row">
        <div class="col-12">
            <label for=""> الحالة </label>
            <br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="card0" name="work" value="صحيح" onclick="disableInput('cardnote')" checked>
                <label class="form-check-label" for="card0">صحيح </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" name="work" id="card1" type="radio" value="غير صحيح" onclick="enableInput('cardnote')">
                <label class="form-check-label" for="card1">غير صحيح</label>
            </div>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label"> اختر ملاحظة :</label>
                <select class="form-select" id="cardnote" name="worknot" aria-describedby="validationServer04Feedback">
                    <option value="">.. </option>
                    <option>العمل غير مطابق</option>
                </select>
            </div>
        </div>
     
    </div>
    </div>
<div class="col-6">
    <div style="text-align:center">
        <?php
        $id1 = $rowview['usid'];
        $name1 = "البطاقة الوطنية";
        $pdfnamepth = getpdf($id1, $name1);

        ?>

        <iframe src="../oo/assets/files/<?php echo $pdfnamepth; ?>" width="500" height="500"></iframe>
    </div>
</div>
</div>