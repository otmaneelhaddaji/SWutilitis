<?php
//error_reporting(0);



$has_error = false;






if(isset($_POST['submit'])) {

    if(!empty($_POST['news'])){
        $news = $_POST['news'];
    } else {
        $news = "no";
    }
   
    
    if(empty($_POST['name'])) {
                $error_name = "Please enter your name!";
                $has_error = true;
                
                } else {
                    $name = filter_user_input($_POST['name']);
                }
                

    if(empty($_POST['email'])) {
                $error_email = "Please enter email!";
                $has_error = true;
                }
                
                else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                $error_email = "Please enter valid email!";
                $has_error = true;
                
                    } else {
                        $email = filter_user_input($_POST['email']);
                    }
    
        if(empty($_POST['find_us'])) {
            $error_find_us = "Please select how did you find us!";
            $has_error = true;
            
            } else  {
                $find_us = filter_user_input($_POST['find_us']);
            }

        
           
                    
                

    if(empty($_POST['message'])) {
            $error_message= "Please enter your message!";
            $has_error = true;
            
            } else  {
                $message = filter_user_input($_POST['message'], "message");
            }
    
 
    
	if(!$has_error){

            # Now let's try to add form info to our database.
            if(insert_into_db($name, $email, $find_us, $news, $message)){
                # When insert_into_db functions return true then only it's a success
                $msg = "success"; 
                 
            } else {
                # Problem with database
                $msg= "error_db";
            } 
          
            # Finally we use header() function to redirect user to contact page with the $msg 
            header("Location:index.php?msg=$msg");
            
    }
    
} # End of POST




# Sanitising user input

function filter_user_input($data, $type="") {

    // trim() function will remove whitespace from the beginning and end of string.
    $data = trim($data);

    # Strip HTML, XML and PHP tags from a string
    # Hello <b>world!</b> will remove <b></b>
    $data = strip_tags($data);

    # htmlspecialchars() function converts special characters to HTML entities. 
    # say: Hello <b>world!</b> becoms &lt;b&gt;Hello World &lt;/b&gt;  OR  '&' (ampersand) becomes '&amp;'
    $data = htmlspecialchars($data);

    # For our message field we will write an if else.
   if($type == "message"){
        /*
        The addslashes() function returns a string with backslashes in front of predefined characters.
        Tip: This function can be used to prepare a string for storage in a database and database queries.
        So when you type something like : Subrata's blog then it addes  backslashes in front of single quote (')

        The predefined characters are:

            single quote (')
            double quote (")
            backslash (\)
            NULL

        Another Example 
        $message = "Who's admin in this CMS?";
        echo $message . " This is not safe in a database query.<br>";
        echo addslashes($message) . " This is safe in a database query."   
        */
       $data = addslashes($data);

   } elseif($type==""){

    /*  The stripslashes() function removes backslashes added by the addslashes() function.
        Note: This function can be used to clean up data retrieved from a database or from an HTML form.*/
        $data = stripslashes($data);
        

   }
 
    return $data;

} # End of filter_user_input function



# Our custom function to insert the new record into database;
function insert_into_db($name, $email, $find_us, $news, $message)
		{
            /* The global keyword is used to access a global variable from within a function. 
			  To do this, use the global keyword before can use these global variables inside the function */
            global $conn;
         
                # We build a SQL Insert query;
				$sql=  "INSERT INTO contact(name, email, find_us, news, message)
				values ('$name','$email', '$find_us', '$news', '$message')";
                
                # mysqli_query()  function performs a query against the database
				$result = mysqli_query($conn, $sql);
                       
         
                # The mysqli_affected_rows() function returns 
                # the number of affected rows in the previous SELECT, INSERT, UPDATE, REPLACE, or DELETE query
                if(mysqli_affected_rows($conn) >0){
                     return true;
                } else {
                    return false;
                }
       
					
  
   } # End of insert_into_db function 

   function send_email($name, $email, $user_subject, $message){

    $to = "krikshchiukas.v@gmail.com";
    $subject = "User Contact info";
    $message = " You have received an email from : <br><b>"
               ." Name: "  .$name. "<br>"
               ." Email: ".$email. "<br>"
               ." Subject: " .$user_subject. "<br>"
               ." Message: ".$message. "</b><br>";
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From:krikshchiukas.v@gmail.com" . "\r\n" .
    "CC: krikshchiukas.v@gmail.com";

       if( mail($to,$subject,$message,$headers)){
           return true;
       } else {
           return false;
       }
   }


?>

