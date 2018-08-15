@extends('layouts.backoffice.partner.app')

@section('content')
<div class="container">
    <table border=1>
        @foreach($subjects as $subject)
        <tr>
            <td>
                <a href="{{url('support/'.$subject->name.'/ticket/create')}}">
                    {{$subject->title}}
                </a>
            </td>
            <td>
                {{$subject->description}}
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection