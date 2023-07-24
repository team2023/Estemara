<!-- Code by Brave Coder - https://youtube.com/BraveCoder -->

<?php
         
     include 'config.php';
    if (isset($_POST['login'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, md5($_POST['password']));

        $sql = "SELECT * FROM tempories WHERE email='{$email}' AND password ='{$password}'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);

            $sqlget="SELECT * FROM users WHERE email='{$email}'";
            $resultget = mysqli_query($conn, $sqlget);
             if(mysqli_num_rows($resultget) === 1)
             
             {
              $rowget = mysqli_fetch_assoc($resultget);
              $id=$rowget['id'];
              $_SESSION['iduser'] = $id;

              $sqlgetglag="SELECT * from flag_forms where user_id='$id'";
              $resgetflag=mysqli_query($conn, $sqlgetglag);
              if(mysqli_num_rows($resgetflag) ===0)
                {
              
            $sqlflaginsert="INSERT into flag_forms VALUES ('','$id','','','','','','','',now(),now(),'')";
            $resflag=mysqli_query($conn, $sqlflaginsert);
            if($resflag)
            {
          
            }
                  $sqlfilechek="SELECT * from users where email='{$email}'";
                  $resfilechek=mysqli_query($conn,$sqlfilechek);
                  if(mysqli_num_rows($resfilechek) ===1)
                  {
                    $rowfile= mysqli_fetch_assoc($resfilechek);
                    if($rowfile['national_card_flag']=="1")
                    {
                      $sqldocinsert ="INSERT into deco VALUES ('','$id','بطافة السكن',0,'',now(),now())";
                      $resdoc=mysqli_query($conn, $sqldocinsert);
                      if($resdoc)
                      {
                        $sqldocinsert2="INSERT into deco VALUES ('','$id','الصورة',0,'',now(),now())";
                        $resdoc2=mysqli_query($conn, $sqldocinsert2);
                        if($resdoc2)
                        {
                          $sqldocinsert3="INSERT into deco VALUES ('','$id','وثيقة التخرج',0,'',now(),now())";
                        $resdoc3=mysqli_query($conn, $sqldocinsert3);
                        if($resdoc3)
                        {
                          $sqldocinsert4="INSERT into deco VALUES ('','$id','البطاقة الوطنية',0,'',now(),now())";
                          $resdoc4=mysqli_query($conn, $sqldocinsert4);
                          if($resdoc4)
                          {

                          }

                        }
                      }
          
          
                    }

                    }
                    else if($rowfile['national_card_flag']=="2")
                      {
                        $sqldocinsert ="INSERT into deco VALUES ('','$id','بطافة السكن',0,'',now(),now())";
                        $resdoc=mysqli_query($conn, $sqldocinsert);
                        if($resdoc)
                        {
                          $sqldocinsert2="INSERT into deco VALUES ('','$id','الصورة',0,'',now(),now())";
                          $resdoc2=mysqli_query($conn, $sqldocinsert2);
                          if($resdoc2)
                          {
                            $sqldocinsert3="INSERT into deco VALUES ('','$id','وثيقة التخرج',0,'',now(),now())";
                          $resdoc3=mysqli_query($conn, $sqldocinsert3);
                          if($resdoc3)
                          {
                            $sqldocinsert4="INSERT into deco VALUES ('','$id','هوية الاحوال الدنية',0,'',now(),now())";
                            $resdoc4=mysqli_query($conn, $sqldocinsert4);
                            if($resdoc4)
                            {
                              $sqldocinsert5="INSERT into deco VALUES ('','$id','شهادة الجنسية',0,'',now(),now())";
                            $resdoc5=mysqli_query($conn, $sqldocinsert5);
                            if($resdoc5)
                            {
                              
                            }
                            }
  
                          }
                        }
            
            
                      }

                      }







                  }

          

          }
             }
             

           
            if (empty($row['emai_validation_code'])) {
                $sql77 = "SELECT * FROM personal_information WHERE email='{$email}'";
                $result77 = mysqli_query($conn, $sql77);
                if(mysqli_num_rows($result77) ===0)
                {
               $fname=$row['firstname'];
                $sname=$row['secondname'];
                $thname=$row['secondname'];
                $fourthname=$row['fourthname'];
                $national_card_flag=$row['national_card_flag'];
                $nationality_card_number=$row['nationality_card_number'];
                $number_jensi=$row['num_jensai'];
                $phone=$row['phone_number'];
                $iraqi="العراقية";
                $sql2 = "INSERT INTO personal_information  VALUES ('', '$id','$email', '$fname', '$sname', '$thname','$fourthname',
                '','','','', '$phone','$iraqi','','','','','','$national_card_flag', '$nationality_card_number',
                '','','','$number_jensi','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','',now(),now(),'')";
                $result2 = mysqli_query($conn, $sql2);
            
                if ($result2) {
                $_SESSION['SESSION_EMAIL'] = $email;
                 $_SESSION['iduser'] = $id;
                echo 'okkkk1' .$email .$id;
                echo '<script language="javascript" type="text/javascript"> 
   
    window.location = "mainpage.php";
</script>';
               // header("Location: mainpage.php");
            }
         }
         else
         {
         
           if($rowget['done0']=="0")
           {
           $_SESSION['SESSION_EMAIL'] = $email;
             echo 'done0' .$email;
             
           
            echo '<script language="javascript" type="text/javascript"> 
   
    window.location = "mainpage.php";
</script>';
                // header("Location: mainpage.php");
           }
           else
           {
             $_SESSION['SESSION_EMAIL'] = $email;
             $_SESSION['iduser'] = $id;
                echo 'okkkk2' . $_SESSION['SESSION_EMAIL'] .$_SESSION['iduser'];
              
            echo '<script language="javascript" type="text/javascript"> 
  
    window.location = "finel.php";
</script>';
               // header("Location: finel.php");
           }







          
         }
         } else {
                $msg = "<div class='alert alert-info'>يجب تفعيل الحساب اولا عن طريق رابط في البريد الالكتروني</div>";
            }
        
        
      }
         else {
            $msg = "<div class='alert alert-danger'>الايميل او الباسورد غير صحيح</div>";
        }
    }

?>