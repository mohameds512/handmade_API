<!doctype html>
<html >
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style media="all">
        body{
            font-size: 81.25%;
        }
        .table2 th{
            border: 1px solid #ccc;
        }.table2{
             padding: 8px;
         }
         p{
             margin: 0;
         }
    </style>
</head>
<body >
<div >



    @if ($type == 1102 || $type == 1112 || $type == 1106)
{{--    Photo and University name  Arabic--}}

<table style="table-layout:fixed;" >
    <tr>
        <th style="width:33.33%;font-size: 12px">
                <img style ="" src="https://i.postimg.cc/7hv3YPLM/150.png">
        </th>

        <th style="width:50%; font-size: 14px;font-weight:bolder" align="t">
            <div style="text-align: center">
                {{$basicData->program->bylaw->faculty->name_local}}
                <br><br> شهادة تخرج
            </div>
        </th>

    </tr>
</table>

    @else
{{--    Photo and University name English --}}

<table style="table-layout:fixed;" >
            <tr>
                <th style="width:33.33%;font-size: 12px">
                    <img style ="" src="https://i.postimg.cc/7hv3YPLM/150.png">
                </th>

                <th style="width:50%; font-size: 14px;font-weight:bolder" align="left">
                    <div style="text-align: center">
                    {{$basicData->program->bylaw->faculty->name}}
                   <br> <br> Graduation Certificate
                    </div>
                    &nbsp;
                </th>


            </tr>
        </table>
    @endif
    <br><br>
        @if ($type == 1102 || $type == 1112 || $type == 1106)
        {{-- Certificate Info Arabic --}}
            <table style="table-layout:fixed;" align="right">
    <tr>
        <th style="font-size: 18px;font-weight:bolder">
            تشهد  {{$basicData->program->bylaw->faculty->name_local}} جامعه 6 اكتوبر بأن :
        </th>
    </tr>
    <tr style="font-size: 18px;font-weight:bolder">
        <th>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  //  {{$basicData->user->name_local}} //
        </th>
    </tr>
    <tr>
        <th style="font-size: 18px;font-weight:bolder">
           و جنسيته  {{$basicData->user->nationality ? $basicData->user->nationality->nationality_local: ''}} ، المولود في {{$basicData->user->nationality ? $basicData->user->nationality->name_local:''}} بتاريخ {{$basicData->user->national_id_date ? $basicData->user->national_id_date : "-/-/-"}}
        </th>
    </tr>
    <tr>
        <th style="font-size: 18px;font-weight:bolder">
          و قد منح درجة البكالوريوس في {{$basicData->program->name_local}} دور

    @if($grades->migration_month == 1)
        يناير
    @elseif ($grades->migration_month == 11)
            نوفمبر

    @elseif($grades->migration_month == 12)
                ديسمبر
    @elseif ($grades->migration_month == 2)
        فبراير
    @elseif ($grades->migration_month == 6)
        يونيو
    @elseif($grades->migration_month == 7)
        يوليو
    @elseif ($grades->migration_month == 9)
        سبتمبر
    @endif
     سنه
            {{$grades->migration_year}}
        </th>
    </tr>
    <tr>
        <th style="font-size: 18px;font-weight:bolder">
         و حصل علي معدل تراكمي ({{$grades->gpa}}) في نظام النقاط الاربع للساعات المعتمده
        </th>
    </tr>
    <tr>
        <th style="font-size: 18px;font-weight:bolder">
        و بنسبة تراكمية {{$grades->percentage}} % و بما يعادل تقدير {{$grades->grade_name_local}}
        </th>
    </tr>
    <tr>
        <th style="font-size: 18px;font-weight:bolder">
        و قد اعتمد مجلس الجامعه النتيجه و منح الدرجه في {{$grades->approved_at}}
        </th>
    </tr>
    @if( in_array($basicData->program->bylaw->faculty->id,[1,2,3,4,5]))
    <tr>
        <th style="font-size: 18px;font-weight:bolder">
        ولا يحق له مزاولة المهنه إلا بعد قضاء السنه التدريبيه الأجباريه (سنة الامتياز)
        </th>
    </tr>
    @endif
  </table>
        @else
            {{-- Certificate Info English --}}
            <table style="table-layout:fixed;padding-left: 22px;" align="left">
                <tr style="font-size: 15px; line-height: 1.6;">
                   <th ><br>{{$basicData->program->bylaw->faculty->name}} October 6 University certifies that {{$basicData->user->name}} , nationality {{$basicData->user->nationality ? $basicData->user->nationality->nationality:''}}, born in {{$basicData->user->nationality ? $basicData->user->nationality->name:'' }} on {{$basicData->user->national_id_date ? \Carbon\Carbon::parse($basicData->user->national_id_date)->format('d/m/Y'): "-/-/-" }} has been awarded the Bachelor of
                       {{$basicData->program->name}}  Degree in
                       @if($grades->migration_month == 1)
                           January
                       @elseif ($grades->migration_month == 11)
                           November
                       @elseif($grades->migration_month == 12)
                           December
                       @elseif ($grades->migration_month == 2)
                           February
                       @elseif ($grades->migration_month == 6)
                           June
                       @elseif($grades->migration_month == 6)
                           July
                       @elseif ($grades->migration_month == 9)
                           September
                       @endif
                       {{$grades->migration_year}}. His Grade Point Average {{$grades->percentage}}%, GPA is ( {{$grades->gpa}}) in the four points Credit Hours System, equivalent to general grade of ( {{$grades->grade_name}} ). The University Council approved granting the degree on 02/03/2022. The Candidate is Not Entitled To Practice Physical Therapy Until he Fulfils Successfully a Rotating Internship For a Full Calendar Year.
                   </th>
                </tr>
            </table>
        @endif
<div></div><div></div>


        @if($type==1112)
{{-- Certificates Higher univeristy Speach --}}

        @if($basicData->program->bylaw->faculty->id == 1)

                <div style="border: 1px solid black;text-align:right;font-size:14px">
                    صدر قرار رئيس المجلس الأعلي للجامعات رقم
                    (282)
                    بتاريخ 2018/09/02
                    بتجديد معادلة درجة البكالوريوس في الطب و الجراحه  التي تمنحها جامعه 6 اكتوبر - كلية الطب - ج.م. ع
                    <br>  بدرجه البكالوريوس في الطب والجراحه التي تمنحها الجامعات المصريه الخاضعه لقانون تنظيم الجامعات رقم (49) لسنه 1972
                    و لائحته التنفيذيه.
                </div>


        @elseif($basicData->program->bylaw->faculty->id == 2)
        <div style="border: 1px solid black;text-align:right;font-size:14px">
                    صدر قرار رئيس المجلس الأعلي للجامعات رقم
                    (312)
                    بتاريخ 2017/09/24
                    بتجديد معادلة درجة البكالوريوس في طب جراحه الفم و الاسنان التي تمنحها جامعه 6 اكتوبر - كلية طب و الاسنان - مدينة السادس من اكتوبر - ج.م. ع
                    <br>   في طب و جراحه الفم و الاسنان التي تمنحها الجامعات المصريه الخاضعه لقانون تنظيم الجامعات رقم 14 لسنه 1972
                    و لائحته التنفيذيه.
                </div>

        @elseif($basicData->program->bylaw->faculty->id == 3)
            <div style="border: 1px solid black;text-align:right;font-size:14px">
                صدر قرار رئيس المجلس الأعلي للجامعات رقم
                (257)
                بتاريخ 2021/08/30
                بتجديد معادلة درجة البكالوريوس في الصيدليه التي تمنحها جامعه 6 اكتوبر - كلية الصيدله - مدينة السادس من اكتوبر - ج.م. ع
                <br> بدرجة البكالوريوس  في الصيدله  التي تمنحها الجامعات المصريه الخاضعه لقانون تنظيم الجامعات رقم 49 لسنه 1972
                و لائحته التنفيذيه.
            </div>

        @elseif($basicData->program->bylaw->faculty->id == 4)

            <div style="border: 1px solid black;text-align:right;font-size:14px">
                صدر قرار رئيس المجلس الأعلي للجامعات رقم
                (212)
                بتاريخ 2016/09/19
                بتجديد معادلة درجة البكالوريوس في العلاج الطبيعي التي تمنحها جامعه 6 اكتوبر - كلية العلاج الطبيعي - مدينة السادس من اكتوبر - ج.م. ع
                <br>  بدرجه البكالوريوس في العلاج الطبيعي التي تمنحها الجامعات المصريه الخاضعه لقانون تنظيم الجامعات رقم 49 لسنه 1972
                و لائحته التنفيذيه.
            </div>

            @elseif($basicData->program->bylaw->faculty->id == 5)

                <div style="border: 1px solid black;text-align:right;font-size:14px">
                    صدر قرار رئيس المجلس الأعلي للجامعات رقم
                    (194)
                    بتاريخ 2021/07/25
                    بتجديد معادلة البكالوريوس  التي تمنحها جامعه 6 اكتوبر - كلية العلوم الطبيه التطبيقيه - مدينة السادس من اكتوبر - ج.م. ع
                    <br> في تخصصات :
                    المختبرات الطبيه - الأشعه و التصوير الطبي - الأجهزه الحيويه الطبيه بدرجه البكالوريوس
                      التي تمنحها الجامعات المصريه الخاضعه لقانون تنظيم الجامعات رقم 49 لسنه 1972
                    و لائحته التنفيذيه بإعتبارها تخصصات جديدة.
                </div>

            @elseif($basicData->program->bylaw->faculty->id == 6)
{{--                   Will change after that                                     --}}
                <div style="border: 1px solid black;text-align:right;font-size:14px">
                    صدر قرار رئيس المجلس الأعلي للجامعات رقم
                    (194)
                    بتاريخ 2021/07/25
                    بتجديد معادلة البكالوريوس  التي تمنحها جامعه 6 اكتوبر - كلية العلوم الطبيه التطبيقيه - مدينة السادس من اكتوبر - ج.م. ع
                    <br> في تخصصات :
                    المختبرات الطبيه - الأشعه و التصوير الطبي - الأجهزه الحيويه الطبيه بدرجه البكالوريوس
                    التي تمنحها الجامعات المصريه الخاضعه لقانون تنظيم الجامعات رقم 49 لسنه 1972
                    و لائحته التنفيذيه بإعتبارها تخصصات جديدة.
                </div>

            @elseif($basicData->program->bylaw->faculty->id == 7)
                <div style="border: 1px solid black;text-align:right;font-size:14px">
                    صدر قرار رئيس المجلس الأعلي للجامعات رقم
                    (312)
                    بتاريخ 2018/09/23
                    بتجديد معادلة البكالوريوس  التي تمنحها جامعه 6 اكتوبر - مدينة السادس من اكتوبر - كلية الهندسة - ج.م. ع
                    <br> في التخصصات التاليه :
                    - هندسة التشييد والبناء
                    - الهندسة المعمارية
                   - هندسة الميكاترونيات
                    الهندسة الكهربيه ( هندسة الاكتورونيات و الأتصالات - هندسة القوي و الالات الكهربية )
                    بدرجه البكالوريوس التي تمنحها الجامعات المصريه الخاضعه لقانون تنظيم الجامعات رقم 49 لسنه 1972
                    و لائحته التنفيذيه في  التخصصات المناظرة.
                </div>

            @elseif($basicData->program->bylaw->faculty->id == 8)
                <div style="border: 1px solid black;text-align:right;font-size:14px">
                    صدر قرار رئيس المجلس الأعلي للجامعات رقم
                    (312)
                    بتاريخ 2015/03/24
                    بتجديد معادلة البكالوريوس في علوم الحاسب التي تمنحها جامعه 6 اكتوبر - كلية نظم المعلومات و علوم الحاسب - ج.م. ع
                    بدرجه البكالوريوس  في الحاسبات و المعلومات التي تمنحها الجامعات المصريه الخاضعه لقانون تنظيم الجامعات رقم 49 لسنه 1972
                    و لائحته التنفيذيه من كليات الحاسبات و المعلومات .
                </div>

            @elseif($basicData->program->bylaw->faculty->id == 9)
                <div style="border: 1px solid black;text-align:right;font-size:14px">
                    صدر قرار رئيس المجلس الأعلي للجامعات رقم
                    (156)
                    بتاريخ 2019/05/27
                    بتجديد معادلة البكالوريوس في الفنون التطبيقية التي تمنحها جامعه 6 اكتوبر- مدينة السادس من أكتوبر - كلية الفنون التطبيقيه - ج.م. ع
                    <br> في التخصصات التاليه :
                    - الاعلان
                    - التصميم الداخلي والاثاث
                    - تصميم المنتجات
                    - الفوتوغرافيا و السينما و التليفزيون
                    بدرجه البكالوريوس  في الفنون التطبيقية التي تمنحها الجامعات المصريه الخاضعه لقانون تنظيم الجامعات رقم 49 لسنه 1972
                    و لائحته التنفيذيه في التخصصات المناظره .
                </div>
            @elseif($basicData->program->bylaw->faculty->id == 10)
                <div style="border: 1px solid black;text-align:right;font-size:14px">
                    صدر قرار رئيس المجلس الأعلي للجامعات رقم
                    (367)
                    بتاريخ 2017/11/13
                    بتجديد معادلة درجة البكالوريوس التي تمنحها جامعه 6 اكتوبر - مدينة السادس من أكتوبر - ج.م. ع
                    <br>"الدراسه باللغتين العربيه و الانجليزيه في تخصصي
                   <br> المحاسبة
                    <br> إدارة أعمال

                    بدرجه البكالوريوس  في التجارة التي تمنحها الجامعات المصريه الخاضعه لقانون تنظيم الجامعات رقم 49 لسنه 1972
                    و لائحته التنفيذيه في التخصصات المناظره .
                </div>

            @elseif($basicData->program->bylaw->faculty->id == 11)
{{--            We are going to Change it later --}}
                <div style="border: 1px solid black;text-align:right;font-size:14px">
                    صدر قرار رئيس المجلس الأعلي للجامعات رقم
                    (367)
                    بتاريخ 2017/11/13
                    بتجديد معادلة درجة البكالوريوس التي تمنحها جامعه 6 اكتوبر - مدينة السادس من أكتوبر - ج.م. ع
                    <br>"الدراسه باللغتين العربيه و الانجليزيه في تخصصي
                    <br> المحاسبة
                    <br> إدارة أعمال

                    بدرجه البكالوريوس  في التجارة التي تمنحها الجامعات المصريه الخاضعه لقانون تنظيم الجامعات رقم 49 لسنه 1972
                    و لائحته التنفيذيه في التخصصات المناظره .
                </div>

            @elseif($basicData->program->bylaw->faculty->id == 12)
                <div style="border: 1px solid black;text-align:right;font-size:14px">
                    صدر قرار رئيس المجلس الأعلي للجامعات رقم
                    (119)
                    بتاريخ 2014/05/18
                    <br>بتجديد معادلة درجة البكالوريوس التي تمنحها جامعه 6 اكتوبر- كلية الإعلام و فنون الاتصال - مدينة السادس من أكتوبر - ج.م. ع في تخصصات :
                    <br>* الإذاعة(الراديو والتلفزيون)
                    <br>* علاقات عامة و إعلان
                    <br>* الصحافه

                    بدرجه البكالوريوس  في الإعلام التي تمنحها الجامعات المصريه الخاضعه لقانون تنظيم الجامعات رقم 49 لسنه 1972
                    و لائحته التنفيذيه من كليات الإعلام في  التخصصات المناظره .
                </div>

            @elseif($basicData->program->bylaw->faculty->id == 13)
                <div style="border: 1px solid black;text-align:right;font-size:14px">
                    صدر قرار رئيس المجلس الأعلي للجامعات رقم
                    (279)
                    بتاريخ 2018/09/02
                    <br>بتجديد معادلة درجة البكالوريوس التي تمنحها جامعه 6 اكتوبر- كلية التربيه - ج.م. ع في تخصصي :
                    <br>* اللغة العربية و الدراسات الاسلاميه
                    <br>* اللغة الانجليزيه
                    بدرجه الليسانس  في الاداب والتربيه التي تمنحها الجامعات المصريه الخاضعه لقانون تنظيم الجامعات رقم 49 لسنه 1972
                    و لائحته التنفيذيه من كليات التربيه في التخصصات المناظره .
                </div>

            @elseif($basicData->program->bylaw->faculty->id == 14)
                <div style="border: 1px solid black;text-align:right;font-size:14px">
                    صدر قرار رئيس المجلس الأعلي للجامعات رقم
                    (313)
                    بتاريخ 2018/09/23
                    <br>بتجديد معادلة درجة البكالوريوس التي تمنحها جامعه 6 اكتوبر- كلية السياحه والفنادق - ج.م. ع في التخصصات التالية :
                     - اللغة الدراسات السياحيه - الإدارة الفندقيه - الإرشاد السياحي
                    <br>
                    بدرجه البكالوريوس  في السياحه و الفنادق التي تمنحها الجامعات المصريه الخاضعه لقانون تنظيم الجامعات رقم 49 لسنه 1972
                    و لائحته التنفيذية في التخصصات المناظره .
                </div>

            @elseif($basicData->program->bylaw->faculty->id == 15)
                <div style="border: 1px solid black;text-align:right;font-size:14px">
                    صدر قرار رئيس المجلس الأعلي للجامعات رقم
                    (194)
                    بتاريخ 2021/07/25
                    <br>بتجديد معادلة درجة البكالوريوس التي تمنحها جامعه 6 اكتوبر- كلية العلوم الطبية التطبيقية - مدينة السادس من اكتوبر - ج.م. ع في تخصصات:
                    المختبرات الطبية - الأشعة و التصوير الطبي - الأجهزة الحيويه الطبية
                    بدرجه البكالوريوس التي تمنحها الجامعات المصريه الخاضعه لقانون تنظيم الجامعات رقم 49 لسنه 1972
                    و لائحته التنفيذية باعتبارها تخصصات جديدة .
                </div>

            @endif

        @endif
        <br><br><div></div>
</div>

</body>
</html>
