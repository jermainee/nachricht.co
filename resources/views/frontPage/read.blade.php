@extends('layouts.wireframe')

@section('content')
    <div class="frontPage">
        <section class="hero is-primary has-text-centered">
            <div class="hero-body">
                <div class="container">
                    <div class="box">
                        <form id="messageForm" enctype="multipart/form-data" method="post" action="/" name="messageForm">
                            <textarea class="frontPage__messageField frontPage__messageField--no-resize" name="message" readonly>{{$message}}</textarea>
                            <a href="/" class="button is-primary is-fullwidth has-text-weight-bold">Neue Nachricht</a>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        @include('frontPage.content')
    </div>
@endsection

@section('javascript')
    <script src="/js/app.js"></script>
@endsection