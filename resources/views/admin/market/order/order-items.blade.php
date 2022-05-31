@extends('admin.layouts.master')

@section('head-tag')
    <title>محصولات سفارش</title>
    <link rel="stylesheet" href="{{ asset('admin-assets/datatable/css/dataTables.min.css') }}">
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> محصولات سفارش</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        محصولات سفارش ({{ $order->id }})
                    </h5>
                </section>

                <section class="table-responsive mt-4 " style="min-height: 30rem">
                    <table id="table" style="width: 100%" class="hover compact display">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>نام محصول</th>
                                <th>تخفیف شگفت انگیز</th>
                                <th>تعداد</th>
                                <th>مبلغ محصول</th>
                                <th>مبلغ نهایی</th>
                                <th>مبلغ نهایی (با احتساب تعداد)</th>
                                <th>متغیر ها</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </section>

            </section>
        </section>
    </section>
@endsection

@section('script')
    <script src="{{ asset('admin-assets/datatable/js/dataTables.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/limit.js') }}"></script>
    <script src="{{ asset('admin-assets/js/toastAlerts.js') }}"></script>

    <script>
        $(function () {
            $('#table').DataTable({
                "searchDelay": 1500,
                "processing": true,
                "serverSide": true,
                "ajax": "{{ url()->current() }}",
                "columns": [
                    {
                        "data": "id",
                        "render": function(data, type, row, meta) {
                            return meta.row + 1;
                        },
                        "searchable": false
                    },
                    {
                        "data": "product_object.name",
                        "render": function(data, type, row, meta) {
                            return strlimit(data , 0, 10);
                        }
                    },
                    {
                        "data": "amazing_sale_discount_amount",
                        "render": function(data, type, row, meta) {
                            return row.amazing_sale_discount_amount_readable ?? '-';
                        }
                    },
                    {
                        "data": "number",
                        "render": function(data, type, row, meta) {
                            return  data
                        }
                    },
                    {
                        "data": "variant_object.price",
                        "render": function(data, type, row, meta) {
                            return row.variant_object.price_readable ?? '-';
                        }
                    },
                    {
                        "data": "final_product_price",
                        "render": function(data, type, row, meta) {
                            return row.final_product_price_readable ?? '-';
                        }
                    },
                    {
                        "data": "final_total_price",
                        "render": function(data, type, row, meta) {
                            return row.final_total_price_readable ?? '-';
                        }
                    },
                    {
                        "data": "variant_object.selectable_attributes",
                        "render": function(data, type, row, meta) {
                            render = '';

                            if (data) {
                                data.forEach((attribute, index) => {
                                    console.log(attribute,index);
                                    if (index > 2) {
                                        render += '...';
                                        return;
                                    }

                                    render += `- ${attribute.attribute.name}: ${attribute.value} <br>`;
                                });
                            }

                            return data.length != 0 ? render : '-';
                        }
                    },
                ],
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Persian.json"
                }
            });
        });
    </script>

@endsection
