<header id="main-header">
  <div class="wrapper clearfix">
    <!-- <a href="#" id="logo">Uncaught Exception</a> -->

    <nav>
      <ul>
        <li><?= anchor('posts/index', 'Blog', array('class' => navigation_link_class('posts', $controller_name))) ?></li>
        <li><?= anchor('screencasts/index', 'Screencasts', array('class' => navigation_link_class('screencasts', $controller_name))) ?></li>
        <li><?= anchor('sessions/make', 'Login', array('class' => navigation_link_class('sessions', $controller_name), 'id' => 'login-link')); ?></li>
      </ul>
    </nav>
  </div>
</header>

<div id="posts-filter">
  <?php if (($controller_name == 'posts' && $action_name == 'index') || ($controller_name == 'screencasts' && $action_name == 'index')): ?>
    <div class="wrapper clearfix">
      <ul>
        <li><a href="#" class="current">Fresh</a></li>
        <li><a href="#">Popular</a></li>
      </ul>
    </div>
  <?php endif; ?>
</div>