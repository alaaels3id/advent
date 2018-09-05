@extends('admin.layout.master') 

@section('title', 'الرسائل') 

@section('style') 
    {{ Html::style('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}
@endsection
 
@section('content')

<section class="content-header">
    <h1 class="pull-right" dir="rtl">الرسائل<small>عرض جميع الرسائل</small></h1>
    <ol class="breadcrumb">
        <li class="h4"><a href="{{ route('admin-panal') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li class="active h4">الرسائل</li>
    </ol>
</section>

<section class="content" dir="rtl" style="padding: 20px; margin: 70px;">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">عرض جميع الرسائل</div>
                <div class="box-body">
                    <table id="data" class="table table-bordered table-hover text-center" style="padding: 20px; margin: 20px;">
                        <thead>
                            <tr> 
                                <th>{{ __('#') }}</th>
                                <th>المرسل</th>
                                <th>البريد</th>
                                <th>النوع</th>
                                <th>الحالة</th>
                                <th>تعديل</th>
                                <th>حذف</th>
                            </tr>
                        </thead>

                        <tbody class="text-center" style="font-size: 15px;">
                        </tbody>

                        <tfoot>
                            <tr>
                                <th>{{ __('#') }}</th>
                                <th>المرسل</th>
                                <th>البريد</th>
                                <th>النوع</th>
                                <th>الحالة</th>
                                <th>تعديل</th>
                                <th>حذف</th>
                            </tr>
                        </tfoot>

                    </table>
                    <br><br>
                    <a href="{{ route('contacts.remove-all') }}" class="btn btn-primary btn-lg">
                        <i class="fa fa-trash fa-1x"></i> حذف الكل نهائياً
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
 
@section('script') 

{{ Html::script('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }} 
{{ Html::script('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}

<script type="text/javascript">
    var lastIdx = null;
    
    $('#data thead th').each( function () {
        
        if($(this).index()  < 3 ){
          var classname = $(this).index() == 3  ?  'date' : 'dateslash';
          var title = $(this).html();
          $(this).html(`<input type="text" class="${classname}" data-value="${$(this).index()}" placeholder=" Search ${title}" />`);
      }else if($(this).index() == 3){
          $(this).html('<select>'@foreach (contacts() as $key => $value)+'<option value="{{ $value }}">{{ $value }}</option>'@endforeach+'</select>');
      }else if($(this).index() == 4){
          $(this).html('<select>'@foreach (coview() as $key => $value)+'<option value="{{ $value }}">{{ $value }}</option>'@endforeach+'</select>');
      }
    });

    var table = $('#data').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ url('/admin-panal/contacts/data') }}',
        columns: [
            {data: 'id', name: 'id'},
            {data: 'co_name', name: 'co_name'},
            {data: 'co_email', name: 'co_email'},
            {data: 'co_type', name: 'co_type'},
            {data: 'co_view', name: 'co_view'},
            {data: 'edit', name: 'edit'},
            {data: 'delete', name: 'delete'}
        ],
        
        "stateSave": false,
        "responsive": true,
        "order": [[0, 'ASC']],
        "pagingType": "full_numbers",
        
        aLengthMenu: 
        [[10, 50, 100, 200, -1], 
        [10, 50, 100, 200, "All"]],
        iDisplayLength: 10,
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
@endsection