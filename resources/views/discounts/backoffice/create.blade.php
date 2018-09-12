@extends('layouts.app')

@section('body')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    <form method="POST" action="{{ url('discount/create') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="reference" class="col-sm-4 col-form-label text-md-right">Name </label>

                            <div class="col-md-6">
                                <input id="reference" type="text" class="form-control{{ $errors->has('reference') ? ' is-invalid' : '' }}" name="reference" value="{{ old('reference') }}" required autofocus>

                                @if ($errors->has('reference'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('reference') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Description </label>

                            <div class="col-md-6">
                                <textarea  class="form-control {{ $errors->has('description') ? 'input-error' : '' }}" id="description" placeholder="Insert promotions description" id="description" name="description" required="" aria-required="true" {{ $errors->has('description') ? 'has-error' :'' }}>{{old('description')}}</textarea>
                                @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="redaction_percentage" class="col-sm-4 col-form-label text-md-right">Redaction percentage </label>

                            <div class="col-md-6">
                                <input id="redaction_percentage" type="text" class="form-control{{ $errors->has('redaction_percentage') ? ' is-invalid' : '' }}" name="redaction_percentage" value="{{ old('redaction_percentage') }}" required autofocus>

                                @if ($errors->has('redaction_percentage'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('redaction_percentage') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <input id="products" type="hidden" class="form-control{{ $errors->has('products') ? ' is-invalid' : '' }}" name="products[]" value="1" required autofocus>
                        <input id="products" type="hidden" class="form-control{{ $errors->has('products') ? ' is-invalid' : '' }}" name="products[]" value="2" required autofocus>

                        <input id="quantities" type="hidden" class="form-control{{ $errors->has('quantities') ? ' is-invalid' : '' }}" name="quantities[]" value="1" required autofocus>
                        <input id="quantities" type="hidden" class="form-control{{ $errors->has('quantities') ? ' is-invalid' : '' }}" name="quantities[]" value="2" required autofocus>

                        <div class="form-group row">
                            <label for="start_date" class="col-md-3 control-label">Period</label>
                            <div class="col-md-9">
                                <div class="input-daterange input-group" data-date-format='yyyy/mm/dd' id="datepicker-range">
                                    <div class="input-group-addon">Start date </div>
                                <input type="datetime" class="input-sm form-control {{ $errors->has('start_date') ? 'input-error' : '' }}" name="start_date" value="{{old('start_date')}}">
                                    @if ($errors->has('start_date'))
                                    <small class="p-l-10 text-danger" role="alert">
                                        {{ $errors->first('start_date') }}
                                    </small>
                                    @endif
                                    <div class="input-group-addon"> End date </div>
                                <input type="datetime" class="input-sm form-control {{ $errors->has('end_date') ? 'input-error' : '' }}" name="end_date" value="{{old('end_date')}}">
                                    @if ($errors->has('end_date'))
                                    <small class="p-l-10 text-danger" role="alert">
                                        {{ $errors->first('end_date') }}
                                    </small>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col"><button type="button" class="btn btn-link" id="promotion-removal"><i class="pg-trash"></i></button></th>
                                    <th scope="col">Picture</th>
                                    <th scope="col">Product name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Price after discount</th>
                                    <th scope="col">quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="checkbox text-center">
                                            <input type="checkbox" name="component[]" class="check1" value="1'" id="1">
                                            <label for="1'" class="no-padding no-margin"></label>
                                        </div>
                                    </td>
                                    <td></td>
                                    <td>Glasses</td>
                                    <td>Sun glasses</td>
                                    <td>1000</td>
                                    <td>100</td>
                                    <td>5</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="checkbox text-center">
                                            <input type="checkbox" name="component[]" class="check1" value="1'" id="1">
                                            <label for="1'" class="no-padding no-margin"></label>
                                        </div>
                                    </td>
                                    <td></td>
                                    <td>iphone7</td>
                                    <td>iphone7</td>
                                    <td>7000</td>
                                    <td>400</td>
                                    <td>5</td>
                                </tr>
                            </tbody>
                        </table>
<br>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-5">
                                <button type="submit" class="btn btn-primary">
                                    create
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    <a href="#" class="btn-primary">Cancel</a>
                                </button>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
