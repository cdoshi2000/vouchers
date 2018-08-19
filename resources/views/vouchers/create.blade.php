<h1>Create Vouchers</h1>
@if (!empty($errors))
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form id="voucherForm" method="POST" action="/generate">
    Special offer name: <input type="text" name="offerName"><br>
    Percentage discount: <input type="text" name="discount"><br>
    Expiry date(YYYY-MM-DD): <input type="text" name="expiryDate"><br>
    <input type="submit" value="Submit">
</form>
