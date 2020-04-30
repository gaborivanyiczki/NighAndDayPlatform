<table class="table table-bordered table-striped">
    <thead>
    <tr>
    		<th>Name </th>
		<th>Slug </th>
		<th>ProductCode </th>
		<th>Warranty </th>
		<th>Return </th>
		<th>Delivery </th>
		<th>Price </th>
		<th>DiscountPrice </th>
		<th>Discount </th>
		<th>Quantity </th>
		<th>Status ID </th>
		<th>Category ID </th>
		<th>Brand ID </th>
		<th>Active </th>
		<th>Favorite </th>
		<th>CreatedUser </th>
		<th>&nbsp;</th>
    </tr>
    </thead>
    <tbody>
    @foreach($records as $record)
    <tr>	 	<td> {{$record->Name }} </td>
	 	<td> {{$record->Slug }} </td>
	 	<td> {{$record->ProductCode }} </td>
	 	<td> {{$record->Warranty }} </td>
	 	<td> {{$record->Return }} </td>
	 	<td> {{$record->Delivery }} </td>
	 	<td> {{$record->Price }} </td>
	 	<td> {{$record->DiscountPrice }} </td>
	 	<td> {{$record->Discount }} </td>
	 	<td> {{$record->Quantity }} </td>
	 	<td> {{$record->Status_ID }} </td>
	 	<td> {{$record->Category_ID }} </td>
	 	<td> {{$record->Brand_ID }} </td>
	 	<td> {{$record->Active }} </td>
	 	<td> {{$record->Favorite }} </td>
	 	<td> {{$record->CreatedUser }} </td>
	<td><a class="btn btn-secondary" href="{{route('products.show',$record->id)}}">
    <span class="fa fa-eye"></span>
</a><a class="btn btn-secondary" href="{{route('products.edit',$record->id)}}">
    <span class="fa fa-pencil"></span>
</a>
<form onsubmit="return confirm('Are you sure you want to delete?')"
      action="{{route('products.destroy',$record->id)}}"
      method="post"
      style="display: inline">
    {{csrf_field()}}
    {{method_field('DELETE')}}
    <button type="submit" class="btn btn-secondary cursor-pointer">
        <i class="text-danger fa fa-remove"></i>
    </button>
</form></td></tr>

    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <td colspan="3">
            {{{$records->render()}}}
        </td>
    </tr>
    </tfoot>
</table>