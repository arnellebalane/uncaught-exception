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
      <form action="#" method="POST" id="registration-form">
        <div class="field">
          <input type="text" name="firstname" placeholder="Firstname" spellcheck="false" autofocus="true" value="<?= restore_value($registration, 'firstname'); ?>" required />
        </div>
        <div class="field">
          <input type="text" name="lastname" placeholder="Lastname" spellcheck="false"  value="<?= restore_value($registration, 'lastname'); ?>" required />
        </div>
        <div class="field">
          <input type="email" name="email" placeholder="Email address" spellcheck="false"  value="<?= restore_value($registration, 'email'); ?>" required />
        </div>
        <div class="field">
          <input type="text" name="username" placeholder="Username" spellcheck="false"  value="<?= restore_value($registration, 'username'); ?>" required />
        </div>
        <div class="field">
          <input type="password" name="password" placeholder="Password" required />
        </div>
        <div class="field">
          <input type="password" name="password_confirmation" placeholder="Confirm Password" />
        </div>
        <div class="field" id="mc">
          <p>Please draw the shape below to submit the form</p>
          <canvas id="mc-canvas"></canvas>
      </div>
        <div class="field">
          <input type="hidden" id="mc-action" value="<?= site_url('registrations/create'); ?>" />
          <input type="submit" value="Sign Up" disabled />
        </div>
        <div class="links">
          <p>Already have an account? <?= anchor('sessions/make', 'Sign In'); ?></p>
        </div>
      </form>
    </div>

    <div id="footer-placeholder"></div>
  </div>

  <?php $this->load->view('partials/footer'); ?>
</body>
</html>