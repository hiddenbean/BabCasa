
<div class="container-fluid container-fixed-lg">
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
        <strong>Success: </strong>{{ $error }}
    </div>
    @endforeach
    
    @if (isset(Session::get('messages')['success']))
        <div class="alert alert-success" role="alert">
            <button class="close" data-dismiss="alert"></button>
            <strong>Success: </strong>{{ Session::get('messages')['success'] }}
        </div>
    @endif
    @if (isset(Session::get('messages')['error']))
        <div class="alert alert-danger" role="alert">
            <button class="close" data-dismiss="alert"></button>
            <strong>Error: </strong>{{ Session::get('messages')['error'] }}
        </div>
    @endif
</div>