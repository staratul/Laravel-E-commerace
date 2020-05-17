<?php

namespace App\Http\Controllers\Api;

use Exception;
use Yajra\DataTables\Facades\DataTables;
use App\Model\Unit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Unit::all();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                            if($row->status === '1') {
                                $status = '<a href="javascript:;" onclick="statusUnit('.$row->id.', '.$row->status.')" class="btn btn-default text-success btn-sm rounded-0 ml-3">Status</a>';
                            } else {
                                $status = '<a href="javascript:;" onclick="statusUnit('.$row->id.', '.$row->status.')" class="btn btn-default text-danger btn-sm rounded-0 ml-3">Status</a>';
                            }
                            $btn = '<a href="javascript:;" onclick="editUnit('.$row->id.')" class="btn btn-primary btn-sm rounded-0">Edit</a><a href="javascript:;" onclick="deleteUnit('.$row->id.')" class="btn btn-danger btn-sm rounded-0 ml-3">Delete</a>'.$status;
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $rules = [
                'unit' => 'required|unique:units'
            ];
            $validator = Validator::make($request->all(), $rules);
            if($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->getMessageBag()
                ], 400);
            }

            $units = Unit::create([
                'unit' => $request->unit,
                'status' => '1'
            ]);

            return response()->json($units);

        } catch(Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Unit $unit)
    {
        return response()->json($unit);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unit $unit)
    {
        try {
            $rules = [
                'unit' => [
                        'required',
                        Rule::unique('units')->ignore($unit->id)
                    ],
            ];

            $validator = Validator::make($request->all(), $rules);
            if($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->getMessageBag()
                ], 400);
            }

            $unit->update($request->all());

            return response()->json($unit);

        } catch(Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit)
    {
        $unit->delete();

        return response()->json($unit);
    }

    public function updateStatus(Unit $unit, $status)
    {
        if($status === "1") {
            $status = "0";
        } else {
            $status = "1";
        }

        $unit->update(['status' => $status]);
        return response()->json($unit);
    }
}
