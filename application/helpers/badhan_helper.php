<?php
/**
 * return true if valid bangladeshi telephone
 * otherwise return false
 * 
 * @param string $telephone 11digit telephone number
 * @return boolean
 */

function bangladeshi_telephone($telephone){

	$pattern = '/^[0][1](1|5|6|7|8|9)\d{8}$/';
	
	if(preg_match($pattern, $telephone) == 1){
		return TRUE;
	}
	else {
		return FALSE;
	}
}

function about_organogram($organogram_type, $about){
	if(!empty($about)){
		return $about;
	}else {
		$about = config_item('about_organogram');
		switch ($organogram_type){
			case  'CENTRAL' :
				return $about['CENTRAL'];	
			case  'ZONE' :
				return $about['ZONE'];
			case  'UNIT' :
				return $about['UNIT'];
			case  'FAMILY' :
				return $about['FAMILY'];
			default:
				return 'No about data found';

		}
	}
}



function eagerness_scale_label($value){
	switch ($value){
		case 0:
			return 'I am not willing to donate';
		case 1:
			return 'Donate in very Emergency case';
		case 2:
			return 'Donate in sometimes';
		case 3:
			return 'Donate in regular basis';
		case 4:
			return 'I am dedicated to donate';
	}
}
/**
 *  
 * @param unknown $donation_date
 * @return string 2014-08-31 (+43 days ago)
 */

function last_donation($donation_date){
	if(empty($donation_date) || $donation_date == '0000-00-00'){
		return 'Not Specified';
	}else {
		$dStart = new DateTime($donation_date);
	   $dEnd  = new DateTime();
	   $dDiff = $dStart->diff($dEnd);
	   //echo $dDiff->format('%R'); // use for point out relation: smaller/greater
	   return  $donation_date.' ('.$dDiff->format('%R').''.$dDiff->days.' days ago)';
	}
	
}

function valid_height($height){
	if(preg_match('/^[3-8]\'(([0-9]|(1[0-1]))("|\'\'))?$/', $height)) return true;
	
	else return false;
}

function empty_date($date){
	if(empty($date) || $date == '0000-00-00') return TRUE;
	else return false;
}

function calculate_age($dob){

	$dob = date("Y-m-d",strtotime($dob));

	$dobObject = new DateTime($dob);
	$nowObject = new DateTime();

	$diff = $dobObject->diff($nowObject);

	return $diff->y;

}