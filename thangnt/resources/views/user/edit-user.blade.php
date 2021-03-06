@extends('layout.master')



@section('content')


@if ((!checkPermission() and \Auth::user()->id != $data['id']) or
		(\Auth::user()->role_id == ROLE_BOSS and $data['role_id'] == ROLE_ADMIN))
	@include('user.access-denied')
@else
	
@include('layout.error')

<section class="contents">
	<!-- Edit -->
	<h2>編集</h2>
	<!-- <h2>編集</h2> -->
	
	<section>
		<form class="pure-form pure-u-3-4" method="POST" action="{!! url(DETAIL_EMPLOYEE_PATH . $data['id'] . '/edit/conf') !!}">
		<input type="hidden" name="_token" value="{{csrf_token()}}" />
    	<input type="hidden" name="_method" id="_method" value="POST" />

		<table class="pure-table pure-table-bordered" width="100%">
			<tbody>
				<tr>
					<!-- ID -->
					<th>ID</th>
					<td>{!! $data['id'] !!}</td>
				</tr>
				<tr>
					<!-- Name -->
					<!-- <th>名前</th> -->
					<th class="{!! checkErrorCell('name', $errors) !!}">名前</th>
					<td><input name="name" value="{!! old('name') ? old('name') : $data['name'] !!}" class="pure-input-1" type="text">{{checkLabelError('name', $errors)}}</td>
					
				</tr>
				<tr>
					<!-- Name Kana -->
					<th class="{!! checkErrorCell('kana', $errors) !!}">名前（カナ）</th>
					<!-- <th>名前（カナ）</th> -->

					<td><input name="kana" value="{!! old('kana') ? old('kana') : $data['kana'] !!}" class="pure-input-1" type="text">{{checkLabelError('kana', $errors)}}</td>
					
				</tr>


				<tr>
					<!-- Email -->
					<th class="{!! checkErrorCell('email', $errors) !!}">メールアドレス</th>
					<!-- <th>メールアドレス</th> -->
					<td><input name="email" value="{!! old('email') ? old('email') : $data['email'] !!}" class="pure-input-1" type="text">{{checkLabelError('email', $errors)}}</td>
					
				</tr>
				<tr>
					<!-- Email Confirm -->
					<th class="{!! checkErrorCell('email_confirmation', $errors) !!}">メールアドレス（確認) </th>
					<!-- <th>メールアドレス（確認) </th> -->
					<td><input name="email_confirmation" value="{!! old('email_confirmation') ? old('email_confirmation') : '' !!}" class="pure-input-1" type="text">{{checkLabelError('email_confirmation', $errors)}}</td>
					
				</tr>


				<tr>
					<!-- Phone -->
					<th class="{!! checkErrorCell('phone', $errors) !!}">電話番号</th>
					<!-- <th>電話番号</th> -->
					<td><input name="phone" value="{!! old('phone') ? old('phone') : $data['phone'] !!}" class="pure-input-1" type="text">{{checkLabelError('phone', $errors)}}</td>

				</tr>
				<tr>
					<!-- Birthday -->
					<th class="{!! checkErrorCell('birthday', $errors) !!}">生年月日</th>
					<!-- <th>生年月日</th> -->
					<td><input name="birthday" value="{!! old('birthday') ? old('birthday') : $data['birthday'] !!}" class="pure-input-1" type="text">{{checkLabelError('birthday', $errors)}}</td>
				</tr>


				@if(checkPermission())

				<tr>
					<!-- Note -->
					<th class="{!! checkErrorCell('note', $errors) !!}">ノート</th>
					<!-- <th>ノート</th> -->
					<td>
						<textarea name="note" class="pure-input-1" rows="10">{!! old('note') ? old('note') : $data['note'] !!}</textarea>
						{{checkLabelError('note', $errors)}}
					</td>
				</tr>

				@endif
				<tr>
					<!-- Password -->
					<th class="{!! checkErrorCell('password', $errors) !!}">パスワード</th>
					<!-- <th>パスワード</th> -->
					<td><input type="password" name="password" class="pure-input-1" type="password">
						{{checkLabelError('password', $errors)}}
					</td>
				</tr>


				@if(\Auth::user()->role_id == ROLE_ADMIN)
				<tr>
					<th class="{!! checkErrorCell('role_id', $errors) !!}">権限</th>
					<td><select name="role_id[]" class="pure-input-1">
							<option value="{!! ROLE_EMPLOYEE !!}">従業員</option>
							<option value="{!! ROLE_BOSS !!}">BOSS</option>
							<option value="{!! ROLE_ADMIN !!}">管理者</option>
						</select>
					</td>
				</tr>

				<tr>
					<th class="{!! checkErrorCell('boss_id', $errors) !!}">BOSS</th>
					<td><select name="boss_id[]" class="pure-input-1">
							<option value="-1">--</option>
							@foreach($bosses as $value)

								<option value="{{ $value->id }}" {{ ($value->id == $data['boss_id']) ? ' checked' : ''}}>{{$value->kana}}</option>
							@endforeach
							
						</select>
					</td>
				</tr>

				@else
				<input type="hidden" name="boss_id" value="{!! $data['boss_id'] !!}"/>
				@endif


				<tr>
					<td colspan="2" align="right">
						<!-- Back Button -->
						@if(isset($_SERVER['HTTP_REFERER']) and !$_SERVER['HTTP_REFERER'] == '')
							<input type="hidden" value="{{$referer = $_SERVER['HTTP_REFERER']}}">
						@else
							<input type="hidden" value="{!!$referer = ''!!}">
						@endif

						<a class="pure-button pure-button-primary" href="{!! $referer !!}">戻る</a>
						<!-- <a class="pure-button pure-button-primary" href="{!! $referer !!}">戻る</a> -->

						<!-- Confirm Submit -->
						

						<button class="pure-button button-error" name="submit" type="submit">確認</button>
						<!-- <button class="pure-button button-error" name="submit" type="submit">確認</button> -->
						
					</td>
				</tr>
			</tbody>
		</table>
		<input type="hidden" name="id" value="{!! $data['id'] !!}"/>
		<input type="hidden" name="role_id" value="{!! $data['role_id'] !!}"/>

		

		</form>
	</section>
</section>

@endif
@stop