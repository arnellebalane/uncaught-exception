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
            <?php elseif (strlen($user['about']) == 0 && user_logged_in() && $user['id'] == $current_user['id']): ?>
              <h6><?= anchor('profile/edit', 'Edit your profile'); ?> to write something about you.</h6>
            <?php endif; ?>
          </div>
        </div>
        <?php if (!empty($social_network_connections) || (user_logged_in() && $user['id'] == $current_user['id'])): ?>
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

        <div id="user-activities">
          <section class="clearfix" >
            <h4><?= user_logged_in() && $user['id'] == $current_user['id'] ? 'Your' : $user['firstname'] . '\''; ?> Posts</h4>
            <?php if (empty($posts)): ?>
              <h5><?= user_logged_in() && $user['id'] == $current_user['id'] ? 'You' : $user['firstname'] . '\''; ?> have not posted anything yet.</h5>
            <?php endif; ?>
            <?php foreach ($posts as $post): ?>
              <div class="activity">
                <?= anchor('posts/show/' . $post['slug'], $post['title']); ?>
                <footer>
                  <time><?= display_date($post['created_at']); ?></time>
                  <?php if (user_logged_in() && $user['id'] == $current_user['id']): ?>
                    <ul>
                      <li><?= anchor('posts/edit/' . $post['slug'], 'Edit'); ?></li>
                      <li><?= anchor('posts/destroy/' . $post['id'], 'Delete'); ?></li>
                    </ul>
                  <?php endif; ?>
                </footer>
              </div>
            <?php endforeach; ?>
          </section>

          <section class="clearfix" >
            <h4><?= user_logged_in() && $user['id'] == $current_user['id'] ? 'Your' : $user['firstname'] . '\''; ?> Screencasts</h4>
            <?php if (empty($screencasts)): ?>
              <h5><?= user_logged_in() && $user['id'] == $current_user['id'] ? 'You' : $user['firstname'] . '\''; ?> have no screencasts yet.</h5>
            <?php endif; ?>
            <?php foreach ($screencasts as $screencast): ?>
              <div class="activity">
                <?= anchor('screencasts/show/' . $screencast['slug'], $screencast['title']); ?>
                <footer class="clearfix">
                  <time><?= display_date($screencast['created_at']); ?></time>
                  <?php if (user_logged_in() && $user['id'] == $current_user['id']): ?>
                    <ul>
                      <li><?= anchor('screencasts/edit/' . $screencast['slug'], 'Edit'); ?></li>
                      <li><?= anchor('screencasts/destroy/' . $screencast['id'], 'Delete'); ?></li>
                    </ul>
                  <?php endif; ?>
                </footer>
              </div>
            <?php endforeach; ?>
          </section>
        </div>
      </div>
    </div>

    <div id="footer-placeholder"></div>
  </div>

  <?php $this->load->view('partials/footer'); ?>
</body>
</html>