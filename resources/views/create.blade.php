@extends('layouts.backoffice.partner.app')

@section('content')
<div class="container">
<form action="{{url('support/'.$Subject->name.'/ticket/create')}}" method="post">
        {{ csrf_field()}}
        <input type="text" name="title"><br>
        <select name="subject_id" id=""><br>
            @foreach($subjects as $subject)
                <option value="{{$subject->id}}"  @if($subject->id == $Subject->id) selected @endif>{{$subject->title}}</option>
            @endforeach
        </select><br>
        <textarea name="message" id="" cols="30" rows="10"></textarea><br>
        <input type="submit" value="submit">
    </form>
</div>
@endsection