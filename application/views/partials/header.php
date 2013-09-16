<header id="main-header">
  <div class="wrapper clearfix">
    <!-- <a href="#" id="logo">Uncaught Exception</a> -->

    <nav>
      <ul>
        <li><a href="#" class="current">Blog</a></li>
        <li><a href="#">Screencasts</a></li>
      </ul>
    </nav>
  </div>
</header>

<div id="posts-filter">
  <?php if ($controller_name == 'posts' && $action_name == 'index'): ?>
    <div class="wrapper clearfix">
      <ul>
        <li><a href="#" class="current">Fresh</a></li>
        <li><a href="#">Popular</a></li>
      </ul>
    </div>
  <?php endif; ?>
</div>