<?php

use App\Enums\TransactionStatus;

return [

    TransactionStatus::class => [
        TransactionStatus::pending =>  'Pending',
        TransactionStatus::completed =>'Completed',
        TransactionStatus::reflected =>'Completed',
        TransactionStatus::failed =>   'Failed',
    ],

];
