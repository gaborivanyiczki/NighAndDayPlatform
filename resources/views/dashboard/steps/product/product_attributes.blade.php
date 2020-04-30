
  <div class="form-group">
        <label for="Product_Attribute_Group_ID" class="font-weight-bold">Grup Produse</label>
        <select class="form-control {{ $errors->has('Product_Attribute_Group_ID') ? ' is-invalid' : '' }}" name="Product_Attribute_Group_ID" id="Product_Attribute_Group_ID">
            <option value="" disabled selected>---- Alege Grup Produs ---</option>

            @foreach($step->getProductGroups() as $item)
                <option value="{{$item['id']}}">{{$item['Name']}}</option>
            @endforeach
        </select>

        @if($errors->has('Product_Attribute_Group_ID'))
        <div class="invalid-feedback">
            <strong>{{ $errors->first('Product_Attribute_Group_ID') }}</strong>
        </div>
        @endif
</div>

<div class="table-responsive">
    <table class="table table-bordered table-striped attributes_table" id="attributes_table">
        <thead>
            <tr>
                <th width="35%">Atribut</th>
                <th width="35%">Valoare atribut</th>
                <th width="30%">Actiune</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<script>
$(document).ready(function(){
    var count = 1;
    $.ajax({
        url: laroute.route('dashboard.attributes.get'),
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            dynamic_field(count);

            function dynamic_field(number)
            {
                html = '<tr>';
                   html += '<td> <select class="form-control" name="attribute_id['+number+']" id="attribute_id_'+number+'">';
                       html += '<option value="" disabled selected>---- Alege Atribut ---</option>';
                        $.each(response,function(index,value)
                        {
                            html += '<option value="'+ value.id +'">'+ value.Name +'</option>';
                        });
                       html += '</select> </td>';
                   html += '<td> <select class="form-control" name="attribute_value['+number+']" id="attribute_value_'+number+'">';
                       html += '<option value="" disabled selected>---- Alege Valoare ---</option>';
                       html += '</select> </td>';
                   if(number > 1)
                   {
                       html += '<td><button type="button" name="remove" id="" class="btn btn-danger remove">Sterge atribut</button></td></tr>';
                       $('tbody').append(html);
                   }
                   else
                   {
                       html += '<td><button type="button" name="add" id="add" class="btn btn-success">Adauga atribut</button></td></tr>';
                       $('tbody').html(html);
                   }
                $(document).on('change','#attribute_id_'+number+'', function () {
                    var _attributeId = $('#attribute_id_'+number+' option:selected').val();
                    $.ajax({
                        url: laroute.route('dashboard.attributes.getValues'),
                        type: 'GET',
                        dataType: 'json',
                        data:{
                            attribute:_attributeId,
                        },
                        success: function(response) {
                            var sel = $('#attribute_value_'+number+'');
                            sel.empty();
                            sel.append('<option value="" disabled selected>---- Alege Valoare ---</option>');
                            $.each(response,function(index,value)
                            {
                                sel.append('<option value="'+ value.id +'">'+ value.Value +'</option>');
                            });

                        }
                    });
                });
            }
            $(document).on('click', '#add', function(){
                count++;
                dynamic_field(count);
            });

            $(document).on('click', '.remove', function(){
                count--;
                $(this).closest("tr").remove();
            });
        }
    });
});
</script>
