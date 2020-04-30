<table class="table table-bordered table-striped">
    <thead>
    <tr>
    		<th>Product ID </th>
		<th>Attribute ID </th>
		<th>Product Attribute Group ID </th>
		<th>Value </th>
		<th>CreatedUser </th>
		<th>&nbsp;</th>
    </tr>
    </thead>
    <tbody>
    @foreach($records as $record)
    <tr>	 	<td> {{$record->Product_ID }} </td>
	 	<td> {{$record->Attribute_ID }} </td>
	 	<td> {{$record->Product_Attribute_Group_ID }} </td>
	 	<td> {{$record->Value }} </td>
	 	<td> {{$record->CreatedUser }} </td>
	<td><a class="btn btn-secondary" href="{{route('product_attributes.show',$record->id)}}">
    <span class="fa fa-eye"></span>
</a><a class="btn btn-secondary" href="{{route('product_attributes.edit',$record->id)}}">
    <span class="fa fa-pencil"></span>
</a>
<form onsubmit="return confirm('Are you sure you want to delete?')"
      action="{{route('product_attributes.destroy',$record->id)}}"
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