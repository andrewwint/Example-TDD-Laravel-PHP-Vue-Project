@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-11 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <h3>Manage Cluster Value
                      <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target=".test-cluster-segment">Test Scoring</button></h3>
                </div>

                <div class="panel-body">
                  <div>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                      <li role="presentation" class="active"><a href="#d1" aria-controls="d1" role="tab" data-toggle="tab">Country Careful</a></li>
                      <li role="presentation"><a href="#d2" aria-controls="d2" role="tab" data-toggle="tab">Basic Beginning</a></li>
                      <li role="presentation"><a href="#d3" aria-controls="d3" role="tab" data-toggle="tab">Super Singles</a></li>
                      <li role="presentation"><a href="#d4" aria-controls="d4" role="tab" data-toggle="tab">Middle-Grounded</a></li>
                      <li role="presentation"><a href="#d5" aria-controls="d5" role="tab" data-toggle="tab">Living Latin</a></li>
                      <li role="presentation"><a href="#d6" aria-controls="d6" role="tab" data-toggle="tab">Established Elders</a></li>
                      <li role="presentation"><a href="#d7" aria-controls="d7" role="tab" data-toggle="tab">Oozing Optimism</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content" id="tab-cluster-values">
                     <div role="tabpanel" class="tab-pane active" id="d1">
                        <!-- Vue component: ClusterValue.vue -->
                        <cluster-table-row segmentcluster="1"></cluster-table-row>
                     </div>
                     <div role="tabpanel" class="tab-pane" id="d2">
                       <!-- Vue component: ClusterValue.vue -->
                       <cluster-table-row segmentcluster="2"></cluster-table-row>
                     </div>
                     <div role="tabpanel" class="tab-pane" id="d3">
                       <!-- Vue component: ClusterValue.vue -->
                       <cluster-table-row segmentcluster="3"></cluster-table-row>
                     </div>
                     <div role="tabpanel" class="tab-pane" id="d4">
                       <!-- Vue component: ClusterValue.vue -->
                       <cluster-table-row segmentcluster="4"></cluster-table-row>
                     </div>
                     <div role="tabpanel" class="tab-pane" id="d5">
                       <!-- Vue component: ClusterValue.vue -->
                       <cluster-table-row segmentcluster="5"></cluster-table-row>
                     </div>
                     <div role="tabpanel" class="tab-pane" id="d6">
                       <!-- Vue component: ClusterValue.vue -->
                       <cluster-table-row segmentcluster="6"></cluster-table-row>
                     </div>
                     <div role="tabpanel" class="tab-pane" id="d7">
                       <!-- Vue component: ClusterValue.vue -->
                       <cluster-table-row segmentcluster="7"></cluster-table-row>
                     </div>
                    </div>

                  </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Large modal -->

<div class="modal fade test-cluster-segment" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <score-test></score-test>
  </div>
</div>


@endsection
