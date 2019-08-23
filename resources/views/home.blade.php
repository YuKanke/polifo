@extends('layouts.app')

@section('content')
<div class="outer-container">
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Polifo</h1>
            <p class="lead">ポートフォリオ共有プラットフォーム</p>
        </div>
    </div>

    <div class="container portfolio-page">
        <div class="row">
            <div class="col-12">
                <h4>【人気のポートフォリオ】</h4>
            </div>
            @foreach($portfolio_popular as $portfolio)
                <div class="col-12 col-md-6 col-lg-3">
                    <a data-toggle="modal" data-target="#portfolio_modal_{{$portfolio->id}}">
                        <div class="portfolio-content">
                            <figure>
                                <img src="{{asset($portfolio->image)}}" alt="">
                            </figure>

                            <div class="entry-content flex flex-column align-items-center justify-content-center">
                                <h3>{{$portfolio->name}}</h3>

                                <ul class="flex flex-wrap justify-content-center">
                                    <li>♡{{$portfolio->viaLoveReactant()->getReactionCounterOfType('Like')->count}}</li>
                                </ul>
                            </div><!-- .entry-content -->
                        </div><!-- .portfolio-content -->
                    </a>
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
                                        <p><b>NAME：</b>{{$portfolio->name}}</p>
                                    </div>
                                    <div class="row">
                                        <p><b>TAG：</b>
                                            @foreach($portfolio->tags as $tag)
                                                <span class="badge badge-primary">{{$tag->tag_name}}</span>
                                            @endforeach
                                        </p>
                                    </div>
                                    <div class="row">
                                        <p><b>COMMENT：</b>{{$portfolio->comment}}</p>
                                    </div>
                                    <div class="row">
                                        <p><b>LIKE：</b>{{$portfolio->viaLoveReactant()->getReactionCounterOfType('Like')->count}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" onclick="window.open('{{$portfolio->url}}','_blank')">ページを見る</button>
                                <button type="button" class="btn btn-primary" onclick="location.href='/show/{{$portfolio->user->id}}'">プロフィールを見る</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    
        <div class="row">
            <div class="col-12">
                <h4>【新着のポートフォリオ】</h4>
            </div>
            @foreach($portfolio_new as $portfolio)
                <div class="col-12 col-md-6 col-lg-3">
                    <a data-toggle="modal" data-target="#portfolio_modal_{{$portfolio->id}}">
                        <div class="portfolio-content">
                            <figure>
                                <img src="{{asset($portfolio->image)}}" alt="">
                            </figure>

                            <div class="entry-content flex flex-column align-items-center justify-content-center">
                                <h3>{{$portfolio->name}}</h3>

                                <ul class="flex flex-wrap justify-content-center">
                                    <li>♡{{$portfolio->viaLoveReactant()->getReactionCounterOfType('Like')->count}}</li>
                                </ul>
                            </div><!-- .entry-content -->
                        </div><!-- .portfolio-content -->
                    </a>
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
                                        <p><b>NAME：</b>{{$portfolio->name}}</p>
                                    </div>
                                    <div class="row">
                                        <p><b>TAG：</b>
                                            @foreach($portfolio->tags as $tag)
                                                <span class="badge badge-primary">{{$tag->tag_name}}</span>
                                            @endforeach
                                        </p>
                                    </div>
                                    <div class="row">
                                        <p><b>COMMENT：</b>{{$portfolio->comment}}</p>
                                    </div>
                                    <div class="row">
                                        <p><b>LIKE：</b>{{$portfolio->viaLoveReactant()->getReactionCounterOfType('Like')->count}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" onclick="window.open('{{$portfolio->url}}','_blank')">ページを見る</button>
                                <button type="button" class="btn btn-primary" onclick="location.href='/show/{{$portfolio->user->id}}'">プロフィールを見る</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
