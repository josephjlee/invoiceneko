@extends("layouts.default", ['page_title' => 'Company | Settings'])

@section("head")
    <link href="{{ asset(mix('/assets/css/selectize.css')) }}" rel="stylesheet" type="text/css">
    <style>
    </style>
@stop

@section("content")
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h3>Settings</h3>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m3 xl2">
                @include("partials/sidenav-company")
            </div>
            <div class="col s12 m9 xl10">
                <form id="edit-company-settings" method="post" enctype="multipart/form-data">
                    <div class="card-panel">
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="tax" name="tax" type="number" data-parsley-trigger="change" value="{{ $companySetting->tax ?? '' }}" placeholder="Company Tax %"  @if(!$company) disabled @endif>
                                <label for="tax" class="label-validation">Company Tax %</label>
                                <span class="helper-text"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="invoice_prefix" name="invoice_prefix" type="text" data-parsley-trigger="change" data-parsley-minlength="2" value="{{ $companySetting->invoice_prefix ?? '' }}" placeholder="Invoice Prefix" @if(!$company) disabled @endif>
                                <label for="invoice_prefix" class="label-validation">Invoice Prefix</label>
                                <span class="helper-text"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="quote_prefix" name="quote_prefix" type="text" data-parsley-trigger="change" data-parsley-minlength="2" value="{{ $companySetting->quote_prefix ?? '' }}" placeholder="Quote Prefix" @if(!$company) disabled @endif>
                                <label for="quote_prefix" class="label-validation">Quote Prefix</label>
                                <span class="helper-text"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="receipt_prefix" name="receipt_prefix" type="text" data-parsley-trigger="change" data-parsley-minlength="2" value="{{ $companySetting->receipt_prefix ?? '' }}" placeholder="Receipt Prefix" @if(!$company) disabled @endif>
                                <label for="receipt_prefix" class="label-validation">Receipt Prefix</label>
                                <span class="helper-text"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <textarea id="invoice_conditions" name="invoice_conditions" class="trumbowyg-textarea" data-parsley-required="true" data-parsley-trigger="change" placeholder="Invoice Conditions" @if(!$company) disabled @endif>@if(isset($companySetting->invoice_conditions)){!! $companySetting->invoice_conditions !!}@else @endif</textarea>
                                <label for="invoice_conditions" class="label-validation">Invoice Conditions</label>
                                <span class="helper-text"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <textarea id="quote_conditions" name="quote_conditions" class="trumbowyg-textarea" data-parsley-required="true" data-parsley-trigger="change" placeholder="Quote Conditions" @if(!$company) disabled @endif>@if(isset($companySetting->quote_conditions)){!! $companySetting->quote_conditions !!}@else @endif</textarea>
                                <label for="quote_conditions" class="label-validation">Quote Conditions</label>
                                <span class="helper-text"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}
                            <button class="btn waves-effect waves-light col s12 m3 offset-m9" type="submit" name="action" @if(!$company) disabled @endif>Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section("scripts")
    <script type="text/javascript">
        "use strict";
        $(function() {

            @if(!$company)
            M.toast({ html: "You need to fill in your company information first", displayLength: "6000", classes: "error"});
            @endif

            Unicorn.initTrumbowyg('.trumbowyg-textarea');
            Unicorn.initParsleyValidation('#edit-company-settings');
        });
    </script>
@stop