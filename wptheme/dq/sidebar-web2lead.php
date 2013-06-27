<?php
/**
 * @package DQ
 * @subpackage DQ
 * @since DQ 1.0
 */
global $post;
$width = is_page_template('dqdirect.php') ? 270 : 312;
$campaignID = get_post_meta($post->ID, 'campaign_name', true);
$extraField = get_post_meta($post->ID, 'extraField', true);
$submit = get_post_meta($post->ID, 'submit_btn', true);
if($submit == '' ) $submit = 'GET ACCESS';
?>
<?php 
/*
<form action="<?php echo is_page_template('dqdirect.php') ? 'https://www.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8' : get_permalink($post->ID) .'?dq_action=dqemail'; ?>" method="POST" class="chk">
*/
?>
<form action="http://www.dataquick.com/?dq_action=dqemail" method="POST" class="chk">

<input type="hidden" name="oid" value="00D500000006jOn" />
<input type="hidden" name="retURL" value="<?php echo get_permalink(367); ?>" />

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
<table width="<?php echo $width; ?>" cellpadding="0" cellspacing="0">
<tr><td width="161"><label for="first_name">First Name*</label><input id="first_name" maxlength="40" name="first_name" size="18" type="text" class="req text" /></td>
<td width="151" colspan="2"><label for="last_name">Last Name*</label><input id="last_name" maxlength="80" name="last_name" size="18" type="text" class="req text" /></td></tr>
<tr><td><label for="phone">Phone*</label><input id="phone" maxlength="12" name="phone" size="18" type="text" class="req text" /></td>
<td colspan="2"><label for="email">Email*</label><input id="email" maxlength="80" name="email" size="18" type="text" class="req text" /></td></tr>
<tr><td><label for="company">Company*</label><input id="company" maxlength="40" name="company" size="18" type="text" class="req text" /></td>
<td colspan="2"><label for="street">Address*</label><input id="street" maxlength="40" name="street" size="18" type="text" class="req text" /></td></tr>
<tr><td><label for="city">City*</label><input id="city" maxlength="40" name="city" size="18" type="text" class="req text" /></td>
<td><label for="state">State*</label><select id="state" name="state" class="req state"><option value="">State</option><option value="AK">AK</option><option value="AL">AL</option><option value="AR">AR</option><option value="AZ">AZ</option><option value="CA">CA</option><option value="CO">CO</option><option value="CT">CT</option><option value="DC">DC</option><option value="DE">DE</option><option value="FL">FL</option><option value="GA">GA</option><option value="HI">HI</option><option value="IA">IA</option><option value="ID">ID</option><option value="IL">IL</option><option value="IN">IN</option><option value="KS">KS</option><option value="KY">KY</option><option value="LA">LA</option><option value="MA">MA</option><option value="MD">MD</option><option value="ME">ME</option><option value="MI">MI</option><option value="MN">MN</option><option value="MO">MO</option><option value="MS">MS</option><option value="MT">MT</option><option value="NC">NC</option><option value="ND">ND</option><option value="NE">NE</option><option value="NH">NH</option><option value="NJ">NJ</option><option value="NM">NM</option><option value="NV">NV</option><option value="NY">NY</option><option value="OH">OH</option><option value="OK">OK</option><option value="OR">OR</option><option value="PA">PA</option><option value="RI">RI</option><option value="SC">SC</option><option value="SD">SD</option><option value="TN">TN</option><option value="TX">TX</option><option value="UT">UT</option><option value="VA">VA</option><option value="VT">VT</option><option value="WA">WA</option><option value="WI">WI</option><option value="WV">WV</option><option value="WY">WY</option></select></td>
<td><label for="zip">Zip*</label><input  id="zip" maxlength="20" name="zip" size="5" type="text" class="req text zip" /></td></tr>
</table><?php if(!is_page_template('dqhome.php')) { ?><br /><?php } ?>
<table width="<?php echo $width; ?>" cellpadding="0" cellspacing="0">

<tr>
	<td width="146">
		<label for="lead_source">Where did you<br />hear about us?*</label>
	</td>
	<td width="166">
		<select id="lead_source" name="lead_source" style="width:166px" class="req">
			<option value="" selected="selected">Please Select</option>
			<option value="Advertisement">Advertisement</option>
			<option value="Article">Article</option>
			<option value="Direct Mail">Direct Mail</option>
			<option value="Email">Email</option>
			<option value="Existing Customer">Existing Customer</option>
			<option value="Friend/Business Associate">Friend/Business Associate</option>
			<option value="Google">Google</option>
			<option value="Internet/Web">Internet/Web</option>
			<option value="Newsletter">Newsletter</option>
			<option value="Referral">Referral</option>
			<option value="Trade Show">Trade Show</option>
			<option value="Other">Other</option>
			<option value="News/Newspaper/Magazine">News/Newspaper/Magazine</option>
		</select>
	</td>
</tr>

<tr>
	<td>
		<label>What product line are you interested in?</label>
	</td>
	<td>
		<select name="dqproductline" class="dqproductline">
			<option>Residential Credit Solutions</option>
			<option>Data and Analytics</option>
			<option>Decisioning</option>
			<option>Flood Compliance Solutions</option>
			<option>Licensed Appraisals</option>
			<option>Property Research &amp; Marketing</option>
			<option>Settlement Services</option>
			<option>Valuation and Validation</option>
		</select>
		<br /><br />
	</td>
</tr>


<tr>
	<td>
		<label for="industry">What industry<br />are you in?*</label>
	</td>
	<td>
		<select id="industry" name="industry" style="width:166px" class="req">
			<option value="" selected="selected">Please Select</option>
			<option value="Accountants" sendto="wtol" >Accountants</option>
			<option value="Appraisers" sendto="dqsales" >Appraisers</option>
			<option value="Bail Bonds" sendto="wtol" >Bail Bonds</option>
			<option value="Banks" sendto="dqsales" >Banks</option>
			<option value="Banks/Savings &amp; Loan" sendto="dqsales" >Banks/Savings &amp; Loan</option>
			<option value="Broker/B2B" sendto="wtol" >Broker/B2B</option>
			<option value="Construction" sendto="wtol" >Construction</option>
			<option value="Consultants" sendto="wtol" >Consultants</option>
			<option value="Credit, Collections" sendto="wtol" >Credit, Collections</option>
			<option value="Credit Union" sendto="dqsales" >Credit Union</option>
			<option value="Education" sendto="wtol" >Education</option>
			<option value="Escrow" sendto="wtol" >Escrow</option>
			<option value="Financial Services" sendto="dqsales" >Financial Services</option>
			<option value="Foreclosure" sendto="wtol" >Foreclosure</option>
			<option value="Fundraiser" sendto="wtol" >Fundraiser</option>
			<option value="Government" sendto="wtol" >Government</option>
			<option value="Heating, AC, Plumbing, Hardware" sendto="wtol" >Heating, AC, Plumbing, Hardware</option>
			<option value="Insurance" sendto="wtol" >Insurance</option>
			<option value="Investors - Institutional" sendto="dqsales" >Investors - Institutional</option>
			<option value="Investors - Real Estate" sendto="wtol" >Investors - Real Estate</option>
			<option value="Lawyer" sendto="wtol" >Lawyer</option>
			<option value="Marketing" sendto="wtol" >Marketing</option>
			<option value="Mortgage" sendto="dqsales" >Mortgage</option>
			<option value="Mortgage Lending" sendto="dqsales" >Mortgage Lending</option>
			<option value="National Bank" sendto="dqsales" >National Bank</option>
			<option value="Private Investigator" sendto="wtol" >Private Investigator</option>
			<option value="Publisher, Printing" sendto="wtol" >Publisher, Printing</option>
			<option value="Real Estate/Sales/Brokers" sendto="wtol" >Real Estate/Sales/Brokers</option>
			<option value="Regional Bank" sendto="dqsales" >Regional Bank</option>
			<option value="Research" sendto="wtol" >Research</option>
			<option value="Reseller" sendto="wtol" >Reseller</option>
			<option value="Retail" sendto="wtol" >Retail</option>
			<option value="Secondary Market" sendto="dqsales" >Secondary Market</option>
			<option value="Servicer" sendto="dqsales" >Servicer</option>
			<option value="Servicing" sendto="dqsales" >Servicing</option>
			<option value="Subprime" sendto="dqsales" >Subprime</option>
			<option value="Title Companies" sendto="wtol" >Title Companies</option>
			<option value="Utilities" sendto="wtol" >Utilities</option>
			<option value="Valuation" sendto="dqsales" >Valuation</option>
			<option value="Other" sendto="wtol" >Other</option>
		</select>
	</td>
</tr>


</table>

<textarea id="00N50000001ZDL2" name="00N50000001ZDL2" rows="2" type="text" wrap="soft" placeholder="Comments"></textarea>
<table width="<?php echo $width; ?>" cellpadding="0" cellspacing="0">
<?php if(is_page_template('dqdirect.php')) { ?>
<tr><td><div style="float:right; margin: 7px 10px 8px 0; display: inline">*Required Fields</div></td></tr>
<tr><td align="center"><input type="submit" name="submit" class="dsub" value="<?php echo $submit; ?>" /></td></tr>
<?php } else { ?>
<tr><td colspan="2">
<div class="recaptchahere">
<?php
switch($_SERVER['SERVER_NAME']) {
	case 'dataquick.ninthlink.me':
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
<tr><td><label>*Required Fields</label></td><td align="right"><input type="image" name="submit" value="SUBMIT" src="<?php bloginfo('template_url'); ?>/images/<?php echo is_page_template('dqdirect.php') ? 'direct_sub' : 'contact_sub'; ?>.png" /></td></tr>
<?php } ?>
</table>
</form>
