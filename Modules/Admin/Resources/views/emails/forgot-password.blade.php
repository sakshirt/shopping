<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
<h2></h2>
<p>Hi {{ $data->name }},</p>

<p>
    We received a request to reset your Divine Impex password.
    You can directly change your password by clicking on the button below.
</p>

<p>
    <a href="{{ route('admin.reset.password', [$data->id,   $data->token]) }}"><button>RESET</button></a>
</p>
</body>
</html>