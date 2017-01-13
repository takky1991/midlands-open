<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>The HTML5 Herald</title>
    <meta name="description" content="The HTML5 Herald">
    <meta name="author" content="SitePoint">
</head>

<body>
    <h1>Message from user {{$contact_form->name}} ({{$contact_form->email}})</h1>
    <p>{{$contact_form->message}}</p>
</body>
</html>