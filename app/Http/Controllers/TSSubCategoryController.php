<?php

namespace App\Http\Controllers;

use App\Http\Resources\TSCategoryResource;
use App\Http\Resources\TSSubCategoryResource;
use App\Models\TSCategory;
use App\Models\TSSubCategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TSSubCategoryController extends Controller
{
    public function index():JsonResponse{
        $category = TSSubCategory::where('status', '1')->get();
        if ($category->count() > 0) {
            return $this->sendResponse(TSSubCategoryResource::collection($category),"Sub Category Get Successfully");
        }else{
            return $this->sendError("Sub Category Not Found", []);
        }
    }
    public function getSubCategoryByCat(Request $request):JsonResponse{

        $validator = Validator::make($request->all(),[
            'categoryid' => 'required|integer',
        ]);
        if ($validator->fails()){
            return  $this->sendError('Validation Error.',$validator->errors());
        }
        $category = TSSubCategory::where('categoryid', $request->categoryid)->get();
        return $this->sendResponse(TSSubCategoryResource::collection($category),"Category Get Successfully");
    }
    public function store(Request $request):JsonResponse{
        $input = $request->all();
        $validator = Validator::make($request->all(),[
            'categoryid' => 'required|integer',
            'name' => 'required',
            'status' => 'required|integer',
        ]);
        if ($validator->fails()){
            return  $this->sendError('Validation Error.',$validator->errors());
        }
        $userId = auth()->user()->id; // Using auth() helper

        $inArr= [
            'categoryid'=>$input['categoryid'],
            'name'=>$input['name'],
            'status'=>$input['status'],
            'create_by' => $userId,
            'create_date' => $this->getCurrentDateTime(),
        ];

        $category = TSSubCategory::create($inArr);
        return $this->sendResponse(new TSSubCategoryResource($category),"Category Created Successfully");
    }
    public function show(Request $request):JsonResponse{
        $input = $request->all();
        $validator = Validator::make($request->all(),[
            'id' => 'required|integer',
        ]);

        if ($validator->fails()){
            return  $this->sendError('Validation Error.',$validator->errors());
        }
        $id=$input['id'];

        $category = TSSubCategory::find($id);
        if($category){
            return $this->sendResponse(new TSCategoryResource($category),"SubCategory Get Successfully");
        }else{
            return $this->sendResponse([],"SubCategory Not Found");
        }

    }
    public function update(Request $request):JsonResponse{
        $validator = Validator::make($request->all(), [
            'id' => 'required|integer',
            'categoryid' => 'required|integer',
            'name' => 'required',
            'status' => 'required|integer',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        // Get authenticated user's ID
        $userId = auth()->user()->id;

        // Prepare data for updating the TSSubCategory
        $inArr = [
            'categoryid' => $request->input('categoryid'),
            'name' => $request->input('name'),
            'status' => $request->input('status'),
            'update_by' => $userId,
            'update_date' => now(), // Assuming getCurrentDateTime() returns the current timestamp
        ];

        // Retrieve the existing category by ID
        $category = TSSubCategory::find($request->input('id'));

        // Check if the category exists
        if ($category) {
            // Update the category
            $category->update($inArr);

            // Return a success response
            return $this->sendResponse(new TSSubCategoryResource($category), "Category Updated Successfully");
        } else {
            return $this->sendError('Category not found.');
        }
    }

    public function delete(Request $request): JsonResponse {
        $input = $request->all();
        $validator = Validator::make($input, [
            'id' => 'required|integer',
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $id = $input['id'];

        $userId = auth()->user()->id;
        $inArr = [
            'status' => '3',
            'update_by' => $userId,
            'update_date' => $this->getCurrentDateTime(),
        ];
        $rowData = TSSubCategory::where('id', $id)->whereNotIn('status', ['3'])->first();
        if ($rowData) {
            $rowData->update($inArr);
            // $rowData->delete();
            return $this->sendResponse([], "SubCategory Deleted Successfully");
        } else {
            return $this->sendError("SubCategory Not Found", []);
        }
    }

}
