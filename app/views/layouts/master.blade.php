<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        img{
            margin-left: auto;
            margin-right: auto;

        }
        .topSpace{
            padding-top: 100px;
        }
        .search-bar{
            color: white;
            margin-top: 13px;
            text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;
        }
        .extendo{
            width: 100px;
        }
    </style>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>
        @if(Input::has('user'))
            {{Input::get('user')}}'s Posts
        @elseif(Input::has('search'))
            BlogBlogBlog: {{Input::get('search')}}
        @else
            All blogs posts
        @endif
    </title>

    <!-- Bootstrap Core CSS -->
    <link href="/css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/css/clean-blog.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    

    @yield('head')
    <!-- php5 Shim and Respond.js IE8 support of php5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/php5shiv/3.7.0/php5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
	<!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-custom navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{{ action('PostsController@index') }}}">It's Blog Blog Blog</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        {{ Form::open(array('action' => array('PostsController@index'), 'class' => 'search-bar', 'role' => 'search', 'method' => 'GET')) }}
                            {{ Form::label('search', 'Search') }}
                            {{ Form::text('search') }}
                        {{ Form::close() }}
                    </li>
                    <li>
                        <a href="{{{ action('PostsController@index') }}}">Home</a>
                    </li>
                    <li>
                        <a href="{{{ action('HomeController@about') }}}">About</a>
                    </li>
                    <li>
                        <a href="{{{ action('PostsController@create') }}}">New Post</a>
                    </li>
                    <li>
                        <a href="{{{ action('HomeController@contact') }}}">Contact</a>
                    </li>
                    <li>
                        @if(Auth::check())   
                            <a href="{{{ action('HomeController@doLogout') }}}" class="btn btn-primary white-text" >Logout</a>
                        @else
                            <a href="{{{ action('HomeController@showLogin') }}}" class="btn btn-primary white-text" >Login</a>
                        @endif
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

	@yield('header')

    @yield('content')

<!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <p class="copyright text-muted">Copyright &copy; BlogBlogBlog 2015</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- jQuery -->
    <script src="/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="/js/clean-blog.js"></script>
    @yield('script')
</body>
</html>