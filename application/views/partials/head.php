<meta charset="utf-8" />
<link rel="stylesheet" href="<?= base_url() . 'assets/stylesheets/reset.css'; ?>" />
<link rel="stylesheet" href="<?= base_url() . 'assets/stylesheets/fonts.css'; ?>" />
<link rel="stylesheet" href="<?= base_url() . 'assets/stylesheets/application.css'; ?>" />
<link rel="stylesheet" href="<?= base_url() . 'assets/stylesheets/common.css'; ?>" />
<link rel="stylesheet" href="<?= base_url() . 'assets/stylesheets/header.css'; ?>" />
<link rel="stylesheet" href="<?= base_url() . 'assets/stylesheets/content.css'; ?>" />
<link rel="stylesheet" href="<?= base_url() . 'assets/stylesheets/sessions.css'; ?>" />
<link rel="stylesheet" href="<?= base_url() . 'assets/stylesheets/registrations.css'; ?>" />
<link rel="stylesheet" href="<?= base_url() . 'assets/stylesheets/posts.css'; ?>" />
<link rel="stylesheet" href="<?= base_url() . 'assets/stylesheets/screencasts.css'; ?>" />
<link rel="stylesheet" href="<?= base_url() . 'assets/stylesheets/profile.css'; ?>" />
<link rel="stylesheet" href="<?= base_url() . 'assets/stylesheets/pages.css'; ?>" />
<link rel="stylesheet" href="<?= base_url() . 'assets/stylesheets/tags.css'; ?>" />
<link rel="stylesheet" href="<?= base_url() . 'assets/stylesheets/footer.css'; ?>" />
<link rel="stylesheet" href="<?= base_url() . 'assets/plugins/motion-captcha/jquery.motionCaptcha.0.2.css' ?>" />
<link rel="icon" type="image/png" href="<?= base_url() . 'assets/images/logo.png'; ?>" />
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
<script src="<?= base_url() . 'assets/plugins/markdown/js-markdown-extra.js'; ?>"></script>
<script src="<?= base_url() . 'assets/plugins/autosize/jquery.autosize.js'; ?>"></script>
<script src="<?= base_url() . 'assets/plugins/textrange/jquery.textrange.js'; ?>"></script>
<script src="<?= base_url() . 'assets/plugins/motion-captcha/jquery.motionCaptcha.0.2.js'; ?>"></script>
<script src="<?= base_url() . 'assets/javascripts/application.js'; ?>"></script>
<?php if ($action_name == 'show'): ?>
  <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
  <script type="text/javascript">
    stLight.options({
      publisher: "13362950-ecc1-49e2-9673-03049c80a2f7"
    });
  </script>
<?php endif; ?>

<!-- Google Analytics -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-48480415-1', 'uncaughtexception.wefoundyou.org');
  ga('send', 'pageview');

</script>