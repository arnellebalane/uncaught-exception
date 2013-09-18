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
        
        <div class="item clearfix">
          <div class="video"></div>
          <div class="main">
            <header class="clearfix">
              <h1>Lorem Ipsum Dolor Sit Amet Consectetur Adipiscing Elit</h1>
              <div id="tags">
                <a href="#">lorem</a>
                <a href="#">ipsum</a>
                <a href="#">dolor</a>
                <a href="#">consectetur</a>
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
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque aliquet tincidunt ipsum sit amet consectetur.</p>
            </div>

            <section id="comments">
              <?php $counter = 3; ?>
              <?php while ($counter-- > 0): ?>
                <div class="comment">
                  <header class="clearfix">
                    <?= profile_picture('profile-picture.png'); ?>
                    <h4>Arnelle Balane</h4>
                  </header>

                  <div class="comment-body">
                    <p>Suspendisse ut commodo neque, nec consectetur dolor. Aliquam urna nibh, pellentesque lobortis nunc eget, lacinia blandit quam. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Fusce semper interdum enim vel ornare.</p>
                  </div>
                </div>
              <?php endwhile; ?>
            </section>

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
              <?= profile_picture('profile-picture.png'); ?>
              <a href="#" id="name">Arnelle Balane</a>
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
            </section>
          </aside>
        </div>
        
      </div>
    </div>

    <div id="footer-placeholder"></div>
  </div>

  <?php $this->load->view('partials/footer'); ?>
</body>
</html>