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
      <?= form_open('registrations/create'); ?>
        <div class="field">
          <input type="text" name="firstname" placeholder="Firstname" spellcheck="false" autofocus="true" required />
        </div>
        <div class="field">
          <input type="text" name="lastname" placeholder="Lastname" spellcheck="false" required />
        </div>
        <div class="field">
          <input type="email" name="email" placeholder="Email address" spellcheck="false" required />
        </div>
        <div class="field">
          <input type="text" name="username" placeholder="Username" spellcheck="false" required />
        </div>
        <div class="field">
          <input type="password" name="password" placeholder="Password" required />
        </div>
        <div class="field">
          <input type="password" name="password_confirmation" placeholder="Confirm Password" />
        </div>
        <div class="field">
          <input type="submit" value="Sign Up" />
        </div>
        <div class="links">
          <p>Already have an account? <?= anchor('sessions/make', 'Sign In'); ?></p>
        </div>
      <?= form_close(); ?>
    </div>

    <div id="footer-placeholder"></div>
  </div>

  <?php $this->load->view('partials/footer'); ?>
</body>
</html>