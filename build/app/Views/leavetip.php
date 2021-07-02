<!DOCTYPE html>
<html lang="ru">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="minimum-scale=1, initial-scale=1, width=device-width" />
   <meta name="theme-color" content="#192021" />
   <link rel="icon" href="./topkatpl/favicon.ico" />
   <link href="./topkatpl/css/style.min.css" rel="stylesheet">
   <link rel="apple-touch-icon" href="./topkatpl/logo192.png" />
   <link rel="manifest" href="./topkatpl/manifest.json" />
   <link rel="preload" href="./topkatpl/fonts/topka_font.woff" as="font" crossorigin="anonymous" />
   <title>Topka Reborn</title>
</head>

<body>
   <div class="wrapper theme">
      <nav class="nav">
         <a class='nav__back'></a>
         <div class='nav__pos'>Оставить чаевые</div>
      </nav>
      <div class="paytip">
        <div class = "paytip__waiter">
           <div class="paytip__pic avatar"></div>
           <div class="paytip__name"></div>
           <div class="paytip__credo"></div>
        </div>
        <form class="paytip__wrapper" action='https://3dstest.mdmbank.ru/cgi-bin/cgi_link'>
            <input class="paytip__sum"  type="text"/> 
            <div class="paytip__choiseSum">
                 <div class="button_mini button_mini_grey">100</div>
                 <div class="button_mini button_mini_grey">200</div>
                 <div class="button_mini button_mini_grey">300</div>
                 <div class="button_mini button_mini_grey">500</div>
            </div>
            <div class="paytip__review">
                 <div class="paytip__review__title">Вам всё понравилось?</div>
                 <div class="paytip__starRating">
                     <div class="star">&#xe903;</div>
                     <div class="star">&#xe903;</div>
                     <div class="star">&#xe903;</div>
                     <div class="star">&#xe903;</div>
                     <div class="star">&#xe903;</div>
                 </div>
                 <input class="paytip__review__input" placeholder="Ваш отзыв"/>
                 <button class="button button_blue review_button">Оставить отзыв</button>
                 
               </div>
            <div class="paytip__buttons">
				<!-- <input name="CARD" value='5543725660917340'/> -->
				<!-- <select name='EXP'>
					<option value="01">01 January</option>
					<option value="02">02 February</option>
					<option value="03">03 March</option>
					<option value="04">04 April</option>
					<option value="05">05 May</option>
					<option value="06">06 June</option>
					<option value="07">07 July</option>
					<option value="08">08 August</option>
					<option value="09">09 September</option>
					<option value="10">10 October</option>
					<option value="11">11 November</option>
					<option value="12">12 December</option>
				</select> -->
				<!-- <select name="EXP_YEAR">
					<option value="21">2021</option>
					<option value="22">2022</option>
					<option value="23">2023</option>
					<option value="24">2024</option>
					<option value="25">2025</option>
				</select> -->
				<!-- <input name="CVC2" value='087'/>
				<select name="CVC2_RC">
					<option selected value="1">CVC2 is present</option>
					<option value="0">CVC2 is not provided</option>
					<option value="2">CVC2 is illegible</option>
					<option value="9">No CVC2 on card</option>
				</select> -->
				<div>Сумма: <input name="AMOUNT" type='text' value='150.56'/></div>
				<div>Валюта: <input name="CURRENCY" value="RUB" /></div>
				<div>ID заказа (>6): <input name="ORDER" value='4565465465654' /></div>
				<div>Описание заказа:<input name="DESC" value="TESTPAY" /></div>
				<input name="MERCH_NAME" value="CLEEX" />
				<!-- <input name="MERCH_TOKEN_ID" value="000000000051992" /> -->
				<input name="MERCH_URL" value="https://cleex.ru/topka/leavetip"/>
				<input name="MERCHANT" value="000000000051992" />
				<input name="TERMINAL" value="00051992" />
				<input name="EMAIL" value="slideryo@gmail.com"/>
				<input name="TRTYPE" type="hidden" value="0"/>
				<input name="COUNTRY" type="hidden" value=''/>
				<input name="MERCH_GMT" type="hidden" value='5'/>
				<input name="TIMESTAMP" type="hidden" id='timestamp'/>
				<input name="NONCE" type="hidden" id='nonce'/>
				<input name="BACKREF" type="hidden" value="https://cleex.ru/topka/leavetip"/>
				<input name='P_SIGN' type="hidden" id='psign'/>
                <button class="button_pay" type="submit" name='SEND_BUTTON'><div>Оплатить картой</div><img src="./topkatpl/img/credit-card.svg"/></button>
				<button class="button_pay"  id='payCardButton'><div>Собрать данные</div><img src="./topkatpl/img/credit-card.svg"/></button>
                <div id="container"></div>
            </div>
            <div class="paytip__checks">
                <label class="checkbox">
                    <input type="checkbox" checked/>
                    <div class="checkbox__text">Я хочу взять на себя комиссию сотрудника (20 ₽)</div>
                 </label>
                 <label class="checkbox">
                    <input type="checkbox" checked/>
                    <div class="checkbox__text">Я согласен с условиями Пользовательского соглашения и Политики обработки персональных данных</div>
                 </label>
            </div>
         </form>
     </div>
   </div>
</body>

<script>
	const baseRequest = {
	apiVersion: 2,
	apiVersionMinor: 0
  };
  
  const allowedCardNetworks = ["AMEX", "DISCOVER", "INTERAC", "JCB", "MASTERCARD", "VISA"];
  
  const allowedCardAuthMethods = ["PAN_ONLY", "CRYPTOGRAM_3DS"];
  
  const tokenizationSpecification = {
	type: 'PAYMENT_GATEWAY',
	parameters: {
	  'gateway': 'example',
	  'gatewayMerchantId': 'exampleGatewayMerchantId'
	}
  };

  const baseCardPaymentMethod = {
	type: 'CARD',
	parameters: {
	  allowedAuthMethods: allowedCardAuthMethods,
	  allowedCardNetworks: allowedCardNetworks
	}
  };
  
  const cardPaymentMethod = Object.assign(
	{},
	baseCardPaymentMethod,
	{
	  tokenizationSpecification: tokenizationSpecification
	}
  );
  
  let paymentsClient = null;
  
  function getGoogleIsReadyToPayRequest() {
	return Object.assign(
		{},
		baseRequest,
		{
		  allowedPaymentMethods: [baseCardPaymentMethod]
		}
	);
  }
  
  
  function getGooglePaymentDataRequest() {
	const paymentDataRequest = Object.assign({}, baseRequest);
	paymentDataRequest.allowedPaymentMethods = [cardPaymentMethod];
	paymentDataRequest.transactionInfo = getGoogleTransactionInfo();
	paymentDataRequest.merchantInfo = {
	  // @todo a merchant ID is available for a production environment after approval by Google
	  // See {@link https://developers.google.com/pay/api/web/guides/test-and-deploy/integration-checklist|Integration checklist}
	  // merchantId: '12345678901234567890',
	  merchantName: 'Example Merchant'
	};
  
	paymentDataRequest.callbackIntents = ["PAYMENT_AUTHORIZATION"];
  
	return paymentDataRequest;
  }
  
  function getGooglePaymentsClient() {
	if ( paymentsClient === null ) {
	  paymentsClient = new google.payments.api.PaymentsClient({
		  environment: 'TEST',
		paymentDataCallbacks: {
		  onPaymentAuthorized: onPaymentAuthorized
		}
	  });
	}
	return paymentsClient;
  }
  
  function onPaymentAuthorized(paymentData) {
		  return new Promise(function(resolve, reject){
	  // handle the response
	  processPayment(paymentData)
	  .then(function() {
		resolve({transactionState: 'SUCCESS'});
	  })
	  .catch(function() {
		resolve({
		  transactionState: 'ERROR',
		  error: {
			intent: 'PAYMENT_AUTHORIZATION',
			message: 'Insufficient funds',
			reason: 'PAYMENT_DATA_INVALID'
		  }
		});
		  });
	});
  }
  
  function onGooglePayLoaded() {
	const paymentsClient = getGooglePaymentsClient();
	paymentsClient.isReadyToPay(getGoogleIsReadyToPayRequest())
		.then(function(response) {
		  if (response.result) {
			addGooglePayButton();
		  }
		})
		.catch(function(err) {
		  // show error in developer console for debugging
		  console.error(err);
		});
  }
  
  function addGooglePayButton() {
	const paymentsClient = getGooglePaymentsClient();
	const button =
		paymentsClient.createButton({
			onClick: onGooglePaymentButtonClicked,
			buttonSizeMode: 'fill',
			buttonColor: 'white',
			});
	document.getElementById('container').appendChild(button);
  }
  
  function getGoogleTransactionInfo() {
	return {
		  displayItems: [
		  {
			label: "Subtotal",
			type: "SUBTOTAL",
			price: "200.00",
		  },
		{
			label: "Tax",
			type: "TAX",
			price: "20.00",
		  }
	  ],
	  countryCode: 'RU',
	  currencyCode: "RUB",
	  totalPriceStatus: "FINAL",
	  totalPrice: "220.00",
	  totalPriceLabel: "Total"
	};
  }
  
  function onGooglePaymentButtonClicked() {
	const paymentDataRequest = getGooglePaymentDataRequest();
	paymentDataRequest.transactionInfo = getGoogleTransactionInfo();
  
	const paymentsClient = getGooglePaymentsClient();
	paymentsClient.loadPaymentData(paymentDataRequest);
  }
  
  function processPayment(paymentData) {
		  return new Promise(function(resolve, reject) {
		  setTimeout(function() {
				  // @todo pass payment token to your gateway to process payment
				  paymentToken = paymentData.paymentMethodData.tokenizationData.token;
  
		  resolve({});
	  }, 3000);
	});
  }
</script>

<script src="./topkatpl/js/bundle.js"></script>
<script
  async
  src="https://pay.google.com/gp/p/js/pay.js"
  onload="onGooglePayLoaded()"
></script>

</html>