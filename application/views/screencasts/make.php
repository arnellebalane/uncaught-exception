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
        <div class="item">
          <div class="main">
            <div class="video"></div>
            <form action="#" method="POST">
              <div class="field">
                <input type="text" name="title" placeholder="Title" />
              </div>
              <div class="field">
                <input type="text" name="link" placeholder="Video URL" />
              </div>
              <div class="field">
                <textarea name="description"></textarea>
              </div>
              <div class="field">
                <input type="text" name="tags" placeholder="Tags (comma-separated)" />
              </div>
              <div class="field">
                <input type="submit" value="Publish Screencast" />
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div id="footer-placeholder"></div>
  </div>

  <?php $this->load->view('partials/footer'); ?>
</body>
</html>