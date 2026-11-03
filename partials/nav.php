<?php
<nav class="navbar" role="navigation" aria-label="Primary" id="siteNav">
<?php
$current = basename($_SERVER['SCRIPT_NAME']);
$links = [
  ['href'=>'index.php','label'=>'Home'],
  ['href'=>'About_us.php','label'=>'About'],
  ['href'=>'Room.php','label'=>'Rooms'],
  ['href'=>'Store.php','label'=>'Store'],
  ['href'=>'Login.php','label'=>'Login'],
];
?>
  <div class="navbar-container">
    <a class="navbar-brand" href="/index.php" aria-label="Messo home">
      <img src="CSS/Photos/logo(1)(1).png" alt="Messo logo" class="logo" width="44" height="44"> MESSO
    </a>

    <button class="menu-toggle" id="menuToggle" aria-expanded="false" aria-controls="primary-nav" aria-label="Open menu">Menu</button>

    <ul id="primary-nav" class="navbar-links" role="menubar">
      <?php foreach ($links as $l): 
        $active = $current === basename($l['href']) ? 'aria-current="page" class="active"' : '';
      ?>
      <li role="none"><a role="menuitem" href="<?=htmlspecialchars($l['href'], ENT_QUOTES)?>" <?= $active ?>><?=htmlspecialchars($l['label'], ENT_QUOTES)?></a></li>
      <?php endforeach; ?>
    </ul>
  </div>
</nav>