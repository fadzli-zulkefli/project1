@section('css')
    @include('layouts.datatables_css')
@endsection

{!! $dataTable->table(['width' => '100%', 'class' => 'table table-striped table-bordered']) !!}

@push('scripts')


<script>

var statusList = @json($statusList) ;
var kategoriList = @json($kategoriList) ;

function renderSpanKategoriList(data){

    var title = kategoriList[data];
    return '<span style="cursor:pointer;color:blue;width:100%;" title="'+title+'"> &nbsp;  &nbsp; '+data+' &nbsp;  &nbsp; </span>'

}

function render_jumlah_diluluskan(data){
    return 'RM '+data;
    }

function onRedrawDataTable(){

window.LaravelDataTables["dataTableBuilder"].column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
cell.innerHTML = i+1;
} );

}

</script>


    @include('layouts.datatables_js')
    {!! $dataTable->scripts() !!}


    <script>




            window.LaravelDataTables["dataTableBuilder"].on( 'order.dt search.dt draw.dt', function () {

                console.log("redraw counter...");

                var info = window.LaravelDataTables["dataTableBuilder"].page.info();

                var add = info.page * info.length;

                window.LaravelDataTables["dataTableBuilder"].column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1+add;
        } );

    } ).draw();


</script>

@endpush
