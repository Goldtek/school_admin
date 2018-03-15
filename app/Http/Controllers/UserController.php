<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use Auth;
use App\model\user\User;
use App\model\user\Experience;
use App\model\user\Education;
use App\model\user\Freelancer;
use App\model\user\Skill;
use App\model\user\Resume;
use App\model\user\JobApplied;
use App\model\user\FreelanceApplied;
use App\model\user\Bookmark;
use App\model\user\Jobtype;
use App\model\user\Tip;
use Carbon\Carbon;
use DB;
use File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use App\Material;
use App\Assignment;
use App\Answer;

class UserController extends Controller
{
      
    
    public function index(){
        return view('user.login');
    }  
   
    
    
    public function login(Request $request){
     
          $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required|min:6',
        ]);
        
        
        if(!Auth::attempt($request->only(['email', 'password']),$request->has('remember'))){
             return redirect()->route('auth.user.login')->withInfo("Error Logging In. Check Email / Password");
                }
              
  
          return redirect()->route('courses');
    }
    
    

    //display dashboard for a specific course
    public function getCourse($class_id,$course_id){  
        if(Auth::user()->type=='student'){
                //join classes to class_courses,department,level and courses to get i) department ii) Level iii)Course Name
                $course_details = DB::table('classes')
                ->join('class_courses','class_courses.class_id','=','classes.id')
                ->join('departments','departments.id','=','classes.department_id')
                ->join('levels','levels.id','=','classes.level_id')
                ->select('departments.name as department','levels.name as level')
                ->where('class_courses.course_id',$class_id)
                ->first();
       
            }elseif(Auth::user()->type=='ta'){
            //join assinged courses to courses,department,level and classes to be able to fetch the req 
            $course_details = DB::table('classes')
                                ->join('assigned_courses','assigned_courses.class_id','=','classes.id')            
                                ->join('departments','departments.id','=','classes.department_id')
                                ->join('levels','levels.id','=','classes.level_id')
                                ->select('departments.name as department','levels.name as level')
                                ->where('assigned_courses.course_id',$class_id)
                                ->first();
        }
       $course = DB::table('courses')->where('id',$course_id)->first();

       $materials = Material::where('class_id',$class_id)->where('course_id',$course_id)->get();
       $assignments = Assignment::where('class_id',$class_id)->where('course_id',$course_id)->get();
       $answers = Answer::where('class_id',$class_id)->where('course_id',$course_id)->get();

        return view('user.dashboard',['class_id'=>$class_id,'course_id'=>$course_id,'course_details'=>$course_details,
        'course'=>$course,'answers'=>$answers,'assignments'=>$assignments,'materials'=>$materials]);
    }

     //display courses
     public function loadCourses(){
        $type = Auth::user()->type;
      
        if($type=='student'){
           $class_id = Auth::user()->class_id;
          $courses =  DB::table('class_courses')
          ->join('courses','courses.id','=','class_courses.course_id')
          ->select('courses.name','class_courses.class_id','class_courses.course_id')
          ->where('class_courses.class_id',$class_id)->get();              
        }elseif($type=='ta'){
            //get courses lecturer is assigned to
            $courses = DB::table('assigned_courses')
            ->join('courses','courses.id','=','assigned_courses.course_id')
            ->select('courses.name','assigned_courses.class_id','assigned_courses.course_id')
            ->where('assigned_courses.user_id',Auth::user()->id)->get();
        }
      
        return view('user.courses',['courses'=>$courses]);
    }


    public function uploadMaterial(Request $request){ 
     
        
        if($request->hasFile('file')){
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $upload = $file->move( base_path() . '/public/material', $filename);
             //   $upload = $file->move('./public/projects', $request->file_name);
            $name = '/material/'.$filename;
           // $name = '/public/material/'.$request->filename;
        
            //save file details to the database
             $upload = new Material();
             $upload->filename = $request->file_name;
             $upload->path = $name;
             $upload->filename = $request->filename;
             $upload->class_id = $request->class_id;
             $upload->course_id = $request->course_id;
             $upload->created_at = Carbon::now();
             $upload->save(); 
        }
        
        return redirect()->back(); 
    }


    public function uploadAssignment(Request $request){ 

        if($request->hasFile('file')){
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $upload = $file->move( base_path() . '/public/assignment', $filename);
             //   $upload = $file->move('./public/projects', $request->file_name);
            $name = '/assignment/'.$filename;
           // $name = '/public/material/'.$request->filename;
        
            //save file details to the database
             $upload = new Assignment();
             $upload->filename = $request->file_name;
             $upload->path = $name;
             $upload->filename = $request->filename;
             $upload->class_id = $request->class_id;
             $upload->submissionDate=date('Y-m-d',strtotime($request->submission));
             $upload->course_id = $request->course_id;
             $upload->created_at = Carbon::now();
             $upload->save(); 
        }
        
        return redirect()->back(); 
    }


    public function uploadAnswer(Request $request){ 

        if($request->hasFile('file')){
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $upload = $file->move( base_path() . '/public/answer', $filename);
             //   $upload = $file->move('./public/projects', $request->file_name);
            $name = '/answer/'.$filename;
           // $name = '/public/material/'.$request->filename;
        
            //save file details to the database
             $upload = new Answer();
             $upload->path = $name;
             $upload->user_id = Auth::user()->id;
             $upload->class_id = $request->class_id;
             $upload->course_id = $request->course_id;
             $upload->save(); 
        }
        
        return redirect()->back(); 
    }
   
   
    
    public function UpdatePix(Request $request){

        $this->validate($request,[
            'image'=>'required'
        ]);
        
         if($request->hasFile('image')){
             $avatar = $request->file('image');
           $filename = time().'.'.$avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(400,400)->save(public_path('images/users/'.$filename));
            $name = 'images/users/'.$filename;
             
             if(Auth::user()->image=='images/users/default.png'){
                 //dont delete
             }else{
              unlink(public_path(Auth::user()->image));
             }
             $user = Auth::user();
             $user->image = $name;
             $user->save();
             return redirect()->route('user.dashboard')->withInfo("Profile Picture Successfully Updated");;
         }
    }
    
    
  
    //load company
    public function company(){
        $userid = Auth::user()->id;
        //    DB::enableQueryLog(); 
        $companies = DB::table('companies')
              ->WhereExists(function($query) use($userid)
            {
                $query->select(DB::raw('*'))
                    ->from('bookmark')
                      ->whereRaw("bookmark.user_id = '$userid' AND bookmark.company_id =companies.id");
            }) ->paginate(4);
        
    

      //dd(DB::getQueryLog());
        //dd($companies);
        return view('user.followed_company',['companies'=>$companies]);
    }
    
  
      public function logOut(){
        Auth::guard('web')->logout();
        return redirect()->route('home');
    }
  
    


    
}
