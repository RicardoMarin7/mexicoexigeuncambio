<?php

namespace App;

use Paypalpayment;

class PayPal
{
	private $_apiContext;
	private $shopping_cart;
	private $_ClientId = "AUEHEDKRxYRPh2SqTJjjoGgT_L--6AXpHMAfIm-UQhTd2k_vpdmwK6wnASMGdpt_s9QSY0NioBngmiw6";
	private $_ClientSecret = "EDIORC78FTOLappHUz-zOIggXWkekmls4C7VUy4LrROx_dUXEsNr82HE6AfHhI4P_YlM8E2GuiQHBxF5";

	public function __construct($shopping_cart)
	{
		$this->_apiContext = PayPalPayment::ApiContext($this->_ClientId, $this->_ClientSecret);

		$config = config("paypal_payment");
		$flatConfig = array_dot($config);

		$this->_apiContext->setConfig($flatConfig);

		$this->shopping_cart = $shopping_cart;
	}

	public function generate($items)
	{
		$payment = PayPalPayment::payment()->setIntent("sale")->setPayer($this->payer())->setTransactions([$this->transaction($items)])->setRedirectUrls($this->redirectURLs());

		try {
			$payment->create($this->_apiContext);
		} catch(\Exception $ex) {
			dd($ex);
			exit(1);
		}

		return $payment;
	}

	public function payer()
	{
		return PayPalPayment::payer()->setPaymentMethod("paypal");
	}

	public function transaction($items)
	{
		return PayPalPayment::transaction()->setAmount($this->amount())->setItemList($this->items($items));
	}

	public function amount()
	{
		return PayPalPayment::amount()->setCurrency("MXN")->setTotal($this->shopping_cart);
	}

	public function redirectURLs()
	{
		$baseURL = url("/");
		return PayPalPayment::redirectUrls()->setReturnUrl("$baseURL/payments/store")->setCancelUrl("$baseURL/carrito");
	}

	public function items($items)
	{
		return PayPalPayment::itemList()->setItems($items);
	}

	public function execute($paymentId, $payerId)
	{
		$payment = PayPalPayment::getById($paymentId, $this->_apiContext);
		$execution = PayPalPayment::PaymentExecution()->setPayerId($payerId);
		
		return $payment->execute($execution, $this->_apiContext);
	}
}