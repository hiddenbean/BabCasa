@extends('layouts.backoffice.staff.app')

@section('before_css')
<link type="text/css" rel="stylesheet" href="{{ asset('plugins/summernote/css/summernote.css') }}">
@endsection

@section('content')
<!-- breadcrumb start -->
<div class="jumbotron no-margin">
    <div class="container-fluid container-fixed-lg ">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}">DASHBOARD</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ url('profiles') }}">Staff Profiles</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ url('profiles/'.$profile->id) }}">ID :  {{$profile->id}}</a>
                    </li>
                    <li class="breadcrumb-item active">
                        edit
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb end -->

<div class="container-fluid container-fixed-lg">
    <div class="card card-transparent">
        <div class="card-header">
            <div class="card-title">
                Edit Profile ID : {{$profile->id}}
                <a 
                    href="javascript:;" 
                    data-toggle="tooltip" 
                    data-placement="bottom" 
                    data-html="true" 
                    trigger="click" 
                    title= "<p class='tooltip-text'>{{$profile->profileLang()->description}}.<br>
                            If you have any difficulties please <a href='#'>contact the support</a></p>"> 
                    <i class="fas fa-question-circle"></i>
                </a>
            </div>
        </div>
        <form action="{{url('profiles/'.$profile->id)}}" method="POST" id="form">
        {{ csrf_field() }}
        <div class="card-body">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default required">
                                        <label>Profile name</label>
                                        <input type="text" class="form-control" name="reference" value="{{$profile->profileLang()->reference}}">
                                        <label class="error" for="reference">
                                            {{ $errors->has('reference') ? $errors->first('reference') : "" }}
                                        </label> 
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <label for="summernote" class="upper-title p-t-5 p-b-5 p-l-10">description</label>
                                    <div class="summernote-wrapper bg-white">
                                        <div id="summernote">{!!$profile->profileLang()->description!!}</div>
                                        <input type="hidden" name="description" id="description">
                                    </div>
                                </div>
                            </div>
                            <div class="row m-t-15">
                                <div class="col-md-12">
                                    <h5>Permissions</h5>
                                </div>
                            </div>
                           <div class="row">
                             @foreach($permissions as $permission)
                                <div class="col-md-4 m-t-10">
                                    <div class="row">
                                        <div class="col-md-6 p-t-5">
                                        <input type="hidden" name="permissions[]" value="{{$permission->id}}">
                                            <span class="uppercase"> {{$permission->permissionLang()->reference}}</span> 
                                            <a 
                                                href="javascript:;" 
                                                data-toggle="tooltip" 
                                                data-placement="bottom" 
                                                data-html="true" 
                                                trigger="click" 
                                                title= "<p class='tooltip-text'>{{$permission->permissionLang()->description}}.<br>
                                                        If you have any difficulties please <a href='#'>contact the support</a></p>"> 
                                                <i class="fas fa-question-circle"></i>
                                            </a>
                                        </div>
                                        <div class="col-md-6">
                                            <select class="cs-select cs-skin-slide"  name="can[]" >
                                                <option value="0" {{$profile->permissions()->where('permission_id',$permission->id)->where('can_read',0)->where('can_write',0)->first() ? 'selected' :''}} >none</option>
                                                <option value="1" {{$profile->permissions()->where('permission_id',$permission->id)->where('can_read',1)->where('can_write',0)->first() ? 'selected' :''}} >read</option>
                                                <option value="2" {{$profile->permissions()->where('permission_id',$permission->id)->where('can_read',1)->where('can_write',1)->first() ? 'selected' :''}} >read/wright</option>
                                               
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">
                                        Publish
                                        <a 
                                            href="javascript:;" 
                                            data-toggle="tooltip" 
                                            data-placement="bottom" 
                                            data-html="true" 
                                            trigger="click" 
                                            title= "<p class='tooltip-text'>You can use this form to create a new category if you have the right permissions.<br>
                                                    If you have any difficulties please <a href='#'>contact the support</a></p>"> 
                                            <i class="fas fa-question-circle"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            Status : <strong>@if($profile->deleted_at == NULL) Publish @else Removed @endif</strong>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            Creation date : <strong>{{$profile->created_at}}</strong>
                                        </div>
                                    </div>
                                    @if($profile->updated_at != NULL)
                                    <div class="row">
                                        <div class="col-md-12">
                                            Last update : <strong>{{$profile->updated_at}}</strong>
                                        </div>
                                    </div>
                                    @endif
                                    @if($profile->deleted_at != NULL)
                                    <div class="row">
                                        <div class="col-md-12">
                                            Remove date : <strong>{{$profile->deleted_at}}</strong>
                                        </div>
                                    </div>
                                    @endif
                                    <div class="row b-t b-dashed b-grey m-t-20 p-t-20">
                                        <div class="col-md-6">
                                        <button id="edit" class="btn btn-block"><i class="fas fa-pen"></i> <strong>Edit</strong></button >                                    
                                        </div>

                                        <div class="col-md-6">
                                            <a  href="{{route('delete.profile',['profile'=>$profile->id])}}" data-method="delete"  data-token="{{csrf_token()}}" data-confirm="Are you sure?" class="btn btn-block btn-transparent-danger"><i class="fas fa-times"></i> <strong>Remove</strong></a>
                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">
                                        Profile translations
                                        <a 
                                            href="javascript:;" 
                                            data-toggle="tooltip" 
                                            data-placement="bottom" 
                                            data-html="true" 
                                            trigger="click" 
                                            title= "<p class='tooltip-text'>You can use this form to create a new category if you have the right permissions.<br>
                                                    If you have any difficulties please <a href='#'>contact the support</a></p>"> 
                                            <i class="fas fa-question-circle"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            Available in :
                                            @foreach($profile->profileLangs as $profileLang)
                                                @if($profileLang->reference != "")
                                                    <strong><a href="#">{{$profileLang->lang->name}}</a></strong>,
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="row b-t b-dashed b-grey m-t-20 p-t-20">
                                        <div class="col-md-12">
                                            <a href="{{url('profiles/'.$profile->id.'/translations')}}" class="btn btn-block btn-transparent"><strong><i class="fas fa-language p-r-10 fa-lg"></i>Add or Edit translations</strong></a>                                    
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
@endsection

@section('after_script')
    <script type="text/javascript" src="{{ asset('plugins/classie/classie.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/summernote/js/summernote.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/multiselect/js/multiselect.min.js') }}"></script>
    <script>
    $("#edit").click( function () {
        $('#description').val($('#summernote').summernote().code());
    });

    $('#summernote').summernote({height: 250});

    </script>
@endsection