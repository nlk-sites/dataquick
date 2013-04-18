<html>
<head>
<title>AJAX Captcha Test Fun</title>
</head>
  <body>
    <form action="ajax.recaptcha.php" method="post">
<?php

require_once('recaptchalib.php');

// Get a key from https://www.google.com/recaptcha/admin/create
$publickey = "6LdujtMSAAAAANfLK4ZdJnuqauTa3iOIEE66ZID4";
$privatekey = "6LdujtMSAAAAANLMLCxYlwJ7RLl02V_Ajunaj4nF ";

# the response from reCAPTCHA
$resp = null;
# the error code from reCAPTCHA, if any
$error = null;

# was there a reCAPTCHA response?
if ($_POST["recaptcha_response_field"]) {
        $resp = recaptcha_check_answer ($privatekey,
                                        $_SERVER["REMOTE_ADDR"],
                                        $_POST["recaptcha_challenge_field"],
                                        $_POST["recaptcha_response_field"]);

        if ($resp->is_valid) {
                echo "You got it!";
        } else {
                # set the error code so that we can display it
                $error = $resp->error;
        }
}
echo recaptcha_get_html($publickey, $error);
?>
    <br/>
    <input type="submit" value="submit" />
    </form>
    
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script type="text/javascript">
	function dqValidateCaptcha() {
		challengeField = jQuery("input#recaptcha_challenge_field").val();
		responseField = jQuery("input#recaptcha_response_field").val();
		//alert(challengeField);
		//alert(responseField);
		//return false;
		jQuery.post("ajax.recaptcha.php",{recaptcha_challenge_field: challengeField , recaptcha_response_field: responseField},function(data) {
				console.log(data.toSource());
			if ( data == 'success!' ) {
				alert('CORRECT!!1!');
				return false;
			} else {
				alert('Captcha appears to be incorrect...');
				return false;
			}
		});
		return false;
	}
	jQuery(function(jQuery) {
		$('form').bind('submit',dqValidateCaptcha);
	});
	</script>
  </body>
</html>
