<?php

namespace App\Http\Controllers;

use Session;
use App\ClusterValue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClusterValuesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ClusterValue $clusterValue)
    {
        $clusters = $clusterValue->find(1);
        return view('clustervalues')->with('d', $clusters);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ClusterValue  $clusterValue
     * @return \Illuminate\Http\Response
     */
    public function show(ClusterValue $clusterValue)
    {
        //
    }

    /**
     * Returns JSON data for ClustreValue.vue component
     *
     * @param  \App\ClusterValue  $clusterValue
     * @return \Illuminate\Http\Response
     */
    public function getBySegment($d = 1, Request $request, ClusterValue $clusterValue)
    {
      $id = 1; //TODO $id to passed dynamically when we start to version cluster values

      if(isset($d)){
         $results = DB::select("SELECT column_name
                                  FROM information_schema.columns
                                 WHERE table_name = 'cluster_values'
                                   AND column_name
                                  LIKE 'd". $d ."_%'");
         $columns = array();

         foreach ($results as $column) {
             $columns[] = $column->column_name;
         }

         $clusters = $clusterValue->find($id, $columns);

         return view('api.json_cluster_values')->with('d', $clusters)->with('c', $d)->with('id', $id);
      }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ClusterValue  $clusterValue
     * @return \Illuminate\Http\Response
     */
    public function edit(ClusterValue $clusterValue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ClusterValue  $clusterValue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClusterValue $clusterValue)
    {
       if (!preg_match("/[a-zA-Z,!@#$\%\^\&\*();\\/\|<>\"\']/i", $request->value))
       {
         //$clusterValue::where('id', $request->id)->update([$request->name => $request->value]);
         return response()->json(['status' => 'sucess','value' => $request->value, 'message' => ""] );
       }
        else
       {
         return response()->json(['status' => 'failed','value'=> $request->value,'message' => 'Update Failed Bad Characters Found']);
       }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ClusterValue  $clusterValue
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClusterValue $clusterValue)
    {
        //
    }
}
