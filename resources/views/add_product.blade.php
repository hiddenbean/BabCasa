@extends('layouts.backoffice.app') 
@section('css')
<link type="text/css" rel="stylesheet" href="{{ asset('plugins/bootstrap-tag/bootstrap-tagsinput.css')}}">
@endsection
@section('body')

@section('script')
<script src="{{asset('plugins/bootstrap-tag/bootstrap-tagsinput.min.js')}}" type="text/javascript"></script>
@endsection
<div class="container">

    <h1> Create New Product</h1> <br>

<form  method="POST" action="{{url('store')}}" enctype="multipart/form-data">
    {{ csrf_field() }}
            <div class="form-inline">
                <div class="form-group col-2">
                    <label for="staticEmail2">Category :</label>
                    <select class="form-control" name="category_id" id="staticEmail2">
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->categoryLang->first()->reference}}</option>
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
                    <label for="exampleFormControlFile1">Product Pictures</label>
                    <input type="file" class="form-control-file" name="product_pictures[]" id="exampleFormControlFile1">
                    <input type="file" class="form-control-file" name="product_pictures[]" id="exampleFormControlFile1">
                    <input type="file" class="form-control-file" name="product_pictures[]" id="exampleFormControlFile1">
            </div>
            <div class="form-group">
                    <label for="exampleFormControlFile1">Variant Pictures</label>
                    <input type="file" class="form-control-file" name="variant_pictures[]" id="exampleFormControlFile1">
                    <input type="file" class="form-control-file" name="variant_pictures[]" id="exampleFormControlFile1">
                    <input type="file" class="form-control-file" name="variant_pictures[]" id="exampleFormControlFile1">
            </div>
            <div class="form-group form-check">
              <input type="checkbox" name="for_business" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">For Business</label>
            </div>
            <input id="#tagsinput" type="text" value="Amsterdam,Washington" data-role="tagsinput" />
            <div id="no_variant">
              <a  class="btn btn-secondary btn-lg"  data-idpere="0" id="more_options">Add Options</a><br> OR <br> 
              <div class="form-inline">
                  <div class="form-group mx-sm-3 mb-2">
                      <select class="form-control" name="currency_id" id="staticEmail2">
                           
                          <option value="1">erue</option>
                          <option value="2">dolar</option>
                      
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
            <br>
            <h1>Add Details</h1>
            <br>
            <div class="detail">
                    <div class="form-inline">
                            <div class="form-group mx-sm-3 mb-2">
                                <label for="staticEmail2" class="sr-only">Email</label>
                                <select class="form-control" id="detail_id">
                                      
                                        <option value="1">test 1</option>
                                        <option value="2">test 1</option>
                                        <option value="3">test 1</option>
                                      
                                </select>
                            </div>
                            <div class="form-group mx-sm-3 mb-2">
                                <label for="inputPassword2" class="sr-only">value</label>
                                <input type="text" class="form-control" id="detail_val" placeholder="Value">
                            </div>
                            <button type="button" id="add_detail" class="btn btn-primary mb-2">Add</button>
                        </div>
                <div class="row" id="details">
                    <div class="col-6">

                    </div>
                </div>
            </div>
             <br>
            <h1>Add Tags</h1>
            <br>
            <div class="tags">
                    <div class="form-inline">
                            <div class="form-group mx-sm-3 mb-2">
                                <label for="staticEmail2" class="sr-only">Email</label>
                                
                            </div>
                            <button type="button" id="add_tag" class="btn btn-primary mb-2">Add</button>
                        </div>
                <div class="row" id="tags">
                    <div class="col-6">

                    </div>
                </div>
            </div>
          </form><br>
   
    
    
</div>


@endsection

@section('script')

<script>
$(document).ready(function() {
    $('#tagsinput').tagsinput({
        typeahead: {
            source: ['Amsterdam', 'Washington', 'Sydney', 'Beijing', 'Cairo']
        }
    });
});

    var data = [
                    {attr:'2', value: "16" }, 
                        {attr:'1',value: "- Gray" },
                            { attr:'3', value: "- - 4.7", currency_id: '1', price: '10', quantity: '10',picture: '1' }, 
                            { attr:'3',value: "- - 5.5", currency_id: '1', price: '10',quantity: '15',picture: '2' },
                        {attr:'1', value: "- Silver" }, 
                            { attr:'3', value: "- - 4.7" ,currency_id: '1', price: '10',quantity: '6',picture: '3' }, 
                            {  attr:'3',value: "- - 5.5" ,currency_id: '1', price: '11.5',quantity: '20',picture: '4' },
                    {attr:'2', value: "32" },
                        {attr:'1',value: "- Gray" },
                            { attr:'3', value: "- - 4.7" ,currency_id: '1', price: '10.5',quantity: '27',picture: '5' }, 
                            { attr:'3',value: "- - 5.5"  ,currency_id: '1', price: '9.5',quantity: '34',picture: '6'},
                        {attr:'1', value: "- Silver" }, 
                            { attr:'3', value: "- - 4.7" ,currency_id: '1', price: '12',quantity: '74',picture: '7' }, 
                            { attr:'3',value: "- - 5.5"  ,currency_id: '1', price: '8.5',quantity: '32',picture: '8'},
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
    
    $('#add_detail').on('click', function(){
      var detail_id = $('#detail_id').val();
      var detail = $('#detail_id option:selected').text();
      console.log(detail);
        if($('#detail_val').val()){

            var html = '<div class="col-6"><div class="form-inline"><div class="form-group mb-2"><label for="staticEmail2" class="sr-only"></label><input type="text" readonly class="form-control-plaintext" value="'+detail+'"><input type="hidden" name="detail_id[]" value="'+detail_id+'"></div>';
            html += '<div class="form-group mx-sm-3 mb-2"><label for="inputPassword2" class="sr-only"></label><input type="text" class="form-control" name="detail_val[]" value="'+$('#detail_val').val()+'"> </div><button type="button">Delete</button></div></div>';
            $('#details').append(html);

        }

    
  })
    
    $('#add_tag').on('click', function(){
      var tag_id = $('#tag_id').val();
      var tag = $('#tag_id option:selected').text();
      console.log(tag);

            var html = '<div class="col-6"><div class="form-inline"><div class="form-group mb-2"><label for="staticEmail2" class="sr-only"></label><input type="text" readonly class="form-control-plaintext" value="'+tag+'"><input type="hidden" name="tag_id[]" value="'+tag_id+'"></div>';
            html += '<button type="button">Delete</button></div></div>';
            $('#tags').append(html);

    
  })
  
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
                                      
                                        <option value="1">attribute 1</option>
                                        <option value="2">attribute 2</option>
                                        
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