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

<form action="https://www.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8" method="POST" class="chk">

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

?>

	<table width="<?php echo $width; ?>" cellpadding="0" cellspacing="0">
		<tr>
			<td width="161">
				<label for="first_name">First Name*</label>
				<input id="first_name" maxlength="40" name="first_name" size="18" type="text" class="req text" />
			</td>
			<td width="151" colspan="2">
				<label for="last_name">Last Name*</label>
				<input id="last_name" maxlength="80" name="last_name" size="18" type="text" class="req text" />
			</td>
		</tr>
		<tr>
			<td>
				<label for="phone">Phone*</label>
				<input id="phone" maxlength="12" name="phone" size="18" type="text" class="req text" />
			</td>
			<td colspan="2">
				<label for="email">Email*</label>
				<input id="email" maxlength="80" name="email" size="18" type="text" class="req text" />
			</td>
		</tr>
		<tr>
			<td>
				<label for="company">Company*</label>
				<input id="company" maxlength="40" name="company" size="18" type="text" class="req text" />
			</td>
			<td colspan="2">
				<label for="street">Address*</label>
				<input id="street" maxlength="40" name="street" size="18" type="text" class="req text" />
			</td>
		</tr>
		<tr>
			<td>
				<label for="city">City*</label>
				<input id="city" maxlength="40" name="city" size="18" type="text" class="req text" />
			</td>
			<td>
				<label for="state">State*</label>
				<select id="state" name="state" class="req state">
					<option value="">State</option>
					<option value="AK">AK</option>
					<option value="AL">AL</option>
					<option value="AR">AR</option>
					<option value="AZ">AZ</option>
					<option value="CA">CA</option>
					<option value="CO">CO</option>
					<option value="CT">CT</option>
					<option value="DC">DC</option>
					<option value="DE">DE</option>
					<option value="FL">FL</option>
					<option value="GA">GA</option>
					<option value="HI">HI</option>
					<option value="IA">IA</option>
					<option value="ID">ID</option>
					<option value="IL">IL</option>
					<option value="IN">IN</option>
					<option value="KS">KS</option>
					<option value="KY">KY</option>
					<option value="LA">LA</option>
					<option value="MA">MA</option>
					<option value="MD">MD</option>
					<option value="ME">ME</option>
					<option value="MI">MI</option>
					<option value="MN">MN</option>
					<option value="MO">MO</option>
					<option value="MS">MS</option>
					<option value="MT">MT</option>
					<option value="NC">NC</option>
					<option value="ND">ND</option>
					<option value="NE">NE</option>
					<option value="NH">NH</option>
					<option value="NJ">NJ</option>
					<option value="NM">NM</option>
					<option value="NV">NV</option>
					<option value="NY">NY</option>
					<option value="OH">OH</option>
					<option value="OK">OK</option>
					<option value="OR">OR</option>
					<option value="PA">PA</option>
					<option value="RI">RI</option>
					<option value="SC">SC</option>
					<option value="SD">SD</option>
					<option value="TN">TN</option>
					<option value="TX">TX</option>
					<option value="UT">UT</option>
					<option value="VA">VA</option>
					<option value="VT">VT</option>
					<option value="WA">WA</option>
					<option value="WI">WI</option>
					<option value="WV">WV</option>
					<option value="WY">WY</option>
				</select>
			</td>
			<td>
				<label for="zip">Zip*</label>
				<input  id="zip" maxlength="20" name="zip" size="5" type="text" class="req text zip" />
			</td>
		</tr>
	</table>

	<?php if(!is_page_template('dqhome.php')) { ?>
		<br />
	<?php } ?>

	<table width="<?php echo $width; ?>" cellpadding="0" cellspacing="0">
		<tr>
			<td width="146">
				<label for="lead_source">Where did you<br />hear about us?*</label>
			</td>
		</tr>
		<tr>
			<td width="166">
				<select  id="lead_source" name="lead_source">
					<option value="">--None--</option>
					<option value="FL Realtors Expo 2013">FL Realtors Expo 2013</option>
					<option value="ASF January 2013">ASF January 2013</option>
					<option value="REO to Rent Conf Nov 2012">REO to Rent Conf Nov 2012</option>
					<option value="ABS East 2012">ABS East 2012</option>
					<option value="Advertisement">Advertisement</option>
					<option value="Article">Article</option>
					<option value="Ask">Ask</option>
					<option value="Association">Association</option>
					<option value="CBA June, 2011">CBA June, 2011</option>
					<option value="Cold Call">Cold Call</option>
					<option value="Direct Mail">Direct Mail</option>
					<option value="DMP">DMP</option>
					<option value="DQ Direct">DQ Direct</option>
					<option value="DQ News Referral">DQ News Referral</option>
					<option value="Email">Email</option>
					<option value="Existing Customer">Existing Customer</option>
					<option value="FDIC Target List">FDIC Target List</option>
					<option value="Feb 2011 Mortgage Servicing Conference">Feb 2011 Mortgage Servicing Conference</option>
					<option value="FiveStar 2011 Conference">FiveStar 2011 Conference</option>
					<option value="Friend/Business Associate">Friend/Business Associate</option>
					<option value="Google">Google</option>
					<option value="Google Earth">Google Earth</option>
					<option value="Internet/Web">Internet/Web</option>
					<option value="MBAA Chicago 2011">MBAA Chicago 2011</option>
					<option value="MDA Joint Initiative">MDA Joint Initiative</option>
					<option value="MSB">MSB</option>
					<option value="News/Newspaper/Magazine">News/Newspaper/Magazine</option>
					<option value="Newsletter">Newsletter</option>
					<option value="No Response">No Response</option>
					<option value="Other">Other</option>
					<option value="PCUA">PCUA</option>
					<option value="Previous Customer">Previous Customer</option>
					<option value="RealtyTrac">RealtyTrac</option>
					<option value="Referral">Referral</option>
					<option value="salesgenie">salesgenie</option>
					<option value="Search Engine">Search Engine</option>
					<option value="Title Referral">Title Referral</option>
					<option value="Trade Show">Trade Show</option>
					<option value="Upsell">Upsell</option>
					<option value="USIS Referral">USIS Referral</option>
					<option value="Webinar">Webinar</option>
					<option value="Wells Fargo">Wells Fargo</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>
				<label>What product line are you interested in?</label>
			</td>
		</tr>
		<tr>
			<td>
				<select  id="00N50000002oobw" name="00N50000002oobw" title="Product Line">
					<option value="">--None--</option>
					<option value="Credit">Credit</option>
					<option value="Data and Analytics">Data and Analytics</option>
					<option value="Decisioning">Decisioning</option>
					<option value="Flood">Flood</option>
					<option value="Property Research &amp; Marketing">Property Research &amp; Marketing</option>
					<option value="Valuation and Validation">Valuation and Validation</option>
				</select>
				<br />
				<br />
			</td>
		</tr>
		<tr>
			<td>
				<label for="industry">What industry<br />are you in?*</label>
			</td>
		</tr>
		<tr>
			<td>
				<select  id="industry" name="industry">
					<option value="">--None--</option>
					<option value="Accountants">Accountants</option>
					<option value="Appraisers">Appraisers</option>
					<option value="Bail Bonds">Bail Bonds</option>
					<option value="Banks">Banks</option>
					<option value="Banks/Savings &amp; Loan">Banks/Savings &amp; Loan</option>
					<option value="Broker/B2B">Broker/B2B</option>
					<option value="Construction">Construction</option>
					<option value="Consultants">Consultants</option>
					<option value="Credit, Collections">Credit, Collections</option>
					<option value="Credit Union">Credit Union</option>
					<option value="Education">Education</option>
					<option value="Escrow">Escrow</option>
					<option value="Financial Services">Financial Services</option>
					<option value="Foreclosure">Foreclosure</option>
					<option value="Fundraiser">Fundraiser</option>
					<option value="Government">Government</option>
					<option value="Heating, AC, Plumbing, Hardware">Heating, AC, Plumbing, Hardware</option>
					<option value="Insurance">Insurance</option>
					<option value="Investors - Institutional">Investors - Institutional</option>
					<option value="Investors - Real Estate">Investors - Real Estate</option>
					<option value="Lawyer">Lawyer</option>
					<option value="Marketing">Marketing</option>
					<option value="Mortgage">Mortgage</option>
					<option value="Mortgage Lending">Mortgage Lending</option>
					<option value="National Bank">National Bank</option>
					<option value="Private Investigator">Private Investigator</option>
					<option value="Publisher, Printing">Publisher, Printing</option>
					<option value="Real Estate/Sales/Brokers">Real Estate/Sales/Brokers</option>
					<option value="Regional Bank">Regional Bank</option>
					<option value="Research">Research</option>
					<option value="Reseller">Reseller</option>
					<option value="Retail">Retail</option>
					<option value="Secondary Market">Secondary Market</option>
					<option value="Servicer">Servicer</option>
					<option value="Servicing">Servicing</option>
					<option value="Subprime">Subprime</option>
					<option value="Title Companies">Title Companies</option>
					<option value="Utilities">Utilities</option>
					<option value="Valuation">Valuation</option>
					<option value="Other">Other</option>
				</select>
			</td>
		</tr>
	</table>

	<textarea id="00N50000001ZDL2" name="00N50000001ZDL2" rows="2" type="text" wrap="soft" placeholder="Comments"></textarea>

	<table width="<?php echo $width; ?>" cellpadding="0" cellspacing="0">

		<?php if(is_page_template('dqdirect.php')) { ?>
			<tr>
				<td>
					<div style="float:right; margin: 7px 10px 8px 0; display: inline">*Required Fields</div>
				</td>
			</tr>
			<tr>
				<td align="center">
					<input type="submit" name="submit" class="dsub" value="<?php echo $submit; ?>" />
				</td>
			</tr>

		<?php } else { ?>

			<tr>
				<td colspan="2">
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
				</td>
			</tr>
			<tr>
				<td>
					<label>*Required Fields</label>
				</td>
			</tr>
			<tr>
				<td align="right">
					<input type="image" name="submit" value="SUBMIT" src="<?php bloginfo('template_url'); ?>/images/<?php echo is_page_template('dqdirect.php') ? 'direct_sub' : 'contact_sub'; ?>.png" />
				</td>
			</tr>

		<?php } ?>

	</table>
</form>



