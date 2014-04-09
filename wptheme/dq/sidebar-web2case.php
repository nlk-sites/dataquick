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
<?php /*
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
<tr><td><label>*Required Fields</label></td><td align="right"><input type="hidden"  id="external" name="external" value="1" /><input type="image" name="submit" value="SUBMIT" src="<?php bloginfo('template_url'); ?>/images/contact_sub.png" /></td></tr>
<?php } ?>
</table>
</form>
*/ ?>
<form action="https://www.salesforce.com/servlet/servlet.WebToCase?encoding=UTF-8" method="POST" class="chk webtocase" style="display:none;">

<input type=hidden name="orgid" value="00D500000006jOn">
<input type=hidden name="retURL" value="<?php echo get_permalink(367); ?>">

<label for="name">Contact Name</label><input  id="name" maxlength="80" name="name" size="20" type="text" /><br>

<label for="email">Email</label><input  id="email" maxlength="80" name="email" size="20" type="text" /><br>

<label for="phone">Phone</label><input  id="phone" maxlength="40" name="phone" size="20" type="text" /><br>

<label for="subject">Subject</label><input  id="subject" maxlength="80" name="subject" size="20" type="text" /><br>

<label for="description">Description</label><textarea name="description"></textarea><br>

<label for="company">Company</label><input  id="company" maxlength="80" name="company" size="20" type="text" /><br>

<label for="type">Type</label><select  id="type" name="type"><option value="">--None--</option><option value="Communication">Communication</option>
<option value="Other...In Description Box">Other...In Description Box</option>
<option value="Price">Price</option>
<option value="Problem">Problem</option>
<option value="Quality">Quality</option>
<option value="Question">Question</option>
<option value="Service (External)">Service (External)</option>
<option value="Service (Internal)">Service (Internal)</option>
<option value="Turn Time">Turn Time</option>
<option value="Administrative Request">Administrative Request</option>
<option value="Billing Issue">Billing Issue</option>
<option value="Cancellation">Cancellation</option>
<option value="Data Issue">Data Issue</option>
<option value="Feature Request">Feature Request</option>
<option value="Fulfillment">Fulfillment</option>
<option value="Product Issues">Product Issues</option>
<option value="Training">Training</option>
<option value="DQ Direct">DQ Direct</option>
<option value="Counts">Counts</option>
<option value="Pre-Built Test File">Pre-Built Test File</option>
<option value="Custom Test Files">Custom Test Files</option>
<option value="Standard Test Files">Standard Test Files</option>
<option value="Research">Research</option>
<option value="Custom Production File">Custom Production File</option>
<option value="Standard Production File">Standard Production File</option>
<option value="Referral">Referral</option>
</select><br>

<label for="status">Status</label><select  id="status" name="status"><option value="">--None--</option><option value="New">New</option>
<option value="Waiting on Customer">Waiting on Customer</option>
<option value="On Hold">On Hold</option>
<option value="In Process">In Process</option>
<option value="Escalated">Escalated</option>
<option value="Closed - Resolved">Closed - Resolved</option>
<option value="Closed - Unresolved">Closed - Unresolved</option>
<option value="Pending Approval">Pending Approval</option>
<option value="Pending Scheduling">Pending Scheduling</option>
<option value="2nd Call">2nd Call</option>
<option value="3rd Call">3rd Call</option>
<option value="Scheduled">Scheduled</option>
<option value="Completed">Completed</option>
<option value="Cancelled">Cancelled</option>
<option value="Closed - Refused">Closed - Refused</option>
<option value="Closed - No Show">Closed - No Show</option>
<option value="Closed - Not Approved">Closed - Not Approved</option>
<option value="Closed - Could Not Reach">Closed - Could Not Reach</option>
<option value="Closed - Rescheduled">Closed - Rescheduled</option>
</select><br>

<label for="priority">Priority</label><select  id="priority" name="priority"><option value="">--None--</option><option value="High">High</option>
<option value="Medium">Medium</option>
<option value="Low">Low</option>
</select><br>

<label for="reason">Case Reason</label><select  id="reason" name="reason"><option value="">--None--</option><option value="User didn&#39;t attend training">User didn&#39;t attend training</option>
<option value="Complex functionality">Complex functionality</option>
<option value="Existing problem">Existing problem</option>
<option value="Instructions not clear">Instructions not clear</option>
<option value="New problem">New problem</option>
<option value="Appraisal - Acreage">Appraisal - Acreage</option>
<option value="Appraisal - Comps">Appraisal - Comps</option>
<option value="Appraisal - Ops Internal Process">Appraisal - Ops Internal Process</option>
<option value="Appraisal - TurnTime and TU Ops">Appraisal - TurnTime and TU Ops</option>
<option value="Appraisal - Coverage &amp; Quality">Appraisal - Coverage &amp; Quality</option>
<option value="Client Appraiser - not in TU network">Client Appraiser - not in TU network</option>
<option value="Client Training - general">Client Training - general</option>
<option value="CS product training &amp; Client training">CS product training &amp; Client training</option>
<option value="Faxes, TU internal process (Ops &amp; CS)">Faxes, TU internal process (Ops &amp; CS)</option>
<option value="Integration issue">Integration issue</option>
<option value="Need established SLAs">Need established SLAs</option>
<option value="Search - Internal Quality">Search - Internal Quality</option>
<option value="Search - Ops Internal Process">Search - Ops Internal Process</option>
<option value="Search - TurnTime &amp; TU Ops Process">Search - TurnTime &amp; TU Ops Process</option>
<option value="System Issue">System Issue</option>
<option value="TU internal process - dup. order process">TU internal process - dup. order process</option>
<option value="TU/Client Comm. - TU Internal QA Process">TU/Client Comm. - TU Internal QA Process</option>
<option value="TU/Client Comm.">TU/Client Comm.</option>
<option value="TU/Client Comm. - Client prod trng">TU/Client Comm. - Client prod trng</option>
<option value="TU/Client Comm. - Client web trng">TU/Client Comm. - Client web trng</option>
<option value="TU/Client Comm. - CS prod trng">TU/Client Comm. - CS prod trng</option>
<option value="TU/Client Comm. - TU CS training">TU/Client Comm. - TU CS training</option>
<option value="VM - abstractor coverage">VM - abstractor coverage</option>
<option value="VM - abstractor non resp.">VM - abstractor non resp.</option>
<option value="VM - abstractor quality and TU Ops">VM - abstractor quality and TU Ops</option>
<option value="VM - abstractor training">VM - abstractor training</option>
<option value="VM - apprsl coverage">VM - apprsl coverage</option>
<option value="VM - apprsl coverage and screening">VM - apprsl coverage and screening</option>
<option value="VM - apprsl coverage and TU Ops">VM - apprsl coverage and TU Ops</option>
<option value="VM - apprsl coverage-remote locations">VM - apprsl coverage-remote locations</option>
<option value="VM - non resp. apprsr">VM - non resp. apprsr</option>
<option value="VM - non resp. apprsr and TU Ops">VM - non resp. apprsr and TU Ops</option>
<option value="VM - non resp. apprsr, quality/TU Ops">VM - non resp. apprsr, quality/TU Ops</option>
<option value="VM - Quality &amp; TU Ops process">VM - Quality &amp; TU Ops process</option>
<option value="VM - add / remove process">VM - add / remove process</option>
<option value="VM - unique property &amp; TU Ops process">VM - unique property &amp; TU Ops process</option>
<option value="Website training/CS assistance">Website training/CS assistance</option>
</select><br>

<label for="recordType">Case Record Type</label><select  id="recordType" name="recordType"><option value="">--None--</option><option value="012500000001CjY">DQ DFS Support</option>
<option value="012500000001AXM">DQ Training Type</option>
<option value="012500000001AXH">DQ Trouble Ticket Type</option>
</select><br>

<label>Process/Training:</label><select  id="00N50000001Z4na" name="00N50000001Z4na" title="Process/Training"><option value="">--None--</option><option value="Process">Process</option>
<option value="Training (Internal)">Training (Internal)</option>
<option value="Training (External)">Training (External)</option>
<option value="Training (Internal/External)">Training (Internal/External)</option>
<option value="Other">Other</option>
</select><br>

<label>AOR:</label><select  id="00N50000001Z4nf" name="00N50000001Z4nf" title="AOR"><option value="">--None--</option><option value="Accounting">Accounting</option>
<option value="Client Care">Client Care</option>
<option value="Closing">Closing</option>
<option value="Customer Service">Customer Service</option>
<option value="Flood">Flood</option>
<option value="Funding">Funding</option>
<option value="Integration">Integration</option>
<option value="Order Entry">Order Entry</option>
<option value="Recording">Recording</option>
<option value="Sales">Sales</option>
<option value="Search">Search</option>
<option value="Title">Title</option>
<option value="Valuations">Valuations</option>
<option value="Vendor Management">Vendor Management</option>
</select><br>

<label>DQ Product:</label><select  id="00N50000001r355" name="00N50000001r355" title="DQ Product"><option value="">--None--</option><option value="AVMFinder">AVMFinder</option>
<option value="BillPay">BillPay</option>
<option value="Block">Block</option>
<option value="Collateral Validation">Collateral Validation</option>
<option value="Data File Enhancement">Data File Enhancement</option>
<option value="Data File License">Data File License</option>
<option value="DQ Express">DQ Express</option>
<option value="FinderSuite">FinderSuite</option>
<option value="ForeclosureFinder">ForeclosureFinder</option>
<option value="GoTitle (AMS)">GoTitle (AMS)</option>
<option value="Home Value Explorer">Home Value Explorer</option>
<option value="IB List">IB List</option>
<option value="List Tools">List Tools</option>
<option value="Mail Merge (Word)">Mail Merge (Word)</option>
<option value="Market Intelligence">Market Intelligence</option>
<option value="N/A">N/A</option>
<option value="Online">Online</option>
<option value="Other">Other</option>
<option value="Plat Maps">Plat Maps</option>
<option value="PPCD">PPCD</option>
<option value="PrimeraSource">PrimeraSource</option>
<option value="Professional Information Center">Professional Information Center</option>
<option value="PropertyFinder">PropertyFinder</option>
<option value="PropertyFinder 2G">PropertyFinder 2G</option>
<option value="ProspectFinder">ProspectFinder</option>
<option value="ProspectFinder - Demographics">ProspectFinder - Demographics</option>
<option value="ProspectFinder FARM">ProspectFinder FARM</option>
<option value="ProspectFinder - Foreclosures">ProspectFinder - Foreclosures</option>
<option value="ShareData">ShareData</option>
<option value="SkyFarm">SkyFarm</option>
<option value="TitleShare">TitleShare</option>
<option value="Tops">Tops</option>
<option value="TrendFinder">TrendFinder</option>
<option value="Uknown">Uknown</option>
<option value="Valuator">Valuator</option>
<option value="ValueSmart">ValueSmart</option>
<option value="WebAMS">WebAMS</option>
<option value="WebGen">WebGen</option>
<option value="XML">XML</option>
</select><br>

<label>Computer Type:</label><select  id="00N50000001r35A" name="00N50000001r35A" title="Computer Type"><option value="">--None--</option><option value="PC">PC</option>
<option value="Mac">Mac</option>
</select><br>

<label>Operating System:</label><select  id="00N50000001r35F" name="00N50000001r35F" title="Operating System"><option value="">--None--</option><option value="Win 95">Win 95</option>
<option value="Win 98">Win 98</option>
<option value="Win NT">Win NT</option>
<option value="Win 2000">Win 2000</option>
<option value="Win XP">Win XP</option>
<option value="Win Vista">Win Vista</option>
<option value="MAC OS">MAC OS</option>
<option value="Win 7">Win 7</option>
<option value="Windows 8">Windows 8</option>
</select><br>

<label>Browser:</label><select  id="00N50000001r35G" name="00N50000001r35G" title="Browser"><option value="">--None--</option><option value="Internet Explorer">Internet Explorer</option>
<option value="Chrome">Chrome</option>
<option value="Netscape">Netscape</option>
<option value="AOL">AOL</option>
<option value="FireFox">FireFox</option>
<option value="Safari">Safari</option>
<option value="Other">Other</option>
</select><br>

<label>AT Number:</label><input  id="00N50000001r35K" maxlength="20" name="00N50000001r35K" size="20" type="text" /><br>

<label>Category:</label><select  id="00N50000001r35L" name="00N50000001r35L" title="Category"><option value="">--None--</option><option value="Account Clarification/Contract Copies">Account Clarification/Contract Copies</option>
<option value="Account Changes">Account Changes</option>
<option value="Add or Change User">Add or Change User</option>
<option value="Add or Change Password">Add or Change Password</option>
<option value="Add or Change products">Add or Change products</option>
<option value="Login Problem">Login Problem</option>
<option value="Collections">Collections</option>
<option value="Clarification">Clarification</option>
<option value="Credit Limit">Credit Limit</option>
<option value="Dispute">Dispute</option>
<option value="Incorrrect Setup">Incorrrect Setup</option>
<option value="My.Dataquick Bill Pay">My.Dataquick Bill Pay</option>
<option value="Payment">Payment</option>
<option value="Usage Report">Usage Report</option>
<option value="Credit Request">Credit Request</option>
<option value="Other billing Issues">Other billing Issues</option>
<option value="Out of Business">Out of Business</option>
<option value="Lost to competitor">Lost to competitor</option>
<option value="Pricing">Pricing</option>
<option value="Product Issues">Product Issues</option>
<option value="Don&#39;t use product">Don&#39;t use product</option>
<option value="Lack of Data Coverage">Lack of Data Coverage</option>
<option value="Service Issues">Service Issues</option>
<option value="Correction Request">Correction Request</option>
<option value="Countywide Issue -Escalated">Countywide Issue -Escalated</option>
<option value="Explanation/Clarification">Explanation/Clarification</option>
<option value="Other Data Issue">Other Data Issue</option>
<option value="Expand Data Coverage">Expand Data Coverage</option>
<option value="New Data Element">New Data Element</option>
<option value="Improve User Interface">Improve User Interface</option>
<option value="New search feature">New search feature</option>
<option value="New output feature">New output feature</option>
<option value="New product">New product</option>
<option value="Browser/OS Compatibility">Browser/OS Compatibility</option>
<option value="Data CD">Data CD</option>
<option value="Install CD">Install CD</option>
<option value="Plat Map CD">Plat Map CD</option>
<option value="Key Requests">Key Requests</option>
<option value="Other Requests">Other Requests</option>
<option value="Data Coverage">Data Coverage</option>
<option value="Outage">Outage</option>
<option value="Output issue">Output issue</option>
<option value="Request for Training">Request for Training</option>
<option value="Search issue">Search issue</option>
<option value="User Interface">User Interface</option>
<option value="New Training">New Training</option>
<option value="Re-Training">Re-Training</option>
<option value="Other">Other</option>
<option value="Inquiry">Inquiry</option>
<option value="Conversion">Conversion</option>
<option value="Referral">Referral</option>
<option value="Title Cancellation Inquiry">Title Cancellation Inquiry</option>
</select><br>

<label>Training Date:</label><span class="dateInput dateOnlyInput"><input  id="00N50000001rEQH" name="00N50000001rEQH" size="12" type="text" /></span><br>

<label>Training Time:</label><input  id="00N50000001rEQM" maxlength="10" name="00N50000001rEQM" size="20" type="text" /><br>

<label>Training Phone:</label><input  id="00N50000001rGKk" maxlength="40" name="00N50000001rGKk" onkeydown="formatPhoneOnEnter(this, event);" size="20" type="text" /><br>

<label>Impact:</label><textarea  id="00N50000001rvKv" name="00N50000001rvKv" type="text" wrap="soft"></textarea><br>

<label>Web Account Infranet Number:</label><input  id="00N500000027DPN" maxlength="50" name="00N500000027DPN" size="20" type="text" /><br>

<label>Campaign Name:</label><input  id="00N5000000295Kd" maxlength="255" name="00N5000000295Kd" size="20" type="text" /><br>

<label>Product Line:</label><select  id="00N50000002orOs" name="00N50000002orOs" title="Product Line"><option value="">--None--</option><option value="Credit">Credit</option>
<option value="Data and Analytics">Data and Analytics</option>
<option value="Decisioning">Decisioning</option>
<option value="Flood">Flood</option>
<option value="Property Research &amp; Marketing">Property Research &amp; Marketing</option>
<option value="Valuation and Validation">Valuation and Validation</option>
</select><br>

<input type="hidden"  id="external" name="external" value="1" /><br>
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
<br />
<input type="image" name="submit" value="SUBMIT" src="<?php bloginfo('template_url'); ?>/images/<?php echo is_page_template('dqdirect.php') ? 'direct_sub' : 'contact_sub'; ?>.png" align="right" />
<!--input type="submit" name="submit"-->

</form>