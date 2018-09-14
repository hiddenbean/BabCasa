@extends('layouts.backoffice.partner.app') 
@section('css')
    
@stop
@section('content')
<!-- breadcrumb start -->
<div class="container-fluid container-fixed-lg ">
    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}">DASHBOARD</a>
                </li>
                <li class="breadcrumb-item active">
                    Gérer mon compte
                </li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb end -->

<div class="container-fluid container-fixed-lg ">
    <div class="row justify-content-lg-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header  ">
                    <h4 class="m-t-0 m-b-0">
                        <strong>Gérer mon compte</strong>
                    </h4>
                </div>
                <form class="p-t-15" role="form" action="{{ url($partner->name.'/settings/update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="m-0 row card-body">
                    <div class="col-lg-12 sm-no-padding">
                        <div class="padding-30 sm-padding-5">
                            <p>Informations de base</p>
                            <div class="form-group-attached">
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group form-group-default required">
                                            <label for="company_name">Nom de la compagnie</label>
                                            <!-- {{ old('company_name') ? $company_name = old('company_name') : $company_name = $partner->company_name }} -->
                                            <!--{{ $company_name ? $company_name : $company_name = '' }}-->
                                            <input type="text" id="company_name" placeholder="Insert your company name" name="company_name" value="{{ $company_name }}" class="form-control"> 
                                            @if ($errors->has('company_name'))
                                                <label class='error' for='company_name'>{{ $errors->first('company_name') }}</label>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-group-default required">
                                            <label for="name">Nom</label>
                                            <!-- {{ old('name') ? $name = old('name') : $name = $partner->name }} -->
                                            <!--{{ $name ? $name : $name = '' }}-->
                                            <input type="text" id="name" placeholder="Insert your name" name="name" value="{{ $name }}" class="form-control"> 
                                            @if ($errors->has('name'))
                                                <label class='error' for='name'>{{ $errors->first('name') }}</label>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group form-group-default required">
                                            <label for="email">Email</label>
                                            <!-- {{ old('email') ? $email = old('email') : $email = $partner->email }} -->
                                            <!--{{ $email ? $email : $email = '' }}-->
                                            <input type="email" id="email" placeholder="Insert your email" name="email" value="{{ $email }}" class="form-control"> 
                                            @if ($errors->has('email'))
                                                <label class='error' for='email'>{{ $errors->first('email') }}</label>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group-attached">
                                <div class="row clearfix">
                                    <div class="col-sm-8">
                                        <div class="form-group form-group-default required">
                                            <label for="about">À propos</label>
                                            <!-- {{ old('about') ? $about = old('about') : $about = $partner->about }} -->
                                            <!--{{ $about ? $about : $about = '' }}-->
                                            <textarea type="text" id="about" placeholder="Description about your company..." name="about" class="form-control" rows="15">{{ $about }}</textarea>
                                            @if ($errors->has('about'))
                                                <label class='error' for='about'>{{ $errors->first('about') }}</label>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group form-group-default">
                                            <!-- {{ $partner->picture->where('tag','partner_avatar')->first() ? $picture = Storage::url($partner->picture->where('tag','partner_avatar')->first()->path) : $picture = asset('img/img_placeholder.png') }} -->
                                            <img src="{{ $picture }}" id="image_preview_partner" alt="" srcset="" width="250">
                                            <label for="path_partner" class="choose_photo">
                                                <span>
                                                    <i class="fa fa-image"></i> Choisir une photo</span>
                                            </label>
                                            <input type="file" id="path_partner" name="path" class="form-control hide">
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group form-group-default required">
                                            <label for="trade_registry">Registre du commerce</label>
                                            <!-- {{ old('trade_registry') ? $trade_registry = old('trade_registry') : $trade_registry = $partner->trade_registry }} -->
                                            <!--{{ $trade_registry ? $trade_registry : $trade_registry = '' }}-->
                                            <input type="text" id="trade_registry" placeholder="Insert your trade registry" name="trade_registry" value="{{ $trade_registry }}" class="form-control"> 
                                            @if ($errors->has('trade_registry'))
                                                <label class='error' for='trade_registry'>{{ $errors->first('trade_registry') }}</label>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group form-group-default required">
                                            <label for="ice">ICE</label>
                                            <!-- {{ old('ice') ? $ice = old('ice') : $ice = $partner->ice }} -->
                                            <!--{{ $ice ? $ice : $ice = '' }}-->
                                            <input type="text" id="ice" placeholder="Insert the common identifier of the company" name="ice" value="{{ $ice }}" class="form-control"> 
                                            @if ($errors->has('ice'))
                                                <label class='error' for='ice'>{{ $errors->first('ice') }}</label>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-group-default required">
                                            <label for="taxe_id">Taxe id</label>
                                            <!-- {{ old('taxe_id') ? $taxe_id = old('taxe_id') : $taxe_id = $partner->taxe_id }} -->
                                            <!--{{ $taxe_id ? $taxe_id : $taxe_id = '' }}-->
                                            <input type="text" id="taxe_id" placeholder="Insert your tax identifier" name="taxe_id" value="{{ $taxe_id }}" class="form-control"> 
                                            @if ($errors->has('taxe_id'))
                                                <label class='error' for='taxe_id'>{{ $errors->first('taxe_id') }}</label>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--  Information address -->
                            <br>
                            <p> Adresse </p>
                            <div class="form-group-attached">
                                <div class="form-group form-group-default required">
                                    <label for="address">Adresse</label>
                                    <!-- {{ old('address') ? $address = old('address') : $address = $partner->address->address }} -->
                                    <!--{{ $address ? $address : $address = '' }}-->
                                    <input type="text" id="address" placeholder="Insert your address" name="address" value="{{ $address }}" class="form-control" placeholder=""> 
                                    @if ($errors->has('address'))
                                        <label class='error' for='address'>{{ $errors->first('address') }}</label>
                                    @endif
                                </div>
                                <div class="form-group form-group-default">
                                    <label for="address2">Deuxième ligne</label>
                                    <!-- {{ old('address_two') ? $address_two = old('address_two') : $address_two = $partner->address->address_two }} -->
                                    <!--{{ $address_two ? $address_two : $address_two = '' }}-->
                                    <input type="text" id="address2" placeholder="Insert your second address" name="address_two" value="{{ $address_two }}" class="form-control" placeholder="">
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group form-group-default">
                                            <label for="country">Pays</label>
                                            <!-- {{ old('country') ? $country = old('country') : $country = $partner->address->country }} -->
                                            <!--{{ $country ? $country : $country = '' }}-->
                                            <input type="text" id="country" placeholder="Insert your country name" name="country" value="{{ $country }}" class="form-control" placeholder=""> 
                                            @if ($errors->has('country'))
                                                <label class='error' for='country'>{{ $errors->first('country') }}</label>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-group-default">
                                            <label for="city">Ville</label>
                                            <!-- {{ old('city') ? $city = old('city') : $city = $partner->address->city }} -->
                                            <!--{{ $city ? $city : $city = '' }}-->
                                            <input type="text" id="city" placeholder="Insert your city" name="city" value="{{ $city }}" class="form-control"> 
                                            @if ($errors->has('city'))
                                                <label class='error' for='city'>{{ $errors->first('city') }}</label>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-9">
                                        <div class="form-group form-group-default required">
                                            <label for="full_name">Nom complet</label>
                                            <!-- {{ old('full_name') ? $full_name = old('full_name') : $full_name = $partner->address->full_name }} -->
                                            <!--{{ $full_name ? $full_name : $full_name = '' }}-->
                                            <input type="text" id="full_name" placeholder="Insert the full name of the address owner" name="full_name" value="{{ $full_name }}" class="form-control" placeholder=""> 
                                            @if ($errors->has('full_name'))
                                                <label class='error' for='full_name'>{{ $errors->first('full_name') }}</label>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group form-group-default">
                                            <label for="zip_code">Code postal</label>
                                            <!-- {{ old('zip_code') ? $zip_code = old('zip_code') : $zip_code = $partner->address->zip_code }} -->
                                            <!--{{ $zip_code ? $zip_code : $zip_code = '' }}-->
                                            <input type="text" id="zip_code" placeholder="Insert your zip code" name="zip_code" value="{{ $zip_code }}" class="form-control"> 
                                            @if ($errors->has('zip_code'))
                                                <label class='error' for='zip_code'>{{ $errors->first('zip_code') }}</label>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Phone information -->
                            <br>
                            <p>Téléphone</p>
                            <div class="form-group-attached">
                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default input-group">
                                            <div class="cs-input-group-addon input-group-addon d-flex">
                                                <select class="cs-select cs-skin-slide cs-transparent" name="code_country[]" data-init-plugin="cs-select">
                                                    <option data-countryCode="GB" value="44" Selected>UK (+44)</option>
                                                    <option data-countryCode="US" value="1">USA (+1)</option>
                                                    <option data-countryCode="UZ" value="7">Uzbekistan (+7)</option>
                                                    <option data-countryCode="VU" value="678">Vanuatu (+678)</option>
                                                    <option data-countryCode="VA" value="379">Vatican City (+379)</option>
                                                    <option data-countryCode="VE" value="58">Venezuela (+58)</option>
                                                    <option data-countryCode="VN" value="84">Vietnam (+84)</option>
                                                    <option data-countryCode="VG" value="84">Virgin Islands - British (+1284)</option>
                                                    <option data-countryCode="VI" value="84">Virgin Islands - US (+1340)</option>
                                                    <option data-countryCode="WF" value="681">Wallis &amp; Futuna (+681)</option>
                                                    <option data-countryCode="YE" value="969">Yemen (North)(+969)</option>
                                                    <option data-countryCode="YE" value="967">Yemen (South)(+967)</option>
                                                    <option data-countryCode="ZM" value="260">Zambia (+260)</option>
                                                    <option data-countryCode="ZW" value="263">Zimbabwe (+263)</option>
                                                </select>
                                            </div>
                                            <div class="form-input-group flex-1">
                                                <label>Téléphone N1</label>
                                                <!-- {{ old('number[0]') ? $number1 = old('number[0]') : $number1 = null }} -->
                                                <!--{{ !$number1 && isset($partner->phones()->where('type','fix')->get()[0]->number) ? $number1 = $partner->phones()->where('type','fix')->get()[0]->number  : $number1 = '' }}-->
                                                <input type="text" id="phone" placeholder="Insert your fix number" name="number[]" value="{{ $number1 }}" class="form-control"> 
                                                @if ($errors->has('number.0'))
                                                    <label class='error' for='phone'>{{ $errors->first('number.0') }}</label>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="type[]" value="fix">
                                    <input type="hidden" name="type[]" value="fix">
                                    <input type="hidden" name="type[]" value="fax">
                                    @foreach($partner->phones()->where('type', 'fix')->get() as $phone)
                                        <input type="hidden" name="id[]" value="{{ $phone->id }}">
                                    @endforeach
                                    <!--{{ $partner->phones()->where('type','fax')->first() ? $id = $partner->phones()->where('type','fax')->first()->id  : $id = null }} -->
                                    <input type="hidden" name="id[]" value="{{ $id }}">   
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default input-group">
                                            <div class="cs-input-group-addon input-group-addon d-flex">
                                                <select class="cs-select cs-skin-slide cs-transparent" name="code_country[]" data-init-plugin="cs-select">
                                                    <option data-countryCode="GB" value="44" Selected>UK (+44)</option>
                                                    <option data-countryCode="US" value="1">USA (+1)</option>
                                                    <option data-countryCode="UZ" value="7">Uzbekistan (+7)</option>
                                                    <option data-countryCode="VU" value="678">Vanuatu (+678)</option>
                                                    <option data-countryCode="VA" value="379">Vatican City (+379)</option>
                                                    <option data-countryCode="VE" value="58">Venezuela (+58)</option>
                                                    <option data-countryCode="VN" value="84">Vietnam (+84)</option>
                                                    <option data-countryCode="VG" value="84">Virgin Islands - British (+1284)</option>
                                                    <option data-countryCode="VI" value="84">Virgin Islands - US (+1340)</option>
                                                    <option data-countryCode="WF" value="681">Wallis &amp; Futuna (+681)</option>
                                                    <option data-countryCode="YE" value="969">Yemen (North)(+969)</option>
                                                    <option data-countryCode="YE" value="967">Yemen (South)(+967)</option>
                                                    <option data-countryCode="ZM" value="260">Zambia (+260)</option>
                                                    <option data-countryCode="ZW" value="263">Zimbabwe (+263)</option>
                                                </select>
                                            </div>
                                            <div class="form-input-group flex-1">
                                                <label>Téléphone N2</label>
                                                <!-- {{ old('number[0]') ? $number2 = old('number[0]') : $number2 = null }} -->
                                                <!--{{ !$number2 && isset($partner->phones()->where('type','fix')->get()[1]->number) ? $number2 = $partner->phones()->where('type','fix')->get()[1]->number  : $number2 = '' }}-->
                                                <input type="text" id="phone_two" placeholder="Insert your second fix number" name="number[]" value="{{ $number2 }}" class="form-control"> 
                                                @if ($errors->has('number.1'))
                                                    <label class='error' for='phone_two'>{{ $errors->first('number.1') }}</label>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group form-group-default input-group">
                                            <div class="cs-input-group-addon input-group-addon d-flex">
                                                <select class="cs-select cs-skin-slide cs-transparent" name="code_country[]" data-init-plugin="cs-select">
                                                    <option data-countryCode="GB" value="44" Selected>UK (+44)</option>
                                                    <option data-countryCode="US" value="1">USA (+1)</option>
                                                    <option data-countryCode="UZ" value="7">Uzbekistan (+7)</option>
                                                    <option data-countryCode="VU" value="678">Vanuatu (+678)</option>
                                                    <option data-countryCode="VA" value="379">Vatican City (+379)</option>
                                                    <option data-countryCode="VE" value="58">Venezuela (+58)</option>
                                                    <option data-countryCode="VN" value="84">Vietnam (+84)</option>
                                                    <option data-countryCode="VG" value="84">Virgin Islands - British (+1284)</option>
                                                    <option data-countryCode="VI" value="84">Virgin Islands - US (+1340)</option>
                                                    <option data-countryCode="WF" value="681">Wallis &amp; Futuna (+681)</option>
                                                    <option data-countryCode="YE" value="969">Yemen (North)(+969)</option>
                                                    <option data-countryCode="YE" value="967">Yemen (South)(+967)</option>
                                                    <option data-countryCode="ZM" value="260">Zambia (+260)</option>
                                                    <option data-countryCode="ZW" value="263">Zimbabwe (+263)</option>
                                                </select>
                                            </div>
                                            <div class="form-input-group flex-1">
                                                <label>Fax</label>
                                                <!-- {{ old('number[2]') ? $number3 = old('number[2]') : $number3 = null }} -->
                                                <!--{{ !$number3 && isset($partner->phones()->where('type','fax')->get()[0]->number) ? $number2 = $partner->phones()->where('type','fix')->get()[0]->number  : $number3 = '' }}-->
                                                <input type="text" id="fax" placeholder="Insert your fax number" name="number[]" value="{{ $number3 }}" class="form-control"> 
                                                @if ($errors->has('fax_number'))
                                                    <label class='error' for='fax'>{{ $errors->first('fax_number') }}</label>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <p></p>
                        </div>
                        <div class="col-md-9">
                            <button class="btn btn-success" type="submit">Update</button>
                            <a href="{{ url('/settings') }}"><button type="button" class="btn btn-default"><i class="pg-close"></i>Cancel</button></a> 
                        </div>
                    </div>
                </div>
                </form>
            </div> 
        </div>
    </div>
</div>  
@endsection

@section('script')
    
@stop