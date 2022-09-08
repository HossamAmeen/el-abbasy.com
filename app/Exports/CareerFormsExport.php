<?php

namespace App\Exports;

use App\Models\CareerForm;
use App\Enums\SexType;
use App\Enums\MilitaryStatus;
use App\Enums\CivilService;

use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromArray;
use Tu6ge\VoyagerExcel\Exports\AbstractExport;

class CareerFormsExport extends AbstractExport implements FromArray
{
    /**
    * @return array
     */
    protected $dataType;
    protected $model;
    protected $ids;

    public function __construct($dataType, array $ids)
    {
        $this->dataType = $dataType;
        $this->model = new $dataType->model_name();
        $this->ids = array_filter($ids);
    }

    public function array(): array
    {
        $rows = $this->model->when(
            count($this->ids) > 0,
            function ($query) {
                $query->whereIn($this->model->getKeyName(), $this->ids);
            }
        )->get();

        $values = [];
        array_push($values,
        [
            "Name",
            "Job",
            "Email",
            "Number",
            "Address",
            "Sex",
            "Military status",
            "civil service",
            "Nationality",
            "National ID",
            "Birthday",
            "Qualification type",
            "Qualification name",
            "University Name",
            "skills",
            "Experience"
        ]);

        foreach ($rows as $row) {
            array_push($values, [
                $row->name,
                $row->job->name,
                $row->email,
                $row->number,
                $row->address,
                isset($row->sex_type) ? SexType::fromValue($row->sex_type)->key : null,
                isset($row->military_status) ? MilitaryStatus::fromValue($row->military_status)->key : null,
                isset($row->civil_service) ? CivilService::fromValue($row->civil_service)->key : null,
                $row->nationality,
                $row->national_id,
                $row->birthday,
                $row->qualification_type,
                $row->qualification_name,
                $row->qualification_number,
                $row->skills,
                $row->experience->pluck('name')
            ]);
        }
        return $values;
    }
}
