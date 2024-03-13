<?php
   namespace App\Exports;

   use App\Models\Lead;
   use Maatwebsite\Excel\Concerns\FromQuery;
   use Maatwebsite\Excel\Concerns\WithHeadings;

   class LeadsExport implements FromQuery,WithHeadings{
        public function headings():array{
            return [
               'ID',
               'Full Name',
               'Mobile Number',
               'Message',
               'Created at',
               'Updated at'
            ];
        }

        public function query(){
           return Lead::query();
        }

        public function map($bulk):array{
           return [
               $bulk->id,
               $bulk->full_name,
               $bulk->mobile_number,
               $bulk->message,
               
               Date::dateTimeToExcel($bulk->created_at),
               Date::dateTimeToExcel($bulk->updated_at),
           ];
        }
   }

?>