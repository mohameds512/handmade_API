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
            line-height: 1.2;
        }
        td{
            vertical-align: bottom;
        }
        .table-transcript td, .table-transcript tr{
            border: 1px solid #ccc;
        }
        .table-transcript th{
            border: 1px solid #ccc;
        }.table-transcript{
             padding-top: 3px;
             align: center;
         }


        /*.table-transcript,*/
        /*.table-transcript td, .table-transcript tr{*/
        /*    border: 1px solid #ccc;*/
        /*}*/
        /*.table-transcript th{*/
        /*    border: 1px solid #ccc;*/
        /*}*/
        .table-transcript{
             padding-top: 3px;
            align: center;
         }

    </style>
</head>
<body >
<div>

    <table style="table-layout:fixed; " >
        <tr>
            <th align="center" style="width: 40.33%;font-size:12px ">
                <div>
                    <p style="vertical-align: middle">
                        تأسست بالقرار الجمهوري رقم (234) السنه 1996
                        <br>
                        إدارة شؤون التعليم و الطلاب
                    </p>

                </div>
            </th>
            <th align="left" style="width: 25.33%;">
                <div style="vertical-align: middle">
                    <p style="font-size: 20px;">
                        @if($english==1)<span > بيان حالة</span>
                        @else
                           <span > Transcript</span>
                        @endif
                    </p>
                </div>
            </th>
            <th style="width:33.33%;font-size: 12px;text-align: right">

                <img style ="" src="{{ public_path('img/logos/logo.jpg') }}" width="80px" height="80px">

            </th>
        </tr>
    </table>
    <span>__________________________________________________________________________________________________</span> <span style="text-align: right;font-size: 16px">جامعة 6 أكتوبر </span>
    <br><br>

{{--    heading of student data --}}
    @if($english==1)
        {{--    heading of Logo data --}}


        <table style="table-layout:fixed;" >
            <tr>
                <th style="width:20%;font-size: 12px">
                    <img style ="" src="{{ public_path('img/150.PNG') }}">
                </th>
                <th style="width: 80%;">
                    <table class="table2"
                           style="width: 100%;table-layout:fixed;max-width: 100%;text-align: right;padding-top: 9px">
                        <thead>
                        <tr>
                            <th scope="col" style="width: 80%;font-size: 14px">{{$basicData->user->code}}</th>
                            <th scope="col" style="width: 20%;font-size: 14px">
                                كود الطالب :
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr style="vertical-align: baseline;">
                            <th scope="col" style="width: 80%;font-size: 14px">
                                {{$basicData->user->name_local}}
                            </th>
                            <th scope="col" style="width: 20%;font-size: 14px">
                                اسم الطالب :
                            </th>
                        </tr>
                        <tr style="vertical-align: baseline;">

                            <th scope="col" style="width: 36%;font-size: 12px;line-height: 14px">
                                {{$basicData->program->name_local}}
                            </th>
                            <th scope="col" style="width: 14%;font-size: 14px;">

                                الشعبة &nbsp;:
                            </th>
                            <th scope="col" style="width: 30%;font-size: 12px;"> {{$basicData->program->bylaw->faculty->name_local}}</th>
                            <th scope="col" style="width: 20%;font-size: 14px">
                                اسم الكليه&nbsp;&nbsp; :
                            </th>
                        </tr>
                        <tr>

                            <th scope="col" style="width: 36%;font-size: 14px">
                                {{$basicData->user->nationality->nationality_local}}
                            </th>
                            <th scope="col" style="width: 14%;font-size: 14px">
                                الجنسية :
                            </th>
                            <th scope="col" style="width: 30%;font-size: 14px"> {{$basicData->level->name_local}}</th>
                            <th scope="col" style="width: 20%;font-size: 14px">
                                المستوي &nbsp;&nbsp;&nbsp;:
                            </th>
                        </tr>
                        </tbody>
                    </table>
                </th>
            </tr>
        </table>
    @else
        {{--    heading of Logo data --}}

        <table style="table-layout:fixed; padding-top: 3px " >
            <tr>
                <th style="width: 80%;">
                    <table class="table2"
                           style="width: 100%;table-layout:fixed;max-width: 100%;padding-top: 6px;text-align: left">
                        <thead>
                        <tr>
                            <th scope="col" style="width: 15%;font-size: 12px">Code :</th>
                            <th scope="col" style="width: 85%;font-size: 12px;line-height: 20px">
                                {{$basicData->user->code}}
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr >
                            <th scope="col" style="width: 25%;font-size: 12px">Student Name :
                            </th>
                            <th scope="col" style="width: 75%;font-size: 12px;line-height: 20px;text-align: left">
                                {{$certificate->user->name}}
                            </th>
                        </tr>
                        <tr >
                            <th scope="col" style="width: 14%;font-size: 12px;">Faculty :</th>
                            <th scope="col" style="width: 37%;font-size: 12px;line-height: 16px">

                                {{$basicData->program->bylaw->faculty->name}}
                            </th>
                            <th scope="col" style="width: 18%;font-size: 12px;">Program :
                            </th>
                            <th scope="col" style="width: 30%;font-size: 12px;line-height: 16px">
                                {{$basicData->program->name}}
                            </th>

                        </tr>
                        <tr>
                            <th scope="col" style="width: 22%;font-size: 12px;">Nationality :
                            </th>
                            <th scope="col" style="width: 28%;font-size: 12px;line-height: 20px">
                               {{$basicData->user->nationality->nationality}}
                            </th>
                            <th scope="col" style="width: 18%;font-size: 12px ;"> Level :</th>
                            <th scope="col" style="width: 37%;font-size: 12px;line-height: 20px">
                                {{$basicData->level->name}}
                            </th>
                        </tr>
                        </tbody>
                    </table>
                </th>
                <th style="width:20%;font-size: 12px">
                    <img style ="" src="{{ public_path('img/150.PNG') }}">
                </th>
            </tr>
        </table>
    @endif

{{--    Start of Transcript Data --}}
    <br><br>
        @if($english==1)
            @for ($i = 0; $i < count($grades); $i++)
                {{--                Break the page for only three terms--}}
                @if($i%2==0 && $i!=0)
                    <br pagebreak="true" />

                    {{--                Start of putting headding on every page  --}}
                    @if($english==1)

{{--                        Logo Reapting each page --}}
                    <table style="table-layout:fixed; " >
                        <tr>


                            <th align="center" style="width: 40.33%;font-size:12px ">
                                <div>

                                    <p style="vertical-align: middle">
                                        تأسست بالقرار الجمهوري رقم (234) السنه 1996
                                        <br>
                                        إدارة شؤون التعليم و الطلاب
                                    </p>

                                </div>
                            </th>
                            <th align="left" style="width: 25.33%;">
                                <div style="vertical-align: middle">
                                    <p style="font-size: 20px;">
                                        @if($english==1)<span > بيان حالة</span>
                                        @else
                                            <span > Transcript</span>
                                        @endif
                                    </p>
                                </div>
                            </th>
                            <th style="width:33.33%;font-size: 12px;text-align: right">

                                <img style ="" src="{{ public_path('img/logos/logo.jpg') }}" width="80px" height="80px">

                            </th>
                        </tr>
                    </table>
                    <span>__________________________________________________________________________________________________</span> <span style="text-align: right;font-size: 16px">جامعة 6 أكتوبر </span>
                    <br><br>

                        <table style="table-layout:fixed; " >
                            <tr>
                                <th style="width:20%;font-size: 12px">
                                    <img style ="" src="{{ public_path('img/150.PNG') }}">
                                </th>
                                <th style="width: 80%;">
                                    <table class="table2"
                                           style="width: 100%;table-layout:fixed;max-width: 100%;text-align: right;padding-top: 9px">
                                        <thead>
                                        <tr>
                                            <th scope="col" style="width: 80%;font-size: 14px">{{$basicData->user->code}}</th>
                                            <th scope="col" style="width: 20%;font-size: 14px">
                                                كود الطالب :
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr style="vertical-align: baseline;">
                                            <th scope="col" style="width: 80%;font-size: 14px">
                                                {{$basicData->user->name}}
                                            </th>
                                            <th scope="col" style="width: 20%;font-size: 14px">
                                                اسم الطالب :
                                            </th>
                                        </tr>
                                        <tr style="vertical-align: baseline;">

                                            <th scope="col" style="width: 36%;font-size: 14px;line-height: 12px">
                                                {{$basicData->program->name_local}}
                                            </th>
                                            <th scope="col" style="width: 14%;font-size: 14px;">

                                                الشعبة &nbsp;:
                                            </th>
                                            <th scope="col" style="width: 30%;font-size: 14px;"> {{$basicData->program->bylaw->faculty->name_local}}</th>
                                            <th scope="col" style="width: 20%;font-size: 14px">
                                                اسم الكليه&nbsp;&nbsp; :
                                            </th>
                                        </tr>
                                        <tr>

                                            <th scope="col" style="width: 36%;font-size: 14px">
                                                {{$basicData->user->nationality->nationality_local}}
                                            </th>
                                            <th scope="col" style="width: 14%;font-size: 14px">
                                                الجنسية :
                                            </th>
                                            <th scope="col" style="width: 30%;font-size: 14px"> {{$basicData->level->name_local}}</th>
                                            <th scope="col" style="width: 20%;font-size: 14px">
                                                المستوي &nbsp;&nbsp;&nbsp;:
                                            </th>
                                        </tr>
                                        </tbody>
                                    </table>
                                </th>
                            </tr>
                        </table>
                        <br><br>
                    @else

                    @endif
                @else
                @endif
                {{-- Start of filling transcript data --}}
                <table  class="table-transcript" style="table-layout:fixed;border: 1px solid #ccc;max-width: 100%;text-align: right;">
                    <thead>
                    <tr>
                        <th scope="col" style="width: 9%;font-size: 11px;text-align: center">
                            نقاط الفصل
                        </th>

                        <th scope="col" style="width: 8%;font-size: 11px;text-align: center">
                            ساعات الفصل
                        </th>

                        <th scope="col" style="width: 7%;font-size: 11px">
                            النقاط
                        </th>

                        <th scope="col" style="width: 8%;font-size: 11px">
                            الساعات
                        </th>

                        <th scope="col" style="width: 7%;font-size: 11px">
                            التقدير
                        </th>

                        <th scope="col" style="width: 25%;font-size: 11px;font-weight: 900;">
                            إسم الماده
                        </th>

                        <th scope="col" style="width: 15%;font-size: 11px">
                            كود الماده
                        </th>

                        <th scope="col" style="width: 10%;font-size: 11px ;text-align: center">
                            الفصل الدراسي
                        </th>
                        <th scope="col" style="width: 8%;font-size: 11px;text-align: center">
                            العام الدراسي
                        </th>

                    </tr>
                    </thead>
                    <tbody >
                    @for($j=0;$j < ($grades[$i]->count);$j++)
                        @if($j == 0)
                            <tr>
                                @if($grades[$i]->count > 2)
                                <td scope="row" align="center" rowspan="{{$grades[$i]->count}}" style="width: 9%;font-size: 10px">
                                    <div style="vertical-align: middle">
                                        <p>

                                            {{$grades[$i]->points}}
                                        </p>
                                    </div>
                                </td>

                                <td align="center"  scope="row" rowspan="{{$grades[$i]->count}}" style="width: 8%;font-size: 10px">
                                    <div style="vertical-align: middle">
                                        <p>

                                            {{$grades[$i]->hours}}
                                        </p>
                                    </div>
                                </td>
                                @else
                                    <td scope="row" align="center" rowspan="{{$grades[$i]->count}}" style="width: 9%;font-size: 10px">


                                                {{$grades[$i]->points}}

                                    </td>

                                    <td align="center"  scope="row" rowspan="{{$grades[$i]->count}}" style="width: 8%;font-size: 10px">


                                                {{$grades[$i]->hours}}

                                    </td>
                                @endif
                                <td scope="row" style="width: 7%;font-size: 10px;text-align: center">
                                    {{($grades[$i]->grades[$j]->credit_hours) * ($grades[$i]->grades[$j]->grade_gpa)}}
                                </td>

                                <td scope="row" style="width: 8%;font-size: 10px;text-align: center">
                                    {{$grades[$i]->grades[$j]->credit_hours}}
                                </td>

                                <td scope="row" style="width: 7%;font-size: 10px;text-align: center">
                                    {{$grades[$i]->grades[$j]->grade_name_local}}
                                </td>

                                <td scope="row" style="width: 25%;font-size: 10px;font-weight: 900;">
                                    {{$grades[$i]->grades[$j]->course_name_local}}
                                </td>

                                <td scope="row"  style="width: 15%;font-size: 10px">
                                    {{$grades[$i]->grades[$j]->code}}
                                </td>

                                @if($grades[$i]->count > 2)
                                <td scope="row" rowspan="{{$grades[$i]->count}}" style="width: 10%;font-size: 10px">
                                    <div style="vertical-align: middle;">
                                        <p>
                                            {{
                                            preg_replace('/[0-9]+/', '', $grades[$i]->term_name_local)
                                            }}
                                        </p>
                                    </div>
                                </td>

                                <td align="center" scope="row" rowspan="{{$grades[$i]->count}}" style="width: 8%;font-size: 10px">
                                    <div style="vertical-align: middle;">
                                        <p >{{$grades[$i]->year}}</p>
                                    </div>
                                </td>
                                @else
                                        <td scope="row" rowspan="{{$grades[$i]->count}}" style="width: 10%;font-size: 10px">

                                                    {{
                                                    preg_replace('/[0-9]+/', '', $grades[$i]->term_name_local)
                                                    }}

                                        </td>

                                        <td align="center" scope="row" rowspan="{{$grades[$i]->count}}" style="width: 8%;font-size: 10px">

                                               {{$grades[$i]->year}}

                                        </td>
                                @endif


                            </tr>
                        @else
                            <tr>
                                <td scope="row" style="width: 7%;font-size: 10px;text-align: center">
                                    {{($grades[$i]->grades[$j]->credit_hours) * ($grades[$i]->grades[$j]->grade_gpa)}}
                                </td>

                                <td scope="row" style="width: 8%;font-size: 10px;text-align: center">
                                    {{$grades[$i]->grades[$j]->credit_hours}}
                                </td>

                                <td scope="row" style="width: 7%;font-size: 10px;text-align: center">
                                    {{$grades[$i]->grades[$j]->grade_name_local}}
                                </td>

                                <td scope="row" style="width: 25%;font-size: 10px;font-weight: 900;">
                                    {{$grades[$i]->grades[$j]->course_name_local}}
                                </td>

                                <td scope="row"  style="width: 15%;font-size: 10px">
                                    {{$grades[$i]->grades[$j]->code}}
                                </td>


                            </tr>
                        @endif
                    @endfor

                    </tbody>
                </table>
                <br><br><br>

            @endfor

        @else
            {{--   if Arabic is required for  Transcript Data --}}
            @for ($i = 0; $i < count($grades); $i++)

{{--                Break the page for only three terms--}}

                @if($i%2==0 && $i!=0)
                    <br pagebreak="true" />


{{--                Start of putting headding on every page  --}}
                    @if($english==1)
                    {{--    heading of Logo data --}}
                    @else
                    {{--    heading of Logo data --}}

                    <table style="table-layout:fixed; " >
                        <tr>


                            <th align="center" style="width: 40.33%;font-size:12px ">
                                <div>

                                    <p style="vertical-align: middle">
                                        تأسست بالقرار الجمهوري رقم (234) السنه 1996
                                        <br>
                                        إدارة شؤون التعليم و الطلاب
                                    </p>

                                </div>
                            </th>
                            <th align="left" style="width: 25.33%;">
                                <div style="vertical-align: middle">
                                    <p style="font-size: 20px;">
                                        @if($english==1)<span > بيان حالة</span>
                                        @else
                                            <span > Transcript</span>
                                        @endif
                                    </p>
                                </div>
                            </th>
                            <th style="width:33.33%;font-size: 12px;text-align: right">

                                <img style ="" src="{{ public_path('img/logos/logo.jpg') }}" width="80px" height="80px">

                            </th>
                        </tr>
                    </table>
                    <span>__________________________________________________________________________________________________</span> <span style="text-align: right;font-size: 16px">جامعة 6 أكتوبر </span>
                    <br><br>

                        <table style="table-layout:fixed; " >
                            <tr>
                                <th style="width: 80%;">
                                    <table class="table2"
                                           style="width: 100%;table-layout:fixed;max-width: 100%;padding-top: 6px;text-align: left">
                                        <thead>
                                        <tr>
                                            <th scope="col" style="width: 15%;font-size: 12px">Code :</th>
                                            <th scope="col" style="width: 85%;font-size: 10px;line-height: 20px">
                                                {{$basicData->user->code}}
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr >
                                            <th scope="col" style="width: 25%;font-size: 12px">Student Name :
                                            </th>
                                            <th scope="col" style="width: 75%;font-size: 10px;line-height: 20px;text-align: left">
                                                {{$certificate->name}}
                                            </th>
                                        </tr>
                                        <tr >
                                            <th scope="col" style="width: 14%;font-size: 12px;">Faculty :</th>
                                            <th scope="col" style="width: 37%;font-size: 10px;line-height: 16px">
                                                {{$basicData->program->bylaw->faculty->name}}
                                            </th>
                                            <th scope="col" style="width: 18%;font-size: 12px;">Program :
                                            </th>
                                            <th scope="col" style="width: 30%;font-size: 10px;line-height: 16px">
                                                {{$basicData->program->name}}
                                            </th>

                                        </tr>
                                        <tr>
                                            <th scope="col" style="width: 22%;font-size: 12px;">Nationality :
                                            </th>
                                            <th scope="col" style="width: 28%;font-size: 10px;line-height: 20px">
                                                {{$basicData->user->nationality->nationality}}
                                            </th>
                                            <th scope="col" style="width: 18%;font-size: 12px ;"> Level :</th>
                                            <th scope="col" style="width: 37%;font-size: 10px;line-height: 20px">
                                                {{$basicData->level->name}}
                                            </th>
                                        </tr>
                                        </tbody>
                                    </table>
                                </th>
                                <th style="width:20%;font-size: 12px">
                                    <img style ="" src="{{ public_path('img/150.PNG') }}">
                                </th>
                            </tr>
                        </table>
                    <br><br>
                    @endif
                    @else


            @endif
                {{-- Start of filling transcript data --}}
                <table  class="table-transcript" style="table-layout:fixed;border: 1px solid #ccc;max-width: 100%;text-align: left;">
                    <thead >
                    <tr >
                        <th  scope="col" style="width: 7%;font-size: 10px">
                            Year
                        </th>

                        <th  scope="col" style="width: 10%;font-size: 10px">
                            Term
                        </th>

                        <th  scope="col" style="width: 13%;font-size: 10px">
                            Subject code
                        </th>

                        <th  scope="col" style="width: 31%;font-size: 10px">
                            Subject name
                        </th>

                        <th  scope="col" style="width: 8%;font-size: 10px">
                            Grade
                        </th>

                        <th  scope="col" style="width: 8%;font-size: 10px;font-weight: 900;">
                            Hours
                        </th>

                        <th  scope="col" style="width: 8%;font-size: 10px">
                            Points
                        </th>

                        <th  scope="col" style="width: 7%;font-size: 10px;text-align: center">
                            Total Hours
                        </th>

                        <th  scope="col" style="width: 7%;font-size: 10px;text-align: center">
                            Total Points
                        </th>

                    </tr>
                    </thead>
                    <tbody >
                    @for($j=0;$j < ($grades[$i]->count);$j++)
                        @if($j == 0)
                            <tr >
                                @if($grades[$i]->count > 2)
                                    <td align="center"  scope="row" rowspan="{{$grades[$i]->count}}" style="width: 7%;font-size: 9px;vertical-align:middle">
                                        <div style="vertical-align: middle;">
                                            <p >{{$grades[$i]->year}}</p>
                                        </div>
                                    </td>

                                    <td align="center"  scope="row" rowspan="{{$grades[$i]->count}}" style="width: 10%;font-size: 9px">
                                        <div style="vertical-align: middle;">
                                            <p>
                                                {{
                                                preg_replace('/[0-9]+/', '', $grades[$i]->term_name)
                                                }}
                                            </p>
                                        </div>
                                    </td>
                                @else
                                    <td align="center"  scope="row" rowspan="{{$grades[$i]->count}}" style="width: 7%;font-size: 9px;vertical-align:middle">
                                           {{$grades[$i]->year}}
                                    </td>

                                    <td align="center"  scope="row" rowspan="{{$grades[$i]->count}}" style="width: 10%;font-size: 9px">

                                                {{
                                                preg_replace('/[0-9]+/', '', $grades[$i]->term_name)
                                                }}

                                    </td>
                                @endif

                                <td  scope="row" style="width: 13%;font-size: 9px">
                                    {{$grades[$i]->grades[$j]->code}}
                                </td>

                                <td  scope="row" style="width: 31%;font-size: 8px">
                                    {{--                                    Course Name--}}
                                    {{$grades[$i]->grades[$j]->course_name}}
                                </td>

                                <td  scope="row" style="width: 8%;font-size: 9px">
                                    {{--                                    Grade Type Id --}}
                                    {{$grades[$i]->grades[$j]->grade_name}}
                                </td>

                                <td  scope="row" style="width: 8%;font-size: 9px;font-weight: 900;">
                                    {{--                                    hours--}}
                                    {{$grades[$i]->grades[$j]->credit_hours}}
                                </td>

                                <td  scope="row" style="width: 8%;font-size: 9px">
                                    {{--                                    points--}}
                                    {{($grades[$i]->grades[$j]->credit_hours) * ($grades[$i]->grades[$j]->grade_gpa)}}
                                </td>



                                    @if($grades[$i]->count > 2)
                                        <td align="center"  scope="row" rowspan="{{$grades[$i]->count}}" style="width: 7%;font-size: 9px">
                                            <div style="vertical-align: middle">
                                                <p>

                                                    {{$grades[$i]->hours}}
                                                </p>
                                            </div>
                                        </td>

                                        <td align="center"  scope="row" rowspan="{{$grades[$i]->count}}" style="width: 7%;font-size: 9px">
                                            <div style="vertical-align: middle">
                                                <p>

                                                    {{$grades[$i]->points}}
                                                </p>
                                            </div>
                                        </td>
                                    @else
                                        <td align="center"  scope="row" rowspan="{{$grades[$i]->count}}" style="width: 7%;font-size: 9px">


                                                    {{$grades[$i]->hours}}

                                        </td>

                                        <td align="center"  scope="row" rowspan="{{$grades[$i]->count}}" style="width: 7%;font-size: 9px">


                                                    {{$grades[$i]->points}}

                                        </td>
                                    @endif
                            </tr>
                        @else
                            <tr >
                                <td  scope="row" style="width: 13%;font-size: 9px">
                                    {{$grades[$i]->grades[$j]->code}}
                                </td>

                                <td  scope="row" style="width: 31%;font-size: 8px">
                                    {{--                                    Course Name--}}
                                    {{$grades[$i]->grades[$j]->course_name}}
                                </td>

                                <td  scope="row" style="width: 8%;font-size: 9px">
                                    {{--                                    Grade Type Id --}}
                                    {{$grades[$i]->grades[$j]->grade_name}}
                                </td>

                                <td  scope="row" style="width: 8%;font-size: 9px;font-weight: 900;">
                                    {{--                                    hours--}}
                                    {{$grades[$i]->grades[$j]->credit_hours}}
                                </td>

                                <td  scope="row" style="width: 8%;font-size: 9px">
                                    {{--                                    points--}}
                                    {{($grades[$i]->grades[$j]->credit_hours) * ($grades[$i]->grades[$j]->grade_gpa)}}
                                </td>

                            </tr>
                        @endif
                    @endfor
                    </tbody>
                </table>
            {{--                making breaking for pages withour logo --}}
                @if($i < 3 || $i == (count($grades) - 3) || $i == (count($grades) - 2) || $i == (count($grades) - 1))
                <br><br>
                @else
                <br><br><br><br>
                @endif
            @endfor

    @endif

    <br> <br> <br>
            @if(count($grades) % 2 == 0)

                <br pagebreak="true" />

        <table style="table-layout:fixed; " >
            <tr>


                <th align="center" style="width: 40.33%;font-size:12px ">
                    <div>

                        <p style="vertical-align: middle">
                            تأسست بالقرار الجمهوري رقم (234) السنه 1996
                            <br>
                            إدارة شؤون التعليم و الطلاب
                        </p>

                    </div>
                </th>
                <th align="left" style="width: 25.33%;">
                    <div style="vertical-align: middle">
                        <p style="font-size: 20px;">
                            @if($english==1)<span > بيان حالة</span>
                            @else
                                <span > Transcript</span>
                            @endif
                        </p>
                    </div>
                </th>
                <th style="width:33.33%;font-size: 12px;text-align: right">

                    <img style ="" src="{{ public_path('img/logos/logo.jpg') }}" width="80px" height="80px">

                </th>
            </tr>
        </table>
        <span>__________________________________________________________________________________________________</span> <span style="text-align: right;font-size: 16px">جامعة 6 أكتوبر </span>
        <br><br>

        <table style="table-layout:fixed; " >
            <tr>
                <th style="width: 80%;">
                    <table class="table2"
                           style="width: 100%;table-layout:fixed;max-width: 100%;padding-top: 6px;text-align: left">
                        <thead>
                        <tr>
                            <th scope="col" style="width: 15%;font-size: 12px">Code :</th>
                            <th scope="col" style="width: 85%;font-size: 10px;line-height: 20px">
                                {{$basicData->user->code}}
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr >
                            <th scope="col" style="width: 25%;font-size: 12px">Student Name :
                            </th>
                            <th scope="col" style="width: 75%;font-size: 10px;line-height: 20px;text-align: left">
                                {{$certificate->name}}
                            </th>
                        </tr>
                        <tr >
                            <th scope="col" style="width: 14%;font-size: 12px;">Faculty :</th>
                            <th scope="col" style="width: 37%;font-size: 10px;line-height: 16px">
                                {{$basicData->program->bylaw->faculty->name}}
                            </th>
                            <th scope="col" style="width: 18%;font-size: 12px;">Program :
                            </th>
                            <th scope="col" style="width: 30%;font-size: 10px;line-height: 16px">
                                {{$basicData->program->name}}
                            </th>

                        </tr>
                        <tr>
                            <th scope="col" style="width: 22%;font-size: 12px;">Nationality :
                            </th>
                            <th scope="col" style="width: 28%;font-size: 10px;line-height: 20px">
                                {{$basicData->user->nationality->nationality}}
                            </th>
                            <th scope="col" style="width: 18%;font-size: 12px ;"> Level :</th>
                            <th scope="col" style="width: 37%;font-size: 10px;line-height: 20px">
                                {{$basicData->level->name}}
                            </th>
                        </tr>
                        </tbody>
                    </table>
                </th>
                <th style="width:20%;font-size: 12px">
                    <img style ="" src="{{ public_path('img/150.PNG') }}">
                </th>
            </tr>
        </table>
        <br><br>
    @endif
{{-- Start of Summary of transcript --}}
    @if($english==1)
        <table style="table-layout:fixed;" align="right" >
    <tr>

        <th style="font-size: 14px;font-weight:bolder;text-align:center">

            المعدل التراكي :  @if(count($grades)>0)
            @if($grades[0]->totalHours != 0)
                {{ number_format(($grades[0]->totalPoints/$grades[0]->totalHours) , 3)}}
            @else
                -
            @endif

            @endif
        </th>
        <th style="font-size: 14px;font-weight:bolder;text-align:center">

            إجمالي النقاط :  @if(count($grades)>0)

                                {{number_format($grades[0]->totalPoints , 3) }}

            @endif
        </th>
        <th style="font-size: 14px;font-weight:bolder;text-align:center">
            إجمالي عدد الساعات :  @if(count($grades)>0)
                               {{ $grades[0]->totalHours }}

            @endif
        </th>
    </tr>


</table>
    @else
            <table style="table-layout:fixed;" align="left" >
                <tr>
                    <th style="font-size: 14px;font-weight:bolder;text-align:center">

                        Total Hours :@if(count($grades)>0) {{ $grades[0]->totalHours }} @endif
                    </th>
                    <th style="font-size: 14px;font-weight:bolder;text-align:center">
                        Total points : @if(count($grades)>0) {{ $grades[0]->totalPoints }}@endif
                    </th>
                    <th style="font-size: 14px;font-weight:bolder;text-align:center">
                       GPA :  @if(count($grades)>0)

                            @if($grades[0]->totalHours != 0)
                                {{ number_format(($grades[0]->totalPoints/$grades[0]->totalHours) , 3)}}
                            @else
                                -
                            @endif

                            @endif
                    </th>
                </tr>
            </table>
    @endif
    <br><br>
{{-- End of Summary of transcript --}}

{{--    Start of Requirements Tabke    --}}
    @if($english==1)
    <table class="table-transcript" style="table-layout:fixed;max-width: 100%;text-align: center;padding:2px">
        <thead>
        <tr>
            <th scope="col" style="width: 25%;font-size: 14px">
                عدد الساعات المتبقيه
            </th>
            <th scope="col" style="width: 25%;font-size: 14px">
                عدد الساعات المجتازه
            </th>
            <th scope="col" style="width: 25%;font-size: 14px">
                عدد الساعات المعتمده
            </th>
            <th scope="col" style="width: 25%;font-size: 14px">
                اسم المتطلب
            </th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td scope="col" style="width: 25%;font-size: 12px">
                عدد الساعات المتبقيه
            </td>
            <td scope="col" style="width: 25%;font-size: 12px">
                @if(count($studentTotalData)>0)
                {{$studentTotalData[1]['total']}}
                @endif
            </td>
            <td scope="col" style="width: 25%;font-size: 12px">
                عدد الساعات المعتمده
            </td>
            <td scope="col" style="width: 25%;font-size: 12px">
                متطلبات جامعه إجباري
            </td>
        </tr>
        <tr>
            <td scope="col" style="width: 25%;font-size: 12px">
                عدد الساعات المتبقيه
            </td>
            <td scope="col" style="width: 25%;font-size: 12px">
                @if(count($studentTotalData)>0)
                    {{$studentTotalData[3]['total']}}
                @endif
            </td>
            <td scope="col" style="width: 25%;font-size: 12px">
                عدد الساعات المعتمده
            </td>
            <td scope="col" style="width: 25%;font-size: 12px">
               متطلبات كليه اجباري
            </td>
        </tr>
        <tr>
            <td scope="col" style="width: 25%;font-size: 12px">
                عدد الساعات المتبقيه
            </td>
            <td scope="col" style="width: 25%;font-size: 12px">
                @if(count($studentTotalData)>0)
                    {{$studentTotalData[4]['total']}}
                @endif
            </td>
            <td scope="col" style="width: 25%;font-size: 12px">
                عدد الساعات المعتمده
            </td>
            <td scope="col" style="width: 25%;font-size: 12px">
                متطلبات كلية اختياري
            </td>
        </tr>
        <tr>
            <td scope="col" style="width: 25%;font-size: 12px">
                -
            </td>
            <td scope="col" style="width: 25%;font-size: 12px">
                @if(count($studentTotalData)>0)
                    {{$studentTotalData[1]['total'] +  $studentTotalData[3]['total'] + $studentTotalData[4]['total']}}
                @endif

            </td>
            <td scope="col" style="width: 25%;font-size: 12px">
               -
            </td>
            <td scope="col" style="width: 25%;font-size: 14px">
                إجمالي عدد الساعات
            </td>
        </tr>
        </tbody>
    </table>

        @else
            <table class="table-transcript" style="table-layout:fixed;max-width: 100%;text-align: center;padding:2px">
                <thead>
                <tr>
                    <th scope="col" style="width: 10%;font-size: 14px">
                        Code
                    </th>

                    <th scope="col" style="width: 25%;font-size: 12px">
                        Requirements Name
                    </th>

                    <th scope="col" style="width: 25%;font-size: 12px">
                        Total Credit Hours
                    </th>

                    <th scope="col" style="width: 20%;font-size: 12px">
                        Earned Hours
                    </th>

                    <th scope="col" style="width: 20%;font-size: 14px">
                        Remaining Hours
                    </th>
                </tr>
                </thead>
                <tbody>

                    <tr>
                        <th scope="col" style="width: 10%;font-size: 10px">
                            1
                        </th>
                        <th scope="col" style="width: 25%;font-size: 10px">
                           Mandatory University Required
                        </th>
                    <th scope="col" style="width: 25%;font-size: 10px">
                        Total Credit Hours

                    </th>
                    <th scope="col" style="width: 20%;font-size: 10px">
                        @if(count($studentTotalData)>0)
                        {{$studentTotalData[1]['total']}}
                        @endif
                    </th>
                    <th scope="col" style="width: 20%;font-size: 10px">
                        Remaining Hours
                    </th>

                    </tr>

                    <tr>
                        <th scope="col" style="width: 10%;font-size: 10px">
                           3
                        </th>
                        <th scope="col" style="width: 25%;font-size: 10px">
                            Mandatory Collegue Required
                        </th>
                        <th scope="col" style="width: 25%;font-size: 10px">
                            Total Credit Hours
                        </th>
                        <th scope="col" style="width: 20%;font-size: 10px">
                            @if(count($studentTotalData)>0)
                                {{$studentTotalData[3]['total']}}
                            @endif
                        </th>
                        <th scope="col" style="width: 20%;font-size: 10px">
                            Remaining Hours
                        </th>
                    </tr>

                    <tr>
                        <th scope="col" style="width: 10%;font-size: 10px">
                            4
                        </th>
                        <th scope="col" style="width: 25%;font-size: 10px">
                            Elective Collegue Required
                        </th>
                        <th scope="col" style="width: 25%;font-size: 10px">
                            Total Credit Hours
                        </th>
                        <th scope="col" style="width: 20%;font-size: 10px">
                            @if(count($studentTotalData)>0)
                                {{$studentTotalData[4]['total']}}
                            @endif
                        </th>
                        <th scope="col" style="width: 20%;font-size: 10px">
                            Remaining Hours
                        </th>
                    </tr>

                    <tr>
                        <td scope="col" style="width: 10%;font-size: 12px">

                        </td>
                        <td scope="col" style="width: 25%;font-size: 12px">
                            Total Student Hours
                        </td>
                        <td scope="col" style="width: 25%;font-size: 10px">
                           -
                        </td>
                        <td scope="col" style="width: 20%;font-size: 10px">
                            @if(count($studentTotalData)>0)
                                {{$studentTotalData[1]['total'] +  $studentTotalData[3]['total'] + $studentTotalData[4]['total']}}
                            @endif
                             </td>
                        <td scope="col" style="width: 20%;font-size: 10px">
                          -
                        </td>
                    </tr>

                </tbody>
            </table>
    @endif
    <br><br><br><br>
{{--    End of Requirements Tabke    --}}


    @if($english==1)
    <table class="table2" style="table-layout:fixed;max-width: 100%;text-align: right;padding:2px">
        <tr>
            <th scope="col" style="width: 50%;font-size: 14px">

                *{{$certificate->apply_to}}*
            </th>
            <th scope="col" style="width: 50%;font-size: 14px">
                و قدر حرر هذا البيان لتقديمه إلي :
            </th>
        </tr>


    </table>
    @else
    <table class="table2" style="table-layout:fixed;max-width: 100%;text-align: left;padding:2px">
                <tr>
                    <th scope="col" style="width: 50%;font-size: 12px">
                        This statement is to be submitted for :
                    </th>
                    <th scope="col" style="width: 50%;font-size: 14px">
                        *{{$certificate->apply_to}}*
                    </th>

                </tr>
            </table>
    @endif

{{--        End of Apply to --}}
    <br><br><br><br>

</div>
</body>
</html>
