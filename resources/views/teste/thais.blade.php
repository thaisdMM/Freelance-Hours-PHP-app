

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Thais</title>
</head>
<body>
   
  <?php echo 'oi Thaís'; ?>

  <?php foreach(range(1,20)as $key):?>

   <li><?php echo $key; ?></li>

   <?php endforeach; ?>


   
   @foreach(range(1,20) as $key)

      <li>{{ $key}}</li>

   @endforeach

</body>
</html>