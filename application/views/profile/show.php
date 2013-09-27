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
            <p><?= nl2br($user['about']); ?></p>
          </div>
        </div>
        <div id="user-connections">
          <label>Find Me Online</label>
          <ul class="social-links">
            <li><a href="#" class="link" id="facebook">arnellebalane</a></li>
            <li><a href="#" class="link" id="twitter">@arnellebalane</a></li>
            <li><a href="#" class="link" id="google-plus">arnellebalane</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div id="footer-placeholder"></div>
  </div>

  <?php $this->load->view('partials/footer'); ?>
</body>
</html>