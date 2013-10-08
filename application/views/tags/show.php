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
        <h3>Items tagged: <span><?= urldecode($query); ?></span></h3>

        <div class="items-list clearfix posts">
          <?php foreach ($posts as $post): ?>
            <div class="item-thumbnail">
              <?= anchor('posts/show/' . $post['slug'], $post['title'], array('class' => 'title')); ?>
              <footer>
                <?php $user = $this->post->get_user($post); ?>
                <?= profile_picture($user['profile_picture']); ?>
                <?= anchor('profile/show/' . $user['id'], fullname($user)); ?>
                <time><?= display_date($post['created_at']); ?></time>
              </footer>
            </div>
          <?php endforeach; ?>
        </div>

        <div class="items-list clearfix screencasts">
          <?php foreach ($screencasts as $screencast): ?>
            <div class="item-thumbnail">
              <div class="video">
                <iframe src="<?= $screencast['video_embed_url']; ?>" width="180" height="120"></iframe>
              </div>
              <aside>
                <?= anchor('screencasts/show/' . $screencast['slug'], $screencast['title'], array('class' => 'title')); ?>
                <footer>
                  <?php $user = $this->screencast->get_user($screencast); ?>
                  <?= profile_picture($user['profile_picture']); ?>
                  <?= anchor('profile/show/' . $user['id'], fullname($user)); ?>
                  <time><?= display_date($screencast['created_at']); ?></time>
                </footer>
              </aside>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>

    <div id="footer-placeholder"></div>
  </div>

  <?php $this->load->view('partials/footer'); ?>
</body>
</html>