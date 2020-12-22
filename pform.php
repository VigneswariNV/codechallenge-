<?php

$error = '';
$CompanyName = '';
$ContactName = '';
$Companyaddress = '';
$Product = '';
$Email = '';


function clean_text($string)
{
 $string = trim($string);
 $string = stripslashes($string);
 $string = htmlspecialchars($string);
 return $string;
}

if(isset($_POST["submit"]))
{
 
  $CompanyName = clean_text($_POST["CompanyName"]);
  $ContactName = clean_text($_POST["ContactName"]);
  $Companyaddress = clean_text($_POST["Companyaddress"]);
  $Product = clean_text($_POST["Product"]);
  $Email = clean_text($_POST["Email"]);
 


 if($error == '')
 {
  $file_open = fopen("dataa.csv", "a");
  $no_rows = count(file("dataa.csv"));

  if($no_rows > 1)
  {
   $no_rows = ($no_rows - 1) + 1;
  }
  $form_data = array(

   'CompanyName'  => $CompanyName,
   'ContactName'  => $ContactName,
   'Companyaddress'  => $Companyaddress,
   'Product'  => $Product,
   'Email' => $Email,
    );
  fputcsv($file_open, $form_data);
  $CompanyName = '';
  $ContactName = '';
  $Companyaddress = '';
  $Product = '';
  $Email = '';
  

 }

 
if(isset($_POST['submit'])){
    
    $to = $_POST['Email']; 
    $subject = "Form submission";
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    $message= '<html>
    <body>
    <label>link</label>
    <input type=submit value=Submit onclick="window.open(plogin.html, _self);"> 
    </body>
    </html>';

    
   
   
    mail($to,$subject,$message,$headers); 
   
    }

}

?>

<!DOCTYPE html>
<html>
 <head> 
 <meta charset="UTF-8">
  <title>Company Details</title>
  <style>

  Body {  
  font-family: Calibri, Helvetica, sans-serif;  
  background-color: white;  
    }  

input[type=number],input[type=text],input[type=email] {   
        
        
        display: inline;   
        border: 2px solid black;   
        
    } 

        .company{   
            width: 400px;
  border: 5px solid black;
  padding: 50px;
  margin: auto;
  text-align: center;
  font-weight: bold;
  font-style: normal;
  height:auto;
box-sizing: content-box; 
color: white; 
       
        } 

 </style> 
 </head>
 <body background="gal.jpg">
    <form method="post" >

     <?php echo $error; ?>
     <div class="company">
     <label>Company Name</label><br>
      <input type="text" name="CompanyName" size="40" value="<?php echo $CompanyName; ?>" /><br>
    
    <label>Contact Name</label><br>
      <input type="text" name="ContactName" size="40"  value="<?php echo $ContactName; ?>" /><br>
    
     <label>Email</label><br>
     <input type="text" name="Email" size="40" value="<?php echo $Email; ?>" /><br>

     <label>Company Address</label><br>
      <input type="text" name="Companyaddress" size="40"  value="<?php echo $Companyaddress; ?>" /><br>
   
     <label>Products required</label><br>
      <input type="radio" name="Product"  value="car">Car
      <input type="radio" name="Product"  value="Bike">Bike
      <input type="radio" name="Product"  value="PA">PA
      <input type="radio" name="Product"  value="Travel">Travel
      <input type="radio" name="Product"  value="Health">Health
     <br><br>
     
     
      <input type="submit" name="submit" class="btn btn-info" value="Submit" /><br>
    
   
   </div>
 
 </body>
</html>

