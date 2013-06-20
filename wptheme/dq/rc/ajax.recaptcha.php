<?php

require_once('recaptchalib.php');

// Get a key from https://www.google.com/recaptcha/admin/create
switch($_SERVER['SERVER_NAME']) {
	case 'dataquick.ninthlink.me':
		$publickey = "6Lf7R94SAAAAAA2nldFqOsMBhEamxUQ-zf_M1MIS";
		$privatekey = "6Lf7R94SAAAAAIFXqcDB6rEE-fx82pLJcekCSyUQ";
		break;
	default:
		$publickey = "6Ld0jtMSAAAAAKeGm9kE7WtPpvTp-ln2IshUniE8";
		$privatekey = "6Ld0jtMSAAAAAOlaR_Q-qNRV2mLwr5R8fIcp6aGV";
		break;
}

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
                echo "success!";
        } else {
                # set the error code so that we can display it
                die($resp->error);
        }
}
?>
