@include('user/partials/header')
<div class="d-flex justify-content-center">
    <div class="col-md-6">
        @include('messages')
        <form action="{{route('pay')}}" method="post">
            @csrf
            <div class="form-group">
                <label>Payment Name</label>
                <input class="au-input au-input--full" type="text" name="payment_name">
            </div>
         
            <div class="form-group">
                <label>Payment Amount</label>
                <input class="au-input au-input--full" type="text" name="payment_amount">
            </div>
            <div class="form-group">
                <label>Payment Description</label>
                <input class="au-input au-input--full" type="text" name="payment_description">
            </div>
            <div class="form-group">
                <label>Card Number</label>
                <input class="au-input au-input--full" type="number" name="card_number">
            </div>
            <div class="form-group">
                <label>Card CVC</label>
                <input class="au-input au-input--full" type="number" name="card_cvc">
            </div>
            <div class="form-group">
                <label>Expiry Month</label>
                <input class="au-input au-input--full" type="number" name="card_expiry_month">
            </div>
            <div class="form-group">
                <label>Expiry Year</label>
                <input class="au-input au-input--full" type="number" name="card_expiry_year">
            </div>
            <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" style="background: black; color:white;">pay</button>
        </form>
    </div>
</div>
@include('user/partials/footer')