<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\HomeSlide;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class HomeSliderController extends Controller
{
    public function homeSlide()
    {
        $homeSlide = HomeSlide::find(1);
        return view('admin.home_slide.home_slide_all', [
            'homeSlide' => $homeSlide,
        ]);
    }

    public function updateSlide(Request $request)
    {
        $slide_id = $request->id;
        if ($request->file('home_slide')) {
            $image = $request->file('home_slide');
            $name_gen = hexdec(uniqid()). '.' . $image->getClientOriginalExtension(); // 12312423.jpg
            $manager = new ImageManager(new Driver());
            $img = $manager->read($request->file('home_slide'));
            $img = $img->resize(636, 852)->save('upload/home_slide/' . $name_gen);
            $save_url = 'upload/home_slide/' . $name_gen;

            HomeSlide::findOrFail($slide_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'video_url' => $request->video_url,
                'home_slide' => $save_url,
            ]);

            $notification = [
                'message' => 'Home Slide Updated with Image Successfully',
                'alert-type' => 'success'
            ];

            return redirect()->back()->with($notification);

        } else {
            HomeSlide::findOrFail($slide_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'video_url' => $request->video_url,
            ]);

            $notification = [
                'message' => 'Home Slide Updated withOUT Image Successfully',
                'alert-type' => 'success'
            ];

            return redirect()->back()->with($notification);
        }
    }
}
