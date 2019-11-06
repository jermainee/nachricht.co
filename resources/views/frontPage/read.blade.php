@extends('layouts.wireframe')

@section('title')
    Nachricht ansehen
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
                    <div class="has-padding-bottom">
                        @include('components.ads')
                    </div>

                    <div class="box">
                        <form id="messageForm" enctype="multipart/form-data" method="post" action="/" name="messageForm">
                            <div class="frontPage__messageField frontPage__messageField--readonly has-text-left">{!! $message !!}</div>
                            <a href="/" class="button is-primary is-fullwidth has-text-weight-bold">{{ trans('frontpage.createNew') }}</a>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        @include('frontPage.components.content')
    </div>
@endsection