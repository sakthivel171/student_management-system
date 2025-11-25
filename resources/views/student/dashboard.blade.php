<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Welcome to student Dashboard</h1>
<p>Hello {{ Auth::guard('student')->user()->name }}!</p>

<form method="POST" action="">
    @csrf
    <button type="submit">Logout</button>
</form>
</body>
</html>