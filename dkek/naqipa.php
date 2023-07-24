<?php
$countn=$rowniqbat['COUNT(alniqabat_flag)'];

if($countn==1)
{
?>

<div class="row pt-2">
    <div class="col-6">
        <h2> معلومات النقابات</h2>
        <div class="d-flex justify-content-around">
            <p>
                <?php
                $numnqi = num_Naqaba($idd)
                ?>
                عدد النقابات  : <?php echo $numnqi; ?>

            </p>
        </div>


    

    <hr>
    <div class="row">
        <div class="col-12">
            <label for=""> الحالة </label>
            <br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="card0" name="nqp" value="صحيح" onclick="disableInput('cardnote')" checked>
                <label class="form-check-label" for="card0">صحيح </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" name="nqp" id="card1" type="radio" value="غير صحيح" onclick="enableInput('cardnote')">
                <label class="form-check-label" for="card1">غير صحيح</label>
            </div>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label"> اختر ملاحظة :</label>
                <select class="form-select" id="cardnote" name="nqpnot" aria-describedby="validationServer04Feedback">
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
        $name1 = "البطاقة الوطنية";
        $pdfnamepth = getpdf($id1, $name1);

        ?>

        <iframe src="../oo/assets/files/<?php echo $pdfnamepth; ?>" width="500" height="500"></iframe>
    </div>
</div>
</div>
<?php }


else if($countn==2)
{
?>

<div class="row pt-2">

    <div class="col-6">
        <h2> معلومات النقابات</h2>
        <div class="d-flex justify-content-around">
            <p>
                <?php
                $numnqi = num_Naqaba($idd)
                ?>
                عدد النقابات  : <?php echo $numnqi; ?>

            </p>
        </div>
    <hr>
    <div class="row">
        <div class="col-12">
            <label for=""> الحالة </label>
            <br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="card0" name="nqp" value="صحيح" onclick="disableInput('cardnote')" checked>
                <label class="form-check-label" for="card0">صحيح </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" name="nqp" id="card1" type="radio" value="غير صحيح" onclick="enableInput('cardnote')">
                <label class="form-check-label" for="card1">غير صحيح</label>
            </div>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label"> اختر ملاحظة :</label>
                <select class="form-select" id="cardnote" name="nqpnot" aria-describedby="validationServer04Feedback">
                    <option value="">.. </option>
                    <option>...</option>
                </select>
            </div>
        </div>
   >
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


<!-- 2 -->
<div class="row pt-2">
    <div class="col-6">
        <h2> معلومات النقابات</h2>
        <div class="d-flex justify-content-around">
            <p>
              
               النقابة الثانية

            </p>
        </div>


    

    <hr>
 
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

<?php }

/////////////// 3 نقابات

else if($countn==3)
{
?>

<div class="row pt-2">

    <div class="col-6">
        <h2> معلومات النقابات</h2>
        <div class="d-flex justify-content-around">
            <p>
                <?php
                $numnqi = num_Naqaba($idd)
                ?>
                عدد النقابات  : <?php echo $numnqi; ?>

            </p>
        </div>
    <hr>
    <div class="row">
        <div class="col-12">
            <label for=""> الحالة </label>
            <br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="card0" name="nqp" value="صحيح" onclick="disableInput('cardnote')" checked>
                <label class="form-check-label" for="card0">صحيح </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" name="nqp" id="card1" type="radio" value="غير صحيح" onclick="enableInput('cardnote')">
                <label class="form-check-label" for="card1">غير صحيح</label>
            </div>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label"> اختر ملاحظة :</label>
                <select class="form-select" id="cardnote" name="nqpnot" aria-describedby="validationServer04Feedback">
                    <option value="">.. </option>
                    <option>...</option>
                </select>
            </div>
        </div>
       >
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


<!-- 2 -->
<div class="row pt-2">
    <div class="col-6">
        <h2> معلومات النقابات</h2>
        <div class="d-flex justify-content-around">
            <p>
              
               النقابة الثانية

            </p>
        </div>


    

    <hr>
   
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
<!--3 -->
<div class="row pt-2">
    <div class="col-6">
        <h2> معلومات النقابات</h2>
        <div class="d-flex justify-content-around">
            <p>
              
               النقابة الثالثة

            </p>
        </div>


    

    <hr>
   
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
<?php }


?>