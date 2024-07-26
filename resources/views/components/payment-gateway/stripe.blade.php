<form action="{{ route('stripe.post') }}" method="POST" id="payment-form">
    @csrf
    <div class="form-group">
        <label for="card-element p-5">
            <b>Enter your credit card or debit card details</b>
        </label>
        <div id="card-element">
            <div class="row pt-4">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="cc_number">Credit Card Number</label>
                        
                        <input id="cc_number" class="form-control"  type="tel" inputmode="numeric" pattern="[0-9\s]{13,19}" 
                        autocomplete="cc-number" maxlength="19"  name="cc_number"
                        placeholder="xxxx xxxx xxxx xxxx" required>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="expiry">Expiry</label>
                        <input type="text" class="form-control" id="expiry" name="expiry">
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="cvc">CVC</label>
                        <input type="text" class="form-control" id="cvc" name="cvc">
                    </div>
                </div>

            </div>
        </div>
        <div id="card-errors" role="alert"></div>
    </div>
    <button class="btn btn-primary pt-5">Submit Payment</button>
</form>
