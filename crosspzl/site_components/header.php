<? session_start()?>
<!doctype html> <!-- the initial page template https://bootstrap-4.ru/docs/4.3.1/getting-started/introduction/-->
<html lang="ru">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.5, minimum-scale=0.445, maximum-scale=0.5, shrink-to-fit=no"> <!-- The initial-scale property controls the zoom level when the page is first loaded -->
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title><?= $title ?></title> <!-- short recording echo $title  -->
    <style>
      body {
      margin: 0 auto;
      overflow: hidden; /*Only the area inside the element is displayed, the rest will be hidden*/
      -webkit-user-select: none; /* for Chrome и Safari */
      -moz-user-select: none; /* for Firefox */
      -ms-user-select: none; /* for IE 10+ */
      -o-user-select:none;
      -khtml-user-select: none;
      user-select: none; /* The user cannot select text and any nested elements. */
      }
      .popupGreeting {
        display: none;
        position: absolute;
        width: 80%;
        height: 100%;
        left: 8%;
        top: 30rem;
        overflow: auto;
        background-color: rgba (0,0,0,.4);
        z-index: 10;
      }
      .close {
        color: #aaa;
        font-size: 28px;
        font-weight: bold;
        margin-left: auto;
        cursor: pointer;
        
      }
      .close hover, 
      .close focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
      }
      .popup-header {
        color: white;
        background-color: #5c82b8;
        display: flex;
        padding: 0.5% 7% 0.5% 20.5%;
      }
      .popup-body {
        line-height: 3rem;
        padding: 0.5% 7% 0.5% 20.5%;
        color: #6C757D;
        font-size: 1.3rem;
      }
      .popup-footer {
        color: white;
        background-color: #5c82b8;
        padding: 0.5% 15% 0.5% 85%;
      }
      .popup-content {
        position: relative;
        background-color: #fefefe;
        margin: auto;
        padding: 0;
        border: 1px solid #888;
        width: 80%;
        box-shadow: 0 4px 8px 0 rgba(0,0,0,1), 0 6px 20px 0 rgba(0,0,0,1);
        animation-name: animatetop;
        animation-duration: 0.4s;
      }
      @keyframes animatetop {
         from {
             top: -300px;
             opacity: 0;
         }
         to {
             top: 0;
             opacity: 1;
         }
      }
      
      .container-fluid { 
        position: absolute;
        width: 60rem;
        left: 10rem;
        top: 20rem;
        z-index: 2;
      }
      #spaceKross { 
        border: 1px solid Gainsboro;
        background-color: #6C757D;
        line-height: 1.6rem;
        text-align:  center;
        padding: 0px;
        margin: 0px;
      }
      #spaceKross p { 
        padding: 0px;
        margin: 5px 0px;
      }
      
      #abstract { 
        position: absolute;
        left: 57rem;
        top: 23.5rem;
        color: #6C757D;
        border: 0px none Azure;
        background-color: Azure;
        line-height: 1.5rem;
        font-size: 1.3rem;
        font-weight: 700;
        z-index: 7;
        box-shadow: inset 0 0 15px rgba(0,0,0,.9); 
      }
      #bonus { 
        position: absolute;
        left: 57rem;
        top: 53.5rem;
        font-size: 1.2rem;
        font-weight: 700;
        z-index: 7;
        box-shadow: inset 0 0 15px rgba(0,0,0,.9); 
      }
      #text { 
        position: absolute;
        left: 57rem;
        top: 21rem;  
        font-size: 1.8rem;
        color: Azure;
      }
       #text16 { 
        position: absolute;
        left: 10.5rem;
        top: 20rem;  
        font-size: 1.2rem;
        color: white;
      }
      #variant {
       position: absolute;   
       font-size: 2.9rem !important; /*!important property gain */
       text-align: center;
       width: 16rem;
       color: white;
       cursor: pointer;
       z-index: 7;
       left: 55rem;
       top: 42rem;
      }
      #random {
        position: absolute;
        height: 3rem;
        line-height: 3.5rem;
        width: 3.5rem;
        background-color: #6C757D;
        color: white;
        text-align:  center;
        border-radius: 10%;
        z-index: 7;
        cursor: pointer;
        left: 57rem;
        top: 49.5rem;
        box-shadow: inset 0 0 15px rgba(0,0,0,.9);
      }
      #newgame {
        position: absolute;
        height: 3rem;
        line-height: 3.5rem;
        width: 3.5rem;
        background-color: #6C757D;
        color: white;
        text-align:  center;
        border-radius: 10%;
        z-index: 7;
        cursor: pointer;
        left: 57rem;
        top: 57.4rem;
        box-shadow: inset 0 0 15px rgba(0,0,0,.9); 
      }
      #basket { 
        position: absolute;
        height: 3rem;
        line-height: 3.6rem;
        width: 7.5rem;
        padding-left: 0.5%;
        background-color: #6C757D;
        color: white;
        border-radius: 10%;
        z-index: 7;
        cursor: pointer;
        left: 62rem;
        top: 53.3rem;
        box-shadow: inset 0 0 15px rgba(0,0,0,.9); 
      }
      #basketText { 
        position: absolute;
        line-height: 3rem;
        padding-left: 0.5%;
        font-size: 120%;
        font-weight: 700;
      }
      #mainBGimg { 
         visibility: hidden;
         width: 100%;
      }
      .disk {
        position: relative; 
        width: 100%;
        padding: 50% 0; 
        border-radius: 50%;  /* adaptive circle */
        margin-top: 55%;
        box-shadow: inset 0 0 35px rgba(0,0,0,1); 
      }
      .disk b {
        position: absolute;
        color: white;
        font-size: 350%; 
        top: 30%;
        left: 44%; /* all letters are put in one point*/
        width: 0; /* remove the indent */
        cursor: pointer;
      }
      .disk b:nth-of-type(1) {transform: translate(0, -90px);} /*location of 1 letter */
      .disk b:nth-of-type(2) {transform: translate(65px, -65px);} /*location of 2 letter */
      .disk b:nth-of-type(3) {transform: translate(90px);} /*location of 3 letter */
      .disk b:nth-of-type(4) {transform: translate(65px, 65px);} /*location of 4 letter */
      .disk b:nth-of-type(5) {transform: translate(0, 90px);} /*location of 5 letter*/
      .disk b:nth-of-type(6) {transform: translate(-65px, 65px);} /*location of 6 letter*/
      .disk b:nth-of-type(7) {transform: translate(-90px);} /*location of 7 letter*/
      .disk b:nth-of-type(8) {transform: translate(-65px, -65px);} /*location of 8 letter*/
      
      /********************** ADAPTIVE iPhone 8 Plus 1920x1080, Galaxy J2 core 960x540 *****************************/
      
      @media (min-width: 828px) and (max-width: 1080px), (min-width: 520px) and (max-width: 827px) {
        .disk {
            position: relative; 
            width: 54%;
            padding: 27% 0; 
            margin-top: 4%;
            margin-left: 0%;
            box-shadow: inset 0 0 35px rgba(0,0,0,1);
        }
        .disk b {
            font-size: 650%; 
            top: 23%;
            left:42%;
        }
        .disk b:nth-of-type(1) {transform: translate(0, -140px);} /*location of 1 letter*/
        .disk b:nth-of-type(2) {transform: translate(100px, -100px);} /*2*/
        .disk b:nth-of-type(3) {transform: translate(140px);} /*3*/
        .disk b:nth-of-type(4) {transform: translate(100px, 100px);} /*4*/
        .disk b:nth-of-type(5) {transform: translate(0, 140px);} /*5*/
        .disk b:nth-of-type(6) {transform: translate(-100px, 100px);} /*6 */
        .disk b:nth-of-type(7) {transform: translate(-140px);} /*7*/
        .disk b:nth-of-type(8) {transform: translate(-100px, -100px);} /*8*/
        
        #text {
            position: absolute;
            left: 10rem;
            top: 72rem;
            font-size: 2.2rem;
            color: white;
        }
        #text16 { 
            position: absolute;
            left: 4rem;
            top: 4rem;  
            font-size: 1.5rem;
            color: white;
        }
        #abstract {
            position: absolute;
            width: 16.6rem;
            left: 34rem;
            top: 71.5rem;
            color: #013059;
            background-color: rgba(240,255,255,0.4);
            line-height: 3.3rem;
            font-size: 2rem;
            font-weight: 700;
            border-radius: 0;
        }
        #variant {
           font-size: 4.6rem !important; /*!important property gain */
           width: 27rem;
           height: 5rem;
           left: 24rem;
           top: 46rem;
           z-index: 0;
           color: #013059;
        }
        #random {
            position: absolute;
            height: 6rem;
            line-height: 7.5rem;
            width: 6rem;
            left: 36.5rem;
            top: 56.5rem;
            background-color: rgba(240,255,255,0.5);
            color: #013059;
            border-radius: 0;
            font-size: 1.6rem;
        }
        #bonus {
            position: absolute;
            left: 26.5rem;
            top: 64rem;
            height: 6rem;
            font-size: 2.6rem;
            width: 9rem;
            background-color: rgba(240,255,255,0.5);
            color: #013059;
            border-radius: 0;
        }
        #bonus img { 
            height: 35px;
            margin-left: -25px;
        }
        #bonusText {
            margin-left: 5px;
        }
        
        #basket {
            position: absolute;
            height: 6rem;
            line-height: 7rem;
            width: 14rem;
            left: 36.5rem;
            top: 64rem;
            padding-left: 10px;
            background-color: rgba(240,255,255,0.5);
            color: #013059;
            border-radius: 0;
            font-size: 1.3rem;
        }
        #basket img { 
            height: 35px;
            padding-left: 5px;
            padding-right: 10px;
        }
        #basketText {
            position: absolute;
            line-height: 6rem;
            font-size: 2.6rem;
            padding-left: 0px;
            color: #013059;
        }
        #newgame {
            position: absolute;
            height: 6rem;
            line-height: 7.5rem;
            width: 6rem;
            left: 44rem;
            top: 56.5rem;
            background-color: rgba(240,255,255,0.5);
            color: #013059;
            border-radius: 0;
            font-size: 1.6rem;
        }
        .container-fluid { 
            width: 43rem;
            left: 4rem;
            top: 4rem;
        }
        .labelHidden { 
            font-size: 3rem !important;
        }
        #exampleModalLabel { 
            font-size: 1.9rem;
        }
        #exampleModalLabel img { 
            height: 35px;
        }
        #exampleModalLongTitle { 
            font-size: 2rem;
        }
        .modal-body span { 
            font-size: 2rem;
        }
        .modal-body img { 
            height: 30px;
        }
        #mainBGimg { 
            visibility: hidden;
            width: 100%;
        }
        #modalText { 
            font-size: 2.5rem;
        }
        .popupGreeting {
            width: 100%;
            left: 0%;
        }
        .close {
            font-size: 35px;
        }
        .popup-body {
            font-size: 1.6rem;
            padding: 0.5% 2%;
        }
        .popup-header {
            padding: 0.5% 2%;
        }
      }            
      
      /********************** ADAPTIVE Samsung Galaxy S7 Edge 2560x1440,  *****************************/
         
    </style>
  </head>

  <body style="background: url('img/polynesia-3021072_1920.jpg') no-repeat" onload="loadPage()">
    <img src="img/polynesia-3021072_1920.jpg" id="mainBGimg"> <!--scaling the background-->
    <p id='text16'><b>16+</b></p>
    <div class="container-fluid"> <!--multiple input .container>.row.justify-content-center>.col-4 -->
      <div class="row">
        <div class="col-lg-9 col-md-12 col-sm-12" id="col_9"> <!-- this div must be saved for each correctly guessed word, passed to the server and returned when the session starts--> 
          <?php for($i=1;$i<=$valueSpaceKross;$i++):?>
          <div class="row flex-nowrap"> <!-- flex-nowrap the property/parameter that does not allow the transfer of the container under compression -->
            <?php for ($j=1;$j<=$valueSpaceKross;$j++)
             if ($spaceKross[$i][$j]!='_') echo "<div class='col' id='spaceKross' onclick='null' style='background: black; color: black'><p><font size='6'><b>".$spaceKross[$i][$j]."</b></font></p></div>";
             else echo "<div class='col' id='spaceKross' onclick='null' style='opacity: 0.3'><p><font color='#6C757D'>".$spaceKross[$i][$j]."</font></p></div>"?>
          </div>
          <?php endfor;?>
        </div>
        <div class="col-lg-3 col-md-12 col-sm-12" id="col_3"> <!-- HERE TO REBUILD !!!! -->
          
          <div class="disk">
            <?php for ($i=0;$i<8;$i++) echo "<b class='alphaChar' onclick='choiceLetter(".$i.");'>".$setLetters[$i]."</b>";?>
          </div>
        
        </div>
      </div>
    </div>
    
    <div id="variant" onclick="checkWord();"></div>   
          
    <p id="text"><b>КроссПазл&copy;</b></p> 
    <div id="random"><i class="fas fa-random fa-2x"></i></div>
    <div id="newgame"><i class="fas fa-redo-alt fa-2x"></i></div>
    <div id="basket"><i class="fas fa-cart-plus fa-2x"><img src="img/icons8.png" height="20px"></i><span id="basketText">0</span></div>
    
    <div class="popupGreeting" id="myPopup">
        <div class="popup-content">
            <div class="popup-header">
                <h3>Добро пожаловать в игру КроссПазл&copy;!</h3>
                <span class="close">&times;</span>
            </div>
            <div class="popup-body">
                <p><b>Сегодня Вы получаете на свой персональный счет + 40 <img src="img/icons8.png" height="30px"> .</b></p>
            </div>
            <div class="popup-footer">
                <h4>Автор</h4>
            </div>
        </div>
    </div>
    
    
  <!-- Button trigger modal -->
  <button type="button" class="btn btn-secondary" id="bonus" data-toggle="modal" data-target="#exampleModal"><img src="img/icons8.png" height="20px"><span id="bonusText">0</span></button>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel" style="text-align: right">ДОПОЛНИТЕЛЬНЫЕ СЛОВА  <img src="img/icons8.png" height="30px"><br>Правильные слова, которых нет в пазле.</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span class="labelHidden" aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body"><span id="modalText" style="font-weight: 700; color: royalblue"></span></div>
        <!-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div> -->
      </div>
    </div>
  </div>
  
  <!-- Button trigger modal -->
    <button type="button" class="btn btn-secondary" id="abstract" data-toggle="modal" data-target="#exampleModalLong">Описание игры</button>

<!-- Modal -->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Кросспазл&copy;- игра в слова высокой сложности</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span class="labelHidden" aria-hidden="true" style="font-size: 2rem">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <span style="color: #212529; margin: 0px 0px 16px; text-align:left">
              <p>Эта замечательная игра в жанре «кроссворд» позволит Вам увеличить запас слов, проверить их написание.</p>
              <p>В начале игры вам будут даны буквы основного слова. Старайтесь соединять буквы в слово. 
              Вам предстоит потрудиться, чтобы придумать новые слова, а затем сложить пазл и разгадать весь кроссворд.
              <br>Составляйте слова, собирая по кусочкам замысловатые пазлы кроссворда и пробуя решить каждую головоломку,
              справляясь с любым испытанием, возникающим на вашем пути.</p>
              <p>ЭТА ГОЛОВОЛОМКА ПРОВЕРИТ ВАШ ЗАПАС СЛОВ.</p>
              <p>Помните, что вероятность повторения вариантов КроссПазла крайне мала, сложность этих вариантов высокая, 
              а словарь насчитывает 30 тысяч слов из которых треть устаревшие и редко употребляемые слова.</p>
              <p>Если Вы составили слово, которое не располагается на поле, но есть в словаре русских слов,
              то за него будет начислен один кристалл на бонусный счет.</p>
              <p>В случае полного решения варианта КроссПазла игрок получает на свой персональный счет все кристаллы 
              с бонусного счета и по два кристалла за каждое отгаданное слово на поле кроссворда.
              Кристаллы с персонального счета можно использовать для покупки подсказок в следующей игре.</p>
              <p>Для просмотра слов попавших в бонусный счет используйте кнопку - <img src="img/icons8.png" height="20px">.</p>
              <p>Чтобы перемешать исходные буквы, используйте кнопку - <i class="fas fa-random fa-1x"></i>.</p> 
              <p>Если хотите купить подсказку, используйте кнопку - <i class="fas fa-cart-plus fa-1x"></i>, далее нажмите на неизвестную букву. 
              Стоимость одной подсказки - 20 кристаллов.</p> 
              <p>Для запуска новой игры используйте кнопку - <i class="fas fa-redo-alt fa-1x"></i>.&nbsp;&nbsp;Если Вы не смогли закончить последнюю игру,
              до запуска новой будут показаны неотгаданные слова.</p>
              <p>Играйте в КроссПазл, погружайтесь в чудесный мир русского языка и расширяйте свой словарный запас !!!</p>
              <p>Андрей Дмитриев</p> 
            </span>
          </div>
          <!-- <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div> -->
        </div>
      </div>
    </div>
  
    <!-- Optional JavaScript -->
  <script>
    
    let divCol9 = localStorage.getItem('divCol9'); // Getting data from localStorage
    let divCol3 = localStorage.getItem('divCol3'); // Getting data from localStorage
    
    <?= $strArrKross ?>;
    <?= $strWordsKrossName ?>;
    <?= $strWordsKrossGrznt ?>;
    <?= $strWordsKrossVert ?>;
    <?= $strWordsKrossTrue ?>;
    
    let arrBonus = new Array(); // auxiliary array of BONUS block words
    let arrSpace = new Array(); // auxiliary array of Space block words
    let lastDate = new Date(0, 0, 0);
    let mainBGimg=document.getElementById("mainBGimg");
    let arrVariantColor = new Array(); //array of font color options for each image
    let arrBackground = new Array(); //array of background images for each day
    
    for (i=0; i<31; i++) {
        arrBackground[i]="img/imageMonth"+(i+1)+".jpg"; //creating an array of background images for each day of the month
        arrVariantColor[i]='white';
    }
    arrVariantColor[3]='black';
    arrVariantColor[7]='black';
    arrVariantColor[10]='black';
    arrVariantColor[11]='black';
    arrVariantColor[18]='#3ff0fc';
    arrVariantColor[20]='#3ff0fc'
    arrVariantColor[21]='black';
    arrVariantColor[22]='#013059';
    arrVariantColor[23]='black';
    arrVariantColor[24]='black';
    arrVariantColor[30]='#013059';

    if (divCol9) {
        //console.log("divCol9.length = "+divCol9.length);
        //console.log(divCol9);
        $('#col_9').html(divCol9); // replacing data incol-9 
        $('#col_3').html(divCol3); // replacing data in col-3 
        
        strWordsKrossName = localStorage.getItem('strWordsKrossName'); // Getting data from localStorage
        strWordsKrossGrznt = localStorage.getItem('strWordsKrossGrznt'); // Getting data from localStorage
        strWordsKrossVert = localStorage.getItem('strWordsKrossVert'); // Getting data from localStorage
        strWordsKrossTrue = localStorage.getItem('strWordsKrossTrue'); // Getting data from localStorage
        strArrKross = localStorage.getItem('strArrKross'); // Getting data from localStorage
        strArrBonus = localStorage.getItem('strArrBonus'); // Getting data from localStorage
        arrBonus = strArrBonus.split('//');
        strArrSpace = localStorage.getItem('strArrSpace'); // Getting data from localStorage
        arrSpace = strArrSpace.split('//');
        modalText.innerText = localStorage.getItem('modalText.innerText');
        bonusText.innerText = localStorage.getItem('bonusText.innerText');
        variant.innerText="";
        
    }
    
    if(localStorage.getItem('lastDate')=='') lastDate = Number(new Date(2019, 11, 20));
    else lastDate=Number(localStorage.getItem('lastDate'));
    today = new Date();
    today.setHours(0,0,0,0);
    
    //write the background image in the html code from the array by the number of the day of the month + the font color of the option under the image
    document.querySelectorAll('body')[0].style.background="url('"+arrBackground[today.getDate()-1]+"') no-repeat";
    mainBGimg.setAttribute('src',arrBackground[today.getDate()-1]);
    variant.style.color = arrVariantColor[today.getDate()-1];
    
    basketText.innerText = localStorage.getItem('basketText.innerText');
    
    let NewGameStop = false; //variable flag-determines the game stop when opening unsolved words
    //basketText.innerText=1220;
    <?= $strValueSpaceKross ?>;
    
    let arrKross = strArrKross.split('//');
    let wordsKrossName = strWordsKrossName.split('//');
    let wordsKrossGrznt = strWordsKrossGrznt.split('//');
    let wordsKrossVert = strWordsKrossVert.split('//');
    let wordsKrossTrue = strWordsKrossTrue.split('//');

    let myPopup=document.getElementById("myPopup"),
        popupClose=document.querySelector('.close');
    alphaChar=document.getElementsByClassName("alphaChar");
    document.getElementsByClassName("bonusText");
    document.getElementsByClassName("modalText");
    document.getElementsByClassName("spaceKross");
    
    //disabling onclick in an array of hidden words
    for (let j=0; j<wordsKrossName.length; j++) {
          for (let i = 0; i<wordsKrossName[j].length; i++) {
            if (!wordsKrossTrue[j]) x=(wordsKrossGrznt[j]-1+i)*valueSpaceKross-1+Number(wordsKrossVert[j]);
            else x=(wordsKrossGrznt[j]-1)*valueSpaceKross+i-1+Number(wordsKrossVert[j]);
            if(spaceKross[x].style.color == 'black') spaceKross[x].setAttribute('onclick','null');  //disabling onclick
          }
    }
    
    //console.log(alphaChar);
    
    let backgroundBasket=$('#basket').css('background-color'); // I remember the background of the store basket
    let colorBasket=$('#basket').css('color'); // I remember the color of the store basket
    let colorbasketText=$('#basketText').css('color'); // I remember the font color of the store
    
    let bonusTop = $('#bonus').css('top');
    //console.log('bonusTop 1 = '+bonusTop);
    bonusTop=bonusTop.substring(0,bonusTop.length-2);
    //console.log('bonusTop 2 = '+bonusTop);
    
    let variantLeft = $('#variant').css('left');
    //console.log('variantLeft 1 = '+variantLeft);
    variantLeft=variantLeft.substring(0,variantLeft.length-2);
    //console.log('variantLeft 2 = '+variantLeft);
    
    dataStorage ();
    
    popupClose.onclick = function () {
        myPopup.style.display='none';
    }
    
    window.onclick = function (e) {
        if(e.target == myPopup) myPopup.style.display='none';
    }
    
    function loadPage() {
        let scrollHeight = Math.max(
          document.body.scrollHeight, document.documentElement.scrollHeight,
          document.body.offsetHeight, document.documentElement.offsetHeight,
          document.body.clientHeight, document.documentElement.clientHeight)-
          Math.min(
          document.body.scrollHeight, document.documentElement.scrollHeight,
          document.body.offsetHeight, document.documentElement.offsetHeight,
          document.body.clientHeight, document.documentElement.clientHeight);
        window.scrollBy(0,scrollHeight);
        window.resizeTo(window.screen.availWidth,window.screen.availHeight); //The method dynamically changes the window size.
        if((Number(today)-Number(lastDate))>=86400000) firstGame();
    }
    
    function firstGame () {
        lastDate=Number(today);
        myPopup.style.display='block';
        basketText.innerText = Number(basketText.innerText)+40;
    }
    
    function punchBonus() { // with jQuery tools works
      $('#bonus').animate({'top':+bonusTop+8+'px'},100)
                  .animate({'top':+bonusTop-8+'px'},100)
                  .animate({'top':+bonusTop+8+'px'},100)
                  .animate({'top':+bonusTop-8+'px'},100)
                  .animate({'top':+bonusTop+'px'},100);
    }
    
    function punchVariant() { //  with jQuery tools works
      $('#variant').animate({'left':+variantLeft+10+'px'},100)
                  .animate({'left':+variantLeft-10+'px'},100)
                  .animate({'left':+variantLeft+10+'px'},100)
                  .animate({'left':+variantLeft-10+'px'},100)
                  .animate({'left':+variantLeft+'px'},100);
    }
    
    function choiceLetter (i) { //letter input processing function
      //console.log(alphaChar[i].innerText); 
      alphaChar[i].style.cursor = 'default'; // changing the cursor
      alphaChar[i].onclick = null; //disable onclick
      variant.style.fontSize = 'xx-large';
      variant.style.fontWeight = 700;
      variant.innerText = variant.innerText+alphaChar[i].innerText;
      alphaChar[i].style.visibility = 'hidden'; // changing the font color to the background color
      
    }
    /************************************  test EventListener ***************************/
    
    let lettersArr=document.querySelectorAll('.disk b'); //Search and Save the entire tree (array).disk b to a variable.
    let lettersCoord = new Array();
    
    for (i = 0; i <lettersArr.length; i++) {
        lettersCoord[i] = lettersArr[i].getBoundingClientRect(); //Save the coordinates to the variable-on the upper left edge
        //let clientX= event.clientX;
        //let clientY= event.clientY;
        //lettersArr[i].addEventListener('touchstart',f); //and on the touchstart event, we launch the f function WITHOUT BRACKETS !!!
        //lettersArr[i].addEventListener('touchmove',f); 
    }
    //console.log(g (lettersArr, "The coordinates of the LETTERS", lettersCoord, "window.scrollX window.scrollY", window.scrollX, window.scrollY);
    document.querySelector('.disk').addEventListener('touchstart',checkTouch);
    document.querySelector('.disk').addEventListener('touchmove',checkTouch);
    document.querySelector('.disk').addEventListener('touchend',checkWord);
    newgame.addEventListener('click',newGame);
    document.querySelector('#random').addEventListener('click',shuffleLetters);
    document.querySelector('#basket').addEventListener('click',shop);
    //document.querySelector('.disk').addEventListener('touchstart',checkTouch);
   // 'touchend''touchstart''touchmove''touchleave'
    
    function checkTouch (event) { // check function for touching the letter "with your finger"
        
        event.stopPropagation();
        if (event.cancelable) { event.preventDefault(); } //The event must be cancelable . Adding an if statement solves this problem.
        //event.preventDefault();
        //console.log (event.touches, event.type, event.touches[0].clientX, event.touches[0].clientY);
        //console.log(g (event.touches[0].clientX, event.touches[0].clientY, event.touches);
        
        for (i = 0; i <lettersArr.length; i++) {
            XX=Math.floor(event.touches[0].clientX)-Math.floor(lettersCoord[i].x);
            YY=Math.floor(event.touches[0].clientY)-Math.floor(lettersCoord[i].y);
            if(XX<50 && XX>5 && YY<115 && YY>70 && (alphaChar[i].onclick!=null)) choiceLetter(i);
            //console.log (i,lettersCoord[i].x+window.scrollX,lettersCoord[i].y+window.scrollY);
            //console.log (i,Math.floor(lettersCoord[i].x),Math.floor(event.touches[0].clientX-25),Math.floor(lettersCoord[i].y),Math.floor(event.touches[0].clientY-93));
            //console.log (lettersCoord);
            //console.log(alphaChar[i].onclick);
        }
    }
    
   /*  $(document).ready(function(){
        $('#col_9').mousemove(function(e){
        // the position of the element
        var pos = $(this).offset();
        var elem_left = pos.left;
        var elem_top = pos.top;
        // position of the cursor inside the element
        var Xinner = e.pageX - elem_left;
        var Yinner = e.pageY - elem_top;
        //console.log("X: " + Xinner + " Y: " + Yinner); // output the result to the console
        });
    });*/
    
    
    /**************** end test EventListener ***************************/  
    
    function shop () { // the function of the store
        
        if (basketText.innerText>=20) {
          //console.log(basketText.innerText);
          basket.style.backgroundColor = 'rgba(109, 130, 189, .6)'; // I set a new background
          basket.style.color = 'white';
          basketText.style.color = 'white';
          
          for(let j=0; j<wordsKrossName.length; j++) {
              //console.log('Processing the word: '+wordsKrossName[j]);
              
              for (let i = 0; i<wordsKrossName[j].length; i++) {
                if (!wordsKrossTrue[j]) k=(wordsKrossGrznt[j]-1+i)*valueSpaceKross-1+Number(wordsKrossVert[j]);
                else k=(wordsKrossGrznt[j]-1)*valueSpaceKross+i-1+Number(wordsKrossVert[j]);
                if(spaceKross[k].style.color == 'black') {
                    spaceKross[k].setAttribute('onclick','payGood('+k+')');  //enabling onclick
                    //document.querySelector('#spaceKross').addEventListener('click',console.log(spaceKross[k]));
                }
              }
          }
        }
    }
    
    function payGood (k) {
        basketText.innerText=Number(basketText.innerText)-20;
        localStorage.setItem('basketText.innerText', basketText.innerText);
        for(let j=0; j<wordsKrossName.length; j++) {
          for (let i = 0; i<wordsKrossName[j].length; i++) {
            if (!wordsKrossTrue[j]) x=(wordsKrossGrznt[j]-1+i)*valueSpaceKross-1+Number(wordsKrossVert[j]);
            else x=(wordsKrossGrznt[j]-1)*valueSpaceKross+i-1+Number(wordsKrossVert[j]);
            if(spaceKross[x].style.color == 'black') spaceKross[x].setAttribute('onclick','null');  //disabling onclick
          }
        }
        spaceKross[k].style.color = 'white'; 
        spaceKross[k].style.fontWeight = 900; 
        
        basket.style.backgroundColor = backgroundBasket; // returning the background
        basket.style.color = colorBasket;
        basketText.style.color = colorbasketText;
        
        dataStorage ();
        return;
    }

    
    /*function choiceGoods () { input waiting function (not used)
        const el = document.querySelector('my-element');
        if (el.length) {
        // Do something with el
        } else setTimeout(choiceGoods, 300); // try again in 300 milliseconds
    }*/

    
    function shuffleLetters () { // function to shuffle the letters
      checkWord();
      let str='';
      for (i = 0; i <8; i++) str=str+alphaChar[i].innerText;
      
      for(i=0;i<8;i++) { //shuffle the letters-set for the dialog box in random order.
        posLetter=Math.floor(Math.random()*str.length);
        alphaChar[i].innerText=str.substr(posLetter,1);
        str=str.substr(0,posLetter)+ str.substr(posLetter+1);
      }
      dataStorage ();
    }
    
    function newGame () {
        if(!NewGameStop) {
            if (wordsKrossName.length==0 || wordsKrossName[0]=="") {
                
                $('.popup-header h3')[0].innerText='КроссПазл разгадан!';
                $('.popup-body b')[0].innerHTML="Вы получаете на свой персональный счет + "+(2*arrSpace.length+Number(bonusText.innerText))+" <img src='img/icons8.png' height='30px'>";
                myPopup.style.display='block';
                basketText.innerText = Number(basketText.innerText)+2*arrSpace.length+Number(bonusText.innerText);
            }
            else {
                for(let j=0; j<wordsKrossName.length; j++) {
                  for (let i = 0; i<wordsKrossName[j].length; i++) {
                    if (!wordsKrossTrue[j]) k=(wordsKrossGrznt[j]-1+i)*valueSpaceKross-1+Number(wordsKrossVert[j]);
                    else k=(wordsKrossGrznt[j]-1)*valueSpaceKross+i-1+Number(wordsKrossVert[j]);
                    if(spaceKross[k].style.color == 'black') {
                        spaceKross[k].style.backgroundColor = '#7d6c7b'; // returning the background
                        spaceKross[k].style.color = 'white'; 
                        spaceKross[k].style.fontWeight = 900; 
                    }
                  }
                }
                basketText.innerText = Number(basketText.innerText);
            }
        }
        localStorage.removeItem('divCol9', divCol9); 
        localStorage.removeItem('divCol3', divCol3); 
        localStorage.setItem('basketText.innerText', basketText.innerText);
        localStorage.setItem('lastDate', lastDate); // Saving data in localStorage
        if(NewGameStop) {
            location.href='exit.php';
            NewGameStop = false;
        }
        else NewGameStop = true;
    }
        
    function checkWord () { // check function of the word
      //console.log(variant.innerText);
      if(variant.innerText!="") {
          let variantWord=variant.innerText;
          let coincidence = false; //the flag variable with which we track the match of a variant with a word from a crossword puzzle
          setTimeout(() => variant.innerText="", 300); //clearing the input block-variant, with a delay of 3 seconds
          
          for (i = 0; i <8; i++) { 
            alphaChar[i].style.visibility = 'visible'; // changing the font color to the background color
            alphaChar[i].style.cursor = 'pointer'; // returning the cursor
            alphaChar[i].setAttribute('onclick','choiceLetter('+i+')');  //enabling onclick
          }
          
          for(let j=0; j<wordsKrossName.length; j++) {
            if (variantWord==wordsKrossName[j]) {
              //console.log('Guess the word: '+wordsKrossName[j]);
              //console.log('Horizon: '+wordsKrossGrznt[j]);
              //console.log('Vertical: '+wordsKrossVert[j]);
              //console.log('TRUE: '+wordsKrossTrue[j]);
              
              for (let i = 0; i<wordsKrossName[j].length; i++) {
                if (!wordsKrossTrue[j]) k=(wordsKrossGrznt[j]-1+i)*valueSpaceKross-1+Number(wordsKrossVert[j]);
                else k=(wordsKrossGrznt[j]-1)*valueSpaceKross+i-1+Number(wordsKrossVert[j]);
                //console.log('k: '+k);
                spaceKross[k].style.backgroundColor = '#6d83bd'; // returning the background
                spaceKross[k].style.color = 'white'; 
                spaceKross[k].style.fontWeight = 900;
              }
              /*let popSound= new Audio('img/Bingo.mp3');
              popSound.play();
              popSound.remove();*/
              
                $("<audio></audio>").attr({
                    'src':'img/Bingo.mp3',
                    'volume':0.1,
                    'autoplay':'autoplay'
                }).appendTo("body");
    
              wordsKrossName.splice(j, 1); // starting from position j, delete 1 word element from wordskrossname
              wordsKrossGrznt.splice(j, 1); // starting from position j, delete 1 element
              wordsKrossVert.splice(j, 1); // starting from position j, delete 1 element
              wordsKrossTrue.splice(j, 1); // starting from position j, delete 1 element
              
              coincidence=true;
              
              //break; // submit for processing-open the word
            }
          }
    
          for(let i=0; i<arrKross.length; i++) {
            if (variantWord==arrKross[i]) { 
              if(coincidence) {
                arrSpace.push(arrKross[i]);
              }
                
              else {
                //console.log('The word is sent to the bonus list: '+arrKross[i]);
                bonusText.innerText = Number(bonusText.innerText)+1; //increase the crystal counter by 1
                if (modalText.innerText.length==0) modalText.innerText = arrKross[i];
                else modalText.innerText=modalText.innerText+",  "+arrKross[i];
                arrBonus.push(arrKross[i]);
              }
              arrKross.splice(i, 1); // starting from position i, remove 1 word element from arrKross
              dataStorage ();
              return; 
            }
          }
          for(let i=0; i<arrBonus.length; i++) {
            if (variantWord==arrBonus[i]) {
              //console.log('Word '+ arrBonus[i] +' already in the bonus list');
              punchBonus(); // this with jQuery tools works
              dataStorage ();
              return;
            }
          }
          for(let i=0; i<arrSpace.length; i++) {
            if (variantWord==arrSpace[i]) {
              //console.log('Word '+ arrSpace[i] +' on the field of a crossword puzzle');
              punchVariant(); // this with jQuery tools works
              dataStorage ();
              return;
            }
          }
          //console.log(arrKross);
      }
    }
    
    function dataStorage () { // function-save all data to the current session
        divCol9 = $('#col_9').html(); //in div 9 Col - the current state of the field of a crossword puzzle
        //console.log(divCol9);
        //console.log(divCol9.length);
        localStorage.setItem('divCol9', divCol9); // Saving data in localStorage
        
        
        divCol3 = $('#col_3').html(); //in divCol3 - the current state of col-3 fields
        //console.log(divCol3);
        //console.log(divCol3.length);
        localStorage.setItem('divCol3', divCol3); // Saving data in localStorage
        
        strWordsKrossName = wordsKrossName.join('//'); // merge an array into a string using //;
        strWordsKrossGrznt = wordsKrossGrznt.join('//');
        strWordsKrossVert = wordsKrossVert.join('//');
        strWordsKrossTrue = wordsKrossTrue.join('//');
        strArrKross = arrKross.join('//');
        strArrBonus = arrBonus.join('//');
        strArrSpace = arrSpace.join('//');
        localStorage.setItem('strWordsKrossName', strWordsKrossName); // Saving data in localStorage
        localStorage.setItem('strWordsKrossGrznt', strWordsKrossGrznt); // Saving data in localStorage
        localStorage.setItem('strWordsKrossVert', strWordsKrossVert); // Saving data in localStorage
        localStorage.setItem('strWordsKrossTrue', strWordsKrossTrue); // Saving data in localStorage
        localStorage.setItem('strArrKross', strArrKross); // Saving data in localStorage
        localStorage.setItem('strArrBonus', strArrBonus); // Saving data in localStorage
        localStorage.setItem('strArrSpace', strArrSpace); // Saving data in localStorage
        localStorage.setItem('modalText.innerText', modalText.innerText); // Saving data in localStorage
        localStorage.setItem('bonusText.innerText', bonusText.innerText); // Saving data in localStorage
        localStorage.setItem('lastDate', lastDate); // Saving data in localStorage
        localStorage.setItem('basketText.innerText', basketText.innerText);
    }
  </script>   
  <?
  include 'site_components/footer.php';
  ?>