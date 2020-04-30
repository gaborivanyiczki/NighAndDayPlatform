<div class="card card-default">
    <div class="card-header">
        <div class="row">
            <div class="col-sm-9">
                <a href="{{route('dashboard.product.show',$record->id)}}"> {{$record->id}}</a>
            </div>
            <div class="col-sm-3 text-right">
                <div class="btn-group">
                    <a class="btn btn-secondary" href="{{route('dashboard.product.edit',$record->id)}}">
    <span class="fa fa-pencil"></span>
</a>
                    <form onsubmit="return confirm('Are you sure you want to delete?')"
      action="{{route('dashboard.product.destroy',$record->id)}}"
      method="post"
      style="display: inline">
    {{csrf_field()}}
    {{method_field('DELETE')}}
    <button type="submit" class="btn btn-secondary cursor-pointer">
        <i class="text-danger fa fa-remove"></i>
    </button>
</form>
                </div>
            </div>
        </div>
    </div>
    <div class="card-block">
        <table class="table table-bordered table-striped">
            <tbody>
            		<tr>
			<th>Name</th>
			<td>{{$record->Name}}</td>
		</tr>
		<tr>
			<th>Slug</th>
			<td>{{$record->Slug}}</td>
		</tr>
		<tr>
			<th>ProductCode</th>
			<td>{{$record->ProductCode}}</td>
		</tr>
		<tr>
			<th>Warranty</th>
			<td>{{$record->Warranty}}</td>
		</tr>
		<tr>
			<th>Return</th>
			<td>{{$record->Return}}</td>
		</tr>
		<tr>
			<th>Delivery</th>
			<td>{{$record->Delivery}}</td>
		</tr>
		<tr>
			<th>Price</th>
			<td>{{$record->Price}}</td>
		</tr>
		<tr>
			<th>DiscountPrice</th>
			<td>{{$record->DiscountPrice}}</td>
		</tr>
		<tr>
			<th>Discount</th>
			<td>{{$record->Discount}}</td>
		</tr>
		<tr>
			<th>Quantity</th>
			<td>{{$record->Quantity}}</td>
		</tr>
		<tr>
			<th>Status ID</th>
			<td>{{$record->Status_ID}}</td>
		</tr>
		<tr>
			<th>Category ID</th>
			<td>{{$record->Category_ID}}</td>
		</tr>
		<tr>
			<th>Brand ID</th>
			<td>{{$record->Brand_ID}}</td>
		</tr>
		<tr>
			<th>Active</th>
			<td>{{$record->Active}}</td>
		</tr>
		<tr>
			<th>Favorite</th>
			<td>{{$record->Favorite}}</td>
		</tr>
		<tr>
			<th>CreatedUser</th>
			<td>{{$record->CreatedUser}}</td>
		</tr>

            </tbody>
        </table>
    </div>
</div>
