<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\HomeSlide;
use App\Models\protfolio;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class portfolioController extends Controller
{
    public function AllPortfolio()
    {

        $portfolio = protfolio::latest()->get();
        return view('admin.portfolio.portfolio_all', compact('portfolio'));

    }// End Methode

    public function AddPortfolio()
    {
        return view('admin.portfolio.portfolio_add');

    }// End Methode

    public function StorePortfolio(Request $request)
    {

        $request->validate([
            'portfolio_name' => 'required',
            'portfolio_title' => 'required',
            'portfolio_image' => 'required',

        ], [
            'portfolio_name.required' => 'Portfolio Name is Required ',
            'portfolio_title.required' => 'Portfolio Title is Required ',

        ]);

        $image = $request->file('portfolio_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(1020, 519)->save('upload/portfolio/' . $name_gen);
        $save_url = 'upload/portfolio/' . $name_gen;

        protfolio::insert([
            'portfolio_name' => $request->portfolio_name,
            'portfolio_title' => $request->portfolio_title,
            'portfolio_image' => $save_url,
            'portfolio_description' => $request->portfolio_description,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Portfolio Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.portfolio')->with($notification);

    }// end methode

    public function EditPortfolio($id)
    {
        $portfolio = protfolio::findOrFail($id);
        return view('admin.portfolio.portfolio_edit', compact('portfolio'));

    }// end methode

    public function UpdatePortfolio(Request $request)
    {

        $portfolio_id = $request->id;

        if ($request->file('portfolio_image')) {

            $image = $request->file('portfolio_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(1020, 519)->save('upload/portfolio/' . $name_gen);
            $save_url = 'upload/portfolio/' . $name_gen;

            protfolio::findOrFail($portfolio_id)->update([
                'portfolio_name' => $request->portfolio_name,
                'portfolio_title' => $request->portfolio_title,
                'portfolio_image' => $save_url,
                'portfolio_description' => $request->portfolio_description,
            ]);
            $notification = array(
                'message' => 'Portfolio Updated With Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.portfolio')->with($notification);

        } else {

            protfolio::findOrFail($portfolio_id)->update([
                'portfolio_name' => $request->portfolio_name,
                'portfolio_title' => $request->portfolio_title,
                'portfolio_description' => $request->portfolio_description,
            ]);
            $notification = array(
                'message' => 'Portfolio Updated Without Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.portfolio')->with($notification);

        }
    } // End Methode

    public function DeletePortfolio($id){

        $portfolio = protfolio::findOrFail($id);
        $img= $portfolio->portfolio_image;
        unlink($img);

        protfolio::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Portfolio Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.portfolio')->with($notification);



    }// End Methode
}
