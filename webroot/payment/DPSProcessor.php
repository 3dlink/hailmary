<?php


include "PxPay_OpenSSL.inc.php";

class DPSProcessor {


    private $PxPay_Url    = "https://sec.paymentexpress.com/pxaccess/pxpay.aspx";
    private $PxPay_Userid = "FanPassPxP_Dev"; #Important! U
    private $PxPay_Key    =  "9ee39b943bb27aa0329c1a14593e0235682fdbb615d489385e5c3286ee42fff9"; #Important! Update with your Key

    public function __construct($userId, $key) {
        $this->PxPay_Userid = $userId;
        $this->PxPay_Key = $key;
        $this->pxpay = new PxPay_OpenSSL( $this->PxPay_Url, $this->PxPay_Userid, $this->PxPay_Key );
    }

    public function redirectToGateway($transactionId, $reference, $amount, $txtData, $email, $success, $fail) {


        
        $request = new PxPayRequest();
        $request->setMerchantReference($reference);
        $request->setAmountInput($amount);
        $request->setTxnData1($txtData);
        $request->setTxnType("Purchase");
        $request->setCurrencyInput("NZD");
        $request->setEmailAddress($email);
        $request->setUrlFail($fail);                    # can be a dedicated failure page
        $request->setUrlSuccess($success);                 # can be a dedicated success page
        $request->setTxnId($transactionId);

        $request_string = $this->pxpay->makeRequest($request);

        $response = new MifMessage($request_string);

        $url = $response->get_element_text("URI");
        $valid = $response->get_attribute("valid");

        
       
        return $url;
        // header("Location: ".$url);

    }

    public function getResponse() {
    	  $enc_hex = $_REQUEST["result"];
		  $rsp = $this->pxpay->getResponse($enc_hex);

		  $response = array(

		  # the following are the fields available in the PxPayResponse object
			  'Success'           => intval($rsp->getSuccess()),   # =1 when request succeeds
			  'amount'  		  => $rsp->getAmountSettlement(),
			  'AuthCode'          => $rsp->getAuthCode(),  # from bank
			  'CardNumber'        => $rsp->getCardNumber(), # Truncated card number
			  'DpsBillingId'      => $rsp->getDpsBillingId(),
			  'BillingId'         => $rsp->getBillingId(),
			  'CardHolderName'    => $rsp->getCardHolderName(),
			  'DpsTxnRef'         => $rsp->getDpsTxnRef(),
			  'TxnType'           => $rsp->getTxnType(),
			  'TxnData'           => $rsp->getTxnData1(),
			  'ClientInfo'        => $rsp->getClientInfo(), # The IP address of the user who submitted the transaction
			  'TransactionId'     => $rsp->getTxnId(),
			  'EmailAddress'      => $rsp->getEmailAddress(),
			  'MerchantReference' => $rsp->getMerchantReference(),
			  'ResponseText'      => $rsp->getResponseText(),
		  );

		  return $response;
	}



}


?>