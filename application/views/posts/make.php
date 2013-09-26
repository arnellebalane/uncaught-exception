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
      <div class="wrapper clearfix">
        <div class="item clearfix">
          <?= form_open('posts/create', array('class' => 'main')); ?>
            <div class="field">
              <input type="text" name="title" placeholder="Title" autocomplete="off" spellcheck="false" />
            </div>
            <div class="field">
              <textarea name="content" placeholder="" spellcheck="false"></textarea>
            </div>
            <div class="field">
              <input type="text" name="tags" placeholder="Tags (comma-separated)" autocomplete="off" spellcheck="false" />
            </div>
            <div class="field">
              <input type="submit" value="Publish Post" />
            </div>
          <?= form_close(); ?>

          <aside class="sidebar">
            <h3>Formatting Guide</h3>
            <p>**bold**</p>
            <p>__italic__</p>
          </aside>
        </div>
      </div>
    </div>

    <div id="footer-placeholder"></div>
  </div>

  <?php $this->load->view('partials/footer'); ?>
</body>
</html>