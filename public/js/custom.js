// stripe
jQuery(document).ready(function(){
   var stripe = Stripe('pk_test_DSagUxE2vRz5HJzkuK8PQLz2');
var elements = stripe.elements();
var style = {
  base: {
    // Add your base input styles here. For example:
    fontSize: '16px',
    color: "#32325d",
  }
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

card.addEventListener('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Create a token or display an error when the form is submitted.
var form = document.getElementById('payment-form');

//form.addEventListener('submit', function(event) {
    $('.pay_click').click(function(event){
        
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the customer that there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });

function stripeTokenHandler(token) {
   
    console.log(token);
    
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}
});
});


//Quantity change
jQuery(document).ready(function(){
    // This button will increment the value
    $('.qtyplus').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[id='+fieldName+']').val());
        // If is not undefined
        if (!isNaN(currentVal)) {
            // Increment
            $('input[id='+fieldName+']').val(currentVal + 1);
        } else {
            // Otherwise put a 0 there
            $('input[id='+fieldName+']').val(1);
        }
    });
    // This button will decrement the value till 0
    $(".qtyminus").click(function(e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        
        // Get its current value
        var currentVal = parseInt($('input[id='+fieldName+']').val());
        // If it isn't undefined or its greater than 0
        if (!isNaN(currentVal) && currentVal > 1) {
            // Decrement one
            $('input[id='+fieldName+']').val(currentVal - 1);
        } else {
            // Otherwise put a 0 there
            $('input[id='+fieldName+']').val(1);
        }
    });
});
  jQuery(document).ready(function(){
    // This button will increment the value
    $('.qtyplus').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('price');
        // Get its actual value
        var val = parseInt($('input[id='+fieldName+']').attr('st_value'));
        // Get its current value
        var currentVal = parseInt($('input[id='+fieldName+']').val());
        // If is not undefined
        if (!isNaN(currentVal)) {
            // Increment
            $('input[id='+fieldName+']').val(currentVal + val);
        } else {
            // Otherwise put a 0 there
            $('input[id='+fieldName+']').val(val);
        }
    });
    // This button will decrement the value till 0
    $(".qtyminus").click(function(e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('price');
        // Get its current value
        var val = parseInt($('input[id='+fieldName+']').attr('st_value'));
        var currentVal = parseInt($('input[id='+fieldName+']').val());
        // If it isn't undefined or its greater than 0
        if (!isNaN(currentVal) && currentVal > val) {
            // Decrement one
            $('input[id='+fieldName+']').val(currentVal - val);
        } else {
            // Otherwise put a 0 there
            $('input[id='+fieldName+']').val(val);
        }
    });
});

$(".pay_card_click").click(function(){
    
    $(".pay_form").show();
   
   
});

// btn on delivery
   $(".pay_ondelivery").click(function(){
   
    $(".pay_form").hide();
});

   function markNotificationAsRead(){
    var url ='markAsRead';
    $.get(url);
   }