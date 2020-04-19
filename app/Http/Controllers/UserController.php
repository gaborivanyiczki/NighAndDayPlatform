<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserAddress;
use App\Repository\Eloquent\AddressTypeRepository;
use App\Repository\Eloquent\UserAddressRepository;
use App\ViewModels\UserViewModel;
use Facade\FlareClient\Http\Exceptions\BadResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $userAddressRepo;
    protected $addressTypeRepo;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserAddressRepository $userAddressRepository, AddressTypeRepository $addressTypeRepository)
    {
        $this->middleware('auth');
        $this->userAddressRepo = $userAddressRepository;
        $this->addressTypeRepo = $addressTypeRepository;
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
        return view('user.myvouchers');
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
        return view('user.settings');
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
}
