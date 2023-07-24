<?php
$countc=$rowcouse['COUNT(course_flag)'];

if($countc==1)
{
?>

<div class="row pt-2">
    <div class="col-6">
        <h2> معلومات الدورات</h2>
        <div class="d-flex justify-content-around">
            <p>
                <?php
                $numcurs = num_Dorat($idd)
                ?>
                عدد الدورات  : <?php echo $numcurs; ?>

            </p>
        </div>
    <hr>
    <div class="row">
        <div class="col-12">
            <label for=""> الحالة </label>
            <br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="card0" name="dor" value="صحيح" onclick="disableInput('cardnote')" checked>
                <label class="form-check-label" for="card0">صحيح </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" name="dor" id="card1" type="radio" value="غير صحيح" onclick="enableInput('cardnote')">
                <label class="form-check-label" for="card1">غير صحيح</label>
            </div>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label"> اختر ملاحظة :</label>
                <select class="form-select" id="cardnote" name="dornot" aria-describedby="validationServer04Feedback">
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
        $name1 = "";
        $pdfnamepth = getpdf($id1, $name1);

        ?>

        <iframe src="../oo/assets/files/<?php echo $pdfnamepth; ?>" width="500" height="500"></iframe>
    </div>
</div>
</div>

<?php }
else if($countc==2)
{
?>
<div class="row pt-2">
    <div class="col-6">
        <h2> معلومات الدورات</h2>
        <div class="d-flex justify-content-around">
            <p>
                <?php
                $numcurs = num_Dorat($idd)
                ?>
                عدد الدورات  : <?php echo $numcurs; ?>

            </p>
        </div>
    <hr>
    <div class="row">
        <div class="col-12">
            <label for=""> الحالة </label>
            <br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="card0" name="dor" value="صحيح" onclick="disableInput('cardnote')" checked>
                <label class="form-check-label" for="card0">صحيح </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" name="dor" id="card1" type="radio" value="غير صحيح" onclick="enableInput('cardnote')">
                <label class="form-check-label" for="card1">غير صحيح</label>
            </div>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label"> اختر ملاحظة :</label>
                <select class="form-select" id="cardnote" name="dornot" aria-describedby="validationServer04Feedback">
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
        $name1 = "";
        $pdfnamepth = getpdf($id1, $name1);

        ?>

        <iframe src="../oo/assets/files/<?php echo $pdfnamepth; ?>" width="500" height="500"></iframe>
    </div>
</div>
</div>

<div class="row pt-2">
    <div class="col-6">
        <h2> معلومات الدورات</h2>
        <div class="d-flex justify-content-around">
            <p>
             
              الدورة الثانية

            </p>
        </div>
    <hr>
   
   
<div class="col-6">
    <div style="text-align:center">
        <?php
        $id1 = $rowview['usid'];
        $name1 = "";
        $pdfnamepth = getpdf($id1, $name1);

        ?>

        <iframe src="../oo/assets/files/<?php echo $pdfnamepth; ?>" width="500" height="500"></iframe>
    </div>
</div>
</div>

<?php } 
else if($countc==3)
{
?>

<div class="row pt-2">
    <div class="col-6">
        <h2> معلومات الدورات</h2>
        <div class="d-flex justify-content-around">
            <p>
                <?php
                $numcurs = num_Dorat($idd)
                ?>
                عدد الدورات  : <?php echo $numcurs; ?>

            </p>
        </div>
    <hr>
    <div class="row">
        <div class="col-12">
            <label for=""> الحالة </label>
            <br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="card0" name="dor" value="صحيح" onclick="disableInput('cardnote')" checked>
                <label class="form-check-label" for="card0">صحيح </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" name="dor" id="card1" type="radio" value="غير صحيح" onclick="enableInput('cardnote')">
                <label class="form-check-label" for="card1">غير صحيح</label>
            </div>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label"> اختر ملاحظة :</label>
                <select class="form-select" id="cardnote" name="dornot" aria-describedby="validationServer04Feedback">
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
        $name1 = "";
        $pdfnamepth = getpdf($id1, $name1);

        ?>

        <iframe src="../oo/assets/files/<?php echo $pdfnamepth; ?>" width="500" height="500"></iframe>
    </div>
</div>
</div>

<div class="row pt-2">
    <div class="col-6">
        <h2> معلومات الدورات</h2>
        <div class="d-flex justify-content-around">
            <p>
             
              الدورة الثانية

            </p>
        </div>
    <hr>

    </div>
<div class="col-6">
    <div style="text-align:center">
        <?php
        $id1 = $rowview['usid'];
        $name1 = "";
        $pdfnamepth = getpdf($id1, $name1);

        ?>

        <iframe src="../oo/assets/files/<?php echo $pdfnamepth; ?>" width="500" height="500"></iframe>
    </div>
</div>
</div>


<div class="row pt-2">
    <div class="col-6">
        <h2> معلومات الدورات</h2>
        <div class="d-flex justify-content-around">
            <p>
             
              الدورة ثالثة

            </p>
        </div>
    <hr>
 
    </div>
<div class="col-6">
    <div style="text-align:center">
        <?php
        $id1 = $rowview['usid'];
        $name1 = "";
        $pdfnamepth = getpdf($id1, $name1);

        ?>

        <iframe src="../oo/assets/files/<?php echo $pdfnamepth; ?>" width="500" height="500"></iframe>
    </div>
</div>
</div>

<?php } ?>