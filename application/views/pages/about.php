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
        <section>
          <h3>About Uncaught Exception</h3>
          <p>Uncaught Exception is a place for developers by developers. It's main purpose is to be a platform where developers share tips, tutorials and inspirations.</p>
        </section>
        <section>
          <h3>About Me</h3>
          <p>Hello, I am cool person somebody.</p>
        </section>
      </div>
    </div>

    <div id="footer-placeholder"></div>
  </div>

  <?php $this->load->view('partials/footer'); ?>
</body>
</html>