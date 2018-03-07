<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require './vendor/autoload.php';

//api function
use \PayPal\Rest\ApiContext;
use \PayPal\Auth\OAuthTokenCredential;
use \PayPal\Api\PaymentExecution;

//adds
use \PayPal\Api\Payer;
use \PayPal\Api\Amount;
use \PayPal\Api\Payment;
use \PayPal\Api\Details;
use \PayPal\Api\Transaction;
use \PayPal\Api\RedirectUrls;
use \PayPal\Exception\PPConnectionException;

class Donate_model extends CI_Model 
{
	public function getApi()
	{
		$api = new ApiContext(
          new OAuthTokenCredential(
            $this->config->item('userID'),
            $this->config->item('secretPass')
          )
        );

        $api->setConfig([
            'mode' => $this->config->item('ppMode'),
            'http.ConnectionTimeOut' => 30,
            'log.LogEnabled' => false,
            'log.FileName' => 'logsPaypal',
            'log.LogLevel' => 'FINE',
            'validation.level' => 'log'
        ]);

        return $api;
	}

	public function getSpecifyDonate($id)
	{
		return $this->db->select('*')
				->where('id', $id)
				->get('fx_donate');
	}

    public function getDonate($id)
    {
    	$payer = new Payer();
    	$details = new Details();
    	$amount = new Amount();
    	$transaction = new Transaction();
    	$payment = new Payment();
    	$redirectUrls = new RedirectUrls();

    	$setTax = $this->getSpecifyDonate($id)->row('tax');
    	$setPrice = $this->getSpecifyDonate($id)->row('price');
    	$setTotal = ($setTax+$setPrice);

    	//Payer
    	$payer->setPaymentMethod('paypal');

    	//details
    	$details->setShipping('0.00')
	    ->setTax($setTax)
	    ->setSubtotal($setPrice);
		
		$amount->setCurrency($this->config->item('currencyType'))
	    ->setTotal($setTotal)
	    ->setDetails($details);

    	//transaction
    	$transaction->setAmount($amount);

    	//payment
    	$payment->setIntent('sale')
    		->setPayer($payer)
    		->setTransactions([$transaction]);

    	//redirect urls
   		$redirectUrls->setReturnUrl(base_url('donate/complete/'.$id))
   			->setCancelUrl(base_url('donate/cancelled'));

   		$payment->setRedirectUrls($redirectUrls);

   		try {
		    $payment->create($this->getApi());

		    $hash = md5($payment->getId());

		    //prepare and execute
		    $dataInsert = array(
				'user_id' => $this->session->userdata('fx_sess_id'),
				'payment_id' => $payment->getId(),
				'hash' => $hash,
				'total' => $payment->transactions[0]->amount->total,
				'create_time' => $payment->create_time
			);
			$this->db->insert('fx_donate_history', $dataInsert);

		} catch (PayPal\Exception\PayPalConnectionException $e) {
		    echo $e->getData();
		    die();
		}

   		foreach ($payment->getLinks() as $key => $link) {
   			if ($link->getRel() == 'approval_url') {
   				$redirectUrl = $link->getHref();
   			}
   		}

   		header('Location: ' .$redirectUrl);
    }

    public function completeTransaction($donate, $id)
    {
    	$qq = $this->db->select('complete')
    			->where('payment_id', $id)
    			->get('fx_donate_history')
    			->row('complete');

    	if($qq == '1')
    		redirect(base_url('donate/notfound'),'refresh');
    	else
    	{
    		//complete transaction
    		$data = array( 'complete' => '1' );
	    	$this->db->where('payment_id', $id)
    			->update('fx_donate_history', $data);

    		//insert dp
    		$dp = $this->getSpecifyDonate($donate)->row('points');
    		$dp = ($this->getActualDP()+$dp);

    		$this->db->set('dp', $dp)
	    		->where('accountid', $this->session->userdata('fx_sess_id'))
    			->update('fx_credits');

    		redirect(base_url('donate'),'refresh');
    	}
    }

    public function getDonations()
    {
    	return $this->db->select('*')
    		->get('fx_donate');
    }

    public function getActualDP()
    {
    	$qq = $this->db->select('dp')
    		->where('accountid', $this->session->userdata('fx_sess_id'))
    		->get('fx_credits');

    	if($qq->num_rows())
    		return $qq->row('dp');
    	else
    	{
    		$this->db->set('accountid', $this->session->userdata('fx_sess_id'))
    			->set('dp', '0')
				->insert('fx_credits');
			return '0';
    	}
    }
}