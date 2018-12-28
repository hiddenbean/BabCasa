@extends('layouts.backoffice.staff.full_hight')

@section('before_css')
<link href="{{ asset('plugins/bootstrap3-wysihtml5/bootstrap3-wysihtml5.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('plugins/jquery-menuclipper/jquery.menuclipper.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('plugins/bootstrap-tag/bootstrap-tagsinput.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('pages/css/editor.css')}}" rel="stylesheet" type="text/css" />

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
                <form action="{{url('support/all')}}" class="ajax btn btn-link title">
                    @csrf
                    <span class="title"> <button type="submit" class=" btn btn-link"><i class="fas fa-folder-open"></i> All tickets</button></span>
                </form>	
            </li>
            <li>
                <form action="{{url('support/open')}}" class="ajax btn btn-link title">
                    @csrf
                    <span class="title"> <button type="submit" class=" btn btn-link"><i class="fas fa-folder-open"></i> Open tickets</button></span>
                </form>	
            </li>
            <li>
            <form action="{{url('support/closed')}}" class="ajax btn btn-link title">
                @csrf
                <span class="title"> <button type="submit" class=" btn btn-link"><i class="fas fa-folder-minus"></i>Closed tickets</button></span>
            </form>	
            </li>
        </ul>
        <p class="menu-title m-t-20 all-caps">Subjects</p>
        <ul class="sub-menu no-padding">
            @foreach($subjects as $subject)
            <li>
                <form action="{{url('support/subject/'.$subject->id)}}" class="ajax">
                    @csrf
                    <span class="title"> <button type="submit" class=" btn btn-link">{{$subject->subjectLang()->reference}}</button></span>
                <span class="badge pull-right">{{$subject->claims->count()}}</span>
                </form>	

            </li>
            @endforeach
        </ul>
        </nav>
        <!-- END SECONDARY SIDEBAR MENU -->

        <!-- app -->
        <div class="inner-content full-height" id="claimBody">
        @include('claims.backoffice.staff.body')
        </div>
        <!-- app end -->

@endsection

@section('after_script')
<script src="{{ asset('plugins/bootstrap3-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<script src="{{ asset('plugins/jquery-menuclipper/jquery.menuclipper.js')}}"></script>
<script src="{{ asset('plugins/bootstrap-tag/bootstrap-tagsinput.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('pages/js/pages.email.js')}}" type="text/javascript"></script>

@endsection