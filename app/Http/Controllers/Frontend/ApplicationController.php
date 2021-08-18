<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Email\Email;
use App\Http\Controllers\Controller;
use App\Models\Bank\Bank;
use App\Models\BloodRequest\BloodRequest;
use App\Models\Donor\Donor;
use App\Models\NewDonor\NewDonor;
use App\Models\Questionnaire\Questionnaire;
use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends FrontendController
{

    public function index()
    {

        $userData = Bank::orderBy('id', 'desc')->paginate(2);
        $this->data('usersData', $userData);

        $this->data('title', $this->makeTitle('home'));

        return view($this->pagePath . 'home.home', $this->data);
    }

    public function contact()
    {
        $this->data('title', $this->makeTitle('welcome'));
        return view($this->pagePath . 'home.contact', $this->data);
    }

    public function about()
    {
        $this->data('title', $this->makeTitle('about'));
        return view($this->pagePath . 'home.about', $this->data);
    }

    public function services()
    {

        $userData = Bank::orderBy('id', 'desc')->paginate(2);
        $this->data('usersData', $userData);

        $donerData = Donor::orderBy('id', 'desc')->get();
        $this->data('donerData', $donerData);
        return view($this->pagePath . 'home.services', $this->data);
    }




    //    public function nearest()
    //    {
    //
    //
    //        return view($this->pagePath . 'home.nearest-donor', $this->data);
    //    }
    //
    //    public function nearest(Request $request)
    //    {
    //
    //             $fromlat= $request->lat2;
    //            $fromlon= $request->lon2;
    //
    //
    //
    //
    //        $donerData = Donor::all();
    //        $this->data('donerData', $donerData);
    //        return view($this->pagePath . 'home.nearest-donor',$this->data
    //            , compact(['donerData','fromlat','fromlon'])
    //);


    //
    //        $donerData = Donor::orderBy('id', 'desc')->get();
    //        $this->data('donerData', $donerData);
    //        return view($this->pagePath . 'home.services', $this->data);
    //    }
    public function nearest(Request $request)
    {
        $fromlat = $request->get('lat2');
        $fromlon = $request->get('lon2');
        $donerData = Donor::orderBy('lat1', 'desc')->get();
        $user = User::all();
        //        $users=User::where('id','=', auth()->id());

        //echo $users;
        //die();
        $this->data('donerData', $donerData);
        $this->data('user', $user);
        $this->data('fromlon', $fromlon);
        $this->data('fromlat', $fromlat);


        return view(
            $this->pagePath . 'home.nearest-donor',
            $this->data,
            compact('donerData', 'user', 'fromlat', 'fromlon')
        );
    }


    public function addBloodRequest(Request $request)
    {

        if ($request->isMethod('get')) {

            //            $userData = BloodRequest::orderBy('id', 'desc')->get();
            //            $this->data('usersData', $userData);


            return view($this->frontendPath . 'users.blood-request-form', $this->data);
        }
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'name' => 'required|min:3|max:10|regex:/[a-z]/',
                'hospital_name' => 'required|regex:/[a-z]/',
                'hospital_location' => 'required|regex:/[a-z]/',
                'contact_number' => 'required|regex:/(98)[0-9]{8}/|max:10',
                'pint' => 'required|regex:/[1-9]/|max:1',
                'sex' => 'required',
                'bloodtype' => 'required',
                'date' => 'required'

            ]);

            $data['name'] = $request->name;
            $data['hospital_name'] = $request->hospital_name;
            $data['hospital_location'] = $request->hospital_location;
            $data['contact_number'] = $request->contact_number;
            $data['pint'] = $request->pint;
            $data['sex'] = $request->sex;
            $data['bloodtype'] = $request->bloodtype;
            $data['date'] = $request->date;


            if (BloodRequest::create($data)) {
                return redirect()->route('show-blood-request')->with('success', 'Data was inserted successfully');
            } else {
                return redirect()->back()->with('error', 'Data was not inserted');
            }
        }
    }

    public function showBloodRequest(Request $request)
    {


        $userData = BloodRequest::orderBy('id', 'desc')->paginate(7);
        $this->data('usersData', $userData);

        return view($this->frontendPath . 'users.show-request-form', $this->data);
    }


    public function register(Request $request)
    {
        if ($request->isMethod('get')) {
            $this->data('title', $this->makeTitle('register'));
            return view($this->frontendPath . 'users.register', $this->data);
        }
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'user_name' => 'required|min:3|max:30',
                'user_username' => 'required|min:3|max:15|unique:users,user_username',

                'user_email' => 'required|email|unique:users,user_email',
                'password' => 'required|min:3|confirmed',
                'password_confirmation' => 'required'

            ]);

            $data['user_name'] = $request->user_name;
            $data['user_username'] = $request->user_username;
            $data['user_email'] = $request->user_email;
            $data['password'] = bcrypt($request->password);


            if (User::create($data)) {
                return redirect()->route('login')
                    ->with('success', 'Data was inserted successfully');
            } else {
                return redirect()->back()->with('success', 'Data was not inserted');
            }
        }
    }

    public function login(Request $request)
    {
        if ($request->isMethod('get')) {
            return view($this->frontendPath . 'users.login', $this->data);
        }
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'user_email' => 'required',
                'password' => 'required'
            ]);
            $useremail = $request->user_email;
            $password = $request->password;

            if (Auth::guard('web')->attempt(['user_email' => $useremail, 'password' => $password])) {
                //                if (Auth::attempt(['email'=>$input['email'],'password'=>$input['password'], 'user_status'=>1 ]))

                return redirect()->intended(route('users'));
            } else {

                return redirect()->back()->with('error', 'Email & Password Not match');
            }
        }
    }

    public function profile()
    {
        $user = User::findOrFail(Auth::guard('web')->user()->id);
        return view($this->frontendPath . 'users.profile', $this->data, compact('user'));
        //        return view($this->frontendPath.'users.profile',$this->data);

    }

    public
    function user(Request $request)
    {
        if (!empty($request->search_donor)) {
            $criteria = $request->search_donor;
            $donerData = Donor::where('donor_name', 'LIKE', '%' . $criteria . '%')
                ->orwhere('bloodtype', 'LIKE', '%' . $criteria . '%')
                ->orwhere('address', 'LIKE', '%' . $criteria . '%')
                ->paginate(5);
            $this->data('donerData', $donerData);
            return view($this->frontendPath . 'users.index', $this->data);
        } else {
            //            echo "yes";
            $donerData = Donor::orderBy('id', 'desc')->paginate(8);
            $this->data('donerData', $donerData);
            return view($this->frontendPath . 'users.index', $this->data);
        }

        //        $this->data('donerData', Donor::orderBy('id', 'desc')->paginate(8));
        //        return view($this->frontendPath.'users.index',$this->data);
    }

    public function donorProfile(Request $request)
    {
        $id = $request->id;
        $profileData = Donor::findorfail($id);
        $this->data('profileData', $profileData);
        return view($this->frontendPath . 'users.donorProfile', $this->data);
    }


    public function updateDonorStatus(Request $request)
    {
        if ($request->isMethod('get')) {
            return redirect()->back();
        }
        if ($request->isMethod('post')) {
            $criteria = $request->criteria;
            $findUser = Donor::findorfail($criteria);
            if (isset($_POST['active'])) {
                $findUser->status = 1;
                $message = 'already booked . it is closed contact to given user phone number for further information    ';
            }
            if (isset($_POST['inactive'])) {
                $findUser->status = 1;
                $message = 'you have successfully booked blood now  you can connect to people  ';
            }
            if ($findUser->update()) {
                return redirect()->back()->with('success', $message);
            } else {
                return redirect()->back()->with('error', 'there was a problems');
            }
        }
    }


    public function newDonor(Request $request)
    {
        if ($request->isMethod('get')) {
            return view($this->frontendPath . 'questionnaire.newDonor', $this->data);
        }
        if ($request->isMethod('post')) {
            if (NewDonor::where('posted_by', auth()->id())->count() >= 1) {
                return redirect()->back()->with('error', 'you have already filled this form to donate blood. Please click to "if_already_filled_this_form"');
            }


            //                    $posts =NewDonor::where('posted_by', auth()->id())->count();
            //echo $posts;
            //die();


            $newDonor = $request->all();
            $this->validate(
                $request,
                [
                    'first_name' => 'required|min:3|max:10|regex:/[a-z]/',
                    'middle_name' => '',
                    'last_name' => 'required',
                    // 'email' => 'required|email|unique:new_donors,email',
                    'phone' => 'required|regex:/(98)[0-9]{8}/|max:10',
                    'age' => 'required|in:above18',
                    'weight' => 'required|in:yes',
                    'report' => 'required|in:yes',
                    'image' => 'required|mimes:jpg,jpeg,gif,png',
                    'occupation' => '',
                    'food' => 'required|min:2'

                ],

                [
                    'phone.regex' => 'phone number must start with 98........ Please fill validate phone number',
                    'first_name.unique' => 'name already taken!! Your name must be unique from others',
                    'food.min' => 'min. 2 food have to be your daiting !',
                    'age.in' => 'you are not eligible! your age must be above 18',
                    'weight.in' => 'you must have to be at least 50 kg',
                    'report.in' => 'dont you have hospital report......? please check up your body health first then only you will be eligible to donate blood  ',
                    'age.required' => 'please provide us your age limit!',
                ]
            );

            $newDonor['first_name'] = $request->first_name;
            $newDonor['middle_name'] = $request->middle_name;
            $newDonor['last_name'] = $request->last_name;
            $newDonor['email'] = $request->email;
            $newDonor['phone'] = $request->phone;
            $newDonor['occupation'] = $request->occupation;
            $newDonor['posted_by'] = Auth::guard('web')->user()->id;

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $ext = strtolower($file->getClientOriginalExtension());
                $imageName = md5(microtime()) . '.' . $ext;
                $uploadPath = public_path('uploads/newuser');
                if (!$file->move($uploadPath, $imageName)) {
                    return redirect()->with('error', 'File was not uploaded');
                }

                $newDonor['image'] = $imageName;
            }


            $food = implode(',', $request->input('food'));
            $newDonor['food'] = $food;

            //            $success = NewDonor::create($newDonor);


            if (NewDonor::create($newDonor)) {
                return redirect()->route('login-donor')->with('success', 'Form filled up successfully please fill this form for further processing');
            } else {

                return redirect()->back()->with('error', 'Data was not inserted');
            }
        }
    }


    public function loginDonor(Request $request)
    {
        if ($request->isMethod('get')) {
            //            $this->data('title', $this->makeTitle('login-donor'));
            return view($this->frontendPath . 'questionnaire.login', $this->data);
            //            return redirect()->back();

        }
        if ($request->isMethod('post')) {
            if (Questionnaire::where('posted_by', auth()->id())->count() >= 1) {
                return redirect()->back()->with('error', 'you have already requested for donate blood please go to sign up if you fill a validate form ');
            }

            $inputValue = $request->all();
            $this->validate(
                $request,
                [
                    'name' => 'required|regex:/[a-z]{3}/|unique:questionnaires,name|max:15|min:3',
                    'password' => 'required|min:5',
                    'vaccine' => 'required|in:no',
                    'image' => 'required|mimes:jpg,jpeg,gif,png',
                    'phone' => 'required|regex:/(98)[0-9]{8}/|max:10|unique:questionnaires,phone',
                    'symptoms' => 'required|max:2'

                ],
                [
                    'vaccine.in' => 'you are not allowed to donate blood because you are a covid vaccine user!',
                    'phone.regex' => 'phone number must start with 98........ Please fill validate phone number',
                    'symptoms.max' => 'max. 2 symptions in allowed to fill donor form !',
                    'age.in' => 'you are not eligible!',
                    'age.required' => 'please enter your age limit!'
                ]
            );
            $inputValue['name'] = $request->name;
            $inputValue['password'] = bcrypt($request->password);
            $inputValue['posted_by'] = Auth::guard('web')->user()->id;

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $ext = strtolower($file->getClientOriginalExtension());
                $imageName = md5(microtime()) . '.' . $ext;
                $uploadPath = public_path('uploads/alreadyusers');
                if (!$file->move($uploadPath, $imageName)) {
                    return redirect()->with('error', 'File was not uploaded');
                }

                $inputValue['image'] = $imageName;
            }


            $symptoms = implode(',', $request->input('symptoms'));
            $inputValue['symptoms'] = $symptoms;

            $success = Questionnaire::create($inputValue);


            if ($success) {

                return redirect()->route('questionnaire')->with('success', 'Data was inserted successfully you will be login after we authorize you with in 30 min');
            } else {

                return redirect()->back()->with('error', 'Data was not inserted');
            }
        }
    }


    //     ------------ edit blood user profile--------------------
    public function editBlood(Request $request)
    {
        $id = $request->id;

        $userData = User::findorfail($id);
        $this->data('userData', $userData);
        return view($this->frontendPath . 'users.edit-blood', $this->data);
    }

    public function editBloodAction(Request $request)
    {
        if ($request->isMethod('get')) {
            return redirect()->back();
        }

        if ($request->isMethod('post')) {
            $id = $request->id;
            $this->validate($request, [
                'user_name' => 'required|min:3|max:30',
                'user_username' => 'required',
                'user_email' => 'required|email'

            ]);

            $userData['user_name'] = $request->user_name;
            $userData['user_username'] = $request->user_username;
            $userData['user_email'] = $request->user_email;
            if (User::findOrFail($id)->update($userData)) {
                return redirect()->route('profile')->with('success', 'Data was Updated successfully');
            } else {
                return redirect()->back()->with('success', 'Data was not updated');

            }
        }
    }

    //    --------------end editing blood user profile----------------


    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->intended(route('login'))->with('success', 'Successfully logout');
    }


    public function sendEmail(Request $request)
    {
        if ($request->isMethod('get')) {
            return redirect()->back();
        }

        if ($request->isMethod('post')) {


            $inputValue['email1'] = $request->email1;
            $inputValue['phone'] = $request->phone;

            $inputValue['email2'] = $request->email2;
            $inputValue['posted_by'] = Auth::guard('web')->user()->id;
            // $inputValue['requested_by'] = Auth::guard('web')->user()->id;


            $success = Email::create($inputValue);


            $donor = $request->get('email1');
            $seeker = $request->get('email2');
            $phone = $request->get('phone');


            $details = [
                'title' => 'Blood Donor Finder',
                'body' => 'please click on the verify button in order to accept or deny the request ',
                'token' => sha1(time()),
                'email' => $seeker,
                // 'phone'=>"please contact for further information: " . $phone,

                'phone' => $phone,


            ];

            \Mail::to($donor)->send(new \App\Mail\MyTestMail($details));

            return redirect()->route('users')->with('error', 'email notification is send to the donor email please wait .....you will be notified if doner accept or  reject your request in your email too ');


            // return redirect()->back()->with('error', 'email notification is send to the donor email please wait .....you will be notified if doner accept or  reject your request in your email too ');
        }
    }






    public
    function decision(Request $request)
    {
        if (!empty($_GET['_token']) && !empty($_GET['email']) && !empty($_GET['phone'])) {

            $user = Auth::user();

            $posts = Donor::where('posted_by', auth()->id())->get();

            // echo $posts;
            // echo $user;
            // return view($this->frontendPath . 'users.decision', compact('user', 'posts'),$this->data);

            // if(!empty($_GET['_token'])&& !empty($_GET['email'])&& !empty($_GET['phone'])){
            $token = $_GET['_token'];
            $email = $_GET['email'];
            $phone = $_GET['phone'];
            // echo $email;
            // echo $token;
            // die();
            return view($this->frontendPath . 'users.decision', compact('user', 'posts'), $this->data);
        } else {


            // return redirect()->back()->with('error', 'you are not allowed to access this page from this web RESTRICT TO ACCESS');


            return redirect()->route('users')->with('error', 'RESTRICT TO ACCESS  you are not allowed to access this page from this url ');

        }
    }











    public function sendSeekerEmail(Request $request)
    {
        if ($request->isMethod('get')) {
            return redirect()->back();
        }

        if ($request->isMethod('post')) {











            //             $seeker = $request->get('seeker');

            // // echo $seeker;

            //             $details = [
            //                 'title' => 'Blood Donor Finder',
            //                 'body' => 'Your status Blood is  ',
            //                 'token' => sha1(time()),


            //             ];

            //             \Mail::to($seeker)->send(new \App\Mail\seekerEmail($details));




            $criteria = $request->criteria;

            // echo $criteria;
            // die();

            $findUser = Donor::findorfail($criteria);

            if (isset($_POST['active'])) {
                $findUser->status = 1;
                $seeker = $request->get('seeker');
                $phone = $request->get('phone');
                // echo $phone;
                // die();



                $details = [
                    'title' => 'Blood Donor Finder',
                    'body' => 'Your status Blood is accepted ',
                    'phone' => "Donor Contact number: " . $phone,
                    'token' => sha1(time()),


                ];

                \Mail::to($seeker)->send(new \App\Mail\seekerEmail($details));

                $message = ' status was accepted';
            }
            if (isset($_POST['inactive'])) {
                $findUser->status = 0;
                $seeker = $request->get('seeker');
                $phone = $request->get('phone');


                // echo $seeker;

                $details = [
                    'title' => 'Blood Donor Finder',
                    'body' => 'Your status Blood is  rejected ',
                    'phone' => "please contact for further information: " . $phone,
                    'token' => sha1(time()),


                ];

                \Mail::to($seeker)->send(new \App\Mail\seekerEmail($details));

                $message = 'rejected';
            }

            if ($findUser->update()) {
                // return redirect()->back()->with('success', $message);
                return redirect()->route('users')->with('success', 'Thank you for your decision. Seeker will be noftified soon  ');
            } else {
                return redirect()->back()->with('error', 'there was a problems');
            }
        }
    }














    // public function decisionStatus(Request $request)
    // {




    //     if ($request->isMethod('get')) {
    //         return redirect()->back();

    //     }
    //     if ($request->isMethod('post')) {

    //         $criteria = $request->criteria;

    //             // echo $criteria;
    //             // die();

    //         $findUser = Donor::findorfail($criteria);

    //         if (isset($_POST['active'])) {
    //             $findUser->status = 1;
    //             $message = ' status was accepted';

    //         }
    //         if (isset($_POST['inactive'])) {
    //             $findUser->status = 0;
    //             $message = 'rejected';

    //         }

    //         if ($findUser->update()) {
    //             return redirect()->back()->with('success', $message);

    //         } else {
    //             return redirect()->back()->with('error', 'there was a problems');

    //         }
    //     }
    // }

}
