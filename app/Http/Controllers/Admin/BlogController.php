<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\BlogUpdateCounter;
use App\Models\Blog;
use Image;
use Carbon\Carbon;
use Auth;
use DB;
class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $this->authorize('list', new Blog);
        $blogs = Blog::with('category')->orderBy('id','desc')->get();
        return view('admin.blog.index',compact('blogs'));
    }
    public function edit($id)
    {
        $this->authorize('edit', new Blog);
        $category = Category::all();
        $blog = Blog::find($id);
        // dd($blog->title);
        return view('admin.blog.edit_blog',compact('blog','category'));
    }
    public function create()
    {
        $this->authorize('add', new Blog);
        $category = Category::all();
        return view('admin.blog.create_blog',compact('category'));
    }
    public function category()
    {
        $category = Category::where("category_for",'blog')->get();
        return view('admin.blog.category',compact('category'));
    }
    public function delete($id)
    {
        $this->authorize('delete', new Blog);
        $blogPost = Blog::where('id',$id);
        $blogPost->delete();
        return redirect('admin/blog');
    }
    public function updateBlog($id,Request $request)
    {
        ini_set('memory_limit', '100192M');
        ini_set("post_max_size","6G");
        ini_set("upload_max_filesize","4G");
        $file = $request->file('image');
        // $pdo->query("SET wait_timeout=1200;");
         ini_set('wait_timeout', '12000');
         ini_set('memory_limit', '100192M');
        $blogPost = Blog::find($id);
        $blog_counter = BlogUpdateCounter::create([
            "blog_id"=>$id
        ]);
        $file = $request->file('image');
        if ($file!="") {
            $destinationPath = public_path('uploads/blog/');
            $imageName = time().'_5starunity.'.$file->getClientOriginalExtension();
            $file->move($destinationPath, $imageName);
            $blogPost->post_img = $imageName;
        }
            $blogPost->title=$request->get("title");
            $blogPost->description=$request->get("desc");
            $blogPost->seo_title = $request->get('mtitle');
            $blogPost->author = $request->get('author');
            $blogPost->seo_meta = $request->get('mtags');
            $blogPost->seo_meta_des = $request->get('mdesc');
            $blogPost->cat_id = $request->get('category');
            $blogPost->status = $request->get("status");
            $blogPost->short_desc = $request->get('short_desc');
            $blogPost->allow_cooments = "0";
            // $blogPost->post_author"=>Auth::guard('admin')->user()->id,
            $blogPost->post_name = str_replace(" ","-", strtolower($request->get("mtitle")));
            $blogPost->save();
            return redirect('admin/blog');
    }
    public function saveBlog(Request $request)
    {
        $this->authorize('add', new Blog);
        ini_set('memory_limit', '100192M');
        ini_set("post_max_size","10024M");
        ini_set("upload_max_filesize","20024M");
        $file = $request->file('image');
        $destinationPath = public_path('uploads/blog/');
        $imageName = time().'_5starunity.'.$file->getClientOriginalExtension();
        $file->move($destinationPath, $imageName);

        $lottery_id = Blog::create([
            "title" => $request->get("title"),
            "description"=>$request->get("desc"),
            "seo_title"=>$request->get('mtitle'),
            "seo_meta"=>$request->get('mtags'),
            "seo_meta_des"=>$request->get('mdesc'),
            "cat_id"=>$request->get('category'),
            "post_img"=>$imageName,
            "status"=>$request->get("status"),
            "allow_cooments"=>"0",
            "author"=>$request->get("author"),
            "short_desc"=>$request->get("short_desc"),
            "post_author"=>Auth::guard('admin')->user()->id,
            "post_name"=>$this->hyphenize(str_replace(".","",$request->get("title")))
        ]);
        return redirect('admin/blog');
    }

    public function hyphenize($string) {
        $dict = array(
            "I'm"      => "I am",
            "thier"    => "their",
            // Add your own replacements here
        );
        return strtolower(
            preg_replace(
              array( '#[\\s-]+#', '#[^A-Za-z0-9\. -]+#' ),
              array( '-', '' ),
              // the full cleanString() can be downloaded from http://www.unexpectedit.com/php/php-clean-string-of-utf8-chars-convert-to-similar-ascii-char
              $this->cleanString(
                  str_replace( // preg_replace can be used to support more complicated replacements
                      array_keys($dict),
                      array_values($dict),
                      urldecode($string)
                  )
              )
            )
        );
    }
    
   public function cleanString($text) {
        $utf8 = array(
            '/[áàâãªä]/u'   =>   'a',
            '/[ÁÀÂÃÄ]/u'    =>   'A',
            '/[ÍÌÎÏ]/u'     =>   'I',
            '/[íìîï]/u'     =>   'i',
            '/[éèêë]/u'     =>   'e',
            '/[ÉÈÊË]/u'     =>   'E',
            '/[óòôõºö]/u'   =>   'o',
            '/[ÓÒÔÕÖ]/u'    =>   'O',
            '/[úùûü]/u'     =>   'u',
            '/[ÚÙÛÜ]/u'     =>   'U',
            '/ç/'           =>   'c',
            '/Ç/'           =>   'C',
            '/ñ/'           =>   'n',
            '/Ñ/'           =>   'N',
            '/–/'           =>   '-', // UTF-8 hyphen to "normal" hyphen
            '/[’‘‹›‚]/u'    =>   ' ', // Literally a single quote
            '/[“”«»„]/u'    =>   ' ', // Double quote
            '/ /'           =>   ' ', // nonbreaking space (equiv. to 0x160)
        );
        return preg_replace(array_keys($utf8), array_values($utf8), $text);
    }
}
