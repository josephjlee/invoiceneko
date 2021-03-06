@extends("layouts.default", ['page_title' => 'Client | Create'])

@section("head")
    <link href="{{ asset(mix('/assets/css/intlTelInput.css')) }}" rel="stylesheet" type="text/css">
    <link href="{{ asset(mix('/assets/css/selectize.css')) }}" rel="stylesheet" type="text/css">
    <style>
    </style>
@stop

@section("content")
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h3>Create Client</h3>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <form id="create-client" method="post" enctype="multipart/form-data">
                    <div class="card-panel">
                        <div class="row">
                            <div class="col s12">
                                <h5>Details</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <div class="file-field">
                                    <div class="btn btn-link tooltipped" data-position="left" data-tooltip="Recommended Size: 500 (W) x 500 (H) with White Background (Optional)">
                                        <span>File</span>
                                        <input id="logo" name="logo" type="file" accept="image/*" data-maxsize="10M"/>
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input id="logofp" name="logofp" class="file-path validate" type="text" data-parsley-required="false" data-parsley-fileuploaded="true" data-parsley-trigger="change" placeholder="Client Logo"/>
                                    </div>
                                </div>
                                <label for="logo" class="label-validation">
                                    Logo
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <input id="companyname" name="companyname" type="text" data-parsley-required="true"  data-parsley-trigger="change" data-parsley-minlength="4" value="{{ old('companyname') }}" placeholder="Client Company Name">
                                <label for="companyname" class="label-validation">Client Company Name</label>
                                <span class="helper-text"></span>
                            </div>
                            <div class="input-field col s12 m6">
                                <input id="nickname" name="nickname" type="text" data-parsley-trigger="change" value="{{ old('nickname') }}" placeholder="Client Nickname">
                                <label for="nickname" class="label-validation">Client Nickname</label>
                                <span class="helper-text"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <select id="country_code" name="country_code" data-parsley-trigger="change" placeholder="Client Country">
                                    <option disabled="" selected="selected" value="">Client Country</option>
                                    @foreach($countries as $country)
                                        <option value="{{ $country['iso_3166_1_alpha2'] }}" @if(old('country_code') == $country['iso_3166_1_alpha2']) selected @endif>{{ $country['name'] }}</option>
                                    @endforeach
                                </select>
                                <label for="country" class="label-validation">Client Country</label>
                                <span class="helper-text"></span>
                            </div>
                            <div class="input-field col s12 m6">
                                <input id="phone" name="phone" type="tel" class="phone-input" data-parsley-trigger="change" data-parsley-pattern="^[\d\+\-\.\(\)\/\s]*$" data-parsley-phone-format="#phone" value="{{ old('phone') }}">
                                <label for="phone" class="label-validation">Phone</label>
                                <span class="helper-text"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <input id="crn" name="crn" type="text" data-parsley-trigger="change" data-parsley-minlength="4" data-parsley-pattern="/^[a-zA-Z0-9\-_]{0,40}$/" value="{{ old('crn') }}" placeholder="Client Company Registration Number">
                                <label for="crn" class="label-validation">Client Company Registration Number</label>
                                <span class="helper-text"></span>
                            </div>
                            <div class="input-field col s12 m6">
                                <input id="website" name="website" type="text" data-parsley-trigger="change" data-parsley-minlength="4" value="{{ old('website') }}" placeholder="Client Website">
                                <label for="website" class="label-validation">Client Website</label>
                                <span class="helper-text"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <h5>Address</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6">
                                <input id="block" name="block" type="text" data-parsley-trigger="change" value="{{ old('block') }}" placeholder="Client Block">
                                <label for="block" class="label-validation">Client Block</label>
                                <span class="helper-text"></span>
                            </div>
                            <div class="input-field col s6">
                                <input id="street" name="street" type="text" data-parsley-trigger="change" value="{{ old('street') }}" placeholder="Client Street">
                                <label for="street" class="label-validation">Client Street</label>
                                <span class="helper-text"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6">
                                <i class="mdi mdi-pound prefix-inline"></i>
                                <input id="unitnumber" name="unitnumber" type="text" data-parsley-trigger="change" value="{{ old('unitnumber') }}" placeholder="Client Unit Number">
                                <label for="unitnumber" class="label-validation">Client Unit Number</label>
                                <span class="helper-text"></span>
                            </div>
                            <div class="input-field col s6">
                                <input id="postalcode" name="postalcode" type="text" data-parsley-trigger="change" value="{{ old('postalcode') }}" placeholder="Client Postal Code">
                                <label for="postalcode" class="label-validation">Client Postal Code</label>
                                <span class="helper-text"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <h5>Contact</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m3 l2">
                                <select id="contactsalutation" name="contactsalutation" data-parsley-required="true" data-parsley-trigger="change">
                                    <option disabled="" selected="selected" value="">Salutation</option>
                                    <option value="mr" @if(old('contactsalutation') == "mr") selected @endif>Mr.</option>
                                    <option value="mrs" @if(old('contactsalutation') == "mrs") selected @endif>Mrs.</option>
                                    <option value="mdm" @if(old('contactsalutation') == "mdm") selected @endif>Mdm.</option>
                                    <option value="miss" @if(old('contactsalutation') == "miss") selected @endif>Miss.</option>
                                    <option value="dr" @if(old('contactsalutation') == "dr") selected @endif>Dr.</option>
                                    <option value="prof" @if(old('contactsalutation') == "prof") selected @endif>Prof.</option>
                                    <option value="mx" @if(old('contactsalutation') == "mx") selected @endif>Mx.</option>
                                </select>
                                <label for="contactsalutation" class="label-validation">Salutation</label>
                                <span class="helper-text"></span>
                            </div>
                            <div class="input-field col s12 m5 l5">
                                <input id="contactfirstname" name="contactfirstname" type="text" data-parsley-required="true" data-parsley-trigger="change" value="{{ old('contactfirstname') }}" placeholder="Client Contact First Name">
                                <label for="contactfirstname" class="label-validation">Contact First Name</label>
                                <span class="helper-text"></span>
                            </div>
                            <div class="input-field col s12 m4 l5">
                                <input id="contactlastname" name="contactlastname" type="text" data-parsley-trigger="change" value="{{ old('contactlastname') }}" placeholder="Client Contact Last Name">
                                <label for="contactlastname" class="label-validation">Contact Last Name</label>
                                <span class="helper-text"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <input id="contactphone" name="contactphone" type="tel" class="phone-input" data-parsley-trigger="change" data-parsley-pattern="^[\d\+\-\.\(\)\/\s]*$" data-parsley-phone-format="#contactphone" value="{{ old('contactphone') }}">
                                <label for="contactphone" class="label-validation">Phone</label>
                                <span class="helper-text"></span>
                            </div>
                            <div class="input-field col s12 m6">
                                <input id="contactemail" name="contactemail" type="email" data-parsley-required="true" data-parsley-trigger="change" value="{{ old('contactemail') }}" placeholder="Client Contact Email">
                                <label for="contactemail" class="label-validation">Contact Email</label>
                                <span class="helper-text"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            {{ csrf_field() }}
                            <button class="btn btn-link waves-effect waves-light col s12 m3 offset-m9" type="submit" name="action">Create</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section("scripts")
    <script type="text/javascript" src="{{ asset(mix('/assets/js/intlTelInput.js')) }}"></script>

    <script type="text/javascript">
        "use strict";
        $(function() {
            Unicorn.initSelectize('#country_code');
            Unicorn.initSelectize('#contactsalutation');
            Unicorn.initPhoneInput('#phone');
            Unicorn.initPhoneInput('#contactphone');
            Unicorn.initParsleyValidation('#create-client');
        });
    </script>
@stop