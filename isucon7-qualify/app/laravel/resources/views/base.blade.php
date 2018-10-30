<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    <title>Isubata</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/main.css">
    <script type="text/javascript" src="/js/jquery.min.js"></script>
    <script type="text/javascript" src="/js/tether.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
  </head>
  <body>

    <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
      <button class="navbar-toggler navbar-toggler-right hidden-lg-up" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="/">Isubata</a>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="nav navbar-nav ml-auto">
          <?php if (isset($channel_id) && $channel_id) : ?>
            <li class="nav-item"><a href="/history/<?= $channel_id ?>" class="nav-link">チャットログ</a></li>
          <?php endif; ?>
          <?php if (isset($user)) : ?>
            <li class="nav-item"><a href="/add_channel" class="nav-link">チャンネル追加</a></li>
            <li class="nav-item"><a href="/profile/<? $user['name'] ?>" class="nav-link"><?= $user['display_name'] ?></a></li>
            <li class="nav-item"><a href="/logout" class="nav-link">ログアウト</a></li>
          <?php else : ?>
            <li><a href="/register" class="nav-link">新規登録</a></li>
            <li><a href="/login" class="nav-link">ログイン</a></li>
          <?php endif; ?>
        </ul>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-sm-3 col-md-3 hidden-xs-down bg-faded sidebar">
          <?php //if (isset($user)) : ?>
          <ul class="nav nav-pills flex-column">
            <?php foreach ($channels as $channel) : ?>
            <li class="nav-item">
              <a class="nav-link justify-content-between <?php if ($channel_id == $channel['id']) echo 'active' ?>"
                 href="/channel/<?= $channel['id'] ?>">
                <?= $channel['name'] ?>
                <span class="badge badge-pill badge-primary float-right" id="unread-<?= $channel['id'] ?>"></span>
              </a>
            </li>
            <?php endforeach; ?>
          </ul>
          <?php //endif; ?>
        </nav>
        <main class="col-sm-9 offset-sm-3 col-md-9 offset-md-3 pt-3">
          @yield('content')
        </main>
      </div>
	</div>
  </body>
</html>