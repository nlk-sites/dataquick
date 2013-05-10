<?php

/* - - - - - EMAIL CONFIRMATION FORM - - - - - */
$office_info = $o_array[$state][$office];

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= "From: ".$office_info['email']."\r\n";
$headers .= "Reply-To: ".$office_info['email']."\r\n";

$subject = 'Order Placed with DataQuick Title';
$body = "<p>Hello ".$entry['2'].",</p>
<p>Thank you for placing your order with DataQuick Title. The details of your order appear below. Please let us know if you have any questions or concerns.</p>";

//open table
$body .= "<table style=\"border-top:1px solid black; border-bottom:1px solid black;\"><tbody>";

//<!-- Office Info -->
$body .= "<tr><th colspan=\"2\" style=\"text-align:left; text-indent:10px; margin-top:10px;\">Office Info</th></tr>
			<tr><td>Selected Office</td><td>".$state." ".$office."</td></tr>
			<tr><td>Address</td><td>".$office_info['address']."<br />
									".$office_info['address2']."<br />
									".$office_info['city'].", ".$office_info['state']." ".$office_info['zip']."<br /></td></tr>
			<tr><td>Phone</td><td>".$office_info['phone']."</td></tr>
			<tr><td>Fax</td><td>".$office_info['fax']."</td></tr>
			<tr><td>Email</td><td>".$office_info['email']."</td></tr>
			<tr><td colspan=\"2\"></td></tr>";

//<!-- General Info -->
$body .= "<tr><th colspan=\"2\" style=\"text-align:left; text-indent:10px; margin-top:10px;\">General Info</th></tr>
			<tr><td>Your Name</td><td>".$entry['2']."</td></tr>
			<tr><td>Company Name</td><td>".$entry['3']."</td></tr>
			<tr><td>Phone Number</td><td>".$entry['8']."</td></tr>
			<tr><td>Fax Number</td><td>".$entry['9']."</td></tr>
			<tr><td>Email Address</td><td>".$entry['7']."</td></tr>
			<tr><td>Address</td><td>".$entry['40']."</td></tr>
			<tr><td>Address 2</td><td>".$entry['41']."</td></tr>
			<tr><td>City</td><td>".$entry['42']."</td></tr>
			<tr><td>State</td><td>".$entry['43']."</td></tr>
			<tr><td>Zip</td><td>".$entry['44']."</td></tr>";

//<!-- Lender Info -->
$body .= "<tr><th colspan=\"2\" style=\"text-align:left; text-indent:10px; margin-top:10px;\">Lender Info</th></tr>
			<tr><td>Lender Name</td><td>".$entry['12']."</td></tr>
			<tr><td>Lender Loan Number</td><td>".$entry['13']."</td></tr>
			<tr><td>Lender Phone Number</td><td>".$entry['14']."</td></tr>
			<tr><td>AU Number</td><td>".$entry['4']."</td></tr>
			<tr><td>Comments</td><td>".$entry['16']."</td></tr>";

//<!-- Property Info -->
$body .= "<tr><th colspan=\"2\" style=\"text-align:left; text-indent:10px; margin-top:10px;\">Property Info</th></tr>
			<tr><td>Transaction Type</td><td>".$entry['20']." ".$entry['109']."</td></tr>
			<tr><td>Current Owner</td><td>".$entry['21']."</td></tr>
			<tr><td>Phone Number 1</td><td>".$entry['22']." - ".$entry['23']."</td></tr>
			<tr><td>Phone Number 2</td><td>".$entry['24']." - ".$entry['25']."</td></tr>
			<tr><td>Address</td><td>".$entry['45']." ".$entry['46']."</td></tr>
			<tr><td>City, County, State Zip</td><td>".$entry['47'].", ".$entry['48'].", ".$entry['49']." ".$entry['50']."</td></tr>
			<tr><td>2nd Home / Investment</td><td>".$entry['27.1']."</td></tr>
			<tr><td>Loan Type</td><td>".$entry['28']."</td></tr>
			<tr><td>Loan Amount</td><td>".$entry['29']."</td></tr>
			<tr><td>Sales Price</td><td>".$entry['30']."</td></tr>
			<tr><td>Title Policy to be Issued</td><td>".$entry['112.1']." ".$entry['112.2']." ".$entry['112.3']." ".$entry['32']."</td></tr>
			<tr><td>Closing Services Required?</td><td>".$entry['33.1']."</td></tr>
			<tr><td>Services</td><td>".$entry['34']."</td></tr>
			<tr><td>DataQuick Title to Close?</td><td>".$entry['114.1']."</td></tr>
			<tr><td>Projected Closing Date</td><td>".$entry['36']."</td></tr>
			<tr><td>Tax Parcel Number</td><td>".$entry['37']."</td></tr>";

//<!-- Borrower Info & Seller Info -->
$body .= ($entry['20'] == 'Sale') ? "<tr><th colspan=\"2\" style=\"text-align:left; text-indent:10px; margin-top:10px;\">Borrower Info</th></tr>
			<tr><td>Primary Name</td><td>".$entry['91']."</td></tr>
			<tr><td>Secondary Name</td><td>".$entry['92']."</td></tr>
			<tr><td>Address</td><td>".$entry['93']." ".$entry['94']."</td></tr>
			<tr><td>City, State Zip</td><td>".$entry['95'].", ".$entry['96']." ".$entry['97']."</td></tr>
			<tr><td>Phone Number</td><td>".$entry['98']."</td></tr>
			<tr><td>Marital Status</td><td>".$entry['99']."</td></tr>
			<tr><th colspan=\"2\" style=\"text-align:left; text-indent:10px; margin-top:10px;\">Seller Info</th></tr>
			<tr><td>Primary Name</td><td>".$entry['101']."</td></tr>
			<tr><td>Secondary Name</td><td>".$entry['102']."</td></tr>
			<tr><td>Address</td><td>".$entry['103']." ".$entry['108']."</td></tr>
			<tr><td>City, State Zip</td><td>".$entry['110'].", ".$entry['107']." ".$entry['106']."</td></tr>
			<tr><td>Phone Number</td><td>".$entry['105']."</td></tr>
			<tr><td>Marital Status</td><td>".$entry['104']."</td></tr>" : null;

//<!-- 2nd Home / Investment Info -->
$body .= ($entry['27.1'] == 'Yes') ? "<tr><th colspan=\"2\" style=\"text-align:left; text-indent:10px; margin-top:10px;\">2nd Home / Investment Info</th></tr>
<tr><td>Address</td><td>".$entry['123']." ".$entry['122']."</td></tr>
<tr><td>City, County, State Zip</td><td>".$entry['121'].", ".$entry['124'].", ".$entry['120']." ".$entry['119']."</td></tr>" : null;

//close table
$body .= "</tbody></table>";

//signature, etc.
$body .= "<p>&nbsp;<br />Thank you for your order.</p>
			<p>DataQuick Title</p>
			<p><img src=\"".home_url('/')."wp-content/themes/dqtitle/images/image001.jpg\" /></p>
			<p><a href=\"http://www.dataquicktitle.com\">www.dataquicktitle.com</a></p>
			<p style=\"font-size:8pt;\">The information contained in this electronic communication is intended only for the recipient named above. This communication may be confidential or privileged and exempt from disclosure under applicable law. If you are not an intended recipient, you are hereby notified that any dissemination, distribution or copying of this communication is strictly prohibited. If you have received this communication in error, please delete the original and all copies of it from your computer system; also delete or destroy all copies of this communication that you may have made in any other medium. Then notify the sender of the erroneous delivery. Thank you.</p>";

?>