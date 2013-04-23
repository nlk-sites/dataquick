<?php
// selected state / office
$selected_state = $entry['1'];
$selected_office = null;
$offices_array = array(51,52,53,54,55,56,57,59,60,61,62,63,64,65,66,67,68,69,88,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,87,89); // array of field id's for each state with offices in form
foreach($offices_array as $v) {
	if(!empty($entry[$v])) {
		$selected_office = $entry[$v];
	}
}
// title policy check boxes
$title_policy = array();
$title_policy[1] = (empty($entry['112.1'])) ? 'false' : 'true';
$title_policy[2] = (empty($entry['112.2'])) ? 'false' : 'true';
$title_policy[3] = (empty($entry['112.3'])) ? 'false' : 'true';
$title_policy[4] = (empty($entry['112.3'])) ? null : $entry['32'];
// format phone numbers
function format_phone_us($phone = '', $convert = true, $trim = true)
{
	if (empty($phone)) {
		return false;
	}
	// Strip out any extra characters that we do not need only keep letters and numbers
	$phone = preg_replace("/[^0-9A-Za-z]/", "", $phone);
	// Keep original phone in case of problems later on but without special characters
	$originalPhone = $phone;

	// If we have a number longer than 11 digits cut the string down to only 11
	// This is also only ran if we want to limit only to 11 characters
	if ($trim == true && strlen($phone)>11) {
		$phone = substr($phone, 0, 11);
	}
	// Do we want to convert phone numbers with letters to their number equivalent?
	if ($convert == true && !is_numeric($phone)) {
		$replace = array('2'=>array('a','b','c'),
				 '3'=>array('d','e','f'),
				 '4'=>array('g','h','i'),
				 '5'=>array('j','k','l'),
				 '6'=>array('m','n','o'),
				 '7'=>array('p','q','r','s'),
				 '8'=>array('t','u','v'),
				 '9'=>array('w','x','y','z'));
		// Replace each letter with a number
		// Notice this is case insensitive with the str_ireplace instead of str_replace 
		foreach($replace as $digit=>$letters) {
			$phone = str_ireplace($letters, $digit, $phone);
		}
	}
	$length = strlen($phone);
	// Perform phone number formatting here
	switch ($length) {
		case 7:
			// Format: xxx.xxxx
			return preg_replace("/([0-9a-zA-Z]{3})([0-9a-zA-Z]{4})/", "$1.$2", $phone);
		case 10:
			// Format: xxx.xxx.xxxx
			return preg_replace("/([0-9a-zA-Z]{3})([0-9a-zA-Z]{3})([0-9a-zA-Z]{4})/", "$1.$2.$3", $phone);
		case 11:
			// Format: x.xxx.xxx.xxxx
			return preg_replace("/([0-9a-zA-Z]{1})([0-9a-zA-Z]{3})([0-9a-zA-Z]{3})([0-9a-zA-Z]{4})/", "$1.$2.$3.$4", $phone);
		default:
			// Return original phone if not 7, 10 or 11 digits long
			return $originalPhone;
	}
}


$xml = '<?xml version="1.0" encoding="utf-8"?>'.
'<REQUEST_GROUP MISMOVersionID="2.3">'.
	'<REQUESTING_PARTY _Name="' . $entry['2'] . '" _StreetAddress="' . $entry['40'] . '" _StreetAddress2="' . $entry['41'] . '" _City="' . $entry['42'] . '" _State="' . $entry['43'] . '" _PostalCode="' . $entry['44'] . '">'.
		'<CONTACT_DETAIL _Name="' . $entry['2'] . '">'.
			'<CONTACT_POINT _RoleType="Work" _Type="Phone" _Value="' . format_phone_us($entry['8']) . '" />'.
			'<CONTACT_POINT _RoleType="Work" _Type="Fax" _Value="' . format_phone_us($entry['9']) . '" />'.
			'<CONTACT_POINT _RoleType="Work" _Type="Email" _Value="' . $entry['7'] . '" />'.
			'<CONTACT_POINT _RoleType="Work" _Type="Phone" _Value="' . format_phone_us($entry['8']) . '" />'.
		'</CONTACT_DETAIL>'.
	'</REQUESTING_PARTY>'.
	'<SUBMITTING_PARTY _Name="' . $entry['3'] . '" _StreetAddress="' . $entry['40'] . '" _StreetAddress2="' . $entry['41'] . '" _City="' . $entry['42'] . '" _State="' . $entry['43'] . '" _PostalCode="' . $entry['44'] . '">'.
		'<CONTACT_DETAIL _Name="' . $entry['2'] . '" />'.
		'<PREFERRED_RESPONSE _Destination="' . $entry['7'] . '" />'.
	'</SUBMITTING_PARTY>'.
	'<REQUEST RequestDatetime="' . date('n/d/Y g:i:s A', strtotime($entry['date_created'])) . '">'. // 4/15/2013 7:29:42 PM
		'<KEY _Name="OrderNumber" _Value="' . 'RTW' . ( 20000000 + $entry['id'] ) . '" />'. // RTW10000531
		'<KEY _Name="OrderRecordID" _Value="" />'. //
		'<KEY _Name="VendorID" _Value="99999" />'. // '99999'
		'<KEY _Name="ORSTransactionID" _Value="" />'.
		'<REQUEST_DATA>'.
			'<TITLE_REQUEST _ActionType="Original" _Comment="'.
					'Office Selected:' . $selected_state . ' ' . $selected_office . ';'.
					'AdditionalComments:' . $entry['16'] . ';'. // was missing ; for initial testing
					'Requester Company:' . $entry['3'] . ';'.
					'Lendor Name:' . $entry['12'] . ';'.
					'Lendor Phone:' . format_phone_us($entry['14']) . ';'.
					'AU #:' . $entry['4'] . ';'. // NotProvided;
					'Property Owner:' . $entry['21'] . ';'.
					'Property Owner ' . $entry['23'] . ':' . format_phone_us($entry['22']) . ';'.
					'Property Owner ' . $entry['25'] . ':' . format_phone_us($entry['24']) . ';'.
					'Title Policy to be issued Other:' . $title_policy[3] . $title_policy[4] . ';'.
					'Title Policy to be issued Owner:' . $title_policy[1] . ';'.
					'Title Policy to be issued Lender:' . $title_policy[2] . ';'.
					'Closing Services Req:' . $entry['33.1'] . ';'.
					'DataQuick Title to Close:' . $entry['114.1'] . ';'.
					'Project Closing Date:' . date('m/d/Y', strtotime($entry['36'])) . ';'. // 04/30/2013
					'Tax Parcel Number:' . $entry['37'] . ';'.
					'Second Home Address:' . $entry['123'] . ';'.
					'Second Home Address2:' . $entry['122'] . ';'.
					'Second Home City:' . $entry['121'] . ';'.
					'Second Home County:' . $entry['124'] . ';'.
					'Second Home State:' . $entry['120'] . ';'.
					'Second Home Zip:' . $entry['119'] . '">'.
				'<BORROWER _SequenceIdentifier="" _FirstName="' . $entry['91'] . '" _LastName="' . $entry['92'] . '" _SSN="" MaritalStatusType="' . $entry['99'] . '">'.
					'<_RESIDENCE _StreetAddress="' . $entry['93'] . '" _City="' . $entry['95'] . '" _State="' . $entry['96'] . '" _PostalCode="' . $entry['97'] . '" />'.
					'<CONTACT_POINT _RoleType="Home" _Type="Phone" _Value="" />'.
					'<CONTACT_POINT _RoleType="Work" _Type="Phone" _Value="' . format_phone_us($entry['98']) . '" />'.
				'</BORROWER>'.
				'<LOAN_PURPOSE />'.
				'<MORTGAGE_TERMS BorrowerRequestedLoanAmount="' . $entry['29'] . '" LenderCaseIdentifier="' . 'LOAN' . ( 20000000 + $entry['id'] ) . '" MortgageType="' . $entry['28'] . '" LoanEstimatedClosingDate="' . date('m/d/Y', strtotime($entry['36'])) . '" />'. // 04/30/2013
				'<PROPERTY _StreetAddress="' . $entry['45'] . '" _City="' . $entry['47'] . '" _State="' . $entry['49'] . '" _County="' . $entry['48'] . '" _PostalCode="' . $entry['50'] . '" StructureBuiltYear="" EstimatedValueAmount="' . $entry['30'] . '">'.
					'<_LEGAL_DESCRIPTION _TextDescription="" />'.
				'</PROPERTY>'.
				'<_PRODUCT>'.
					'<_NAME _Description="' . $entry['34'] . '" />'.
				'</_PRODUCT>'.
				'<SELLER _FirstName="' . $entry['101'] . '" _StreetAddress="' . $entry['103'] . '" _StreetAddress2="' . $entry['108'] . '" _City="' . $entry['110'] . '" _State="' . $entry['107'] . '" _PostalCode="' . $entry['106'] . '" MaritalStatusType="' . $entry['104'] . '">'.
					'<CONTACT_DETAIL>'.
						'<CONTACT_POINT _RoleType="Work" _Type="Phone" _Value="' . format_phone_us($entry['105']) . '" />'.
					'</CONTACT_DETAIL>'.
				'</SELLER>'.
			'</TITLE_REQUEST>'.
		'</REQUEST_DATA>'.
	'</REQUEST>'.
'</REQUEST_GROUP>';

?>