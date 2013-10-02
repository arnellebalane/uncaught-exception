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
      <?= form_open('sessions/create'); ?>
        <div class="field">
          <input type="text" name="username" placeholder="Username" autocomplete="off" spellcheck="false" autofocus="true" />
        </div>
        <div class="field">
          <input type="password" name="password" placeholder="Password" />
        </div>
        <div class="field">
          <input type="submit" value="Sign In" />
        </div>
        <div class="links">
          <p>Not yet registered? <?= anchor('registrations/make', 'Sign up'); ?></p>
        </div>
      <?= form_close(); ?>
    </div>

    <div id="footer-placeholder"></div>
  </div>

  <?php $this->load->view('partials/footer'); ?>
</body>
</html>