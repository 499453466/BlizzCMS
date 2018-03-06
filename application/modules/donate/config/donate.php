<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
	Currency to use available with PayPal
	CHeck the options: 
	https://developer.paypal.com/docs/classic/api/currency_codes/
*/
$config['currencyType'] = 'USD';

/*
	Mode PayPal
	* sandbox
	* live
*/
$config['ppMode'] = 'sandbox';

/* 
	Client id
	https://developer.paypal.com/developer/applications
*/
$config['userID'] = 'AeEKmkcWH_NGf5Uxkoos5ESv3fffSBnlC1b-BJTAUF2vP02Klwa_IXXzUKqtP1tGZHF_gCRPjNjyBo7V';

/* 
	secret password
	https://developer.paypal.com/developer/applications
*/
$config['secretPass'] = 'EEaly2bYOVTbv1hsMPesPESGF-fFyFm_HMWij_0mFiiRAEibc-SdSeqCMPFlF0ziuzsZXNcBXxecsn2V';