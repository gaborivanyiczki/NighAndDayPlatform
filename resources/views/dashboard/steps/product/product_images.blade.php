@if (count($errors) > 0)
<div class="alert alert-danger">
  <strong>Whoops!</strong> There were some problems with your input.<br><br>
  <ul>
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

<div class="form-group">
    <label for="filename[]" class="font-weight-bold">Incarca alte imagini despre produs (optional)</label>
    <input type="file" name="filename[]" class="form-control" multiple>
</div>

