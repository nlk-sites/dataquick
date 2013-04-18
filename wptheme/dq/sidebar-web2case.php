<?php
/**
 * @package DQ
 * @subpackage DQ
 * @since DQ 1.0
 */
global $post;
if( is_page_template('dqdirect.php') ) {
	$width = 270;
	$fsize = 40;
} else {
	$width = 312;
	$fsize = 18;
}
$campaignID = get_post_meta($post->ID, 'campaign_name', true);
$extraField = get_post_meta($post->ID, 'extraField', true);

$submit = get_post_meta($post->ID, 'submit_btn', true);
if($submit == '' ) $submit = 'GET ACCESS';
//<form action="https://www.salesforce.com/servlet/servlet.WebToCase?encoding=UTF-8" method="POST" class="chk">
?>
<form action="<?php echo is_page_template('dqdirect.php') ? 'https://www.salesforce.com/servlet/servlet.WebToCase?encoding=UTF-8' : get_permalink($post->ID) .'?dq_action=dqemail'; ?>" method="POST" class="chk webtocase">
<input type="hidden" name="orgid" value="00D500000006jOn" />
<input type="hidden" name="retURL" value="<?php echo get_permalink(367); ?>" />
<!--input type="hidden" name="debug" value=1>
<input type="hidden" name="debugEmail" value="@dataquick.com"-->      
<!--input type="hidden" id="00N5000000295Kd" maxlength="255" name="00N5000000295Kd" value="DQ - Retail - Customer Referral *Mailer - RDM0811 - Aug11"-->
<?php
if($extraField != '') {
	echo ''. $extraField .'';
}
?>
<?php
if($campaignID != '') {
	echo '<input type="hidden" name="campaign_name" value="'. $campaignID .'" />';
}
/*
NOTE: These fields are optional debugging elements.  Please uncomment these lines if you wish to test in debug mode.
<input type="hidden" name="debug" value="1" />
<input type="hidden" name="debugEmail" value="dbadillo@dataquick.com" />
*/ ?>
<table width="<?php echo $width; if(is_page_template('dqdirect.php')) echo '" height="272'; ?>" cellpadding="0" cellspacing="0">
<tr><td<?php if(is_page_template('dqdirect.php') == false) echo ' width="161"'?>><label for="name">Contact Name*</label><input id="name" maxlength="80" name="name" size="<?php echo $fsize; ?>" type="text" class="req" /></td><?php if(is_page_template('dqdirect.php')) echo '</tr><tr>'; ?>
<td width="151"><label for="company">Company*</label><input id="company" maxlength="80" name="company" size="<?php echo $fsize; ?>" type="text" class="req" /></td></tr>
<tr><td><label for="email">Email*</label><input id="email" maxlength="80" name="email" size="<?php echo $fsize; ?>" type="text" class="req" /></td><?php if(is_page_template('dqdirect.php')) echo '</tr><tr>'; ?>
<td><label for="phone">Phone*</label><input id="phone" maxlength="40" name="phone" size="<?php echo $fsize; ?>" type="text" class="req" /></td></tr>
<tr><td><label for="subject">Subject</label><input id="subject" maxlength="80" name="subject" size="<?php echo $fsize; ?>" type="text" /></td>
<?php if(is_page_template('dqdirect.php') == false) { ?>
<td><label for="00N500000027DPN">Account Number</label><input id="00N500000027DPN" maxlength="50" name="00N500000027DPN" size="<?php echo $fsize; ?>" type="text" /></td>
<?php } ?></tr></table>
<textarea name="description"<?php if(is_page_template('dqdirect.php')) { ?> style="width:267px; height:65px">Comments<?php } else { ?>>Description<?php } ?></textarea>
<table width="<?php echo $width; ?>" cellpadding="0" cellspacing="0">
<?php if(is_page_template('dqdirect.php') == false) {
	
	?>
<tr valign="top" style="display:none"><td width="146"><label for="00N50000001r355">DQ Product</label></td>
<td width="166"><select id="00N50000001r355" name="00N50000001r355" title="DQ Product" style="width:166px"><option value="">--None--</option><option value="AVMFinder">AVMFinder</option>
<option value="Collateral Validation">Collateral Validation</option>
<option value="Data File Enhancement">Data File Enhancement</option>
<option value="Data File License">Data File License</option>
<option value="DQ Express">DQ Express</option>
<option value="FinderSuite">FinderSuite</option>
<option value="Home Value Explorer">Home Value Explorer</option>
<option value="Mail Merge (Word)">Mail Merge (Word)</option>
<option value="Market Intelligence">Market Intelligence</option>
<option value="N/A">N/A</option>
<option value="Other">Other</option>
<option value="Plat Maps">Plat Maps</option>
<option value="PPCD">PPCD</option>
<option value="PrimeraSource">PrimeraSource</option>
<option value="PropertyFinder">PropertyFinder</option>
<option value="PropertyFinder 2G">PropertyFinder 2G</option>
<option value="ProspectFinder">ProspectFinder</option>
<option value="ProspectFinder - Demographics">ProspectFinder - Demographics</option>
<option value="ProspectFinder FARM">ProspectFinder FARM</option>
<option value="ProspectFinder - Foreclosures">ProspectFinder - Foreclosures</option>
<option value="TitleShare">TitleShare</option>
<option value="Tops">Tops</option>
<option value="Valuator">Valuator</option>
<option value="ValueSmart">ValueSmart</option>
<option value="WebAMS">WebAMS</option>
<option value="XML">XML</option>
</select><br /><br />
</td></tr>
<tr valign="top"><td width="146"><label>What product line are you inquiring about?</label></td>
<td width="166"><select name="dqproductline" class="dqproductline"><option>Residential Credit Solutions</option>
<option>Data and Analytics</option>
<option>Decisioning</option>
<option>Flood Compliance Solutions</option>
<option>Licensed Appraisals</option>
<option>Property Research &amp; Marketing</option>
<option>Settlement Services</option>
<option>Valuation and Validation</option></select><br /><br /></td></tr>
<?php
}
if(is_page_template('dqdirect.php')) { ?>
<tr><td><div style="float:right; margin: 7px 10px 8px 0; display: inline">*Required Fields</div></td></tr>
<tr><td align="center"><input type="submit" name="submit" class="dsub" value="<?php echo $submit; ?>" /></td></tr>
<?php } else { ?>
<tr><td colspan="2">
<div class="recaptchahere">
<?php
switch($_SERVER['SERVER_NAME']) {
	case 'ninthlink.me':
		$publickey = "6Lf7R94SAAAAAA2nldFqOsMBhEamxUQ-zf_M1MIS";
		break;
	default:
		$publickey = "6Ld0jtMSAAAAAKeGm9kE7WtPpvTp-ln2IshUniE8";
		break;
}
?>
<script type="text/javascript" src="https://www.google.com/recaptcha/api/challenge?k=<?php esc_attr_e( $publickey ); ?>"></script>
</div>
</td></tr>
<tr><td><label>*Required Fields</label></td><td align="right"><input type="hidden"  id="external" name="external" value="1" /><input type="image" name="submit" value="SUBMIT" src="<?php bloginfo('template_url'); ?>/images/contact_sub.png" /></td></tr>
<?php } ?>
</table>
</form>