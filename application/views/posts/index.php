<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view('partials/head'); ?>
  <title>Uncaught Exception</title>
</head>

<body class="posts index">
  <div id="main-wrapper">
    <?php $this->load->view('partials/header'); ?>

    <div id="content-area">
      <div class="wrapper">
        <div class="posts-list clearfix">
          <div class="post-thumbnail">
            <?= anchor('posts/show', 'Lorem Ipsum Dolor Sit Amet Consectetur Adipiscing Elit', array('class' => 'title')); ?>
            <footer>
              <?= profile_picture('profile-picture.png'); ?>
              <a href="#">Arnelle Balane</a>
              <time>September 12, 2013</time>
            </footer>
          </div>

          <div class="post-thumbnail">
            <?= anchor('posts/show', 'Lorem Ipsum Dolor Sit Amet Consectetur Adipiscing Elit', array('class' => 'title')); ?>
            <footer>
              <?= profile_picture('profile-picture.png'); ?>
              <a href="#">Arnelle Balane</a>
              <time>September 12, 2013</time>
            </footer>
          </div>

          <div class="post-thumbnail">
            <?= anchor('posts/show', 'Lorem Ipsum Dolor Sit Amet Consectetur Adipiscing Elit', array('class' => 'title')); ?>
            <footer>
              <?= profile_picture('profile-picture.png'); ?>
              <a href="#">Arnelle Balane</a>
              <time>September 12, 2013</time>
            </footer>
          </div>

          <div class="post-thumbnail">
            <?= anchor('posts/show', 'Lorem Ipsum Dolor Sit Amet Consectetur Adipiscing Elit', array('class' => 'title')); ?>
            <footer>
              <?= profile_picture('profile-picture.png'); ?>
              <a href="#">Arnelle Balane</a>
              <time>September 12, 2013</time>
            </footer>
          </div>

          <div class="post-thumbnail">
            <?= anchor('posts/show', 'Lorem Ipsum Dolor Sit Amet Consectetur Adipiscing Elit', array('class' => 'title')); ?>
            <footer>
              <?= profile_picture('profile-picture.png'); ?>
              <a href="#">Arnelle Balane</a>
              <time>September 12, 2013</time>
            </footer>
          </div>

          <div class="post-thumbnail">
            <?= anchor('posts/show', 'Lorem Ipsum Dolor Sit Amet Consectetur Adipiscing Elit', array('class' => 'title')); ?>
            <footer>
              <?= profile_picture('profile-picture.png'); ?>
              <a href="#">Arnelle Balane</a>
              <time>September 12, 2013</time>
            </footer>
          </div>

          <div class="post-thumbnail">
            <?= anchor('posts/show', 'Lorem Ipsum Dolor Sit Amet Consectetur Adipiscing Elit', array('class' => 'title')); ?>
            <footer>
              <?= profile_picture('profile-picture.png'); ?>
              <a href="#">Arnelle Balane</a>
              <time>September 12, 2013</time>
            </footer>
          </div>

          <div class="post-thumbnail">
            <?= anchor('posts/show', 'Lorem Ipsum Dolor Sit Amet Consectetur Adipiscing Elit', array('class' => 'title')); ?>
            <footer>
              <?= profile_picture('profile-picture.png'); ?>
              <a href="#">Arnelle Balane</a>
              <time>September 12, 2013</time>
            </footer>
          </div>
        </div>

        <a href="#" id="load-more">Load More Posts</a>
      </div>
    </div>

    <div id="footer-placeholder"></div>
  </div>

  <?php $this->load->view('partials/footer'); ?>
</body>
</html>