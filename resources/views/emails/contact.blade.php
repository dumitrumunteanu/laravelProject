<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <p class="fs-5 fw-bold">User requested attention:</p>
    <p><span class="fw-bold">User first name:</span> {{ $firstName }}</p>
    <p><span class="fw-bold">User last name:</span> {{ $lastName }}</p>
    <p><span class="fw-bold">User email:</span> {{ $email }}</p>
    <p><span class="fw-bold">Department to contact:</span> {{ $department }}</p>
    <p><span class="fw-bold">User message:</span> <br> {{ $content }}</p>
</body>
</html>
