<?php
    ob_start();
    include("admin_class.php");
    
    

    if(isset($_POST['save_doctor_info'])){
        
        $username = $_POST['save_doctor_info'];
        $doctor_name = $_POST['doctor_name'];
        $pass1 = $_POST['password'];
        $pass2 = $_POST['password2'];
        $personeli = $_POST['personeli'];
        
        //echo $username . " " . $pass1 . " " . $pass2 . " " . $personeli;
        
        if($pass1 == $pass2){
            $d1 = new Doctor;
            $result = $d1->save_doctor($doctor_name, $personeli, $username, $pass1);
            if($result == 1){
                header("Location: login.php");//success...
            }else{
                if($result == 105){
                     header("Location: login.php?error=105");//account already exist...
                }else{
                    header("Location: doctor_singup_form.php?error=220");//problen in db!
                }
            }
        }else{
            header("Location: doctor_singup_form.php?error=210");//pass1 != pass2...
        }
    }
    
    
    if(isset($_POST['doctor_id_time'])){
        
        $doctor_id = $_POST['doctor_id_time'];
        $start = $_POST['start_time'];
        $end = $_POST['end_time'];
        $day = $_POST['day'];

        //echo $username . " " . $pass1 . " " . $pass2 . " " . $personeli;
        
        $d1 = new Doctor;
        $result = $d1->save_workday($doctor_id, $day, $start, $end);
        if($result == 1){
            header("Location: index.php?page=doctor_time");//success...
        }else{
            header("Location: index.php?page=doctor_time&error=210");
        }

    }
    
    

    ob_end_flush();
?>