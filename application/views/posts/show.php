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
      <div class="wrapper clearfix">
        <div class="item clearfix">
          <div class="main">
            <header class="clearfix">
              <h1><?= $post['title']; ?></h1>
              <div id="tags">
                <?php foreach ($tags as $tag): ?>
                  <?= anchor('#', $tag['name']); ?>
                <?php endforeach; ?>
              </div>

              <section id="stats">
                <ul>
                  <li><a href="#" class="stat" id="post-likes"></a></li>
                  <li><a href="#" class="stat" id="post-comments"></a></li>
                  <li><a href="#" class="stat" id="post-shares"></a></li>
                </ul>
              </section>
            </header>

            <div id="content">
              <?= nl2br($post['content']); ?>
            </div>

            <?php if (!empty($comments)): ?>
              <section id="comments">
                <?php foreach ($comments as $comment): ?>
                  <div class="comment">
                    <header class="clearfix">
                      <?= profile_picture('profile-picture.png'); ?>
                      <h4><?= $comment['commentor_name']; ?></h4>
                    </header>

                    <div class="comment-body">
                      <p><?= nl2br($comment['content']); ?></p>
                    </div>
                  </div>
                <?php endforeach; ?>
              </section>
            <?php endif; ?>

            <section id="comment-form">
              <form action="#" method="POST">
                <div class="field">
                  <textarea name="content" placeholder="Leave a comment..." spellcheck="false"></textarea>
                </div>
                <div class="field float-left">
                  <input type="text" name="name" placeholder="Your name" autocomplete="off" spellcheck="false" />
                </div>
                <div class="field float-right">
                  <input type="email" name="email" placeholder="Your email" autocomplete="off" spellcheck="false" />
                </div>
                <div class="field">
                  <input type="submit" value="Post Comment" />
                </div>
              </form>
            </section>
          </div>

          <aside class="sidebar">
            <section id="user-profile">
              <?= profile_picture($user['profile_picture']); ?>
              <a href="#" id="name"><?= fullname($user); ?></a>
              <!---------------------- USER SOCIAL LINKS --------------------------
              <ul class="social-links">
                <li>
                  <a href="#">
                    <span class="link" id="facebook"></span>
                    <p>arnellebalane</p>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <span class="link" id="twitter"></span>
                    <p>@arnellebalane</p>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <span class="link" id="google-plus"></span>
                    <p>arnellebalane</p>
                  </a>
                </li>
              </ul>
              ------------------------------------------------------------------------>
            </section>

            <!---------------------- RELATED COMMENTS SECTION ----------------------
            <section id="related-items">
              <h3>Related Posts</h3>
              <a href="#">Lorem Ipsum Dolor Sit Amet</a>
              <a href="#">Lorem Ipsum Dolor Sit Amet Consectetur Adipiscing Elit</a>
              <a href="#">Lorem Ipsum Dolor Sit Amet</a>
            </section>
            -------------------------------------------------------------------------->
          </aside>
        </div>
      </div>
    </div>

    <div id="footer-placeholder"></div>
  </div>

  <?php $this->load->view('partials/footer'); ?>
</body>
</html>