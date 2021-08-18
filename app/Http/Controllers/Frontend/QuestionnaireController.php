<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Middleware\Authenticate;
use App\Models\Donor\Donor;
use App\Models\User\User;
use App\Http\Controllers\Controller;
use App\Models\Questionnaire\Questionnaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionnaireController extends FrontendController
{

    public function questionnaire(Request $request)
    {


        if ($request->isMethod('get')) {
            return view($this->frontendPath . 'questionnaire.questionnaire', $this->data);
        }
        if ($request->isMethod('post')) {


            $this->validate($request, [
                'name' => 'required',
                'password' => 'required'

            ]);
            $name = $request->name;
            $password = $request->password;
            if (Auth::guard('questionnaire')->attempt([
                'name' => $name, 'password' => $password, 'status' => 1
            ])) {
                return redirect()->intended(route('add-donor'));
            } else {

                return redirect()->back()->with('error', 'You are not allowed to donate blood');
            }
        }
    }


    public function addDonor(Request $request)
    {
        if ($request->isMethod('get')) {
            return view($this->frontendPath . 'Donor.add-donor', $this->data);
        }

        if ($request->isMethod('post')) {


            if (Donor::where('posted_by', auth()->id())->count() >= 1) {
                return redirect()->back()->with('error', 'you have already donated blood ');
            } else {


                $id = $request->id;
                //    echo "$id";
                //    die();
                $this->validate($request, [
                    'donor_name' => 'required|min:3|max:30|unique:donors,donor_name|regex:/[a-z]{3}/',
                    'email' => 'required|email|unique:donors,email',
                    'address' => 'required|min:3|max:11',
                    'lat1' => 'required',
                    'lon1' => 'required',
                    'sex' => 'required',
                    'bloodtype' => 'required',
                    'phone' => 'required|regex:/(98)[0-9]{8}/|max:10|unique:donors,phone',
                ]);

                $donorData['donor_name'] = $request->donor_name;
                $donorData['email'] = $request->email;
                $donorData['address'] = $request->address;
                $donorData['lat1'] = $request->lat1;
                $donorData['lon1'] = $request->lon1;
                $donorData['bloodtype'] = $request->bloodtype;
                $donorData['sex'] = $request->sex;
                $donorData['phone'] = $request->phone;
                //    echo "$donorData";
                //         die();
                $donorData['posted_by'] = Auth::guard('web')->user()->id;

 
                if (Donor::create($donorData)) {
                    return redirect()->route('show-donor')->with('success', 'donor data inserted successfully');
                } else {
                    return redirect()->back()->with('error', 'Data was not updated');
                }
            }
        }
    }


    public
    function showDonor()
    {

        $user = Auth::user();
        // $posts = Donor::user();

        //  $posts=Donor::all();
// echo $user;
        $posts = Donor::where('posted_by', auth()->id())->get();
// echo $posts;
// die();

        return view($this->frontendPath . 'Donor.show-donor', compact('user', 'posts'));


        //        $userData = Donor::orderBy('id', 'desc')->get();
        //        $this->data('usersData', $userData);
        //
        ////        $this->data('title', $this->makeTitle('home'));
        //
        //        return view($this->frontendPath . 'Donor.show-donor', $this->data);

    }



    public function deleteDonorProfile(Request $request)
    {

        //        $id = $request->criteria;
        //        $data=Donor::find($id);
        //echo $data;
        //die();
        //        if (Donor::findorfail($id)->delete()) {
        //            return redirect()->back()->with('error', 'Data successfully delete');
        //
        //        }


    }




    public function logout()
    {
        Auth::guard('questionnaire')->logout();

        return redirect()->intended(route('questionnaire'))->with('success', 'Successfully logout form donor page ');
    }
}
