<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view('partials/head'); ?>
  <title>Uncaught Exception</title>
</head>

<body class="<?= $controller_name . ' ' . $action_name; ?>">
  <div id="main-wrapper">
    <?php $this->load->view('partials/header'); ?>

    <div id="content-area">
      <div class="wrapper">
        <div id="user-profile" class="clearfix">
          <?= profile_picture($user['profile_picture']); ?>
          <div class="details">
            <h1><?= fullname($user); ?></h1>
            <?php if (strlen($user['about']) > 0): ?>
              <p><?= nl2br($user['about']); ?></p>
            <?php else: ?>
              <h6><?= anchor('profile/edit', 'Edit your profile'); ?> to write something about you.</h6>
            <?php endif; ?>
          </div>
        </div>
        <div id="user-connections">
          <label>Find Me Online</label>
          <ul class="social-links">
            <?php foreach ($social_network_connections as $connection): ?>
              <li><?= anchor(social_network_url($connection), $connection['handle'], array('class' => 'link', 'id' => format_network_name($connection))); ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
    </div>

    <div id="footer-placeholder"></div>
  </div>

  <?php $this->load->view('partials/footer'); ?>
</body>
</html>