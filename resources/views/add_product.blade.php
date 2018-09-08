@extends('layouts.app') 
@section('body')

<div class="container">

    <h1> Create New Product</h1> <br>

<form  method="POST" action="{{url('store')}}" enctype="multipart/form-data">
    {{ csrf_field() }}
            <div class="form-inline">
                <div class="form-group col-2">
                    <label for="staticEmail2">Categorie :</label>
                    <select class="form-control" name="categorie_id" id="staticEmail2">
                        @foreach($categories as $categorie)
                        <option value="{{$categorie->id}}">{{$categorie->categorieLang->first()->reference}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-2 ">
                    <label for="staticEmail2">Language : </label>
                    <select class="form-control" name="lang_id" id="staticEmail2">
                        @foreach($languages as $language)
                        <option value="{{$language->id}}">{{$language->name}}</option>
                        @endforeach
                    </select>
                </div>
                
            </div>
            {{$errors}}
            <div class="form-group">
              <label for="exampleInputEmail1">reference</label>
              <input type="text" name="reference" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
              {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Short description </label>
              <textarea class="form-control" name="short_description" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>

            <div class="form-group">
              <label for="exampleInputPassword1"> description </label>
              <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="8"></textarea>
            </div>
            <div class="form-group">
                    <label for="exampleFormControlFile1">Picture</label>
                    <input type="file" class="form-control-file" name="picture[]" id="exampleFormControlFile1">
                    <input type="file" class="form-control-file" name="picture[]" id="exampleFormControlFile1">
                    <input type="file" class="form-control-file" name="picture[]" id="exampleFormControlFile1">
                  </div>
            <div class="form-group form-check">
              <input type="checkbox" name="for_business" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">For Business</label>
            </div>
            <div id="no_variant">
              <a  class="btn btn-secondary btn-lg"  data-idpere="0" id="more_options">Add Options</a><br> OR <br> 
              <div class="form-inline">
                  <div class="form-group mx-sm-3 mb-2">
                      <select class="form-control" name="currency_id" id="staticEmail2">
                          @foreach($currencies as $currencie)
                          <option value="{{$currencie->id}}">{{$currencie->code}}</option>
                          @endforeach
                      </select>
                      <label for="staticEmail2" class="sr-only">Email</label>
                      <input type="text" name="price" id="price" class="form-control" placeholder="price" >
                  </div>
                  <div class="form-group mx-sm-3 mb-2">
                      <label for="inputPassword2" class="sr-only">quantity</label>
                      <input type="text" name="quantity" class="form-control" id="quantity" placeholder="quantity">
                  </div>
                  <input type="hidden" id="attribures" name="attribures" >
                  <button type="submit" class="btn btn-primary btn-lg">Save</button>
              </div>
            </div>
           
            <div id="attribute_values">
            </div>
          </form><br>
   
    
    
</div>


@endsection

@section('script')
<script>


    var data = [
                    {attr:'2', value: "16" }, 
                        {attr:'1',value: "- Gray" },
                            { attr:'3', value: "- - 4.7", currency_id: '1', price: '10', quantity: '10',picture: '1' }, 
                            {  attr:'3',value: "- - 5.5", currency_id: '1', price: '10',quantity: '15',picture: '2' },
                        {attr:'1', value: "- Silver" }, 
                            { attr:'3', value: "- - 4.7" ,currency_id: '1', price: '10',quantity: '6',picture: '3' }, 
                            {  attr:'3',value: "- - 5.5" ,currency_id: '1', price: '11.5',quantity: '20',picture: '4' },
                    {attr:'2', value: "32" },
                        {attr:'1',value: "- Gray" },
                            { attr:'3', value: "- - 4.7" ,currency_id: '1', price: '10.5',quantity: '27',picture: '5' }, 
                            {  attr:'3',value: "- - 5.5"  ,currency_id: '1', price: '9.5',quantity: '34',picture: '6'},
                        {attr:'1', value: "- Silver" }, 
                            { attr:'3', value: "- - 4.7" ,currency_id: '1', price: '12',quantity: '74',picture: '7' }, 
                            {  attr:'3',value: "- - 5.5"  ,currency_id: '1', price: '8.5',quantity: '32',picture: '8'},
                    {attr:'2', value: "64"  ,currency_id: '1', price: '7',quantity: '56',picture: '9'},
                ],
    tree = function (array) {
        var levels = [{}];
        data.forEach(function (a) {
            var level = Math.floor(a.value.match(/^(- )*/)[0].length / 2);
            // console.log(level);
            levels.length = level + 1;
            levels[level].children = levels[level].children || [];
            levels[level].children.push(a);
            levels[level + 1] = a;
        });
        return levels[0].children;
    }(data);
    var myJsonString = JSON.stringify(tree);
          $('#attribures').val(myJsonString);
console.log(tree);


//   $('#more_options').on('click',function(){
//       var id_pere = $(this).data('idpere');
//       console.log(id_pere);
//       $('#add_attribute').data('idpere',id_pere);
//       $('#add_attribute').attr('data-idpere',id_pere);
//       $(this).hide();
//       $('#quantity').val('');
//       $('#no_variant').remove();
//       $('#addAttr').modal('toggle');
//     })
    
//     $('#add_value').on('click', function(){
//         var id_pere = 0;
//         var dev_id = 'attribute_'+id_pere;
//       var value = $('#val').val();
//       var att_id = $('#attribute_id').val();
//       console.log(value);
//       var html = ' <div class="card"><h5 class="card-header" >'+value+'</h5><div class="card-body"><h5 class="card-title">Special title treatment</h5> <input type="hidden" name="attribute_id[]" value="'+att_id+'">';
//         html += '<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>';
//         html += '<a href="#" class="btn btn-primary" id="more_options">add option</a> or <a href="#" class="btn btn-primary">make variant</a></div>';
//         html += '<div id="value_'+id_pere+'" > </div>';
//         html += '</div>';
//         $('#attribute_values').append(html);
//         $('#addAttr').modal('hide');

    
//   })
//     $('#add_attribute').on('click', function(){
//         var id_pere = $(this).data('idpere');
//         var dev_id = 'attribute_'+id_pere;
//       var value = $('#val').val();
//       var att_id = $('#attribute_id').val();
//       console.log(value);
//       var html = ' <div class="card"><h5 class="card-header" >'+value+'</h5><div class="card-body"><h5 class="card-title">Special title treatment</h5> <input type="hidden" name="attribute_id[]" value="'+att_id+'">';
//         html += '<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>';
//         html += '<a href="#" class="btn btn-primary" id="more_options">add option</a> or <a href="#" class="btn btn-primary">make variant</a></div></div>';
//         $('#attribute_values').append(html);
//         $('#addAttr').modal('hide');

    
//   })
</script>

@endsection


<div class="modal" tabindex="-1" role="dialog"  id="addAttr" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Add Attribute</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                    <div class="form-inline">
                            <div class="form-group mx-sm-3 mb-2">
                                <label for="staticEmail2" class="sr-only">Email</label>
                                <select class="form-control" id="attribute_id">
                                        @foreach($categories->first()->attributes as $attribute)
                                        <option value="{{$attribute->id}}">{{$attribute->attributeLangs->first()->reference}}</option>
                                        @endforeach
                                </select>
                            </div>
                            <div class="form-group mx-sm-3 mb-2">
                                <label for="inputPassword2" class="sr-only">value</label>
                                <input type="text" class="form-control" id="val" placeholder="Value">
                            </div>
                            <button type="button" id="add_attribute" data-idpere="" class="btn btn-primary mb-2">Add</button>
                        </div>
            </div>
          </div>
        </div>
      </div>
<div class="modal" tabindex="-1" role="dialog"  id="value" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Add Attribute</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                    <div class="form-inline">
                            <div class="form-group mx-sm-3 mb-2">
                                <label for="inputPassword2" class="sr-only">value</label>
                                <input type="text" class="form-control" id="val" placeholder="Value">
                            </div>
                            <button type="button" id="add_value" data-idpere="" class="btn btn-primary mb-2">Add</button>
                        </div>
            </div>
          </div>
        </div>
      </div>