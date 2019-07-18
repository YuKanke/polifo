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

        <div class="row">
            <div class="col-12">
                <div class="jumbotron">
                    <form action="update" class="comment-form">
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

                        <div class="row" style="margin-top:5%">
                            <div class="offset-1 col-11">
                                <h5>ポートフォリオURL</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="offset-md-2 col-12 col-md-6">
                                <input type="text" name="url" id="url" value="@if($user->portfolio) {{$user->Portfolio->url}} @endif">
                            </div>
                            <div class="offset-4 col-8 col-md-4">
                                <button type="button" id="getImage" class="comment-form">イメージ取得</button>
                            </div>
                        </div>

                        <div class="row" style="margin-top:5%">
                            <div class="offset-1 col-11">
                                <h5>イメージ画像</h5>
                            </div>
                        </div>
                        <div class="row">
                            @if($user->portfolio && $user->portfolio->image)
                                <div class="offset-md-2 col-12 col-md-8">
                                    <img id="image" src="{{asset($user->portfolio->image)}}" class="img-fluid center-block">
                                </div>
                            @else
                                <div class="offset-md-2 col-12 col-md-6">
                                    <p>ポートフォリオURLを入力後、「イメージ取得」ボタンを押すと自動でページの画像が取得されます。</p>
                                </div>
                            @endif
                            <input type="hidden" name="image" value="">
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
                            <div class="offset-md-2 col-12 col-md-6">
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

<script>
    $(function(){
        $('#getImage').click(function(){

            var portfolio_url = $('#url').val();
            $.ajax({
                url: 'https://s.wordpress.com/mshots/v1/' + portfolio_url,
                type: "GET",
                success: function(){
                    $()
                }
            })
            
            alert('aaa');
        });
    });
</script>

@endsection
