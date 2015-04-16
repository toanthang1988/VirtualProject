@if($data)
	@if(count($data) > 0)


	<section>
		<table class="pure-table pure-table-bordered">
			<thead>
				<tr>
					<th>ID</th>

					<!-- Name -->
					<th>名前</th>

					<!-- Email -->
					<th>メールアドレス</th>

					<!-- Phone -->
					<th>電話番号</th>

					<!-- Birthday -->
					<th>生年月日</th>

					<!-- Update Date -->
					<th>更新日時</th>

					<!-- Permission - Nguoi quan ly -->
					<th>権限</th>
				</tr>
			</thead>
			<tbody>
				
					@foreach($data as $value)
					<tr class="pure-table-odd">
						<td>{!! $value['id'] !!}</td>
						<td><a href="{!! url(DETAIL_EMPLOYEE_PATH . $value['id'] . '/detail') !!}">{!! $value['name'] !!}</a></td>
						<td>{!! $value['email'] !!}</td>
						<td>{!! $value['phone'] !!}</td>
						<td>{!! $value['birthday'] !!}</td>
						<td>{!! $value['updated_at'] !!}</td>
						<td>{!! $value['boss_id'] !!}</td>
					</tr>
					@endforeach
				
			</tbody>
		</table>

	</section>

	@else
		Khong co ban ghi duoc tim thay

	@endif
@endif