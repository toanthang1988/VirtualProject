@extends('layout.master')

@section('header-items')

	<!-- <nav class="home-menu pure-menu pure-menu-horizontal relative"> -->
		<!-- <h1 class="pure-menu-heading"><a href="">社員管理システム</a></h1> -->
		<!-- <ul class="pure-menu-list force-right"> -->
			<!-- <li class="pure-menu-item"><span class="pure-menu-link">岸 由一郎</span></li> -->
			<!-- <li class="pure-menu-item"><a href="" class="pure-menu-link">検索</a></li> -->
			<!-- <li class="pure-menu-item"><a href="" class="pure-menu-link">追加</a></li> -->
			<!-- <li class="pure-menu-item"><a href="" class="pure-menu-link">ログアウト</a></li> -->
		<!-- </ul> -->
	<!-- </nav> -->



@stop

@section('content')


<section class="contents">

	<h2>追加（完了）</h2>
	<!-- <h2>Hoàn thành Add</h2> -->

	<section>
		<p>


			ID：<a href="{!! url(DETAIL_EMPLOYEE_PATH . $id . '/detail') !!}">{!! $id !!}</a> として追加しました。 

		</p>
		<div>
			
			<!-- <a class="pure-button pure-button-primary" href="">検索画面へ</a> -->
			<a class="pure-button pure-button-primary" href="{{ url(SEARCH_PATH) }}">検索画面へ</a>

		</div>
	</section>
</section>
