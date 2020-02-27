<?php
$arr  = ['слово','еще слово', 'и еще одно'];
$a = 'let str = "'.implode('//',$arr).'"';
?>
<!doctype html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>
  <script>
    <?= $a ?>;

    let arr = str.split('//');
    console.log(arr);
    
    
    
  </script>
</body>
</html>
