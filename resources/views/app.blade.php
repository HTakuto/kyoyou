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
.search-form {
    display: none;
    position: absolute;
    top: 100%;
    width: 100%;
    z-index: 100;
    background-color: navy;
    margin: 0px;
}

.search-form input {
    border-radius: 4px;
    font-size: 1rem;
    padding: 0.5rem 1rem;
    width: 100%;
}

/* 全体 */
.row {
    padding: 20px 20px;
}

.card{
    margin-bottom: 20px;
}

/* ユーザーランキングアイコン */
.list-group-item > i{
    font-size: 16px;
}

/* 記事 */
.article-pdf-container {
  max-width: 100%;
  overflow: hidden;
}
.article-pdf {
  height: 500px;
  border: none;
}
.col-md-3 {
    margin-top: 15px;
}

/* footer */
.footer {
  background-color: #23282d;
  color: #fff;
  padding: 50px 0;
}

.footer__container {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  max-width: 1200px;
  margin: 0 auto;
}

.footer__item {
  flex: 0 1 300px;
  margin-right: 40px;
}

.footer__heading {
  font-size: 18px;
  margin-bottom: 20px;
}

.footer__list {
  list-style: none;
  margin: 0;
  padding: 0;
}

.footer__list li {
  margin-bottom: 10px;
}

.footer__list a {
  color: #fff;
  text-decoration: none;
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

  .footer__container {
        flex-wrap: wrap;
        justify-content: flex-start;
        padding: 0px 50px;
    }

    .footer__item {
        flex: 0 1 100%;
        margin-right: 0;
        margin-bottom: 40px;
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
