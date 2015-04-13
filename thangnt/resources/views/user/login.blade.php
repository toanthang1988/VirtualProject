@extends('layout.master')
@section('content')

<div width="500px">
<h2>ログイン</h2>
	<section>
		<form class="pure-form" method="POST" action="{!! url('login') !!}">
			<fieldset class="pure-group">
				<input type="text" name="email" class="pure-input-1-4 required" placeholder="メールアドレス">
				<input type="password" name="password" class="pure-input-1-4 required" placeholder="パスワード">
			</fieldset>
			<button type="submit" class="pure-button pure-input-1-4 pure-button-primary">ログイン</button>
			<input type="hidden" name="_method" value="POST">
    		<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
		</form>
	</section>

</div>

@stop