@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="https://us.123rf.com/450wm/druidiwow64/druidiwow641809/druidiwow64180900059/107507350-stock-illustration-smile-cheshire-cat-illustration-halloween-white-smile-black-background-with-gradient-.jpg?ver=6" class="rounded-circle" style="height: 150px;">
        </div>
        <div class="col-9 pt-5">
            <div><h1>{{ $user->username }}</h1></div>
            <div class="d-flex">
                <div class="pr-5"><strong>25</strong> posts</div>
                <div class="pr-5"><strong>2525</strong> followers</div>
                <div class="pr-5"><strong>25</strong> following</div>
            </div>
            <div class="pt-4 font-weight-bold">{{ $user->profile->title }}</div>
            <div>{{ $user->profile->description }}</div>
            <div><a href="#">{{ $user->profile->url }}</a></div>
        </div>
    </div>

    <div class="row pt-4">
        <div class="col-4">
            <img src="https://s.keepmeme.com/files/en_posts/20200821/59dc950c67efe8b27f00c80b886a9496cat-smile-meme.jpg" class="w-100 h-100">
        </div>
        <div class="col-4">
            <img src="https://s.keepmeme.com/files/en_posts/20200917/cute-cat-smiling-meme-9c9330916cd484e167f76998749f0a2d.jpg" class="w-100 h-100">
        </div>
        <div class="col-4">
            <img src="https://s.keepmeme.com/files/en_posts/20200908/blurred-surprised-cat-meme-5b734a45210ef3b6657bcbe2831715fa.jpg" class="w-100 h-100">
        </div>
    </div>
</div>
@endsection
