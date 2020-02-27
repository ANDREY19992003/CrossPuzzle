<!doctype html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Обработка словаря русских слов</title>
</head>
<body>
<?
  //The CODE removes duplicate words and enters end-to-end word numbering in the IDD
  
  include 'site_components/db.php'; //connect the db.php, and there are paths and settings to our database.
  $countDel=0; // counter of deleted words
  $countWord=0; // the word counter
  
  for ($i=1; $i<=29372; $i++) { //29372
    $j=$i+1;
    $result_1=$mysqli->query("SELECT * FROM `nouns` WHERE `IID`='$i'"); 
    $result_1=$result_1->fetch_assoc();
    $word_1=$result_1["word"];
    $result_2=$mysqli->query("SELECT * FROM `nouns` WHERE `IID`='$j'"); 
    $result_2=$result_2->fetch_assoc();
    $word_2=$result_2["word"];
    
      if($word_1 == $word_2) {
        $mysqli->query("DELETE FROM `nouns` WHERE `IID`='$j'"); 
        $countDel++;
        echo $result_1["word"];
        echo ' <br >';
        echo $result_2["word"];
        echo ' <br >';
      }
      else {
        $countWord++;
        $mysqli->query("UPDATE `nouns` SET `IID`= '$countWord' WHERE (`IID`='$i')"); //
      }
  }
  echo 'Удалено слов: '.$countDel.'<br>Всего слов: '.$countWord;
?>
</body>
</html>