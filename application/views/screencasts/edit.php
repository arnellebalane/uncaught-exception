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
              <iframe src="<?= $screencast['video_embed_url']; ?>" width="700" height="420"></iframe>
              <div id="loader"></div>
            </div>
            <?= form_open('screencasts/update'); ?>
              <div class="field">
                <input type="text" name="title" placeholder="Title" value="<?= $screencast['title']; ?>" required />
              </div>
              <div class="field">
                <input type="text" name="video_url" placeholder="Video URL" id="video-url" value="<?= $screencast['video_url']; ?>" required />
                <input type="hidden" name="video_embed_url" id="video-embed-url" value="<?= $screencast['video_embed_url']; ?>" />
              </div>
              <div class="field">
                <?= $this->load->view('partials/format-options'); ?>
                <textarea name="description" spellcheck="false" id="textrange"><?= $screencast['description']; ?></textarea>
              </div>
              <div class="field">
                <input type="text" name="tags" placeholder="Tags (comma-separated)" value="<?= $screencast['tags']; ?>" />
              </div>
              <div class="field">
                <input type="hidden" name="id" value="<?= $screencast['id']; ?>" />
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