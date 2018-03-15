<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Admin;
use App\Tip;
use Image;
use Carbon\Carbon;
use DB;
use App\Department;
use App\Course;
use App\Level;
use App\Classes;
use App\Assigned;
use App\Class_Course;
use App\model\user\User;

class AdminController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth:ad', ['except' => ['index','login','register','reg']]);
    }
  
     public function index(){
        return view('admin.login');
    }
    
    public function register(){
        return view('admin.register');
    }
    
    public function loadCreate(){
        return view('admin.create');
    }
    
    public function reg(Request $request){
      
        $this->validate($request,[
			'email'=>'required|unique:admins',
			'sname'=>'required|alpha',	
			'fname'=>'required|alpha',	
			'password'=>'required|min:6', 			
	    ]); 
        
   

        $admin = new Admin();
		$admin->email=$request['email'];
		$admin->name=$request['sname']." ".$request->fname;
		$admin->password=$request['password'];
        
            if($admin->save()){
					return redirect()->route("admin.login")
			->withInfo('New Admin Account Has Been Created.');
               }
	
    }
        
    public function login(Request $request){
     
          $this->validate($request,[
            'email'=>'required',
            'password'=>'required|min:6',
        ]);
        
        
        if(!Auth::guard('ad')->attempt($request->only(['email', 'password']),$request->has('remember'))){
             return redirect()->back()->withInfo("Error Logging In. Check Email / Password");
                }

        
         return redirect()->route('view_assigned');
    }
    
    
    public function dashboard(){
        
        return view('admin.course');
    }


    public function viewUserDept(){
        $dept = Department::orderBy('name','ASC')->get();
        return view('admin.department',['department'=>$dept]); 
    }


    public function postUserDept(Request $request){
        if($request->ajax()){
            $this->validate($request,[
                'deptname'=>'required',
                'active' => 'required',
            ]);

            $dept = new Department();
            $dept->created = date("Y-m-d") ;
            $dept->name=$request['deptname'];
            $dept->active=$request['active'];
            $dept->save();

            return response('New Department Successfully Created');
        }
    }


    public function updateDept(Request $request){
        if($request->ajax()){
            $this->validate($request,[
                    'id'=>'required',
                ]);

            Department::find($request['id'])->update($request->all());
            return response('Department Update Successful');
        }
    }

    public function viewCourse(){
        $dept = Course::orderBy('name','ASC')->get();
        return view('admin.course',['courses'=>$dept]); 
    }


    public function postCourse(Request $request){
        if($request->ajax()){
            $this->validate($request,[
                'name'=>'required',
                'active' => 'required',
            ]);

            $dept = new Course();
            $dept->created = date("Y-m-d") ;
            $dept->name=$request['name'];
            $dept->active=$request['active'];
            $dept->save();

            return response('New Course Successfully Created');
        }
    }


    public function updateCourse(Request $request){
        if($request->ajax()){
            $this->validate($request,[
                    'id'=>'required',
                ]);

            Course::find($request['id'])->update($request->all());
            return response('Course Update Successful');
        }
    }
    
    
    public function viewLevel(){
        $dept = Level::orderBy('name','ASC')->get();
        return view('admin.level',['levels'=>$dept]); 
    }


    public function postLevel(Request $request){
        if($request->ajax()){
            $this->validate($request,[
                'name'=>'required',
                'active' => 'required',
            ]);

            $dept = new Level();
            $dept->created = date("Y-m-d") ;
            $dept->name=$request['name'];
            $dept->active=$request['active'];
            $dept->save();

            return response('New Level Successfully Created');
        }
    }


    public function updateLevel(Request $request){
        if($request->ajax()){
            $this->validate($request,[
                    'id'=>'required',
                ]);

            Level::find($request['id'])->update($request->all());
            return response('Level Update Successful');
        }
    }
    
    
    public function viewClass(){
        $classes = Classes::get();
        $dept = Department::orderBy('name','ASC')->get();
        $level = Level::orderBy('name','ASC')->get();
        return view('admin.class',['classes'=>$classes,'departments'=>$dept,'levels'=>$level]); 
    }


    public function postClass(Request $request){
        if($request->ajax()){
            $this->validate($request,[
                'department_id'=>'required',
                'level_id' => 'required',
            ]);

            $dept = new Classes();
            $dept->department_id = $request->department_id;
            $dept->level_id=$request->level_id;
            $dept->save();

            return response('New Class has been Successfully Created');
        }
    }


    public function updateClass(Request $request){
        if($request->ajax()){
            $this->validate($request,[
                    'id'=>'required',
                ]);

            Classes::find($request['id'])->update($request->all());
            return response('Class Update Successful');
        }
    }
    

    public function viewStudent(){
        $students = User::where('type','student')->get();
        $dept = Department::orderBy('name','ASC')->get();
        $level = Level::orderBy('name','ASC')->get();
        $classes = Classes::get();
        return view('admin.students',['students'=>$students,'departments'=>$dept,'levels'=>$level,'classes'=>$classes]); 
    }
    

    public function postStudent(Request $request){
        if($request->ajax()){
            $this->validate($request,[
                'fname'=>'required', 
                'sname'=>'required', 
                'password'=>'required', 
                'email'=>'required',
                'class_id'=>'required', 
            ]);

            $dept = new User();
            $dept->fname=$request->fname;
            $dept->sname=$request->sname;
            $dept->password=$request->password;
            $dept->type='student';
            $dept->email=$request->email;
            $dept->class_id=$request->class_id;
            
            $dept->save();

            return response('New Student has been Successfully Created');
        }
    }


    public function updateStudent(Request $request){
        if($request->ajax()){
            $this->validate($request,[
                    'id'=>'required',
                ]);

            User::find($request['id'])->update($request->all());
            return response('Student Profile has been Updated Successful');
        }
    }
    
    public function viewTa(){
        $ta = User::where('type','ta')->get();
        $dept = Department::orderBy('name','ASC')->get();
        $level = Level::orderBy('name','ASC')->get();
        return view('admin.ta',['lecturers'=>$ta,'departments'=>$dept,'levels'=>$level]); 
    }
    

    public function postTa(Request $request){
        if($request->ajax()){
            $this->validate($request,[
                'fname'=>'required', 
                'sname'=>'required', 
                'password'=>'required', 
            ]);

            $dept = new User();
            $dept->fname=$request->fname;
            $dept->sname=$request->sname;
            $dept->password=$request->password;
            $dept->type='ta';
            $dept->email = $request->email;
            $dept->save();

            return response('New Lecturer/Ta have been Successfully Created');
        }
    }


    public function updateTa(Request $request){
        if($request->ajax()){
            $this->validate($request,[
                    'id'=>'required',
            ]);

            User::find($request['id'])->update($request->all());
            return response('Lecturer/TA Profile has been Updated Successful');
        }
    }
    
    public function viewAssigned(){
        $assigned = Assigned::get();
        $dept = Department::orderBy('name','ASC')->get();
        $level = Level::orderBy('name','ASC')->get();
        $class = Classes::get();
        $users = User::where('type','ta')->orderBy('fname','asc')->get();
        $courses = Course::get();
        return view('admin.assigned',['assigned'=>$assigned,'departments'=>$dept,'levels'=>$level,'lecturers'=>$users,
        'courses'=>$courses,'classes'=>$class]); 
    }
    

    public function postAssigned(Request $request){
        if($request->ajax()){
            $this->validate($request,[
                'course_id'=>'required', 
                'class_id'=>'required', 
                'user_id'=>'required', 
            ]);

            $asg = new Assigned();
            $asg->class_id=$request->class_id;
            $asg->course_id=$request->course_id;
            $asg->user_id=$request->user_id;
            $asg->save();

            return response('Course has been Successfully Asigned');
        }
    }


    public function updateAssigned(Request $request){
        if($request->ajax()){
            $this->validate($request,[
                    'id'=>'required',
            ]);

            Assigned::find($request['id'])->update($request->all());
            return response('Assigned Course has been Updated Successfully');
        }
    }


    public function dynamics(Request $request){
        if($request->ajax()){
            $i = $request->i;  
                $classes = Course::get();
        return view('partials.dynamics',['i'=>$i,'classes'=>$classes]);   
        }
    }
    


    public function saveClassCourses(Request $request){
        if($request->ajax()){
            $counter = $request->counter;
           
            if($counter>0){
            
                for($j=1;$j<=$counter;$j++){
                    $c  = new Class_Course();
                    $c->course_id = $request['course'.$j.''];
                    $c->class_id = $request['class_id'];
                    $c->save(); 
                    
                } 
            }
        
           return response('Courses Successfully Saved');
    }
}

//load if there are any
public function vendorServices(Request $request){
    if($request->ajax()){
        $id = $request->id;       
        $class_course = DB::table('class_courses')
        ->join('courses','courses.id','=','class_courses.course_id')
        ->select('courses.name','class_courses.id')
        ->where('class_id',$id)->get();    
    ;    
    
        return view('partials.services',['class_courses'=>$class_course]);   
    }
}
    
   
    
      public function deletePost($id){
        $record =  DB::table('tips')->where('id','=',$id)->first();
         $name = $record->title;
         Tip::find($id)->delete();
        //  unlink(public_path($record->path));
        return redirect()->route('admin.dashboard')->withInfo($name." has been Successfully deleted");  
    }
    
    public function post(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'desc'=>'required',
            'image'=>'required',
        ]);
        
      $name='';
       
        
       if($request->hasFile('image')){
            $avatar = $request->file('image');
            $filename = time().'.'.$avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(400,400)->save(public_path('images/feature/'.$filename));
            $name = 'images/feature/'.$filename;
            } 
        
        
        
        $article = new Tip();
        $article->title = $request->title;
        $article->desc =  htmlentities($request->desc);
        $article->path = $name;
        if($article->save()){
            return redirect()->route('admin.dashboard')->withInfo($request->title." has been Created");   
        }
    }
    
    
    public function logout(){
        Auth::guard('ad')->logout();
        return redirect()->route('home');
    }
    
    
}
