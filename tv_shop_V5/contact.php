<?php
ob_start();
require_once "header.php";
require_once "contact_process.php";

?>
<div class="container-fluid mt-5">
<section class="section-form" >
        <?php			
			if(isset($_GET['msg']) && !empty($_GET['msg'])){
				if($_GET['msg'] == "success"){
					echo "<br><br><div class='success'>Your message has been added to our database  successfully!</div>";
				} elseif($_GET['msg'] == "error_db"){
					echo "<div class='error'>Sorry, unable to add to database. Please try again!</div>";
				}
			   }
	 	?>
            <div class="row">
            <div class="col-md-7 offset-md-2">
            <h4>We're happy to hear from you, drope us a line:</h4><br><hr><br>
            </div>
            </div>

            <div class="row">
                <form method="post" action="" id="contact" class="contact-form" >
                    <div class="row">
                        <div class="col span-1-of-3">
                            <label for="name">Name</label>
                        </div>
                        <div id="error_name" class="error"><?php if(isset($error_name))echo $error_name?></div>
                        <div class="col span-2-of-3">
                            <input type="text" name="name" id="name" value="<?php if(isset($name))echo $name; ?>"  placeholder="Your name" >
                        </div>
                    </div>

                    <div class="row">
                        <div class="col span-1-of-3">
                            <label for="email">Email</label>
                        </div>
                        <div id="error_email" class="error"><?php if(isset($error_email))echo $error_email?> </div>
                        <div class="col span-2-of-3">
                            <input type="text" name="email" id="email" value="<?php if(isset($email)) echo $email; ?>" placeholder="Your email" >
                        </div>
                    </div>

                    <div class="row">
                        <div class="col span-1-of-3">
                            <label for="find-us">How did you find us?</label>
                        </div>
                        <div id="error_find_us" class="error"><?php if(isset($error_find_us))echo $error_find_us?></div>
                        <div class="col span-2-of-3">
                            <select name="find_us" id="find_us">
                                <option value="">Select an option</option>
                                <option value="friends">Friends</option>
                                <option value="search engine">Search engine</option>
                                <option value="advertisement">Advertisement</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col span-1-of-3">
                            <label>Newsletter?</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="checkbox" name="news" id="news" value="yes" checked> Yes, please
                        </div>
                    </div>

                    <div class="row">
                        <div class="col span-1-of-3">
                            <label>Drop us a line</label>
                        </div>
                        <div id="error_message" class="error"><?php if(isset($error_message))echo $error_message?> </div>
                        <div class="col span-2-of-3">
                            <textarea name="message" placeholder="Your message" id="message"><?php if(isset($message)) echo $message; ?></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col span-1-of-3">
                            <label>&nbsp;</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="submit" name="submit" value="Send it!">
                        </div>
                    </div>
                    
                </form>

            </div>
        </section>
        
      
</div>
<?php       
require_once "footer.php";
?>