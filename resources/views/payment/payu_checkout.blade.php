<!DOCTYPE html>
<html>
<head>
    <title>Redirecting to PayU...</title>
</head>
<body onload="document.forms['payuForm'].submit()">
    <h2>Please wait, you are being redirected to the payment gateway...</h2>

    <form action="{{ $action }}" method="POST" name="payuForm">
        @csrf
        <input type="hidden" name="key" value="{{ $MERCHANT_KEY }}">
        <input type="hidden" name="hash" value="{{ $hash }}">
        <input type="hidden" name="txnid" value="{{ $txnid }}">
        <input type="hidden" name="amount" value="{{ $amount }}">
        <input type="hidden" name="firstname" value="{{ $firstname }}">
        <input type="hidden" name="email" value="{{ $email }}">
        <input type="hidden" name="phone" value="{{ $phone }}">
        <input type="hidden" name="productinfo" value="{{ $productinfo }}">
        <input type="hidden" name="surl" value="{{ url('/payment/success') }}">
        <input type="hidden" name="furl" value="{{ url('/payment/failure') }}">
        <input type="hidden" name="service_provider" value="{{ $service_provider }}">
        <noscript>
            <input type="submit" value="Click here if you are not redirected automatically">
        </noscript>
    </form>
</body>
</html>
