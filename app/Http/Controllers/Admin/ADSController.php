<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdsRequest;
use App\Models\ADS;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ADSController extends Controller
{


    public function AllAds(){

        $ads = ADS::Selection() ->paginate(10);;
        return view('admin.ads.index',compact('ads')) ;
    }
    public function create(){
        return view('admin.ads.create');
    }
    public function show($id){
        $ad = ADS::find($id);
        return view('admin.ads.show',compact('ad'));
    }
    public function store(AdsRequest $request)
    {
        try {

            if (!$request->has('status'))
                $request->request->add(['status' => 0]);
            else
                $request->request->add(['status' => 1]);

            if ($request->has('image') ) {
                $filePath = uploadImage('ads',$request->image);



            $ad = ADS::create([
                'title' => $request->title,
                 'url' => $request->url,
                'status' => $request->status,
                'date_from' => $request->date_from,
                 'image' => $filePath,
                'description' => $request->description,
                'duration' => $request->duration,
                'date_to' => $request->date_to,
                'views'=>0,
                'create_at'=>Carbon::now(),
             ]);

            }

            return redirect()->route('ads.all_ads')->with(['success' => 'New Ad Created Successfully']);

        } catch (\Exception $ex) {
            return redirect()->route('ads.all_ads')->with(['error' => 'Something Went Wrong']);
        }

    }
    public function edit($ad_id)
    {
        //get specific categories and its translations
        $ad = ADS::find($ad_id);

        if (!$ad)
            return redirect()->route('ads.all_ads')->with(['error' => 'This AD Not Found ']);

        return view('admin.ads.edit', compact('ad'));
    }


    public function update($ad_id, AdsRequest $request)
    {
        try {


            $ad = ADS::find($ad_id);

            if (!$ad)
                return redirect()->route('ads.all_ads')->with(['error' => ' This ad Not Found ']);

            if ($request->has('image')) {
                if ($ad->image !== $request->image){

//                     $image = Str::after($ad->image, 'assets/');
//                    $image = public_path('assets/' . $image);
//                    unlink($image); //delete from folder
                    //delete from folder
                    $filePath = uploadImage('ads', $request->image);

                         ADS::where('id', $ad)
                        ->update([
                            'title' => $request->title,
                            'url' => $request->url,
                            'status' => $request->status,
                            'date_from' => $request->date_from,
                             'image' => $filePath,
                            'description' => $request->description,
                            'duration' => $request->duration,
                            'date_to' => $request->date_to,
                             'created_at'=>Carbon::now(),
                        ]);

                }
                else{


                    $filePath = uploadImage('ads', $request->image);
                    ADS::where('id', $ad_id)
                        ->update([
                            'title' => $request->title,
                            'url' => $request->url,
                            'status' => $request->status,
                            'date_from' => $request->date_from,
                             'image' => $filePath,
                            'description' => $request->description,
                            'duration' => $request->duration,
                            'date_to' => $request->date_to,
                             'created_at'=>Carbon::now(),
                            ]);

                }
            }else{
                ADS::where('id', $ad_id)
                    ->update([
                        'title' => $request->title,
                        'url' => $request->url,
                        'status' => $request->status,
                        'date_from' => $request->date_from,
                       'description' => $request->description,
                        'duration' => $request->duration,
                        'date_to' => $request->date_to,
                         'created_at'=>Carbon::now(),
                    ]);
            }


            return redirect()->route('ads.all_ads')->with(['success' => 'Updated Successfully']);
        } catch (\Exception $ex) {
            return redirect()->route('ads.all_ads')->with(['error' => 'Something Went Wrong']);
        }

    }
    public function delete($id)
    {

        try {
            $ad = ADS::find($id);
            if (!$ad)
                return redirect()->route('ads.all_ads')->with(['error' => 'AD DOnt exist anymore ']);



            $image = Str::after($ad->image, 'assets/');
            $image = public_path('assets/' . $image);
            unlink($image); //delete from folder

            $ad->delete();
            return redirect()->route('ads.all_ads')->with(['success'=>'deleted successfully']);

        } catch (\Exception $ex) {
            return redirect()->route('ads.all_ads')->with(['error' => 'Delete Failed']);
        }
    }
    public function ViewCount($id)
    {
             $ad = ADS::find($id);

            $view =  $ad -> views +1  ;

             $ad -> update(['views' =>$view ]);

            return redirect()->to($ad->url);


    }
    public function changeStatus($id)
    {
        try {
            $ad = ADS::find($id);
            if (!$ad)
                return redirect()->route('ads.all_ads')->with(['error' => 'Ad Not Found']);

            $status =  $ad -> status  == 0 ? 1 : 0;

            $ad -> update(['status' =>$status ]);

            return redirect()->route('ads.all_ads')->with(['success' => 'Ad Status Changed Successfully ']);

        } catch (\Exception $ex) {
            return redirect()->route('ads.all_ads')->with(['error' => 'Something Went Wrong']);
        }
    }
    public function getads(){
         $ads = ADS::DateTo()->Active()->take(10)->get();
         return $ads;
    }
}
