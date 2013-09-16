<meta charset="utf-8" />
<?= link_tag('assets/stylesheets/reset.css'); ?>
<?= link_tag('assets/stylesheets/application.less', 'stylesheet/less'); ?>
<?= link_tag('assets/stylesheets/common.less', 'stylesheet/less'); ?>
<?= link_tag('assets/stylesheets/header.less', 'stylesheet/less'); ?>
<?= link_tag('assets/stylesheets/content.less', 'stylesheet/less'); ?>
<?= link_tag('assets/stylesheets/posts.less', 'stylesheet/less'); ?>
<?= link_tag('assets/stylesheets/footer.less', 'stylesheet/less'); ?>
<?= link_tag('assets/stylesheets/common.less', 'stylesheet/less'); ?>
<script type="text/javascript">
  var less = {
      env: "development",
      async: false,
      fileAsync: false,
      poll: 1000,
      functions: {},
      dumpLineNumbers: "comments",
      relativeUrls: false
  };
</script>
<script src="<?= base_url() . 'assets/javascripts/jquery-2.js'; ?>"></script>
<script src="<?= base_url() . 'assets/javascripts/less.js'; ?>"></script>
<script src="<?= base_url() . 'assets/javascripts/application.js'; ?>"></script>