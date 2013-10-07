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
            <header class="clearfix">
              <h1><?= $post['title']; ?></h1>
              <div id="tags">
                <?php foreach ($tags as $tag): ?>
                  <?= anchor('#', $tag['name']); ?>
                <?php endforeach; ?>
              </div>

              <section id="stats">
                <ul>
                  <li>
                    <?php if ($liked): ?>
                      <?= anchor('likes/destroy/posts/' . $post['id'], $likes_count, array('class' => 'stat highlighted ' . ($likes_count == 0 ? 'indented' : ''), 'id' => 'item-likes')); ?>
                    <?php else: ?>
                      <?= anchor('likes/create/posts/' . $post['id'], $likes_count, array('class' => 'stat ' . ($likes_count == 0 ? 'indented' : ''), 'id' => 'item-likes')); ?></li>
                    <?php endif; ?>
                  <li><a href="<?= empty($comments) ? '#comment-form' : '#comments'; ?>" class="stat <?= count($comments) == 0 ? 'indented' : ''; ?>" id="item-comments"><?= count($comments); ?></a></li>
                  <li><a href="#" class="stat" id="item-shares"></a></li>
                </ul>
              </section>
            </header>

            <div id="content" class="markdown"><?= $post['content']; ?></div>

            <?php if (!empty($comments)): ?>
              <section id="comments">
                <?php foreach ($comments as $comment): ?>
                  <?php 

                    if ($comment['commentor_id'] != null) {
                      $commentor = $this->user->find($comment['commentor_id']);
                      $commentor['name'] = fullname($commentor);
                    } else {
                      $commentor = array(
                        'profile_picture' => 'profile-picture.jpg',
                        'name' => $comment['commentor_name']
                      );
                    }

                  ?>
                  <div class="comment">
                    <header class="clearfix">
                      <?= profile_picture($commentor['profile_picture']); ?>
                      <h4><?= $commentor['name']; ?></h4>
                    </header>

                    <div class="comment-body"><?= nl2br($comment['content']); ?></div>
                  </div>
                <?php endforeach; ?>
              </section>
            <?php endif; ?>

            <section id="comment-form">
              <?= form_open('comments/create'); ?>
                <div class="field">
                  <textarea name="content" placeholder="Leave a comment..." spellcheck="false"></textarea>
                </div>
                <?php if (!user_logged_in()): ?>
                  <div class="field float-left">
                    <input type="text" name="commentor_name" placeholder="Your name" autocomplete="off" spellcheck="false" />
                  </div>
                  <div class="field float-right">
                    <input type="email" name="commentor_email" placeholder="Your email" autocomplete="off" spellcheck="false" />
                  </div>
                <?php endif; ?>
                <div class="field">
                  <input type="hidden" name="commentable_type" value="posts" />
                  <input type="hidden" name="commentable_id" value="<?= $post['id']; ?>" />
                  <input type="submit" value="Post Comment" />
                </div>
              <?= form_close(); ?>
            </section>
          </div>

          <aside class="sidebar">
            <section id="user-profile">
              <?= profile_picture($user['profile_picture']); ?>
              <?= anchor('profile/show/' . $user['id'], fullname($user), array('id' => 'name')); ?>
              <?php if (!empty($user['networks'])): ?>
                <ul class="social-links">
                  <?php foreach ($user['networks'] as $network): ?>
                    <li><?= anchor(social_network_url($network), '<span class="link" id="' . format_network_name($network) . '"></span><p>' . $network['handle'] . '</p>'); ?></li>
                  <?php endforeach; ?>
                </ul>
              <?php endif; ?>
            </section>

            <?php if (!empty($related_posts)): ?>
              <section id="related-items">
                <h3>Related Posts</h3>
                <?php foreach ($related_posts as $related_post): ?>
                  <?= anchor('posts/show/' . $related_post['slug'], $related_post['title']); ?>
                <?php endforeach; ?>
              </section>
            <?php endif; ?>
          </aside>
        </div>
      </div>
    </div>

    <div id="footer-placeholder"></div>
  </div>

  <?php $this->load->view('partials/footer'); ?>
</body>
</html>