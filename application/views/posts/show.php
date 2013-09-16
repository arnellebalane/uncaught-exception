<!DOCTYPE html>
<html lang="en">
<head>
  <?php include "partials/head.php"; ?>
  <title>Uncaught Exception</title>
</head>

<body class="posts show">
  <div id="main-wrapper">
    <?php include "partials/header.php"; ?>

    <div id="content-area">
      <div class="wrapper clearfix">
        <div class="post clearfix">
          <div class="content">
            <header class="clearfix">
              <h1>Lorem Ipsum Dolor Sit Amet Consectetur Adipiscing Elit</h1>
              <div id="tags">
                <a href="#">lorem</a>
                <a href="#">ipsum</a>
                <a href="#">dolor</a>
                <a href="#">consectetur</a>
              </div>

              <section id="post-stats">
                <ul>
                  <li><a href="#" class="stat" id="post-likes"></a></li>
                  <li><a href="#" class="stat" id="post-comments"></a></li>
                  <li><a href="#" class="stat" id="post-shares"></a></li>
                </ul>
              </section>
            </header>

            <div id="post-body">
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque aliquet tincidunt ipsum sit amet consectetur. Integer eros sapien, feugiat vitae adipiscing eget, tincidunt et elit. Nulla facilisi. Phasellus vel neque leo. Curabitur sed felis sodales, ornare nisl vitae, convallis risus. Mauris consequat, ante eget eleifend elementum, diam elit rhoncus dui, fermentum aliquam dolor neque vitae urna. Proin sodales neque adipiscing lorem molestie cursus. Mauris faucibus diam nisl, nec adipiscing lacus gravida id. Ut pretium eu urna quis pharetra. Duis dapibus, tellus in pellentesque rutrum, tellus augue sodales mauris, sed mollis nunc purus eu urna. Donec sagittis sapien eget fringilla condimentum.</p>

              <p>Suspendisse ut commodo neque, nec consectetur dolor. Aliquam urna nibh, pellentesque lobortis nunc eget, lacinia blandit quam. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Fusce semper interdum enim vel ornare. Aliquam id vehicula neque. Nam in nibh dolor. Mauris hendrerit tincidunt orci quis varius. Cras a vulputate arcu. Pellentesque ac tincidunt libero, vitae pulvinar leo. Cras ultricies pellentesque congue. Donec sagittis et tortor non ultricies. Sed non viverra purus. Duis pretium sapien in lacinia congue. Sed condimentum eget risus ut venenatis.</p>

              <p>Suspendisse potenti. Ut iaculis, urna non ornare placerat, urna est blandit ante, id consequat elit odio a neque. Maecenas ac nisi at mi egestas euismod. Cras tempor mauris eros, a vehicula sapien malesuada id. Suspendisse potenti. Pellentesque sit amet pharetra lectus, eget interdum nulla. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec mollis vehicula turpis, sed tempus magna blandit sit amet. Maecenas vitae  nisl. Suspendisse sed quam vehicula justo congue porttitor.</p>
            </div>

            <section id="comments">
              <div class="comment">
                <header class="clearfix">
                  <span class="profile-picture" style="background-image: url('images/profile-picture.png')"></span>
                  <h4>Arnelle Balane</h4>
                </header>

                <div class="comment-body">
                  <p>Suspendisse ut commodo neque, nec consectetur dolor. Aliquam urna nibh, pellentesque lobortis nunc eget, lacinia blandit quam. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Fusce semper interdum enim vel ornare.</p>
                </div>
              </div>

              <div class="comment">
                <header class="clearfix">
                  <span class="profile-picture" style="background-image: url('images/profile-picture.png')"></span>
                  <h4>Arnelle Balane</h4>
                </header>

                <div class="comment-body">
                  <p>Suspendisse ut commodo neque, nec consectetur dolor. Aliquam urna nibh, pellentesque lobortis nunc eget, lacinia blandit quam. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Fusce semper interdum enim vel ornare. Aliquam id vehicula neque. Nam in nibh dolor. Suspendisse ut commodo neque, nec consectetur dolor. Aliquam urna nibh, pellentesque lobortis nunc eget, lacinia blandit quam. Vestibulum ante ipsum primis in faucibus orci luctus.</p>
                </div>
              </div>

              <div class="comment">
                <header class="clearfix">
                  <span class="profile-picture" style="background-image: url('images/profile-picture.png')"></span>
                  <h4>Arnelle Balane</h4>
                </header>

                <div class="comment-body">
                  <p>Suspendisse ut commodo neque, nec consectetur dolor. Aliquam urna nibh, pellentesque lobortis nunc eget, lacinia blandit quam. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Fusce semper interdum enim vel ornare. Aliquam id vehicula neque. Nam in nibh dolor.</p>
                </div>
              </div>
            </section>

            <section id="comment-form">
              <form action="#" method="POST">
                <div class="field">
                  <textarea name="content" placeholder="Leave a comment..." spellcheck="false"></textarea>
                </div>
                <div class="field float-left">
                  <input type="text" name="name" placeholder="Your name" autocomplete="off" spellcheck="false" />
                </div>
                <div class="field float-right">
                  <input type="email" name="email" placeholder="Your email" autocomplete="off" spellcheck="false" />
                </div>
                <div class="field">
                  <input type="submit" value="Post Comment" />
                </div>
              </form>
            </section>
          </div>

          <aside>
            <section id="author-profile">
              <span class="profile-picture" style="background-image: url('images/profile-picture.png')"></span>
              <a href="#" id="name">Arnelle Balane</a>
              <ul class="social-links">
                <li>
                  <a href="#">
                    <span class="link" id="facebook"></span>
                    <p>arnellebalane</p>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <span class="link" id="twitter"></span>
                    <p>@arnellebalane</p>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <span class="link" id="google-plus"></span>
                    <p>arnellebalane</p>
                  </a>
                </li>
              </ul>
            </section>

            <section id="related-posts">
              <h3>Related Posts</h3>
              <a href="#">Lorem Ipsum Dolor Sit Amet</a>
              <a href="#">Lorem Ipsum Dolor Sit Amet Consectetur Adipiscing Elit</a>
              <a href="#">Lorem Ipsum Dolor Sit Amet</a>
            </section>
          </aside>
        </div>
      </div>
    </div>

    <div id="footer-placeholder"></div>
  </div>

  <?php include "partials/footer.php"; ?>
</body>
</html>