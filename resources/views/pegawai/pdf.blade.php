<style type="text/css">

	table td, table th{

		border:1px solid black;

	}

</style>

<div class="container">


	<br/>

	


	<table>

		<tr>

			<th>No</th>

			<th>Title</th>

			<th>Description</th>

		</tr>

		@foreach ($data as $key => $item)

		<tr>

			<td>{{ ++$key }}</td>

			<td>{{ $item->id }}</td>

			<td>{{ $item->nama }}</td>

		</tr>

		@endforeach

	</table>

</div>