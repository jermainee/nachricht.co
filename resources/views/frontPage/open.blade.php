@extends('layouts.wireframe')

@section('title')
    Nachricht öffnen
@endsection

@section('metatags')
    <meta name="robots" content="noindex"/>
@endsection

@section('content')
    <div class="frontPage">
        <section class="hero is-primary has-text-centered">
            <div class="hero-body">
                <div class="container">
                    <div class="has-padding-bottom">
                        @include('components.ads')
                    </div>

                    <div class="box">
                        <p class="is-size-5 is-marginless">@lang('frontpage.openText')</p>

                        @include('components.ads')

                        <a href="/n" class="button is-primary is-fullwidth has-text-weight-bold  has-margin-top">{{ trans('frontpage.openButton') }}</a>
                    </div>
                </div>
            </div>
        </section>

        @include('frontPage.components.content')
    </div>
@endsection