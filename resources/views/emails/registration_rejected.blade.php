<!DOCTYPE html>
<html>
<head>
    <title>Club Registration Rejected</title>
</head>
<body>
    <p>Dear {{ $data['name'] }},</p>

    <p>We regret to inform you that your registration for the <strong>{{ $data['club'] }}</strong> club has been <b>rejected</b>.</p>

    <p>If you believe this is a mistake or have any questions, feel free to reach out to the club coordinator.</p>

    <p>Regards,<br>Club Admin</p>
</body>
</html>
