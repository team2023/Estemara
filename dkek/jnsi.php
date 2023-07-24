
<div class="row pt-2">
            <div class="col-6">
                <h2> معلومات هوية الاحوال المدنية  </h2>
                <div class="d-flex justify-content-around">
                    <p>
<?php 
$namepers2 = $rowview['first_name'] .' '.$rowview['second_name'].' '.$rowview['third_name'].' '.$rowview['fourth_name'].' '.$rowview['sure_name'];  
?>
                       الاسم و اللقب : <?php echo $namepers2 ;?>
                    
                    </p>
                    <p>
                    <?php 
$namepers3 = $rowview['mother_firstname'] .' '.$rowview['mother_secondname'].' '.$rowview['mother_thirdname'];  
?>
                     الاسم الام : <?php echo $namepers3 ;?>
                    </p>
                </div>
                <div class="d-flex justify-content-around">
                    <p>

                    <?php 
$namepers4 = $rowview['gender'] ;  
?>
 الجنس :  <?php echo $namepers4 ;?>
           
                    </p>
                    <p>
                    <?php 
$namepers5 = $rowview['brithday_date'] ;  
?>
 تاريخ الولادة  :  <?php echo $namepers5 ;?>
                    </p>
                    <p>
                    <?php 
$namepers5 = $rowview['place_birth'] ;  
?>
 محل الولادة :   <?php echo $namepers5 ;?>
                    
                        
                    </p>

                </div>
                <div class="d-flex justify-content-around ">
                    <p>
                    <?php 
$namepers6 = $rowview['nationality'] ;  
?>
 الجنسية :   <?php echo $namepers6 ;?>
                    </p>
                    <p>
                    <?php 
$namepers7 = $rowview['nationalism'] ;  
?>
 القومية :   <?php echo $namepers7 ;?>
                    </p>
                    <p>
                    <?php 
$namepers8 = $rowview['religion'] ;  
?>
 الديانة :   <?php echo $namepers8 ;?>
                    </p>

                </div>
                <div class="d-flex flex-column">
                    <p>
                    <?php 
$namepers9 = $rowview['civil_card_number'] ;  
?>
 رقم هوية الاحوال المدنية :   <?php echo $namepers9 ;?>
                    </p>

                    <p>
                    <?php 
$namepers10 = $rowview['civil_status_ID_record'] ;  
?>
 الرقم السجل :   <?php echo $namepers10 ;?>
                        <br>
                    </p>

                    <p>
                    <p>
                    <?php 
$namepers1_0 = $rowview['civil_status_ID_sheet_number'] ;  
?>
 الرقم الصحيفةcivil_status_ID_sheet_number :   <?php echo $namepers1_0 ;?>
                        <br>
                    </p>

                    <p>
                    <?php 
$namepers11 = $rowview['civil_date_card'] ;  
?>
 تاريخ اصدار الهوية :   <?php echo $namepers11 ;?>
                    </p>

                </div>

                <p>
                    
                <?php 
$namepers12 = $rowview['marital_status'] ;  
$id1=$rowview['user_id'];
?>
 الحالة الاجتماعية :   <?php echo $namepers12 ." " . $id1 ;?>

                </p>

                <hr>
                <div class="row">
                    <div class="col-12">
                        <label for=""> الحالة  </label>
                        <br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="card0"  name="jnsi" value="0" onclick="disableInput('cardnote')" checked >
                            <label class="form-check-label" for="card0">صحيح </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="jnsi" id="card1" type="radio" value="1" onclick="enableInput('cardnote')" >
                            <label class="form-check-label" for="card1" >غير صحيح</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label"> اختر ملاحظة :</label>
                            <select
                      class="form-select"
                      id="cardnote"
                      aria-describedby="validationServer04Feedback"
                      name="jnsinot"
                      
                    >
                      <option  value="">.. </option>
                      <option>...</option>
                    </select>
                        </div>
                    </div>
                    <input class="form-check-input mx-2" type="checkbox" id="" name="c4" value="1" required>
                                <label for=""> 1انتهى ....</label>
                </div>
            </div>
        <div class="col-6">
                <div style="text-align:center">
                <?php 
                $id1=15;
                $name1="هوية الاحوال الدنية";
              $pdfnamepth= getpdf($id1,$name1);
        
                ?>
      
             <iframe src="../oo/assets/files/<?php echo $pdfnamepth; ?>" width="500" height="500"></iframe> 
                </div>
            </div>
        </div>




















        







       















        


        