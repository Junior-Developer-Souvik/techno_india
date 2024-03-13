<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\CategoryInterface;
use App\Exports\LeadsExport;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Support\Facades\Hash;
use App\Models\ContentAbout;
use App\Models\ContentHome;
use App\Models\Content_extracurricular;
use App\Models\ContentEpc;
use App\Models\SubAcademics;
use App\Models\Choose_us;
use App\Models\Galary;
use App\Models\SocialMedia;
use App\Models\Inner;
use App\Models\ContactUs;
use App\Models\ContentAcademics;
use App\Models\ContentContact;
use App\Models\Setting;
use App\Models\Lead;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ContentController extends Controller
{
    // public function __construct(){
    //     header('Access-Control-Allow-Origin:*');
    //     header('Access-Control-Allow-Headers:Content-Type, X-Auth-Token, Authorization, Origin');
    //     header('Access-Control-Allow-Methods:POST,PUT,GET');
    //          //header('Access-Control-Max-Age: 86400');
    //      }

    public function home(Request $request)
    {
        $data = ContentHome::first();
        return view('admin.content.home', compact('data'));
    }
    public function epc(Request $request)
    {
        $data = ContentEpc::first();
        return view('admin.content.epc', compact('data'));
    }
    public function leads(Request $request)
    {
        $data = Lead::latest()->get();
        return view('admin.content.leads', compact('data'));
    }
    public function careers(Request $request)
    {
        $data = DB::table('careers')->get();
        return view('admin.content.careers', compact('data'));
    }
    public function about(Request $request)
    {
        $data = ContentAbout::first();
        return view('admin.content.about', compact('data'));
    }

    public function contact(Request $request)
    {
        $data = ContentContact::first();
        return view('admin.content.contact', compact('data'));
    }

    public function settings(Request $request)
    {
        $data = Setting::get();
        return view('admin.content.settings', compact('data'));
    }

    
    public function homeUpdate(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'id' => 'required|integer|min:1',
            'title1' => 'required|string|max:255',
            'title1_image' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif,svg|max:1000',
            'title1_author' => 'required|string|max:255',
            'title1_video' => 'required|string|max:255',
            'title1_author_designation' => 'required|string|max:255',
            'title1_desc' => 'required|string|max:1000',

            'why_choose_us_title' => 'required|string|max:255',
            'why_choose_us_image' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif,svg|max:1000',

            'why_choose_us_section1_title' => 'required|string|max:255',
            'why_choose_us_section1_image' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif,svg|max:1000',
            'why_choose_us_section1_desc' => 'required|string|max:1000',

            'why_choose_us_section2_title' => 'required|string|max:255',
            'why_choose_us_section2_image' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif,svg|max:1000',
            'why_choose_us_section2_desc' => 'required|string|max:1000',

            'why_choose_us_section3_title' => 'required|string|max:255',
            'why_choose_us_section3_image' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif,svg|max:1000',
            'why_choose_us_section3_desc' => 'required|string|max:1000',

            'why_choose_us_section4_title' => 'required|string|max:255',
            'why_choose_us_section4_image' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif,svg|max:1000',
            'why_choose_us_section4_desc' => 'required|string|max:1000',

            'project_completed' => 'required|string|max:255',
            'happy_customer' => 'required|string|max:255',
            'solar_panels' => 'required|string|max:255',
            'distributors' => 'required|string|max:255',
        ], [
            'title1_image.max' => 'The image must not be greater than 1MB.',
            'why_choose_us_image.max' => 'The image must not be greater than 1MB.',
            'why_choose_us_section1_image.max' => 'The image must not be greater than 1MB.',
            'why_choose_us_section2_image.max' => 'The image must not be greater than 1MB.',
            'why_choose_us_section3_image.max' => 'The image must not be greater than 1MB.',
            'why_choose_us_section4_image.max' => 'The image must not be greater than 1MB.',
        ]);

        $data = ContentHome::first();
        $data->title1 = $request->title1;
        $data->title1_desc = $request->title1_desc;
        $data->title1_author = $request->title1_author;
        $data->title1_video = $request->title1_video;
        $data->title1_author_designation = $request->title1_author_designation;

        $data->why_choose_us_title = $request->why_choose_us_title;
        $data->why_choose_us_section1_title = $request->why_choose_us_section1_title;
        $data->why_choose_us_section1_desc = $request->why_choose_us_section1_desc;

        $data->why_choose_us_section2_title = $request->why_choose_us_section2_title;
        $data->why_choose_us_section2_desc = $request->why_choose_us_section2_desc;

        $data->why_choose_us_section3_title = $request->why_choose_us_section3_title;
        $data->why_choose_us_section3_desc = $request->why_choose_us_section3_desc;

        $data->why_choose_us_section4_title = $request->why_choose_us_section4_title;
        $data->why_choose_us_section4_desc = $request->why_choose_us_section4_desc;

        $data->project_completed = $request->project_completed;
        $data->happy_customer = $request->happy_customer;
        $data->solar_panels = $request->solar_panels;
        $data->distributors = $request->distributors;

        // image upload
        if (isset($request->title1_image)) {
            $fileUpload1 = fileUpload($request->title1_image, 'home-page');
            $data->title1_image = $fileUpload1['file'][2];
        }
        // image upload
        if (isset($request->why_choose_us_image)) {
            $fileUpload2 = fileUpload($request->why_choose_us_image, 'home-page');
            $data->why_choose_us_image = $fileUpload2['file'][2];
        }
        // image upload
        if (isset($request->why_choose_us_section1_image)) {
            $fileUpload3 = fileUpload($request->why_choose_us_section1_image, 'home-page');
            $data->why_choose_us_section1_image = $fileUpload3['file'][2];
        }
        // image upload
        if (isset($request->why_choose_us_section2_image)) {
            $fileUpload4 = fileUpload($request->why_choose_us_section2_image, 'home-page');
            $data->why_choose_us_section2_image = $fileUpload4['file'][2];
        }
        // image upload
        if (isset($request->why_choose_us_section3_image)) {
            $fileUpload5 = fileUpload($request->why_choose_us_section3_image, 'home-page');
            $data->why_choose_us_section3_image = $fileUpload5['file'][2];
        }
        // image upload
        if (isset($request->why_choose_us_section4_image)) {
            $fileUpload6 = fileUpload($request->why_choose_us_section4_image, 'home-page');
            $data->why_choose_us_section4_image = $fileUpload6['file'][2];
        }
        
        $data->save();

        return redirect()->back()->with('success', 'Content updated');
    }
    public function epcUpdate(Request $request){
        // dd($request->all());
        $request->validate([
            'id' => 'required|integer|min:1',
            'point1_title' => 'required|string|max:255',
            'section1_title' => 'required|string|max:255',
            'section1_desc' => 'required|string',
            'section1_image' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif,svg|max:3000',
            
            'point2_title' => 'required|string|max:255',
            'section2_title' => 'required|string|max:255',
            'section2_desc' => 'required|string',
            'section2_image' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif,svg|max:3000',
            
            'section3_title' => 'required|string|max:255',
            'section3_desc' => 'required|string',
            'section3_image' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif,svg|max:3000',

            'section4_title' => 'required|string|max:255',
            'section4_desc' => 'required|string',
            'section4_image' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif,svg|max:3000',

            'section5_title' => 'required|string|max:255',
            'section5_desc' => 'required|string',
            'section5_image1' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif,svg|max:3000',
            'section5_image2' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif,svg|max:3000',

        ], [
            'section1_image.max' => 'The image must not be greater than 3MB.',
            'section2_image.max' => 'The image must not be greater than 3MB.',
            'section3_image.max' => 'The image must not be greater than 3MB.',
            'section4_image.max' => 'The image must not be greater than 3MB.',
            'section5_image1.max' => 'The image must not be greater than 3MB.',
            'section5_image2.max' => 'The image must not be greater than 3MB.',
        ]);

        $data = ContentEpc::first();
        $data->point1_title = $request->point1_title;
        $data->section1_title = $request->section1_title;
        $data->section1_desc = $request->section1_desc;
        $data->point2_title = $request->point2_title;
        $data->section2_title = $request->section2_title;
        $data->section2_desc = $request->section2_desc;
        $data->section3_title = $request->section3_title;
        $data->section3_desc = $request->section3_desc;
        $data->section4_title = $request->section4_title;
        $data->section4_desc = $request->section4_desc;
        $data->section5_title = $request->section5_title;
        $data->section5_desc = $request->section5_desc;

        // image upload
        if (isset($request->section1_image)) {
            $fileUpload1 = fileUpload($request->section1_image, 'banner');
            $data->section1_image = $fileUpload1['file'][2];
        }
        // image upload
        if (isset($request->section2_image)) {
            $fileUpload2 = fileUpload($request->section2_image, 'home-page');
            $data->section2_image = $fileUpload2['file'][2];
        }
        // image upload
        if (isset($request->section3_image)) {
            $fileUpload3 = fileUpload($request->section3_image, 'home-page');
            $data->section3_image = $fileUpload3['file'][2];
        }
        // image upload
        if (isset($request->section4_image)) {
            $fileUpload4 = fileUpload($request->section4_image, 'home-page');
            $data->section4_image = $fileUpload4['file'][2];
        }
        // image upload
        if (isset($request->section5_image1)) {
            $fileUpload5 = fileUpload($request->section5_image1, 'home-page');
            $data->section5_image1 = $fileUpload5['file'][2];
        }
        // image upload
        if (isset($request->section5_image2)) {
            $fileUpload6 = fileUpload($request->section5_image2, 'home-page');
            $data->section5_image2 = $fileUpload6['file'][2];
        }
        
        $data->save();

        return redirect()->back()->with('success', 'Content updated');
    }
    public function aboutUpdate(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'id' => 'required|integer|min:1',
            'page_title' => 'required|string|max:255',
            'page_banner' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif,svg|max:1000',

            'section1_title' => 'required|string|max:255',
            'section1_image' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif,svg|max:1000',
            'section1_desc' => 'required|string|max:1000',
            'section1_video_link' => 'required|string|max:255',

            'section2_title' => 'required|string|max:255',
            'section2_image' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif,svg|max:1000',
            'section2_desc' => 'required|string|max:1000',

            'section3_title' => 'required|string|max:255',
            'section3_image' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif,svg|max:1000',
            'section3_desc' => 'required|string|max:1000',

            'section4_title' => 'required|string|max:255',
            'section4_image' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif,svg|max:1000',
            'section4_desc' => 'required|string|max:1000',

            'section5_title' => 'required|string|max:255',
            'section5_image' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif,svg|max:1000',
            'section5_desc' => 'required|string|max:1000',

        ], [
            'page_banner.max' => 'The image must not be greater than 1MB.',
            'section1_image.max' => 'The image must not be greater than 1MB.',
            'section2_image.max' => 'The image must not be greater than 1MB.',
            'section3_image.max' => 'The image must not be greater than 1MB.',
            'section4_image.max' => 'The image must not be greater than 1MB.',
            'section5_image.max' => 'The image must not be greater than 1MB.',
        ]);

        $data = ContentAbout::first();
        $data->page_title = $request->page_title;

        $data->section1_title = $request->section1_title;
        $data->section1_desc = $request->section1_desc;
        $data->section1_video_link = $request->section1_video_link;

        $data->section2_title = $request->section2_title;
        $data->section2_desc = $request->section2_desc;

        $data->section3_title = $request->section3_title;
        $data->section3_desc = $request->section3_desc;

        $data->section4_title = $request->section4_title;
        $data->section4_desc = $request->section4_desc;

        $data->section5_title = $request->section5_title;
        $data->section5_desc = $request->section5_desc;

        // image upload
        if (isset($request->page_banner)) {
            $fileUpload1 = fileUpload($request->page_banner, 'about-page');
            $data->page_banner = $fileUpload1['file'][2];
        }
        // image upload
        if (isset($request->section1_image)) {
            $fileUpload2 = fileUpload($request->section1_image, 'about-page');
            $data->section1_image = $fileUpload2['file'][2];
        }
        // image upload
        if (isset($request->section2_image)) {
            $fileUpload3 = fileUpload($request->section2_image, 'about-page');
            $data->section2_image = $fileUpload3['file'][2];
        }
        // image upload
        if (isset($request->section3_image)) {
            $fileUpload4 = fileUpload($request->section3_image, 'about-page');
            $data->section3_image = $fileUpload4['file'][2];
        }
        // image upload
        if (isset($request->section4_image)) {
            $fileUpload5 = fileUpload($request->section4_image, 'about-page');
            $data->section4_image = $fileUpload5['file'][2];
        }
        // image upload
        if (isset($request->section5_image)) {
            $fileUpload6 = fileUpload($request->section5_image, 'about-page');
            $data->section5_image = $fileUpload6['file'][2];
        }

        $data->save();

        return redirect()->back()->with('success', 'Content updated');
    }

    public function contactUpdate(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|min:1',
            'page_title' => 'required|string|max:255',
            'page_banner' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif,svg|max:1000',
            'form_title' => 'required|string|max:255',
            'form_submit_btn_text' => 'required|string|max:255',
        ], [
            'page_banner.max' => 'The image must not be greater than 1MB.',
        ]);

        $data = ContentContact::first();
        $data->page_title = $request->page_title;

        $data->registerd_office_title = $request->registerd_office_title;
        $data->registerd_office_address = $request->registerd_office_address;
        $data->registerd_office_tell = $request->registerd_office_tell;
        $data->registerd_office_fax = $request->registerd_office_fax;
        $data->registerd_office_email = $request->registerd_office_email;
        $data->registerd_office_map = $request->registerd_office_map;

        $data->corporate_office_title = $request->corporate_office_title;
        $data->corporate_office_address = $request->corporate_office_address;
        $data->corporate_office_tell = $request->corporate_office_tell;
        $data->corporate_office_fax = $request->corporate_office_fax;
        $data->corporate_office_email = $request->corporate_office_email;
        $data->corporate_office_map = $request->corporate_office_map;

        $data->plant_title = $request->plant_title;
        $data->plant_address = $request->plant_address;
        $data->plant_tell = $request->plant_tell;
        $data->plant_fax = $request->plant_fax;
        $data->plant_email = $request->plant_email;
        $data->plant_map = $request->plant_map;

        $data->plant_title1 = $request->plant_title1;
        $data->plant_address1 = $request->plant_address1;
        $data->plant_tell1 = $request->plant_tell1;
        $data->plant_fax1 = $request->plant_fax1;
        $data->plant_email1 = $request->plant_email1;
        $data->plant_map1 = $request->plant_map1;

        $data->form_title = $request->form_title;
        $data->form_submit_btn_text = $request->form_submit_btn_text;
        $data->form_desc = $request->form_desc;

        // image upload
        if (isset($request->page_banner)) {
            $fileUpload1 = fileUpload($request->page_banner, 'contact-page');
            $data->page_banner = $fileUpload1['file'][2];
        }

        $data->save();

        return redirect()->back()->with('success', 'Content updated');
    }

    public function settingsUpdate(Request $request)
    {
        $request->validate([
            'official_phone1' => 'required|integer|digits:10',
            'official_phone2' => 'nullable|integer|digits:10',
            'official_email' => 'required|email|min:5|max:255',
            'full_company_name' => 'required|string|min:1|max:255',
            'pretty_company_name' => 'required|string|min:1|max:255',
            'company_short_desc' => 'required|string|min:5|max:1000',
            'company_full_address' => 'required|string|min:5|max:1000',
            'google_map_address_link' => 'required|string|min:5',
        ]);

        Setting::where('title', 'official_phone1')->update([
            'content' => $request->official_phone1
        ]);
        Setting::where('title', 'official_phone2')->update([
            'content' => $request->official_phone2
        ]);
        Setting::where('title', 'official_email')->update([
            'content' => $request->official_email
        ]);
        Setting::where('title', 'full_company_name')->update([
            'content' => $request->full_company_name
        ]);
        Setting::where('title', 'pretty_company_name')->update([
            'content' => $request->pretty_company_name
        ]);
        Setting::where('title', 'company_short_desc')->update([
            'content' => $request->company_short_desc
        ]);
        Setting::where('title', 'company_full_address')->update([
            'content' => $request->company_full_address
        ]);
        Setting::where('title', 'google_map_address_link')->update([
            'content' => $request->google_map_address_link
        ]);

        return redirect()->back()->with('success', 'Content updated');
    }


    public function __construct(CategoryInterface $CategoryRepository)
    {
        $this->CategoryRepository = $CategoryRepository;
    }


    public function ExtraCurricularIndex(Request $request){
        // return "Souvik";
        // dd($request->all());
        if (!empty($request->keyword)) {
            $data = $this->CategoryRepository->getSearchContent_extracurricular($request->keyword);
        } else {
            $data = $this->CategoryRepository->listAllContent_extracurricular();
        }
        return view('admin.extra_curricular.index', compact('data'));
    }

    public function ExtraCurricularCreate(Request $request){
        return view('admin.extra_curricular.create');
    }

    public function ExtraCurricularStore(Request $request){
        // Start a database transaction
        // dd($request->all());
        DB::beginTransaction();
            $request->validate([
                'title' => 'required|string|max:255',
                'desc'=> 'required | string',
                'page_title'=>'required | string ',
                'meta_title'=>'required | string',
                'meta_desc'=>'required | string' ,
                'meta_keyword'=>'required | string'
            ]);  
                
                
                
           

         

            try {
                $data = new Content_extracurricular();
                $data->title = $request->title;
                $data->slug = slugGenerate($request->title, 'content_extracurriculars');
                $data->desc = $request->desc;
                $data->page_title = $request->page_title;
                $data->meta_title = $request->meta_title;
                $data->meta_desc = $request->meta_desc;
                $data->meta_keyword= $request->meta_keyword;
               
                
                
                
                
                $data->save();
                // Commit the transaction if everything is successful
                DB::commit();
                return redirect()->route('admin.extra-curricular')->with('success', 'New Extra Curricular created');
            } catch (\Exception $e) {
                // Rollback the transaction if an exception occurs
                DB::rollback();
                // You can log the exception if needed
                \Log::error($e);
                // Redirect back with an error message
                return redirect()->back()->with('failure', 'Failed to create extra curricular. Please try again.');
            }
    }


    public function ExtraCurricularEdit($id){
        $data = $this->CategoryRepository->findContent_extracurricularById($id);
        return view('admin.extra_curricular.edit', compact('data'));
        // return $id;
    }

    public function ExtraCurricularUpdate(Request $request){
        // Start a database transaction
        // dd($request->all());

        // dd($request->all());
        DB::beginTransaction();

        $request->validate([
            'title' => [
                'required',
                'string',
                'max:255',
               
            ],

           

            'desc' => [
                'required',
                'string',
       
                
            ],


            'page_title' => [
                'required',
               'string',
               'max:150'
                
            ],
            'meta_title' => [
                'required',
               'string',
               'max:150'
                
            ],
            'meta_desc' => [
                'required',
               'string',
               'max:150'
                
            ],
            'meta_keyword' => [
                'required',
               'string',
               'max:150'
                
            ],

        ]);

       

        try {
            $data = Content_extracurricular::findOrFail($request->id);
            $data->title = $request->title;
            $data->desc = $request->desc;
            $data->page_title = $request->page_title;
            $data->meta_title = $request->meta_title;
            $data->meta_keyword = $request->meta_keyword;
            $data->meta_desc = $request->meta_desc;
           
           
           

            
        
            $data->save();
            // Commit the transaction if everything is successful
            DB::commit();
            return redirect()->route('admin.extra-curricular')->with('success', 'Extra Curricular updated successfully');
        } catch (\Exception $e) {
            // Rollback the transaction if an exception occurs
            DB::rollback();
            // You can log the exception if needed
            \Log::error($e);
            // Redirect back with an error message
            return redirect()->back()->with('failure', 'Failed to update Extra curricular. Please try again.');
        }
    }


    public function ExtraCurricularStatus(Request $request, $id){
        $data = $this->CategoryRepository->findfindContent_extracurricularByIdById($id);
        $data->status = ($data->status == 1) ? 0 : 1;
        $data->update();
        return response()->json([
            'status' => 200,
            'message' => 'Status updated',
        ]);
    }


    public function ExtraCurricularDelete(Request $request,$id){
        DB::beginTransaction();

        try {
            $data = Content_extracurricular::findOrFail($id);
            $data->deleted_at = 0;
            $data->save();
            // Commit the transaction if the deletion is successful
            DB::commit();
            return redirect()->route('admin.extra-curricular')->with('success', 'Extra Curricular deleted');
        } catch (\Exception $e) {
            // Rollback the transaction if an exception occurs
            DB::rollback();
            // Log the exception if needed
            \Log::error($e);
            // Redirect back with an error message
            return redirect()->back()->with('failure', 'Failed to delete extra curricular. Please try again.');
        }
     }


     public function AcademicsIndex(Request $request){
        // return "Souvik";
        // dd($request->all());
        if (!empty($request->keyword)) {
            $data = $this->CategoryRepository->getSearchContentAcademics($request->keyword);
        } else {
            $data = $this->CategoryRepository->listAllContentAcademics();
        }
        return view('admin.academics.index', compact('data'));
    }

    public function AcademicsCreate(Request $request){
        return view('admin.academics.create');
    }

    public function AcademicsStore(Request $request){
        // Start a database transaction
        // dd($request->all());
        DB::beginTransaction();
            $request->validate([
                'title' => 'required|string|max:255',
                'desc'=> 'required | string',
                'sub_title'=> 'required | string',
                'page_title'=>'required | string ',
                'meta_title'=>'required | string',
                'meta_desc'=>'required | string' ,
                'meta_keyword'=>'required | string'
            ]);  
            
            try {
                $data = new ContentAcademics();
                $data->title = $request->title;
                $data->slug = slugGenerate($request->title, 'content_academics');
                $data->desc = $request->desc;
                $data->sub_title = $request->sub_title;
                $data->page_title = $request->page_title;
                $data->meta_title = $request->meta_title;
                $data->meta_desc = $request->meta_desc;
                $data->meta_keyword= $request->meta_keyword;
            
                $data->save();
                // Commit the transaction if everything is successful
                DB::commit();
                return redirect()->route('admin.academics')->with('success', 'New Academics created');
            } catch (\Exception $e) {
                // Rollback the transaction if an exception occurs
                DB::rollback();
                // You can log the exception if needed
                \Log::error($e);
                // Redirect back with an error message
                return redirect()->back()->with('failure', 'Failed to create academics. Please try again.');
            }
    }


    public function AcademicsEdit($id){
        $data = $this->CategoryRepository->findContentAcademicsById($id);
        return view('admin.academics.edit', compact('data'));
        // return $id;
    }

    public function AcademicsUpdate(Request $request){
        // Start a database transaction
        // dd($request->all());

        // dd($request->all());
        DB::beginTransaction();

        $request->validate([
            'title' => [
                'required',
                'string',
                'max:255',
               
            ],
            'desc' => [
                'required',
                'string',
       
                
            ],
            'page_title' => [
                'required',
               'string',
               'max:150'
                
            ],
            'sub_title' => [
                'required',
               'string',
               'max:150'
                
            ],
            'meta_title' => [
                'required',
               'string',
               'max:150'
                
            ],
            'meta_desc' => [
                'required',
               'string',
              
                
            ],
            'meta_keyword' => [
                'required',
               'string',
               'max:150'
                
            ],

        ]);

           




       

        try {
            $data = ContentAcademics::findOrFail($request->id);
            $data->title = $request->title;
            $data->slug = slugGenerateUpdate($request->title, "content_extracurriculars", $request->id);
            $data->desc = $request->desc;
            $data->sub_title = $request->sub_title;

            $data->page_title = $request->page_title;
            $data->meta_title = $request->meta_title;
            $data->meta_keyword = $request->meta_keyword;
            $data->meta_desc = $request->meta_desc;
           
           
           

            
        
            $data->save();
            // Commit the transaction if everything is successful
            DB::commit();
            return redirect()->route('admin.academics')->with('success', 'Academics updated successfully');
        } catch (\Exception $e) {
            // Rollback the transaction if an exception occurs
            DB::rollback();
            // You can log the exception if needed
            \Log::error($e);
            // Redirect back with an error message
            return redirect()->back()->with('failure', 'Failed to update Academics. Please try again.');
        }
    }

    public function AcademicsStatus(Request $request, $id){
        $data = $this->CategoryRepository->findContentAcademicsById($id);
        $data->status = ($data->status == 1) ? 0 : 1;
        $data->update();
        return response()->json([
            'status' => 200,
            'message' => 'Status updated',
        ]);
    }


    public function AcademicsView($id){
        if (!empty($request->keyword)) {
            $data = $this->CategoryRepository->getSearchSubAcademics($request->keyword);
        } else {
            $data = $this->CategoryRepository->listAllSubAcademics($id);
        }
    
        return view('admin.academics.view', compact('data', 'id'));
        // return $id;
    }

    public function AcademicsDelete(Request $request,$id){
        DB::beginTransaction();

        try {
            $data = ContentAcademics::findOrFail($id);
            $data->deleted_at = 0;
            $data->save();
            // Commit the transaction if the deletion is successful
            DB::commit();
            return redirect()->route('admin.academics')->with('success', 'Academics deleted Successfully');
        } catch (\Exception $e) {
            // Rollback the transaction if an exception occurs
            DB::rollback();
            // Log the exception if needed
            \Log::error($e);
            // Redirect back with an error message
            return redirect()->back()->with('failure', 'Failed to delete academics. Please try again.');
        }
     }


     public function SubAcademicsStore(Request $request){
        // Start a database transaction
        // dd($request->all());
        DB::beginTransaction();
            $request->validate([
                'title' => 'required | unique:sub_academics,title| string|max:255',
                'desc'=> 'required | string',
                'logo'=> 'required | mimes:jpg,jpeg,png,webp,avif',
                
            ]);  
            
            try {
                $data = new SubAcademics;

                $data->title = $request->title;
                $data->desc = $request->desc;
                $data->content_academics_id = $request->id;
                $file = $request->file('logo');
                $fileExtentions = time().rand(10000,99999).".".$file->getClientOriginalExtension();
                $imgPath = public_path('sub_academics_uploads');
                $file->move($imgPath,$fileExtentions);

                $data->logo = $fileExtentions;
               
                
            
                $data->save();
                // Commit the transaction if everything is successful
                DB::commit();
                return redirect()->route('admin.academics.view',$request->id)->with('success', 'New Academics created');
            } catch (\Exception $e) {
                // Rollback the transaction if an exception occurs
                DB::rollback();
                // You can log the exception if needed
                \Log::error($e);
                // Redirect back with an error message
                return redirect()->back()->with('failure', 'Failed to create academics. Please try again.');
            }
    }


    public function SubAcademicsDelete(Request $request,$id){
        DB::beginTransaction();

        try {
            $data = SubAcademics::findOrFail($id);
            $data->deleted_at = 0;
            $data->save();
            // Commit the transaction if the deletion is successful
            DB::commit();
            return redirect()->back()->with('success', 'SubAcademics deleted Successfully');
        } catch (\Exception $e) {
            // Rollback the transaction if an exception occurs
            DB::rollback();
            // Log the exception if needed
            \Log::error($e);
            // Redirect back with an error message
            return redirect()->back()->with('failure', 'Failed to delete subacademics. Please try again.');
        }
     }

     public function SubAcademicsEdit($id){
        $data = $this->CategoryRepository->findSubAcademicsById($id);
        return response()->json($data);
        // return 
        
        
    }

    public function SubAcademicsStatus(Request $request, $id){
        $data = $this->CategoryRepository->findSubAcademicsById($id);
        $data->status = ($data->status == 1) ? 0 : 1;
        $data->update();
        return response()->json([
            'status' => 200,
            'message' => 'Status updated',
        ]);
    }

    
    public function SubAcademicsUpdate(Request $request){
        // Start a database transaction
      

        // dd($request->all());
        DB::beginTransaction();

        $request->validate([
            'SubAcademics_title' => [
                'required',
                
                'string',
                'max:255',
                // 'unique:sub_academics,title',
             ],
                 
               
              'SubAcademics_desc' => [
                'required',
                
             ],
               'Image_logo'=>[
                'mimes:jpg,jpeg,png,webp,gif'
             ],

        ]);

        try {
            $data = SubAcademics::findOrFail($request->id);
            $data->title = $request->SubAcademics_title;
            // dd($request->all());
            $data->desc = $request->SubAcademics_desc;
            $data->content_academics_id = $request->academics_id;
           

            if($request->Image_logo){
                $file = $request->file('Image_logo');
                $fileExtentions = time().rand(10000,99999).$file->getClientOriginalExtension();
                $imgPath = public_path('sub_academics_uploads');
                $file->move($imgPath,$fileExtentions);
                $data->logo = $fileExtentions;
            }

            else{
                $data->logo = $request->old_img_path;
            }






            

           
           
            $data->save();
            // Commit the transaction if everything is successful
            DB::commit();
            return redirect()->back()->with('success', 'SubAcademics updated successfully');
        } catch (\Exception $e) {
            // Rollback the transaction if an exception occurs
            DB::rollback();
            // You can log the exception if needed
            \Log::error($e);
            // Redirect back with an error message
            return redirect()->back()->with('failure', 'Failed to update SubAcademics. Please try again.');
        }
    }


            public function SocialMediaIndex(Request $request){
        // return "Souvik";
        // dd($request->all());
        if (!empty($request->keyword)) {
            $data = $this->CategoryRepository->getSearchSocialMedia($request->keyword);
        } else {
            $data = $this->CategoryRepository->listAllSocialMedia();
        }
        return view('admin.social.index', compact('data'));
    }

    public function SocialMediaCreate(Request $request){
        return view('admin.social.create');
    }

    public function SocialMediaStore(Request $request){
        // Start a database transaction
        // dd($request->all());
        DB::beginTransaction();
            $request->validate([
                'title' => 'required|unique:social_media,title|string|max:255',
                'image'=> 'mimes:jpg,jpeg,png,gif,webp',
                'social_link'=> 'required'
            ]);  
                
            try {
                $data = new SocialMedia();
                $data->title = $request->title;
               $data->link = $request->social_link;
                $file = $request->file('image');
                $fileExtentions = time().rand(10000,99999).'.'.$file->getClientOriginalExtension();
                // dd($fileExtentions);
                $imgPath = public_path('uploads/social');
                // dd($imgPath);
                $file->move($imgPath,$fileExtentions); 
                $data->image = 'uploads/social/'.$fileExtentions;
                // dd($data->image);
                
                $data->save();
                // Commit the transaction if everything is successful
                DB::commit();
                return redirect()->route('admin.social_media')->with('success', 'New Social Media created');
            } catch (\Exception $e) {
                // Rollback the transaction if an exception occurs
                DB::rollback();
                // You can log the exception if needed
                \Log::error($e);
                // Redirect back with an error message
                return redirect()->back()->with('failure', 'Failed to create Social Media. Please try again.');
            }
        }

        public function SocialMediaEdit($id){
            $data = $this->CategoryRepository->findSocialMediaById($id);
            return view('admin.social.edit', compact('data'));
            // return $id;
        }

        public function SocialMediaUpdate(Request $request){
            // Start a database transaction
            // dd($request->all());
    
            // dd($request->all());
            DB::beginTransaction();
    
            $request->validate([
                'title' => [
                    'required',
                    'string',
                    'max:255',
                    
                   
                ],

                'image'=> 'mimes:jpg,jpeg,png,gif,webp',
                'social_link'=> 'required'



              
    
            ]);

            try {
                $data = SocialMedia::findOrFail($request->id);
                $data->title = $request->title;
                $data->link = $request->social_link;

                if($request->image){
                    $file = $request->file('image');
                    $fileExtentions = time().rand(10000,99999).'.'.$file->getClientOriginalExtension();
                    // dd($fileExtentions);
                    $imgPath = public_path('uploads/social');
                    $file->move($imgPath,$fileExtentions); 
                    $data->image ='uploads/social/'.$fileExtentions;
                }
                else{
                    $data->image = $request->old_img_path;
                }
                
                    $data->save();
                    // Commit the transaction if everything is successful
                    DB::commit();
                    return redirect()->route('admin.social_media')->with('success', 'Social_media updated successfully');
                } catch (\Exception $e) {
                    // Rollback the transaction if an exception occurs
                    DB::rollback();
                    // You can log the exception if needed
                    \Log::error($e);
                    // Redirect back with an error message
                    return redirect()->back()->with('failure', 'Failed to update Social_media. Please try again.');
                }
            }

            public function SocialMediaDelete(Request $request,$id){
                DB::beginTransaction();
        
                try {
                    $data = SocialMedia::findOrFail($id);
                    $data->deleted_at = 0;
                    $data->save();
                    // Commit the transaction if the deletion is successful
                    DB::commit();
                    return redirect()->route('admin.social_media')->with('success', 'Social Media deleted');
                } catch (\Exception $e) {
                    // Rollback the transaction if an exception occurs
                    DB::rollback();
                    // Log the exception if needed
                    \Log::error($e);
                    // Redirect back with an error message
                    return redirect()->back()->with('failure', 'Failed to delete social media. Please try again.');
                }
             }


             public function SocialMediaStatus(Request $request, $id){
                $data = $this->CategoryRepository->findSocialMediaById($id);
                $data->status = ($data->status == 1) ? 0 : 1;
                $data->update();
                return response()->json([
                    'status' => 200,
                    'message' => 'Status updated',
                ]);
            }


            public function LeadIndex(Request $request){
                // return "Souvik";
                // dd($request->all());
                if (!empty($request->keyword)) {
                    $data = $this->CategoryRepository->getSearchLead($request->keyword);
                } else {
                    $data = $this->CategoryRepository->listAllLead();
                }
                return view('admin.lead.index', compact('data'));
            }

            public function export(){
                return Excel::download(new LeadsExport(), 'bulkData.xlsx');
            }

            public function ContactUsIndex(Request $request){
                // return "Souvik";
                // dd($request->all());
                if (!empty($request->keyword)) {
                    $data = $this->CategoryRepository->getSearchContactUs($request->keyword);
                } else {
                    $data = $this->CategoryRepository->listAllContactUs();
                }
                return view('admin.contact_us.index', compact('data'));
            }

            public function InnerIndex(Request $request){
                // return "Souvik";
                // dd($request->all());
                if (!empty($request->keyword)) {
                    $data = $this->CategoryRepository->getSearchInner($request->keyword);
                } else {
                    $data = $this->CategoryRepository->listAllInner();
                }
                return view('admin.inner.index', compact('data'));
            }

            public function InnerEdit($id){
                $data = $this->CategoryRepository->findInnerById($id);
                return view('admin.inner.edit', compact('data'));
                // return $id;
            }
            
        
            public function InnerUpdate(Request $request){
                // Start a database transaction
                // dd($request->all());
        
                // dd($request->all());
                DB::beginTransaction();
        
                $request->validate([
                    'title' => [
                        'required',
                        'unique:social_media,title',
                        'string',
                        'max:255',
                       
                    ],

                    'desc'=> 'required | string',
                'page_title'=>'required | string ',
                'meta_title'=>'required | string',
                'meta_desc'=>'required | string' ,
                'meta_keyword'=>'required | string'
    
                    
    
    
    
                  
        
                ]);
    
                try {
                    $data = Inner::findOrFail($request->id);
                    $data->title = $request->title;
                    $data->desc = $request->desc;
                    $data->page_title = $request->page_title;
                    $data->meta_title = $request->meta_title;
                    $data->meta_desc = $request->meta_desc;
                    $data->meta_keyword= $request->meta_keyword;
                   
    
                  
                        $data->save();
                        // Commit the transaction if everything is successful
                        DB::commit();
                        return redirect()->route('admin.inner')->with('success', 'Inner updated successfully');
                    } catch (\Exception $e) {
                        // Rollback the transaction if an exception occurs
                        DB::rollback();
                        // You can log the exception if needed
                        \Log::error($e);
                        // Redirect back with an error message
                        return redirect()->back()->with('failure', 'Failed to update inner. Please try again.');
                    }
                }


                public function ChooseUsCreate(Request $request){
                    return view('admin.choose_us.create');
                }
            
                public function ChooseUsIndex(Request $request){
                    // return "Souvik";
                    // dd($request->all());
                    if (!empty($request->keyword)) {
                        $data = $this->CategoryRepository->getSearchChooseUs($request->keyword);
                    } else {
                        $data = $this->CategoryRepository->listAllChooseUs();
                    }
                    return view('admin.choose_us.index', compact('data'));
                }

                public function ChooseUsStore(Request $request){
                    // Start a database transaction
                    // dd($request->all());
                    DB::beginTransaction();
                        $request->validate([
                            'title' => 'required|unique:choose_us,title|string|max:255',
                            'short_desc'=> 'required | string',
                            'logo'=> ' mimes:jpeg,png,jpg,gif,svg'
                           
                        ]);  
                            
                            
                            
                       
            
                     
            
                        try {
                            $data = new Choose_us();
                            $data->title = $request->title;
                            $data->short_desc = $request->short_desc;

                            $file = $request->file('logo');
                            $fileExtentions = time().rand(10000,99999).".".$file->getClientOriginalExtension();
                            $imgPath = public_path('choose_us_uploads');
                            $file->move($imgPath,$fileExtentions);
            
                            $data->logo = $fileExtentions;
                          
                           
                            
                            
                            
                            
                            $data->save();
                            // Commit the transaction if everything is successful
                            DB::commit();
                            return redirect()->route('admin.choose_us')->with('success', 'New choose_us created');
                        } catch (\Exception $e) {
                            // Rollback the transaction if an exception occurs
                            DB::rollback();
                            // You can log the exception if needed
                            \Log::error($e);
                            // Redirect back with an error message
                            return redirect()->back()->with('failure', 'Failed to create choose_us. Please try again.');
                        }
                }
            
                public function ChooseUsEdit($id){
                    $data = $this->CategoryRepository->findChooseUsById($id);
                    return view('admin.choose_us.edit', compact('data'));
                    // return $id;
                }

                 public function ChooseUsUpdate(Request $request){
        // Start a database transaction
      

        // dd($request->all());
        DB::beginTransaction();

        $request->validate([
            'title' => [
                'required',
                
                'string',
                'max:255',
              
             ],
                 
               
              'short_desc' => [
                'required',
                
             ],
               'logo'=>[
                'mimes:jpg,jpeg,png,webp,gif'
             ],

        ]);

        try {
            $data = Choose_us::findOrFail($request->id);
            $data->title = $request->title;
            // dd($request->all());
            $data->short_desc = $request->short_desc;
           
           

            if($request->logo){
                $file = $request->file('logo');
                $fileExtentions = time().rand(10000,99999).'.'.$file->getClientOriginalExtension();
                $imgPath = public_path('choose_us_uploads');
                $file->move($imgPath,$fileExtentions);
                $data->logo = $fileExtentions;
            }

            else{
                $data->logo = $request->old_img_path;
            }






            

           
           
            $data->save();
            // Commit the transaction if everything is successful
            DB::commit();
            return redirect()->route('admin.choose_us')->with('success', 'Choose us updated successfully');
        } catch (\Exception $e) {
            // Rollback the transaction if an exception occurs
            DB::rollback();
            // You can log the exception if needed
            \Log::error($e);
            // Redirect back with an error message
            return redirect()->back()->with('failure', 'Failed to update Choose us. Please try again.');
        }
    }


    public function ChooseUsDelete(Request $request,$id){
        DB::beginTransaction();

        try {
            $data = Choose_us::findOrFail($id);
            $data->deleted_at = 0;
            $data->save();
            // Commit the transaction if the deletion is successful
            DB::commit();
            return redirect()->route('admin.choose_us')->with('success', 'Choose us deleted');
        } catch (\Exception $e) {
            // Rollback the transaction if an exception occurs
            DB::rollback();
            // Log the exception if needed
            \Log::error($e);
            // Redirect back with an error message
            return redirect()->back()->with('failure', 'Failed to delete choose_us. Please try again.');
        }
     }

     public function ChooseUsStatus(Request $request, $id){
        $data = $this->CategoryRepository->findChooseUsById($id);
        $data->status = ($data->status == 1) ? 0 : 1;
        $data->update();
        return response()->json([
            'status' => 200,
            'message' => 'Status updated',
        ]);
    }
    
               
     public function GalaryIndex(Request $request){
        // return "Souvik";
        // dd($request->all());
        if (!empty($request->keyword)) {
            $data = $this->CategoryRepository->getSearchGalary($request->keyword);
        } else {
            $data = $this->CategoryRepository->listAllGalary();
        }
        return view('admin.galary.index', compact('data'));
    }
                
    
                
           
    public function GalaryCreate(Request $request){
        return view('admin.galary.create');
    }

               
                
    public function GalaryStore(Request $request){
        // Start a database transaction
        // dd($request->all());
        DB::beginTransaction();
            $request->validate([
            //   
                'image'=> ' mimes:jpeg,png,jpg,gif,svg'
               
            ]);  
                
                
                
           

         

            try {
                $data = new Galary();
               

                $file = $request->file('image');
                $fileExtentions = time().rand(10000,99999).".".$file->getClientOriginalExtension();
                $imgPath = public_path('galary_uploads');
                $file->move($imgPath,$fileExtentions);

                $data->image = $fileExtentions;
              
               
                
                
                
                
                $data->save();
                // Commit the transaction if everything is successful
                DB::commit();
                return redirect()->route('admin.galary')->with('success', 'New galary created');
            } catch (\Exception $e) {
                // Rollback the transaction if an exception occurs
                DB::rollback();
                // You can log the exception if needed
                \Log::error($e);
                // Redirect back with an error message
                return redirect()->back()->with('failure', 'Failed to create galary. Please try again.');
            }
    }

    public function GalaryEdit($id){
        $data = $this->CategoryRepository->findGalaryById($id);
        return view('admin.galary.edit', compact('data'));
        // return $id;
    }

    
    public function GalaryUpdate(Request $request){
        // Start a database transaction
      

        // dd($request->all());
        DB::beginTransaction();

        $request->validate([
           
               'image'=>[
                'mimes:jpg,jpeg,png,webp,gif,avif'
             ],

        ]);
        try {
            $data = Galary::findOrFail($request->id);
            if($request->image){
                $file = $request->file('image');
                $fileExtentions = time().rand(10000,99999).'.'.$file->getClientOriginalExtension();
                $imgPath = public_path('galary_uploads');
                $file->move($imgPath,$fileExtentions);
                $data->image = $fileExtentions;
            }
            else{
                $data->image = $request->old_img_path;
            }
            $data->save();
            // Commit the transaction if everything is successful
            DB::commit();
            return redirect()->route('admin.galary')->with('success', 'Galary updated successfully');
        } catch (\Exception $e) {
            // Rollback the transaction if an exception occurs
            DB::rollback();
            // You can log the exception if needed
            \Log::error($e);
            // Redirect back with an error message
            return redirect()->back()->with('failure', 'Failed to update Galary. Please try again.');
        }
    }
         
           
           
           








            

           
           


    public function GalaryDelete(Request $request,$id){
        DB::beginTransaction();

        try {
            $data = Galary::findOrFail($id);
            $data->deleted_at = 0;
            $data->save();
            // Commit the transaction if the deletion is successful
            DB::commit();
            return redirect()->route('admin.galary')->with('success', 'Galary deleted Successfully');
        } catch (\Exception $e) {
            // Rollback the transaction if an exception occurs
            DB::rollback();
            // Log the exception if needed
            \Log::error($e);
            // Redirect back with an error message
            return redirect()->back()->with('failure', 'Failed to delete galary. Please try again.');
        }
     }

                
                







       

           
           

            
        

    



    


   











    















}
