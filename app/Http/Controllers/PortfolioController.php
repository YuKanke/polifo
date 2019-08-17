<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Portfolio;
use App\User;
use Illuminate\Support\Facades\Input; 

class PortfolioController extends Controller
{
    public function getImage(request $request){
        
        $baseUrl = "https://s.wordpress.com/mshots/v1/";
        $fileDir = "images/";
        $imageName = $fileDir . Auth::id() . '_image.png';
        
        $ctx = stream_context_create(array(
            'http' => array(
                'method' => 'GET',
                'header' => 'User-Agent: Mozilla/5.0 (Windows NT 6.3; WOW64; Trident/7.0; Touch; rv:11.0) like Gecko')
            )
        );

        $image = file_get_contents($baseUrl . $request->url . "?w=960&h=960", false, $ctx);
        file_put_contents($imageName, $image);
        
        return json_encode(config('app.url') . "/" . $imageName);
    }

    public function list(){
        $query = Portfolio::query();
        
        $job = Input::get('job');
        $skill = Input::get('skill');
        $free = Input::get('free');

        if(! empty($job) or ! empty($skill) or ! empty($free)){
            if(! empty($job)){
                $query->whereHas('tags', function ($query_tmp)use($job){  
                    $query_tmp->whereIn('tags.id', $job);
                });
                //$query->whereIn('tag', $job);
            }
            if(! empty($skill)){
                $query->whereHas('tags', function ($query_tmp)use($skill){  
                    $query_tmp->whereIn('tags.id', $skill);
                });
                //$query->whereIn('tag', $skill);
            }
            if(! empty($free)){
                $query->where('comment', 'like', '%' . $free . '%');
            }

            $portfolios = $query->get();
        }else{
            $portfolios = Portfolio::get();
        }

        $tags = \App\Tag::get();
        return view("list", compact("portfolios", "tags", "job", "skill", "free"));
    }

    public function update(request $request){
        $user = User::find(Auth::id());
        $portfolio = Portfolio::firstOrNew(['user_id' => $user->id]);
        
        $user->name = $request->name;
        $portfolio->url = $request->url;
        $portfolio->image = $request->image;
        $portfolio->name = $request->portfolio_name;
        $portfolio->tags()->sync($request->tag);

        $user->save();
        $portfolio->save();

        $message = "更新が完了しました。";
        return redirect("/setting")->with("message", $message);
    }
}
