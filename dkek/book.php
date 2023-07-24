<div class="row pt-2">
    <div class="col-6">
        <h2> الكتب المنشورة </h2>
        <div class="d-flex justify-content-around">
            <p>
                <?php
                $nameserach1 = $rowview['published_book_name'];
                ?>
                اسم الكتاب  : <?php echo $nameserach1; ?>

            </p>
            <p>
                <?php
                $nameserach2 = $rowview['published_book_publisher'];
                ?>
                اسم الناشر    : <?php echo $nameserach2; ?>
            </p>
            <p>
                <?php
                $nameserach3 = $rowview['published_book_date'];
                ?>
                تاريخ النشر       : <?php echo $nameserach3; ?>
            </p>
       
        </div>


    

    <hr>
    <div class="row">
        <div class="col-12">
            <label for=""> الحالة </label>
            <br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="card0" name="book" value="صحيح" onclick="disableInput('cardnote')" checked>
                <label class="form-check-label" for="card0">صحيح </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" name="book" id="card1" type="radio" value="غير صحيح" onclick="enableInput('cardnote')">
                <label class="form-check-label" for="card1">غير صحيح</label>
            </div>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label"> اختر ملاحظة :</label>
                <select class="form-select" id="cardnote" name="booknot" aria-describedby="validationServer04Feedback">
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