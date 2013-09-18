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
        
        <div class="screencast clearfix">
          <div class="video"></div>
          <div class="content">
            <header class="clearfix">
              <h1>Lorem Ipsum Dolor Sit Amet Consectetur Adipiscing Elit</h1>
              <div id="tags">
                <a href="#">lorem</a>
                <a href="#">ipsum</a>
                <a href="#">dolor</a>
                <a href="#">consectetur</a>
              </div>

              <section id="screencast-stats">
                <ul>
                  <li><a href="#" class="stat" id="post-likes"></a></li>
                  <li><a href="#" class="stat" id="post-comments"></a></li>
                  <li><a href="#" class="stat" id="post-shares"></a></li>
                </ul>
              </section>
            </header>

            <div id="screencast-description">
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque aliquet tincidunt ipsum sit amet consectetur.</p>
            </div>
          </div>

          <aside>
            <section id="author-profile">
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