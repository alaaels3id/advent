@extends('admin.layout.master') 
@section('title', 'المنتجات') 
@section('style') 
    {{ Html::style('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}
@endsection
 
@section('content')

<section class="content-header">
    <h1 class="pull-right" dir="rtl">المنتجات<small>عرض جميع المنتجات</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin-panal') }}">الرئيسية</a></li>
        <li class="active">المنتجات</li>
    </ol>
</section>

<section class="content" dir="rtl">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-primary">
                <div class="panel-heading">عرض جميع المنتجات</div>

                <div class="panel-body">
                    <table id="data" class="table text-center table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>{{ __('#') }}</th>
                                <th>الإسم</th>
                                <th>الصورة</th>
                                <th>السعر</th>
                                <th>الحالة</th>
                                <th>الفئة</th>
                                <th>الرافع</th>
                                <th>منذ</th>
                                <th>تعديل</th>
                                <th>حذف</th>
                            </tr>
                        </thead>

                        <tbody class="text-center" style="font-size: 15px;"></tbody>

                        <tfoot>
                            <tr>
                                <th>{{ __('#') }}</th>
                                <th>الإسم</th>
                                <th>الصورة</th>
                                <th>السعر</th>
                                <th>الحالة</th>
                                <th>الفئة</th>
                                <th>الرافع</th>
                                <th>منذ</th>
                                <th>تعديل</th>
                                <th>حذف</th>
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
        
        if($(this).index() < 7  && $(this).index() != 0 && $(this).index() != 2 && $(this).index() != 4 && $(this).index() != 5){
        
            var classname = $(this).index() == 8  ?  'date' : 'dateslash';
            var title = $(this).html();    
            $(this).html(`<input type="text" class="${classname}" data-value="${$(this).index()}" placeholder=" Search ${title}"/>`);
        
        }else if($(this).index() == 4){ 
            $(this).html('<select><option selected value="">إختر قيمة</option>'@foreach (status() as $value)+'<option value="{{ $value }}">{{ $value }}</option>'@endforeach+'</select>');
        }else if($(this).index() == 5){
            $(this).html('<select><option selected value="">إختر قيمة</option>'@foreach (Category() as $value)+'<option value="{{ text($value) }}">{{ text($value) }}</option>'@endforeach+'</select>');
        }
    });

    var table = $('#data').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ url('/admin-panal/products/data') }}',
        columns: [
            {data: 'id', name: 'id'},//0
            {data: 'name', name: 'name'},//1
            {data: 'image', name: 'image'},
            {data: 'price', name: 'price'},//2
            {data: 'status', name: 'status'},//3
            {data: 'category_id', name: 'category_id'},//5
            {data: 'adder', name: 'adder'},//6
            {data: 'created_at', name: 'created_at'},//7
            {data: 'edit', name: 'edit'},//8
            {data: 'delete', name: 'delete'}//9
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
        if (colIdx !== lastIdx) {
            $(table.cells().nodes()).removeClass( 'highlight' );
            $(table.column(colIdx).nodes()).addClass( 'highlight' );
        }
    })
    .on( 'mouseleave', function () {
        $(table.cells().nodes()).removeClass( 'highlight' );
    });

</script>
@stop