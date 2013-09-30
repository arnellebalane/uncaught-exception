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
        <?= form_open('profile/update'); ?>
          <div id="user-profile" class="clearfix">
            <?= profile_picture($user['profile_picture']); ?>
            <div class="details">
              <input type="text" name="firstname" value="<?= $user['firstname']; ?>" placeholder="Firstname" autocomplete="off" spellcheck="false" />
              <input type="text" name="lastname" value="<?= $user['lastname']; ?>" placeholder="Lastname" autocomplete="off" spellcheck="false" />
              <textarea name="about" placeholder="Write something about you..." spellcheck="false"><?= $user['about']; ?></textarea>
            </div>
          </div>
          <div id="login-settings">
            <div class="field">
              <label>Username</label>
              <input type="text" name="username" value="<?= $user['username']; ?>" />
            </div>
            <div class="field">
              <label>Email</label>
              <input type="email" name="email" value="<?= $user['email']; ?>" />
            </div>
            <div class="field">
              <label>Password</label>
              <input type="password" name="password" />
            </div>
            <div class="field">
              <label>Confirm Password</label>
              <input type="password" name="password_confirmation" />
            </div>
          </div>
          <div class="actions">
            <input type="submit" value="Save Changes" />
          </div>
        <?= form_close(); ?>
      </div>
    </div>

    <div id="footer-placeholder"></div>
  </div>

  <?php $this->load->view('partials/footer'); ?>
</body>
</html>