
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        table, th, td {
            border:1px solid black;
            text-align: center;
        }
        body {
            font-family: 'XB-Riyaz', sans-serif;
        }
    </style>
</head>
<h5 class="breadcrumb-content" style="text-align: center;">طلبات المعاينة</h5>


<div class="preview-order-compleate payment-status">
    <div class="container">
        <div class="wrapper">

            <table style="width:100%">
                <tr>
                    <th>الاسم</th>
                    <th>الايميل</th>
                    <th>رقم التلفون</th>
                    <th>الوظيفة</th>
                    <th>المحافظة</th>
                    <th>المركز</th>
                    <th>تفاصيل العنوان</th>
                    <th>نوع الوحده</th>
                    <th>المساحة</th>
                    <th>حالة الوحدة</th>
                    <th>بداية معاد التواجد</th>
                    <th>نهاية معاد التواجد</th>
                    <th>الملاحظة</th>
                    <th>السعر</th>
                    <th>طريقة الدفع</th>
                    <th>حالة الدفع</th>
                    <th>تاريخ تسجيل الطلب</th>
                </tr>
                @foreach( $data as $row)
                    <tr>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->number }}</td>
                        <td>{{ $row->job }}</td>
                        <td>{{ $row->governorate }}</td>
                        <td>{{ $row->city }}</td>
                        <td>{{ $row->address }}</td>
                        <td>{{ $row->apartment_type }}</td>
                        <td>{{ $row->apartment_area }}</td>
                        <td>{{ $row->apartment_status }}</td>
                        <td>{{ $row->available_start_time }}</td>
                        <td>{{ $row->available_end_time }}</td>
                        <td>{{ $row->notes }}</td>
                        <td>{{ $row->price }}</td>
                        <td>{{ $row->transaction ? $row->transaction->payment_method : null}}</td>
                        <td>{{ $row->transaction ? $row->transaction->status : null}}</td>
                        <th>{{ $row->created_at}}</th>

                    </tr>

                @endforeach

            </table>


        </div>
    </div>
</div>
