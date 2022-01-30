<script>
  window.ParsleyConfig = {
      errorsWrapper: '<div></div>',
      errorTemplate: '<div class="alert alert-danger parsley" role="alert"></div>',
      errorClass: 'has-error',
      successClass: 'has-success'
  };
</script>

<script src="//parsleyjs.org/dist/parsley.js"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script>
  Stripe.setPublishableKey("<?php echo env('STRIPE_PUBLISHABLE_SECRET') ?>");
  jQuery(function($) {
      $('#payment-form').submit(function(event) {
          var $form = $(this);
          $form.parsley().subscribe('parsley:form:validate', function(formInstance) {
              formInstance.submitEvent.preventDefault();
              alert();
              return false;
          });
          $form.find('#submitBtn').prop('disabled', true);
          Stripe.card.createToken($form, stripeResponseHandler);
          return false;
      });
  });
  function stripeResponseHandler(status, response) {
      var $form = $('#payment-form');
      if (response.error) {
          $form.find('.payment-errors').text(response.error.message);
          $form.find('.payment-errors').addClass('alert alert-danger');
          $form.find('#submitBtn').prop('disabled', false);
          $('#submitBtn').button('reset');
      } else {
          var token = response.id;
          $form.append($('<input type="hidden" name="stripeToken" />').val(token));
          $form.get(0).submit();
      }
  };
</script>