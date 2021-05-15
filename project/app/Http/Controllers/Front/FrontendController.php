<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Blog;
use App\Models\Subscriber;
use App\Models\AboutImg;
use App\Models\User;
use App\Models\Faq;
use App\Models\Page;
use App\Models\Brand;
use App\Models\Condtion;
use App\Models\Pricing;
use App\Models\Specification;
use App\Models\BlogCategory;
use App\Models\BodyType;
use App\Models\FuelType;
use App\Models\TransmissionType;
use App\Models\Car;
use App\Models\Generalsetting;
use App\Models\Pagesetting as PS;
use App\Models\Category;
use App\Models\Testimonial;
use App\Classes\GeniusMailer;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Validator;

class FrontendController extends Controller
{

		public function home() {

			$data['testimonials'] = Testimonial::orderBy('id', 'DESC')->get();
			$data['blogs'] = Blog::orderBy('id', 'DESC')->limit(9)->get();
			$data['brands'] = Brand::where('status', 1)->get();
			$data['conditions'] = Condtion::where('status', 1)->get();
			$data['pricings'] = Pricing::all();
			$data['lcars'] = Car::where('admin_status', 1)->where('status', 1)->orderBy('id', 'DESC')->limit(6)->get();
			$data['fcars'] = Car::where('admin_status', 1)->where('status', 1)->where('featured', 1)->orderBy('id', 'DESC')->limit(6)->get();
			return view('front.home', $data);
		}

		public function about() {
			$skills = Skill::orderBy('marks', 'DESC')->get();
			$aboutimgs = AboutImg::orderBy('id', 'DESC')->get();
			$specs = Specification::all();
			return view('front.about', compact('skills', 'specs', 'aboutimgs'));
		}

		public function faq() {
			$data['faqs'] = Faq::all();
			return view('front.faq', $data);
		}

		public function contact() {
			return view('front.contact');
		}

		public function dynamicPage($slug) {
      $data['menu'] = Page::where('slug', $slug)->first();
      return view('front.dynamic', $data);
    }

		public function sendmail(Request $request) {
			$rules = [
				'name' => 'required',
				'email' => 'required|email',
				'subject' => 'required',
				'message' => 'required',
			];

			$validator = Validator::make($request->all(), $rules);
			if ($validator->fails()) {
				return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
			}

			$ps = PS::first();

			$name = $request->name;
			$from = $request->email;
			$to = $ps->contact_email;
			$subject = $request->subject;

			$headers = "From: $name <$from> \r\n";
			$headers .= "Reply-To: $name <$from> \r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

			$message = $request->message;

			@mail($to, $subject, $message, $headers);

			return response()->json("Mail sent successfully!");
		}

		public function prices($id) {
			$pricing = Pricing::find($id);
			return $pricing;
		}

		public function cars(Request $request) {

			$data['brands'] = Brand::where('status', 1)->get();
      $data['cats'] = Category::where('status', 1)->get();
      $data['conditions'] = Condtion::where('status', 1)->get();
      $data['btypes'] = BodyType::where('status', 1)->get();
      $data['ftypes'] = FuelType::where('status', 1)->get();
      $data['ttypes'] = TransmissionType::where('status', 1)->get();

			$data['minprice'] = Car::min('regular_price');
			$data['maxprice'] = Car::max('regular_price');

			$minprice = $request->minprice;
			$maxprice = $request->maxprice;
			$category = $request->category_id;
			$brands = $request->brand_id;
			$ftype = $request->fuel_type_id;
			$ttype = $request->transmission_type_id;
			$condition = $request->condition_id;
			$sort = !empty($request->sort) ? $request->sort : 'desc';
			$view = !empty($request->view) ? $request->view : 10;
			$type = !empty($request->type) ? $request->type : 'all';

			$data['cars'] = Car::when($category, function ($query, $category) {
					                    return $query->where('category_id', $category);
					                })
													->when($minprice, function($query, $minprice) {
														return $query->where('search_price', '>=', $minprice);
													})
													->when($maxprice, function($query, $maxprice) {
														return $query->where('search_price', '<=', $maxprice);
													})
													->when($brands, function($query, $brands) {
														return $query->whereIn('brand_id', $brands);
													})
													->when($ftype, function ($query, $ftype) {
															return $query->where('fuel_type_id', $ftype);
													})
													->when($ttype, function ($query, $ttype) {
															return $query->where('transmission_type_id', $ttype);
													})
													->when($condition, function ($query, $condition) {
															return $query->where('condtion_id', $condition);
													})
													->when($sort, function ($query, $sort) {
															if ($sort == 'desc') {
																return $query->orderBy('id', 'DESC');
															} elseif ($sort == 'asc') {
																return $query->orderBy('id', 'ASC');
															} elseif ($sort == 'price_desc') {
																return $query->orderBy('search_price', 'DESC');
															} elseif ($sort == 'price_asc') {
																return $query->orderBy('search_price', 'ASC');
															}
													})
													->when($type, function ($query, $type) {
														if ($type == 'featured') {
															return $query->where('featured', 1);
														}
													})
													->where('status', 1)->where('admin_status', 1)->paginate($view);

			return view('front.cars', $data);
		}

		public function details($id) {
			$car = Car::findOrFail($id);

			if ($car->admin_status == 1 && $car->status == 1) {
				$car->views = $car->views + 1;
				$car->save();

				$simCars = Car::where('category_id', $car->category_id)->where('status', 1)->where('admin_status', 1)->limit(5)->get();
				$data['simCars'] = $simCars;

				$data['car'] = $car;
				return view('front.details', $data);
			} else {
				return back();
			}

		}

		public function checkvalidity() {
			$gs = Generalsetting::first();
			$users = User::all();
			foreach ($users as $key => $user) {
				if (!empty($user->expired_date)) {

					$exdate = new \Carbon\Carbon($user->expired_date);
					$today = new \Carbon\Carbon(Carbon::now());
					$diff = $exdate->diffInDays(Carbon::now());


					if (($diff+1) == 5) {
						// send mail to expired models
						$to = $user->email;
						$subject = 'Subscription Expiration Alert!';
						$msg = "Your subscription package will be expired after 5 days. Please buy new subscription package.";

						if($gs->is_smtp == 1)
		        {
		        $data = [
		            'to' => $to,
		            'type' => "expiration_alert",
		            'mname' => $user->last_name,
		            'aname' => "",
		            'aemail' => "",
		            'wtitle' => $gs->title,
		        ];

			        $mailer = new GeniusMailer();
			        $mailer->sendAutoMail($data);
						} else {
							//Sending Email To Customer
							$headers = "From: ".$gs->from_name."<".$gs->from_email.">";
							mail($to,$subject,$msg,$headers);
						}

					}
					$today = new \Carbon\Carbon(Carbon::now());
					if ($today->gte($exdate)) {
						$user->current_plan = NULL;
						$user->ads = 0;
						$user->expired_date = NULL;
						$user->save();


						// send mail to expired models
						$to = $user->email;
		        $subject = 'Subscription Package Expired!';
		        $msg = "Your subscription package is expired. Please buy new subscription package.";

						//Sending Email To Customer
	        	$headers = "From: ".$gs->from_name."<".$gs->from_email.">";
	        	mail($to,$subject,$msg,$headers);

					}
				}
			}
		}

		// -------------------------------- BLOG SECTION ----------------------------------------

			public function blog(Request $request)
			{
				$blogs = Blog::orderBy('id', 'DESC')->paginate(3);
		            if($request->ajax()){
		                return view('front.pagination.blog',compact('blogs'));
		            }
				$bcats = BlogCategory::all();
				$tags = null;
				$tagz = '';
				$name = Blog::pluck('tags')->toArray();
				foreach($name as $nm)
				{
						$tagz .= $nm.',';
				}
				$tags = array_unique(explode(',',$tagz));

				return view('front.blog',compact('blogs', 'bcats', 'tags'));
			}

			public function subscribe(Request $request)
			{
				//--- Validation Section
        $rules = [
            'email'      => 'required|unique:subscribers',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends

				$subsc = new Subscriber;
				$subsc->email = $request->email;
				$subsc->save();

				return response()->json("You are subscribed successfully!");
			}

		    public function blogcategory(Request $request, $slug)
		    {
		        $bcat = BlogCategory::where('slug', '=', str_replace(' ', '-', $slug))->first();
		        $blogs = $bcat->blogs()->orderBy('id', 'DESC')->paginate(3);
						$bcats = BlogCategory::all();
		            if($request->ajax()){
		                return view('front.pagination.blog',compact('blogs'));
		            }
						$tags = null;
						$tagz = '';
						$name = Blog::pluck('tags')->toArray();
						foreach($name as $nm)
						{
								$tagz .= $nm.',';
						}
						$tags = array_unique(explode(',',$tagz));

		        return view('front.blog',compact('bcats', 'bcat','blogs','tags'));
		    }
		    public function blogtags(Request $request, $slug)
		    {
						$bcat = BlogCategory::where('slug', '=', str_replace(' ', '-', $slug))->first();
		        $blogs = Blog::where('tags', 'like', '%' . $slug . '%')->orderBy('id', 'DESC')->paginate(3);
		            if($request->ajax()){
		                return view('front.pagination.blog',compact('blogs'));
		            }
						$bcats = BlogCategory::all();
						$tags = null;
						$tagz = '';
						$name = Blog::pluck('tags')->toArray();
						foreach($name as $nm)
						{
								$tagz .= $nm.',';
						}
						$tags = array_unique(explode(',',$tagz));

		        return view('front.blog',compact('bcats', 'bcat','blogs','tags', 'slug'));
		    }
		    public function blogsearch(Request $request)
		    {
		        $search = $request->search;
		        $blogs = Blog::where('title', 'like', '%' . $search . '%')->orWhere('details', 'like', '%' . $search . '%')->paginate(3);
		            if($request->ajax()){
		                return view('front.pagination.blog',compact('blogs'));
		            }
						$bcats = BlogCategory::all();
						$tags = null;
						$tagz = '';
						$name = Blog::pluck('tags')->toArray();
						foreach($name as $nm)
						{
								$tagz .= $nm.',';
						}
						$tags = array_unique(explode(',',$tagz));
		        return view('front.blog',compact('bcats','blogs','tags', 'search'));
		    }

		    public function blogshow($id)
		    {
		        $tags = null;
		        $tagz = '';
		        $bcats = BlogCategory::all();
		        $blog = Blog::findOrFail($id);
		        $blog->views = $blog->views + 1;
		        $blog->update();
		        $name = Blog::pluck('tags')->toArray();
		        foreach($name as $nm)
		        {
		            $tagz .= $nm.',';
		        }
		        $tags = array_unique(explode(',',$tagz));

		        $blog_meta_tag = $blog->meta_tag;
		        $blog_meta_description = $blog->meta_description;
		        return view('front.blogshow',compact('blog','bcats','tags','blog_meta_tag','blog_meta_description'));
		    }


		// -------------------------------- BLOG SECTION ENDS----------------------------------------
}
