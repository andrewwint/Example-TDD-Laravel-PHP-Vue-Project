<?php

namespace App\Http\Controllers;

use Session;
use App\ClusterValue;
use Illuminate\Http\Request;


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
  * @param  int  $id
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\ClusterValue  $clusterValue
  * @return \Illuminate\Http\Response
  */
  public function getBySegment($d = 1, Request $request, ClusterValue $clusterValue)
  {
    $id = 1; //TODO $id to passed dynamically when we start to version cluster values

    if(isset($d)){
      $columns = $clusterValue->getTableColumNamesBySegmentNum($d);
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

      $result = $clusterValue->where('id', (int)$request->id)->update([$request->name => $request->value]);

      if($result)
      {
        return response()->json(['status' => 'sucess','value' => $request->value, 'message' => ""] );
      }
      else
      {
        return response()->json(['status' => 'failed', 'value'=> $request->value,'message' => 'Something went wrong']);
      }
    }
    else
    {
      return response()->json(['status' => 'failed','value'=> $request->value,'message' => 'Update Failed Bad Characters Found']);
    }
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\ClusterValue  $clusterValue
  * @return \Illuminate\Http\Response
  */
  public function score(Request $request, ClusterValue $clusterValue)
  {
    $clusterValue->init($request->d, $request->id, $request->args_array);
    $score = $clusterValue->assignCluster();

    if($score <= 7)
    {
      return response()->json(['status' => 'sucess','value' => $score, 'message' => $clusterValue->getSegmentDescriptionByD($score)] );
    }
    else
    {
      return response()->json(['status' => 'failed','value' => $score, 'message' => $clusterValue->getSegmentDescriptionByD($score)] );
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
