<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xls;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class FileUploadController extends Controller
{
    public function upload(Request $request)
    {
        if($request->ajax()){
            $validator = Validator::make($request->all(), [
                'file_excel' => 'required|mimes:xlsx,xls',
            ]);

            if($validator->fails()){
                return response()->json(['error' => $validator->errors()], 400);
            }

            $file = $request->file('file_excel');
            $fileExtension = $file->getClientMimeType();

            if($fileExtension == 'xls'){
                $render = new Xls();
            }else{
                $render = new Xlsx();
            }

            $spreadsheet = $render->load($file);
            $data = $spreadsheet->getActiveSheet()->toArray();


            return response()->json([
                'success'   => true,
                'message'   => 'Uploaded',
                'data'      => $data,
            ]);
        }else{
            return response()->json(401);
        }
    }
}
