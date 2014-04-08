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

*/ ?>
<form action="https://www.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8" method="POST" class="chk webtolead" style="display: none;">

<input type=hidden name="oid" value="00D500000006jOn">
<input type=hidden name="retURL" value="http://www.dataquick.com/contactusthanks.asp?">

<!--  ----------------------------------------------------------------------  -->
<!--  NOTE: These fields are optional debugging elements. Please uncomment    -->
<!--  these lines if you wish to test in debug mode.                          -->
<!--  <input type="hidden" name="debug" value=1>                              -->
<!--  <input type="hidden" name="debugEmail"                                  -->
<!--  value="dbadillo@dataquick.com">                                         -->
<!--  ----------------------------------------------------------------------  -->

<label for="first_name">First Name</label><input  id="first_name" maxlength="40" name="first_name" size="20" type="text" /><br>

<label for="last_name">Last Name</label><input  id="last_name" maxlength="80" name="last_name" size="20" type="text" /><br>

<label for="email">Email</label><input  id="email" maxlength="80" name="email" size="20" type="text" /><br>

<label for="company">Company</label><input  id="company" maxlength="40" name="company" size="20" type="text" /><br>

<label for="city">City</label><input  id="city" maxlength="40" name="city" size="20" type="text" /><br>

<label for="state">State/Province</label><input  id="state" maxlength="20" name="state" size="20" type="text" /><br>

<label for="salutation">Salutation</label><select  id="salutation" name="salutation"><option value="">--None--</option><option value="Mr.">Mr.</option>
<option value="Ms.">Ms.</option>
<option value="Mrs.">Mrs.</option>
<option value="Dr.">Dr.</option>
<option value="Prof.">Prof.</option>
</select><br>

<label for="title">Title</label><input  id="title" maxlength="40" name="title" size="20" type="text" /><br>

<label for="URL">Website</label><input  id="URL" maxlength="80" name="URL" size="20" type="text" /><br>

<label for="phone">Phone</label><input  id="phone" maxlength="40" name="phone" size="20" type="text" /><br>

<label for="mobile">Mobile</label><input  id="mobile" maxlength="40" name="mobile" size="20" type="text" /><br>

<label for="fax">Fax</label><input  id="fax" maxlength="40" name="fax" size="20" type="text" /><br>

<label for="street">Address</label><textarea name="street"></textarea><br>

<label for="zip">Zip</label><input  id="zip" maxlength="20" name="zip" size="20" type="text" /><br>

<label for="country">Country</label><input  id="country" maxlength="40" name="country" size="20" type="text" /><br>

<label for="description">Description</label><textarea name="description"></textarea><br>

<label for="lead_source">Lead Source</label><select  id="lead_source" name="lead_source"><option value="">--None--</option><option value="FL Realtors Expo 2013">FL Realtors Expo 2013</option>
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
</select><br>

<label for="industry">Industry</label><select  id="industry" name="industry"><option value="">--None--</option><option value="Accountants">Accountants</option>
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
</select><br>

<label for="rating">Rating</label><select  id="rating" name="rating"><option value="">--None--</option><option value="Hot">Hot</option>
<option value="Warm">Warm</option>
<option value="Cold">Cold</option>
</select><br>

<label for="revenue">Annual Revenue</label><input  id="revenue" name="revenue" size="20" type="text" /><br>

<label for="employees">Employees</label><input  id="employees" name="employees" size="20" type="text" value="" /><br>

<label for="Campaign_ID">Campaign</label><select  id="Campaign_ID" name="Campaign_ID"><option value="">--None--</option><option value="70150000000N5wr">2011 Flood Campaign</option>
<option value="70150000000Mla5">Trident - Flood Compliance PRODUCT INITIATIVE</option>
<option value="70150000000O1Lx">Landsafe Correspondent Pursuit</option>
<option value="70150000000O1MQ">Chase Correspondent Pursuit</option>
<option value="70150000000tOjf">DQ - Retail - Insurance/3¢Leads - REM0314 - Mar14</option>
<option value="70150000000t5VS">DQ - DataQuick Web Site - 2014</option>
<option value="70150000000shkj">DQ - Retail - California Private Investigators Trade Show - RTS113- Apr13</option>
<option value="70150000000sYJQ">DQ - Retail/Title - Lenders/MITitleShare - REM1113 - Nov13</option>
<option value="70150000000t5V8">DQ - DataQuick Social Media - 2014</option>
<option value="70150000000sAjd">Coldwell Banker Sales Meeting - 9/17</option>
<option value="70150000000t38z">DQ - Retail - Attorneys - REM0114 - Jan14</option>
<option value="70150000000sBLw">DQ - Lending/Strategic - Database Expansion Campaign - SLEM1013 - Oct13</option>
<option value="70150000000t5VI">DQ - DataQuick Blog - 2014</option>
<option value="70150000000sAle">DQ - Retail - MtgBroker - REM1013 - Oct13</option>
<option value="70150000000nH7k">DQ - Strategic/Major - InmanRE Connect SF Conference  - STS0712 - July13</option>
<option value="70150000000nZ03">Test Campiang</option>
<option value="70150000000nNRh">Alabama - National Agent Back Office</option>
<option value="70150000000nYFq">DQ - Lending - AppraisalQ - LEM0813 - Aug13</option>
<option value="70150000000nJTG">DQ - Strategic - AFP Conference  - TS0113 - Apr13</option>
<option value="70150000000naTG">DQLS Account Conversion</option>
<option value="70150000000nZkf">FL Realtors Expo 2013</option>
<option value="70150000000nUuz">DQ - Title/MajorAcct - MI-TitleShare - TEM0813 - Aug13</option>
<option value="70150000000nJSw">DQ - Strategic/Title/Retail - RE Connect/Inman Conference  - TS0113 - Jan13</option>
<option value="70150000000mdmh">Portfolio Management Intelligence Suite</option>
<option value="70150000000n9Vh">PropFinder Demo</option>
<option value="70150000000n9aS">Realtor Outreach BPO/Title</option>
<option value="70150000000mkhg">MBA Secondary Market Conference 2013</option>
<option value="70150000000N2Lx">2011 Credit Campaign</option>
<option value="70150000000Ma5O">Collateral Valuation Solutions 2011</option>
<option value="70150000000mNUT">Retention</option>
<option value="70150000000mLLE">CBA Live 2013</option>
<option value="70150000000mMpz">Automated Title Campaign</option>
<option value="70150000000lGKF">Valuation_SMBCampaign_Sept_2012</option>
<option value="70150000000lYUZ">DQ - Strategic - AEA Conference  - TS0113 - Jan13</option>
<option value="70150000000lPoh">DCR - Sandy</option>
<option value="70150000000lsTj">MLS Initiative</option>
<option value="70150000000lb4f">Lending - IMN Single Family/ REO to Rental Forum 2012</option>
<option value="70150000000lr4v">Rels Title - Branch Sales</option>
<option value="70150000000lr55">Rels Title - Servicing</option>
<option value="70150000000MU1N">PA CUA IAG Compliance</option>
<option value="70150000000l3a5">Flood_SMBCampaign_Sept12</option>
<option value="70150000000l0S7">1010 Data</option>
<option value="70150000000l5cc">PF2G_SMBCampaign_Sept12</option>
<option value="70150000000LwYq">DQ - No Campaign</option>
<option value="70150000000jjjl">Portfolio Analysis</option>
<option value="70150000000NvPd">CoreLogic Market Share Pursuit</option>
<option value="70150000000NvVq">HARP2</option>
<option value="70150000000OSF5">ValueNet</option>
</select><br>

<input type="hidden"  id="member_status" name="member_status" value="" /><br>

<label for="emailOptOut">Email Opt Out</label><input  id="emailOptOut" name="emailOptOut" type="checkbox" value="1" /><br>

<label for="faxOptOut">Fax Opt Out</label><input  id="faxOptOut" name="faxOptOut" type="checkbox" value="1" /><br>

<label for="doNotCall">Do Not Call</label><input  id="doNotCall" name="doNotCall" type="checkbox" value="1" /><br>

<label for="recordType">Lead Record Type</label><select  id="recordType" name="recordType"><option value="">--None--</option><option value="012500000001AVU">DQ Lead</option>
<option value="012500000001AVP">MDA LS Lead</option>
<option value="012500000001Qtt">Rels Lead</option>
</select><br>

<label>Business Structure:</label>
<select  id="00N50000001Ueqd" name="00N50000001Ueqd" title="Business Structure"><option value="">--None--</option><option value="Sub S Corp">Sub S Corp</option>
<option value="LLC">LLC</option>
<option value="Partnership">Partnership</option>
<option value="Limited Partnership">Limited Partnership</option>
<option value="Proprietorship">Proprietorship</option>
<option value="Professional Association">Professional Association</option>
<option value="Trust">Trust</option>
<option value="Not For Profit">Not For Profit</option>
<option value="C Corp">C Corp</option>
</select><br>

<label>Date Business Started:</label><input  id="00N50000001Ueqg" maxlength="16" name="00N50000001Ueqg" size="20" type="text" /><br>

<label>Bank Account Type:</label><select  id="00N50000001Ueql" name="00N50000001Ueql" title="Bank Account Type"><option value="">--None--</option><option value="Premier Business Checking">Premier Business Checking</option>
<option value="Basic Business Checking">Basic Business Checking</option>
<option value="Commercial Checking">Commercial Checking</option>
<option value="Business Line of Credit">Business Line of Credit</option>
<option value="Business Term Loan">Business Term Loan</option>
<option value="Business Purpose Vehicle Loan">Business Purpose Vehicle Loan</option>
<option value="Merchant Services">Merchant Services</option>
<option value="Business Reserve Line">Business Reserve Line</option>
<option value="Business MMA">Business MMA</option>
<option value="Business Savings">Business Savings</option>
<option value="Business Credit Card">Business Credit Card</option>
<option value="Commercial RE">Commercial RE</option>
<option value="Consumer Mortgage">Consumer Mortgage</option>
<option value="Consumer Loan">Consumer Loan</option>
<option value="Personal Checking">Personal Checking</option>
<option value="MMA">MMA</option>
<option value="CD">CD</option>
<option value="Annuities">Annuities</option>
<option value="Other">Other</option>
<option value="Totally Free Business Checking">Totally Free Business Checking</option>
</select><br>

<label>Business Stage:</label><select  id="00N50000001Ueqo" name="00N50000001Ueqo" title="Business Stage"><option value="">--None--</option><option value="High Growth">High Growth</option>
<option value="Stable/Mature">Stable/Mature</option>
<option value="Preparing to Sell">Preparing to Sell</option>
<option value="Startup">Startup</option>
</select><br>

<label>Primary Bank Name:</label><input  id="00N50000001Ueqp" maxlength="20" name="00N50000001Ueqp" size="20" type="text" /><br>

<label>Gross Annual Sales:</label><input  id="00N50000001Uequ" name="00N50000001Uequ" size="20" type="text" /><br>

<label>Business Type:</label><select  id="00N50000001Ueqv" name="00N50000001Ueqv" title="Business Type"><option value="">--None--</option><option value="Broker/B2B">Broker/B2B</option>
<option value="Credit Union">Credit Union</option>
<option value="Mortgage Lender">Mortgage Lender</option>
<option value="National Bank">National Bank</option>
<option value="Non-Prime Lender">Non-Prime Lender</option>
<option value="Regional Bank">Regional Bank</option>
<option value="Reseller">Reseller</option>
<option value="Secondary Market">Secondary Market</option>
<option value="Servicing">Servicing</option>
<option value="Other">Other</option>
</select><br>

<label>Sales Team:</label><select  id="00N50000001Uer1" name="00N50000001Uer1" title="Sales Team"><option value="">--None--</option><option value="All Products and Services">All Products and Services</option>
<option value="Customer Acquisition">Customer Acquisition</option>
<option value="Residential Credit Solutions">Residential Credit Solutions</option>
<option value="Collateral Valuation Solutions">Collateral Valuation Solutions</option>
<option value="Property &amp; Title Solutions">Property &amp; Title Solutions</option>
<option value="Flood Zone Compliance Solutions">Flood Zone Compliance Solutions</option>
<option value="Closing Solutions">Closing Solutions</option>
<option value="Quick Tier">Quick Tier</option>
<option value="Title">Title</option>
<option value="Strategic">Strategic</option>
<option value="Lending Services">Lending Services</option>
<option value="DQ Direct">DQ Direct</option>
<option value="DQ News">DQ News</option>
<option value="Self-Sign">Self-Sign</option>
</select><br>

<label>Department:</label><input  id="00N50000001ZDLG" maxlength="55" name="00N50000001ZDLG" size="20" type="text" /><br>

<label>Address 1:</label><input  id="00N50000001ZDLQ" maxlength="55" name="00N50000001ZDLQ" size="20" type="text" /><br>

<label>Address 2:</label><input  id="00N50000001ZDLV" maxlength="55" name="00N50000001ZDLV" size="20" type="text" /><br>

<label>City 1:</label><input  id="00N50000001ZDLa" maxlength="55" name="00N50000001ZDLa" size="20" type="text" /><br>

<label>Dept:</label><select  id="00N50000001r3en" name="00N50000001r3en" title="Dept"><option value="">--None--</option><option value="1st Mortgage">1st Mortgage</option>
<option value="Appraisal">Appraisal</option>
<option value="Customer Service">Customer Service</option>
<option value="Data Management">Data Management</option>
<option value="Home Equity">Home Equity</option>
<option value="Information Technology">Information Technology</option>
<option value="Marketing">Marketing</option>
<option value="Mortgage Insurance">Mortgage Insurance</option>
<option value="Operations">Operations</option>
<option value="Quality Assurance">Quality Assurance</option>
<option value="Sales">Sales</option>
<option value="Secondary Markets">Secondary Markets</option>
<option value="Servicing">Servicing</option>
<option value="Value Added Resellers">Value Added Resellers</option>
<option value="Wholesale Mortgage">Wholesale Mortgage</option>
<option value="Other">Other</option>
</select><br>

<label>ZipCode:</label><input  id="00N50000001ZDLk" maxlength="5" name="00N50000001ZDLk" size="20" type="text" /><br>

<label>CurrentCustomer:</label><input  id="00N50000001ZDLp" name="00N50000001ZDLp" type="checkbox" value="1" /><br>

<label>Preferred Method of Contact:</label><select  id="00N50000001ZDLu" name="00N50000001ZDLu" title="Preferred Method of Contact"><option value="">--None--</option><option value="Email">Email</option>
<option value="Fax">Fax</option>
<option value="Telephone">Telephone</option>
<option value="U.S. Postal Service">U.S. Postal Service</option>
<option value="Unknown">Unknown</option>
</select><br>

<label>Comments:</label><textarea  id="00N50000001ZDL2" name="00N50000001ZDL2" rows="3" type="text" wrap="soft"></textarea><br>

<label>State:</label><select  id="00N50000001ZDLf" name="00N50000001ZDLf" title="State"><option value="">--None--</option><option value="AL">AL</option>
<option value="AK">AK</option>
<option value="AZ">AZ</option>
<option value="AR">AR</option>
<option value="CA">CA</option>
<option value="CO">CO</option>
<option value="CT">CT</option>
<option value="DE">DE</option>
<option value="DC">DC</option>
<option value="FL">FL</option>
<option value="GA">GA</option>
<option value="HI">HI</option>
<option value="ID">ID</option>
<option value="IL">IL</option>
<option value="IN">IN</option>
<option value="IA">IA</option>
<option value="KS">KS</option>
<option value="KY">KY</option>
<option value="LA">LA</option>
<option value="ME">ME</option>
<option value="MD">MD</option>
<option value="MA">MA</option>
<option value="MI">MI</option>
<option value="MN">MN</option>
<option value="MS">MS</option>
<option value="MO">MO</option>
<option value="MT">MT</option>
<option value="NE">NE</option>
<option value="NV">NV</option>
<option value="NH">NH</option>
<option value="NJ">NJ</option>
<option value="NM">NM</option>
<option value="NY">NY</option>
<option value="NC">NC</option>
<option value="ND">ND</option>
<option value="OH">OH</option>
<option value="OK">OK</option>
<option value="OR">OR</option>
<option value="PA">PA</option>
<option value="PR">PR</option>
<option value="RI">RI</option>
<option value="SC">SC</option>
<option value="SD">SD</option>
<option value="TN">TN</option>
<option value="TX">TX</option>
<option value="UT">UT</option>
<option value="VT">VT</option>
<option value="VA">VA</option>
<option value="WA">WA</option>
<option value="WV">WV</option>
<option value="WI">WI</option>
<option value="WY">WY</option>
</select><br>

<label>Other Lead Source:</label><input  id="00N50000001ZXJu" maxlength="100" name="00N50000001ZXJu" size="20" type="text" /><br>

<label>Industry Subgroup:</label><select  id="00N50000001sVyR" name="00N50000001sVyR" title="Industry Subgroup"><option value="">--None--</option><option value="City">City</option>
<option value="County">County</option>
<option value="Colleges/Universities/Schools/Libraries">Colleges/Universities/Schools/Libraries</option>
<option value="Federal">Federal</option>
<option value="Fire/Police">Fire/Police</option>
<option value="State">State</option>
<option value="Other">Other</option>
</select><br>

<label>Product Line:</label><select  id="00N50000002oobw" name="00N50000002oobw" title="Product Line"><option value="">--None--</option><option value="Credit">Credit</option>
<option value="Data and Analytics">Data and Analytics</option>
<option value="Decisioning">Decisioning</option>
<option value="Flood">Flood</option>
<option value="Property Research &amp; Marketing">Property Research &amp; Marketing</option>
<option value="Valuation and Validation">Valuation and Validation</option>
</select><br>

<label>Dept 2 (Specify):</label><select  id="00N50000002mbq1" name="00N50000002mbq1" title="Dept 2 (Specify)"><option value="">--None--</option><option value="Sales/Marketing">Sales/Marketing</option>
<option value="Operations">Operations</option>
<option value="Risk/Compliance">Risk/Compliance</option>
<option value="QC">QC</option>
<option value="Analytics">Analytics</option>
<option value="Accounting/Finance">Accounting/Finance</option>
<option value="Information Technology">Information Technology</option>
<option value="Senior Management">Senior Management</option>
<option value="Vendor Management">Vendor Management</option>
<option value="Risk">Risk</option>
<option value="Whole Loans">Whole Loans</option>
<option value="MBS">MBS</option>
<option value="Risk (Transactional)">Risk (Transactional)</option>
<option value="Risk (Portfolio)">Risk (Portfolio)</option>
<option value="Partner Relations">Partner Relations</option>
</select><br>

<input type="image" name="submit" value="SUBMIT" src="<?php bloginfo('template_url'); ?>/images/<?php echo is_page_template('dqdirect.php') ? 'direct_sub' : 'contact_sub'; ?>.png" />
<!--input type="submit" name="submit"-->

</form>