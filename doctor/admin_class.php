<?php
/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/

class DB{
    private $host;
    private $username;
    private $password;
    private $db;
    
    function set(){
        $this->host = "localhost";
        $this->username = "seminaram_nobat123";
        $this->password = "123@no123bat@123";
        $this->db = "seminaram_nobat";
    }
    
    function connect(){
        $this->set();
        $host = $this->host;
        $username = $this->username;
        $password = $this->password;
        $db = $this->db;
        
        $conn = new mysqli($host, $username, $password, $db);
        
        if ($conn->connect_error) {
            return(0);//failed
        }else{
            return($conn);//success
        }
    }
}

class User{

    function login($username, $password){
        // Create connection
        $db = new DB;
        $conn = $db->connect();
        // Check connection
        if ($conn == 0) {
            return(101);
        }else{
            
            session_start();
            $uname = $username;
        	$pass = $password;
        	$pass = hash('sha512', $pass);
        	if (empty($uname)) {
        		return 0;
        	    exit();
        	}else if(empty($pass)){
                return 2;
        	    exit();
        	}else{
        		$sql = "SELECT username, password
                        FROM user
                        WHERE 
                        username='$uname' AND
                        password='$pass'";
                
        		$result = mysqli_query($conn, $sql);
        		if (mysqli_num_rows($result) === 1) {
        			$row = mysqli_fetch_assoc($result);
                    if ($row['phone'] === $uname && $row['password'] === $pass) {
                    	$_SESSION['username'] = $row['phone'];
                    	$_SESSION['name'] = $row['name'];
                    	$_SESSION['id'] = $row['id'];
                    	return 1;
        		        exit();
                    }else{
        				return 3;
        		        exit();
        			}
        		}else{
        			return 4;
        	        exit();
        		}
        	}
    	
        }
    }// end login...

function save_user($name, $phone, $username, $password, $sex){
        // Create connection
        $db = new DB;
        $conn = $db->connect();
        // Check connection
        if ($conn == 0) {
            return(101);
        }else{
            // Connected Successfuly!
            $douplicate = "SELECT phone FROM user WHERE phone='$phone'";
            $result = $conn->query($douplicate);
            if ($result->num_rows > 0) {
                // Douplicated Record!
                return(102);
            } else {
                $password = hash('sha512', $password);
                $save_user = "INSERT INTO user (name, phone, username, password, sex)VALUES ('$name', '$phone', '$username', '$password', '$sex')";
                if ($conn->query($save_user) === TRUE) {
                  return(1);// New record created successfully!
                } else {
                  return(103);// Probmel in isertion!
                }
            }

        }
    }//end save_user...

    
    function see_user(){
        // Create connection
        $db = new DB;
        $conn = $db->connect();
        // Check connection
        if ($conn == 0) {
            return(101);
        }else{
            // Connected Successfuly!
            $resault = array();
            
            $user = "SELECT id, name, phone, sex type FROM user";
            $result = $conn->query($user);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $curr = array();
                    
                    $id = $row['id'];
                    $name = $row['name'];
                    $phone = $row['phone'];
                    $sex = $row['sex'];
                    
                    array_push($curr, $id);
                    array_push($curr, $name);
                    array_push($curr, $phone);
                    array_push($curr, $sex);
                    
                    array_push($resault, $curr);
                }
                
                return($resault);
            } else {
                return("No data!");
            }

        }
    }//end see_user...
    
}

class Doctor{
    
    function save_doctor($name, $personeli, $username, $password){
        // Create connection
        $db = new DB;
        $conn = $db->connect();
        // Check connection
        if ($conn == 0) {
            return(104);
        }else{
            // Connected Successfuly!
            $douplicate = "SELECT personeli FROM doctor WHERE personeli='$personeli'";
            $result = $conn->query($douplicate);
            if ($result->num_rows > 0) {
                // Douplicated Record!
                return(105);
            } else {
                $password = hash('sha512', $password);
                $save_doctor = "INSERT INTO doctor (name, personeli, username, password)VALUES ('$name', '$personeli', '$username', '$password')";
                if ($conn->query($save_doctor) === TRUE) {
                  return(1);// New record created successfully!
                } else {
                    echo "Error: " . $save_doctor . "<br>" . $conn->error;
                  //return(106);// Probmel in isertion!
                }
            }

        }
    }
    function save_workday($doctor_id, $day, $start, $end){
        // Create connection
        $db = new DB;
        $conn = $db->connect();
        // Check connection
        if ($conn == 0) {
            return(120);
        }else{
            // Connected Successfuly!
            $douplicate = "SELECT day FROM doctor WHERE doctor_id='$doctor_id'";
            $result = $conn->query($douplicate);
            if ($result->num_rows > 0) {
                // Douplicated Record!
                return(121);
            } else {
                $save_workday = "INSERT INTO work_day (doctor_id, day, start, end)VALUES ($doctor_id, $day, '$start', '$end')";
                if ($conn->query($save_workday) === TRUE) {
                  return(1);// New record created successfully!
                } else {
                  return(122);// Probmel in isertion!
                }
            }

        }
    }
        
    function see_doctor(){
        // Create connection
        $db = new DB;
        $conn = $db->connect();
        // Check connection
        if ($conn == 0) {
            return(101);
        }else{
            // Connected Successfuly!
            $resault = array();
            
            $doctor = "SELECT id, name, personeli FROM doctor";
            $result = $conn->query($doctor);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $curr = array();
                    
                    $id = $row['id'];
                    $name = $row['name'];
                    $personeli = $row['personeli'];
                   
                    array_push($curr, $id);
                    array_push($curr, $name);
                    array_push($curr, $personeli);

                    array_push($resault, $curr);
                }
                
                return($resault);
            } else {
                return("No data!");
            }

        }
    }
    
    
    function see_time(){
         // Create connection
        $db = new DB;
        $conn = $db->connect();
        // Check connection
        if ($conn == 0) {
            return(101);
        }else{
            // Connected Successfuly!
            $resault = array();
            
            $doctor = "SELECT * FROM work_day";
            $result = $conn->query($doctor);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $curr = array();
                    
                    $id = $row['id'];
                    $doctor_id = $row['doctor_id'];
                    $day = $row['day'];
                    $start = $row['start'];
                    $end = $row['end'];
                   
                    array_push($curr, $id);
                    array_push($curr, $doctor_id);
                    array_push($curr, $day);
                    array_push($curr, $start);
                    array_push($curr, $end);

                    array_push($resault, $curr);
                }
                
                return($resault);
            } else {
                return("No data!");
            }

        }
    }
    
    function see_time_by_doctor($ID){
         // Create connection
        $db = new DB;
        $conn = $db->connect();
        // Check connection
        if ($conn == 0) {
            return(101);
        }else{
            // Connected Successfuly!
            $resault = array();
            
            $doctor = "SELECT * FROM work_day WHERE doctor_id=$ID";
            $result = $conn->query($doctor);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $curr = array();
                    
                    $id = $row['id'];
                    $doctor_id = $row['doctor_id'];
                    $day = $row['day'];
                    $start = $row['start'];
                    $end = $row['end'];
                   
                    array_push($curr, $id);
                    array_push($curr, $doctor_id);
                    array_push($curr, $day);
                    array_push($curr, $start);
                    array_push($curr, $end);

                    array_push($resault, $curr);
                }
                
                return($resault);
            } else {
                return("No data!");
            }

        }
    }
    
    function see_time_by_day($ID){
         // Create connection
        $db = new DB;
        $conn = $db->connect();
        // Check connection
        if ($conn == 0) {
            return(101);
        }else{
            // Connected Successfuly!
            $resault = array();
            
            $doctor = "SELECT * FROM work_day WHERE day=$ID";
            $result = $conn->query($doctor);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $curr = array();
                    
                    $id = $row['id'];
                    $doctor_id = $row['doctor_id'];
                    $day = $row['day'];
                    $start = $row['start'];
                    $end = $row['end'];
                   
                    array_push($curr, $id);
                    array_push($curr, $doctor_id);
                    array_push($curr, $day);
                    array_push($curr, $start);
                    array_push($curr, $end);

                    array_push($resault, $curr);
                }
                
                return($resault);
            } else {
                return("No data!");
            }

        }
    }
    
    function see_time_by_doctor_day($doctorID, $dayID){
         // Create connection
        $db = new DB;
        $conn = $db->connect();
        // Check connection
        if ($conn == 0) {
            return(101);
        }else{
            // Connected Successfuly!
            $resault = array();
            
            $doctor = "SELECT * FROM work_day WHERE doctor_id=$doctorID AND day=$dayID";
            $result = $conn->query($doctor);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $curr = array();
                    
                    $id = $row['id'];
                    $doctor_id = $row['doctor_id'];
                    $day = $row['day'];
                    $start = $row['start'];
                    $end = $row['end'];
                   
                    array_push($curr, $id);
                    array_push($curr, $doctor_id);
                    array_push($curr, $day);
                    array_push($curr, $start);
                    array_push($curr, $end);
                    
                    array_push($resault, $curr);
                }
                
                return($resault);
            } else {
                return("No data!");
            }

        }
    }
    
    
     function upload_image($filename, $doctor_id, $size, $file){
        // Create connection
        $db = new DB;
        $conn = $db->connect();
        // Check connection
        if ($conn == 0) {
            return(101);
        }else{
            $sql = "SELECT * FROM files";
            $result = mysqli_query($conn, $sql);
            //$files = mysqli_fetch_all($result, MYSQLI_ASSOC);
            
            $destination = 'img/' . $filename;
            
            // get the file extension
            $extension = pathinfo($filename, PATHINFO_EXTENSION);
            
            
            if (!in_array($extension, ['jpeg', 'png', 'jpg'])) {
                return 3;
            } elseif ($_FILES['myfile']['size'] > 9000000) { // file shouldn't be larger than 9Megabyte
                return 4;
            } else {
                
                $imageQuality = 10;
                // move the uploaded (temporary) file to the specified destination
                if (move_uploaded_file($file, $destination)) {
                    //compressImage($destination, $destination, $imageQuality);
                        $sql3 = "INSERT INTO bill (name, doctor_id, size, downloads) VALUES ('$filename', '$doctor_id', $size', 0)";
                        if (mysqli_query($conn, $sql3)) {
                            return 1;
                        }else{
                            echo "Error: " . $sql3 . "<br>" . $conn->error;
                            //return 5;
                        }
                    
                } else {
                   return 2;
                }
            }
        }
    }// end upload_bill...
    
    
    
}


class Reserve{
    
    function checkDateOverlap($startdate1, $enddate1, $startdate2, $enddate2) {
        // Convert the date strings to DateTime objects
        $start1 = new DateTime($startdate1);
        $end1 = new DateTime($enddate1);
        $start2 = new DateTime($startdate2);
        $end2 = new DateTime($enddate2);
    
        // Check if the date ranges overlap
        if ($start1 <= $end2 && $end1 >= $start2) {
            return true; // Overlapping dates
        } else {
            return false; // Non-overlapping dates
        }
    }
    
    
   function save_reserve($user_id, $doctor_id, $start, $end){
        // Create connection
        $db = new DB;
        $conn = $db->connect();
        // Check connection
        if ($conn == 0) {
            return(104);
        }else{
            // Connected Successfuly!
            
            $confirm = 1;
            $times = "SELECT start, end FROM doctor_timetable WHERE doctor_id=$doctor_id";
            $result = $conn->query($times);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $curr_s = $row['start'];
                    $curr_e = $row['end'];
                    if($this->checkDateOverlap($start, $end, $curr_s, $curr_e)){
                        $confirm = 0;
                    }
                }
            }
            if($confirm == 0){
                return(107);//overlap
            }else{
                
                
                
                $dateString = persianToEnglish($start);
                $dateFormat = "Y/m/d H:i";
                $parsedDate = date_parse_from_format($dateFormat, $dateString);
                
                $year_s = $parsedDate['year'];
                $month_s = $parsedDate['month'];
                $day_s = $parsedDate['day'];
                
                
                $dateString = persianToEnglish($end);
                $dateFormat = "Y/m/d H:i";
                $parsedDate = date_parse_from_format($dateFormat, $dateString);
                
                $year_e = $parsedDate['year'];
                $month_e = $parsedDate['month'];
                $day_e = $parsedDate['day'];
                
                
                $save_timetable = "INSERT INTO doctor_timetable(`doctor_id`, `start`, `end`, `year_s`, `month_s`, `day_s`, `year_e`, `month_e`, `day_e`)VALUES
                ($doctor_id, '$start', '$end', $year_s, $month_s, $day_s, $year_e, $month_e, $day_e)";
                if ($conn->query($save_timetable) === TRUE) {
                    $lastInsertedId = mysqli_insert_id($conn);
                    $save_reserve = "INSERT INTO reserve(user_id, timetable_id)VALUES($user_id, $lastInsertedId)";
                    if ($conn->query($save_reserve) === TRUE) {
                        return(1);// New record created successfully!
                    }else{
                        return(106);// Probmel in isertion!
                    }
                } else {
                  //echo "Error: " . $save_doctor . "<br>" . $conn->error;
                  return(106);// Probmel in isertion!
                }
            
            
            }//end overlap check...
        }//end conect check...
            
    } 
}