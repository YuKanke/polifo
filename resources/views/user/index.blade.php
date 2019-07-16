@extends('layouts.app')

@section('content')
<div class="outer-container">
    <div class="container portfolio-page">
        <div class="row">
            <div class="col">
                <ul class="breadcrumbs flex align-items-center">
                    <li><a href="home">Home</a></li>
                    <li>MyPage</li>
                </ul><!-- .breadcrumbs -->
            </div><!-- .col -->
        </div><!-- .row -->

        <div class="row">
            <div class="col-12">
                <div class="jumbotron">
                    <form action="update" class="comment-form">
                        <div class="row">
                            <div class="offset-2 col-6">
                                <label for="name">ユーザ名</label>
                                <input type="text" name="name" id="name" value="{{ $user->name }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="offset-2 col-6">
                                <label for="url">ポートフォリオURL</label>
                                <input type="text" name="url" id="url" value="@if($user->Portfolio) $user->Portfolio->url @endif">
                            </div>
                            <div class="col-1 comment-form">
                                <input type="submit" value="サムネイル取得">
                            </div>
                        </div>
                        <div class="row">
                            <div class="offset-2 col-6">
                                <label for="image">イメージ画像</label>
                                <img id="image" src="@if($user->Portfolio) asset($user->Portfolio->image) @else {{asset('images/logo.png')}} @endif">
                                <input type="hidden" name="image" value="">
                                <!--
                                <input type="text" name="image" id="image" value="@if($user->Portfolio) $user->Portfolio->image @endif">
                                -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="offset-2 col-6">
                                <h4>タグ</h4>
                                <!--
                                    このへんはjsとかでこねくりまわす
                                -->
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
@endsection
