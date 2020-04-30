<form method="POST" action="{{isset($route)?$route:route('dashboard.user.reset.password')}}">
    {{csrf_field()}}
    <div class="form-group">
        <input id="editAddressType" type="hidden" class="form-control" name="addressType" value="" required autofocus>
    </div>
    <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label text-md-right">Parola curenta</label>
      <div class="col-md-6">
            <input id="password" type="password" class="form-control" name="current_password" autocomplete="current-password">
        </div>
    </div>
    <div class="form-group row">
          <label for="password" class="col-md-4 col-form-label text-md-right">Parola noua</label>
        <div class="col-md-6">
              <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password">
          </div>
      </div>
    <div class="form-group row">
          <label for="password" class="col-md-4 col-form-label text-md-right">Confirma parola noua</label>
        <div class="col-md-6">
              <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password">
          </div>
      </div>
     <div class="form-group">
             <button type="submit" class="btn btn-solid btn-sm">Modifica</button>
     </div>
   </form>
