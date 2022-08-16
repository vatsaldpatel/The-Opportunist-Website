


<!-- // session_start();
// $_SESSION['status'] = "hi";
// $status = false;
// $con = mysqli_connect("localhost", "root", "", "the_opportunist");
// error_reporting(0);
// // mysqli_select_db($con,"the_opportunist") or die("Couldn't select database.");

// $username = $_POST['email'];
// $password = $_POST['pass'];

// $q1 = "UPDATE log_in SET Status = 1 WHERE Email = '$username' and Password = '$password'";

// $q = "SELECT * FROM log_in WHERE Email = '$username' AND  Password = '$password'";
// $count = mysqli_query($con, $q);
// $total = mysqli_num_rows($count);
// if ($total != 0)
// {
//     if (mysqli_query($con, $q1)){
//     header("Location: http://localhost/kp/.php");
//     // echo "<a href='find_si.php'></a>"; 
//     exit;
//     }
// }
// else{
//     echo "<h2>No User Exist.</h2>";
// } -->

<?php
    $eml = $_POST['email'];
    $pass = $_POST['pass'];
    // echo $n;
    // echo $c;
    // foreach ($_POST as $key => $value)
    // {
    //     echo $value;
    // }
    $username = "root";
    $server = "localhost";
    $password= "";
    $db = "temp1";

    $mysqli = new mysqli($server, $username,$password,$db);
    if ($mysqli->connect_error) { 
        die('Connect Error (' .  
        $mysqli->connect_errno . ') '.  
        $mysqli->connect_error); 
    } 
    // $sql1 = "SELECT Role FROM company where City= '$c' "; 
    // $result1 = $mysqli->query($sql1);
    // $str = "";
    // while ($r=$result1->fetch_assoc())
    // {
        // $str .= $r['Role'];
    // }
    // $a = str_replace(";",".",$str);
    // $split/_role = preg_split('/(?<=[.?!])\s+(?=[a-z])/i',$a);
    // echo $split_role[1];
    //SELECT CHARINDEX('$job','Key Points') AS MatchPosition;
    $ciphering = "AES-128-CTR"; 
    $iv_length = openssl_cipher_iv_length($ciphering); 
    $options = 0;
    $encryption_iv = '1234567891011121';
    $encryption_key = "abcde";
    $encryption = openssl_encrypt($pass, $ciphering, 
                $encryption_key, $options, $encryption_iv);

    $q2 = "SELECT * FROM log_in WHERE Email = '$eml' and Password = '$encryption'";
    $result2 = $mysqli->query($q2);
    $cnt = mysqli_num_rows($result2);
    if ($cnt != 0){
        // echo "Success";
        // $job1 = "%".$job."%";
        while($rows1=$result2->fetch_assoc()) 
        { 
            $ct = $rows1['City'];
            $pj = strtolower($rows1['Preferred_Job']);
            $sk = strtolower($rows1['Skills']);
            // echo $ct;
        
        
        }
        $a= "%".str_replace(";","%",$sk)."%";
        $pj1 = "%".str_replace(" ","%",$pj)."%";
        $sql =  "SELECT * FROM company where City= '$ct' OR Key_Points like '$pj1' OR Skills like '$a'" ; 
        $result = $mysqli->query($sql); 
        $mysqli->close();
    }
    else{
        // echo "<script>alert('Password Doesn't Match or Account Doesn't Exist')</script>";
        header("Location: http://localhost/kp/sign_up.html");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@300&display=swap" rel="stylesheet">
    <link rel="icon" href="Image_Icons/favicon.ico">

    <title>Find Job</title>
    <link rel="stylesheet" href="job.css">
    <script>
    function click(){
        var y = document.querySelector(".search")
    }    
    </script>
</head>
<body>

    <div class="header">
		<div class="logo_title">
			<a href="home.html"><img src="Image_Icons/white_icon.png"></a><h3>THE OPPORTUNIST</h3>
		</div>
		<div class="navbar">
			<ul>
				<li class="navitem">
					<a href="home.html">HOME</a>
				</li>
				<li class="navitem">
					<a href="home.html#findbar">FIND A JOB</a>
				</li>
				<li class="navitem">
					<a href="post_job.html">POST A JOB</a>
				</li>
				<li class="navitem">
					<a href="home.html#abt">ABOUT US</a>
				</li>
			</ul>
		</div>
		<div class="login">
			<a href="sign_up.html">SIGN UP</a>
			<a href="sign_in.html">SIGN IN</a>
		</div>
        <!-- <div class="searchbar">
            
            <form method="post" class="searchbar_2">
                
            <input type="text" style="font-size: 15px;" id="job_ip" value="<>"> -->
            <!-- <label for="city">Select City</label> -->
            <!-- <select name="selectedCity" id="city" class="classic_1">
            <option value="
        
        </option>
            <option value="sc">Select City</option>
 			<option value="Mumbai">Mumbai</option>
			<option value="Bangalore">Bengaluru</option>
			<option value="Ahmedabad">Ahmedabad</option>
			<option value="Surat">Surat</option>
			<option value="Pune">Pune</option>
			<option value="Hydrabad">Hydrabad</option>
			<option value="Noida">Noida</option>
			<option value="Jaipur">Jaipur</option>
			<option value="Cochin">Cochin</option>
            </select> -->
            <!-- <button type="button" class="searchbtn" onclick="job()">Find</button> -->
            <!-- <input type="text" id="t1" value="" style="display:none;">
            <input type="text" id="t2" value=" style="display:none;">
            <input type="submit" value="Find" class="searchbtn" >
            //o $job; ?> 
            //php echo $c; ?>
        </form>
        </div> -->
        <div class="table" style="background-color:#456268;color:white;">
            <table>
                <tr>
                    <th>Company</th>
                    <th>Role</th>
                    <th>Requirement</th>
                    <th>Responsibility</th>
                    <th>Type</th>
                    <th>Sector</th>
                    <!-- <th>About Us</th> -->
                    <th>Apply</th>
                    
                </tr>
                <?php   // LOOP TILL END OF DATA  
                while($rows=$result->fetch_assoc()) 
                { 
             ?> 
            <tr> 
                <!--FETCHING DATA FROM EACH  
                    ROW OF EVERY COLUMN--> 
                <td><?php echo $rows['Company_name'];?></td> 
                <td><?php echo $rows['Role'];?></td> 
                <td><?php echo $rows['Requirement'];?></td> 
                <td><?php echo $rows['Responsibility'];?></td>
                <td><?php echo $rows['Type'];?></td>
                <td><?php echo $rows['Sector'];?></td>
                <td><?php echo $rows['Website'];?></td> 
            </tr> 
            <?php 
                } 
             ?> 
            </table>
        </div>
    
        <script src="job_home.js"></script> 
</body>
</html>
