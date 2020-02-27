<!doctype html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Обработка словаря русских слов</title>
</head>
<body>
<?
  //The CODE removes words from less than 3 letters and words from more than 8 letters, writes the length of each word to the dictionary, and enters end-to-end word numbering in IDD 
  
  include 'site_components/db.php'; //connect the db.php, and there are paths and settings to our database.
  $countDel=0; // counter of deleted words.
  $countWord=0; // word counter
  
  for ($i=0; $i<=65430; $i++) { //4159355 / 65430
    $result=$mysqli->query("SELECT * FROM `nouns` WHERE `IID`='$i'"); 
    $result=$result->fetch_assoc();
    if(isset($result)) { //this language construct Returns TRUE if var exists; otherwise, FALSE
      $lenWord=mb_strlen($result["word"]);
      if($lenWord<3 or $lenWord>8) {
        $mysqli->query("DELETE FROM `nouns` WHERE `IID`='$i'"); 
        $countDel++;
      }
      else {
        $countWord++;
        $mysqli->query("UPDATE `nouns` SET `code`= '$lenWord', `IID`= '$countWord' WHERE (`IID`='$i')"); 
      }
    }
  }
  echo 'Удалено слов: '.$countDel.'<br>Всего слов: '.$countWord;
?>
</body>
</html>