<!DOCTYPE html>
<html>
<head>
    <title>Fuelin.com</title>
</head>
<body>
    <h1>Hello {{ $user['name'] }},</h1>

    <p>Email -  {{ $user['email'] }}</p>
    <p>Vehical Number - {{ $customer['vehical_number'] }}</p>
    <p>Amount - ${{ $quota['qty'] }}</p>
    <p>Date and Time - {{ $quota['date'] }}</p>
    <p>Thank you</p>
</body>
</html>
