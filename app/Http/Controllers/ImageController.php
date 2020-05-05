<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Image;

class ImageController extends Controller
{
    public function upload(Request $request)
    {
        $validation = $request->validate([
            'file' => 'required|image|mimes:jpg,jpeg,png',
            'product_id' => 'required'
        ]);

        $file = $validation['file'];
        if (isset($request->mini))
        {
            $fileName = 'mini' . $validation['product_id'] . '-' . md5($file->getClientOriginalName()) . '.' . $file->getClientOriginalExtension();
            $original = Image::where('product_id', $validation['product_id'])->where('mini', true)->first();
            if (isset($original)) {
                Storage::disk('public')->delete($original->file);
            }
            $uploadedFile = $file->storeAs('public/products-images/mini/', $fileName);

            if ($uploadedFile)
            {
                if (!isset($original))
                {
                    $img = Image::create([
                        'file' => 'storage/products-images/mini/'. $fileName,
                        'product_id' => $validation['product_id'],
                        'mini' => true
                    ]);
                    $img->save();

                } else {
                    $original->file = 'storage/products-images/mini/'. $fileName;
                    $original->save();
                }

                return response()->json(['msg' => 'ok'], 200);
            }
        }
        elseif (isset($request->thumbnail))
        {
            $fileName = 'thumbnail' . $validation['product_id'] . '-' . md5($file->getClientOriginalName())  . '.' . $file->getClientOriginalExtension();
            $original = Image::where('product_id', $validation['product_id'])->where('thumbnail', true)->first();
            if (isset($original)) {
                Storage::disk('public')->delete($original->file);
            }
            $uploadedFile = $file->storeAs('public/products-images/thumbnail/', $fileName);

            if ($uploadedFile)
            {
                if (!isset($original))
                {
                    $img = Image::create([
                        'file' => 'storage/products-images/thumbnail/'. $fileName,
                        'product_id' => $validation['product_id'],
                        'thumbnail' => true
                    ]);
                    $img->save();

                } else {
                    $original->file = 'storage/products-images/thumbnail/'. $fileName;
                    $original->save();
                }
                return response()->json(['msg' => 'ok'], 200);
            }
        }
        else {
            $fileName ='product-' . $validation['product_id'] . '-' . md5($file->getClientOriginalName()) . '-' . time() .'.' . $file->getClientOriginalExtension();
            $uploadedFile = $file->storeAs('public/products-images/', $fileName);

            if ($uploadedFile)
            {
                $img = Image::create([
                    'file' => 'storage/products-images/'. $fileName,
                    'product_id' => $validation['product_id'],
                ]);
                $img->save();

                return response()->json(['msg' => 'ok'], 200);
            }
        }

        return response(500);
    }

    public function images($product_id)
    {
        return Image::where('product_id', $product_id)->where('thumbnail', false)->where('mini', false)->get()->toJson(JSON_PRETTY_PRINT);
    }

    public function mini($product_id)
    {
        return Image::where('product_id', $product_id)->where('thumbnail', false)->where('mini', true)->first()->toJson(JSON_PRETTY_PRINT);
    }

    public function thumbnail($product_id)
    {
        return Image::where('product_id', $product_id)->where('thumbnail', true)->where('mini', false)->first()->toJson(JSON_PRETTY_PRINT);
    }

    public function destroy(Image $image)
    {
        Storage::disk('public')->delete($image->file);
        $image->delete();

        return response()->json(['status'=>'success','msg' => 'Image deleted successfully']);
    }
}
