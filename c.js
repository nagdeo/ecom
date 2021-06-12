
      var customCheckout = customcheckout();
      var cardNumber = customCheckout.create('card-number')
       cardNumber.mount('#card-number')
       var cardNumber = customCheckout.create('card-cvv')
       cardNumber.mount('#card-cvv')
       var cardNumber = customCheckout.create('card-expiry')
       cardNumber.mount('#card-expiry');
    
    
       customCheckout.on('error', function(event) {
         if (event.field === 'card-number') {
           console.log('Card number has errors: ' + JSON.stringify(event));
          } else if (event.field === 'cvv') {
             console.log('CVV has errors: ' + JSON.stringify(event));
          } else if (event.field === 'expiry') {
             console.log('Expiry has errors: ' + JSON.stringify(event));
         }
       });

       customCheckout.on('complete', function(event) {
    if (event.field === 'card-number') {
      console.log('Card number is complete: ' + JSON.stringify(event));
    } else if (event.field === 'cvv') {
      console.log('CVV is complete: ' + JSON.stringify(event));
    } else if (event.field === 'expiry') {
      console.log('Expiry is complete: ' + JSON.stringify(event));
    }
});

customCheckout.createToken(function (result) {
  if (result.error) {
    console.log(result.error.message);
   console.log("yes")
  } else {
    console.log(result.token);
    // process token using our Payments API
  }
});

