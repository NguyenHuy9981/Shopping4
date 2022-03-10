<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;
use App\Straits\StraitDelete;
use App\Http\Requests\ValidateSettings;

class SettingController extends Controller
{
    private $setting;
    public function __construct(Setting $setting)
    {
        $this->setting = $setting;
    }


    function index() {
        $settings = $this->setting->paginate();
        return view('admin.setting.index', compact('settings'));
    }

    function create() {
        return view('admin.setting.create');
    }

    function store(ValidateSettings $request) {
        $this->setting->create([
            'config_key' => $request['config_key'],
            'config_value' => $request['config_value'],
            'type' => $request['type']
        ]);
        return redirect(route('setting.index'));
    }

    function edit($id) {
        $setting = $this->setting->find($id);

        return view('admin.setting.edit', compact('setting'));
    }

    function update(ValidateSettings $request, $id) {

        $this->setting->find($id)->update([
            'config_key' => $request['config_key'],
            'config_value' => $request['config_value'],
        ]);
        return redirect(route('setting.index'));
    }

    function delete($id) {
        $setting = $this->setting->find($id)->delete();
        return response()->json([
            'Huy' => 'Beautifull',
            'message' => 'success',
            
        ], 200);
        
    }

}
