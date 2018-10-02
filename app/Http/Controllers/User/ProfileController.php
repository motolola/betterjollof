<?php

namespace App\Http\Controllers\User;

use App\Models\Country;
use App\Models\Follower;
use App\Models\Food;
use App\Models\Point;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Rank\UserPoint;
use App\Requests\UpdateProfileRequest;
use App\Services\UserLocationByIp;
use Intervention\Image\Facades\Image;
use App\Services\ImageMaker;
use Laracasts\Flash\Flash;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        //$userLocation = new UserLocationByIp($request);
        //$userLocation->updateCountry();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $user = ($user->id !== null) ? $user : Auth::user();

        if (!isset($user)){
            return redirect(url('/'));
        }
        $data['food']                = Food::where('user_id',$user->id)->paginate(10);
        $data['user']                = User::find($user->id);
        $data['user_status']         = (object) ['point' => UserPoint::getUserPoint($user->id), 'rank'=> UserPoint::getUserRank($user->id)];
        $data['my_page']             = (isset(Auth::user()->id) && $user->id == Auth::user()->id)? true : false;
        $data['follows']             = $this->follows($user->id);
        $data['number_of_followers'] = count($this->getFollowers($user->id));

        return view('cook.cook-profile', $data);
    }

    public function edit()
    {
        $data['user']      = User::find(Auth::user()->id);
        $countries         = collect(Country::whereIn('code', $this->enabledCountries())->get());
        $countries         = $countries->sortBy('name');
        $data['countries'] = $countries;

        return view('cook.cook-profile-edit', $data);
    }

    public function enabledCountries()
    {
        return ['ng', 'gb', 'gh', 'us'];
    }

    public function editAction(UpdateProfileRequest $request)
    {
        $user                   = User::find(Auth::user()->id);
        $user->firstname        = $request->firstname;
        $user->surname          = $request->surname;
        $user->username         = $request->username;
        $user->email            = $request->email;
        $user->about            = $request->about_user;
        $user->specialities     = $request->user_specialities;
        $user->mobilephone      = $request->mobilephone;
        $user->businessphone    = $request->businessphone;
        $user->country_id       = $request->country;
        $user->region_id        = $request->region;
        $user->city_id          = $request->city;
        $user->save();

        UserPoint::profileSetPoint($user->id);

        flash('Record updated successfully!', 'success');
        return redirect(url('profile-edit'));
    }

    public function profilePicture(Request $request)
    {
        $this->validate($request, [
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg|max:1024',
        ]);
        $photoName = Auth::user()->id.'.'.$request->profile_picture->getClientOriginalExtension();
        $request->profile_picture->move(public_path('photos/user'), $photoName);

        //$this->manipulateProfilePicture($photoName);
        ImageMaker::thumbUserImage($photoName);

        $user = User::find(Auth::user()->id);
        $user->avatar = $photoName;
        $user->save();

        flash($user->firstname.' Profile picture has updated!', 'success');
        return redirect(url('profile-edit'));
    }

    public function myPoints()
    {
        $data['points'] = collect(Point::where('user_id', Auth::user()->id)->get());
        $data['totalPoints'] = $data['points']->sum('value');
        return view('cook.cook-points', $data);
    }

    public function followUser($user_id)
    {
        if (!Auth::check()){
            return redirect(url('/'));
        }
        $check = Follower::where(
            ['user_id'=> $user_id,
                'follower_id' => Auth::user()->id])
            ->first();
        $user = User::find($user_id);

        if (count($check) > 0) {
            Flash("You are already following this user", "info");
            return redirect(url('profile/'.$user->username));
        }

        $follower = new Follower();
        $follower->user_id = $user_id;
        $follower->follower_id = Auth::user()->id;
        $follower->save();

        Flash('You are now following this user', 'success');

        return redirect(url('profile/'.$user->username));
    }

    public function unFollowUser($user_id)
    {
        $follower = Follower::where(
            ['user_id'=> $user_id,
                'follower_id' => Auth::user()->id])
            ->first();
        $user = User::find($user_id);

        if (count($follower) == 0) {
            Flash('You were not following this user', 'warning');
            return redirect(url('profile/'.$user_id));
        }

        $follower->destroy($follower->id);
        Flash('You have successfully unfollowed this user', 'success');
        return redirect(url('profile/'.$user->username));
    }

    /*
     * Checks if the AUTH user is a follower of the
     * profile page owner
     * return bool
     */

    private function follows($pageOwnerId)
    {
        if (Auth::check()) {
            $checkFollower = Follower::where(
                [
                    'user_id' => $pageOwnerId,
                    'follower_id' => Auth::user()->id
                ]
            )->get();
            if (count($checkFollower) > 0) {
                return true;
            }
        }
        return false;
    }
    /*
     * Get followers
     */
    public function getFollowers($user_id)
    {
        return Follower::where('user_id', $user_id)->get();
    }

    public function followerList(User $user)
    {
        $user = ($user->id !== null) ? $user : Auth::user();
        $followersId = Follower::where('user_id', $user->id)->pluck('follower_id');
        $data['followers'] = User::wherein('id', $followersId)->paginate(10);

        return view('cook.followers', $data);
    }
}
