<form action="{{isset($route)?$route:route('dashboard.product.addAttributes')}}" method="POST">
    {{csrf_field()}}
    <input type="hidden" name="_method" value="{{isset($method)?$method:'POST'}}"/>
    <input type="hidden" name="ProductID" value="{{$model->id}}"/>
    <input type="hidden" name="Product_Attribute_Group_ID" value="{{$model->AttributeGroup_ID}}"/>

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
    <div class="form-group text-right ">
        <input type="submit" class="btn btn-primary" value="Salveaza"/>
    </div>
</form>

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
                   $('.attributes_table > tbody').append(html);
               }
               else
               {
                   html += '<td><button type="button" name="add" id="add" class="btn btn-success">Adauga atribut</button></td></tr>';
                   $('.attributes_table > tbody').html(html);
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
