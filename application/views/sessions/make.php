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
        <?php if ($this->session->flashdata('error')): ?>
          <p class="error"><?= $this->session->flashdata('error'); ?></p>
        <?php endif; ?>

        <div class="field">
          <input type="text" name="username" placeholder="Username" autofocus="true" />
        </div>
        <div class="field">
          <input type="password" name="password" placeholder="Password" />
        </div>
        <div class="field">
          <input type="submit" value="Sign In" />
        </div>
      <?= form_close(); ?>
    </div>

    <div id="footer-placeholder"></div>
  </div>

  <?php $this->load->view('partials/footer'); ?>
</body>
</html>