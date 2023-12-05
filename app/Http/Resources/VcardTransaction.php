<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VcardTransaction extends JsonResource{
    
    public function toArray($request)
    {
        return [
          'TransactionAmount' => $this->resource['TransactionAmount'],
          'ProductName' => $this->resource['ProductName'],
          'Narration' => $this->resource['Narration'],
          'Fee'=>$this->resource['Fee']

        ];
    }
}