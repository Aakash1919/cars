<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Brand;
use App\Models\Condtion;
use App\Models\Category;
use App\Models\BodyType;
use App\Models\FuelType;
use App\Models\TransmissionType;
use App\Models\Generalsetting as GS;
use App\Models\CarImage;
use App\Models\BrandModel;
use Validator;
use Auth;
use Datatables;

class CarController extends Controller
{
    //*** JSON Reques
    public function datatables($type)
    {
         $datas = [];
         if ($type == 'all') {
           $datas = Car::orderBy('id','desc')->get();
         } else if ($type == 'featured') {
           $datas = Car::where('featured', 1)->orderBy('id','desc')->get();
         } else if ($type == 'approved') {
           $datas = Car::where('admin_status', 1)->orderBy('id','desc')->get();
         } else if ($type == 'pending') {
           $datas = Car::where('admin_status', 2)->orderBy('id','desc')->get();
         } else if ($type == 'rejected') {
           $datas = Car::where('admin_status', 0)->orderBy('id','desc')->get();
         }

         //--- Integrating This Collection Into Datatables
         return Datatables::of($datas)
                           ->editColumn('title', function(Car $data) {
                               $title = strlen($data->title) > 20 ? substr($data->title, 0, 20) . '...' : $data->title;
                               return '<strong>'.$title.'</strong>';
                           })
                           ->editColumn('seller', function(Car $data) {
                               return '<strong>'.$data->user->username.'</strong>';
                           })
                           ->editColumn('brand', function(Car $data) {
                               return '<span>'.$data->brand->name.'</span>';
                           })
                          ->addColumn('feature', function(Car $data) {
                              $class = $data->featured == 1 ? 'drop-success' : 'drop-danger';
                              $s = $data->status == 1 ? 'selected' : '';
                              $ns = $data->featured == 0 ? 'selected' : '';
                              return '<div class="action-list"><select class="process select droplinks '.$class.'"><option data-val="1" value="'. route('admin.car.featured',['id1' => $data->id, 'id2' => 1]).'" '.$s.'>Feature</option><option data-val="0" value="'. route('admin.car.featured',['id1' => $data->id, 'id2' => 0]).'" '.$ns.'>Unfeature</option></select></div>';
                          })
                          ->addColumn('status', function(Car $data) {
                              if ($data->admin_status == 0) {
                                $class = 'drop-danger';
                              } elseif ($data->admin_status == 2) {
                                $class = 'drop-pending';
                              } else {
                                $class = 'drop-success';
                              }
                              $s = $data->admin_status == 1 ? 'selected' : '';
                              $ps = $data->admin_status == 2 ? 'selected' : '';
                              $ns = $data->admin_status == 0 ? 'selected' : '';
                              return '<div class="action-list"><select class="process select droplinks '.$class.'"><option data-val="1" value="'. route('admin.car.status',['id1' => $data->id, 'id2' => 1]).'" '.$s.'>Approve</option><option data-val="2" value="'. route('admin.car.status',['id1' => $data->id, 'id2' => 2]).'" '.$ps.'>Pending</option><option data-val="0" value="'. route('admin.car.status',['id1' => $data->id, 'id2' => 0]).'" '.$ns.'>Reject</option></select></div>';
                          })
                          ->addColumn('action', function(Car $data) {
                              return '<div class="action-list"><a href="' . route('admin.car.edit',$data->id) . '" class="edit"> <i class="fas fa-edit"></i>Edit</a><a href="javascript:;" data-href="' . route('admin.car.delete',$data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i></a></div>';
                          })
                          ->rawColumns(['title', 'seller', 'brand', 'feature', 'status','action'])
                          ->toJson(); //--- Returning Json Data To Client Side
    }

    //*** GET Request
    public function index()
    {
        return view('admin.car.index');
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
        return view('admin.car.edit',$data);
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
        'brand_model_id' => 'required',
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


    //*** GET Request Status
    public function status($id1,$id2)
    {
        $gs = GS::first();

        $data = Car::findOrFail($id1);
        $data->admin_status = $id2;
        $data->update();

        $headers = "From: $gs->from_name <$gs->from_email> \r\n";
        $headers .= "Reply-To: $gs->from_name <$gs->from_email> \r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

        if ($id2 == 1) {
          $message = "Your ad is published.<br /><strong>Ad Title: </strong><a href='".url("/details/$data->id")."'>".$data->title."</a>";

          @mail($data->user->email,"Ad published", $message, $headers);
        } elseif ($id2 == 0) {
          $message = "Your ad is rejected.<br /><strong>Ad Title: </strong><a href='".url("/details/$data->id")."'>".$data->title."</a>";

          @mail($data->user->email,"Ad Rejected", $message, $headers);
        }
    }

    //*** GET Request Status
    public function featured($id1,$id2)
    {
        $gs = GS::first();

        $data = Car::findOrFail($id1);
        $data->featured = $id2;
        $data->update();

        $headers = "From: $gs->from_name <$gs->from_email> \r\n";
        $headers .= "Reply-To: $gs->from_name <$gs->from_email> \r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

        if ($id2 == 1) {
          $message = "Your ad is featured.<br /><strong>Ad Title: </strong><a href='".url("/details/$data->id")."'>".$data->title."</a>";

          @mail($data->user->email,"Ad Featured", $message, $headers);
        } elseif ($id2 == 0) {
          $message = "Your ad is unfeatured.<br /><strong>Ad Title: </strong><a href='".url("/details/$data->id")."'>".$data->title."</a>";

          @mail($data->user->email,"Ad Unfeatured", $message, $headers);
        }
    }

    public function getModels($brandid) {
      $models = BrandModel::where('brand_id', $brandid)->where('status', 1)->get();
      return $models;
    }
}
