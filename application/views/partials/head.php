<meta charset="utf-8" />
<link rel="stylesheet" href="<?= base_url() . 'assets/stylesheets/reset.css'; ?>" />
<link rel="stylesheet" href="<?= base_url() . 'assets/stylesheets/fonts.css'; ?>" />
<link rel="stylesheet" href="<?= base_url() . 'assets/stylesheets/application.css'; ?>" />
<link rel="stylesheet" href="<?= base_url() . 'assets/stylesheets/common.css'; ?>" />
<link rel="stylesheet" href="<?= base_url() . 'assets/stylesheets/header.css'; ?>" />
<link rel="stylesheet" href="<?= base_url() . 'assets/stylesheets/content.css'; ?>" />
<link rel="stylesheet" href="<?= base_url() . 'assets/stylesheets/sessions.css'; ?>" />
<link rel="stylesheet" href="<?= base_url() . 'assets/stylesheets/posts.css'; ?>" />
<link rel="stylesheet" href="<?= base_url() . 'assets/stylesheets/screencasts.css'; ?>" />
<link rel="stylesheet" href="<?= base_url() . 'assets/stylesheets/profile.css'; ?>" />
<link rel="stylesheet" href="<?= base_url() . 'assets/stylesheets/pages.css'; ?>" />
<link rel="stylesheet" href="<?= base_url() . 'assets/stylesheets/footer.css'; ?>" />
<!--
  <script type="text/javascript">
    var less = {
        env: "development",
        async: false,
        fileAsync: false,
        poll: 1,
        functions: {},
        dumpLineNumbers: "comments",
        relativeUrls: false
    };
  </script>
-->
<script src="<?= base_url() . 'assets/javascripts/jquery-2.js'; ?>"></script>
<!--
  <script src="<?= base_url() . 'assets/javascripts/less.js'; ?>"></script>
-->
<script src="<?= base_url() . 'assets/javascripts/js-markdown-extra.js'; ?>"></script>
<script src="<?= base_url() . 'assets/javascripts/jquery.autosize.js'; ?>"></script>
<script src="<?= base_url() . 'assets/javascripts/application.js'; ?>"></script>
<?php if ($action_name == 'show'): ?>
  <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
  <script type="text/javascript">
    stLight.options({
      publisher: "13362950-ecc1-49e2-9673-03049c80a2f7"
    });
  </script>
<?php endif; ?>