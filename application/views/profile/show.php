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
            <?php elseif (strlen($user['about']) > 0 && $user['id'] == $current_user['id']): ?>
              <h6><?= anchor('profile/edit', 'Edit your profile'); ?> to write something about you.</h6>
            <?php endif; ?>
          </div>
        </div>
        <?php if (!empty($social_network_connections) || $user['id'] == $current_user['id']): ?>
          <div id="user-connections">
            <label>Find Me Online</label>
            <?php if (empty($social_network_connections)): ?>
              <?= anchor('profile/edit', 'Add your online social connections', array('id' => 'add-connections')); ?>
            <?php endif; ?>
            <ul class="social-links">
              <?php foreach ($social_network_connections as $connection): ?>
                <li><?= anchor(social_network_url($connection), $connection['handle'], array('class' => 'link', 'id' => format_network_name($connection))); ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endif; ?>
      </div>
    </div>

    <div id="footer-placeholder"></div>
  </div>

  <?php $this->load->view('partials/footer'); ?>
</body>
</html>