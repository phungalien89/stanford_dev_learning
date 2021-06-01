<?php

namespace App\Http\Controllers;

use App\Models\Sach;
use App\Models\ChuDe;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SachController extends Controller
{
    //
    public function index()
    {
        $sachs = Sach::all();
        $sachs = $sachs->sort();

        return view('sach.index', compact('sachs'));
    }

    public function create()
    {
        $chude = ChuDe::all();
        return view('sach.create', compact('chude'));
    }

    public function store(Request $request)
    {
        $rules = [
            'bookDesc' => 'required',
            'bookName' => 'required',
            'subjectId' => 'required',
            'bookImage' => 'image'
        ];
        $messages = [
            'bookDesc.required' => 'Bạn chưa điền mô tả',
            'bookName.required' => 'Bạn chưa điền tên sách',
            'subjectId.required' => 'Bạn chưa chọn chủ đề',
            'bookImage.image' => 'Ảnh phải có định dạng jpg, bmp, jpeg, tiff'
        ];
        $data = $request->validate($rules, $messages);
        $data = $request->whenHas('bookImage', function () use ($request, $data) {
            $imgPath = $request->bookImage->store('upload/sach', 'public');
            $img = Image::make(public_path('storage/' . $imgPath))->fit(768, 1024);
            $img->save();
            $data = collect($data)->merge(['bookImage' => $imgPath]);
            return $data;
        });
        Sach::create($data->toArray());
        return redirect()->route('sach.index');
    }

    public function edit(Sach $sach)
    {
        $chude = ChuDe::all();
        return view('sach.edit', compact('sach', 'chude'));
    }

    public function update(Request $request, Sach $sach)
    {
        $rules = [
            'bookDesc' => 'required',
            'bookName' => 'required',
            'subjectId' => 'required',
            'bookImage' => 'image'
        ];
        $messages = [
            'bookDesc.required' => 'Bạn chưa điền mô tả',
            'bookName.required' => 'Bạn chưa điền tên sách',
            'subjectId.required' => 'Bạn chưa chọn chủ đề',
            'bookImage.image' => 'Ảnh phải có định dạng jpg, bmp, jpeg, tiff'
        ];
        $data = $request->validate($rules, $messages);
        $data = $request->whenHas('bookImage', function () use ($data, $request, $sach) {
            Storage::disk('public')->delete($sach->bookImage);
            $imgPath = $request->bookImage->store('upload/sach', 'public');
            $img = Image::make(public_path() .  '/storage/' . $imgPath)->fit(768, 1024);
            $img->save();
            $data = collect($data)->merge(['bookImage' => $imgPath]);
            return $data;
        });
        $sach->update($data->toArray());
        return redirect()->route('sach.index');
    }

    public function destroy(Sach $sach)
    {
        $sach->delete();
        Storage::disk('public')->delete($sach->bookImage());
        return redirect()->route('sach.index');
    }
}
