<?php namespace App\Traits;

use App\ClusterValue;
use Illuminate\Support\Facades\DB;
/**
 *
 */
trait SegmentUser
{
  public function FunctionName($value='')
  {
    return "help";
  }

  /**
   *  @param int:  example 1 to 7
   *  @return array: of columns names in the `cluster_values` table
   */
  public function getTableColumNamesBySegmentNum($d = 1)
  {

    $results = DB::select("SELECT column_name
                             FROM information_schema.columns
                            WHERE table_name = 'cluster_values'
                              AND column_name
                             LIKE 'd". $d ."_%'");
    $columns = array();

    foreach ($results as $column) {
        $columns[] = $column->column_name;
    }

    return $columns;
  }
}
