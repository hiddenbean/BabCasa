@extends('layouts.backoffice.staff.app')
@section('css_before')  

@stop
@section('content')
<!-- breadcrumb start -->
<div class="container-fluid container-fixed-lg ">
    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}">Tableau de borad</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ url('/reasons') }}">reasons</a>
                </li>
                <li class="breadcrumb-item active">
                    Show
                </li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb end -->

<div class="container-fluid container-fixed-lg">
    <div class="card ">
        <div class="card-header">
            <h4 class="m-t-0 m-b-0"> <strong>Reason</strong> </h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-9 b-r b-dashed b-grey"> 
                    <div class="row">
                        <div class="col-md-12">
                            <h5>Reference</h5>
                            <p>GJGHKJJK </p> 
                        </div> 
                    </div>   
                    <div class="row">
                        <div class="col-md-12">
                            <h5>Short description</h5>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vero voluptas incidunt voluptate! Commodi quo, voluptatibus quis sed voluptate voluptatem ipsa. </p> 
                        </div> 
                    </div>   
                    <div class="row">
                        <div class="col-md-12">
                            <h5>description</h5>
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Excepturi, quos quaerat tenetur in, reiciendis iste temporibus eius fugiat suscipit ad modi praesentium nobis esse? Magni, neque eius non dolor, ullam provident repudiandae dolore optio nisi aliquam beatae velit corporis, explicabo consectetur ipsam laudantium laborum facilis perspiciatis consequuntur vero enim. Repudiandae fugit sapiente assumenda dolore hic inventore dignissimos veritatis quod ratione tenetur, officia nemo, at odio quos recusandae. Beatae eligendi necessitatibus nisi sequi quaerat sapiente dolore facere nam a dolorem in sed aliquam veniam maiores, assumenda dolores hic enim id, atque officia, iure facilis. Dolor dicta expedita accusantium, reprehenderit omnis tenetur perferendis adipisci modi voluptatibus amet ex ab, consectetur id aperiam veritatis dignissimos? Illo cum maxime sit perferendis porro vitae, facere consectetur impedit culpa debitis cupiditate ut atque. Nemo illo eveniet, quaerat id corporis sequi soluta molestiae nesciunt rerum voluptas ipsa, ex sunt dolore eius nostrum nobis facere exercitationem amet libero. </p> 
                        </div> 
                    </div>   
                </div> 
            </div>
        </div>
    </div>
</div>
@endsection

@section('script') 
@stop