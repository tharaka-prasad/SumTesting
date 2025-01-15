<?php

namespace App\Http\Controllers;

use App\Models\HazardRisk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HazardRiskController extends Controller
{
    /**
     * Store a newly created HazardRisk in the database.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'division' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'sub_location' => 'nullable|string|max:255',
            'category' => 'required|string|max:255',
            'sub_category' => 'nullable|string|max:255',
            'observation_type' => 'nullable|string|max:255',
            'description' => 'required|string',
            'risk_level' => 'required|in:LOW,MEDIUM,HIGH',
            'unsafe_act_or_condition' => 'required|in:UNSAFE_ACT,UNSAFE_CONDITION',
            'status' => 'required|in:DRAFT,APPROVED,DECLINED',
            'created_by_user' => 'required|string|max:255',
            'due_date' => 'nullable|date',
            'assignee' => 'nullable|string|max:255',
        ]);

        // Return validation errors if any
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        // Create the HazardRisk record in the database
        $hazardRisk = HazardRisk::create([
            'division' => $request->division,
            'location' => $request->location,
            'sub_location' => $request->sub_location,
            'category' => $request->category,
            'sub_category' => $request->sub_category,
            'observation_type' => $request->observation_type,
            'description' => $request->description,
            'risk_level' => $request->risk_level,
            'unsafe_act_or_condition' => $request->unsafe_act_or_condition,
            'status' => $request->status,
            'created_by_user' => $request->created_by_user,
            'due_date' => $request->due_date,
            'assignee' => $request->assignee,
        ]);

        // Return success response with the created data
        return response()->json(['message' => 'Hazard/Risk created successfully', 'data' => $hazardRisk], 201);
    }

    /**
     * Display a listing of the HazardRisks.
     */
    // public function index()
    // {
    //     $hazardRisks = HazardRisk::all();
    //     return response()->json($hazardRisks);
    // }

    /**
     * Show the details of a specific HazardRisk.
     */
    // public function show($id)
    // {
    //     $hazardRisk = HazardRisk::findOrFail($id);
    //     return response()->json($hazardRisk);
    // }

    /**
     * Update the specified HazardRisk in the database.
     */
    public function update(Request $request, $id)
    {
        $hazardRisk = HazardRisk::findOrFail($id);

        // Validate incoming data
        $validator = Validator::make($request->all(), [
            'division' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'sub_location' => 'nullable|string|max:255',
            'category' => 'required|string|max:255',
            'sub_category' => 'nullable|string|max:255',
            'observation_type' => 'nullable|string|max:255',
            'description' => 'required|string',
            'risk_level' => 'required|in:LOW,MEDIUM,HIGH',
            'unsafe_act_or_condition' => 'required|in:UNSAFE_ACT,UNSAFE_CONDITION',
            'status' => 'required|in:DRAFT,APPROVED,DECLINED',
            'created_by_user' => 'required|string|max:255',
            'due_date' => 'nullable|date',
            'assignee' => 'nullable|string|max:255',
        ]);

        // Return validation errors if any
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        // Update the hazard risk
        $hazardRisk->update([
            'division' => $request->division,
            'location' => $request->location,
            'sub_location' => $request->sub_location,
            'category' => $request->category,
            'sub_category' => $request->sub_category,
            'observation_type' => $request->observation_type,
            'description' => $request->description,
            'risk_level' => $request->risk_level,
            'unsafe_act_or_condition' => $request->unsafe_act_or_condition,
            'status' => $request->status,
            'created_by_user' => $request->created_by_user,
            'due_date' => $request->due_date,
            'assignee' => $request->assignee,
        ]);

        // Return success response with updated data
        return response()->json(['message' => 'Hazard/Risk updated successfully', 'data' => $hazardRisk]);
    }



}
