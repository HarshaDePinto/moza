<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Welcome You For Mozita {{ $level }} Programme </h2>
  <p><a href="https://mozita.co.nz/">Mozita Group New Zealand</a></p>
  <div class="card" style="width:100%">
    <img class="card-img-top" src="{{ asset('public/moza/img/slider/students.jpg') }}" alt="Card image" style="width:100%">
    <div class="card-body">
      <h4 class="card-title">{{ $title }}{{ $name }}</h4>
      <p class="card-text">your academic advisor will contact you within two working hours </p>
      <a href="https://mozita.co.nz/" class="btn btn-primary">Thank You!!!</a>
    </div>
  </div>
  <br>

</div>

</body>
</html>

