<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atte</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')
</head>
<body>
    <header class="header">
        <div class="header__inner">
            <div class="header-utilities">
              <div class="header__logo">
                <a class="page__button" href="/">Atte</a>
              </div>
              <nav>
                <ul class="header-nav">
                   
                    <li class="header-nav__item">
                        <a class="home__button" href="/login">ホーム</a>
                    </li>
                </ul>
                <ul class="header-nav">
                    <li class="header-nav__item">
                        <input type="date"></input>
                        <a class="day__button" href="/date">日付一覧</a>
                    </li>
                </ul>
                <ul class="header-nav">
                    <li class="header-nav__item">
                        <form class="form" action="/logout" method="POST">
                           @csrf 
                           <a class="logout__button" href="/login">ログアウト</a>
                        </form>                       
                    </li>   
                </ul>
               </nav>
            </div>
        </div>
    </header>
    <main>
     @yield('content')

    </main>
</body>
</html>

                    


                    



            
