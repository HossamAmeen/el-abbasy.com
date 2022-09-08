<!DOCTYPE html>
<html  dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'XB-Riyaz', sans-serif;
            /*font-family: 'Droid Arabic Kufi', sans-serif;*/
        }
        .newtable_style ul {
            margin-bottom: 0;

        }

        .newtable_style ul li {
            padding: 20px 20px;
            border-bottom: 1px solid #EEE;
            text-align: right;
        }

        .newtable_style ul li h5 {
            font-size: 15px;
            margin-bottom: 0;
        }

        .newtable_style ul li p {
            font-size: 14px;
            margin-bottom: 0;
            margin-top: 5px;
            color: #888;
            text-transform: none;
        }
        /*# sourceMappingURL=tablestyle.css.map */
    </style>
</head>

<body>


<h6  style="text-align: center; font-size: 20px; padding-bottom: 0">طلب معاينة</h6>

<div class="newtable_style">
    @foreach( $data as $row)
    <ul class="list-unstyled">
        <li>
            <h5>الاسم</h5>
            <p>{{ $row->name }}</p>
        </li>
        <li>
            <h5>الايميل</h5>
            <p>{{ $row->email }}</p>
        </li>
        <li>
            <h5>رقم التلفون</h5>
            <p>{{ $row->number }}</p>
        </li>
        <li>
            <h5>الوظيفة</h5>
            <p>{{ $row->job }}</p>
        </li>
        <li>
            <h5>المحافظة</h5>
            <p>{{ $row->governorate }}</p>
        </li>
        <li>
            <h5>المركز</h5>
            <p>{{ $row->city }}</p>
        </li>
        <li>
            <h5>تفاصيل العنوان</h5>
            <p>{{ $row->address }}</p>
        </li>
        <li>
            <h5>نوع الوحده</h5>
            <p>{{ $row->apartment_type }}</p>
        </li>
         <li>
             <h5>المساحة</h5>
             <p>{{ $row->apartment_area }}</p>
        </li>
         <li>
             <h5>حالة الوحدة</h5>
             <p>{{ $row->apartment_status }}</p>
        </li>
         <li>
             <h5>بداية معاد التواجد</h5>
             <p>{{ $row->available_start_time }}</p>
        </li>
         <li>
             <h5>نهاية معاد التواجد</h5>
             <p>{{ $row->available_end_time }}</p>
        </li>
         <li>
             <h5>الملاحظة</h5>
             <p>{{ $row->notes }}</p>
        </li>
        <li>
            <h5>السعر</h5>
            <p>{{ $row->price }}</p>
        </li>
        <li>
            <h5>طريقة الدفع</h5>
            <p>{{ $row->transaction ? $row->transaction->payment_method : null}}</p>
        </li>
        <li>
            <h5>حالة الدفع</h5>
            <p>{{ $row->transaction ? $row->transaction->status : null}}</p>
        </li>
        <li>
            <h5>تاريخ تسجيل الطلب</h5>
            <p>{{ $row->created_at}}</p>
        </li>

    </ul>
    @endforeach
</div>



</body>
</html>
