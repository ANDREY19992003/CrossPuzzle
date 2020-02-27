<?PHP
session_start();//Session initialization-function
  header('content-type: text/html; charset=utf-8');
  $title="Кросспазл";
  //The CODE creates a two-dimensional array of words [i][index], where [i] takes values from 3 to 8 (the number of letters in the word), and [index] - the index of the word itself in the dimension [i].
  include 'site_components/db.php'; //connect the db.php, and there are paths and settings to our database.
  
  $arrWord = array(array()); //declare a two-dimensional array of dictionary words
  for($i=3; $i<=8; $i++) { //number of letters in a word
  $result=$mysqli->query("SELECT * FROM `nouns` WHERE `code`='$i'"); //find all database objects with the condition code=$i and put them in $result
  $rows=mysqli_num_rows($result); //find the total number of database objects that meet the code=$i condition.
  $index=0; //index of an array of words that meet the condition code=$i
  while($res=$result->fetch_assoc()) {
    $arrWord[$i][$index]=$res['word'];
    $index++;
  };
  }
  
  $amountWords=0;
  for($i=3; $i<=8; $i++) {
    $amountWords+=count($arrWord[$i]);
  }
  // the code snippet takes a random word of 8 letters and compares it with other words from a set of letters less than or equal to 8
  // if the letters match with the descendants of a word of 8 letters, an array of words for the crossword is formed !!!
  //$str="папуас";
  $str=$arrWord[8][rand(1, count($arrWord[8]))];
  
  $arrKross = array(); //declaring a one-DIMENSIONAL array of crossword words
  $iKross=0; //counter of words (the extra variable)

  for($jKross=3; $jKross<=8; $jKross++) {
    
    for ($j=0; $j<count($arrWord[$jKross]); $j++) {
      $str1=$str; // in str (a copy of str1), we store the base word (the letters of which make up the following words)
      $str2=$arrWord[$jKross][$j]; //in str2, put the next word from the dictionary (the jcross layer)
      
      for($i=0;$i<mb_strlen($str2);$i++) { //the loop iterates through all the letters str2 and looks for the occurrence of the next letter from str2 in the " database"
        
        $posLetter=mb_strpos($str1, mb_substr($str2,$i,1)); //returns the position where the letter appears in the string str1. If the letter is not found, returns FALSE
        if ($posLetter === false) {
          break(1);
        }
        else {
          $str1=mb_substr ($str1, 0, $posLetter).mb_substr ($str1, $posLetter+1); //cut out the base copy of the letter, which is included in str2, and go to the beginning of the cycle.
        }
      }
      
      
      if ($i==mb_strlen($str2)) { //if i=the length of the word from the array, it means that all the letters of the word str2 were in the base word
        $arrKross[$iKross]=$str2; //write str2 to an array of words for a crossword puzzle.
        $iKross++;
      }
    }
  }
 // print_r($arrKross);
  //echo "<br>";
  //BUILDING a crossword Puzzle
  $spaceKross = array(); //the grid of the crossword field is a one-dimensional array X*X, where x is>$valueSpaceKross
  $wordsKross = array(array()); //array of objects of coordinates of words included in the crossword puzzle from the array of words array (the word itself, the position of the beginning horizontally, vertically, the length of the word, true (horizon or vertical);
  
  $valueSpaceKross=15; //the size of the crossword grid
  
  for ($i=1;$i<=$valueSpaceKross;$i++) {
    for ($j=1;$j<=$valueSpaceKross;$j++) $spaceKross[$i][$j]="_";
  }
  
  
  for($i=0;$i<mb_strlen($str);$i++) $spaceKross[8][4+$i]=mb_substr($str,$i,1); //placed a random 8-letter word in the middle of the grid (and horizontally)
  $wordsKross [0]= array($str, 8, 4, mb_strlen($str), true); //and remember it with the coordinates in the array of objects words that got into the crossword

  // START OF THE MONSTER BLOCK
  $arrKrossDubl = $arrKross; //auxiliary array of crossword words (double)
  
  for($i=count($arrKrossDubl); $i>0;$i--) { //delete the base word from the double array (the one that is already entered in word cross)
    if ($arrKrossDubl[$i-1]==$str) {
      array_splice($arrKrossDubl, $i-1,1);
      break;
    }
  }

// place the second word-the first one vertically (randomly)
  $str1 = $wordsKross[0][0];
  $i=count($arrKrossDubl);
  $str2=$arrKrossDubl[$i-1];
  
  $j=rand(0,mb_strlen($str2)-1); // select the random position of the letter 
  
  $posLetter=mb_strpos($str1, mb_substr($str2,$j,1)); //returns the position where the letter appears in the string str1. If the letter is not found, returns FALSE

  if ($posLetter!==false) {
    for($k=0;$k<mb_strlen($str2);$k++) {
        $spaceKross[8-$j+$k][4+$posLetter]=mb_substr($str2,$k,1); //enter the letters of the word in the grid of the crossword field
    }
    array_push($wordsKross, array($str2, 8-$j, 4+$posLetter, mb_strlen($str2), false));
    array_splice($arrKrossDubl, $i-1,1);  
  }
  else {echo "posLetter = ".$posLetter."<br>str1 = ".$str1."<br>str2 = ".$str2."<br>".mb_substr($str2,$j,1); 
  
  exit();}

  function vertical() { // VERTICAL LAYOUT FUNCTION
  
  global $arrKrossDubl, $valueSpaceKross, $spaceKross, $wordsKross, $arrKrossDubl;
  
  for ($i=count($arrKrossDubl); $i>0;$i--) {  //we try to place all the words vertically
    $str0 = $arrKrossDubl[$i-1];
    
    for($l=0;$l<$valueSpaceKross;$l++) {
      for ($j=0;$j<$valueSpaceKross;$j++) {
        if ($spaceKross[$l][$j]!='_'and $spaceKross[$l-1][$j-1]=='_' 
                                    and $spaceKross[$l-1][$j+1]=='_' 
                                    and $spaceKross[$l+1][$j-1]=='_' 
                                    and $spaceKross[$l+1][$j+1]=='_') { //found a letter on the grid + word touch control
          $posLetter=mb_strpos($str0, $spaceKross[$l][$j]); //check if this letter is in $str0? If the letter is not found, returns FALSE
          if($posLetter!==false) {
            $posLetter1=$posLetter2=$posLetter;
            for($x=$posLetter; $x<mb_strlen($str0);$x++) {// check if there are other letters on the path of the word $str0
              if ($spaceKross[$l+$x-$posLetter+1][$j]!='_') { //check if this letter is in $str0? If the letter is not found, returns FALSE
                if($spaceKross[$l+$x-$posLetter+1][$j]!=mb_substr($str0,$x+1,1)) $posLetter1=false; //there is another letter, compare it with the letter at the same position from the next one found from $str0 
              }
              else if ($spaceKross[$l+$x-$posLetter+1][$j-1]!='_' or $spaceKross[$l+$x-$posLetter+1][$j+1]!='_') $posLetter1=false;
            }
            
            for($x=$posLetter; $x>0;$x--) {// check if there are any other letters on the way back $str0
              if ($spaceKross[$l+$x-$posLetter-1][$j]!='_') { //check if this letter is in $str0? If the letter is not found, returns FALSE
                if($spaceKross[$l+$x-$posLetter-1][$j]!=mb_substr($str0,$x-1,1)) $posLetter2=false;
              }
              else if ($spaceKross[$l+$x-$posLetter-1][$j-1]!='_' or $spaceKross[$l+$x-$posLetter-1][$j+1]!='_') $posLetter2=false;
            }
            
            
            if($posLetter and $posLetter1 and $posLetter2 
                                          and (($spaceKross[$l-$posLetter-1][$j]=='_') or ($l-$posLetter)==1)
                                          and (($spaceKross[$l-$posLetter+mb_strlen($str0)][$j]=='_') or ($l-$posLetter+mb_strlen($str0)-1)==$valueSpaceKross)) //control of the word out of the field
            {
            
              for($k=0;$k<mb_strlen($str0);$k++) {
                $spaceKross[$l-$posLetter+$k][$j]=mb_substr($str0,$k,1); //enter the letters of the word in the grid of the crossword field
              }
              array_push($wordsKross, array($str0, $l-$posLetter, $j, mb_strlen($str0), false));
              array_splice($arrKrossDubl, $i-1,1);
              break(2);
            }
          }
        }
      }  
    }
  }  
  }
  
  function horizontal() { // THE FUNCTION OF THE LAYOUT HORIZONTALLY
  
  global $arrKrossDubl, $valueSpaceKross, $spaceKross, $wordsKross, $arrKrossDubl;
  
  for ($i=count($arrKrossDubl); $i>0;$i--) {  //пытаемся разместить все слова по горизонтали
    $str0 = $arrKrossDubl[$i-1];
    
    for($l=0;$l<$valueSpaceKross;$l++) {
      for ($j=0;$j<$valueSpaceKross;$j++) {
       
        if ($spaceKross[$l][$j]!='_'and $spaceKross[$l-1][$j-1]=='_' 
                                    and $spaceKross[$l-1][$j+1]=='_' 
                                    and $spaceKross[$l+1][$j-1]=='_' 
                                    and $spaceKross[$l+1][$j+1]=='_') { //found a letter on the grid + word touch control
          $posLetter=mb_strpos($str0, $spaceKross[$l][$j]); //check if this letter is in $str0? If the letter is not found, returns FALSE
                        
          if($posLetter!==false) {
              
            $posLetter1=$posLetter2=$posLetter;
            for($x=$posLetter; $x<mb_strlen($str0);$x++) {// check if there are other letters on the path of the word $str0
              if ($spaceKross[$l][$j+$x-$posLetter+1]!='_') { //check if this letter is in $str0? If the letter is not found, returns FALSE
                if($spaceKross[$l][$j+$x-$posLetter+1]!=mb_substr($str0,$x+1,1)) $posLetter1=false; //there is another letter, compare it with the letter at the same position from the next one found from $str0
              }
              else if ($spaceKross[$l-1][$j+$x-$posLetter+1]!='_' or $spaceKross[$l+1][$j+$x-$posLetter+1]!='_') $posLetter1=false;
            }
            
            for($x=$posLetter; $x>0;$x--) {// check if there are any other letters on the way back $str0
              if ($spaceKross[$l][$j+$x-$posLetter-1]!='_') { //check if this letter is in $str0? If the letter is not found, returns FALSE
                if($spaceKross[$l][$j+$x-$posLetter-1]!=mb_substr($str0,$x-1,1)) $posLetter2=false;
              }
              else if ($spaceKross[$l-1][$j+$x-$posLetter-1]!='_' or $spaceKross[$l+1][$j+$x-$posLetter-1]!='_') $posLetter2=false;
            }
            
          
            if($posLetter!==false and $posLetter1!==false and $posLetter2!==false
                                          and ($spaceKross[$l][$j-$posLetter-1]=='_' or ($j-$posLetter)==1) 
                                          and ($spaceKross[$l][$j-$posLetter+mb_strlen($str0)]=='_' or ($j-$posLetter+mb_strlen($str0)-1)==$valueSpaceKross))
            {
            
              for($k=0;$k<mb_strlen($str0);$k++) {
                $spaceKross[$l][$j-$posLetter+$k]=mb_substr($str0,$k,1); //enter the letters of the word in the grid of the crossword field
              }
              array_push($wordsKross, array($str0, $l, $j-$posLetter, mb_strlen($str0), true));
              array_splice($arrKrossDubl, $i-1,1);
              
              break(2);
            }
          }
        }
      }  
    }
  }
  }
  
  //***************************************************************
  
  vertical();
  horizontal();
  vertical();
  horizontal();
  
  $str1=$str;
  for($i=0;$i<mb_strlen($str);$i++) { //creating an array - a set of letters for the dialog box (in random order)
    $posLetter=rand(0,mb_strlen($str1)-1);
    $setLetters[$i]=mb_substr($str1,$posLetter,1);
    $str1=mb_substr ($str1, 0, $posLetter).mb_substr ($str1, $posLetter+1);
  }
  //shrill "method from the boss" of passing an array from the PHP area to the SCRIPT area
  $strArrKross = 'let strArrKross = "'.implode('//',$arrKross).'"'; 
  for($i=0;$i<count($wordsKross);$i++) {
    $wordsKrossName[$i]=$wordsKross[$i][0];
    $wordsKrossGrznt[$i]=$wordsKross[$i][1];
    $wordsKrossVert[$i]=$wordsKross[$i][2];
    $wordsKrossTrue[$i]=$wordsKross[$i][4];
  }
  
  $strWordsKrossName = 'let strWordsKrossName = "'.implode('//',$wordsKrossName).'"'; 
  $strWordsKrossGrznt = 'let strWordsKrossGrznt = "'.implode('//',$wordsKrossGrznt).'"'; 
  $strWordsKrossVert = 'let strWordsKrossVert = "'.implode('//',$wordsKrossVert).'"'; 
  $strWordsKrossTrue = 'let strWordsKrossTrue = "'.implode('//',$wordsKrossTrue).'"';
  
  $strValueSpaceKross = 'let valueSpaceKross = "'.$valueSpaceKross.'"'; // we will also pass the variable (grid size) from the PHP area to the SCRIPT area
  
  include 'site_components/header.php';
 
?>