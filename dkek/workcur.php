<hr class="border border-5 border-black">

<div class="row pt-2">
    <div class="col-6">
        <h2> معلومات العمل الحالي </h2>
        <div class="d-flex flex-column">
            <p>
                <?php
                $nameworkold1 = $rowview['curr_sector'];
                ?>
                القطاع  : <?php echo $nameworkold1; ?>

            </p>
            <p>
                <?php
                $nameworkold2 = $rowview['curr_type'];
                ?>
                نوع التعين   : <?php echo $nameworkold2; ?>
            </p>
            <p>
                <?php
                $nameworkold3 = $rowview['curr_certif'];
                ?>
                الشهادة التي تعين بها    : <?php echo $nameworkold3; ?>
            </p>
            <p>
                <?php
                $nameworkold4 = $rowview['curr_place'];
                ?>
                مكان العمل  : <?php echo $nameworkold4; ?>
            </p>
            <p>
                <?php
                $nameworkold5 = $rowview['curr_sdate'];
                ?>
                تاريخ بداية العمل   : <?php echo $nameworkold4; ?>
            </p>
          
        </div>


    

    <hr>
    <div class="row">
        <div class="col-12">
            <label for=""> الحالة </label>
            <br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="card0" name="workcur" value="صحيح" onclick="disableInput('cardnote')" checked>
                <label class="form-check-label" for="card0">صحيح </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" name="workcur" id="card1" type="radio" value="غير صحيح" onclick="enableInput('cardnote')">
                <label class="form-check-label" for="card1">غير صحيح</label>
            </div>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label"> اختر ملاحظة :</label>
                <select class="form-select" id="cardnote" name="workcurnot" aria-describedby="validationServer04Feedback">
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