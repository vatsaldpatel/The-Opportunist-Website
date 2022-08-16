<?php
  // echo "hello";
  $server="localhost";

$username = "root";
$password = "";

$con = mysqli_connect($server,$username,$password,"temp1");

if (!$con){
  die("connection failed ".mysqli_connect_error());
}




// INSERT INTO `log_in` (`Id`, `Name`, `Email`, `Password`, `City`, `Preferred_Job`, `Skills`) VALUES ('1', 'Umang Mehta', 'umang.mce18@sot.pdpu.ac.in', 'Umang20', 'Surat', 'Software Engineer', 'C++;Java;');

$name = $_POST['name'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$cnf_pass = $_POST['cnf_pass'];
$pre_j = strtolower($_POST['pre_j']);
$city = $_POST['city'];
$temp1 = strtolower($_POST['temp1']);
// $skills = $_POST['skills'];
// print_r ($_POST);
$ciphering = "AES-128-CTR"; 
$iv_length = openssl_cipher_iv_length($ciphering); 
$options = 0;
$encryption_iv = '1234567891011121';
$encryption_key = "abcde";
$encryption = openssl_encrypt($pass, $ciphering, 
            $encryption_key, $options, $encryption_iv);


$q = "SELECT * FROM log_in WHERE Email = '$email' AND  Password = '$pass'";
$cnt = mysqli_query($con, $q);
$tot = mysqli_num_rows($cnt);
if ($tot != 0)
{
    header("Location: http://localhost/kp/sign_up.html"); 
    exit;
}

$sql = "INSERT INTO `temp1`.`log_in` (`Name`, `Email`, `Password`, `City`, `Preferred_Job`, `Skills`) VALUES ('$name', '$email', '$encryption', '$city', '$pre_j', '$temp1');";
if($con ->query($sql) == true){
  // echo "Successful";
    $username1 = "root";
    $server1 = "localhost";
    $password1= "";
    $db1 = "temp1";

    $mysqli1 = new mysqli($server1, $username1,$password1,$db1);
    if ($mysqli1->connect_error) { 
        die('Connect Error (' .  
        $mysqli1->connect_errno . ') '.  
        $mysqli1->connect_error); 
    } 
    
    $skill1 = "";
    $i=0;
    $j=0;
    $len_skill = strlen($temp1);
    $skill1 .= "%" . str_replace(";","%",$temp1) . "%";
    // echo $skill1;
    $job1 = "%". str_replace(" ","%",$pre_j) ."%";

    $sql = "SELECT * FROM company where City= '$city' OR Key_Points like '$job1' OR Skills like '$skill1'"; 
    $result = $mysqli1->query($sql); 
    $mysqli1->close();
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
                <!-- <tr>
                    <td>Saavan</td>
                    <td>Software Engineer needs to have a strong understanding of algorithms, data structures and basic information retrieval concepts with a good experience as back-end or search engineer.</td> 
                    <td>Strong understanding of algorithms, data structures and basic information retrieval concepts;At least 2 year of experience as back-end or search engineer.</td>
                    <td>Work in JioSaavn Search team on problems of search relevance/ranking, search personalization, spell correction, entity recognition;
                        Build real time and batch pipelines for feature extraction for various ML models used in search relevance;
                        Build NLP models for query classification and entity recognition to improve relevance;
                        Scale the search infrastructure for speed and performance;
                        performance of different systems.</td>
                    <td>Private</td>
                    <td>Sector</td>  -->
                    <!-- <td>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Adipisci suscipit sunt ducimus, harum reprehenderit nisi maxime cumque quas modi tenetur reiciendis tempore facilis provident ut inventore neque id animi sequi corrupti magnam dolor vel quo! Eveniet eligendi qui provident, vel architecto, quae excepturi magnam repellat quidem culpa illo. Mollitia commodi atque autem? Rem, saepe dolorum hic ut error molestias fugit at facere excepturi odio iste ipsam perspiciatis praesentium beatae aut corporis. Animi, facere. Quae deserunt tempora veritatis, aut sequi tempore ullam? Dolores non nulla incidunt eligendi quasi, facilis obcaecati quam voluptates harum. Aliquid voluptatibus praesentium dicta. Neque maxime iste eaque!</td> -->
                    <!-- <td>Click Here</td> -->
                
                <!-- </tr> -->
               
                <!-- <tr>
                    <th>Company</th>
                    <th>Description</th>
                </tr>
                <tr>
                    <td>Saavan</td>
                    <td>
                        <table id="t">
                            <tr>
                                <td>Saavan</td>
                            </tr>
                            <tr>
                                <td>Software Engineer needs to have a strong understanding of algorithms, data structures and basic information retrieval concepts with a good experience as back-end or search engineer.</td> 
                            </tr>
                            <tr>
                                <td>Strong understanding of algorithms, data structures and basic information retrieval concepts;At least 2 year of experience as back-end or search engineer.</td>
                            </tr>
                            
                        </table>
                    </td>
                </tr> -->
            </table>
        </div>
    
        <script src="job_home.js"></script> 
</body>
</html>
