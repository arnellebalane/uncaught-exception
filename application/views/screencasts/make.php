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
            <div id="video">
              <iframe width="700" height="420"></iframe>
              <div id="loader"></div>
            </div>
            <?= form_open('screencasts/create'); ?>
              <div class="field">
                <input type="text" name="title" placeholder="Title" required />
              </div>
              <div class="field">
                <input type="text" name="video_url" placeholder="Video URL" id="video-url" required />
                <input type="hidden" name="video_embed_url" id="video-embed-url" />
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
            <?= form_close(); ?>
          </div>
        </div>
      </div>
    </div>

    <div id="footer-placeholder"></div>
  </div>

  <?php $this->load->view('partials/footer'); ?>
</body>
</html>