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
          <?php foreach ($screencasts as $screencast): ?>
            <div class="item-thumbnail">
              <div class="video">
                <iframe src="<?= $screencast['video_embed_url']; ?>" width="180" height="120"></iframe>
              </div>
              <aside>
                <?= anchor('screencasts/show/' . $screencast['slug'], htmlspecialchars($screencast['title']), array('class' => 'title')); ?>
                <footer>
                  <?php $user = $this->screencast->get_user($screencast); ?>
                  <?= profile_picture($user['profile_picture']); ?>
                  <?= anchor('profile/show/' . $user['id'], fullname($user)); ?>
                  <time><?= display_date($screencast['created_at']); ?></time>
                </footer>
              </aside>
            </div>
          <?php endforeach; ?>

          <?php if (empty($screencasts)): ?>
            <h2 class="empty-list">No Screencasts Found</h2>
          <?php endif; ?>
        </div>

        <?php if ($has_more): ?>
          <a href="#" id="load-more" data-type="screencasts">Load More Screencasts</a>
        <?php endif; ?>
      </div>
    </div>

    <div id="footer-placeholder"></div>
  </div>

  <?php $this->load->view('partials/footer'); ?>
</body>
</html>