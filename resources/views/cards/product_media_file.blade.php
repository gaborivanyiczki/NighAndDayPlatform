<div class="card card-default">
    <div class="card-header">
        <div class="row">
            <div class="col-sm-9">
                <a href="{{route('product_media_files.show',$record->id)}}"> {{$record->id}}</a>
            </div>
            <div class="col-sm-3 text-right">
                <div class="btn-group">
                    <a class="btn btn-secondary" href="{{route('product_media_files.edit',$record->id)}}">
    <span class="fa fa-pencil"></span>
</a>
                    <form onsubmit="return confirm('Are you sure you want to delete?')"
      action="{{route('product_media_files.destroy',$record->id)}}"
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
			<th>Product ID</th>
			<td>{{$record->Product_ID}}</td>
		</tr>
		<tr>
			<th>Path</th>
			<td>{{$record->Path}}</td>
		</tr>
		<tr>
			<th>Filename</th>
			<td>{{$record->Filename}}</td>
		</tr>
		<tr>
			<th>UploadedBy</th>
			<td>{{$record->UploadedBy}}</td>
		</tr>
		<tr>
			<th>Default</th>
			<td>{{$record->Default}}</td>
		</tr>

            </tbody>
        </table>
    </div>
</div>
