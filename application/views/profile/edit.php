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
              <input type="text" name="firstname" value="<?= $user['firstname']; ?>" placeholder="Firstname" autocomplete="off" spellcheck="false" required />
              <input type="text" name="lastname" value="<?= $user['lastname']; ?>" placeholder="Lastname" autocomplete="off" spellcheck="false" required />
              <textarea name="about" placeholder="Write something about you..." spellcheck="false"><?= $user['about']; ?></textarea>
            </div>
          </div>

          <div id="login-settings">
            <h6>Login Settings</h6>
            <div class="field">
              <label>Username</label>
              <input type="text" name="username" value="<?= $user['username']; ?>" required />
            </div>
            <div class="field">
              <label>Email</label>
              <input type="email" name="email" value="<?= $user['email']; ?>" required />
            </div>
            <div class="field">
              <label>Password</label>
              <input type="password" name="password" />
              <span>Leave blank if you don't want to change.</span>
            </div>
            <div class="field">
              <label>Confirm Password</label>
              <input type="password" name="password_confirmation" />
            </div>
          </div>

          <div id="social-connections">
            <h6>Social Connections</h6>
            <?php foreach ($social_networks as $social_network): ?>
              <?php $connection = $this->social_network->get_user_connection($current_user['id'], $social_network['id']); ?>
              <?php $handle = empty($connection) ? '' : $connection['handle']; ?>
              <input type="text" name="connections[<?= $social_network['id']; ?>]" class="link" id="<?= strtolower(str_replace(' ', '-', $social_network['name'])); ?>" value="<?= $handle; ?>" />
            <?php endforeach; ?>
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