<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8"> 
<title>News Magazine</title>
<link rel="stylesheet" href="styles/layout.css" type="text/css" />
<script type="text/javascript" src="scripts/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="scripts/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="scripts/jquery.timers.1.2.js"></script>
<script type="text/javascript" src="scripts/jquery.galleryview.2.1.1.min.js"></script>
<script type="text/javascript" src="scripts/jquery.galleryview.setup.js"></script>
</head>
<body id="top">
<div class="wrapper col0">
  <div id="topline">
    <ul>
    <?php 
      if (isset($_SESSION['auth'])){
        if ($_SESSION['type'] === 'admin')
          echo "<li class='last'><a href='dashboard'>Панель управления | </a></li>";
        echo "<li class='last'><a href='auth/logout'>Выход</a></li>";
      }
      else
        echo "<li class='last'><a href='auth'>Авторизация</a></li>";
    ?>
    </ul>
    <br class="clear" />
  </div>
</div>
<!-- BEGIN Шапка -->
<div class="wrapper">
  <div id="header">
    <div class="fl_left">
      <h1><a href="/"><strong>М</strong>ега <strong>Н</strong>овости</a></h1>
      <p>Самые а*уительные новости со всего мира!</p>
    </div>
    <div class="fl_right"><a href="#"><img src="images/demo/468x60.gif" alt="" /></a></div>
    <br class="clear" />
  </div>
</div>
<!-- END Шапка -->
<!-- BEGIN Меню-->
<div class="wrapper col2">
  <div id="topbar">
    <div id="topnav">
      <ul>
        <li class="active"><a href="/">Главная</a></li>
        <li><a href="style-demo.html">Style Demo</a></li>
        <li><a href="full-width.html">Full Width</a></li>
        <li><a href="#">DropDown</a>
          <ul>
            <li><a href="#">Link 1</a></li>
            <li><a href="#">Link 2</a></li>
            <li><a href="#">Link 3</a></li>
          </ul>
        </li>
        <li class="last"><a href="#">A Long Link Text</a></li>
      </ul>
    </div>
    <div id="search">
      <form action="#" method="post">
        <fieldset>
          <legend>Site Search</legend>
          <input type="text" />
          <input type="submit" name="go" id="go" value="Поиск" />
        </fieldset>
      </form>
    </div>
    <br class="clear" />
  </div>
</div>
<!-- END Меню -->
<!-- BEGIN ТОПы-->
<div class="wrapper">
  <div class="container">
  <!-- BEGIN TOP 5 -->
    <div class="content">
      <div id="featured_slide">
        <ul id="featurednews">
        <?php foreach ($data['lastFive'] as $post => $column) { ?>
          <li><img src="images/demo/1.gif" alt="">
            <div class="panel-overlay">
              <h2><?= $column['title'] ?></h2>
              <p><?= substr($column['short_text'],0,89).'...' ?><br>
                <a href="show/<?=$column['id']?>">Подробнее &raquo;</a></p>
            </div>
          </li>
          <?php } ?>
        </ul>
      </div>
    </div>
    <!-- END TOP 5 -->
    <!-- END Последние 3 -->
    <div class="column">
      <ul class="latestnews">
      <?php foreach ($data['randThree'] as $post => $column) { ?>
        <li><a href="show/<?=$column['id']?>"><img src="images/demo/100x100.gif" alt=""></a>
          <p><strong><a href="#"><?= $column['title'] ?></a></strong><br><?= substr($column['short_text'],0,149)."..." ?><br><a href="show/<?=$column['id']?>"">Подробнее &raquo;</a></p>
        </li>
      <?php } ?>
      </ul>
    </div>
    <!-- END Последние 3 -->
    <br class="clear" />
  </div>
</div>
<!-- END ТОПы -->
<div class="wrapper">
  <div id="adblock">
    <div class="fl_left"><a href="#"><img src="images/demo/468x60.gif" alt="" /></a></div>
    <div class="fl_right"><a href="#"><img src="images/demo/468x60.gif" alt="" /></a></div>
    <br class="clear" />
  </div>
  <div id="hpage_cats">
    <div class="fl_left">
      <h2><a href="#">Environment &raquo;</a></h2>
      <img src="images/demo/100x100.gif" alt="" />
      <p><strong><a href="#">Indonectetus facilis leo.</a></strong></p>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>
    <div class="fl_right">
      <h2><a href="#">Technology &raquo;</a></h2>
      <img src="images/demo/100x100.gif" alt="" />
      <p><strong><a href="#">Indonectetus facilis leo.</a></strong></p>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
    </div>
    <br class="clear" />
    <div class="fl_left">
      <h2><a href="#">Entertainment &raquo;</a></h2>
      <img src="images/demo/100x100.gif" alt="" />
      <p><strong><a href="#">Indonectetus facilis leo.</a></strong></p>
      <p>Morbitincidunt maurisque eros molest nunc anteget sed vel lacus mus semper. Anterdumnullam interdum eros dui urna consequam ac nisl nullam ligula vestassa. Condimentumfelis et amet tellent quisquet a leo lacus nec augue accumsan sagittislaorem dolor sum at urna.</p>
    </div>
    <div class="fl_right">
      <h2><a href="#">Politics &raquo;</a></h2>
      <img src="images/demo/100x100.gif" alt="" />
      <p><strong><a href="#">Indonectetus facilis leo.</a></strong></p>
      <p>Morbitincidunt maurisque eros molest nunc anteget sed vel lacus mus semper. Anterdumnullam interdum eros dui urna consequam ac nisl nullam ligula vestassa. Condimentumfelis et amet tellent quisquet a leo lacus nec augue accumsan sagittislaorem dolor sum at urna.</p>
    </div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper">
  <div class="container">
    <div class="content">
      <div id="hpage_latest">
        <h2>Feugiatrutrum rhoncus semper</h2>
        <ul>
          <li><img src="images/demo/190x130.gif" alt="" />
            <p>Nullamlacus dui ipsum conseqlo borttis non euisque morbipen a sdapibulum orna.</p>
            <p>Urnau ltrices quis curabitur pha sellent esque congue magnisve stib ulum quismodo nulla et.</p>
            <p class="readmore"><a href="#">Continue Reading &raquo;</a></p>
          </li>
          <li><img src="images/demo/190x130.gif" alt="" />
            <p>Nullamlacus dui ipsum conseqlo borttis non euisque morbipen a sdapibulum orna.</p>
            <p>Urnau ltrices quis curabitur pha sellent esque congue magnisve stib ulum quismodo nulla et.</p>
            <p class="readmore"><a href="#">Continue Reading &raquo;</a></p>
          </li>
          <li class="last"><img src="images/demo/190x130.gif" alt="" />
            <p>Nullamlacus dui ipsum conseqlo borttis non euisque morbipen a sdapibulum orna.</p>
            <p>Urnau ltrices quis curabitur pha sellent esque congue magnisve stib ulum quismodo nulla et.</p>
            <p class="readmore"><a href="#">Continue Reading &raquo;</a></p>
          </li>
        </ul>
        <br class="clear" />
      </div>
    </div>
    <div class="column">
      <div class="holder"><a href="#"><img src="images/demo/300x250.gif" alt="" /></a></div>
      <div class="holder"><a href="#"><img src="images/demo/300x80.gif" alt="" /></a></div>
    </div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col8">
  <div id="copyright">
    <p class="fl_left">Copyright &copy; 2015 - All Rights Reserved - <a href="#">Domain Name</a></p>
    <br class="clear" />
  </div>
</div>
</body>
</html>
