@extends('layouts.wireframe')

@section('content')
    <div class="frontPage">
        <section class="hero is-primary has-text-centered">
            <div class="hero-body">
                <div class="container">
                    <div class="has-padding-bottom">
                        @include('components.ads')
                    </div>

                    <div class="box">
                        <form id="messageForm" enctype="multipart/form-data" method="post" action="/" name="messageForm">
                            <textarea class="frontPage__messageField frontPage__messageField--readonly" name="message" readonly>{{$message}}</textarea>
                            <a href="/" class="button is-primary is-fullwidth has-text-weight-bold">{{ trans('frontpage.createNew') }}</a>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        @include('frontPage.content')
    </div>
@endsection