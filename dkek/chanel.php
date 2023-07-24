<div class="row pt-2">
    <div class="col-6">
        <h2> قناة التقديم   </h2>
        <?php
    
        if($rowview['channel_type']==2)
{
    $chname="قناة الشهداء";
        ?>
      <div class="d-flex flex-column">
            <p>
                اسم قناة التقديم  : <?php echo $chname; ?>

            </p>
            <p>
                <?php
                $namechanel2 = $rowview['martyr_adjective'];
                ?>
                صفة الشهيد    : <?php echo $namechanel2; ?>
            </p>
            <p>
                <?php
                $namechanel3 = $rowview['martyr_name'];
                ?>
                  اسم الشهيد الرباعي     : <?php echo $namechanel3; ?>
            </p>
            <p>
                <?php
                $namechanel4 = $rowview['martyr_mother_name'];
                ?>
                اسم ام الشهيد   : <?php echo $namechanel4; ?>
            </p>
            <p>
                <?php
                $namechanel5 = $rowview['raqm_alqarar'];
                ?>
                رقم القرار     : <?php echo $namechanel5; ?>
            </p>
            <p>
                <?php
                $namechanel6 = $rowview['tawsif_halat_alqaraba'];
                ?>
                توصيف حالة القرابة    : <?php echo $namechanel6; ?>
            </p>
        </div>

<?php
}
elseif($rowview['channel_type']==3)
{
    $chname="قناة  ضحايا الارهاب و العمليات العسكرية";
?>
       <div class="d-flex justify-content-around">
            <p>
                اسم قناة التقديم  : <?php echo $chname; ?>

            </p>
            <p>
                <?php
                $namechanel2 = $rowview['martyr_adjective'];
                ?>
                صفة الشهيد    : <?php echo $namechanel2; ?>
            </p>
            <p>
                <?php
                $namechanel3 = $rowview['martyr_name'];
                ?>
                  اسم الشهيد الرباعي     : <?php echo $namechanel3; ?>
            </p>
            <p>
                <?php
                $namechanel4 = $rowview['martyr_mother_name'];
                ?>
                اسم ام الشهيد   : <?php echo $namechanel4; ?>
            </p>
            <p>
                <?php
                $namechanel5 = $rowview['raqm_alqarar'];
                ?>
                رقم القرار     : <?php echo $namechanel5; ?>
            </p>
            <p>
                <?php
                $namechanel6 = $rowview['tawsif_halat_alqaraba'];
                ?>
                توصيف حالة القرابة    : <?php echo $namechanel6; ?>
            </p>
        </div>





    <?php  }
    elseif($rowview['channel_type']==4)
    {
      
        $chname="قناة السجناء السياسين";

    ?>
 <div class="d-flex justify-content-around">
            <p>
                اسم قناة التقديم  : <?php echo $chname; ?>

            </p>
            <p>
                <?php
                $namechanel3 = $rowview['prisoner_name'];
                ?>
                  اسم السجين الرباعي     : <?php echo $namechanel3; ?>
            </p>
            <p>
                <?php
                $namechanel4 = $rowview['prisoner_mother_name'];
                ?>
                اسم ام السجين   : <?php echo $namechanel4; ?>
            </p>
            <p>
                <?php
                $namechanel5 = $rowview['raqm_alqarar'];
                ?>
                رقم القرار     : <?php echo $namechanel5; ?>
            </p>
            <p>
                <?php
                $namechanel6 = $rowview['tawsif_halat_alqaraba'];
                ?>
                توصيف حالة القرابة    : <?php echo $namechanel6; ?>
            </p>
        </div>


<?php
    }
    elseif($rowview['channel_type']==1)
    {
      
        $chname="قناة العامة ";
?>



<div class="d-flex justify-content-around">
            <p>
                اسم قناة التقديم  : <?php echo $chname; ?>

            </p>
        
        </div>


<?php
    }
    elseif($rowview['channel_type']==5)
    {
        $chname="قناة الناجيات الايزيديات ";
?>

<div class="d-flex justify-content-around">
            <p>
                اسم قناة التقديم  : <?php echo $chname; ?>

            </p>
        
        </div>



<?php
    }
    ?>

    <hr>
    <div class="row">
        <div class="col-12">
            <label for=""> الحالة </label>
            <br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="card0" name="chanel" value="صحيح" onclick="disableInput('cardnote')" checked>
                <label class="form-check-label" for="card0">صحيح </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" name="chanel" id="card1" type="radio" value="غير صحيح" onclick="enableInput('cardnote')">
                <label class="form-check-label" for="card1">غير صحيح</label>
            </div>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label"> اختر ملاحظة :</label>
                <select class="form-select" id="cardnote" name="chanelnot" aria-describedby="validationServer04Feedback">
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