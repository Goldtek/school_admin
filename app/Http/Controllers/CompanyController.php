<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use Auth;
use App\model\company\Company;
use App\model\company\Job;
use App\model\company\Listing;
use App\model\company\JobApplied;
use Carbon\Carbon;
use DB;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;


class CompanyController extends Controller
{
    protected $guard ='admin';
   
     public function __construct()
    {
        $this->middleware('auth:admin', ['except' => ['index','login','register','reg']]);
    }
  
     public function index(){
        return view('company.login');
    }
    
    public function register(){
        return view('company.register');
    }
    
    public function reg(Request $request){
      
          $this->validate($request,[
			'email'=>'required|email|unique:companies',
			'fname'=>'required|alpha',
			'sname'=>'required|alpha', 
			'phone'=>'required', 	
			'password'=>'required|min:6', 	
			'cpassword'=>'required', 	
			'name'=>'required', 	
			'website'=>'required', 
              'industry'=>'required',
				
	]); 
        $name="";
   
         if($request->hasFile('logo')){
             $avatar = $request->file('logo');
           $filename = time().'.'.$avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(100,100)->save(public_path('images/company-logo/'.$filename));
  $name = 'images/company-logo/'.$filename;

   
         }
        

                 $company = new Company();
		$company->email=$request['email'];
		$company->fname=$request['fname'];
		$company->sname=$request['sname'];
		$company->phone=$request['phone'];
		$company->name=$request['name'];
		$company->website=$request['website'];
		$company->password=$request['password'];
		$company->industry=$request['industry'];
		$company->logo=$name;
	
			
             $company->save();
					return redirect()->route("auth.employer.login")
			->withInfo('Your Account Has Been Created.');
            
	
    }
        
    public function login(Request $request){
     
          $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required|min:6',
        ]);
        
        
        if(!Auth::guard('admin')->attempt($request->only(['email', 'password']),$request->has('remember'))){
             return redirect()->back()->withInfo("Error Logging In. Check Email / Password");
                }
    //    return redirect()->intended(route('company.dashboard'));
        
         return redirect()->route('company.dashboard');
    }
    
     public function getDashboard(){
        $industry =DB::table('industry')->get();
        $list =DB::table('listing')->where('company_id','=',Auth::guard('admin')->user()->id)->get()->count();
         $OneWeekAgo = Carbon::today()->subWeek();
         $today = Carbon::today();
         $id = Auth::guard('admin')->user()->id;
  $posted = DB::table('jobs_applied')->where('company_id',$id)->get()->count();
  $followers = DB::table('bookmark')->where('company_id',$id)->get()->count();      
  $resumes = DB::table('resumes')->where('created_at','>=',$OneWeekAgo)->where('created_at','<=',$today)->get()->count();
    
        return view('company.dashboard',['industry'=>$industry,'job_posted'=>$posted,'followers'=>$followers,'resumes'=>$resumes,'list'=>$list]);
      
    }
    
    //load resume
    public function resume(){
        return view('company.resume');
    }
  
    //load edit profile
    public function edit_profile(){
        return view('company.edit_profile');
    }
    
    //update profile record
    public function updateRecord(Request $request,$id){
       
        $this->validate($request,[
			'industry'=>'required',
			'phone'=>'required',
			'noEmployee'=>'required', 
			'lga'=>'required', 	
			'about'=>'required', 	
			'country'=>'required', 	
			'name'=>'required', 	
			'city'=>'required', 
              'address'=>'required',
              'website'=>'required',
    			
	]);
        
        
          Company::find($id)->update($request->all());

        if($request->hasFile('logo')){
             $avatar = $request->file('logo');
           $filename = time().'.'.$avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(100,100)->save(public_path('images/company-logo/'.$filename));
  $name = 'images/company-logo/'.$filename;
            
              unlink(public_path(Auth::guard('admin')->user()->logo));
              $user = Auth::guard('admin')->user();
             $user->logo = $name;
             $user->save();
        }
        
        return redirect()->route("company.dashboard")->withInfo("Your Profile Has been Successfully Updated");
     
        
    }
  
    //load build resume
    public function jobs(){
        $user_id = Auth::guard('admin')->user()->id;
        $jobs = DB::table('jobs')
            ->where(function($query) use($user_id)
            {
                $query->where('company_id' ,'like', $user_id)
                      ->where('enddate','>', Carbon::now());
            })
            
            ->paginate(10); 
        
         $sal =DB::table('salaries')->get();
        return view('company.active_jobs',['jobs'=>$jobs,'salaries'=>$sal]);
    }
  
    //load job applied
    public function followers(){
        $userid = Auth::guard('admin')->user()->id;
      $users = DB::table('users')
              ->WhereExists(function($query) use($userid)
            {
                $query->select(DB::raw('*'))
                    ->from('bookmark')
                      ->whereRaw("bookmark.company_id = '$userid' AND bookmark.user_id =users.id");
            }) ->paginate(20);
        
        return view('company.followers',['users'=>$users]);
    }
  
    //load company
    public function featured(){
        $admin = Auth::guard('admin')->user()->id;
       $job = DB::table('jobs')
            ->where('company_id',$admin)->get();
        return view('company.featured_jobs',['jobs'=>$job]);
    }
    
    public function deleteFeatured($id){
        Job::find($id)->delete();
        return redirect()->route('company.featured')->withInfo("Job successfully deleted");
    
    }
    
        public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('home');
    }
    
    public function getResumes(Request $request){
       if($request->ajax()){
        // DB::enableQueryLog(); 
            $hedu =DB::table('h_educations')->get();
            
        
             if($request->has('search')){
            
          $search = $request->search;
           
           $location = ($request->location)?$request->location:'';
           $salary = ($request->salary)?$request->salary:'';
           $joblevel = ($request->job_level)?$request->job_level:'';
           $spec = ($request->spec)?$request->spec:'';
           $experience = ($request->experience)?$request->experience:'';
        
          $users =  DB::table('users') 
  
                ->where(function($query) use($search)
            {
                $query->where('job', 'like', '%'.$search.'%');
            })
              
              ->orWhere(function($query) use($search)
            {
                $query->where('experience', 'like', '%'.$search.'%');
            })

                ->orWhere(function($query) use($search)
            {
                $query->where('city', 'like', '%'.$search.'%');
            })
             
                ->orWhereExists(function($query) use($search)
            {
                $query->select(DB::raw('*'))
                    ->from('skills')
                      ->whereRaw("skills.user_id = users.id AND skills.name like '%$search%'");
            })
            ->orWhereExists(function($query) use($search)
            {
                $query->select(DB::raw('*'))
                      ->from('h_educations')
                      ->whereRaw("users.hedu = h_educations.id and h_educations.name like '%$search%'");
            })
             ->orWhereExists(function($query)  use($search)
            {
                $query->select(DB::raw('*'))
                      ->from('salaries')
                      ->whereRaw("users.salary=salaries.id and salaries.name like '%$search%'");
            })
           ->orWhereExists(function($query)  use($search)
            {
                $query->select(DB::raw('*'))
                      ->from('industry')
                      ->whereRaw("users.industry=industry.id and industry.name like '%$search%'");
            })
           
           ->orWhereExists(function($query)  use($search)
            {
                $query->select(DB::raw('*'))
                      ->from('job_levels')
                      ->whereRaw("users.joblevel=job_levels.id and job_levels.name like '%$search%'");
            })
              
               ->paginate(20);
                    //performing filter from search made above 
                 if(!empty($location)){
                        $users =  $users->where('city',$location);
                       $users =  $this->paginate($users);
                 }
                     
                     if(!empty($joblevel)){
                     $users = $users->where('joblevel',$joblevel);
                         $users =  $this->paginate($users); 
                 } 
                     if(!empty($spec)){
                     $users = $users->where('industry',$spec);
                         $users =  $this->paginate($users); 
                 } 
                     if(!empty($salary)){
                     $users = $users->where('salary',$salary);
                        $users =  $this->paginate($users);  
                 }
                 
                 if(!empty($experience)){
                  
                     if($experience==1){
                         //perform filter where 1-3
                         $users = $users->whereIn('experience', [1,2,3]);
                         
                        $users =  $this->paginate($users);
                     }elseif($experience==3){
                          //perform filter where 3-5
                          $users = $users->whereIn('experience', [3,4, 5]);
                          $users =  $this->paginate($users);
                     }elseif($experience==5){
                          //perform filter where 5-7
                        $users = $users->whereIn('experience', [5,6,7]); 
                          $users =  $this->paginate($users);
                     }elseif($experience==7){
                          //perform filter where 7-10
                         $users = $users->whereIn('experience', [7,8,9,10]);
                         $users =  $this->paginate($users); 
                     }elseif($experience==10){
                          //perform filter where 10-15
                         $users = $users->whereIn('experience', [10,11,12,13,14,15]);
                         $users =  $this->paginate($users); 
                     }elseif($experience==15){
                          //perform filter where 15 and above
                          $users = $users->whereIn('experience', [15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50]);
                          $users =  $this->paginate($users);
                     }
                     
          //paginate user
                     
                 }
                  
                
             }

     //   dd(DB::getQueryLog());
   
	  return view('company.search',['users'=>$users,'hedu'=>$hedu]);
           //make sure to paginate results
      
        }
       
          
    }
    
    public function paginate($items, $perPage = 15, $page = null, $options = ['search'])
{
    $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
    $items = $items ? $items : Collection::make($items);
  $paginator = new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
   
    return $paginator;
}
    
    public function showPost(){
        return view('company.post');
    }
    
   public function postjob(Request $request){
        if($request->ajax()){
            $this->validate($request,[
              'industry'=>'required',  
              'experience'=>'required',  
              'location'=>'required',  
              'jobtype'=>'required',  
              'salary'=>'required',  
              'tag'=>'required',  
              'detail'=>'required',  
              'userid'=>'required',  
              'enddate'=>'required',  
              'vacany'=>'required',  
                     'res'=>'required',  
              'req'=>'required',  
              'joblevel'=>'required', 
            ]);
            
        
             $i =  implode(" ",$request->industry);
                 
           
 
            
           $job = new Job();
          $job->category = $i;
          $job->title = $request->title;
     $job->jobExperience= $request->experience;
     $job->location= $request->location;
     $job->jobType= $request->jobtype;
     $job->salary= $request->salary;
      $job->tags= $request->tag;
   $job->jobDetails= $request->detail;
     $job->company_id= $request->userid;
    $job->enddate= date('Y-m-d H:i:s',strtotime($request->enddate));
    $job->noVacany= $request->vacany;
   $job->responsibility= $request->res;
    $job->requirement= $request->req;
    $job->joblevel= $request->joblevel;
             if($job->save()){
           return response("Your Job has been posted");
       } 
        }
       
      
       
   }
        
    public function seekersResume(){
        $user = Auth::guard('admin')->user()->id;
         $resumes =DB::table('jobs_applied')->where('company_id','=',$user)->paginate(10);
         $users =DB::table('users')->get();
         $jobs =DB::table('jobs')->get();

        return view('company.clientResume',['users'=>$users,'resumes'=>$resumes,'jobs'=>$jobs]);
    }    
 
    
        public function deleteJob($id){
         $res = DB::table("jobs_applied")->where('id',$id)->first(); 
        //delete the file
       // unlink(public_path($res->cv));
         
        //delete the record
       JobApplied::find($id)->delete();
        return redirect()->route('company.dashboard')->withInfo("Job Application successfully deleted");
    
    }
   
    
     public function getmodal(Request $request){
         if($request->ajax()){
             if(!empty($request->m)){
        $id = $request->m;
             $User =DB::table('users')->where('id', $id)->first();
       // $exp = Experience::where('user_id',$id)->first();
         $exp =DB::table('experiences')->where('user_id', $id)->get();
         $edu =DB::table('education')->where('user_id', $id)->get();
        $skill =DB::table('skills')->where('user_id', $id)->get();
         $industry =DB::table('industry')->get();
         $sal =DB::table('salaries')->get();
         $jbl =DB::table('job_levels')->get();
         $hedu =DB::table('h_educations')->get();
           
     
        return view('company.modal',['User'=>$User,'experiences'=>$exp,'education'=>$edu,'skills'=>$skill,'industry'=>$industry,'salaries'=>$sal,'joblevel'=>$jbl,'highEdu'=>$hedu]);
         }
            }
    }
    
    public function shortlist(Request $request){
        if($request->ajax()){
             if(!empty($request->id)){
                 
             $user = Db::table('users')->where('id','=',$request->id)->first();    
                 $name = $user->sname." ".$user->fname;
        $exist = DB::table('listing')
    ->where('user_id', '=', $request->id)
    ->where('company_id', '=', Auth::guard('admin')->user()->id)
    ->first();

        if (!is_null($exist)) {
        return response("You Have Shortlisted ".$name." before!");
        }else{

              $id = $request->id;
                
              $company = Auth::guard('admin')->user()->id;
                 
                 $list = new Listing();
                 $list->user_id=$id;
                 $list->company_id = $company;
                 if($list->save()){
                   return response($name." has been shortlisted");   
                 }
               
}
                 
             }
        }
    }
    
    
       public function showShortlist(){
        $user = Auth::guard('admin')->user()->id;
           
        $shortlist =DB::table('listing')->where('company_id', '=', Auth::guard('admin')->user()->id)->paginate(10);
        
        $users =DB::table('users')->get();
       

        return view('company.shortlist',['users'=>$users,'list'=>$shortlist]);
    }
    
    public function deleteUser($id){
         Listing::find($id)->delete();
      return redirect()->route('company.dashboard')->withInfo("Shortlised User has been deleted");  
    }
    
}
