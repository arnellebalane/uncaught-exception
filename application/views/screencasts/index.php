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
          <?php $counter = 6; ?>
          <?php while ($counter-- > 0): ?>
            <div class="item-thumbnail">
              <div class="video"></div>
              <aside>
                <?= anchor('screencasts/show', 'Lorem Ipsum Dolor Sit Amet Consectetur Adipiscing Elit', array('class' => 'title')); ?>
                <footer>
                  <?= profile_picture('profile-picture.png'); ?>
                  <a href="#">Arnelle Balane</a>
                  <time>September 12, 2013</time>
                </footer>
              </aside>
            </div>
          <?php endwhile; ?>
        </div>

        <a href="#" id="load-more">Load More Posts</a>
      </div>
    </div>

    <div id="footer-placeholder"></div>
  </div>

  <?php $this->load->view('partials/footer'); ?>
</body>
</html>