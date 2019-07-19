@extends('layouts.app')

@section('content')


 

    

<div class="outer-container">
    <div class="container portfolio-page">
        <div class="row">
            <div class="col">
                <ul class="breadcrumbs flex align-items-center">
                    <li><a href="home">Home</a></li>
                    <li>Setting</li>
                </ul><!-- .breadcrumbs -->
            </div><!-- .col -->
        </div><!-- .row -->

        <div id="jquery_alert"></div>
        @if(Session::has('message'))
            <div class="row">
                <div class="alert alert-success alert-dismissible offset-1 col-10" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">
                            <i class="notika-icon notika-close">
                            </i>
                        </span>
                    </button>
                    <p style="text-align:center;margin-bottom:0px;">{!! session('message') !!}</p>
                </div>
            </div>
        @endif
        

        <div class="row">
            <div class="col-12">
                <div class="jumbotron">
                    <form action="update" method="post" class="comment-form">
                    @csrf
                        <div class="row">
                            <div class="offset-1 col-11">
                                <h5>ユーザー名</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="offset-md-2 col-12 col-md-8">
                                <input type="text" name="name" id="name" value="{{ $user->name }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="offset-1 col-11">
                                <h5>ポートフォリオ名</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="offset-md-2 col-12 col-md-8">
                                <input type="text" name="portfolio_name" id="portfolio_name" value="@if($user->portfolio) {{ $user->portfolio->name }} @endif">
                            </div>
                        </div>

                        <div class="row" style="margin-top:5%">
                            <div class="offset-1 col-11">
                                <h5>ポートフォリオURL</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="offset-md-2 col-12 col-md-6">
                                <input type="text" name="url" id="url" value="@if($user->portfolio) {{$user->Portfolio->url}} @endif">
                            </div>
                            <div class="offset-2 offset-md-0 col-8 col-md-4">
                                <button type="button" id="getImage" class="comment-form" style="margin-top:20px;">イメージ取得</button>
                            </div>
                        </div>

                        <div class="row" style="margin-top:5%">
                            <div class="offset-1 col-11">
                                <h5>イメージ画像</h5>
                            </div>
                        </div>
                        <div class="row">
                            @if($user->portfolio && $user->portfolio->image)
                                <div class="offset-md-2 col-12 col-md-8" id="image_area">
                                    <img id="image" src="{{asset($user->portfolio->image)}}" class="img-fluid center-block">
                                </div>
                                <input type="hidden" name="image" value="{{$user->portfolio->image}}">
                            @else
                                <div class="offset-md-2 col-12 col-md-6" id="image_area">
                                    <p>ポートフォリオURLを入力後、「イメージ取得」ボタンを押すと自動でページの画像が取得されます。</p>
                                </div>
                                <input type="hidden" name="image" value="">
                            @endif
                            
                            <!--
                            <input type="text" name="image" id="image" value="@if($user->Portfolio) $user->Portfolio->image @endif">
                            -->
                        </div>

                        <div class="row" style="margin-top:5%">
                            <div class="offset-1 col-11">
                                <h5>タグ</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="offset-md-2 col-12 col-md-8">
                                @foreach($tags as $tag_categorys)
                                    @switch($tag_categorys[0]->category)
                                        @case("job")
                                            <h6>【職業】</h6>
                                            @foreach($tag_categorys as $tag)
                                                <input type="checkbox" id="tag_{{$tag->id}}" name="tag[]" value="{{$tag->id}}" @if($user->portfolio) @foreach($user->portfolio->tags as $mytag) @if($mytag->id === $tag->id) checked @endif @endforeach @endif>
                                                <label for="tag_{{$tag->id}}">{{$tag->tag_name}}</label>
                                            @endforeach
                                            @break
                                        @case("skill")
                                            <h6>【スキル】</h6>
                                            @foreach($tag_categorys as $tag)
                                                <input type="checkbox" id="tag_{{$tag->id}}" name="tag[]" value="{{$tag->id}}" @if($user->portfolio) @foreach($user->portfolio->tags as $mytag) @if($mytag->id === $tag->id) checked @endif @endforeach @endif>
                                                <label for="tag_{{$tag->id}}">{{$tag->tag_name}}</label>
                                            @endforeach
                                            @break
                                    @endswitch
                                @endforeach
                                                

                            </div>
                        </div>
                        <div class="row">
                            <div class="offset-2 col-3">
                                <label for="like_count">
                                <p>99</p>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-12" align="center">
                                <input type="submit" value="保存">
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div><!-- .row -->

        
    </div><!-- .container -->
</div><!-- .outer-container -->

<script>
    $(function(){
        $('#getImage').click(function(){
            var portfolio_url = $('#url').val();
            $.getJSON("/getImage",{"url" : portfolio_url},function(result){
                console.log("result:" + result);
                $('#image_area').empty();
                $('#image_area').append('<img id="image" src="' + result + '" class="img-fluid center-block">');
                filename = result.replace('http://172.22.143.106:8000/', "");
                $('input[name="image"]').val(filename);
                alert('success');
            });
            
            alert('aaa');
        });
    });
</script>

@endsection
