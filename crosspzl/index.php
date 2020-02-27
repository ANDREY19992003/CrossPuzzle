<? session_start();//Session initialization-function
  header('content-type: text/html; charset=utf-8');
  $title="Кросспазл";
  
  if(!isset($_SESSION['spaceKross'])) include 'cross.php';
  else include 'site_components/header.php';
?>
<h1 hidden>Popular word game - CrossPuzzle</h1>