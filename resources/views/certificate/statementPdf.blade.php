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
        td,tr{
            border: 1px solid #ccc;
        }
        .table2 th{
            border: 1px solid #ccc;
        }.table2{
             padding: 8px;
         }
    </style>
</head>
<body >
    <div>
        <div style="text-align: center;font-weight: bold;font-size: 28px">
            بيان حالة
        </div>
<br><br><br>
        <div style="text-align: right;font-weight: bold;font-size: 18px">
            بيانات الطالب:-
        </div>
        <br>
        <table class="table2" style="table-layout:fixed;border: 1px solid #ccc;max-width: 100%;text-align: center;">
            <thead>
            <tr>
                <th scope="col" style="width: 30%;font-size: 14px">{{$basicData->user->nationality->nationality_local}}</th>
                <th scope="col" style="width: 20%;font-size: 16px">
                    الجنسية
                </th>
                <th scope="col" style="width: 30%;font-size: 14px">
                    {{$basicData->user->name_local}}
                </th>
                <th scope="col" style="width: 20%;font-size: 16px">
                  اسم الطالب
                </th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="col" style="width: 30%;font-size: 14px">{{$basicData->pre_study_info}}</th>
                <th scope="col" style="width: 20%;font-size: 16px">
                    بلد المؤهل
                </th>
                <th scope="col" style="width: 30%;font-size: 14px">
                    {{$basicData->pre_study_name}}
                </th>
                <th scope="col" style="width: 20%;font-size: 16px">
                    نوع المؤهل
                </th>
            </tr>
            <tr>
                <th scope="col" style="width: 30%;font-size: 14px"> @if($basicData->prestudy_marks != 0 ||$basicData->prestudy_max_marks != 0 )
                        {{(($basicData->prestudy_marks / $basicData->prestudy_max_marks) * 100) }}
                    @endif</th>
                <th scope="col" style="width: 20%;font-size: 16px">
                    النسبة المئويه

                </th>
                <th scope="col" style="width: 30%;font-size: 14px">
                    {{$basicData->prestudy_marks}}
                </th>
                <th scope="col" style="width: 20%;font-size: 16px">
                  المجموع
                </th>
            </tr>

            <tr>
                <td scope="row" colspan="3" style="font-size: 14px">{{$basicData->prestudy_info}}</td>
                <th scope="row"style="width: 20%;font-size: 16px">سنة المؤهل</th>
            </tr>

            </tbody>
        </table>
        <br><br>
        <div style="text-align: right;font-weight: bolder;font-size: 18px;text-decoration: underline">* موقف الطالب :-</div>
        <br>
        <div style="text-align: right;font-size: 16px">
            قيدت
            @if($basicData->user->gender == \App\Models\Users\User::GENDER_FEMALE)
                الطالبة
            @else
                الطالب
            @endif
            بكلية ( {{$basicData->program->bylaw->faculty->name_local}}) {{$basicData->level->name_local}} ( ساعات معتمده ) العام الدراسي ({{$basicData->term->alt_name_local}})
        </div>
        <br>
        <div style="text-align: right;font-size: 16px">
            و قد اعطيت هذه الإفاده للطالبه لتقديمها إلي / {{$certificate->apply_to}}
        </div>

        <div style="text-align: center;font-size: 16px">
            دون ادني مسؤوليه علي الجامعه ،
        </div>
        {{--
        <br><br>

        <table style="table-layout:fixed;" align="right" >
            <tr>
                <th style="font-size: 16px;font-weight:bolder;text-align:center">الموظف المختص</th>
                <th style="font-size: 16px;font-weight:bolder;text-align:center">مدير الإداره</th>
                <th style="font-size: 16px;font-weight:bolder;text-align:center">مدير عام المجلس الاعلي للجامعات</th>
            </tr>
            <br>
            <tr>
                <th style="font-size: 12px;font-weight:bolder;text-align:center">_____</th>
                <th style="font-size: 12px;font-weight:bolder;text-align:center">_____</th>
                <th style="font-size: 12px;font-weight:bolder;text-align:center">_____</th>
            </tr>
        </table>
        <br><br><br><br><br><br><br><br><br><br>
        <table style="table-layout:fixed;" align="right" >
            <tr>
                <th style="font-size: 16px;font-weight:bolder;text-align:center">الموظف المختص</th>
                <th style="font-size: 16px;font-weight:bolder;text-align:center"></th>
                <th style="font-size: 16px;font-weight:bolder;text-align:center">يعتمد ،، <br> رئيس الجامعه</th>
            </tr>
            <br>
            <tr>
                <th style="font-size: 12px;font-weight:bolder;text-align:center;">_____</th>
                <th style="font-size: 12px;font-weight:bolder;text-align:center;"></th>
                <th style="font-size: 12px;font-weight:bolder;text-align:center">_____</th>
            </tr>
        </table>
        --}}
    </div>

</body>
</html>
