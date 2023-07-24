<p>
                    <?php 



$unv = $rowview['university_in'];
$colg = $rowview['college_in'];
$dep = $rowview['department_in'];




$sqlgetunv = "SELECT universities.university_name, colleges.college_name, departments.department_name
from universities INNER JOIN colleges on universities.id=colleges.university_id INNER JOIN departments
 on colleges.id=departments.collage_id where universities.id='$unv' AND colleges.id='$colg' AND departments.id='$dep'";

                           $resgetunv = mysqli_query($conn, $sqlgetunv);
                           if (mysqli_num_rows($resgetunv) === 1) {
                               $rowunv = mysqli_fetch_assoc($resgetunv);
                           }






$nameeed3 = $rowunv['university_name'] ;  
?>
   الجامعة  :   <?php echo $nameeed3 ;?>

                    </p>
                    <p>
                    <?php 
$nameeed4 = $rowunv['college_name'] ;  
?>
   الكلية  :   <?php echo $nameeed4 ;?>
                    
                    </p>
                    <p>
                    <?php 
$nameeed5 = $rowunv['department_name'] ;  
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
   سنة التخرج  :   <?php echo $nameeed6 ;?> <br>
    <input type="number" class="d-none" name="upyear" id="year" value="<?php echo $nameeed6 ;?>"   >
               
                    </p>
                    <p>
                    <input class="form-check-input mx-2" type="checkbox" id="chk2"  name="" value="" onchange="handleCheckboxChange('chk2','ave')"  >
                    <?php 
$nameeed7 = $rowview['average'] ;  
?>

   المعدل   : <?php echo $nameeed7 ;?> <br>
     <input type="number" class="d-none" name="upavg" id="ave" value="<?php echo $nameeed7 ;?>"   >

                     </p>
                     <p>
                     <input class="form-check-input mx-2" type="checkbox" id="chk3"  name="" value="" onchange="handleCheckboxChange('chk3','fave')"  >
                     <?php 
$nameeed8 = $rowview['fave'] ;  
?>
   معدل الطالب الأول  :   <?php echo $nameeed8 ;?> <br>
    <input type="number" class="d-none" name="upfavg" id="fave" value="<?php echo $nameeed8 ;?>"  >
                   
                     </p>
                