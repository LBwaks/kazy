<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Mail;
use App\Job;
use Carbon\Carbon;
use App\Mail\ContactForm;
use illuminate\Database\Eloquent\Support\Collection;
class PageController extends Controller
{
public function contact(){
    return view('contact');
}

public function about(){
    return view('about');
}
public function faq(){
    return view('FAQ');
}
public function sendContact(Request $request)
{

    $this->validate($request,[
        'name'=>'required',
        'email'=>'required|email',
        'subject'=>'required|min:3',
        'message'=>'required|min:10'
    ]);
    Mail::to('admin@admin.com')->send(new ContactForm($request));
}
 public function search(Request $request){
    $this->validate($request,[

        'query'=>'required|min:3',

    ]);
     $query = $request->input('query');
     $jobs = Job::search($query)->query(function($builder){
         $builder->with('user');
     })->paginate(10);
     $user = User::search($query)->paginate(10);

     return view('search',compact('jobs'));
 }
 public function find(Request $request)
 {
     $title = $request ->title;
     $category = $request ->category;

     $location = $request ->location;

    //  dd($location,$title,$category);
    //  $jobs =Job::with('categories')->where('title','LIKE', '%'.$title.'%')->when(request()->category,function($query){
    //      $query->where('category',request()->category);
    //  })
    //  ->when(request()->location,function($query){
    //     $query->where('location',request() ->location,'LIKE',"%".request() ->location.'%');
    //  })

    $jobs =Job::
    where([['application_id',null],['due','>',Carbon::now()]])->
    // whereHas('categories', function ($query) use($category) {
    //     $query->where('id', $category);
    // })->
    // where(['application_id','!=',null])->
    when($request->title, function($query) use ($request){
        $query->where('title', 'like','%'.$request->title.'%')
        // ->where(['application_id','!=',null])
        ;
    })
    ->when($request->location, function($query) use ($request){
        $query->where('location', 'like','%'. $request->location.'%');
    })
    -> whereHas('categories', function ($query) use($category) {
            $query->where('id', $category);
        })

     ->paginate(2)->appends(request()->query());
    //  dd($jobs);
     return view('search',compact('jobs'));

 }

}
// School::where(function($q) use($studentId) {
//     $q->where('class_name', 'like', '%,' . $studentId . ',%')
//     $q->orWhere('class_name', 'like', $studentId . ',%')
//     $q->orWhere('class_name', 'like', '%,' . $studentId)
// })
// ->where($matchThese)->get();

// public function search()
// {
//     $searchTitle = request('title');
//     $searchCategory = request('category');
//     $searchLocation = request('location');

//     $ads = null;

//     if($searchTitle || $searchCategory || $searchLocation) {
//         $ads = Ad::when($searchTitle, function ($query) use ($searchTitle) {
//                 return $query->where('title', 'like', "%{$searchTitle}%")
//                     ->orWhere('description', 'like', "%{$searchTitle}%");
//             })
//             ->when($searchCategory, function ($query) use ($searchCategory) {
//                 return $query->whereHas('category', function ($query) use ($searchCategory) {
//                     $query->where('id', $searchCategory);
//                 });
//             })
//             ->when($searchLocation, function ($query) use ($searchLocation) {
//                 return $query->whereHas('location', function ($query) use ($searchLocation) {
//                     $query->where('id', $searchLocation);
//                 });
//             })
//             ->paginate(2)
//             ->appends(request()->query());
//     }

//     return view('search-result', compact('ads'));
// }



// $categoryId = 1;

// $products = Product::whereHas('categories', function ($query) use($categoryId) {
//     $query->where('id', $categoryId);
// })->get();
