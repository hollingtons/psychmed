<html>
<head>
<title>psychiatry</title>
<link rel="stylesheet" href="x/css.css">



</head>
  <? include 'x/iptest.php'; ?>
  <? include 'x/comcode.php'; ?>
  <? if($mode=='owner'){ include 'x/owncode.php'; include 'x/comcode.php'; } ?>
<body>
<form>
<section class="">
  <div class="container">
  <? include 'x/drugtable.php'; ?>
  </div>
</section>
<div class="navbar">
  <? include 'x/companel.php'; ?>
  <? if($mode=='owner'){ ?><br><? include 'x/ownpanel.php'; } ?>
</div>
</form>
</body>
</html>