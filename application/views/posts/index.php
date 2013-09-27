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
        
        <div class="items-list clearfix">
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

        <?php if ($has_more): ?>
          <a href="#" id="load-more">Load More Posts</a>
        <?php endif; ?>
      </div>
    </div>

    <div id="footer-placeholder"></div>
  </div>

  <?php $this->load->view('partials/footer'); ?>
</body>
</html>