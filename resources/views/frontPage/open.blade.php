@extends('layouts.wireframe')

@section('title')
    Nachricht öffnen
@endsection

@section('metatags')
    <meta name="description" content="Klicke auf diesen Link um die verschlüsselte Einweg-Nachricht zu lesen. Sie zerstört sich danach selbst."/>
    <meta property="og:title" content="Verschlüsselte Einweg-Nachricht öffnen - Nachricht.co"/>
    <meta property="og:description" content="Klicke auf diesen Link um die verschlüsselte Einweg-Nachricht zu lesen. Sie zerstört sich danach selbst."/>
    <meta property="og:image" content=""/>
@endsection

@section('content')
    <div class="frontPage">
        <section class="hero is-primary has-text-centered is-small">
            <div class="hero-body">
                <div class="container">
                    <div class="box">
                        <p class="is-size-5 is-marginless">
                            @lang('frontpage.openText')
	                        <?php if($hasPassword): ?>
                                <br/> @lang('frontpage.openWithPasswordText')
                            <?php endif; ?>
                        </p>

                        <div class="has-padding-top">
                            @include('components.ads')
                        </div>

                    <?php if($hasPassword): ?>
                            <form method="post" action="/n" autocomplete="off">
                                @csrf
                                <input class="input has-margin-top" name="password" type="password" placeholder="{{ trans('frontpage.openPasswordPlaceholder') }}" maxlength="32" required/>
                                <button class="button is-primary is-fullwidth has-text-weight-bold  has-margin-top">{{ trans('frontpage.openButton') }}</button>
                            </form>
                        <?php else: ?>
                            <a href="/n" class="button is-primary is-fullwidth has-text-weight-bold  has-margin-top">{{ trans('frontpage.openButton') }}</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>

        @include('frontPage.components.content')
    </div>
@endsection
