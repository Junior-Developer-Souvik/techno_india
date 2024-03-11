<?php

namespace App\Http\Controllers\Admin;
use App\Models\Blogs;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\CategoryInterface;
use DB;
use Illuminate\Validation\Rule;

class BlogsController extends Controller
{
    public function __construct(CategoryInterface $CategoryRepository)
    {
        $this->CategoryRepository = $CategoryRepository;
    }
    
    public function BlogsIndex(Request $request){
        // return "Souvik";
        // dd($request->all());
        if (!empty($request->keyword)) {
            $data = $this->CategoryRepository->getSearchBlogs($request->keyword);
        } else {
            $data = $this->CategoryRepository->listAllBlogs();
        }
        return view('admin.blogs.index', compact('data'));
    }

    public function BlogsCreate(Request $request){
        return view('admin.blogs.create');
    }

    // public function CollectionEdit($id){
    //     $data = $this->CategoryRepository->findById($id);
    //     return view('admin.collection.edit', compact('data'));
    // }

    public function BlogsStore(Request $request){
        // Start a database transaction
        DB::beginTransaction();
            $request->validate([
                'title' => 'required|string|max:255',
                'short_desc'=>'required | string' ,
                'long_desc'=> 'required | string',
                'image'=>'required | mimes:jpg,jpeg,png,gif',
                'blog_cat'=>'required | string | max:255',
                'page_title'=>'required | string | max:150',
                'uploaded_by'=>'required |string | max:100',
            ]);  

            $file = $request->file('image');
            $fileExtention = time().rand(10000,99999).$file->getClientOriginalExtension();
            $imgPath = public_path('blogs.uploads');
            $file->move($imgPath,$fileExtention);

            try {
                $data = new Blogs();
                $data->title = $request->title;
                $data->slug = slugGenerate($request->title, 'blogs');
                $data->short_desc = $request->short_desc;
                $data->long_desc = $request->long_desc;
                $data->image = $fileExtention;
                $data->blog_categories = $request->blog_cat;
                $data->page_title = $request->page_title;
                $data->uploaded_by = $request->uploaded_by;
                
                
                $data->save();
                // Commit the transaction if everything is successful
                DB::commit();
                return redirect()->route('admin.blogs.list.all')->with('success', 'New Blogs created');
            } catch (\Exception $e) {
                // Rollback the transaction if an exception occurs
                DB::rollback();
                // You can log the exception if needed
                \Log::error($e);
                // Redirect back with an error message
                return redirect()->back()->with('failure', 'Failed to create Blogs. Please try again.');
            }
    }

     public function BlogsDelete(Request $request,$id){
        DB::beginTransaction();

        try {
            $data = Blogs::findOrFail($id);
            $data->deleted_at = 0;
            $data->save();
            // Commit the transaction if the deletion is successful
            DB::commit();
            return redirect()->route('admin.blogs.list.all')->with('success', 'Blogs deleted');
        } catch (\Exception $e) {
            // Rollback the transaction if an exception occurs
            DB::rollback();
            // Log the exception if needed
            \Log::error($e);
            // Redirect back with an error message
            return redirect()->back()->with('failure', 'Failed to delete blogs. Please try again.');
        }
     }

     public function BlogsEdit($id){
        $data = $this->CategoryRepository->findBlogsById($id);
        return view('admin.blogs.edit', compact('data'));
    }

     public function BlogsUpdate(Request $request){
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
                'string',
          
                
            ],

            'long_desc' => [
                'required',
                'string',
       
                
            ],

            'image' => [
              
               ' mimes:jpg,jpeg,png,gif',
                
            ],

            'blog_cat' => [
                'required',
               'string',
               'max:255'
                
            ],

            'page_title' => [
                'required',
               'string',
               'max:150'
                
            ],

          

            'uploaded_by' => [
                'required',
               'string',
               'max:100'
                
            ],


        ]);

       

        try {
            $data = Blogs::findOrFail($request->id);
            $data->title = $request->title;
            $data->slug = slugGenerateUpdate($request->title, "blogs", $request->id);

            $data->short_desc = $request->short_desc;
            $data->blog_categories = $request->blog_cat;
            $data->page_title = $request->page_title;
            $data->uploaded_by = $request->uploaded_by;

            if($request->image){
                $file = $request->file('image');
                $fileExtention = time().rand(10000,99999).$file->getClientOriginalExtension();
                $imgPath = public_path('blogs.uploads');
                $file->move($imgPath,$fileExtention);
                $data->image = $fileExtention;
    
            }
            else{
                $data->image = $request->old_img_blog;
            }
        
            $data->save();
            // Commit the transaction if everything is successful
            DB::commit();
            return redirect()->route('admin.blogs.list.all')->with('success', 'Blogs updated successfully');
        } catch (\Exception $e) {
            // Rollback the transaction if an exception occurs
            DB::rollback();
            // You can log the exception if needed
            \Log::error($e);
            // Redirect back with an error message
            return redirect()->back()->with('failure', 'Failed to update blog. Please try again.');
        }
    }

    public function BlogsStatus(Request $request, $id){
        $data = $this->CategoryRepository->findBlogsById($id);
        $data->status = ($data->status == 1) ? 0 : 1;
        $data->update();
        return response()->json([
            'status' => 200,
            'message' => 'Status updated',
        ]);
    }

    // public function BlogsUpdate(Request $request)
    // {
    //     // dd($request->all());
    //     $request->validate([
    //         'title' => 'required|string|max:25',
    //         'short_desc' => 'required|string',
    //         'long_desc'=> 'required | string ',
    //         'image' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif,svg|max:1000',
    //         'blog_cat' => 'required|string|max:25',
    //         'page_title' => 'required |string',
    //        'upoaded_by'=>'required | string '
    //     ], [
    //         'image.max' => 'The image must not be greater than 1MB.',
    //     ]);

    //     $blogs = Blogs::findOrFail($request->id);
    //     $blogs->title = $request->title;
    //     $blogs->slug = slugGenerateUpdate($request->title, "blogs", $request->id);
    //     $blogs->short_desc = $request->short_desc;
    //     $blogs->long_desc = $request->short_desc;
        
    //     $blogs->blog_categories = $request->blog_cat ?? '';
    //     $blogs->page_title = $request->page_title ?? '';
    //     $blogs->uploaded_by = $request->uploaded_by ?? '';
       

    //     // image upload
    //     if (isset($request->image)) {
    //         $file = $request->file('image');
    //         $fileExtention = time().rand(10000,99999).$file->getClientOriginalExtension();
    //         $imgPath = public_path('blogs.uploads');
    //         $file->move($imgPath,$fileExtention);

    //         $blogs->image = $fileExtention;
    //     }
    //     else{
    //         $blogs->image = $request->old_img_blog;
    //     }
    //     $blogs->save();

    //     return redirect()->route('admin.blogs.list.all')->with('success', 'Blogs updated');
    // }
   




   

}
