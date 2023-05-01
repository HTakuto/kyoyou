<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>
    @yield('title')
  </title>
  <!--ファビコン -->
  <link rel="icon" href="favicon.ico">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.11/css/mdb.min.css" rel="stylesheet">
  <!-- CSS -->
  <link rel="stylesheet" href="../../public/css/app.css">
</head>

<body>

  <div id="app">
    @yield('content')
  </div>

  <script src="{{ mix('js/app.js') }}"></script>
  <!-- JQuery -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.11/js/mdb.min.js"></script>
</body>

</html>

<style>
/* ナビバー全体 */
.navbar {
    background-color: navy;
    display: flex;
    align-items: center;
    justify-content: center;
}

ul.navbar-nav li {
    margin: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* アプリアイコン */
.navbar-brand {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 50px;
    margin-bottom: 12px;
}
.navbar-brand img {
    width: 50px;
    height: auto;
}
.navbar-brand h1 {
    margin: 0;
    font-size: 24px;
    margin-top: 15px;
}

/* 新規登録ボタン */
.signup-btn {
    display: inline-block;
    padding: 0px 5px;
    border: 2px solid #fff;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.1s ease-out, color 0.1s ease-out;
}
.signup-btn:hover {
    background-color: #222299;
    color: navy;
}
.post-btn {
    display: inline-block;
    padding: 0px 5px;
    border: 2px solid #fff;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.1s ease-out, color 0.1s ease-out;
}
.post-btn:hover {
    background-color: #222299;
    color: navy;
}

.fa-bell {
    color: #fff;
    padding: 8px 0px 8px 8px;
}

/* 検索アイコン */
.search-icon {
    padding: 0 1rem;
    position: relative;
    margin: 8px;
}

.search-icon i {
    color: #fff;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
}

.search-form {
    display: none;
    position: absolute;
    top: 100%;
    width: 100%;
    z-index: 100;
    background-color: navy;
}

.search-form input {
    border-radius: 4px;
    font-size: 1rem;
    padding: 0.5rem 1rem;
    width: 100%;
}

.container {
    padding: 20px 0px;
}

/* レスポンシブ */
@media (min-width: 768px) {
    .search-icon {
        display: none;
    }
    .search-form {
        display: flex;
        align-items: center;
        justify-content: center;
        position: static;
        width: auto;
    }

    .search-form input {
        margin-right: 0.5rem;
        width: 20rem;
    }
}

@media (max-width: 600px) {
  .nav-last {
    display: none;
  }

  .card{
    margin: 20px;
  }

  .search-form {
    position: absolute;
    top: 100%;
    right: 0;
    z-index: 999;
  }
}
</style>

<script>
// クリックしたら検索バー表示
$(function() {
  $('.search-icon').on('click', function() {
    $('.search-form').slideToggle();
  });
});
</script>
