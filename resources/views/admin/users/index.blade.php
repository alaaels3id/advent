@extends('admin.layout.master') 
@section('title', 'الاعضاء') 
@section('style') 
    {{ Html::style('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}
@endsection
 
@section('content')

<section class="content-header">
    <h1 class="pull-right" dir="rtl"> الاعضاء <small> بيانات الاعضاء المسجلين </small></h1>
    <ol class="breadcrumb">
        <li class="h4"><a href="{{ route('admin-panal') }}">الرئيسية</a></li>
        <li class="active h4">الاعضاء</li>
    </ol>
</section>

<section class="content" dir="rtl" style="padding: 20px; margin: 70px;">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-body">
                    <table id="data" class="table table-bordered table-hover text-center">
                        <thead>
                            <tr>
                                <th>{{ __('#') }}</th><th>الاسم</th>
                                <th>البريد</th><th>النوع</th>
                                <th>الهاتف</th>
                                <th>السن</th>
                                <th>تعديل</th><th>حذف</th>
                            </tr>
                        </thead>

                        <tbody class="h4"></tbody>

                        <tfoot>
                            <tr>
                                <th>{{ __('#') }}</th><th>الاسم</th>
                                <th>البريد</th><th>النوع</th>
                                <th>الهاتف</th>
                                <th>السن</th>
                                <th>تعديل</th><th>حذف</th>
                            </tr>
                        </tfoot>

                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@stop
 
@section('script') 

{{ Html::script('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }} 
{{ Html::script('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}

<script type="text/javascript">
    var lastIdx = null;
    
    $('#data thead th').each( function () {
        
        if($(this).index()  < 5 && $(this).index() != 0 && $(this).index() != 3){
        
            var classname = $(this).index() == 5  ?  'date' : 'dateslash';
            var title = $(this).html();    
            $(this).html( '<input type="text" class="' + classname + '" data-value="'+ $(this).index() +'" placeholder=" Search ' + title + '" />' );
        
        }else if($(this).index() == 3){ 
        
            $(this).html('<select><option selected value="">إختر قيمة</option>'@foreach (gender() as $key => $value)+'<option value="{{ $value }}">{{ $value }}</option>'@endforeach+'</select>');
        
        }
    });

    var table = $('#data').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ url('/admin-panal/users/data') }}',
        columns: [
            {data: 'id', name: 'id'}, //0
            {data: 'fullname', name: 'fullname'}, //1
            {data: 'email', name: 'email'}, //2
            {data: 'gender', name: 'gender'}, //3
            {data: 'mobile', name: 'mobile'}, //4
            {data: 'age', name: 'age'}, //5             
            {data: 'edit', name: 'edit'}, //7
            {data: 'delete', name: 'delete'} //8
        ],
        
        "stateSave": false,
        "responsive": true,
        "order": [[0, 'ASC']],
        "pagingType": "full_numbers",
        
        aLengthMenu: [[50, 100, 150, 300, -1], [50, 100, 150, 300, "All"]],
        iDisplayLength: 50,
        fixedHeader: true,

        "oTableTools": {
            "aButtons": [
                {
                    "sExtends": "csv",
                    "sButtonText": "Excel File",
                    "sCharSet": "utf16le"
                },
                {
                    "sExtends": "copy",
                    "sButtonText": "Copy Information",
                },
                {
                    "sExtends": "print",
                    "sButtonText": "Print",
                    "mColumns": "visible",
                }
            ],
            "sSwfPath": "{{ Request::root() }}/admin/cus/copy_csv_xls_pdf.swf"
        },
        
        "dom": '<"pull-left text-left" T><"pullright" i><"clearfix"><"pull-right text-right col-lg-6" f > <"pull-left text-left" l><"clearfix">rt<"pull-right text-right col-lg-6" pi > <"pull-left text-left" l><"clearfix"> '
        ,initComplete: function (){
            var r = $('#data tfoot tr');
            r.find('th').each(function(){
                $(this).css('padding', 5);
            });
            $('#data thead').append(r);
            $('#search_0').css('text-align', 'center');
        }
    });
    table.columns().eq(0).each(function(colIdx) {
        $('input', table.column(colIdx).header()).on('keyup change', function() {
            table
            .column(colIdx)
            .search(this.value)
            .draw();
        });
    });
    
    table.columns().eq(0).each(function(colIdx) {
        $('select', table.column(colIdx).header()).on('change', function() {
            table
            .column(colIdx)
            .search(this.value)
            .draw();
        });

        $('select', table.column(colIdx).header()).on('click', function(e) {
            e.stopPropagation();
        });
    });
    
    $('#data tbody').on( 'mouseover', 'td', function (){
        var colIdx = table.cell(this).index().column;
        if ( colIdx !== lastIdx ) {
            $( table.cells().nodes() ).removeClass( 'highlight' );
            $( table.column( colIdx ).nodes() ).addClass( 'highlight' );
        }
    })
    .on( 'mouseleave', function () {
        $( table.cells().nodes() ).removeClass( 'highlight' );
    });

</script>
@stop