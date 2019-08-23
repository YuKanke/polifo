@extends('layouts.app')

@section('content')
<div class="outer-container">
    <div class="container portfolio-page">
        <div class="row">
            <div class="col">
                <ul class="breadcrumbs flex align-items-center">
                    <li><a href="/">Home</a></li>
                    <li>Show</li>
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
                            <button type="submit" id="like_button">
                                <img src="@if(Auth::user()->viaLoveReacter()->hasReactedTo($user->portfolio)){{asset('images/like_red.png')}} @else {{asset('images/like_black.png')}} @endif" id="like_img" width="50%" height="50%">
                                <div id="like_count">{{$user->portfolio->viaLoveReactant()->getReactionCounterOfType('Like')->count}}</div>
                            </button>
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

<script>
$(function() {
    $('#like_button').click(function(event){
        var arr = location.href.split("/");
        var portfolio_id = arr[arr.length-1];
        $.getJSON("/like_api",{"user_id" : {{ Auth::id() }} , "portfolio_id" : portfolio_id},function(result){
            var rows = "";
            var colList = ["prj","pname"]
            for (i = 0; i < result.length; i++) {
                rows += "<tr>";
                rows += '<td><input type="checkbox" name="project_list[]" value="' + result[i]["prj"] + '" checked="checked"> </td>';
                for (j = 0; j < colList.length; j++) {
                    rows += "<td>";
                    rows += result[i][colList[j]];
                    rows += "</td>";
                }
                rows += "</tr>";
            }
            console.log(result["react_flg"]);
            //テーブルに作成したhtmlを追加する
            $("#like_count").text(result["like_count"]);
            if(result["react_flg"]){
                $("#like_img").attr("src", "{{asset('images/like_red.png')}}");
            }else{
                $("#like_img").attr("src", "{{asset('images/like_black.png')}}");
            }
        });
    });
});
</script>


@endsection
