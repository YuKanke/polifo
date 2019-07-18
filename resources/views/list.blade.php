@extends('layouts.app')

@section('content')
<div class="outer-container">
    <div class="container portfolio-page">
        <div class="row">
            <div class="col">
                <ul class="breadcrumbs flex align-items-center">
                    <li><a href="#">Home</a></li>
                    <li>Portfolio</li>
                </ul><!-- .breadcrumbs -->
            </div><!-- .col -->
        </div><!-- .row -->

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
                                <button type="button" class="btn btn-primary">プロフィールを見る</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="col-12 col-md-6 col-lg-3">
                <div class="portfolio-content">
                    <figure>
                        <img src="images/2.jpg" alt="">
                    </figure>

                    <div class="entry-content flex flex-column align-items-center justify-content-center">
                        <h3><a href="#">Flower Skin</a></h3>

                        <ul class="flex flex-wrap justify-content-center">
                            <li><a href="#">Portfolio,</a></li>
                            <li><a href="#">Tree</a></li>
                        </ul>
                    </div><!-- .entry-content -->
                </div><!-- .portfolio-content -->
            </div><!-- .col -->

            <div class="col-12 col-md-6 col-lg-3">
                <div class="portfolio-content">
                    <figure>
                        <img src="images/3.jpg" alt="">
                    </figure>

                    <div class="entry-content flex flex-column align-items-center justify-content-center">
                        <h3><a href="#">Flower Skin</a></h3>

                        <ul class="flex flex-wrap justify-content-center">
                            <li><a href="#">Portfolio,</a></li>
                            <li><a href="#">Tree</a></li>
                        </ul>
                    </div><!-- .entry-content -->
                </div><!-- .portfolio-content -->
            </div><!-- .col -->

            <div class="col-12 col-md-6 col-lg-3">
                <div class="portfolio-content">
                    <figure>
                        <img src="images/4.jpg" alt="">
                    </figure>

                    <div class="entry-content flex flex-column align-items-center justify-content-center">
                        <h3><a href="#">Flower Skin</a></h3>

                        <ul class="flex flex-wrap justify-content-center">
                            <li><a href="#">Portfolio,</a></li>
                            <li><a href="#">Tree</a></li>
                        </ul>
                    </div><!-- .entry-content -->
                </div><!-- .portfolio-content -->
            </div><!-- .col -->

            <div class="col-12 col-md-6 col-lg-3">
                <div class="portfolio-content">
                    <figure>
                        <img src="images/5.jpg" alt="">
                    </figure>

                    <div class="entry-content flex flex-column align-items-center justify-content-center">
                        <h3><a href="#">Flower Skin</a></h3>

                        <ul class="flex flex-wrap justify-content-center">
                            <li><a href="#">Portfolio,</a></li>
                            <li><a href="#">Tree</a></li>
                        </ul>
                    </div><!-- .entry-content -->
                </div><!-- .portfolio-content -->
            </div><!-- .col -->

            <div class="col-12 col-md-6 col-lg-3">
                <div class="portfolio-content">
                    <figure>
                        <img src="images/6.jpg" alt="">
                    </figure>

                    <div class="entry-content flex flex-column align-items-center justify-content-center">
                        <h3><a href="#">Flower Skin</a></h3>

                        <ul class="flex flex-wrap justify-content-center">
                            <li><a href="#">Portfolio,</a></li>
                            <li><a href="#">Tree</a></li>
                        </ul>
                    </div><!-- .entry-content -->
                </div><!-- .portfolio-content -->
            </div><!-- .col -->

            <div class="col-12 col-md-6 col-lg-3">
                <div class="portfolio-content">
                    <figure>
                        <img src="images/7.jpg" alt="">
                    </figure>

                    <div class="entry-content flex flex-column align-items-center justify-content-center">
                        <h3><a href="#">Flower Skin</a></h3>

                        <ul class="flex flex-wrap justify-content-center">
                            <li><a href="#">Portfolio,</a></li>
                            <li><a href="#">Tree</a></li>
                        </ul>
                    </div><!-- .entry-content -->
                </div><!-- .portfolio-content -->
            </div><!-- .col -->

            <div class="col-12 col-md-6 col-lg-3">
                <div class="portfolio-content">
                    <figure>
                        <img src="images/8.jpg" alt="">
                    </figure>

                    <div class="entry-content flex flex-column align-items-center justify-content-center">
                        <h3><a href="#">Flower Skin</a></h3>

                        <ul class="flex flex-wrap justify-content-center">
                            <li><a href="#">Portfolio,</a></li>
                            <li><a href="#">Tree</a></li>
                        </ul>
                    </div><!-- .entry-content -->
                </div><!-- .portfolio-content -->
            </div><!-- .col -->
        </div><!-- .row -->


    </div><!-- .container -->
</div><!-- .outer-container -->
@endsection
