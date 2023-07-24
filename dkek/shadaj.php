<hr class="border border-5 border-black">

<div class="row pt-2">
            <div class="col-6">
                <h2> معلومات شهادة الجنسية    </h2>
                <div class="d-flex justify-content-around">
                    <p>
<?php 
$namepers2 = $rowview['nationality_certificate_number'];  
?>
                         رقم شهادة الجنسية: <?php echo $namepers2 ;?>
                    
                    </p>


                </div>

                

                <hr>
                <div class="row">
                    <div class="col-12">
                        <label for=""> الحالة  </label>
                        <br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="sh0" checked name="shahada" value="0" onclick="disableInput('shnote')">
                            <label class="form-check-label" for="">صحيح </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="shahada" id="sh1" type="radio" value="1" onclick="enableInput('shnote')">
                            <label class="form-check-label" for="" >غير صحيح</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label"> اختر ملاحظة :</label>
                            <select
                      class="form-select"
                      id="shnote"
                      aria-describedby="validationServer04Feedback"
                      name="shahadanot";
                    >
                      <option  value="">.. </option>
                      <option>...</option>
                    </select>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-6">
                <div style="text-align:center">
                <?php 
                $id1=15;
                $name1="شهادة الجنسية";
              $pdfnamepth= getpdf($id1,$name1);
        
                ?>
      
             <iframe src="../oo/assets/files/<?php echo $pdfnamepth; ?>" width="500" height="500"></iframe> 
                </div>
            </div>
        </div>

        <script>
        function toggleInput(radio) {
          var myInput = document.getElementById('shnote');
          myInput.disabled = (radio.value === '0');
        }
      </script>


















        







       















        


        