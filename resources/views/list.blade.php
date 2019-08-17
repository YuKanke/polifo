@extends('layouts.app')

@section('content')
<div class="outer-container">
    <div class="container portfolio-page">
        <div class="row">
            <div class="col">
                <ul class="breadcrumbs flex align-items-center">
                    <li><a href="/home">Home</a></li>
                    <li>Portfolio</li>
                </ul><!-- .breadcrumbs -->
            </div><!-- .col -->
        </div><!-- .row -->


        <div class="row"><!-- 検索フォーム -->
            <div class="col-12">
                <div class="jumbotron">
                    <form method="get" action="list" class="comment-form">
                        <div class="col-12">
                            <h4>【job】</h4>
                        </div>
                        <div class="offset-1 col-11">
                            @foreach($tags as $tag)
                                @if($tag->category === "job")
                                    <input id={{$tag->id}} type="checkbox" name="job[]" value={{$tag->id}} @if(! empty($job)) @foreach($job as $value) @if($tag->id == $value) checked="checked" @endif @endforeach @endif>
                                    <label for={{$tag->id}}>{{$tag->tag_name}}</label>
                                @endif
                            @endforeach
                        </div>
                        <div class="col-12">
                            <h4>【skill】</h4>
                        </div>
                        <div class="offset-1 col-11">
                            @foreach($tags as $tag)
                                @if($tag->category === "skill")
                                    <input id={{$tag->id}} type="checkbox" name="skill[]" value={{$tag->id}} @if(! empty($skill)) @foreach($skill as $value) @if($tag->id == $value) checked="checked" @endif @endforeach @endif>
                                    <label for={{$tag->id}}>{{$tag->tag_name}}</label>
                                @endif
                            @endforeach
                        </div>
                        <div class="col-12">
                            <h4>【free word】</h4>
                        </div>
                        <div class="offset-1 col-7">
                            <input type="text" name="free" value="{{$free}}">
                        </div>
                        
                        <div class="col-12" align="center">
                            <input type="submit" value="検索">
                        </div>
                        
                    </form>
                </div>
            </div>
        </div><!-- 検索フォーム終了 -->

        <div class="row">
            @foreach($portfolios as $portfolio)
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="portfolio-content">
                        <figure>
                            <img src="{{asset($portfolio->image)}}" alt="">
                        </figure>

                        <div class="entry-content flex flex-column align-items-center justify-content-center">
                            <h3><a data-toggle="modal" data-target="#portfolio_modal_{{$portfolio->id}}">{{$portfolio->name}}</a></h3>

                            <ul class="flex flex-wrap justify-content-center">
                                <li><a href="#">ここはいいね数かなぁ</a></li>
                            </ul>
                        </div><!-- .entry-content -->
                    </div><!-- .portfolio-content -->
                </div><!-- .col -->

                <!-- モーダル -->
                <div class="modal" id="portfolio_modal_{{$portfolio->id}}" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12">
                                            <img src="{{asset($portfolio->image)}}" class="img-fluid center-block" alt="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        {{$portfolio->name}}<br>
                                        タグ<br>
                                        ポートフォリオの説明<br>
                                        いいねすう<br>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" onclick="window.open('{{$portfolio->url}}','_blank')">ページを見る</button>
                                <button type="button" class="btn btn-primary">いいねする</button>
                                <button type="button" class="btn btn-primary" onclick="location.href='/show/{{$portfolio->user->id}}'">プロフィールを見る</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            
        </div><!-- .row -->


    </div><!-- .container -->
</div><!-- .outer-container -->
@endsection
