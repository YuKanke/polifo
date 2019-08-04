@extends('layouts.app')

@section('content')
<div class="outer-container">
    <div class="container portfolio-page">
        <div class="row">
            <div class="col">
                <ul class="breadcrumbs flex align-items-center">
                    <li><a href="/home">Home</a></li>
                    <li>Profile</li>
                </ul><!-- .breadcrumbs -->
            </div><!-- .col -->
        </div><!-- .row -->

        <div class="row">
            <div class="col-12">
                <div class="jumbotron">

                    <div class="row">
                        <div class="offset-1 col-11">
                            <h5>ユーザ名</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="offset-md-2 col-12 col-md-8">
                            <p>{{ $user->name }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="offset-1 col-11">
                            <h5>ポートフォリオ名</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="offset-md-2 col-12 col-md-8">
                            <p>@if($user->portfolio) {{ $user->portfolio->name }} @endif</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="offset-md-2 col-12 col-md-6">
                            <a href="@if($user->portfolio) {{$user->Portfolio->url}} @endif"><img src="{{asset($user->portfolio->image)}}" class="img-fluid center-block" alt="@if($user->portfolio) {{ $user->portfolio->name }} @endif"></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="offset-1 col-11" style="margin-top:3%">
                            <h5>タグ一覧</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="offset-md-2 col-12 col-md-8">
                            <b>【職業】</b>
                            @foreach($user->portfolio->tags as $tag)
                                @if($tag->category === "job")
                                    <span class="badge badge-primary">{{$tag->tag_name}}</span>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="row">
                        <div class="offset-md-2 col-12 col-md-8">
                            <b>【スキル】</b>
                            @foreach($user->portfolio->tags as $tag)
                                @if($tag->category === "skill")
                                    <span class="badge badge-primary">{{$tag->tag_name}}</span>
                                @endif
                            @endforeach
                        </div>
                    </div>


                    <div class="row">
                        <div class="offset-1 col-11">
                            <h5>いいね数</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="offset-md-2 col-12 col-md-8">
                            <p>999</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="offset-1 col-11">
                            <h5>プロフィール</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="offset-md-2 col-12 col-md-8">
                            <p>@if($user->portfolio) {{ $user->portfolio->comment }} @endif</p>
                        </div>
                    </div>

                </div>
            </div>
        </div><!-- .row -->

        
    </div><!-- .container -->
</div><!-- .outer-container -->
@endsection
