<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserAddress;
use App\Repository\Eloquent\AddressTypeRepository;
use App\Repository\Eloquent\UserAddressRepository;
use App\Repository\Eloquent\UserVouchersRepository;
use App\User;
use App\ViewModels\UserDetailsViewModel;
use App\ViewModels\UserViewModel;
use Facade\FlareClient\Http\Exceptions\BadResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $userAddressRepo;
    protected $addressTypeRepo;
    protected $userVouchersRepo;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserAddressRepository $userAddressRepository, AddressTypeRepository $addressTypeRepository, UserVouchersRepository $userVouchersRepository)
    {
        $this->middleware('auth');
        $this->userAddressRepo = $userAddressRepository;
        $this->addressTypeRepo = $addressTypeRepository;
        $this->userVouchersRepo = $userVouchersRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function myaccount()
    {
        $userDetails = Auth::user();
        $userAddresses = $this->userAddressRepo->getDefaultUserAddresses($userDetails->id);
        $userViewModel = json_encode(new UserViewModel($userDetails, $userAddresses));

        return view('user.myaccount')->with('userModel', json_decode($userViewModel));
    }

    public function myaddresses()
    {
        $userAddresses = json_encode($this->userAddressRepo->getUserAddresses(Auth::id()));
        $availableAddressTypes =  json_encode($this->addressTypeRepo->getAvailableAddressTypes(Auth::id()));

        return view('user.myaddresses')->with('userAddresses', json_decode($userAddresses))
                                        ->with('availableAddresses', json_decode($availableAddressTypes));
    }

    public function myorders()
    {
        return view('user.myorders');
    }

    public function myvouchers()
    {
        $userId = Auth::id();
        $vouchers = json_encode($this->userVouchersRepo->getUserVouchers($userId));

        return view('user.myvouchers')->with('userVouchers', json_decode($vouchers, true));
    }

    public function mywarranties()
    {
        return view('user.mywarranties');
    }

    public function myreviews()
    {
        return view('user.myreviews');
    }

    public function settings()
    {
        $userDetails = Auth::user();
        $userViewModel = json_encode(new UserViewModel($userDetails));

        return view('user.settings')->with('userModel', json_decode($userViewModel));
    }

    public function mysubscriptions()
    {
        return view('user.mysubscriptions');
    }

    public function postUserAddress(StoreUserAddress $request)
    {
        $validated = $request->validated();
        $default = 0;
        if($this->addressTypeRepo->isDefaultAddressType($validated['addressType']))
        {
           $default = 1;
        }

        $this->userAddressRepo->storeUserAddress(Auth::id(), $validated, $default);
        return redirect()->route('myaddresses');
    }

    public function updateUserAddress(StoreUserAddress $request)
    {
        $validated = $request->validated();
        $this->userAddressRepo->updateUserAddress(Auth::id(), $validated);

        return redirect()->route('myaddresses');
    }

    public function getUserAddress(Request $request)
    {
        $addressTypeId = $request->id;

        if (Auth::check())
        {
            $userId = Auth::id();
            $userAddress = $this->userAddressRepo->getUserAddress($addressTypeId, $userId);

            return response()->json($userAddress);
        }
        else
        {
            return response('Not found', 400);
        }
    }

    public function removeUserAddress(Request $request)
    {
        $addressTypeId = $request->id;

        if (Auth::check())
        {
            $userId = Auth::id();
            $this->userAddressRepo->removeUserAddress($addressTypeId, $userId);

            return redirect()->route('myaddresses');
        }
        else
        {
            return response('Not found', 400);
        }
    }

    public function getUserDetails()
    {
        $userDetails = Auth::user();
        $userViewModel = new UserDetailsViewModel($userDetails);

        return response()->json($userViewModel);
    }

    public function updateUserDetails(Request $request)
    {
        $user = Auth::user();

        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->telephone = $request->telephone;

        $user->save();

        return redirect()->route('user.settings');
    }

    public function resetPassword(Request $request)
    {
        if (Auth::check())
        {
            $request->validate([
                'current_password' => ['required'],
                'new_password' => ['required'],
                'new_confirm_password' => ['same:new_password'],
            ]);

            User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

            return redirect()->route('user.settings');
        }
        else
        {
            return response('Not found', 400);
        }
    }
}
