
<p>
                    <?php 
$nameeed3 = $rowview['university_out'] ;  
?>
   الجامعة  :   <?php echo $nameeed3 ;?>

                    </p>
                    <p>
                    <?php 
$nameeed4 = $rowview['college_out'] ;  
?>
   الكلية  :   <?php echo $nameeed4 ;?>
                    
                    </p>
                    <p>
                    <?php 
$nameeed5 = $rowview['department_out'] ;  
?>
   القسم   :   <?php echo $nameeed5 ;?>
                       
                    </p>

                </div>
                <div class="d-flex flex-column">
                    <p>
                    <input class="form-check-input mx-2" type="checkbox" id="chk1"  name="" value="" onchange="handleCheckboxChange('chk1','year')" >
                    <?php 
$nameeed6 = $rowview['graduation_year'] ;  
?>
   سنة التخرج  :   <?php echo $nameeed6 ;?>
   <br>
   <input type="number" name="year" id="year" value=""   >
                    </p>
                    <p>
                    <input class="form-check-input mx-2" type="checkbox" id="chk2"  name="" value="" onchange="handleCheckboxChange('chk2','ave')"  >
                    <?php 
$nameeed7 = $rowview['estimation'] ;  
?>
   المعدل   : <?php echo $nameeed7 ;?> <br>
     <input type="number" name="ave" id="ave" value=""   >
      

                     </p>
                     <p>
                     <input class="form-check-input mx-2" type="checkbox" id="chk3"  name="" value="" onchange="handleCheckboxChange('chk3','fave')"  >
                     <?php 
$nameeed8 = $rowview['country_graduation'] ;  
?>
  معدل الطالب الأول  :   <?php echo $nameeed8 ;?> <br>
    <input type="number" name="fave" id="fave" value=""  >
                     </p>
