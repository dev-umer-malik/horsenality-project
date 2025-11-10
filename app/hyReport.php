<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\hyReportType;

class hyReport extends Model
{
    
    protected $appends = ['report_name'];
    
    public function getReportNameAttribute()
    {
        return hyReportType::where("id", $this->report_type_id)->first()->report_name;
    }
    
}
