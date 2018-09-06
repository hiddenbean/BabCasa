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
                    <a href="{{ url('/') }}">Tableau de borad</a>
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
                <div class="m-0 row card-body">
                    <div class="col-lg-12 sm-no-padding">
                        <div class="padding-30 sm-padding-5">
                            <p>Informations de base</p>
                            <div class="form-group-attached">
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group form-group-default required">
                                            <label for="company_name">Nom de la compagnie</label>
                                            <input type="text" id="company_name" name="company_name" value="{{ old('company_name') }}" class="form-control"> 
                                            @if ($errors->has('company_name'))
                                                <label class='error' for='company_name'>{{ $errors->first('company_name') }}</label>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-group-default required">
                                            <label for="name">Nom</label>
                                            <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control"> 
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
                                            <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control"> 
                                            @if ($errors->has('email'))
                                                <label class='error' for='email'>{{ $errors->first('email') }}</label>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group form-group-default required">
                                            <label for="password">Mot de passe</label>
                                            <input type="password" id="password" name="password" class="form-control"> 
                                            @if ($errors->has('password'))
                                                <label class='error' for='password'>{{ $errors->first('password') }}</label>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-group-default required">
                                            <label for="password_confirmation">Mot de passe confirmation</label>
                                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control"> 
                                            @if ($errors->has('password_confirmation'))
                                                <label class='error' for='password_confirmation'>{{ $errors->first('password_confirmation') }}</label>
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
                                            <textarea type="text" id="about" name="about" class="form-control" rows="15">{{ old('about') }}</textarea>
                                            @if ($errors->has('about'))
                                                <label class='error' for='about'>{{ $errors->first('about') }}</label>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group form-group-default">
                                            <img src="{{ asset('img/img_placeholder.png') }}" id="image_preview_partner" alt="" srcset="" width="250">
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
                                            <input type="text" id="trade_registry" name="trade_registry" value="{{ old('trade_registry') }}" class="form-control"> 
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
                                            <input type="text" id="ice" name="ice" value="{{ old('ice') }}" class="form-control"> 
                                            @if ($errors->has('ice'))
                                                <label class='error' for='ice'>{{ $errors->first('ice') }}</label>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-group-default required">
                                            <label for="taxe_id">Taxe id</label>
                                            <input type="text" id="taxe_id" name="taxe_id" value="{{ old('taxe_id') }}" class="form-control"> 
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
                                    <input type="text" id="address" name="address" value="{{ old('address') }}" class="form-control" placeholder=""> 
                                    @if ($errors->has('address'))
                                        <label class='error' for='address'>{{ $errors->first('address') }}</label>
                                    @endif
                                </div>
                                <div class="form-group form-group-default">
                                    <label for="address2">Deuxième ligne</label>
                                    <input type="text" id="address2" name="address_two" value="{{ old('address_two') }}" class="form-control" placeholder="">
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group form-group-default">
                                            <label for="country">Pays</label>
                                            <input type="text" id="country" name="country" value="{{ old('country') }}" class="form-control" placeholder=""> 
                                            @if ($errors->has('country'))
                                                <label class='error' for='country'>{{ $errors->first('country') }}</label>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-group-default">
                                            <label for="city">Ville</label>
                                            <input type="text" id="city" name="city" value="{{ old('city') }}" class="form-control"> 
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
                                            <input type="text" id="full_name" name="full_name" value="{{ old('full_name') }}" class="form-control" placeholder=""> 
                                            @if ($errors->has('full_name'))
                                                <label class='error' for='full_name'>{{ $errors->first('full_name') }}</label>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group form-group-default">
                                            <label for="zip_code">Code postal</label>
                                            <input type="text" id="zip_code" name="zip_code" value="{{ old('zip_code') }}" class="form-control"> 
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
                                                <input type="text" id="phone" name="number[]" value="{{ old('number.0') }}" class="form-control"> 
                                                @if ($errors->has('number.0'))
                                                    <label class='error' for='phone'>{{ $errors->first('number.0') }}</label>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
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
                                                <input type="text" id="phone_two" name="number[]" value="{{ old('number.1') }}" class="form-control"> 
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
                                                <input type="text" id="fax" name="fax_number" value="{{ old('fax_number') }}" class="form-control"> 
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
                </div>
            </div> 
        </div>
    </div>
</div>  
@endsection

@section('script')
    
@stop