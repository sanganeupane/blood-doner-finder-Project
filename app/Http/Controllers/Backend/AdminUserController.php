<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AdminUser\AdminUser;
use App\Models\Bank\Bank;
use App\Models\Donor\Donor;
use App\Models\NewDonor\NewDonor;
use App\Models\Questionnaire\Questionnaire;
use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminUserController extends BackendController
{


    public function index(Request $request)
    {
        if (!empty($request->search)) {


            $criteria = $request->search;

            $userData = AdminUser::where('name', 'LIKE', '%' . $criteria . '%')->orwhere('username', 'LIKE', '%' . $criteria . '%')
                ->orwhere('email', 'LIKE', '%' . $criteria . '%')->paginate(10);

            $this->data('usersData', $userData);
            return view($this->pagePath . 'admins.show-admin-users', $this->data);
        } else {
            $userData = AdminUser::orderBy('id', 'desc')->paginate(5);
            $this->data('usersData', $userData);
            return view($this->pagePath . 'admins.show-admin-users', $this->data);

        }

    }
 public function addBloodBank(Request $request)
    {

//            $userData = AdminUser::orderBy('id', 'desc')->paginate(5);
//            $this->data('usersData', $userData);
            return view($this->pagePath . 'admins.add-blood-bank', $this->data);

        }
        public function showBloodBank(Request $request)
    {



        if ($request->isMethod('get')) {

            $userData = Bank::orderBy('id', 'desc')->get();
            $this->data('usersData', $userData);


            return view($this->pagePath . 'admins.show-blood-bank', $this->data);

        }
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'blood_bank_name' => 'required',
                'blood_bank_location' => 'required',
                'blood_bank_contact' => 'required',
                'blood_bank_email' => 'required|email',
                'image' => 'mimes:jpg,jpeg,gif,png'

            ]);

            $data['blood_bank_name'] = $request->blood_bank_name;
            $data['blood_bank_location'] = $request->blood_bank_location;
            $data['blood_bank_contact'] = $request->blood_bank_contact;
            $data['blood_bank_email'] = $request->blood_bank_email;

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $ext = strtolower($file->getClientOriginalExtension());
                $imageName = md5(microtime()) . '.' . $ext;
                $uploadPath = public_path('uploads/bloods');
                if (!$file->move($uploadPath, $imageName)) {
                    return redirect()->with('error', 'File was not uploaded');
                }

                $data['image'] = $imageName;
            }

            if (Bank::create($data)) {
                return redirect()->route('show-blood-bank')->with('success', 'Data was inserted successfully');
            } else {
                return redirect()->back()->with('error', 'Data was not inserted');

            }

        }













//            $userData = AdminUser::orderBy('id', 'desc')->paginate(5);
//            $this->data('usersData', $userData);
//            return view($this->pagePath . 'admins.show-blood-bank', $this->data);

        }



    public function add(Request $request)
    {
        if ($request->isMethod('get')) {
            return view($this->pagePath . 'admins.add-admin-user', $this->data);

        }
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'name' => 'required|min:3|max:30',
                'username' => 'required|min:3|max:15|unique:admin_users,username',
                'email' => 'required|email|unique:admin_users,email',
                'password' => 'required|min:3|confirmed',
                'password_confirmation' => 'required',
                'image' => 'mimes:jpg,jpeg,gif,png'

            ]);

            $data['name'] = $request->name;
            $data['username'] = $request->username;
            $data['email'] = $request->email;
            $data['password'] = bcrypt($request->password);

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $ext = strtolower($file->getClientOriginalExtension());
                $imageName = md5(microtime()) . '.' . $ext;
                $uploadPath = public_path('uploads/admins');
                if (!$file->move($uploadPath, $imageName)) {
                    return redirect()->with('error', 'File was not uploaded');
                }

                $data['image'] = $imageName;
            }

            if (AdminUser::create($data)) {
                return redirect()->route('show-admin-users')->with('success', 'Data was inserted successfully');
            } else {
                return redirect()->back()->with('success', 'Data was not inserted');

            }

        }

    }

    public function updateStatus(Request $request)
    {
        if ($request->isMethod('get')) {
            return redirect()->back();

        }
        if ($request->isMethod('post')) {
            $criteria = $request->criteria;


            $findUser = AdminUser::findorfail($criteria);
            if (isset($_POST['active'])) {
                $findUser->status = 0;
                $message = ' status was inactive';

            }
            if (isset($_POST['inactive'])) {
                $findUser->status = 1;
                $message = 'user status was active';

            }
            if ($findUser->update()) {
                return redirect()->back()->with('success', $message);

            } else {
                return redirect()->back()->with('error', 'there wa a problems');

            }
        }
    }

    public function updateType(Request $request)
    {
        if ($request->isMethod('get')) {
            return redirect()->back();

        }

        if ($request->isMethod('post')) {
            $criteria = $request->criteria;
            $findUser = AdminUser::findorfail($criteria);
            if (isset($_POST['admin'])) {
                $findUser->admin_type = 'super-admin';
                $message = ' User type was Changed';

            }
            if (isset($_POST['super-admin'])) {
                $findUser->admin_type = 'admin';
                $message = 'Admin Type was active';

            }
            if ($findUser->update()) {
                return redirect()->back()->with('success', $message);

            } else {
                return redirect()->back()->with('error', 'there was a problems');

            }
        }
    }

    function deleteFiles($id)
    {
        $findData = AdminUser::findorfail($id);
        $fileName = $findData->image;
        $filePath = public_path('uploads/admins/' . $fileName);

        if (file_exists($filePath) && is_file($filePath)) {
            unlink($filePath);
            return true;
        } else {
            return true;
        }
    }

    public function delete(Request $request)
    {

        $id = $request->criteria;

        if ($this->deleteFiles($id) && AdminUser::findorfail($id)->delete()) {
            return redirect()->back()->with('error', 'Admin successfully delete');

        }

    }


    function deleteQuestionnaireFiles($id)
    {
        $findData = Questionnaire::findorfail($id);
        $fileName = $findData->image;
        $filePath = public_path('uploads/alreadyusers/' . $fileName);

        if (file_exists($filePath) && is_file($filePath)) {
            unlink($filePath);
            return true;
        } else {
            return true;
        }
    }

    public function deleteQuestionnaireUser(Request $request)
    {


        $id = $request->criteria;

        $totalQuestion = Donor::where('posted_by', '=', $id)->count();
        if ($totalQuestion > 0) {
            return redirect()->back()->with('error', 'Data cannot delete related with doner');

        } else {
            if (Questionnaire::findOrFail($id)->delete()) {
                return redirect()->back()->with('success', 'Data successfully delete');

            }
        }
    }


//
//        if ($this->deleteQuestionnaireFiles($id) && Questionnaire::findorfail($id)->delete()) {
//            return redirect()->back()->with('error', 'Data successfully delete');
//
//        }


    function deletenewDonorFiles($id)
    {
        $findData = NewDonor::findorfail($id);
        $fileName = $findData->image;
        $filePath = public_path('uploads/newuser/' . $fileName);

        if (file_exists($filePath) && is_file($filePath)) {
            unlink($filePath);
            return true;
        } else {
            return true;
        }
    }

    public function deleteNewDonorUser(Request $request)
    {

        $id = $request->criteria;

        if ($this->deletenewDonorFiles($id) && NewDonor::findorfail($id)->delete()) {
            return redirect()->back()->with('error', 'Data successfully delete');

        }

    }


    public function deleteDonorUser(Request $request)
    {


//        $id = $request->criteria;
//
//        $totalUser = Donor::where('posted_by', '=', $id)->count();
//        if ($totalUser > 0) {
//            return redirect()->back()->with('error', 'Data cannot delete related with another questionnaire');
//
//        } else {
//            if (Donor::findOrFail($id)->delete()) {
//                return redirect()->back()->with('success', 'Data successfully delete');
//
//            }


//
        $id = $request->criteria;

        if (Donor::findorfail($id)->delete()) {
            return redirect()->back()->with('success', 'Data successfully delete');

        } else {

            return redirect()->back()->with('error', "Data can't delete");

        }

    }

    public function deleteBloodUser(Request $request)
    {

//
//        if (User::findorfail($id)->delete()) {
//            return redirect()->back()->with('error', 'Data successfully delete');


        $id = $request->criteria;

        $totalUser = Questionnaire::where('posted_by', '=', $id)->count();
        if ($totalUser > 0) {
            return redirect()->back()->with('error', 'Data cannot delete related with another questionnaire');

        } else {
            if (User::findOrFail($id)->delete()) {
                return redirect()->back()->with('success', 'Data successfully delete');

            }
        }


    }


    public function edit(Request $request)
    {
        $id = $request->id;

        $userData = AdminUser::findorfail($id);
        $this->data('userData', $userData);
//echo $userData;
        return view($this->pagePath . 'admins.edit', $this->data);

    }

    public function editAction(Request $request)
    {
        if ($request->isMethod('get')) {
            return redirect()->back();
        }

        if ($request->isMethod('post')) {
            $id = $request->id;
            $this->validate($request, [
                'name' => 'required|min:3|max:30',
                'username' => 'required',
                'email' => 'required|email'

            ]);

            $data['name'] = $request->name;
            $data['username'] = $request->username;
            $data['email'] = $request->email;
            if (AdminUser::findOrFail($id)->update($data)) {
                return redirect()->route('show-admin-users')->with('success', 'Data was Updated successfully');
            } else {
                return redirect()->back()->with('success', 'Data was not updated');

            }

        }

    }


    public function login(Request $request)
    {
        if ($request->isMethod('get')) {
            return view($this->pagePath . 'admin-login.index', $this->data);

        }
        if ($request->isMethod('post')) {
            $username = $request->username;
            $password = $request->password;
            if (Auth::guard('admin')->attempt(['username' => $username, 'password' => $password])) {
                return redirect()->intended(route('admin'));
            } else {
                return redirect()->back()->with('error', 'Username & Password Not match');
            }
        }

    }

    public
    function showBloodUser()
    {
        $this->data('userData', User::orderBy('id', 'desc')->paginate(5));
        return view($this->pagePath . 'admins.show-donor-user', $this->data);
    }


    public
    function showNewDonor()
    {
        $this->data('newDonorData', NewDonor::orderBy('id', 'desc')->paginate(5));
        return view($this->pagePath . 'admins.show-newDonor', $this->data);
    }


    public function updateUserStatus(Request $request)
    {
        if ($request->isMethod('get')) {
            return redirect()->back();
        }
        if ($request->isMethod('post')) {
            $criteria = $request->criteria;
            $findUser = User::findorfail($criteria);
            if (isset($_POST['active'])) {
                $findUser->status = 0;
                $message = ' status was inactive';
            }
            if (isset($_POST['inactive'])) {
                $findUser->status = 1;
                $message = 'user status was active';

            }
            if ($findUser->update()) {
                return redirect()->back()->with('success', $message);

            } else {
                return redirect()->back()->with('error', 'there was a problems');
            }
        }
    }


    public function updateDonorAdminStatus(Request $request)
    {
        if ($request->isMethod('get')) {
            return redirect()->back();
        }
        if ($request->isMethod('post')) {
            $criteria = $request->criteria;
            $findUser = Donor::findorfail($criteria);
            if (isset($_POST['active'])) {
                $findUser->status = 0;
                $message = ' status was inactive';
            }
            if (isset($_POST['inactive'])) {
                $findUser->status = 1;
                $message = 'user status was active';

            }
            if ($findUser->update()) {
                return redirect()->back()->with('success', $message);

            } else {
                return redirect()->back()->with('error', 'there was a problems');
            }
        }
    }


    public
    function questionnaire()
    {
        $this->data('questionnaireData', Questionnaire::orderBy('id', 'desc')->paginate(5));
        return view($this->pagePath . 'admins.show-questionnaire', $this->data);
    }

    public function updateQuestionnaireStatus(Request $request)
    {
        if ($request->isMethod('get')) {
            return redirect()->back();

        }
        if ($request->isMethod('post')) {
            $criteria = $request->criteria;
            $findUser = Questionnaire::findorfail($criteria);
            if (isset($_POST['active'])) {
                $findUser->status = 0;
                $message = ' status was inactive';
            }
            if (isset($_POST['inactive'])) {
                $findUser->status = 1;
                $message = 'Donor status was active';

            }
            if ($findUser->update()) {
                return redirect()->back()->with('success', $message);

            } else {
                return redirect()->back()->with('error', 'there was a problems');

            }
        }
    }


    public
    function showDonorAdmin()
    {

        $this->data('donorData', Donor::orderBy('id', 'desc')->paginate(5));
        return view($this->pagePath . 'admins.show-donor-admin', $this->data);

    }


    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->intended(route('admin-login'));


    }
}
