<?php $session_successes = (Session::has('session_successes'))? Session::get('session_successes') : [];?>
@foreach ($session_successes as $success)
<div class="alert alert-success" role="alert">
    <button class="close" data-dismiss="alert"></button>
    <strong>Success: </strong>{{ $success }}
</div>
@endforeach 

<?php $session_errors = (Session::has('session_errors'))? Session::get('session_errors') : [];?>
@foreach ($session_errors as $error)
<div class="alert alert-danger" role="alert">
    <button class="close" data-dismiss="alert"></button>
    <strong>Error: </strong>{{ $error }}
</div>
@endforeach

<?php $session_warnings = (Session::has('session_warnings'))? Session::get('session_warnings') : [];?>
@foreach ($session_warnings as $warning)
<div class="alert alert-warning" role="alert">
    <button class="close" data-dismiss="alert"></button>
    <strong>Warning: </strong>{{ $warning }}
</div>
@endforeach

<?php $session_infos = (Session::has('session_infos'))? Session::get('session_infos') : [];?>
@foreach ($session_infos as $info)
<div class="alert alert-info" role="alert">
    <button class="close" data-dismiss="alert"></button>
    <strong>Info: </strong>{{ $info }}
</div>
@endforeach