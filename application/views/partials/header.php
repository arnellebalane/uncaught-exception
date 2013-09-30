<header id="main-header">
  <div class="wrapper clearfix">
    <!-- <a href="#" id="logo">Uncaught Exception</a> -->

    <nav>
      <ul>
        <li><?= anchor('posts/index', 'Blog', array('class' => navigation_link_class('posts', $controller_name))) ?></li>
        <li><?= anchor('screencasts/index', 'Screencasts', array('class' => navigation_link_class('screencasts', $controller_name))) ?></li>
        <?php if (user_logged_in()): ?>
          <li>
            <?= anchor('profile/show', fullname($current_user), array('class' => 'button-link')); ?>
            <ul>
              <li><?= anchor('posts/make', 'New Post'); ?></li>
              <li><?= anchor('screencasts/make', 'New Screencast'); ?></li>
              <li><?= anchor('profile/edit', 'Profile Settings'); ?></li>
              <li><?= anchor('sessions/destroy', 'Sign Out'); ?></li>
            </ul>
          </li>
        <?php else: ?>
          <li><?= anchor('sessions/make', 'Login', array('class' => navigation_link_class('sessions', $controller_name) . ' button-link')); ?></li>
        <?php endif; ?>
      </ul>
    </nav>

    <?php if ($this->session->flashdata('error')): ?>
      <p class="notification error"><?= $this->session->flashdata('error'); ?></p>
    <?php elseif ($this->session->flashdata('notice')): ?>
      <p class="notification notice"><?= $this->session->flashdata('notice'); ?></p>
    <?php endif; ?>

  </div>
</header>

<div id="posts-filter">
  <?php if (($controller_name == 'posts' && $action_name == 'index') || ($controller_name == 'screencasts' && $action_name == 'index')): ?>
    <div class="wrapper clearfix">
      <ul>
        <li><?= anchor($controller_name . '/index/fresh', 'Fresh', array('class' => post_filter_class('fresh'))); ?></li>
        <li><?= anchor($controller_name . '/index/popular', 'Popular', array('class' => post_filter_class('popular'))); ?></li>
      </ul>
    </div>
  <?php endif; ?>
</div>