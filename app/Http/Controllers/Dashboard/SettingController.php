<?php

namespace App\Http\Controllers\Dashboard;


use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\Dashboard\SettingUpdateRequest;
use App\Traits\Uploadtrait;

class SettingController extends Controller
{
    use UploadTrait;

    public function index()
    {
        return view('dashboard.settings.index');
    }

    public function update(SettingUpdateRequest $request, Setting $setting)
    {
        $setting->firstOr()->update($request->validated());

        if ($request->has('logo')) {
            $pathlogo = $this->UploadImage($request, 'logo', 'logo');
            Setting::firstOr()->update([
                'logo' => $pathlogo
            ]);
        }
        if ($request->has('about_image')) {
            $pathabout_image = $this->UploadImage($request, 'about_image', 'about_image');
            Setting::firstOr()->update([
                'about_image' => $pathabout_image
            ]);
        }

        if ($request->has('favicon')) {
            $pathfavicon = $this->UploadImage($request, 'favicon', 'favicon');
            Setting::firstOr()->update([
                'favicon' => $pathfavicon,
            ]);
        }

        return redirect()->back();
    }
}
