<?php

use App\Enums\TransactionStatus;

return [

    TransactionStatus::class => [
        TransactionStatus::pending =>  'قيد الانتظار',
        TransactionStatus::completed =>'مكتمل',
        TransactionStatus::reflected =>'مكتمل',
        TransactionStatus::failed =>   'فشلت',
    ],

];
