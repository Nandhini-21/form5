<?php



$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$email_id=$_POST['email_id'];
$contact_no=$_POST['contact_no'];


$username="root";
$password="";
$server='localhost';
$db='register';



$con= mysqli_connect($server,$username,$password,$db);
$query="SELECT * FROM form";
$result=mysqli_query($con,$query);
$rows = mysqli_num_rows($result);


if($con->connect_error){
    die('Connection Failed:'.$con->connect_error);
} else{
    $stmt=$con->prepare("INSERT INTO form(first_name,last_name,email_id,contact_no) VALUES (?,?,?,?)");
    $stmt->bind_param("sssi",$first_name,$last_name,$email_id,$contact_no);
    $stmt->execute();
   $stmt->close();
 $con->close();

}  
//header('location:index.html'); 

?>
<html>
    <head>
        <title>
            Registered Members
        </title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body >
    <div class="main">
        
    <table align="center" border="3px" style="width:1000px;line-height:40px;">
            <tr><h1>Registered Members</h1></tr>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email ID</th>
                <th>Contact No</th>
            </tr>
            <?php 
                while($res=mysqli_fetch_array($result))
                {
                    
                      ?>
                        
                        <tr>
                        <td><?php   echo $res['first_name'];?></td>
                        <td><?php   echo$res['last_name'];?></td>
                        <td><?php   echo$res['email_id'];?></td>
                        <td><?php   echo$res['contact_no'];?></td>
                        
                      </tr>
             <?php         
                  }
                  
                  ?>
               
        </table>
        <br>
        <br>
        <input type="submit" id="submit"type="submit"  onsubmit="myFunction();" onclick="myFunction();" value="Home"class="btn"></input>
</div>
<script>
    function myFunction(){
        window.location.href="index.html";
    }
</script>

    </body>
</html>
