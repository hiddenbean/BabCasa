@extends('layouts.backoffice.partner.full_hight')

@section('before_css')
<link href="{{ asset('plugins/bootstrap3-wysihtml5/bootstrap3-wysihtml5.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('plugins/jquery-menuclipper/jquery.menuclipper.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('plugins/bootstrap-tag/bootstrap-tagsinput.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('pages/css/editor.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css"/>

@endsection

@section('content')
    <!-- START APP -->
           <!-- START SECONDARY SIDEBAR MENU-->
           <nav class="secondary-sidebar">
                <div class=" m-b-30 m-l-30 m-r-30 d-sm-none d-md-block d-lg-block d-xl-block">
                  <a href="{{url('support/create')}}" class="btn btn-primary btn-block uppercase">New ticket</a>
                </div>
                <p class="menu-title">BROWSE</p>
                <ul class="main-menu">
                  <li class="active">
                    <a href="{{url('support')}}">
                      <span class="title"><i class="pg-inbox"></i>All tickets</span>
                      <span class="badge pull-right">5</span>
                    </a>
                  </li>
                  <li>
                    <a href="{{url('support/open')}}">
                      <span class="title"><i class="fas fa-folder-open"></i>Open tickets</span>
                    </a>
                  </li>
                  <li>
                    <a href="{{url('support/closed')}}">
                        <span class="title"><i class="fas fa-folder-minus"></i>Closed tickets</span>
                    </a>
                  </li>
                </ul>
                <p class="menu-title m-t-20 all-caps">Subjects</p>
                <ul class="sub-menu no-padding">
                  @foreach($subjects as $subject)
                  <li>
                    <a href="{{url('support/subject/'.$subject->id)}}">
                      <span class="title">{{$subject->subjectLang()->reference}}</span>
                      <span class="badge pull-right">{{$subject->claims->count()}}</span>
                    </a>
                  </li>
                  @endforeach
                </ul>
              </nav>
              <!-- END SECONDARY SIDEBAR MENU -->

          <!-- app -->
<!-- END SECONDARY SIDEBAR MENU -->
<div class="inner-content full-height">
<form id="form-project" method="POST" action="{{url('support')}}" role="form" autocomplete="off">
        @csrf
        <!-- START COMPOSE EMAIL -->
        <div class="email-composer container-fluid">
            <div class="row">
                <div class="col-sm-12 no-padding">
                    <div class="wysiwyg5-wrapper email-toolbar-wrapper">
                    </div>
                        <div class="form-group-attached">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-group form-group-default form-group-default-select2">
                                            <label>Subject</label>
                                            <select class=" full-width" data-init-plugin="select2" name="subject_id">
                                                @foreach($subjects as $subject)
                                                    <option value="{{$subject->id}}">{{$subject->subjectLang()->reference}}</option>
                                                @endforeach
                                            </select>
                                            <label class="error" for="subject_id">
                                                {{ $errors->has('subject_id') ? $errors->first('subject_id') : "" }}
                                            </label> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default required">
                                        <label>Title</label>
                                    <input type="text" class="form-control" name="title" value="{{old('title')}}">
                                        <label class="error" for="title">
                                                {{ $errors->has('title') ? $errors->first('title') : "" }}
                                            </label> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="wysiwyg5-wrapper email-body-wrapper">
                        <textarea class="wysiwyg email-body" style="height:350px" name="message">{{old('message')}}</textarea>
                        <label class="error" for="title">
                                {{ $errors->has('message') ? $errors->first('message') : "" }}
                            </label> 
                    </div>
                </div>
            </div>
            <div class="row p-b-20">
                <div class="col-sm-11">
                    <button class="btn btn-white btn-cons">Cancel</button>
                    <button class="btn btn-primary btn-cons">Send</button>
                </div>
            </div>
        </div>
        <!-- END COMPOSE EMAIL -->
    </form>
    </div>
    <!-- app end -->

@endsection
@section('before_script')
<script src="{{ asset('plugins/select2/js/select2.full.min.js')}}" type="text/javascript"></script>    
@endsection

@section('after_script')
<script src="{{ asset('plugins/bootstrap3-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<script src="{{ asset('plugins/jquery-menuclipper/jquery.menuclipper.js')}}"></script>
<script src="{{ asset('plugins/bootstrap-tag/bootstrap-tagsinput.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('pages/js/pages.email.js')}}" type="text/javascript"></script>
<script>
$(document).ready(function () {
    $("#user_type").val($('#user option:selected').attr('data-type'));
    $('#user').on('change',function(){
                var type =$('option:selected', this).attr('data-type');
                $("#user_type").val(type);
                        
            });
        
    });
</script>
@endsection

