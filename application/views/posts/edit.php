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
          <div class="main">
            <?= form_open('posts/update', array('class' => 'main')); ?>
              <div class="field">
                <input type="text" name="title" placeholder="Title" autocomplete="off" spellcheck="false" value="<?= $post['title']; ?>" required />
              </div>
              <div class="field">
                <?php $this->load->view('partials/format-options'); ?>
                <textarea name="content" placeholder="" spellcheck="false" id="textrange" required><?= $post['content']; ?></textarea>
              </div>
              <div class="field">
                <input type="text" name="tags" placeholder="Tags (comma-separated)" autocomplete="off" spellcheck="false" value="<?= $post['tags']; ?>" />
              </div>
              <div class="field">
                <input type="hidden" name="id" value="<?= $post['id']; ?>" />
                <input type="submit" value="Update Post" />
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