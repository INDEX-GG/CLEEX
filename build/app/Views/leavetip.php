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
        <form class="paytip__wrapper">
            <input class="paytip__sum" name="summ" type="text"/>
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
                <!-- <button class="button_pay"><div>Оплатить картой</div><img src="./topkatpl/img/gpay.svg"/></button> -->
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
    'gateway': 'OPEN',
    'gatewayMerchantId': '000000000051993'
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
      paymentsClient.createButton({onClick: onGooglePaymentButtonClicked});
  document.getElementById('container').appendChild(button);
}


function getGoogleTransactionInfo() {
  return {
        displayItems: [
        {
          label: "Subtotal",
          type: "SUBTOTAL",
          price: "11.00",
        },
      {
          label: "Tax",
          type: "TAX",
          price: "20.00",
        }
    ],
    countryCode: 'US',
    currencyCode: "USD",
    totalPriceStatus: "FINAL",
    totalPrice: "31.00",
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
}</script>
<script async
  src="https://pay.google.com/gp/p/js/pay.js"
  onload="onGooglePayLoaded()"></script>
<script src="./topkatpl/js/bundle.js"></script>
</html>