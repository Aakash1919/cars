<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Brand;
use App\Models\Condtion;
use App\Models\Category;
use App\Models\BodyType;
use App\Models\FuelType;
use App\Models\TransmissionType;
use App\Models\CarImage;
use App\Models\BrandModel;
use App\Models\Plan;
use Validator;
use Auth;
use Datatables;
use DB;

class CarController extends Controller
{
    //*** JSON Reques
    public function datatables(Request $request)
    {
         if ($request->type == 'featured') {
           $datas = Car::where('user_id', Auth::user()->id)->where('featured', 1)->orderBy('id','desc')->get();
         } else {
           $datas = Car::where('user_id', Auth::user()->id)->orderBy('id','desc')->get();
         }

         $data = DB::table('languages')->where('is_default','=',1)->first();
        $data_results = file_get_contents(public_path().'/assets/languages/'.$data->file);
        $lang = json_encode($data_results);

        $langg = json_decode($lang, true);
        $langgg = json_decode($langg, true);

         //--- Integrating This Collection Into Datatables
         return Datatables::of($datas)
                           ->editColumn('title', function(Car $data) {
                               $title = strlen($data->title) > 20 ? substr($data->title, 0, 20) . '...' : $data->title;
                               return '<strong>'.$title.'</strong>';
                           })
                           ->editColumn('brand', function(Car $data) {
                               return '<span>'.$data->brand->name.'</span>';
                           })
                           ->editColumn('model', function(Car $data) {
                               return '<span>'.$data->brand_model->name.'</span>';
                           })
                           ->editColumn('featured', function(Car $data) use ($langgg) {
                               if ($data->featured == 1) {
                                 return '<span class="badge badge-success">'.$langgg['lang88'].'</span>';
                               } else {
                                 return '<span class="badge badge-danger">'.$langgg['lang89'].'</span>';
                               }
                           })
                          ->addColumn('status', function(Car $data) use ($langgg) {
                              $class = $data->status == 1 ? 'drop-success' : 'drop-danger';
                              $s = $data->status == 1 ? 'selected' : '';
                              $ns = $data->status == 0 ? 'selected' : '';
                              return '<div class="action-list"><select class="process select droplinks '.$class.'"><option data-val="1" value="'. route('user.car.status',['id1' => $data->id, 'id2' => 1]).'" '.$s.'>'.$langgg['lang94'].'</option><option data-val="0" value="'. route('user.car.status',['id1' => $data->id, 'id2' => 0]).'" '.$ns.'>'.$langgg['lang95'].'</option></select></div>';
                          })
                          ->addColumn('action', function(Car $data) use ($langgg) {
                              return '<div class="action-list"><a href="' . route('user.car.edit',$data->id) . '" class="edit"> <i class="fas fa-edit"></i>'.$langgg['lang90'].'</a><a href="javascript:;" data-href="' . route('user.car.delete',$data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i></a></div>';
                          })
                          ->rawColumns(['title', 'brand', 'model', 'featured', 'status','action'])
                          ->toJson(); //--- Returning Json Data To Client Side
    }

    //*** GET Request
    public function index($type=null)
    {

        $data['type'] = $type;
        return view('user.car.index', $data);
    }

    public function create() {
      $data['brands'] = Brand::where('status', 1)->get();
      $data['cats'] = Category::where('status', 1)->get();
      $data['conditions'] = Condtion::where('status', 1)->get();
      $data['btypes'] = BodyType::where('status', 1)->get();
      $data['ftypes'] = FuelType::where('status', 1)->get();
      $data['ttypes'] = TransmissionType::where('status', 1)->get();
      $data['boughtPlan'] = Plan::find(Auth::user()->current_plan);
      return view('user.car.create', $data);
    }

    public function store(Request $request)
    {
      if (Auth()->user()->ads == 0) {
        $msg = 'You have to buy a package to post ad.';
        return response()->json($msg);
      }

      $messages = [
        'label.*.required' => 'Specification label cannot be blank',
        'value.*.required' => 'Specification value cannot be blank',
        'brand_id.required' => 'Brand is required',
        'brand_model_id.required' => 'Model is required',
        'condtion_id.required' => 'Condtion is required',
      ];

      //--- Validation Section
      $rules = [
        'title' => 'required',
        'brand_id' => 'required',
        'top_speed' => 'required|numeric',
        'brand_model_id' => 'required',
        'currency_code' => 'required|max:20',
        'currency_symbol' => 'required',
        'regular_price' => 'required',
        'condtion_id' => 'required',
        'description' => 'required',
        'featured_image' => 'required',
        'images' => 'required',
        'year' => 'required|integer',
        'mileage' => 'required|numeric',
        'label.*' => 'required',
        'value.*' => 'required',
      ];

      $validator = Validator::make($request->all(), $rules, $messages);

      if ($validator->fails()) {
        return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
      }
      //--- Validation Section Ends

        $in = $request->all();
        $in['user_id'] = Auth::user()->id;
        if ($request->filled('featured_image')) {
          $image = $request->featured_image;
          list($type, $image) = explode(';', $image);
          list(, $image)      = explode(',', $image);
          $image = base64_decode($image);
          $image_name = uniqid().'.jpg';

          $path = 'assets/front/images/cars/featured/'.$image_name;
          file_put_contents($path, $image);

          $in['featured_image'] = $image_name;
        }
        if ($request->filled('sale_price')) {
          $in['search_price'] = $request->sale_price;
        } else {
          $in['search_price'] = $request->regular_price;
        }
        $in['label'] = json_encode($request->label);
        $in['value'] = json_encode($request->value);
        $car = Car::create($in);

        if ($request->filled('images')) {
          $imgs = [];
          $imgs = $request->images;
          foreach ($imgs as $key => $img) {
            list($type, $img) = explode(';', $img);
            list(, $img)      = explode(',', $img);
            $img = base64_decode($img);
            $img_name = uniqid().'.jpg';

            $path = 'assets/front/images/cars/sliders/'.$img_name;
            file_put_contents($path, $img);

            $carimg = new CarImage;
            $carimg->car_id = $car->id;
            $carimg->image = $img_name;
            $carimg->save();
          }
        }

        $user = Auth::user();
        $user->ads = $user->ads - 1;
        $user->save();

        $msg = 'Car Added Successfully.';
        return response()->json($msg);
    }

    //*** GET Request
    public function edit($id)
    {
        $data['brands'] = Brand::where('status', 1)->get();
        $data['cats'] = Category::where('status', 1)->get();
        $data['conditions'] = Condtion::where('status', 1)->get();
        $data['btypes'] = BodyType::where('status', 1)->get();
        $data['ftypes'] = FuelType::where('status', 1)->get();
        $data['ttypes'] = TransmissionType::where('status', 1)->get();
        $car = Car::findOrFail($id);
        $data['car']  = $car;
        $data['labels'] = json_decode($car->label, true);
        $data['values'] = json_decode($car->value, true);
        // return $data['labels'];
        return view('user.car.edit',$data);
    }


    public function update(Request $request)
    {
      $images = is_array($request->images) ? $request->images : [];
      $imagesdb = is_array($request->imagesdb) ? $request->imagesdb : [];

      $messages = [
        'label.*.required' => 'Specification label cannot be blank',
        'value.*.required' => 'Specification value cannot be blank',
        'brand_id.required' => 'Brand is required',
        'brand_model_id.required' => 'Model is required',
        'condtion_id.required' => 'Condtion is required',
      ];

      //--- Validation Section
      $rules = [
        'title' => 'required',
        'brand_id' => 'required',
        'top_speed' => 'required|numeric',
        'brand_model_id' => 'required',
        'currency_code' => 'required|max:20',
        'currency_symbol' => 'required',
        'regular_price' => 'required',
        'condtion_id' => 'required',
        'description' => 'required',
        'featured_image' => 'required',
        'images_helper' => [
            function ($attribute, $value, $fail) use ($images, $imagesdb) {
                if (count($images) + count($imagesdb) == 0) {
                    $fail("Slider image is required");
                }
            },
        ],
        'year' => 'required|integer',
        'mileage' => 'required|numeric',
        'label.*' => 'required',
        'value.*' => 'required',
      ];

      $validator = Validator::make($request->all(), $rules, $messages);

      if ($validator->fails()) {
        return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
      }
      //--- Validation Section Ends

        $car = Car::find($request->car_id);
        $in = $request->all();
        if ($request->filled('featured_image')) {
          if ($request->featured_image != $car->featured_image) {
            $image = $request->featured_image;
            list($type, $image) = explode(';', $image);
            list(, $image)      = explode(',', $image);
            $image = base64_decode($image);
            $image_name = uniqid().'.jpg';

            $path = 'assets/front/images/cars/featured/'.$image_name;
            file_put_contents($path, $image);
            @unlink('assets/front/images/cars/featured/'.$car->featured_image);

            $in['featured_image'] = $image_name;
          }
        }
        if ($request->filled('sale_price')) {
          $in['search_price'] = $request->sale_price;
        } else {
          $in['search_price'] = $request->regular_price;
        }
        $in['label'] = json_encode($request->label);
        $in['value'] = json_encode($request->value);

        $car->fill($in)->save();

        // bring all the product images of that product
        $carimgs = CarImage::where('car_id', $car->id)->get();


        // then check whether a filename is missing in imgsdb if it is missing remove it from database and unlink it
        foreach($carimgs as $carimg) {
          if(!in_array($carimg->image, $request->imagesdb)) {
              @unlink('assets/front/images/cars/sliders/'.$carimg->image);
              $carimg->delete();
          }
        }

        if ($request->filled('images')) {
          $imgs = [];
          $imgs = $request->images;
          foreach ($imgs as $key => $img) {
            list($type, $img) = explode(';', $img);
            list(, $img)      = explode(',', $img);
            $img = base64_decode($img);
            $img_name = uniqid().'.jpg';

            $path = 'assets/front/images/cars/sliders/'.$img_name;
            file_put_contents($path, $img);

            $carimg = new CarImage;
            $carimg->car_id = $car->id;
            $carimg->image = $img_name;
            $carimg->save();
          }
        }
        $msg = 'Car Updated Successfully.';
        return response()->json($msg);
    }


    //*** GET Request Delete
    public function destroy($id)
    {
        $data = Car::findOrFail($id);

        @unlink('assets/front/images/cars/featured/'.$ci->featured_image);
        foreach ($data->car_images as $key => $ci) {
          @unlink('assets/front/images/cars/sliders/'.$ci->image);
          $ci->delete();
        }

        $data->delete();
        //--- Redirect Section
        $msg = 'Data Deleted Successfully.';
        return response()->json($msg);
        //--- Redirect Section Ends
    }

    //*** GET Request Status
    public function status($id1,$id2)
    {
        $data = Car::findOrFail($id1);
        $data->status = $id2;
        $data->update();
    }

    public function getModels($brandid) {
      $models = BrandModel::where('brand_id', $brandid)->where('status', 1)->get();
      return $models;
    }
}
