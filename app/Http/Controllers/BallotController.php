<?php

namespace App\Http\Controllers;

use App\Models\Ballot;
use App\Models\BallotDetail;
use App\Models\Candidate;
use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class BallotController extends Controller
{
    public function index($event)
    {
        $ballots = Ballot::where('event_id', $event)->get();
        return response()->json($ballots);
    }

    public function store(Request $request, $event)
    {

        try {
            $request->validate([
                "details.*.division_id" => "required|exists:divisions,id",
                "details.*.candidate_id" => "required|exists:candidates,id"
            ]);
        } catch (ValidationException $exception) {
            $errors = $exception->validator->errors();
            $errorMessage = $errors->first();
    
            return response()->json([
                'success' => false,
                'message' => $errorMessage
            ], 409);
        }

        $divisions = Division::where('event_id',$event)->get();

        foreach($divisions as $key => $val){
            $count = 0;
            foreach($request->details as $key2 => $val2){
               if($val['id'] == $val2['division_id']){
                   $count++;
               }
            }
            if($count != 1){
                return response()->json([
                    'success' => false,
                    'message' => "Ballot invalid"
                ], 409);
            }
        }

        foreach($request->details as $key => $val){
            $ballot_user = Ballot::where('event_id', $event)->where('npm', $request->user()->npm)->first();

            if(!empty($ballot_user)){
                return response()->json([
                    'success' => false,
                    'message' => "User sudah mencoblos"
                ], 409);
            }
        }

        $ballot = new Ballot();
        $ballot->event_id = $event;
        $ballot->npm = $request->user()->npm;
        
        $ktm = $request->file('ktm');
        $ktmfileName = $ballot->npm.'_'.date('YmdHis') . '_' . $ktm->getClientOriginalName();
        $ktm->storeAs('images/ktm', $ktmfileName);
        $ballot->ktm_picture = $ktmfileName;
        
        $verification = $request->file('verification');
        $verificationfileName = $ballot->npm.'_'.date('YmdHis') . '_' . $verification->getClientOriginalName();
        $verification->storeAs('images/verification', $verificationfileName);
        $ballot->verification_picture = $verificationfileName;
        
        $ballot->accepted = 0;

        $ballot->save(); 


        foreach($request->details as $key => $val){
            // return [$val];

            $ballotDetail = new BallotDetail();
            $ballotDetail->ballot_id = $ballot->id;
            $ballotDetail->candidate_id = $val['candidate_id'];

            $ballotDetail->save();
        }

        // return [$ktmfileName];
    
        // Simpan nama file di database
        // $image = new Image();
        // $image->name = $fileName;
        // $image->extension = $file->getClientOriginalExtension();
        // $image->size = $file->getSize();
        // $image->mime_type = $file->getMimeType();
        // $image->save();


        return response()->json(['message' => 'ballot created successfully']);
    }

    public function accept(Request $request, $event, $ballot)
    {
        $ballot = Ballot::find($ballot);
        $ballot->accepted = 1;
        $ballot->save();

        return response()->json(['message' => 'ballot accepted successfully']);
    }
    
    public function reject(Request $request, $event, $ballot)
    {
        $ballot = Ballot::find($ballot);
        $ballot->accepted = 2;
        $ballot->save();

        return response()->json(['message' => 'ballot rejected successfully']);
    }
}
