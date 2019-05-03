<?php 

	function ___tableColumns($model,$quoted=true) {
       $columns = $model->getConnection()->getSchemaBuilder()->getColumnListing($model->getTable());
       if($quoted) {
           foreach ($columns as $key => &$value) {
               $value = sprintf("'%s'",$value);
           }
       }
       return $columns;
   }