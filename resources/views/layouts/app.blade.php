<html>

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="colorlib.com">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    <link href="css/main.css" rel="stylesheet" />
    <title>ArKa::Shortener</title>
    <livewire:styles />
    <livewire:scripts />
  </head>

  <body>

    {{$slot}}

  </body><!-- This templates was made by Colorlib (https://colorlib.com) -->

  <script>
    document.getElementById('btn').onclick = function() {
        document.getElementById('result').style.display = 'none';
    }
  </script>
</html>